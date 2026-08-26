@extends('layouts.app')

@section('title', 'Blog Detail | Fitway')
@section('meta_description', 'A complete guide to planning a functional, efficient and high-performing commercial fitness space.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/sass/blog-detail/blog-detail.css') }}" />
@endpush

@section('content')

    <!-- Blog Banner -->
    <section class="blog-banner">
        <div class="bg">
            <video
                autoplay=""
                muted=""
                loop=""
                playsinline=""
                src="{{ asset('assets/video/banner3.mp4') }}"
                poster="{{ asset('assets/video/poster/banner.png') }}"
            >
                <source src="{{ asset('assets/video/banner3.mp4') }}" type="video/mp4" />
            </video>

            <nav class="breadcrumb left breadcrumb-light" aria-label="Breadcrumb">
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>

                    <li>
                        <span class="breadcrumb-separator">/</span>
                    </li>
                    <li>
                        <a href="{{ route('blogs') }}">Blogs</a>
                    </li>

                    <li>
                        <span class="breadcrumb-separator">/</span>
                    </li>

                    <li>
                        <a href="{{ route('blog-details') }}" class="active">How to Plan the Perfect Commercial Gym</a>
                    </li>
                </ul>
            </nav>

            <div class="container">
                <div class="bg-wrapper">
                    <div class="heading">
                        <div class="left-content">

                            <h1>How to Plan the Perfect Commercial Gym</h1>

                            <p>
                                A complete guide to planning a functional, efficient and
                                high-performing commercial fitness space.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Details -->
    <section class="blog-dtl-secA">
        <div class="container">
            <div class="para-parent">
                <p>
                    Setting up a commercial gym requires more than simply choosing
                    fitness equipment. A successful gym should offer the right balance
                    of space planning, equipment selection, functionality and user
                    experience.
                </p>

                <p>
                    Whether you are starting a new fitness centre or upgrading an
                    existing facility, proper planning can help create a space that
                    performs better for both members and operators.
                </p>

                <h3>1. Start with Smart Space Planning</h3>

                <p>
                    The first step in building a commercial gym is understanding how
                    your available space will be used. Different training zones should
                    be planned carefully to create a smooth and comfortable workout
                    experience.
                </p>

                <ul>
                    <li>Reception and entry area</li>
                    <li>Cardio training zone</li>
                    <li>Strength training area</li>
                    <li>Free weight section</li>
                    <li>Functional training space</li>
                    <li>Changing and support areas</li>
                </ul>

                <h3>2. Choose the Right Equipment</h3>

                <p>
                    Equipment selection should depend on your target audience,
                    available space and training requirements. A well-balanced gym
                    provides options for cardio, strength, functional training and
                    general fitness.
                </p>

                <p>
                    Investing in durable and reliable commercial equipment helps
                    ensure consistent performance and a better experience for gym
                    members.
                </p>

                <h3>3. Create Clear Training Zones</h3>

                <p>
                    Organising equipment into dedicated training zones improves
                    movement throughout the gym and makes the space easier to use.
                </p>

                <ul>
                    <li>Cardio Zone</li>
                    <li>Strength Zone</li>
                    <li>Free Weight Zone</li>
                    <li>Functional Training Zone</li>
                    <li>Stretching and Recovery Zone</li>
                </ul>

                <h3>4. Focus on Safety and Comfort</h3>

                <p>
                    Proper spacing between machines, safe flooring and good
                    ventilation are essential parts of a professional gym setup. The
                    environment should allow members to train comfortably while
                    maintaining a safe distance between equipment.
                </p>

                <h3>5. Plan for Long-Term Growth</h3>

                <p>
                    A gym should be designed with the future in mind. Flexible layouts
                    and scalable equipment solutions can make it easier to expand or
                    upgrade the space as your business grows.
                </p>

                <h3>Build Your Gym with Fitway</h3>

                <p>
                    At Fitway, we provide premium fitness equipment and complete gym
                    setup solutions. From initial planning and equipment selection to
                    installation and final setup, we help create fitness spaces built
                    around your requirements.
                </p>
            </div>
        </div>
    </section>

    <!-- More Blogs -->
    <section class="more-blogs">
        <div class="container">
            <div class="heading">
                <h3>MORE <span>BLOGS</span></h3>
                <p>Explore more insights, ideas and expert tips for better fitness spaces.</p>
            </div>

            <div class="swiper-wrap">
                <div class="swiper more-blogs-slider">
                    <div class="swiper-wrapper">
                        <!-- Blog 1 -->
                        <div class="swiper-slide">
                            <a class="blog-card" href="{{ route('blog-details') }}">
                                <div class="card-image">
                                    <img
                                        src="{{ asset('assets/images/home/gym2.jpg') }}"
                                        alt="Home Gym Equipment"
                                    />
                                    <span class="tag">Home Fitness</span>
                                </div>

                                <div class="card-content">
                                    <span class="date">Equipment Guide</span>
                                    <h4>Essential Equipment for Your Home Gym</h4>
                                    <p>
                                        Discover the essential equipment you need to build an
                                        effective and space-efficient home gym.
                                    </p>
                                    <span class="btn btn-primary">Read More</span>
                                </div>
                            </a>
                        </div>

                        <!-- Blog 2 -->
                        <div class="swiper-slide">
                            <a class="blog-card" href="{{ route('blog-details') }}">
                                <div class="card-image">
                                    <img src="{{ asset('assets/images/home/gym3.jpg') }}" alt="Gym Layout" />
                                    <span class="tag">Gym Design</span>
                                </div>

                                <div class="card-content">
                                    <span class="date">Layout Guide</span>
                                    <h4>Smart Gym Layout Ideas for Better Training</h4>
                                    <p>
                                        Learn how proper space planning can improve workout
                                        flow, safety and the overall gym experience.
                                    </p>
                                    <span class="btn btn-primary">Read More</span>
                                </div>
                            </a>
                        </div>

                        <!-- Blog 3 -->
                        <div class="swiper-slide">
                            <a class="blog-card" href="{{ route('blog-details') }}">
                                <div class="card-image">
                                    <img
                                        src="{{ asset('assets/images/home/gym1.jpg') }}"
                                        alt="Corporate Gym"
                                    />
                                    <span class="tag">Corporate Fitness</span>
                                </div>

                                <div class="card-content">
                                    <span class="date">Fitness Spaces</span>
                                    <h4>Why Every Workplace Needs a Fitness Space</h4>
                                    <p>
                                        Explore how workplace fitness spaces can support
                                        employee wellness, productivity and healthier routines.
                                    </p>
                                    <span class="btn btn-primary">Read More</span>
                                </div>
                            </a>
                        </div>

                        <!-- Blog 4 -->
                        <div class="swiper-slide">
                            <a class="blog-card" href="{{ route('blog-details') }}">
                                <div class="card-image">
                                    <img
                                        src="{{ asset('assets/images/home/gym2.jpg') }}"
                                        alt="Outdoor Gym Setup"
                                    />
                                    <span class="tag">Outdoor Fitness</span>
                                </div>

                                <div class="card-content">
                                    <span class="date">Setup Guide</span>
                                    <h4>How to Create a Functional Outdoor Gym</h4>
                                    <p>
                                        Important factors to consider when planning an outdoor
                                        or open fitness space.
                                    </p>
                                    <span class="btn btn-primary">Read More</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="swiper-group">
                    <button type="button" class="more-blogs-prev btn-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                            <path
                                fill="currentColor"
                                d="M609.408 149.376L277.76 489.6a32 32 0 0 0 0 44.672l331.648 340.352a29.12 29.12 0 0 0 41.728 0a30.59 30.59 0 0 0 0-42.752L339.264 511.936l311.872-319.872a30.59 30.59 0 0 0 0-42.688a29.12 29.12 0 0 0-41.728 0"
                            />
                        </svg>
                    </button>
                    <button type="button" class="more-blogs-next btn-next">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                            <path
                                fill="currentColor"
                                d="M609.408 149.376L277.76 489.6a32 32 0 0 0 0 44.672l331.648 340.352a29.12 29.12 0 0 0 41.728 0a30.59 30.59 0 0 0 0-42.752L339.264 511.936l311.872-319.872a30.59 30.59 0 0 0 0-42.688a29.12 29.12 0 0 0-41.728 0"
                            />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        new Swiper(".more-blogs-slider", {
            slidesPerView: 3,
            spaceBetween: 30,
            navigation: {
                nextEl: ".more-blogs-next",
                prevEl: ".more-blogs-prev",
            },
            breakpoints: {
                0: { slidesPerView: 1, spaceBetween: 20 },
                768: { slidesPerView: 2, spaceBetween: 24 },
                1200: { slidesPerView: 3, spaceBetween: 30 },
            },
        });
    </script>
@endpush