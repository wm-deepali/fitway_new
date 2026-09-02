@extends('layouts.app')

@section('title', 'Thanks | Fitway')
@section('meta_description', 'Thank you for reaching out to Fitway. Our team will get in touch with you shortly.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/sass/other/other.css') }}" />
@endpush

@section('content')

    <section class="comman-banner">
        <video autoplay="" muted="" loop="" playsinline="" src="{{ asset('assets/video/banner3.mp4') }}"
            poster="{{ asset('assets/video/poster/banner.png') }}">
            <source src="{{ asset('assets/video/banner3.mp4') }}" type="video/mp4" />
        </video>

        <div class="container">
            <div class="bg-wrapper">
                <div class="heading">
                    <h1>Thank You!</h1>

                    <p>
                        {{ $message ?? "Thank you for reaching out to Fitway. We've received your
                            enquiry and our team will get in touch with you shortly." }}
                    </p>
                    <a href="{{ route('home') }}" class="btn btn-primary bt"> Back To Home </a>
                </div>
            </div>
        </div>
    </section>

@endsection