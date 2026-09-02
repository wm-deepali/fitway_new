@extends('layouts.app')

@section('title', $seo['title'])
@section('meta_description', $seo['description'])

@if($seo['canonical'])
    @section('canonical', $seo['canonical'])
@endif

@if($seo['ogTitle'])
    @section('og_title', $seo['ogTitle'])
    @section('og_description', $seo['ogDescription'])
@endif

@if($seo['ogImage'])
    @section('og_image', $seo['ogImage'])
@endif

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/sass/products/products.css') }}" />
@endpush

@php
    // Ordered breadcrumb trail for schema + used for OG fallback title parts
    $breadcrumbTrail = collect([
        ['name' => 'Home', 'url' => route('home')],
        ['name' => 'Equipment', 'url' => route('products')],
    ]);
    if ($selectedCategory) {
        $breadcrumbTrail->push(['name' => $selectedCategory->category_name, 'url' => route('products.category', $selectedCategory->slug)]);
    }
    if ($selectedSubCategory) {
        $breadcrumbTrail->push(['name' => $selectedSubCategory->name, 'url' => route('products.subcategory', [$selectedCategory->slug, $selectedSubCategory->slug])]);
    }
    if ($selectedSubSubCategory) {
        $breadcrumbTrail->push(['name' => $selectedSubSubCategory->name, 'url' => route('products.subsubcategory', [$selectedCategory->slug, $selectedSubCategory->slug, $selectedSubSubCategory->slug])]);
    }
@endphp


