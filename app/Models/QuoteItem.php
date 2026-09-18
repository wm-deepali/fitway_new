<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteItem extends Model
{
    protected $fillable = [
        'quote_id',
        'product_id',
        'brand_id',
        'sku_code',
        'hsn_code',
        'product_name',
        'product_image',
        'product_features', // snapshot of the product's Features/description at add-time
        'show_features',    // print Features on the quotation PDF only if this is true
        'price',
        'tax_percentage',
        'tax_amount',
        'quantity',
        'total_price',
    ];

    protected $casts = [
        'show_features' => 'boolean',
    ];

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}