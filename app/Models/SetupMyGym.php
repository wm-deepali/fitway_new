<?php
// app/Models/SetupMyGym.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetupMyGym extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'mobile_number',
        'requirements',
        'details',
        'is_read',
    ];

    protected $casts = [
        'requirements' => 'array',
        'is_read'       => 'boolean',
    ];
}