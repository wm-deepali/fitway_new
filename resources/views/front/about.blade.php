@extends('layouts.app')

@section('title', 'About Us | Fitway')
@section('meta_description', 'Fitway offers professional gym equipment and complete commercial gym setup solutions across India. Learn about our vision, mission and the people behind Fitway.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/sass/about/about.css') }}" />
@endpush

@section('content')

    <section class="banner">
        <div class="bg">
           

            <img src="{{ asset('assets/images/home/about-banner.jpg') }}"/>

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
                    src="{{ asset('assets/images/home/about-sec.jpg') }}"
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
                    <p>Gym equipment and setups that actually get used.</p>
                </div>
                <p class="about-intro__text">
                    We've fitted out everything from single-room home gyms to
                    full commercial floors — strength racks, cardio lines,
                    functional training rigs, flooring, mirrors, the works.
                    Ten-plus years of sourcing, installing and servicing
                    equipment means we know what holds up under daily use and
                    what doesn't. You tell us the space and the goal, we
                    handle the equipment list, layout and install.
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
                Buying one treadmill or fitting out an entire floor — either
                way, we handle sourcing, delivery and setup.
            </p>
        </div>

        <div class="about-services__grid">
            <div class="about-services__card">
                <div class="about-services__img">
                    <img
                        src="{{ asset('assets/images/home/commercil-gym.jpg') }}"
                        alt="Premium Gym Equipment"
                    />
                    <span class="about-services__index">01</span>
                </div>
                <div class="about-services__content">
                    <h4>Gym Equipment Supply</h4>
                    <p>
                        Treadmills, cross trainers, power racks, plate-loaded
                        machines, dumbbells, kettlebells and functional
                        training gear — sourced from brands built for
                        commercial-grade daily use, not just showroom looks.
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
                        src="{{ asset('assets/images/home/Complete.jpg') }}"
                        alt="Complete Gym Setup"
                    />
                    <span class="about-services__index">02</span>
                </div>
                <div class="about-services__content">
                    <h4>Full Gym Setup</h4>
                    <p>
                        Site visit, floor plan, equipment zoning, flooring
                        and mirror installation, right through to the final
                        walkthrough — one team, one timeline, no juggling
                        multiple vendors.
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
            <p>What drives how we pick equipment and plan every setup.</p>
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
                    Good equipment shouldn't be reserved for big-budget
                    commercial chains.
                </h4>
                <p>
                    Whether it's a single home gym or a multi-branch
                    facility, everyone deserves equipment that's built to
                    last and set up properly from day one.
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
                    Fewer vendors, fewer delays, and equipment that matches
                    what the space actually needs.
                </h4>
                <p>
                    We plan around your budget, footprint and member volume
                    — not just what's easiest to sell — so the setup holds
                    up years after installation.
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
                    src="{{ asset('assets/images/home/founder.png') }}"
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
                    <p>Started small, learned the hard way, built from there.</p>
                </div>

                <p class="about-founder__text">
                    Fitway started with a handful of home gym installs and
                    grew into full commercial fit-outs the same way most
                    good businesses do — one referral at a time. What hasn't
                    changed is the approach: recommend what the space needs,
                    not what's easiest to sell, and stand behind the
                    equipment after it's installed.
                </p>

                <blockquote class="about-founder__quote">
                    "Most gym setups fail because nobody planned for how the
                    space would actually get used. We start there, then
                    figure out the equipment."
                </blockquote>

                <div class="about-founder__footer">
                    <div class="about-founder__person">
                        <h5>Founder Name</h5>
                        <span>Rajiv Arora (Shunty)</span>
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
                What clients tell us matters most once the equipment is
                actually in use.
            </p>
        </div>

        <div class="about-why__grid">
            <div class="about-why__item">
                <span class="about-why__num">01</span>
                <h5>One Team, Start to Finish</h5>
                <p>
                    Same team for equipment selection, delivery and
                    installation — no handoffs, no gaps in accountability.
                </p>
            </div>

            <div class="about-why__item">
                <span class="about-why__num">02</span>
                <h5>Equipment That Holds Up</h5>
                <p>
                    Sourced for daily commercial use, not just to look good
                    on day one.
                </p>
            </div>

            <div class="about-why__item">
                <span class="about-why__num">03</span>
                <h5>Straight Recommendations</h5>
                <p>
                    We'll tell you if a machine isn't worth it for your
                    space — even if it costs us the sale.
                </p>
            </div>

            <div class="about-why__item">
                <span class="about-why__num">04</span>
                <h5>Setups Built for Your Budget</h5>
                <p>
                    Phased rollouts, tiered equipment options — whatever
                    fits how you actually want to spend.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection