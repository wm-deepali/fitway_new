<?php
// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'sub_cat_id',
        'sub_sub_cat_id',
        'name',
        'slug',
        'mrp',
        'discount_type',
        'discount_value',
        'offered_price',
        'purchase_price',
        'description',
        'image',
        'status',
        'meta_title',
        'meta_description',
        'h1',
        'og_title',
        'og_description',
        'og_image',
        'canonical_url',
    ];

    protected $casts = [
        'mrp'            => 'decimal:2',
        'discount_value' => 'decimal:2',
        'offered_price'  => 'decimal:2',
        'purchase_price' => 'decimal:2',
        'status'         => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(ProductSubCategory::class, 'sub_cat_id');
    }

    public function subSubCategory()
    {
        return $this->belongsTo(ProductSubSubCategory::class, 'sub_sub_cat_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Public URL for the stored image, falls back to the no-image placeholder.
     */
    public function getImageUrlAttribute(): string
    {
        return $this->image
            ? asset('storage/' . $this->image)
            : asset('assets/images/no-image.svg');
    }

    /**
     * Alt text for the product image: Sub Sub Category + product name.
     */
    public function getImageAltAttribute(): string
    {
        return trim(($this->subSubCategory?->name ?? '') . ' ' . $this->name);
    }

    /**
     * "Commercial Equipment · Cardio" style breadcrumb for the card badge.
     */
    public function getCategoryPathAttribute(): string
    {
        return collect([$this->category?->category_name, $this->subCategory?->name])
            ->filter()
            ->implode(' · ');
    }

    /**
     * Storefront-ready price string. Falls back to "Price on Request"
     * when no offered price has been set.
     */
    public function getDisplayPriceAttribute(): string
    {
        return $this->offered_price !== null
            ? '₹' . number_format((float) $this->offered_price, 2)
            : 'Price on Request';
    }

    /**
     * OG image URL, falls back to the product image when none is set.
     */
    public function getOgImageUrlAttribute(): string
    {
        return $this->og_image
            ? asset('storage/' . $this->og_image)
            : $this->image_url;
    }

    /**
     * Unique slug from the product name, ignoring the current product on update.
     */
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