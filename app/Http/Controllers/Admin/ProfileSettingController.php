<?php
// app/Http/Controllers/Admin/ProfileSettingController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileSettingController extends Controller
{

    public function index()
    {
        $admin = Auth::user();

        return view('admin.profile-setting.index', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        $admin = Auth::user();

        $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => ['required', 'email', Rule::unique('users', 'email')->ignore($admin->id)],
            'company_name' => 'nullable|string|max:255',
            'contact'      => 'nullable|string|max:50',
        ]);

        $admin->name         = $request->name;
        $admin->email        = $request->email;
        $admin->company_name = $request->company_name;
        $admin->contact      = $request->contact;
        $admin->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function updateLogo(Request $request)
    {
        $admin = Auth::user();

        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
        ]);

        if ($admin->image) {
            Storage::disk('public')->delete($admin->image);
        }

        $admin->image = $request->file('image')->store('logos', 'public');
        $admin->save();

        return redirect()->back()->with('success', 'Logo updated successfully!');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ], [
            'password.confirmed' => 'Passwords do not match',
        ]);

        try {
            $admin = Auth::user();

            $admin->password = Hash::make($request->password);
            $admin->save();

            return redirect()->back()->with('success', 'Password updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong, try again.');
        }
    }
}