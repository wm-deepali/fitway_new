<?php
// app/Http/Controllers/Admin/SeoController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    protected string $modelClass = Page::class;

    public function index(Request $request)
    {
        $records = Page::with('seo')->latest()->paginate(20);

        return view('admin.seo.index', [
            'records' => $records,
        ]);
    }

    public function edit(int $id)
    {
        $record = Page::with('seo')->findOrFail($id);
        $seo = $record->seo ?? new Seo(['seoable_id' => $record->id, 'seoable_type' => $this->modelClass]);

        return view('admin.seo.edit', compact('record', 'seo', 'id'));
    }

    public function update(Request $request, int $id)
    {
        $record = Page::findOrFail($id);

        $validated = $request->validate([
            'h1'                  => 'nullable|string|max:255',
            'meta_title'          => 'nullable|string|max:255',
            'meta_description'    => 'nullable|string|max:500',
            'og_title'            => 'nullable|string|max:255',
            'og_description'      => 'nullable|string|max:500',
            'og_image'            => 'nullable|image|max:2048',
            'twitter_card_type'   => 'nullable|string|max:50',
            'twitter_title'       => 'nullable|string|max:255',
            'twitter_description' => 'nullable|string|max:500',
            'twitter_image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('og_image')) {
            $validated['og_image'] = $request->file('og_image')->store('seo/og', 'public');
        }
        if ($request->hasFile('twitter_image')) {
            $validated['twitter_image'] = $request->file('twitter_image')->store('seo/twitter', 'public');
        }

        Seo::updateOrCreate(
            ['seoable_id' => $record->id, 'seoable_type' => $this->modelClass],
            $validated
        );

        return redirect()
            ->route('admin.seo.edit', $id)
            ->with('success', 'SEO settings updated successfully.');
    }
}