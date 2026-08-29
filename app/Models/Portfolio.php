<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = ['cat_id', 'name', 'subtitle', 'description', 'image', 'video', 'status'];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(PortfolioCategory::class, 'cat_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function getImageUrlAttribute(): string
    {
        return $this->image
            ? asset('portfolio/' . $this->image)
            : asset('assets/images/no-image.svg');
    }

    public function getVideoUrlAttribute(): ?string
    {
        return $this->video ? asset('portfolio/' . $this->video) : null;
    }
    
}