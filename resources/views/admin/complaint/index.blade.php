@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Manage Complaints</li>
                </ol>
            </div>
        </div>

        <div class="content-wrapper pb-4">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if($filterTechnician || $filterCustomer)
    <div class="alert alert-info d-flex align-items-center justify-content-between" style="margin-bottom:16px">
        <span>
            Showing complaints
            @if($filterTechnician) assigned to <strong>{{ $filterTechnician->full_name }}</strong> @endif
            @if($filterCustomer) for customer <strong>{{ $filterCustomer->customer_name }}</strong> @endif
            @if(request('status')) — status: <strong>{{ ucfirst(request('status')) }}</strong> @endif
        </span>
        <a href="{{ route('admin.complaint.complaints.index') }}" class="btn btn-sm wm-btn-outline">Clear filter</a>
    </div>
@endif

            <div class="card wm-quotes-card">

                <div class="card-header d-flex align-items-center justify-content-between wm-quotes-header">

                    <h4 class="mb-0 wm-quotes-title">Manage Complaints</h4>

                    <div class="d-flex wm-quotes-actions">

                        <form action="{{ route('admin.complaint.complaints.index') }}" method="GET" class="d-flex mr-2 wm-search-form">
                            <div class="wm-search-wrap">
                                <i class="fa fa-search wm-search-icon"></i>
                                <input type="text" name="search" class="form-control form-control-sm mr-2 wm-search-input"
                                    placeholder="Search Complaint ID, customer, mobile..." value="{{ request('search') }}">
                            </div>
                            <button type="submit" class="btn btn-sm wm-btn-primary"><i class="fa fa-search"></i></button>
                        </form>

                        <a href="{{ route('admin.complaint.complaints.create') }}" class="btn btn-sm wm-btn-success">
                            <i class="fa fa-plus"></i> Raise Complaint
                        </a>

                    </div>

                </div>

                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table table-hover mb-0 wm-quotes-table">

                            <thead>
                                <tr>
                                    <th>Complaint ID</th>
                                    <th>Raised On</th>
                                    <th>Customer Info</th>
                                    <th>Paid / Unpaid</th>
                                    <th>Schedule Date</th>
                                    <th>Assigned To</th>
                                    <th>Current Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($complaints as $complaint)
                                    <tr id="complaint-row-{{ $complaint->id }}">
                                        <td><span class="wm-badge-id">{{ $complaint->complaint_code }}</span></td>
                                        <td>{{ $complaint->created_at->format('d M Y, h:i A') }}</td>
                                        <td>
                                            <div class="wm-cust-name">{{ $complaint->customer_name }}</div>
                                            <div class="wm-cust-mobile">{{ $complaint->mobile_number }}</div>
                                        </td>
                                        <td>
                                            <span class="badge {{ $complaint->complaint_type === 'paid' ? 'badge-success' : 'badge-warning' }}">
                                                {{ ucfirst($complaint->complaint_type) }}
                                            </span>
                                        </td>
                                        <td>{{ $complaint->schedule_date ? $complaint->schedule_date->format('d M Y') : '-' }}</td>
                                        <td>{{ $complaint->technician->full_name ?? '-' }}</td>
                                        <td><span class="badge {{ $complaint->status_badge_class }}">{{ $complaint->status_label }}</span></td>
                                        <td>
                                            <div class="wm-action-group">
                                                <a href="{{ route('admin.complaint.complaints.edit', $complaint) }}" class="btn btn-sm wm-btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-sm wm-btn-outline" title="Add Notes"><i class="fa fa-sticky-note"></i></a>
                                                <button type="button" class="btn btn-sm wm-btn-danger" title="Delete" onclick="deleteComplaint({{ $complaint->id }})"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted py-4">No complaints found.</td>
                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

                <div class="card-footer wm-quotes-footer d-flex align-items-center justify-content-between">
                    <span>Showing {{ $complaints->firstItem() ?? 0 }} to {{ $complaints->lastItem() ?? 0 }} of {{ $complaints->total() }} complaints</span>
                    {{ $complaints->links('pagination::bootstrap-4') }}
                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')

