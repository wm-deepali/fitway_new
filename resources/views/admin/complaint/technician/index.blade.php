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
    .brand-page { background: var(--bg); padding: 24px 28px; min-height: 100vh; font-family: var(--font); color: var(--text-primary); box-sizing: border-box; }
    .brand-page * { box-sizing: border-box; }
    .brand-page-header { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; margin-bottom: 20px; }
    .brand-page-header h1 { font-size: 20px; font-weight: 650; margin: 0; }
    .brand-breadcrumb { font-size: 12.5px; color: var(--text-hint); margin-top: 3px; }
    .brand-breadcrumb a { color: var(--accent); text-decoration: none; }
    .brand-breadcrumb a:hover { text-decoration: underline; }
    .brand-breadcrumb span { margin: 0 5px; }
    .btn-primary-dash { display: inline-flex; align-items: center; gap: 6px; background: var(--accent); color: #fff !important; border: none; border-radius: var(--radius-sm); padding: 9px 18px; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none !important; box-shadow: 0 1px 3px rgba(48,61,137,.25); }
    .btn-primary-dash:hover { background: #252f70; }
    .btn-secondary-dash { display: inline-flex; align-items: center; gap: 6px; background: var(--surface); color: var(--text-primary) !important; border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 9px 18px; font-size: 13px; font-weight: 500; cursor: pointer; text-decoration: none !important; }
    .btn-secondary-dash:hover { background: var(--bg); }
    .icon-btn { display: inline-flex; align-items: center; justify-content: center; width: 30px; height: 30px; border-radius: var(--radius-sm); border: 1px solid var(--border); background: var(--surface); color: var(--text-secondary) !important; text-decoration: none !important; cursor: pointer; }
    .icon-btn:hover { background: var(--bg); }
    .icon-btn.danger:hover { background: #fdecec; color: #b22222 !important; border-color: #f3c6c6; }
    .brand-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-card); }
    .filters-bar { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; padding: 16px 20px; border-bottom: 1px solid var(--border); }
    .form-control-styled { height: 38px; border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 0 12px; font-size: 13px; font-family: var(--font); color: var(--text-primary); outline: none; background: var(--surface); }
    .filters-bar input[type="text"].form-control-styled { min-width: 240px; }
    .filters-bar .clear-link { font-size: 12.5px; color: var(--text-hint); text-decoration: none; }
    .filters-bar .clear-link:hover { color: var(--accent); }
    table.brands-table { width: 100%; border-collapse: collapse; }
    table.brands-table th, table.brands-table td { padding: 12px 16px; text-align: left; border-bottom: 1px solid var(--border); font-size: 13px; vertical-align: middle; }
    table.brands-table th { font-size: 11.5px; text-transform: uppercase; letter-spacing: .04em; color: var(--text-hint); font-weight: 650; }
    table.brands-table tbody tr:hover { background: #fafbfc; }
    .brand-cell { display: flex; align-items: center; gap: 10px; }
    .brand-cell img { width: 40px; height: 40px; object-fit: cover; border-radius: 50%; border: 1px solid var(--border); background: var(--bg); }
    .brand-name { font-weight: 600; }
    .brand-slug { font-size: 11.5px; color: var(--text-hint); }
    .badge { display: inline-block; padding: 3px 10px; border-radius: 999px; font-size: 11.5px; font-weight: 600; }
    .badge.active { background: #e4f5e9; color: #1e7a3f; }
    .badge.inactive { background: #f1f2f4; color: var(--text-hint); }
    .row-actions { display: flex; gap: 6px; }
    .empty-state { padding: 48px 20px; text-align: center; color: var(--text-hint); font-size: 13.5px; }
    .pagination-wrap { padding: 16px 20px; border-top: 1px solid var(--border); }
    @media (max-width: 768px) { table.brands-table { display: block; overflow-x: auto; } }
    </style>

    <div class="app-content content container-fluid">
        <div class="brand-page">

            <div class="brand-page-header">
                <div>
                    <h1>Technicians</h1>
                    <div class="brand-breadcrumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        Complaint Module
                        <span>›</span>
                        Technicians
                    </div>
                </div>
                <a href="{{ route('admin.complaint.technicians.create') }}" class="btn-primary-dash">
                    <i class="fa fa-plus"></i> Add Technician
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success" style="margin-bottom:16px">{{ session('success') }}</div>
            @endif

            <div class="brand-card">
                <form action="{{ route('admin.complaint.technicians.index') }}" method="GET" class="filters-bar">
                    <input type="text" name="search" class="form-control-styled" placeholder="Search technicians…" value="{{ request('search') }}">
                    <button type="submit" class="btn-secondary-dash">
                        <i class="fa fa-search"></i> Search
                    </button>
                    @if(request()->hasAny(['search']))
                        <a href="{{ route('admin.complaint.technicians.index') }}" class="clear-link">Clear</a>
                    @endif
                </form>

                @if($technicians->isEmpty())
                    <div class="empty-state">No technicians found.</div>
                @else
                    <table class="brands-table">
                       <thead>
    <tr>
        <th>Technician</th>
        <th>Mobile Number</th>
        <th>WhatsApp Number</th>
        <th>Total Complaints</th>
        <th>Completed</th>
        <th>Pending</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody>
    @foreach($technicians as $technician)
        @php
            $total     = $technician->total_complaints_count;
            $completed = $technician->completed_complaints_count;
            $pending   = $technician->pending_complaints_count;

            $singleTotal     = $total === 1 ? $technician->complaints->first() : null;
            $singleCompleted = $completed === 1 ? $technician->complaints->where('status', \App\Models\Complaint::STATUS_COMPLETED)->first() : null;
            $singlePending   = $pending === 1 ? $technician->complaints->where('status', '!=', \App\Models\Complaint::STATUS_COMPLETED)->first() : null;
        @endphp
        <tr id="technician-row-{{ $technician->id }}">
            <td>
                <div class="brand-cell">
                    @if($technician->photograph_url)
                        <img src="{{ $technician->photograph_url }}" alt="{{ $technician->full_name }}">
                    @else
                        <img src="{{ asset('assets/images/no-image.svg') }}" alt="{{ $technician->full_name }}">
                    @endif
                    <div>
                        <div class="brand-name">{{ $technician->full_name }}</div>
                    </div>
                </div>
            </td>
            <td>{{ $technician->mobile_number }}</td>
            <td>{{ $technician->whatsapp_number ?? '—' }}</td>

            <td>
                @if($total === 0)
                    <span class="brand-slug">0</span>
                @elseif($total === 1)
                    <a href="{{ route('admin.complaint.complaints.edit', $singleTotal->id) }}">{{ $total }}</a>
                @else
                    <a href="{{ route('admin.complaint.complaints.index', ['technician_id' => $technician->id]) }}">{{ $total }}</a>
                @endif
            </td>

            <td>
                @if($completed === 0)
                    <span class="brand-slug">0</span>
                @elseif($completed === 1)
                    <a href="{{ route('admin.complaint.complaints.edit', $singleCompleted->id) }}">{{ $completed }}</a>
                @else
                    <a href="{{ route('admin.complaint.complaints.index', ['technician_id' => $technician->id, 'status' => 'completed']) }}">{{ $completed }}</a>
                @endif
            </td>

            <td>
                @if($pending === 0)
                    <span class="brand-slug">0</span>
                @elseif($pending === 1)
                    <a href="{{ route('admin.complaint.complaints.edit', $singlePending->id) }}">{{ $pending }}</a>
                @else
                    <a href="{{ route('admin.complaint.complaints.index', ['technician_id' => $technician->id, 'status' => 'pending']) }}">{{ $pending }}</a>
                @endif
            </td>

            <td>
                <div class="row-actions">
                    <a href="{{ route('admin.complaint.technicians.edit', $technician) }}" class="icon-btn" title="Edit">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <button type="button" class="icon-btn danger" title="Delete"
                        onclick="deleteTechnician({{ $technician->id }})">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
    @endforeach
</tbody>
                    </table>

                    <div class="pagination-wrap">
                        {{ $technicians->links('pagination::bootstrap-4') }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>

@include('admin.footer')

<script>
function deleteTechnician(id) {
    Swal.fire({
        title: 'Delete this technician?',
        text: 'This action cannot be undone.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        confirmButtonColor: '#b22222',
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (!result.isConfirmed) return;

        fetch(`{{ url('admin/complaint/technicians') }}/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
            },
        })
            .then(res => res.json())
            .then(res => {
                if (res.success) {
                    document.getElementById(`technician-row-${id}`).remove();
                    Swal.fire('Deleted', res.message, 'success');
                } else {
                    Swal.fire('Error', res.message || 'Something went wrong.', 'error');
                }
            })
            .catch(() => Swal.fire('Error', 'Something went wrong.', 'error'));
    });
}
</script>