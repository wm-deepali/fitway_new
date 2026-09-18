@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    <style>
    :root {
        --bg: #f1f2f4; --surface: #ffffff; --border: #e3e5e8;
        --text-primary: #202223; --text-secondary:#6d7175; --text-hint:#8c9196;
        --accent: #303d89; --radius-sm: 8px; --radius-md: 12px;
        --shadow-card: 0 1px 3px rgba(0,0,0,.08), 0 0 0 1px var(--border);
        --font: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    }
    .vend-page { background: var(--bg); padding: 24px 28px; min-height: 100vh; font-family: var(--font); color: var(--text-primary); box-sizing: border-box; }
    .vend-page * { box-sizing: border-box; }
    .vend-page-header { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; margin-bottom: 20px; }
    .vend-page-header h1 { font-size: 20px; font-weight: 650; margin: 0; }
    .vend-breadcrumb { font-size: 12.5px; color: var(--text-hint); margin-top: 3px; }
    .vend-breadcrumb a { color: var(--accent); text-decoration: none; }
    .vend-breadcrumb a:hover { text-decoration: underline; }
    .vend-breadcrumb span { margin: 0 5px; }
    .btn-primary-dash { display: inline-flex; align-items: center; gap: 6px; background: var(--accent); color: #fff !important; border: none; border-radius: var(--radius-sm); padding: 9px 18px; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none !important; box-shadow: 0 1px 3px rgba(48,61,137,.25); }
    .btn-primary-dash:hover { background: #252f70; }
    .btn-secondary-dash { display: inline-flex; align-items: center; gap: 6px; background: var(--surface); color: var(--text-primary) !important; border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 9px 18px; font-size: 13px; font-weight: 500; cursor: pointer; text-decoration: none !important; }
    .btn-secondary-dash:hover { background: var(--bg); }
    .icon-btn { display: inline-flex; align-items: center; justify-content: center; width: 30px; height: 30px; border-radius: var(--radius-sm); border: 1px solid var(--border); background: var(--surface); color: var(--text-secondary) !important; text-decoration: none !important; cursor: pointer; }
    .icon-btn:hover { background: var(--bg); }
    .icon-btn.danger:hover { background: #fdecec; color: #b22222 !important; border-color: #f3c6c6; }
    .vend-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-card); }
    .filters-bar { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; padding: 16px 20px; border-bottom: 1px solid var(--border); }
    .form-control-styled {
        height: 38px; border: 1px solid var(--border); border-radius: var(--radius-sm);
        padding: 0 12px; font-size: 13px; font-family: var(--font); color: var(--text-primary);
        outline: none; background: var(--surface);
    }
    .filters-bar select.form-control-styled { min-width: 160px; }
    .filters-bar input[type="text"].form-control-styled { min-width: 220px; }
    .filters-bar .clear-link { font-size: 12.5px; color: var(--text-hint); text-decoration: none; }
    .filters-bar .clear-link:hover { color: var(--accent); }
    table.vendors-table { width: 100%; border-collapse: collapse; }
    table.vendors-table th, table.vendors-table td { padding: 12px 16px; text-align: left; border-bottom: 1px solid var(--border); font-size: 13px; vertical-align: middle; }
    table.vendors-table th { font-size: 11.5px; text-transform: uppercase; letter-spacing: .04em; color: var(--text-hint); font-weight: 650; }
    table.vendors-table tbody tr:hover { background: #fafbfc; }
    .vend-name { font-weight: 600; }
    .vend-sub { font-size: 11.5px; color: var(--text-hint); }
    .badge { display: inline-block; padding: 3px 10px; border-radius: 999px; font-size: 11.5px; font-weight: 600; }
    .badge.active { background: #e4f5e9; color: #1e7a3f; }
    .badge.inactive { background: #f1f2f4; color: var(--text-hint); }
    .row-actions { display: flex; gap: 6px; }
    .empty-state { padding: 48px 20px; text-align: center; color: var(--text-hint); font-size: 13.5px; }
    .pagination-wrap { padding: 16px 20px; border-top: 1px solid var(--border); }
    @media (max-width: 768px) { table.vendors-table { display: block; overflow-x: auto; } }
    </style>

    <div class="app-content content container-fluid">
        <div class="vend-page">

            <div class="vend-page-header">
                <div>
                    <h1>Vendors</h1>
                    <div class="vend-breadcrumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        Vendors
                    </div>
                </div>
                <a href="{{ route('admin.manage-vendors.create') }}" class="btn-primary-dash">
                    <i class="fa fa-plus"></i> Add Vendor
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success" style="margin-bottom:16px">{{ session('success') }}</div>
            @endif

            <div class="vend-card">
                <form action="{{ route('admin.manage-vendors.index') }}" method="GET" class="filters-bar" id="filters-form">
                    <select id="state_id" name="state_id" class="form-control-styled">
                        <option value="">All States</option>
                        @foreach($states as $state)
                            <option value="{{ $state->id }}" {{ request('state_id') == $state->id ? 'selected' : '' }}>
                                {{ $state->name }}
                            </option>
                        @endforeach
                    </select>

                    <select id="city_id" name="city_id" class="form-control-styled">
                        <option value="">All Cities</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}" {{ request('city_id') == $city->id ? 'selected' : '' }}>
                                {{ $city->name }}
                            </option>
                        @endforeach
                    </select>

                    <input type="text" name="search" class="form-control-styled" placeholder="Search vendors, GST, contact, mobile…" value="{{ request('search') }}">

                    <button type="submit" class="btn-secondary-dash">
                        <i class="fa fa-filter"></i> Filter
                    </button>

                    @if(request()->hasAny(['state_id', 'city_id', 'search']))
                        <a href="{{ route('admin.manage-vendors.index') }}" class="clear-link">Clear filters</a>
                    @endif
                </form>

                @if($vendors->isEmpty())
                    <div class="empty-state">No vendors found.</div>
                @else
                    <table class="vendors-table">
                        <thead>
                            <tr>
                                <th>Vendor</th>
                                <th>GST Number</th>
                                <th>Contact</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vendors as $vendor)
                                <tr id="vendor-row-{{ $vendor->id }}">
                                    <td>
                                        <div class="vend-name">{{ $vendor->vendor_name }}</div>
                                        <div class="vend-sub">{{ $vendor->email }}</div>
                                    </td>
                                    <td>{{ $vendor->gst_number ?? '—' }}</td>
                                    <td>
                                        <div>{{ $vendor->contact_person_name }}</div>
                                        <div class="vend-sub">
                                            {{ $vendor->mobile_number }}
                                            @if($vendor->whatsapp_number) · WA: {{ $vendor->whatsapp_number }} @endif
                                        </div>
                                    </td>
                                    <td>
                                        {{ $vendor->city->name ?? '—' }}@if($vendor->state), {{ $vendor->state->name }}@endif
                                        <div class="vend-sub">{{ $vendor->pincode }}</div>
                                    </td>
                                    <td>
                                        <span class="badge {{ $vendor->status ? 'active' : 'inactive' }}">
                                            {{ $vendor->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="row-actions">
                                            <a href="{{ route('admin.manage-vendors.edit', $vendor) }}" class="icon-btn" title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button type="button" class="icon-btn danger" title="Delete"
                                                onclick="deleteVendor({{ $vendor->id }})">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination-wrap">
                        {{ $vendors->links('pagination::bootstrap-4') }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>

@include('admin.footer')

<script>
document.getElementById('state_id').addEventListener('change', function () {
    const citySelect = document.getElementById('city_id');
    const stateId = this.value;

    citySelect.innerHTML = '<option value="">Loading…</option>';

    if (!stateId) {
        citySelect.innerHTML = '<option value="">All Cities</option>';
        return;
    }

    fetch("{{ route('admin.vendors.getCities') }}?state_id=" + stateId)
        .then(res => res.json())
        .then(res => {
            citySelect.innerHTML = '<option value="">All Cities</option>';
            res.data.forEach(city => {
                const opt = document.createElement('option');
                opt.value = city.id;
                opt.textContent = city.name;
                citySelect.appendChild(opt);
            });
        });
});

function deleteVendor(vendorId) {
    Swal.fire({
        title: 'Delete this vendor?',
        text: 'This action cannot be undone.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        confirmButtonColor: '#b22222',
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (!result.isConfirmed) return;

        fetch(`/admin/manage-vendors/${vendorId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
            },
        })
            .then(res => res.json())
            .then(res => {
                if (res.success) {
                    document.getElementById(`vendor-row-${vendorId}`).remove();
                    Swal.fire('Deleted', res.message, 'success');
                } else {
                    Swal.fire('Error', res.message || 'Something went wrong.', 'error');
                }
            })
            .catch(() => Swal.fire('Error', 'Something went wrong.', 'error'));
    });
}
</script>