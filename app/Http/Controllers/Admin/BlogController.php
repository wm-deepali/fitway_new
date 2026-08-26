<?php
// app/Http/Controllers/Admin/BlogController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::query();

        if ($request->filled('search')) {
            $query->where('blog', 'like', '%' . $request->search . '%');
        }

        $sortable = ['id', 'blog', 'date_of_blog', 'status'];
        $sortBy = in_array($request->sort_by, $sortable) ? $request->sort_by : 'id';
        $sortOrder = $request->sort_order === 'asc' ? 'asc' : 'desc';

        $blogs = $query->orderBy($sortBy, $sortOrder)->paginate(15)->withQueryString();

        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'blog' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
            'date_of_blog' => 'required|date',
        ]);

        $imagePath = $request->file('image')->store('blog', 'public');

        Blog::create([
            'blog' => $request->blog,
            'slug' => Blog::generateUniqueSlug($request->blog),
            'image' => $imagePath,
            'date_of_blog' => $request->date_of_blog,
            'status' => $request->boolean('status', true),
        ]);

        return redirect()->route('admin.blogs.index')
            ->with('successmessage', 'Blog Saved Successfully');
    }

    public function edit(Request $request, Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $this->validate($request, [
            'blog' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
            'date_of_blog' => 'required|date',
        ], [
            'blog.required' => 'Blog field is required',
            'date_of_blog.required' => 'Date of blog field is required',
        ]);

        $data = [
            'blog' => $request->blog,
            'slug' => Blog::generateUniqueSlug($request->blog, $blog->id),
            'date_of_blog' => $request->date_of_blog,
            'status' => $request->boolean('status', true),
        ];

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $data['image'] = $request->file('image')->store('blog', 'public');
        }

        $blog->update($data);

        $redirectTo = $request->input('redirect') ?: route('admin.blogs.index');

        return redirect($redirectTo)->with('successmessage', 'Blog Updated Successfully');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return response()->json([
            'success' => true,
            'message' => 'Blog Deleted Successfully',
        ]);
    }
}