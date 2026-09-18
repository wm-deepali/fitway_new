<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'proposal_id',
        'customer_id',
        'packing_charges',
        'shipping_charges',
        'packing_quantity',
        'packing_tax_percentage',
        'shipping_quantity',
        'shipping_tax_percentage',
        'total_amount',
        'discount_amount',
        'status',
        'prepared_by',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->hasMany(QuoteItem::class);
    }
}