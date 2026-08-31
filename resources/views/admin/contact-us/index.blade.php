{{-- resources/views/admin/contact-us/index.blade.php --}}
@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    <style>
    :root {
        --bg: #f1f2f4; --surface: #ffffff; --border: #e3e5e8;
        --text-primary: #202223; --text-secondary:#6d7175; --text-hint:#8c9196;
        --accent: #303d89; --accent-light: #f0f1fc;
        --green: #007a5e; --green-bg: #e3f1ec;
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
    .btn-secondary-dash { display: inline-flex; align-items: center; gap: 6px; background: var(--surface); color: var(--text-primary) !important; border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 8px 16px; font-size: 13px; font-weight: 500; cursor: pointer; text-decoration: none !important; }
    .btn-secondary-dash:hover { background: var(--bg); }
    .cat-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-card); overflow: hidden; }
    .filter-bar { padding: 16px 20px; border-bottom: 1px solid var(--border); background: var(--surface); }
    .filter-bar .form-row-inner { display: flex; flex-wrap: wrap; gap: 12px; align-items: flex-end; }
    .filter-group { display: flex; flex-direction: column; gap: 5px; }
    .filter-group label { font-size: 12px; font-weight: 600; color: var(--text-secondary); letter-spacing: .03em; text-transform: uppercase; }
    .filter-control { height: 36px; border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 0 11px; font-size: 13px; color: var(--text-primary); background: var(--surface); outline: none; font-family: var(--font); min-width: 220px; }
    .filter-control:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(48,61,137,.12); }
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
    .name-cell strong { display: block; font-weight: 600; font-size: 13px; }
    .name-cell small { font-size: 11.5px; color: var(--text-hint); }
    .msg-cell { max-width: 260px; color: var(--text-secondary); font-size: 12.5px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
    .pill { display: inline-flex; align-items: center; gap: 4px; font-size: 11.5px; font-weight: 600; padding: 3px 9px; border-radius: 20px; white-space: nowrap; }
    .pill::before { content: ''; width: 5px; height: 5px; border-radius: 50%; display: inline-block; }
    .pill-yes  { background: var(--accent-light); color: var(--accent); }
    .pill-yes::before  { background: var(--accent); }
    .pill-no   { background: var(--bg); color: var(--text-hint); }
    .pill-no::before   { background: var(--text-hint); }
    .action-btn { display: inline-flex; align-items: center; justify-content: center; width: 30px; height: 30px; border-radius: var(--radius-sm); border: 1px solid var(--border); background: var(--surface); color: var(--text-secondary); font-size: 12px; cursor: pointer; text-decoration: none; }
    .action-btn:hover { background: var(--bg); color: var(--text-primary); }
    .action-btn-danger:hover { background: var(--red-bg); border-color: #f5c6c6; color: var(--red); }
    .empty-state { text-align: center; padding: 64px 20px; }
    .empty-state .empty-icon { width: 56px; height: 56px; border-radius: 50%; background: var(--bg); display: inline-flex; align-items: center; justify-content: center; font-size: 22px; color: var(--text-hint); margin-bottom: 14px; }
    .empty-state p { font-size: 14px; color: var(--text-secondary); margin: 6px 0 16px; }
    .cat-pagination { padding: 14px 20px; border-top: 1px solid var(--border); display: flex; justify-content: center; background: var(--surface); }
    .id-chip { display: inline-block; background: var(--bg); color: var(--text-secondary); font-size: 11px; font-weight: 700; padding: 2px 7px; border-radius: 6px; font-family: 'SF Mono', 'Fira Code', monospace; }

    .detail-modal-overlay { display: none; position: fixed; inset: 0; background: rgba(32,34,35,.5); z-index: 999; align-items: center; justify-content: center; }
    .detail-modal-overlay.open { display: flex; }
    .detail-modal { background: var(--surface); border-radius: var(--radius-md); width: 460px; max-width: 92vw; max-height: 85vh; overflow-y: auto; box-shadow: 0 12px 32px rgba(0,0,0,.2); }
    .detail-modal-header { display: flex; justify-content: space-between; align-items: center; padding: 16px 20px; border-bottom: 1px solid var(--border); }
    .detail-modal-header h3 { margin: 0; font-size: 15px; font-weight: 650; }
    .detail-modal-close { background: none; border: none; font-size: 18px; cursor: pointer; color: var(--text-hint); }
    .detail-modal-body { padding: 20px; font-size: 13.5px; }
    .detail-row { margin-bottom: 14px; }
    .detail-row .detail-label { font-size: 11px; font-weight: 600; letter-spacing: .04em; text-transform: uppercase; color: var(--text-hint); margin-bottom: 3px; }
    .detail-row .detail-value { color: var(--text-primary); white-space: pre-wrap; }

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
                    <h1>Contact Us</h1>
                    <div class="cat-breadcrumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        Contact Us Enquiries
                    </div>
                </div>
            </div>

            <div class="cat-card">

                <div class="filter-bar">
                    <form method="GET">
                        <div class="form-row-inner">
                            <div class="filter-group">
                                <label>Search</label>
                                <input type="text" name="search" value="{{ request('search') }}"
                                    class="filter-control" placeholder="Search name, email or mobile…">
                            </div>
                            <div class="filter-actions">
                                <button type="submit" class="btn-primary-dash">
                                    <i class="fa fa-search"></i> Search
                                </button>
                                <a href="{{ route('admin.contactUs.index') }}" class="btn-secondary-dash">
                                    <i class="fa fa-refresh"></i> Reset
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="cat-table-wrap">

                    @php
                        function contactSortUrl($column) {
                            $direction = request('sort_by') == $column && request('sort_order') == 'asc' ? 'desc' : 'asc';
                            return request()->fullUrlWithQuery(['sort_by' => $column, 'sort_order' => $direction]);
                        }
                        function contactSortIcon($column) {
                            if (request('sort_by') != $column) return '<i class="fa fa-sort"></i>';
                            return request('sort_order') == 'asc'
                                ? '<i class="fa fa-sort-up" style="color:var(--accent)"></i>'
                                : '<i class="fa fa-sort-down" style="color:var(--accent)"></i>';
                        }
                    @endphp

                    <table class="cat-table">
                        <thead>
                            <tr>
                                <th><a href="{{ contactSortUrl('id') }}" class="sort-link">ID {!! contactSortIcon('id') !!}</a></th>
                                <th><a href="{{ contactSortUrl('name') }}" class="sort-link">Name {!! contactSortIcon('name') !!}</a></th>
                                <th>Interest</th>
                                <th>Message</th>
                                <th><a href="{{ contactSortUrl('created_at') }}" class="sort-link">Received {!! contactSortIcon('created_at') !!}</a></th>
                                <th style="width:100px">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($contacts as $item)
                                <tr id="row{{ $item->id }}">
                                    <td><span class="id-chip">{{ $item->id }}</span></td>
                                    <td>
                                        <div class="name-cell">
                                            <strong>{{ $item->name }} {!! !$item->is_read ? '<span class="pill pill-yes">New</span>' : '' !!}</strong>
                                            <small>{{ $item->email_id }} @if($item->mobile_number) &middot; {{ $item->mobile_number }} @endif</small>
                                        </div>
                                    </td>
                                    <td style="color:var(--text-secondary);font-size:13px">
                                        @if($item->interest && count($item->interest))
                                            {{ implode(', ', $item->interest) }}
                                        @else
                                            —
                                        @endif
                                    </td>
                                    <td class="msg-cell" title="{{ $item->message }}">{{ $item->message }}</td>
                                    <td style="color:var(--text-secondary);font-size:13px">{{ $item->created_at->format('d M Y, h:i A') }}</td>
                                    <td>
                                        <div style="display:flex;gap:6px">
                                            <button class="action-btn" title="View"
                                                onclick="viewContact({{ $item->id }})">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <button class="action-btn action-btn-danger" title="Delete"
                                                onclick="deleteContact({{ $item->id }})">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="empty-state">
                                            <div class="empty-icon"><i class="fa fa-envelope-open"></i></div>
                                            <strong style="font-size:14px;color:var(--text-primary)">No enquiries yet</strong>
                                            <p>Contact form submissions will show up here.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="cat-pagination">
                    {{ $contacts->links() }}
                </div>

            </div>

        </div>
    </div>
</div>

<div class="detail-modal-overlay" id="detailModal">
    <div class="detail-modal">
        <div class="detail-modal-header">
            <h3>Enquiry Details</h3>
            <button class="detail-modal-close" onclick="closeDetailModal()">&times;</button>
        </div>
        <div class="detail-modal-body" id="detailModalBody">
            <!-- populated via JS -->
        </div>
    </div>
</div>

@include('admin.footer')

<script>
function viewContact(id) {
    fetch("{{ url('admin/contact-us') }}/" + id)
        .then(res => res.json())
        .then(res => {
            const c = res.data;
            const interestList = Array.isArray(c.interest) && c.interest.length
                ? c.interest.join(', ')
                : '—';

            document.getElementById('detailModalBody').innerHTML = `
                <div class="detail-row"><div class="detail-label">Name</div><div class="detail-value">${c.name}</div></div>
                <div class="detail-row"><div class="detail-label">Email</div><div class="detail-value">${c.email_id ?? '—'}</div></div>
                <div class="detail-row"><div class="detail-label">Mobile</div><div class="detail-value">${c.mobile_number ?? '—'}</div></div>
                <div class="detail-row"><div class="detail-label">Interested In</div><div class="detail-value">${interestList}</div></div>
                <div class="detail-row"><div class="detail-label">Message</div><div class="detail-value">${c.message ?? '—'}</div></div>
            `;
            document.getElementById('detailModal').classList.add('open');
            const row = document.getElementById('row' + id);
            if (row) row.querySelector('.pill-yes')?.remove();
        });
}

function closeDetailModal() {
    document.getElementById('detailModal').classList.remove('open');
}

function deleteContact(id) {
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
                url: "{{ url('admin/contact-us') }}/" + id,
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