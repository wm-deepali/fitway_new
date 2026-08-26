<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $portfolios = Portfolio::with('gallery')->latest()->get();
        return view('admin.portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        $galleries = Gallery::orderByDesc('id')->get();
        return view('admin.portfolio.create', compact('galleries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'file'        => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
            'description' => 'required|string',
            'cat_id'      => 'required',
        ]);

        $imageName = time() . rand(1, 100) . '.' . $request->file('file')->extension();
        $request->file('file')->move(public_path('products'), $imageName);

        Portfolio::create([
            'cat_id'      => $request->cat_id,
            'name'        => $request->name,
            'description' => $request->description,
            'image'       => $imageName,
        ]);

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio saved successfully.');
    }

    public function edit(Portfolio $portfolio)
    {
        $galleries = Gallery::orderByDesc('id')->get();
        return view('admin.portfolio.edit', compact('portfolio', 'galleries'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'file'        => 'nullable|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
            'description' => 'required|string',
            'cat_id'      => 'required',
        ]);

        if ($request->hasFile('file')) {
            if ($portfolio->image && file_exists(public_path('products/' . $portfolio->image))) {
                unlink(public_path('products/' . $portfolio->image));
            }
            $imageName = time() . rand(1, 100) . '.' . $request->file('file')->extension();
            $request->file('file')->move(public_path('products'), $imageName);
            $portfolio->image = $imageName;
        }

        $portfolio->cat_id = $request->cat_id;
        $portfolio->name = $request->name;
        $portfolio->description = $request->description;
        $portfolio->save();

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio updated successfully.');
    }

    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image && file_exists(public_path('products/' . $portfolio->image))) {
            unlink(public_path('products/' . $portfolio->image));
        }
        $portfolio->delete();

        return redirect()->back()->with('success', 'Portfolio deleted successfully.');
    }
}