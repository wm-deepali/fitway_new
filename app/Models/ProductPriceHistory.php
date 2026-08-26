<?php
// app/Models/ProductPriceHistory.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPriceHistory extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'old_mrp', 'new_mrp',
        'old_discount_type', 'new_discount_type',
        'old_discount_value', 'new_discount_value',
        'old_offered_price', 'new_offered_price',
        'old_purchase_price', 'new_purchase_price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}