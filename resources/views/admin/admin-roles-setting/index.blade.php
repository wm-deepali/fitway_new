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

            {{-- Header card: title + Add New --}}
            <div class="card wm-card mb-4">

                <div class="card-header wm-card-header d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 wm-card-title">Admin Roles &amp; Permissions</h4>

                    {{-- TODO: point this at the real "create" route once it exists --}}
                    <a href="{{ route('admin.admin-role-setting.create') }}" class="btn wm-btn-primary">
                        <i class="fa-solid fa-plus"></i> Add New
                    </a>
                </div>

                <div class="card-body wm-form-body">

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group mb-0 wm-form-group">
                                <label class="wm-label">Search</label>
                                <input type="text" class="form-control wm-input"
                                    placeholder="Search by name, email or mobile">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group mb-0 wm-form-group">
                                <label class="wm-label">Status</label>
                                <select class="form-control wm-input">
                                    <option value="">All</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2 d-flex align-items-end">
                            <button type="button" class="btn wm-btn-outline btn-block">
                                <i class="fa-solid fa-filter"></i> Filter
                            </button>
                        </div>

                    </div>

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

                            {{-- Sample rows — swap this for a real @foreach($employees as $employee) loop --}}
                            <tr>
                                <td>
                                    <div class="wm-avatar">RS</div>
                                </td>
                                <td class="wm-emp-name">Rahul Sharma</td>
                                <td>rahul.sharma@example.com</td>
                                <td>9876543210</td>
                                <td>9876543210</td>
                                <td><span class="wm-badge wm-badge-active">Active</span></td>
                                <td>
                                    <a href="#" class="btn btn-sm wm-btn-outline" title="Edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm wm-btn-danger" title="Delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="wm-avatar">PK</div>
                                </td>
                                <td class="wm-emp-name">Priya Kapoor</td>
                                <td>priya.kapoor@example.com</td>
                                <td>9123456780</td>
                                <td>9123456780</td>
                                <td><span class="wm-badge wm-badge-inactive">Inactive</span></td>
                                <td>
                                    <a href="#" class="btn btn-sm wm-btn-outline" title="Edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm wm-btn-danger" title="Delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            {{--
                            <tr>
                                <td colspan="7" class="text-center text-muted wm-empty-state">
                                    No records found.
                                </td>
                            </tr>
                            --}}

                        </tbody>

                    </table>

                </div>

                <div class="card-footer wm-card-footer d-flex align-items-center justify-content-between">

                    <small class="text-muted">Showing 2 of 2 entries</small>

                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

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
    .wm-btn-danger {
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