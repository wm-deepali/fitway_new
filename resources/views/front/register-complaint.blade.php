@extends('layouts.app')

@section('title', $pageSeo->seo->meta_title ?? 'Register a Complaint | Fitway')
@section('meta_description', $pageSeo->seo->meta_description ?? 'Facing an issue with your gym equipment? Register your complaint with Fitway and our team will resolve it promptly.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/sass/contact/contact.css') }}" />
@endpush

@section('content')

    <section class="banner">
        <div class="bg">
            <img src="{{ asset('assets/images/home/contact-banner.jpg') }}" />

            <nav class="breadcrumb left breadcrumb-light" aria-label="Breadcrumb">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><span class="breadcrumb-separator">/</span></li>
                    <li><a href="{{ route('register-complaint') }}" class="active">Register Complaint</a></li>
                </ul>
            </nav>

            <div class="container">
                <div class="banner-wrapper">
                    <div class="content">
                        <h1>{{ $pageSeo->seo->h1 ?? 'Facing an Issue? We\'re Here to Help.' }}</h1>
                        <p>
                            Tell us what's wrong and our support team will get in touch
                            with you to resolve it as quickly as possible.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-secB">
        <div class="container">
            <div class="contact-secB__grid">

                <div class="contact-info">
                    <span class="contact-info__label">Register Complaint</span>
                    <h3>Report an Issue With <span>Your Equipment.</span></h3>
                    <p class="contact-info__text">
                        Whether it's a service concern, product defect, or installation
                        issue — let us know the details and our technicians will follow up.
                    </p>

                    <div class="contact-info__list">
                        <div class="contact-info__item">
                            <span class="contact-info__icon">
                                <svg viewBox="0 0 24 24">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"
                                        fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>
                            <div>
                                <span class="contact-info__title">Call Us</span>
                                <p>{{ $generalSettings->phone ?? '9015335461 || 9839570700' }}</p>
                            </div>
                        </div>

                        <div class="contact-info__item">
                            <span class="contact-info__icon">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 4h16v16H4z" fill="none" stroke="currentColor" stroke-width="1.8" />
                                    <path d="M4 6l8 7 8-7" fill="none" stroke="currentColor" stroke-width="1.8"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                            <div>
                                <span class="contact-info__title">Email Us</span>
                                <p>{{ $generalSettings->support_email ?? 'fitwayimpex@gmail.com' }}</p>
                            </div>
                        </div>

                        @if($generalSettings->whatsapp ?? false)
                            <div class="contact-info__item">
                                <span class="contact-info__icon">
                                    <svg viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.39 1.26 4.81L2 22l5.44-1.43a9.9 9.9 0 0 0 4.6 1.14h.01c5.46 0 9.9-4.45 9.9-9.91C21.95 6.45 17.5 2 12.04 2m0 18.13a8.2 8.2 0 0 1-4.19-1.15l-.3-.18-3.11.82.83-3.03-.2-.31a8.17 8.17 0 0 1-1.26-4.37c0-4.54 3.69-8.24 8.24-8.24 4.54 0 8.24 3.7 8.24 8.24 0 4.55-3.7 8.22-8.25 8.22" />
                                    </svg>
                                </span>
                                <div>
                                    <span class="contact-info__title">WhatsApp</span>
                                    <p>{{ $generalSettings->whatsapp }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="contact-form">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form class="contact-form__form" method="POST" action="{{ route('register-complaint.store') }}" id="registerComplaintForm">
                        @csrf

                        <div class="contact-form__group">
                            <label for="full_name">Full Name</label>
                            <input type="text" id="full_name" name="full_name" placeholder="Enter your full name"
                                value="{{ old('full_name') }}" required />
                            @error('full_name') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="contact-form__row">
                            <div class="contact-form__group">
                                <label for="mobile_number">Mobile Number</label>
                                <input type="tel" id="mobile_number" name="mobile_number"
                                    placeholder="Enter your mobile number" value="{{ old('mobile_number') }}" required />
                                @error('mobile_number') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="contact-form__group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" placeholder="Enter your email address"
                                    value="{{ old('email') }}" />
                                @error('email') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="contact-form__group">
                            <label for="full_address">Full Address</label>
                            <textarea id="full_address" name="full_address" rows="2"
                                placeholder="Where is the equipment / service located?">{{ old('full_address') }}</textarea>
                            @error('full_address') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="contact-form__row">
                            <div class="contact-form__group">
                                <label for="landmark">Landmark</label>
                                <input type="text" id="landmark" name="landmark" placeholder="Nearby landmark"
                                    value="{{ old('landmark') }}" />
                                @error('landmark') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="contact-form__group">
                                <label for="pin_code">Pin Code</label>
                                <input type="text" id="pin_code" name="pin_code" maxlength="10" placeholder="Enter pin code"
                                    value="{{ old('pin_code') }}" />
                                @error('pin_code') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="contact-form__row">
                            <div class="contact-form__group">
                                <label for="state_id">State</label>
                                <select id="state_id" name="state_id">
                                    <option value="">Select State</option>
                                    @foreach($states as $state)
                                        <option value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                    @endforeach
                                </select>
                                @error('state_id') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="contact-form__group">
                                <label for="city_id">City</label>
                                <select id="city_id" name="city_id">
                                    <option value="">Select City</option>
                                </select>
                                @error('city_id') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="contact-form__group">
                            <label for="complaint_detail">Describe Your Complaint</label>
                            <textarea id="complaint_detail" name="complaint_detail" rows="4"
                                placeholder="Tell us what went wrong..." required>{{ old('complaint_detail') }}</textarea>
                            @error('complaint_detail') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <button type="submit" class="btn btn-primary contact-form__cta">
                            Submit Complaint
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const stateSelect = document.getElementById('state_id');
    const citySelect = document.getElementById('city_id');

    if (!stateSelect) return;

    stateSelect.addEventListener('change', function () {
        const stateId = this.value;
        citySelect.innerHTML = '<option value="">Select City</option>';

        if (!stateId) return;

        fetch("{{ url('complaint/cities-by-state') }}/" + stateId)
            .then(res => res.json())
            .then(cities => {
                cities.forEach(city => {
                    const opt = document.createElement('option');
                    opt.value = city.id;
                    opt.textContent = city.name;
                    citySelect.appendChild(opt);
                });
            });
    });
});
</script>
@endpush