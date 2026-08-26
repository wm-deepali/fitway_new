<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\ContactUs;
use App\Models\Inquiry;
use App\Models\SetupMyGym;
use App\Models\ProductEnquiry;
use App\Models\Newsletter;
use App\Models\Feedback;

class DashboardController extends Controller
{
    public function index()
    {
        $counts = [
            'products'      => Product::count(),
            'categories'    => ProductCategory::count(),
            'subcategories' => ProductSubCategory::count(),
            'sliders'       => Slider::count(),
            'testimonials'  => Testimonial::count(),
            'contacts'      => ContactUs::count(),
            'inquiries'     => Inquiry::count(),
            'setupMyGym'    => SetupMyGym::count(),
            'productEnq'    => ProductEnquiry::count(),
            'newsletter'    => Newsletter::count(),
            'feedbacks'     => Feedback::count(),
        ];

        // Adjust 'products' below to match your actual
        // ProductCategory -> Product relationship name.
        $categoryDistribution = ProductCategory::withCount('products')
            ->orderByDesc('products_count')
            ->take(6)
            ->get(['id', 'name']);

        $latestLeads = ContactUs::latest()->take(5)->get();

        return view('admin.dashboard.index', compact(
            'counts',
            'categoryDistribution',
            'latestLeads'
        ));
    }
}