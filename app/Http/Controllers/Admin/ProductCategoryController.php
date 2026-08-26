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
            'category_name'     => 'required|string|max:255',
            'short_description' => 'nullable|string|max:1000',
            'image'              => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
            'banner_type'        => 'required|in:image,video',
            'banner_image'       => 'required_if:banner_type,image|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
            'banner_video'       => 'required_if:banner_type,video|mimes:mp4,mov,avi,webm|max:51200',
            'meta_title'         => 'nullable|string|max:255',
            'meta_keywords'      => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string',
        ]);

        $imagePath = $request->file('image')->store('categories', 'public');

        $bannerPath = $request->boolean('banner_type') === false && $request->banner_type === 'video'
            ? null
            : null; // placeholder, overwritten below

        if ($request->banner_type === 'video') {
            $bannerPath = $request->file('banner_video')->store('categories/banners', 'public');
        } else {
            $bannerPath = $request->file('banner_image')->store('categories/banners', 'public');
        }

        ProductCategory::create([
            'category_name'     => $request->category_name,
            'slug'               => ProductCategory::generateUniqueSlug($request->category_name),
            'short_description' => $request->short_description,
            'image'              => $imagePath,
            'banner_type'        => $request->banner_type,
            'banner'             => $bannerPath,
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
            'category_name'     => 'required|string|max:255',
            'short_description' => 'nullable|string|max:1000',
            'image'              => 'nullable|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
            'banner_type'        => 'required|in:image,video',
            'banner_image'       => 'nullable|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
            'banner_video'       => 'nullable|mimes:mp4,mov,avi,webm|max:51200',
            'meta_title'         => 'nullable|string|max:255',
            'meta_keywords'      => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string',
        ]);

        $data = [
            'category_name'     => $request->category_name,
            'slug'               => ProductCategory::generateUniqueSlug($request->category_name, $category->id),
            'short_description' => $request->short_description,
            'banner_type'        => $request->banner_type,
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

        if ($request->banner_type === 'video' && $request->hasFile('banner_video')) {
            if ($category->banner) {
                Storage::disk('public')->delete($category->banner);
            }
            $data['banner'] = $request->file('banner_video')->store('categories/banners', 'public');
        } elseif ($request->banner_type === 'image' && $request->hasFile('banner_image')) {
            if ($category->banner) {
                Storage::disk('public')->delete($category->banner);
            }
            $data['banner'] = $request->file('banner_image')->store('categories/banners', 'public');
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

        if ($category->banner) {
            Storage::disk('public')->delete($category->banner);
        }

        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category Deleted Successfully',
        ]);
    }
}