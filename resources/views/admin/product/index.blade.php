{{-- resources/views/admin/products/index.blade.php --}}
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
    .icon-btn { display: inline-flex; align-items: center; justify-content: center; width: 30px; height: 30px; border-radius: var(--radius-sm); border: 1px solid var(--border); background: var(--surface); color: var(--text-secondary) !important; text-decoration: none !important; cursor: pointer; }
    .icon-btn:hover { background: var(--bg); }
    .icon-btn.danger:hover { background: #fdecec; color: #b22222 !important; border-color: #f3c6c6; }
    .cat-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-card); }
    .filters-bar { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; padding: 16px 20px; border-bottom: 1px solid var(--border); }
    .form-control-styled {
        height: 38px; border: 1px solid var(--border); border-radius: var(--radius-sm);
        padding: 0 12px; font-size: 13px; font-family: var(--font); color: var(--text-primary);
        outline: none; background: var(--surface);
    }
    .filters-bar select.form-control-styled { min-width: 160px; }
    .filters-bar input[type="text"].form-control-styled { min-width: 220px; }
    .filters-bar .clear-link { font-size: 12.5px; color: var(--text-hint); text-decoration: none; }
    .filters-bar .clear-link:hover { color: var(--accent); }
    table.products-table { width: 100%; border-collapse: collapse; }
    table.products-table th, table.products-table td { padding: 12px 16px; text-align: left; border-bottom: 1px solid var(--border); font-size: 13px; vertical-align: middle; }
    table.products-table th { font-size: 11.5px; text-transform: uppercase; letter-spacing: .04em; color: var(--text-hint); font-weight: 650; }
    table.products-table th a { color: inherit; text-decoration: none; }
    table.products-table th a:hover { color: var(--accent); }
    table.products-table tbody tr:hover { background: #fafbfc; }
    .prod-cell { display: flex; align-items: center; gap: 10px; }
    .prod-cell img { width: 40px; height: 40px; object-fit: cover; border-radius: 6px; border: 1px solid var(--border); background: var(--bg); }
    .prod-name { font-weight: 600; }
    .prod-slug { font-size: 11.5px; color: var(--text-hint); }
    .cat-path { font-size: 12px; color: var(--text-secondary); }
    .price-offered { font-weight: 600; }
    .price-mrp { color: var(--text-hint); text-decoration: line-through; font-size: 11.5px; margin-left: 6px; }
    .price-request { color: var(--text-hint); font-style: italic; }
    .badge { display: inline-block; padding: 3px 10px; border-radius: 999px; font-size: 11.5px; font-weight: 600; }
    .badge.active { background: #e4f5e9; color: #1e7a3f; }
    .badge.inactive { background: #f1f2f4; color: var(--text-hint); }
    .row-actions { display: flex; gap: 6px; }
    .empty-state { padding: 48px 20px; text-align: center; color: var(--text-hint); font-size: 13.5px; }
    .pagination-wrap { padding: 16px 20px; border-top: 1px solid var(--border); }
    @media (max-width: 768px) { table.products-table { display: block; overflow-x: auto; } }
    </style>

    <div class="app-content content container-fluid">
        <div class="cat-page">

            <div class="cat-page-header">
                <div>
                    <h1>Products</h1>
                    <div class="cat-breadcrumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        Products
                    </div>
                </div>
                <a href="{{ route('admin.products.create') }}" class="btn-primary-dash">
                    <i class="fa fa-plus"></i> Add Product
                </a>
            </div>

            <div class="cat-card">
                <form action="{{ route('admin.products.index') }}" method="GET" class="filters-bar" id="filters-form">
                    <select id="category_id" name="category_id" class="form-control-styled">
                        <option value="">All Categories</option>
                        @foreach($parentCategories as $parent)
                            <option value="{{ $parent->id }}" {{ request('category_id') == $parent->id ? 'selected' : '' }}>
                                {{ $parent->category_name }}
                            </option>
                        @endforeach
                    </select>

                    <select id="sub_cat_id" name="sub_cat_id" class="form-control-styled">
                        <option value="">All Sub Categories</option>
                        @foreach($subCategories as $sub)
                            <option value="{{ $sub->id }}" {{ request('sub_cat_id') == $sub->id ? 'selected' : '' }}>
                                {{ $sub->name }}
                            </option>
                        @endforeach
                    </select>

                    <input type="text" name="search" class="form-control-styled" placeholder="Search products…" value="{{ request('search') }}">

                    <button type="submit" class="btn-secondary-dash">
                        <i class="fa fa-filter"></i> Filter
                    </button>

                    @if(request()->hasAny(['category_id', 'sub_cat_id', 'search']))
                        <a href="{{ route('admin.products.index') }}" class="clear-link">Clear filters</a>
                    @endif
                </form>

                @if($products->isEmpty())
                    <div class="empty-state">No products found.</div>
                @else
                    <table class="products-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Category Path</th>
                                <th>Product Type</th>
                                <th><a href="{{ request()->fullUrlWithQuery(['sort_by' => 'offered_price', 'sort_order' => request('sort_by') === 'offered_price' && request('sort_order') === 'asc' ? 'desc' : 'asc']) }}">Price</a></th>
                                <th><a href="{{ request()->fullUrlWithQuery(['sort_by' => 'status', 'sort_order' => request('sort_by') === 'status' && request('sort_order') === 'asc' ? 'desc' : 'asc']) }}">Status</a></th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr id="product-row-{{ $product->id }}">
                                    <td>
                                        <div class="prod-cell">
                                            @if($product->image_url)
                                                <img src="{{ $product->image_url }}" alt="{{ $product->image_alt }}">
                                            @else
                                                <img src="{{ asset('Admin/images/no-image.svg') }}" alt="{{ $product->name }}">
                                            @endif
                                            <div>
                                                <div class="prod-name">{{ $product->name }}</div>
                                                <div class="prod-slug">{{ $product->slug }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cat-path">
                                            {{ $product->category->category_name ?? '—' }}
                                            @if($product->subCategory) › {{ $product->subCategory->name }} @endif
                                            @if($product->subSubCategory) › {{ $product->subSubCategory->name }} @endif
                                        </div>
                                    </td>
                                    <td>{{ $product->source_type  === 'internal_inventory' ? 'Internal Inventory' : 'Catalog'}}</td>
                                    <td>
                                        @if($product->offered_price !== null)
                                            <span class="price-offered">₹{{ number_format($product->offered_price, 2) }}</span>
                                            @if($product->mrp && $product->mrp > $product->offered_price)
                                                <span class="price-mrp">₹{{ number_format($product->mrp, 2) }}</span>
                                            @endif
                                        @else
                                            <span class="price-request">Price on Request</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge {{ $product->status ? 'active' : 'inactive' }}">
                                            {{ $product->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="row-actions">
                                            <a href="{{ route('admin.products.edit', $product) }}" class="icon-btn" title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button type="button" class="icon-btn danger" title="Delete"
                                                onclick="deleteProduct({{ $product->id }})">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination-wrap">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>

@include('admin.footer')

<script>
document.getElementById('category_id').addEventListener('change', function () {
    const subSelect = document.getElementById('sub_cat_id');
    const categoryId = this.value;

    subSelect.innerHTML = '<option value="">Loading…</option>';

    if (!categoryId) {
        subSelect.innerHTML = '<option value="">All Sub Categories</option>';
        return;
    }

    fetch("{{ route('admin.products.getSubCategories') }}?category_id=" + categoryId)
        .then(res => res.json())
        .then(res => {
            subSelect.innerHTML = '<option value="">All Sub Categories</option>';
            res.data.forEach(sub => {
                const opt = document.createElement('option');
                opt.value = sub.id;
                opt.textContent = sub.name;
                subSelect.appendChild(opt);
            });
        });
});

function deleteProduct(productId) {
    Swal.fire({
        title: 'Delete this product?',
        text: 'This action cannot be undone.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        confirmButtonColor: '#b22222',
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (!result.isConfirmed) return;

        fetch(`/admin/products/${productId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
            },
        })
            .then(res => res.json())
            .then(res => {
                if (res.success) {
                    document.getElementById(`product-row-${productId}`).remove();
                    Swal.fire('Deleted', res.message, 'success');
                } else {
                    Swal.fire('Error', res.message || 'Something went wrong.', 'error');
                }
            })
            .catch(() => Swal.fire('Error', 'Something went wrong.', 'error'));
    });
}
</script>