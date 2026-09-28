<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Complaint;
use App\Models\ComplaintImage;
use App\Models\Customer;
use App\Models\State;
use App\Models\Technician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ComplaintController extends Controller
{
    public function index(Request $request)
    {
        $complaints = Complaint::with('technician')
            ->when($request->search, function ($q) use ($request) {
                $term = $request->search;
                $q->where(function ($q2) use ($term) {
                    $q2->where('complaint_code', 'like', "%{$term}%")
                        ->orWhere('customer_name', 'like', "%{$term}%")
                        ->orWhere('mobile_number', 'like', "%{$term}%");
                });
            })
            ->when($request->filled('source'), fn($q) => $q->where('source', $request->source))
            ->when($request->technician_id, fn($q) => $q->where('technician_id', $request->technician_id))
            ->when($request->customer_id, fn($q) => $q->where('customer_id', $request->customer_id))
            ->when($request->status === 'completed', fn($q) => $q->where('status', Complaint::STATUS_COMPLETED))
            ->when($request->status === 'pending', fn($q) => $q->where('status', '!=', Complaint::STATUS_COMPLETED))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        $filterTechnician = $request->technician_id ? Technician::find($request->technician_id) : null;
        $filterCustomer = $request->customer_id ? Customer::find($request->customer_id) : null;

        return view('admin.complaint.index', compact('complaints', 'filterTechnician', 'filterCustomer'));
    }

    public function create()
    {
        $states = State::orderBy('name')->get();
        return view('admin.complaint.create', compact('states'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateComplaint($request);

        $technicianId = $this->resolveTechnicianId($validated['assigned_to'] ?? null);

        $complaint = Complaint::create([
            'customer_id' => $validated['customer_id'] ?? null,
            'customer_name' => $validated['customer_name'],
            'email' => $validated['email'] ?? null,
            'mobile_number' => $validated['mobile_number'],
            'full_address' => $validated['address'],
            'landmark' => $validated['landmark'] ?? null,
            'state_id' => $validated['state_id'],
            'city_id' => $validated['city_id'],
            'pin_code' => $validated['pincode'],
            'complaint_detail' => $validated['complaint_detail'],
            'complaint_type' => $validated['complaint_type'],
            'service_detail' => $validated['service_detail'] ?? null,
            'paid_price' => $validated['complaint_type'] === 'paid' ? ($validated['paid_price'] ?? null) : null,
            'technician_id' => $technicianId,
            'schedule_date' => $validated['schedule_date'] ?? null,
            'status' => Complaint::STATUS_NEW,
            'source' => 'admin',
        ]);

        $this->storeImages($request, $complaint);

        return redirect()
            ->route('admin.complaint.complaints.index')
            ->with('success', 'Complaint raised successfully.');
    }

    public function edit(Complaint $complaint)
    {
        $states = State::orderBy('name')->get();
        $cities = City::where('state_id', $complaint->state_id)->orderBy('name')->get();
        $complaint->load('images', 'technician');

        return view('admin.complaint.edit', compact('complaint', 'states', 'cities'));
    }

    public function update(Request $request, Complaint $complaint)
    {
        $validated = $this->validateComplaint($request);

        $technicianId = $this->resolveTechnicianId($validated['assigned_to'] ?? null);

        // Status: admin explicitly sets it on edit (New Complaint / Under Process / Completed)
        $status = (int) ($request->status ?? $complaint->status);
        if (!array_key_exists($status, Complaint::$statusLabels)) {
            $status = $complaint->status;
        }

        $complaint->update([
            'customer_id' => $validated['customer_id'] ?? $complaint->customer_id,
            'customer_name' => $validated['customer_name'],
            'email' => $validated['email'] ?? null,
            'mobile_number' => $validated['mobile_number'],
            'full_address' => $validated['address'],
            'landmark' => $validated['landmark'] ?? null,
            'state_id' => $validated['state_id'],
            'city_id' => $validated['city_id'],
            'pin_code' => $validated['pincode'],
            'complaint_detail' => $validated['complaint_detail'],
            'complaint_type' => $validated['complaint_type'],
            'service_detail' => $validated['service_detail'] ?? null,
            'paid_price' => $validated['complaint_type'] === 'paid' ? ($validated['paid_price'] ?? null) : null,
            'technician_id' => $technicianId,
            'schedule_date' => $validated['schedule_date'] ?? null,
            'status' => $status,
        ]);

        // Remove images the admin unchecked in edit view
        if ($request->filled('remove_images')) {
            $toRemove = ComplaintImage::where('complaint_id', $complaint->id)
                ->whereIn('id', $request->remove_images)
                ->get();

            foreach ($toRemove as $img) {
                Storage::disk('public')->delete('complaints/' . $img->image);
                $img->delete();
            }
        }

        $this->storeImages($request, $complaint);

        return redirect()
            ->route('admin.complaint.complaints.index')
            ->with('success', 'Complaint updated successfully.');
    }

    public function destroy(Complaint $complaint)
    {
        foreach ($complaint->images as $img) {
            Storage::disk('public')->delete('complaints/' . $img->image);
        }

        $complaint->delete();

        return response()->json([
            'success' => true,
            'message' => 'Complaint deleted successfully.',
        ]);
    }

    // AJAX: customer search box on create/edit — matches by name, mobile, or complaint code
    public function searchCustomers(Request $request)
    {
        $term = trim($request->get('term', ''));
        if (strlen($term) < 2)
            return response()->json([]);

        $customers = Customer::where('customer_name', 'like', "%{$term}%")
            ->orWhere('mobile_number', 'like', "%{$term}%")
            ->orWhereHas('complaints', fn($q) => $q->where('complaint_code', 'like', "%{$term}%"))
            ->limit(10)
            ->get();

        return response()->json($customers->map(function ($c) {
            $lastComplaint = $c->complaints()->latest()->first();
            return [
                'id' => $c->id,
                'name' => $c->customer_name,
                'mobile' => $c->mobile_number,
                'email' => $c->email,
                'address' => $c->address,
                'landmark' => $c->landmark,
                'pin' => $c->pincode,
                'state_id' => $c->state_id,
                'city_id' => $c->city_id,
                'complaintId' => $lastComplaint?->complaint_code,
            ];
        }));
    }

    // AJAX: "Assigned To" autocomplete
    public function searchTechnicians(Request $request)
    {
        $term = trim($request->get('term', ''));

        $technicians = Technician::where('full_name', 'like', "%{$term}%")
            ->withCount([
                'complaints as pending_count' => function ($q) {
                    $q->where('status', '!=', Complaint::STATUS_COMPLETED);
                }
            ])
            ->limit(10)
            ->get();

        return response()->json($technicians->map(fn($t) => [
            'name' => $t->full_name,
            'pending' => $t->pending_count,
        ]));
    }

    // AJAX: previous complaint history panel
    public function customerHistory(Customer $customer, Request $request)
    {
        $complaints = Complaint::where('customer_id', $customer->id)
            ->when($request->exclude, fn($q) => $q->where('id', '!=', $request->exclude))
            ->latest()
            ->limit(10)
            ->get();

        return response()->json($complaints->map(fn($c) => [
            'id' => $c->complaint_code,
            'date' => $c->created_at->format('d M Y'),
            'desc' => Str::limit($c->complaint_detail, 90),
            'status' => $c->status == Complaint::STATUS_COMPLETED ? 'resolved' : 'open',
        ]));
    }

    // AJAX: state -> city dropdown
    public function citiesByState($stateId)
    {
        return response()->json(
            City::where('state_id', $stateId)->orderBy('name')->get(['id', 'name'])
        );
    }

    private function validateComplaint(Request $request): array
    {
        return $request->validate([
            'customer_id' => ['nullable', 'exists:customers,id'],
            'customer_name' => ['required', 'string', 'max:150'],
            'email' => ['nullable', 'email', 'max:150'],
            'mobile_number' => ['required', 'string', 'max:15'],
            'address' => ['required', 'string'],
            'landmark' => ['nullable', 'string', 'max:150'],
            'state_id' => ['required', 'exists:states,id'],
            'city_id' => ['required', 'exists:cities,id'],
            'pincode' => ['nullable', 'string', 'max:10'],
            'complaint_detail' => ['required', 'string'],
            'complaint_type' => ['required', 'in:paid,unpaid'],
            'service_detail' => ['nullable', 'string'],
            'paid_price' => ['nullable', 'numeric', 'min:0'],
            'assigned_to' => ['nullable', 'string', 'max:150'],
            'schedule_date' => ['nullable', 'date'],
            'images.*' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'remove_images' => ['nullable', 'array'],
            'remove_images.*' => ['integer', 'exists:complaint_images,id'],
            'status' => ['nullable', 'integer'],
        ]);
    }

    private function resolveTechnicianId(?string $name): ?int
    {
        if (empty($name))
            return null;
        return Technician::where('full_name', $name)->value('id');
    }

    private function storeImages(Request $request, Complaint $complaint): void
    {
        if (!$request->hasFile('images'))
            return;

        foreach ($request->file('images') as $file) {
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('complaints', $filename, 'public');

            ComplaintImage::create([
                'complaint_id' => $complaint->id,
                'image' => $filename,
            ]);
        }
    }
}