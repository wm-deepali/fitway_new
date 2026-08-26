<?php
// app/Http/Controllers/Admin/NewsletterController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    

    public function index(Request $request)
    {
        $query = Newsletter::query();

        if ($request->filled('search')) {
            $query->where('email', 'like', '%' . $request->search . '%');
        }

        $sortOrder = $request->sort_order === 'asc' ? 'asc' : 'desc';

        $subscribers = $query->orderBy('created_at', $sortOrder)->paginate(15)->withQueryString();

        return view('admin.newsletter.index', compact('subscribers'));
    }

    public function destroy(Newsletter $newsletter)
    {
        $newsletter->delete();

        return response()->json([
            'success' => true,
            'message' => 'Subscriber Deleted Successfully',
        ]);
    }
}