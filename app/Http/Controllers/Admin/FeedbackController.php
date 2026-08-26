<?php
// app/Http/Controllers/Admin/FeedbackController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{

    public function index(Request $request)
    {
        $query = Feedback::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email_id', 'like', '%' . $request->search . '%');
            });
        }

        $sortable = ['id', 'name', 'email_id', 'created_at'];
        $sortBy = in_array($request->sort_by, $sortable) ? $request->sort_by : 'created_at';
        $sortOrder = $request->sort_order === 'asc' ? 'asc' : 'desc';

        $feedbacks = $query->orderBy($sortBy, $sortOrder)->paginate(15)->withQueryString();

        return view('admin.feedback.index', compact('feedbacks'));
    }

    public function show(Feedback $feedback)
    {
        if (! $feedback->is_read) {
            $feedback->update(['is_read' => true]);
        }

        return response()->json([
            'success' => true,
            'data'    => $feedback,
        ]);
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();

        return response()->json([
            'success' => true,
            'message' => 'Feedback Deleted Successfully',
        ]);
    }
}