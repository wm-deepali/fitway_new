<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageQuoteRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'mobile_number',
        'page_id',
        'details',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];
}