<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = [
        'vendor_name',
        'gst_number',
        'full_address',
        'email',
        'contact_person_name',
        'mobile_number',
        'whatsapp_number',
        'state_id',
        'city_id',
        'pincode',
        'status',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}