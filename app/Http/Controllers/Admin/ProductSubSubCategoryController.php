<?php
// app/Http/Controllers/Admin/ProductSubSubCategoryController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductSubSubCategory;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductSubSubCategoryController extends Controller
{

    public function index(Request $request)
    {
        $query = ProductSubSubCategory::with(['category', 'subCategory'])
            ->withCount(['products as unique_products_count']);

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('sub_category_id')) {
            $query->where('sub_category_id', $request->sub_category_id);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $sortable = ['id', 'name', 'status'];
        $sortBy = in_array($request->sort_by, $sortable) ? $request->sort_by : 'id';
        $sortOrder = $request->sort_order === 'asc' ? 'asc' : 'desc';

        $query->orderBy($sortBy, $sortOrder);

        $subSubCategories = $query->paginate(15)->withQueryString();
        $parentCategories = ProductCategory::active()->orderBy('category_name')->get();
        $subCategories = ProductSubCategory::active()
            ->when($request->filled('category_id'), fn ($q) => $q->where('category_id', $request->category_id))
            ->orderBy('name')
            ->get();

        return view('admin.subsubcategory.index', compact('subSubCategories', 'parentCategories', 'subCategories'));
    }

    public function create()
    {
        $parentCategories = ProductCategory::active()->orderBy('category_name')->get();

        return view('admin.subsubcategory.create', compact('parentCategories'));
    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'category_id'     => 'required|exists:product_categories,id',
            'sub_cat_id' => 'required|exists:product_sub_categories,id',
            'name'             => 'required|string|max:255',
            'image'            => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
            'meta_title'       => 'nullable|string|max:255',
            'meta_keywords'    => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $imagePath = $request->file('image')->store('sub-sub-categories', 'public');

        ProductSubSubCategory::create([
            'category_id'       => $request->category_id,
            'sub_category_id'   => $request->sub_cat_id,
            'name'               => $request->name,
            'slug'               => ProductSubSubCategory::generateUniqueSlug($request->name),
            'image'              => $imagePath,
            'status'             => $request->boolean('status', true),
            'meta_title'         => $request->meta_title,
            'meta_keywords'      => $request->meta_keywords,
            'meta_description'   => $request->meta_description,
        ]);

        return redirect()->route('admin.subsubcategories.index')
            ->with('successmessage', 'Sub Sub Category Saved Successfully');
    }

    public function edit(Request $request, ProductSubSubCategory $subsubcategory)
    {
        $parentCategories = ProductCategory::active()->orderBy('category_name')->get();
        $subCategories = ProductSubCategory::active()
            ->where('category_id', $subsubcategory->category_id)
            ->orderBy('name')
            ->get();

        return view('admin.subsubcategory.edit', compact('subsubcategory', 'parentCategories', 'subCategories'));
    }

    public function update(Request $request, ProductSubSubCategory $subsubcategory)
    {
        $this->validate($request, [
            'category_id'     => 'required|exists:product_categories,id',
            'sub_cat_id' => 'required|exists:product_sub_categories,id',
            'name'             => 'required|string|max:255',
            'image'            => 'nullable|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
            'meta_title'       => 'nullable|string|max:255',
            'meta_keywords'    => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);
        $data = [
            'category_id'      => $request->category_id,
            'sub_category_id'  => $request->sub_cat_id,
            'name'              => $request->name,
            'slug'              => ProductSubSubCategory::generateUniqueSlug($request->name, $subsubcategory->id),
            'status'            => $request->boolean('status', true),
            'meta_title'        => $request->meta_title,
            'meta_keywords'     => $request->meta_keywords,
            'meta_description'  => $request->meta_description,
        ];

        if ($request->hasFile('image')) {
            if ($subsubcategory->image) {
                Storage::disk('public')->delete($subsubcategory->image);
            }
            $data['image'] = $request->file('image')->store('sub-sub-categories', 'public');
        }


        $subsubcategory->update($data);

        $redirectTo = $request->input('redirect') ?: route('admin.subsubcategories.index');

        return redirect($redirectTo)->with('successmessage', 'Sub Sub Category Updated Successfully');
    }

    public function destroy(ProductSubSubCategory $subsubcategory)
    {
        if ($subsubcategory->image) {
            Storage::disk('public')->delete($subsubcategory->image);
        }

        $subsubcategory->delete();

        return response()->json([
            'success' => true,
            'message' => 'Sub Sub Category Deleted Successfully',
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