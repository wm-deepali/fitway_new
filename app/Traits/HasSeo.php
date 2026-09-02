<?php
// app/Traits/HasSeo.php

namespace App\Traits;

use App\Models\Seo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasSeo
{
    public function seo(): MorphOne
    {
        return $this->morphOne(Seo::class, 'seoable');
    }

    public function generateJsonLd(): array
    {
        return [];
    }
}