<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageQuoteRequest;
use Illuminate\Http\Request;

class PageQuoteRequestController extends Controller
{
    public function index(Request $request)
    {
        $query = PageQuoteRequest::latest();

        if ($request->filled('status')) {
            $query->where('is_read', $request->status === 'read');
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('mobile_number', 'like', "%{$search}%")
                  ->orWhere('page_id', 'like', "%{$search}%");
            });
        }

        $pageQuoteRequests = $query->paginate(20)->withQueryString();

        return view('admin.page-quote-requests.index', compact('pageQuoteRequests'));
    }

    public function show(PageQuoteRequest $pageQuoteRequest)
    {
        if (!$pageQuoteRequest->is_read) {
            $pageQuoteRequest->update(['is_read' => true]);
        }

        return view('admin.page-quote-requests.show', compact('pageQuoteRequest'));
    }

    public function markRead(PageQuoteRequest $pageQuoteRequest)
    {
        $pageQuoteRequest->update(['is_read' => true]);

        return response()->json([
            'success' => true,
            'message' => 'Marked as read',
        ]);
    }

    public function destroy(PageQuoteRequest $pageQuoteRequest)
    {
        $pageQuoteRequest->delete();

        return response()->json([
            'success' => true,
            'message' => 'Quote request deleted',
        ]);
    }
}