<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email_id',
        'mobile_number',
        'interest',
        'message',
        'is_read',
    ];

    protected $casts = [
        'interest' => 'array',
        'is_read'  => 'boolean',
    ];
}