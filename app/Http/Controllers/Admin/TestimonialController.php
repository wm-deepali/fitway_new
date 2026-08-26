<?php
// app/Http/Controllers/Admin/TestimonialController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    

    public function index(Request $request)
    {
        $query = Testimonial::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('company', 'like', '%' . $request->search . '%');
            });
        }

        $sortable = ['id', 'name', 'company', 'status', 'sort_order'];
        $sortBy = in_array($request->sort_by, $sortable) ? $request->sort_by : 'sort_order';
        $sortOrder = $request->sort_order_dir === 'desc' ? 'desc' : 'asc';

        $testimonials = $query->orderBy($sortBy, $sortOrder)->paginate(15)->withQueryString();

        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonial.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image'         => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
            'name'          => 'required|string|max:255',
            'company'       => 'nullable|string|max:255',
            'description'   => 'required|string',
        ]);

        $imagePath = $request->file('image')->store('testimonials', 'public');

        Testimonial::create([
            'name'          => $request->name,
            'company'       => $request->company,
            'description'   => $request->description,
            'image'         => $imagePath,
            'status'        => $request->boolean('status', true),
            'sort_order'    => $request->input('sort_order', 0),
        ]);

        return redirect()->route('admin.testimonials.index')
            ->with('successmessage', 'Testimonial Saved Successfully');
    }

    public function edit(Request $request, Testimonial $testimonial)
    {
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $this->validate($request, [
            'image'         => 'nullable|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
            'name'          => 'required|string|max:255',
            'company'       => 'nullable|string|max:255',
            'description'   => 'required|string',
        ]);

        $data = [
            'name'          => $request->name,
            'company'       => $request->company,
            'description'   => $request->description,
            'status'        => $request->boolean('status', true),
            'sort_order'    => $request->input('sort_order', 0),
        ];

        if ($request->hasFile('image')) {
            if ($testimonial->image) {
                Storage::disk('public')->delete($testimonial->image);
            }
            $data['image'] = $request->file('image')->store('testimonials', 'public');
        }

        $testimonial->update($data);

        $redirectTo = $request->input('redirect') ?: route('admin.testimonials.index');

        return redirect($redirectTo)->with('successmessage', 'Testimonial Updated Successfully');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->image) {
            Storage::disk('public')->delete($testimonial->image);
        }

        $testimonial->delete();

        return response()->json([
            'success' => true,
            'message' => 'Testimonial Deleted Successfully',
        ]);
    }
}