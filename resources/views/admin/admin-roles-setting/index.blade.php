@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">

            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb bg-transparent mb-0">

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Admin Roles &amp; Permissions
                    </li>

                </ol>
            </div>

        </div>

        <div class="content-wrapper pb-4">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Header card: title + Add New --}}
            <div class="card wm-card mb-4">

                <div class="card-header wm-card-header d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 wm-card-title">Admin Roles &amp; Permissions</h4>

                    <a href="{{ route('admin.admin-role-setting.create') }}" class="btn wm-btn-primary">
                        <i class="fa-solid fa-plus"></i> Add New
                    </a>
                </div>

                <div class="card-body wm-form-body">

                    <form method="GET" action="{{ route('admin.admin-role-setting.index') }}">

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group mb-0 wm-form-group">
                                    <label class="wm-label">Search</label>
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        class="form-control wm-input" placeholder="Search by name, email or mobile">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-0 wm-form-group">
                                    <label class="wm-label">Status</label>
                                    <select name="status" class="form-control wm-input">
                                        <option value="">All</option>
                                        <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn wm-btn-outline btn-block">
                                    <i class="fa-solid fa-filter"></i> Filter
                                </button>
                            </div>

                            @if(request()->filled('search') || request()->filled('status'))
                                <div class="col-md-2 d-flex align-items-end">
                                    <a href="{{ route('admin.admin-role-setting.index') }}"
                                        class="btn wm-btn-cancel btn-block">
                                        Reset
                                    </a>
                                </div>
                            @endif

                        </div>

                    </form>

                </div>

            </div>

            {{-- Listing table --}}
            <div class="card wm-card">

                <div class="table-responsive">

                    <table class="table table-bordered mb-0 wm-table">

                        <thead>
                            <tr>
                                <th width="60">Photo</th>
                                <th>Employee Name</th>
                                <th>Email Id</th>
                                <th width="140">Mobile Number</th>
                                <th width="140">WhatsApp Number</th>
                                <th width="110">Status</th>
                                <th width="130">Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($employees as $employee)
                                <tr>
                                    <td>
                                        @if($employee->image)
                                            <img src="{{ asset('storage/' . $employee->image) }}" class="wm-avatar"
                                                alt="{{ $employee->name }}">
                                        @else
                                            <div class="wm-avatar">{{ strtoupper(substr($employee->name, 0, 1)) }}</div>
                                        @endif
                                    </td>
                                    <td class="wm-emp-name">{{ $employee->name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->contact }}</td>
                                    <td>{{ $employee->whatsapp_number }}</td>
                                    <td>
                                        <span
                                            class="wm-badge {{ $employee->status ? 'wm-badge-active' : 'wm-badge-inactive' }}">
                                            {{ $employee->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.admin-role-setting.edit', $employee->id) }}"
                                            class="btn btn-sm wm-btn-outline" title="Edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>

                                        <form action="{{ route('admin.admin-role-setting.destroy', $employee->id) }}"
                                            method="POST" class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm wm-btn-danger" title="Delete">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted wm-empty-state">
                                        No records found.
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="card-footer wm-card-footer d-flex align-items-center justify-content-between">

                    <small class="text-muted">
                        Showing {{ $employees->firstItem() ?? 0 }} to {{ $employees->lastItem() ?? 0 }}
                        of {{ $employees->total() }} entries
                    </small>

                    {{ $employees->links('pagination::bootstrap-4') }}

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- Remove this line if admin.footer already loads SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function () {

        // ---------- Delete confirmation ----------
        $(document).on('submit', '.delete-form', function (e) {

            e.preventDefault();

            var form = this;

            Swal.fire({
                title: 'Delete this sub admin?',
                text: 'This cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#b3261e',
                confirmButtonText: 'Yes, delete'
            }).then(function (result) {
                if (result.isConfirmed) {
                    form.submit();
                }
            });

        });

    });
</script>

<style>
    :root {
        --wm-primary: #303d89;
        --wm-primary-hover: #252f70;
        --wm-primary-light: #eef0fa;
        --wm-border: #e3e5e8;
        --wm-text: #202223;
        --wm-muted: #6d7175;
        --wm-radius: 12px;
        --wm-danger: #b3261e;
        --wm-danger-light: #fbeceb;
        --wm-success: #1e7e34;
        --wm-success-light: #e9f7ef;
    }

    .wm-card {
        border: 1px solid var(--wm-border);
        border-radius: var(--wm-radius);
        box-shadow: 0 1px 3px rgba(0, 0, 0, .08), 0 0 0 1px var(--wm-border);
        overflow: hidden;
    }

    .wm-card-header {
        background: #ffffff;
        border-bottom: 1px solid var(--wm-border);
        padding: 1rem 1.25rem;
    }

    .wm-card-title {
        font-weight: 650;
        color: var(--wm-text);
        letter-spacing: 0.2px;
    }

    .wm-card-footer {
        background: #fafafb;
        border-top: 1px solid var(--wm-border);
        padding: 0.85rem 1.25rem;
    }

    .wm-form-body {
        padding: 1.5rem 1.25rem;
    }

    .wm-form-group {
        margin-bottom: 1.1rem;
    }

    .wm-label {
        font-size: 0.78rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        color: var(--wm-muted);
        margin-bottom: 6px;
        display: block;
    }

    .wm-input {
        border: 1px solid var(--wm-border) !important;
        border-radius: 8px !important;
        padding: 0.55rem 0.8rem !important;
        font-size: 0.9rem;
        color: var(--wm-text);
        background-color: #fbfbfc;
    }

    .wm-input:focus {
        border-color: var(--wm-primary) !important;
        box-shadow: 0 0 0 3px rgba(48, 61, 137, 0.12) !important;
        background-color: #ffffff;
        outline: none;
    }

    .wm-btn-primary,
    .wm-btn-outline,
    .wm-btn-danger,
    .wm-btn-cancel {
        border-radius: 8px !important;
        font-weight: 600 !important;
        font-size: 0.85rem !important;
        padding: 0.5rem 1rem !important;
        border: 1px solid transparent !important;
        transition: all 0.15s ease;
    }

    .wm-btn-primary {
        background-color: var(--wm-primary) !important;
        border-color: var(--wm-primary) !important;
        color: #ffffff !important;
    }

    .wm-btn-primary:hover {
        background-color: var(--wm-primary-hover) !important;
        border-color: var(--wm-primary-hover) !important;
        color: #ffffff !important;
    }

    .wm-btn-outline {
        background-color: #ffffff !important;
        border-color: var(--wm-primary) !important;
        color: var(--wm-primary) !important;
    }

    .wm-btn-outline:hover {
        background-color: var(--wm-primary) !important;
        color: #ffffff !important;
    }

    .wm-btn-danger {
        background-color: var(--wm-danger-light) !important;
        border-color: var(--wm-danger-light) !important;
        color: var(--wm-danger) !important;
    }

    .wm-btn-danger:hover {
        background-color: var(--wm-danger) !important;
        border-color: var(--wm-danger) !important;
        color: #fff !important;
    }

    .wm-btn-cancel {
        background-color: #fff !important;
        border-color: var(--wm-border) !important;
        color: var(--wm-muted) !important;
    }

    .wm-table {
        margin-bottom: 0;
    }

    .wm-table thead tr th {
        background-color: var(--wm-primary);
        color: #ffffff;
        font-weight: 600;
        font-size: 0.78rem;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        border-color: var(--wm-primary);
        padding: 0.75rem 0.9rem;
    }

    .wm-table tbody tr td {
        padding: 0.7rem 0.9rem;
        vertical-align: middle;
        color: var(--wm-text);
        font-size: 0.88rem;
        border-color: var(--wm-border);
    }

    .wm-table tbody tr:nth-child(odd) {
        background-color: #ffffff;
    }

    .wm-table tbody tr:nth-child(even) {
        background-color: #f8f8f9;
    }

    .wm-table tbody tr:hover {
        background-color: var(--wm-primary-light) !important;
    }

    .wm-emp-name {
        font-weight: 600;
    }

    .wm-avatar {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background-color: var(--wm-primary);
        color: #ffffff;
        font-size: 0.75rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        object-fit: cover;
    }

    .wm-badge {
        display: inline-block;
        padding: 0.3rem 0.7rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 700;
    }

    .wm-badge-active {
        background-color: var(--wm-success-light);
        color: var(--wm-success);
    }

    .wm-badge-inactive {
        background-color: var(--wm-danger-light);
        color: var(--wm-danger);
    }

    .wm-empty-state {
        padding: 1.25rem !important;
        color: var(--wm-muted) !important;
        font-size: 0.88rem;
    }
</style>