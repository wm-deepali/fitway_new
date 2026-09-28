<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplaintImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'complaint_id',
        'image',
    ];

    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }

    public function getImageUrlAttribute(): string
    {
        return asset('storage/complaints/' . $this->image);
    }
}