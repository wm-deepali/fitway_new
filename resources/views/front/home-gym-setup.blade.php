@extends('layouts.gym-app')

@section('title', 'Home Gym Setup | Fitway')

@section('content')

<!-- HERO + LEAD FORM -->
<section class="gym-setup-hero" id="home">
  <div class="gym-setup-hero__bg">

      <img src="{{ asset('assets/images/home/home-setup.jpg') }}" alt="Home gym setup space">
    <div class="gym-setup-hero__overlay"></div>
  </div>
  <div class="container">
    <div class="gym-setup-hero__grid">

      <div class="gym-setup-hero__content reveal">
        <span class="label">Home Gym Setup</span>
        <h1>Build a Home Gym That Fits Your Life.</h1>
        <p>From space planning and equipment selection to professional installation and final setup, Fitway delivers complete home gym solutions designed around your space, goals and budget.</p>

        <ul class="gym-setup-hero__points">
          <li><svg viewBox="0 0 24 24" width="18" height="18"><path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>Personalized Space Planning</li>
          <li><svg viewBox="0 0 24 24" width="18" height="18"><path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>Premium Equipment</li>
          <li><svg viewBox="0 0 24 24" width="18" height="18"><path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>Professional Installation</li>
        </ul>

        <a href="#services" class="btn btn-outline-white">Explore Our Solutions</a>
      </div>

      <div class="gym-setup-hero__form-wrap reveal">
        <div class="contact-form">
          <form class="contact-form__form" id="gymSetupForm" method="post" novalidate>
            @csrf

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
              <span class="contact-form__label">Select Your Requirements</span>
              <div class="contact-form__checkbox-list">
                <label class="contact-form__checkbox">
                  <input type="checkbox" name="requirement" value="Gym Equipment">
                  <span class="contact-form__checkbox-box"></span>
                  <span class="contact-form__checkbox-label">Gym Equipment</span>
                </label>
                <label class="contact-form__checkbox">
                  <input type="checkbox" name="requirement" value="Space Planning">
                  <span class="contact-form__checkbox-box"></span>
                  <span class="contact-form__checkbox-label">Space Planning</span>
                </label>
                <label class="contact-form__checkbox">
                  <input type="checkbox" name="requirement" value="Mentorship">
                  <span class="contact-form__checkbox-box"></span>
                  <span class="contact-form__checkbox-label">Mentorship</span>
                </label>
                <label class="contact-form__checkbox">
                  <input type="checkbox" name="requirement" value="Maintenance Services">
                  <span class="contact-form__checkbox-box"></span>
                  <span class="contact-form__checkbox-label">Maintenance Services</span>
                </label>
              </div>
            </div>

            <div class="contact-form__group">
              <label for="details">Enter Details (If any)</label>
              <textarea id="details" name="details" rows="2" placeholder="Tell us more about your home gym requirement..."></textarea>
            </div>

            <button type="submit" class="btn btn-primary contact-form__cta">Get Free Consultation</button>
            <p class="contact-form__note">Your details are safe with us. Our team will contact you shortly.</p>
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
        <img src="{{ asset('assets/images/home/Home-Equipment.jpg') }}" alt="Personalized home gym setup">
      </div>
      <div class="gym-setup-intro__content reveal">
        <span class="label">Complete Home Gym Setup</span>
        <h2>More Than Equipment. A Personalized Space.</h2>
        <p>A great home gym needs more than a few machines in a corner. It needs smart space planning, the right equipment mix and a layout built around how you actually train.</p>

        <ul class="gym-setup-intro__points">
          <li><svg viewBox="0 0 24 24" width="20" height="20"><path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>Smart Space Planning</li>
          <li><svg viewBox="0 0 24 24" width="20" height="20"><path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>Right Equipment Selection</li>
          <li><svg viewBox="0 0 24 24" width="20" height="20"><path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>End-to-End Installation</li>
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
      <p>From an empty room to a fully functional home gym, we manage every important part of your setup.</p>
    </div>

    <div class="gym-setup-services__grid">

      <article class="gym-setup-services__card reveal">
        <span class="gym-setup-services__num">01</span>
        <div class="gym-setup-services__icon">
          <svg viewBox="0 0 24 24" width="28" height="28"><path d="M3 9l9-6 9 6v11a1 1 0 01-1 1H4a1 1 0 01-1-1V9z" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>
        </div>
        <h3>Space Planning</h3>
        <p>We help you make the best use of your available room, garage or spare space for a functional home gym.</p>
      </article>

      <article class="gym-setup-services__card reveal">
        <span class="gym-setup-services__num">02</span>
        <div class="gym-setup-services__icon">
          <svg viewBox="0 0 24 24" width="28" height="28"><path d="M3 3h7v7H3zM14 3h7v7h-7zM3 14h7v7H3zM14 14h7v7h-7z" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>
        </div>
        <h3>Gym Design &amp; Layout</h3>
        <p>Create a smart, space-efficient layout that fits your home and supports comfortable movement.</p>
      </article>

      <article class="gym-setup-services__card reveal">
        <span class="gym-setup-services__num">03</span>
        <div class="gym-setup-services__icon">
          <svg viewBox="0 0 24 24" width="28" height="28"><path d="M6.5 6.5l11 11M4 12h16M6.5 17.5l11-11" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>
        </div>
        <h3>Equipment Selection</h3>
        <p>Choose the right mix of cardio, strength and functional equipment for your fitness goals.</p>
      </article>

      <article class="gym-setup-services__card reveal">
        <span class="gym-setup-services__num">04</span>
        <div class="gym-setup-services__icon">
          <svg viewBox="0 0 24 24" width="28" height="28"><path d="M3 7h18M3 12h18M3 17h18" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>
        </div>
        <h3>Equipment Supply</h3>
        <p>Get quality home gym equipment selected specifically for your space and training needs.</p>
      </article>

      <article class="gym-setup-services__card reveal">
        <span class="gym-setup-services__num">05</span>
        <div class="gym-setup-services__icon">
          <svg viewBox="0 0 24 24" width="28" height="28"><path d="M3 12h13l-4-4m4 4l-4 4" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>
        </div>
        <h3>Delivery &amp; Installation</h3>
        <p>Our team manages equipment delivery and professional installation right at your home.</p>
      </article>

      <article class="gym-setup-services__card reveal">
        <span class="gym-setup-services__num">06</span>
        <div class="gym-setup-services__icon">
          <svg viewBox="0 0 24 24" width="28" height="28"><path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>
        </div>
        <h3>Final Setup &amp; Support</h3>
        <p>We help ensure your home gym is properly set up and ready for your first workout.</p>
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
      <p>Our structured process helps turn your spare space into a complete and functional home gym.</p>
    </div>

    <div class="gym-setup-process__track">
      <div class="gym-setup-process__step reveal">
        <span class="gym-setup-process__num">01</span>
        <h3>Consultation</h3>
        <p>We understand your fitness goals, available space and personal requirements.</p>
      </div>
      <div class="gym-setup-process__step reveal">
        <span class="gym-setup-process__num">02</span>
        <h3>Planning</h3>
        <p>We plan the right layout and identify the equipment required for your home gym.</p>
      </div>
      <div class="gym-setup-process__step reveal">
        <span class="gym-setup-process__num">03</span>
        <h3>Selection</h3>
        <p>Our team helps select equipment based on your goals, space and budget.</p>
      </div>
      <div class="gym-setup-process__step reveal">
        <span class="gym-setup-process__num">04</span>
        <h3>Installation</h3>
        <p>We deliver and professionally install the equipment at your home.</p>
      </div>
      <div class="gym-setup-process__step reveal">
        <span class="gym-setup-process__num">05</span>
        <h3>Ready to Train</h3>
        <p>Your home gym is prepared, equipped and ready for action.</p>
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
        <h2>Have a Space? Let's Build Something Great.</h2>
        <p>Tell us about your room and goals, and our team will help you plan the right equipment and home gym setup.</p>
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
      <h3>Everything Your Home Gym Needs <span>to Perform</span></h3>
      <p>Build a complete training space with the right equipment for cardio, strength, functional training and more.</p>
    </div>

    <div class="gym-setup-equipment__grid">

      <a href="#contact" class="gym-setup-equipment__card reveal">
        <img src="{{ asset('assets/images/home/Cardio-Equipment.jpg') }}" alt="Cardio equipment for home gym">
        <div class="gym-setup-equipment__overlay"></div>
        <div class="gym-setup-equipment__info">
          <h3>Cardio Equipment</h3>
          <p>Compact treadmills, bikes and cross trainers for home use.</p>
          <svg viewBox="0 0 24 24" width="20" height="20"><path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2"/></svg>
        </div>
      </a>

      <a href="#contact" class="gym-setup-equipment__card reveal">
        <img src="{{ asset('assets/images/home/Strength Equipment.jpg') }}" alt="Strength training machines for home gym">
        <div class="gym-setup-equipment__overlay"></div>
        <div class="gym-setup-equipment__info">
          <h3>Strength Equipment</h3>
          <p>Space-smart machines designed for effective home training.</p>
          <svg viewBox="0 0 24 24" width="20" height="20"><path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2"/></svg>
        </div>
      </a>

      <a href="#contact" class="gym-setup-equipment__card reveal">
        <img src="{{ asset('assets/images/home/Free Weights.jpg') }}" alt="Free weights dumbbells for home gym">
        <div class="gym-setup-equipment__overlay"></div>
        <div class="gym-setup-equipment__info">
          <h3>Free Weights</h3>
          <p>Dumbbells, barbells, plates and essentials for home training.</p>
          <svg viewBox="0 0 24 24" width="20" height="20"><path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2"/></svg>
        </div>
      </a>

      <a href="#contact" class="gym-setup-equipment__card reveal">
        <img src="{{ asset('assets/images/home/gym1.jpg') }}" alt="Functional training area at home">
        <div class="gym-setup-equipment__overlay"></div>
        <div class="gym-setup-equipment__info">
          <h3>Functional Training</h3>
          <p>Versatile, compact equipment for movement and performance at home.</p>
          <svg viewBox="0 0 24 24" width="20" height="20"><path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2"/></svg>
        </div>
      </a>

      <a href="#contact" class="gym-setup-equipment__card reveal">
        <img src="{{ asset('assets/images/home/guy-gym.jpg') }}" alt="Benches and squat racks for home gym">
        <div class="gym-setup-equipment__overlay"></div>
        <div class="gym-setup-equipment__info">
          <h3>Benches &amp; Racks</h3>
          <p>Sturdy, space-conscious foundations for safe strength training.</p>
          <svg viewBox="0 0 24 24" width="20" height="20"><path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2"/></svg>
        </div>
      </a>

      <a href="#contact" class="gym-setup-equipment__card reveal">
        <img src="{{ asset('assets/images/home/3d-gym-equipment.jpg') }}" alt="Home gym accessories">
        <div class="gym-setup-equipment__overlay"></div>
        <div class="gym-setup-equipment__info">
          <h3>Gym Accessories</h3>
          <p>Essential add-ons to complete your personal training space.</p>
          <svg viewBox="0 0 24 24" width="20" height="20"><path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2"/></svg>
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
      <p>From individual home gym equipment to complete space solutions, Fitway helps you build every part of your setup.</p>
    </div>

    <div class="gym-setup-products-services__grid">

      <div class="gym-setup-products-services__block reveal">
        <img src="{{ asset('assets/images/home/commercil-gym.jpg') }}" alt="Home gym equipment lineup">
        <div class="gym-setup-products-services__overlay"></div>
        <div class="gym-setup-products-services__content">
          <span class="label">Gym Equipment</span>
          <h3>Equip Your Home Space.</h3>
          <p>Explore equipment selected for performance, durability and every type of home training environment.</p>
          <ul>
            <li>Cardio Equipment</li>
            <li>Strength Equipment</li>
            <li>Free Weights</li>
            <li>Functional Training</li>
            <li>Benches &amp; Racks</li>
          </ul>
          <a href="#equipment" class="btn btn-outline-white">Explore Equipment</a>
        </div>
      </div>

      <div class="gym-setup-products-services__block reveal">
        <img src="{{ asset('assets/images/home/complete-home-gym.jpg') }}" alt="Complete home gym setup service">
        <div class="gym-setup-products-services__overlay"></div>
        <div class="gym-setup-products-services__content">
          <span class="label">Complete Home Gym Setup</span>
          <h3>We Build the Complete Experience.</h3>
          <p>From planning your space to installing the final piece of equipment, our team helps bring your home gym to life.</p>
          <ul>
            <li>Space Planning</li>
            <li>Gym Design</li>
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
      <h3>Home Gym Solutions <span>for Every Space</span></h3>
      <p>Every home has different requirements. Fitway helps you plan the right equipment and setup based on your goals, available space and budget.</p>
    </div>

    <div class="gym-setup-requirements__grid">

      <a href="#contact" class="gym-setup-requirements__card reveal">
        <img src="{{ asset('assets/images/home/home-setup.jpg') }}" alt="Compact home gym setup">
        <div class="gym-setup-requirements__overlay"></div>
        <div class="gym-setup-requirements__info">
          <span class="label">Home Gym</span>
          <h3>Compact Home Gym</h3>
          <p>Create a personalised training space designed around your fitness goals and available area.</p>
          <span class="gym-setup-requirements__arrow">
            <svg viewBox="0 0 24 24" width="18" height="18"><path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2"/></svg>
          </span>
        </div>
      </a>

      <a href="#contact" class="gym-setup-requirements__card reveal">
        <img src="{{ asset('assets/images/home/gymApartment.jpg') }}" alt="Compact apartment gym setup">
        <div class="gym-setup-requirements__overlay"></div>
        <div class="gym-setup-requirements__info">
          <span class="label">Apartment Gym</span>
          <h3>Apartment Gym</h3>
          <p>Space-efficient equipment and layouts designed for smaller homes and apartments.</p>
          <span class="gym-setup-requirements__arrow">
            <svg viewBox="0 0 24 24" width="18" height="18"><path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2"/></svg>
          </span>
        </div>
      </a>

      <a href="#contact" class="gym-setup-requirements__card reveal">
        <img src="{{ asset('assets/images/home/Garagegym-conversion.jpg') }}" alt="Dedicated fitness room conversion">
        <div class="gym-setup-requirements__overlay"></div>
        <div class="gym-setup-requirements__info">
          <span class="label">Fitness Room</span>
          <h3>Dedicated Fitness Room</h3>
          <p>Turn an unused garage or basement into a fully functional training space.</p>
          <span class="gym-setup-requirements__arrow">
            <svg viewBox="0 0 24 24" width="18" height="18"><path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2"/></svg>
          </span>
        </div>
      </a>

      <a href="#contact" class="gym-setup-requirements__card reveal">
        <img src="{{ asset('assets/images/home/Home-Strength.jpg') }}" alt="Multi-purpose home fitness area">
        <div class="gym-setup-requirements__overlay"></div>
        <div class="gym-setup-requirements__info">
          <span class="label">Flexible Space</span>
          <h3>Multi-Purpose Fitness Area</h3>
          <p>Create a durable, weather-ready fitness space in your backyard or patio.</p>
          <span class="gym-setup-requirements__arrow">
            <svg viewBox="0 0 24 24" width="18" height="18"><path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2"/></svg>
          </span>
        </div>
      </a>

      <a href="#contact" class="gym-setup-requirements__card reveal">
        <img src="{{ asset('assets/images/home/gymPremium.jpg') }}" alt="Premium luxury home gym setup">
        <div class="gym-setup-requirements__overlay"></div>
        <div class="gym-setup-requirements__info">
          <span class="label">Premium Setup</span>
          <h3>Luxury Home Gym</h3>
          <p>A premium, fully equipped training space designed to match your home and lifestyle.</p>
          <span class="gym-setup-requirements__arrow">
            <svg viewBox="0 0 24 24" width="18" height="18"><path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2"/></svg>
          </span>
        </div>
      </a>

       <a href="#contact" class="gym-setup-requirements__card reveal">
        <img src="{{ asset('assets/images/home/wellness.jpg') }}" alt="Personal training space at home">
        <div class="gym-setup-requirements__overlay"></div>
        <div class="gym-setup-requirements__info">
          <span class="label">Training Space</span>
          <h3>Personal Training Space</h3>
          <p>Combine fitness and recovery equipment for a complete personal wellness space.</p>
          <span class="gym-setup-requirements__arrow">
            <svg viewBox="0 0 24 24" width="18" height="18"><path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2"/></svg>
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
      <p>We combine equipment knowledge, planning and professional execution to help create home fitness spaces built around real requirements.</p>
    </div>

    <div class="gym-setup-why__stats">
      <div class="gym-setup-why__stat reveal">
        <h4>100+</h4>
        <p>Home Gyms Set Up</p>
      </div>
      <div class="gym-setup-why__stat reveal">
        <h4>500+</h4>
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
      <li class="reveal"><svg viewBox="0 0 24 24" width="20" height="20"><path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>Complete Project Support</li>
      <li class="reveal"><svg viewBox="0 0 24 24" width="20" height="20"><path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>Quality Equipment Selection</li>
      <li class="reveal"><svg viewBox="0 0 24 24" width="20" height="20"><path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>Personalized Fitness Solutions</li>
      <li class="reveal"><svg viewBox="0 0 24 24" width="20" height="20"><path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>Professional Installation</li>
      <li class="reveal"><svg viewBox="0 0 24 24" width="20" height="20"><path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>Single Point of Contact</li>
      <li class="reveal"><svg viewBox="0 0 24 24" width="20" height="20"><path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>Solutions Built Around Your Budget</li>
    </ul>
  </div>
