<?php
// app/Models/ProductSubCategory.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'short_description',
        'image',
        'banner_type',
        'banner',
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

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function subSubCategories()
    {
        return $this->hasMany(ProductSubSubCategory::class, 'sub_category_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'sub_cat_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function getImageUrlAttribute(): string
    {
        return $this->image
            ? asset('storage/' . $this->image)
            : asset('assets/images/no-image.svg');
    }

    /**
     * Resolved OG image: uses the dedicated og_image if set,
     * otherwise falls back to the sub category image.
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