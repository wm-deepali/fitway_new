<!-- fixed-top-->
<div class="row d-none">
    <div class="col-10">

        @if(session('success'))
            <div class="alert alert-info alert-dismissible fade in">
                <a href="javascript:void(0);" class="close" data-dismiss="alert">&times;</a>
                <strong>Success!</strong> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade in">
                <a href="javascript:void(0);" class="close" data-dismiss="alert">&times;</a>
                <strong>Error!</strong> {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
</div>

<!-- fixed-top-->

<div id='cssmenu'>
    <ul class="pt-0">

        {{-- DASHBOARD --}}
        <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <i class="fa-solid fa-gauge"></i> Dashboard
            </a>
        </li>

        {{-- CATALOG --}}
        <li
            class="{{ request()->routeIs(['admin.categories.*', 'admin.subcategories.*', 'admin.subsubcategories.*', 'admin.products.*', 'admin.price-management.*']) ? 'active' : '' }}">
            <a href="#"><i class="fa-solid fa-layer-group"></i> Gym Equipments</a>
            <ul>
                <li class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.categories.index') }}">Categories</a>
                </li>
                <li class="{{ request()->routeIs('admin.subcategories.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.subcategories.index') }}">Sub Categories</a>
                </li>
                <li class="{{ request()->routeIs('admin.subsubcategories.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.subsubcategories.index') }}">Sub Sub Categories</a>
                </li>
                <li class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.products.index') }}">Products</a>
                </li>
                <li class="{{ request()->routeIs('admin.price-management.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.price-management.index') }}">Price Management</a>
                </li>
            </ul>
        </li>

        {{-- HOME PAGE --}}
        <li
            class="{{ request()->routeIs(['admin.sliders.*', 'admin.about-us.*', 'admin.client-gallery.*', 'admin.portfolio.*', 'admin.instagram.*', 'admin.plan-prices.*']) ? 'active' : '' }}">
            <a href="#"><i class="fa-solid fa-house"></i> Content Management</a>
            <ul>
                <li class="{{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.sliders.index') }}">Slider</a>
                </li>

                <li class="{{ request()->routeIs('admin.client-gallery.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.client-gallery.index') }}">Portfolio Category</a>
                </li>
                <li class="{{ request()->routeIs('admin.portfolio.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.portfolio.index') }}">Portfolio</a>
                </li>

                <li class="{{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.blogs.index') }}">Blogs</a>
                </li>
                <li class="{{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.testimonials.index') }}">Testimonials</a>
                </li>
                {{-- DYNAMIC PAGES --}}
                <li class="{{ request()->routeIs('admin.dynamic-pages.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.dynamic-pages.index') }}"> Manage Dynamic Pages
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.faqs.index') }}"> Manage Faq
                    </a>
                </li>
            </ul>
        </li>



        {{-- LEADS & SUBMISSIONS --}}
        <li
            class="{{ request()->routeIs(['admin.contactUs.*', 'admin.inquiries.*', 'admin.setupMyGym.*', 'admin.productEnquiries.*', 'admin.newsletter.*', 'admin.feedbacks.*', 'admin.bmi-calculator.*']) ? 'active' : '' }}">
            <a href="#"><i class="fa-solid fa-inbox"></i> Contact & Inquiries</a>
            <ul>
                <li class="{{ request()->routeIs('admin.contactUs.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.contactUs.index') }}">Contact Us</a>
                </li>
                <li class="{{ request()->routeIs('admin.inquiries.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.inquiries.index') }}">Inquiries</a>
                </li>
                <li class="{{ request()->routeIs('admin.setupMyGym.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.setupMyGym.index') }}">Setup My Gym</a>
                </li>
                <li class="{{ request()->routeIs('admin.productEnquiries.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.productEnquiries.index') }}">Product Enquiries</a>
                </li>
                <li class="{{ request()->routeIs('admin.newsletter.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.newsletter.index') }}">Newsletter</a>
                </li>
                <li class="{{ request()->routeIs('admin.feedbacks.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.feedbacks.index') }}">Feedbacks</a>
                </li>
                <li class="{{ request()->routeIs('admin.bmi-calculator.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.bmi-calculator.index') }}">BMI Calculator</a>
                </li>
            </ul>
        </li>

        {{-- SETTINGS --}}
        <li class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
            <a href="{{ route('admin.settings.edit') }}">
                <i class="fa-solid fa-gear"></i> Settings
            </a>
        </li>

        <li class="{{ request()->routeIs('admin.instagram.*') ? 'active' : '' }}">
            <a href="{{ route('admin.instagram.index') }}">Instagram</a>
        </li>
        <li class="{{ request()->routeIs('admin.plan-prices.*') ? 'active' : '' }}">
            <a href="{{ route('admin.plan-prices.index') }}">Plan Prices</a>
        </li>
        <li class="{{ request()->routeIs('admin.about-us.*') ? 'active' : '' }}">
            <a href="{{ route('admin.about-us.edit') }}">About Us & Who Are We</a>
        </li>

    </ul>
</div>