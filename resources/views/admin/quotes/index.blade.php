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
                        Manage Quotes
                    </li>

                </ol>
            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card wm-quotes-card">
                @if(session('success'))
                    <div class="alert wm-alert-success m-3 mb-0">{{ session('success') }}</div>
                @endif
                <div class="card-header d-flex align-items-center justify-content-between wm-quotes-header">

                    <h4 class="mb-0 wm-quotes-title">
                        Manage Quotes
                    </h4>

                    <div class="d-flex wm-quotes-actions">

                        <form action="{{ route('admin.quotes.index') }}" method="GET"
                            class="d-flex mr-2 wm-search-form">

                            <div class="wm-search-wrap">
                                <i class="fa fa-search wm-search-icon"></i>
                                <input type="text" name="search"
                                    class="form-control form-control-sm mr-2 wm-search-input"
                                    placeholder="Search Proposal ID, business, mobile..."
                                    value="{{ request('search') }}">
                            </div>

                            <button type="submit" class="btn btn-sm wm-btn-primary">
                                <i class="fa fa-search"></i>
                            </button>

                        </form>

                        <a href="{{ route('admin.quotes.create') }}" class="btn btn-sm wm-btn-success">
                            <i class="fa fa-plus"></i> New Proposal
                        </a>

                    </div>

                </div>

                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table table-hover mb-0 wm-quotes-table">

                            <thead>
                                <tr>
                                    <th>Date & Time</th>
                                    <th>Proposal ID</th>
                                    <th>Business Name</th>
                                    <th>Mobile Number</th>
                                    <th>Total Products</th>
                                    <th>Total Cost</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($quotes as $quote)

                                    <tr>
                                        <td>{{ $quote->created_at->format('d M Y, h:i A') }}</td>
                                        <td><span class="wm-badge-id">{{ $quote->proposal_id }}</span></td>
                                        <td>{{ $quote->customer->business_name ?? '-' }}</td>
                                        <td>{{ $quote->customer->mobile_number ?? '-' }}</td>
                                        <td>{{ $quote->items_count }}</td>
                                        <td class="wm-amount">₹{{ number_format($quote->total_amount, 2) }}</td>
                                        <td>
                                            @if($quote->status === 'draft')
                                                <span class="badge badge-warning">Draft</span>
                                            @else
                                                <span class="badge badge-success">Print Ready</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="wm-action-group">
                                                @if($quote->status === 'draft')
                                                    <a href="{{ route('admin.quotes.edit', $quote->id) }}"
                                                        class="btn btn-sm wm-btn-info">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('admin.quotes.preview', $quote->id) }}"
                                                        class="btn btn-sm wm-btn-info">
                                                        <i class="fa fa-eye"></i>
                                                    </a>

                                                    <a href="{{ route('admin.quotes.download', $quote->id) }}"
                                                        class="btn btn-sm wm-btn-outline">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                @endif

                                                <form action="{{ route('admin.quotes.destroy', $quote->id) }}" method="POST"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Are you sure you want to delete this proposal? This cannot be undone.');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm wm-btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="7" class="text-center py-4 wm-empty-state">
                                            <i class="fa fa-file-text-o wm-empty-icon"></i>
                                            <div>No proposals found.</div>
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

                <div class="card-footer wm-quotes-footer">
                    {{ $quotes->links() }}
                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')

