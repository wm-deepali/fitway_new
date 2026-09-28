<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Complaint;

class TechnicianController extends Controller
{
    public function index(Request $request)
{
    $technicians = Technician::query()
        ->when($request->search, function ($q) use ($request) {
            $q->where(function ($q2) use ($request) {
                $q2->where('full_name', 'like', '%' . $request->search . '%')
                    ->orWhere('mobile_number', 'like', '%' . $request->search . '%')
                    ->orWhere('whatsapp_number', 'like', '%' . $request->search . '%');
            });
        })
        ->withCount([
            'complaints as total_complaints_count',
            'complaints as completed_complaints_count' => fn($q) => $q->where('status', \App\Models\Complaint::STATUS_COMPLETED),
            'complaints as pending_complaints_count'    => fn($q) => $q->where('status', '!=', \App\Models\Complaint::STATUS_COMPLETED),
        ])
        ->with(['complaints' => fn($q) => $q->select('id', 'technician_id', 'status')])
        ->latest()
        ->paginate(15)
        ->withQueryString();

    return view('admin.complaint.technician.index', compact('technicians'));
}

    public function create()
    {
        $technician = new Technician();
        return view('admin.complaint.technician.form', compact('technician'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateTechnician($request);

        if ($request->hasFile('photograph')) {
            $validated['photograph'] = $this->storePhoto($request);
        }

        Technician::create($validated);

        return redirect()
            ->route('admin.complaint.technicians.index')
            ->with('success', 'Technician added successfully.');
    }

    public function edit(Technician $technician)
    {
        return view('admin.complaint.technician.form', compact('technician'));
    }

    public function update(Request $request, Technician $technician)
    {
        $validated = $this->validateTechnician($request, $technician->id);

        if ($request->hasFile('photograph')) {
            if ($technician->photograph) {
                Storage::disk('public')->delete('technicians/' . $technician->photograph);
            }
            $validated['photograph'] = $this->storePhoto($request);
        }

        $technician->update($validated);

        return redirect()
            ->route('admin.complaint.technicians.index')
            ->with('success', 'Technician updated successfully.');
    }

    public function destroy(Technician $technician)
    {
        if ($technician->photograph) {
            Storage::disk('public')->delete('technicians/' . $technician->photograph);
        }

        $technician->delete();

        return response()->json([
            'success' => true,
            'message' => 'Technician deleted successfully.',
        ]);
    }

    private function validateTechnician(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'full_name'       => ['required', 'string', 'max:150'],
            'mobile_number'   => ['required', 'string', 'max:15'],
            'whatsapp_number' => ['nullable', 'string', 'max:15'],
            'photograph'      => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'status'          => ['nullable', 'boolean'],
        ]);
    }

    private function storePhoto(Request $request): string
    {
        $file = $request->file('photograph');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('technicians', $filename, 'public');
        return $filename;
    }
}