<?php
// app/Http/Controllers/Admin/ProductController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductMiniSubCategory;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'subCategory', 'miniSubCategory']);

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('sub_cat_id')) {
            $query->where('sub_cat_id', $request->sub_cat_id);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $sortable = ['id', 'name', 'new_price', 'status'];
        $sortBy = in_array($request->sort_by, $sortable) ? $request->sort_by : 'id';
        $sortOrder = $request->sort_order === 'asc' ? 'asc' : 'desc';

        $query->orderBy($sortBy, $sortOrder);

        $products = $query->paginate(15)->withQueryString();
        $parentCategories = ProductCategory::active()->orderBy('category_name')->get();
        $subCategories = ProductSubCategory::active()
            ->when($request->filled('category_id'), fn ($q) => $q->where('category_id', $request->category_id))
            ->orderBy('name')
            ->get();

        return view('admin.products.index', compact('products', 'parentCategories', 'subCategories'));
    }

    public function create()
    {
        $parentCategories = ProductCategory::active()->orderBy('category_name')->get();

        return view('admin.products.create', compact('parentCategories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id'      => 'required|exists:product_categories,id',
            'sub_cat_id'        => 'nullable|exists:product_sub_categories,id',
            'mini_sub_cat_id'   => 'nullable|exists:product_mini_sub_categories,id',
            'name'              => 'required|string|max:255',
            'previous_price'    => 'nullable|numeric',
            'new_price'         => 'nullable|numeric',
            'description'       => 'required|string',
            'image'             => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
            'meta_title'       => 'nullable|string|max:255',
            'meta_keywords'    => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $imagePath = $request->file('image')->store('products', 'public');

        Product::create([
            'category_id'       => $request->category_id,
            'sub_cat_id'         => $request->sub_cat_id,
            'mini_sub_cat_id'    => $request->mini_sub_cat_id,
            'name'               => $request->name,
            'slug'               => Product::generateUniqueSlug($request->name),
            'previous_price'     => $request->previous_price,
            'new_price'          => $request->new_price,
            'description'        => $request->description,
            'image'              => $imagePath,
            'status'             => $request->boolean('status', true),
            'meta_title'         => $request->meta_title,
            'meta_keywords'      => $request->meta_keywords,
            'meta_description'   => $request->meta_description,
        ]);

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
        $miniSubCategories = ProductMiniSubCategory::active()
            ->where('sub_cat_id', $product->sub_cat_id)
            ->orderBy('name')
            ->get();

        return view('admin.products.edit', compact('product', 'parentCategories', 'subCategories', 'miniSubCategories'));
    }

    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'category_id'      => 'required|exists:product_categories,id',
            'sub_cat_id'        => 'nullable|exists:product_sub_categories,id',
            'mini_sub_cat_id'   => 'nullable|exists:product_mini_sub_categories,id',
            'name'              => 'required|string|max:255',
            'previous_price'    => 'nullable|numeric',
            'new_price'         => 'nullable|numeric',
            'description'       => 'required|string',
            'image'             => 'nullable|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
            'meta_title'       => 'nullable|string|max:255',
            'meta_keywords'    => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $data = [
            'category_id'       => $request->category_id,
            'sub_cat_id'         => $request->sub_cat_id,
            'mini_sub_cat_id'    => $request->mini_sub_cat_id,
            'name'               => $request->name,
            'slug'               => Product::generateUniqueSlug($request->name, $product->id),
            'previous_price'     => $request->previous_price,
            'new_price'          => $request->new_price,
            'description'        => $request->description,
            'status'             => $request->boolean('status', true),
            'meta_title'         => $request->meta_title,
            'meta_keywords'      => $request->meta_keywords,
            'meta_description'   => $request->meta_description,
        ];

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
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
     * AJAX: mini sub-categories belonging to a sub-category.
     */
    public function getMiniSubCategories(Request $request)
    {
        $miniSubCategories = ProductMiniSubCategory::active()
            ->where('sub_cat_id', $request->sub_cat_id)
            ->orderBy('name')
            ->get(['id', 'name']);

        return response()->json([
            'success' => true,
            'data'    => $miniSubCategories,
        ]);
    }
}