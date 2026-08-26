<?php
// app/Http/Controllers/Admin/SliderController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    

    public function index(Request $request)
    {
        $query = Slider::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $sortable = ['id', 'title', 'status', 'sort_order'];
        $sortBy = in_array($request->sort_by, $sortable) ? $request->sort_by : 'sort_order';
        $sortOrder = $request->sort_order_dir === 'desc' ? 'desc' : 'asc';

        $sliders = $query->orderBy($sortBy, $sortOrder)->paginate(15)->withQueryString();

        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'  => 'required|string|max:255',
            'slider' => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
        ]);

        $imagePath = $request->file('slider')->store('sliders', 'public');

        Slider::create([
            'title'      => $request->title,
            'slider'     => $imagePath,
            'status'     => $request->boolean('status', true),
            'sort_order' => $request->input('sort_order', 0),
        ]);

        return redirect()->route('admin.sliders.index')
            ->with('successmessage', 'Slider Saved Successfully');
    }

    public function edit(Request $request, Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $this->validate($request, [
            'title'  => 'required|string|max:255',
            'slider' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
        ]);

        $data = [
            'title'      => $request->title,
            'status'     => $request->boolean('status', true),
            'sort_order' => $request->input('sort_order', 0),
        ];

        if ($request->hasFile('slider')) {
            if ($slider->slider) {
                Storage::disk('public')->delete($slider->slider);
            }
            $data['slider'] = $request->file('slider')->store('sliders', 'public');
        }

        $slider->update($data);

        $redirectTo = $request->input('redirect') ?: route('admin.sliders.index');

        return redirect($redirectTo)->with('successmessage', 'Slider Updated Successfully');
    }

    public function destroy(Slider $slider)
    {
        if ($slider->slider) {
            Storage::disk('public')->delete($slider->slider);
        }

        $slider->delete();

        return response()->json([
            'success' => true,
            'message' => 'Slider Deleted Successfully',
        ]);
    }
}