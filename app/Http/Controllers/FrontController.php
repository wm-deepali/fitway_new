<?php

namespace App\Http\Controllers;
use App\Models\ProductCategory;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\Product;
use App\Models\ProductSubCategory;
use App\Models\ProductSubSubCategory;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\ContactUs;
use App\Models\ProductEnquiry;
use Illuminate\Support\Facades\Validator;
use App\Models\SetupMyGym;
use App\Models\PageQuoteRequest;
use App\Services\AdminMailer;
use App\Models\GeneralSetting;

class FrontController extends Controller
{
    public function home()
    {
        $productCategories = ProductCategory::active()
            ->with([
                'subCategories' => fn($q) => $q->active()
                    ->orderBy('id')
                    ->with(['subSubCategories' => fn($q2) => $q2->active()->orderBy('id')])
            ])
            ->orderBy('id')
            ->get();

        $portfolioCategories = PortfolioCategory::active()->orderBy('id')->get();
        $homePortfolios = Portfolio::with('category')->latest()->take(4)->get();

        return view('front.index', compact('productCategories', 'portfolioCategories', 'homePortfolios'));
    }

    public function products(Request $request, $category = null, $subCategory = null, $subSubCategory = null)
    {
        $categories = ProductCategory::active()
            ->with([
                'subCategories' => fn($q) => $q->active()->orderBy('id')->with([
                    'subSubCategories' => fn($q2) => $q2->active()->orderBy('id'),
                ])
            ])
            ->orderBy('id')
            ->get();

        $productsQuery = Product::active()
            ->where('source_type', 'catalog')
            ->with(['category', 'subCategory', 'subSubCategory']);

        $selectedCategory = null;
        if ($category) {
            $selectedCategory = ProductCategory::active()->where('slug', $category)->firstOrFail();
            $productsQuery->where('category_id', $selectedCategory->id);
        }

        $selectedSubCategory = null;
        if ($subCategory) {
            $selectedSubCategory = ProductSubCategory::active()
                ->where('slug', $subCategory)
                ->where('category_id', $selectedCategory->id ?? null)
                ->firstOrFail();
            $productsQuery->where('sub_cat_id', $selectedSubCategory->id);
        }

        $selectedSubSubCategory = null;
        if ($subSubCategory) {
            $selectedSubSubCategory = ProductSubSubCategory::active()
                ->where('slug', $subSubCategory)
                ->where('sub_category_id', $selectedSubCategory->id ?? null)
                ->firstOrFail();
            $productsQuery->where('sub_sub_cat_id', $selectedSubSubCategory->id);
        }

        // --- Search ---
        if ($request->filled('search')) {
            $search = $request->input('search');
            $productsQuery->where('name', 'like', '%' . $search . '%');
        }

        // --- Sort ---
        switch ($request->input('sort')) {
            case 'newest':
                $productsQuery->latest();
                break;
            case 'az':
                $productsQuery->orderBy('name', 'asc');
                break;
            case 'za':
                $productsQuery->orderBy('name', 'desc');
                break;
            default:
                $productsQuery->orderBy('id');
                break;
        }
        $products = $productsQuery->paginate(12)->withQueryString();

        if ($request->ajax() || $request->wantsJson()) {
            $html = view('front.partials.product-cards-list', compact('products'))->render();

            return response()->json([
                'html' => $html,
                'nextPageUrl' => $products->nextPageUrl(),
            ]);
        }
        $activeSeoable = $selectedSubSubCategory ?? $selectedSubCategory ?? $selectedCategory;
        $seo = $this->resolvePageSeo($activeSeoable, $pageSeo ?? null);

        return view('front.products', compact(
            'categories',
            'products',
            'selectedCategory',
            'selectedSubCategory',
            'selectedSubSubCategory',
            'seo'
        ));

    }

