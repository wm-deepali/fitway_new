@extends('layouts.gym-app')

@section('title',  $pageSeo->seo->meta_title ?? 'Hotels & Resorts Gym Setup')
@section('meta_description', $pageSeo->seo->meta_description ?? 'Create a premium fitness space designed around your property and your guests.')

@section('content')

      <!-- HERO + LEAD FORM -->
   <section class="gym-setup-hero" id="home">
  <div class="gym-setup-hero__bg">
    <img src="{{ asset('assets/images/home/resort-banner.jpg') }}" alt="Hotels & Resorts Gym Setup">

    <div class="gym-setup-hero__overlay"></div>
  </div>

  <div class="container">
    <div class="gym-setup-hero__grid">

      <!-- Hero Content -->
      <div class="gym-setup-hero__content reveal">
        <span class="label">Hotels &amp; Resorts Gym Setup</span>

        <h1>Elevate Every Guest's Fitness Experience.</h1>

        <p>
          Create a premium fitness space designed around your property and
          your guests. Fitway provides complete hotel and resort gym
          solutions, from space planning and equipment selection to
          professional installation and final setup.
        </p>

        <ul class="gym-setup-hero__points">
          <li>
            <svg viewBox="0 0 24 24" width="18" height="18">
              <path
                d="M20 6L9 17l-5-5"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
              />
            </svg>
            Guest-Focused Fitness Planning
          </li>

          <li>
            <svg viewBox="0 0 24 24" width="18" height="18">
              <path
                d="M20 6L9 17l-5-5"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
              />
            </svg>
            Premium Commercial Equipment
          </li>

          <li>
            <svg viewBox="0 0 24 24" width="18" height="18">
              <path
                d="M20 6L9 17l-5-5"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
              />
            </svg>
            Complete Installation &amp; Support
          </li>
        </ul>

        <a href="#services" class="btn btn-outline-white">
          Explore Our Solutions
        </a>
      </div>

      <!-- Lead Form -->
      <div class="gym-setup-hero__form-wrap reveal">
        <div class="contact-form">
          <form
            class="contact-form__form"
            id="gymSetupForm"
            method="post"
            novalidate
          >

            <div class="contact-form__group">
              <label for="fullName">Full Name</label>

              <input
                type="text"
                id="fullName"
                name="fullName"
                placeholder="Enter your full name"
                required
              />

              <span class="contact-form__error"></span>
            </div>

            <div class="contact-form__row">

              <div class="contact-form__group">
                <label for="mobileNumber">Mobile Number</label>

                <input
                  type="tel"
                  id="mobileNumber"
                  name="mobileNumber"
                  placeholder="Enter your mobile number"
                  required
                />

                <span class="contact-form__error"></span>
              </div>

              <div class="contact-form__group">
                <label for="emailId">Email Id</label>

                <input
                  type="email"
                  id="emailId"
                  name="emailId"
                  placeholder="Enter your email id"
                  required
                />

                <span class="contact-form__error"></span>
              </div>

            </div>

            <div class="contact-form__group">
              <span class="contact-form__label">
                Select Your Requirements
              </span>

              <div class="contact-form__checkbox-list">

                <label class="contact-form__checkbox">
                  <input
                    type="checkbox"
                    name="requirement"
                    value="Hotel Gym Equipment"
                  />
                  <span class="contact-form__checkbox-box"></span>
                  <span class="contact-form__checkbox-label">
                    Gym Equipment
                  </span>
                </label>

                <label class="contact-form__checkbox">
                  <input
                    type="checkbox"
                    name="requirement"
                    value="Resort Fitness Planning"
                  />
                  <span class="contact-form__checkbox-box"></span>
                  <span class="contact-form__checkbox-label">
                    Space Planning
                  </span>
                </label>

                <label class="contact-form__checkbox">
                  <input
                    type="checkbox"
                    name="requirement"
                    value="Complete Gym Setup"
                  />
                  <span class="contact-form__checkbox-box"></span>
                  <span class="contact-form__checkbox-label">
                    Complete Gym Setup
                  </span>
                </label>

                <label class="contact-form__checkbox">
                  <input
                    type="checkbox"
                    name="requirement"
                    value="Maintenance Services"
                  />
                  <span class="contact-form__checkbox-box"></span>
                  <span class="contact-form__checkbox-label">
                    Maintenance Services
                  </span>
                </label>

              </div>
            </div>

            <div class="contact-form__group">
              <label for="details">
                Enter Details (If any)
              </label>

              <textarea
                id="details"
                name="details"
                rows="2"
                placeholder="Tell us about your hotel or resort gym requirement..."
              ></textarea>
            </div>

            <button
              type="submit"
              class="btn btn-primary contact-form__cta"
            >
              Get Free Consultation
            </button>

            <p class="contact-form__note">
              Your details are safe with us. Our team will contact you shortly.
            </p>

          </form>
        </div>
      </div>

    </div>
  </div>
