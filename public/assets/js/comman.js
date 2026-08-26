document.addEventListener('DOMContentLoaded', function () {

  // 1. ANNOUNCEMENT SLIDER
  (function announcementSlider() {
    var items = document.querySelectorAll('.fitway-topbar__item');
    if (!items.length || items.length < 2) return;
    var current = 0;

    setInterval(function () {
      var currentItem = items[current];
      var nextIndex = (current + 1) % items.length;
      var nextItem = items[nextIndex];

      currentItem.classList.add('is-leaving');
      currentItem.classList.remove('is-active');

      nextItem.style.transform = 'translateY(100%)';
      nextItem.style.opacity = '0';

      requestAnimationFrame(function () {
        nextItem.classList.add('is-active');
      });

      setTimeout(function () {
        currentItem.classList.remove('is-leaving');
        currentItem.style.transform = '';
        currentItem.style.opacity = '';
      }, 500);

      current = nextIndex;
    }, 2000);
  })();

  // 2. STICKY HEADER
  (function stickyHeader() {
    var header = document.getElementById('fitwayHeader');
    if (!header) return;

    function onScroll() {
      if (window.scrollY > 40) {
        header.classList.add('is-scrolled');
      } else {
        header.classList.remove('is-scrolled');
      }
    }
    window.addEventListener('scroll', onScroll);
    onScroll();
  })();

  // 3 & 4. MOBILE MENU
  (function mobileMenu() {
    var burger = document.getElementById('fitwayBurger');
    var menu = document.getElementById('fitwayMobileMenu');
    var closeBtn = document.getElementById('fitwayMobileClose');
    var overlay = document.getElementById('fitwayMobileOverlay');
    var links = document.querySelectorAll('.fitway-mobile-link');
    if (!burger || !menu) return;

    function openMenu() {
      menu.classList.add('is-open');
      overlay.classList.add('is-open');
      document.body.style.overflow = 'hidden';
    }
    function closeMenu() {
      menu.classList.remove('is-open');
      overlay.classList.remove('is-open');
      document.body.style.overflow = '';
    }

    burger.addEventListener('click', openMenu);
    closeBtn.addEventListener('click', closeMenu);
    overlay.addEventListener('click', closeMenu);

    links.forEach(function (link) {
      link.addEventListener('click', closeMenu);
    });

    // 5. MOBILE GYM SETUP ACCORDION
    var accBtn = document.querySelector('.fitway-mobile-menu__accordion-btn');
    var accPanel = document.querySelector('.fitway-mobile-menu__accordion-panel');
    if (accBtn && accPanel) {
      accBtn.addEventListener('click', function () {
        var isOpen = accBtn.classList.toggle('is-open');
        accPanel.style.maxHeight = isOpen ? accPanel.scrollHeight + 'px' : '0px';
      });
    }
  })();

  // 6. SMOOTH SCROLL (accounting for sticky header)
  (function smoothScroll() {
    var header = document.getElementById('fitwayHeader');

    document.querySelectorAll('a[href^="#"]').forEach(function (link) {
      link.addEventListener('click', function (e) {
        var id = this.getAttribute('href');
        if (id.length < 2) return;
        var target = document.querySelector(id);
        if (!target) return;

        e.preventDefault();
        var headerHeight = header ? header.offsetHeight : 0;
        var topbar = document.querySelector('.fitway-topbar');
        var topbarHeight = topbar ? topbar.offsetHeight : 0;
        var offset = target.getBoundingClientRect().top + window.pageYOffset - headerHeight - topbarHeight - 10;

        window.scrollTo({ top: offset, behavior: 'smooth' });
      });
    });
  })();

  // 7. GENERIC ACCORDION (.accordion-wrapper / .accordion-item)
  (function genericAccordion() {
    var wrappers = document.querySelectorAll('.accordion-wrapper');
    if (!wrappers.length) return;

    wrappers.forEach(function (wrapper) {
      if (wrapper.dataset.accordionInit === 'true') return;
      wrapper.dataset.accordionInit = 'true';

      var items = wrapper.querySelectorAll('.accordion-item');

      function closeItem(item) {
        var content = item.querySelector('.accordion-content');
        var icon = item.querySelector('.accordion-icon');
        item.classList.remove('active');
        if (content) content.style.maxHeight = '0px';
        if (icon) icon.textContent = '+';
      }

      function openItem(item) {
        var content = item.querySelector('.accordion-content');
        var icon = item.querySelector('.accordion-icon');
        item.classList.add('active');
        if (content) content.style.maxHeight = content.scrollHeight + 'px';
        if (icon) icon.textContent = '−';
      }

      items.forEach(function (item, index) {
        var content = item.querySelector('.accordion-content');
        var header = item.querySelector('.accordion-header');

        if (content) content.style.removeProperty('display');

        if (index === 0) {
          openItem(item);
        } else {
          closeItem(item);
        }

        header.addEventListener('click', function () {
          var isActive = item.classList.contains('active');
          items.forEach(closeItem);
          if (!isActive) openItem(item);
        });
      });
    });
  })();

  // 8. SWIPER — PROJECTS SLIDER
  (function projectsSwiper() {
    var el = document.querySelector('.gym-setup-projects__swiper');
    if (!el || typeof Swiper === 'undefined') return;

    new Swiper(el, {
      slidesPerView: 1,
      spaceBetween: 24,
      loop: true,
      autoplay: { delay: 4000, disableOnInteraction: false },
      navigation: {
        nextEl: '.gym-setup-projects__next',
        prevEl: '.gym-setup-projects__prev'
      },
      breakpoints: {
        541: { slidesPerView: 1 },
        1025: { slidesPerView: 2 },
        1366: { slidesPerView: 3 }
      }
    });
  })();

  // 9. SWIPER — TESTIMONIAL SLIDER (.TestimonialSlider, used elsewhere on site)
  (function testimonialSwiper() {
    var el = document.querySelector('.TestimonialSlider');
    if (!el || typeof Swiper === 'undefined') return;

    new Swiper(el, {
      navigation: {
        nextEl: '.TestimonialSlider-next',
        prevEl: '.TestimonialSlider-prev'
      },
      speed: 1000,
      loop: true,
      breakpoints: {
        0: { slidesPerView: 1.2, spaceBetween: 20 },
        640: { slidesPerView: 1.2, spaceBetween: 10 },
        768: { slidesPerView: 2.2, spaceBetween: 20 },
        991: { slidesPerView: 3, spaceBetween: 20 },
        1280: { slidesPerView: 3, spaceBetween: 20 }
      }
    });
  })();

  // 10. SCROLL REVEAL
  (function scrollReveal() {
    var items = document.querySelectorAll('.reveal');
    if (!items.length || !('IntersectionObserver' in window)) {
      items.forEach(function (el) { el.classList.add('is-visible'); });
      return;
    }

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });

    items.forEach(function (el) { observer.observe(el); });
  })();

  // 11. FORM VALIDATION (hero .contact-form)
  (function formValidation() {
    var form = document.getElementById('gymSetupForm');
    if (!form) return;

    var phoneRegex = /^[0-9+\-\s]{7,15}$/;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var valid = true;

      form.querySelectorAll('.contact-form__group').forEach(function (field) {
        var input = field.querySelector('input, textarea');
        var error = field.querySelector('.contact-form__error');
        if (!input || !input.hasAttribute('required')) return;

        var value = input.value.trim();
        var message = '';

        if (!value) {
          message = 'This field is required.';
        } else if (input.type === 'email' && !emailRegex.test(value)) {
          message = 'Enter a valid email address.';
        } else if (input.type === 'tel' && !phoneRegex.test(value)) {
          message = 'Enter a valid mobile number.';
        }

        if (message) {
          field.classList.add('has-error');
          if (error) error.textContent = message;
          valid = false;
        } else {
          field.classList.remove('has-error');
          if (error) error.textContent = '';
        }
      });

      if (!valid) return;

      form.reset();
      alert('Thank you! Our team will contact you shortly.');
    });
  })();

  // 12. TOPBAR CLONE-STYLE ANNOUNCEMENT (only runs if .announcement-wrapper markup exists)
  (function announcementClone() {
    var wrapper = document.querySelector('.announcement-wrapper');
    var items = document.querySelectorAll('.announcement-item');
    if (!wrapper || items.length <= 1) return;

    var itemHeight = items[0].offsetHeight;
    var currentIndex = 0;

    var firstItem = items[0].cloneNode(true);
    wrapper.appendChild(firstItem);

    setInterval(function () {
      currentIndex++;
      wrapper.style.transition = 'transform 0.6s ease';
      wrapper.style.transform = 'translateY(-' + (currentIndex * itemHeight) + 'px)';

      if (currentIndex === items.length) {
        setTimeout(function () {
          wrapper.style.transition = 'none';
          wrapper.style.transform = 'translateY(0)';
          currentIndex = 0;
        }, 2000);
      }
    }, 3000);
  })();

});