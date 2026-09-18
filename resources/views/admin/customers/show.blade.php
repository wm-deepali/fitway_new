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

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.customers.index') }}">
                            Manage Customers
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Customer Details
                    </li>

                </ol>
            </div>

        </div>

        <div class="content-wrapper pb-4">

            {{-- Customer Info --}}
            <div class="card wm-quotes-card mb-4">

                <div class="card-header d-flex align-items-center justify-content-between wm-quotes-header">

                    <h4 class="mb-0 wm-quotes-title">
                        Customer Info
                    </h4>

                    <form action="{{ route('admin.customers.update-status', $customer->id) }}"
                        method="POST"
                        class="wm-status-form">

                        @csrf

                        <select name="status"
                            class="form-control form-control-sm d-inline w-auto wm-status-select wm-status-{{ $customer->status }}"
                            onchange="this.form.submit()">

                            <option value="active" {{ $customer->status === 'active' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="inactive" {{ $customer->status === 'inactive' ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                    </form>

                </div>

                <div class="card-body wm-info-body">

                    <div class="row">

                        <div class="col-md-4 mb-3 wm-info-item">
                            <span class="wm-info-label">Customer Name</span>
                            <p class="mb-0 wm-info-value">{{ $customer->customer_name }}</p>
                        </div>

                        <div class="col-md-4 mb-3 wm-info-item">
                            <span class="wm-info-label">Company Name</span>
                            <p class="mb-0 wm-info-value">{{ $customer->business_name ?? '-' }}</p>
                        </div>

                        <div class="col-md-4 mb-3 wm-info-item">
                            <span class="wm-info-label">Email Id</span>
                            <p class="mb-0 wm-info-value">{{ $customer->email ?? '-' }}</p>
                        </div>

                        <div class="col-md-4 mb-3 wm-info-item">
                            <span class="wm-info-label">Mobile Number</span>
                            <p class="mb-0 wm-info-value">{{ $customer->mobile_number }}</p>
                        </div>

                        <div class="col-md-4 mb-3 wm-info-item">
                            <span class="wm-info-label">GSTIN</span>
                            <p class="mb-0 wm-info-value">{{ $customer->gst_number ?? '-' }}</p>
                        </div>

                        <div class="col-md-4 mb-3 wm-info-item">
                            <span class="wm-info-label">Pin Code</span>
                            <p class="mb-0 wm-info-value">{{ $customer->pincode ?? '-' }}</p>
                        </div>

                        <div class="col-md-8 mb-3 wm-info-item">
                            <span class="wm-info-label">Full Address</span>
                            <p class="mb-0 wm-info-value">{{ $customer->address ?? '-' }}</p>
                        </div>

                        <div class="col-md-4 mb-3 wm-info-item">
                            <span class="wm-info-label">State / City</span>
                            <p class="mb-0 wm-info-value">
                                {{ $customer->state?->name ?? '-' }}, {{ $customer->city?->name ?? '-' }}
                            </p>
                        </div>

                    </div>

                </div>

            </div>

            {{-- Proposals --}}
            <div class="card wm-quotes-card">

                <div class="card-header wm-quotes-header">
                    <h4 class="mb-0 wm-quotes-title">
                        Proposals
                    </h4>
                </div>

                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table table-hover mb-0 wm-quotes-table">

                            <thead>
                                <tr>
                                    <th>Date & Time</th>
                                    <th>Proposal ID</th>
                                    <th>Total Products</th>
                                    <th>Total Cost</th>
                                    <th>Download</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($quotes as $quote)

                                    <tr>
                                        <td>{{ $quote->created_at->format('d M Y, h:i A') }}</td>
                                        <td><span class="wm-badge-id">{{ $quote->proposal_id }}</span></td>
                                        <td>{{ $quote->items_count }}</td>
                                        <td class="wm-amount">₹{{ number_format($quote->total_amount, 2) }}</td>
                                        <td>

                                            <a href="{{ route('admin.quotes.download', $quote->id) }}"
                                                class="btn btn-sm wm-btn-outline">
                                                <i class="fa fa-download"></i> PDF
                                            </a>

                                        </td>
                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="5"
                                            class="text-center py-4 wm-empty-state">
                                            <i class="fa fa-file-text-o wm-empty-icon"></i>
                                            <div>No proposals found for this customer.</div>
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
     Scoped UI styling for Customer Details page — re-themed to
     match the Product create page's indigo design system. No
     Blade logic, routes, form actions, @csrf, or the onchange
     auto-submit behaviour touched above — purely presentational.
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

    /* Customer info grid */
    .wm-info-body {
        padding: 1.5rem 1.25rem;
    }

    .wm-info-item {
        padding: 0.5rem 0.75rem;
        border-left: 3px solid var(--wm-primary-light);
    }

    .wm-info-label {
        display: block;
        font-size: 0.72rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--wm-muted);
        margin-bottom: 2px;
    }

    .wm-info-value {
        font-size: 0.95rem;
        color: var(--wm-text);
        font-weight: 500;
    }

    /* Status select */
    .wm-status-form {
        margin: 0;
    }

    .wm-status-select {
        border-radius: 20px !important;
        font-weight: 600;
        font-size: 0.8rem;
        padding: 0.3rem 1.75rem 0.3rem 0.9rem !important;
        border: 1px solid var(--wm-border) !important;
        cursor: pointer;
        transition: all 0.15s ease;
    }

    .wm-status-select:focus {
        box-shadow: 0 0 0 3px rgba(48, 61, 137, 0.12) !important;
        outline: none;
    }

    .wm-status-active {
        background-color: #eef0fa;
        color: var(--wm-primary) !important;
    }

    .wm-status-inactive {
        background-color: #f1f1f2;
        color: var(--wm-muted) !important;
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

    .wm-btn-outline {
        background-color: #fff;
        color: var(--wm-primary) !important;
        border-color: var(--wm-primary);
    }

    .wm-btn-outline:hover {
        background-color: var(--wm-primary);
        color: #fff !important;
        transform: translateY(-1px);
        box-shadow: 0 3px 8px rgba(48, 61, 137, 0.2);
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

        .wm-status-form {
            width: 100%;
        }

        .wm-status-select {
            width: 100%;
        }

        .wm-info-item {
            border-left: none;
            border-top: 3px solid var(--wm-primary-light);
            padding-top: 0.6rem;
        }
    }
</style>