@extends('layouts.app')

@section('title', $pageSeo->seo->meta_title ??'Faqs | Fitway')
@section('meta_description', $pageSeo->seo->meta_description ?? 'Find answers to common questions about Fitway gym equipment, fitness solutions and complete gym setup services.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/sass/faqs/faqs.css') }}" />
@endpush

@section('content')

    <section class="banner">
        <div class="bg">
            <img src="{{ asset('assets/images/home/faq-banner.jpg') }}" />

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
                        <h1>{{ $pageSeo->seo->h1 ?? 'Frequently Asked Questions.' }}</h1>

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

            <div class="accordion-wrapper">
                @forelse($faqs as $index => $faq)
                    <div class="accordion-item @if($index === 0) active @endif">
                        <div class="accordion-header">
                            <h4>{{ $faq->question }}</h4>
                            <span class="accordion-icon">{{ $index === 0 ? '−' : '+' }}</span>
                        </div>
                        <div class="accordion-content" @if($index === 0) style="display: block" @endif>
                            <p>{!! nl2br(e($faq->answer)) !!}</p>
                        </div>
                    </div>
                @empty
                    <p>No FAQs available at the moment.</p>
                @endforelse
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
                    <a href="javascript:void(0)" data-model=".quote-request-pop" class="btn btn-outline-white">Enquire Now</a>
                </div>
            </div>
        </div>
    </section>

@endsection