<script>
function deleteComplaint(id) {
    Swal.fire({
        title: 'Delete this complaint?',
        text: 'This action cannot be undone.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        confirmButtonColor: '#b22222',
    }).then((result) => {
        if (!result.isConfirmed) return;
        fetch(`{{ url('admin/complaint/complaints') }}/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
            },
        })
        .then(res => res.json())
        .then(res => {
            if (res.success) {
                document.getElementById(`complaint-row-${id}`).remove();
            } else {
                Swal.fire('Error', res.message || 'Something went wrong.', 'error');
            }
        })
        .catch(() => Swal.fire('Error', 'Something went wrong.', 'error'));
    });
}
</script>

<style>
    :root {
        --wm-primary: #303d89;
        --wm-primary-hover: #252f70;
        --wm-primary-light: #eef0fa;
        --wm-border: #e3e5e8;
        --wm-text: #202223;
        --wm-muted: #6d7175;
        --wm-row-odd: #ffffff;
        --wm-row-even: #f8f8f9;
        --wm-radius: 12px;
        --wm-danger: #b3261e;
        --wm-danger-light: #fbeceb;
    }

    .wm-quotes-card { border: 1px solid var(--wm-border); border-radius: var(--wm-radius); box-shadow: 0 1px 3px rgba(0, 0, 0, .08), 0 0 0 1px var(--wm-border); overflow: hidden; }
    .wm-quotes-header { background: #ffffff; border-bottom: 1px solid var(--wm-border); padding: 1rem 1.25rem; flex-wrap: wrap; gap: 0.75rem; }
    .wm-quotes-title { font-weight: 650; color: var(--wm-text); letter-spacing: 0.2px; }
    .wm-quotes-actions { gap: 0.5rem; align-items: center; flex-wrap: wrap; }
    .wm-search-form { align-items: center; }
    .wm-search-wrap { position: relative; display: flex; align-items: center; }
    .wm-search-icon { position: absolute; left: 12px; font-size: 12px; color: var(--wm-muted); pointer-events: none; }
    .wm-search-input { padding-left: 30px !important; border-radius: 8px !important; border: 1px solid var(--wm-border) !important; background: #fbfbfc; min-width: 260px; }
    .wm-search-input:focus { border-color: var(--wm-primary) !important; box-shadow: 0 0 0 3px rgba(48, 61, 137, 0.12) !important; background: #fff; outline: none; }

    .wm-btn-primary, .wm-btn-success, .wm-btn-info, .wm-btn-outline, .wm-btn-danger {
        border-radius: 8px !important; font-weight: 600; font-size: 0.8rem; padding: 0.4rem 0.85rem; border: 1px solid transparent;
        display: inline-flex; align-items: center; justify-content: center; gap: 6px; white-space: nowrap; line-height: 1;
    }
    .wm-btn-primary, .wm-btn-success { background-color: var(--wm-primary); color: #ffffff !important; }
    .wm-btn-primary:hover, .wm-btn-success:hover { background-color: var(--wm-primary-hover); color: #ffffff !important; }
    .wm-btn-info { background-color: var(--wm-primary-light); color: var(--wm-primary) !important; border-color: var(--wm-border); }
    .wm-btn-info:hover { background-color: var(--wm-primary); color: #fff !important; }
    .wm-btn-outline { background-color: #fff; color: var(--wm-primary) !important; border-color: var(--wm-primary); }
    .wm-btn-outline:hover { background-color: var(--wm-primary); color: #fff !important; }
    .wm-btn-danger { background-color: var(--wm-danger-light); color: var(--wm-danger) !important; border-color: var(--wm-danger-light); }
    .wm-btn-danger:hover { background-color: var(--wm-danger); border-color: var(--wm-danger); color: #fff !important; }

    .wm-action-group { display: flex; flex-direction: row; align-items: center; flex-wrap: nowrap; gap: 6px; }

    .wm-quotes-table { margin-bottom: 0; }
    .wm-quotes-table thead tr th { background-color: var(--wm-primary); color: #ffffff; font-weight: 600; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.4px; border: none; padding: 0.85rem 1rem; white-space: nowrap; }
    .wm-quotes-table tbody tr td { padding: 0.8rem 1rem; vertical-align: middle; color: var(--wm-text); font-size: 0.88rem; border-color: var(--wm-border); }
    .wm-quotes-table tbody tr:nth-child(odd) { background-color: var(--wm-row-odd); }
    .wm-quotes-table tbody tr:nth-child(even) { background-color: var(--wm-row-even); }
    .wm-quotes-table tbody tr:hover { background-color: var(--wm-primary-light) !important; }

    .wm-badge-id { display: inline-block; background-color: var(--wm-primary-light); color: var(--wm-primary); font-weight: 600; font-size: 0.78rem; padding: 3px 10px; border-radius: 20px; }
    .wm-cust-name { font-weight: 600; color: var(--wm-text); }
    .wm-cust-mobile { font-size: 0.78rem; color: var(--wm-muted); margin-top: 2px; }

    .wm-quotes-footer { background: #fafafb; border-top: 1px solid var(--wm-border); padding: 0.75rem 1.25rem; font-size: 0.85rem; color: var(--wm-muted); }

    @media (max-width: 576px) {
        .wm-quotes-header { flex-direction: column; align-items: flex-start !important; }
        .wm-quotes-actions { width: 100%; }
        .wm-search-input { min-width: 0; width: 100%; }
        .wm-search-form { flex: 1; }
        .wm-action-group { flex-wrap: wrap; }
    }
</style>