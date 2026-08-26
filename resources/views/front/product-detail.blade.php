<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product Detail | Fitway</title>
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
    <link rel="stylesheet" href="assets/font/font.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/sass/header/header.css" />
    <link rel="stylesheet" href="assets/sass/footer/footer.css" />
    <link rel="stylesheet" href="assets/sass/product-detail/detail.css" />
    <!-- ================= Animation / Popup CSS ================= -->
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/fancybox.css" />
  </head>
  <body>
    <header>
    
      <div class="container-fluid">
        <div class="header-wrapper">
          <!-- Logo -->
          <div class="colA">
            <a href="index.html" class="logo">
              <img
                src="assets/images/logo.png"
                alt="Fitway Gym Equipment & Commercial Gym Setup"
                title="Fitway Gym Equipment & Commercial Gym Setup"
              />
            </a>
          </div>

          <!-- Navigation -->
          <div class="colC">
            <ul class="menu-list">
              <li>
                <a href="index.html">Home</a>
              </li>

              <li class="hasDropDown">
                <a href="javascript:void(0)">
                  Gym Solutions
                  <img src="images/icon/arrow.svg" alt="" />
                </a>

                <ul class="dropdown-menu">
                  <li>
                    <a href="home-gym-setup.html" target="_blank">Home Gym Setup</a>
                  </li>

                  <li>
                    <a href="commercial-gym-setup.html" target="_blank">Commercial Gym Setup</a>
                  </li>

                  <li>
                    <a href="corporate-gym-setup.html" target="_blank">Corporate Gym Setup</a>
                  </li>

                  <li>
                    <a href="outdoor-gym-setup.html" target="_blank">Outdoor / Open Gym Setup</a>
                  </li>

                  <li>
                    <a href="resorts-gym-setup.html" target="_blank">Hotels &amp; Resorts Gym Setup</a>
                  </li>
                </ul>
              </li>

              <li class="hasDropDown">
                <a href="javascript:void(0)">
                  Equipment
                  <img src="images/icon/arrow.svg" alt="" />
                </a>

                <ul class="dropdown-menu">
                  <li>
                    <a href="products.html">Commercial Equipments</a>
                  </li>

                  <li>
                    <a href="products.html">Home Gym Equipments</a>
                  </li>

                  <li>
                    <a href="products.html">Outdoor Equipments</a>
                  </li>
                </ul>
              </li>

              <li>
                <a href="products.html">Projects</a>
              </li>

              <li>
                <a href="about.html">About Us</a>
              </li>

              <li>
                <a href="contact.html">Contact</a>
              </li>

              <li class="cart-wrapper">
                <a href="cart.html" class="cart-btn" aria-label="View Cart">
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
      <section class="detail-secA">
        <div class="container">
          <nav class="breadcrumb-trail" aria-label="Breadcrumb">
            <ul>
              <li><a href="index.html">Home</a></li>
              <li><span>/</span></li>
              <li><a href="equipment.html">Equipment</a></li>
              <li><span>/</span></li>
              <li>
                <a href="commercial-equipment.html">Commercial Equipment</a>
              </li>
              <li><span>/</span></li>
              <li><a href="javascript:void(0)">Cardio</a></li>
              <li><span>/</span></li>
              <li>
                <a href="javascript:void(0)" class="active">Treadmills</a>
              </li>
            </ul>
          </nav>

          <div class="detail-wrap">
            <div class="detail-gallery">
              <div class="gallery-main">
                <div class="swiper gallerySwiper">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <img
                        src="assets/images/home/gym1.jpg"
                        alt="Fitway Commercial Treadmill — front view"
                      />
                    </div>
                    <div class="swiper-slide">
                      <img
                        src="assets/images/home/gym2.jpg"
                        alt="Fitway Commercial Treadmill — side view"
                      />
                    </div>
                    <div class="swiper-slide">
                      <img
                        src="assets/images/home/gym3.jpg"
                        alt="Fitway Commercial Treadmill — console detail"
                      />
                    </div>
                    <div class="swiper-slide">
                      <img
                        src="assets/images/home/gym1.jpg"
                        alt="Fitway Commercial Treadmill — in gym setting"
                      />
                    </div>
                  </div>
                </div>
                <span class="gallery-main__badge">Commercial Grade</span>
              </div>

              <div class="gallery-thumbs">
                <button
                  type="button"
                  class="gallery-thumbs__item is-active"
                  data-slide="0"
                >
                  <img src="assets/images/home/gym1.jpg" alt="" />
                </button>
                <button
                  type="button"
                  class="gallery-thumbs__item"
                  data-slide="1"
                >
                  <img src="assets/images/home/gym2.jpg" alt="" />
                </button>
                <button
                  type="button"
                  class="gallery-thumbs__item"
                  data-slide="2"
                >
                  <img src="assets/images/home/gym3.jpg" alt="" />
                </button>
                <button
                  type="button"
                  class="gallery-thumbs__item"
                  data-slide="3"
                >
                  <img src="assets/images/home/gym1.jpg" alt="" />
                </button>
              </div>
            </div>

            <!-- RIGHT: Content -->
            <div class="detail-content">
              <div class="detail-content__top">
                <span class="detail-content__tag">Gym Solutions</span>
                <!-- <span class="detail-content__grade">Professional Grade</span> -->
              </div>

              <h1>Fitway Commercial Treadmill</h1>
              <p class="cat">Commercial Gym Setup</p>

              <!-- Rating -->
              <div class="detail-content__rating">
                <svg width="0" height="0" style="position: absolute">
                  <defs>
                    <linearGradient id="half-star-fill">
                      <stop offset="50%" stop-color="var(--primary)" />
                      <stop offset="50%" stop-color="rgba(255,255,255,0.15)" />
                    </linearGradient>
                  </defs>
                </svg>
              </div>

              <!-- CMS / text-editor content -->
              <div class="detail-content__desc editor-content">
                <p>
                  Engineered for powerful performance and dependable training,
                  the Fitway Commercial Treadmill is designed for modern gyms,
                  fitness centres and professional training environments.
                </p>
              </div>

              <ul class="detail-content__highlights">
                <li>
                  <div>
                    <h6>Commercial Grade</h6>
                    <p>Built for demanding everyday gym use.</p>
                  </div>
                </li>
                <li>
                  <div>
                    <h6>High Performance</h6>
                    <p>
                      Smooth and reliable performance for intensive training.
                    </p>
                  </div>
                </li>
                <li>
                  <div>
                    <h6>Durable Construction</h6>
                    <p>Designed for long-term commercial operation.</p>
                  </div>
                </li>
                <li>
                  <div>
                    <h6>User-Focused Design</h6>
                    <p>Comfortable and intuitive for everyday workouts.</p>
                  </div>
                </li>
              </ul>

              <!-- Product Information -->
              <div class="detail-content__info">
                <div class="info-row">
                  <span class="info-row__label">Product Code</span>
                  <span class="info-row__value">FW-CT-001</span>
                </div>
                <div class="info-row">
                  <span class="info-row__label">Category</span>
                  <span class="info-row__value"
                    >Commercial Cardio Equipment</span
                  >
                </div>
                <div class="info-row">
                  <span class="info-row__label">Application</span>
                  <span class="info-row__value"
                    >Commercial Gyms · Fitness Centres · Hotels · Studios</span
                  >
                </div>
                <div class="info-row">
                  <span class="info-row__label">Availability</span>
                  <span class="info-row__value">Available on Request</span>
                </div>
                <div class="info-row">
                  <span class="info-row__label">Warranty</span>
                  <span class="info-row__value">[Actual Warranty Period]</span>
                </div>
                <div class="info-row">
                  <span class="info-row__label">Installation</span>
                  <span class="info-row__value"
                    >Professional Installation Available</span
                  >
                </div>
              </div>

              <div class="detail-content__cta">
                <a href="cart.html" type="button" class="btn btn-primary">
                  Add To Cart
                </a>
                <a href="product-detail.html" class="btn btn-gray"
                  >Whatsapp Now</a
                >
              </div>

              <p class="detail-content__helper">
                To get a custom quote, kindly add the products to the cart (you
                can add multiple products in the cart)
              </p>

              <div class="detail-content__trust">
                <span>
                  <svg viewBox="0 0 24 24">
                    <path
                      d="M12 2l3 6 6 1-4.5 4.5L18 20l-6-3-6 3 1.5-6.5L3 9l6-1 3-6z"
                    />
                  </svg>
                  Professional Equipment
                </span>
                <span>
                  <svg viewBox="0 0 24 24">
                    <path
                      d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"
                    />
                    <path d="M14 2v6h6" />
                  </svg>
                  Expert Installation
                </span>
                <span>
                  <svg viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="9" />
                    <path d="M12 7v5l3 3" />
                  </svg>
                  After-Sales Support
                </span>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="detail-secG">
        <div class="container">
          <div class="detail-secG__wrap">
            <span class="eyebrow">Need Help Choosing?</span>
            <h3>Let's Build the Right Fitness Space.</h3>
            <p>
              Whether you're starting a new gym, upgrading an existing facility
              or planning a complete commercial setup, Fitway can help you
              select the right equipment for your space.
            </p>
            <div class="detail-secG__cta">
              <button
                type="button"
                class="btn btn-primary"
                data-model=".enquire-pop"
              >
                Get A Quote
              </button>
              <a href="product-detail.html" class="btn btn-gray"
                >Talk To A Fitway Expert</a
              >
            </div>
          </div>
        </div>
      </section>

      <section class="detail-secB">
        <div class="container">
          <!-- Section eading -->
          <div class="heading">
            <h3>More <span>Products</span></h3>
            <p>
              Discover complementary equipment selected to help you build a
              complete, high-performance fitness space.
            </p>
          </div>

          <!-- Related Equipment Slider -->
          <div class="swiper-wrap">
            <div class="swiper thirdSilder2">
              <div class="swiper-wrapper">
                <!-- Product 01 -->
                <div class="swiper-slide">
                  <article class="equip-card">
                    <a href="product-detail.html" class="equip-card__img">
                      <img
                        src="assets/images/home/gym2.jpg"
                        alt="Fitway Commercial Cross Trainer"
                      />

                      <span class="equip-card__tag"> Cardio </span>
                    </a>

                    <div class="equip-card__body">
                      <span class="equip-card__cat">
                        Commercial Equipment
                      </span>

                      <h5>Fitway Commercial Cross Trainer</h5>

                      <div class="btns">
                        <button
                          type="button"
                          class="btn btn-primary"
                          data-model=".enquire-pop"
                        >
                          Enquire Now
                        </button>

                        <a href="product-detail.html" class="btn btn-gray">
                          View Details
                        </a>
                      </div>
                    </div>
                  </article>
                </div>

                <!-- Product 02 -->
                <div class="swiper-slide">
                  <article class="equip-card">
                    <a href="product-detail.html" class="equip-card__img">
                      <img
                        src="assets/images/home/gym3.jpg"
                        alt="Fitway Commercial Spin Bike"
                      />

                      <span class="equip-card__tag"> Cardio </span>
                    </a>

                    <div class="equip-card__body">
                      <span class="equip-card__cat">
                        Commercial Equipment
                      </span>

                      <h5>Fitway Commercial Spin Bike</h5>

                      <div class="btns">
                        <button
                          type="button"
                          class="btn btn-primary"
                          data-model=".enquire-pop"
                        >
                          Enquire Now
                        </button>

                        <a href="product-detail.html" class="btn btn-gray">
                          View Details
                        </a>
                      </div>
                    </div>
                  </article>
                </div>

                <!-- Product 03 -->
                <div class="swiper-slide">
                  <article class="equip-card">
                    <a href="product-detail.html" class="equip-card__img">
                      <img
                        src="assets/images/home/gym1.jpg"
                        alt="Fitway Commercial Rowing Machine"
                      />

                      <span class="equip-card__tag"> Cardio </span>
                    </a>

                    <div class="equip-card__body">
                      <span class="equip-card__cat">
                        Commercial Equipment
                      </span>

                      <h5>Fitway Commercial Rowing Machine</h5>

                      <div class="btns">
                        <button
                          type="button"
                          class="btn btn-primary"
                          data-model=".enquire-pop"
                        >
                          Enquire Now
                        </button>

                        <a href="product-detail.html" class="btn btn-gray">
                          View Details
                        </a>
                      </div>
                    </div>
                  </article>
                </div>

                <!-- Product 04 -->
                <div class="swiper-slide">
                  <article class="equip-card">
                    <a href="product-detail.html" class="equip-card__img">
                      <img
                        src="assets/images/home/gym2.jpg"
                        alt="Fitway Functional Trainer"
                      />

                      <span class="equip-card__tag"> Strength </span>
                    </a>

                    <div class="equip-card__body">
                      <span class="equip-card__cat">
                        Commercial Equipment
                      </span>

                      <h5>Fitway Functional Trainer</h5>

                      <div class="btns">
                        <button
                          type="button"
                          class="btn btn-primary"
                          data-model=".enquire-pop"
                        >
                          Enquire Now
                        </button>

                        <a href="product-detail.html" class="btn btn-gray">
                          View Details
                        </a>
                      </div>
                    </div>
                  </article>
                </div>

                <!-- Product 05 -->
                <div class="swiper-slide">
                  <article class="equip-card">
                    <a href="product-detail.html" class="equip-card__img">
                      <img
                        src="assets/images/home/gym3.jpg"
                        alt="Fitway Smith Machine"
                      />

                      <span class="equip-card__tag"> Strength </span>
                    </a>

                    <div class="equip-card__body">
                      <span class="equip-card__cat">
                        Commercial Equipment
                      </span>

                      <h5>Fitway Smith Machine</h5>

                      <div class="btns">
                        <button
                          type="button"
                          class="btn btn-primary"
                          data-model=".enquire-pop"
                        >
                          Enquire Now
                        </button>

                        <a href="product-detail.html" class="btn btn-gray">
                          View Details
                        </a>
                      </div>
                    </div>
                  </article>
                </div>

                <!-- Product 06 -->
                <div class="swiper-slide">
                  <article class="equip-card">
                    <a href="product-detail.html" class="equip-card__img">
                      <img
                        src="assets/images/home/gym1.jpg"
                        alt="Fitway Commercial Leg Press"
                      />

                      <span class="equip-card__tag"> Strength </span>
                    </a>

                    <div class="equip-card__body">
                      <span class="equip-card__cat">
                        Commercial Equipment
                      </span>

                      <h5>Fitway Commercial Leg Press</h5>

                      <div class="btns">
                        <button
                          type="button"
                          class="btn btn-primary"
                          data-model=".enquire-pop"
                        >
                          Enquire Now
                        </button>

                        <a href="product-detail.html" class="btn btn-gray">
                          View Details
                        </a>
                      </div>
                    </div>
                  </article>
                </div>
              </div>
            </div>

            <!-- Navigation -->
            <div class="swiper-group">
              <button
                type="button"
                class="thirdSilder2-prev"
                aria-label="Previous products"
              >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                  <path
                    fill="currentColor"
                    d="M609.408 149.376L277.76 489.6a32 32 0 0 0 0 44.672l331.648 340.352a29.12 29.12 0 0 0 41.728 0a30.59 30.59 0 0 0 0-42.752L339.264 511.936l311.872-319.872a30.59 30.59 0 0 0 0-42.688a29.12 29.12 0 0 0-41.728 0"
                  />
                </svg>
              </button>

              <button
                type="button"
                class="thirdSilder2-next"
                aria-label="Next products"
              >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                  <path
                    fill="currentColor"
                    d="M609.408 149.376L277.76 489.6a32 32 0 0 0 0 44.672l331.648 340.352a29.12 29.12 0 0 0 41.728 0a30.59 30.59 0 0 0 0-42.752L339.264 511.936l311.872-319.872a30.59 30.59 0 0 0 0-42.688a29.12 29.12 0 0 0 41.728 0"
                  />
                </svg>
              </button>
            </div>
          </div>

          <!-- View All -->
          <div class="detail-secB__footer">
            <a href="equipment.html" class="btn btn-gray">
              View All Equipment
            </a>
          </div>
        </div>
      </section>
    </main>

    <footer>
      <!-- Trust strip -->
      <div class="footer-wrapper">
        <ul class="footer-top">
          <li>
            <img src="assets/icon/support.png" alt="" />

            <div class="content">
              <p>24/7 Support</p>
              <span>Real humans, always on call</span>
            </div>
          </li>
          <li>
            <img src="assets/icon/certified.png" alt="" />

            <div class="content">
              <p>Certified Equipment</p>
              <span>ISO & CE approved machines</span>
            </div>
          </li>
          <li>
            <img src="assets/icon/price.png" alt="" />
            <div class="content">
              <p>Best Price Guarantee</p>
              <span>No hidden charges, ever</span>
            </div>
          </li>
          <li>
            <img src="assets/icon/truck.png" alt="" />

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
              <a href="javascript:void(0)" class="logo">
                <img
                  src="assets/images/logo.png"
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
                <li><a href="index.html">Home</a></li>
                <li><a href="products.html">Gym Solutions</a></li>
                <li><a href="products.html">Equipment</a></li>
                <li><a href="products.html">Projects</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="blogs.html">Blogs</a></li>
                <li><a href="faqs.html">Faqs</a></li>
                <li><a href="contact.html">Contact</a></li>
              </ul>
            </div>

            <!-- Blog posts -->
            <div class="colC">
              <h5>Blog Posts</h5>
              <ul class="blog-list">
                <li>
                  <img
                    src="assets/images/home/blog3.jpg"
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
                    src="assets/images/home/blog1.jpg"
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
                    src="assets/images/home/blog2.jpg"
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
              <div class="form">
                <div class="form-group">
                  <input
                    name="txtNewsletterEmail"
                    type="email"
                    placeholder=" "
                    class="form-control"
                    required
                  />
                  <label for="txtNewsletterEmail"
                    >Enter your email address</label
                  >
                </div>
                <a href="javascript:void(0)" class="sbmt btn btn-white">
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
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Bottom bar -->
        <div class="footer-bottom">
          <div class="container">
            <p class="copyright">
              © 2026 Fitway Gym Equipment. All rights reserved.
            </p>
            <p class="copyright">Built for people who build gyms.</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- ================= modals-pop-ups ================= -->
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

        <form class="form form-grid" method="post">
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
                  name="requirements"
                  value="Gym Equipment"
                />
                <span class="requirement-item__box"></span>
                <span class="requirement-item__label">Gym Equipment</span>
              </label>

              <label class="requirement-item">
                <input
                  type="checkbox"
                  name="requirements"
                  value="Interior Setup"
                />
                <span class="requirement-item__box"></span>
                <span class="requirement-item__label">Interior Setup</span>
              </label>

              <label class="requirement-item">
                <input type="checkbox" name="requirements" value="Mentorship" />
                <span class="requirement-item__box"></span>
                <span class="requirement-item__label">Mentorship</span>
              </label>

              <label class="requirement-item">
                <input
                  type="checkbox"
                  name="requirements"
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
    <script type="text/javascript" src="assets/js/animate.js"></script>
    <script type="text/javascript" src="assets/js/fancybox.js"></script>
    <script type="text/javascript" src="assets/js/function.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>

    <script>
      new Swiper(".thirdSilder2", {
        navigation: {
          nextEl: ".thirdSilder2-next",
          prevEl: ".thirdSilder2-prev",
        },
        loop: true,
        speed: 1000,
        breakpoints: {
          0: {
            slidesPerView: 1.2,
            spaceBetween: 20,
          },
          640: {
            slidesPerView: 1.2,
            spaceBetween: 10,
          },
          768: {
            slidesPerView: 2.2,
            spaceBetween: 20,
          },
          991: {
            slidesPerView: 3,
            spaceBetween: 20,
          },
          1280: {
            slidesPerView: 4,
            spaceBetween: 20,
          },
        },
      });
    </script>

    <script>
      $(document).ready(function () {
        $("header").addClass("header-fixed");
      });

      $(document).ready(function () {
        var $thumbs = $(".gallery-thumbs__item");
        var $mainImg = $(".gallery-main .swiper-slide img");

        $thumbs.on("click", function () {
          var index = $(this).data("slide");

          $thumbs.removeClass("is-active");
          $(this).addClass("is-active");

          if (typeof gallerySwiper !== "undefined" && gallerySwiper.slideTo) {
            gallerySwiper.slideTo(index);
          } else {
            var newSrc = $(this).find("img").attr("src");
            $mainImg.attr("src", newSrc);
          }
        });
      });
    </script>
  </body>
</html>
