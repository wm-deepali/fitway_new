{{-- resources/views/admin/faqs/index.blade.php --}}
@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    <style>
    :root {
        --bg: #f1f2f4; --surface: #ffffff; --border: #e3e5e8;
        --text-primary: #202223; --text-secondary:#6d7175; --text-hint:#8c9196;
        --accent: #303d89; --green: #007a5e; --green-bg: #e3f1ec;
        --red: #b22222; --red-bg: #fce8e8;
        --radius-sm: 8px; --radius-md: 12px;
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
    .btn-primary-dash { display: inline-flex; align-items: center; gap: 6px; background: var(--accent); color: #fff !important; border: none; border-radius: var(--radius-sm); padding: 8px 16px; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none !important; box-shadow: 0 1px 3px rgba(48,61,137,.25); }
    .btn-primary-dash:hover { background: #252f70; }
    .btn-secondary-dash { display: inline-flex; align-items: center; gap: 6px; background: var(--surface); color: var(--text-primary) !important; border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 8px 16px; font-size: 13px; font-weight: 500; cursor: pointer; text-decoration: none !important; }
    .btn-secondary-dash:hover { background: var(--bg); }
    .cat-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-card); overflow: hidden; }
    .filter-bar { padding: 16px 20px; border-bottom: 1px solid var(--border); background: var(--surface); }
    .filter-bar .form-row-inner { display: flex; flex-wrap: wrap; gap: 12px; align-items: flex-end; }
    .filter-group { display: flex; flex-direction: column; gap: 5px; }
    .filter-group label { font-size: 12px; font-weight: 600; color: var(--text-secondary); letter-spacing: .03em; text-transform: uppercase; }
    .filter-control { height: 36px; border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 0 11px; font-size: 13px; color: var(--text-primary); background: var(--surface); outline: none; font-family: var(--font); min-width: 160px; }
    .filter-control:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(48,61,137,.12); }
    .filter-control-wide { min-width: 220px; }
    .filter-actions { display: flex; gap: 8px; align-items: center; }
    .cat-table-wrap { overflow-x: auto; }
    .cat-table { width: 100%; border-collapse: collapse; font-size: 13px; font-family: var(--font); }
    .cat-table thead th { font-size: 11px; font-weight: 600; letter-spacing: .06em; text-transform: uppercase; color: var(--text-hint); padding: 10px 16px; border-bottom: 1px solid var(--border); background: #fafafa; text-align: left; white-space: nowrap; }
    .cat-table tbody tr { border-bottom: 1px solid var(--border); }
    .cat-table tbody tr:last-child { border-bottom: none; }
    .cat-table tbody tr:hover { background: #fafbfc; }
    .cat-table tbody td { padding: 12px 16px; vertical-align: middle; }
    .sort-link { color: var(--text-hint); text-decoration: none; font-size: 11px; font-weight: 600; letter-spacing: .06em; text-transform: uppercase; display: inline-flex; align-items: center; gap: 4px; }
    .sort-link:hover { color: var(--text-primary); text-decoration: none; }
    .sort-link .fa-sort { opacity: .4; }
    .sort-link .fa-sort-up, .sort-link .fa-sort-down { color: var(--accent); opacity: 1; }
    .pill { display: inline-flex; align-items: center; gap: 4px; font-size: 11.5px; font-weight: 600; padding: 3px 9px; border-radius: 20px; white-space: nowrap; }
    .pill::before { content: ''; width: 5px; height: 5px; border-radius: 50%; display: inline-block; }
    .pill-active  { background: var(--green-bg); color: var(--green); }
    .pill-active::before  { background: var(--green); }
    .pill-inactive { background: var(--red-bg); color: var(--red); }
    .pill-inactive::before { background: var(--red); }
    .action-btn { display: inline-flex; align-items: center; justify-content: center; width: 30px; height: 30px; border-radius: var(--radius-sm); border: 1px solid var(--border); background: var(--surface); color: var(--text-secondary); font-size: 12px; cursor: pointer; text-decoration: none; }
    .action-btn:hover { background: var(--bg); color: var(--text-primary); }
    .action-btn-danger:hover { background: var(--red-bg); border-color: #f5c6c6; color: var(--red); }
    .empty-state { text-align: center; padding: 64px 20px; }
    .empty-state .empty-icon { width: 56px; height: 56px; border-radius: 50%; background: var(--bg); display: inline-flex; align-items: center; justify-content: center; font-size: 22px; color: var(--text-hint); margin-bottom: 14px; }
    .empty-state p { font-size: 14px; color: var(--text-secondary); margin: 6px 0 16px; }
    .cat-pagination { padding: 14px 20px; border-top: 1px solid var(--border); display: flex; justify-content: center; background: var(--surface); }
    .id-chip { display: inline-block; background: var(--bg); color: var(--text-secondary); font-size: 11px; font-weight: 700; padding: 2px 7px; border-radius: 6px; font-family: 'SF Mono', 'Fira Code', monospace; }
    .faq-question-cell { font-weight: 600; font-size: 13px; max-width: 360px; }
    .faq-answer-preview { color: var(--text-secondary); font-size: 12.5px; max-width: 420px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
    @media (max-width: 768px) {
        .cat-page { padding: 16px; }
        .filter-bar .form-row-inner { flex-direction: column; }
        .filter-control { min-width: 100%; }
    }
    </style>

    <div class="app-content content container-fluid">
        <div class="cat-page">

            <div class="cat-page-header">
                <div>
                    <h1>FAQs</h1>
                    <div class="cat-breadcrumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        Manage FAQs
                    </div>
                </div>
                <a href="{{ route('admin.faqs.create') }}" class="btn-primary-dash">
                    <i class="fa fa-plus"></i> Add FAQ
                </a>
            </div>

            <div class="cat-card">

                <div class="filter-bar">
                    <form method="GET">
                        <div class="form-row-inner">

                            <div class="filter-group" style="flex:1">
                                <label>Search</label>
                                <input type="text" name="search" value="{{ request('search') }}"
                                    class="filter-control filter-control-wide"
                                    placeholder="Search question…">
                            </div>

                            <div class="filter-actions">
                                <button type="submit" class="btn-primary-dash">
                                    <i class="fa fa-search"></i> Search
                                </button>
                                <a href="{{ route('admin.faqs.index') }}" class="btn-secondary-dash">
                                    <i class="fa fa-refresh"></i> Reset
                                </a>
                            </div>

                        </div>
                    </form>
                </div>

                <div class="cat-table-wrap">

                    @php
                        function faqSortUrl($column) {
                            $direction = request('sort_by') == $column && request('sort_dir') == 'asc' ? 'desc' : 'asc';
                            return request()->fullUrlWithQuery(['sort_by' => $column, 'sort_dir' => $direction]);
                        }
                        function faqSortIcon($column) {
                            if (request('sort_by') != $column) return '<i class="fa fa-sort"></i>';
                            return request('sort_dir') == 'asc'
                                ? '<i class="fa fa-sort-up" style="color:var(--accent)"></i>'
                                : '<i class="fa fa-sort-down" style="color:var(--accent)"></i>';
                        }
                    @endphp

                    <table class="cat-table">
                        <thead>
                            <tr>
                                <th>
                                    <a href="{{ faqSortUrl('id') }}" class="sort-link">ID {!! faqSortIcon('id') !!}</a>
                                </th>
                                <th>
                                    <a href="{{ faqSortUrl('question') }}" class="sort-link">Question {!! faqSortIcon('question') !!}</a>
                                </th>
                                <th>Answer</th>
                                <th>
                                    <a href="{{ faqSortUrl('sort_order') }}" class="sort-link">Order {!! faqSortIcon('sort_order') !!}</a>
                                </th>
                                <th>
                                    <a href="{{ faqSortUrl('status') }}" class="sort-link">Status {!! faqSortIcon('status') !!}</a>
                                </th>
                                <th style="width:90px">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($faqs as $item)
                                <tr id="row{{ $item->id }}">

                                    <td><span class="id-chip">{{ $item->id }}</span></td>

                                    <td class="faq-question-cell">{{ $item->question }}</td>

                                    <td>
                                        <div class="faq-answer-preview" title="{{ strip_tags($item->answer) }}">
                                            {{ Str::limit(strip_tags($item->answer), 80) }}
                                        </div>
                                    </td>

                                    <td style="color:var(--text-secondary);font-size:13px">{{ $item->sort_order }}</td>

                                    <td>
                                        {!! $item->status
                                            ? '<span class="pill pill-active">Active</span>'
                                            : '<span class="pill pill-inactive">Inactive</span>' !!}
                                    </td>

                                    <td>
                                        <div style="display:flex;gap:6px">
                                            <a href="{{ route('admin.faqs.edit', ['faq' => $item->id, 'redirect' => request()->fullUrl()]) }}"
                                                class="action-btn" title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button class="action-btn action-btn-danger"
                                                onclick="deleteFaq({{ $item->id }})" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="empty-state">
                                            <div class="empty-icon">
                                                <i class="fa fa-circle-question"></i>
                                            </div>
                                            <strong style="font-size:14px;color:var(--text-primary)">No FAQs found</strong>
                                            <p>Try adjusting your search or add a new FAQ to get started.</p>
                                            <a href="{{ route('admin.faqs.create') }}" class="btn-primary-dash">
                                                <i class="fa fa-plus"></i> Add FAQ
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="cat-pagination">
                    {{ $faqs->links() }}
                </div>

            </div>

        </div>
    </div>
</div>

@include('admin.footer')

<script>
function deleteFaq(id) {
    Swal.fire({
        title: 'Delete FAQ?',
        text: "This action cannot be undone.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#b22222',
        cancelButtonColor: '#6d7175',
        confirmButtonText: 'Yes, Delete'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "{{ url('admin/faqs') }}/" + id,
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