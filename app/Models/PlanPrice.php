<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanPrice extends Model
{
    protected $fillable = [
        'title_1', 'title_2', 'title_3', 'title_4',
        'days', 'image', 'class', 'price', 'montly_yearly', 'plan',
    ];
}