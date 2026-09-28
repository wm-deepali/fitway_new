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

@php
    // Small helper: $can('module', 'item') -> "view" permission (super admin always true)
    $authUser = auth()->user();
    $can = fn(string $module, ?string $item = null, string $action = 'view') => $authUser && $authUser->hasPermission($module, $item, $action);

    // Parent menu is shown only if at least one child is allowed
    $showCatalog   = $can('gym_equipments', 'categories') || $can('gym_equipments', 'subcategories') || $can('gym_equipments', 'subsubcategories') || $can('gym_equipments', 'products') || $can('gym_equipments', 'price_management');
    $showQuotation = $can('quotation_system', 'manage_vendors') || $can('quotation_system', 'brands') || $can('quotation_system', 'customers') || $can('quotation_system', 'quotes') || $can('quotation_system', 'quote_settings') || $can('quotation_system', 'quote_price_management');
    $showInquiries = $can('contact_inquiries', 'quote_requests') || $can('contact_inquiries', 'page_quote_requests') || $can('contact_inquiries', 'contact_us') || $can('contact_inquiries', 'product_enquiries') || $can('contact_inquiries', 'setup_my_gym') || $can('contact_inquiries', 'newsletter');
    $showComplaint = $can('complaint_management', 'complaints') || $can('complaint_management', 'technicians') || $can('complaint_management', 'complaint_reports');
    $showContent   = $can('content_management', 'sliders') || $can('content_management', 'about_us') || $can('content_management', 'portfolio_category') || $can('content_management', 'portfolio') || $can('content_management', 'blogs') || $can('content_management', 'testimonials') || $can('content_management', 'dynamic_pages') || $can('content_management', 'faqs') || $can('content_management', 'seo');
    $isSuperAdmin  = $authUser && $authUser->isSuperAdmin();
    $showSettings  = $can('settings', 'general_settings') || $can('settings', 'smtp_settings') || $isSuperAdmin;
@endphp

