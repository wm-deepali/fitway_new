<?php
// app/Http/Controllers/Admin/QuotePriceManagementController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\Brand;
use App\Models\ProductPriceHistory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class QuotePriceManagementController extends Controller
{
    /**
     * Columns this feature is allowed to read/write — kept in one place
     * so export, import, and the update() diff logic never drift apart.
     * Same columns as the catalog Price Management page (point 6's field
     * set: Purchase Price, MRP, Discount Type/Value, Sales/Offered Price).
     */
    protected array $priceColumns = [
        'mrp', 'discount_type', 'discount_value', 'offered_price', 'purchase_price',
    ];

    /**
     * Internal Inventory-only scope. Catalog/storefront products stay on
     * the original Price Management page under Gym Equipments.
     */
    protected function inventoryScope()
    {
        return Product::where('source_type', 'internal_inventory');
    }

    public function index(Request $request)
    {
        $products = $this->inventoryScope()
            ->with(['vendor', 'brand'])
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->when($request->vendor_id, function ($query) use ($request) {
                $query->where('vendor_id', $request->vendor_id);
            })
            ->when($request->brand_id, function ($query) use ($request) {
                $query->where('brand_id', $request->brand_id);
            })
            ->orderBy('name')
            ->paginate(20)
            ->withQueryString();

        $vendors = Vendor::orderBy('vendor_name')->get(['id', 'vendor_name']);
        $brands = Brand::orderBy('name')->get(['id', 'name']);

        $stats = [
            'total' => $this->inventoryScope()->count(),
            'no_discount' => $this->inventoryScope()->where(function ($q) {
                $q->whereNull('discount_value')->orWhere('discount_value', 0);
            })->count(),
            'no_purchase_price' => $this->inventoryScope()->whereNull('purchase_price')->count(),
        ];

        return view('admin.quote-price-management.index', compact('products', 'vendors', 'brands', 'stats'));
    }

    public function update(Request $request, Product $product)
    {
        abort_unless($product->source_type === 'internal_inventory', 404);

        $validated = $request->validate([
            'mrp'             => 'nullable|numeric|min:0',
            'discount_type'   => 'nullable|in:flat,percentage',
            'discount_value'  => 'nullable|numeric|min:0',
            'offered_price'   => 'nullable|numeric|min:0',
            'purchase_price'  => 'nullable|numeric|min:0',
        ]);

        $old = $this->snapshot($product);

        $product->update($validated);

        $this->logIfChanged($product, $old);

        return response()->json([
            'success'         => true,
            'mrp'             => $product->mrp,
            'discount_type'   => $product->discount_type,
            'discount_value'  => $product->discount_value,
            'offered_price'   => $product->offered_price,
            'purchase_price'  => $product->purchase_price,
        ]);
    }

    /**
     * Exports exactly the columns shown on this grid, respecting whatever
     * search/vendor/brand filters are currently applied.
     */
    public function export(Request $request)
    {
        $products = $this->inventoryScope()
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->when($request->vendor_id, function ($query) use ($request) {
                $query->where('vendor_id', $request->vendor_id);
            })
            ->when($request->brand_id, function ($query) use ($request) {
                $query->where('brand_id', $request->brand_id);
            })
            ->orderBy('name')
            ->get(array_merge(['id', 'name'], $this->priceColumns));

        $headers = array_merge(['id', 'name'], $this->priceColumns);

        $response = new StreamedResponse(function () use ($products, $headers) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $headers);

            foreach ($products as $product) {
                $row = [$product->id, $product->name];
                foreach ($this->priceColumns as $col) {
                    $row[] = $product->{$col};
                }
                fputcsv($handle, $row);
            }

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set(
            'Content-Disposition',
            'attachment; filename=quote_price_management_' . now()->format('Y-m-d_His') . '.csv'
        );

        return $response;
    }

    /**
     * Bulk-updates ONLY existing Internal Inventory products (matched by
     * id) and ONLY the price-management columns. Skips any id that belongs
     * to a catalog product so the two price grids can never cross-write
     * each other's rows.
     */
    public function importStore(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt|max:10240',
        ]);

        $handle = fopen($request->file('file')->getRealPath(), 'r');
        $header = fgetcsv($handle);

        if (!$header) {
            fclose($handle);
            return back()->with('error', 'The uploaded file is empty.');
        }

        $header = array_map('trim', $header);

        if (!in_array('id', $header)) {
            fclose($handle);
            return back()->with('error', 'CSV must contain an "id" column — export the file first to get the right format.');
        }

        $updated = 0;
        $skipped = 0;
        $skippedRows = [];

        while (($row = fgetcsv($handle)) !== false) {
            if (count($row) < count($header)) {
                $row = array_pad($row, count($header), null);
            }

            $data = array_combine($header, $row);

            if (empty($data['id']) || !is_numeric($data['id'])) {
                $skipped++;
                continue;
            }

            $product = $this->inventoryScope()->find($data['id']);

            if (!$product) {
                $skipped++;
                $skippedRows[] = $data['id'] . ' (not found)';
                continue;
            }

            $updates = [];

            foreach ($this->priceColumns as $col) {
                if (!array_key_exists($col, $data) || $data[$col] === null || $data[$col] === '') {
                    continue; // blank cell = leave this column untouched
                }

                if (in_array($col, ['mrp', 'discount_value', 'offered_price', 'purchase_price']) && !is_numeric($data[$col])) {
                    continue;
                }

                if ($col === 'discount_type' && !in_array($data[$col], ['flat', 'percentage'])) {
                    continue;
                }

                $updates[$col] = $data[$col];
            }

            if (empty($updates)) {
                $skipped++;
                continue;
            }

            $old = $this->snapshot($product);

            $product->update($updates);

            $this->logIfChanged($product, $old);

            $updated++;
        }

        fclose($handle);

        return back()->with([
            'success'      => "Import completed. Updated: {$updated}, Skipped: {$skipped}.",
            'skipped_rows' => $skippedRows,
        ]);
    }

    /**
     * Returns the price-change history for a single product, newest first.
     * Shares the same ProductPriceHistory table as the catalog page.
     */
    public function logs(Product $product)
    {
        $logs = ProductPriceHistory::with('user:id,name')
            ->where('product_id', $product->id)
            ->latest()
            ->limit(50)
            ->get()
            ->map(function ($log) {
                return [
                    'user'            => $log->user?->name ?? 'System',
                    'date'            => $log->created_at->format('d M Y, h:i A'),
                    'mrp'             => ['old' => $log->old_mrp, 'new' => $log->new_mrp],
                    'discount_type'   => ['old' => $log->old_discount_type, 'new' => $log->new_discount_type],
                    'discount_value'  => ['old' => $log->old_discount_value, 'new' => $log->new_discount_value],
                    'offered_price'   => ['old' => $log->old_offered_price, 'new' => $log->new_offered_price],
                    'purchase_price'  => ['old' => $log->old_purchase_price, 'new' => $log->new_purchase_price],
                ];
            });

        return response()->json(['logs' => $logs]);
    }

    /** Captures the price-management fields before a mutation, for diffing. */
    protected function snapshot(Product $product): array
    {
        $snap = [];
        foreach ($this->priceColumns as $col) {
            $snap[$col] = $product->{$col};
        }
        return $snap;
    }

    /** Writes a ProductPriceHistory row only if at least one tracked field actually changed. */
    protected function logIfChanged(Product $product, array $old): void
    {
        $new = $this->snapshot($product);

        $changed = collect($old)->keys()->contains(function ($key) use ($old, $new) {
            return (string) $old[$key] !== (string) $new[$key];
        });

        if (!$changed) {
            return;
        }

        ProductPriceHistory::create([
            'product_id'         => $product->id,
            'user_id'            => auth()->id(),
            'old_mrp'            => $old['mrp'],
            'new_mrp'            => $new['mrp'],
            'old_discount_type'  => $old['discount_type'],
            'new_discount_type'  => $new['discount_type'],
            'old_discount_value' => $old['discount_value'],
            'new_discount_value' => $new['discount_value'],
            'old_offered_price'  => $old['offered_price'],
            'new_offered_price'  => $new['offered_price'],
            'old_purchase_price' => $old['purchase_price'],
            'new_purchase_price' => $new['purchase_price'],
        ]);
    }
}