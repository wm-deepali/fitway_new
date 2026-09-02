<?php
// app/Models/Seo.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Seo extends Model
{
    protected $table = 'seo_settings';

    protected $fillable = [
        'h1', 'meta_title', 'meta_description',
        'og_title', 'og_description', 'og_image',
        'twitter_card_type', 'twitter_title', 'twitter_description', 'twitter_image',
        'json_ld_override',
    ];

    public function seoable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * OG image ka final URL — manual override > entity ki apni image (via seo_image_url accessor) > placeholder.
     */
    public function getResolvedOgImageAttribute(): ?string
    {
        if ($this->og_image) {
            return asset('storage/' . $this->og_image);
        }

        // Har seoable model apna 'seo_image_url' accessor define karega (getSeoImageUrlAttribute)
        return $this->seoable?->seo_image_url
            ?? asset('images/default-og-image.jpg');
    }

    public function getResolvedTwitterImageAttribute(): ?string
    {
        return $this->twitter_image
            ? asset('storage/' . $this->twitter_image)
            : $this->resolved_og_image;
    }
}