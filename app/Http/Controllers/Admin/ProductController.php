<?php
// app/Http/Controllers/Admin/ProductController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubSubCategory;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'subCategory', 'subSubCategory']);

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('sub_cat_id')) {
            $query->where('sub_cat_id', $request->sub_cat_id);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $sortable = ['id', 'name', 'offered_price', 'status'];
        $sortBy = in_array($request->sort_by, $sortable) ? $request->sort_by : 'id';
        $sortOrder = $request->sort_order === 'asc' ? 'asc' : 'desc';

        $query->orderBy($sortBy, $sortOrder);

        $products = $query->paginate(15)->withQueryString();
        $parentCategories = ProductCategory::active()->orderBy('category_name')->get();
        $subCategories = ProductSubCategory::active()
            ->when($request->filled('category_id'), fn ($q) => $q->where('category_id', $request->category_id))
            ->orderBy('name')
            ->get();

        return view('admin.product.index', compact('products', 'parentCategories', 'subCategories'));
    }

    public function create()
    {
        $parentCategories = ProductCategory::active()->orderBy('category_name')->get();

        return view('admin.product.create', compact('parentCategories'));
    }

    public function store(Request $request)
    {
        $validated = $this->validate($request, $this->rules());

        $imagePath = $request->file('image')->store('products', 'public');

        $data = [
            'category_id'      => $validated['category_id'],
            'sub_cat_id'        => $validated['sub_cat_id'] ?? null,
            'sub_sub_cat_id'    => $validated['sub_sub_cat_id'] ?? null,
            'name'              => $validated['name'],
            'slug'              => Product::generateUniqueSlug($validated['name']),
            'mrp'               => $validated['mrp'] ?? null,
            'discount_type'     => $validated['discount_type'] ?? null,
            'discount_value'    => $validated['discount_value'] ?? null,
            'offered_price'     => $validated['offered_price'] ?? null,
            'purchase_price'    => $validated['purchase_price'] ?? null,
            'description'       => $validated['description'],
            'image'             => $imagePath,
            'status'            => $request->boolean('status', true),
            'meta_title'        => $validated['meta_title'] ?? null,
            'meta_description'  => $validated['meta_description'] ?? null,
            'h1'                => $validated['h1'] ?? null,
            'og_title'          => $validated['og_title'] ?? null,
            'og_description'    => $validated['og_description'] ?? null,
            'canonical_url'     => $validated['canonical_url'] ?? null,
        ];

        if ($request->hasFile('og_image')) {
            $data['og_image'] = $request->file('og_image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.products.index')
            ->with('successmessage', 'Product Saved Successfully');
    }

    public function edit(Request $request, Product $product)
    {
        $parentCategories = ProductCategory::active()->orderBy('category_name')->get();
        $subCategories = ProductSubCategory::active()
            ->where('category_id', $product->category_id)
            ->orderBy('name')
            ->get();
        $subSubCategories = ProductSubSubCategory::active()
            ->where('sub_category_id', $product->sub_cat_id)
            ->orderBy('name')
            ->get();

        return view('admin.product.edit', compact('product', 'parentCategories', 'subCategories', 'subSubCategories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $this->validate($request, $this->rules($product->id));

        $data = [
            'category_id'      => $validated['category_id'],
            'sub_cat_id'        => $validated['sub_cat_id'] ?? null,
            'sub_sub_cat_id'    => $validated['sub_sub_cat_id'] ?? null,
            'name'              => $validated['name'],
            'slug'              => Product::generateUniqueSlug($validated['name'], $product->id),
            'mrp'               => $validated['mrp'] ?? null,
            'discount_type'     => $validated['discount_type'] ?? null,
            'discount_value'    => $validated['discount_value'] ?? null,
            'offered_price'     => $validated['offered_price'] ?? null,
            'purchase_price'    => $validated['purchase_price'] ?? null,
            'description'       => $validated['description'],
            'status'            => $request->boolean('status', true),
            'meta_title'        => $validated['meta_title'] ?? null,
            'meta_description'  => $validated['meta_description'] ?? null,
            'h1'                => $validated['h1'] ?? null,
            'og_title'          => $validated['og_title'] ?? null,
            'og_description'    => $validated['og_description'] ?? null,
            'canonical_url'     => $validated['canonical_url'] ?? null,
        ];

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        if ($request->hasFile('og_image')) {
            if ($product->og_image) {
                Storage::disk('public')->delete($product->og_image);
            }
            $data['og_image'] = $request->file('og_image')->store('products', 'public');
        }

        $product->update($data);

        $redirectTo = $request->input('redirect') ?: route('admin.products.index');

        return redirect($redirectTo)->with('successmessage', 'Product Updated Successfully');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        if ($product->og_image) {
            Storage::disk('public')->delete($product->og_image);
        }

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product Deleted Successfully',
        ]);
    }

    /**
     * AJAX: sub-categories belonging to a category.
     */
    public function getSubCategories(Request $request)
    {
        $subCategories = ProductSubCategory::active()
            ->where('category_id', $request->category_id)
            ->orderBy('name')
            ->get(['id', 'name']);

        return response()->json([
            'success' => true,
            'data'    => $subCategories,
        ]);
    }

    /**
     * AJAX: sub-sub-categories belonging to a sub-category.
     */
    public function getSubSubCategories(Request $request)
    {
        $subSubCategories = ProductSubSubCategory::active()
            ->where('sub_category_id', $request->sub_cat_id)
            ->orderBy('name')
            ->get(['id', 'name']);

        return response()->json([
            'success' => true,
            'data'    => $subSubCategories,
        ]);
    }

    private function rules(?int $productId = null): array
    {
        return [
            'category_id'      => 'required|exists:product_categories,id',
            'sub_cat_id'        => 'nullable|exists:product_sub_categories,id',
            'sub_sub_cat_id'    => 'nullable|exists:product_sub_sub_categories,id',
            'name'              => 'required|string|max:255',
            'mrp'               => 'nullable|numeric|min:0',
            'discount_type'     => 'nullable|in:flat,percentage',
            'discount_value'    => 'nullable|numeric|min:0',
            'offered_price'     => 'nullable|numeric|min:0',
            'purchase_price'    => 'nullable|numeric|min:0',
            'description'       => 'required|string',
            'image'             => ($productId ? 'nullable' : 'required') . '|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
            'meta_title'        => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string',
            'h1'                => 'nullable|string|max:255',
            'og_title'          => 'nullable|string|max:255',
            'og_description'    => 'nullable|string',
            'og_image'          => 'nullable|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
            'canonical_url'     => 'nullable|string|max:255',
        ];
    }
}