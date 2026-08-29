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
    .btn-primary-dash { display: inline-flex; align-items: center; gap: 6px; background: var(--accent); color: #fff !important; border: none; border-radius: var(--radius-sm); padding: 9px 18px; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none !important; box-shadow: 0 1px 3px rgba(48,61,137,.25); }
    .btn-primary-dash:hover { background: #252f70; }
    .btn-secondary-dash { display: inline-flex; align-items: center; gap: 6px; background: var(--surface); color: var(--text-primary) !important; border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 9px 18px; font-size: 13px; font-weight: 500; cursor: pointer; text-decoration: none !important; }
    .btn-secondary-dash:hover { background: var(--bg); }
    .cat-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-card); padding: 0; overflow: hidden; }
    .cat-table { width: 100%; border-collapse: collapse; }
    .cat-table th, .cat-table td { padding: 12px 16px; text-align: left; font-size: 13.5px; border-bottom: 1px solid var(--border); }
    .cat-table th { color: var(--text-secondary); font-weight: 600; font-size: 12px; text-transform: uppercase; letter-spacing: .03em; background: var(--bg); }
    .cat-table tr:last-child td { border-bottom: none; }
    .cat-actions { display: flex; gap: 8px; }
    .icon-btn { display: inline-flex; align-items: center; justify-content: center; width: 30px; height: 30px; border-radius: var(--radius-sm); border: 1px solid var(--border); background: var(--surface); color: var(--text-secondary); text-decoration: none; cursor: pointer; }
    .icon-btn:hover { background: var(--bg); }
    .icon-btn.danger:hover { background: #fdecea; color: #b22222; border-color: #f3c8c4; }
    .empty-state { padding: 40px 16px; text-align: center; color: var(--text-hint); font-size: 13.5px; }
    .alert-success-dash { background: #e6f4ea; color: #1e7e34; border: 1px solid #c3e6cb; padding: 10px 16px; border-radius: var(--radius-sm); font-size: 13.5px; margin-bottom: 18px; }
    .status-badge { display: inline-flex; align-items: center; gap: 5px; padding: 3px 10px; border-radius: 20px; font-size: 12px; font-weight: 600; }
    .status-badge.active { background: #e6f4ea; color: #1e7e34; }
    .status-badge.inactive { background: #f1f2f4; color: var(--text-hint); }
    </style>

    <div class="app-content content container-fluid">
        <div class="cat-page">

            <div class="cat-page-header">
                <div>
                    <h1>Portfolio Categories</h1>
                    <div class="cat-breadcrumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        Portfolio Categories
                    </div>
                </div>
                <a href="{{ route('admin.portfolio-category.create') }}" class="btn-primary-dash">
                    <i class="fa fa-plus"></i> Add New
                </a>
            </div>

            @if (session('success'))
                <div class="alert-success-dash">{{ session('success') }}</div>
            @endif

            <div class="cat-card">
                <table class="cat-table">
                    <thead>
                        <tr>
                            <th style="width:60px">#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th style="width:100px">Status</th>
                            <th style="width:120px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($portfolioCategories as $index => $category)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    <span class="status-badge {{ $category->status ? 'active' : 'inactive' }}">
                                        {{ $category->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="cat-actions">
                                        <a href="{{ route('admin.portfolio-category.edit', $category) }}" class="icon-btn" title="Edit">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <form action="{{ route('admin.portfolio-category.destroy', $category) }}" method="POST" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="icon-btn danger delete-btn" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">No portfolio categories added yet.</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const form = btn.closest('.delete-form');
            Swal.fire({
                title: 'Delete this category?',
                text: 'This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete',
                confirmButtonColor: '#b22222',
                cancelButtonText: 'Cancel',
            }).then(function (result) {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>

@include('admin.footer')