@extends('layouts.app')

@section('title', 'Thank You | Fitway')

@section('content')

    <section class="banner banner--listing">
        <div class="bg">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="banner-wrapper">
                    <div class="content">
                        <h1>THANK YOU</h1>
                        <p>
                            {{ $message ?? 'Your request has been submitted successfully. Our team will get back to you shortly.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="padding:80px 0; text-align:center;">
        <div class="container">
            <a href="{{ route('products') }}" class="btn btn-primary">Continue Browsing Equipment</a>
        </div>
    </section>
@endsection