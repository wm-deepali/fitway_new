<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\WhoWeAre;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function edit()
    {
        $about = AboutUs::first();
        $whoWeAre = WhoWeAre::first();

        return view('admin.about-us.edit', compact('about', 'whoWeAre'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif,webp,svg|max:2048',
            'description' => 'nullable|string',
        ]);

        $about = AboutUs::first() ?? new AboutUs();

        if ($request->hasFile('image')) {
            if ($about->image && file_exists(public_path('about/' . $about->image))) {
                unlink(public_path('about/' . $about->image));
            }

            $imageName = time() . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('about'), $imageName);
            $about->image = $imageName;
        }

        $about->description = $request->description;
        $about->save();

        return redirect()->route('admin.about-us.edit')->with('success', 'About Us updated successfully.');
    }

    public function updateWhoWeAre(Request $request)
    {
        $request->validate([
            'description' => 'nullable|string',
            'url'         => 'nullable|string|max:255',
        ]);

        $whoWeAre = WhoWeAre::first() ?? new WhoWeAre();
        $whoWeAre->description = $request->description;
        $whoWeAre->url = $request->url;
        $whoWeAre->save();

        return redirect()->route('admin.about-us.edit')->with('success', 'Who We Are updated successfully.');
    }
}