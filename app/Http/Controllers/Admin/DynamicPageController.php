<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DynamicPage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class DynamicPageController extends Controller
{
    public function index(Request $request)
    {
        $query = DynamicPage::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $sortBy    = $request->get('sort_by', 'id');
        $sortOrder = $request->get('sort_order', 'desc');

        $allowedSorts = ['id', 'title', 'status', 'created_at'];
        if (!in_array($sortBy, $allowedSorts)) {
            $sortBy = 'id';
        }

        $pages = $query->orderBy($sortBy, $sortOrder)
            ->paginate(15)
            ->withQueryString();

        return view('admin.dynamic-pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.dynamic-pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'             => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255|unique:dynamic_pages,slug',
            'content'           => 'nullable|string',
            'meta_title'        => 'nullable|string|max:255',
            'meta_keywords'     => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string',
            'status'            => 'required|boolean',
        ]);

        DynamicPage::create([
            'title'             => $request->title,
            'slug'              => $request->slug ? Str::slug($request->slug) : Str::slug($request->title),
            'content'           => $request->content,
            'meta_title'        => $request->meta_title,
            'meta_keywords'     => $request->meta_keywords,
            'meta_description'  => $request->meta_description,
            'status'            => $request->status,
        ]);

        return redirect()
            ->route('admin.dynamic-pages.index')
            ->with('success', 'Page created successfully.');
    }

    public function edit(DynamicPage $dynamicPage)
    {
        return view('admin.dynamic-pages.edit', ['page' => $dynamicPage]);
    }

    public function update(Request $request, DynamicPage $dynamicPage)
    {
        $request->validate([
            'title'             => 'required|string|max:255',
            'slug'              => [
                'nullable', 'string', 'max:255',
                Rule::unique('dynamic_pages', 'slug')->ignore($dynamicPage->id),
            ],
            'content'           => 'nullable|string',
            'meta_title'        => 'nullable|string|max:255',
            'meta_keywords'     => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string',
            'status'            => 'required|boolean',
        ]);

        $dynamicPage->update([
            'title'             => $request->title,
            'slug'              => $request->slug ? Str::slug($request->slug) : Str::slug($request->title),
            'content'           => $request->content,
            'meta_title'        => $request->meta_title,
            'meta_keywords'     => $request->meta_keywords,
            'meta_description'  => $request->meta_description,
            'status'            => $request->status,
        ]);

        return redirect()
            ->route('admin.dynamic-pages.index')
            ->with('success', 'Page updated successfully.');
    }

    public function destroy(DynamicPage $dynamicPage)
    {
        $dynamicPage->delete();

        return response()->json([
            'message' => 'Page deleted successfully.',
        ]);
    }
}