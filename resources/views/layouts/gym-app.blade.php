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
    <link rel="stylesheet" href="{{ asset('assets/sass/landing/landing.css') }}" />

    <!-- ================= Animation / Popup CSS ================= -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fancybox.css') }}" />

    {{-- Page-specific stylesheets --}}
    @stack('styles')
  </head>
  <body>
    <!-- ANNOUNCEMENT BAR -->
    <div class="top_header">
      <div class="container">
        <div class="announcement-bar">
          <div class="announcement-wrapper">
            <div class="announcement-item">
              <div class="icon">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="1em"
                  height="1em"
                  viewBox="0 0 24 24"
                >
                  <path d="M0 0h24v24H0z" fill="none" />
                  <g
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                  >
                    <path
                      d="M12 22c-4.97 0-9-2.582-9-7v-.088C3 12.794 4.338 11.1 6.375 10c1.949-1.052 3.101-2.99 2.813-5l-.563-3l2.086.795c3.757 1.43 6.886 3.912 8.914 7.066A8.5 8.5 0 0 1 21 14.464V15c0 1.562-.504 2.895-1.375 3.965"
                    />
                    <path
                      d="M12 22c-1.657 0-3-1.433-3-3.2c0-1.4 1.016-2.521 1.91-3.548L12 14l1.09 1.252C13.984 16.28 15 17.4 15 18.8c0 1.767-1.343 3.2-3 3.2"
                    />
                  </g>
                </svg>
              </div>
              <p>Get Special Offers on Selected Gym Equipment!</p>
            </div>

            <div class="announcement-item">
              <div class="icon">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="1em"
                  height="1em"
                  viewBox="0 0 32 32"
                >
                  <path d="M0 0h32v32H0z" fill="none" />
                  <path fill="currentColor" d="M4 16h12v2H4zm-2-5h10v2H2z" />
                  <path
                    fill="currentColor"
                    d="m29.919 16.606l-3-7A1 1 0 0 0 26 9h-3V7a1 1 0 0 0-1-1H6v2h15v12.556A4 4 0 0 0 19.142 23h-6.284a4 4 0 1 0 0 2h6.284a3.98 3.98 0 0 0 7.716 0H29a1 1 0 0 0 1-1v-7a1 1 0 0 0-.081-.394M9 26a2 2 0 1 1 2-2a2 2 0 0 1-2 2m14-15h2.34l2.144 5H23Zm0 15a2 2 0 1 1 2-2a2 2 0 0 1-2 2m5-3h-1.142A3.995 3.995 0 0 0 23 20v-2h5Z"
                  />
                </svg>
              </div>
              <p>Free Delivery Available on Selected Orders.</p>
            </div>

            <div class="announcement-item">
              <div class="icon">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="1em"
                  height="1em"
                  viewBox="0 0 24 24"
                >
                  <path d="M0 0h24v24H0z" fill="none" />
                  <path
                    fill="currentColor"
                    fill-rule="evenodd"
                    d="M12 3.75c-3.476 0-6.25 2.717-6.25 6.016c0 2.005.82 3.733 2.285 4.81c.323.237.6.591.705 1.04c.087.369.186.818.284 1.294h2.226v-1.083a.75.75 0 0 1 .117-.403l.802-1.26l-1.799-1.412a.75.75 0 0 1-.17-.993l1.167-1.832a.75.75 0 0 1 1.266.806l-.802 1.259l1.799 1.413a.75.75 0 0 1 .17.992l-1.05 1.649v.864h2.226c.098-.476.197-.925.284-1.294c.106-.449.382-.803.705-1.04c1.464-1.077 2.285-2.806 2.285-4.81c0-3.299-2.774-6.016-6.25-6.016m2.689 14.66H9.31c.11.637.197 1.24.224 1.674c.027.457.368.866.871.974l.196.043c.92.199 1.875.199 2.796 0l.196-.043c.503-.108.844-.517.872-.974c.026-.433.112-1.037.223-1.674M4.25 9.766C4.25 5.59 7.744 2.25 12 2.25s7.75 3.341 7.75 7.516c0 2.424-1.004 4.627-2.897 6.018a.32.32 0 0 0-.133.176a51 51 0 0 0-.394 1.843c-.183.938-.332 1.848-.363 2.372c-.07 1.158-.922 2.105-2.052 2.35l-.196.042c-1.13.244-2.3.244-3.43 0l-.196-.042c-1.13-.244-1.982-1.192-2.052-2.35c-.031-.524-.18-1.434-.363-2.372a51 51 0 0 0-.394-1.843a.32.32 0 0 0-.133-.176C5.254 14.394 4.25 12.19 4.25 9.767"
                    clip-rule="evenodd"
                  />
                </svg>
              </div>
              <p>Complete Gym Setup Solutions Available.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- HEADER -->
    <header class="fitway-header" id="fitwayHeader">
      <div class="container">
        <div class="fitway-header__inner">
          <a
            href="{{ route('home') }}"
            target="_blank"
            class="fitway-header__logo"
          >
            <img src="{{ asset('assets/images/logo.png') }}" alt="Fitway Logo" />
          </a>

          <nav class="fitway-header__nav" id="fitwayNav">
            <ul>
              <li><a href="#home">Home</a></li>
              <li><a href="#about-solution">About Us</a></li>
              <li><a href="#equipment">Products</a></li>
              <li><a href="#Solutions">Gym Setup Solutions</a></li>
              <li><a href="#projects">Our Projects</a></li>
              <li><a href="#contact">Contact Us</a></li>
            </ul>
          </nav>

          <div class="fitway-header__actions">
            <a href="#contact" class="btn btn-white fitway-header__cta"
              >Enquire Now</a
            >
            <button
              class="fitway-burger"
              id="fitwayBurger"
              aria-label="Open menu"
            >
              <span></span><span></span><span></span>
            </button>
          </div>
        </div>
      </div>
    </header>

    <!-- MOBILE MENU -->
    <div class="fitway-mobile-menu" id="fitwayMobileMenu">
      <div class="fitway-mobile-menu__head">
        <img
          src="https://dummyimage.com/140x36/ffffff/000000&text=FITWAY"
          alt="Fitway Logo"
        />
        <button
          class="fitway-mobile-menu__close"
          id="fitwayMobileClose"
          aria-label="Close menu"
        >
          &times;
        </button>
      </div>
      <ul class="fitway-mobile-menu__list">
        <li><a href="#home" class="fitway-mobile-link">Home</a></li>
        <li>
          <a href="#about-solution" class="fitway-mobile-link">About Us</a>
        </li>
        <li><a href="#equipment" class="fitway-mobile-link">Products</a></li>
        <li><a href="#Solutions">Gym Setup Solutions</a></li>
        <li><a href="#projects" class="fitway-mobile-link">Our Projects</a></li>
        <li><a href="#contact" class="fitway-mobile-link">Contact Us</a></li>
      </ul>
      <a
        href="#contact"
        class="btn btn-primary fitway-mobile-menu__cta fitway-mobile-link"
        >Enquire Now</a
      >
    </div>
    <div class="fitway-mobile-overlay" id="fitwayMobileOverlay"></div>

    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="fitway-footer">
      <div class="container">
        <div class="fitway-footer__grid">
          <!-- About -->
          <div class="fitway-footer__col fitway-footer__about">
            <a
              href="{{ route('home') }}"
              target="_blank"
              class="fitway-footer__logo"
            >
              <img src="{{ asset('assets/images/logo.png') }}" alt="Fitway Logo" />
            </a>

            <p>
              Fitway provides professional gym equipment and complete fitness
              space solutions, from planning and equipment selection to
              installation and final setup.
            </p>

            <div class="fitway-footer__socials">
              <a href="javascript:void()" aria-label="Facebook">
                <svg viewBox="0 0 24 24" width="18" height="18">
                  <path
                    d="M13 22v-9h3l1-4h-4V7c0-1 .5-2 2-2h2V1h-3c-3 0-4 2-4 5v3H7v4h3v9z"
                    fill="currentColor"
                  />
                </svg>
              </a>

              <a href="javascript:void()" aria-label="Instagram">
                <svg viewBox="0 0 24 24" width="18" height="18">
                  <rect
                    x="3"
                    y="3"
                    width="18"
                    height="18"
                    rx="5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.6"
                  />
                  <circle
                    cx="12"
                    cy="12"
                    r="4"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.6"
                  />
                  <circle cx="17.5" cy="6.5" r="1" fill="currentColor" />
                </svg>
              </a>

              <a href="javascript:void()" aria-label="LinkedIn">
                <svg viewBox="0 0 24 24" width="18" height="18">
                  <rect x="2" y="9" width="4" height="12" fill="currentColor" />
                  <circle cx="4" cy="4" r="2" fill="currentColor" />
                  <path
                    d="M10 9h4v2c1-1.5 2.5-2.3 4.5-2.3 3.5 0 5.5 2.3 5.5 6.3V21h-4v-5.5c0-1.6-.6-2.7-2-2.7-1.1 0-1.8.8-2.1 1.5-.1.3-.1.6-.1 1V21h-4z"
                    fill="currentColor"
                  />
                </svg>
              </a>

              <a href="javascript:void()" aria-label="YouTube">
                <svg viewBox="0 0 24 24" width="18" height="18">
                  <rect
                    x="2"
                    y="5"
                    width="20"
                    height="14"
                    rx="4"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.6"
                  />
                  <path d="M10 9l6 3-6 3z" fill="currentColor" />
                </svg>
              </a>
            </div>
            <a
              href="{{ route('home') }}"
              target="_blank"
              class="btn btn-gray main_web"
              >Visit Our Main Website</a
            >
          </div>

          <!-- Quick Navigation -->
          <div class="fitway-footer__col">
            <h4>Explore</h4>

            <ul>
              <li>
                <a href="#home">Home</a>
              </li>

              <li>
                <a href="#about-solution">About the Solution</a>
              </li>

              <li>
                <a href="#equipment">Gym Equipment</a>
              </li>

              <li>
                <a href="#process">Our Process</a>
              </li>

              <li>
                <a href="#projects">Our Projects</a>
              </li>

              <li>
                <a href="#faq">FAQs</a>
              </li>
            </ul>
          </div>

          <!-- Why Choose Fitway -->
          <div class="fitway-footer__col">
            <h4>Why Fitway?</h4>

            <ul class="fitway-footer__features">
              <li>
                <span class="fitway-footer__check">✓</span>
                Complete Gym Solutions
              </li>

              <li>
                <span class="fitway-footer__check">✓</span>
                Quality Equipment
              </li>

              <li>
                <span class="fitway-footer__check">✓</span>
                Professional Installation
              </li>

              <li>
                <span class="fitway-footer__check">✓</span>
                Space Planning Support
              </li>

              <li>
                <span class="fitway-footer__check">✓</span>
                End-to-End Assistance
              </li>
            </ul>
          </div>

          <!-- Contact -->
          <div class="fitway-footer__col fitway-footer__contact-col">
            <h4>Let's Build Your Gym</h4>

            <p class="fitway-footer__contact-text">
              Tell us about your space and requirements. Our team will help you
              plan the right fitness setup.
            </p>

            <ul class="fitway-footer__contact">
              <li>
                <span>Call Us</span>
                <a href="tel:+919015335461">9015335461</a>
              </li>

              <li>
                <span>Email Us</span>
                <a href="mailto:fitwayimpex@gmail.com">fitwayimpex@gmail.com</a>
              </li>
            </ul>

            <a href="#contact" class="btn btn-primary"> Start Your Project </a>
          </div>
        </div>

        <!-- Bottom -->
        <div class="fitway-footer__bottom">
          <p>© {{ date('Y') }} Fitway. All Rights Reserved.</p>

          <div class="fitway-footer__legal">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms &amp; Conditions</a>
          </div>
        </div>
      </div>
    </footer>

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
    <script type="text/javascript" src="{{ asset('assets/js/comman.js') }}"></script>

    {{-- Page-specific scripts --}}
    @stack('scripts')
  </body>
</html>