{{-- ==========================================================
Scoped UI styling for Manage Quotes page — re-themed to match the
Product create page's indigo design system. No Blade logic, routes,
or dynamic data touched — purely presentational.
========================================================== --}}
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

    /* Card shell */
    .wm-quotes-card {
        border: 1px solid var(--wm-border);
        border-radius: var(--wm-radius);
        box-shadow: 0 1px 3px rgba(0, 0, 0, .08), 0 0 0 1px var(--wm-border);
        overflow: hidden;
    }

    .wm-quotes-header {
        background: #ffffff;
        border-bottom: 1px solid var(--wm-border);
        padding: 1rem 1.25rem;
        flex-wrap: wrap;
        gap: 0.75rem;
    }

    .wm-quotes-title {
        font-weight: 650;
        color: var(--wm-text);
        letter-spacing: 0.2px;
    }

    .wm-quotes-actions {
        gap: 0.5rem;
        align-items: center;
        flex-wrap: wrap;
    }

    /* Search box */
    .wm-search-form {
        align-items: center;
    }

    .wm-search-wrap {
        position: relative;
        display: flex;
        align-items: center;
    }

    .wm-search-icon {
        position: absolute;
        left: 12px;
        font-size: 12px;
        color: var(--wm-muted);
        pointer-events: none;
    }

    .wm-search-input {
        padding-left: 30px !important;
        border-radius: 8px !important;
        border: 1px solid var(--wm-border) !important;
        background: #fbfbfc;
        min-width: 260px;
        transition: border-color 0.15s ease, box-shadow 0.15s ease;
    }

    .wm-search-input:focus {
        border-color: var(--wm-primary) !important;
        box-shadow: 0 0 0 3px rgba(48, 61, 137, 0.12) !important;
        background: #fff;
        outline: none;
    }

    /* Buttons */
    .wm-btn-primary,
    .wm-btn-success,
    .wm-btn-info,
    .wm-btn-outline,
    .wm-btn-danger {
        border-radius: 8px !important;
        font-weight: 600;
        font-size: 0.8rem;
        padding: 0.4rem 0.85rem;
        border: 1px solid transparent;
        transition: all 0.15s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        white-space: nowrap;
        line-height: 1;
    }

    .wm-btn-primary,
    .wm-btn-success {
        background-color: var(--wm-primary);
        color: #ffffff !important;
    }

    .wm-btn-primary:hover,
    .wm-btn-success:hover {
        background-color: var(--wm-primary-hover);
        color: #ffffff !important;
        transform: translateY(-1px);
        box-shadow: 0 3px 8px rgba(48, 61, 137, 0.25);
    }

    .wm-btn-info {
        background-color: var(--wm-primary-light);
        color: var(--wm-primary) !important;
        border-color: var(--wm-border);
    }

    .wm-btn-info:hover {
        background-color: var(--wm-primary);
        color: #fff !important;
    }

    .wm-btn-outline {
        background-color: #fff;
        color: var(--wm-primary) !important;
        border-color: var(--wm-primary);
    }

    .wm-btn-outline:hover {
        background-color: var(--wm-primary);
        color: #fff !important;
    }

    /* Delete button */
    .wm-btn-danger {
        background-color: var(--wm-danger-light);
        color: var(--wm-danger) !important;
        border-color: var(--wm-danger-light);
    }

    .wm-btn-danger:hover {
        background-color: var(--wm-danger);
        border-color: var(--wm-danger);
        color: #fff !important;
    }

    /* Action column — force horizontal row, never wraps to vertical stack */
    .wm-action-group {
        display: flex;
        flex-direction: row;
        align-items: center;
        flex-wrap: nowrap;
        gap: 6px;
    }

    .wm-action-group form {
        display: inline-flex;
        margin: 0;
    }

    /* Table */
    .wm-quotes-table {
        margin-bottom: 0;
    }

    .wm-quotes-table thead tr th {
        background-color: var(--wm-primary);
        color: #ffffff;
        font-weight: 600;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        border: none;
        padding: 0.85rem 1rem;
        white-space: nowrap;
    }

    .wm-quotes-table thead tr th:first-child {
        border-top-left-radius: 0;
    }

    .wm-quotes-table tbody tr td {
        padding: 0.8rem 1rem;
        vertical-align: middle;
        color: var(--wm-text);
        font-size: 0.88rem;
        border-color: var(--wm-border);
    }

    .wm-quotes-table tbody tr:nth-child(odd) {
        background-color: var(--wm-row-odd);
    }

    .wm-quotes-table tbody tr:nth-child(even) {
        background-color: var(--wm-row-even);
    }

    .wm-quotes-table tbody tr:hover {
        background-color: var(--wm-primary-light) !important;
    }

    .wm-badge-id {
        display: inline-block;
        background-color: var(--wm-primary-light);
        color: var(--wm-primary);
        font-weight: 600;
        font-size: 0.78rem;
        padding: 3px 10px;
        border-radius: 20px;
    }

    .wm-amount {
        font-weight: 700;
        color: var(--wm-primary);
    }

    .wm-empty-state {
        color: var(--wm-muted);
        font-size: 0.9rem;
    }

    .wm-empty-icon {
        display: block;
        font-size: 1.8rem;
        margin-bottom: 0.5rem;
        color: #c9ccd1;
    }

    .wm-quotes-footer {
        background: #fafafb;
        border-top: 1px solid var(--wm-border);
        padding: 0.75rem 1.25rem;
    }

    /* Responsive tweaks */
    @media (max-width: 576px) {
        .wm-quotes-header {
            flex-direction: column;
            align-items: flex-start !important;
        }

        .wm-quotes-actions {
            width: 100%;
        }

        .wm-search-input {
            min-width: 0;
            width: 100%;
        }

        .wm-search-form {
            flex: 1;
        }

        .wm-action-group {
            flex-wrap: wrap;
        }
    }

    .wm-alert-success {
        background-color: #eef0fa;
        border: 1px solid #cfd4ee;
        color: var(--wm-primary);
        border-radius: 8px;
        font-weight: 500;
        padding: 0.7rem 1rem;
    }
</style>