<div id='cssmenu'>
    <ul class="pt-0">

        {{-- DASHBOARD --}}
        @if($can('dashboard', null))
            <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa-solid fa-gauge"></i> Dashboard
                </a>
            </li>
        @endif

        {{-- CATALOG --}}
        @if($showCatalog)
            <li
                class="{{ request()->routeIs(['admin.categories.*', 'admin.subcategories.*', 'admin.subsubcategories.*', 'admin.products.*', 'admin.price-management.*']) ? 'active' : '' }}">
                <a href="#"><i class="fa-solid fa-layer-group"></i> Product Catalogue</a>
                <ul>
                    @if($can('gym_equipments', 'categories'))
                        <li class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.categories.index') }}">Categories</a>
                        </li>
                    @endif
                    @if($can('gym_equipments', 'subcategories'))
                        <li class="{{ request()->routeIs('admin.subcategories.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.subcategories.index') }}">Sub Categories</a>
                        </li>
                    @endif
                    @if($can('gym_equipments', 'subsubcategories'))
                        <li class="{{ request()->routeIs('admin.subsubcategories.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.subsubcategories.index') }}">Sub Sub Categories</a>
                        </li>
                    @endif
                    @if($can('gym_equipments', 'products'))
                        <li class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.products.index') }}">Products</a>
                        </li>
                    @endif
                    @if($can('gym_equipments', 'price_management'))
                        <li class="{{ request()->routeIs('admin.price-management.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.price-management.index') }}">Price Management</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- QUOTATION SYSTEM --}}
        @if($showQuotation)
            <li
                class="{{ request()->routeIs(['admin.manage-vendors.*', 'admin.brands.*', 'admin.customers.*', 'admin.quotes.*', 'admin.quote-price-management.*', 'admin.quote-settings.*']) ? 'active' : '' }}">
                <a href="#"><i class="fa-solid fa-file-invoice-dollar"></i> Quotation System</a>
                <ul>
                    @if($can('quotation_system', 'manage_vendors'))
                        <li class="{{ request()->routeIs('admin.manage-vendors.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.manage-vendors.index') }}">Manage Vendors</a>
                        </li>
                    @endif
                    @if($can('quotation_system', 'brands'))
                        <li class="{{ request()->routeIs('admin.brands.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.brands.index') }}">Manage Brands</a>
                        </li>
                    @endif
                    @if($can('quotation_system', 'customers'))
                        <li class="{{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.customers.index') }}">Manage Customers</a>
                        </li>
                    @endif
                    @if($can('quotation_system', 'quotes'))
                        <li class="{{ request()->routeIs('admin.quotes.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.quotes.index') }}">Manage Quotes</a>
                        </li>
                    @endif
                    @if($can('quotation_system', 'quote_settings'))
                        <li class="{{ request()->routeIs('admin.quote-settings.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.quote-settings.index') }}">Quote Settings</a>
                        </li>
                    @endif
                    @if($can('quotation_system', 'quote_price_management'))
                        <li class="{{ request()->routeIs('admin.quote-price-management.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.quote-price-management.index') }}">Price Management</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- LEADS & SUBMISSIONS --}}
        @if($showInquiries)
            <li
                class="{{ request()->routeIs(['admin.contactUs.*', 'admin.inquiries.*', 'admin.setupMyGym.*', 'admin.productEnquiries.*', 'admin.newsletter.*', 'admin.feedbacks.*', 'admin.bmi-calculator.*', 'admin.quoteRequests.*', 'admin.pageQuoteRequests.*']) ? 'active' : '' }}">
                <a href="#"><i class="fa-solid fa-inbox"></i> Contact & Inquiries</a>
                <ul>
                    @if($can('contact_inquiries', 'quote_requests'))
                        <li class="{{ request()->routeIs('admin.quoteRequests.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.quoteRequests.index') }}">Cart Quote Requests</a>
                        </li>
                    @endif

                    @if($can('contact_inquiries', 'page_quote_requests'))
                        <li class="{{ request()->routeIs('admin.pageQuoteRequests.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.pageQuoteRequests.index') }}">Page Quote Requests</a>
                        </li>
                    @endif

                    @if($can('contact_inquiries', 'contact_us'))
                        <li class="{{ request()->routeIs('admin.contactUs.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.contactUs.index') }}">Contact Us</a>
                        </li>
                    @endif

                    @if($can('contact_inquiries', 'product_enquiries'))
                        <li class="{{ request()->routeIs('admin.productEnquiries.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.productEnquiries.index') }}">Product Enquiries</a>
                        </li>
                    @endif

                    @if($can('contact_inquiries', 'setup_my_gym'))
                        <li class="{{ request()->routeIs('admin.setupMyGym.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.setupMyGym.index') }}">Setup My Gym</a>
                        </li>
                    @endif

                    @if($can('contact_inquiries', 'newsletter'))
                        <li class="{{ request()->routeIs('admin.newsletter.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.newsletter.index') }}">Newsletter</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- COMPLAINT MANAGEMENT --}}
        @if($showComplaint)
            <li
                class="{{ request()->routeIs(['admin.complaint.complaints*', 'admin.complaint.technicians.*', 'admin.complaint-reports.*']) ? 'active' : '' }}">
                <a href="#"><i class="fa-solid fa-triangle-exclamation"></i> Complaint Management</a>
                <ul>
                    @if($can('complaint_management', 'complaints'))
                        <li class="{{ request()->routeIs('admin.complaint.complaints*') ? 'active' : '' }}">
                            <a href="{{ route('admin.complaint.complaints.index') }}">Manage Complaint</a>
                        </li>
                    @endif

                    @if($can('complaint_management', 'technicians'))
                        <li class="{{ request()->routeIs('admin.complaint.technicians.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.complaint.technicians.index') }}">Manage Technician</a>
                        </li>
                    @endif

                    @if($can('complaint_management', 'complaint_reports'))
                        <li class="{{ request()->routeIs('admin.complaint-reports.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.complaint-reports.index') }}">Reports</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- HOME PAGE --}}
        @if($showContent)
            <li
                class="{{ request()->routeIs(['admin.sliders.*', 'admin.about-us.*', 'admin.portfolio-category.*', 'admin.portfolio.*', 'admin.blogs.*', 'admin.testimonials.*', 'admin.dynamic-pages.*', 'admin.faqs.*', 'admin.seo.*', 'admin.instagram.*', 'admin.plan-prices.*']) ? 'active' : '' }}">
                <a href="#"><i class="fa-solid fa-house"></i> Content Management</a>
                <ul>
                    @if($can('content_management', 'sliders'))
                        <li class="{{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.sliders.index') }}">Slider</a>
                        </li>
                    @endif

                    @if($can('content_management', 'about_us'))
                        <li class="{{ request()->routeIs('admin.about-us.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.about-us.edit') }}">About Us & Who Are We</a>
                        </li>
                    @endif

                    @if($can('content_management', 'portfolio_category'))
                        <li class="{{ request()->routeIs('admin.portfolio-category.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.portfolio-category.index') }}">Portfolio Category</a>
                        </li>
                    @endif

                    @if($can('content_management', 'portfolio'))
                        <li class="{{ request()->routeIs('admin.portfolio.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.portfolio.index') }}">Portfolio</a>
                        </li>
                    @endif

                    @if($can('content_management', 'blogs'))
                        <li class="{{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.blogs.index') }}">Blogs</a>
                        </li>
                    @endif

                    @if($can('content_management', 'testimonials'))
                        <li class="{{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.testimonials.index') }}">Testimonials</a>
                        </li>
                    @endif

                    {{-- DYNAMIC PAGES --}}
                    @if($can('content_management', 'dynamic_pages'))
                        <li class="{{ request()->routeIs('admin.dynamic-pages.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.dynamic-pages.index') }}">Manage Dynamic Pages</a>
                        </li>
                    @endif

                    @if($can('content_management', 'faqs'))
                        <li class="{{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.faqs.index') }}">Manage Faq</a>
                        </li>
                    @endif

                    @if($can('content_management', 'seo'))
                        <li class="{{ request()->routeIs('admin.seo.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.seo.index') }}">SEO Management</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- SETTINGS --}}
        @if($showSettings)
            <li
                class="{{ request()->routeIs(['admin.settings.*', 'admin.smtp-settings.*', 'admin.admin-setting.*', 'admin.admin-role-setting.*']) ? 'active' : '' }}">
                <a href="#"><i class="fa-solid fa-gear"></i> Settings</a>
                <ul>
                    @if($can('settings', 'general_settings'))
                        <li class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.admin-setting.index', ['tab' => 'general']) }}">General Settings</a>
                        </li>
                    @endif

                    @if($can('settings', 'smtp_settings'))
                        <li class="{{ request()->routeIs('admin.smtp-settings.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.admin-setting.index', ['tab' => 'smtp']) }}">SMTP Settings</a>
                        </li>
                    @endif

                    {{-- Only the main admin can manage sub admins --}}
                    @if($isSuperAdmin)
                        <li class="{{ request()->routeIs('admin.admin-role-setting.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.admin-role-setting.index') }}">Manage Sub Admins</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

    </ul>
</div>