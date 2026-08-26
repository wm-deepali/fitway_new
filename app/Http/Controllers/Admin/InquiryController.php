<?php
// app/Http/Controllers/Admin/InquiryController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    

    public function index(Request $request)
    {
        $query = Inquiry::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('service', 'like', '%' . $request->search . '%');
            });
        }

        $sortable = ['id', 'name', 'email', 'service', 'created_at'];
        $sortBy = in_array($request->sort_by, $sortable) ? $request->sort_by : 'created_at';
        $sortOrder = $request->sort_order === 'asc' ? 'asc' : 'desc';

        $inquiries = $query->orderBy($sortBy, $sortOrder)->paginate(15)->withQueryString();

        return view('admin.inquiry.index', compact('inquiries'));
    }

    public function show(Inquiry $inquiry)
    {
        if (! $inquiry->is_read) {
            $inquiry->update(['is_read' => true]);
        }

        return response()->json([
            'success' => true,
            'data'    => $inquiry,
        ]);
    }

    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();

        return response()->json([
            'success' => true,
            'message' => 'Inquiry Deleted Successfully',
        ]);
    }
}