<?php
// app/Models/ContactUs.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email_id',
        'venue',
        'mobile_number',
        'message',
        'website',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];
}