@section('content')

    <section class="banner banner--listing">
        <div class="bg">
            <video autoplay="" muted="" loop="" playsinline="" src="{{ asset('assets/video/banner3.mp4') }}"
                poster="{{ asset('assets/video/poster/banner.png') }}">
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
                        <a href="{{ route('products') }}" class="{{ $selectedCategory ? '' : 'active' }}">Equipment</a>
                    </li>
                    @if ($selectedCategory)
                        <li>
                            <span class="breadcrumb-separator">/</span>
                        </li>
                        <li>
                            <a href="{{ route('products.category', $selectedCategory->slug)  }}" class="active">
                                {{ $selectedCategory->category_name }}
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>

            <div class="container">
                <div class="banner-wrapper">
                    <div class="content">
                        <h1>{{ $seo['h1'] }}</h1>
                        <p>
                            {{ $selectedCategory->short_description ?? 'Browse our complete range of commercial, home and outdoor fitness equipment.' }}
                        </p>
                        <span class="count">{{ $products->total() }} products</span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="product-secB">
        <div class="container">
            <!-- Section heading -->

            <div class="listing">
                <!-- ============ LEFT: Filters ============ -->
                <div class="filter-overlay" id="filterOverlay"></div>

                <aside class="listing-filters" id="filterSidebar">
                    <!-- NEW: drawer header, visible only <991 -->
                    <div class="listing-filters__close">
                        <h6>Filters</h6>
                        <span class="close-icon" id="closeFilterBtn">✕</span>
                    </div>
                    <form method="GET" action="{{ url()->current() }}" id="equipFilterForm">
                        <div class="filter-search">
                            <label for="equipSearch">Search Equipment</label>
                            <div class="filter-search__field">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="11" cy="11" r="7" />
                                    <path d="M21 21l-4.3-4.3" />
                                </svg>
                                <input type="text" id="equipSearch" name="search" value="{{ request('search') }}"
                                    placeholder="Search treadmill, cross trainer, spin bike..." />
                            </div>
                        </div>
                        <input type="hidden" name="sort" id="sortInput" value="{{ request('sort', 'recommended') }}" />
                    </form>

                    <!-- Equipment Categories (nested accordion) -->
                    <div class="filter-group">
                        <h5 class="filter-group__title">Equipment Categories</h5>

                        <div class="cat-accordion">
                            @foreach ($categories as $category)
                                <details class="cat-accordion__item" {{ $loop->first ? 'open' : '' }}>
                                    <summary>
                                        <span>{{ $category->category_name }}</span>
                                        <svg viewBox="0 0 24 24">
                                            <path d="M6 9l6 6 6-6" />
                                        </svg>
                                    </summary>

                                    <div class="cat-accordion__body">
                                        @foreach ($category->subCategories as $subCategory)
                                            <div class="sub-group">
                                                <span class="sub-group__label">{{ $subCategory->name }}</span>
                                                <ul>
                                                    @forelse ($subCategory->subSubCategories as $subSubCategory)
                                                            <li>
                                                                <label>
                                                                    <input type="checkbox" onchange="window.location = this.checked
                                                        ? '{{ route('products.subsubcategory', [$category->slug, $subCategory->slug, $subSubCategory->slug]) }}'
                                                        : '{{ route('products.subcategory', [$category->slug, $subCategory->slug]) }}'" {{ $selectedSubSubCategory?->id === $subSubCategory->id ? 'checked' : '' }} />
                                                                    <span>{{ $subSubCategory->name }}</span>
                                                                </label>
                                                            </li>
                                                    @empty
                                                            <li>
                                                                <label>
                                                                    <input type="checkbox" onchange="window.location = this.checked
                                                        ? '{{ route('products.subcategory', [$category->slug, $subCategory->slug]) }}'
                                                        : '{{ route('products.category', $category->slug) }}'" {{ $selectedSubCategory?->id === $subCategory->id ? 'checked' : '' }} />
                                                                    <span>{{ $subCategory->name }}</span>
                                                                </label>
                                                            </li>
                                                    @endforelse
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </details>
                            @endforeach
                        </div>
                    </div>

                    <a href="{{ route('products') }}" class="filter-clear">
                        Clear all filters
                    </a>
                </aside>

                <!-- ============ RIGHT: Product Grid ============ -->
                <div class="listing-main">
                    <div class="listing-main__top">
                        <div class="listing-main__top-text">
                            <h4>{{ $selectedCategory->category_name ?? 'All Products' }}</h4>
                            <p>
                                {{ $selectedCategory->short_description ?? 'Browse our complete range of fitness equipment across all categories.' }}
                            </p>
                        </div>

                        <div class="listing-main__top-controls">
                            <button type="button" class="filter-toggle-btn" id="openFilterBtn">
                                <svg viewBox="0 0 24 24">
                                    <path d="M3 6h18M6 12h12M10 18h4" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" />
                                </svg>
                                Filters
                            </button>
                            <span class="result-count">{{ $products->total() }} Equipment</span>

                            <div class="sort-select">
                                <label>Sort</label>
                                <div class="sort-select__field">
                                    <select id="sortSelect">
                                        <option value="recommended" {{ request('sort', 'recommended') == 'recommended' ? 'selected' : '' }}>Recommended</option>
                                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest
                                        </option>
                                        <option value="az" {{ request('sort') == 'az' ? 'selected' : '' }}>A–Z</option>
                                        <option value="za" {{ request('sort') == 'za' ? 'selected' : '' }}>Z–A</option>
                                    </select>
                                    <svg viewBox="0 0 24 24">
                                        <path d="M6 9l6 6 6-6" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                   <div class="equip-grid" id="equipGrid">
    @forelse ($products as $product)
        @include('front.partials.product-card', ['product' => $product])
    @empty
        <p>No products found.</p>
    @endforelse
</div>

<div id="infiniteScrollSentinel" style="height:1px;"></div>
<div id="infiniteScrollLoader" style="display:none;text-align:center;padding:20px;">
    <span>Loading more equipment...</span>
</div>

