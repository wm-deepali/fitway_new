@extends('layouts.app')

@section('title', ($product->meta_title ?? $product->name) . ' | Fitway')
@section('meta_description', $product->meta_description ?? Str::limit(strip_tags($product->description), 155))

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/sass/product-detail/detail.css') }}" />
@endpush




@section('content')


  <section class="detail-secA">
    <div class="container">
      <nav class="breadcrumb-trail" aria-label="Breadcrumb">
        <ul>
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><span>/</span></li>

          @if ($product->category)
            <li>
              <a href="{{ route('products.category', $product->category->slug) }}">
                {{ $product->category->category_name }}
              </a>
            </li>
          @else
            <li><a href="{{ route('products') }}">Equipment</a></li>
          @endif

          @if ($product->subCategory)
            <li><span>/</span></li>
            <li>
              <a href="{{ route('products.subcategory', [$product->category->slug, $product->subCategory->slug]) }}">
                {{ $product->subCategory->name }}
              </a>
            </li>
          @endif

          @if ($product->subSubCategory)
            <li><span>/</span></li>
            <li>
              <a
                href="{{ route('products.subsubcategory', [$product->category->slug, $product->subCategory->slug, $product->subSubCategory->slug]) }}">
                {{ $product->subSubCategory->name }}
              </a>
            </li>
          @endif

          <li><span>/</span></li>
          <li><a href="javascript:void(0)" class="active">{{ $product->name }}</a></li>
        </ul>
      </nav>

      <div class="detail-wrap">
        <div class="detail-gallery">
          <div class="gallery-main">
            <div class="swiper gallerySwiper">
              <div class="swiper-wrapper">
                @foreach ($productImages as $img)
                  <div class="swiper-slide">
                    <img src="{{ $img->url }}" alt="{{ $img->alt }}" />
                  </div>
                @endforeach
              </div>
            </div>
            <span class="gallery-main__badge">{{ $product->category->category_name ?? 'Commercial Grade' }}</span>
          </div>

          <div class="gallery-thumbs">
            @foreach ($productImages as $index => $img)
              <button type="button" class="gallery-thumbs__item {{ $index === 0 ? 'is-active' : '' }}"
                data-slide="{{ $index }}">
                <img src="{{ $img->url }}" alt="" />
              </button>
            @endforeach
          </div>
        </div>

        <!-- RIGHT: Content -->
        <div class="detail-content">
          <div class="detail-content__top">
            <span class="detail-content__tag">{{ $product->category->category_name ?? 'Gym Solutions' }}</span>
            <!-- <span class="detail-content__grade">Professional Grade</span> -->
          </div>

          <h1>{{ $product->name }}</h1>
          <p class="cat">{{ $product->subCategory->name ?? '' }}</p>

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

          <div class="detail-content__desc editor-content">
            {!! $product->description !!}
          </div>

          <!-- Product Information -->
          <div class="detail-content__info">
            <div class="info-row">
              <span class="info-row__label">Product Code</span>
              <span class="info-row__value">
                FW-{{ strtoupper(substr(md5($product->id . $product->slug), 0, 6)) }}
              </span>
            </div>
            <div class="info-row">
              <span class="info-row__label">Category</span>
              <span class="info-row__value">{{ $product->category_path ?: 'N/A' }}</span>
            </div>
            <div class="info-row">
              <span class="info-row__label">Price</span>
              <span class="info-row__value">
                {{ $product->offered_price > 0 ? '₹' . number_format($product->offered_price, 2) : 'Available on Request' }}
              </span>
            </div>
            <div class="info-row">
              <span class="info-row__label">Warranty</span>
              <span class="info-row__value">[Actual Warranty Period]</span>
            </div>
            <div class="info-row">
              <span class="info-row__label">Installation</span>
              <span class="info-row__value">Professional Installation Available</span>
            </div>
          </div>

          <div class="detail-content__cta">
            <button type="button" class="btn btn-primary" id="addToCartBtn" data-product-id="{{ $product->id }}">
              Add To Cart
            </button>
            @if($generalSettings->whatsapp ?? false)
            <a href="https://wa.me/{{ $generalSettings->whatsapp }}" target="_blank" class="btn btn-gray">Whatsapp Now</a>
            @endif
          </div>

          <p class="detail-content__helper">
            To get a custom quote, kindly add the products to the cart (you
            can add multiple products in the cart)
          </p>

          <div class="detail-content__trust">
            <span>
              <svg viewBox="0 0 24 24">
                <path d="M12 2l3 6 6 1-4.5 4.5L18 20l-6-3-6 3 1.5-6.5L3 9l6-1 3-6z" />
              </svg>
              Professional Equipment
            </span>
            <span>
              <svg viewBox="0 0 24 24">
                <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z" />
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
          <button type="button" class="btn btn-primary" data-model=".quote-request-pop">
            Get A Quote
          </button>
          <a href="product-detail.html" class="btn btn-gray">Talk To A Fitway Expert</a>
        </div>
      </div>
    </div>
  </section>

  <section class="detail-secB">
    <div class="container">
      <!-- Section heading -->
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
            @forelse ($relatedProducts as $related)
              <div class="swiper-slide">
                <article class="equip-card">
                  <a href="{{ route('product-detail', $related->slug) }}" class="equip-card__img">
                    <img src="{{ $related->image_url }}" alt="{{ $related->image_alt }}" />

                    <span class="equip-card__tag">{{ $related->subCategory->name ?? '' }}</span>
                  </a>

                  <div class="equip-card__body">
                    <span class="equip-card__cat">
                      {{ $related->category_path }}
                    </span>

                    <h5>{{ $related->name }}</h5>

                    <div class="btns">
                      <button type="button" class="btn btn-primary js-enquire-now" data-product-id="{{ $related->id }}"
                        data-product-name="{{ $related->name }}">
                        Enquire Now
                      </button>

                      <a href="{{ route('product-detail', $related->slug) }}" class="btn btn-gray">
                        View Details
                      </a>
                    </div>
                  </div>
                </article>
              </div>
            @empty
              <p>No related products found.</p>
            @endforelse
          </div>
        </div>

        <!-- Navigation -->
        <div class="swiper-group">
          <button type="button" class="thirdSilder2-prev" aria-label="Previous products">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
              <path fill="currentColor"
                d="M609.408 149.376L277.76 489.6a32 32 0 0 0 0 44.672l331.648 340.352a29.12 29.12 0 0 0 41.728 0a30.59 30.59 0 0 0 0-42.752L339.264 511.936l311.872-319.872a30.59 30.59 0 0 0 0-42.688a29.12 29.12 0 0 0-41.728 0" />
            </svg>
          </button>

          <button type="button" class="thirdSilder2-next" aria-label="Next products">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
              <path fill="currentColor"
                d="M609.408 149.376L277.76 489.6a32 32 0 0 0 0 44.672l331.648 340.352a29.12 29.12 0 0 0 41.728 0a30.59 30.59 0 0 0 0-42.752L339.264 511.936l311.872-319.872a30.59 30.59 0 0 0 0-42.688a29.12 29.12 0 0 0-41.728 0" />
            </svg>
          </button>
        </div>
      </div>

      <!-- View All -->
      <div class="detail-secB__footer">
        <a href="{{ $product->category ? route('products.category', $product->category->slug) : route('products') }}"
          class="btn btn-gray">
          View All Equipment
        </a>
      </div>
    </div>
  </section>


@endsection

@push('scripts')
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

    document.getElementById('addToCartBtn')?.addEventListener('click', function () {
      const btn = this;
      const productId = btn.dataset.productId;

      btn.disabled = true;
      const originalText = btn.textContent;
      btn.textContent = 'Adding...';

      fetch('{{ route('cart.add') }}', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
          'Accept': 'application/json',
        },
        body: JSON.stringify({ product_id: productId, qty: 1 }),
      })
        .then((res) => res.json())
        .then((data) => {
          if (data.success) {
            btn.textContent = 'Added ✓';
            updateCartBadge(data.cart_count);
            setTimeout(() => {
              btn.textContent = originalText;
              btn.disabled = false;
            }, 1500);
          } else {
            alert(data.message || 'Something went wrong');
            btn.textContent = originalText;
            btn.disabled = false;
          }
        })
        .catch(() => {
          alert('Network error, please try again');
          btn.textContent = originalText;
          btn.disabled = false;
        });
    });

    function updateCartBadge(count) {
      const badge = document.querySelector('.cart-count');
      if (badge) {
        badge.textContent = count;
        badge.classList.toggle('is-visible', count > 0);
      }
    }
    
  </script>

@endpush