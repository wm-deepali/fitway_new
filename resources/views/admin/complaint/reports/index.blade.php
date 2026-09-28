@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Reports</li>
                </ol>
            </div>
        </div>

        <div class="content-wrapper pb-4">

            {{-- Filters --}}
            <div class="card wm-card mb-4">
                <div class="card-header wm-card-header d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 wm-card-title">Complaint Reports</h4>
                    <a href="{{ route('admin.complaint-reports.export', request()->query()) }}"
                        class="btn wm-btn-outline">
                        <i class="fa-solid fa-file-csv"></i> Export CSV
                    </a>
                </div>

                <div class="card-body wm-form-body">
                    <form method="GET" action="{{ route('admin.complaint-reports.index') }}">
                        <div class="row">

                            <div class="col-md-2">
                                <div class="form-group wm-form-group mb-0">
                                    <label class="wm-label">From</label>
                                    <input type="date" name="from" value="{{ $from }}" class="form-control wm-input">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group wm-form-group mb-0">
                                    <label class="wm-label">To</label>
                                    <input type="date" name="to" value="{{ $to }}" class="form-control wm-input">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group wm-form-group mb-0">
                                    <label class="wm-label">Status</label>
                                    <select name="status" class="form-control wm-input">
                                        <option value="">All</option>
                                        @foreach(\App\Models\Complaint::$statusLabels as $val => $label)
                                            <option value="{{ $val }}" {{ (string) request('status') === (string) $val ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group wm-form-group mb-0">
                                    <label class="wm-label">Technician</label>
                                    <select name="technician_id" class="form-control wm-input">
                                        <option value="">All</option>
                                        <option value="none" {{ request('technician_id') === 'none' ? 'selected' : '' }}>Unassigned</option>
                                        @foreach($technicians as $t)
                                            <option value="{{ $t->id }}" {{ (string) request('technician_id') === (string) $t->id ? 'selected' : '' }}>{{ $t->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group wm-form-group mb-0">
                                    <label class="wm-label">Type</label>
                                    <select name="complaint_type" class="form-control wm-input">
                                        <option value="">All</option>
                                        <option value="paid" {{ request('complaint_type') === 'paid' ? 'selected' : '' }}>Paid</option>
                                        <option value="unpaid" {{ request('complaint_type') === 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn wm-btn-primary btn-block mr-2">
                                    <i class="fa-solid fa-filter"></i> Apply
                                </button>
                                <a href="{{ route('admin.complaint-reports.index') }}" class="btn wm-btn-cancel">Reset</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            {{-- Summary cards --}}
            <div class="row mb-4">
                @php
                    $cards = [
                        ['Total Complaints', $summary['total'], 'fa-clipboard-list', 'primary'],
                        ['New', $summary['new'], 'fa-circle-exclamation', 'warning'],
                        ['Under Process', $summary['process'], 'fa-gears', 'info'],
                        ['Completed', $summary['completed'], 'fa-circle-check', 'success'],
                        ['Unassigned', $summary['unassigned'], 'fa-user-slash', 'danger'],
                        ['Paid Revenue', '₹' . number_format($summary['revenue'], 2), 'fa-indian-rupee-sign', 'primary'],
                    ];
                @endphp

                @foreach($cards as [$label, $value, $icon, $tone])
                    <div class="col-xl-2 col-md-4 col-6 mb-3">
                        <div class="wm-stat wm-stat-{{ $tone }}">
                            <div class="wm-stat-icon"><i class="fa-solid {{ $icon }}"></i></div>
                            <div class="wm-stat-value">{{ $value }}</div>
                            <div class="wm-stat-label">{{ $label }}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row mb-4">
                <div class="col-lg-8 mb-3 mb-lg-0">
                    <div class="card wm-card h-100">
                        <div class="card-header wm-card-header">
                            <h4 class="mb-0 wm-card-title">Complaints Trend</h4>
                        </div>
                        <div class="card-body">
                            <div style="position:relative; height:260px;"><canvas id="trendChart"></canvas></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card wm-card h-100">
                        <div class="card-header wm-card-header">
                            <h4 class="mb-0 wm-card-title">Status Split</h4>
                        </div>
                        <div class="card-body">
                            <div style="position:relative; height:220px;"><canvas id="statusChart"></canvas></div>
                            <p class="text-center text-muted small mt-3 mb-0">
                                Completion rate: <strong>{{ $summary['rate'] }}%</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Technician-wise --}}
            <div class="card wm-card mb-4">
                <div class="card-header wm-card-header">
                    <h4 class="mb-0 wm-card-title">Technician-wise Report</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0 wm-table">
                        <thead>
                            <tr>
                                <th>Technician</th>
                                <th width="120">Total</th>
                                <th width="120">Completed</th>
                                <th width="120">Pending</th>
                                <th width="180">Completion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($technicianStats as $row)
                                @php $pct = $row->total > 0 ? round(($row->completed / $row->total) * 100) : 0; @endphp
                                <tr>
                                    <td class="wm-emp-name">{{ $row->technician->full_name ?? 'Deleted technician' }}</td>
                                    <td>{{ $row->total }}</td>
                                    <td>{{ $row->completed }}</td>
                                    <td>{{ $row->pending }}</td>
                                    <td>
                                        <div class="wm-progress"><span style="width: {{ $pct }}%"></span></div>
                                        <small class="text-muted">{{ $pct }}%</small>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted wm-empty-state">
                                        No assigned complaints in this range.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Detail list --}}
            <div class="card wm-card">
                <div class="card-header wm-card-header">
                    <h4 class="mb-0 wm-card-title">Complaints</h4>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered mb-0 wm-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer</th>
                                <th>Location</th>
                                <th>Type</th>
                                <th>Technician</th>
                                <th>Status</th>
                                <th>Raised On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($complaints as $c)
                                <tr>
                                    <td class="wm-emp-name">{{ $c->complaint_code }}</td>
                                    <td>
                                        {{ $c->customer_name }}
                                        <div class="text-muted small">{{ $c->mobile_number }}</div>
                                    </td>
                                    <td>{{ collect([$c->city->name ?? null, $c->state->name ?? null])->filter()->implode(', ') ?: '-' }}</td>
                                    <td>
                                        {{ ucfirst($c->complaint_type) }}
                                        @if($c->complaint_type === 'paid' && $c->paid_price)
                                            <div class="text-muted small">₹{{ number_format($c->paid_price, 2) }}</div>
                                        @endif
                                    </td>
                                    <td>{{ $c->technician->full_name ?? 'Unassigned' }}</td>
                                    <td><span class="badge {{ $c->status_badge_class }}">{{ $c->status_label }}</span></td>
                                    <td>{{ $c->created_at->format('d M Y, h:i A') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted wm-empty-state">No complaints found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer wm-card-footer d-flex align-items-center justify-content-between">
                    <small class="text-muted">
                        Showing {{ $complaints->firstItem() ?? 0 }} to {{ $complaints->lastItem() ?? 0 }}
                        of {{ $complaints->total() }} entries
                    </small>
                    {{ $complaints->links('pagination::bootstrap-4') }}
                </div>
            </div>

        </div>
    </div>
</div>

@include('admin.footer')

{{-- Chart.js only. Do NOT reload jQuery/Bootstrap here (it breaks the profile dropdown). --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    new Chart(document.getElementById('trendChart'), {
        type: 'line',
        data: {
            labels: @json($trend->keys()->map(fn ($d) => \Carbon\Carbon::parse($d)->format('d M'))->values()),
            datasets: [{
                label: 'Complaints',
                data: @json($trend->values()),
                borderColor: '#303d89',
                backgroundColor: 'rgba(48,61,137,0.08)',
                fill: true, tension: 0.35, pointRadius: 3
            }]
        },
        options: {
            responsive: true, maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
        }
    });

    new Chart(document.getElementById('statusChart'), {
        type: 'doughnut',
        data: {
            labels: ['New', 'Under Process', 'Completed'],
            datasets: [{
                data: [{{ $summary['new'] }}, {{ $summary['process'] }}, {{ $summary['completed'] }}],
                backgroundColor: ['#916a00', '#0069d9', '#007a5e'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true, maintainAspectRatio: false,
            plugins: { legend: { position: 'bottom', labels: { boxWidth: 10, font: { size: 11 } } } }
        }
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
    }

    .wm-card { border: 1px solid var(--wm-border); border-radius: var(--wm-radius); box-shadow: 0 1px 3px rgba(0,0,0,.08); overflow: hidden; }
    .wm-card-header { background: #fff; border-bottom: 1px solid var(--wm-border); padding: 1rem 1.25rem; }
    .wm-card-title { font-weight: 650; color: var(--wm-text); }
    .wm-card-footer { background: #fafafb; border-top: 1px solid var(--wm-border); padding: .85rem 1.25rem; }
    .wm-form-body { padding: 1.25rem; }

    .wm-label { font-size: .78rem; font-weight: 600; text-transform: uppercase; letter-spacing: .4px; color: var(--wm-muted); margin-bottom: 6px; display: block; }
    .wm-input { border: 1px solid var(--wm-border) !important; border-radius: 8px !important; padding: .55rem .8rem !important; font-size: .9rem; background: #fbfbfc; }
    .wm-input:focus { border-color: var(--wm-primary) !important; box-shadow: 0 0 0 3px rgba(48,61,137,.12) !important; background: #fff; }

    .wm-btn-primary, .wm-btn-outline, .wm-btn-cancel { border-radius: 8px !important; font-weight: 600 !important; font-size: .85rem !important; padding: .55rem 1rem !important; border: 1px solid transparent !important; }
    .wm-btn-primary { background: var(--wm-primary) !important; border-color: var(--wm-primary) !important; color: #fff !important; }
    .wm-btn-outline { background: #fff !important; border-color: var(--wm-primary) !important; color: var(--wm-primary) !important; }
    .wm-btn-outline:hover { background: var(--wm-primary) !important; color: #fff !important; }
    .wm-btn-cancel { background: #fff !important; border-color: var(--wm-border) !important; color: var(--wm-muted) !important; }

    .wm-stat { background: #fff; border: 1px solid var(--wm-border); border-radius: var(--wm-radius); padding: 16px; height: 100%; position: relative; box-shadow: 0 1px 3px rgba(0,0,0,.06); }
    .wm-stat-icon { width: 34px; height: 34px; border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-bottom: 10px; font-size: 14px; }
    .wm-stat-value { font-size: 22px; font-weight: 700; color: var(--wm-text); line-height: 1.1; }
    .wm-stat-label { font-size: 12px; color: var(--wm-muted); margin-top: 4px; }
    .wm-stat-primary .wm-stat-icon { background: #eef0fa; color: #303d89; }
    .wm-stat-warning .wm-stat-icon { background: #fff5cc; color: #916a00; }
    .wm-stat-info .wm-stat-icon { background: #e8f2ff; color: #0069d9; }
    .wm-stat-success .wm-stat-icon { background: #e3f1ec; color: #007a5e; }
    .wm-stat-danger .wm-stat-icon { background: #fce8e8; color: #b22222; }

    .wm-table thead tr th { background: var(--wm-primary); color: #fff; font-weight: 600; font-size: .78rem; text-transform: uppercase; letter-spacing: .4px; border-color: var(--wm-primary); padding: .75rem .9rem; }
    .wm-table tbody tr td { padding: .7rem .9rem; vertical-align: middle; font-size: .88rem; border-color: var(--wm-border); }
    .wm-table tbody tr:nth-child(even) { background: #f8f8f9; }
    .wm-table tbody tr:hover { background: var(--wm-primary-light); }
    .wm-emp-name { font-weight: 600; }
    .wm-empty-state { padding: 1.25rem !important; }

    .wm-progress { height: 6px; background: #eceef0; border-radius: 10px; overflow: hidden; margin-bottom: 4px; }
    .wm-progress span { display: block; height: 100%; background: #007a5e; border-radius: 10px; }
</style>