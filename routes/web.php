<?php

use App\Http\Controllers\Admin\{
    DashboardController,
    ProfileSettingController,
    LogoutController,
    ProductCategoryController,
    ProductSubCategoryController,
    ProductMiniSubCategoryController,
    ProductController,
    SliderController,
    AboutUsController,
    PlanPriceController,
    GalleryController,
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
    FeedbackController


};

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FrontController;



Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'home')->name('home');
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

        Route::get('mini-subcategories', [ProductMiniSubCategoryController::class, 'index'])->name('minisubcategories.index');
        Route::get('mini-subcategories/create', [ProductMiniSubCategoryController::class, 'create'])->name('minisubcategories.create');
        Route::post('mini-subcategories', [ProductMiniSubCategoryController::class, 'store'])->name('minisubcategories.store');
        Route::get('mini-subcategories/{minisubcategory}/edit', [ProductMiniSubCategoryController::class, 'edit'])->name('minisubcategories.edit');
        Route::put('mini-subcategories/{minisubcategory}', [ProductMiniSubCategoryController::class, 'update'])->name('minisubcategories.update');
        Route::delete('mini-subcategories/{minisubcategory}', [ProductMiniSubCategoryController::class, 'destroy'])->name('minisubcategories.destroy');
        Route::get('mini-subcategories/get-subcategories', [ProductMiniSubCategoryController::class, 'getSubCategories'])->name('minisubcategories.getSubCategories');

        Route::get('products', [ProductController::class, 'index'])->name('products.index');
        Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('products', [ProductController::class, 'store'])->name('products.store');
        Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        Route::get('products/get-subcategories', [ProductController::class, 'getSubCategories'])->name('products.getSubCategories');
        Route::get('products/get-minisubcategories', [ProductController::class, 'getMiniSubCategories'])->name('products.getMiniSubCategories');

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

        Route::prefix('client-gallery')->name('client-gallery.')->group(function () {
            Route::get('/', [GalleryController::class, 'index'])->name('index');
            Route::get('create', [GalleryController::class, 'create'])->name('create');
            Route::post('/', [GalleryController::class, 'store'])->name('store');
            Route::get('{gallery}/edit', [GalleryController::class, 'edit'])->name('edit');
            Route::put('{gallery}', [GalleryController::class, 'update'])->name('update');
            Route::delete('{gallery}', [GalleryController::class, 'destroy'])->name('destroy');
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

    });
});