@extends('layouts.gym-app')

@section('title',  $pageSeo->seo->meta_title ?? 'Commercial Gym Setup | Fitway')
@section('meta_description', $pageSeo->seo->meta_description ?? 'Build a commercial gym that delivers exceptional results with our comprehensive setup solutions.')

@section('content')

<!-- HERO + LEAD FORM -->
<section class="gym-setup-hero" id="home">
  <div class="gym-setup-hero__bg">
    <img src="{{ asset('assets/images/home/Commercial-Equipment-banner.jpg') }}" alt="Commercial gym setup space">
    <div class="gym-setup-hero__overlay"></div>
  </div>
  <div class="container">
    <div class="gym-setup-hero__grid">

      <div class="gym-setup-hero__content reveal">
        <span class="label">Commercial Gym Setup</span>
        <h1>Build a Gym Built for Performance.</h1>
        <p>From space planning and gym design to commercial-grade equipment, delivery and professional installation, Fitway provides complete commercial gym setup solutions tailored to your business, space and budget.</p>

        <ul class="gym-setup-hero__points">
          <li><svg viewBox="0 0 24 24" width="18" height="18"><path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>Complete Space Planning</li>
          <li><svg viewBox="0 0 24 24" width="18" height="18"><path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>Premium Equipment Selection</li>
          <li><svg viewBox="0 0 24 24" width="18" height="18"><path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>Professional Installation</li>
        </ul>

        <a href="#services" class="btn btn-outline-white">Plan Your Gym</a>
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
              <textarea id="details" name="details" rows="2" placeholder="Tell us more about your commercial gym requirement..."></textarea>
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
        <img src="{{ asset('assets/images/home/Commercial-Equipment.jpg') }}" alt="Modern commercial gym floor">
      </div>
      <div class="gym-setup-intro__content reveal">
        <span class="label">Complete Commercial Gym Setup</span>
        <h2>More Than Equipment. A Complete Business Solution.</h2>
        <p>A successful commercial gym needs more than machines on a floor. It needs proper zoning, the right equipment mix and a layout that supports smooth member flow and professional execution.</p>

        <ul class="gym-setup-intro__points">
          <li><svg viewBox="0 0 24 24" width="20" height="20"><path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>Optimised Space Planning</li>
          <li><svg viewBox="0 0 24 24" width="20" height="20"><path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>Professional Gym Layout</li>
          <li><svg viewBox="0 0 24 24" width="20" height="20"><path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>End-to-End Project Execution</li>
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
      <p>From an empty commercial space to a fully operational fitness business, we manage every important part of your gym setup.</p>
    </div>

    <div class="gym-setup-services__grid">

      <article class="gym-setup-services__card reveal">
        <span class="gym-setup-services__num">01</span>
        <div class="gym-setup-services__icon">
          <svg viewBox="0 0 24 24" width="28" height="28"><path d="M3 9l9-6 9 6v11a1 1 0 01-1 1H4a1 1 0 01-1-1V9z" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>
        </div>
        <h3>Space Planning</h3>
        <p>We map your available floor area into clear training zones for a smooth member experience.</p>
      </article>

      <article class="gym-setup-services__card reveal">
        <span class="gym-setup-services__num">02</span>
        <div class="gym-setup-services__icon">
          <svg viewBox="0 0 24 24" width="28" height="28"><path d="M3 3h7v7H3zM14 3h7v7h-7zM3 14h7v7H3zM14 14h7v7h-7z" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>
        </div>
        <h3>Gym Design &amp; Layout</h3>
        <p>Create a smart equipment layout that supports better movement, training zones and member flow.</p>
      </article>

      <article class="gym-setup-services__card reveal">
        <span class="gym-setup-services__num">03</span>
        <div class="gym-setup-services__icon">
          <svg viewBox="0 0 24 24" width="28" height="28"><path d="M6.5 6.5l11 11M4 12h16M6.5 17.5l11-11" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>
        </div>
        <h3>Equipment Selection</h3>
        <p>Choose the right mix of cardio, strength and functional equipment built for daily high-usage training.</p>
      </article>

      <article class="gym-setup-services__card reveal">
        <span class="gym-setup-services__num">04</span>
        <div class="gym-setup-services__icon">
          <svg viewBox="0 0 24 24" width="28" height="28"><path d="M3 7h18M3 12h18M3 17h18" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>
        </div>
        <h3>Equipment Supply</h3>
        <p>Get quality commercial-grade equipment selected specifically for your gym's training goals.</p>
      </article>

      <article class="gym-setup-services__card reveal">
        <span class="gym-setup-services__num">05</span>
        <div class="gym-setup-services__icon">
          <svg viewBox="0 0 24 24" width="28" height="28"><path d="M3 12h13l-4-4m4 4l-4 4" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>
        </div>
        <h3>Delivery &amp; Installation</h3>
        <p>Our team manages equipment delivery and professional installation for a smooth commercial setup.</p>
      </article>

      <article class="gym-setup-services__card reveal">
        <span class="gym-setup-services__num">06</span>
        <div class="gym-setup-services__icon">
          <svg viewBox="0 0 24 24" width="28" height="28"><path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>
        </div>
        <h3>Final Setup &amp; Support</h3>
        <p>We help ensure your commercial gym is properly set up and ready to welcome members.</p>
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
      <p>Our structured process helps turn your commercial space into a complete and functional fitness business.</p>
    </div>

    <div class="gym-setup-process__track">
      <div class="gym-setup-process__step reveal">
        <span class="gym-setup-process__num">01</span>
        <h3>Consultation</h3>
        <p>We understand your business goals, space, target members and budget.</p>
      </div>
      <div class="gym-setup-process__step reveal">
        <span class="gym-setup-process__num">02</span>
        <h3>Space Assessment</h3>
        <p>We review the available area and plan the right training zones.</p>
      </div>
      <div class="gym-setup-process__step reveal">
        <span class="gym-setup-process__num">03</span>
        <h3>Selection</h3>
        <p>Our team helps select commercial equipment based on your goals, space and budget.</p>
      </div>
      <div class="gym-setup-process__step reveal">
        <span class="gym-setup-process__num">04</span>
        <h3>Installation</h3>
        <p>We deliver and professionally install commercial equipment at your facility.</p>
      </div>
      <div class="gym-setup-process__step reveal">
        <span class="gym-setup-process__num">05</span>
        <h3>Ready to Open</h3>
        <p>Your gym is prepared, equipped and ready for members.</p>
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
        <span class="label">Ready to Start Your Gym Business?</span>
        <h2>Let's Turn Your Space Into a Professional Fitness Destination.</h2>
        <p>Tell us about your project and our team will help you plan the right equipment and commercial gym setup solution.</p>
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
      <h3>Everything Your Gym Needs <span>to Perform</span></h3>
      <p>Build a complete commercial training environment with the right equipment for cardio, strength, functional training and more.</p>
    </div>

    <div class="gym-setup-equipment__grid">

      <a href="#contact" class="gym-setup-equipment__card reveal">
        <img src="{{ asset('assets/images/home/Cardio-Equipment.jpg') }}" alt="Commercial cardio equipment">
        <div class="gym-setup-equipment__overlay"></div>
        <div class="gym-setup-equipment__info">
          <h3>Cardio Equipment</h3>
          <p>Treadmills, bikes and cross trainers built for daily commercial use.</p>
          <svg viewBox="0 0 24 24" width="20" height="20"><path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2"/></svg>
        </div>
      </a>

      <a href="#contact" class="gym-setup-equipment__card reveal">
        <img src="{{ asset('assets/images/home/Strength Equipment.jpg') }}" alt="Commercial strength training machines">
        <div class="gym-setup-equipment__overlay"></div>
        <div class="gym-setup-equipment__info">
          <h3>Strength Equipment</h3>
          <p>Professional-grade machines built for high-usage fitness environments.</p>
          <svg viewBox="0 0 24 24" width="20" height="20"><path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2"/></svg>
        </div>
      </a>

      <a href="#contact" class="gym-setup-equipment__card reveal">
        <img src="{{ asset('assets/images/home/Free Weights.jpg') }}" alt="Free weights dumbbells for commercial gym">
        <div class="gym-setup-equipment__overlay"></div>
        <div class="gym-setup-equipment__info">
          <h3>Free Weights</h3>
          <p>Durable dumbbells, barbells and plates built for commercial training floors.</p>
          <svg viewBox="0 0 24 24" width="20" height="20"><path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2"/></svg>
        </div>
      </a>

      <a href="#contact" class="gym-setup-equipment__card reveal">
        <img src="{{ asset('assets/images/home/private-trianer.avif') }}" alt="Functional training area for gym">
        <div class="gym-setup-equipment__overlay"></div>
        <div class="gym-setup-equipment__info">
          <h3>Functional Training</h3>
          <p>Versatile equipment built for modern group and performance training zones.</p>
          <svg viewBox="0 0 24 24" width="20" height="20"><path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2"/></svg>
        </div>
      </a>

      <a href="#contact" class="gym-setup-equipment__card reveal">
        <img src="{{ asset('assets/images/home/guy-gym.jpg') }}" alt="Benches and squat racks for commercial gym">
        <div class="gym-setup-equipment__overlay"></div>
        <div class="gym-setup-equipment__info">
          <h3>Benches &amp; Racks</h3>
          <p>Heavy-duty foundations built for safe, high-frequency commercial use.</p>
          <svg viewBox="0 0 24 24" width="20" height="20"><path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2"/></svg>
        </div>
      </a>

      <a href="#contact" class="gym-setup-equipment__card reveal">
        <img src="{{ asset('assets/images/home/3d-gym-equipment.jpg') }}" alt="Commercial gym accessories">
        <div class="gym-setup-equipment__overlay"></div>
        <div class="gym-setup-equipment__info">
          <h3>Gym Accessories</h3>
          <p>Essential commercial-grade equipment to complete your fitness floor.</p>
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
      <p>From individual commercial gym equipment to complete facility solutions, Fitway helps you build every part of your gym business.</p>
    </div>

    <div class="gym-setup-products-services__grid">

      <div class="gym-setup-products-services__block reveal">
        <img src="{{ asset('assets/images/home/commercil-gym.jpg') }}" alt="Commercial gym equipment lineup">
        <div class="gym-setup-products-services__overlay"></div>
        <div class="gym-setup-products-services__content">
          <span class="label">Commercial Gym Equipment</span>
          <h3>Equip Your Fitness Business.</h3>
          <p>Explore equipment selected for performance, durability and every type of commercial training environment.</p>
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
        <img src="{{ asset('assets/images/home/Complete.jpg') }}" alt="Complete commercial gym setup service">
        <div class="gym-setup-products-services__overlay"></div>
        <div class="gym-setup-products-services__content">
          <span class="label">Complete Commercial Gym Setup</span>
          <h3>We Build the Complete Experience.</h3>
          <p>From planning your floor layout to installing the final piece of equipment, our team helps bring your commercial gym to life.</p>
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
      <h3>Gym Solutions <span>for Every Business</span></h3>
      <p>Every commercial fitness business has different requirements. Fitway helps you plan the right equipment and setup based on your members, available space and budget.</p>
    </div>

    <div class="gym-setup-requirements__grid">

      <a href="#contact" class="gym-setup-requirements__card reveal">
        <img src="{{ asset('assets/images/home/commercil-gym.jpg') }}" alt="Commercial gym facility">
        <div class="gym-setup-requirements__overlay"></div>
        <div class="gym-setup-requirements__info">
          <span class="label">Commercial Gym</span>
          <h3>Full-Service Commercial Gym</h3>
          <p>Create a complete, professional gym designed around your business goals and available area.</p>
          <span class="gym-setup-requirements__arrow">
            <svg viewBox="0 0 24 24" width="18" height="18"><path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2"/></svg>
          </span>
        </div>
      </a>

      <a href="#contact" class="gym-setup-requirements__card reveal">
        <img src="{{ asset('assets/images/home/Gym-Expansion.jpg') }}" alt="Boutique fitness studio">
        <div class="gym-setup-requirements__overlay"></div>
        <div class="gym-setup-requirements__info">
          <span class="label">Fitness Studio</span>
          <h3>Boutique Fitness Studio</h3>
          <p>Space-efficient equipment and layouts designed for specialised group and studio training.</p>
          <span class="gym-setup-requirements__arrow">
            <svg viewBox="0 0 24 24" width="18" height="18"><path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2"/></svg>
          </span>
        </div>
      </a>

      <a href="#contact" class="gym-setup-requirements__card reveal">
        <img src="{{ asset('assets/images/home/private-trianer.avif') }}" alt="Strength and conditioning gym">
        <div class="gym-setup-requirements__overlay"></div>
        <div class="gym-setup-requirements__info">
          <span class="label">Strength Training</span>
          <h3>Strength &amp; Conditioning Gym</h3>
          <p>Turn a commercial space into a purpose-built facility for performance-focused training.</p>
          <span class="gym-setup-requirements__arrow">
            <svg viewBox="0 0 24 24" width="18" height="18"><path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2"/></svg>
          </span>
        </div>
      </a>

      <a href="#contact" class="gym-setup-requirements__card reveal">
        <img src="{{ asset('assets/images/home/gym1.jpg') }}" alt="Functional training centre">
        <div class="gym-setup-requirements__overlay"></div>
        <div class="gym-setup-requirements__info">
          <span class="label">Functional Training</span>
          <h3>Functional Training Centre</h3>
          <p>Create a durable, dynamic space designed for functional and group performance workouts.</p>
          <span class="gym-setup-requirements__arrow">
            <svg viewBox="0 0 24 24" width="18" height="18"><path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2"/></svg>
          </span>
        </div>
      </a>

      <a href="#contact" class="gym-setup-requirements__card reveal">
        <img src="{{ asset('assets/images/home/health-club.jpg') }}" alt="Fitness centre health club">
        <div class="gym-setup-requirements__overlay"></div>
        <div class="gym-setup-requirements__info">
          <span class="label">Health Club</span>
          <h3>Fitness Centre / Health Club</h3>
          <p>A premium, fully equipped facility designed to match your business scale and member needs.</p>
          <span class="gym-setup-requirements__arrow">
            <svg viewBox="0 0 24 24" width="18" height="18"><path d="M7 17L17 7M17 7H9M17 7v8" fill="none" stroke="currentColor" stroke-width="2"/></svg>
          </span>
        </div>
      </a>

       <a href="#contact" class="gym-setup-requirements__card reveal">
        <img src="{{ asset('assets/images/home/Gym-Expansion.jpg') }}" alt="Gym expansion and upgrade">
        <div class="gym-setup-requirements__overlay"></div>
        <div class="gym-setup-requirements__info">
          <span class="label">Expansion</span>
          <h3>Gym Expansion &amp; Upgrade</h3>
          <p>Scale your existing facility with new equipment, layout upgrades and added training zones.</p>
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
      <p>We combine equipment knowledge, planning and professional execution to help build commercial fitness spaces around real business requirements.</p>
    </div>

    <div class="gym-setup-why__stats">
      <div class="gym-setup-why__stat reveal">
        <h4>100+</h4>
        <p>Commercial Projects Completed</p>
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
      <li class="reveal"><svg viewBox="0 0 24 24" width="20" height="20"><path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>Professional Gym Planning</li>
      <li class="reveal"><svg viewBox="0 0 24 24" width="20" height="20"><path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>Custom Commercial Solutions</li>
      <li class="reveal"><svg viewBox="0 0 24 24" width="20" height="20"><path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>Expert Installation Team</li>
      <li class="reveal"><svg viewBox="0 0 24 24" width="20" height="20"><path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>Single Point of Contact</li>
      <li class="reveal"><svg viewBox="0 0 24 24" width="20" height="20"><path d="M20 6L9 17l-5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>Solutions Based on Your Budget</li>
    </ul>
  </div>
