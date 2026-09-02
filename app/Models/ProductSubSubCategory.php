<?php
// app/Models/ProductSubSubCategory.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductSubSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'sub_category_id',
        'name',
        'slug',
        'image',
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

    public function subCategory()
    {
        return $this->belongsTo(ProductSubCategory::class, 'sub_category_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'sub_sub_cat_id');
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

    public function getBannerImageUrlAttribute(): ?string
    {
        return $this->banner_image ? asset('storage/' . $this->banner_image) : null;
    }

    public function getBannerVideoUrlAttribute(): ?string
    {
        return $this->banner_video ? asset('storage/' . $this->banner_video) : null;
    }

    // Falls back to the main image when no dedicated OG image is uploaded
    public function getOgImageUrlAttribute(): string
    {
        return $this->og_image
            ? asset('storage/' . $this->og_image)
            : $this->image_url;
    }

    public static function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $slug = Str::slug($name);
        $original = $slug;
        $i = 1;

        while (
            static::where('slug', $slug)
                ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $original . '-' . $i++;
        }

        return $slug;
    }
};