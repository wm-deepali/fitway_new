<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PlanPrice;
use Illuminate\Http\Request;

class PlanPriceController extends Controller
{
    public function index()
    {
        $prices = PlanPrice::latest()->get();
        return view('admin.plan-prices.index', compact('prices'));
    }

    public function create()
    {
        return view('admin.plan-prices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'         => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
            'day'           => 'required|integer',
            'class'         => 'required|string|max:255',
            'price'         => 'required|numeric',
            'montly_yearly' => 'required|in:month,year',
            'plan'          => 'required|in:medium,standard,premium',
        ], [
            'image.required'         => 'Please select image.',
            'day.required'           => 'Days of week field is required.',
            'class.required'         => 'Class field is required.',
            'price.required'         => 'Price field is required.',
            'montly_yearly.required' => 'Please select monthly or yearly.',
            'plan.required'          => 'Please select plan.',
        ]);

        $imageName = time() . rand(1, 100) . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('price'), $imageName);

        PlanPrice::create([
            'title_1'       => $request->title_1,
            'title_2'       => $request->title_2,
            'title_3'       => $request->title_3,
            'title_4'       => $request->title_4,
            'days'          => $request->day,
            'image'         => $imageName,
            'class'         => $request->class,
            'price'         => $request->price,
            'montly_yearly' => $request->montly_yearly,
            'plan'          => $request->plan,
        ]);

        return redirect()->route('admin.plan-prices.index')->with('success', 'Price saved successfully.');
    }

    public function edit(PlanPrice $planPrice)
    {
        return view('admin.plan-prices.edit', ['price' => $planPrice]);
    }

    public function update(Request $request, PlanPrice $planPrice)
    {
        $request->validate([
            'image'         => 'nullable|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
            'days'          => 'required|integer',
            'class'         => 'required|string|max:255',
            'price'         => 'required|numeric',
            'montly_yearly' => 'required|in:month,year',
            'plan'          => 'required|in:medium,standard,premium',
        ], [
            'days.required'          => 'Days of week field is required.',
            'class.required'         => 'Class field is required.',
            'price.required'         => 'Price field is required.',
            'montly_yearly.required' => 'Please select monthly or yearly.',
            'plan.required'          => 'Please select plan.',
        ]);

        if ($request->hasFile('image')) {
            if ($planPrice->image && file_exists(public_path('price/' . $planPrice->image))) {
                unlink(public_path('price/' . $planPrice->image));
            }
            $imageName = time() . rand(1, 100) . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('price'), $imageName);
            $planPrice->image = $imageName;
        }

        $planPrice->fill($request->only([
            'title_1', 'title_2', 'title_3', 'title_4', 'days', 'class', 'price', 'montly_yearly', 'plan',
        ]))->save();

        return redirect()->route('admin.plan-prices.index')->with('success', 'Price updated successfully.');
    }

    public function destroy(PlanPrice $planPrice)
    {
        if ($planPrice->image && file_exists(public_path('price/' . $planPrice->image))) {
            unlink(public_path('price/' . $planPrice->image));
        }
        $planPrice->delete();

        return redirect()->route('admin.plan-prices.index')->with('success', 'Price deleted successfully.');
    }
}