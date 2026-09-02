<?php
// app/Models/Blog.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog',
        'content',
        'excerpt',
        'tag',
        'slug',
        'image',
        'date_of_blog',
        'status',
        'meta_title',
        'h1',
        'meta_description',
        'canonical_url',
        'og_title',
        'og_description',
        'og_image',
    ];

    protected $casts = [
        'status' => 'boolean',
        'date_of_blog' => 'date',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public static function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($title);
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

    /** Raw column may be blank — this is what the front-end should render. */
    public function getOgImageUrlAttribute(): ?string
    {
        $path = $this->og_image ?: $this->image;

        return $path ? asset('storage/' . $path) : null;
    }
}