</section>

<!-- PROJECTS -->
<section class="gym-setup-projects" id="projects">
  <div class="container">
    <div class="heading">
      <h3>Our <span>Work</span></h3>
      <p>Explore home fitness spaces designed, equipped and delivered by Fitway.</p>
    </div>
    <div class="gym-setup-projects__wrap">
      <div class="swiper gym-setup-projects__swiper">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <article class="gym-setup-projects__card">
              <img src="{{ asset('assets/images/home/Home-Cardio.jpg') }}" alt="Premium home gym project">
              <div class="gym-setup-projects__info">
                <span class="label">Home Gym</span>
                <h3>Premium Home Gym</h3>
                <p>A complete home gym setup designed with dedicated training zones and premium equipment.</p>
              </div>
            </article>
          </div>

          <div class="swiper-slide">
            <article class="gym-setup-projects__card">
              <img src="{{ asset('assets/images/home/gymApartment.jpg') }}" alt="Apartment fitness corner project">
              <div class="gym-setup-projects__info">
                <span class="label">Apartment Gym</span>
                <h3>Compact Apartment Setup</h3>
                <p>A space-efficient training corner designed for a compact apartment.</p>
              </div>
            </article>
          </div>

          <div class="swiper-slide">
            <article class="gym-setup-projects__card">
              <img src="{{ asset('assets/images/home/Home-Strength.jpg') }}" alt="Home gym room conversion project">
              <div class="gym-setup-projects__info">
                <span class="label">Fitness Room</span>
                <h3>Dedicated Fitness Room Setup</h3>
                <p>An unused room transformed into a fully functional strength training space.</p>
              </div>
            </article>
          </div>

          <div class="swiper-slide">
            <article class="gym-setup-projects__card">
              <img src="{{ asset('assets/images/home/Complete.jpg') }}" alt="Full service home gym setup project">
              <div class="gym-setup-projects__info">
                <span class="label">Complete Home Setup</span>
                <h3>Full-Service Home Gym Setup</h3>
                <p>From planning to installation, a complete home fitness space delivered by Fitway.</p>
              </div>
            </article>
          </div>

        </div>
      </div>

      <div class="gym-setup-projects__nav">
        <button class="gym-setup-projects__prev" aria-label="Previous project">
          <svg viewBox="0 0 24 24" width="20" height="20"><path d="M15 18l-6-6 6-6" fill="none" stroke="currentColor" stroke-width="2"/></svg>
        </button>
        <button class="gym-setup-projects__next" aria-label="Next project">
          <svg viewBox="0 0 24 24" width="20" height="20"><path d="M9 18l6-6-6-6" fill="none" stroke="currentColor" stroke-width="2"/></svg>
        </button>
      </div>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section class="home-secI" id="testimonials">
  <div class="container">
    <div class="heading">
      <h3>Trusted by <span>Homeowners</span></h3>
      <p>
        From quality equipment to complete home gym setup solutions, our clients
        trust Fitway to deliver reliable products and professional support.
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
                Fitway helped us set up our home gym from planning the
                layout to installation. The team understood our space
                and goals, and made the entire process smooth and
                professionally managed.
              </p>
              <div class="test_author">
                <span class="author-avatar">R</span>
                <div class="author-info">
                  <h5>Rahul Sharma</h5>
                  <span>Home Gym Owner</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Testimonial 2 -->
          <div class="swiper-slide">
            <div class="test_card">
              <span class="quote-mark">&#8220;</span>
              <p>
                We were looking for the right combination of cardio and strength
                equipment for our spare room. Fitway guided us through the
                selection process and delivered a setup that worked perfectly
                for our space.
              </p>
              <div class="test_author">
                <span class="author-avatar">A</span>
                <div class="author-info">
                  <h5>Amit Patel</h5>
                  <span>Apartment Gym Owner</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Testimonial 3 -->
          <div class="swiper-slide">
            <div class="test_card">
              <span class="quote-mark">&#8220;</span>
              <p>
                From the initial discussion to the final installation, the Fitway
                team was supportive and professional. They helped us make better
                use of our garage and create a practical training
                environment.
              </p>
              <div class="test_author">
                <span class="author-avatar">N</span>
                <div class="author-info">
                  <h5>Neha Mehta</h5>
                  <span>Home Gym Owner</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Testimonial 4 -->
          <div class="swiper-slide">
            <div class="test_card">
              <span class="quote-mark">&#8220;</span>
              <p>
                The quality of the equipment and the installation support were
                excellent. Fitway provided us with a complete solution instead
                of simply supplying machines, which made the entire project much
                easier to manage.
              </p>
              <div class="test_author">
                <span class="author-avatar">K</span>
                <div class="author-info">
                  <h5>Karan Malhotra</h5>
                  <span>Home Gym Project Owner</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Testimonial 5 -->
          <div class="swiper-slide">
            <div class="test_card">
              <span class="quote-mark">&#8220;</span>
              <p>
                Fitway helped us choose equipment that matched our space
                and budget. The team handled delivery and installation
                efficiently, and our home gym was ready to use without any
                unnecessary complications.
              </p>
              <div class="test_author">
                <span class="author-avatar">S</span>
                <div class="author-info">
                  <h5>Sameer Khan</h5>
                  <span>Homeowner</span>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="swiper-group">
        <button type="button" class="TestimonialSlider-prev btn-prev" aria-label="Previous testimonial">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
            <path fill="currentColor" d="M609.408 149.376L277.76 489.6a32 32 0 0 0 0 44.672l331.648 340.352a29.12 29.12 0 0 0 41.728 0a30.59 30.59 0 0 0 0-42.752L339.264 511.936l311.872-319.872a30.59 30.59 0 0 0 0-42.688a29.12 29.12 0 0 0-41.728 0"></path>
          </svg>
        </button>

        <button type="button" class="TestimonialSlider-next btn-next" aria-label="Next testimonial">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
            <path fill="currentColor" d="M414.592 149.376L746.24 489.6a32 32 0 0 1 0 44.672L414.592 874.624a29.12 29.12 0 0 1-41.728 0a30.59 30.59 0 0 1 0-42.752l311.872-319.936L372.864 192.064a30.59 30.59 0 0 1 0-42.688a29.12 29.12 0 0 1 41.728 0"></path>
          </svg>
        </button>
      </div>
    </div>
  </div>