</section>

<!-- PROJECTS -->
<section class="gym-setup-projects" id="projects">
  <div class="container">
    <div class="heading">
      <h3>Our <span>Work</span></h3>
      <p>Explore commercial fitness spaces designed, equipped and delivered by Fitway.</p>
    </div>
    <div class="gym-setup-projects__wrap">
      <div class="swiper gym-setup-projects__swiper">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <article class="gym-setup-projects__card">
              <img src="{{ asset('assets/images/home/gymPremium.jpg') }}" alt="Premium commercial gym project">
              <div class="gym-setup-projects__info">
                <span class="label">Commercial Gym</span>
                <h3>Premium Commercial Gym</h3>
                <p>A complete gym setup designed with dedicated training zones and premium commercial equipment.</p>
              </div>
            </article>
          </div>

          <div class="swiper-slide">
            <article class="gym-setup-projects__card">
              <img src="{{ asset('assets/images/home/mordern.jpg') }}" alt="Modern fitness centre project">
              <div class="gym-setup-projects__info">
                <span class="label">Fitness Centre</span>
                <h3>Modern Fitness Centre</h3>
                <p>A full-scale fitness facility designed to support a growing member base.</p>
              </div>
            </article>
          </div>

          <div class="swiper-slide">
            <article class="gym-setup-projects__card">
              <img src="{{ asset('assets/images/home/Strength Equipment.jpg') }}" alt="Strength and performance studio">
              <div class="gym-setup-projects__info">
                <span class="label">Strength Training</span>
                <h3>Strength &amp; Performance Studio</h3>
                <p>A focused commercial training environment built for performance and strength.</p>
              </div>
            </article>
          </div>

          <div class="swiper-slide">
            <article class="gym-setup-projects__card">
              <img src="{{ asset('assets/images/home/commercil-gym.jpg') }}" alt="Full service commercial gym setup project">
              <div class="gym-setup-projects__info">
                <span class="label">Complete Fitness Space</span>
                <h3>Complete Commercial Gym Setup</h3>
                <p>From planning to installation, a complete commercial fitness facility delivered by Fitway.</p>
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
      <h3>Trusted by <span>Fitness Businesses</span></h3>
      <p>
        From quality equipment to complete commercial gym setup solutions, our clients
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
                Fitway helped us set up our complete commercial gym from planning
                the equipment layout to installation. The team understood our
                business requirements and made the entire process smooth and
                professionally managed.
              </p>
              <div class="test_author">
                <span class="author-avatar">R</span>
                <div class="author-info">
                  <h5>Rahul Sharma</h5>
                  <span>Commercial Gym Owner</span>
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
                equipment for our fitness centre. Fitway guided us through the
                selection process and delivered a setup that worked perfectly
                for our members.
              </p>
              <div class="test_author">
                <span class="author-avatar">A</span>
                <div class="author-info">
                  <h5>Amit Patel</h5>
                  <span>Fitness Centre Owner</span>
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
                use of our floor space and create a practical training
                environment for our members.
              </p>
              <div class="test_author">
                <span class="author-avatar">N</span>
                <div class="author-info">
                  <h5>Neha Mehta</h5>
                  <span>Gym Entrepreneur</span>
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
                of simply supplying machines, which made the entire commercial
                project much easier to manage.
              </p>
              <div class="test_author">
                <span class="author-avatar">K</span>
                <div class="author-info">
                  <h5>Karan Malhotra</h5>
                  <span>Fitness Studio Owner</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Testimonial 5 -->
          <div class="swiper-slide">
            <div class="test_card">
              <span class="quote-mark">&#8220;</span>
              <p>
                Fitway helped us choose equipment that matched our business
                requirements and budget. The team handled delivery and
                installation efficiently, and our gym was ready to open without
                any unnecessary complications.
              </p>
              <div class="test_author">
                <span class="author-avatar">S</span>
                <div class="author-info">
                  <h5>Sameer Khan</h5>
                  <span>Commercial Facility Manager</span>
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
    <img src="{{ asset('assets/images/home/form-banner.jpg') }}" alt="Premium commercial gym space ready for setup">
    <div class="gym-setup-cta__overlay"></div>
  </div>
  <div class="container">
    <div class="gym-setup-cta__content">
      <span class="label">Ready to Build?</span>
      <h2>Ready to Build Your Commercial Gym?</h2>
      <p>Share your project requirements with our team and get the right commercial equipment, planning and setup solution for your fitness business.</p>
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
        <span>Start Your Gym?</span>
      </h3>
      <p>
        Find answers about commercial gym planning, equipment selection,
        installation and complete gym setup solutions.
      </p>
    </div>

    <div class="accordion-wrapper">

      <!-- FAQ 01 -->
      <div class="accordion-item active">
        <div class="accordion-header">
          <h4>Does Fitway provide complete commercial gym setup solutions?</h4>
          <span class="accordion-icon">−</span>
        </div>
        <div class="accordion-content" style="display: block">
          <p>
            Yes. Fitway can support your commercial gym project from initial
            consultation and space planning to equipment selection, supply,
            installation and final setup.
          </p>
        </div>
      </div>

      <!-- FAQ 02 -->
      <div class="accordion-item">
        <div class="accordion-header">
          <h4>Can Fitway help me plan my commercial gym space?</h4>
          <span class="accordion-icon">+</span>
        </div>
        <div class="accordion-content">
          <p>
            Yes. Our team can help you plan a practical gym layout based on your
            available space, training zones, equipment requirements and the
            overall experience you want to create for your members.
          </p>
        </div>
      </div>

      <!-- FAQ 03 -->
      <div class="accordion-item">
        <div class="accordion-header">
          <h4>How do you decide which equipment is right for my commercial gym?</h4>
          <span class="accordion-icon">+</span>
        </div>
        <div class="accordion-content">
          <p>
            Equipment is selected based on your gym type, available space,
            target members, training requirements and project budget to create
            a balanced and functional fitness environment.
          </p>
        </div>
      </div>

      <!-- FAQ 04 -->
      <div class="accordion-item">
        <div class="accordion-header">
          <h4>Can you set up a commercial gym within my budget?</h4>
          <span class="accordion-icon">+</span>
        </div>
        <div class="accordion-content">
          <p>
            Yes. We can help recommend suitable equipment and setup solutions
            based on your available budget while focusing on the most important
            requirements of your fitness business.
          </p>
        </div>
      </div>

      <!-- FAQ 05 -->
      <div class="accordion-item">
        <div class="accordion-header">
          <h4>What equipment is required for a commercial gym?</h4>
          <span class="accordion-icon">+</span>
        </div>
        <div class="accordion-content">
          <p>
            Depending on your requirements, your gym can include commercial
            cardio equipment, strength machines, free weights, functional
            training equipment, benches, racks and essential fitness accessories.
          </p>
        </div>
      </div>

      <!-- FAQ 06 -->
      <div class="accordion-item">
        <div class="accordion-header">
          <h4>Does Fitway provide delivery and professional installation?</h4>
          <span class="accordion-icon">+</span>
        </div>
        <div class="accordion-content">
          <p>
            Yes. As part of our complete gym setup support, Fitway can manage
            equipment delivery, positioning and professional installation to
            help prepare your fitness space for use.
          </p>
        </div>
      </div>

      <!-- FAQ 07 -->
      <div class="accordion-item">
        <div class="accordion-header">
          <h4>Can you help set up a gym from an empty commercial space?</h4>
          <span class="accordion-icon">+</span>
        </div>
        <div class="accordion-content">
          <p>
            Yes. Whether you are starting with an empty commercial space or
            upgrading an existing facility, Fitway can help you plan the setup
            and select the right equipment for your project.
          </p>
        </div>
      </div>

      <!-- FAQ 08 -->
      <div class="accordion-item">
        <div class="accordion-header">
          <h4>How long does a commercial gym setup take?</h4>
          <span class="accordion-icon">+</span>
        </div>
        <div class="accordion-content">
          <p>
            Project timelines depend on the size of your space, equipment
            requirements and scope of work. Our team will share a clear
            timeline once your project details are finalised.
          </p>
        </div>
      </div>

      <!-- FAQ 09 -->
      <div class="accordion-item">
        <div class="accordion-header">
          <h4>What information do you need to plan my commercial gym?</h4>
          <span class="accordion-icon">+</span>
        </div>
        <div class="accordion-content">
          <p>
            We typically need details about your available space, gym type,
            business goals, expected members, equipment requirements and
            approximate budget to understand your project better.
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
        <span>Commercial Gym?</span>
      </h3>
      <p>
        Tell us about your space, business goals and requirements. Our team will help you plan the right commercial gym equipment and complete setup solution.
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
                <input type="checkbox" name="interest" value="Commercial Gym Setup" />
                <span class="contact-form__checkbox-box"></span>
                <span class="contact-form__checkbox-label">Commercial Gym Setup</span>
              </label>

              <label class="contact-form__checkbox">
                <input type="checkbox" name="interest" value="Space Planning & Layout" />
                <span class="contact-form__checkbox-box"></span>
                <span class="contact-form__checkbox-label">Space Planning &amp; Layout</span>
              </label>

              <label class="contact-form__checkbox">
                <input type="checkbox" name="interest" value="Equipment Installation" />
                <span class="contact-form__checkbox-box"></span>
                <span class="contact-form__checkbox-label">Equipment Installation</span>
              </label>

              <label class="contact-form__checkbox">
                <input type="checkbox" name="interest" value="Gym Upgrade" />
                <span class="contact-form__checkbox-box"></span>
                <span class="contact-form__checkbox-label">Gym Upgrade</span>
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