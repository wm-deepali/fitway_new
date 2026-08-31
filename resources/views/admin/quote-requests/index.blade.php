{{-- resources/views/admin/quote-requests/index.blade.php --}}
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
    .cat-page { background: var(--bg); padding: 24px 28px; min-height: 100vh; font-family: var(--font); color: var(--text-primary); box-sizing: border-box; }
    .cat-page * { box-sizing: border-box; }
    .cat-page-header { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; margin-bottom: 20px; }
    .cat-page-header h1 { font-size: 20px; font-weight: 650; margin: 0; }
    .cat-breadcrumb { font-size: 12.5px; color: var(--text-hint); margin-top: 3px; }
    .cat-breadcrumb a { color: var(--accent); text-decoration: none; }
    .cat-breadcrumb a:hover { text-decoration: underline; }
    .cat-breadcrumb span { margin: 0 5px; }
    .btn-secondary-dash { display: inline-flex; align-items: center; gap: 6px; background: var(--surface); color: var(--text-primary) !important; border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 9px 18px; font-size: 13px; font-weight: 500; cursor: pointer; text-decoration: none !important; }
    .btn-secondary-dash:hover { background: var(--bg); }
    .icon-btn { display: inline-flex; align-items: center; justify-content: center; width: 30px; height: 30px; border-radius: var(--radius-sm); border: 1px solid var(--border); background: var(--surface); color: var(--text-secondary) !important; text-decoration: none !important; cursor: pointer; }
    .icon-btn:hover { background: var(--bg); }
    .icon-btn.danger:hover { background: #fdecec; color: #b22222 !important; border-color: #f3c6c6; }
    .cat-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-card); }
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
    table.products-table { width: 100%; border-collapse: collapse; }
    table.products-table th, table.products-table td { padding: 12px 16px; text-align: left; border-bottom: 1px solid var(--border); font-size: 13px; vertical-align: middle; }
    table.products-table th { font-size: 11.5px; text-transform: uppercase; letter-spacing: .04em; color: var(--text-hint); font-weight: 650; }
    table.products-table tbody tr:hover { background: #fafbfc; }
    .cust-name { font-weight: 600; }
    .cust-sub { font-size: 11.5px; color: var(--text-hint); }
    .badge { display: inline-block; padding: 3px 10px; border-radius: 999px; font-size: 11.5px; font-weight: 600; }
    .badge.new { background: #fdf1da; color: #96690b; }
    .badge.contacted { background: #e3ecfb; color: #1c4fa3; }
    .badge.closed { background: #e4f5e9; color: #1e7a3f; }
    .row-actions { display: flex; gap: 6px; }
    .empty-state { padding: 48px 20px; text-align: center; color: var(--text-hint); font-size: 13.5px; }
    .pagination-wrap { padding: 16px 20px; border-top: 1px solid var(--border); }
    @media (max-width: 768px) { table.products-table { display: block; overflow-x: auto; } }
    </style>

    <div class="app-content content container-fluid">
        <div class="cat-page">

            <div class="cat-page-header">
                <div>
                    <h1>Cart Quote Requests</h1>
                    <div class="cat-breadcrumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        Cart Quote Requests
                    </div>
                </div>
            </div>

            <div class="cat-card">
                <form action="{{ route('admin.quoteRequests.index') }}" method="GET" class="filters-bar">
                    <select name="status" class="form-control-styled">
                        <option value="">All Statuses</option>
                        <option value="new" {{ request('status') === 'new' ? 'selected' : '' }}>New</option>
                        <option value="contacted" {{ request('status') === 'contacted' ? 'selected' : '' }}>Contacted</option>
                        <option value="closed" {{ request('status') === 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>

                    <input type="text" name="search" class="form-control-styled" placeholder="Search name, email, mobile…" value="{{ request('search') }}">

                    <button type="submit" class="btn-secondary-dash">
                        <i class="fa fa-filter"></i> Filter
                    </button>

                    @if(request()->hasAny(['status', 'search']))
                        <a href="{{ route('admin.quoteRequests.index') }}" class="clear-link">Clear filters</a>
                    @endif
                </form>

                @if($quoteRequests->isEmpty())
                    <div class="empty-state">No quote requests found.</div>
                @else
                    <table class="products-table">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Items</th>
                                <th>Status</th>
                                <th>Submitted</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($quoteRequests as $quoteRequest)
                                <tr id="quote-row-{{ $quoteRequest->id }}">
                                    <td>
                                        <div class="cust-name">{{ $quoteRequest->full_name }}</div>
                                        <div class="cust-sub">#{{ $quoteRequest->id }}</div>
                                    </td>
                                    <td>{{ $quoteRequest->mobile_number }}</td>
                                    <td>{{ $quoteRequest->email }}</td>
                                    <td>{{ $quoteRequest->items_count }}</td>
                                    <td>
                                        <span class="badge {{ $quoteRequest->status }}">
                                            {{ ucfirst($quoteRequest->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $quoteRequest->created_at->format('d M Y, h:i A') }}</td>
                                    <td>
                                        <div class="row-actions">
                                            <a href="{{ route('admin.quoteRequests.show', $quoteRequest) }}" class="icon-btn" title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <button type="button" class="icon-btn danger" title="Delete"
                                                onclick="deleteQuoteRequest({{ $quoteRequest->id }})">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination-wrap">
                        {{ $quoteRequests->links('pagination::bootstrap-4') }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>

@include('admin.footer')

<script>
function deleteQuoteRequest(id) {
    Swal.fire({
        title: 'Delete this quote request?',
        text: 'This action cannot be undone.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        confirmButtonColor: '#b22222',
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (!result.isConfirmed) return;

        fetch(`/admin/quote-requests/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
            },
        })
            .then(res => res.json())
            .then(res => {
                if (res.success) {
                    document.getElementById(`quote-row-${id}`).remove();
                    Swal.fire('Deleted', res.message, 'success');
                } else {
                    Swal.fire('Error', res.message || 'Something went wrong.', 'error');
                }
            })
            .catch(() => Swal.fire('Error', 'Something went wrong.', 'error'));
    });
}
</script>