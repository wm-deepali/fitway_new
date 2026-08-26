@extends('layouts.app')

@section('title', 'Home | Fitway')
@section('meta_description', 'Quality gym equipment and complete commercial gym setup solutions from Fitway — cardio, strength, free weights, functional training and more.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/sass/home/home.css') }}" />
@endpush

@section('content')
      <section class="home-banner">
        <div class="videoSlider swiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <video
                playsinline
                autoplay
                muted
                loop
                width="100%"
                height="100%"
                poster="{{ asset('assets/video/poster/banner.png') }}"
              >
                <source src="{{ asset('assets/video/banner1.mp4') }}" type="video/mp4" />
              </video>
            </div>

            <div class="swiper-slide">
              <video
                playsinline
                autoplay
                muted
                loop
                width="100%"
                height="100%"
                poster="{{ asset('assets/video/poster/banner3.png') }}"
              >
                <source src="{{ asset('assets/video/banner3.mp4') }}" type="video/mp4" />
              </video>
            </div>

            <div class="swiper-slide">
              <video
                playsinline
                autoplay
                muted
                loop
                width="100%"
                height="100%"
                poster="{{ asset('assets/video/poster/banner2.png') }}"
              >
                <source src="{{ asset('assets/video/banner2.mp4') }}" type="video/mp4" />
              </video>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="bg-content">
            <div class="textSlider swiper">
              <div class="swiper-wrapper">
                <!-- Slide 1 : Fitway Gym Equipment -->
                <div class="swiper-slide">
                  <h2>
                    WELCOME TO FITWAY GYM &amp; <span>FITNESS EQUIPMENT</span>
                  </h2>
                  <p>
                    Quality gym equipment designed for commercial gyms, fitness
                    centers and professional workout spaces.
                  </p>
                  <ul class="feature-list">
                    <li>
                      <span class="icon">
                        <img src="{{ asset('assets/icon/gym.png') }}" alt="" />
                      </span>
                      Gym Equipment
                    </li>

                    <li>
                      <span class="icon">
                        <img src="{{ asset('assets/icon/bike.png') }}" alt="" />
                      </span>
                      Exercise Bikes
                    </li>

                    <li>
                      <span class="icon">
                        <img src="{{ asset('assets/icon/bicycle-outline.png') }}" alt="" />
                      </span>
                      Treadmill
                    </li>

                    <li>
                      <span class="icon">
                        <img src="{{ asset('assets/icon/mills.png') }}" alt="" />
                      </span>
                      Cross Trainers
                    </li>

                    <li>
                      <span class="icon">
                        <img src="{{ asset('assets/icon/bench.png') }}" alt="" />
                      </span>
                      Weight Benches
                    </li>
                  </ul>
                  <a href="javascript:void(0)" class="btn btn-primary">
                    CONTACT NOW
                  </a>
                </div>

                <!-- Slide 2 : Sports Shoes -->
                <div class="swiper-slide">
                  <h2>
                    PAIR OF SPORTS <br />
                    <span>SHOES SPECIAL</span>
                  </h2>

                  <p>
                    We offer a wide variety of exercise specific shoes designed
                    for walking, running, training and everyday comfort and
                    performance needs.
                  </p>

                  <div class="bg-bottom">
                    <span> walking, running or gym shoes </span>

                    <a href="javascript:void(0)" class="btn btn-primary">
                      CONTACT NOW
                    </a>
                  </div>
                </div>

                <!-- Slide 3 : Bicycles -->
                <div class="swiper-slide">
                  <h2>
                    BICYCLES STORE<br />
                    <span>HYBRID TOURING</span>
                  </h2>

                  <p>
                    In our bicycle store, you will find some of the best options
                    available in India,
                  </p>

                  <div class="bg-bottom">
                    <span> Daily use or professional bicycler </span>

                    <a href="javascript:void(0)" class="btn btn-primary">
                      CONTACT NOW
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <ul class="banner-category">
            <li class="active" data-index="0">
              <img src="{{ asset('assets/icon/gym.png') }}" alt="" />
              <span>Gym Equipment</span>
            </li>

            <li data-index="1">
              <img src="{{ asset('assets/icon/sheos.png') }}" alt="" />
              <span>Sports Shoes</span>
            </li>

            <li data-index="2">
              <img src="{{ asset('assets/icon/bicycle-outline.png') }}" alt="" />
              <span>Bicycles Store</span>
            </li>
          </ul>
        </div>
      </section>

      <section class="home-secB">
        <div class="container">
          <div class="grid">
            <div class="secB-media">
              <img
                src="{{ asset('assets/images/home/about.jpg') }}"
                alt="Fitway commercial gym setup"
              />
            </div>

            <div class="secB-content">
              <div class="heading">
                <span class="eyebrow">More Than Gym Equipment</span>
                <h3>We build fitness spaces<br /><span>that perform.</span></h3>
                <p>
                  Fitway provides professional gym equipment and complete
                  commercial gym setup solutions. From selecting the right
                  equipment to planning your space and completing the
                  installation, we help bring your fitness vision to life.
                </p>
              </div>

              <ul class="secB-highlights">
                <li>
                  <span class="num">01</span>
                  <div>
                    <h5>Quality Equipment</h5>
                    <p>
                      Professional equipment selected for performance and
                      durability.
                    </p>
                  </div>
                </li>
                <li>
                  <span class="num">02</span>
                  <div>
                    <h5>Expert Setup</h5>
                    <p>Smart planning, layout and professional installation.</p>
                  </div>
                </li>
                <li>
                  <span class="num">03</span>
                  <div>
                    <h5>Complete Support</h5>
                    <p>One team from your first idea to your finished gym.</p>
                  </div>
                </li>
              </ul>

              <a href="{{ route('about-us') }}" class="btn btn-gray">
                Know More About Fitway
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="0.5em"
                  height="1em"
                  viewBox="0 0 12 24"
                >
                  <path d="M0 0h12v24H0z" fill="none" />
                  <path
                    fill="currentColor"
                    fill-rule="evenodd"
                    d="M10.157 12.711L4.5 18.368l-1.414-1.414l4.95-4.95l-4.95-4.95L4.5 5.64l5.657 5.657a1 1 0 0 1 0 1.414"
                  />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </section>

      <section class="home-secC">
        <div class="container">
          <div class="heading">
            <h3>Our <span>PRODUCTS</span></h3>
            <p>
              Discover fitness equipment designed for professional gyms, fitness
              centres, hotels, clubs and home workout spaces.
            </p>
          </div>

          <ul class="tab-nav">
            <li class="active" data-tab="commercial">Commercial Equipment</li>
            <li data-tab="home">Home Equipment</li>
          </ul>

          <div class="tab-nav-content">
            <!-- ===== COMMERCIAL ===== -->
            <div class="tabs active" data-tab="commercial">
              <div class="swiper-wrap">
                <div class="swiper thirdSilder">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <div class="prod-card">
                        <a href="{{ route('products') }}" class="img">
                          <img
                            src="{{ asset('assets/images/home/gym2.jpg') }}"
                            alt="Cardio Equipment"
                          />
                        </a>

                        <div class="content">
                          <h5>Cardio Equipment</h5>
                          <p>
                            Treadmills, exercise bikes, cross trainers and other
                            cardio machines.
                          </p>
                          <div class="btns">
                            <a
                              href="javascript:void(0)"
                              data-model=".enquire-pop"
                              class="btn btn-primary"
                              >Enquire Now</a
                            >
                            <a href="{{ route('products') }}" class="btn btn-gray"
                              >View Details</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="swiper-slide">
                      <div class="prod-card">
                        <a href="{{ route('products') }}" class="img">
                          <img
                            src="{{ asset('assets/images/home/gym1.jpg') }}"
                            alt="Strength Equipment"
                          />
                        </a>

                        <div class="content">
                          <h5>Strength Equipment</h5>
                          <p>
                            Multi-station, cable, selectorized and plate-loaded
                            machines.
                          </p>
                          <div class="btns">
                            <a
                              href="javascript:void(0)"
                              data-model=".enquire-pop"
                              class="btn btn-primary"
                              >Enquire Now</a
                            >
                            <a href="{{ route('products') }}" class="btn btn-gray"
                              >View Details</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="swiper-slide">
                      <div class="prod-card">
                        <a href="{{ route('products') }}" class="img">
                          <img
                            src="{{ asset('assets/images/home/gym3.jpg') }}"
                            alt="Free Weights"
                          />
                        </a>

                        <div class="content">
                          <h5>Free Weights</h5>
                          <p>
                            Dumbbells, barbells, weight plates and essential
                            training accessories.
                          </p>
                          <div class="btns">
                            <a
                              href="javascript:void(0)"
                              data-model=".enquire-pop"
                              class="btn btn-primary"
                              >Enquire Now</a
                            >
                            <a href="{{ route('products') }}" class="btn btn-gray"
                              >View Details</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="swiper-slide">
                      <div class="prod-card">
                        <a href="{{ route('products') }}" class="img">
                          <img
                            src="{{ asset('assets/images/home/gym1.jpg') }}"
                            alt="Functional Training"
                          />
                        </a>

                        <div class="content">
                          <h5>Functional Training</h5>
                          <p>
                            Functional trainers, rigs, racks and equipment for
                            versatile workouts.
                          </p>
                          <div class="btns">
                            <a
                              href="javascript:void(0)"
                              data-model=".enquire-pop"
                              class="btn btn-primary"
                              >Enquire Now</a
                            >
                            <a href="{{ route('products') }}" class="btn btn-gray"
                              >View Details</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="swiper-slide">
                      <div class="prod-card">
                        <a href="{{ route('products') }}" class="img">
                          <img
                            src="{{ asset('assets/images/home/gym3.jpg') }}"
                            alt="Functional Training"
                          />
                        </a>

                        <div class="content">
                          <h5>Functional Training</h5>
                          <p>
                            Functional trainers, rigs, racks and equipment for
                            versatile workouts.
                          </p>
                          <div class="btns">
                            <a
                              href="javascript:void(0)"
                              data-model=".enquire-pop"
                              class="btn btn-primary"
                              >Enquire Now</a
                            >
                            <a href="{{ route('products') }}" class="btn btn-gray"
                              >View Details</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="swiper-group">
                  <button type="button" class="thirdSilder-prev btn-prev">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 1024 1024"
                    >
                      <path
                        fill="#ffff"
                        d="M609.408 149.376L277.76 489.6a32 32 0 0 0 0 44.672l331.648 340.352a29.12 29.12 0 0 0 41.728 0a30.59 30.59 0 0 0 0-42.752L339.264 511.936l311.872-319.872a30.59 30.59 0 0 0 0-42.688a29.12 29.12 0 0 0-41.728 0"
                      ></path>
                    </svg>
                  </button>
                  <button type="button" class="thirdSilder-next btn-next">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 1024 1024"
                    >
                      <path
                        fill="#ffff"
                        d="M609.408 149.376L277.76 489.6a32 32 0 0 0 0 44.672l331.648 340.352a29.12 29.12 0 0 0 41.728 0a30.59 30.59 0 0 0 0-42.752L339.264 511.936l311.872-319.872a30.59 30.59 0 0 0 0-42.688a29.12 29.12 0 0 0-41.728 0"
                      ></path>
                    </svg>
                  </button>
                </div>
              </div>

              <div class="center-btn">
                <a href="{{ route('products') }}" class="btn btn-gray">
                  View All Commercial Equipment
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="0.5em"
                    height="1em"
                    viewBox="0 0 12 24"
                  >
                    <path d="M0 0h12v24H0z" fill="none" />
                    <path
                      fill="currentColor"
                      fill-rule="evenodd"
                      d="M10.157 12.711L4.5 18.368l-1.414-1.414l4.95-4.95l-4.95-4.95L4.5 5.64l5.657 5.657a1 1 0 0 1 0 1.414"
                    />
                  </svg>
                </a>
              </div>
            </div>

            <!-- ===== HOME ===== -->
            <div class="tabs" data-tab="home">
              <div class="swiper-wrap">
                <div class="swiper thirdSilder">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <div class="prod-card">
                        <a href="{{ route('products') }}" class="img">
                          <img
                            src="{{ asset('assets/images/home/gym1.jpg') }}"
                            alt="Home Cardio"
                          />
                        </a>

                        <div class="content">
                          <h5>Home Cardio</h5>
                          <p>
                            Treadmills, bikes, cross trainers and compact cardio
                            machines.
                          </p>
                          <div class="btns">
                            <a
                              href="javascript:void(0)"
                              data-model=".enquire-pop"
                              class="btn btn-primary"
                              >Enquire Now</a
                            >
                            <a href="{{ route('products') }}" class="btn btn-gray"
                              >View Details</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="swiper-slide">
                      <div class="prod-card">
                        <a href="{{ route('products') }}" class="img">
                          <img
                            src="{{ asset('assets/images/home/gym2.jpg') }}"
                            alt="Home Strength"
                          />
                        </a>

                        <div class="content">
                          <h5>Home Strength</h5>
                          <p>
                            Multi-functional and space-efficient strength
                            training equipment.
                          </p>
                          <div class="btns">
                            <a
                              href="javascript:void(0)"
                              data-model=".enquire-pop"
                              class="btn btn-primary"
                              >Enquire Now</a
                            >
                            <a href="{{ route('products') }}" class="btn btn-gray"
                              >View Details</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="swiper-slide">
                      <div class="prod-card">
                        <a href="{{ route('products') }}" class="img">
                          <img
                            src="{{ asset('assets/images/home/gym2.jpg') }}"
                            alt="Free Weights"
                          />
                        </a>

                        <div class="content">
                          <h5>Free Weights</h5>
                          <p>
                            Dumbbells, plates, benches and essential home
                            workout accessories.
                          </p>
                          <div class="btns">
                            <a
                              href="javascript:void(0)"
                              data-model=".enquire-pop"
                              class="btn btn-primary"
                              >Enquire Now</a
                            >
                            <a href="{{ route('products') }}" class="btn btn-gray"
                              >View Details</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="swiper-slide">
                      <div class="prod-card">
                        <a href="{{ route('products') }}" class="img">
                          <img
                            src="{{ asset('assets/images/home/gym3.jpg') }}"
                            alt="Compact Fitness"
                          />
                        </a>

                        <div class="content">
                          <h5>Compact Fitness</h5>
                          <p>
                            Practical equipment designed for smaller home
                            workout spaces.
                          </p>
                          <div class="btns">
                            <a
                              href="javascript:void(0)"
                              data-model=".enquire-pop"
                              class="btn btn-primary"
                              >Enquire Now</a
                            >
                            <a href="{{ route('products') }}" class="btn btn-gray"
                              >View Details</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="swiper-slide">
                      <div class="prod-card">
                        <a href="{{ route('products') }}" class="img">
                          <img
                            src="{{ asset('assets/images/home/gym2.jpg') }}"
                            alt="Home Strength"
                          />
                        </a>

                        <div class="content">
                          <h5>Home Strength</h5>
                          <p>
                            Multi-functional and space-efficient strength
                            training equipment.
                          </p>
                          <div class="btns">
                            <a
                              href="javascript:void(0)"
                              data-model=".enquire-pop"
                              class="btn btn-primary"
                              >Enquire Now</a
                            >
                            <a href="{{ route('products') }}" class="btn btn-gray"
                              >View Details</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="swiper-group">
                  <button type="button" class="thirdSilder-prev btn-prev">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 1024 1024"
                    >
                      <path
                        fill="#ffff"
                        d="M609.408 149.376L277.76 489.6a32 32 0 0 0 0 44.672l331.648 340.352a29.12 29.12 0 0 0 41.728 0a30.59 30.59 0 0 0 0-42.752L339.264 511.936l311.872-319.872a30.59 30.59 0 0 0 0-42.688a29.12 29.12 0 0 0-41.728 0"
                      ></path>
                    </svg>
                  </button>
                  <button type="button" class="thirdSilder-next btn-next">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 1024 1024"
                    >
                      <path
                        fill="#ffff"
                        d="M609.408 149.376L277.76 489.6a32 32 0 0 0 0 44.672l331.648 340.352a29.12 29.12 0 0 0 41.728 0a30.59 30.59 0 0 0 0-42.752L339.264 511.936l311.872-319.872a30.59 30.59 0 0 0 0-42.688a29.12 29.12 0 0 0-41.728 0"
                      ></path>
                    </svg>
                  </button>
                </div>
              </div>

              <div class="center-btn">
                <a href="{{ route('products') }}" class="btn btn-gray">
                  View All Home Equipment
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="0.5em"
                    height="1em"
                    viewBox="0 0 12 24"
                  >
                    <path d="M0 0h12v24H0z" fill="none" />
                    <path
                      fill="currentColor"
                      fill-rule="evenodd"
                      d="M10.157 12.711L4.5 18.368l-1.414-1.414l4.95-4.95l-4.95-4.95L4.5 5.64l5.657 5.657a1 1 0 0 1 0 1.414"
                    />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="home-secA">
        <div class="grid-wrapper">
          <div class="programSlider swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img
                  src="{{ asset('assets/images/home/gym1.jpg') }}"
                  alt="Commercial Gym Equipment"
                />
              </div>

              <div class="swiper-slide">
                <img
                  src="{{ asset('assets/images/home/gym2.jpg') }}"
                  alt="Home Gym Equipment"
                />
              </div>

              <div class="swiper-slide">
                <img
                  src="{{ asset('assets/images/home/gym3.jpg') }}"
                  alt="Outdoor Fitness Equipment"
                />
              </div>
            </div>
          </div>

          <ul class="grid">
            <!-- Commercial Equipment -->
            <li class="item active">
              <div class="item-img">
                <img
                  src="{{ asset('assets/images/home/commercial-equipment.jpg') }}"
                  alt="Commercial Gym Equipment"
                />
              </div>

              <div class="content">
                <svg
                  class="plate-icon"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M4 9v6M20 9v6M7 7v10M17 7v10M7 12h10"
                    stroke="currentColor"
                    stroke-width="1.6"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>

                <h5>Commercial Equipment</h5>

                <p>
                  High-performance gym equipment designed for commercial gyms,
                  fitness centres, hotels and professional training facilities.
                </p>

                <a href="{{ route('products') }}" class="btn btn-gray">
                  Explore Equipment
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="0.5em"
                    height="1em"
                    viewBox="0 0 12 24"
                  >
                    <path d="M0 0h12v24H0z" fill="none" />
                    <path
                      fill="currentColor"
                      fill-rule="evenodd"
                      d="M10.157 12.711L4.5 18.368l-1.414-1.414l4.95-4.95l-4.95-4.95L4.5 5.64l5.657 5.657a1 1 0 0 1 0 1.414"
                    />
                  </svg>
                </a>
              </div>
            </li>

            <!-- Home Equipment -->
            <li class="item">
              <div class="item-img">
                <img
                  src="{{ asset('assets/images/home/home-equipment.jpg') }}"
                  alt="Home Gym Equipment"
                />
              </div>

              <div class="content">
                <svg
                  class="plate-icon"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M3 21V8l9-5 9 5v13"
                    stroke="currentColor"
                    stroke-width="1.6"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M9 21v-7h6v7"
                    stroke="currentColor"
                    stroke-width="1.6"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>

                <h5>Home Equipment</h5>

                <p>
                  Compact and versatile fitness equipment to create an effective
                  workout space in the comfort of your home.
                </p>

                <a href="{{ route('products') }}" class="btn btn-gray">
                  Explore Equipment
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="0.5em"
                    height="1em"
                    viewBox="0 0 12 24"
                  >
                    <path d="M0 0h12v24H0z" fill="none" />
                    <path
                      fill="currentColor"
                      fill-rule="evenodd"
                      d="M10.157 12.711L4.5 18.368l-1.414-1.414l4.95-4.95l-4.95-4.95L4.5 5.64l5.657 5.657a1 1 0 0 1 0 1.414"
                    />
                  </svg>
                </a>
              </div>
            </li>

            <!-- Outdoor Equipment -->
            <li class="item">
              <div class="item-img">
                <img
                  src="{{ asset('assets/images/home/outdoor-equipment.jpg') }}"
                  alt="Outdoor Fitness Equipment"
                />
              </div>

              <div class="content">
                <svg
                  class="plate-icon"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M4 12l5 5L20 6"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>

                <h5>Outdoor Equipment</h5>

                <p>
                  Durable outdoor fitness solutions designed for parks,
                  communities, schools and open-air workout spaces.
                </p>

                <a href="{{ route('products') }}" class="btn btn-gray">
                  Explore Equipment
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="0.5em"
                    height="1em"
                    viewBox="0 0 12 24"
                  >
                    <path d="M0 0h12v24H0z" fill="none" />
                    <path
                      fill="currentColor"
                      fill-rule="evenodd"
                      d="M10.157 12.711L4.5 18.368l-1.414-1.414l4.95-4.95l-4.95-4.95L4.5 5.64l5.657 5.657a1 1 0 0 1 0 1.414"
                    />
                  </svg>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </section>

      <section class="home-secD">
        <div class="container">
          <div class="heading">
            <h3>YOUR SPACE. <br /><span>OUR EXPERTISE.</span></h3>
            <p>
              Have a space? Fitway handles planning, equipment, interiors,
              installation, and complete gym setup from start to finish.
            </p>
          </div>

          <div class="secD-process">
            <!-- ===== sticky rail ===== -->
            <div class="secD-rail">
              <ol class="rail-list">
                <li class="rail-item active" data-step="1">
                  <span class="rail-num">01</span>
                  <span class="rail-title">Space Planning</span>
                </li>
                <li class="rail-item" data-step="2">
                  <span class="rail-num">02</span>
                  <span class="rail-title">Gym Design</span>
                </li>
                <li class="rail-item" data-step="3">
                  <span class="rail-num">03</span>
                  <span class="rail-title">Equipment</span>
                </li>
                <li class="rail-item" data-step="4">
                  <span class="rail-num">04</span>
                  <span class="rail-title">Interiors</span>
                </li>
                <li class="rail-item" data-step="5">
                  <span class="rail-num">05</span>
                  <span class="rail-title">Installation</span>
                </li>
                <li class="rail-item" data-step="6">
                  <span class="rail-num">06</span>
                  <span class="rail-title">Ready to Operate</span>
                </li>
              </ol>

              <a href="javascript:void(0)" class="btn btn-primary">
                Get Your Gym Planned
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="0.5em"
                  height="1em"
                  viewBox="0 0 12 24"
                >
                  <path d="M0 0h12v24H0z" fill="none" />
                  <path
                    fill="currentColor"
                    fill-rule="evenodd"
                    d="M10.157 12.711L4.5 18.368l-1.414-1.414l4.95-4.95l-4.95-4.95L4.5 5.64l5.657 5.657a1 1 0 0 1 0 1.414"
                  />
                </svg>
              </a>
            </div>

            <!-- ===== scrolling steps ===== -->
            <ul class="secD-steps">
              <li class="step" data-step="1">
                <div class="step-media">
                  <img
                    src="{{ asset('assets/images/home/planing.jpg') }}"
                    alt="Space Planning"
                  />

                  <div class="step-overlay">
                    <span class="step-num">01</span>
                    <h5>Space Planning</h5>
                    <p>
                      We understand your space, requirements and training goals.
                    </p>
                  </div>
                </div>
              </li>

              <li class="step" data-step="2">
                <div class="step-media">
                  <img
                    src="{{ asset('assets/images/home/GymDesign.avif') }}"
                    alt="Gym Design"
                  />

                  <div class="step-overlay">
                    <span class="step-num">02</span>
                    <h5>Gym Design</h5>
                    <p>
                      We plan the layout and create a functional fitness
                      environment.
                    </p>
                  </div>
                </div>
              </li>

              <li class="step" data-step="3">
                <div class="step-media">
                  <img src="{{ asset('assets/images/home/gym1.jpg') }}" alt="Equipment" />

                  <div class="step-overlay">
                    <span class="step-num">03</span>
                    <h5>Equipment</h5>
                    <p>
                      We select and supply the right machines and equipment.
                    </p>
                  </div>
                </div>
              </li>

              <li class="step" data-step="4">
                <div class="step-media">
                  <img
                    src="{{ asset('assets/images/home/Interiors.avif') }}"
                    alt="Interiors"
                  />

                  <div class="step-overlay">
                    <span class="step-num">04</span>
                    <h5>Interiors</h5>
                    <p>
                      We help create the right flooring, walls, lighting and
                      overall gym environment.
                    </p>
                  </div>
                </div>
              </li>

              <li class="step" data-step="5">
                <div class="step-media">
                  <img
                    src="{{ asset('assets/images/home/install.jpg') }}"
                    alt="Installation"
                  />

                  <div class="step-overlay">
                    <span class="step-num">05</span>
                    <h5>Installation</h5>
                    <p>
                      Our team delivers and installs the equipment
                      professionally.
                    </p>
                  </div>
                </div>
              </li>

              <li class="step" data-step="6">
                <div class="step-media">
                  <img
                    src="{{ asset('assets/images/home/Ready-Operate.avif') }}"
                    alt="Ready to Operate"
                  />

                  <div class="step-overlay">
                    <span class="step-num">06</span>
                    <h5>Ready to Operate</h5>
                    <p>
                      Your complete gym is ready for members and daily
                      operations.
                    </p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </section>

      <section class="home-secI">
        <div class="container">
          <div class="heading">
            <h3>Trusted by <span>Fitness Businesses</span></h3>
            <p>
              From equipment supply to complete gym setup, our clients trust
              Fitway to deliver quality, reliability and professional service.
            </p>
          </div>

          <div class="swiper-wrap">
            <div class="swiper TestimonialSlider">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="test_card">
                    <span class="quote-mark">&#8220;</span>
                    <p>
                      Fitway handled our complete gym setup from equipment
                      selection to installation. The team understood our
                      requirements and delivered everything professionally.
                    </p>
                    <div class="test_author">
                      <span class="author-avatar">R</span>
                      <div class="author-info">
                        <h5>Rahul Sharma</h5>
                        <span>Gym Owner</span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div class="test_card">
                    <span class="quote-mark">&#8220;</span>
                    <p>
                      We were impressed with the quality of the equipment and
                      the support throughout the project. Fitway made the entire
                      setup process simple and hassle-free.
                    </p>
                    <div class="test_author">
                      <span class="author-avatar">A</span>
                      <div class="author-info">
                        <h5>Amit Patel</h5>
                        <span>Fitness Center Owner</span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div class="test_card">
                    <span class="quote-mark">&#8220;</span>
                    <p>
                      From planning the space to installing the equipment,
                      Fitway managed everything smoothly. We are very happy with
                      the final result.
                    </p>
                    <div class="test_author">
                      <span class="author-avatar">N</span>
                      <div class="author-info">
                        <h5>Neha Mehta</h5>
                        <span>Studio Owner</span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div class="test_card">
                    <span class="quote-mark">&#8220;</span>
                    <p>
                      We were impressed with the quality of the equipment and
                      the support throughout the project. Fitway made the entire
                      setup process simple and hassle-free.
                    </p>
                    <div class="test_author">
                      <span class="author-avatar">A</span>
                      <div class="author-info">
                        <h5>Amit Patel</h5>
                        <span>Fitness Center Owner</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-group">
              <button type="button" class="TestimonialSlider-prev btn-prev">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                  <path
                    fill="#ffff"
                    d="M609.408 149.376L277.76 489.6a32 32 0 0 0 0 44.672l331.648 340.352a29.12 29.12 0 0 0 41.728 0a30.59 30.59 0 0 0 0-42.752L339.264 511.936l311.872-319.872a30.59 30.59 0 0 0 0-42.688a29.12 29.12 0 0 0-41.728 0"
                  ></path>
                </svg>
              </button>
              <button type="button" class="TestimonialSlider-next btn-next">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                  <path
                    fill="#ffff"
                    d="M609.408 149.376L277.76 489.6a32 32 0 0 0 0 44.672l331.648 340.352a29.12 29.12 0 0 0 41.728 0a30.59 30.59 0 0 0 0-42.752L339.264 511.936l311.872-319.872a30.59 30.59 0 0 0 0-42.688a29.12 29.12 0 0 0-41.728 0"
                  ></path>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </section>

      <section class="home-secE">
        <div class="container">
          <div class="heading">
            <h3>Built for every<br /><span>fitness space.</span></h3>
            <p>
              Built with quality equipment and smart solutions for gyms, homes,
              hotels, clubs and professional training spaces.
            </p>
          </div>

          <ul class="secE-grid">
            <li class="secE-card featured">
              <div class="card-media">
                <img
                  src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&w=1200&q=80"
                  alt="Commercial Gyms"
                />
              </div>

              <div class="card-content">
                <span class="tag">
                  <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M4 21V7l8-4 8 4v14M9 21v-6h6v6M9 11h.01M15 11h.01M9 15h.01M15 15h.01"
                      stroke="currentColor"
                      stroke-width="1.6"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                  Commercial
                </span>
                <h5>Commercial Gyms</h5>
                <p>
                  Complete solutions for independent gyms and fitness centers.
                </p>
              </div>
            </li>

            <li class="secE-card">
              <div class="card-media">
                <img
                  src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?auto=format&fit=crop&w=900&q=80"
                  alt="Hotel & Resort Gyms"
                />
              </div>

              <div class="card-content">
                <span class="tag">
                  <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M3 21V9l9-6 9 6v12M3 21h18M7 21v-6h4v6"
                      stroke="currentColor"
                      stroke-width="1.6"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                  Hospitality
                </span>
                <h5>Hotel & Resort Gyms</h5>
                <p>
                  Professional fitness spaces designed for hospitality
                  environments.
                </p>
              </div>
            </li>

            <li class="secE-card">
              <div class="card-media">
                <img
                  src="https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=900&q=80"
                  alt="Corporate Gyms"
                />
              </div>

              <div class="card-content">
                <span class="tag">
                  <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M3 21h18M6 21V10l6-4 6 4v11M10 21v-5h4v5"
                      stroke="currentColor"
                      stroke-width="1.6"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                  Corporate
                </span>
                <h5>Corporate Gyms</h5>
                <p>Functional wellness spaces for offices and organizations.</p>
              </div>
            </li>

            <li class="secE-card">
              <div class="card-media">
                <img
                  src="https://images.unsplash.com/photo-1584735175315-9d5df23860e6?auto=format&fit=crop&w=900&q=80"
                  alt="Home & Private Gyms"
                />
              </div>

              <div class="card-content">
                <span class="tag">
                  <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M3 11l9-8 9 8M5 10v10h14V10"
                      stroke="currentColor"
                      stroke-width="1.6"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                  Private
                </span>
                <h5>Home & Private Gyms</h5>
                <p>
                  Personalized equipment and setup solutions for private spaces.
                </p>
              </div>
            </li>

            <li class="secE-card cta">
              <div class="card-content">
                <h5>Not Sure What You Need?</h5>
                <p>
                  Tell us about your space and goals — we'll help you find the
                  right gym solution.
                </p>
                <div class="btns">
                  <a href="{{ route('products') }}" class="btn btn-white">Explore</a>
                  <a
                    href="javascript:void(0)"
                    data-model=".enquire-pop"
                    class="btn btn-primary"
                    >Enquire Now</a
                  >
                </div>
              </div>
            </li>
          </ul>

          <div class="center-btn">
            <a href="{{ route('products') }}" class="btn btn-primary">
              Explore Gym Solutions
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="0.5em"
                height="1em"
                viewBox="0 0 12 24"
              >
                <path d="M0 0h12v24H0z" fill="none" />
                <path
                  fill="currentColor"
                  fill-rule="evenodd"
                  d="M10.157 12.711L4.5 18.368l-1.414-1.414l4.95-4.95l-4.95-4.95L4.5 5.64l5.657 5.657a1 1 0 0 1 0 1.414"
                />
              </svg>
            </a>
          </div>
        </div>
      </section>

      <section class="home-secF">
        <div class="container">
          <div class="heading">
            <h3>Why <span>Fitway</span></h3>
            <p>
              We combine quality equipment, expert guidance and complete gym
              solutions to create spaces built for performance.
            </p>
          </div>

          <div class="points-list">
            <div class="point">
              <span class="point-num">01</span>
              <div class="point-text">
                <h4>Quality Equipment</h4>
                <p>
                  Professional equipment selected for performance and
                  durability.
                </p>
              </div>
              <div class="point-img">
                <img
                  src="{{ asset('assets/images/home/gym3.jpg') }}"
                  alt="Quality Equipment"
                />
              </div>
            </div>

            <div class="point">
              <span class="point-num">02</span>
              <div class="point-text">
                <h4>Complete Execution</h4>
                <p>
                  From planning and interiors to installation and final setup.
                </p>
              </div>
              <div class="point-img">
                <img
                  src="{{ asset('assets/images/home/gym1.jpg') }}"
                  alt="Complete Execution"
                />
              </div>
            </div>

            <div class="point">
              <span class="point-num">03</span>
              <div class="point-text">
                <h4>Expert Guidance</h4>
                <p>
                  We help you make the right decisions for your space and
                  requirements.
                </p>
              </div>
              <div class="point-img">
                <img src="{{ asset('assets/images/home/gym2.jpg') }}" alt="Expert Guidance" />
              </div>
            </div>

            <div class="point">
              <span class="point-num">04</span>
              <div class="point-text">
                <h4>End-to-End Support</h4>
                <p>
                  One team managing your gym project from beginning to
                  completion.
                </p>
              </div>
              <div class="point-img">
                <img
                  src="{{ asset('assets/images/home/gym3.jpg') }}"
                  alt="End-to-End Support"
                />
              </div>
            </div>
          </div>

          <div class="app-promo">
            <div class="app-promo-inner">
              <div class="app-promo-text">
                <span class="eyebrow">Start Your Gym Project</span>

                <h3>
                  Build Your Gym<br />
                  With Fitway.
                </h3>

                <p>
                  Tell us about your space and requirements. Our team will help
                  you plan the right equipment, layout and complete gym setup.
                </p>

                <form class="form form-grid" method="POST" action="#">
                  @csrf
                  <div class="form-group">
                    <input
                      name="email"
                      type="email"
                      placeholder=" "
                      class="form-control"
                      required
                    />
                    <label for="txtJoinNowEmail">
                      Enter your email address
                    </label>
                  </div>

                  <button type="submit" class="sbmt btn btn-white">
                    Get Started
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="0.5em"
                      height="1em"
                      viewBox="0 0 12 24"
                    >
                      <path d="M0 0h12v24H0z" fill="none" />
                      <path
                        fill="currentColor"
                        fill-rule="evenodd"
                        d="M10.157 12.711L4.5 18.368l-1.414-1.414l4.95-4.95l-4.95-4.95L4.5 5.64l5.657 5.657a1 1 0 0 1 0 1.414"
                      />
                    </svg>
                  </button>
                </form>
              </div>

              <div class="app-promo-visual">
                <div class="phone phone--back">
                  <img
                    src="{{ asset('assets/images/home/cta.png') }}"
                    alt="Fitway gym equipment"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="home-secH">
        <div class="container">
          <div class="heading">
            <h3>
              Gyms <span>We've Built.</span>
            </h3>

            <p>
              Explore our completed gym projects, showcasing quality equipment,
              thoughtful design, professional installation, and complete fitness
              solutions.
            </p>
          </div>

          <ul class="tab-nav">
            <li class="active" data-tab="all">All</li>
            <li data-tab="commercial">Commercial Gyms</li>
            <li data-tab="fitness-centers">Fitness Centers</li>
            <li data-tab="corporate">Corporate Gyms</li>
            <li data-tab="private">Private Gyms</li>
          </ul>

          <div class="tab-nav-content">
            <div class="tabs active" data-tab="all">
              <div class="portfolio-grid">
                <div class="portfolio-item">
                  <span class="item-num">01</span>
                  <div class="item-img">
                    <img
                      src="{{ asset('assets/images/home/gym1.jpg') }}"
                      alt="Complete Commercial Gym"
                    />
                  </div>
                  <div class="item-info">
                    <div class="content">
                      <h5>Complete Commercial Gym</h5>
                      <span>Gym Setup &amp; Equipment</span>
                    </div>
                    <button
                      type="button"
                      class="play-btn"
                      data-video="{{ asset('assets/video/banner1.mp4') }}"
                    >
                      <i class="fa-solid fa-play"></i>
                    </button>
                  </div>
                </div>

                <div class="portfolio-item">
                  <span class="item-num">02</span>
                  <div class="item-img">
                    <img
                      src="{{ asset('assets/images/home/gym2.jpg') }}"
                      alt="Modern Fitness Center"
                    />
                  </div>
                  <div class="item-info">
                    <div class="content">
                      <h5>Modern Fitness Center</h5>
                      <span>Equipment &amp; Installation</span>
                    </div>
                    <button
                      type="button"
                      class="play-btn"
                      data-video="{{ asset('assets/video/banner2.mp4') }}"
                    >
                      <i class="fa-solid fa-play"></i>
                    </button>
                  </div>
                </div>

                <div class="portfolio-item">
                  <span class="item-num">03</span>
                  <div class="item-img">
                    <img
                      src="{{ asset('assets/images/home/gym3.jpg') }}"
                      alt="Corporate Fitness Space"
                    />
                  </div>
                  <div class="item-info">
                    <div class="content">
                      <h5>Corporate Fitness Space</h5>
                      <span>Complete Gym Solution</span>
                    </div>
                    <button type="button" class="play-btn">
                      <i class="fa-solid fa-play"></i>
                    </button>
                  </div>
                </div>

                <div class="portfolio-item">
                  <span class="item-num">04</span>
                  <div class="item-img">
                    <img
                      src="{{ asset('assets/images/home/gym1.jpg') }}"
                      alt="Private Training Gym"
                    />
                  </div>
                  <div class="item-info">
                    <div class="content">
                      <h5>Private Training Gym</h5>
                      <span>Equipment &amp; Setup</span>
                    </div>
                    <button
                      type="button"
                      class="play-btn"
                      data-video="{{ asset('assets/video/banner3.mp4') }}"
                    >
                      <i class="fa-solid fa-play"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="tabs" data-tab="commercial">
              <div class="portfolio-grid">
                <div class="portfolio-item">
                  <span class="item-num">01</span>
                  <div class="item-img">
                    <img
                      src="{{ asset('assets/images/home/gym1.jpg') }}"
                      alt="Complete Commercial Gym"
                    />
                  </div>
                  <div class="item-info">
                    <div class="content">
                      <h5>Complete Commercial Gym</h5>
                      <span>Gym Setup &amp; Equipment</span>
                    </div>
                    <button
                      type="button"
                      class="play-btn"
                      data-video="{{ asset('assets/video/banner1.mp4') }}"
                    >
                      <i class="fa-solid fa-play"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="tabs" data-tab="fitness-centers">
              <div class="portfolio-grid">
                <div class="portfolio-item">
                  <span class="item-num">02</span>
                  <div class="item-img">
                    <img
                      src="{{ asset('assets/images/home/gym2.jpg') }}"
                      alt="Modern Fitness Center"
                    />
                  </div>
                  <div class="item-info">
                    <div class="content">
                      <h5>Modern Fitness Center</h5>
                      <span>Equipment &amp; Installation</span>
                    </div>
                    <button
                      type="button"
                      class="play-btn"
                      data-video="{{ asset('assets/video/banner1.mp4') }}"
                    >
                      <i class="fa-solid fa-play"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="tabs" data-tab="corporate">
              <div class="portfolio-grid">
                <div class="portfolio-item">
                  <span class="item-num">03</span>
                  <div class="item-img">
                    <img
                      src="{{ asset('assets/images/home/gym3.jpg') }}"
                      alt="Corporate Fitness Space"
                    />
                  </div>
                  <div class="item-info">
                    <div class="content">
                      <h5>Corporate Fitness Space</h5>
                      <span>Complete Gym Solution</span>
                    </div>
                    <button
                      type="button"
                      class="play-btn"
                      data-video="{{ asset('assets/video/banner1.mp4') }}"
                    >
                      <i class="fa-solid fa-play"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="tabs" data-tab="private">
              <div class="portfolio-grid">
                <div class="portfolio-item">
                  <span class="item-num">04</span>
                  <div class="item-img">
                    <img
                      src="{{ asset('assets/images/home/gym1.jpg') }}"
                      alt="Private Training Gym"
                    />
                  </div>
                  <div class="item-info">
                    <div class="content">
                      <h5>Private Training Gym</h5>
                      <span>Equipment &amp; Setup</span>
                    </div>
                    <button
                      type="button"
                      class="play-btn"
                      data-video="{{ asset('assets/video/banner1.mp4') }}"
                    >
                      <i class="fa-solid fa-play"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="portfolio-cta">
            <a href="{{ route('portfolio') }}" class="btn btn-gray">
              Explore Our Projects
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="0.5em"
                height="1em"
                viewBox="0 0 12 24"
              >
                <path d="M0 0h12v24H0z" fill="none" />
                <path
                  fill="currentColor"
                  fill-rule="evenodd"
                  d="M10.157 12.711L4.5 18.368l-1.414-1.414l4.95-4.95l-4.95-4.95L4.5 5.64l5.657 5.657a1 1 0 0 1 0 1.414"
                />
              </svg>
            </a>
            <p>
              From concept to completion, we create fitness spaces built around
              performance, functionality and your requirements.
            </p>
          </div>
        </div>
      </section>

      <section class="home-secG">
        <div class="container">
          <div class="heading">
            <h3>
              Everything You Need to
              <span>Know About Fitway</span>
            </h3>

            <p>
              Get answers about our equipment, gym setup services, installation
              and complete fitness solutions.
            </p>
          </div>

          {{-- This block can be swapped for the Manage FAQ data:
               @foreach($faqs as $index => $faq)
                   <div class="accordion-item {{ $loop->first ? 'active' : '' }}">
                       <div class="accordion-header">
                           <h4>{{ $faq->question }}</h4>
                           <span class="accordion-icon">{{ $loop->first ? '−' : '+' }}</span>
                       </div>
                       <div class="accordion-content" @if($loop->first) style="display:block" @endif>
                           <p>{{ $faq->answer }}</p>
                       </div>
                   </div>
               @endforeach --}}
          <div class="accordion-wrapper">
            <!-- FAQ 01 -->
            <div class="accordion-item active">
              <div class="accordion-header">
                <h4>What types of gym equipment does Fitway offer?</h4>
                <span class="accordion-icon">−</span>
              </div>

              <div class="accordion-content" style="display: block">
                <p>
                  Fitway offers a wide range of professional fitness equipment,
                  including cardio machines, strength equipment, free weights,
                  functional training equipment, benches, racks and accessories
                  for commercial and home gyms.
                </p>
              </div>
            </div>

            <!-- FAQ 02 -->
            <div class="accordion-item">
              <div class="accordion-header">
                <h4>Does Fitway provide complete gym setup services?</h4>
                <span class="accordion-icon">+</span>
              </div>

              <div class="accordion-content">
                <p>
                  Yes. Fitway provides complete gym setup solutions covering
                  space planning, equipment selection, gym interiors, equipment
                  delivery, installation and final setup.
                </p>
              </div>
            </div>

            <!-- FAQ 03 -->
            <div class="accordion-item">
              <div class="accordion-header">
                <h4>Can Fitway help me plan my gym space?</h4>
                <span class="accordion-icon">+</span>
              </div>

              <div class="accordion-content">
                <p>
                  Absolutely. Our team can help you plan the layout of your
                  fitness space based on available area, training requirements,
                  equipment selection and overall functionality.
                </p>
              </div>
            </div>

            <!-- FAQ 04 -->
            <div class="accordion-item">
              <div class="accordion-header">
                <h4>Does Fitway supply equipment for commercial gyms?</h4>
                <span class="accordion-icon">+</span>
              </div>

              <div class="accordion-content">
                <p>
                  Yes. We supply equipment suitable for commercial gyms, fitness
                  centres, hotels, clubs, studios and other professional
                  training environments.
                </p>
              </div>
            </div>

            <!-- FAQ 05 -->
            <div class="accordion-item">
              <div class="accordion-header">
                <h4>Does Fitway also provide home gym equipment?</h4>
                <span class="accordion-icon">+</span>
              </div>

              <div class="accordion-content">
                <p>
                  Yes. Fitway offers equipment for home workout spaces,
                  including treadmills, exercise bikes, strength equipment,
                  benches, dumbbells and other essential fitness products.
                </p>
              </div>
            </div>

            <!-- FAQ 06 -->
            <div class="accordion-item">
              <div class="accordion-header">
                <h4>Does Fitway handle equipment installation?</h4>
                <span class="accordion-icon">+</span>
              </div>

              <div class="accordion-content">
                <p>
                  Yes. Our complete gym setup service can include equipment
                  installation and positioning to ensure your fitness space is
                  ready for use.
                </p>
              </div>
            </div>

            <!-- FAQ 07 -->
            <div class="accordion-item">
              <div class="accordion-header">
                <h4>Can Fitway create a complete gym from an empty space?</h4>
                <span class="accordion-icon">+</span>
              </div>

              <div class="accordion-content">
                <p>
                  Yes. From an empty space to a ready-to-use gym, Fitway can
                  assist with planning, equipment, interiors, installation and
                  the complete setup process.
                </p>
              </div>
            </div>

            <!-- FAQ 08 -->
            <div class="accordion-item">
              <div class="accordion-header">
                <h4>How do I get started with my gym project?</h4>
                <span class="accordion-icon">+</span>
              </div>

              <div class="accordion-content">
                <p>
                  Simply contact the Fitway team and share your space,
                  requirements and project details. We can then help you choose
                  the right equipment and plan your gym setup.
                </p>
              </div>
            </div>

            <!-- FAQ 09 -->
            <div class="accordion-item">
              <div class="accordion-header">
                <h4>Can I choose equipment according to my budget?</h4>
                <span class="accordion-icon">+</span>
              </div>

              <div class="accordion-content">
                <p>
                  Yes. Equipment selection can be planned according to your
                  available space, training requirements, usage and project
                  budget to create a practical and effective fitness setup.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection

@push('scripts')
<script>
  // Home-page-only: highlight the active step in the sticky process rail
  document.addEventListener("DOMContentLoaded", function () {
    var steps = document.querySelectorAll(".home-secD .step");
    var railItems = document.querySelectorAll(".home-secD .rail-item");

    if (!steps.length || !railItems.length) return;

    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            var stepNum = entry.target.getAttribute("data-step");

            railItems.forEach(function (item) {
              item.classList.toggle(
                "active",
                item.getAttribute("data-step") === stepNum,
              );
            });
          }
        });
      },
      {
        root: null,
        rootMargin: "-45% 0px -45% 0px",
        threshold: 0,
      },
    );

    steps.forEach(function (step) {
      observer.observe(step);
    });
  });
</script>
@endpush