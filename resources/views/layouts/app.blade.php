<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Fitway - Gym Equipment & Commercial Gym Setup')</title>
    <meta name="description" content="@yield('meta_description', 'Fitway offers professional gym equipment and complete commercial gym setup solutions.')" />
    <link rel="canonical" href="@yield('canonical', url()->current())" />

    <!-- ================= Google Fonts ================= -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&amp;display=swap"
      rel="stylesheet"
    />

    <!-- ================= Vendor CSS ================= -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"
    />
    <!-- ================= Project CSS ================= -->
    <link rel="stylesheet" href="{{ asset('assets/font/font.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/sass/header/header.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/sass/footer/footer.css') }}" />
    <!-- ================= Animation / Popup CSS ================= -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fancybox.css') }}" />

    {{-- Page-specific stylesheets (e.g. home/home.css) --}}
    @stack('styles')
  </head>
  <body>
    <header>
      @if(request()->routeIs('home') || request()->is('dynamic') || request()->is('dynamic/*'))
      <div class="top_header">
        <div class="container">
          <div class="announcement-bar">
            <div class="announcement-wrapper">
              <div class="announcement-item">
                <div class="icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
	<path d="M0 0h24v24H0z" fill="none" />
	<g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
		<path d="M12 22c-4.97 0-9-2.582-9-7v-.088C3 12.794 4.338 11.1 6.375 10c1.949-1.052 3.101-2.99 2.813-5l-.563-3l2.086.795c3.757 1.43 6.886 3.912 8.914 7.066A8.5 8.5 0 0 1 21 14.464V15c0 1.562-.504 2.895-1.375 3.965" />
		<path d="M12 22c-1.657 0-3-1.433-3-3.2c0-1.4 1.016-2.521 1.91-3.548L12 14l1.09 1.252C13.984 16.28 15 17.4 15 18.8c0 1.767-1.343 3.2-3 3.2" />
	</g>
</svg>

                </div>
                <p> Get Special Offers on Selected Gym Equipment!</p>
              </div>

              <div class="announcement-item">
                <div class="icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 32 32">
	<path d="M0 0h32v32H0z" fill="none" />
	<path fill="currentColor" d="M4 16h12v2H4zm-2-5h10v2H2z" />
	<path fill="currentColor" d="m29.919 16.606l-3-7A1 1 0 0 0 26 9h-3V7a1 1 0 0 0-1-1H6v2h15v12.556A4 4 0 0 0 19.142 23h-6.284a4 4 0 1 0 0 2h6.284a3.98 3.98 0 0 0 7.716 0H29a1 1 0 0 0 1-1v-7a1 1 0 0 0-.081-.394M9 26a2 2 0 1 1 2-2a2 2 0 0 1-2 2m14-15h2.34l2.144 5H23Zm0 15a2 2 0 1 1 2-2a2 2 0 0 1-2 2m5-3h-1.142A3.995 3.995 0 0 0 23 20v-2h5Z" />
</svg>

                </div>
                <p> Free Delivery Available on Selected Orders.</p>
              </div>

              <div class="announcement-item">
                <div class="icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
	<path d="M0 0h24v24H0z" fill="none" />
	<path fill="currentColor" fill-rule="evenodd" d="M12 3.75c-3.476 0-6.25 2.717-6.25 6.016c0 2.005.82 3.733 2.285 4.81c.323.237.6.591.705 1.04c.087.369.186.818.284 1.294h2.226v-1.083a.75.75 0 0 1 .117-.403l.802-1.26l-1.799-1.412a.75.75 0 0 1-.17-.993l1.167-1.832a.75.75 0 0 1 1.266.806l-.802 1.259l1.799 1.413a.75.75 0 0 1 .17.992l-1.05 1.649v.864h2.226c.098-.476.197-.925.284-1.294c.106-.449.382-.803.705-1.04c1.464-1.077 2.285-2.806 2.285-4.81c0-3.299-2.774-6.016-6.25-6.016m2.689 14.66H9.31c.11.637.197 1.24.224 1.674c.027.457.368.866.871.974l.196.043c.92.199 1.875.199 2.796 0l.196-.043c.503-.108.844-.517.872-.974c.026-.433.112-1.037.223-1.674M4.25 9.766C4.25 5.59 7.744 2.25 12 2.25s7.75 3.341 7.75 7.516c0 2.424-1.004 4.627-2.897 6.018a.32.32 0 0 0-.133.176a51 51 0 0 0-.394 1.843c-.183.938-.332 1.848-.363 2.372c-.07 1.158-.922 2.105-2.052 2.35l-.196.042c-1.13.244-2.3.244-3.43 0l-.196-.042c-1.13-.244-1.982-1.192-2.052-2.35c-.031-.524-.18-1.434-.363-2.372a51 51 0 0 0-.394-1.843a.32.32 0 0 0-.133-.176C5.254 14.394 4.25 12.19 4.25 9.767" clip-rule="evenodd" />
