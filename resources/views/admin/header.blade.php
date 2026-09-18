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

        {{-- QUOTATION SYSTEM (new) --}}
        <li
            class="{{ request()->routeIs(['admin.manage-vendors.*', 'admin.brands.*', 'admin.customers.*', 'admin.quotes.*', 'admin.quote-price-management.*', 'admin.quote-settings.*']) ? 'active' : '' }}">
            <a href="#"><i class="fa-solid fa-file-invoice-dollar"></i> Quotation System</a>
            <ul>
                <li class="{{ request()->routeIs('admin.manage-vendors.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.manage-vendors.index') }}">Manage Vendors</a>
                </li>
                <li class="{{ request()->routeIs('admin.brands.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.brands.index') }}">Manage Brands</a>
                </li>
                <li class="{{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.customers.index') }}">Manage Customers</a>
                </li>
                <li class="{{ request()->routeIs('admin.quote-price-management.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.quote-price-management.index') }}">Price Management</a>
                </li>
                <li class="{{ request()->routeIs('admin.quotes.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.quotes.index') }}">Manage Quotes</a>
                </li>
                <li class="{{ request()->routeIs('admin.quote-settings.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.quote-settings.index') }}">Quote Settings</a>
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

                <li class="{{ request()->routeIs('admin.about-us.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.about-us.edit') }}">About Us & Who Are We</a>
                </li>

                <li class="{{ request()->routeIs('admin.client-gallery.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.portfolio-category.index') }}">Portfolio Category</a>
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

                <li class="{{ request()->routeIs('admin.seo.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.seo.index') }}">
                        SEO Management
                    </a>
                </li>

            </ul>
        </li>



        {{-- LEADS & SUBMISSIONS --}}
        <li
            class="{{ request()->routeIs(['admin.contactUs.*', 'admin.inquiries.*', 'admin.setupMyGym.*', 'admin.productEnquiries.*', 'admin.newsletter.*', 'admin.feedbacks.*', 'admin.bmi-calculator.*', 'admin.quoteRequests.*', 'admin.pageQuoteRequests.*']) ? 'active' : '' }}">
            <a href="#"><i class="fa-solid fa-inbox"></i> Contact & Inquiries</a>
            <ul>
                <li class="{{ request()->routeIs('admin.quoteRequests.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.quoteRequests.index') }}">Cart Quote Requests</a>
                </li>

                <li class="{{ request()->routeIs('admin.pageQuoteRequests.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.pageQuoteRequests.index') }}">Page Quote Requests</a>
                </li>

                <li class="{{ request()->routeIs('admin.contactUs.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.contactUs.index') }}">Contact Us</a>
                </li>

                <li class="{{ request()->routeIs('admin.productEnquiries.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.productEnquiries.index') }}">Product Enquiries</a>
                </li>

                <li class="{{ request()->routeIs('admin.setupMyGym.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.setupMyGym.index') }}">Setup My Gym</a>
                </li>

                <li class="{{ request()->routeIs('admin.newsletter.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.newsletter.index') }}">Newsletter</a>
                </li>
            </ul>
        </li>

        {{-- SETTINGS --}}
        <li class="{{ request()->routeIs(['admin.settings.*', 'admin.smtp-settings.*']) ? 'active' : '' }}">
            <a href="#"><i class="fa-solid fa-gear"></i> Settings</a>
            <ul>
                <li class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.admin-setting.index', ['tab' => 'general']) }}">General Settings</a>
                </li>
                <li class="{{ request()->routeIs('admin.smtp-settings.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.admin-setting.index', ['tab' => 'smtp']) }}">SMTP Settings</a>
                </li>
            </ul>
        </li>

    </ul>
</div>