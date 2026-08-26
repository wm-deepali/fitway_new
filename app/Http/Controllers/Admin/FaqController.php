<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $query = Faq::query();

        if ($request->filled('search')) {
            $query->where('question', 'like', '%' . $request->search . '%');
        }

        $sortBy  = $request->get('sort_by', 'sort_order');
        $sortDir = $request->get('sort_dir', 'asc');

        $allowedSorts = ['id', 'question', 'sort_order', 'status', 'created_at'];
        if (!in_array($sortBy, $allowedSorts)) {
            $sortBy = 'sort_order';
        }

        $faqs = $query->orderBy($sortBy, $sortDir)
            ->paginate(15)
            ->withQueryString();

        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question'   => 'required|string|max:500',
            'answer'     => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'status'     => 'required|boolean',
        ]);

        Faq::create([
            'question'   => $request->question,
            'answer'     => $request->answer,
            'sort_order' => $request->sort_order ?? 0,
            'status'     => $request->status,
        ]);

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'FAQ created successfully.');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question'   => 'required|string|max:500',
            'answer'     => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'status'     => 'required|boolean',
        ]);

        $faq->update([
            'question'   => $request->question,
            'answer'     => $request->answer,
            'sort_order' => $request->sort_order ?? 0,
            'status'     => $request->status,
        ]);

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'FAQ updated successfully.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return response()->json([
            'message' => 'FAQ deleted successfully.',
        ]);
    }
}