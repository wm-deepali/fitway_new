@extends('layouts.app')

@section('title', 'Products | Fitway')
@section('meta_description', 'Browse Fitway commercial, home and outdoor gym equipment — treadmills, strength machines, free weights and more, built for daily heavy use.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/sass/products/products.css') }}" />
@endpush

@section('content')

    <section class="banner banner--listing">
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

            <div class="bg-overlay"></div>

            <nav class="breadcrumb left2 breadcrumb-light" aria-label="Breadcrumb">
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        <span class="breadcrumb-separator">/</span>
                    </li>
                    <li>
                        <a href="{{ route('products') }}">Equipment</a>
                    </li>
                    <li>
                        <span class="breadcrumb-separator">/</span>
                    </li>
                    <li>
                        <a href="{{ route('products') }}" class="active">Strength Equipment</a>
                    </li>
                </ul>
            </nav>

            <div class="container">
                <div class="banner-wrapper">
                    <div class="content">
                        <h1>OUR PRODUCTS</h1>
                        <p>
                            Commercial-grade racks, benches, and free weights built for
                            daily heavy use.
                        </p>
                        <span class="count">48 products</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product-secB">
        <div class="container">
            <!-- Section heading -->

            <div class="listing">
                <!-- ============ LEFT: Filters ============ -->
                <aside class="listing-filters">
                    <div class="filter-search">
                        <label for="equipSearch">Search Equipment</label>
                        <div class="filter-search__field">
                            <svg viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="7" />
                                <path d="M21 21l-4.3-4.3" />
                            </svg>
                            <input
                                type="text"
                                id="equipSearch"
                                placeholder="Search treadmill, cross trainer, spin bike..."
                            />
                        </div>
                    </div>

                    <!-- Equipment Categories (nested accordion) -->
                    <div class="filter-group">
                        <h5 class="filter-group__title">Equipment Categories</h5>

                        <div class="cat-accordion">
                            <details class="cat-accordion__item" open>
                                <summary>
                                    <span>Commercial Equipment</span>
                                    <svg viewBox="0 0 24 24"><path d="M6 9l6 6 6-6" /></svg>
                                </summary>

                                <div class="cat-accordion__body">
                                    <div class="sub-group">
                                        <span class="sub-group__label">Cardio</span>
                                        <ul>
                                            <li>
                                                <label
                                                    ><input type="checkbox" /><span
                                                        >Treadmills</span
                                                    ></label
                                                >
                                            </li>
                                            <li>
                                                <label
                                                    ><input type="checkbox" /><span
                                                        >Cross Trainers</span
                                                    ></label
                                                >
                                            </li>
                                            <li>
                                                <label
                                                    ><input type="checkbox" /><span
                                                        >Rowing Machines</span
                                                    ></label
                                                >
                                            </li>
                                            <li>
                                                <label
                                                    ><input type="checkbox" /><span
                                                        >Stair Climbers</span
                                                    ></label
                                                >
                                            </li>
                                            <li>
                                                <label
                                                    ><input type="checkbox" /><span
                                                        >Spin Bikes</span
                                                    ></label
                                                >
                                            </li>
                                            <li>
                                                <label
                                                    ><input type="checkbox" /><span
                                                        >Recumbent Bikes</span
                                                    ></label
                                                >
                                            </li>
                                            <li>
                                                <label
                                                    ><input type="checkbox" /><span
                                                        >Air Bikes</span
                                                    ></label
                                                >
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="sub-group">
                                        <span class="sub-group__label">Strength</span>
                                        <ul>
                                            <li>
                                                <label
                                                    ><input type="checkbox" /><span
                                                        >Multi Gym</span
                                                    ></label
                                                >
                                            </li>
                                            <li>
                                                <label
                                                    ><input type="checkbox" /><span
                                                        >Smith Machines</span
                                                    ></label
                                                >
                                            </li>
                                            <li>
                                                <label
                                                    ><input type="checkbox" /><span
                                                        >Power Racks</span
                                                    ></label
                                                >
                                            </li>
                                            <li>
                                                <label
                                                    ><input type="checkbox" /><span
                                                        >Benches</span
                                                    ></label
                                                >
                                            </li>
                                            <li>
                                                <label
                                                    ><input type="checkbox" /><span
                                                        >Functional Trainers</span
                                                    ></label
                                                >
                                            </li>
                                            <li>
                                                <label
                                                    ><input type="checkbox" /><span
                                                        >Cable Machines</span
                                                    ></label
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </details>

                            <details class="cat-accordion__item">
                                <summary>
                                    <span>Home Equipment</span>
                                    <svg viewBox="0 0 24 24"><path d="M6 9l6 6 6-6" /></svg>
                                </summary>

                                <div class="cat-accordion__body">
                                    <div class="sub-group">
                                        <ul>
                                            <li>
                                                <label
                                                    ><input type="checkbox" /><span
                                                        >Cardio</span
                                                    ></label
                                                >
                                            </li>
                                            <li>
                                                <label
                                                    ><input type="checkbox" /><span
                                                        >Strength</span
                                                    ></label
                                                >
                                            </li>
                                            <li>
                                                <label
                                                    ><input type="checkbox" /><span
                                                        >Benches</span
                                                    ></label
                                                >
                                            </li>
                                            <li>
                                                <label
                                                    ><input type="checkbox" /><span
                                                        >Multi Gym</span
                                                    ></label
                                                >
                                            </li>
                                            <li>
                                                <label
                                                    ><input type="checkbox" /><span
                                                        >Exercise Bikes</span
                                                    ></label
                                                >
                                            </li>
                                            <li>
                                                <label
                                                    ><input type="checkbox" /><span
                                                        >Treadmills</span
                                                    ></label
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </details>

                            <details class="cat-accordion__item">
                                <summary>
                                    <span>Outdoor Equipment</span>
                                    <svg viewBox="0 0 24 24"><path d="M6 9l6 6 6-6" /></svg>
                                </summary>

                                <div class="cat-accordion__body">
                                    <div class="sub-group">
                                        <ul>
                                            <li>
                                                <label
                                                    ><input type="checkbox" /><span
                                                        >Outdoor Gym</span
                                                    ></label
                                                >
                                            </li>
                                            <li>
                                                <label
                                                    ><input type="checkbox" /><span
                                                        >Fitness Stations</span
                                                    ></label
                                                >
                                            </li>
                                            <li>
                                                <label
                                                    ><input type="checkbox" /><span
                                                        >Strength Stations</span
                                                    ></label
                                                >
                                            </li>
                                            <li>
                                                <label
                                                    ><input type="checkbox" /><span
                                                        >Community Fitness Equipment</span
                                                    ></label
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </details>
                        </div>
                    </div>

                    <!-- Equipment Type -->
                    <div class="filter-group">
                        <h5 class="filter-group__title">Equipment Type</h5>
                        <ul class="filter-list">
                            <li>
                                <label><input type="checkbox" /><span>Cardio</span></label>
                            </li>
                            <li>
                                <label
                                    ><input type="checkbox" /><span>Strength</span></label
                                >
                            </li>
                            <li>
                                <label
                                    ><input type="checkbox" /><span
                                        >Functional Training</span
                                    ></label
                                >
                            </li>
                            <li>
                                <label
                                    ><input type="checkbox" /><span>Free Weights</span></label
                                >
                            </li>
                            <li>
                                <label
                                    ><input type="checkbox" /><span
                                        >Outdoor Fitness</span
                                    ></label
                                >
                            </li>
                        </ul>
                    </div>

                    <!-- Application -->
                    <div class="filter-group">
                        <h5 class="filter-group__title">Application</h5>
                        <ul class="filter-list">
                            <li>
                                <label
                                    ><input type="checkbox" /><span
                                        >Commercial Gyms</span
                                    ></label
                                >
                            </li>
                            <li>
                                <label
                                    ><input type="checkbox" /><span
                                        >Hotels &amp; Resorts</span
                                    ></label
                                >
                            </li>
                            <li>
                                <label
                                    ><input type="checkbox" /><span
                                        >Corporate Gyms</span
                                    ></label
                                >
                            </li>
                            <li>
                                <label
                                    ><input type="checkbox" /><span
                                        >Residential Gyms</span
                                    ></label
                                >
                            </li>
                            <li>
                                <label
                                    ><input type="checkbox" /><span
                                        >Schools &amp; Institutions</span
                                    ></label
                                >
                            </li>
                            <li>
                                <label
                                    ><input type="checkbox" /><span
                                        >Outdoor Spaces</span
                                    ></label
                                >
                            </li>
                        </ul>
                    </div>

                    <button type="button" class="filter-clear">
                        Clear all filters
                    </button>
                </aside>

                <!-- ============ RIGHT: Product Grid ============ -->
                <div class="listing-main">
                    <div class="listing-main__top">
                        <div class="listing-main__top-text">
                            <h4>Commercial Equipment</h4>
                            <p>
                                Professional-grade equipment designed for high-performance
                                fitness spaces.
                            </p>
                        </div>

                        <div class="listing-main__top-controls">
                            <span class="result-count">24 Equipment</span>

                            <div class="sort-select">
                                <label>Sort</label>
                                <div class="sort-select__field">
                                    <select>
                                        <option>Recommended</option>
                                        <option>Newest</option>
                                        <option>A–Z</option>
                                        <option>Z–A</option>
                                    </select>
                                    <svg viewBox="0 0 24 24"><path d="M6 9l6 6 6-6" /></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="equip-grid">
                        <div class="equip-card">
                            <a href="{{ route('product-detail') }}" class="equip-card__img">
                                <img
                                    src="{{ asset('assets/images/home/gym1.jpg') }}"
                                    alt="Fitway Commercial Treadmill"
                                />
                            </a>
                            <div class="equip-card__body">
                                <span class="equip-card__cat"
                                    >Commercial Equipment · Cardio</span
                                >
                                <h5>Fitway Commercial Treadmill</h5>
                                <div class="btns">
                                    <button class="btn btn-primary" data-model=".enquire-pop">Enquire Now</button>
                                    <a href="{{ route('product-detail') }}" class="btn btn-gray"
                                        >View Detail</a
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="equip-card">
                            <a href="{{ route('product-detail') }}" class="equip-card__img">
                                <img
                                    src="{{ asset('assets/images/home/gym2.jpg') }}"
                                    alt="Fitway Cross Trainer"
                                />
                            </a>
                            <div class="equip-card__body">
                                <span class="equip-card__cat"
                                    >Commercial Equipment · Cardio</span
                                >
                                <h5>Fitway Cross Trainer</h5>
                                <div class="btns">
                                    <button class="btn btn-primary" data-model=".enquire-pop">Enquire Now</button>
                                    <a href="{{ route('product-detail') }}" class="btn btn-gray"
                                        >View Detail</a
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="equip-card">
                            <a href="{{ route('product-detail') }}" class="equip-card__img">
                                <img
                                    src="{{ asset('assets/images/home/gym3.jpg') }}"
                                    alt="Fitway Spin Bike"
                                />
                            </a>
                            <div class="equip-card__body">
                                <span class="equip-card__cat"
                                    >Commercial Equipment · Cardio</span
                                >
                                <h5>Fitway Spin Bike</h5>
                                <div class="btns">
                                    <button class="btn btn-primary" data-model=".enquire-pop">Enquire Now</button>
                                    <a href="{{ route('product-detail') }}" class="btn btn-gray"
                                        >View Detail</a
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="equip-card">
                            <a href="{{ route('product-detail') }}" class="equip-card__img">
                                <img
                                    src="{{ asset('assets/images/home/gym2.jpg') }}"
                                    alt="Fitway Functional Trainer"
                                />
                            </a>
                            <div class="equip-card__body">
                                <span class="equip-card__cat"
                                    >Commercial Equipment · Strength</span
                                >
                                <h5>Fitway Functional Trainer</h5>
                                <div class="btns">
                                    <button class="btn btn-primary" data-model=".enquire-pop">Enquire Now</button>
                                    <a href="{{ route('product-detail') }}" class="btn btn-gray"
                                        >View Detail</a
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="equip-card">
                            <a href="{{ route('product-detail') }}" class="equip-card__img">
                                <img
                                    src="{{ asset('assets/images/home/gym1.jpg') }}"
                                    alt="Fitway Smith Machine"
                                />
                            </a>
                            <div class="equip-card__body">
                                <span class="equip-card__cat"
                                    >Commercial Equipment · Strength</span
                                >
                                <h5>Fitway Smith Machine</h5>
                                <div class="btns">
                                    <button class="btn btn-primary" data-model=".enquire-pop">Enquire Now</button>
                                    <a href="{{ route('product-detail') }}" class="btn btn-gray"
                                        >View Detail</a
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="equip-card">
                            <a href="{{ route('product-detail') }}" class="equip-card__img">
                                <img
                                    src="{{ asset('assets/images/home/gym3.jpg') }}"
                                    alt="Fitway Rowing Machine"
                                />
                            </a>
                            <div class="equip-card__body">
                                <span class="equip-card__cat"
                                    >Commercial Equipment · Cardio</span
                                >
                                <h5>Fitway Rowing Machine</h5>
                                <div class="btns">
                                    <button class="btn btn-primary" data-model=".enquire-pop">Enquire Now</button>
                                    <a href="{{ route('product-detail') }}" class="btn btn-gray"
                                        >View Detail</a
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="equip-card">
                            <a href="{{ route('product-detail') }}" class="equip-card__img">
                                <img
                                    src="{{ asset('assets/images/home/gym1.jpg') }}"
                                    alt="Fitway Commercial Treadmill"
                                />
                            </a>
                            <div class="equip-card__body">
                                <span class="equip-card__cat"
                                    >Commercial Equipment · Cardio</span
                                >
                                <h5>Fitway Commercial Treadmill</h5>
                                <div class="btns">
                                    <button class="btn btn-primary" data-model=".enquire-pop">Enquire Now</button>
                                    <a href="{{ route('product-detail') }}" class="btn btn-gray"
                                        >View Detail</a
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="equip-card">
                            <a href="{{ route('product-detail') }}" class="equip-card__img">
                                <img
                                    src="{{ asset('assets/images/home/gym2.jpg') }}"
                                    alt="Fitway Cross Trainer"
                                />
                            </a>
                            <div class="equip-card__body">
                                <span class="equip-card__cat"
                                    >Commercial Equipment · Cardio</span
                                >
                                <h5>Fitway Cross Trainer</h5>
                                <div class="btns">
                                    <button class="btn btn-primary" data-model=".enquire-pop">Enquire Now</button>
                                    <a href="{{ route('product-detail') }}" class="btn btn-gray"
                                        >View Detail</a
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="equip-card">
                            <a href="{{ route('product-detail') }}" class="equip-card__img">
                                <img
                                    src="{{ asset('assets/images/home/gym3.jpg') }}"
                                    alt="Fitway Spin Bike"
                                />
                            </a>
                            <div class="equip-card__body">
                                <span class="equip-card__cat"
                                    >Commercial Equipment · Cardio</span
                                >
                                <h5>Fitway Spin Bike</h5>
                                <div class="btns">
                                    <button class="btn btn-primary" data-model=".enquire-pop">Enquire Now</button>
                                    <a href="{{ route('product-detail') }}" class="btn btn-gray"
                                        >View Detail</a
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="equip-card">
                            <a href="{{ route('product-detail') }}" class="equip-card__img">
                                <img
                                    src="{{ asset('assets/images/home/gym2.jpg') }}"
                                    alt="Fitway Functional Trainer"
                                />
                            </a>
                            <div class="equip-card__body">
                                <span class="equip-card__cat"
                                    >Commercial Equipment · Strength</span
                                >
                                <h5>Fitway Functional Trainer</h5>
                                <div class="btns">
                                    <button class="btn btn-primary" data-model=".enquire-pop">Enquire Now</button>
                                    <a href="{{ route('product-detail') }}" class="btn btn-gray"
                                        >View Detail</a
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="equip-card">
                            <a href="{{ route('product-detail') }}" class="equip-card__img">
                                <img
                                    src="{{ asset('assets/images/home/gym1.jpg') }}"
                                    alt="Fitway Smith Machine"
                                />
                            </a>
                            <div class="equip-card__body">
                                <span class="equip-card__cat"
                                    >Commercial Equipment · Strength</span
                                >
                                <h5>Fitway Smith Machine</h5>
                                <div class="btns">
                                    <button class="btn btn-primary" data-model=".enquire-pop">Enquire Now</button>
                                    <a href="{{ route('product-detail') }}" class="btn btn-gray"
                                        >View Detail</a
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="equip-card">
                            <a href="{{ route('product-detail') }}" class="equip-card__img">
                                <img
                                    src="{{ asset('assets/images/home/gym3.jpg') }}"
                                    alt="Fitway Rowing Machine"
                                />
                            </a>
                            <div class="equip-card__body">
                                <span class="equip-card__cat"
                                    >Commercial Equipment · Cardio</span
                                >
                                <h5>Fitway Rowing Machine</h5>
                                <div class="btns">
                                    <button class="btn btn-primary" data-model=".enquire-pop">Enquire Now</button>
                                    <a href="{{ route('product-detail') }}" class="btn btn-gray"
                                        >View Detail</a
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product-secA">
        <div class="container">
            <div class="heading">
                <h3>FITWAY <span>COLLECTION</span></h3>
                <p>Premium equipment built for powerful training spaces.</p>
            </div>

            <div class="swiper-wrap">
                <div class="swiper thirdSilder2">
                    <div class="swiper-wrapper">
                        <!-- Home Gym Setup -->
                        <div class="swiper-slide">
                            <div class="product_card">
                                <div class="img">
                                    <img
                                        src="{{ asset('assets/images/home/gym1.jpg') }}"
                                        alt="Home Gym Setup"
                                    />
                                </div>

                                <div class="content">
                                    <h4>Home Gym Setup</h4>

                                    <p>
                                        Create a personalized workout space at home with the
                                        right equipment, layout and fitness solutions.
                                    </p>

                                    <a
                                        href="{{ route('home-gym-setup') }}"
                                        class="btn btn-primary"
                                    >
                                        Explore Home Gym
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Commercial Gym Setup -->
                        <div class="swiper-slide">
                            <div class="product_card">
                                <div class="img">
                                    <img
                                        src="{{ asset('assets/images/home/gym2.jpg') }}"
                                        alt="Commercial Gym Setup"
                                    />
                                </div>

                                <div class="content">
                                    <h4>Commercial Gym Setup</h4>

                                    <p>
                                        Complete professional gym solutions with durable
                                        equipment, smart planning and expert installation for
                                        high-performance spaces.
                                    </p>

                                    <a
                                        href="{{ route('commercial-gym-setup') }}"
                                        class="btn btn-primary"
                                    >
                                        Explore Commercial
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Corporate Gym Setup -->
                        <div class="swiper-slide">
                            <div class="product_card">
                                <div class="img">
                                    <img
                                        src="{{ asset('assets/images/home/gym3.jpg') }}"
                                        alt="Corporate Gym Setup"
                                    />
                                </div>

                                <div class="content">
                                    <h4>Corporate Gym Setup</h4>

                                    <p>
                                        Build healthier workplaces with modern fitness spaces
                                        designed to support employee wellness and daily
                                        training.
                                    </p>

                                    <a
                                        href="{{ route('corporate-gym-setup') }}"
                                        class="btn btn-primary"
                                    >
                                        Explore Corporate
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Outdoor / Open Gym Setup -->
                        <div class="swiper-slide">
                            <div class="product_card">
                                <div class="img">
                                    <img
                                        src="{{ asset('assets/images/home/gym1.jpg') }}"
                                        alt="Outdoor Open Gym Setup"
                                    />
                                </div>

                                <div class="content">
                                    <h4>Outdoor / Open Gym Setup</h4>

                                    <p>
                                        Durable outdoor fitness solutions for parks,
                                        communities, societies and open workout spaces.
                                    </p>

                                    <a
                                        href="{{ route('outdoor-gym-setup') }}"
                                        class="btn btn-primary"
                                    >
                                        Explore Outdoor
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Hotels & Resorts Gym Setup -->
                        <div class="swiper-slide">
                            <div class="product_card">
                                <div class="img">
                                    <img
                                        src="{{ asset('assets/images/home/gym2.jpg') }}"
                                        alt="Hotels and Resorts Gym Setup"
                                    />
                                </div>

                                <div class="content">
                                    <h4>Hotels & Resorts Gym Setup</h4>

                                    <p>
                                        Premium fitness spaces designed to enhance guest
                                        experiences with professional equipment and thoughtful
                                        layouts.
                                    </p>

                                    <a
                                        href="{{ route('resorts-gym-setup') }}"
                                        class="btn btn-primary"
                                    >
                                        Explore Hospitality
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation -->
                <div class="swiper-group">
                    <button
                        type="button"
                        class="thirdSilder2-prev btn-prev"
                        aria-label="Previous Slide"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                            <path
                                fill="currentColor"
                                d="M609.408 149.376L277.76 489.6a32 32 0 0 0 0 44.672l331.648 340.352a29.12 29.12 0 0 0 41.728 0a30.59 30.59 0 0 0 0-42.752L339.264 511.936l311.872-319.872a30.59 30.59 0 0 0 0-42.688a29.12 29.12 0 0 0-41.728 0"
                            />
                        </svg>
                    </button>

                    <button
                        type="button"
                        class="thirdSilder2-next btn-next"
                        aria-label="Next Slide"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                            <path
                                fill="currentColor"
                                d="M414.592 149.376L746.24 489.6a32 32 0 0 1 0 44.672L414.592 874.624a29.12 29.12 0 0 1-41.728 0a30.59 30.59 0 0 1 0-42.752l311.872-319.936L372.864 192a30.59 30.59 0 0 1 0-42.688a29.12 29.12 0 0 1 41.728 0"
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
        new Swiper(".thirdSilder2", {
            navigation: {
                nextEl: ".thirdSilder2-next",
                prevEl: ".thirdSilder2-prev",
            },
            loop: true,
            speed: 1000,
            breakpoints: {
                0: {
                    slidesPerView: 1.2,
                    spaceBetween: 20,
                },
                640: {
                    slidesPerView: 1.2,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 2.2,
                    spaceBetween: 20,
                },
                991: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1280: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
            },
        });
    </script>
@endpush