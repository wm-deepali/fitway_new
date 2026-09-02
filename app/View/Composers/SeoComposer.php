<?php
// app/View/Composers/SeoComposer.php

namespace App\View\Composers;

use App\Models\Page;
use Illuminate\View\View;

class SeoComposer
{
    /**
     * Blade view name => pages.slug mapping.
     * Slugs match route names in routes/web.php.
     * Naya static page banate hi yahan ek line add kar dena.
     */
    protected array $viewToSlug = [
        'front.home'                 => 'home',
        'front.about-us'             => 'about-us',
        'front.contact-us'           => 'contact-us',
        'front.faqs'                 => 'faqs',
        'front.portfolio'            => 'portfolio',
        'front.blogs'                => 'blogs',
        'front.commercial-gym-setup' => 'commercial-gym-setup',
        'front.home-gym-setup'       => 'home-gym-setup',
        'front.outdoor-gym-setup'    => 'outdoor-gym-setup',
        'front.resorts-gym-setup'    => 'resorts-gym-setup',
        'front.corporate-gym-setup'  => 'corporate-gym-setup',
        'front.products'             => 'products',
    ];

    public function compose(View $view): void
    {
        $slug = $this->viewToSlug[$view->getName()] ?? null;

        $pageSeo = $slug
            ? Page::with('seo')->where('slug', $slug)->first()
            : null;

        $view->with('pageSeo', $pageSeo);
    }
}