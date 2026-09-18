<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['name', 'code', 'status'];

    public function cities()
    {
        return $this->hasMany(City::class);
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