@extends('layouts.app')

@section('title', 'Contact Us | Fitway')
@section('meta_description', 'Get in touch with Fitway for gym equipment, complete gym setup and custom fitness solutions. Call, email or visit our showroom.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/sass/contact/contact.css') }}" />
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
                        <a href="{{ route('contact-us') }}" class="active">Contact Us</a>
                    </li>
                </ul>
            </nav>

            <div class="container">
                <div class="banner-wrapper">
                    <div class="content">
                        <h1>Let's Build Your Fitness Space.</h1>

                        <p>
                            Get in touch with our team for equipment, gym setup and custom
                            fitness solutions.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-secB">
        <div class="container">
            <div class="contact-secB__grid">
                <!-- Left: Contact Info -->
                <div class="contact-info">
                    <span class="contact-info__label">Get In Touch</span>
                    <h3>Let's Talk About Your <span>Fitness Space.</span></h3>
                    <p class="contact-info__text">
                        Reach out to us for equipment enquiries, gym setup consultations
                        or any questions — our team responds quickly.
                    </p>

                    <div class="contact-info__list">
                        <div class="contact-info__item">
                            <span class="contact-info__icon">
                                <svg viewBox="0 0 24 24">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </span>
                            <div>
                                <span class="contact-info__title">Call Us</span>
                                <p>9015335461 || 9839570700</p>
                            </div>
                        </div>

                        <div class="contact-info__item">
                            <span class="contact-info__icon">
                                <svg viewBox="0 0 24 24">
                                    <path
                                        d="M4 4h16v16H4z"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    />
                                    <path
                                        d="M4 6l8 7 8-7"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </span>
                            <div>
                                <span class="contact-info__title">Email Us</span>
                                <p>fitwayimpex@gmail.com</p>
                            </div>
                        </div>

                        <div class="contact-info__item">
                            <span class="contact-info__icon">
                                <svg viewBox="0 0 24 24">
                                    <path
                                        d="M21 10c0 6-9 12-9 12s-9-6-9-12a9 9 0 1 1 18 0z"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    />
                                    <circle
                                        cx="12"
                                        cy="10"
                                        r="3"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    />
                                </svg>
                            </span>
                            <div>
                                <span class="contact-info__title">Visit Us</span>
                                <p>D-1373/1, beside Kalevum Sweets, Sector 1, Block D, Indira Nagar, Lucknow, Uttar Pradesh 226016</p>
                            </div>
                        </div>

                        <div class="contact-info__item">
                            <span class="contact-info__icon">
                                <svg viewBox="0 0 24 24">
                                    <circle
                                        cx="12"
                                        cy="12"
                                        r="9"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    />
                                    <path
                                        d="M12 7v5l3 3"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </span>
                            <div>
                                <span class="contact-info__title">Working Hours</span>
                                <p>Monday - Sunday: 07:00 - 22:00</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Contact Form -->
                <div class="contact-form">
                    <form class="contact-form__form" method="POST" action="#">
                        @csrf
                        <div class="contact-form__group">
                            <label for="fullName">Full Name</label>
                            <input
                                type="text"
                                id="fullName"
                                name="fullName"
                                placeholder="Enter your full name"
                                required
                            />
                        </div>

                        <div class="contact-form__row">
                            <div class="contact-form__group">
                                <label for="phoneNumber">Phone Number</label>
                                <input
                                    type="tel"
                                    id="phoneNumber"
                                    name="phoneNumber"
                                    placeholder="Enter your phone number"
                                    required
                                />
                            </div>

                            <div class="contact-form__group">
                                <label for="emailAddress">Email Address</label>
                                <input
                                    type="email"
                                    id="emailAddress"
                                    name="emailAddress"
                                    placeholder="Enter your email address"
                                />
                            </div>
                        </div>

                        <div class="contact-form__group">
                            <span class="contact-form__label">I'm Interested In</span>

                            <div class="contact-form__checkbox-list">
                                <label class="contact-form__checkbox">
                                    <input
                                        type="checkbox"
                                        name="interest[]"
                                        value="Gym Equipment"
                                    />
                                    <span class="contact-form__checkbox-box"></span>
                                    <span class="contact-form__checkbox-label"
                                        >Gym Equipment</span
                                    >
                                </label>

                                <label class="contact-form__checkbox">
                                    <input
                                        type="checkbox"
                                        name="interest[]"
                                        value="Home Gym Setup"
                                    />
                                    <span class="contact-form__checkbox-box"></span>
                                    <span class="contact-form__checkbox-label"
                                        >Home Gym Setup</span
                                    >
                                </label>

                                <label class="contact-form__checkbox">
                                    <input
                                        type="checkbox"
                                        name="interest[]"
                                        value="Commercial Gym Setup"
                                    />
                                    <span class="contact-form__checkbox-box"></span>
                                    <span class="contact-form__checkbox-label"
                                        >Commercial Gym Setup</span
                                    >
                                </label>

                                <label class="contact-form__checkbox">
                                    <input
                                        type="checkbox"
                                        name="interest[]"
                                        value="Corporate Gym Setup"
                                    />
                                    <span class="contact-form__checkbox-box"></span>
                                    <span class="contact-form__checkbox-label"
                                        >Corporate Gym Setup</span
                                    >
                                </label>

                                <label class="contact-form__checkbox">
                                    <input
                                        type="checkbox"
                                        name="interest[]"
                                        value="Outdoor / Open Gym Setup"
                                    />
                                    <span class="contact-form__checkbox-box"></span>
                                    <span class="contact-form__checkbox-label"
                                        >Outdoor / Open Gym Setup</span
                                    >
                                </label>

                                <label class="contact-form__checkbox">
                                    <input
                                        type="checkbox"
                                        name="interest[]"
                                        value="Hotels & Resorts Gym Setup"
                                    />
                                    <span class="contact-form__checkbox-box"></span>
                                    <span class="contact-form__checkbox-label"
                                        >Hotels &amp; Resorts Gym Setup</span
                                    >
                                </label>

                                <label class="contact-form__checkbox">
                                    <input type="checkbox" name="interest[]" value="Other" />
                                    <span class="contact-form__checkbox-box"></span>
                                    <span class="contact-form__checkbox-label">Other</span>
                                </label>
                            </div>
                        </div>

                        <div class="contact-form__group">
                            <label for="message">Message</label>
                            <textarea
                                id="message"
                                name="message"
                                rows="4"
                                placeholder="Tell us more about your requirement..."
                            ></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary contact-form__cta">
                            Submit Enquiry
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-secC">
        <div class="container">
            <div class="heading">
                <h3>How Can <span>We Help?</span></h3>
                <p>
                    Solutions designed around your fitness space and requirements.
                </p>
            </div>

            <div class="contact-secC__grid">
                <div class="contact-secC__card">
                    <span class="contact-secC__icon">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M6.5 6.5l11 11M6.5 17.5l11-11M4 8l4-4M20 16l-4 4"
                                stroke="currentColor"
                                fill="none"
                                stroke-width="1.8"
                                stroke-linecap="round"
                            />
                        </svg>
                    </span>
                    <h4>Gym Equipment</h4>
                    <p>
                        Premium cardio, strength and fitness equipment for every
                        training requirement.
                    </p>
                    <a href="{{ route('products') }}" class="contact-secC__link">
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

                <div class="contact-secC__card">
                    <span class="contact-secC__icon">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M3 21h18M5 21V9l7-6 7 6v12M9 21v-6h6v6"
                                stroke="currentColor"
                                fill="none"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </span>
                    <h4>Complete Gym Setup</h4>
                    <p>
                        From planning and equipment selection to installation and final
                        setup.
                    </p>
                    <a href="{{ route('commercial-gym-setup') }}" class="contact-secC__link">
                        Explore Solutions
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

                <div class="contact-secC__card">
                    <span class="contact-secC__icon">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M12 2l3 6 6 1-4.5 4.5L18 20l-6-3-6 3 1.5-6.5L3 9l6-1 3-6z"
                                stroke="currentColor"
                                fill="none"
                                stroke-width="1.8"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </span>
                    <h4>Custom Requirements</h4>
                    <p>
                        Have a unique space or requirement? Let's create a solution that
                        works for you.
                    </p>
                    <a
                        href="javascript:void(0)"
                        data-model=".enquire-pop"
                        class="contact-secC__link"
                    >
                        Request a Quote
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
    </section>

    <section class="contact-secD">
        <div class="container">
            <div class="heading">
                <h3>From Enquiry <span>to Setup.</span></h3>
                <p>A simple process to turn your fitness vision into reality.</p>
            </div>

            <div class="contact-secD__grid">
                <div class="contact-secD__step">
                    <span class="contact-secD__num">01</span>
                    <h5>Share Your Requirements</h5>
                </div>

                <div class="contact-secD__arrow">
                    <svg viewBox="0 0 24 24">
                        <path
                            d="M5 12h14M13 6l6 6-6 6"
                            stroke="currentColor"
                            fill="none"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </div>

                <div class="contact-secD__step">
                    <span class="contact-secD__num">02</span>
                    <h5>Get Expert Consultation</h5>
                </div>

                <div class="contact-secD__arrow">
                    <svg viewBox="0 0 24 24">
                        <path
                            d="M5 12h14M13 6l6 6-6 6"
                            stroke="currentColor"
                            fill="none"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </div>

                <div class="contact-secD__step">
                    <span class="contact-secD__num">03</span>
                    <h5>Receive Your Custom Solution</h5>
                </div>

                <div class="contact-secD__arrow">
                    <svg viewBox="0 0 24 24">
                        <path
                            d="M5 12h14M13 6l6 6-6 6"
                            stroke="currentColor"
                            fill="none"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </div>

                <div class="contact-secD__step">
                    <span class="contact-secD__num">04</span>
                    <h5>Equipment &amp; Installation</h5>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-secE">
        <div class="container">
            <div class="heading">
                <h3>Visit Our <span>Showroom</span></h3>
                <p>
                    Explore our fitness solutions and connect with our team in person.
                </p>
            </div>

            <div class="contact-secE__map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3558.7289332708324!2d80.99275967504883!3d26.88035197666642!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399be2aec8416977%3A0xa4dd30bab8cd30c7!2sFITWAY%20Gym%20Equipments%20-%20Fitness%20Equipments%20%7C%7C%20Commercial%20Gym%20Setup%20%7C%7C%20FITKING%20%26%20EVOST%20Fitness%20%7C%7C%20Outdoor%20Gym%20Manufacturer!5e0!3m2!1sen!2sin!4v1787637725832!5m2!1sen!2sin"
                    width="600"
                    height="450"
                    style="border: 0"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="strict-origin-when-cross-origin"
                ></iframe>
            </div>
        </div>
    </section>

    <section class="contact-secF">
        <div class="container">
            <div class="contact-secF__box">
                <div class="contact-secF__text">
                    <span class="eyebrow">Start Your Gym Project</span>

                    <h3>Ready to Get Started?</h3>

                    <p>
                        Share your requirements and let's create the right fitness
                        solution for you.
                    </p>

                    <div class="contact-secF__btns">
                        <a
                            href="javascript:void(0)"
                            data-model=".enquire-pop"
                            class="btn btn-white"
                        >
                            Request A Custom Quote
                        </a>

                        <a href="tel:+919839570700" class="btn btn-outline-white">
                            Call Us Now
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="contact-secF__visual">
                    <div class="phone phone--back">
                        <img
                            src="{{ asset('assets/images/home/cta.png') }}"
                            alt="Fitway gym equipment"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection