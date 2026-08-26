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
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];
}