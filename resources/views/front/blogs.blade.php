@extends('layouts.app')

@section('title', 'Blogs | Fitway')
@section('meta_description', 'Explore expert tips, gym setup ideas, equipment guides and insights from Fitway to help you build better fitness spaces.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/sass/blogs/blog.css') }}" />
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
            <!-- Card 1 -->
            <div class="blog-card">
              <a href="blog-details.html" class="img">
                <img
                  src="assets/images/home/gym1.jpg"
                  alt="How to Set Up a Commercial Gym"
                />
                <span class="tag">Gym Setup</span>
              </a>
              <div class="content">
                <span class="date">Fitness Guide</span>
                <h4>How to Plan the Perfect Commercial Gym</h4>
                <p>
                  Key things to consider when designing a functional and
                  high-performing gym space.
                </p>
                <a href="blog-details.html" class="btn btn-primary"
                  >Read More</a
                >
              </div>
            </div>
            <!-- Card 2 -->
            <div class="blog-card">
              <a href="blog-details.html" class="img">
                <img
                  src="assets/images/home/gym2.jpg"
                  alt="Home Gym Equipment Guide"
                />
                <span class="tag">Home Fitness</span>
              </a>
              <div class="content">
                <span class="date">Equipment Guide</span>
                <h4>Essential Equipment for Your Home Gym</h4>
                <p>
                  Build an effective home workout space with the right fitness
                  equipment.
                </p>
                <a href="blog-details.html" class="btn btn-primary"
                  >Read More</a
                >
              </div>
            </div>
            <!-- Card 3 -->
            <div class="blog-card">
              <a href="blog-details.html" class="img">
                <img
                  src="assets/images/home/gym3.jpg"
                  alt="Gym Space Planning"
                />
                <span class="tag">Planning</span>
              </a>
              <div class="content">
                <span class="date">Gym Design</span>
                <h4>Smart Gym Layout Ideas for Better Training</h4>
                <p>
                  Learn how the right layout can improve movement, safety and
                  workout flow.
                </p>
                <a href="blog-details.html" class="btn btn-primary"
                  >Read More</a
                >
              </div>
            </div>
            <!-- Card 4 -->
            <div class="blog-card">
              <a href="blog-details.html" class="img">
                <img
                  src="assets/images/home/gym1.jpg"
                  alt="Cardio Equipment Guide"
                />
                <span class="tag">Equipment</span>
              </a>
              <div class="content">
                <span class="date">Buying Guide</span>
                <h4>Choosing the Right Cardio Equipment</h4>
                <p>
                  Find the right cardio machines based on your space, goals and
                  users.
                </p>
                <a href="blog-details.html" class="btn btn-primary"
                  >Read More</a
                >
              </div>
            </div>
            <!-- Card 5 -->
            <div class="blog-card">
              <a href="blog-details.html" class="img">
                <img
                  src="assets/images/home/gym2.jpg"
                  alt="Corporate Gym Benefits"
                />
                <span class="tag">Corporate Fitness</span>
              </a>
              <div class="content">
                <span class="date">Fitness Spaces</span>
                <h4>Why Every Workplace Needs a Fitness Space</h4>
                <p>
                  Discover how corporate gyms can support healthier and happier
                  workplaces.
                </p>
                <a href="blog-details.html" class="btn btn-primary"
                  >Read More</a
                >
              </div>
            </div>
            <!-- Card 6 -->
            <div class="blog-card">
              <a href="blog-details.html" class="img">
                <img
                  src="assets/images/home/gym3.jpg"
                  alt="Outdoor Gym Setup"
                />
                <span class="tag">Outdoor Fitness</span>
              </a>
              <div class="content">
                <span class="date">Setup Guide</span>
                <h4>Creating a Functional Outdoor Gym Space</h4>
                <p>
                  Everything you need to consider when planning a durable
                  open-air gym.
                </p>
                <a href="blog-details.html" class="btn btn-primary"
                  >Read More</a
                >
              </div>
            </div>
          </div>
        </div>
    </section>

@endsection