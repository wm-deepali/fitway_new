<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'customer_name',
        'business_name',
        'email',
        'mobile_number',
        'address',
        'state_id',
        'city_id',
        'pincode',
        'gst_number',
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

    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }
}