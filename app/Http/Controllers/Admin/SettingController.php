<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $settings = Setting::first() ?? new Setting();
        return view('admin.settings.edit', compact('settings'));
    }

    public function updateLogo(Request $request)
    {
        $request->validate([
            'logo_image' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
        ]);

        $settings = Setting::first() ?? new Setting();

        if ($request->hasFile('logo_image')) {
            if ($settings->logo_image && file_exists(public_path('front/logo/' . $settings->logo_image))) {
                unlink(public_path('front/logo/' . $settings->logo_image));
            }
            $imageName = time() . '.' . $request->file('logo_image')->extension();
            $request->file('logo_image')->move(public_path('front/logo'), $imageName);
            $settings->logo_image = $imageName;
        }

        $settings->save();

        return redirect()->route('admin.settings.edit')->with('success', 'Logo updated successfully.');
    }

    public function updateHeader(Request $request)
    {
        $request->validate([
            'header_email' => 'required|email',
            'header_phone' => 'required|string|max:50',
        ]);

        $settings = Setting::first() ?? new Setting();
        $settings->header_email = $request->header_email;
        $settings->header_phone = $request->header_phone;
        $settings->save();

        return redirect()->route('admin.settings.edit')->with('success', 'Header updated successfully.');
    }

    public function updateHeaderScript(Request $request)
    {
        $settings = Setting::first() ?? new Setting();
        $settings->header_analytics = $request->header_analytics;
        $settings->header_ads = $request->header_ads;
        $settings->save();

        return redirect()->route('admin.settings.edit')->with('success', 'Tracking scripts updated successfully.');
    }

    public function updateFooter(Request $request)
    {
        $request->validate([
            'footer_email' => 'required|email',
            'footer_phone_1' => 'required|string|max:50',
            'footer_phone_2' => 'required|string|max:50',
            'footer_address' => 'required|string',
        ]);

        $settings = Setting::first() ?? new Setting();
        $settings->fill($request->only(['footer_email', 'footer_phone_1', 'footer_phone_2', 'footer_address']));
        $settings->save();

        return redirect()->route('admin.settings.edit')->with('success', 'Footer updated successfully.');
    }

    public function updateNewsletter(Request $request)
    {
        $request->validate([
            'newsletter_description' => 'required|string',
        ]);

        $settings = Setting::first() ?? new Setting();
        $settings->newsletter_description = $request->newsletter_description;
        $settings->save();

        return redirect()->route('admin.settings.edit')->with('success', 'Newsletter updated successfully.');
    }
}