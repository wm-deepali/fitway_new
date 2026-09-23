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
                        Manage Customers
                    </li>

                </ol>
            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card wm-quotes-card">

                <div class="card-header d-flex align-items-center justify-content-between wm-quotes-header">

                    <h4 class="mb-0 wm-quotes-title">
                        Manage Customers
                    </h4>

                    <form action="{{ route('admin.customers.index') }}"
                        method="GET"
                        class="d-flex wm-search-form">

                        <div class="wm-search-wrap">
                            <i class="fa fa-search wm-search-icon"></i>
                            <input type="text"
                                name="search"
                                class="form-control form-control-sm mr-2 wm-search-input"
                                placeholder="Search business, email, mobile..."
                                value="{{ request('search') }}">
                        </div>

                        <button type="submit"
                            class="btn btn-sm wm-btn-primary">
                            <i class="fa fa-search"></i>
                        </button>

                    </form>

                </div>

                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table table-hover mb-0 wm-quotes-table">

                            <thead>
                                <tr>
                                    <th>Date & Time</th>
                                    <th>Business Name</th>
                                    <th>Email Id</th>
                                    <th>Mobile Number</th>
                                    <th>Total Proposals</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($customers as $customer)

                                    <tr>
                                        <td>{{ $customer->created_at->format('d M Y, h:i A') }}</td>
                                        <td>{{ $customer->business_name ?? '-' }}</td>
                                        <td>{{ $customer->email ?? '-' }}</td>
                                        <td>{{ $customer->mobile_number }}</td>
                                        <td>{{ $customer->quotes_count }}</td>
                                        <td>

                                            @if($customer->status === 'active')
                                                <span class="badge wm-badge-active">Active</span>
                                            @else
                                                <span class="badge wm-badge-inactive">Inactive</span>
                                            @endif

                                        </td>
                                        <td>

                                            <div class="wm-row-actions">
                                                <a href="{{ route('admin.customers.show', $customer->id) }}"
                                                    class="btn btn-sm wm-btn-info">
                                                    <i class="fa fa-eye"></i> View
                                                </a>

                                                <a href="{{ route('admin.customers.edit', $customer->id) }}"
                                                    class="btn btn-sm wm-btn-outline">
                                                    <i class="fa fa-pencil"></i> Edit
                                                </a>
                                            </div>

                                        </td>
                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="7"
                                            class="text-center py-4 wm-empty-state">
                                            <i class="fa fa-users wm-empty-icon"></i>
                                            <div>No customers found.</div>
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

                <div class="card-footer wm-quotes-footer">
                    {{ $customers->links() }}
                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')

{{-- ==========================================================
     Scoped UI styling for Manage Customers page — re-themed to
     match the Product create page's indigo design system. No
     Blade logic, routes, or dynamic data touched above — purely
     presentational.
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
    .wm-btn-outline {
        border-radius: 8px !important;
        font-weight: 600;
        font-size: 0.8rem;
        padding: 0.4rem 0.85rem;
        border: 1px solid transparent;
        transition: all 0.15s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        white-space: nowrap;
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

    .wm-row-actions {
        display: flex;
        gap: 6px;
        flex-wrap: nowrap;
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

    /* Status badges */
    .wm-badge-active,
    .wm-badge-inactive {
        font-weight: 600;
        font-size: 0.75rem;
        padding: 4px 12px;
        border-radius: 20px;
        display: inline-block;
        letter-spacing: 0.2px;
    }

    .wm-badge-active {
        background-color: #eef0fa;
        color: var(--wm-primary);
    }

    .wm-badge-inactive {
        background-color: #f1f1f2;
        color: var(--wm-muted);
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

        .wm-search-form {
            width: 100%;
        }

        .wm-search-input {
            min-width: 0;
            width: 100%;
        }

        .wm-row-actions {
            flex-wrap: wrap;
        }
    }
</style>