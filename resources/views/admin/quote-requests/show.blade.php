{{-- resources/views/admin/quote-requests/show.blade.php --}}
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
    .cat-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-card); padding: 20px; margin-bottom: 20px; }
    .cat-card h5 { font-size: 14px; font-weight: 650; margin: 0 0 16px; }
    .detail-row { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid var(--border); font-size: 13px; }
    .detail-row:last-child { border-bottom: none; }
    .detail-row span:first-child { color: var(--text-hint); }
    .detail-row span:last-child { font-weight: 500; text-align: right; max-width: 60%; }
    .form-control-styled {
        height: 38px; width: 100%; border: 1px solid var(--border); border-radius: var(--radius-sm);
        padding: 0 12px; font-size: 13px; font-family: var(--font); color: var(--text-primary);
        outline: none; background: var(--surface);
    }
    .grid-2 { display: grid; grid-template-columns: 320px 1fr; gap: 20px; align-items: start; }
    @media (max-width: 900px) { .grid-2 { grid-template-columns: 1fr; } }
    table.products-table { width: 100%; border-collapse: collapse; }
    table.products-table th, table.products-table td { padding: 12px 16px; text-align: left; border-bottom: 1px solid var(--border); font-size: 13px; vertical-align: middle; }
    table.products-table th { font-size: 11.5px; text-transform: uppercase; letter-spacing: .04em; color: var(--text-hint); font-weight: 650; }
    table.products-table tbody tr:hover { background: #fafbfc; }
    .removed-tag { color: var(--text-hint); font-style: italic; font-size: 12px; }
    </style>

    <div class="app-content content container-fluid">
        <div class="cat-page">

            <div class="cat-page-header">
                <div>
                    <h1>Quote Request #{{ $quoteRequest->id }}</h1>
                    <div class="cat-breadcrumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        <a href="{{ route('admin.quoteRequests.index') }}">Cart Quote Requests</a>
                        <span>›</span>
                        #{{ $quoteRequest->id }}
                    </div>
                </div>
                <a href="{{ route('admin.quoteRequests.index') }}" class="btn-secondary-dash">
                    <i class="fa fa-arrow-left"></i> Back to List
                </a>
            </div>

            <div class="grid-2">
                <div>
                    <div class="cat-card">
                        <h5>Customer Details</h5>
                        <div class="detail-row"><span>Name</span><span>{{ $quoteRequest->full_name }}</span></div>
                        <div class="detail-row"><span>Mobile</span><span>{{ $quoteRequest->mobile_number }}</span></div>
                        <div class="detail-row"><span>Email</span><span>{{ $quoteRequest->email }}</span></div>
                        <div class="detail-row"><span>Details</span><span>{{ $quoteRequest->details ?: '—' }}</span></div>
                        <div class="detail-row"><span>Submitted</span><span>{{ $quoteRequest->created_at->format('d M Y, h:i A') }}</span></div>
                    </div>

                    <div class="cat-card">
                        <h5>Status</h5>
                        <select id="statusSelect" class="form-control-styled" data-id="{{ $quoteRequest->id }}">
                            <option value="new" {{ $quoteRequest->status === 'new' ? 'selected' : '' }}>New</option>
                            <option value="contacted" {{ $quoteRequest->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                            <option value="closed" {{ $quoteRequest->status === 'closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                    </div>
                </div>

                <div class="cat-card">
                    <h5>Requested Items</h5>
                    <table class="products-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Price (at request time)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quoteRequest->items as $item)
                                <tr>
                                    <td>
                                        @if ($item->product)
                                            <a href="{{ route('admin.products.edit', $item->product->id) }}">{{ $item->product_name }}</a>
                                        @else
                                            {{ $item->product_name }} <span class="removed-tag">(product removed)</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ $item->price !== null ? '₹' . number_format($item->price, 2) : 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@include('admin.footer')

<script>
document.getElementById('statusSelect').addEventListener('change', function () {
    const id = this.dataset.id;
    const status = this.value;

    fetch(`/admin/quote-requests/${id}/status`, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
        },
        body: JSON.stringify({ status }),
    })
        .then(res => res.json())
        .then(res => {
            if (res.success) {
                Swal.fire('Updated', res.message, 'success');
            } else {
                Swal.fire('Error', res.message || 'Something went wrong.', 'error');
            }
        })
        .catch(() => Swal.fire('Error', 'Something went wrong.', 'error'));
});
</script>