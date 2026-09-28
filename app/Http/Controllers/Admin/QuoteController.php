<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Quote;
use App\Models\State;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\QuoteSetting;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\QuoteProposalMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class QuoteController extends Controller
{
public function index(Request $request)
{
    $quotes = Quote::with('customer')
        ->withCount('items')
        ->when($request->search, function ($query) use ($request) {
            $query->where('proposal_id', 'like', '%' . $request->search . '%')
                ->orWhereHas('customer', function ($q) use ($request) {
                    $q->where('business_name', 'like', '%' . $request->search . '%')
                        ->orWhere('mobile_number', 'like', '%' . $request->search . '%');
                });
        })
        ->when($request->status, function ($query) use ($request) {
            $query->where('status', $request->status);
        })
        ->when($request->customer_id, function ($query) use ($request) {
            $query->where('customer_id', $request->customer_id);
        })
        ->latest()
        ->paginate(20)
        ->withQueryString();

    $filterCustomer = $request->customer_id ? Customer::find($request->customer_id) : null;

    return view('admin.quotes.index', compact('quotes', 'filterCustomer'));
}

    /**
     * Blank form for a brand-new proposal (no existing quote row yet).
     */
    public function create()
    {
        $states = State::orderBy('name')->get();
        $brands = Brand::orderBy('name')->get(['id', 'name']);

        return view('admin.quotes.create', [
            'states' => $states,
            'brands' => $brands,
            'draft' => null,
            'quoteId' => null,
        ]);
    }

    /**
     * Re-open an existing draft quote for editing. Only drafts can be
     * edited here — a print_ready quote is redirected to its preview.
     */
    public function edit(Quote $quote)
    {
        $quote->load('customer', 'items');

        $states = State::orderBy('name')->get();
        $brands = Brand::orderBy('name')->get(['id', 'name']);

        $draft = [
            'status' => $quote->status, // used by the blade banner below
            'customer_name' => $quote->customer->customer_name,
            'business_name' => $quote->customer->business_name,
            'mobile_number' => $quote->customer->mobile_number,
            'email' => $quote->customer->email,
            'gst_number' => $quote->customer->gst_number,
            'address' => $quote->customer->address,
            'state_id' => $quote->customer->state_id,
            'city_id' => $quote->customer->city_id,
            'pincode' => $quote->customer->pincode,
            'prepared_by' => $quote->prepared_by,
            // Installation Charges (flat amount only now)
            'packing_charges' => $quote->packing_charges,
            // Shipping (dropdown type + flat amount only now)
            'shipping_type' => $quote->shipping_type,
            'shipping_charges' => $quote->shipping_charges,
            'items' => $quote->items->map(function ($item) {
                return [
                    'product_id' => $item->product_id,
                    'product_name' => $item->product_name,
                    'product_image' => $item->product_image,
                    'product_features' => $item->product_features,
                    'show_features' => (bool) $item->show_features,
                    'brand_id' => $item->brand_id,
                    'sku_code' => $item->sku_code,
                    'hsn_code' => $item->hsn_code,
                    'price' => $item->price,
                    'tax_percentage' => $item->tax_percentage,
                    'quantity' => $item->quantity,
                    // Already-saved rows always point at a real product now,
                    // so this is never treated as "new" again on edit.
                    'is_new_product' => false,
                ];
            })->toArray(),
        ];

        return view('admin.quotes.create', [
            'states' => $states,
            'brands' => $brands,
            'draft' => $draft,
            'quoteId' => $quote->id,
        ]);
    }

    /**
     * Live customer search — matches Name OR Mobile OR Email as the admin
     * types. No separate "exact search" flow anymore; every hit returns an
     * array of matches for the suggestion dropdown.
     */
    public function searchCustomer(Request $request)
    {
        $request->validate([
            'term' => 'required|string|min:2',
        ]);

        $term = $request->term;

        $customers = Customer::where('customer_name', 'like', '%' . $term . '%')
            ->orWhere('mobile_number', 'like', '%' . $term . '%')
            ->orWhere('email', 'like', '%' . $term . '%')
            ->limit(10)
            ->get([
                'id', 'customer_name', 'business_name', 'mobile_number',
                'email', 'gst_number', 'address', 'state_id', 'city_id', 'pincode',
            ]);

        return response()->json($customers);
    }

    /**
     * Last 4-5 quotes for a customer, shown in the "Previous Quotations"
     * panel once that customer is selected from search suggestions.
     */
    public function customerQuotes(Customer $customer)
    {
        $quotes = Quote::where('customer_id', $customer->id)
            ->latest()
            ->limit(5)
            ->get(['id', 'proposal_id', 'status', 'total_amount', 'created_at']);

        return response()->json($quotes);
    }

    /**
     * Product search for the quote items table — shows products of every
     * source_type (not just Internal Inventory). Products not found here
     * can be staged via the "+ Add New Product" modal and are only
     * actually created in store() when the whole quote is submitted.
     */
    public function searchProducts(Request $request)
    {
        $request->validate([
            'term' => 'nullable|string',
        ]);

        $products = Product::where('status', 1)
            ->where('name', 'like', '%' . $request->term . '%')
            ->limit(10)
            ->get()
            ->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->offered_price ?? $product->mrp,
                    'image' => $product->image ? asset('storage/' . $product->image) : null,
                    'brand_id' => $product->brand_id,
                    // Features text pulled from the product's description/editor field,
                    // only sent to the quotation PDF if "Show Features" is checked.
                    'features' => (string) $product->description,
                    'source_type' => $product->source_type,
                ];
            });

        return response()->json($products);
    }

    /**
     * Calculates the price/tax/sub-total for a single quote line.
     * Sub Total = (price * qty) + tax on that subtotal.
     */
    private function calculateItemTotals(array $item): array
    {
        $price = (float) $item['price'];
        $quantity = (int) $item['quantity'];
        $taxPercentage = (float) $item['tax_percentage'];

        $subtotal = $price * $quantity;
        $taxAmount = $subtotal * ($taxPercentage / 100);

        return [
            'subtotal' => $subtotal,
            'tax_amount' => $taxAmount,
            'total' => $subtotal + $taxAmount,
        ];
    }

    /**
     * Persists the proposal straight to the DB as a draft (status = draft).
     * If `quote_id` is present in the payload, updates that existing draft
     * in place instead of creating a new row (the "Edit" flow).
     *
     * Any item flagged is_new_product (staged via the "+ Add New Product"
     * modal, never saved to the DB before now) gets its Product row created
     * here first — always as Internal Inventory — before the quote items
     * themselves are written.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'quote_id' => 'nullable|exists:quotes,id',
            'mobile_number' => 'required|string|max:15',
            'customer_name' => 'required|string|max:255',
            'business_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'state_id' => 'nullable|exists:states,id',
            'city_id' => 'nullable|exists:cities,id',
            'pincode' => 'nullable|string|max:10',
            'prepared_by' => 'nullable|string|max:255',
            'gst_number' => 'nullable|string|max:20',
            // Installation Charges — flat amount, no qty/tax anymore
            'packing_charges' => 'nullable|numeric|min:0',
            // Shipping — dropdown type + flat amount, no qty/tax anymore
            'shipping_type' => 'nullable|in:factory,showroom',
            'shipping_charges' => 'nullable|numeric|min:0',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'nullable|exists:products,id',
            'items.*.brand_id' => 'nullable|exists:brands,id',
            'items.*.product_name' => 'required|string|max:255',
            'items.*.product_image' => 'nullable|string',
            'items.*.product_features' => 'nullable|string',
            'items.*.show_features' => 'nullable|boolean',
            'items.*.sku_code' => 'nullable|string|max:100',
            'items.*.hsn_code' => 'nullable|string|max:20',
            'items.*.price' => 'required|numeric|min:0',
            'items.*.tax_percentage' => 'required|numeric|min:0|max:100',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.is_new_product' => 'nullable|boolean',
        ]);

        $quote = DB::transaction(function () use ($validated) {

            $customer = Customer::updateOrCreate(
                ['mobile_number' => $validated['mobile_number']],
                [
                    'customer_name' => $validated['customer_name'],
                    'business_name' => $validated['business_name'] ?? null,
                    'email' => $validated['email'] ?? null,
                    'address' => $validated['address'] ?? null,
                    'state_id' => $validated['state_id'] ?? null,
                    'city_id' => $validated['city_id'] ?? null,
                    'pincode' => $validated['pincode'] ?? null,
                    'gst_number' => $validated['gst_number'] ?? null,
                ]
            );

            // Create any products the admin staged via "+ Add New Product"
            // during this quote (they don't exist in the DB yet). Always
            // Internal Inventory, regardless of what else was searchable.
            // If a product with the exact same name already exists, reuse
            // it instead of erroring out on a unique-name collision.
            $items = collect($validated['items'])->map(function ($item) {

                if (empty($item['product_id']) && !empty($item['is_new_product'])) {

                    $existing = Product::where('name', $item['product_name'])->first();

                    if ($existing) {
                        $item['product_id'] = $existing->id;
                    } else {

                        $product = Product::create([
                            'name' => $item['product_name'],
                            'slug' => Str::slug($item['product_name']) . '-' . uniqid(),
                            'mrp' => $item['price'],
                            'offered_price' => $item['price'],
                            'brand_id' => $item['brand_id'] ?? null,
                            'description' => $item['product_features'] ?? null,
                            'source_type' => 'internal_inventory',
                            'status' => 1,
                        ]);

                        $item['product_id'] = $product->id;
                    }
                }

                return $item;
            })->all();

            $itemsTotal = collect($items)->sum(function ($item) {
                return $this->calculateItemTotals($item)['total'];
            });

            $installationCharges = (float) ($validated['packing_charges'] ?? 0);
            $shippingType = $validated['shipping_type'] ?? null;
            $shippingCharges = (float) ($validated['shipping_charges'] ?? 0);

            $quoteData = [
                'customer_id' => $customer->id,
                'prepared_by' => $validated['prepared_by'] ?? null,
                'packing_charges' => $installationCharges,
                'packing_quantity' => 1,
                'packing_tax_percentage' => 0,
                'shipping_type' => $shippingType,
                'shipping_charges' => $shippingCharges,
                'shipping_quantity' => 1,
                'shipping_tax_percentage' => 0,
                'total_amount' => $itemsTotal + $installationCharges + $shippingCharges,
            ];

            if (!empty($validated['quote_id'])) {
                // Edit flow — works for any status now. Status/proposal_id are left
                // untouched, so editing a print_ready quote doesn't demote it back
                // to draft or wipe its proposal_id.
                $quote = Quote::findOrFail($validated['quote_id']);
                $quote->update($quoteData);
                $quote->items()->delete(); // rebuilt fresh below
            } else {
                $quoteData['status'] = 'draft';
                $quote = Quote::create($quoteData);
            }

            foreach ($items as $item) {

                $totals = $this->calculateItemTotals($item);

                $quote->items()->create([
                    'product_id' => $item['product_id'] ?? null,
                    'brand_id' => $item['brand_id'] ?? null,
                    'product_name' => $item['product_name'],
                    'product_image' => $item['product_image'] ?? null,
                    'product_features' => $item['product_features'] ?? null,
                    'show_features' => (bool) ($item['show_features'] ?? false),
                    'sku_code' => $item['sku_code'] ?? null,
                    'hsn_code' => $item['hsn_code'] ?? null,
                    'price' => $item['price'],
                    'tax_percentage' => $item['tax_percentage'],
                    'tax_amount' => $totals['tax_amount'],
                    'quantity' => $item['quantity'],
                    'total_price' => $totals['total'],
                ]);
            }

            return $quote;
        });

        return redirect()->route('admin.quotes.preview', $quote->id);
    }

    /**
     * Deletes a draft outright — used by the explicit "Discard & Start
     * Fresh" action on the create page. print_ready quotes are untouched.
     */
    public function discardDraft(Quote $quote)
    {
        if ($quote->status === 'draft') {
            $quote->items()->delete();
            $quote->delete();
        }

        return redirect()->route('admin.quotes.create');
    }

    public function preview(Quote $quote)
    {
        $quote->load('customer.state', 'customer.city', 'items.brand');
        $settings = QuoteSetting::with('state', 'city')->first();

        return view('admin.quotes.preview', [
            'quote' => $quote,
            'settings' => $settings,
            'isDraft' => $quote->status === 'draft',
        ]);
    }

    /**
     * "Generate Quote" — finalizes a draft: assigns the proposal_id and
     * flips status to print_ready. Only works on drafts.
     */
    public function generate(Quote $quote)
    {
        if ($quote->status !== 'draft') {
            return redirect()->route('admin.quotes.preview', $quote->id);
        }

        DB::transaction(function () use ($quote) {
            $quote->update([
                'proposal_id' => $this->generateProposalId(),
                'status' => 'print_ready',
            ]);
        });

        return redirect()
            ->route('admin.quotes.preview', $quote->id)
            ->with('success', 'Proposal generated successfully.');
    }

    public function download(Quote $quote)
    {
        if ($quote->status !== 'print_ready') {
            return back()->with('error', 'Please generate the quote before downloading.');
        }

        $quote->load('customer.state', 'customer.city', 'items.brand');
        $settings = QuoteSetting::with('state', 'city')->first();

        $pdf = $this->buildPdf($quote, $settings);

        $filename = preg_replace('/[\/\\\\:*?"<>|]+/', '-', $quote->proposal_id);

        return $pdf->download($filename . '.pdf');
    }

    public function sendEmail(Request $request, Quote $quote)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        if ($quote->status !== 'print_ready') {
            return back()->with('error', 'Please generate the quote before sending it.');
        }

        $quote->load('customer.state', 'customer.city', 'items.brand');
        $settings = QuoteSetting::with('state', 'city')->first();

        $pdf = $this->buildPdf($quote, $settings);

        Mail::to($request->email)->send(
            new QuoteProposalMail($quote, $settings, $pdf->output())
        );

        return back()->with('success', 'Proposal emailed to ' . $request->email . '.');
    }

    /**
     * Builds the DomPDF instance for a quote, resolving all images to local
     * file paths first so they render reliably (see resolveImagePath()).
     */
    private function buildPdf(Quote $quote, ?QuoteSetting $settings)
    {
        if ($settings) {
            $settings->pdf_logo_path = $settings->company_logo
                ? $this->resolveImagePath(asset('storage/' . $settings->company_logo))
                : null;

            $settings->pdf_qr_path = $settings->qr_code
                ? $this->resolveImagePath(asset('storage/' . $settings->qr_code))
                : null;
        }

        foreach ($quote->items as $item) {
            $item->pdf_image_path = $this->resolveImagePath($item->product_image);
        }

        return Pdf::loadView('admin.quotes.pdf', compact('quote', 'settings'))
            ->setPaper('a4')
            ->setOption('isRemoteEnabled', true);
    }

    /**
     * Convert a public storage URL (or already-local path) into an absolute
     * local file path DomPDF can read directly, instead of fetching over HTTP.
     */
    private function resolveImagePath(?string $imageUrl): ?string
    {
        if (empty($imageUrl)) {
            return null;
        }

        if (file_exists($imageUrl)) {
            return $imageUrl;
        }

        $marker = '/storage/';
        $pos = strpos($imageUrl, $marker);

        if ($pos !== false) {
            $relativePath = substr($imageUrl, $pos + strlen($marker));
            $localPath = storage_path('app/public/' . $relativePath);

            if (file_exists($localPath)) {
                return $localPath;
            }
        }

        return $imageUrl;
    }

    /**
     * Generates the next proposal ID atomically (never resets).
     */
    private function generateProposalId(): string
    {
        $settings = QuoteSetting::lockForUpdate()->first();

        if (!$settings) {
            $settings = QuoteSetting::create(['id' => 1]);
            $settings = QuoteSetting::lockForUpdate()->first();
        }

        $nextSerial = $settings->current_serial + 1;

        $settings->update(['current_serial' => $nextSerial]);

        return $settings->id_prefix . str_pad(
            (string) $nextSerial,
            $settings->id_padding_length,
            '0',
            STR_PAD_LEFT
        );
    }

    /**
     * Quick-add a brand from the quote's Options modal / New Product modal.
     * Saved as inactive (status = 0) so it stays hidden on the website
     * front until the admin approves it via Manage Brands -> Edit.
     */
    public function storeBrand(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:brands,name',
        ]);

        $brand = Brand::create([
            'name' => $validated['name'],
            'status' => 0,
        ]);

        return response()->json([
            'id' => $brand->id,
            'name' => $brand->name,
        ]);
    }

    public function destroy(Quote $quote)
    {
        $quote->items()->delete();
        $quote->delete();

        return redirect()
            ->route('admin.quotes.index')
            ->with('success', 'Proposal deleted successfully.');
    }
}