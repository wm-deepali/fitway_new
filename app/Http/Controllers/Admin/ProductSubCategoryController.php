<?php
// app/Http/Controllers/Admin/ProductSubCategoryController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductSubCategoryController extends Controller
{
    
    public function index(Request $request)
    {
        $query = ProductSubCategory::with('category')
            ->withCount(['products as unique_products_count']);

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $sortable = ['id', 'name', 'status'];
        $sortBy = $request->sort_by === 'name' ? 'name' : (in_array($request->sort_by, $sortable) ? $request->sort_by : 'id');
        $sortOrder = $request->sort_order === 'asc' ? 'asc' : 'desc';

        $query->orderBy($sortBy, $sortOrder);

        $subCategories = $query->paginate(15)->withQueryString();
        $parentCategories = ProductCategory::active()->orderBy('category_name')->get();

        return view('admin.subcategory.index', compact('subCategories', 'parentCategories'));
    }

    public function create()
    {
        $parentCategories = ProductCategory::active()->orderBy('category_name')->get();

        return view('admin.subcategory.create', compact('parentCategories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|exists:product_categories,id',
            'name'        => 'required|string|max:255',
            'image'       => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
            'meta_title'       => 'nullable|string|max:255',
            'meta_keywords'    => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $imagePath = $request->file('image')->store('subcategories', 'public');

        ProductSubCategory::create([
            'category_id'        => $request->category_id,
            'name'                => $request->name,
            'slug'                => ProductSubCategory::generateUniqueSlug($request->name),
            'image'               => $imagePath,
            'status'              => $request->boolean('status', true),
            'meta_title'          => $request->meta_title,
            'meta_keywords'       => $request->meta_keywords,
            'meta_description'    => $request->meta_description,
        ]);

        return redirect()->route('admin.subcategories.index')
            ->with('successmessage', 'Sub Category Saved Successfully');
    }

    public function edit(Request $request, ProductSubCategory $subcategory)
    {
        $parentCategories = ProductCategory::active()->orderBy('category_name')->get();

        return view('admin.subcategory.edit', compact('subcategory', 'parentCategories'));
    }

    public function update(Request $request, ProductSubCategory $subcategory)
    {
        $this->validate($request, [
            'category_id' => 'required|exists:product_categories,id',
            'name'        => 'required|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
            'meta_title'       => 'nullable|string|max:255',
            'meta_keywords'    => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $data = [
            'category_id'      => $request->category_id,
            'name'              => $request->name,
            'slug'              => ProductSubCategory::generateUniqueSlug($request->name, $subcategory->id),
            'status'            => $request->boolean('status', true),
            'meta_title'        => $request->meta_title,
            'meta_keywords'     => $request->meta_keywords,
            'meta_description'  => $request->meta_description,
        ];

        if ($request->hasFile('image')) {
            if ($subcategory->image) {
                Storage::disk('public')->delete($subcategory->image);
            }
            $data['image'] = $request->file('image')->store('subcategories', 'public');
        }

        $subcategory->update($data);

        $redirectTo = $request->input('redirect') ?: route('admin.subcategories.index');

        return redirect($redirectTo)->with('successmessage', 'Sub Category Updated Successfully');
    }

    public function destroy(ProductSubCategory $subcategory)
    {
        if ($subcategory->image) {
            Storage::disk('public')->delete($subcategory->image);
        }

        $subcategory->delete();

        return response()->json([
            'success' => true,
            'message' => 'Sub Category Deleted Successfully',
        ]);
    }
}