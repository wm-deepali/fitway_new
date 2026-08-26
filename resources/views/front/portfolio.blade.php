@extends('layouts.app')

@section('title', 'Portfolio | Fitway')
@section('meta_description', 'Explore the Fitway portfolio of fitness spaces — home gyms, commercial gyms, fitness centres and corporate wellness spaces designed, equipped and delivered by Fitway.')

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
                        <h1>Spaces We&rsquo;ve Brought to Life.</h1>

                        <p>
                            Explore our portfolio of fitness spaces, from home gyms to
                            complete commercial facilities, designed, equipped and
                            delivered by Fitway.
                        </p>
                        <div class="btns">
                            <a href="{{ route('products') }}" class="btn btn-gray"
                                >Explore Gym Equipment</a
                            >
                            <button
                                type="button"
                                class="btn btn-primary"
                                data-model=".enquire-pop"
                            >
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
                        Discover a selection of fitness spaces designed, equipped and
                        delivered by Fitway for different training needs and
                        environments.
                    </p>
                </div>
            </div>

            <ul class="tab-nav">
                <li class="active" data-tab="all">All Projects</li>
                <li data-tab="commercial">Commercial Gyms</li>
                <li data-tab="fitness-centers">Fitness Centers</li>
                <li data-tab="corporate">Corporate Spaces</li>
                <li data-tab="private">Private Gyms</li>
            </ul>

            <div class="tab-nav-content">
                <!-- ALL PROJECTS -->
                <div class="tabs active" data-tab="all">
                    <div class="portfolio-grid">
                        <a href="{{ asset('assets/images/home/gym1.jpg') }}" data-fancybox="all" class="portfolio-item">
                            <div class="item-img">
                                <img
                                    src="{{ asset('assets/images/home/gym1.jpg') }}"
                                    alt="Commercial gym project by Fitway"
                                />
                            </div>

                            <div class="item-info">
                                <div class="content">
                                    <h5>Complete Commercial Gym</h5>
                                    <span>Planning, Equipment &amp; Installation</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/gym2.jpg') }}" data-fancybox="all" class="portfolio-item">
                            <div class="item-img">
                                <img
                                    src="{{ asset('assets/images/home/gym2.jpg') }}"
                                    alt="Modern fitness centre project by Fitway"
                                />
                            </div>

                            <div class="item-info">
                                <div class="content">
                                    <h5>Modern Fitness Centre</h5>
                                    <span>Equipment Supply &amp; Complete Setup</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/gym3.jpg') }}" data-fancybox="all" class="portfolio-item">
                            <div class="item-img">
                                <img
                                    src="{{ asset('assets/images/home/gym3.jpg') }}"
                                    alt="Corporate fitness space by Fitway"
                                />
                            </div>

                            <div class="item-info">
                                <div class="content">
                                    <h5>Corporate Wellness Space</h5>
                                    <span>Workplace Gym Solution</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/gym1.jpg') }}" data-fancybox="all" class="portfolio-item">
                            <div class="item-img">
                                <img
                                    src="{{ asset('assets/images/home/gym1.jpg') }}"
                                    alt="Private training studio by Fitway"
                                />
                            </div>

                            <div class="item-info">
                                <div class="content">
                                    <h5>Private Training Studio</h5>
                                    <span>Custom Equipment &amp; Space Setup</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/gym2.jpg') }}" data-fancybox="all" class="portfolio-item">
                            <div class="item-img">
                                <img
                                    src="{{ asset('assets/images/home/gym2.jpg') }}"
                                    alt="Premium strength training gym by Fitway"
                                />
                            </div>

                            <div class="item-info">
                                <div class="content">
                                    <h5>Premium Strength Studio</h5>
                                    <span>Strength Equipment &amp; Gym Design</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('assets/images/home/gym3.jpg') }}" data-fancybox="all" class="portfolio-item">
                            <div class="item-img">
                                <img
                                    src="{{ asset('assets/images/home/gym3.jpg') }}"
                                    alt="Complete fitness space project by Fitway"
                                />
                            </div>

                            <div class="item-info">
                                <div class="content">
                                    <h5>Complete Fitness Space</h5>
                                    <span>End-to-End Gym Setup Solution</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- COMMERCIAL -->
                <div class="tabs" data-tab="commercial">
                    <div class="portfolio-grid">
                        <a href="{{ asset('assets/images/home/gym1.jpg') }}" data-fancybox="commercial" class="portfolio-item">
                            <div class="item-img">
                                <img
                                    src="{{ asset('assets/images/home/gym1.jpg') }}"
                                    alt="Commercial gym setup project"
                                />
                            </div>

                            <div class="item-info">
                                <div class="content">
                                    <h5>Complete Commercial Gym</h5>
                                    <span>End-to-End Fitness Facility Setup</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- FITNESS CENTERS -->
                <div class="tabs" data-tab="fitness-centers">
                    <div class="portfolio-grid">
                        <a href="{{ asset('assets/images/home/gym2.jpg') }}" data-fancybox="fitness-centers" class="portfolio-item">
                            <div class="item-img">
                                <img
                                    src="{{ asset('assets/images/home/gym2.jpg') }}"
                                    alt="Fitness centre equipment installation"
                                />
                            </div>

                            <div class="item-info">
                                <div class="content">
                                    <h5>Performance Fitness Centre</h5>
                                    <span>Equipment Planning &amp; Installation</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- CORPORATE -->
                <div class="tabs" data-tab="corporate">
                    <div class="portfolio-grid">
                        <a href="{{ asset('assets/images/home/gym3.jpg') }}" data-fancybox="corporate" class="portfolio-item">
                            <div class="item-img">
                                <img
                                    src="{{ asset('assets/images/home/gym3.jpg') }}"
                                    alt="Corporate employee wellness gym"
                                />
                            </div>

                            <div class="item-info">
                                <div class="content">
                                    <h5>Corporate Wellness Gym</h5>
                                    <span>Employee Fitness &amp; Wellness Solution</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- PRIVATE -->
                <div class="tabs" data-tab="private">
                    <div class="portfolio-grid">
                        <div class="portfolio-item">
                            <div class="item-img">
                                <img
                                    src="{{ asset('assets/images/home/gym1.jpg') }}"
                                    alt="Private personalised gym project"
                                />
                            </div>

                            <div class="item-info">
                                <div class="content">
                                    <h5>Personal Training Space</h5>
                                    <span>Custom Home &amp; Private Gym Setup</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection