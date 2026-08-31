<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;

class QuoteRequestController extends Controller
{
    public function index(Request $request)
    {
        $query = QuoteRequest::withCount('items')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('mobile_number', 'like', "%{$search}%");
            });
        }

        $quoteRequests = $query->paginate(20)->withQueryString();

        return view('admin.quote-requests.index', compact('quoteRequests'));
    }

    public function show(QuoteRequest $quoteRequest)
    {
        $quoteRequest->load('items.product');

        return view('admin.quote-requests.show', compact('quoteRequest'));
    }

    public function updateStatus(Request $request, QuoteRequest $quoteRequest)
    {
        $request->validate([
            'status' => 'required|in:new,contacted,closed',
        ]);

        $quoteRequest->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'Status updated',
        ]);
    }

    public function destroy(QuoteRequest $quoteRequest)
    {
        $quoteRequest->delete();

        return response()->json([
            'success' => true,
            'message' => 'Quote request deleted',
        ]);
    }
}