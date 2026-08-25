<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Client;
use App\Models\GalleryDetail;
use App\Models\OurService;
use App\Models\ProductCategory;
use App\Models\ProductDetail;
use App\Models\Slider;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }
}