<input type="hidden" id="nextPageUrl" value="{{ $products->nextPageUrl() ?? '' }}" />

                </div>
            </div>
        </div>
    </section>

    <section class="product-secA">
        <div class="container">
            <div class="heading">
                <h3>FITWAY <span>COLLECTION</span></h3>
                <p>Premium equipment built for powerful training spaces.</p>
            </div>

            <div class="swiper-wrap">
                <div class="swiper thirdSilder2">
                    <div class="swiper-wrapper">
                        <!-- Home Gym Setup -->
                        <div class="swiper-slide">
                            <div class="product_card">
                                <div class="img">
                                    <img src="{{ asset('assets/images/home/Home-Equipment.jpg') }}" alt="Home Gym Setup" />
                                </div>

                                <div class="content">
                                    <h4>Home Gym Setup</h4>

                                    <p>
                                        Create a personalized workout space at home with the
                                        right equipment, layout and fitness solutions.
                                    </p>


                                    <a href="{{ route('home-gym-setup') }}" class="btn btn-primary">
                                        Explore Home Gym
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Commercial Gym Setup -->
                        <div class="swiper-slide">
                            <div class="product_card">
                                <div class="img">
                                    <img src="{{ asset('assets/images/home/Commercial-Equipment.jpg') }}"
                                        alt="Commercial Gym Setup" />
                                </div>

                                <div class="content">
                                    <h4>Commercial Gym Setup</h4>

                                    <p>
                                        Complete professional gym solutions with durable
                                        equipment, smart planning and expert installation for
                                        high-performance spaces.
                                    </p>


                                    <a href="{{ route('commercial-gym-setup') }}" class="btn btn-primary">
                                        Explore Commercial
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Corporate Gym Setup -->
                        <div class="swiper-slide">
                            <div class="product_card">
                                <div class="img">
                                    <img src="{{ asset('assets/images/home/complete-corprate-gym.jpg') }}"
                                        alt="Corporate Gym Setup" />
                                </div>

                                <div class="content">
                                    <h4>Corporate Gym Setup</h4>

                                    <p>
                                        Build healthier workplaces with modern fitness spaces
                                        designed to support employee wellness and daily
                                        training.
                                    </p>


                                    <a href="{{ route('corporate-gym-setup') }}" class="btn btn-primary">
                                        Explore Corporate
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Outdoor / Open Gym Setup -->
                        <div class="swiper-slide">
                            <div class="product_card">
                                <div class="img">
                                    <img src="{{ asset('assets/images/home/Outdoor-Equipment.jpg') }}"
                                        alt="Outdoor Open Gym Setup" />
                                </div>

                                <div class="content">
                                    <h4>Outdoor / Open Gym Setup</h4>

                                    <p>
                                        Durable outdoor fitness solutions for parks,
                                        communities, societies and open workout spaces.
                                    </p>


                                    <a href="{{ route('outdoor-gym-setup') }}" class="btn btn-primary">
                                        Explore Outdoor
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Hotels & Resorts Gym Setup -->
                        <div class="swiper-slide">
                            <div class="product_card">
                                <div class="img">
                                    <img src="{{ asset('assets/images/home/Complete-Resort.jpg') }}"
                                        alt="Hotels and Resorts Gym Setup" />
                                </div>

                                <div class="content">
                                    <h4>Hotels & Resorts Gym Setup</h4>

                                    <p>
                                        Premium fitness spaces designed to enhance guest
                                        experiences with professional equipment and thoughtful
                                        layouts.
                                    </p>


                                    <a href="{{ route('resorts-gym-setup') }}" class="btn btn-primary">
                                        Explore Hospitality
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation -->
                <div class="swiper-group">
                    <button type="button" class="thirdSilder2-prev btn-prev" aria-label="Previous Slide">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                            <path fill="currentColor"
                                d="M609.408 149.376L277.76 489.6a32 32 0 0 0 0 44.672l331.648 340.352a29.12 29.12 0 0 0 41.728 0a30.59 30.59 0 0 0 0-42.752L339.264 511.936l311.872-319.872a30.59 30.59 0 0 0 0-42.688a29.12 29.12 0 0 0-41.728 0" />
                        </svg>
                    </button>

                    <button type="button" class="thirdSilder2-next btn-next" aria-label="Next Slide">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                            <path fill="currentColor"
                                d="M414.592 149.376L746.24 489.6a32 32 0 0 1 0 44.672L414.592 874.624a29.12 29.12 0 0 1-41.728 0a30.59 30.59 0 0 1 0-42.752l311.872-319.936L372.864 192a30.59 30.59 0 0 1 0-42.688a29.12 29.12 0 0 1 41.728 0" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>



