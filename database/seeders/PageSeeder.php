<?php
// database/seeders/PageSeeder.php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            ['name' => 'Home', 'slug' => 'home'],
            ['name' => 'About Us', 'slug' => 'about-us'],
            ['name' => 'Contact Us', 'slug' => 'contact-us'],
            ['name' => 'FAQ', 'slug' => 'faqs'],
            ['name' => 'Our Works (Portfolio)', 'slug' => 'portfolio'],
            ['name' => 'Blogs', 'slug' => 'blogs'],
            ['name' => 'Commercial Gym Setup', 'slug' => 'commercial-gym-setup'],
            ['name' => 'Home Gym Setup', 'slug' => 'home-gym-setup'],
            ['name' => 'Outdoor / Open Gym Setup', 'slug' => 'outdoor-gym-setup'],
            ['name' => 'Hotel & Resort Gym Setup', 'slug' => 'resorts-gym-setup'],
            ['name' => 'Corporate Gym Setup', 'slug' => 'corporate-gym-setup'],
            ['name' => 'All Products', 'slug' => 'products'],
            ['name' => 'Gym Setup Solution', 'slug' => 'gym-setup-solution'],
            ['name' => 'All Categories', 'slug' => 'all-categories'],        ];

        foreach ($pages as $page) {
            Page::updateOrCreate(['slug' => $page['slug']], $page);
        }
    }
}