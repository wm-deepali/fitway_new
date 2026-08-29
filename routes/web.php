<?php

use App\Http\Controllers\Admin\{
    DashboardController,
    ProfileSettingController,
    LogoutController,
    ProductCategoryController,
    ProductSubCategoryController,
    ProductSubSubCategoryController,
    ProductController,
    SliderController,
    AboutUsController,
    PlanPriceController,
    PortfolioCategoryController,
    PortfolioController,
    BMICalculatorController,
    SettingController,
    InstagramController,
    BlogController,
    TestimonialController,
    ContactUsController,
    InquiryController,
    SetupMyGymController,
    ProductEnquiryController,
    NewsletterController,
    FeedbackController,
    PriceManagementController,
    DynamicPageController,
    FaqController,
    AdminSettingController,
    AnnouncementController

};

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FrontController;



Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/products', 'products')->name('products');
    Route::get('/products/{category}', 'products')->name('products.category');
    Route::get('/products/{category}/{subCategory}', 'products')->name('products.subcategory');
    Route::get('/products/{category}/{subCategory}/{subSubCategory}', 'products')->name('products.subsubcategory');
    Route::get('/product/{slug}', 'productDetail')->name('product-detail');
    Route::get('/about-us', 'aboutUs')->name('about-us');
    Route::get('/contact-us', 'contactUs')->name('contact-us');
    Route::get('/faqs', 'faqs')->name('faqs');
    Route::get('/blogs', 'blogs')->name('blogs');
    Route::get('/portfolio', 'portfolio')->name('portfolio');
    Route::get('/cart', 'cart')->name('cart');
    Route::get('/thank-you', 'thankYou')->name('thank-you');
    Route::get('/blog-details', 'blogDetail')->name('blog-details');
    Route::get('/commercial-gym-setup', 'commercialGymSetup')->name('commercial-gym-setup');
    Route::get('/home-gym-setup', 'homeGymSetup')->name('home-gym-setup');
    Route::get('/corporate-gym-setup', 'corporateGymSetup')->name('corporate-gym-setup');
    Route::get('/outdoor-gym-setup', 'outdoorGymSetup')->name('outdoor-gym-setup');
    Route::get('/resorts-gym-setup', 'resortsGymSetup')->name('resorts-gym-setup');

});



