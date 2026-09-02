@extends('layouts.gym-app')

@section('title',  $pageSeo->seo->meta_title ?? 'Outdoor / Open Gym Setup | Fitway')
@section('meta_description', $pageSeo->seo->meta_description ?? 'Build durable and engaging outdoor fitness spaces for communities, parks, and public areas.')

@section('content')


  <!-- HERO + LEAD FORM -->
  <section class="gym-setup-hero" id="home">
    <div class="gym-setup-hero__bg">
      <img src="{{ asset('assets/images/home/outdoor-banner.jpg') }}" alt="outdoor  gym setup">
      <div class="gym-setup-hero__overlay"></div>
    </div>

    <div class="container">
      <div class="gym-setup-hero__grid">

        <div class="gym-setup-hero__content reveal">
          <span class="label">Outdoor / Open Gym Setup</span>

          <h1>Build Fitness Spaces Under the Open Sky.</h1>

          <p>
            Create a durable and engaging outdoor fitness space designed for
            communities, parks, residential societies and public areas. Fitway
            provides complete outdoor gym solutions from space planning and
            equipment selection to professional installation.
          </p>

          <ul class="gym-setup-hero__points">
            <li>
              <svg viewBox="0 0 24 24" width="18" height="18">
                <path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2" />
              </svg>
              Smart Outdoor Space Planning
            </li>

            <li>
              <svg viewBox="0 0 24 24" width="18" height="18">
                <path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2" />
              </svg>
              Durable Weather-Resistant Equipment
            </li>

            <li>
              <svg viewBox="0 0 24 24" width="18" height="18">
                <path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2" />
              </svg>
              Professional Installation &amp; Support
            </li>
          </ul>

          <a href="#services" class="btn btn-outline-white">
            Explore Our Solutions
          </a>
        </div>

        <div class="gym-setup-hero__form-wrap reveal">
          <div class="contact-form">
            <form class="contact-form__form" id="gymSetupForm" method="post" novalidate>

              <div class="contact-form__group">
                <label for="fullName">Full Name</label>
                <input type="text" id="fullName" name="fullName" placeholder="Enter your full name" required>
                <span class="contact-form__error"></span>
              </div>

              <div class="contact-form__row">

                <div class="contact-form__group">
                  <label for="mobileNumber">Mobile Number</label>
                  <input type="tel" id="mobileNumber" name="mobileNumber" placeholder="Enter your mobile number" required>
                  <span class="contact-form__error"></span>
                </div>

                <div class="contact-form__group">
                  <label for="emailId">Email Id</label>
                  <input type="email" id="emailId" name="emailId" placeholder="Enter your email id" required>
                  <span class="contact-form__error"></span>
                </div>

              </div>

              <div class="contact-form__group">
                <span class="contact-form__label">
                  Select Your Requirements
                </span>

                <div class="contact-form__checkbox-list">

                  <label class="contact-form__checkbox">
                    <input type="checkbox" name="requirement" value="Outdoor Gym Equipment">
                    <span class="contact-form__checkbox-box"></span>
                    <span class="contact-form__checkbox-label">
                      Outdoor Gym Equipment
                    </span>
                  </label>

                  <label class="contact-form__checkbox">
                    <input type="checkbox" name="requirement" value="Outdoor Space Planning">
                    <span class="contact-form__checkbox-box"></span>
                    <span class="contact-form__checkbox-label">
                      Outdoor Space Planning
                    </span>
                  </label>

                  <label class="contact-form__checkbox">
                    <input type="checkbox" name="requirement" value="Complete Open Gym Setup">
                    <span class="contact-form__checkbox-box"></span>
                    <span class="contact-form__checkbox-label">
                      Complete Open Gym Setup
                    </span>
                  </label>

                  <label class="contact-form__checkbox">
                    <input type="checkbox" name="requirement" value="Maintenance Services">
                    <span class="contact-form__checkbox-box"></span>
                    <span class="contact-form__checkbox-label">
                      Maintenance Services
                    </span>
                  </label>

                </div>
              </div>

              <div class="contact-form__group">
                <label for="details">Enter Details (If any)</label>

                <textarea id="details" name="details" rows="2"
                  placeholder="Tell us about your outdoor fitness space..."></textarea>
              </div>

              <button type="submit" class="btn btn-primary contact-form__cta">
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
          <img src="{{ asset('assets/images/home/Outdoor-Equipment.jpg') }}"
            alt="Open outdoor gym space in a park" />
        </div>
        <div class="gym-setup-intro__content reveal">
          <span class="label">Complete Outdoor Gym Setup</span>
          <h2>Fitness Beyond Four Walls.</h2>
          <p>
            An outdoor gym is more than simply placing equipment in an
            open area. It needs smart use of available space, the right
            equipment mix and a layout built around safety and community
            use.
          </p>

          <ul class="gym-setup-intro__points">
            <li>
              <svg viewBox="0 0 24 24" width="20" height="20">
                <path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2" />
              </svg>Smart Open Space Planning
            </li>
            <li>
              <svg viewBox="0 0 24 24" width="20" height="20">
                <path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2" />
              </svg>Durable Outdoor Equipment
            </li>
            <li>
              <svg viewBox="0 0 24 24" width="20" height="20">
                <path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2" />
              </svg>Safe &amp; Professional Installation
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
          From an empty open plot to a fully functional outdoor gym, we
          manage every important part of your setup.
        </p>
      </div>

      <div class="gym-setup-services__grid">
        <article class="gym-setup-services__card reveal">
          <span class="gym-setup-services__num">01</span>
          <div class="gym-setup-services__icon">
            <svg viewBox="0 0 24 24" width="28" height="28">
              <path d="M3 9l9-6 9 6v11a1 1 0 01-1 1H4a1 1 0 01-1-1V9z" fill="none" stroke="currentColor"
                stroke-width="1.6" />
            </svg>
          </div>
          <h3>Outdoor Space Planning</h3>
          <p>
            We help you make the best use of your available park, plot
            or society area for a functional outdoor gym.
          </p>
        </article>

        <article class="gym-setup-services__card reveal">
          <span class="gym-setup-services__num">02</span>
          <div class="gym-setup-services__icon">
            <svg viewBox="0 0 24 24" width="28" height="28">
              <path d="M3 3h7v7H3zM14 3h7v7h-7zM3 14h7v7H3zM14 14h7v7h-7z" fill="none" stroke="currentColor"
                stroke-width="1.6" />
            </svg>
          </div>
          <h3>Open Gym Layout Design</h3>
          <p>
            Create a smart, space-efficient layout that fits your area
            and supports easy access for all users.
          </p>
        </article>

        <article class="gym-setup-services__card reveal">
          <span class="gym-setup-services__num">03</span>
          <div class="gym-setup-services__icon">
            <svg viewBox="0 0 24 24" width="28" height="28">
              <path d="M6.5 6.5l11 11M4 12h16M6.5 17.5l11-11" fill="none" stroke="currentColor" stroke-width="1.6" />
            </svg>
          </div>
          <h3>Equipment Selection</h3>
          <p>
            Choose the right mix of cardio, strength and functional
            equipment suited to your community's fitness needs.
          </p>
        </article>

        <article class="gym-setup-services__card reveal">
          <span class="gym-setup-services__num">04</span>
          <div class="gym-setup-services__icon">
            <svg viewBox="0 0 24 24" width="28" height="28">
              <path d="M3 7h18M3 12h18M3 17h18" fill="none" stroke="currentColor" stroke-width="1.6" />
            </svg>
          </div>
          <h3>Weather-Resistant Equipment Supply</h3>
          <p>
            Get quality outdoor gym equipment selected specifically for
            your space and community fitness goals.
          </p>
        </article>

        <article class="gym-setup-services__card reveal">
          <span class="gym-setup-services__num">05</span>
          <div class="gym-setup-services__icon">
            <svg viewBox="0 0 24 24" width="28" height="28">
              <path d="M3 12h13l-4-4m4 4l-4 4" fill="none" stroke="currentColor" stroke-width="1.6" />
            </svg>
          </div>
          <h3>Delivery &amp; Professional Installation</h3>
          <p>
            Our team manages equipment delivery and professional
            installation right at your park, society or public space.
          </p>
        </article>

        <article class="gym-setup-services__card reveal">
          <span class="gym-setup-services__num">06</span>
          <div class="gym-setup-services__icon">
            <svg viewBox="0 0 24 24" width="28" height="28">
              <path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="1.6" />
            </svg>
          </div>
          <h3>Final Safety Check &amp; Support</h3>
          <p>
            We help ensure your outdoor gym is properly set up and ready
            for the community to use.
          </p>
        </article>
      </div>

      <div class="gym-setup-services__cta">
        <a href="#contact" class="btn btn-outline-primary">Talk to Our Experts</a>
      </div>
    </div>
  </section>

  <!-- PROCESS -->
  <section class="gym-setup-process" id="process">
    <div class="container">
      <div class="heading">
        <h3>How <span>It Works</span></h3>
        <p>
          Our structured process helps turn your open space into a
          complete and functional outdoor fitness zone.
        </p>
      </div>

      <div class="gym-setup-process__track">
        <div class="gym-setup-process__step reveal">
          <span class="gym-setup-process__num">01</span>
          <h3>Consultation</h3>
          <p>
            We understand the available outdoor space, users and your
            project goals.
          </p>
        </div>
        <div class="gym-setup-process__step reveal">
          <span class="gym-setup-process__num">02</span>
          <h3>Site Planning</h3>
          <p>
            We plan the layout for safe movement and effective use of
            the space.
          </p>
        </div>
        <div class="gym-setup-process__step reveal">
          <span class="gym-setup-process__num">03</span>
          <h3>Selection</h3>
          <p>
            Our team helps select durable, weather-resistant equipment
            based on your requirements.
          </p>
        </div>
        <div class="gym-setup-process__step reveal">
          <span class="gym-setup-process__num">04</span>
          <h3>Installation</h3>
          <p>
            We deliver and professionally install the equipment at your
            location.
          </p>
        </div>
        <div class="gym-setup-process__step reveal">
          <span class="gym-setup-process__num">05</span>
          <h3>Ready to Move</h3>
          <p>Your outdoor fitness space is ready for the community to enjoy.</p>
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
          <h2>Have an Open Space? Let's Turn It Into a Fitness Space.</h2>
          <p>
            Tell us about your space and community goals, and our team
            will help you plan the right equipment and outdoor gym setup.
          </p>
        </div>
        <div class="gym-setup-mid-cta__actions">
          <a href="#contact" class="btn btn-primary">Get Free Consultation</a>
          <a href="#projects" class="btn btn-outline-white">View Our Projects</a>
        </div>
      </div>
    </div>
  </section>

  <!-- EQUIPMENT -->
  <section class="gym-setup-equipment" id="equipment">
    <div class="container">
      <div class="heading">
        <h3>Everything Your Outdoor Gym Needs <span>to Perform</span></h3>
        <p>
          Build a complete outdoor fitness space with the right equipment
          for cardio, strength, functional training and more.
        </p>
      </div>

      <div class="gym-setup-equipment__grid">
        <a href="#contact" class="gym-setup-equipment__card reveal">
          <img src="{{ asset('assets/images/home/outdoor-gym.jpg') }}" alt="Outdoor cardio equipment" />
          <div class="gym-setup-equipment__overlay"></div>
          <div class="gym-setup-equipment__info">
            <h3>Outdoor Cardio Equipment</h3>
            <p>
              Steppers, cycles and cross trainers built for daily
              outdoor use.
            </p>
            <svg viewBox="0 0 24 24" width="20" height="20">
              <path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2" />
            </svg>
          </div>
        </a>

        <a href="#contact" class="gym-setup-equipment__card reveal">
          <img src="{{ asset('assets/images/home/Outdoor-Strength-Equipment.jpg') }}" alt="Outdoor strength equipment" />
          <div class="gym-setup-equipment__overlay"></div>
          <div class="gym-setup-equipment__info">
            <h3>Outdoor Strength Equipment</h3>
            <p>
              Space-smart machines designed for effective outdoor
              training.
            </p>
            <svg viewBox="0 0 24 24" width="20" height="20">
              <path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2" />
            </svg>
          </div>
        </a>

        <a href="#contact" class="gym-setup-equipment__card reveal">
          <img src="{{ asset('assets/images/home/private-trianer.avif') }}" alt="Functional training equipment" />
          <div class="gym-setup-equipment__overlay"></div>
          <div class="gym-setup-equipment__info">
            <h3>Functional Training</h3>
            <p>
              Versatile equipment for movement and performance during
              open-air training.
            </p>
            <svg viewBox="0 0 24 24" width="20" height="20">
              <path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2" />
            </svg>
          </div>
        </a>

        <a href="#contact" class="gym-setup-equipment__card reveal">
          <img src="{{ asset('assets/images/home/Bodyweight-Stations.jpg') }}" alt="Bodyweight training station" />
          <div class="gym-setup-equipment__overlay"></div>
          <div class="gym-setup-equipment__info">
            <h3>Bodyweight Stations</h3>
            <p>
              Sturdy, space-conscious stations for safe outdoor
              strength training.
            </p>
            <svg viewBox="0 0 24 24" width="20" height="20">
              <path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2" />
            </svg>
          </div>
        </a>

        <a href="#contact" class="gym-setup-equipment__card reveal">
          <img src="{{ asset('assets/images/home/OutdoorFitness.jpg') }}" alt="Outdoor fitness stations" />
          <div class="gym-setup-equipment__overlay"></div>
          <div class="gym-setup-equipment__info">
            <h3>Outdoor Fitness Stations</h3>
            <p>
              Sturdy, space-conscious foundations for safe community
              training.
            </p>
            <svg viewBox="0 0 24 24" width="20" height="20">
              <path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2" />
            </svg>
          </div>
        </a>

        <a href="#contact" class="gym-setup-equipment__card reveal">
          <img src="{{ asset('assets/images/home/Community-Fitness.jpg') }}" alt="Community fitness equipment" />
          <div class="gym-setup-equipment__overlay"></div>
          <div class="gym-setup-equipment__info">
            <h3>Community Fitness Equipment</h3>
            <p>
              Essential add-ons to complete your community open gym
              space.
            </p>
            <svg viewBox="0 0 24 24" width="20" height="20">
              <path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2" />
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
          From individual outdoor gym equipment to complete open gym
          solutions, Fitway helps you build every part of your setup.
        </p>
      </div>

      <div class="gym-setup-products-services__grid">
        <div class="gym-setup-products-services__block reveal">
          <img src="{{ asset('assets/images/home/outdoor-gym.jpg') }}" alt="Gym equipment lineup" />
          <div class="gym-setup-products-services__overlay"></div>
          <div class="gym-setup-products-services__content">
            <span class="label">Durable Outdoor Fitness Equipment</span>
            <h3>Equip Your Open Space.</h3>
            <p>
              Explore equipment selected for performance, durability and
              every type of outdoor training environment.
            </p>
            <ul>
              <li>Outdoor Cardio Equipment</li>
              <li>Outdoor Strength Equipment</li>
              <li>Functional Training</li>
              <li>Bodyweight Stations</li>
              <li>Community Equipment</li>
            </ul>
            <a href="#equipment" class="btn btn-outline-white">Explore Equipment</a>
          </div>
        </div>

        <div class="gym-setup-products-services__block reveal">
          <img src="{{ asset('assets/images/home/complate-outdoor.jpg') }}" alt="Complete gym setup service" />
          <div class="gym-setup-products-services__overlay"></div>
          <div class="gym-setup-products-services__content">
            <span class="label">Complete Outdoor Gym Setup</span>
            <h3>We Build the Complete Experience.</h3>
            <p>
              From planning your open space to installing the final
              piece of equipment, our team helps bring your outdoor gym
              to life.
            </p>
            <ul>
              <li>Space Planning</li>
              <li>Layout Design</li>
              <li>Equipment Selection</li>
              <li>Supply</li>
              <li>Installation</li>
              <li>Final Setup</li>
            </ul>
            <a href="#contact" class="btn btn-primary">Start Your Project</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- GYM SETUP BY REQUIREMENT -->
  <section class="gym-setup-requirements" id="Solutions">
    <div class="container">
      <div class="heading">
        <h3>Outdoor Gym Solutions <span>for Every Space</span></h3>
        <p>
          Every open space has different requirements. Fitway helps you
          plan the right equipment and setup based on your users,
          available space and budget.
        </p>
      </div>

      <div class="gym-setup-requirements__grid">
        <a href="#contact" class="gym-setup-requirements__card reveal">
          <img src="{{ asset('assets/images/home/Residential-Gym1.jpg') }}" alt="Residential society open gym" />
          <div class="gym-setup-requirements__overlay"></div>
          <div class="gym-setup-requirements__info">
            <span class="label">Residential Gym</span>
            <h3>Residential Society Gym</h3>
            <p>
              Create a dedicated outdoor fitness space designed around
              your residents' wellness goals and available area.
            </p>
            <span class="gym-setup-requirements__arrow">
              <svg viewBox="0 0 24 24" width="18" height="18">
                <path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2" />
              </svg>
            </span>
          </div>
        </a>

        <a href="#contact" class="gym-setup-requirements__card reveal">
          <img src="{{ asset('assets/images/home/Public-Park-Gym1.jpg') }}" alt="Public park gym" />
          <div class="gym-setup-requirements__overlay"></div>
          <div class="gym-setup-requirements__info">
            <span class="label">Park Gym</span>
            <h3>Public Park Gym</h3>
            <p>
              Space-efficient equipment and layouts designed for shared
              use in public parks and green spaces.
            </p>
            <span class="gym-setup-requirements__arrow">
              <svg viewBox="0 0 24 24" width="18" height="18">
                <path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2" />
              </svg>
            </span>
          </div>
        </a>

        <a href="#contact" class="gym-setup-requirements__card reveal">
          <img src="{{ asset('assets/images/home/School-Fitness1.jpg') }}" alt="School fitness zone" />
          <div class="gym-setup-requirements__overlay"></div>
          <div class="gym-setup-requirements__info">
            <span class="label">School Fitness Zone</span>
            <h3>School &amp; College Fitness Zone</h3>
            <p>
              Turn an unused campus area into a fully functional fitness
              zone for students and staff.
            </p>
            <span class="gym-setup-requirements__arrow">
              <svg viewBox="0 0 24 24" width="18" height="18">
                <path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2" />
              </svg>
            </span>
          </div>
        </a>

        <a href="#contact" class="gym-setup-requirements__card reveal">
          <img src="{{ asset('assets/images/home/Community-Fitness1.jpg') }}" alt="Community open gym" />
          <div class="gym-setup-requirements__overlay"></div>
          <div class="gym-setup-requirements__info">
            <span class="label">Community Gym</span>
            <h3>Community Open Gym</h3>
            <p>
              Create a durable, welcoming fitness space for shared use
              across your community or neighbourhood.
            </p>
            <span class="gym-setup-requirements__arrow">
              <svg viewBox="0 0 24 24" width="18" height="18">
                <path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2" />
              </svg>
            </span>
          </div>
        </a>

        <a href="#contact" class="gym-setup-requirements__card reveal">
          <img src="{{ asset('assets/images/home/Township-Setup1.jpg') }}" alt="Township fitness space" />
          <div class="gym-setup-requirements__overlay"></div>
          <div class="gym-setup-requirements__info">
            <span class="label">Township Setup</span>
            <h3>Township Fitness Space</h3>
            <p>
              A fully equipped outdoor fitness space designed to match
              your township's scale and community culture.
            </p>
            <span class="gym-setup-requirements__arrow">
              <svg viewBox="0 0 24 24" width="18" height="18">
                <path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2" />
              </svg>
            </span>
          </div>
        </a>

        <a href="#contact" class="gym-setup-requirements__card reveal">
          <img src="{{ asset('assets/images/home/Recreational-Space1.jpg') }}" alt="Resort recreational fitness area" />
          <div class="gym-setup-requirements__overlay"></div>
          <div class="gym-setup-requirements__info">
            <span class="label">Recreational Space</span>
            <h3>Resort &amp; Recreational Fitness Area</h3>
            <p>
              Combine outdoor and recreational equipment for a complete
              fitness experience at your property.
            </p>
            <span class="gym-setup-requirements__arrow">
              <svg viewBox="0 0 24 24" width="18" height="18">
                <path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2" />
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
          execution to help build outdoor fitness spaces around real
          community needs.
        </p>
      </div>

      <div class="gym-setup-why__stats">
        <div class="gym-setup-why__stat reveal">
          <h4>Trusted</h4>
          <p>Outdoor Gym Partner</p>
        </div>
        <div class="gym-setup-why__stat reveal">
          <h4>Durable</h4>
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
            <path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2" />
          </svg>Complete Project Support
        </li>
        <li class="reveal">
          <svg viewBox="0 0 24 24" width="20" height="20">
            <path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2" />
          </svg>Outdoor Equipment Expertise
        </li>
        <li class="reveal">
          <svg viewBox="0 0 24 24" width="20" height="20">
            <path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2" />
          </svg>Custom Fitness Solutions for Communities
        </li>
        <li class="reveal">
          <svg viewBox="0 0 24 24" width="20" height="20">
            <path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2" />
          </svg>Professional Installation
        </li>
        <li class="reveal">
          <svg viewBox="0 0 24 24" width="20" height="20">
            <path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2" />
          </svg>Single Point of Contact
        </li>
        <li class="reveal">
          <svg viewBox="0 0 24 24" width="20" height="20">
            <path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2" />
          </svg>Solutions Built Around Your Budget
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
          Explore outdoor fitness spaces designed, equipped and
          delivered by Fitway.
        </p>
      </div>
      <div class="gym-setup-projects__wrap">
        <div class="swiper gym-setup-projects__swiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <article class="gym-setup-projects__card">
                <img src="{{ asset('assets/images/home/Residential-Gym.jpg') }}" alt="Residential outdoor fitness zone project" />
                <div class="gym-setup-projects__info">
                  <span class="label">Residential Gym</span>
                  <h3>Residential Outdoor Fitness Zone</h3>
                  <p>
                    A complete outdoor gym setup designed with dedicated
                    training zones for society residents.
                  </p>
                </div>
              </article>
            </div>

            <div class="swiper-slide">
              <article class="gym-setup-projects__card">
                <img src="{{ asset('assets/images/home/Community-Fitness1.jpg') }}" alt="Community open gym project" />
                <div class="gym-setup-projects__info">
                  <span class="label">Community Gym</span>
                  <h3>Community Open Gym</h3>
                  <p>
                    A space-efficient outdoor gym designed for shared
                    community use.
                  </p>
                </div>
              </article>
            </div>

            <div class="swiper-slide">
              <article class="gym-setup-projects__card">
                <img src="{{ asset('assets/images/home/Public-Park-Gym.jpg') }}" alt="Public park fitness space project" />
                <div class="gym-setup-projects__info">
                  <span class="label">Park Gym</span>
                  <h3>Public Park Fitness Space</h3>
                  <p>
                    An open park area transformed into a fully
                    functional public fitness space.
                  </p>
                </div>
              </article>
            </div>

            <div class="swiper-slide">
              <article class="gym-setup-projects__card">
                <img src="{{ asset('assets/images/home/complate-outdoor.jpg') }}" alt="Full service outdoor gym setup project" />
                <div class="gym-setup-projects__info">
                  <span class="label">Complete Setup</span>
                  <h3>Outdoor Training Area</h3>
                  <p>
                    From planning to installation, a complete outdoor
                    fitness space delivered by Fitway.
                  </p>
                </div>
              </article>
            </div>
          </div>
        </div>

        <div class="gym-setup-projects__nav">
          <button class="gym-setup-projects__prev" aria-label="Previous project">
            <svg viewBox="0 0 24 24" width="20" height="20">
              <path d="M15 18l-6-6 6-6" fill="none" stroke="currentColor" stroke-width="2" />
            </svg>
          </button>
          <button class="gym-setup-projects__next" aria-label="Next project">
            <svg viewBox="0 0 24 24" width="20" height="20">
              <path d="M9 18l6-6-6-6" fill="none" stroke="currentColor" stroke-width="2" />
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
        <h3>Trusted by <span>Communities</span></h3>

        <p>
          From quality equipment to complete outdoor gym setup
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
                  Fitway helped us set up our society's open gym from
                  planning the layout to installation. The team
                  understood our space and goals, and made the entire
                  process smooth and professionally managed.
                </p>

                <div class="test_author">
                  <span class="author-avatar">R</span>

                  <div class="author-info">
                    <h5>Rahul Sharma</h5>
                    <span>Society Secretary</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="swiper-slide">
              <div class="test_card">
                <span class="quote-mark">&#8220;</span>

                <p>
                  We were looking for the right combination of cardio
                  and strength equipment for our park. Fitway guided us
                  through the selection process and delivered a setup
                  that worked perfectly for our visitors.
                </p>

                <div class="test_author">
                  <span class="author-avatar">A</span>

                  <div class="author-info">
                    <h5>Amit Patel</h5>
                    <span>Parks Facility Officer</span>
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
                  helped us make better use of our campus space and
                  create a practical fitness zone for students.
                </p>

                <div class="test_author">
                  <span class="author-avatar">N</span>

                  <div class="author-info">
                    <h5>Neha Mehta</h5>
                    <span>School Administrator</span>
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
                  complete solution instead of simply supplying
                  machines, which made the entire project much easier to
                  manage.
                </p>

                <div class="test_author">
                  <span class="author-avatar">K</span>

                  <div class="author-info">
                    <h5>Karan Malhotra</h5>
                    <span>Township Project Manager</span>
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
                  community's needs and budget. The team handled
                  delivery and installation efficiently, and our open
                  gym was ready to use without any unnecessary
                  complications.
                </p>

                <div class="test_author">
                  <span class="author-avatar">S</span>

                  <div class="author-info">
                    <h5>Sameer Khan</h5>
                    <span>Community Association Head</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="swiper-group">
          <button type="button" class="TestimonialSlider-prev btn-prev" aria-label="Previous testimonial">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
              <path fill="currentColor"
                d="M609.408 149.376L277.76 489.6a32 32 0 0 0 0 44.672l331.648 340.352a29.12 29.12 0 0 0 41.728 0a30.59 30.59 0 0 0 0-42.752L339.264 511.936l311.872-319.872a30.59 30.59 0 0 0 0-42.688a29.12 29.12 0 0 0-41.728 0">
              </path>
            </svg>
          </button>

          <button type="button" class="TestimonialSlider-next btn-next" aria-label="Next testimonial">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
              <path fill="currentColor"
                d="M414.592 149.376L746.24 489.6a32 32 0 0 1 0 44.672L414.592 874.624a29.12 29.12 0 0 1-41.728 0a30.59 30.59 0 0 1 0-42.752l311.872-319.936L372.864 192.064a30.59 30.59 0 0 1 0-42.688a29.12 29.12 0 0 1 41.728 0">
              </path>
            </svg>
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- FINAL CTA -->
  <section class="gym-setup-cta">
    <div class="gym-setup-cta__bg">
      <img src="{{ asset('assets/images/home/form-banner.jpg') }}" alt="Open outdoor gym space ready for setup" />
      <div class="gym-setup-cta__overlay"></div>
    </div>
    <div class="container">
      <div class="gym-setup-cta__content">
        <span class="label">Ready to Build?</span>
        <h2>Ready to Build an Outdoor Fitness Space?</h2>
        <p>
          Share your space and community goals with our team and get the
          right equipment and setup solution for your project.
        </p>
        <div class="gym-setup-cta__actions">
          <a href="#home" class="btn btn-primary gym-setup-cta__scroll">Get Free Consultation</a>
          <a href="tel:+910000000000" class="btn btn-outline-white">Call Our Team</a>
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
          <span>Start Your Outdoor Gym?</span>
        </h3>

        <p>
          Find answers about outdoor gym planning, equipment selection,
          installation and complete open gym setup solutions.
        </p>
      </div>

      <div class="accordion-wrapper">
        <!-- FAQ 01 -->
        <div class="accordion-item active">
          <div class="accordion-header">
            <h4>What is an outdoor gym?</h4>
            <span class="accordion-icon">−</span>
          </div>

          <div class="accordion-content" style="display: block">
            <p>
              An outdoor gym is an open-air fitness space equipped with
              durable equipment designed for parks, societies, schools
              and other public areas.
            </p>
          </div>
        </div>

        <!-- FAQ 02 -->
        <div class="accordion-item">
          <div class="accordion-header">
            <h4>Which equipment is suitable for outdoor use?</h4>
            <span class="accordion-icon">+</span>
          </div>

          <div class="accordion-content">
            <p>
              Outdoor gyms typically use weather-resistant cardio,
              strength, functional and bodyweight equipment built to
              handle daily outdoor exposure.
            </p>
          </div>
        </div>

        <!-- FAQ 03 -->
        <div class="accordion-item">
          <div class="accordion-header">
            <h4>Is the equipment weather-resistant?</h4>
            <span class="accordion-icon">+</span>
          </div>

          <div class="accordion-content">
            <p>
              Yes. Fitway supplies equipment built with weather-resistant
              materials designed to hold up well through varying weather
              conditions.
            </p>
          </div>
        </div>

        <!-- FAQ 04 -->
        <div class="accordion-item">
          <div class="accordion-header">
            <h4>Can you install an outdoor gym in a park?</h4>
            <span class="accordion-icon">+</span>
          </div>

          <div class="accordion-content">
            <p>
              Yes. We work with parks and public spaces to plan a safe
              layout and install durable equipment suited for everyday
              community use.
            </p>
          </div>
        </div>

        <!-- FAQ 05 -->
        <div class="accordion-item">
          <div class="accordion-header">
            <h4>Can residential societies set up an open gym?</h4>
            <span class="accordion-icon">+</span>
          </div>

          <div class="accordion-content">
            <p>
              Yes. Fitway helps societies plan and set up open gyms in
              common areas, designed around residents' needs and
              available space.
            </p>
          </div>
        </div>

        <!-- FAQ 06 -->
        <div class="accordion-item">
          <div class="accordion-header">
            <h4>How much space is required?</h4>
            <span class="accordion-icon">+</span>
          </div>

          <div class="accordion-content">
            <p>
              Space needed depends on the number of equipment stations
              planned. Our team assesses your available area and
              recommends a layout that fits comfortably.
            </p>
          </div>
        </div>

        <!-- FAQ 07 -->
        <div class="accordion-item">
          <div class="accordion-header">
            <h4>Is outdoor gym equipment safe?</h4>
            <span class="accordion-icon">+</span>
          </div>

          <div class="accordion-content">
            <p>
              Yes. Our equipment and layouts are planned with safety in
              mind, including secure installation suited for users of
              all age groups.
            </p>
          </div>
        </div>

        <!-- FAQ 08 -->
        <div class="accordion-item">
          <div class="accordion-header">
            <h4>Do you provide installation?</h4>
            <span class="accordion-icon">+</span>
          </div>

          <div class="accordion-content">
            <p>
              Yes. As part of our complete outdoor gym setup support,
              Fitway manages equipment delivery, positioning and
              professional installation on-site.
            </p>
          </div>
        </div>

        <!-- FAQ 09 -->
        <div class="accordion-item">
          <div class="accordion-header">
            <h4>Do you provide maintenance support?</h4>
            <span class="accordion-icon">+</span>
          </div>

          <div class="accordion-content">
            <p>
              Yes. We offer ongoing maintenance and support services to
              help keep your outdoor gym equipment in good working
              condition.
            </p>
          </div>
        </div>

        <!-- FAQ 10 -->
        <div class="accordion-item">
          <div class="accordion-header">
            <h4>How can I start an outdoor gym project?</h4>
            <span class="accordion-icon">+</span>
          </div>

          <div class="accordion-content">
            <p>
              Simply share your project requirements through our enquiry
              form. Our team will get in touch to understand your space
              and help you explore the right open gym setup solution.
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
          Ready to Create Your
          <span>Outdoor Fitness Space?</span>
        </h3>

        <p>
          Tell us about your space, community goals and requirements.
          Our team will help you plan the right outdoor gym equipment
          and complete setup solution.
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
              <input type="text" id="fullName" name="fullName" placeholder="Enter your full name" required />
            </div>

            <div class="contact-form__row">
              <div class="contact-form__group">
                <label for="phoneNumber">Phone Number</label>
                <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter your phone number" required />
              </div>

              <div class="contact-form__group">
                <label for="emailAddress">Email Address</label>
                <input type="email" id="emailAddress" name="emailAddress" placeholder="Enter your email address" />
              </div>
            </div>

            <div class="contact-form__group">
              <span class="contact-form__label">I'm Interested In</span>

              <div class="contact-form__checkbox-list">
                <label class="contact-form__checkbox">
                  <input type="checkbox" name="interest" value="Outdoor Gym Equipment" />
                  <span class="contact-form__checkbox-box"></span>
                  <span class="contact-form__checkbox-label">Outdoor Gym Equipment</span>
                </label>

                <label class="contact-form__checkbox">
                  <input type="checkbox" name="interest" value="Outdoor Space Planning" />
                  <span class="contact-form__checkbox-box"></span>
                  <span class="contact-form__checkbox-label">Outdoor Space Planning</span>
                </label>

                <label class="contact-form__checkbox">
                  <input type="checkbox" name="interest" value="Complete Open Gym Setup" />
                  <span class="contact-form__checkbox-box"></span>
                  <span class="contact-form__checkbox-label">Complete Open Gym Setup</span>
                </label>

                <label class="contact-form__checkbox">
                  <input type="checkbox" name="interest" value="Installation Services" />
                  <span class="contact-form__checkbox-box"></span>
                  <span class="contact-form__checkbox-label">Installation Services</span>
                </label>

                <label class="contact-form__checkbox">
                  <input type="checkbox" name="interest" value="Maintenance Services" />
                  <span class="contact-form__checkbox-box"></span>
                  <span class="contact-form__checkbox-label">Maintenance Services</span>
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
              <textarea id="message" name="message" rows="4"
                placeholder="Tell us more about your requirement..."></textarea>
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