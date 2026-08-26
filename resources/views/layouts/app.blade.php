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
                  <img src="{{ asset('images/icon/arrow.svg') }}" alt="" />
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
                  <img src="{{ asset('images/icon/arrow.svg') }}" alt="" />
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
                <button class="btn btn-primary" data-model=".enquire-pop">
                  Start Your Gym Project
                </button>
              </li>

              <li class="ham-btn-wrapper">
                <button type="button" class="ham-btn" data-model=".ham-pop">
                  <div class="dot">
                    <span></span>
                    <span></span>
                    <span></span>
                  </div>
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
                  <p>Monday - Sunday: 07:00 - 22:00</p>
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
                  <a href="javascript:void(0)" aria-label="Facebook">
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
                  <a href="javascript:void(0)" aria-label="WhatsApp">
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
                  <a href="javascript:void(0)" aria-label="YouTube">
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
                <li><a href="{{ route('products') }}">Gym Solutions</a></li>
                <li><a href="{{ route('products') }}">Equipment</a></li>
                <li><a href="{{ route('portfolio') }}">Projects</a></li>
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
                      >7 Best Shoulder Exercises You're Not Doing</a
                    >
                    <span>February 07, 2017</span>
                  </div>
                </li>
                <li>
                  <img
                    src="{{ asset('assets/images/home/blog1.jpg') }}"
                    alt="8 Things You Should Never Do On Chest Day"
                  />
                  <div class="content">
                    <a href="javascript:void(0)"
                      >8 Things You Should Never Do On Chest Day</a
                    >
                    <span>February 12, 2017</span>
                  </div>
                </li>
                <li>
                  <img
                    src="{{ asset('assets/images/home/blog2.jpg') }}"
                    alt="Louis Williams Instinctive Back Workout"
                  />
                  <div class="content">
                    <a href="javascript:void(0)"
                      >Louis Williams Instinctive Back Workout</a
                    >
                    <span>February 17, 2017</span>
                  </div>
                </li>
              </ul>
            </div>

            <!-- Newsletter -->
            <div class="colD">
              <h5>Newsletter</h5>
              <p class="desc">
                Fitway — gym equipment & commercial gym setup experts. Get
                workout tips, product drops and project stories in your inbox.
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
              © {{ date('Y') }} Fitway Gym Equipment. All rights reserved.
            </p>
            <p class="copyright">Built for people who build gyms.</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- ================= modals-pop-ups ================= -->
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