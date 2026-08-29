<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PortfolioCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'status'];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class, 'cat_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public static function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $slug = Str::slug($name);
        $original = $slug;
        $i = 1;

        while (
            static::where('slug', $slug)
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $original . '-' . $i++;
        }

        return $slug;
    }
}