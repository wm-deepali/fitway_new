<?php
// app/Http/Controllers/Admin/BlogController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'blog' => 'required|string|max:255',
            'tag' => 'nullable|string|max:100',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,webp,svg|max:2048',
            'date_of_blog' => 'required|date',
            'status' => 'nullable|boolean',
            'meta_title' => 'nullable|string|max:255',
            'h1' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'canonical_url' => 'nullable|string|max:255',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string|max:500',
            'og_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp,svg|max:2048',
        ]);

        $validated['slug'] = Blog::generateUniqueSlug($validated['blog']);
        $validated['status'] = $request->boolean('status');
        $validated['image'] = $request->file('image')->store('blogs', 'public');

        if ($request->hasFile('og_image')) {
            $validated['og_image'] = $request->file('og_image')->store('blogs/og', 'public');
        }

        $validated = $this->applySeoFallbacks($validated);

        Blog::create($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully.');
    }

    public function edit(Request $request, Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'blog' => 'required|string|max:255',
            'tag' => 'nullable|string|max:100',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp,svg|max:2048',
            'date_of_blog' => 'required|date',
            'status' => 'nullable|boolean',
            'meta_title' => 'nullable|string|max:255',
            'h1' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'canonical_url' => 'nullable|string|max:255',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string|max:500',
            'og_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp,svg|max:2048',
        ]);

        if ($validated['blog'] !== $blog->blog) {
            $validated['slug'] = Blog::generateUniqueSlug($validated['blog'], $blog->id);
        }

        $validated['status'] = $request->boolean('status');

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $validated['image'] = $request->file('image')->store('blogs', 'public');
        }

        if ($request->hasFile('og_image')) {
            if ($blog->og_image) {
                Storage::disk('public')->delete($blog->og_image);
            }
            $validated['og_image'] = $request->file('og_image')->store('blogs/og', 'public');
        }

        $validated = $this->applySeoFallbacks($validated, $validated['slug'] ?? $blog->slug);

        $blog->update($validated);

        $redirect = $request->input('redirect', route('admin.blogs.index'));

        return redirect($redirect)->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        if ($blog->og_image) {
            Storage::disk('public')->delete($blog->og_image);
        }

        $blog->delete();

        return response()->json([
            'success' => true,
            'message' => 'Blog Deleted Successfully',
        ]);
    }

    /**
     * Server-side backstop for the admin form's JS auto-fill — fills any SEO
     * field left blank so a blog created via API/seeder/no-JS still gets sane values.
     */
    private function applySeoFallbacks(array $validated, ?string $slug = null): array
    {
        $metaTitle = $validated['meta_title'] ?: $validated['blog'];
        $metaDescription = $validated['meta_description']
            ?: Str::limit(strip_tags($validated['excerpt'] ?? ''), 155);

        $validated['meta_title'] = $metaTitle;
        $validated['h1'] = $validated['h1'] ?: $validated['blog'];
        $validated['meta_description'] = $metaDescription;
        $validated['canonical_url'] = $validated['canonical_url']
            ?: url('/blog/' . ($slug ?? $validated['slug']));
        $validated['og_title'] = $validated['og_title'] ?: $metaTitle;
        $validated['og_description'] = $validated['og_description'] ?: $metaDescription;

        return $validated;
    }
}