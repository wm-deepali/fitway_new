{{-- resources/views/admin/product-enquiry/index.blade.php --}}
@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    <style>
        :root {
            --bg: #f1f2f4;
            --surface: #ffffff;
            --border: #e3e5e8;
            --text-primary: #202223;
            --text-secondary: #6d7175;
            --text-hint: #8c9196;
            --accent: #303d89;
            --red: #b22222;
            --red-bg: #fce8e8;
            --radius-sm: 8px;
            --radius-md: 12px;
            --shadow-card: 0 1px 3px rgba(0, 0, 0, .08), 0 0 0 1px var(--border);
            --font: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        .cat-page {
            background: var(--bg);
            padding: 24px 28px;
            min-height: 100vh;
            font-family: var(--font);
            color: var(--text-primary);
            box-sizing: border-box;
        }

        .cat-page * {
            box-sizing: border-box;
        }

        .cat-page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 20px;
        }

        .cat-page-header h1 {
            font-size: 20px;
            font-weight: 650;
            margin: 0;
        }

        .cat-breadcrumb {
            font-size: 12.5px;
            color: var(--text-hint);
            margin-top: 3px;
        }

        .cat-breadcrumb a {
            color: var(--accent);
            text-decoration: none;
        }

        .cat-breadcrumb a:hover {
            text-decoration: underline;
        }

        .cat-breadcrumb span {
            margin: 0 5px;
        }

        .btn-primary-dash {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--accent);
            color: #fff !important;
            border: none;
            border-radius: var(--radius-sm);
            padding: 8px 16px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none !important;
            box-shadow: 0 1px 3px rgba(48, 61, 137, .25);
        }

        .btn-secondary-dash {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--surface);
            color: var(--text-primary) !important;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 8px 16px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none !important;
        }

        .btn-secondary-dash:hover {
            background: var(--bg);
        }

        .cat-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-card);
            overflow: hidden;
        }

        .filter-bar {
            padding: 16px 20px;
            border-bottom: 1px solid var(--border);
            background: var(--surface);
        }

        .filter-bar .form-row-inner {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            align-items: flex-end;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .filter-group label {
            font-size: 12px;
            font-weight: 600;
            color: var(--text-secondary);
            letter-spacing: .03em;
            text-transform: uppercase;
        }

        .filter-control {
            height: 36px;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 0 11px;
            font-size: 13px;
            color: var(--text-primary);
            background: var(--surface);
            outline: none;
            font-family: var(--font);
            min-width: 220px;
        }

        .filter-control:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(48, 61, 137, .12);
        }

        .filter-actions {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .cat-table-wrap {
            overflow-x: auto;
        }

        .cat-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
            font-family: var(--font);
        }

        .cat-table thead th {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: .06em;
            text-transform: uppercase;
            color: var(--text-hint);
            padding: 10px 16px;
            border-bottom: 1px solid var(--border);
            background: #fafafa;
            text-align: left;
            white-space: nowrap;
        }

        .cat-table tbody tr {
            border-bottom: 1px solid var(--border);
        }

        .cat-table tbody tr:last-child {
            border-bottom: none;
        }

        .cat-table tbody tr:hover {
            background: #fafbfc;
        }

        .cat-table tbody td {
            padding: 12px 16px;
            vertical-align: middle;
        }

        .sort-link {
            color: var(--text-hint);
            text-decoration: none;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: .06em;
            text-transform: uppercase;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .sort-link:hover {
            color: var(--text-primary);
            text-decoration: none;
        }

        .sort-link .fa-sort {
            opacity: .4;
        }

        .sort-link .fa-sort-up,
        .sort-link .fa-sort-down {
            color: var(--accent);
            opacity: 1;
        }

        .name-cell strong {
            display: block;
            font-weight: 600;
            font-size: 13px;
        }

        .name-cell small {
            font-size: 11.5px;
            color: var(--text-hint);
        }

        .addr-cell {
            max-width: 220px;
            color: var(--text-secondary);
            font-size: 12.5px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border);
            background: var(--surface);
            color: var(--text-secondary);
            font-size: 12px;
            cursor: pointer;
            text-decoration: none;
        }

        .action-btn:hover {
            background: var(--bg);
            color: var(--text-primary);
        }

        .action-btn-danger:hover {
            background: var(--red-bg);
            border-color: #f5c6c6;
            color: var(--red);
        }

        .empty-state {
            text-align: center;
            padding: 64px 20px;
        }

        .empty-state .empty-icon {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: var(--bg);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: var(--text-hint);
            margin-bottom: 14px;
        }

        .empty-state p {
            font-size: 14px;
            color: var(--text-secondary);
            margin: 6px 0 16px;
        }

        .cat-pagination {
            padding: 14px 20px;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: center;
            background: var(--surface);
        }

        .id-chip {
            display: inline-block;
            background: var(--bg);
            color: var(--text-secondary);
            font-size: 11px;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 6px;
            font-family: 'SF Mono', 'Fira Code', monospace;
        }

        @media (max-width: 768px) {
            .cat-page {
                padding: 16px;
            }

            .filter-bar .form-row-inner {
                flex-direction: column;
            }

            .filter-control {
                min-width: 100%;
            }
        }
    </style>

    <div class="app-content content container-fluid">
        <div class="cat-page">

            <div class="cat-page-header">
                <div>
                    <h1>Product Enquiries</h1>
                    <div class="cat-breadcrumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        Manage Product Enquiries
                    </div>
                </div>
            </div>

            <div class="cat-card">

                <div class="filter-bar">
                    <form method="GET">
                        <div class="form-row-inner">
                            <div class="filter-group">
                                <label>Search</label>
                                <input type="text" name="search" value="{{ request('search') }}" class="filter-control"
                                    placeholder="Search name, email, city…">
                            </div>
                            <div class="filter-actions">
                                <button type="submit" class="btn-primary-dash">
                                    <i class="fa fa-search"></i> Search
                                </button>
                                <a href="{{ route('admin.productEnquiries.index') }}" class="btn-secondary-dash">
                                    <i class="fa fa-refresh"></i> Reset
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="cat-table-wrap">

                    @php
                        function peSortUrl($column)
                        {
                            $direction = request('sort_by') == $column && request('sort_order') == 'asc' ? 'desc' : 'asc';
                            return request()->fullUrlWithQuery(['sort_by' => $column, 'sort_order' => $direction]);
                        }
                        function peSortIcon($column)
                        {
                            if (request('sort_by') != $column)
                                return '<i class="fa fa-sort"></i>';
                            return request('sort_order') == 'asc'
                                ? '<i class="fa fa-sort-up" style="color:var(--accent)"></i>'
                                : '<i class="fa fa-sort-down" style="color:var(--accent)"></i>';
                        }
                    @endphp

                    <table class="cat-table">
                        <thead>
                            <tr>
                                <th><a href="{{ peSortUrl('id') }}" class="sort-link">Sr. No.
                                        {!! peSortIcon('id') !!}</a></th>
                                <th>Product</th>
                                <th><a href="{{ peSortUrl('name') }}" class="sort-link">Name
                                        {!! peSortIcon('name') !!}</a></th>
                                <th><a href="{{ peSortUrl('email') }}" class="sort-link">Email
                                        {!! peSortIcon('email') !!}</a></th>
                                <th>Mobile</th>
                                <th>Details</th>
                                <th><a href="{{ peSortUrl('created_at') }}" class="sort-link">Enquired On
                                        {!! peSortIcon('created_at') !!}</a></th>
                                <th style="width:60px">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($enquiries as $index => $item)
                                <tr id="row{{ $item->id }}">
                                    <td><span class="id-chip">{{ $enquiries->firstItem() + $index }}</span></td>
                                    <td style="font-weight:600;font-size:13px">{{ $item->product->name ?? '—' }}</td>
                                    <td style="font-weight:600;font-size:13px">{{ $item->name }}</td>
                                    <td style="color:var(--text-secondary);font-size:13px">{{ $item->email }}</td>
                                    <td style="color:var(--text-secondary);font-size:13px">{{ $item->phone ?: '—' }}</td>
                                    <td class="addr-cell" title="{{ $item->details }}">{{ $item->details ?: '—' }}</td>
                                    <td style="color:var(--text-secondary);font-size:13px">
                                        {{ $item->created_at->format('d M Y') }}</td>
                                    <td>
                                        <button class="action-btn action-btn-danger" title="Delete"
                                            onclick="deleteProductEnquiry({{ $item->id }})">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">
                                        <div class="empty-state">
                                            <div class="empty-icon"><i class="fa fa-box-open"></i></div>
                                            <strong style="font-size:14px;color:var(--text-primary)">No product enquiries
                                                yet</strong>
                                            <p>Product enquiry form submissions will show up here.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="cat-pagination">
                    {{ $enquiries->links() }}
                </div>

            </div>

        </div>
    </div>
</div>

@include('admin.footer')

<script>
    function deleteProductEnquiry(id) {
        Swal.fire({
            title: 'Delete Enquiry?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#b22222',
            cancelButtonColor: '#6d7175',
            confirmButtonText: 'Yes, Delete'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ url('admin/product-enquiries') }}/" + id,
                    type: "DELETE",
                    data: { _token: "{{ csrf_token() }}" },
                    beforeSend: function () { Swal.showLoading(); },
                    success: function (res) {
                        Swal.fire('Deleted!', res.message, 'success');
                        $("#row" + id).fadeOut(300, function () { $(this).remove(); });
                    },
                    error: function () {
                        Swal.fire('Error!', 'Something went wrong', 'error');
                    }
                });
            }
        });
    }
</script>