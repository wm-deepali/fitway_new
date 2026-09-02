{{-- resources/views/admin/seo/index.blade.php --}}
@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    <style>
    :root {
        --bg: #f1f2f4; --surface: #ffffff; --border: #e3e5e8;
        --text-primary: #202223; --text-secondary:#6d7175; --text-hint:#8c9196;
        --accent: #303d89; --green: #007a5e; --green-bg: #e3f1ec;
        --amber: #8a6100; --amber-bg: #fdf1d8;
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
    .cat-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-card); overflow: hidden; }
    .cat-table-wrap { overflow-x: auto; }
    .cat-table { width: 100%; border-collapse: collapse; font-size: 13px; font-family: var(--font); }
    .cat-table thead th { font-size: 11px; font-weight: 600; letter-spacing: .06em; text-transform: uppercase; color: var(--text-hint); padding: 10px 16px; border-bottom: 1px solid var(--border); background: #fafafa; text-align: left; white-space: nowrap; }
    .cat-table tbody tr { border-bottom: 1px solid var(--border); }
    .cat-table tbody tr:last-child { border-bottom: none; }
    .cat-table tbody tr:hover { background: #fafbfc; }
    .cat-table tbody td { padding: 12px 16px; vertical-align: middle; }
    .pill { display: inline-flex; align-items: center; gap: 4px; font-size: 11.5px; font-weight: 600; padding: 3px 9px; border-radius: 20px; white-space: nowrap; }
    .pill::before { content: ''; width: 5px; height: 5px; border-radius: 50%; display: inline-block; }
    .pill-active  { background: var(--green-bg); color: var(--green); }
    .pill-active::before  { background: var(--green); }
    .pill-inactive { background: var(--amber-bg); color: var(--amber); }
    .pill-inactive::before { background: var(--amber); }
    .action-btn { display: inline-flex; align-items: center; justify-content: center; width: 30px; height: 30px; border-radius: var(--radius-sm); border: 1px solid var(--border); background: var(--surface); color: var(--text-secondary); font-size: 12px; cursor: pointer; text-decoration: none; }
    .action-btn:hover { background: var(--bg); color: var(--text-primary); }
    .empty-state { text-align: center; padding: 64px 20px; }
    .empty-state .empty-icon { width: 56px; height: 56px; border-radius: 50%; background: var(--bg); display: inline-flex; align-items: center; justify-content: center; font-size: 22px; color: var(--text-hint); margin-bottom: 14px; }
    .empty-state p { font-size: 14px; color: var(--text-secondary); margin: 6px 0 16px; }
    .cat-pagination { padding: 14px 20px; border-top: 1px solid var(--border); display: flex; justify-content: center; background: var(--surface); }
    .id-chip { display: inline-block; background: var(--bg); color: var(--text-secondary); font-size: 11px; font-weight: 700; padding: 2px 7px; border-radius: 6px; font-family: 'SF Mono', 'Fira Code', monospace; }
    @media (max-width: 768px) {
        .cat-page { padding: 16px; }
    }
    </style>

    <div class="app-content content container-fluid">
        <div class="cat-page">

            <div class="cat-page-header">
                <div>
                    <h1>SEO Management</h1>
                    <div class="cat-breadcrumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        SEO Management
                    </div>
                </div>
            </div>

            <div class="cat-card">
                <div class="cat-table-wrap">
                    <table class="cat-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Page</th>
                                <th>H1</th>
                                <th>Meta Title</th>
                                <th>SEO Status</th>
                                <th style="width:70px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($records as $record)
                                <tr>
                                    <td><span class="id-chip">{{ $record->id }}</span></td>
                                    <td style="font-weight:600;font-size:13px">{{ $record->name }}</td>
                                    <td style="color:var(--text-secondary)">{{ $record->seo->h1 ?? '—' }}</td>
                                    <td style="color:var(--text-secondary)">{{ $record->seo->meta_title ?? '—' }}</td>
                                    <td>
                                        @if ($record->seo)
                                            <span class="pill pill-active">Set</span>
                                        @else
                                            <span class="pill pill-inactive">Not Set</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.seo.edit', $record->id) }}"
                                           class="action-btn" title="Edit SEO">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="empty-state">
                                            <div class="empty-icon"><i class="fa fa-search"></i></div>
                                            <strong style="font-size:14px;color:var(--text-primary)">No pages found</strong>
                                            <p>Pehle Page Seeder run karo.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="cat-pagination">
                    {{ $records->links() }}
                </div>
            </div>

        </div>
    </div>
</div>

@include('admin.footer')