    private function resolvePageSeo($activeSeoable, $pageSeo = null): array
    {
        $fallbackName = $activeSeoable?->category_name ?? $activeSeoable?->name;
        $globalSeo = $pageSeo->seo ?? null;

        return [
            'title' => $activeSeoable?->meta_title ?? $fallbackName ?? $globalSeo?->meta_title ?? 'Products | Fitway',
            'description' => $activeSeoable?->meta_description ?? $globalSeo?->meta_description ?? 'Browse Fitway commercial, home and outdoor gym equipment...',
            'h1' => $activeSeoable?->h1 ?? $fallbackName ?? $globalSeo?->h1 ?? 'OUR PRODUCTS',
            'canonical' => $activeSeoable?->canonical_url,
            'ogTitle' => $activeSeoable?->og_title ?? $activeSeoable?->meta_title ?? $fallbackName,
            'ogDescription' => $activeSeoable?->og_description ?? $activeSeoable?->meta_description,
            'ogImage' => $activeSeoable && method_exists($activeSeoable, 'getOgImageUrlAttribute')
                ? $activeSeoable->og_image_url
                : $activeSeoable?->image_url,
        ];
    }

    public function productDetail($slug)
    {
        $product = Product::active()
            ->where('source_type', 'catalog')
            ->with(['category', 'subCategory', 'subSubCategory'])
            ->where('slug', $slug)
            ->firstOrFail();

        // For now: single image wrapped as a collection.
        // Future: replace this line with $product->images (a hasMany relation)
        // once a product_images table exists — blade below needs NO changes.
        $productImages = collect([
            (object) [
                'url' => $product->image_url,
                'alt' => $product->image_alt,
            ],
        ]);

        $relatedProducts = Product::active()
            ->where('source_type', 'catalog')
            ->with(['category', 'subCategory'])
            ->where('category_id', $product->category_id)
            ->orderBy('id')
            ->take(6)
            ->get();

        $generalSettings = GeneralSetting::first();

        return view('front.product-detail', compact('product', 'productImages', 'relatedProducts', 'generalSettings'));
    }

    public function blogs()
    {
        $blogs = Blog::active()->latest('date_of_blog')->get();

        return view('front.blogs', compact('blogs'));
    }

    public function blogDetail(Blog $blog)
    {
        $moreBlogs = Blog::active()
            ->where('id', '!=', $blog->id)
            ->latest('date_of_blog')
            ->take(4)
            ->get();

        return view('front.blog-details', compact('blog', 'moreBlogs'));
    }

    public function faqs()
    {
        $faqs = Faq::active()->ordered()->get();

        return view('front.faqs', compact('faqs'));
    }

    public function contactUs()
    {
        return view('front.contact');
    }

    public function contactStore(Request $request)
    {
        $validated = $request->validate([
            'fullName' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:20',
            'emailAddress' => 'nullable|email|max:255',
            'interest' => 'nullable|array',
            'message' => 'nullable|string',
        ]);

        ContactUs::create([
            'name' => $validated['fullName'],
            'email_id' => $validated['emailAddress'] ?? null,
            'mobile_number' => $validated['phoneNumber'],
            'interest' => $validated['interest'] ?? [],
            'message' => $validated['message'] ?? null,
        ]);

        AdminMailer::sendEnquiryAlert('Contact Us Form', [
            'Full Name' => $validated['fullName'],
            'Phone Number' => $validated['phoneNumber'],
            'Email' => $validated['emailAddress'] ?? null,
            'Interested In' => $validated['interest'] ?? [],
            'Message' => $validated['message'] ?? null,
        ]);

        return redirect()->route('thank-you', [
            'message' => 'Thanks for reaching out! Our team will get back to you shortly.',
        ]);
    }

