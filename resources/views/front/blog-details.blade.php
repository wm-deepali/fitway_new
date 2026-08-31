@extends('layouts.app')

@section('title', $blog->blog . ' | Fitway')
@section('meta_description', Str::limit(strip_tags($blog->excerpt), 155))

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
                        <a href="{{ route('blog-details', $blog->slug) }}" class="active">{{ $blog->blog }}</a>
                    </li>
                </ul>
            </nav>

            <div class="container">
                <div class="bg-wrapper">
                    <div class="heading">
                        <div class="left-content">

                            <h1>{{ $blog->blog }}</h1>

                            <p>
                                {{ Str::limit(strip_tags($blog->excerpt), 180) }}
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
                {!! $blog->content !!}
            </div>
        </div>
    </section>

    <!-- More Blogs -->
    @if ($moreBlogs->isNotEmpty())
        <section class="more-blogs">
            <div class="container">
                <div class="heading">
                    <h3>MORE <span>BLOGS</span></h3>
                    <p>Explore more insights, ideas and expert tips for better fitness spaces.</p>
                </div>

                <div class="swiper-wrap">
                    <div class="swiper more-blogs-slider">
                        <div class="swiper-wrapper">
                            @foreach ($moreBlogs as $item)
                                <div class="swiper-slide">
                                    <a class="blog-card" href="{{ route('blog-details', $item->slug) }}">
                                        <div class="card-image">
                                            <img
                                                src="{{ asset('storage/' . $item->image) }}"
                                                alt="{{ $item->blog }}"
                                            />
                                            @if ($item->tag)
                                                <span class="tag">{{ $item->tag }}</span>
                                            @endif
                                        </div>

                                        <div class="card-content">
                                            <span class="date">{{ $item->date_of_blog?->format('d M Y') }}</span>
                                            <h4>{{ $item->blog }}</h4>
                                            <p>
                                                {{ Str::limit(strip_tags($item->excerpt), 100) }}
                                            </p>
                                            <span class="btn btn-primary">Read More</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
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
    @endif

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