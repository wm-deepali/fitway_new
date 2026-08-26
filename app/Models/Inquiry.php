<?php
// app/Models/Inquiry.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'mobile_number',
        'message',
        'service',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];
}