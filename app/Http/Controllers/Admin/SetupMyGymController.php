<?php
// app/Http/Controllers/Admin/SetupMyGymController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SetupMyGym;
use Illuminate\Http\Request;

class SetupMyGymController extends Controller
{
    

    public function index(Request $request)
    {
        $query = SetupMyGym::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('full_name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        $sortable = ['id', 'full_name', 'email', 'created_at'];
        $sortBy = in_array($request->sort_by, $sortable) ? $request->sort_by : 'created_at';
        $sortOrder = $request->sort_order === 'asc' ? 'asc' : 'desc';

        $requests = $query->orderBy($sortBy, $sortOrder)->paginate(15)->withQueryString();

        return view('admin.setup-my-gym.index', compact('requests'));
    }

    public function show(SetupMyGym $setupMyGym)
    {
        if (! $setupMyGym->is_read) {
            $setupMyGym->update(['is_read' => true]);
        }

        return response()->json([
            'success' => true,
            'data'    => $setupMyGym,
        ]);
    }

    public function destroy(SetupMyGym $setupMyGym)
    {
        $setupMyGym->delete();

        return response()->json([
            'success' => true,
            'message' => 'Request Deleted Successfully',
        ]);
    }
}