    public function productEnquiryStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => ['required', 'exists:products,id'],
            'fullName' => ['required', 'string', 'max:255'],
            'mobileNumber' => ['required', 'string', 'max:20'],
            'emailId' => ['required', 'email', 'max:255'],
            'details' => ['nullable', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        ProductEnquiry::create([
            'product_id' => $data['product_id'],
            'name' => $data['fullName'],
            'email' => $data['emailId'],
            'phone' => $data['mobileNumber'],
            'details' => $data['details'] ?? null,
            'is_read' => false,
        ]);

        $product = Product::find($data['product_id']);

        AdminMailer::sendEnquiryAlert('Product Enquiry Form', [
            'Product' => $product->name ?? "#{$data['product_id']}",
            'Full Name' => $data['fullName'],
            'Mobile Number' => $data['mobileNumber'],
            'Email' => $data['emailId'],
            'Details' => $data['details'] ?? null,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Your enquiry has been submitted.',
            'redirect' => route('thank-you', [
                'message' => 'Thanks for your enquiry! Our team will reach out to you shortly.',
            ]),
        ]);
    }

    public function setUpGymStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'FullName' => ['required', 'string', 'max:255'],
            'MobileNumber' => ['required', 'string', 'max:20'],
            'EmailID' => ['nullable', 'email', 'max:255'],
            'requirements' => ['nullable', 'array'],
            'requirements.*' => ['string', 'max:100'],
            'Message' => ['nullable', 'string', 'max:2000'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        SetupMyGym::create([
            'full_name' => $data['FullName'],
            'email' => $data['EmailID'] ?? null,
            'mobile_number' => $data['MobileNumber'],
            'requirements' => $data['requirements'] ?? [],
            'details' => $data['Message'] ?? null,
            'is_read' => false,
        ]);

        AdminMailer::sendEnquiryAlert('Setup My Gym Form', [
            'Full Name' => $data['FullName'],
            'Mobile Number' => $data['MobileNumber'],
            'Email' => $data['EmailID'] ?? null,
            'Requirements' => $data['requirements'] ?? [],
            'Message' => $data['Message'] ?? null,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Your enquiry has been submitted.',
            'redirect' => route('thank-you', [
                'message' => 'Thanks for your enquiry! Our team will reach out to you shortly.',
            ]),
        ]);
    }

    public function pageQuoteRequestStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'FullName' => ['required', 'string', 'max:255'],
            'MobileNumber' => ['required', 'string', 'max:20'],
            'EmailID' => ['nullable', 'email', 'max:255'],
            'PageID' => ['nullable', 'string', 'max:255'],
            'Message' => ['nullable', 'string', 'max:2000'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        PageQuoteRequest::create([
            'full_name' => $data['FullName'],
            'email' => $data['EmailID'] ?? null,
            'mobile_number' => $data['MobileNumber'],
            'page_id' => $data['PageID'] ?? null,
            'details' => $data['Message'] ?? null,
            'is_read' => false,
        ]);

        AdminMailer::sendEnquiryAlert('Page Quote Request Form', [
            'Full Name' => $data['FullName'],
            'Mobile Number' => $data['MobileNumber'],
            'Email' => $data['EmailID'] ?? null,
            'Page' => $data['PageID'] ?? null,
            'Message' => $data['Message'] ?? null,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Your enquiry has been submitted.',
            'redirect' => route('thank-you', [
                'message' => 'Thanks for your enquiry! Our team will reach out to you shortly.',
            ]),
        ]);
    }

    public function thankYou()
    {
        return view('front.thanks');
    }

    public function portfolio()
    {
        return view('front.portfolio');
    }

    public function aboutUs()
    {
        return view('front.about');
    }

    public function commercialGymSetup()
    {
        return view('front.commercial-gym-setup');
    }

    public function homeGymSetup()
    {
        return view('front.home-gym-setup');
    }

    public function corporateGymSetup()
    {
        return view('front.corporate-gym-setup');
    }

    public function outdoorGymSetup()
    {
        return view('front.outdoor-gym-setup');
    }

    public function resortsGymSetup()
    {
        return view('front.resorts-gym-setup');
    }
}