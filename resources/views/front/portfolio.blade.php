@extends('layouts.app')

@section('title', $pageSeo->seo->meta_title ?? 'Portfolio | Fitway')
@section('meta_description', $pageSeo->seo->meta_description ?? 'Explore the Fitway portfolio of fitness spaces — home gyms, commercial gyms, fitness centres and corporate wellness spaces designed, equipped and delivered by Fitway.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/sass/portfolio/portfolio.css') }}" />
@endpush

@section('content')

    <section class="banner">
        <div class="bg">
            <img src="{{ asset('assets/images/home/portfio.avif') }}" alt="">

            <nav class="breadcrumb left breadcrumb-light" aria-label="Breadcrumb">
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>

                    <li>
                        <span class="breadcrumb-separator">/</span>
                    </li>

                    <li>
                        <a href="{{ route('portfolio') }}" class="active">Portfolio</a>
                    </li>
                </ul>
            </nav>

            <div class="container">
                <div class="banner-wrapper">
                    <div class="content">
                        <h1>{{ $pageSeo->seo->h1 ?? 'Spaces We&rsquo;ve Brought to Life.' }}</h1>

                        <p>
                            Explore our portfolio of fitness spaces, from home gyms to
                            complete commercial facilities, designed, equipped and
                            delivered by Fitway.
                        </p>
                        <div class="btns">
                            <a href="{{ route('products') }}" class="btn btn-gray">Explore Gym Equipment</a>
                            <button type="button" class="btn btn-primary" data-model=".enquire-pop">
                                Get Free Gym Setup Consultation
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="portfolio-secA">
        <div class="container">
            <div class="heading">
                <div class="heading">
                    <h3>Explore Our <span>Featured Projects.</span></h3>
                    <p>
                        Discover our completed gym setups, fitness spaces, equipment
                        installations and successful customer projects.
                    </p>
                </div>
            </div>

            <ul class="tab-nav">
                <li class="active" data-tab="all">All Projects</li>
                <li data-tab="commercial">Commercial Gyms</li>
                <li data-tab="fitness-centers">Fitness Centers</li>
                <li data-tab="customer-stories">Customer Stories</li>
            </ul>

            <div class="tab-nav-content">
                <!-- ALL PROJECTS -->
                <div class="tabs active" data-tab="all">
                    <div class="portfolio-grid">

                        <a href="{{ asset('assets/images/home/portfolio1.webp') }}" data-fancybox="all"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio1.webp') }}"
                                    alt="Complete Strength Training Setup" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Complete Strength Training Setup</h5>
                                    <span>A professionally equipped strength training space built for performance and
                                        everyday workouts.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio2.webp') }}" data-fancybox="all"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio2.webp') }}"
                                    alt="Premium Gym Equipment Setup" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Premium Gym Equipment Setup</h5>
                                    <span>High-quality fitness equipment installed to create a functional and professional
                                        workout environment.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio3.webp') }}" data-fancybox="all"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio3.webp') }}" alt="Modern Fitness Space" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Modern Fitness Space</h5>
                                    <span>A complete gym environment designed with modern equipment for effective
                                        training.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio4.webp') }}" data-fancybox="all"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio4.webp') }}" alt="Advanced Training Zone" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Advanced Training Zone</h5>
                                    <span>Professional-grade equipment selected to support strength, conditioning and
                                        performance training.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio5.webp') }}" data-fancybox="all"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio5.webp') }}"
                                    alt="Complete Commercial Gym" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Complete Commercial Gym</h5>
                                    <span>A fully equipped commercial fitness space designed for durability, performance and
                                        functionality.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio6.webp') }}" data-fancybox="all"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio6.webp') }}"
                                    alt="Strength & Performance Hub" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Strength &amp; Performance Hub</h5>
                                    <span>A dedicated training area equipped with machines for serious strength and fitness
                                        goals.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio8.webp') }}" data-fancybox="all"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio8.webp') }}"
                                    alt="Professional Gym Installation" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Professional Gym Installation</h5>
                                    <span>A complete equipment installation creating a modern and efficient training
                                        environment.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio9.webp') }}" data-fancybox="all"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio9.webp') }}"
                                    alt="Full-Scale Fitness Facility" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Full-Scale Fitness Facility</h5>
                                    <span>A spacious gym setup featuring professional equipment for complete body
                                        training.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio7.webp') }}" data-fancybox="all"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio7.webp') }}" alt="Cardio Training Zone" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Cardio Training Zone</h5>
                                    <span>A dedicated cardio space equipped with modern treadmills for effective endurance
                                        training.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio10.webp') }}" data-fancybox="all"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio10.webp') }}" alt="Modern Cardio Center" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Modern Cardio Center</h5>
                                    <span>A professional cardio setup designed to support comfortable and effective
                                        workouts.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio11.webp') }}" data-fancybox="all"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio11.webp') }}"
                                    alt="Complete Fitness Equipment Setup" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Complete Fitness Equipment Setup</h5>
                                    <span>A well-planned fitness space featuring a range of professional training
                                        equipment.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio12.webp') }}" data-fancybox="all"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio12.webp') }}" alt="Indoor Cycling Studio" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Indoor Cycling Studio</h5>
                                    <span>A specialized cycling setup designed for high-energy cardio and endurance
                                        workouts.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio14.jpg') }}" data-fancybox="all"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio14.jpg') }}"
                                    alt="Happy Customer Delivery" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Happy Customer Delivery</h5>
                                    <span>Successfully delivering premium fitness equipment and creating satisfied customer
                                        experiences.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio15.jpg') }}" data-fancybox="all"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio15.jpg') }}"
                                    alt="Fitness Equipment Delivered" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Fitness Equipment Delivered</h5>
                                    <span>Another successful delivery of quality fitness equipment to a valued
                                        customer.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio16.jpg') }}" data-fancybox="all"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio16.jpg') }}" alt="Premium Cycle Delivery" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Premium Cycle Delivery</h5>
                                    <span>Delivering high-performance fitness solutions to help customers achieve their
                                        fitness goals.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio17.jpg') }}" data-fancybox="all"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio17.jpg') }}"
                                    alt="Trusted Customer Experience" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Trusted Customer Experience</h5>
                                    <span>Delivering quality fitness solutions with reliable service and professional
                                        support.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio18.jpg') }}" data-fancybox="all"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio18.jpg') }}"
                                    alt="Customer Fitness Journey" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Customer Fitness Journey</h5>
                                    <span>Supporting customers with reliable equipment for a stronger and healthier
                                        lifestyle.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio19.jpg') }}" data-fancybox="all"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio19.jpg') }}"
                                    alt="Successful Equipment Delivery" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Successful Equipment Delivery</h5>
                                    <span>A proud moment celebrating another successful Fitway customer delivery.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio20.jpg') }}" data-fancybox="all"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio20.jpg') }}" alt="Fitness Made Personal" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Fitness Made Personal</h5>
                                    <span>Helping customers choose the right equipment for their individual fitness
                                        needs.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio21.jpg') }}" data-fancybox="all"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio21.jpg') }}" alt="Another Happy Customer" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Another Happy Customer</h5>
                                    <span>Quality fitness equipment delivered with trusted service and customer
                                        satisfaction.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio22.jpg') }}" data-fancybox="all"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio22.jpg') }}"
                                    alt="Trusted Fitness Solutions" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Trusted Fitness Solutions</h5>
                                    <span>Providing the right fitness equipment backed by professional guidance and
                                        support.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio23.jpg') }}" data-fancybox="all"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio23.jpg') }}"
                                    alt="Fitway Customer Experience" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Fitway Customer Experience</h5>
                                    <span>Creating lasting customer relationships through quality products and reliable
                                        service.</span>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>

                <!-- COMMERCIAL GYMS -->
                <div class="tabs" data-tab="commercial">
                    <div class="portfolio-grid">

                        <a href="{{ asset('assets/images/home/portfolio1.webp') }}" data-fancybox="commercial"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio1.webp') }}"
                                    alt="Complete Strength Training Setup" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Complete Strength Training Setup</h5>
                                    <span>A professionally equipped strength training space built for performance and
                                        everyday workouts.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio2.webp') }}" data-fancybox="commercial"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio2.webp') }}"
                                    alt="Premium Gym Equipment Setup" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Premium Gym Equipment Setup</h5>
                                    <span>High-quality fitness equipment installed to create a functional and professional
                                        workout environment.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio3.webp') }}" data-fancybox="commercial"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio3.webp') }}" alt="Modern Fitness Space" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Modern Fitness Space</h5>
                                    <span>A complete gym environment designed with modern equipment for effective
                                        training.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio4.webp') }}" data-fancybox="commercial"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio4.webp') }}" alt="Advanced Training Zone" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Advanced Training Zone</h5>
                                    <span>Professional-grade equipment selected to support strength, conditioning and
                                        performance training.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio5.webp') }}" data-fancybox="commercial"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio5.webp') }}"
                                    alt="Complete Commercial Gym" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Complete Commercial Gym</h5>
                                    <span>A fully equipped commercial fitness space designed for durability, performance and
                                        functionality.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio6.webp') }}" data-fancybox="commercial"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio6.webp') }}"
                                    alt="Strength & Performance Hub" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Strength &amp; Performance Hub</h5>
                                    <span>A dedicated training area equipped with machines for serious strength and fitness
                                        goals.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio8.webp') }}" data-fancybox="commercial"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio8.webp') }}"
                                    alt="Professional Gym Installation" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Professional Gym Installation</h5>
                                    <span>A complete equipment installation creating a modern and efficient training
                                        environment.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio9.webp') }}" data-fancybox="commercial"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio9.webp') }}"
                                    alt="Full-Scale Fitness Facility" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Full-Scale Fitness Facility</h5>
                                    <span>A spacious gym setup featuring professional equipment for complete body
                                        training.</span>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>

                <!-- FITNESS CENTERS -->
                <div class="tabs" data-tab="fitness-centers">
                    <div class="portfolio-grid">

                        <a href="{{ asset('assets/images/home/portfolio7.webp') }}" data-fancybox="fitness-centers"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio7.webp') }}" alt="Cardio Training Zone" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Cardio Training Zone</h5>
                                    <span>A dedicated cardio space equipped with modern treadmills for effective endurance
                                        training.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio10.webp') }}" data-fancybox="fitness-centers"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio10.webp') }}" alt="Modern Cardio Center" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Modern Cardio Center</h5>
                                    <span>A professional cardio setup designed to support comfortable and effective
                                        workouts.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio11.webp') }}" data-fancybox="fitness-centers"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio11.webp') }}"
                                    alt="Complete Fitness Equipment Setup" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Complete Fitness Equipment Setup</h5>
                                    <span>A well-planned fitness space featuring a range of professional training
                                        equipment.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio12.webp') }}" data-fancybox="fitness-centers"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio12.webp') }}" alt="Indoor Cycling Studio" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Indoor Cycling Studio</h5>
                                    <span>A specialized cycling setup designed for high-energy cardio and endurance
                                        workouts.</span>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>

                <!-- CUSTOMER STORIES -->
                <div class="tabs" data-tab="customer-stories">
                    <div class="portfolio-grid">

                        <a href="{{ asset('assets/images/home/portfolio14.jpg') }}" data-fancybox="customer-stories"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio14.jpg') }}"
                                    alt="Happy Customer Delivery" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Happy Customer Delivery</h5>
                                    <span>Successfully delivering premium fitness equipment and creating satisfied customer
                                        experiences.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio15.jpg') }}" data-fancybox="customer-stories"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio15.jpg') }}"
                                    alt="Fitness Equipment Delivered" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Fitness Equipment Delivered</h5>
                                    <span>Another successful delivery of quality fitness equipment to a valued
                                        customer.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio16.jpg') }}" data-fancybox="customer-stories"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio16.jpg') }}" alt="Premium Cycle Delivery" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Premium Cycle Delivery</h5>
                                    <span>Delivering high-performance fitness solutions to help customers achieve their
                                        fitness goals.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio17.jpg') }}" data-fancybox="customer-stories"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio17.jpg') }}"
                                    alt="Trusted Customer Experience" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Trusted Customer Experience</h5>
                                    <span>Delivering quality fitness solutions with reliable service and professional
                                        support.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio18.jpg') }}" data-fancybox="customer-stories"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio18.jpg') }}"
                                    alt="Customer Fitness Journey" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Customer Fitness Journey</h5>
                                    <span>Supporting customers with reliable equipment for a stronger and healthier
                                        lifestyle.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio19.jpg') }}" data-fancybox="customer-stories"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio19.jpg') }}"
                                    alt="Successful Equipment Delivery" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Successful Equipment Delivery</h5>
                                    <span>A proud moment celebrating another successful Fitway customer delivery.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio20.jpg') }}" data-fancybox="customer-stories"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio20.jpg') }}" alt="Fitness Made Personal" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Fitness Made Personal</h5>
                                    <span>Helping customers choose the right equipment for their individual fitness
                                        needs.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio21.jpg') }}" data-fancybox="customer-stories"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio21.jpg') }}" alt="Another Happy Customer" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Another Happy Customer</h5>
                                    <span>Quality fitness equipment delivered with trusted service and customer
                                        satisfaction.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio22.jpg') }}" data-fancybox="customer-stories"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio22.jpg') }}"
                                    alt="Trusted Fitness Solutions" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Trusted Fitness Solutions</h5>
                                    <span>Providing the right fitness equipment backed by professional guidance and
                                        support.</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/portfolio23.jpg') }}" data-fancybox="customer-stories"
                            class="portfolio-item">
                            <div class="item-img">
                                <img src="{{ asset('assets/images/home/portfolio23.jpg') }}"
                                    alt="Fitway Customer Experience" />
                            </div>
                            <div class="item-info">
                                <div class="content">
                                    <h5>Fitway Customer Experience</h5>
                                    <span>Creating lasting customer relationships through quality products and reliable
                                        service.</span>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection