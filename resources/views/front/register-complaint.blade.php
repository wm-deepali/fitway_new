@extends('layouts.app')

@section('title', $pageSeo->seo->meta_title ?? 'Register a Complaint | Fitway')
@section('meta_description', $pageSeo->seo->meta_description ?? 'Facing an issue with your gym equipment? Register your complaint with Fitway and our team will resolve it promptly.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/sass/contact/contact.css') }}" />

    <style>
        /* Custom dropdown styled to match the dark contact inputs */
        .contact-form__group .custom-select {
            --inputsize: 46px;
            --paddingleftright: 14px;
            --arrow: 15px;
            --arrowspace: 8px;

            width: 100%;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 10px;
            transition: border-color 0.25s ease, background 0.25s ease;
        }

        .contact-form__group .custom-select:hover {
            border-color: rgba(255, 255, 255, 0.2);
        }

        .contact-form__group .custom-select.open {
            border-color: var(--primary);
            background: rgba(255, 255, 255, 0.06);
        }

        /* Placeholder / selected text */
        .contact-form__group .custom-select .current {
            font-size: 13.5px;
            color: rgba(255, 255, 255, 0.35);
        }

        .contact-form__group .custom-select .current.selected {
            color: var(--white);
        }

        /* Arrow icon: make it visible on a dark background */
        .contact-form__group .custom-select::before {
            filter: brightness(0) invert(1);
            opacity: 0.55;
        }

        /* Options list */
        .contact-form__group .custom-select .list {
            top: calc(100% + 6px);
            background-color: #161616;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            max-height: 220px;
        }

        .contact-form__group .custom-select .list li {
            color: rgba(255, 255, 255, 0.8);
            font-size: 13.5px;
            padding: 10px 14px;
            white-space: initial;
        }

        .contact-form__group .custom-select .list li:hover {
            background: rgba(255, 255, 255, 0.08);
            color: var(--white);
        }

        .contact-form__group .custom-select .list li.selected,
        .contact-form__group .custom-select .list li.selected:hover {
            background: var(--primary);
            color: var(--white);
        }

        .contact-form__group .custom-select .list::-webkit-scrollbar-thumb {
            background-color: rgba(255, 255, 255, 0.3);
        }

        /* Search box inside the dropdown list */
        .contact-form__group .custom-select .list-search {
            position: sticky;
            top: 0;
            z-index: 2;
            padding: 8px;
            background: #161616;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .contact-form__group .custom-select .list-search input {
            width: 100%;
            height: 36px;
            padding: 0 12px;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            color: var(--white);
            font-size: 13px;
            outline: none;
        }

        .contact-form__group .custom-select .list-search input:focus {
            border-color: var(--primary);
        }

        .contact-form__group .custom-select .list-search input::placeholder {
            color: rgba(255, 255, 255, 0.35);
        }

        .contact-form__group .custom-select .list-empty {
            display: none;
            padding: 10px 14px;
            font-size: 13px;
            color: rgba(255, 255, 255, 0.45);
        }
    </style>
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

                    <form class="contact-form__form" method="POST" action="{{ route('register-complaint.store') }}"
                        id="registerComplaintForm">
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
                                        <option value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected' : '' }}>
                                            {{ $state->name }}</option>
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

        $(function () {
            var oldCityId = "{{ old('city_id') }}";
            var urlTemplate = "{{ route('complaint.public-cities-by-state', ['state' => '__ID__']) }}";

            function refreshCity() {
                // Refresh the custom dropdown UI, if the theme uses nice-select
                if ($.fn.niceSelect) {
                    $('#city_id').niceSelect('update');
                }
            }

            function loadCities(stateId, selectedCityId) {
                var $city = $('#city_id');

                $city.html('<option value="">Select City</option>');
                refreshCity();

                if (!stateId) return;

                $city.html('<option value="">Loading...</option>');
                refreshCity();

                $.getJSON(urlTemplate.replace('__ID__', stateId))
                    .done(function (cities) {
                        $city.html('<option value="">Select City</option>');

                        $.each(cities, function (i, city) {
                            var $opt = $('<option>', { value: city.id, text: city.name });
                            if (selectedCityId && String(city.id) === String(selectedCityId)) {
                                $opt.prop('selected', true);
                            }
                            $city.append($opt);
                        });

                        refreshCity();
                    })
                    .fail(function (xhr) {
                        console.error('Could not load cities:', xhr.status);
                        $city.html('<option value="">Could not load cities</option>');
                        refreshCity();
                    });
            }

            // Delegated jQuery handler: catches jQuery-triggered and native change events
            $(document).on('change', '#state_id', function () {
                console.log('state changed:', $(this).val());
                loadCities($(this).val(), null);
            });

            // After a validation error, rebuild the cities and keep the old selection
            var initialState = $('#state_id').val();
            if (initialState) {
                loadCities(initialState, oldCityId);
            }
        });

        (function () {
            var form = document.querySelector('.contact-form');
            if (!form) return;

            function getList(box) {
                return box.querySelector('.list');
            }

            // Show/hide options based on the typed text
            function filterList(box, term) {
                term = (term || '').trim().toLowerCase();
                var list = getList(box);
                var visible = 0;

                list.querySelectorAll('li').forEach(function (li) {
                    var show = !term || li.textContent.toLowerCase().indexOf(term) !== -1;
                    li.style.display = show ? '' : 'none';
                    if (show) visible++;
                });

                var empty = list.querySelector('.list-empty');
                if (empty) empty.style.display = visible ? 'none' : 'block';
            }

            // Create the search box once per list (re-created if the theme rebuilds the list)
            function ensureSearch(box) {
                var list = getList(box);
                if (!list) return null;

                var wrap = list.querySelector('.list-search');

                if (!wrap) {
                    wrap = document.createElement('div');
                    wrap.className = 'list-search';
                    wrap.innerHTML = '<input type="text" placeholder="Type to search..." autocomplete="off">';

                    var empty = document.createElement('div');
                    empty.className = 'list-empty';
                    empty.textContent = 'No results found';

                    list.insertBefore(empty, list.firstChild);
                    list.insertBefore(wrap, list.firstChild);

                    var input = wrap.querySelector('input');

                    // Keep clicks inside the search box from toggling/closing the dropdown
                    ['click', 'mousedown', 'mouseup', 'touchstart'].forEach(function (evt) {
                        wrap.addEventListener(evt, function (e) { e.stopPropagation(); });
                    });

                    input.addEventListener('input', function () {
                        filterList(box, this.value);
                    });

                    input.addEventListener('keydown', function (e) {
                        e.stopPropagation();

                        if (e.key === 'Enter') {
                            e.preventDefault();
                            // Select the first visible option
                            var first = Array.prototype.find.call(list.querySelectorAll('li'), function (li) {
                                return li.style.display !== 'none' && li.textContent.trim() !== '' && !li.classList.contains('list-empty');
                            });
                            if (first) first.click();
                        } else if (e.key === 'Escape') {
                            box.classList.remove('open');
                        }
                    });
                }

                return wrap.querySelector('input');
            }

            function resetSearch(box) {
                var list = getList(box);
                if (!list) return;
                var input = list.querySelector('.list-search input');
                if (input) input.value = '';
                filterList(box, '');
            }

            // React whenever any .custom-select gets/loses the "open" class
            new MutationObserver(function (mutations) {
                mutations.forEach(function (m) {
                    var box = m.target;
                    if (!box.classList || !box.classList.contains('custom-select')) return;

                    if (box.classList.contains('open')) {
                        var input = ensureSearch(box);
                        if (input) setTimeout(function () { input.focus(); }, 0);
                    } else {
                        resetSearch(box);
                    }
                });
            }).observe(form, { attributes: true, attributeFilter: ['class'], subtree: true });

            // Typing a letter while a dropdown is open (focus elsewhere) goes into its search box
            document.addEventListener('keydown', function (e) {
                var box = form.querySelector('.custom-select.open');
                if (!box) return;
                if (e.ctrlKey || e.metaKey || e.altKey || e.key.length !== 1) return;
                if (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA') return;

                var input = ensureSearch(box);
                if (input) input.focus();
            });
        })();
    </script>
@endpush