</svg>

                </div>
                <p> Complete Gym Setup Solutions Available.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      @endif
      <div class="container-fluid">
        <div class="header-wrapper">
          <!-- Logo -->
          <div class="colA">
            <a href="{{ route('home') }}" class="logo">
              <img
                src="{{ asset('assets/images/logo.png') }}"
                alt="Fitway Gym Equipment & Commercial Gym Setup"
                title="Fitway Gym Equipment & Commercial Gym Setup"
              />
            </a>
          </div>

          <!-- Navigation -->
          <div class="colC">
            <ul class="menu-list">
              <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                <a href="{{ route('home') }}">Home</a>
              </li>

              <li class="hasDropDown">
                <a href="javascript:void(0)">
                  Gym Solutions
                  <!--<img src="{{ asset('images/icon/arrow.svg') }}" alt="" />-->
                </a>

                <ul class="dropdown-menu">
                  <li>
                    <a href="{{ route('home-gym-setup') }}" target="_blank">Home Gym Setup</a>
                  </li>

                  <li>
                    <a href="{{ route('commercial-gym-setup') }}" target="_blank">Commercial Gym Setup</a>
                  </li>

                  <li>
                    <a href="{{ route('corporate-gym-setup') }}" target="_blank">Corporate Gym Setup</a>
                  </li>

                  <li>
                    <a href="{{ route('outdoor-gym-setup') }}" target="_blank">Outdoor / Open Gym Setup</a>
                  </li>

                  <li>
                    <a href="{{ route('resorts-gym-setup') }}" target="_blank">Hotels &amp; Resorts Gym Setup</a>
                  </li>
                </ul>
              </li>

              <li class="hasDropDown">
                <a href="javascript:void(0)">
                  Equipment
                  <!--<img src="{{ asset('images/icon/arrow.svg') }}" alt="" />-->
                </a>

                <ul class="dropdown-menu">
                  <li>
                    <a href="{{ route('products') }}">Commercial Equipments</a>
                  </li>

                  <li>
                    <a href="{{ route('products') }}">Home Gym Equipments</a>
                  </li>

                  <li>
                    <a href="{{ route('products') }}">Outdoor Equipments</a>
                  </li>
                </ul>
              </li>

              <li class="{{ request()->routeIs('portfolio') ? 'active' : '' }}">
                <a href="{{ route('portfolio') }}">Projects</a>
              </li>

              <li class="{{ request()->routeIs('about-us') ? 'active' : '' }}">
                <a href="{{ route('about-us') }}">About Us</a>
              </li>

              <li class="{{ request()->routeIs('contact-us') ? 'active' : '' }}">
                <a href="{{ route('contact-us') }}">Contact</a>
              </li>

              <li class="cart-wrapper">
                <a href="{{ route('cart') }}" class="cart-btn" aria-label="View Cart">
                  <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path
                      d="M3 4h2l2.2 10.2a2 2 0 0 0 2 1.6h7.9a2 2 0 0 0 1.9-1.4L21 7H6L5 4H3Z"
                    />
                    <circle cx="9.5" cy="19" r="1.5" />
                    <circle cx="18" cy="19" r="1.5" />
                  </svg>
                  <span class="cart-count">0</span>
                </a>
              </li>

              <li>
                <button class="btn btn-black" data-model=".enquire-pop">
                  Start Your Gym Project
                </button>
              </li>

                 <li class="ham-btn-wrapper">
                <button type="button" class="ham-btn" data-model=".ham-pop">
                 <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                  <path d="M0 0h24v24H0z" fill="none" />
                  <path fill="none" stroke="currentColor" stroke-linecap="round" d="M3.5 7.5h17M3.5 12h14m-14 4.5h17" />
                </svg>

                </button>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
      <!-- Trust strip -->
      <div class="footer-wrapper">
        <ul class="footer-top">
          <li>
            <img src="{{ asset('assets/icon/support.png') }}" alt="" />

            <div class="content">
              <p>24/7 Support</p>
              <span>Real humans, always on call</span>
            </div>
          </li>
          <li>
            <img src="{{ asset('assets/icon/certified.png') }}" alt="" />

            <div class="content">
              <p>Certified Equipment</p>
              <span>ISO & CE approved machines</span>
            </div>
          </li>
          <li>
            <img src="{{ asset('assets/icon/price.png') }}" alt="" />
            <div class="content">
              <p>Best Price Guarantee</p>
              <span>No hidden charges, ever</span>
            </div>
          </li>
          <li>
            <img src="{{ asset('assets/icon/truck.png') }}" alt="" />

            <div class="content">
              <p>Pan-India Installation</p>
              <span>Setup & support nationwide</span>
            </div>
          </li>
        </ul>
      </div>

      <!-- Main footer -->
      <div class="footer-wrapper-bottom">
        <div class="footer-middle">
          <div class="container">
            <!-- Logo + contact -->
            <div class="colA">
              <a href="{{ route('home') }}" class="logo">
                <img
                  src="{{ asset('assets/images/logo.png') }}"
                  alt="Fitway Gym Equipment & Commercial Gym Setup"
                />
              </a>

              <ul class="contact-info">
                <li>
                  <span class="label">Address</span>
                  <p>
                    D-1373/1, beside Kalevum Sweets, Sector 1, Block D, Indira
                    Nagar, Lucknow, Uttar Pradesh 226016
                  </p>
                </li>
                <li>
                  <span class="label">Phones</span>
                  <p>
                    <a href="tel:+919015335461">9015335461</a> ||
                    <a href="tel:+919839570700">9839570700</a>
                  </p>
                </li>
                <li>
                  <span class="label">Working Hours</span>
                  <p>Monday - Sunday: 10:00 - 22:00</p>
                </li>
                <li>
                  <span class="label">Email</span>
                  <p>
                    <a href="mailto:fitwayimpex@gmail.com"
                      >fitwayimpex@gmail.com</a
                    >
                  </p>
                </li>
              </ul>

              <ul class="social">
                <li>
                  <a href="https://www.facebook.com/fitwaygymequipmentslko/" target="_blank" rel="noopener" aria-label="Facebook">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="1em"
                      height="1em"
                      viewBox="0 0 24 24"
                    >
                      <path
                        fill="currentColor"
                        d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14C17.174 2.097 15.943 2 14.643 2 11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4z"
                      />
                    </svg>
                  </a>
                </li>
                <li>
                  <a href="https://www.instagram.com/fitwayindiaa/" target="_blank" rel="noopener" aria-label="Instagram">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="1em"
                      height="1em"
                      viewBox="0 0 24 24"
                    >
                      <path
                        fill="currentColor"
                        d="M12 2c-2.72 0-3.06.01-4.12.06-1.06.05-1.79.22-2.43.47a4.9 4.9 0 0 0-1.77 1.15A4.9 4.9 0 0 0 2.53 5.45c-.25.64-.42 1.37-.47 2.43C2.01 8.94 2 9.28 2 12s.01 3.06.06 4.12c.05 1.06.22 1.79.47 2.43a4.9 4.9 0 0 0 1.15 1.77 4.9 4.9 0 0 0 1.77 1.15c.64.25 1.37.42 2.43.47C8.94 21.99 9.28 22 12 22s3.06-.01 4.12-.06c1.06-.05 1.79-.22 2.43-.47a4.9 4.9 0 0 0 1.77-1.15 4.9 4.9 0 0 0 1.15-1.77c.25-.64.42-1.37.47-2.43.05-1.06.06-1.4.06-4.12s-.01-3.06-.06-4.12c-.05-1.06-.22-1.79-.47-2.43a4.9 4.9 0 0 0-1.15-1.77A4.9 4.9 0 0 0 18.55 2.53c-.64-.25-1.37-.42-2.43-.47C15.06 2.01 14.72 2 12 2m0 1.8c2.67 0 2.99.01 4.04.06.98.04 1.51.21 1.86.34.47.18.8.4 1.15.75.35.35.57.68.75 1.15.13.35.3.88.34 1.86.05 1.05.06 1.37.06 4.04s-.01 2.99-.06 4.04c-.04.98-.21 1.51-.34 1.86-.18.47-.4.8-.75 1.15-.35.35-.68.57-1.15.75-.35.13-.88.3-1.86.34-1.05.05-1.37.06-4.04.06s-2.99-.01-4.04-.06c-.98-.04-1.51-.21-1.86-.34a3.1 3.1 0 0 1-1.15-.75 3.1 3.1 0 0 1-.75-1.15c-.13-.35-.3-.88-.34-1.86C3.81 14.99 3.8 14.67 3.8 12s.01-2.99.06-4.04c.04-.98.21-1.51.34-1.86.18-.47.4-.8.75-1.15.35-.35.68-.57 1.15-.75.35-.13.88-.3 1.86-.34C9.01 3.81 9.33 3.8 12 3.8M12 7a5 5 0 1 0 0 10 5 5 0 0 0 0-10m0 1.8a3.2 3.2 0 1 1 0 6.4 3.2 3.2 0 0 1 0-6.4m5.2-2.9a1.17 1.17 0 1 0 0 2.34 1.17 1.17 0 0 0 0-2.34"
                      />
                    </svg>
                  </a>
                </li>
                <li>
                  <a href="https://wa.me/919839570700" target="_blank" rel="noopener" aria-label="WhatsApp">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="1em"
                      height="1em"
                      viewBox="0 0 24 24"
                    >
                      <path
                        fill="currentColor"
                        d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.39 1.26 4.81L2 22l5.44-1.43a9.9 9.9 0 0 0 4.6 1.14h.01c5.46 0 9.9-4.45 9.9-9.91C21.95 6.45 17.5 2 12.04 2m0 18.13a8.2 8.2 0 0 1-4.19-1.15l-.3-.18-3.11.82.83-3.03-.2-.31a8.17 8.17 0 0 1-1.26-4.37c0-4.54 3.69-8.24 8.24-8.24 4.54 0 8.24 3.7 8.24 8.24 0 4.55-3.7 8.22-8.25 8.22"
                      />
                    </svg>
                  </a>
                </li>
                <li>
                  <a href="https://www.youtube.com/@fitway5722" target="_blank" rel="noopener" aria-label="YouTube">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="1em"
                      height="1em"
                      viewBox="0 0 24 24"
                    >
                      <path
                        fill="currentColor"
                        d="M21.582 6.186a2.75 2.75 0 0 0-1.936-1.945C17.9 3.75 12 3.75 12 3.75s-5.9 0-7.646.491a2.75 2.75 0 0 0-1.936 1.945C2 7.93 2 12 2 12s0 4.07.418 5.814a2.75 2.75 0 0 0 1.936 1.945C6.1 20.25 12 20.25 12 20.25s5.9 0 7.646-.491a2.75 2.75 0 0 0 1.936-1.945C22 16.07 22 12 22 12s0-4.07-.418-5.814M9.75 15.5v-7L15.75 12z"
                      />
                    </svg>
                  </a>
                </li>
              </ul>
            </div>

            <!-- Quick links -->
            <div class="colB">
              <h5>Quick Links</h5>
              <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('commercial-gym-setup') }}">Commercial Gym Setup</a></li>
                <li><a href="{{ route('home-gym-setup') }}">Home Gym Setup</a></li>
                <li><a href="{{ route('outdoor-gym-setup') }}">Outdoor Gym Setup</a></li>
                <li><a href="{{ route('products') }}">Commercial Equipment</a></li>
                <li><a href="{{ route('products') }}">Home Gym Equipment</a></li>
                <li><a href="{{ route('portfolio') }}">Our Works</a></li>
                <li><a href="{{ route('about-us') }}">About Us</a></li>
                <li><a href="{{ route('blogs') }}">Blogs</a></li>
                <li><a href="{{ route('faqs') }}">Faqs</a></li>
                <li><a href="{{ route('contact-us') }}">Contact</a></li>
              </ul>
            </div>

            <!-- Blog posts -->
            {{-- Wire this to your Blogs model: e.g. @foreach($latestBlogs as $blog) --}}
            <div class="colC">
              <h5>Blog Posts</h5>
              <ul class="blog-list">
                <li>
                  <img
                    src="{{ asset('assets/images/home/blog3.jpg') }}"
                    alt="7 Best shoulder exercises you're not doing"
                  />
                  <div class="content">
                    <a href="javascript:void(0)"
                      >How to Start Commercial Gym in India</a
                    >
                    <span>August 07, 2026</span>
                  </div>
                </li>
                <li>
                  <img
                    src="{{ asset('assets/images/home/blog1.jpg') }}"
                    alt="8 Things You Should Never Do On Chest Day"
                  />
                  <div class="content">
                    <a href="javascript:void(0)"
                      >5 Popular Machines required for Home Gym</a
                    >
                    <span>August 12, 2026</span>
                  </div>
                </li>
                <li>
                  <img
                    src="{{ asset('assets/images/home/blog2.jpg') }}"
                    alt="Louis Williams Instinctive Back Workout"
                  />
                  <div class="content">
                    <a href="javascript:void(0)"
                      >How to Setup Outdoor Gym in Your Lawn</a
                    >
                    <span>August 17, 2026</span>
                  </div>
                </li>
                <li>
                  <img
                    src="{{ asset('assets/images/home/blog1.jpg') }}"
                    alt="8 Things You Should Never Do On Chest Day"
                  />
                  <div class="content">
                    <a href="javascript:void(0)"
                      >Best Gym Excercise to do at Home</a
                    >
                    <span>August 18, 2026</span>
                  </div>
                </li>
                
              </ul>
            </div>

            <!-- Newsletter -->
            <div class="colD">
              <h5>Newsletter</h5>
              <p class="desc">
                Fitway — gym equipment & commercial gym setup experts. Get
                free consultation & tips, product drops and project stories in your inbox.
              </p>
              <form class="form" method="POST" action="#">
                @csrf
                <div class="form-group">
                  <input
                    name="email"
                    type="email"
                    placeholder=" "
                    class="form-control"
                    required
                  />
                  <label for="txtNewsletterEmail"
                    >Enter your email address</label
                  >
                </div>
                <button type="submit" class="sbmt btn btn-white">
                  Subscribe
                  <svg viewBox="0 0 24 24" fill="none" width="16" height="16">
                    <path
                      d="M5 12h14m0 0-6-6m6 6-6 6"
                      stroke="currentColor"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                </button>
              </form>
            </div>
          </div>
        </div>

        <!-- Bottom bar -->
        <div class="footer-bottom">
          <div class="container">
            <p class="copyright">
              © {{ date('Y') }} Fitway India. All rights reserved.
            </p>
           <p class="copyright">Design & Maintained by <a href="https://webmingo.com" target="_blank" rel="noopener">Web Mingo</a>.</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- ================= modals-pop-ups ================= -->


    <div class="ham-pop">
  <button class="close close-btn">
    <svg
      width="26"
      height="26"
      viewBox="0 0 26 26"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        d="M0.5 0.5L25.5 25.5M0.5 25.5L25.5 0.5"
        stroke="black"
        stroke-linecap="round"
        stroke-linejoin="round"
      ></path>
    </svg>
  </button>

  <div class="model-body">
    <div class="mid-list">
      <ul class="nav-list">
        <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
          <a href="{{ route('home') }}">Home</a>
        </li>

        <li class="hasDropdown">
          <div class="plu-ico"></div>
          <a href="javascript:void(0)">Gym Solutions</a>
          <div class="dropdown-menu-ham">
            <ul>
              <li>
                <a href="{{ route('home-gym-setup') }}" target="_blank">Home Gym Setup</a>
              </li>
              <li>
                <a href="{{ route('commercial-gym-setup') }}" target="_blank">Commercial Gym Setup</a>
              </li>
              <li>
                <a href="{{ route('corporate-gym-setup') }}" target="_blank">Corporate Gym Setup</a>
              </li>
              <li>
                <a href="{{ route('outdoor-gym-setup') }}" target="_blank">Outdoor / Open Gym Setup</a>
              </li>
              <li>
                <a href="{{ route('resorts-gym-setup') }}" target="_blank">Hotels &amp; Resorts Gym Setup</a>
              </li>
            </ul>
          </div>
        </li>

        <li class="hasDropdown">
          <div class="plu-ico"></div>
          <a href="javascript:void(0)">Equipment</a>
          <div class="dropdown-menu-ham">
            <ul>
              <li>
                <a href="{{ route('products') }}">Commercial Equipments</a>
              </li>
              <li>
                <a href="{{ route('products') }}">Home Gym Equipments</a>
              </li>
              <li>
                <a href="{{ route('products') }}">Outdoor Equipments</a>
              </li>
            </ul>
          </div>
        </li>

        <li class="{{ request()->routeIs('portfolio') ? 'active' : '' }}">
          <a href="{{ route('portfolio') }}">Projects</a>
        </li>

        <li class="{{ request()->routeIs('blogs') ? 'active' : '' }}">
          <a href="{{ route('blogs') }}">Blogs</a>
        </li>

         <li class="{{ request()->routeIs('faqs') ? 'active' : '' }}">
          <a href="{{ route('faqs') }}">faqs</a>
        </li>

        <li class="{{ request()->routeIs('about-us') ? 'active' : '' }}">
          <a href="{{ route('about-us') }}">About Us</a>
        </li>

        <li class="{{ request()->routeIs('contact-us') ? 'active' : '' }}">
          <a href="{{ route('contact-us') }}">Contact</a>
        </li>

         

      </ul>
    </div>

    <div class="bottom-list">
      <div class="social-icons">
        <a href="#" target="_blank" title="Facebook">
          <svg
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M14 13.5H16.5L17.5 9.5H14V7.5C14 6.47 14 5.5 16 5.5H17.5V2.14C17.174 2.097 15.943 2 14.643 2C11.928 2 10 3.657 10 6.7V9.5H7V13.5H10V22H14V13.5Z"
              fill="#666666"
            ></path>
          </svg>
        </a>
        <a href="#" title="Instagram" target="_blank">
          <svg
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M17.34 5.46C17.1027 5.46 16.8707 5.53038 16.6733 5.66224C16.476 5.79409 16.3222 5.98151 16.2313 6.20078C16.1405 6.42005 16.1168 6.66133 16.1631 6.89411C16.2094 7.12689 16.3236 7.34071 16.4915 7.50853C16.6593 7.67635 16.8731 7.79064 17.1059 7.83694C17.3387 7.88324 17.5799 7.85948 17.7992 7.76866C18.0185 7.67783 18.2059 7.52402 18.3378 7.32668C18.4696 7.12935 18.54 6.89734 18.54 6.66C18.54 6.34174 18.4136 6.03652 18.1885 5.81147C17.9635 5.58643 17.6583 5.46 17.34 5.46ZM21.94 7.88C21.9206 7.0503 21.7652 6.2294 21.48 5.45C21.2257 4.78313 20.83 4.17928 20.32 3.68C19.8248 3.16743 19.2196 2.77418 18.55 2.53C17.7727 2.23616 16.9508 2.07721 16.12 2.06C15.06 2 14.72 2 12 2C9.28 2 8.94 2 7.88 2.06C7.04915 2.07721 6.22734 2.23616 5.45 2.53C4.78168 2.77665 4.17693 3.16956 3.68 3.68C3.16743 4.17518 2.77418 4.78044 2.53 5.45C2.23616 6.22734 2.07721 7.04915 2.06 7.88C2 8.94 2 9.28 2 12C2 14.72 2 15.06 2.06 16.12C2.07721 16.9508 2.23616 17.7727 2.53 18.55C2.77418 19.2196 3.16743 19.8248 3.68 20.32C4.17693 20.8304 4.78168 21.2234 5.45 21.47C6.22734 21.7638 7.04915 21.9228 7.88 21.94C8.94 22 9.28 22 12 22C14.72 22 15.06 22 16.12 21.94C16.9508 21.9228 17.7727 21.7638 18.55 21.47C19.2196 21.2258 19.8248 20.8326 20.32 20.32C20.8322 19.8226 21.2283 19.2182 21.48 18.55C21.7652 17.7706 21.9206 16.9497 21.94 16.12C21.94 15.06 22 14.72 22 12C22 9.28 22 8.94 21.94 7.88ZM20.14 16C20.1327 16.6348 20.0178 17.2637 19.8 17.86C19.6403 18.2952 19.3839 18.6884 19.05 19.01C18.7256 19.3405 18.3332 19.5964 17.9 19.76C17.3037 19.9778 16.6748 20.0927 16.04 20.1C15.04 20.15 14.67 20.16 12.04 20.16C9.41 20.16 9.04 20.16 8.04 20.1C7.38089 20.1123 6.72459 20.0109 6.1 19.8C5.68578 19.6281 5.31136 19.3728 5 19.05C4.66809 18.7287 4.41484 18.3352 4.26 17.9C4.01586 17.2952 3.88044 16.6519 3.86 16C3.86 15 3.8 14.63 3.8 12C3.8 9.37 3.8 9 3.86 8C3.86448 7.35106 3.98295 6.70795 4.21 6.1C4.38605 5.67791 4.65627 5.30166 5 5C5.30381 4.65617 5.67929 4.3831 6.1 4.2C6.70955 3.98004 7.352 3.86508 8 3.86C9 3.86 9.37 3.8 12 3.8C14.63 3.8 15 3.8 16 3.86C16.6348 3.86728 17.2637 3.98225 17.86 4.2C18.3144 4.36865 18.7223 4.64285 19.05 5C19.3777 5.30718 19.6338 5.68273 19.8 6.1C20.0223 6.70893 20.1373 7.35178 20.14 8C20.19 9 20.2 9.37 20.2 12C20.2 14.63 20.19 15 20.14 16ZM12 6.87C10.9858 6.87198 9.99496 7.17453 9.15265 7.73942C8.31035 8.30431 7.65438 9.1062 7.26763 10.0438C6.88089 10.9813 6.78072 12.0125 6.97979 13.0069C7.17886 14.0014 7.66824 14.9145 8.38608 15.631C9.10392 16.3474 10.018 16.835 11.0129 17.0321C12.0077 17.2293 13.0387 17.1271 13.9755 16.7385C14.9123 16.35 15.7129 15.6924 16.2761 14.849C16.8394 14.0056 17.14 13.0142 17.14 12C17.1413 11.3251 17.0092 10.6566 16.7512 10.033C16.4933 9.40931 16.1146 8.84281 15.6369 8.36605C15.1592 7.88929 14.5919 7.51168 13.9678 7.25493C13.3436 6.99818 12.6749 6.86736 12 6.87ZM12 15.33C11.3414 15.33 10.6976 15.1347 10.15 14.7688C9.60234 14.4029 9.17552 13.8828 8.92348 13.2743C8.67144 12.6659 8.6055 11.9963 8.73398 11.3503C8.86247 10.7044 9.17963 10.111 9.64533 9.64533C10.111 9.17963 10.7044 8.86247 11.3503 8.73398C11.9963 8.6055 12.6659 8.67144 13.2743 8.92348C13.8828 9.17552 14.4029 9.60234 14.7688 10.15C15.1347 10.6976 15.33 11.3414 15.33 12C15.33 12.4373 15.2439 12.8703 15.0765 13.2743C14.9092 13.6784 14.6639 14.0454 14.3547 14.3547C14.0454 14.6639 13.6784 14.9092 13.2743 15.0765C12.8703 15.2439 12.4373 15.33 12 15.33Z"
              fill="#666666"
            ></path>
          </svg>
        </a>
        <a href="#" target="_blank" title="LinkedIn">
          <svg
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M6.94 5.00002C6.93974 5.53046 6.72877 6.03906 6.35351 6.41394C5.97825 6.78883 5.46944 6.99929 4.939 6.99902C4.40857 6.99876 3.89997 6.78779 3.52508 6.41253C3.1502 6.03727 2.93974 5.52846 2.94 4.99802C2.94027 4.46759 3.15124 3.95899 3.5265 3.5841C3.90176 3.20922 4.41057 2.99876 4.941 2.99902C5.47144 2.99929 5.98004 3.21026 6.35492 3.58552C6.72981 3.96078 6.94027 4.46959 6.94 5.00002ZM7 8.48002H3V21H7V8.48002ZM13.32 8.48002H9.34V21H13.28V14.43C13.28 10.77 18.05 10.43 18.05 14.43V21H22V13.07C22 6.90002 14.94 7.13002 13.28 10.16L13.32 8.48002Z"
              fill="#666666"
            ></path>
          </svg>
        </a>
      </div>
    </div>
  </div>
