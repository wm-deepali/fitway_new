<?php
// app/Models/ProductEnquiry.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductEnquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'city',
        'state',
        'address',
        'pin',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];
}