<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.client-gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.client-gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);

        Gallery::create(['name' => $request->name]);

        return redirect()->route('admin.client-gallery.index')->with('success', 'Gallery entry added successfully.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.client-gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate(['name' => 'required|string|max:255']);

        $gallery->update(['name' => $request->name]);

        return redirect()->route('admin.client-gallery.index')->with('success', 'Gallery entry updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return redirect()->back()->with('success', 'Gallery entry deleted successfully.');
    }
}