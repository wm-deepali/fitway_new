@extends('layouts.app')

@section('title', 'About Us | Fitway')
@section('meta_description', 'Fitway offers professional gym equipment and complete commercial gym setup solutions across India. Learn about our vision, mission and the people behind Fitway.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/sass/about/about.css') }}" />
@endpush

@section('content')

    <section class="banner">
        <div class="bg">
            <video
                autoplay
                muted
                loop
                playsinline
                class="bg-video"
                src="{{ asset('assets/video/banner2.mp4') }}"
                poster="{{ asset('assets/video/poster/banner2.png') }}"
            >
                <source src="{{ asset('assets/video/banner2.mp4') }}" type="video/mp4" />
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
                        <a href="{{ route('about-us') }}" class="active">About Us</a>
                    </li>
                </ul>
            </nav>

            <div class="container">
                <div class="banner-wrapper">
                    <div class="content">
                        <h1>Built for Better Fitness.</h1>

                        <p>
                            From premium gym equipment to complete fitness space
                            solutions, Fitway helps turn every vision into a place built
                            for performance.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-intro">
        <div class="container">
            <div class="about-intro__grid">
                <div class="about-intro__img">
                    <img
                        src="{{ asset('assets/images/home/GymDesign.avif') }}"
                        alt="Fitway Gym Space"
                    />
                    <div class="about-intro__badge">
                        <strong>10+</strong>
                        <span>Years of Experience</span>
                    </div>
                </div>

                <div class="about-intro__content">
                    <div class="heading">
                        <h3>About <span>Fitway</span></h3>
                        <p>Building better spaces for better performance.</p>
                    </div>
                    <p class="about-intro__text">
                        Fitway is your trusted partner for premium fitness equipment and
                        complete gym setup solutions. From selecting the right equipment
                        to designing, planning and installing complete fitness spaces,
                        we help turn every vision into a functional training
                        environment.
                    </p>

                    <span class="about-intro__label">We Serve</span>

                    <ul class="about-intro__list">
                        <li>Home Gyms</li>
                        <li>Commercial Gyms</li>
                        <li>Corporate Fitness Centres</li>
                        <li>Hotels &amp; Resorts</li>
                        <li>Outdoor &amp; Open Gyms</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="about-services">
        <div class="container">
            <div class="heading">
                <h3>What We <span>Do</span></h3>
                <p>
                    Whether you need a single machine or a complete turnkey gym setup,
                    Fitway provides everything required to build a high-performing
                    fitness space.
                </p>
            </div>

            <div class="about-services__grid">
                <div class="about-services__card">
                    <div class="about-services__img">
                        <img
                            src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?q=80&amp;w=1200&amp;auto=format&amp;fit=crop"
                            alt="Premium Gym Equipment"
                        />
                        <span class="about-services__index">01</span>
                    </div>
                    <div class="about-services__content">
                        <h4>Premium Gym Equipment</h4>
                        <p>
                            From cardio and strength machines to functional training and
                            free weights, we provide reliable equipment for every fitness
                            requirement.
                        </p>
                        <a href="{{ route('products') }}" class="about-services__link">
                            Explore Equipment
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M5 12h14M13 6l6 6-6 6"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="about-services__card">
                    <div class="about-services__img">
                        <img
                            src="https://images.unsplash.com/photo-1517836357463-d25dfeac3438?q=80&amp;w=1200&amp;auto=format&amp;fit=crop"
                            alt="Complete Gym Setup"
                        />
                        <span class="about-services__index">02</span>
                    </div>
                    <div class="about-services__content">
                        <h4>Complete Gym Setup</h4>
                        <p>
                            From space planning and equipment selection to installation
                            and final setup, we create complete fitness environments from
                            start to finish.
                        </p>
                        <a href="{{ route('commercial-gym-setup') }}" class="about-services__link">
                            Explore Gym Solutions
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M5 12h14M13 6l6 6-6 6"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-vm">
        <div class="container">
            <div class="heading">
                <h3>Vision &amp; <span>Mission</span></h3>
                <p>Two ideas that guide everything we design, build and deliver.</p>
            </div>

            <div class="about-vm__grid">
                <div class="about-vm__card">
                    <span class="about-vm__icon">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"
                                stroke="currentColor"
                                fill="none"
                                stroke-width="1.8"
                            />
                            <circle
                                cx="12"
                                cy="12"
                                r="3"
                                stroke="currentColor"
                                fill="none"
                                stroke-width="1.8"
                            />
                        </svg>
                    </span>
                    <span class="about-vm__label">Our Vision</span>
                    <h4>
                        To make quality fitness accessible through better spaces and
                        smarter solutions.
                    </h4>
                    <p>
                        We aim to create fitness environments that inspire healthier
                        lifestyles, stronger communities and better performance.
                    </p>
                </div>

                <div class="about-vm__card about-vm__card--primary">
                    <span class="about-vm__icon">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M13 2L3 14h7l-1 8 11-14h-7l1-8z"
                                stroke="currentColor"
                                fill="none"
                                stroke-width="1.8"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </span>
                    <span class="about-vm__label">Our Mission</span>
                    <h4>
                        To deliver complete fitness solutions built around every
                        client's unique needs.
                    </h4>
                    <p>
                        From premium equipment to end-to-end gym setup, we focus on
                        quality, functionality and long-term value.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="about-founder">
        <div class="container">
            <div class="about-founder__grid">
                <div class="about-founder__img">
                    <img
                        src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?q=80&amp;w=1200&amp;auto=format&amp;fit=crop"
                        alt="Founder, Fitway"
                    />
                    <div class="about-founder__quote-badge">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M7 7h5v5c0 2.5-2 4.5-4.5 4.5v-2c1.4 0 2.5-1.1 2.5-2.5H7V7zm9 0h5v5c0 2.5-2 4.5-4.5 4.5v-2c1.4 0 2.5-1.1 2.5-2.5h-3V7z"
                                fill="currentColor"
                            />
                        </svg>
                    </div>
                </div>

                <div class="about-founder__content">
                    <div class="heading heading--left">
                        <h3>The People Behind <span>Fitway</span></h3>
                        <p>Built on experience. Driven by fitness.</p>
                    </div>

                    <p class="about-founder__text">
                        Fitway was built with a simple vision — to make professional
                        fitness solutions easier to access and better suited to every
                        space. With a focus on quality, trust and long-term
                        relationships, we continue to help individuals and businesses
                        create fitness spaces that perform.
                    </p>

                    <blockquote class="about-founder__quote">
                        "Our goal is not just to supply equipment. We want to help
                        people create spaces where fitness becomes a part of everyday
                        life."
                    </blockquote>

                    <div class="about-founder__footer">
                        <div class="about-founder__person">
                            <h5>Founder Name</h5>
                            <span>Founder, Fitway</span>
                        </div>

                        <a href="#" class="btn btn-primary">Meet Our Founder</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-why">
        <div class="container">
            <div class="heading">
                <h3>Why <span>Fitway</span></h3>
                <p>
                    Four reasons businesses and homeowners choose Fitway for their
                    fitness spaces.
                </p>
            </div>

            <div class="about-why__grid">
                <div class="about-why__item">
                    <span class="about-why__num">01</span>
                    <h5>End-to-End Solutions</h5>
                    <p>
                        From planning to installation, we handle the complete process.
                    </p>
                </div>

                <div class="about-why__item">
                    <span class="about-why__num">02</span>
                    <h5>Quality Equipment</h5>
                    <p>
                        Reliable fitness equipment built for performance and durability.
                    </p>
                </div>

                <div class="about-why__item">
                    <span class="about-why__num">03</span>
                    <h5>Expert Guidance</h5>
                    <p>
                        The right recommendations based on your space and requirements.
                    </p>
                </div>

                <div class="about-why__item">
                    <span class="about-why__num">04</span>
                    <h5>Built Around You</h5>
                    <p>
                        Every gym solution is planned according to your goals and
                        budget.
                    </p>
                </div>
            </div>
        </div>
    </section>

@endsection