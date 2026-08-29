<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{

    public function index()
    {
        $portfolios = Portfolio::with('category')->latest()->get();
        return view('admin.portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        $portfolioCategories = PortfolioCategory::active()->orderByDesc('id')->get();
        return view('admin.portfolio.create', compact('portfolioCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'file'        => 'required|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
            'video'       => 'nullable|mimes:mp4,mov,avi,webm|max:20480',
            'description' => 'required|string',
            'cat_id'      => 'required|exists:portfolio_categories,id',
        ]);

        $imageName = time() . rand(1, 100) . '.' . $request->file('file')->extension();
        $request->file('file')->move(public_path('portfolio'), $imageName);

        $videoName = null;
        if ($request->hasFile('video')) {
            $videoName = time() . rand(1, 100) . '.' . $request->file('video')->extension();
            $request->file('video')->move(public_path('portfolio'), $videoName);
        }

        Portfolio::create([
            'cat_id'      => $request->cat_id,
            'name'        => $request->name,
            'description' => $request->description,
            'image'       => $imageName,
            'video'       => $videoName,
        ]);

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio saved successfully.');
    }

    public function edit(Portfolio $portfolio)
    {
        $portfolioCategories = PortfolioCategory::active()->orderByDesc('id')->get();
        return view('admin.portfolio.edit', compact('portfolio', 'portfolioCategories'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'file'        => 'nullable|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
            'video'       => 'nullable|mimes:mp4,mov,avi,webm|max:20480',
            'description' => 'required|string',
            'cat_id'      => 'required|exists:portfolio_categories,id',
        ]);

        if ($request->hasFile('file')) {
            if ($portfolio->image && file_exists(public_path('portfolio/' . $portfolio->image))) {
                unlink(public_path('portfolio/' . $portfolio->image));
            }
            $imageName = time() . rand(1, 100) . '.' . $request->file('file')->extension();
            $request->file('file')->move(public_path('portfolio'), $imageName);
            $portfolio->image = $imageName;
        }

        if ($request->hasFile('video')) {
            if ($portfolio->video && file_exists(public_path('portfolio/' . $portfolio->video))) {
                unlink(public_path('portfolio/' . $portfolio->video));
            }
            $videoName = time() . rand(1, 100) . '.' . $request->file('video')->extension();
            $request->file('video')->move(public_path('portfolio'), $videoName);
            $portfolio->video = $videoName;
        }

        $portfolio->cat_id = $request->cat_id;
        $portfolio->name = $request->name;
        $portfolio->description = $request->description;
        $portfolio->save();

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio updated successfully.');
    }

    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image && file_exists(public_path('portfolio/' . $portfolio->image))) {
            unlink(public_path('portfolio/' . $portfolio->image));
        }
        if ($portfolio->video && file_exists(public_path('portfolio/' . $portfolio->video))) {
            unlink(public_path('portfolio/' . $portfolio->video));
        }
        $portfolio->delete();

        return redirect()->back()->with('success', 'Portfolio deleted successfully.');
    }
}