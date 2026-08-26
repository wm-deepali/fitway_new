<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'logo_image',
        'header_email', 'header_phone', 'header_analytics', 'header_ads',
        'footer_email', 'footer_phone_1', 'footer_phone_2', 'footer_address',
        'newsletter_description',
    ];
}