// Admin Routes list
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');


Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware(['auth'])->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('profile-setting', [ProfileSettingController::class, 'index'])->name('profile.index');
        Route::post('profile-setting/update', [ProfileSettingController::class, 'updateProfile'])->name('profile.update');
        Route::post('profile-setting/logo', [ProfileSettingController::class, 'updateLogo'])->name('profile.logo.update');
        Route::post('profile-setting/reset-password', [ProfileSettingController::class, 'resetPassword'])->name('reset.password');
        Route::post('/resetpassword', [ProfileSettingController::class, 'resetPassword'])->name('reset.password');
        Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

        Route::get('categories', [ProductCategoryController::class, 'index'])->name('categories.index');
        Route::get('categories/create', [ProductCategoryController::class, 'create'])->name('categories.create');
        Route::post('categories', [ProductCategoryController::class, 'store'])->name('categories.store');
        Route::get('categories/{category}/edit', [ProductCategoryController::class, 'edit'])->name('categories.edit');
        Route::put('categories/{category}', [ProductCategoryController::class, 'update'])->name('categories.update');
        Route::delete('categories/{category}', [ProductCategoryController::class, 'destroy'])->name('categories.destroy');

        Route::get('subcategories', [ProductSubCategoryController::class, 'index'])->name('subcategories.index');
        Route::get('subcategories/create', [ProductSubCategoryController::class, 'create'])->name('subcategories.create');
        Route::post('subcategories', [ProductSubCategoryController::class, 'store'])->name('subcategories.store');
        Route::get('subcategories/{subcategory}/edit', [ProductSubCategoryController::class, 'edit'])->name('subcategories.edit');
        Route::put('subcategories/{subcategory}', [ProductSubCategoryController::class, 'update'])->name('subcategories.update');
        Route::delete('subcategories/{subcategory}', [ProductSubCategoryController::class, 'destroy'])->name('subcategories.destroy');

        Route::get('sub-sub-categories', [ProductSubSubCategoryController::class, 'index'])->name('subsubcategories.index');
        Route::get('sub-sub-categories/create', [ProductSubSubCategoryController::class, 'create'])->name('subsubcategories.create');
        Route::post('sub-sub-categories', [ProductSubSubCategoryController::class, 'store'])->name('subsubcategories.store');
        Route::get('sub-sub-categories/{subsubcategory}/edit', [ProductSubSubCategoryController::class, 'edit'])->name('subsubcategories.edit');
        Route::put('sub-sub-categories/{subsubcategory}', [ProductSubSubCategoryController::class, 'update'])->name('subsubcategories.update');
        Route::delete('sub-sub-categories/{subsubcategory}', [ProductSubSubCategoryController::class, 'destroy'])->name('subsubcategories.destroy');
        Route::get('sub-sub-categories/get-subcategories', [ProductSubSubCategoryController::class, 'getSubCategories'])->name('subsubcategories.getSubCategories');

        Route::get('products', [ProductController::class, 'index'])->name('products.index');
        Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('products', [ProductController::class, 'store'])->name('products.store');
        Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        Route::get('products/get-subcategories', [ProductController::class, 'getSubCategories'])->name('products.getSubCategories');
        Route::get('products/sub-sub-categories', [ProductController::class, 'getSubSubCategories'])->name('products.getSubSubCategories');

        Route::get('price-management', [PriceManagementController::class, 'index'])->name('price-management.index');
        Route::post('price-management/{product}', [PriceManagementController::class, 'update'])->name('price-management.update');
        Route::get('price-management-export', [PriceManagementController::class, 'export'])->name('price-management.export');
        Route::post('price-management-import', [PriceManagementController::class, 'importStore'])->name('price-management.import');
        Route::get('price-management/{product}/logs', [PriceManagementController::class, 'logs'])->name('price-management.logs');

        Route::get('sliders', [SliderController::class, 'index'])->name('sliders.index');
        Route::get('sliders/create', [SliderController::class, 'create'])->name('sliders.create');
        Route::post('sliders', [SliderController::class, 'store'])->name('sliders.store');
        Route::get('sliders/{slider}/edit', [SliderController::class, 'edit'])->name('sliders.edit');
        Route::put('sliders/{slider}', [SliderController::class, 'update'])->name('sliders.update');
        Route::delete('sliders/{slider}', [SliderController::class, 'destroy'])->name('sliders.destroy');

        Route::get('about-us', [AboutUsController::class, 'edit'])->name('about-us.edit');
        Route::post('about-us', [AboutUsController::class, 'update'])->name('about-us.update');
        Route::post('about-us/who-we-are', [AboutUsController::class, 'updateWhoWeAre'])->name('about-us.who-we-are.update');

        Route::prefix('plan-prices')->name('plan-prices.')->group(function () {
            Route::get('/', [PlanPriceController::class, 'index'])->name('index');
            Route::get('create', [PlanPriceController::class, 'create'])->name('create');
            Route::post('/', [PlanPriceController::class, 'store'])->name('store');
            Route::get('{planPrice}/edit', [PlanPriceController::class, 'edit'])->name('edit');
            Route::put('{planPrice}', [PlanPriceController::class, 'update'])->name('update');
            Route::delete('{planPrice}', [PlanPriceController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('portfolio-category')->name('portfolio-category.')->group(function () {
            Route::get('/', [PortfolioCategoryController::class, 'index'])->name('index');
            Route::get('create', [PortfolioCategoryController::class, 'create'])->name('create');
            Route::post('/', [PortfolioCategoryController::class, 'store'])->name('store');
            Route::get('{portfolio_category}/edit', [PortfolioCategoryController::class, 'edit'])->name('edit');
            Route::put('{portfolio_category}', [PortfolioCategoryController::class, 'update'])->name('update');
            Route::delete('{portfolio_category}', [PortfolioCategoryController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('portfolio')->name('portfolio.')->group(function () {
            Route::get('/', [PortfolioController::class, 'index'])->name('index');
            Route::get('create', [PortfolioController::class, 'create'])->name('create');
            Route::post('/', [PortfolioController::class, 'store'])->name('store');
            Route::get('{portfolio}/edit', [PortfolioController::class, 'edit'])->name('edit');
            Route::put('{portfolio}', [PortfolioController::class, 'update'])->name('update');
            Route::delete('{portfolio}', [PortfolioController::class, 'destroy'])->name('destroy');
        });

        Route::get('bmi-calculator', [BMICalculatorController::class, 'index'])->name('bmi-calculator.index');

        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/', [SettingController::class, 'edit'])->name('edit');
            Route::post('logo', [SettingController::class, 'updateLogo'])->name('logo.update');
            Route::post('header', [SettingController::class, 'updateHeader'])->name('header.update');
            Route::post('header-script', [SettingController::class, 'updateHeaderScript'])->name('header-script.update');
            Route::post('footer', [SettingController::class, 'updateFooter'])->name('footer.update');
            Route::post('newsletter', [SettingController::class, 'updateNewsletter'])->name('newsletter.update');
        });


        Route::prefix('instagram')->name('instagram.')->group(function () {
            Route::get('/', [InstagramController::class, 'index'])->name('index');
            Route::get('create', [InstagramController::class, 'create'])->name('create');
            Route::post('/', [InstagramController::class, 'store'])->name('store');
            Route::delete('{instagram}', [InstagramController::class, 'destroy'])->name('destroy');
        });

        Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');
        Route::get('blogs/create', [BlogController::class, 'create'])->name('blogs.create');
        Route::post('blogs', [BlogController::class, 'store'])->name('blogs.store');
        Route::get('blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
        Route::put('blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
        Route::delete('blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');

        Route::get('testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
        Route::get('testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create');
        Route::post('testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
        Route::get('testimonials/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('testimonials.edit');
        Route::put('testimonials/{testimonial}', [TestimonialController::class, 'update'])->name('testimonials.update');
        Route::delete('testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');

        Route::get('contact-us', [ContactUsController::class, 'index'])->name('contactUs.index');
        Route::get('contact-us/{contact}', [ContactUsController::class, 'show'])->name('contactUs.show');
        Route::delete('contact-us/{contact}', [ContactUsController::class, 'destroy'])->name('contactUs.destroy');

        Route::get('inquiries', [InquiryController::class, 'index'])->name('inquiries.index');
        Route::get('inquiries/{inquiry}', [InquiryController::class, 'show'])->name('inquiries.show');
        Route::delete('inquiries/{inquiry}', [InquiryController::class, 'destroy'])->name('inquiries.destroy');

        Route::get('setup-my-gym', [SetupMyGymController::class, 'index'])->name('setupMyGym.index');
        Route::get('setup-my-gym/{setupMyGym}', [SetupMyGymController::class, 'show'])->name('setupMyGym.show');
        Route::delete('setup-my-gym/{setupMyGym}', [SetupMyGymController::class, 'destroy'])->name('setupMyGym.destroy');

        Route::get('product-enquiries', [ProductEnquiryController::class, 'index'])->name('productEnquiries.index');
        Route::delete('product-enquiries/{productEnquiry}', [ProductEnquiryController::class, 'destroy'])->name('productEnquiries.destroy');

        Route::get('newsletter', [NewsletterController::class, 'index'])->name('newsletter.index');
        Route::delete('newsletter/{newsletter}', [NewsletterController::class, 'destroy'])->name('newsletter.destroy');

        Route::get('feedbacks', [FeedbackController::class, 'index'])->name('feedbacks.index');
        Route::get('feedbacks/{feedback}', [FeedbackController::class, 'show'])->name('feedbacks.show');
        Route::delete('feedbacks/{feedback}', [FeedbackController::class, 'destroy'])->name('feedbacks.destroy');

        Route::resource('dynamic-pages', DynamicPageController::class)->names('dynamic-pages');
        Route::resource('faqs', FaqController::class)->names('faqs');
        Route::resource('announcements', AnnouncementController::class)->names('announcements');

        Route::get('/admin-setting', [AdminSettingController::class, 'index'])->name('admin-setting.index');
        Route::post('/smtp-settings/store', [AdminSettingController::class, 'smtpSettingStore'])->name('smtp-settings.store');
        Route::post('admin-setting/google-setting', [AdminSettingController::class, 'googleSettingStore'])->name('admin-setting.google-setting');
    });
});