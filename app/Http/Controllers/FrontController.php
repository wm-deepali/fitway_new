<?php

namespace App\Http\Controllers;
use App\Models\ProductCategory;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\Product;
use App\Models\ProductSubCategory;
use App\Models\ProductSubSubCategory;
use Illuminate\Http\Request;


class FrontController extends Controller
{
 public function home()
{
    $productCategories = ProductCategory::active()
        ->with(['subCategories' => fn($q) => $q->active()
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

        $productsQuery = Product::active()->with(['category', 'subCategory', 'subSubCategory']);

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

        return view('front.products', compact(
            'categories',
            'products',
            'selectedCategory',
            'selectedSubCategory',
            'selectedSubSubCategory'
        ));
    }

    public function productDetail($slug)
    {
        $product = Product::active()
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
            ->with(['category', 'subCategory'])
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->orderBy('id')
            ->take(6)
            ->get();

        return view('front.product-detail', compact('product', 'productImages', 'relatedProducts'));
    }

    public function aboutUs()
    {
        return view('front.about');
    }

    public function blogs()
    {
        return view('front.blogs');
    }

    public function faqs()
    {
        return view('front.faqs');
    }

    public function contactUs()
    {
        return view('front.contact');
    }


    public function cart()
    {
        return view('front.cart');
    }

    public function thankYou()
    {
        return view('front.thanks');
    }

    public function portfolio()
    {
        return view('front.portfolio');
    }


    public function blogDetail()
    {
        return view('front.blog-details');
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