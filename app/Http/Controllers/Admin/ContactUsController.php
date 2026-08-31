<?php
// app/Http/Controllers/Admin/ContactUsController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(Request $request)
    {
        $query = ContactUs::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email_id', 'like', '%' . $request->search . '%')
                  ->orWhere('mobile_number', 'like', '%' . $request->search . '%');
            });
        }

        $sortable = ['id', 'name', 'email_id', 'created_at'];
        $sortBy = in_array($request->sort_by, $sortable) ? $request->sort_by : 'created_at';
        $sortOrder = $request->sort_order === 'asc' ? 'asc' : 'desc';

        $contacts = $query->orderBy($sortBy, $sortOrder)->paginate(15)->withQueryString();

        return view('admin.contact-us.index', compact('contacts'));
    }

    public function show(ContactUs $contact)
    {
        if (! $contact->is_read) {
            $contact->update(['is_read' => true]);
        }

        return response()->json([
            'success' => true,
            'data'    => $contact,
        ]);
    }

    public function destroy(ContactUs $contact)
    {
        $contact->delete();

        return response()->json([
            'success' => true,
            'message' => 'Enquiry Deleted Successfully',
        ]);
    }
}