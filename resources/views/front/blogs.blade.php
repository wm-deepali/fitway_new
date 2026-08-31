@extends('layouts.app')

@section('title', 'Blogs | Fitway')
@section('meta_description', 'Explore expert tips, gym setup ideas, equipment guides and insights from Fitway to help you build better fitness spaces.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/sass/blogs/blog.css') }}" />
@endpush

@section('content')

    <section class="banner">
        <div class="bg">
              <img src="{{ asset('assets/images/home/blog-banner.jpg') }}"/>
            <nav class="breadcrumb left breadcrumb-light" aria-label="Breadcrumb">
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>

                    <li>
                        <span class="breadcrumb-separator">/</span>
                    </li>

                    <li>
                        <a href="{{ route('blogs') }}" class="active">Blogs</a>
                    </li>
                </ul>
            </nav>

            <div class="container">
                <div class="banner-wrapper">
                    <div class="content">
                        <h1>Fitness Journal.</h1>

                        <p>
                            Explore expert tips, gym setup ideas, equipment guides and
                            insights to help you build better fitness spaces.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-secA">
        <div class="container">
          <div class="heading">
            <h3>FITNESS <span>INSIGHTS</span></h3>
            <p>
              Expert tips, gym ideas and guides to help you build better fitness
              spaces.
            </p>
          </div>
          <div class="blog-grid">
            @forelse ($blogs as $blog)
              <div class="blog-card">
                <a href="{{ route('blog-details', $blog->slug) }}" class="img">
                  <img
                    src="{{ asset('storage/' . $blog->image) }}"
                    alt="{{ $blog->blog }}"
                  />
                  @if ($blog->tag)
                    <span class="tag">{{ $blog->tag }}</span>
                  @endif
                </a>
                <div class="content">
                  <span class="date">{{ $blog->date_of_blog?->format('d M Y') }}</span>
                  <h4>{{ $blog->blog }}</h4>
                  <p>
                    {{ Str::limit(strip_tags($blog->excerpt), 110) }}
                  </p>
                  <a href="{{ route('blog-details', $blog->slug) }}" class="btn btn-primary">Read More</a>
                </div>
              </div>
            @empty
              <p>No blog posts yet — check back soon.</p>
            @endforelse
          </div>
        </div>
    </section>

@endsection