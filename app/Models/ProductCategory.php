<?php
// app/Models/ProductCategory.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'slug',
        'short_description',
        'image',
        'banner_type',
        'banner',
        'premium',
        'status',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'h1',
        'og_title',
        'og_description',
        'og_image',
        'canonical_url',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function subCategories()
    {
        return $this->hasMany(ProductSubCategory::class, 'category_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Public URL for the banner image, falls back to the no-image placeholder.
     * Only handles banner_type = 'image'; video banners return null here.
     */
    public function getBannerUrlAttribute(): ?string
    {
        if ($this->banner_type === 'video') {
            return null;
        }

        return $this->banner
            ? asset('storage/' . $this->banner)
            : asset('assets/images/no-image.svg');
    }

    /**
     * Resolved OG image: uses the dedicated og_image if set,
     * otherwise falls back to the category image.
     */
    public function getOgImageUrlAttribute(): ?string
    {
        $path = $this->og_image ?: $this->image;

        return $path ? asset('storage/' . $path) : null;
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