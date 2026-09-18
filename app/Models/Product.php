<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'source_type',
        'category_id',
        'sub_cat_id',
        'sub_sub_cat_id',
        'vendor_id',
        'brand_id',
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
        'status' => 'boolean',
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

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeCatalog($query)
    {
        return $query->where('source_type', 'catalog');
    }

    public function scopeInternalInventory($query)
    {
        return $query->where('source_type', 'internal_inventory');
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    public function getImageAltAttribute()
    {
        $parts = array_filter([$this->subSubCategory?->name, $this->name]);
        return implode(' - ', $parts) ?: $this->name;
    }

    public function getOgImageUrlAttribute()
    {
        return $this->og_image ? asset('storage/' . $this->og_image) : null;
    }

    /** Generates a unique slug from the name, appending -1, -2, … on collision. */
    public static function generateUniqueSlug(string $name, $ignoreId = null): string
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