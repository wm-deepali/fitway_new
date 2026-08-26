@include('admin.top-header')
<div class="main-section">
    @include('admin.header')

    <style>
        .main-section {
            display: flex !important;
            flex-direction: row !important;
            align-items: stretch !important;
            min-height: 100vh !important;
            overflow: hidden !important;
        }

        .main-section #cssmenu {
            flex-shrink: 0 !important;
            flex-grow: 0 !important;
            width: 280px !important;
            min-width: 280px !important;
            max-width: 280px !important;
            overflow-y: auto !important;
            overflow-x: hidden !important;
            position: sticky !important;
            top: 0 !important;
            height: 100vh !important;
            align-self: flex-start !important;
        }

        .main-section .app-content,
        .main-section .app-content.content.container-fluid {
            flex: 1 1 0% !important;
            min-width: 0 !important;
            max-width: 100% !important;
            overflow-x: auto !important;
            box-sizing: border-box !important;
        }

        :root {
            --bg: #f6f8f4;
            --surface: #ffffff;
            --border: #e6e9e3;
            --text-primary: #23291f;
            --text-secondary: #6b7568;
            --text-hint: #8c9583;
            --accent: #123108;
            --accent-hover: #1c4a0d;
            --accent-light: #eef3ea;
            --green: #123108;
            --green-bg: #eef3ea;
            --red: #b3261e;
            --red-bg: #fbeceb;
            --amber: #8a6300;
            --amber-bg: #fff8e1;
            --radius-sm: 8px;
            --radius-md: 10px;
            --shadow-card: 0 2px 10px rgba(18, 49, 8, 0.06);
            --font: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        .stock-page {
            background: var(--bg);
            padding: 24px 28px;
            min-height: 100vh;
            font-family: var(--font);
            color: var(--text-primary);
        }

        .stock-page * {
            box-sizing: border-box;
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 20px;
        }

        .page-header h1 {
            font-size: 20px;
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
        }

        .crumb {
            font-size: 12.5px;
            color: var(--text-hint);
            margin-top: 3px;
        }

        .crumb a {
            color: var(--accent);
            text-decoration: none;
        }

        .crumb a:hover {
            text-decoration: underline;
        }

        .crumb span {
            margin: 0 5px;
        }

        .kpi-strip {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
            margin-bottom: 20px;
        }

        @media(max-width:900px) {
            .kpi-strip {
                grid-template-columns: repeat(1, 1fr);
            }
        }

        .kpi-tile {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            padding: 18px 20px;
            box-shadow: var(--shadow-card);
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .kpi-icon {
            width: 42px;
            height: 42px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .kpi-icon.green {
            background: var(--green-bg);
            color: var(--green);
        }

        .kpi-icon.amber {
            background: var(--amber-bg);
            color: var(--amber);
        }

        .kpi-icon.red {
            background: var(--red-bg);
            color: var(--red);
        }

        .kpi-label {
            font-size: 11.5px;
            font-weight: 700;
            color: var(--text-hint);
            text-transform: uppercase;
            letter-spacing: .04em;
        }

        .kpi-value {
            font-size: 24px;
            font-weight: 750;
            color: var(--text-primary);
            line-height: 1.1;
            margin-top: 3px;
        }

        .kpi-sub {
            font-size: 11.5px;
            color: var(--text-hint);
            margin-top: 4px;
        }

        .stock-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-card);
            overflow: hidden;
        }

        .filter-bar {
            padding: 14px 20px;
            border-bottom: 1px solid var(--border);
        }

        .filter-row {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: flex-end;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .filter-group label {
            font-size: 11.5px;
            font-weight: 700;
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
            background: #fbfcfa;
            outline: none;
            transition: border-color .15s;
            font-family: var(--font);
            min-width: 160px;
        }

        .filter-control:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(18, 49, 8, .12);
            background: #fff;
        }

        .btn-filter {
            height: 36px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--accent);
            color: #fff;
            border: none;
            border-radius: var(--radius-sm);
            padding: 0 16px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            font-family: var(--font);
            transition: background .15s;
        }

        .btn-filter:hover {
            background: var(--accent-hover);
        }

        .btn-filter-reset {
            height: 36px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--surface);
            color: var(--text-primary);
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 0 14px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            font-family: var(--font);
            transition: background .15s;
        }

        .btn-filter-reset:hover {
            background: var(--bg);
        }

        .table-wrap {
            overflow-x: auto;
        }

        .stock-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
            font-family: var(--font);
        }

        .stock-table thead th {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: .06em;
            text-transform: uppercase;
            color: #ffffff;
            padding: 10px 16px;
            border: none;
            background: var(--accent);
            text-align: left;
            white-space: nowrap;
        }

        .stock-table tbody tr {
            border-bottom: 1px solid var(--border);
            transition: background .1s;
        }

        .stock-table tbody tr:last-child {
            border-bottom: none;
        }

        .stock-table tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

        .stock-table tbody tr:nth-child(even) {
            background-color: #f6f8f4;
        }

        .stock-table tbody tr:hover {
            background: var(--accent-light) !important;
        }

        .stock-table tbody tr.row-dirty {
            background: var(--amber-bg) !important;
        }

        .stock-table tbody td {
            padding: 13px 16px;
            vertical-align: middle;
        }

        .prod-thumb {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-sm);
            object-fit: cover;
            border: 1px solid var(--border);
            flex-shrink: 0;
        }

        .prod-name {
            font-weight: 600;
            font-size: 13px;
            color: var(--text-primary);
        }

        .prod-sub {
            font-size: 11.5px;
            color: var(--text-hint);
            margin-top: 2px;
        }

        .price-input {
            width: 100px;
            height: 32px;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 0 10px;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-primary);
            background: #fbfcfa;
            outline: none;
            font-family: var(--font);
            text-align: right;
            transition: border-color .15s, box-shadow .15s, background .2s;
        }

        .price-input:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(18, 49, 8, .12);
            background: #fff;
        }

        .price-input.saved {
            border-color: var(--green);
            background: var(--green-bg);
        }

        .price-input.error {
            border-color: var(--red);
            background: var(--red-bg);
        }

        .price-input.dirty {
            border-color: var(--amber);
        }

        .discount-type-select {
            height: 32px;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            font-size: 12px;
            padding: 0 6px;
            font-family: var(--font);
            background: #fbfcfa;
            outline: none;
            margin-top: 4px;
            width: 100px;
        }

        .save-indicator {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 10.5px;
            font-weight: 600;
            margin-top: 3px;
            height: 14px;
        }

        .save-indicator.saving {
            color: var(--amber);
        }

        .save-indicator.saved {
            color: var(--green);
        }

        .save-indicator.error {
            color: var(--red);
        }

        .save-indicator.dirty {
            color: var(--amber);
        }

        .btn-save-row {
            height: 32px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--border);
            color: var(--text-hint);
            border: none;
            border-radius: var(--radius-sm);
            padding: 0 14px;
            font-size: 12.5px;
            font-weight: 600;
            cursor: not-allowed;
            font-family: var(--font);
            transition: background .15s, color .15s;
            white-space: nowrap;
        }

        .btn-save-row.active {
            background: var(--accent);
            color: #fff;
            cursor: pointer;
        }

        .btn-save-row.active:hover {
            background: var(--accent-hover);
        }

        .btn-save-row:disabled {
            opacity: .7;
        }

        .pag-row {
            padding: 14px 20px;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            background: #fafbf9;
        }

        .pag-info {
            font-size: 12.5px;
            color: var(--text-hint);
        }

        @media(max-width:768px) {
            .stock-page {
                padding: 16px;
            }

            .filter-row {
                flex-direction: column;
            }

            .filter-control {
                min-width: 100%;
            }
        }

        .page-item.active .page-link {
            background-color: #123108;
            border-color: #123108;
        }

        .page-link {
            color: #123108;
        }

        .btn-view-logs {
            height: 32px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--surface);
            color: var(--accent);
            border: 1px solid var(--accent);
            border-radius: var(--radius-sm);
            padding: 0 12px;
            font-size: 12.5px;
            font-weight: 600;
            cursor: pointer;
            font-family: var(--font);
            margin-top: 4px;
        }

        .btn-view-logs:hover {
            background: var(--accent-light);
        }

        .wm-logs-modal-backdrop {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .45);
            z-index: 2000;
            align-items: center;
            justify-content: center;
        }

        .wm-logs-modal-backdrop.show {
            display: flex;
        }

        .wm-logs-modal {
            background: #fff;
            border-radius: var(--radius-md);
            width: 640px;
            max-width: 92vw;
            max-height: 80vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, .2);
        }

        .wm-logs-modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 18px;
            border-bottom: 1px solid var(--border);
        }

        .wm-logs-modal-header h5 {
            margin: 0;
            font-size: 15px;
            font-weight: 700;
            color: var(--text-primary);
        }

        .wm-logs-modal-header button {
            background: none;
            border: none;
            font-size: 22px;
            line-height: 1;
            cursor: pointer;
            color: var(--text-hint);
        }

        .wm-logs-modal-body {
            padding: 16px 18px;
            overflow-y: auto;
            font-size: 12.5px;
        }

        .wm-logs-loading {
            text-align: center;
            color: var(--text-hint);
            padding: 20px;
        }

        .wm-logs-empty {
            text-align: center;
            color: var(--text-hint);
            padding: 20px;
        }

        .wm-log-entry {
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 10px 12px;
            margin-bottom: 10px;
        }

        .wm-log-entry-head {
            display: flex;
            justify-content: space-between;
            margin-bottom: 6px;
            font-size: 11.5px;
            color: var(--text-hint);
        }

        .wm-log-entry-head strong {
            color: var(--text-primary);
        }

        .wm-log-field {
            display: flex;
            gap: 8px;
            padding: 2px 0;
        }

        .wm-log-field-label {
            width: 110px;
            flex-shrink: 0;
            color: var(--text-secondary);
            font-weight: 600;
        }

        .wm-log-old {
            color: var(--red);
            text-decoration: line-through;
        }

        .wm-log-new {
            color: var(--green);
            font-weight: 600;
        }
    </style>

    <div class="app-content content container-fluid">
        <div class="stock-page">

            <div class="page-header">
                <div>
                    <h1>Price Management</h1>
                    <div class="crumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        Price Management
                    </div>
                </div>
                <div style="display:flex;gap:10px">
                    <a href="{{ route('admin.price-management.export', request()->query()) }}" class="btn-filter-reset">
                        <i class="fa fa-download"></i> Export CSV
                    </a>
                    <button type="button" class="btn-filter" id="openImportModal">
                        <i class="fa fa-upload"></i> Import CSV
                    </button>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success" style="margin-bottom:16px">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger" style="margin-bottom:16px">{{ session('error') }}</div>
            @endif
            @if(session('skipped_rows') && count(session('skipped_rows')))
                <div class="alert alert-warning" style="margin-bottom:16px">
                    Skipped rows: {{ implode(', ', session('skipped_rows')) }}
                </div>
            @endif

            <div class="kpi-strip">
                <div class="kpi-tile">
                    <div class="kpi-icon green"><i class="fa fa-cubes"></i></div>
                    <div>
                        <div class="kpi-label">Total Products</div>
                        <div class="kpi-value">{{ number_format($stats['total']) }}</div>
                        <div class="kpi-sub">In catalogue</div>
                    </div>
                </div>
                <div class="kpi-tile">
                    <div class="kpi-icon amber"><i class="fa fa-tag"></i></div>
                    <div>
                        <div class="kpi-label">No Discount Set</div>
                        <div class="kpi-value">{{ number_format($stats['no_discount']) }}</div>
                        <div class="kpi-sub">Products without a discount</div>
                    </div>
                </div>
                <div class="kpi-tile">
                    <div class="kpi-icon red"><i class="fa fa-exclamation-triangle"></i></div>
                    <div>
                        <div class="kpi-label">Missing Purchase Price</div>
                        <div class="kpi-value">{{ number_format($stats['no_purchase_price']) }}</div>
                        <div class="kpi-sub">Margin can't be tracked</div>
                    </div>
                </div>
            </div>

            <div class="stock-card">

                <form method="GET" action="{{ route('admin.price-management.index') }}" class="filter-bar" id="filters-form">
                    <div class="filter-row">
                        <div class="filter-group" style="flex:1">
                            <label>Search</label>
                            <input type="text" name="search" class="filter-control" style="min-width:220px"
                                placeholder="Product name…" value="{{ request('search') }}">
                        </div>
                        <div class="filter-group">
                            <label>Category</label>
                            <select name="category_id" id="category_id" class="filter-control">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ (string) request('category_id') === (string) $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="filter-group">
                            <label>Sub Category</label>
                            <select name="sub_cat_id" id="sub_cat_id" class="filter-control">
                                <option value="">All Sub Categories</option>
                                @foreach($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}" {{ (string) request('sub_cat_id') === (string) $subcategory->id ? 'selected' : '' }}>
                                        {{ $subcategory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div style="display:flex;gap:8px;align-items:flex-end">
                            <button type="submit" class="btn-filter"><i class="fa fa-search"></i> Search</button>
                            <a href="{{ route('admin.price-management.index') }}" class="btn-filter-reset"><i
                                    class="fa fa-refresh"></i> Reset</a>
                        </div>
                    </div>
                </form>

                <div class="table-wrap">
                    <table class="stock-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>MRP</th>
                                <th>Discount</th>
                                <th>Offered Price</th>
                                <th>Purchase Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                                <tr data-product-id="{{ $product->id }}">
                                    <td>
                                        <div style="display:flex;align-items:center;gap:10px">
                                            <img src="{{ $product->image_url ?? 'https://placehold.co/48x48/eef3ea/123108?text=P' }}"
                                                class="prod-thumb" alt="{{ $product->image_alt }}">
                                            <div style="flex:1;min-width:150px">
                                                <div class="prod-name">{{ $product->name }}</div>
                                                <div class="prod-sub">
                                                    @if($product->subSubCategory)
                                                        {{ $product->subSubCategory->name }}
                                                    @elseif($product->subCategory)
                                                        {{ $product->subCategory->name }}
                                                    @elseif($product->category)
                                                        {{ $product->category->category_name }}
                                                    @else
                                                        Uncategorized
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" step="0.01" min="0" class="price-input price-field"
                                            data-field="mrp" value="{{ $product->mrp }}">
                                    </td>
                                    <td>
                                        <input type="number" step="0.01" min="0" class="price-input price-field"
                                            data-field="discount_value" value="{{ $product->discount_value }}">
                                        <select class="discount-type-select price-field" data-field="discount_type">
                                            <option value="" {{ !$product->discount_type ? 'selected' : '' }}>No Discount</option>
                                            <option value="flat" {{ $product->discount_type == 'flat' ? 'selected' : '' }}>₹ Flat</option>
                                            <option value="percentage" {{ $product->discount_type == 'percentage' ? 'selected' : '' }}>% Percent</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" step="0.01" min="0" class="price-input price-field"
                                            data-field="offered_price" value="{{ $product->offered_price }}"
                                            placeholder="Blank = On Request">
                                    </td>
                                    <td>
                                        <input type="number" step="0.01" min="0" class="price-input price-field"
                                            data-field="purchase_price" value="{{ $product->purchase_price }}">
                                    </td>
                                    <td style="white-space:nowrap">
                                        <button type="button" class="btn-save-row" disabled>
                                            <i class="fa fa-save"></i> Save
                                        </button>
                                        <button type="button" class="btn-view-logs" data-product-id="{{ $product->id }}">
                                            <i class="fa fa-history"></i> Logs
                                        </button>
                                        <div class="save-indicator"></div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="text-align:center;padding:40px;color:var(--text-hint)">
                                        No products match these filters.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="m-3">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>


<div class="wm-logs-modal-backdrop" id="logsModalBackdrop">
    <div class="wm-logs-modal">
        <div class="wm-logs-modal-header">
            <h5>Price Change Logs</h5>
            <button type="button" id="closeLogsModal">&times;</button>
        </div>
        <div class="wm-logs-modal-body" id="logsModalBody">
            <div class="wm-logs-loading">Loading...</div>
        </div>
    </div>
</div>


<div class="wm-logs-modal-backdrop" id="importModalBackdrop">
    <div class="wm-logs-modal" style="width:480px">
        <div class="wm-logs-modal-header">
            <h5>Import Price CSV</h5>
            <button type="button" id="closeImportModal">&times;</button>
        </div>
        <div class="wm-logs-modal-body">
            <form method="POST" action="{{ route('admin.price-management.import') }}" enctype="multipart/form-data">
                @csrf
                <p style="font-size:12.5px;color:var(--text-secondary);margin-bottom:12px">
                    CSV must include an <strong>id</strong> column matching an existing product.
                    <strong>mrp, discount_type, discount_value, offered_price, purchase_price</strong> are
                    all optional — a blank cell leaves that field unchanged. Use the exported file as your template.
                </p>
                <input type="file" name="file" accept=".csv,.txt" required class="filter-control"
                    style="width:100%;margin-bottom:12px">
                <button type="submit" class="btn-filter" style="width:100%;justify-content:center">
                    <i class="fa fa-upload"></i> Upload & Update
                </button>
            </form>
        </div>
    </div>
</div>

@include('admin.footer')

<script>
    const PRICE_UPDATE_URL_TEMPLATE = "{{ route('admin.price-management.update', ['product' => '__ID__']) }}";
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

    // ---------- Category → Sub Category filter (reuses the products AJAX endpoint) ----------
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

    // ---------- Import modal ----------
    const importBackdrop = document.getElementById('importModalBackdrop');
    document.getElementById('openImportModal').addEventListener('click', () => importBackdrop.classList.add('show'));
    document.getElementById('closeImportModal').addEventListener('click', () => importBackdrop.classList.remove('show'));
    importBackdrop.addEventListener('click', (e) => { if (e.target === importBackdrop) importBackdrop.classList.remove('show'); });

    document.querySelectorAll('tr[data-product-id]').forEach(row => {
        const productId = row.dataset.productId;
        const saveBtn = row.querySelector('.btn-save-row');
        const indicator = row.querySelector('.save-indicator');
        const fields = row.querySelectorAll('.price-field');

        // Snapshot the original values so we can detect real changes
        // (and so undoing an edit back to the original clears the dirty state).
        const originalValues = {};
        fields.forEach(f => { originalValues[f.dataset.field] = f.value; });

        function isDirty() {
            return Array.from(fields).some(f => f.value !== originalValues[f.dataset.field]);
        }

        function markDirty() {
            const dirty = isDirty();
            saveBtn.disabled = !dirty;
            saveBtn.classList.toggle('active', dirty);
            row.classList.toggle('row-dirty', dirty);
            if (dirty) {
                indicator.className = 'save-indicator dirty';
                indicator.innerHTML = '<i class="fa fa-pencil"></i> Unsaved changes';
            } else {
                indicator.className = 'save-indicator';
                indicator.innerHTML = '';
            }
        }

        fields.forEach(field => {
            const eventType = field.tagName === 'SELECT' ? 'change' : 'input';
            field.addEventListener(eventType, markDirty);
        });

        saveBtn.addEventListener('click', () => saveRow(row, productId, originalValues));
    });

    async function saveRow(row, productId, originalValues) {
        const saveBtn = row.querySelector('.btn-save-row');
        const indicator = row.querySelector('.save-indicator');
        const fields = row.querySelectorAll('.price-field');

        saveBtn.disabled = true;
        saveBtn.classList.remove('active');
        indicator.className = 'save-indicator saving';
        indicator.innerHTML = '<i class="fa fa-circle-o-notch fa-spin"></i> Saving…';

        const payload = {};
        fields.forEach(f => { payload[f.dataset.field] = f.value; });

        try {
            const url = PRICE_UPDATE_URL_TEMPLATE.replace('__ID__', productId);
            const res = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    Accept: 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify(payload),
            });

            if (!res.ok) throw new Error('Request failed');
            await res.json();

            // Update the "original" snapshot to the newly saved values
            // so the row goes back to a clean (not dirty) state.
            fields.forEach(f => {
                originalValues[f.dataset.field] = f.value;
                if (f.tagName !== 'SELECT') {
                    f.classList.remove('dirty', 'error');
                    f.classList.add('saved');
                    setTimeout(() => f.classList.remove('saved'), 1200);
                }
            });

            row.classList.remove('row-dirty');
            indicator.className = 'save-indicator saved';
            indicator.innerHTML = '<i class="fa fa-check"></i> Saved';
            setTimeout(() => { indicator.innerHTML = ''; indicator.className = 'save-indicator'; }, 1500);
        } catch (err) {
            saveBtn.disabled = false;
            saveBtn.classList.add('active');
            fields.forEach(f => { if (f.tagName !== 'SELECT') f.classList.add('error'); });
            indicator.className = 'save-indicator error';
            indicator.innerHTML = '<i class="fa fa-times"></i> Failed — try again';
        }
    }

    // ---------- Logs modal ----------
    const LOGS_URL_TEMPLATE = "{{ route('admin.price-management.logs', ['product' => '__ID__']) }}";
    const logsBackdrop = document.getElementById('logsModalBackdrop');
    const logsBody = document.getElementById('logsModalBody');

    document.querySelectorAll('.btn-view-logs').forEach(btn => {
        btn.addEventListener('click', () => openLogs(btn.dataset.productId));
    });

    document.getElementById('closeLogsModal').addEventListener('click', closeLogs);
    logsBackdrop.addEventListener('click', (e) => { if (e.target === logsBackdrop) closeLogs(); });

    function closeLogs() {
        logsBackdrop.classList.remove('show');
    }

    const fieldLabels = {
        mrp: 'MRP',
        discount_type: 'Discount Type',
        discount_value: 'Discount Value',
        offered_price: 'Offered Price',
        purchase_price: 'Purchase Price',
    };

    async function openLogs(productId) {
        logsBackdrop.classList.add('show');
        logsBody.innerHTML = '<div class="wm-logs-loading">Loading...</div>';

        try {
            const url = LOGS_URL_TEMPLATE.replace('__ID__', productId);
            const res = await fetch(url, { headers: { Accept: 'application/json' } });
            const data = await res.json();

            if (!data.logs || data.logs.length === 0) {
                logsBody.innerHTML = '<div class="wm-logs-empty">No changes logged yet for this product.</div>';
                return;
            }

            logsBody.innerHTML = data.logs.map(log => {
                const rows = Object.keys(fieldLabels).map(key => {
                    const change = log[key];
                    if (!change || String(change.old) === String(change.new)) return '';
                    return `<div class="wm-log-field">
                    <div class="wm-log-field-label">${fieldLabels[key]}</div>
                    <div><span class="wm-log-old">${change.old ?? '-'}</span> → <span class="wm-log-new">${change.new ?? '-'}</span></div>
                </div>`;
                }).join('');

                return `<div class="wm-log-entry">
                <div class="wm-log-entry-head">
                    <span>By <strong>${log.user}</strong></span>
                    <span>${log.date}</span>
                </div>
                ${rows || '<div class="wm-logs-empty" style="padding:4px 0">No field-level change recorded.</div>'}
            </div>`;
            }).join('');

        } catch (err) {
            logsBody.innerHTML = '<div class="wm-logs-empty">Could not load logs — try again.</div>';
        }
    }
</script>