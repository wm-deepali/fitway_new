@extends('layouts.app')

@section('title', 'Faqs | Fitway')
@section('meta_description', 'Find answers to common questions about Fitway gym equipment, fitness solutions and complete gym setup services.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/sass/faqs/faqs.css') }}" />
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
                        <a href="{{ route('faqs') }}" class="active">FAQs</a>
                    </li>
                </ul>
            </nav>

            <div class="container">
                <div class="banner-wrapper">
                    <div class="content">
                        <h1>Frequently Asked Questions.</h1>

                        <p>
                            Find answers to common questions about our gym equipment,
                            fitness solutions and complete gym setup services.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="faq-secA">
        <div class="container">
            <div class="heading">
                <span class="label">Need Help?</span>
                <h3>Everything You <span>Need to Know.</span></h3>
                <p>
                    From choosing the right equipment to planning a complete fitness
                    space, find answers to the questions we hear most often.
                </p>
            </div>
        </div>
    </section>

    <section class="faq-secB">
        <div class="container">
            <!-- General Questions -->
            <div class="faq-group">
                <h5 class="faq-group__title">General Questions</h5>

                <div class="accordion-wrapper">
                    <div class="accordion-item active">
                        <div class="accordion-header">
                            <h4>What products and services does Fitway offer?</h4>
                            <span class="accordion-icon">−</span>
                        </div>
                        <div class="accordion-content" style="display: block">
                            <p>
                                Fitway offers a wide range of professional fitness
                                equipment, including cardio machines, strength equipment,
                                free weights, functional training equipment, benches, racks
                                and accessories — along with complete gym setup services for
                                commercial and home gyms.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h4>Do you provide complete gym setup solutions?</h4>
                            <span class="accordion-icon">+</span>
                        </div>
                        <div class="accordion-content">
                            <p>
                                Yes. Fitway provides complete gym setup solutions covering
                                space planning, equipment selection, gym interiors,
                                equipment delivery, installation and final setup.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h4>Can you help us choose the right equipment?</h4>
                            <span class="accordion-icon">+</span>
                        </div>
                        <div class="accordion-content">
                            <p>
                                Absolutely. Our team can recommend equipment based on your
                                available space, training requirements, target users and
                                budget to help you build a functional fitness space.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gym Setup & Solutions -->
            <div class="faq-group">
                <h5 class="faq-group__title">Gym Setup &amp; Solutions</h5>

                <div class="accordion-wrapper">
                    <div class="accordion-item active">
                        <div class="accordion-header">
                            <h4>Do you provide space planning and gym design?</h4>
                            <span class="accordion-icon">−</span>
                        </div>
                        <div class="accordion-content" style="display: block">
                            <p>
                                Yes. Our team can help you plan the layout of your fitness
                                space based on available area, training requirements,
                                equipment selection and overall functionality.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h4>Can Fitway handle installation and setup?</h4>
                            <span class="accordion-icon">+</span>
                        </div>
                        <div class="accordion-content">
                            <p>
                                Yes. Our complete gym setup service includes equipment
                                installation and positioning to ensure your fitness space is
                                ready for use.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h4>Do you offer solutions for commercial gyms?</h4>
                            <span class="accordion-icon">+</span>
                        </div>
                        <div class="accordion-content">
                            <p>
                                Yes. We supply equipment and setup solutions suitable for
                                commercial gyms, fitness centres, hotels, clubs, studios and
                                other professional training environments.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Equipment & Orders -->
            <div class="faq-group">
                <h5 class="faq-group__title">Equipment &amp; Orders</h5>

                <div class="accordion-wrapper">
                    <div class="accordion-item active">
                        <div class="accordion-header">
                            <h4>Do you offer equipment for home gyms?</h4>
                            <span class="accordion-icon">−</span>
                        </div>
                        <div class="accordion-content" style="display: block">
                            <p>
                                Yes. Fitway offers equipment for home workout spaces,
                                including treadmills, exercise bikes, strength equipment,
                                benches, dumbbells and other essential fitness products.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h4>Can I customise my gym equipment package?</h4>
                            <span class="accordion-icon">+</span>
                        </div>
                        <div class="accordion-content">
                            <p>
                                Yes. Equipment selection can be planned according to your
                                available space, training requirements, usage and project
                                budget to create a practical and effective fitness setup.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h4>How can I enquire about a product or solution?</h4>
                            <span class="accordion-icon">+</span>
                        </div>
                        <div class="accordion-content">
                            <p>
                                Simply contact the Fitway team through our enquiry form or
                                reach out directly. Share your space, requirements and
                                project details, and we'll help you choose the right
                                equipment and plan your setup.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="faq-secC">
        <div class="container">
            <div class="faq-secC__box">
                <h3>Still Have Questions?</h3>
                <p>
                    Our team is here to help you find the right equipment and fitness
                    solution for your space.
                </p>

                <div class="faq-secC__btns">
                    <a href="{{ route('contact-us') }}" class="btn btn-primary">Contact Us</a>
                    <a
                        href="javascript:void(0)"
                        data-model=".enquire-pop"
                        class="btn btn-outline-white"
                        >Enquire Now</a
                    >
                </div>
            </div>
        </div>
    </section>

@endsection