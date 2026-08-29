<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;

class PortfolioCategoryController extends Controller
{
    public function index()
    {
        $portfolioCategories = PortfolioCategory::latest()->get();

        return view('admin.portfolio-category.index', compact('portfolioCategories'));
    }

    public function create()
    {
        return view('admin.portfolio-category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        PortfolioCategory::create([
            'name'   => $request->name,
            'slug'   => PortfolioCategory::generateUniqueSlug($request->name),
            'status' => $request->boolean('status'),
        ]);

        return redirect()
            ->route('admin.portfolio-category.index')
            ->with('success', 'Portfolio category added successfully.');
    }

    public function edit(PortfolioCategory $portfolio_category)
    {
        return view('admin.portfolio-category.edit', ['portfolioCategory' => $portfolio_category]);
    }

    public function update(Request $request, PortfolioCategory $portfolio_category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $portfolio_category->update([
            'name'   => $request->name,
            'slug'   => PortfolioCategory::generateUniqueSlug($request->name, $portfolio_category->id),
            'status' => $request->boolean('status'),
        ]);

        return redirect()
            ->route('admin.portfolio-category.index')
            ->with('success', 'Portfolio category updated successfully.');
    }

    public function destroy(PortfolioCategory $portfolio_category)
    {
        $portfolio_category->delete();

        return redirect()->back()->with('success', 'Portfolio category deleted successfully.');
    }
}