<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BMICalculator extends Model
{
    use HasFactory;

    protected $table = 'bmi_calculators';

    protected $fillable = [
        'height',
        'weight',
        'full_name',
        'email',
        'phone',
        'ip_address',
        'score',
    ];
}