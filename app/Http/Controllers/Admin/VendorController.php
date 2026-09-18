<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index(Request $request)
    {
        $vendors = Vendor::with(['state', 'city'])
            ->when($request->search, function ($query) use ($request) {
                $query->where('vendor_name', 'like', '%' . $request->search . '%')
                    ->orWhere('gst_number', 'like', '%' . $request->search . '%')
                    ->orWhere('contact_person_name', 'like', '%' . $request->search . '%')
                    ->orWhere('mobile_number', 'like', '%' . $request->search . '%');
            })
            ->when($request->state_id, function ($query) use ($request) {
                $query->where('state_id', $request->state_id);
            })
            ->when($request->city_id, function ($query) use ($request) {
                $query->where('city_id', $request->city_id);
            })
            ->orderBy('vendor_name')
            ->paginate(20)
            ->withQueryString();

        $states = State::active()->orderBy('name')->get(['id', 'name']);
        $cities = City::active()
            ->when($request->state_id, fn ($q) => $q->where('state_id', $request->state_id))
            ->orderBy('name')
            ->get(['id', 'name']);

        return view('admin.vendors.index', compact('vendors', 'states', 'cities'));
    }

    public function create()
    {
        $states = State::active()->orderBy('name')->get(['id', 'name']);
        return view('admin.vendors.create', compact('states'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateVendor($request);

        Vendor::create($validated);

        return redirect()->route('admin.manage-vendors.index')->with('success', 'Vendor added successfully.');
    }

    public function edit(Vendor $vendor)
    {
        $states = State::active()->orderBy('name')->get(['id', 'name']);
        $cities = City::active()->where('state_id', $vendor->state_id)->orderBy('name')->get(['id', 'name']);

        return view('admin.vendors.edit', compact('vendor', 'states', 'cities'));
    }

    public function update(Request $request, Vendor $vendor)
    {
        $validated = $this->validateVendor($request);

        $vendor->update($validated);

        return redirect()->route('admin.manage-vendors.index')->with('success', 'Vendor updated successfully.');
    }

    public function destroy(Vendor $vendor)
    {
        $vendor->delete();

        return response()->json(['success' => true, 'message' => 'Vendor deleted successfully.']);
    }

    /** AJAX: populate the City dropdown when a State is selected. */
    public function getCities(Request $request)
    {
        $cities = City::active()
            ->where('state_id', $request->state_id)
            ->orderBy('name')
            ->get(['id', 'name']);

        return response()->json(['data' => $cities]);
    }

    protected function validateVendor(Request $request): array
    {
        return $request->validate([
            'vendor_name'          => 'required|string|max:255',
            'gst_number'           => 'nullable|string|max:20',
            'full_address'         => 'required|string',
            'email'                => 'required|email|max:255',
            'contact_person_name'  => 'required|string|max:255',
            'mobile_number'        => 'required|string|max:15',
            'whatsapp_number'      => 'nullable|string|max:15',
            'state_id'             => 'required|exists:states,id',
            'city_id'              => 'required|exists:cities,id',
            'pincode'              => 'nullable|string|max:10',
            'status'               => 'nullable|boolean',
        ]);
    }
}