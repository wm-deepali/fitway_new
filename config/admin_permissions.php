<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Modules & pages (shown as the View / Add / Edit / Delete matrix in the
    | Create / Edit Sub Admin form). Same list is used to whitelist what the
    | controller saves.
    |--------------------------------------------------------------------------
    */
    'groups' => [
        [
            'key' => 'gym_equipments',
            'label' => 'Gym Equipments',
            'icon' => 'fa-layer-group',
            'items' => [
                ['key' => 'categories', 'label' => 'Categories'],
                ['key' => 'subcategories', 'label' => 'Sub Categories'],
                ['key' => 'subsubcategories', 'label' => 'Sub Sub Categories'],
                ['key' => 'products', 'label' => 'Products'],
                ['key' => 'price_management', 'label' => 'Price Management'],
            ],
        ],
        [
            'key' => 'quotation_system',
            'label' => 'Quotation System',
            'icon' => 'fa-file-invoice-dollar',
            'items' => [
                ['key' => 'manage_vendors', 'label' => 'Manage Vendors'],
                ['key' => 'brands', 'label' => 'Manage Brands'],
                ['key' => 'customers', 'label' => 'Manage Customers'],
                ['key' => 'quote_price_management', 'label' => 'Price Management'],
                ['key' => 'quotes', 'label' => 'Manage Quotes'],
                ['key' => 'quote_settings', 'label' => 'Quote Settings'],
            ],
        ],
        [
            'key' => 'content_management',
            'label' => 'Content Management',
            'icon' => 'fa-house',
            'items' => [
                ['key' => 'sliders', 'label' => 'Slider'],
                ['key' => 'about_us', 'label' => 'About Us & Who Are We'],
                ['key' => 'portfolio_category', 'label' => 'Portfolio Category'],
                ['key' => 'portfolio', 'label' => 'Portfolio'],
                ['key' => 'blogs', 'label' => 'Blogs'],
                ['key' => 'testimonials', 'label' => 'Testimonials'],
                ['key' => 'dynamic_pages', 'label' => 'Manage Dynamic Pages'],
                ['key' => 'faqs', 'label' => 'Manage Faq'],
                ['key' => 'seo', 'label' => 'SEO Management'],
            ],
        ],
        [
            'key' => 'contact_inquiries',
            'label' => 'Contact & Inquiries',
            'icon' => 'fa-inbox',
            'items' => [
                ['key' => 'quote_requests', 'label' => 'Cart Quote Requests'],
                ['key' => 'page_quote_requests', 'label' => 'Page Quote Requests'],
                ['key' => 'contact_us', 'label' => 'Contact Us'],
                ['key' => 'product_enquiries', 'label' => 'Product Enquiries'],
                ['key' => 'setup_my_gym', 'label' => 'Setup My Gym'],
                ['key' => 'newsletter', 'label' => 'Newsletter'],
            ],
        ],
        [
            'key' => 'complaint_management',
            'label' => 'Complaint Management',
            'icon' => 'fa-triangle-exclamation',
            'items' => [
                ['key' => 'complaints', 'label' => 'Manage Complaint'],
                ['key' => 'technicians', 'label' => 'Manage Technician'],
                ['key' => 'complaint_reports', 'label' => 'Reports'],
            ],
        ],
        [
            'key' => 'settings',
            'label' => 'Settings',
            'icon' => 'fa-gear',
            'items' => [
                ['key' => 'general_settings', 'label' => 'General Settings'],
                ['key' => 'smtp_settings', 'label' => 'SMTP Settings'],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Routes every logged-in admin / sub-admin can open (no permission needed).
    | Names are written WITHOUT the "admin." prefix.
    |--------------------------------------------------------------------------
    */
    'open' => [
        'profile',
        'reset.password',
        'logout',
        'quote-settings.get-cities',
        'products.getSubCategories',
        'products.getSubSubCategories',
    ],

    /*
    |--------------------------------------------------------------------------
    | Route name (without "admin.") => [module, item or [items]]
    | The action (view / add / edit / delete) is worked out from the route name
    | suffix and HTTP method by the AdminAccess middleware.
    | Any admin route NOT listed here is super-admin only.
    |--------------------------------------------------------------------------
    */
    'routes' => [
        'dashboard' => ['dashboard', null],

        // Gym Equipments
        'categories' => ['gym_equipments', 'categories'],
        'subcategories' => ['gym_equipments', 'subcategories'],
        'subsubcategories' => ['gym_equipments', 'subsubcategories'],
        'products' => ['gym_equipments', 'products'],
        'price-management' => ['gym_equipments', 'price_management'],

        // Quotation System
        'manage-vendors' => ['quotation_system', 'manage_vendors'],
        'vendors' => ['quotation_system', 'manage_vendors'],
        'brands' => ['quotation_system', 'brands'],
        'customers' => ['quotation_system', 'customers'],
        'quote-price-management' => ['quotation_system', 'quote_price_management'],
        'quotes' => ['quotation_system', 'quotes'],
        'quote-settings' => ['quotation_system', 'quote_settings'],

        // Content Management
        'sliders' => ['content_management', 'sliders'],
        'about-us' => ['content_management', 'about_us'],
        'portfolio-category' => ['content_management', 'portfolio_category'],
        'portfolio' => ['content_management', 'portfolio'],
        'blogs' => ['content_management', 'blogs'],
        'testimonials' => ['content_management', 'testimonials'],
        'dynamic-pages' => ['content_management', 'dynamic_pages'],
        'faqs' => ['content_management', 'faqs'],
        'seo' => ['content_management', 'seo'],

        // Contact & Inquiries
        'quoteRequests' => ['contact_inquiries', 'quote_requests'],
        'pageQuoteRequests' => ['contact_inquiries', 'page_quote_requests'],
        'contactUs' => ['contact_inquiries', 'contact_us'],
        'productEnquiries' => ['contact_inquiries', 'product_enquiries'],
        'setupMyGym' => ['contact_inquiries', 'setup_my_gym'],
        'newsletter' => ['contact_inquiries', 'newsletter'],

        // Complaint Management
        'complaint.complaints' => ['complaint_management', 'complaints'],
        'complaint.technicians' => ['complaint_management', 'technicians'],
        'complaint-reports' => ['complaint_management', 'complaint_reports'],

        // Settings (General + SMTP share one page)
        'admin-setting' => ['settings', ['general_settings', 'smtp_settings']],
        'settings' => ['settings', 'general_settings'],
        'smtp-settings' => ['settings', 'smtp_settings'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Route names where the action can't be guessed from the name / method.
    |--------------------------------------------------------------------------
    */
    'overrides' => [
        'about-us.edit' => 'view',   // this is the page itself
        'settings.edit' => 'view',
        'settings.general.store' => 'edit',
        'smtp-settings.store' => 'edit',
        'quote-settings.store' => 'edit',

        'quotes.generate' => 'add',    // part of the create-quote flow
        'quotes.discard' => 'add',
        'quotes.store-brand' => 'add',
        'quotes.quick-store-product' => 'add',
        'quotes.sendEmail' => 'view',

        'products.quickStoreVendor' => 'add',
        'products.quickStoreBrand' => 'add',

        'quotes.search-customer' => 'view',
        'quotes.search-products' => 'view',
        'quotes.customer-quotes' => 'view',
        'quotes.preview' => 'view',
        'quotes.download' => 'view',

        'complaint.complaints.searchCustomers' => 'view',
        'complaint.complaints.searchTechnicians' => 'view',
        'complaint.complaints.customerHistory' => 'view',
        'complaint.complaints.citiesByState' => 'view',
    ],

];