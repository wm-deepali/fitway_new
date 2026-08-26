<?php
// app/Http/Controllers/Admin/ProductCategoryController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductCategoryController extends Controller
{

    public function index(Request $request)
    {
        $query = ProductCategory::withCount(['products as unique_products_count']);

        if ($request->filled('search')) {
            $query->where('category_name', 'like', '%' . $request->search . '%');
        }

        $sortable = ['id', 'category_name', 'status'];
        $sortBy = in_array($request->sort_by, $sortable) ? $request->sort_by : 'id';
        $sortOrder = $request->sort_order === 'asc' ? 'asc' : 'desc';

        // map "name" column used in the view's sortUrl() calls to the real column
        if ($request->sort_by === 'name') {
            $sortBy = 'category_name';
        }

        $query->orderBy($sortBy, $sortOrder);

        $categories = $query->paginate(15)->withQueryString();

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required|string|max:255',
            'image'         => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
            'meta_title'       => 'nullable|string|max:255',
            'meta_keywords'    => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $imagePath = $request->file('image')->store('categories', 'public');

        ProductCategory::create([
            'category_name'     => $request->category_name,
            'slug'               => ProductCategory::generateUniqueSlug($request->category_name),
            'image'              => $imagePath,
            'premium'            => $request->input('premium') ?: 'normal',
            'status'             => $request->boolean('status', true),
            'meta_title'         => $request->meta_title,
            'meta_keywords'      => $request->meta_keywords,
            'meta_description'   => $request->meta_description,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('successmessage', 'Category Saved Successfully');
    }

    public function edit(Request $request, ProductCategory $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, ProductCategory $category)
    {
        $this->validate($request, [
            'category_name' => 'required|string|max:255',
            'image'         => 'nullable|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
            'meta_title'       => 'nullable|string|max:255',
            'meta_keywords'    => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $data = [
            'category_name'     => $request->category_name,
            'slug'               => ProductCategory::generateUniqueSlug($request->category_name, $category->id),
            'premium'            => $request->input('premium') ?: 'normal',
            'status'             => $request->boolean('status', true),
            'meta_title'         => $request->meta_title,
            'meta_keywords'      => $request->meta_keywords,
            'meta_description'   => $request->meta_description,
        ];

        if ($request->hasFile('image')) {
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        $category->update($data);

        $redirectTo = $request->input('redirect') ?: route('admin.categories.index');

        return redirect($redirectTo)->with('successmessage', 'Category Updated Successfully');
    }

    public function destroy(ProductCategory $category)
    {
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category Deleted Successfully',
        ]);
    }
}