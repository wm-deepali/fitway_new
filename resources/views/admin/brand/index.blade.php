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
    .brand-page { background: var(--bg); padding: 24px 28px; min-height: 100vh; font-family: var(--font); color: var(--text-primary); box-sizing: border-box; }
    .brand-page * { box-sizing: border-box; }
    .brand-page-header { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; margin-bottom: 20px; }
    .brand-page-header h1 { font-size: 20px; font-weight: 650; margin: 0; }
    .brand-breadcrumb { font-size: 12.5px; color: var(--text-hint); margin-top: 3px; }
    .brand-breadcrumb a { color: var(--accent); text-decoration: none; }
    .brand-breadcrumb a:hover { text-decoration: underline; }
    .brand-breadcrumb span { margin: 0 5px; }
    .btn-primary-dash { display: inline-flex; align-items: center; gap: 6px; background: var(--accent); color: #fff !important; border: none; border-radius: var(--radius-sm); padding: 9px 18px; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none !important; box-shadow: 0 1px 3px rgba(48,61,137,.25); }
    .btn-primary-dash:hover { background: #252f70; }
    .btn-secondary-dash { display: inline-flex; align-items: center; gap: 6px; background: var(--surface); color: var(--text-primary) !important; border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 9px 18px; font-size: 13px; font-weight: 500; cursor: pointer; text-decoration: none !important; }
    .btn-secondary-dash:hover { background: var(--bg); }
    .icon-btn { display: inline-flex; align-items: center; justify-content: center; width: 30px; height: 30px; border-radius: var(--radius-sm); border: 1px solid var(--border); background: var(--surface); color: var(--text-secondary) !important; text-decoration: none !important; cursor: pointer; }
    .icon-btn:hover { background: var(--bg); }
    .icon-btn.danger:hover { background: #fdecec; color: #b22222 !important; border-color: #f3c6c6; }
    .brand-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-card); }
    .filters-bar { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; padding: 16px 20px; border-bottom: 1px solid var(--border); }
    .form-control-styled { height: 38px; border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 0 12px; font-size: 13px; font-family: var(--font); color: var(--text-primary); outline: none; background: var(--surface); }
    .filters-bar input[type="text"].form-control-styled { min-width: 240px; }
    .filters-bar .clear-link { font-size: 12.5px; color: var(--text-hint); text-decoration: none; }
    .filters-bar .clear-link:hover { color: var(--accent); }
    table.brands-table { width: 100%; border-collapse: collapse; }
    table.brands-table th, table.brands-table td { padding: 12px 16px; text-align: left; border-bottom: 1px solid var(--border); font-size: 13px; vertical-align: middle; }
    table.brands-table th { font-size: 11.5px; text-transform: uppercase; letter-spacing: .04em; color: var(--text-hint); font-weight: 650; }
    table.brands-table tbody tr:hover { background: #fafbfc; }
    .brand-cell { display: flex; align-items: center; gap: 10px; }
    .brand-cell img { width: 40px; height: 40px; object-fit: contain; border-radius: 6px; border: 1px solid var(--border); background: var(--bg); }
    .brand-name { font-weight: 600; }
    .brand-slug { font-size: 11.5px; color: var(--text-hint); }
    .brand-desc { font-size: 12.5px; color: var(--text-secondary); max-width: 320px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
    .badge { display: inline-block; padding: 3px 10px; border-radius: 999px; font-size: 11.5px; font-weight: 600; }
    .badge.active { background: #e4f5e9; color: #1e7a3f; }
    .badge.inactive { background: #f1f2f4; color: var(--text-hint); }
    .row-actions { display: flex; gap: 6px; }
    .empty-state { padding: 48px 20px; text-align: center; color: var(--text-hint); font-size: 13.5px; }
    .pagination-wrap { padding: 16px 20px; border-top: 1px solid var(--border); }
    @media (max-width: 768px) { table.brands-table { display: block; overflow-x: auto; } }
    </style>

    <div class="app-content content container-fluid">
        <div class="brand-page">

            <div class="brand-page-header">
                <div>
                    <h1>Brands</h1>
                    <div class="brand-breadcrumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        Brands
                    </div>
                </div>
                <a href="{{ route('admin.brands.create') }}" class="btn-primary-dash">
                    <i class="fa fa-plus"></i> Add Brand
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success" style="margin-bottom:16px">{{ session('success') }}</div>
            @endif

            <div class="brand-card">
                <form action="{{ route('admin.brands.index') }}" method="GET" class="filters-bar">
                    <input type="text" name="search" class="form-control-styled" placeholder="Search brands…" value="{{ request('search') }}">
                    <button type="submit" class="btn-secondary-dash">
                        <i class="fa fa-search"></i> Search
                    </button>
                    @if(request()->hasAny(['search']))
                        <a href="{{ route('admin.brands.index') }}" class="clear-link">Clear</a>
                    @endif
                </form>

                @if($brands->isEmpty())
                    <div class="empty-state">No brands found.</div>
                @else
                    <table class="brands-table">
                        <thead>
                            <tr>
                                <th>Brand</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($brands as $brand)
                                <tr id="brand-row-{{ $brand->id }}">
                                    <td>
                                        <div class="brand-cell">
                                            @if($brand->logo_url)
                                                <img src="{{ $brand->logo_url }}" alt="{{ $brand->name }}">
                                            @else
                                                <img src="{{ asset('Admin/images/no-image.svg') }}" alt="{{ $brand->name }}">
                                            @endif
                                            <div>
                                                <div class="brand-name">{{ $brand->name }}</div>
                                                <div class="brand-slug">{{ $brand->slug }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="brand-desc">{{ $brand->description ?? '—' }}</div>
                                    </td>
                                    <td>
                                        <span class="badge {{ $brand->status ? 'active' : 'inactive' }}">
                                            {{ $brand->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="row-actions">
                                            <a href="{{ route('admin.brands.edit', $brand) }}" class="icon-btn" title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button type="button" class="icon-btn danger" title="Delete"
                                                onclick="deleteBrand({{ $brand->id }})">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination-wrap">
                        {{ $brands->links('pagination::bootstrap-4') }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>

@include('admin.footer')

<script>
function deleteBrand(brandId) {
    Swal.fire({
        title: 'Delete this brand?',
        text: 'This action cannot be undone.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        confirmButtonColor: '#b22222',
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (!result.isConfirmed) return;

        fetch(`/admin/brands/${brandId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
            },
        })
            .then(res => res.json())
            .then(res => {
                if (res.success) {
                    document.getElementById(`brand-row-${brandId}`).remove();
                    Swal.fire('Deleted', res.message, 'success');
                } else {
                    Swal.fire('Error', res.message || 'Something went wrong.', 'error');
                }
            })
            .catch(() => Swal.fire('Error', 'Something went wrong.', 'error'));
    });
}
</script>