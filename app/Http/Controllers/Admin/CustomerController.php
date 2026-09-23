<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customer::withCount('quotes')
            ->when($request->search, function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('business_name', 'like', '%' . $request->search . '%')
                        ->orWhere('customer_name', 'like', '%' . $request->search . '%')
                        ->orWhere('email', 'like', '%' . $request->search . '%')
                        ->orWhere('mobile_number', 'like', '%' . $request->search . '%');
                });
            })
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.customers.index', compact('customers'));
    }

    public function show(Customer $customer)
    {
        $customer->load('state', 'city');

        $quotes = $customer->quotes()
            ->withCount('items')
            ->latest()
            ->paginate(15);

        return view('admin.customers.show', compact('customer', 'quotes'));
    }

    public function updateStatus(Request $request, Customer $customer)
    {
        $request->validate([
            'status' => 'required|in:active,inactive',
        ]);

        $customer->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Customer status updated successfully.');
    }

    public function edit(Customer $customer)
    {
        $customer->load('state', 'city');

        $states = State::orderBy('name')->get(['id', 'name']);

        // Pre-load the cities for the customer's current state so the City
        // dropdown isn't empty on first render; the JS re-fetches this list
        // whenever the State dropdown changes.
        $cities = $customer->state_id
            ? City::where('state_id', $customer->state_id)->orderBy('name')->get(['id', 'name'])
            : collect();

        return view('admin.customers.edit', compact('customer', 'states', 'cities'));
    }

    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'customer_name'  => 'required|string|max:255',
            'business_name'  => 'nullable|string|max:255',
            'email'          => 'nullable|email|max:255',
            'mobile_number'  => 'required|string|max:15',
            'address'        => 'nullable|string|max:500',
            'state_id'       => 'nullable|exists:states,id',
            'city_id'        => 'nullable|exists:cities,id',
            'pincode'        => 'nullable|string|max:10',
            'gst_number'     => 'nullable|string|max:20',
            'status'         => 'required|in:active,inactive',
        ]);

        $customer->update($validated);

        return redirect()
            ->route('admin.customers.show', $customer->id)
            ->with('success', 'Customer updated successfully.');
    }

    /**
     * AJAX endpoint used by the Edit Customer page to repopulate the City
     * dropdown whenever the State dropdown changes.
     */
    public function citiesByState($stateId)
    {
        $cities = City::where('state_id', $stateId)->orderBy('name')->get(['id', 'name']);

        return response()->json($cities);
    }
}