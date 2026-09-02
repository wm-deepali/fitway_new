<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $fillable = [
        'site_name',
        'tagline',
        'header_logo',
        'footer_logo',
        'favicon',
        'admin_login_logo',
        'admin_dashboard_logo',
        'admin_email',
        'support_email',
        'phone',
        'whatsapp',
        'business_address',
        'footer_description',
        'footer_copyright',
        'google_map_url',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'youtube',
        'pinterest',
        'currency',
        'currency_symbol',
        'timezone',
        'maintenance_mode',
        'admin_session_timeout'
    ];

    protected $casts = [
        'maintenance_mode' => 'boolean',
    ];
}