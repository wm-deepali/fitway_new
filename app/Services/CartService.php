<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class CartService
{
    protected ?Cart $cart = null;

    /**
     * Get (or create) the cart for the current visitor.
     * Guest carts are matched on the Laravel session ID.
     * customer_id stays null for now — set it here once auth is wired in,
     * so logged-in carts persist across devices without a schema change.
     */
    public function current(): Cart
    {
        if ($this->cart) {
            return $this->cart;
        }

        $sessionId = Session::getId();

        $this->cart = Cart::firstOrCreate(
            ['session_id' => $sessionId, 'customer_id' => null],
        );

        return $this->cart;
    }

    /**
     * Get cart items hydrated with live product data (name/price/image always current).
     */
    public function items(): array
    {
        $cart = $this->current();
        $items = [];

        foreach ($cart->items()->with('product.category')->get() as $cartItem) {
            $product = $cartItem->product;

            // Product may have been removed/unpublished since it was added
            if (! $product) {
                continue;
            }

            $items[] = [
                'id'        => $product->id,
                'name'      => $product->name,
                'slug'      => $product->slug,
                'image_url' => $product->image_url ?? optional($product->images->first())->url,
                'category'  => $product->category->category_name ?? null,
                'price'     => $product->offered_price,
                'qty'       => $cartItem->qty,
                'subtotal'  => $product->offered_price > 0 ? $product->offered_price * $cartItem->qty : 0,
            ];
        }

        return $items;
    }

    public function add(int $productId, int $qty = 1): void
    {
        $cart = $this->current();
        $item = $cart->items()->where('product_id', $productId)->first();

        if ($item) {
            $item->increment('qty', $qty);
        } else {
            $cart->items()->create(['product_id' => $productId, 'qty' => $qty]);
        }
    }

    public function updateQty(int $productId, int $qty): void
    {
        $cart = $this->current();

        if ($qty <= 0) {
            $cart->items()->where('product_id', $productId)->delete();
        } else {
            $cart->items()->where('product_id', $productId)->update(['qty' => $qty]);
        }
    }

    public function remove(int $productId): void
    {
        $this->current()->items()->where('product_id', $productId)->delete();
    }

    public function clear(): void
    {
        $this->current()->items()->delete();
    }

    public function count(): int
    {
        return (int) $this->current()->items()->sum('qty');
    }
}