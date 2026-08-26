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
        'mini_sub_cat_id',
        'name',
        'slug',
        'previous_price',
        'new_price',
        'description',
        'image',
        'status',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];

    protected $casts = [
        'status'         => 'boolean',
        'previous_price' => 'decimal:2',
        'new_price'      => 'decimal:2',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(ProductSubCategory::class, 'sub_cat_id');
    }

    public function miniSubCategory()
    {
        return $this->belongsTo(ProductMiniSubCategory::class, 'mini_sub_cat_id');
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