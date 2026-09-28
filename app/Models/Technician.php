<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'mobile_number',
        'whatsapp_number',
        'photograph',
        'status',
    ];

    protected $casts = [
        'status' => 'integer',
    ];

    public function getPhotographUrlAttribute(): ?string
    {
        return $this->photograph
            ? asset('storage/technicians/' . $this->photograph)
            : null;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }
}