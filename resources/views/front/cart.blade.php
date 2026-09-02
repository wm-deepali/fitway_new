@extends('layouts.app')

@section('title', 'Cart | Fitway')
@section('meta_description', 'Review your selected Fitway gym equipment and request a custom quote for your fitness space.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/sass/cart/cart.css') }}" />
@endpush

@section('content')

    <section class="banner banner--listing">
        <div class="bg">
            <video autoplay="" muted="" loop="" playsinline="" src="{{ asset('assets/video/cart.mp4') }}"
                poster="{{ asset('assets/video/poster/cart.png') }}">
                <source src="{{ asset('assets/video/cart.mp4') }}" type="video/mp4" />
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
                        <a href="{{ route('cart.index') }}" class="active">Cart</a>
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
                        <span class="count" id="cartItemsCount">{{ count($items) }}
                            {{ Str::plural('item', count($items)) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cart-secA">
        <div class="container">
            <div class="cart-wrap">
                <!-- LEFT: Cart Items -->
                <div class="cart-list" id="cartList">
                    <div class="cart-list__head">
                        <span>Product</span>
                        <span>Quantity</span>
                    </div>

                    @forelse ($items as $item)
                        <div class="cart-item" data-product-id="{{ $item['id'] }}">
                            <div class="cart-item__product">
                                <div class="cart-item__img">
                                    <img src="{{ $item['image_url'] }}" alt="{{ $item['name'] }}" />
                                </div>
                                <div class="cart-item__info">
                                    <span class="cart-item__cat">{{ $item['category'] }}</span>
                                    <h5>{{ $item['name'] }}</h5>
                                    <button type="button" class="cart-item__remove" data-product-id="{{ $item['id'] }}">
                                        <svg viewBox="0 0 24 24">
                                            <path
                                                d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2m3 0l-1 14a2 2 0 01-2 2H7a2 2 0 01-2-2L4 6h16z" />
                                        </svg>
                                        Remove
                                    </button>
                                </div>
                            </div>

                            <div class="cart-item__qty" data-product-id="{{ $item['id'] }}">
                                <button type="button" class="qty-btn qty-minus" aria-label="Decrease quantity">
                                    −
                                </button>
                                <input type="text" value="{{ $item['qty'] }}" readonly />
                                <button type="button" class="qty-btn qty-plus" aria-label="Increase quantity">
                                    +
                                </button>
                            </div>
                        </div>
                    @empty
                        <div class="cart-item cart-item--empty">
                            <p>Your cart is empty.</p>
                        </div>
                    @endforelse

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
                            <span>Items (<span id="summaryItemsCount">{{ count($items) }}</span>)</span>
                            <span id="summaryUnitsCount">{{ collect($items)->sum('qty') }} units</span>
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

                                <form class="quote-form__form" method="POST" action="{{ route('cart.quote') }}"
                                    id="quoteForm">
                                    @csrf
                                    <div class="quote-form__group">
                                        <label for="fullName">Full Name</label>
                                        <input type="text" id="fullName" name="fullName" placeholder="Enter your full name"
                                            required />
                                    </div>

                                    <div class="quote-form__group">
                                        <label for="mobileNumber">Mobile Number</label>
                                        <input type="tel" id="mobileNumber" name="mobileNumber"
                                            placeholder="Enter your mobile number" required />
                                    </div>

                                    <div class="quote-form__group">
                                        <label for="emailId">Email Id</label>
                                        <input type="email" id="emailId" name="emailId" placeholder="Enter your email id"
                                            required />
                                    </div>

                                    <div class="quote-form__group">
                                        <label for="details">Enter Details (If any)</label>
                                        <textarea id="details" name="details" rows="4"
                                            placeholder="Tell us more..."></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary quote-form__cta">
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
                                    <path d="M12 2l3 6 6 1-4.5 4.5L18 20l-6-3-6 3 1.5-6.5L3 9l6-1 3-6z" />
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
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

            function postJson(url, body) {
                return fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify(body),
                }).then((res) => res.json());
            }

            function updateSummary(cartCount, items) {
                document.getElementById('cartItemsCount').textContent =
                    items.length + (items.length === 1 ? ' item' : ' items');
                document.getElementById('summaryItemsCount').textContent = items.length;
                document.getElementById('summaryUnitsCount').textContent =
                    items.reduce((sum, i) => sum + i.qty, 0) + ' units';
            }

            document.querySelectorAll(".cart-item__qty").forEach(function (qtyBox) {
                const input = qtyBox.querySelector("input");
                const minusBtn = qtyBox.querySelector(".qty-minus");
                const plusBtn = qtyBox.querySelector(".qty-plus");
                const productId = qtyBox.dataset.productId;

                function sendUpdate(newQty) {
                    postJson('{{ route('cart.update') }}', { product_id: productId, qty: newQty })
                        .then((data) => {
                            if (data.success) {
                                updateSummary(data.cart_count, data.items);
                            }
                        });
                }

                minusBtn.addEventListener("click", function () {
                    let qty = parseInt(input.value, 10) || 1;
                    if (qty > MIN_QTY) {
                        input.value = qty - 1;
                        sendUpdate(qty - 1);
                    }
                });

                plusBtn.addEventListener("click", function () {
                    let qty = parseInt(input.value, 10) || 1;
                    if (qty < MAX_QTY) {
                        input.value = qty + 1;
                        sendUpdate(qty + 1);
                    }
                });
            });

            document.querySelectorAll(".cart-item__remove").forEach(function (btn) {
                btn.addEventListener("click", function () {
                    const productId = btn.dataset.productId;
                    const row = btn.closest(".cart-item");

                    postJson('{{ route('cart.remove') }}', { product_id: productId })
                        .then((data) => {
                            if (data.success) {
                                row.remove();
                                updateSummary(data.cart_count, data.items);

                                if (data.items.length === 0) {
                                    document.getElementById('cartList')
                                        .insertAdjacentHTML('afterbegin',
                                            '<div class="cart-item cart-item--empty"><p>Your cart is empty.</p></div>');
                                }
                            }
                        });
                });
            });

            document.getElementById('quoteForm').addEventListener('submit', function (e) {
                e.preventDefault();

                const form = e.target;
                const submitBtn = form.querySelector('.quote-form__cta');
                const originalText = submitBtn.textContent;

                submitBtn.disabled = true;
                submitBtn.textContent = 'Submitting...';

                postJson('{{ route('cart.quote') }}', {
                    fullName: form.fullName.value,
                    mobileNumber: form.mobileNumber.value,
                    emailId: form.emailId.value,
                    details: form.details.value,
                })
                    .then((data) => {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Request Submitted',
                                text: data.message,
                            }).then(() => {
                                window.location.href = data.redirect;
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops',
                                text: data.message,
                            });
                            submitBtn.disabled = false;
                            submitBtn.textContent = originalText;
                        }
                    })
                    .catch(() => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Network Error',
                            text: 'Please try again.',
                        });
                        submitBtn.disabled = false;
                        submitBtn.textContent = originalText;
                    });
            });
        });
    </script>
@endpush