</section>

<!-- FINAL CTA -->
<section class="gym-setup-cta">
  <div class="gym-setup-cta__bg">
    <img src="{{ asset('assets/images/home/form-banner.jpg') }}" alt="Premium home gym space ready for setup">
    <div class="gym-setup-cta__overlay"></div>
  </div>
  <div class="container">
    <div class="gym-setup-cta__content">
      <span class="label">Ready to Build?</span>
      <h2>Let's Build Your Home Gym.</h2>
      <p>Share your space and goals with our team and get the right equipment and setup solution for your home.</p>
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
        <span>Start Your Home Gym?</span>
      </h3>
      <p>
        Find answers about home gym planning, equipment selection,
        installation and complete setup solutions.
      </p>
    </div>

    <div class="accordion-wrapper">

      <!-- FAQ 01 -->
      <div class="accordion-item active">
        <div class="accordion-header">
          <h4>Does Fitway provide complete home gym setup solutions?</h4>
          <span class="accordion-icon">−</span>
        </div>
        <div class="accordion-content" style="display: block">
          <p>
            Yes. Fitway can support your home gym project from initial
            consultation and space planning to equipment selection, supply,
            installation and final setup.
          </p>
        </div>
      </div>

      <!-- FAQ 02 -->
      <div class="accordion-item">
        <div class="accordion-header">
          <h4>Can Fitway help me plan my home gym space?</h4>
          <span class="accordion-icon">+</span>
        </div>
        <div class="accordion-content">
          <p>
            Yes. Our team can help you plan a practical layout based on your
            available room, spare space or garage, equipment requirements and the
            overall training experience you want to create.
          </p>
        </div>
      </div>

      <!-- FAQ 03 -->
      <div class="accordion-item">
        <div class="accordion-header">
          <h4>How do you select the right equipment for my home gym?</h4>
          <span class="accordion-icon">+</span>
        </div>
        <div class="accordion-content">
          <p>
            Equipment is selected based on your fitness goals, available space,
            training preferences and budget to create a balanced and functional
            home training environment.
          </p>
        </div>
      </div>

      <!-- FAQ 04 -->
      <div class="accordion-item">
        <div class="accordion-header">
          <h4>Can I set up a home gym within a specific budget?</h4>
          <span class="accordion-icon">+</span>
        </div>
        <div class="accordion-content">
          <p>
            Yes. We can help recommend suitable equipment and setup solutions
            based on your available budget while focusing on the most important
            requirements of your home fitness space.
          </p>
        </div>
      </div>

      <!-- FAQ 05 -->
      <div class="accordion-item">
        <div class="accordion-header">
          <h4>What types of equipment can be included in a home gym?</h4>
          <span class="accordion-icon">+</span>
        </div>
        <div class="accordion-content">
          <p>
            Depending on your requirements, your home gym can include cardio
            equipment, strength machines, free weights, functional training
            equipment, benches, racks and essential fitness accessories.
          </p>
        </div>
      </div>

      <!-- FAQ 06 -->
      <div class="accordion-item">
        <div class="accordion-header">
          <h4>Does Fitway provide equipment delivery and installation?</h4>
          <span class="accordion-icon">+</span>
        </div>
        <div class="accordion-content">
          <p>
            Yes. As part of our complete home gym setup support, Fitway can manage
            equipment delivery, positioning and professional installation to
            help prepare your space for use.
          </p>
        </div>
      </div>

      <!-- FAQ 07 -->
      <div class="accordion-item">
        <div class="accordion-header">
          <h4>Can you help set up a gym from an empty room?</h4>
          <span class="accordion-icon">+</span>
        </div>
        <div class="accordion-content">
          <p>
            Yes. Whether you are starting with an empty room, garage or spare
            space, Fitway can help you plan the setup and select the right
            equipment for your project.
          </p>
        </div>
      </div>

      <!-- FAQ 08 -->
      <div class="accordion-item">
        <div class="accordion-header">
          <h4>What information do you need to start planning my home gym?</h4>
          <span class="accordion-icon">+</span>
        </div>
        <div class="accordion-content">
          <p>
            We typically need details about your available space, fitness goals,
            preferred equipment, training style and approximate budget to
            understand your needs better.
          </p>
        </div>
      </div>

      <!-- FAQ 09 -->
      <div class="accordion-item">
        <div class="accordion-header">
          <h4>How do I get started with my home gym project?</h4>
          <span class="accordion-icon">+</span>
        </div>
        <div class="accordion-content">
          <p>
            Simply share your project requirements through our enquiry form.
            Our team will get in touch to understand your space and help you
            explore the right equipment and home gym setup solution.
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
        Ready to Build Your
        <span>Dream Home Gym?</span>
      </h3>
      <p>
        Explore premium home gym equipment and complete setup solutions designed for your space and goals.
      </p>
    </div>

    <div class="grid">
      <div class="img">
        <img src="{{ asset('assets/images/home/ready-contact.jpg') }}" alt="">
      </div>

      <!-- Right: Contact Form -->
      <div class="contact-form2">
        <form class="contact-form__form" method="post">
          @csrf
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
                <input type="checkbox" name="interest" value="Gym Equipment" />
                <span class="contact-form__checkbox-box"></span>
                <span class="contact-form__checkbox-label">Gym Equipment</span>
              </label>

              <label class="contact-form__checkbox">
                <input type="checkbox" name="interest" value="Home Gym Setup" />
                <span class="contact-form__checkbox-box"></span>
                <span class="contact-form__checkbox-label">Home Gym Setup</span>
              </label>

              <label class="contact-form__checkbox">
                <input type="checkbox" name="interest" value="Apartment Gym Setup" />
                <span class="contact-form__checkbox-box"></span>
                <span class="contact-form__checkbox-label">Apartment Gym Setup</span>
              </label>

              <label class="contact-form__checkbox">
                <input type="checkbox" name="interest" value="Garage Gym Setup" />
                <span class="contact-form__checkbox-box"></span>
                <span class="contact-form__checkbox-label">Garage Gym Setup</span>
              </label>

              <label class="contact-form__checkbox">
                <input type="checkbox" name="interest" value="Outdoor / Patio Gym Setup" />
                <span class="contact-form__checkbox-box"></span>
                <span class="contact-form__checkbox-label">Outdoor / Patio Gym Setup</span>
              </label>

              <label class="contact-form__checkbox">
                <input type="checkbox" name="interest" value="Luxury Home Gym Setup" />
                <span class="contact-form__checkbox-box"></span>
                <span class="contact-form__checkbox-label">Luxury Home Gym Setup</span>
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
