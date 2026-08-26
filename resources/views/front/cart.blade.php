@extends('layouts.app')

@section('title', 'Cart | Fitway')
@section('meta_description', 'Review your selected Fitway gym equipment and request a custom quote for your fitness space.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/sass/cart/cart.css') }}" />
@endpush

@section('content')

    <section class="banner banner--listing">
        <div class="bg">
            <video
                autoplay=""
                muted=""
                loop=""
                playsinline=""
                src="{{ asset('assets/video/banner3.mp4') }}"
                poster="{{ asset('assets/video/poster/banner.png') }}"
            >
                <source src="{{ asset('assets/video/banner3.mp4') }}" type="video/mp4" />
            </video>

            <div class="bg-overlay"></div>

            <nav class="breadcrumb left2 breadcrumb-light" aria-label="Breadcrumb">
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        <span class="breadcrumb-separator">/</span>
                    </li>
                    <li>
                        <a href="{{ route('cart') }}" class="active">Cart</a>
                    </li>
                </ul>
            </nav>

            <div class="container">
                <div class="banner-wrapper">
                    <div class="content">
                        <h1>YOUR CART</h1>
                        <p>
                            Review your selected equipment before requesting a custom
                            quote.
                        </p>
                        <span class="count">3 items</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cart-secA">
        <div class="container">
            <div class="cart-wrap">
                <!-- LEFT: Cart Items -->
                <div class="cart-list">
                    <div class="cart-list__head">
                        <span>Product</span>
                        <span>Quantity</span>
                    </div>

                    <div class="cart-item">
                        <div class="cart-item__product">
                            <div class="cart-item__img">
                                <img
                                    src="{{ asset('assets/images/home/gym1.jpg') }}"
                                    alt="Fitway Commercial Treadmill"
                                />
                            </div>
                            <div class="cart-item__info">
                                <span class="cart-item__cat">Outdoor Equipments</span>
                                <h5>Fitway Commercial Treadmill</h5>
                                <button type="button" class="cart-item__remove">
                                    <svg viewBox="0 0 24 24">
                                        <path
                                            d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2m3 0l-1 14a2 2 0 01-2 2H7a2 2 0 01-2-2L4 6h16z"
                                        />
                                    </svg>
                                    Remove
                                </button>
                            </div>
                        </div>

                        <div class="cart-item__qty">
                            <button
                                type="button"
                                class="qty-btn qty-minus"
                                aria-label="Decrease quantity"
                            >
                                −
                            </button>
                            <input type="text" value="1" readonly />
                            <button
                                type="button"
                                class="qty-btn qty-plus"
                                aria-label="Increase quantity"
                            >
                                +
                            </button>
                        </div>
                    </div>

                    <div class="cart-item">
                        <div class="cart-item__product">
                            <div class="cart-item__img">
                                <img
                                    src="{{ asset('assets/images/home/gym2.jpg') }}"
                                    alt="Fitway Power Rack"
                                />
                            </div>
                            <div class="cart-item__info">
                                <span class="cart-item__cat">Commercial Equipments</span>
                                <h5>Fitway Power Rack Pro</h5>
                                <button type="button" class="cart-item__remove">
                                    <svg viewBox="0 0 24 24">
                                        <path
                                            d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2m3 0l-1 14a2 2 0 01-2 2H7a2 2 0 01-2-2L4 6h16z"
                                        />
                                    </svg>
                                    Remove
                                </button>
                            </div>
                        </div>

                        <div class="cart-item__qty">
                            <button
                                type="button"
                                class="qty-btn qty-minus"
                                aria-label="Decrease quantity"
                            >
                                −
                            </button>
                            <input type="text" value="2" readonly />
                            <button
                                type="button"
                                class="qty-btn qty-plus"
                                aria-label="Increase quantity"
                            >
                                +
                            </button>
                        </div>
                    </div>

                    <div class="cart-item">
                        <div class="cart-item__product">
                            <div class="cart-item__img">
                                <img
                                    src="{{ asset('assets/images/home/gym3.jpg') }}"
                                    alt="Fitway Adjustable Bench"
                                />
                            </div>
                            <div class="cart-item__info">
                                <span class="cart-item__cat">Home Gym Equipments</span>
                                <h5>Fitway Adjustable Bench</h5>
                                <button type="button" class="cart-item__remove">
                                    <svg viewBox="0 0 24 24">
                                        <path
                                            d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2m3 0l-1 14a2 2 0 01-2 2H7a2 2 0 01-2-2L4 6h16z"
                                        />
                                    </svg>
                                    Remove
                                </button>
                            </div>
                        </div>

                        <div class="cart-item__qty">
                            <button
                                type="button"
                                class="qty-btn qty-minus"
                                aria-label="Decrease quantity"
                            >
                                −
                            </button>
                            <input type="text" value="1" readonly />
                            <button
                                type="button"
                                class="qty-btn qty-plus"
                                aria-label="Increase quantity"
                            >
                                +
                            </button>
                        </div>
                    </div>

                    <a href="{{ route('products') }}" class="cart-list__continue">
                        <svg viewBox="0 0 24 24">
                            <path d="M19 12H5M12 19l-7-7 7-7" />
                        </svg>
                        Continue Browsing Equipment
                    </a>
                </div>

                <!-- RIGHT: Order Summary -->
                <div class="cart-summary">
                    <div class="cart-summary__card">
                        <h4>Quote Summary</h4>

                        <div class="cart-summary__row">
                            <span>Items (3)</span>
                            <span>4 units</span>
                        </div>
                        <div class="cart-summary__row">
                            <span>Installation</span>
                            <span class="primary">Included</span>
                        </div>
                        <div class="cart-summary__row">
                            <span>Warranty</span>
                            <span>Standard Coverage</span>
                        </div>

                        <div class="cart-summary__divider"></div>

                        <div class="quote-form">
                            <div class="quote-form__card">
                                <h4>Request A Custom Quote</h4>

                                <form class="quote-form__form" method="POST" action="#">
                                    @csrf
                                    <div class="quote-form__group">
                                        <label for="fullName">Full Name</label>
                                        <input
                                            type="text"
                                            id="fullName"
                                            name="fullName"
                                            placeholder="Enter your full name"
                                            required
                                        />
                                    </div>

                                    <div class="quote-form__group">
                                        <label for="mobileNumber">Mobile Number</label>
                                        <input
                                            type="tel"
                                            id="mobileNumber"
                                            name="mobileNumber"
                                            placeholder="Enter your mobile number"
                                            required
                                        />
                                    </div>

                                    <div class="quote-form__group">
                                        <label for="emailId">Email Id</label>
                                        <input
                                            type="email"
                                            id="emailId"
                                            name="emailId"
                                            placeholder="Enter your email id"
                                            required
                                        />
                                    </div>

                                    <div class="quote-form__group">
                                        <label for="details">Enter Details (If any)</label>
                                        <textarea
                                            id="details"
                                            name="details"
                                            rows="4"
                                            placeholder="Tell us more..."
                                        ></textarea>
                                    </div>

                                    <button
                                        type="submit"
                                        class="btn btn-primary quote-form__cta"
                                    >
                                        Submit Request
                                    </button>
                                </form>
                            </div>
                        </div>

                        <p class="cart-summary__helper">
                            We respect your privacy. Your details are safe with us.
                        </p>

                        <div class="cart-summary__trust">
                            <span>
                                <svg viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3 6 6 1-4.5 4.5L18 20l-6-3-6 3 1.5-6.5L3 9l6-1 3-6z"
                                    />
                                </svg>
                                No Payment Required Now
                            </span>
                            <span>
                                <svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="9" />
                                    <path d="M12 7v5l3 3" />
                                </svg>
                                Response Within 24 Hrs
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $("header").addClass("header-fixed");
        });

        document.addEventListener("DOMContentLoaded", function () {
            const MIN_QTY = 1;
            const MAX_QTY = 99;

            document.querySelectorAll(".cart-item__qty").forEach(function (qtyBox) {
                const input = qtyBox.querySelector("input");
                const minusBtn = qtyBox.querySelector(".qty-minus");
                const plusBtn = qtyBox.querySelector(".qty-plus");

                minusBtn.addEventListener("click", function () {
                    let qty = parseInt(input.value, 10) || 1;
                    if (qty > MIN_QTY) {
                        input.value = qty - 1;
                    }
                });

                plusBtn.addEventListener("click", function () {
                    let qty = parseInt(input.value, 10) || 1;
                    if (qty < MAX_QTY) {
                        input.value = qty + 1;
                    }
                });
            });
        });
    </script>
@endpush