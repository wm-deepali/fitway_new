<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class Adminrolescontroller extends Controller
{
    public function index(Request $request)
    {
        $employees = User::subAdmins()
            ->when($request->filled('search'), function ($q) use ($request) {
                $s = $request->search;
                $q->where(function ($q) use ($s) {
                    $q->where('name', 'like', "%{$s}%")
                        ->orWhere('email', 'like', "%{$s}%")
                        ->orWhere('contact', 'like', "%{$s}%");
                });
            })
            ->when($request->filled('status'), fn($q) => $q->where('status', $request->status === 'active'))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.admin-roles-setting.index', compact('employees'));
    }

    public function create()
    {
        return view('admin.admin-roles-setting.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'employee_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'mobile_number' => 'required|string|max:15',
            'whatsapp_number' => 'nullable|string|max:15',
            'address' => 'nullable|string',
            'photograph' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'required|string|min:8|confirmed',
            'status' => 'required|in:0,1',
        ]);

        $user = new User();
        $user->name = $data['employee_name'];
        $user->email = $data['email'];
        $user->contact = $data['mobile_number'];
        $user->whatsapp_number = $data['whatsapp_number'] ?? null;
        $user->address = $data['address'] ?? null;
        $user->password = $data['password'];      // hashed by the model cast
        $user->status = (bool) $data['status'];
        $user->is_sub_admin = true;
        $user->permissions = $this->cleanPermissions($request);

        if ($request->hasFile('photograph')) {
            $user->image = $request->file('photograph')->store('sub-admins', 'public');
        }

        $user->save();

        return redirect()->route('admin.admin-role-setting.index')
            ->with('success', 'Sub admin created successfully.');
    }

    public function edit($id)
    {
        $employee = User::subAdmins()->findOrFail($id);

        return view('admin.admin-roles-setting.create', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $user = User::subAdmins()->findOrFail($id);

        $data = $request->validate([
            'employee_name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'mobile_number' => 'required|string|max:15',
            'whatsapp_number' => 'nullable|string|max:15',
            'address' => 'nullable|string',
            'photograph' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
            'status' => 'required|in:0,1',
        ]);

        $user->name = $data['employee_name'];
        $user->email = $data['email'];
        $user->contact = $data['mobile_number'];
        $user->whatsapp_number = $data['whatsapp_number'] ?? null;
        $user->address = $data['address'] ?? null;
        $user->status = (bool) $data['status'];
        $user->permissions = $this->cleanPermissions($request);

        if (!empty($data['password'])) {
            $user->password = $data['password'];
        }

        if ($request->hasFile('photograph')) {
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            $user->image = $request->file('photograph')->store('sub-admins', 'public');
        }

        $user->save();

        return redirect()->route('admin.admin-role-setting.index')
            ->with('success', 'Sub admin updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::subAdmins()->findOrFail($id);

        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }

        $user->delete();

        return redirect()->route('admin.admin-role-setting.index')
            ->with('success', 'Sub admin deleted.');
    }

    /**
     * Keep only known modules/items/actions from the request (whitelist via config),
     * and auto-grant "view" if add/edit/delete is ticked.
     */
    private function cleanPermissions(Request $request): array
    {
        $input = $request->input('permissions', []);
        $clean = [];

        $clean['dashboard']['view'] = 1;

        foreach (config('admin_permissions.groups') as $group) {
            foreach ($group['items'] as $item) {
                $picked = [];

                foreach (['view', 'add', 'edit', 'delete'] as $action) {
                    if (!empty($input[$group['key']][$item['key']][$action])) {
                        $picked[$action] = 1;
                    }
                }

                if ($picked) {
                    $picked['view'] = 1;
                    $clean[$group['key']][$item['key']] = $picked;
                }
            }
        }

        return $clean;
    }
}