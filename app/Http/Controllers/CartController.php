<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\AdminMailer;

class CartController extends Controller
{
    protected CartService $cart;

    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

    /**
     * AJAX: add product to cart
     */
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer|exists:products,id',
            'qty' => 'nullable|integer|min:1|max:99',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $this->cart->add(
            (int) $request->input('product_id'),
            (int) ($request->input('qty', 1))
        );

        return response()->json([
            'success' => true,
            'message' => 'Added to cart',
            'cart_count' => $this->cart->count(),
        ]);
    }

    /**
     * Full cart / quotation page
     */
    public function index()
    {
        return view('front.cart', [
            'items' => $this->cart->items(),
        ]);
    }

    /**
     * AJAX: update qty
     */
    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'qty' => 'required|integer|min:0|max:99',
        ]);

        $this->cart->updateQty((int) $request->product_id, (int) $request->qty);

        return response()->json([
            'success' => true,
            'items' => $this->cart->items(),
            'cart_count' => $this->cart->count(),
        ]);
    }

    /**
     * AJAX: remove item
     */
    public function remove(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
        ]);

        $this->cart->remove((int) $request->product_id);

        return response()->json([
            'success' => true,
            'items' => $this->cart->items(),
            'cart_count' => $this->cart->count(),
        ]);
    }

    /**
     * AJAX: submit quote request, snapshotting cart items into quote_request_items
     */
    public function submitQuote(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullName' => 'required|string|max:255',
            'mobileNumber' => 'required|string|max:20',
            'emailId' => 'required|email|max:255',
            'details' => 'nullable|string|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $items = $this->cart->items();

        if (empty($items)) {
            return response()->json([
                'success' => false,
                'message' => 'Your cart is empty.',
            ], 422);
        }

        $quoteRequest = QuoteRequest::create([
            'full_name' => $request->fullName,
            'mobile_number' => $request->mobileNumber,
            'email' => $request->emailId,
            'details' => $request->details,
        ]);

        foreach ($items as $item) {
            $quoteRequest->items()->create([
                'product_id' => $item['id'],
                'product_name' => $item['name'],
                'qty' => $item['qty'],
                'price' => $item['price'],
            ]);
        }

        $itemsSummary = collect($items)
            ->map(fn($item) => "{$item['name']} (x{$item['qty']})")
            ->implode(', ');

        AdminMailer::sendEnquiryAlert('Cart Quote Request Form', [
            'Full Name' => $request->fullName,
            'Mobile Number' => $request->mobileNumber,
            'Email' => $request->emailId,
            'Items' => $itemsSummary,
            'Details' => $request->details,
        ]);

        $this->cart->clear();

        return response()->json([
            'success' => true,
            'message' => 'Your quote request has been submitted. We will get back to you within 24 hours.',
            'redirect' => route('thank-you', [
                'message' => 'Thanks for your quote request! Our team will reach out to you shortly.',
            ]),
        ]);
    }
}