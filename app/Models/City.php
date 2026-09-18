<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['state_id', 'name', 'status'];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function vendors()
    {
        return $this->hasMany(Vendor::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}