</section>
      <!-- ABOUT -->
      <section class="gym-setup-intro" id="about-solution">
        <div class="container">
          <div class="gym-setup-intro__grid">
            <div class="gym-setup-intro__media reveal">
              <img
                src="{{ asset('assets/images/home/Complete-Resort.jpg') }}"
                alt="Modern hotel gym floor"
              />
            </div>
            <div class="gym-setup-intro__content reveal">
              <span class="label">Complete Hotel &amp; Resort Gym Setup</span>
              <h2>More Than a Gym. A Better Guest Experience.</h2>
              <p>
                A well-planned hotel or resort gym gives guests a convenient
                and premium way to maintain their fitness routine while
                travelling. Fitway helps create functional fitness spaces
                that match your property, available space and guest
                expectations.
              </p>

              <ul class="gym-setup-intro__points">
                <li>
                  <svg viewBox="0 0 24 24" width="20" height="20">
                    <path
                      d="M20 6L9 17l-5-5"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                    /></svg
                  >Smart Space Planning
                </li>
                <li>
                  <svg viewBox="0 0 24 24" width="20" height="20">
                    <path
                      d="M20 6L9 17l-5-5"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                    /></svg
                  >Premium Equipment Selection
                </li>
                <li>
                  <svg viewBox="0 0 24 24" width="20" height="20">
                    <path
                      d="M20 6L9 17l-5-5"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                    /></svg
                  >Complete Setup &amp; Installation
                </li>
              </ul>

              <a href="#contact" class="btn btn-black">Talk to Our Experts</a>
            </div>
          </div>
        </div>
      </section>

      <!-- SERVICES -->
      <section class="gym-setup-services" id="services">
        <div class="container">
          <div class="heading">
            <h3>What <span>We Do</span></h3>
            <p>
              From an empty space to a fully functional hotel gym, we manage
              every important part of your setup.
            </p>
          </div>

          <div class="gym-setup-services__grid">
            <article class="gym-setup-services__card reveal">
              <span class="gym-setup-services__num">01</span>
              <div class="gym-setup-services__icon">
                <svg viewBox="0 0 24 24" width="28" height="28">
                  <path
                    d="M3 9l9-6 9 6v11a1 1 0 01-1 1H4a1 1 0 01-1-1V9z"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.6"
                  />
                </svg>
              </div>
              <h3>Hotel Gym Space Planning</h3>
              <p>
                We help you plan a fitness space that works efficiently
                within your available property area.
              </p>
            </article>

            <article class="gym-setup-services__card reveal">
              <span class="gym-setup-services__num">02</span>
              <div class="gym-setup-services__icon">
                <svg viewBox="0 0 24 24" width="28" height="28">
                  <path
                    d="M3 3h7v7H3zM14 3h7v7h-7zM3 14h7v7H3zM14 14h7v7h-7z"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.6"
                  />
                </svg>
              </div>
              <h3>Fitness Centre Layout</h3>
              <p>
                Create a comfortable and functional layout for smooth
                movement and a better guest experience.
              </p>
            </article>

            <article class="gym-setup-services__card reveal">
              <span class="gym-setup-services__num">03</span>
              <div class="gym-setup-services__icon">
                <svg viewBox="0 0 24 24" width="28" height="28">
                  <path
                    d="M6.5 6.5l11 11M4 12h16M6.5 17.5l11-11"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.6"
                  />
                </svg>
              </div>
              <h3>Equipment Selection</h3>
              <p>
                Choose the right cardio, strength and functional equipment
                for your guests' fitness needs.
              </p>
            </article>

            <article class="gym-setup-services__card reveal">
              <span class="gym-setup-services__num">04</span>
              <div class="gym-setup-services__icon">
                <svg viewBox="0 0 24 24" width="28" height="28">
                  <path
                    d="M3 7h18M3 12h18M3 17h18"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.6"
                  />
                </svg>
              </div>
              <h3>Premium Equipment Supply</h3>
              <p>
                Get durable and reliable equipment suitable for hospitality
                environments and daily guest use.
              </p>
            </article>

            <article class="gym-setup-services__card reveal">
              <span class="gym-setup-services__num">05</span>
              <div class="gym-setup-services__icon">
                <svg viewBox="0 0 24 24" width="28" height="28">
                  <path
                    d="M3 12h13l-4-4m4 4l-4 4"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.6"
                  />
                </svg>
              </div>
              <h3>Delivery &amp; Installation</h3>
              <p>
                Our team manages professional delivery, placement and
                installation with a smooth setup process.
              </p>
            </article>

            <article class="gym-setup-services__card reveal">
              <span class="gym-setup-services__num">06</span>
              <div class="gym-setup-services__icon">
                <svg viewBox="0 0 24 24" width="28" height="28">
                  <path
                    d="M20 6L9 17l-5-5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.6"
                  />
                </svg>
              </div>
              <h3>Maintenance &amp; Support</h3>
              <p>
                We help maintain your fitness equipment and keep the facility
                ready for guests.
              </p>
            </article>
          </div>

          <div class="gym-setup-services__cta">
            <a href="#contact" class="btn btn-outline-primary"
              >Talk to Our Experts</a
            >
          </div>
        </div>
      </section>

      <!-- PROCESS -->
      <section class="gym-setup-process" id="process">
        <div class="container">
          <div class="heading">
            <h3>How <span>It Works</span></h3>
            <p>
              Our structured process helps turn your property space into a
              complete and functional guest fitness facility.
            </p>
          </div>

          <div class="gym-setup-process__track">
            <div class="gym-setup-process__step reveal">
              <span class="gym-setup-process__num">01</span>
              <h3>Consultation</h3>
              <p>
                We understand your property, available space, guest profile
                and fitness requirements.
              </p>
            </div>
            <div class="gym-setup-process__step reveal">
              <span class="gym-setup-process__num">02</span>
              <h3>Space Planning</h3>
              <p>
                We create a practical layout that fits naturally within your
                hotel or resort.
              </p>
            </div>
            <div class="gym-setup-process__step reveal">
              <span class="gym-setup-process__num">03</span>
              <h3>Selection</h3>
              <p>
                Our team selects premium equipment based on guest needs,
                usage and available space.
              </p>
            </div>
            <div class="gym-setup-process__step reveal">
              <span class="gym-setup-process__num">04</span>
              <h3>Installation</h3>
              <p>
                We deliver and professionally install the equipment at your
                property.
              </p>
            </div>
            <div class="gym-setup-process__step reveal">
              <span class="gym-setup-process__num">05</span>
              <h3>Ready for Guests</h3>
              <p>Your fitness space is prepared and ready to become part of the guest experience.</p>
            </div>
          </div>

          <div class="gym-setup-process__cta">
            <a href="#contact" class="btn btn-primary">Start Your Gym Setup</a>
          </div>
        </div>
      </section>

      <!-- MID CTA -->
      <section class="gym-setup-mid-cta">
        <div class="container">
          <div class="gym-setup-mid-cta__inner reveal">
            <div class="gym-setup-mid-cta__text">
              <span class="label">Ready to Get Started?</span>
              <h2>Have a Space? Create a Better Guest Experience.</h2>
              <p>
                Tell us about your hotel or resort property and our team
                will help you plan the right fitness space and equipment
                solution.
              </p>
            </div>
            <div class="gym-setup-mid-cta__actions">
              <a href="#contact" class="btn btn-primary"
                >Get Free Consultation</a
              >
              <a href="#projects" class="btn btn-outline-white"
                >View Our Projects</a
              >
            </div>
          </div>
        </div>
      </section>

      <!-- EQUIPMENT -->
      <section class="gym-setup-equipment" id="equipment">
        <div class="container">
          <div class="heading">
            <h3>Everything Your Hotel Gym Needs <span>to Perform</span></h3>
            <p>
              Build a complete guest fitness space with the right equipment
              for cardio, strength, functional training and more.
            </p>
          </div>

          <div class="gym-setup-equipment__grid">
            <a href="#contact" class="gym-setup-equipment__card reveal">
              <img
                src="{{ asset('assets/images/home/Cardio-Equipment.jpg') }}"
                alt="Cardio equipment"
              />
              <div class="gym-setup-equipment__overlay"></div>
              <div class="gym-setup-equipment__info">
                <h3>Cardio Equipment</h3>
                <p>
                  Treadmills, bikes and cross trainers built for daily guest
                  use.
                </p>
                <svg viewBox="0 0 24 24" width="20" height="20">
                  <path
                    d="M7 17L17 7M17 7H9M17 7v8"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                  />
                </svg>
              </div>
            </a>

            <a href="#contact" class="gym-setup-equipment__card reveal">
              <img
                src="{{ asset('assets/images/home/Strength Equipment.jpg') }}"
                alt="Strength training machines"
              />
              <div class="gym-setup-equipment__overlay"></div>
              <div class="gym-setup-equipment__info">
                <h3>Strength Equipment</h3>
                <p>
                  Space-smart machines designed for effective guest training.
                </p>
                <svg viewBox="0 0 24 24" width="20" height="20">
                  <path
                    d="M7 17L17 7M17 7H9M17 7v8"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                  />
                </svg>
              </div>
            </a>

            <a href="#contact" class="gym-setup-equipment__card reveal">
              <img
                src="{{ asset('assets/images/home/Free Weights.jpg') }}"
                alt="Free weights dumbbells"
              />
              <div class="gym-setup-equipment__overlay"></div>
              <div class="gym-setup-equipment__info">
                <h3>Free Weights</h3>
                <p>
                  Dumbbells, barbells, plates and essentials for guest
                  training.
                </p>
                <svg viewBox="0 0 24 24" width="20" height="20">
                  <path
                    d="M7 17L17 7M17 7H9M17 7v8"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                  />
                </svg>
              </div>
            </a>

            <a href="#contact" class="gym-setup-equipment__card reveal">
              <img
                src="{{ asset('assets/images/home/private-trianer.avif') }}"
                alt="Functional training area"
              />
              <div class="gym-setup-equipment__overlay"></div>
              <div class="gym-setup-equipment__info">
                <h3>Functional Training</h3>
                <p>
                  Versatile equipment for movement and performance during a
                  guest's stay.
                </p>
                <svg viewBox="0 0 24 24" width="20" height="20">
                  <path
                    d="M7 17L17 7M17 7H9M17 7v8"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                  />
                </svg>
              </div>
            </a>

            <a href="#contact" class="gym-setup-equipment__card reveal">
              <img
                src="{{ asset('assets/images/home/complete-corprate-gym.jpg') }}"
                alt="Multi-use training equipment"
              />
              <div class="gym-setup-equipment__overlay"></div>
              <div class="gym-setup-equipment__info">
                <h3>Multi-Use Training Equipment</h3>
                <p>
                  Sturdy, space-conscious equipment built for safe, everyday
                  guest use.
                </p>
                <svg viewBox="0 0 24 24" width="20" height="20">
                  <path
                    d="M7 17L17 7M17 7H9M17 7v8"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                  />
                </svg>
              </div>
            </a>

            <a href="#contact" class="gym-setup-equipment__card reveal">
              <img
                src="{{ asset('assets/images/home/3d-gym-equipment.jpg') }}"
                alt="Gym accessories"
              />
              <div class="gym-setup-equipment__overlay"></div>
              <div class="gym-setup-equipment__info">
                <h3>Fitness Accessories</h3>
                <p>
                  Essential add-ons to complete your hotel's fitness space.
                </p>
                <svg viewBox="0 0 24 24" width="20" height="20">
                  <path
                    d="M7 17L17 7M17 7H9M17 7v8"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                  />
                </svg>
              </div>
            </a>
          </div>
        </div>
      </section>

      <!-- PRODUCTS + SERVICES -->
      <section class="gym-setup-products-services">
        <div class="container">
          <div class="heading">
            <h3>Equipment <span>Meets Expertise</span></h3>
            <p>
              From individual hotel gym equipment to complete property
              solutions, Fitway helps you build every part of your setup.
            </p>
          </div>

          <div class="gym-setup-products-services__grid">
            <div class="gym-setup-products-services__block reveal">
              <img
                src="{{ asset('assets/images/home/Premium-resort.jpg') }}"
                alt="Gym equipment lineup"
              />
              <div class="gym-setup-products-services__overlay"></div>
              <div class="gym-setup-products-services__content">
                <span class="label">Premium Gym Equipment</span>
                <h3>Equipment Designed for Every Guest.</h3>
                <p>
                  Explore reliable, premium and easy-to-use equipment
                  selected for every type of hospitality fitness space.
                </p>
                <ul>
                  <li>Cardio Equipment</li>
                  <li>Strength Equipment</li>
                  <li>Free Weights</li>
                  <li>Functional Training</li>
                  <li>Multi-Use Equipment</li>
                </ul>
                <a href="#equipment" class="btn btn-outline-white"
                  >Explore Equipment</a
                >
              </div>
            </div>

            <div class="gym-setup-products-services__block reveal">
              <img
                src="{{ asset('assets/images/home/Complete-Resort.jpg') }}"
                alt="Complete gym setup service"
              />
              <div class="gym-setup-products-services__overlay"></div>
              <div class="gym-setup-products-services__content">
                <span class="label">Complete Hotel Gym Setup</span>
                <h3>From Empty Space to Guest-Ready Fitness.</h3>
                <p>
                  From planning your property to installing the final piece
                  of equipment, our team helps bring your guest fitness space
                  to life.
                </p>
                <ul>
                  <li>Space Planning</li>
                  <li>Fitness Centre Layout</li>
                  <li>Equipment Selection</li>
                  <li>Supply</li>
                  <li>Installation</li>
                  <li>Final Setup</li>
                </ul>
                <a href="#contact" class="btn btn-primary"
                  >Start Your Project</a
                >
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- GYM SETUP BY REQUIREMENT -->
      <section class="gym-setup-requirements" id="Solutions">
        <div class="container">
          <div class="heading">
            <h3>Fitness Solutions <span>for Every Property</span></h3>
            <p>
              Every hotel and resort has different requirements. Fitway
              helps you plan the right equipment and setup based on your
              guests, available space and budget.
            </p>
          </div>

          <div class="gym-setup-requirements__grid">
            <a href="#contact" class="gym-setup-requirements__card reveal">
              <img
                src="{{ asset('assets/images/home/Luxury-Hotel-Gym.jpg') }}"
                alt="Luxury hotel gym"
              />
              <div class="gym-setup-requirements__overlay"></div>
              <div class="gym-setup-requirements__info">
                <span class="label">Luxury Hotel</span>
                <h3>Luxury Hotel Gym</h3>
                <p>
                  Create a premium training space designed around your
                  luxury property and its guest expectations.
                </p>
                <span class="gym-setup-requirements__arrow">
                  <svg viewBox="0 0 24 24" width="18" height="18">
                    <path
                      d="M7 17L17 7M17 7H9M17 7v8"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                    />
                  </svg>
                </span>
              </div>
            </a>

            <a href="#contact" class="gym-setup-requirements__card reveal">
              <img
                src="{{ asset('assets/images/home/Resort-Gyms.jpg') }}"
                alt="Resort fitness centre"
              />
              <div class="gym-setup-requirements__overlay"></div>
              <div class="gym-setup-requirements__info">
                <span class="label">Resort Gym</span>
                <h3>Resort Fitness Centre</h3>
                <p>
                  Space-efficient equipment and layouts designed for shared
                  guest facilities at your resort.
                </p>
                <span class="gym-setup-requirements__arrow">
                  <svg viewBox="0 0 24 24" width="18" height="18">
                    <path
                      d="M7 17L17 7M17 7H9M17 7v8"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                    />
                  </svg>
                </span>
              </div>
            </a>

            <a href="#contact" class="gym-setup-requirements__card reveal">
              <img
                src="{{ asset('assets/images/home/Boutique-Hotel-Gym.jpg') }}"
                alt="Boutique hotel gym"
              />
              <div class="gym-setup-requirements__overlay"></div>
              <div class="gym-setup-requirements__info">
                <span class="label">Boutique Hotel</span>
                <h3>Boutique Hotel Gym</h3>
                <p>
                  Turn an unused property area into a fully functional
                  fitness space that matches your brand.
                </p>
                <span class="gym-setup-requirements__arrow">
                  <svg viewBox="0 0 24 24" width="18" height="18">
                    <path
                      d="M7 17L17 7M17 7H9M17 7v8"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                    />
                  </svg>
                </span>
              </div>
            </a>

            <a href="#contact" class="gym-setup-requirements__card reveal">
              <img
                src="{{ asset('assets/images/home/Wellness-Retreat-fitness.jpg') }}"
                alt="Wellness retreat fitness space"
              />
              <div class="gym-setup-requirements__overlay"></div>
              <div class="gym-setup-requirements__info">
                <span class="label">Wellness Retreat</span>
                <h3>Wellness Retreat Fitness Space</h3>
                <p>
                  Create a durable, welcoming fitness space designed to
                  complement your retreat's wellness offerings.
                </p>
                <span class="gym-setup-requirements__arrow">
                  <svg viewBox="0 0 24 24" width="18" height="18">
                    <path
                      d="M7 17L17 7M17 7H9M17 7v8"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                    />
                  </svg>
                </span>
              </div>
            </a>

            <a href="#contact" class="gym-setup-requirements__card reveal">
              <img
                src="{{ asset('assets/images/home/Holiday-Resort-Gym.jpg') }}"
                alt="Holiday resort gym"
              />
              <div class="gym-setup-requirements__overlay"></div>
              <div class="gym-setup-requirements__info">
                <span class="label">Holiday Resort</span>
                <h3>Holiday Resort Gym</h3>
                <p>
                  A fully equipped training space designed to match your
                  resort's guest volume and recreational culture.
                </p>
                <span class="gym-setup-requirements__arrow">
                  <svg viewBox="0 0 24 24" width="18" height="18">
                    <path
                      d="M7 17L17 7M17 7H9M17 7v8"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                    />
                  </svg>
                </span>
              </div>
            </a>

            <a href="#contact" class="gym-setup-requirements__card reveal">
              <img
                src="{{ asset('assets/images/home/hospital-fintenss.jpg') }}"
                alt="Premium hospitality fitness centre"
              />
              <div class="gym-setup-requirements__overlay"></div>
              <div class="gym-setup-requirements__info">
                <span class="label">Premium Setup</span>
                <h3>Premium Hospitality Fitness Centre</h3>
                <p>
                  Combine premium equipment and thoughtful design for a
                  complete guest wellness experience.
                </p>
                <span class="gym-setup-requirements__arrow">
                  <svg viewBox="0 0 24 24" width="18" height="18">
                    <path
                      d="M7 17L17 7M17 7H9M17 7v8"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                    />
                  </svg>
                </span>
              </div>
            </a>
          </div>
        </div>
      </section>

      <!-- WHY FITWAY -->
      <section class="gym-setup-why" id="why-fitway">
        <div class="container">
          <div class="heading">
            <h3>Why <span>Fitway</span></h3>
            <p>
              We combine equipment knowledge, planning and professional
              execution to help create hospitality fitness spaces built
              around real guest needs.
            </p>
          </div>

          <div class="gym-setup-why__stats">
            <div class="gym-setup-why__stat reveal">
              <h4>Trusted</h4>
              <p>Hospitality Gym Partner</p>
            </div>
            <div class="gym-setup-why__stat reveal">
              <h4>Premium</h4>
              <p>Equipment Delivered</p>
            </div>
            <div class="gym-setup-why__stat reveal">
              <h4>End-to-End</h4>
              <p>Solutions</p>
            </div>
            <div class="gym-setup-why__stat reveal">
              <h4>Expert</h4>
              <p>Installation Team</p>
            </div>
          </div>

          <ul class="gym-setup-why__list">
            <li class="reveal">
              <svg viewBox="0 0 24 24" width="20" height="20">
                <path
                  d="M20 6L9 17l-5-5"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                /></svg
              >Complete Project Support
            </li>
            <li class="reveal">
              <svg viewBox="0 0 24 24" width="20" height="20">
                <path
                  d="M20 6L9 17l-5-5"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                /></svg
              >Premium Equipment Selection
            </li>
            <li class="reveal">
              <svg viewBox="0 0 24 24" width="20" height="20">
                <path
                  d="M20 6L9 17l-5-5"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                /></svg
              >Custom Fitness Solutions for Properties
            </li>
            <li class="reveal">
              <svg viewBox="0 0 24 24" width="20" height="20">
                <path
                  d="M20 6L9 17l-5-5"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                /></svg
              >Professional Installation
            </li>
            <li class="reveal">
              <svg viewBox="0 0 24 24" width="20" height="20">
                <path
                  d="M20 6L9 17l-5-5"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                /></svg
              >Single Point of Contact
            </li>
            <li class="reveal">
              <svg viewBox="0 0 24 24" width="20" height="20">
                <path
                  d="M20 6L9 17l-5-5"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                /></svg
              >Solutions Built Around Your Budget
            </li>
          </ul>
        </div>
      </section>

      <!-- PROJECTS -->
      <section class="gym-setup-projects" id="projects">
        <div class="container">
          <div class="heading">
            <h3>Our <span>Work</span></h3>
            <p>
              Explore hotel and resort fitness spaces designed, equipped and
              delivered by Fitway.
            </p>
          </div>
          <div class="gym-setup-projects__wrap">
            <div class="swiper gym-setup-projects__swiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <article class="gym-setup-projects__card">
                    <img
                      src="{{ asset('assets/images/home/Luxury-Hotel-Gym.jpg') }}"
                      alt="Luxury hotel fitness centre project"
                    />
                    <div class="gym-setup-projects__info">
                      <span class="label">Luxury Hotel</span>
                      <h3>Luxury Hotel Fitness Centre</h3>
                      <p>
                        A complete hotel gym setup designed with dedicated
                        training zones and premium equipment.
                      </p>
                    </div>
                  </article>
                </div>

                <div class="swiper-slide">
                  <article class="gym-setup-projects__card">
                    <img
                      src="{{ asset('assets/images/home/Resort-Gyms.jpg') }}"
                      alt="Resort wellness gym project"
                    />
                    <div class="gym-setup-projects__info">
                      <span class="label">Resort Gym</span>
                      <h3>Resort Wellness Gym</h3>
                      <p>
                        A guest-focused fitness space designed for a resort's
                        wellness facilities.
                      </p>
                    </div>
                  </article>
                </div>

                <div class="swiper-slide">
                  <article class="gym-setup-projects__card">
                    <img
                      src="{{ asset('assets/images/home/Boutique-Hotel-Gym.jpg') }}"
                      alt="Boutique hotel training space project"
                    />
                    <div class="gym-setup-projects__info">
                      <span class="label">Boutique Hotel</span>
                      <h3>Boutique Hotel Training Space</h3>
                      <p>
                        An unused property area transformed into a fully
                        functional guest training space.
                      </p>
                    </div>
                  </article>
                </div>

                <div class="swiper-slide">
                  <article class="gym-setup-projects__card">
                    <img
                      src="{{ asset('assets/images/home/compleate-setup-resort.jgp.jpg') }}"
                      alt="Full service premium guest fitness facility project"
                    />
                    <div class="gym-setup-projects__info">
                      <span class="label">Complete Setup</span>
                      <h3>Premium Guest Fitness Facility</h3>
                      <p>
                        From planning to installation, a complete guest
                        fitness space delivered by Fitway.
                      </p>
                    </div>
                  </article>
                </div>
              </div>
            </div>

            <div class="gym-setup-projects__nav">
              <button
                class="gym-setup-projects__prev"
                aria-label="Previous project"
              >
                <svg viewBox="0 0 24 24" width="20" height="20">
                  <path
                    d="M15 18l-6-6 6-6"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                  />
                </svg>
              </button>
              <button
                class="gym-setup-projects__next"
                aria-label="Next project"
              >
                <svg viewBox="0 0 24 24" width="20" height="20">
                  <path
                    d="M9 18l6-6-6-6"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                  />
                </svg>
              </button>
            </div>
          </div>
        </div>
      </section>

      <!-- TESTIMONIALS -->
      <section class="home-secI" id="testimonials">
        <div class="container">
          <div class="heading">
            <h3>Trusted by <span>Properties</span></h3>

            <p>
              From quality equipment to complete hotel and resort gym setup
              solutions, our clients trust Fitway to deliver reliable
              products and professional support.
            </p>
          </div>

          <div class="swiper-wrap">
            <div class="swiper TestimonialSlider">
              <div class="swiper-wrapper">
                <!-- Testimonial 1 -->
                <div class="swiper-slide">
                  <div class="test_card">
                    <span class="quote-mark">&#8220;</span>

                    <p>
                      Fitway helped us set up our hotel gym from planning the
                      layout to installation. The team understood our
                      property and guest experience goals, and made the
                      entire process smooth and professionally managed.
                    </p>

                    <div class="test_author">
                      <span class="author-avatar">R</span>

                      <div class="author-info">
                        <h5>Rahul Sharma</h5>
                        <span>Hotel Owner</span>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="swiper-slide">
                  <div class="test_card">
                    <span class="quote-mark">&#8220;</span>

                    <p>
                      We were looking for the right combination of cardio and
                      strength equipment for our resort's fitness centre.
                      Fitway guided us through the selection process and
                      delivered a setup that worked perfectly for our guests.
                    </p>

                    <div class="test_author">
                      <span class="author-avatar">A</span>

                      <div class="author-info">
                        <h5>Amit Patel</h5>
                        <span>Resort Manager</span>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="swiper-slide">
                  <div class="test_card">
                    <span class="quote-mark">&#8220;</span>

                    <p>
                      From the initial discussion to the final installation,
                      the Fitway team was supportive and professional. They
                      helped us make better use of our property space and
                      create a practical fitness facility for our guests.
                    </p>

                    <div class="test_author">
                      <span class="author-avatar">N</span>

                      <div class="author-info">
                        <h5>Neha Mehta</h5>
                        <span>Hospitality Project Manager</span>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Testimonial 4 -->
                <div class="swiper-slide">
                  <div class="test_card">
                    <span class="quote-mark">&#8220;</span>

                    <p>
                      The quality of the equipment and the installation
                      support were excellent. Fitway provided us with a
                      complete solution instead of simply supplying machines,
                      which made the entire project much easier to manage.
                    </p>

                    <div class="test_author">
                      <span class="author-avatar">K</span>

                      <div class="author-info">
                        <h5>Karan Malhotra</h5>
                        <span>Boutique Hotel Owner</span>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Testimonial 5 -->
                <div class="swiper-slide">
                  <div class="test_card">
                    <span class="quote-mark">&#8220;</span>

                    <p>
                      Fitway helped us choose equipment that matched our
                      guests' needs and our property's budget. The team
                      handled delivery and installation efficiently, and our
                      fitness centre was ready to use without any unnecessary
                      complications.
                    </p>

                    <div class="test_author">
                      <span class="author-avatar">S</span>

                      <div class="author-info">
                        <h5>Sameer Khan</h5>
                        <span>Wellness Facility Manager</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-group">
              <button
                type="button"
                class="TestimonialSlider-prev btn-prev"
                aria-label="Previous testimonial"
              >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                  <path
                    fill="currentColor"
                    d="M609.408 149.376L277.76 489.6a32 32 0 0 0 0 44.672l331.648 340.352a29.12 29.12 0 0 0 41.728 0a30.59 30.59 0 0 0 0-42.752L339.264 511.936l311.872-319.872a30.59 30.59 0 0 0 0-42.688a29.12 29.12 0 0 0-41.728 0"
                  ></path>
                </svg>
              </button>

              <button
                type="button"
                class="TestimonialSlider-next btn-next"
                aria-label="Next testimonial"
              >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                  <path
                    fill="currentColor"
                    d="M414.592 149.376L746.24 489.6a32 32 0 0 1 0 44.672L414.592 874.624a29.12 29.12 0 0 1-41.728 0a30.59 30.59 0 0 1 0-42.752l311.872-319.936L372.864 192.064a30.59 30.59 0 0 1 0-42.688a29.12 29.12 0 0 1 41.728 0"
                  ></path>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </section>

      <!-- FINAL CTA -->
      <section class="gym-setup-cta">
        <div class="gym-setup-cta__bg">
          <img
            src="{{ asset('assets/images/home/form-banner.jpg') }}"
            alt="Premium hotel gym space ready for setup"
          />
          <div class="gym-setup-cta__overlay"></div>
        </div>
        <div class="container">
          <div class="gym-setup-cta__content">
            <span class="label">Ready to Build?</span>
            <h2>Ready to Elevate Your Guest Experience?</h2>
            <p>
              Create a premium fitness space for your hotel or resort with
              the right equipment, smart planning and professional
              installation from Fitway.
            </p>
            <div class="gym-setup-cta__actions">
              <a href="#home" class="btn btn-primary gym-setup-cta__scroll"
                >Get Free Consultation</a
              >
              <a href="tel:+910000000000" class="btn btn-outline-white"
                >Call Our Team</a
              >
            </div>
          </div>
        </div>
      </section>

      <!-- FAQ -->
      <section class="home-secG" id="faq">
        <div class="container">
          <div class="heading">
            <h3>
              Questions Before You
              <span>Start Your Hotel Gym?</span>
            </h3>

            <p>
              Find answers about hotel and resort gym planning, equipment
              selection, installation and complete setup solutions.
            </p>
          </div>

          <div class="accordion-wrapper">
            <!-- FAQ 01 -->
            <div class="accordion-item active">
              <div class="accordion-header">
                <h4>Does Fitway set up hotel and resort gyms?</h4>
                <span class="accordion-icon">−</span>
              </div>

              <div class="accordion-content" style="display: block">
                <p>
                  Yes. Fitway can support your hotel or resort gym project
                  from initial consultation and space planning to equipment
                  selection, supply, installation and final setup.
                </p>
              </div>
            </div>

            <!-- FAQ 02 -->
            <div class="accordion-item">
              <div class="accordion-header">
                <h4>What equipment is suitable for hotels and resorts?</h4>
                <span class="accordion-icon">+</span>
              </div>

              <div class="accordion-content">
                <p>
                  Depending on your property, your fitness centre can include
                  cardio equipment, strength machines, free weights,
                  functional training equipment and essential fitness
                  accessories suited for guest use.
                </p>
              </div>
            </div>

            <!-- FAQ 03 -->
            <div class="accordion-item">
              <div class="accordion-header">
                <h4>How much space is needed?</h4>
                <span class="accordion-icon">+</span>
              </div>

              <div class="accordion-content">
                <p>
                  Space needed depends on your guest volume, equipment
                  requirements and available property area. Our team assesses
                  your space and recommends the right layout.
                </p>
              </div>
            </div>

            <!-- FAQ 04 -->
            <div class="accordion-item">
              <div class="accordion-header">
                <h4>Can you design a gym based on guest requirements?</h4>
                <span class="accordion-icon">+</span>
              </div>

              <div class="accordion-content">
                <p>
                  Yes. Our team can help you plan a practical layout based on
                  your guest profile, available area, equipment requirements
                  and the overall experience you want to create.
                </p>
              </div>
            </div>

            <!-- FAQ 05 -->
            <div class="accordion-item">
              <div class="accordion-header">
                <h4>Do you provide equipment installation?</h4>
                <span class="accordion-icon">+</span>
              </div>

              <div class="accordion-content">
                <p>
                  Yes. As part of our complete gym setup support, Fitway can
                  manage equipment delivery, positioning and professional
                  installation to help prepare your space for guests.
                </p>
              </div>
            </div>

            <!-- FAQ 06 -->
            <div class="accordion-item">
              <div class="accordion-header">
                <h4>Can the gym match our property's style?</h4>
                <span class="accordion-icon">+</span>
              </div>

              <div class="accordion-content">
                <p>
                  Yes. We can help plan a fitness space that complements your
                  property's brand, design language and overall guest
                  experience.
                </p>
              </div>
            </div>

            <!-- FAQ 07 -->
            <div class="accordion-item">
              <div class="accordion-header">
                <h4>Do you provide maintenance support?</h4>
                <span class="accordion-icon">+</span>
              </div>

              <div class="accordion-content">
                <p>
                  Yes. We offer ongoing maintenance and support services to
                  help keep your fitness centre equipment in good working
                  condition for your guests.
                </p>
              </div>
            </div>

            <!-- FAQ 08 -->
            <div class="accordion-item">
              <div class="accordion-header">
                <h4>Can you work within a specific budget?</h4>
                <span class="accordion-icon">+</span>
              </div>

              <div class="accordion-content">
                <p>
                  Yes. We can help recommend suitable equipment and setup
                  solutions based on your available budget while focusing on
                  the most important requirements of your fitness space.
                </p>
              </div>
            </div>

            <!-- FAQ 09 -->
            <div class="accordion-item">
              <div class="accordion-header">
                <h4>How long does a hotel gym setup take?</h4>
                <span class="accordion-icon">+</span>
              </div>

              <div class="accordion-content">
                <p>
                  Timelines vary based on the scope of the project, but our
                  team works to plan and deliver your setup efficiently with
                  minimal disruption to your property.
                </p>
              </div>
            </div>

            <!-- FAQ 10 -->
            <div class="accordion-item">
              <div class="accordion-header">
                <h4>How do we start a hotel or resort gym project?</h4>
                <span class="accordion-icon">+</span>
              </div>

              <div class="accordion-content">
                <p>
                  Simply share your project requirements through our enquiry
                  form. Our team will get in touch to understand your
                  property and help you explore the right equipment and gym
                  setup solution.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="home-secJ" id="contact">
        <div class="container">
          <div class="heading">
            <h3>
              Ready to Build a Better
              <span>Guest Fitness Experience?</span>
            </h3>

            <p>
              Tell us about your hotel or resort property and our team will
              help you plan the right fitness space for your guests.
            </p>
          </div>

          <div class="grid">
            <div class="img">
              <img src="{{ asset('assets/images/home/ready-contact.jpg') }}" alt="" />
            </div>

            <!-- Right: Contact Form -->
            <div class="contact-form2">
              <form class="contact-form__form" method="post">
                <div class="contact-form__group">
                  <label for="fullName">Full Name</label>
                  <input
                    type="text"
                    id="fullName"
                    name="fullName"
                    placeholder="Enter your full name"
                    required
                  />
                </div>

                <div class="contact-form__row">
                  <div class="contact-form__group">
                    <label for="phoneNumber">Phone Number</label>
                    <input
                      type="tel"
                      id="phoneNumber"
                      name="phoneNumber"
                      placeholder="Enter your phone number"
                      required
                    />
                  </div>

                  <div class="contact-form__group">
                    <label for="emailAddress">Email Address</label>
                    <input
                      type="email"
                      id="emailAddress"
                      name="emailAddress"
                      placeholder="Enter your email address"
                    />
                  </div>
                </div>

                <div class="contact-form__group">
                  <span class="contact-form__label">I'm Interested In</span>

                  <div class="contact-form__checkbox-list">
                    <label class="contact-form__checkbox">
                      <input
                        type="checkbox"
                        name="interest"
                        value="Hotel Gym Equipment"
                      />
                      <span class="contact-form__checkbox-box"></span>
                      <span class="contact-form__checkbox-label"
                        >Hotel Gym Equipment</span
                      >
                    </label>

                    <label class="contact-form__checkbox">
                      <input
                        type="checkbox"
                        name="interest"
                        value="Resort Fitness Planning"
                      />
                      <span class="contact-form__checkbox-box"></span>
                      <span class="contact-form__checkbox-label"
                        >Resort Fitness Planning</span
                      >
                    </label>

                    <label class="contact-form__checkbox">
                      <input
                        type="checkbox"
                        name="interest"
                        value="Complete Gym Setup"
                      />
                      <span class="contact-form__checkbox-box"></span>
                      <span class="contact-form__checkbox-label"
                        >Complete Gym Setup</span
                      >
                    </label>

                    <label class="contact-form__checkbox">
                      <input
                        type="checkbox"
                        name="interest"
                        value="Equipment Installation"
                      />
                      <span class="contact-form__checkbox-box"></span>
                      <span class="contact-form__checkbox-label"
                        >Equipment Installation</span
                      >
                    </label>

                    <label class="contact-form__checkbox">
                      <input
                        type="checkbox"
                        name="interest"
                        value="Maintenance Services"
                      />
                      <span class="contact-form__checkbox-box"></span>
                      <span class="contact-form__checkbox-label"
                        >Maintenance Services</span
                      >
                    </label>

                    <label class="contact-form__checkbox">
                      <input type="checkbox" name="interest" value="Other" />
                      <span class="contact-form__checkbox-box"></span>
                      <span class="contact-form__checkbox-label">Other</span>
                    </label>
                  </div>
                </div>

                <div class="contact-form__group">
                  <label for="message">Message</label>
                  <textarea
                    id="message"
                    name="message"
                    rows="4"
                    placeholder="Tell us more about your requirement..."
                  ></textarea>
                </div>

                <button type="submit" class="btn btn-primary contact-form__cta">
                  Submit Enquiry
                </button>
              </form>
            </div>
          </div>
        </div>
      </section>

   @endsection

@push('scripts')
  {{-- Swiper init for .gym-setup-projects__swiper and .TestimonialSlider,
  plus the FAQ accordion toggle for .accordion-header / .accordion-item,
  go here (or in assets/js/comman.js if that's where the rest of the site's JS lives) --}}
@endpush