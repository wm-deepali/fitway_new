<?php

namespace App\Http\Controllers;


class FrontController extends Controller
{
    public function home()
    {
        return view('front.index');
    }

    public function aboutUs()
    {
        return view('front.about');
    }

    public function blogs()
    {
        return view('front.blogs');
    }

    public function faqs()
    {
        return view('front.faqs');
    }

    public function contactUs()
    {
        return view('front.contact');
    }

    public function products()
    {
        return view('front.products');
    }

    public function cart()
    {
        return view('front.cart');
    }

    public function thankYou()
    {
        return view('front.thanks');
    }

    public function portfolio()
    {
        return view('front.portfolio');
    }

    public function productDetail()
    {
        return view('front.product-detail');
    }

    public function blogDetail()
    {
        return view('front.blog-details');
    }

    public function commercialGymSetup()
    {
        return view('front.commercial-gym-setup');
    }

    public function homeGymSetup()
    {
        return view('front.home-gym-setup');
    }

    public function corporateGymSetup()
    {
        return view('front.corporate-gym-setup');
    }

    public function outdoorGymSetup()
    {
        return view('front.outdoor-gym-setup');
    }

    public function resortsGymSetup()
    {
        return view('front.resorts-gym-setup');
    }
}