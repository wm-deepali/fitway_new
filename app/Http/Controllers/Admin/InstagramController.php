<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instagram;
use Illuminate\Http\Request;

class InstagramController extends Controller
{
    public function index()
    {
        $instagrams = Instagram::latest()->get();
        return view('admin.instagram.index', compact('instagrams'));
    }

    public function create()
    {
        return view('admin.instagram.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
        ]);

        $imageName = time() . rand(1, 100) . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('instagram'), $imageName);

        Instagram::create(['image' => $imageName]);

        return redirect()->route('admin.instagram.index')->with('success', 'Instagram image added successfully.');
    }

    public function destroy(Instagram $instagram)
    {
        if ($instagram->image && file_exists(public_path('instagram/' . $instagram->image))) {
            unlink(public_path('instagram/' . $instagram->image));
        }
        $instagram->delete();

        return redirect()->route('admin.instagram.index')->with('success', 'Instagram image deleted successfully.');
    }
}