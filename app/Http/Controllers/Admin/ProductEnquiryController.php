<?php
// app/Http/Controllers/Admin/ProductEnquiryController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductEnquiry;
use Illuminate\Http\Request;

class ProductEnquiryController extends Controller
{
    

    public function index(Request $request)
    {
        $query = ProductEnquiry::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('city', 'like', '%' . $request->search . '%');
            });
        }

        $sortable = ['id', 'name', 'city', 'state', 'created_at'];
        $sortBy = in_array($request->sort_by, $sortable) ? $request->sort_by : 'created_at';
        $sortOrder = $request->sort_order === 'asc' ? 'asc' : 'desc';

        $enquiries = $query->orderBy($sortBy, $sortOrder)->paginate(15)->withQueryString();

        return view('admin.product-enquiry.index', compact('enquiries'));
    }

    public function destroy(ProductEnquiry $productEnquiry)
    {
        $productEnquiry->delete();

        return response()->json([
            'success' => true,
            'message' => 'Enquiry Deleted Successfully',
        ]);
    }
}