@endsection

@push('scripts')
    <script>

        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('equipFilterForm');
            const sortSelect = document.getElementById('sortSelect');
            const sortInput = document.getElementById('sortInput');
            const searchInput = document.getElementById('equipSearch');

            // Sort change → submit immediately
            if (sortSelect && sortInput && form) {
                let lastValue = sortSelect.value;

                setInterval(function () {
                    if (sortSelect.value !== lastValue) {
                        lastValue = sortSelect.value;
                        console.log('sort value changed to', lastValue);
                        sortInput.value = lastValue;
                        form.submit();
                    }
                }, 300);
            }
            // Search → submit on Enter key
            if (searchInput) {
                searchInput.addEventListener('keydown', function (e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        form.submit();
                    }
                });
            }
        });


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
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
            },
        });

        const openBtn = document.getElementById("openFilterBtn");
        const closeBtn = document.getElementById("closeFilterBtn");
        const overlay = document.getElementById("filterOverlay");
        const sidebar = document.getElementById("filterSidebar");

        function openFilters() {
            sidebar.classList.add("active");
            overlay.classList.add("active");
            document.body.style.overflow = "hidden";
        }
        function closeFilters() {
            sidebar.classList.remove("active");
            overlay.classList.remove("active");
            document.body.style.overflow = "";
        }

        openBtn?.addEventListener("click", openFilters);
        closeBtn?.addEventListener("click", closeFilters);
        overlay?.addEventListener("click", closeFilters);

document.addEventListener('DOMContentLoaded', function () {
    const grid = document.getElementById('equipGrid');
    const sentinel = document.getElementById('infiniteScrollSentinel');
    const loader = document.getElementById('infiniteScrollLoader');
    const nextPageInput = document.getElementById('nextPageUrl');

    if (!grid || !sentinel || !nextPageInput) return;

    let isLoading = false;

    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                loadMoreProducts();
            }
        });
    }, {
        rootMargin: '200px',
    });

    observer.observe(sentinel);

    function loadMoreProducts() {
        const nextUrl = nextPageInput.value;

        if (!nextUrl || nextUrl === '' || isLoading) return;

        isLoading = true;
        loader.style.display = 'block';

        fetch(nextUrl, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
            },
        })
            .then(res => res.json())
            .then(data => {
                grid.insertAdjacentHTML('beforeend', data.html);
                nextPageInput.value = data.nextPageUrl || '';

                if (!data.nextPageUrl) {
                    observer.unobserve(sentinel);
                }
            })
            .catch(() => {
                console.error('Failed to load more products');
            })
            .finally(() => {
                isLoading = false;
                loader.style.display = 'none';
            });
    }
});
    </script>
@endpush
@push('schema')
    @php
        $breadcrumbSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $breadcrumbTrail->values()->map(function ($crumb, $index) {
                return [
                    '@type' => 'ListItem',
                    'position' => $index + 1,
                    'name' => $crumb['name'],
                    'item' => $crumb['url'],
                ];
            })->all(),
        ];

        $itemListSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'ItemList',
            'itemListElement' => collect($products->items())->values()->map(function ($product, $index) {
                return [
                    '@type' => 'ListItem',
                    'position' => $index + 1,
                    'url' => $product->canonical_url ?? url('/product/' . $product->slug),
                    'name' => $product->name,
                    'image' => $product->image_url ?? null,
                ];
            })->all(),
        ];
    @endphp
    <script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
    <script type="application/ld+json">{!! json_encode($itemListSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endpush