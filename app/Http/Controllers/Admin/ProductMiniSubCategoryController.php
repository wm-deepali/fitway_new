<?php
// app/Http/Controllers/Admin/ProductMiniSubCategoryController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductMiniSubCategory;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductMiniSubCategoryController extends Controller
{

    public function index(Request $request)
    {
        $query = ProductMiniSubCategory::with(['category', 'subCategory'])
            ->withCount(['products as unique_products_count']);

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('sub_cat_id')) {
            $query->where('sub_cat_id', $request->sub_cat_id);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $sortable = ['id', 'name', 'status'];
        $sortBy = in_array($request->sort_by, $sortable) ? $request->sort_by : 'id';
        $sortOrder = $request->sort_order === 'asc' ? 'asc' : 'desc';

        $query->orderBy($sortBy, $sortOrder);

        $miniSubCategories = $query->paginate(15)->withQueryString();
        $parentCategories = ProductCategory::active()->orderBy('category_name')->get();
        $subCategories = ProductSubCategory::active()
            ->when($request->filled('category_id'), fn ($q) => $q->where('category_id', $request->category_id))
            ->orderBy('name')
            ->get();

        return view('admin.minisubcategory.index', compact('miniSubCategories', 'parentCategories', 'subCategories'));
    }

    public function create()
    {
        $parentCategories = ProductCategory::active()->orderBy('category_name')->get();

        return view('admin.minisubcategory.create', compact('parentCategories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|exists:product_categories,id',
            'sub_cat_id'  => 'required|exists:product_sub_categories,id',
            'name'        => 'required|string|max:255',
            'image'       => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
            'meta_title'       => 'nullable|string|max:255',
            'meta_keywords'    => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $imagePath = $request->file('image')->store('mini-subcategories', 'public');

        ProductMiniSubCategory::create([
            'category_id'       => $request->category_id,
            'sub_cat_id'         => $request->sub_cat_id,
            'name'               => $request->name,
            'slug'               => ProductMiniSubCategory::generateUniqueSlug($request->name),
            'image'              => $imagePath,
            'status'             => $request->boolean('status', true),
            'meta_title'         => $request->meta_title,
            'meta_keywords'      => $request->meta_keywords,
            'meta_description'   => $request->meta_description,
        ]);

        return redirect()->route('admin.minisubcategories.index')
            ->with('successmessage', 'Mini Sub Category Saved Successfully');
    }

    public function edit(Request $request, ProductMiniSubCategory $minisubcategory)
    {
        $parentCategories = ProductCategory::active()->orderBy('category_name')->get();
        $subCategories = ProductSubCategory::active()
            ->where('category_id', $minisubcategory->category_id)
            ->orderBy('name')
            ->get();

        return view('admin.minisubcategory.edit', compact('minisubcategory', 'parentCategories', 'subCategories'));
    }

    public function update(Request $request, ProductMiniSubCategory $minisubcategory)
    {
        $this->validate($request, [
            'category_id' => 'required|exists:product_categories,id',
            'sub_cat_id'  => 'required|exists:product_sub_categories,id',
            'name'        => 'required|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
            'meta_title'       => 'nullable|string|max:255',
            'meta_keywords'    => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $data = [
            'category_id'      => $request->category_id,
            'sub_cat_id'        => $request->sub_cat_id,
            'name'              => $request->name,
            'slug'              => ProductMiniSubCategory::generateUniqueSlug($request->name, $minisubcategory->id),
            'status'            => $request->boolean('status', true),
            'meta_title'        => $request->meta_title,
            'meta_keywords'     => $request->meta_keywords,
            'meta_description'  => $request->meta_description,
        ];

        if ($request->hasFile('image')) {
            if ($minisubcategory->image) {
                Storage::disk('public')->delete($minisubcategory->image);
            }
            $data['image'] = $request->file('image')->store('mini-subcategories', 'public');
        }

        $minisubcategory->update($data);

        $redirectTo = $request->input('redirect') ?: route('admin.minisubcategories.index');

        return redirect($redirectTo)->with('successmessage', 'Mini Sub Category Updated Successfully');
    }

    public function destroy(ProductMiniSubCategory $minisubcategory)
    {
        if ($minisubcategory->image) {
            Storage::disk('public')->delete($minisubcategory->image);
        }

        $minisubcategory->delete();

        return response()->json([
            'success' => true,
            'message' => 'Mini Sub Category Deleted Successfully',
        ]);
    }

    /**
     * AJAX: sub-categories belonging to a category, for the dependent dropdown.
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
}