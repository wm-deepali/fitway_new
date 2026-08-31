<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuoteRequest extends Model
{
    protected $fillable = [
        'full_name',
        'mobile_number',
        'email',
        'details',
        'status',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(QuoteRequestItem::class);
    }
}