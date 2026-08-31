$(function () {
  if (!$("header").is(".header-fixed")) {
    $(window).on("scroll", function () {
      $(this).scrollTop() > 100
        ? $("header").addClass("header-fixed")
        : $("header").removeClass("header-fixed");
    });

    $(window).scrollTop() > 100
      ? $("header").addClass("header-fixed")
      : $("header").removeClass("header-fixed");
  }

  //

  const formControls = $(".form-control");

  formControls.on("focus input change blur", throttle(handleForm));

  formControls.each(function () {
    handleForm.call(this);
  });

  //

  niceSelect($);

  $("select").niceSelect();

  // Data-animate function call

  handleAnimations();

  //

  adjustWhatsAppUrls();

  $(window).resize(function () {
    adjustWhatsAppUrls();
  });

  //

  startCountAnimation();

  $(window).scroll(function () {
    startCountAnimation();
  });

  //


  $(".tab-nav li").on("click", function () {
    var tab = $(this).data("tab");
    var $target = $('.tab-nav-content .tabs[data-tab="' + tab + '"]');
    $(this).addClass("active").siblings().removeClass("active");
    if ($target.length) {
      $target.addClass("active").siblings(".tabs").removeClass("active");
    } else {
      $(".tab-nav-content .tabs").removeClass("active");
    }
  });
 
  $(document).on("click", "[data-scrollTo]", function () {
    headerheight =
      parseInt($(":root").css("--headerpadding")) +
      parseInt($(":root").css("--headerfixed"));

    var section = $(this).attr("data-scrollTo");

    if (section) {
      $("html, body")
        .stop()

        .animate(
          {
            scrollTop: $(section).offset().top - headerheight,
          },

          1000,
        );
    }
  });

$(document).on("click", "[data-model]", function () {
  var model = $(this).attr("data-model");
  var type = $(this).attr("data-type");
  openModel(model, type);
});

$(document).on("click", ".overlay, .close", function () {
  closeModel();
});

function closeModel() {
  $('.overlay, .model, .ham-pop').removeClass('is-open')
  $('body, html').removeClass('overflow-hidden')

  setTimeout(function () {
    $('.model, .ham-pop').removeClass('is-booking is-enquire')
  }, 500)
}
  // ============ SCROLL TO SECTION START ================>>>>

  // ============ SCROLL TO SECTION ============

  function scrollToHash(hash) {
    const headerHeight = parseInt($(":root").css("--headerheight")) || 0;
    const $target = $(hash);

    if (!$target.length) return;

    $("html, body")
      .stop()
      .animate(
        {
          scrollTop: $target.offset().top - headerHeight,
        },
        600,
      );
  }

  // On page load
  $(document).ready(function () {
    if (window.location.hash) {
      scrollToHash(window.location.hash);
    }
  });

  // On hash change
  $(window).on("hashchange", function () {
    scrollToHash(window.location.hash);

    if (typeof closeModel === "function") {
      closeModel();
    }
  });

  // For all internal anchor links
  $(document).on("click", 'a[href^="#"]', function (e) {
    const hash = $(this).attr("href");

    if (hash.length > 1 && $(hash).length) {
      e.preventDefault();

      history.pushState(null, null, hash);
      scrollToHash(hash);

      if (typeof closeModel === "function") {
        closeModel();
      }
    }
  });

  // ============ SCROLL TO SECTION END ================>>>>

  // ===========================================================================================================
  $(".hasDropdown").click(function (e) {
    e.stopPropagation(); // Prevents event bubbling

    var slideMenu = $(this).find(".dropdown-menu-ham");
    var plusIcon = $(this).find(".plu-ico"); // Get the specific .plu-ico inside clicked .hasDropdown

    // Close other open menus and remove active class
    $(".dropdown-menu-ham").not(slideMenu).slideUp();
    $(".hasDropdown").not(this).removeClass("active");
    $(".plu-ico").not(plusIcon).removeClass("active"); // Remove active from other icons

    // Toggle active class for the clicked menu and icon
    $(this).toggleClass("active");
    plusIcon.toggleClass("active"); // Only add/remove active for the clicked plu-ico

    slideMenu.stop().slideToggle();
  });
  // ===========================================================================================================
$(document).ready(function () {
  $(".accordion-wrapper").each(function () {
    const $wrapper = $(this);

    // reset state within this wrapper only
    $wrapper.find(".accordion-item").removeClass("active");
    $wrapper.find(".accordion-content").hide();
    $wrapper.find(".accordion-icon").text("+");

    // always open the first item of THIS wrapper
    const $firstItem = $wrapper.find(".accordion-item").first();
    $firstItem.addClass("active");
    $firstItem.find(".accordion-content").show();
    $firstItem.find(".accordion-icon").text("−");

    // click handler scoped to this wrapper
    $wrapper.on("click", ".accordion-header", function () {
      const $item = $(this).closest(".accordion-item");
      const $content = $(this).siblings(".accordion-content");
      const isActive = $item.hasClass("active");

      // close all items within this wrapper only
      $wrapper.find(".accordion-item").removeClass("active");
      $wrapper.find(".accordion-content").slideUp(300);
      $wrapper.find(".accordion-icon").text("+");

      if (!isActive) {
        $item.addClass("active");
        $content.slideDown(300);
        $item.find(".accordion-icon").text("−");
      }
    });
  });

  // "Expand all" toggle — scoped per Itinerary block instead of relying on id
  $(".expand-toggle input[type='checkbox']").on("change", function () {
    const $wrapper = $(this).closest(".Itinerary, .listing-secI").find(".accordion-wrapper");

    if ($(this).is(":checked")) {
      $wrapper.find(".accordion-item").addClass("active");
      $wrapper.find(".accordion-content").slideDown(300);
      $wrapper.find(".accordion-icon").text("−");
    } else {
      $wrapper.find(".accordion-item").removeClass("active");
      $wrapper.find(".accordion-content").slideUp(300);
      $wrapper.find(".accordion-icon").text("+");

      // keep first item open again
      const $firstItem = $wrapper.find(".accordion-item").first();
      $firstItem.addClass("active");
      $firstItem.find(".accordion-content").show();
      $firstItem.find(".accordion-icon").text("−");
    }
  });
});
  // ===== Open video modal =====
  $("[data-video]").on("click", function (e) {
    e.preventDefault();
    e.stopPropagation();

    var src = $(this).attr("data-video");
    if (!src) return; // agar data-video khaali hai to kuch mat karo

    if (src.includes("youtube.com/embed/")) {
      var videoId = src.split("embed/")[1].split("?")[0];
      src += "&autoplay=1&loop=1&playlist=" + videoId;
    }

    $("#iframe1").attr("src", src);
    $(".video-pop").addClass("is-open");
    $("body,html").addClass("overflow-hidden");
  });

  // ===== Close video modal (common function) =====
  function closeVideoModal() {
    $(".video-pop").removeClass("is-open");
    $("#iframe1").attr("src", ""); // ye line sound/video dono stop karti hai
    $("body,html").removeClass("overflow-hidden");
  }

  // Close button click
  $(".video-pop .close-video").on("click", function (e) {
    e.preventDefault();
    closeVideoModal();
  });

  // Overlay click (bahar click karne pe close)
  $(".overlay").on("click", function () {
    if ($(".video-pop").hasClass("is-open")) {
      closeVideoModal();
    }
  });

  // ESC key press pe bhi close ho jaye
  $(document).on("keydown", function (e) {
    if (e.key === "Escape" && $(".video-pop").hasClass("is-open")) {
      closeVideoModal();
    }
  });

  new Swiper(".logoSlider", {
    loop: true,
    spaceBetween: 32,
    slidesPerView: 3,
    autoplay: {
      delay: 0,
      disableOnInteraction: false,
    },
    speed: 4000,
    allowTouchMove: false,

    breakpoints: {
      480: { slidesPerView: 3, spaceBetween: 16 },
      640: { slidesPerView: 3, spaceBetween: 20 },
      768: { slidesPerView: 5, spaceBetween: 20 },
      991: { slidesPerView: 6, spaceBetween: 20 },
      1280: { slidesPerView: 8, spaceBetween: 20 },
    },
  });

// ========================================
// Banner Sliders
// ========================================

const videoSlider = new Swiper(".videoSlider", {
  slidesPerView: 1,
  spaceBetween: 0,
  allowTouchMove: false,
  effect: "fade",
  speed: 1000,
});

const textSlider = new Swiper(".textSlider", {
  slidesPerView: 1,
  direction: "vertical",
  allowTouchMove: false,
  speed: 800,
});


// ========================================
// Banner Elements
// ========================================

const categoryItems = document.querySelectorAll(".banner-category li");
const bannerCategory = document.querySelector(".banner-category");
const videos = document.querySelectorAll(".videoSlider video");


// ========================================
// Update Everything
// ========================================

function updateBanner(index) {
  // Change video slide
  videoSlider.slideTo(index);

  // Change text slide
  textSlider.slideTo(index);

  // Change category
  categoryItems.forEach((item, i) => {
    item.classList.toggle("active", i === index);
  });

  // Border animation
  bannerCategory.classList.add("hide-border");

  setTimeout(() => {
    bannerCategory.classList.remove("hide-border");
  }, 400);

  // Pause all videos
  videos.forEach((video) => {
    video.pause();
  });

  // Play selected video
  const activeVideo = videos[index];

  if (activeVideo) {
    activeVideo.currentTime = 0;
    activeVideo.play().catch(() => {});
  }
}


// ========================================
// Video End
// ========================================

videos.forEach((video, index) => {
  video.addEventListener("ended", function () {
    // Only react if this is the currently visible video
    if (videoSlider.realIndex !== index) {
      return;
    }

    let nextIndex = index + 1;

    // Go back to first slide
    if (nextIndex >= videos.length) {
      nextIndex = 0;
    }

    updateBanner(nextIndex);
  });
});


// ========================================
// Category Click
// ========================================

categoryItems.forEach((item, index) => {
  item.addEventListener("click", function () {
    updateBanner(index);
  });
});


// ========================================
// Initial Banner
// ========================================

updateBanner(0);



  const sliderEl = document.querySelector('.home-secA .programSlider');
  if (!sliderEl) return;

  const programSlider = new Swiper(sliderEl, {
    slidesPerView: 1,
    spaceBetween: 0,
    allowTouchMove: false,
    effect: 'fade',
    fadeEffect: {
      crossFade: true, // explicit — without this fade can render incompletely on some builds
    },
    speed: 800,
    observer: true,        // re-measure if DOM/images change after init
    observeParents: true,
    preloadImages: true,   // force-load all slide images upfront instead of lazy defaults
    lazy: false,
    watchOverflow: true,
  });

  const programItems = document.querySelectorAll('.home-secA .grid-wrapper .grid .item');

  if (!programItems.length) return;

  programItems[0].classList.add('active');

  programItems.forEach((item, index) => {
    item.addEventListener('mouseenter', () => {
      programItems.forEach((i) => i.classList.remove('active'));
      item.classList.add('active');
      programSlider.slideTo(index);
    });
  });

  // ---------------------------------------------------
  // Force Swiper to re-check slide sizes once every
  // image has actually finished loading — production
  // networks are slower than local, so Swiper's initial
  // calculation can happen before images paint.
  // ---------------------------------------------------
  const allImgs = sliderEl.querySelectorAll('img');
  let loadedCount = 0;

  allImgs.forEach((img) => {
    if (img.complete) {
      loadedCount++;
    } else {
      img.addEventListener('load', () => {
        loadedCount++;
        if (loadedCount === allImgs.length) {
          programSlider.update();
        }
      });
    }
  });

  if (loadedCount === allImgs.length) {
    programSlider.update();
  }

  new Swiper(".thirdSilder", {
    navigation: {
      nextEl: ".thirdSilder-next",
      prevEl: ".thirdSilder-prev",
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


  new Swiper(".TestimonialSlider", {
    navigation: {
      nextEl: ".TestimonialSlider-next",
      prevEl: ".TestimonialSlider-prev",
    },

    // autoplay: {
    //   delay: 2000,
    //   disableOnInteraction: false,
    // },
    speed: 4000,
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
        slidesPerView: 3,
        spaceBetween: 20,
      },
    },
  });

  new Swiper(".twoSlider", {
    navigation: {
      nextEl: ".twoSlider-next",
      prevEl: ".twoSlider-prev",
    },
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
      1280: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
    },
  });

  new Swiper(".centerSlider", {
    centeredSlides: true,
    centeredSlidesBounds: true,
    slidesOffsetAfter: 120,
    loop: true,
    navigation: {
      nextEl: ".centerSlider-next",
      prevEl: ".centerSlider-prev",
    },

    breakpoints: {
      0: {
        slidesPerView: 1.2,
        spaceBetween: 10,
        speed: 1000,
      },
      520: {
        slidesPerView: 1.2,
        spaceBetween: 10,
        speed: 1000,
      },
      769: {
        slidesPerView: 2.3,
        spaceBetween: 20,
        speed: 1000,
      },
      991: {
        slidesPerView: 2.3,
        spaceBetween: 60,
        speed: 1000,
      },
      1100: {
        slidesPerView: 2.3,
        spaceBetween: 60,
        speed: 1000,
      },
    },
  });




  new Swiper(".top-header__swiper", {
    direction: "vertical",
    loop: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    slidesPerView: 1,
    speed: 700,
    allowTouchMove: false,
  });

 new Swiper(".listSlider", {
  loop: true,
  effect: "fade",
  fadeEffect: { crossFade: true },
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  speed: 1000,
  allowTouchMove: false, // no nav arrows, no swipe interaction
});


new Swiper(".TestimonialSlider2", {
  loop: true,
  navigation: {
    nextEl: ".testimonial2-next",
    prevEl: ".testimonial2-prev",
  },
  breakpoints: {
    0: { slidesPerView: 1, spaceBetween: 16 },
    768: { slidesPerView: 2, spaceBetween: 20 },
  },
});

  //---------- Continue Btn Veriofy Btn Toggle ----------//
  //document.querySelector(".Continue")?.addEventListener("click", () => {
  //  document.querySelector(".login-wrap").style.display = "none";
  //  document.querySelector(".otp-field").style.display = "flex";
  //});

  document.querySelector(".bk_btn")?.addEventListener("click", () => {
    document.querySelector(".login-wrap").style.display = "flex";
    document.querySelector(".otp-field").style.display = "none";
  });

  $(".otpInput input")
    .on("input", function () {
      this.value = this.value.replace(/\D/g, "");
      $(this).next("input").focus();
    })
    .on("keydown", function (e) {
      if (e.key === "Backspace" && !this.value) $(this).prev("input").focus();
    });

  $(".otpInput").on("paste", function (e) {
    let p = e.originalEvent.clipboardData.getData("text").replace(/\D/g, "");
    $(this)
      .find("input")
      .val(function (i) {
        return p[i] || "";
      });
    $(this).find("input").eq(Math.min(p.length, 3)).focus();
  });
  //---------- Continue Btn Veriofy Btn Toggle ----------//
});
//$(function () {
//    const $dateInput = $('input[name="daterange"]');
//    $dateInput.daterangepicker({
//        singleDatePicker: true,
//        autoApply: true,
//        minDate: moment().add(1, "days"),
//        opens: "left",
//        autoUpdateInput: false,
//        locale: {
//            format: "DD/MM/YYYY",
//        },
//    });
//    $dateInput.on("apply.daterangepicker", function (ev, picker) {
//        $(this)
//            .val(picker.startDate.format("DD/MM/YYYY"))
//            .addClass("has-value")
//            .closest(".form-group")
//            .addClass("active");
//    });
//    $dateInput.on("cancel.daterangepicker", function () {
//        $(this)
//            .val("")
//            .removeClass("has-value")
//            .closest(".form-group")
//            .removeClass("active");
//    });
//    $dateInput.each(function () {
//        if ($(this).val().trim() !== "") {
//            $(this).addClass("has-value").closest(".form-group").addClass("active");
//        }
//    });
//});

$(function () {
  Fancybox.bind("[data-fancybox]", {
    autoStart: false,
    contentClick: "iterateZoom",
    Images: {
      Panzoom: {
        maxScale: 3,
      },
    },
    keyboard: true,
    Thumbs: true,
    Toolbar: {
      display: {
        left: ["infobar"],
        middle: ["toggle1to1", "rotateCCW", "rotateCW"],
        right: ["close"],
        bottom: [],
      },
    },
  });
});

document.addEventListener("DOMContentLoaded", function () {
  document
    .querySelectorAll(".file-upload input[type='file']")
    .forEach(function (input) {
      const wrapper = input.closest(".file-upload");
      const label = wrapper.querySelector(".label");
      const defaultText = label.textContent;

      input.addEventListener("change", function () {
        if (this.files.length > 0) {
          label.textContent = this.files[0].name;
          wrapper.classList.add("has-file");
        } else {
          label.textContent = defaultText;
          wrapper.classList.remove("has-file");
        }
      });
    });
});

document.addEventListener("DOMContentLoaded", function () {
  const closeBtn = document.querySelector(".notification .close");
  const notification = document.querySelector(".notification");

  closeBtn.addEventListener("click", function () {
    notification.classList.add('hide')
  });
});