</div>



    <div class="overlay"></div>
    <div class="model enquire-pop">
      <button type="button" class="close" aria-label="Close enquiry form">
        <svg
          width="26"
          height="26"
          viewBox="0 0 26 26"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M0.5 0.5L25.5 25.5M0.5 25.5L25.5 0.5"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
        </svg>
      </button>

      <div class="model-body">
        <div class="title">
          <h4>REQUEST A CUSTOM QUOTE</h4>
          <p>Share your requirements and get a tailored quote.</p>
        </div>

        <form class="form form-grid" method="POST" action="#">
          @csrf
          <div class="form-group">
            <input
              type="text"
              class="form-control"
              name="FullName"
              placeholder=""
              autocomplete="name"
              required
            />
            <label>Full Name*</label>
          </div>

          <div class="form-group">
            <input
              type="tel"
              class="form-control"
              name="MobileNumber"
              placeholder=""
              maxlength="14"
              autocomplete="tel"
              inputmode="numeric"
              required
            />
            <label>Mobile Number*</label>
          </div>

          <div class="form-group">
            <input
              type="email"
              class="form-control"
              name="EmailID"
              placeholder=""
              autocomplete="email"
            />
            <label>Email Id</label>
          </div>

          <div class="requirement-group">
            <span class="requirement-group__title"
              >Select Your Requirements</span
            >

            <div class="requirement-list">
              <label class="requirement-item">
                <input
                  type="checkbox"
                  name="requirements[]"
                  value="Gym Equipment"
                />
                <span class="requirement-item__box"></span>
                <span class="requirement-item__label">Gym Equipment</span>
              </label>

              <label class="requirement-item">
                <input
                  type="checkbox"
                  name="requirements[]"
                  value="Interior Setup"
                />
                <span class="requirement-item__box"></span>
                <span class="requirement-item__label">Interior Setup</span>
              </label>

              <label class="requirement-item">
                <input type="checkbox" name="requirements[]" value="Mentorship" />
                <span class="requirement-item__box"></span>
                <span class="requirement-item__label">Mentorship</span>
              </label>

              <label class="requirement-item">
                <input
                  type="checkbox"
                  name="requirements[]"
                  value="Maintenance Services"
                />
                <span class="requirement-item__box"></span>
                <span class="requirement-item__label"
                  >Maintenance Services</span
                >
              </label>
            </div>
          </div>

          <div class="form-group">
            <textarea
              class="form-control"
              name="Message"
              placeholder=""
              rows="3"
            ></textarea>
            <label>Enter Details (If any)</label>
          </div>

          <div class="captcha"></div>

          <input type="hidden" name="EnquiryType" value="Quick Enquiry" />
          <input type="hidden" name="EnquiryFor" value="Quick Enquiry" />
          <input type="hidden" name="BrochureFile" value="" />

          <div class="submit-group">
            <button type="submit" class="btn btn-primary">
              Submit Enquiry
            </button>
          </div>
        </form>
      </div>
    </div>

    <div class="model video-pop">
      <div class="model-body">
        <button class="close-video close">
          <svg
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M0.75 0.75L23.25 23.25M0.75 23.25L23.25 0.75"
              stroke="black"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </button>

        <iframe id="iframe1" allow="autoplay; fullscreen" src=""></iframe>
      </div>
    </div>

    <!-- ================= jQuery ================= -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
      integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery-visible/1.2.0/jquery.visible.min.js"
      integrity="sha512-771ZvVCYr4EfUGXr63AcX7thw7EKa6QE1fhxi8JG7mPacB/arC0cyvYPXKUkCrX2sYKnnFCZby3ZZik42jOuSQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.14.0/jquery-ui.min.js"
      integrity="sha512-MlEyuwT6VkRXExjj8CdBKNgd+e2H+aYZOCUaCrt9KRk6MlZDOs91V1yK22rwm8aCIsb5Ec1euL8f0g58RKT/Pg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

    <!-- ================= Swiper ================= -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"></script>

    <!-- ================= Project JS ================= -->
    <script type="text/javascript" src="{{ asset('assets/js/animate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/fancybox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/function.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>

    <script>
      // Announcement bar auto-scroll — shared across every front page
      document.addEventListener("DOMContentLoaded", function () {
        const wrapper = document.querySelector(".announcement-wrapper");
        const items = document.querySelectorAll(".announcement-item");

        if (!wrapper || items.length <= 1) return;

        const itemHeight = items[0].offsetHeight;
        let currentIndex = 0;

        const firstItem = items[0].cloneNode(true);
        wrapper.appendChild(firstItem);

        setInterval(function () {
          currentIndex++;

          wrapper.style.transition = "transform 0.6s ease";
          wrapper.style.transform = `translateY(-${currentIndex * itemHeight}px)`;

          if (currentIndex === items.length) {
            setTimeout(function () {
              wrapper.style.transition = "none";
              wrapper.style.transform = "translateY(0)";
              currentIndex = 0;
            }, 2000);
          }
        }, 3000);
      });
    </script>

    {{-- Page-specific scripts (e.g. the home-page process-rail observer) --}}
    @stack('scripts')
  </body>
</html>