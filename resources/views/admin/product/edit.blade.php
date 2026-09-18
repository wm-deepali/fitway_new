{{-- resources/views/admin/products/edit.blade.php --}}
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
            padding: 9px 18px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none !important;
            box-shadow: 0 1px 3px rgba(48, 61, 137, .25);
        }

        .btn-primary-dash:hover {
            background: #252f70;
        }

        .btn-secondary-dash {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--surface);
            color: var(--text-primary) !important;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 9px 18px;
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
            padding: 24px;
            max-width: 820px;
        }

        .form-field {
            margin-bottom: 18px;
        }

        .form-field label {
            display: block;
            font-size: 12.5px;
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 6px;
            letter-spacing: .02em;
        }

        .form-field .hint {
            font-size: 11.5px;
            color: var(--text-hint);
            margin-top: 4px;
        }

        .form-row-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .form-control-styled {
            width: 100%;
            height: 40px;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 0 12px;
            font-size: 13.5px;
            font-family: var(--font);
            color: var(--text-primary);
            outline: none;
            transition: border-color .15s, box-shadow .15s;
            background: var(--surface);
        }

        select.form-control-styled {
            appearance: auto;
        }

        select.form-control-styled:disabled {
            background: var(--bg);
            color: var(--text-hint);
        }

        textarea.form-control-styled {
            height: auto;
            padding: 10px 12px;
            resize: vertical;
        }

        .form-control-styled:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(48, 61, 137, .12);
        }

        .form-error {
            color: #b22222;
            font-size: 12px;
            margin-top: 5px;
        }

        .toggle-row {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .switch {
            position: relative;
            width: 42px;
            height: 24px;
            flex-shrink: 0;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .switch-slider {
            position: absolute;
            inset: 0;
            background: var(--border);
            border-radius: 999px;
            cursor: pointer;
            transition: .15s;
        }

        .switch-slider::before {
            content: '';
            position: absolute;
            width: 18px;
            height: 18px;
            left: 3px;
            top: 3px;
            background: #fff;
            border-radius: 50%;
            transition: .15s;
            box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
        }

        .switch input:checked+.switch-slider {
            background: var(--accent);
        }

        .switch input:checked+.switch-slider::before {
            transform: translateX(18px);
        }

        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid var(--border);
        }

        .current-image {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 10px;
        }

        .current-image img {
            width: 64px;
            height: 64px;
            object-fit: cover;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border);
        }

        .current-image .label {
            font-size: 12px;
            color: var(--text-hint);
        }

        .seo-divider {
            border: none;
            border-top: 1px solid var(--border);
            margin: 22px 0;
        }

        .seo-section-title {
            font-size: 13px;
            font-weight: 650;
            margin-bottom: 14px;
        }

        /* Source-type pill selector */
        .source-pills {
            display: flex;
            gap: 10px;
            margin-bottom: 22px;
        }

        .source-pill {
            flex: 1;
            border: 1.5px solid var(--border);
            border-radius: var(--radius-md);
            padding: 14px 16px;
            cursor: pointer;
            transition: .15s;
        }

        .source-pill input {
            display: none;
        }

        .source-pill .pill-title {
            font-size: 13.5px;
            font-weight: 650;
        }

        .source-pill .pill-sub {
            font-size: 11.5px;
            color: var(--text-hint);
            margin-top: 2px;
        }

        .source-pill.active {
            border-color: var(--accent);
            background: rgba(48, 61, 137, .05);
        }

        .dropdown-add-row {
            display: flex;
            gap: 8px;
            align-items: flex-start;
        }

        .dropdown-add-row .form-control-styled {
            flex: 1;
        }

        .btn-add-inline {
            height: 40px;
            width: 40px;
            flex-shrink: 0;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            background: var(--surface);
            color: var(--accent);
            font-size: 16px;
            cursor: pointer;
        }

        .btn-add-inline:hover {
            background: var(--bg);
        }

        .qa-modal-backdrop {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .45);
            z-index: 2000;
            align-items: center;
            justify-content: center;
        }

        .qa-modal-backdrop.show {
            display: flex;
        }

        .qa-modal {
            background: #fff;
            border-radius: var(--radius-md);
            width: 520px;
            max-width: 92vw;
            max-height: 85vh;
            overflow-y: auto;
            box-shadow: 0 10px 40px rgba(0, 0, 0, .2);
        }

        .qa-modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 20px;
            border-bottom: 1px solid var(--border);
        }

        .qa-modal-header h5 {
            margin: 0;
            font-size: 15px;
            font-weight: 700;
        }

        .qa-modal-header button {
            background: none;
            border: none;
            font-size: 22px;
            cursor: pointer;
            color: var(--text-hint);
        }

        .qa-modal-body {
            padding: 18px 20px;
        }

        @media (max-width: 640px) {
            .form-row-2 {
                grid-template-columns: 1fr;
            }

            .source-pills {
                flex-direction: column;
            }
        }
    </style>

    <div class="app-content content container-fluid">
        <div class="cat-page">

            <div class="cat-page-header">
                <div>
                    <h1>Edit Product</h1>
                    <div class="cat-breadcrumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        <a href="{{ route('admin.products.index') }}">Products</a>
                        <span>›</span>
                        Edit
                    </div>
                </div>
                <a href="{{ route('admin.products.index') }}" class="btn-secondary-dash">
                    <i class="fa fa-arrow-left"></i> Back to List
                </a>
            </div>

            <div class="cat-card">
                <form action="{{ route('admin.products.update', $product) }}" method="POST"
                    enctype="multipart/form-data" id="productForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="redirect" value="{{ request()->query('redirect') }}">

                    <div class="source-pills">
                        <label class="source-pill" id="pillCatalog">
                            <input type="radio" name="source_type" value="catalog" {{ old('source_type', $product->source_type) === 'catalog' ? 'checked' : '' }}>
                            <div class="pill-title">Catalog Product</div>
                            <div class="pill-sub">Shown on storefront, has Category</div>
                        </label>
                        <label class="source-pill" id="pillInternal">
                            <input type="radio" name="source_type" value="internal_inventory" {{ old('source_type', $product->source_type) === 'internal_inventory' ? 'checked' : '' }}>
                            <div class="pill-title">Internal Inventory</div>
                            <div class="pill-sub">Used in Quotations, has Vendor + Brand</div>
                        </label>
                    </div>
                    @error('source_type')
                    <div class="form-error" style="margin-top:-14px;margin-bottom:14px">{{ $message }}</div> @enderror

                    {{-- ===== Catalog-only fields ===== --}}
                    <div id="catalogFields">
                        <div class="form-row-2">
                            <div class="form-field">
                                <label for="category_id">Category</label>
                                <select id="category_id" name="category_id"
                                    class="form-control-styled @error('category_id') is-invalid @enderror">
                                    <option value="">Select Category</option>
                                    @foreach($parentCategories as $parent)
                                        <option value="{{ $parent->id }}" {{ old('category_id', $product->category_id) == $parent->id ? 'selected' : '' }}>
                                            {{ $parent->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="form-error">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-field">
                                <label for="sub_cat_id">Sub Category</label>
                                <select id="sub_cat_id" name="sub_cat_id" class="form-control-styled">
                                    <option value="">Select Sub Category</option>
                                    @foreach($subCategories as $sub)
                                        <option value="{{ $sub->id }}" {{ old('sub_cat_id', $product->sub_cat_id) == $sub->id ? 'selected' : '' }}>
                                            {{ $sub->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-field">
                            <label for="sub_sub_cat_id">Sub Sub Category</label>
                            <select id="sub_sub_cat_id" name="sub_sub_cat_id" class="form-control-styled">
                                <option value="">Select Sub Sub Category</option>
                                @foreach($subSubCategories as $subSub)
                                    <option value="{{ $subSub->id }}" {{ old('sub_sub_cat_id', $product->sub_sub_cat_id) == $subSub->id ? 'selected' : '' }}>
                                        {{ $subSub->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- ===== Internal Inventory-only fields ===== --}}
                    <div id="inventoryFields" style="display:none">
                        <div class="form-row-2">
                            <div class="form-field">
                                <label for="vendor_id">Purchased From (Vendor)</label>
                                <div class="dropdown-add-row">
                                    <select id="vendor_id" name="vendor_id"
                                        class="form-control-styled @error('vendor_id') is-invalid @enderror">
                                        <option value="">Select Vendor</option>
                                        @foreach($vendors as $vendor)
                                            <option value="{{ $vendor->id }}" {{ old('vendor_id', $product->vendor_id) == $vendor->id ? 'selected' : '' }}>
                                                {{ $vendor->vendor_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn-add-inline" id="openVendorModal"
                                        title="Add new vendor">+</button>
                                </div>
                                @error('vendor_id')
                                <div class="form-error">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-field">
                                <label for="brand_id">Brand</label>
                                <div class="dropdown-add-row">
                                    <select id="brand_id" name="brand_id"
                                        class="form-control-styled @error('brand_id') is-invalid @enderror">
                                        <option value="">Select Brand</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn-add-inline" id="openBrandModal"
                                        title="Add new brand">+</button>
                                </div>
                                @error('brand_id')
                                <div class="form-error">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-field">
                        <label for="name">Product Name</label>
                        <input type="text" id="name" name="name"
                            class="form-control-styled @error('name') is-invalid @enderror"
                            value="{{ old('name', $product->name) }}" placeholder="Enter product name" required>
                        @error('name')
                        <div class="form-error">{{ $message }}</div> @enderror
                        <div class="hint">Slug: {{ $product->slug }} (regenerates automatically if you change the name)
                        </div>
                    </div>

                    <div class="form-row-2">
                        <div class="form-field">
                            <label for="mrp">MRP</label>
                            <input type="text" id="mrp" name="mrp"
                                class="form-control-styled @error('mrp') is-invalid @enderror"
                                value="{{ old('mrp', $product->mrp) }}" placeholder="Enter MRP">
                            @error('mrp')
                            <div class="form-error">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-field">
                            <label for="purchase_price">Purchase Price</label>
                            <input type="text" id="purchase_price" name="purchase_price"
                                class="form-control-styled @error('purchase_price') is-invalid @enderror"
                                value="{{ old('purchase_price', $product->purchase_price) }}"
                                placeholder="Enter purchase price">
                            @error('purchase_price')
                            <div class="form-error">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-row-2">
                        <div class="form-field">
                            <label for="discount_type">Discount Type</label>
                            <select id="discount_type" name="discount_type"
                                class="form-control-styled @error('discount_type') is-invalid @enderror">
                                <option value="">No Discount</option>
                                <option value="flat" {{ old('discount_type', $product->discount_type) === 'flat' ? 'selected' : '' }}>Flat</option>
                                <option value="percentage" {{ old('discount_type', $product->discount_type) === 'percentage' ? 'selected' : '' }}>Percentage</option>
                            </select>
                            @error('discount_type')
                            <div class="form-error">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-field">
                            <label for="discount_value">Discount Value</label>
                            <input type="text" id="discount_value" name="discount_value"
                                class="form-control-styled @error('discount_value') is-invalid @enderror"
                                value="{{ old('discount_value', $product->discount_value) }}" placeholder="e.g. 10">
                            @error('discount_value')
                            <div class="form-error">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-field">
                        <label for="offered_price">Offered Price</label>
                        <input type="text" id="offered_price" name="offered_price"
                            class="form-control-styled @error('offered_price') is-invalid @enderror"
                            value="{{ old('offered_price', $product->offered_price) }}"
                            placeholder="Auto-calculated from MRP and discount, or enter manually">
                        <div class="hint">Leave blank to show "Price on Request" on the storefront.</div>
                        @error('offered_price')
                        <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field">
                        @if($product->image)
                            <div class="current-image">
                                <img src="{{ $product->image_url }}" alt="{{ $product->image_alt }}">
                                <span class="label">Current image</span>
                            </div>
                        @endif
                        <label for="image">{{ $product->image ? 'Replace Image' : 'Image' }}</label>
                        <input type="file" id="image" name="image"
                            class="form-control-styled @error('image') is-invalid @enderror">
                        <div class="hint">JPG, PNG, GIF, WEBP or SVG — max 2MB. Leave blank to keep the current image.
                            Alt tag is generated automatically from Sub Sub Category + product name.</div>
                        @error('image')
                        <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field">
                        <label for="description">Description</label>
                        <textarea id="ckeditor" name="description" rows="4"
                            class="form-control-styled @error('description') is-invalid @enderror"
                            required>{{ old('description', $product->description) }}</textarea>
                        @error('description')
                        <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field toggle-row">
                        <label class="switch">
                            <input type="checkbox" name="status" value="1" {{ old('status', $product->status) ? 'checked' : '' }}>
                            <span class="switch-slider"></span>
                        </label>
                        <label style="margin:0">Active</label>
                    </div>

                    <div id="seoFields">

                        <div class="form-field">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" id="meta_title" name="meta_title" class="form-control-styled"
                                value="{{ old('meta_title', $product->meta_title) }}" placeholder="Enter meta title">
                        </div>

                        <div class="form-field">
                            <label for="meta_description">Meta Description</label>
                            <textarea id="meta_description" name="meta_description" rows="4"
                                class="form-control-styled">{{ old('meta_description', $product->meta_description) }}</textarea>
                        </div>

                        <hr class="seo-divider">
                        <div class="seo-section-title">SEO / Open Graph Details</div>

                        <div class="form-field">
                            <label for="h1">H1 Tag</label>
                            <input type="text" id="h1" name="h1"
                                class="form-control-styled @error('h1') is-invalid @enderror"
                                value="{{ old('h1', $product->h1) }}">
                            <div class="hint">Auto-fills from Product Name — edit anytime to override</div>
                            @error('h1')
                            <div class="form-error">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-field">
                            <label for="og_title">OG Title</label>
                            <input type="text" id="og_title" name="og_title"
                                class="form-control-styled @error('og_title') is-invalid @enderror"
                                value="{{ old('og_title', $product->og_title) }}">
                            <div class="hint">Auto-fills from Meta Title — edit anytime to override</div>
                            @error('og_title')
                            <div class="form-error">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-field">
                            <label for="og_description">OG Description</label>
                            <textarea id="og_description" name="og_description" rows="3"
                                class="form-control-styled @error('og_description') is-invalid @enderror">{{ old('og_description', $product->og_description) }}</textarea>
                            <div class="hint">Auto-fills from Meta Description — edit anytime to override</div>
                            @error('og_description')
                            <div class="form-error">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-field">
                            <label for="og_image">OG Image</label>
                            @if($product->og_image)
                                <div class="current-image">
                                    <img src="{{ $product->og_image_url }}" alt="OG image">
                                    <span class="label">Current OG image</span>
                                </div>
                            @endif
                            <input type="file" id="og_image" name="og_image"
                                class="form-control-styled @error('og_image') is-invalid @enderror" accept="image/*">
                            <div class="hint">Leave blank to keep current — falls back to the Product Image if none is
                                set</div>
                            @error('og_image')
                            <div class="form-error">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-field">
                            <label for="canonical_url">Canonical URL</label>
                            <input type="text" id="canonical_url" name="canonical_url"
                                class="form-control-styled @error('canonical_url') is-invalid @enderror"
                                value="{{ old('canonical_url', $product->canonical_url) }}">
                            <div class="hint">Auto-fills from the slug — edit anytime to override</div>
                            @error('canonical_url')
                            <div class="form-error">{{ $message }}</div> @enderror
                        </div>

                    </div> {{-- /seoFields --}}

                    <div class="form-actions">
                        <button type="submit" class="btn-primary-dash">
                            <i class="fa fa-check"></i> Update Product
                        </button>
                        <a href="{{ route('admin.products.index') }}" class="btn-secondary-dash">Cancel</a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

{{-- Quick-add Vendor modal --}}
<div class="qa-modal-backdrop" id="vendorModalBackdrop">
    <div class="qa-modal">
        <div class="qa-modal-header">
            <h5>Add New Vendor</h5>
            <button type="button" id="closeVendorModal">&times;</button>
        </div>
        <div class="qa-modal-body">
            <div class="form-field">
                <label>Vendor Name *</label>
                <input type="text" id="qa_vendor_name" class="form-control-styled">
            </div>
            <div class="form-field">
                <label>GST Number</label>
                <input type="text" id="qa_gst_number" class="form-control-styled">
            </div>
            <div class="form-field">
                <label>Full Address *</label>
                <textarea id="qa_full_address" class="form-control-styled"></textarea>
            </div>
            <div class="form-row-2">
                <div class="form-field">
                    <label>Email ID *</label>
                    <input type="email" id="qa_email" class="form-control-styled">
                </div>
                <div class="form-field">
                    <label>Contact Person *</label>
                    <input type="text" id="qa_contact_person_name" class="form-control-styled">
                </div>
            </div>
            <div class="form-row-2">
                <div class="form-field">
                    <label>Mobile Number *</label>
                    <input type="text" id="qa_mobile_number" class="form-control-styled">
                </div>
                <div class="form-field">
                    <label>WhatsApp Number</label>
                    <input type="text" id="qa_whatsapp_number" class="form-control-styled">
                </div>
            </div>
            <div id="qa_vendor_error" class="form-error" style="display:none"></div>
            <div class="form-actions" style="border-top:none;padding-top:0">
                <button type="button" class="btn-primary-dash" id="saveVendorBtn">Save Vendor</button>
                <button type="button" class="btn-secondary-dash" id="cancelVendorBtn">Cancel</button>
            </div>
        </div>
    </div>
</div>

{{-- Quick-add Brand modal --}}
<div class="qa-modal-backdrop" id="brandModalBackdrop">
    <div class="qa-modal" style="width:420px">
        <div class="qa-modal-header">
            <h5>Add New Brand</h5>
            <button type="button" id="closeBrandModal">&times;</button>
        </div>
        <div class="qa-modal-body">
            <div class="form-field">
                <label>Brand Name *</label>
                <input type="text" id="qa_brand_name" class="form-control-styled">
            </div>
            <div id="qa_brand_error" class="form-error" style="display:none"></div>
            <div class="form-actions" style="border-top:none;padding-top:0">
                <button type="button" class="btn-primary-dash" id="saveBrandBtn">Save Brand</button>
                <button type="button" class="btn-secondary-dash" id="cancelBrandBtn">Cancel</button>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')

<!-- Ckeditor -->
<script src="{{ asset('Admin/plugins/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('Admin/js/pages/forms/editors.js') }}"></script>

<script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

    function restrictNumber(e) {
        this.value = this.value.replace(/[^\d.]/g, '');
    }
    ['mrp', 'purchase_price', 'discount_value', 'offered_price'].forEach(function (id) {
        document.getElementById(id).addEventListener('input', restrictNumber);
    });

    // Auto-calculate Offered Price from MRP + Discount, but stop once the admin edits it manually.
    let offeredPriceTouched = false;
    document.getElementById('offered_price').addEventListener('input', function () {
        offeredPriceTouched = true;
    });

    function recalcOfferedPrice() {
        if (offeredPriceTouched) return;

        const mrp = parseFloat(document.getElementById('mrp').value) || 0;
        const type = document.getElementById('discount_type').value;
        const value = parseFloat(document.getElementById('discount_value').value) || 0;

        if (!mrp) return;

        let offered = mrp;
        if (type === 'flat') offered = mrp - value;
        if (type === 'percentage') offered = mrp - (mrp * value / 100);

        document.getElementById('offered_price').value = offered > 0 ? offered.toFixed(2) : 0;
    }

    ['mrp', 'discount_type', 'discount_value'].forEach(function (id) {
        document.getElementById(id).addEventListener('input', recalcOfferedPrice);
        document.getElementById(id).addEventListener('change', recalcOfferedPrice);
    });

    function loadSubCategories(categoryId, selectedSubCatId) {
        const subSelect = document.getElementById('sub_cat_id');
        const subSubSelect = document.getElementById('sub_sub_cat_id');

        subSelect.innerHTML = '<option value="">Loading…</option>';
        subSubSelect.innerHTML = '<option value="">Select Sub Category First</option>';

        if (!categoryId) {
            subSelect.innerHTML = '<option value="">Select Category First</option>';
            return;
        }

        fetch("{{ route('admin.products.getSubCategories') }}?category_id=" + categoryId)
            .then(res => res.json())
            .then(res => {
                subSelect.innerHTML = '<option value="">Select Sub Category</option>';
                res.data.forEach(sub => {
                    const opt = document.createElement('option');
                    opt.value = sub.id;
                    opt.textContent = sub.name;
                    if (selectedSubCatId && sub.id == selectedSubCatId) opt.selected = true;
                    subSelect.appendChild(opt);
                });
            });
    }

    function loadSubSubCategories(subCatId, selectedSubSubCatId) {
        const subSubSelect = document.getElementById('sub_sub_cat_id');

        subSubSelect.innerHTML = '<option value="">Loading…</option>';

        if (!subCatId) {
            subSubSelect.innerHTML = '<option value="">Select Sub Category First</option>';
            return;
        }

        fetch("{{ route('admin.products.getSubSubCategories') }}?sub_cat_id=" + subCatId)
            .then(res => res.json())
            .then(res => {
                subSubSelect.innerHTML = '<option value="">Select Sub Sub Category</option>';
                res.data.forEach(subSub => {
                    const opt = document.createElement('option');
                    opt.value = subSub.id;
                    opt.textContent = subSub.name;
                    if (selectedSubSubCatId && subSub.id == selectedSubSubCatId) opt.selected = true;
                    subSubSelect.appendChild(opt);
                });
            });
    }

    // Category change: reload sub categories (fresh selection, no pre-selected sub-sub).
    document.getElementById('category_id').addEventListener('change', function () {
        loadSubCategories(this.value, null);
    });

    // Sub category change: reload sub-sub categories (fresh selection).
    document.getElementById('sub_cat_id').addEventListener('change', function () {
        loadSubSubCategories(this.value, null);
    });

    // SEO auto-fill: h1 from name, og_title from meta_title, og_description from meta_description.
    // Canonical URL is left as-is on edit (it's tied to the existing slug) unless the admin edits it.
    let h1Edited = false, ogTitleEdited = false, ogDescEdited = false;

    document.getElementById('h1').addEventListener('input', () => h1Edited = true);
    document.getElementById('og_title').addEventListener('input', () => ogTitleEdited = true);
    document.getElementById('og_description').addEventListener('input', () => ogDescEdited = true);

    document.getElementById('name').addEventListener('keyup', function () {
        if (!h1Edited) {
            document.getElementById('h1').value = this.value;
        }
    });

    document.getElementById('meta_title').addEventListener('keyup', function () {
        if (!ogTitleEdited) {
            document.getElementById('og_title').value = this.value;
        }
    });

    document.getElementById('meta_description').addEventListener('keyup', function () {
        if (!ogDescEdited) {
            document.getElementById('og_description').value = this.value;
        }
    });

    // ---------- Source type toggle ----------
    const catalogFields = document.getElementById('catalogFields');
    const inventoryFields = document.getElementById('inventoryFields');
    const pillCatalog = document.getElementById('pillCatalog');
    const pillInternal = document.getElementById('pillInternal');
    const categorySelect = document.getElementById('category_id');
    const vendorSelect = document.getElementById('vendor_id');
    const brandSelect = document.getElementById('brand_id');
    const seoFields = document.getElementById('seoFields'); // add this

    function syncSourceType() {
        const isInternal = document.querySelector('input[name="source_type"]:checked').value === 'internal_inventory';

        catalogFields.style.display = isInternal ? 'none' : 'block';
        inventoryFields.style.display = isInternal ? 'block' : 'none';
        seoFields.style.display = isInternal ? 'none' : 'block';

        pillCatalog.classList.toggle('active', !isInternal);
        pillInternal.classList.toggle('active', isInternal);

        // Don't force validation on fields the admin can't see.
        categorySelect.required = !isInternal;
        vendorSelect.required = isInternal;
        brandSelect.required = isInternal;
    }

    document.querySelectorAll('input[name="source_type"]').forEach(radio => {
        radio.addEventListener('change', syncSourceType);
    });
    syncSourceType();

    // ---------- Quick-add Vendor ----------
    const vendorModalBackdrop = document.getElementById('vendorModalBackdrop');
    document.getElementById('openVendorModal').addEventListener('click', () => vendorModalBackdrop.classList.add('show'));
    document.getElementById('closeVendorModal').addEventListener('click', () => vendorModalBackdrop.classList.remove('show'));
    document.getElementById('cancelVendorBtn').addEventListener('click', () => vendorModalBackdrop.classList.remove('show'));

    document.getElementById('saveVendorBtn').addEventListener('click', function () {
        const errorBox = document.getElementById('qa_vendor_error');
        errorBox.style.display = 'none';

        const payload = {
            vendor_name: document.getElementById('qa_vendor_name').value,
            gst_number: document.getElementById('qa_gst_number').value,
            full_address: document.getElementById('qa_full_address').value,
            email: document.getElementById('qa_email').value,
            contact_person_name: document.getElementById('qa_contact_person_name').value,
            mobile_number: document.getElementById('qa_mobile_number').value,
            whatsapp_number: document.getElementById('qa_whatsapp_number').value,
        };

        fetch("{{ route('admin.products.quickStoreVendor') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                Accept: 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify(payload),
        })
            .then(async res => {
                const data = await res.json();
                if (!res.ok) throw data;
                return data;
            })
            .then(data => {
                const opt = document.createElement('option');
                opt.value = data.vendor.id;
                opt.textContent = data.vendor.vendor_name;
                opt.selected = true;
                vendorSelect.appendChild(opt);

                vendorModalBackdrop.classList.remove('show');
                document.querySelectorAll('#vendorModalBackdrop input, #vendorModalBackdrop textarea').forEach(el => el.value = '');
            })
            .catch(err => {
                const firstError = err?.errors ? Object.values(err.errors)[0][0] : 'Could not save vendor.';
                errorBox.textContent = firstError;
                errorBox.style.display = 'block';
            });
    });

    // ---------- Quick-add Brand ----------
    const brandModalBackdrop = document.getElementById('brandModalBackdrop');
    document.getElementById('openBrandModal').addEventListener('click', () => brandModalBackdrop.classList.add('show'));
    document.getElementById('closeBrandModal').addEventListener('click', () => brandModalBackdrop.classList.remove('show'));
    document.getElementById('cancelBrandBtn').addEventListener('click', () => brandModalBackdrop.classList.remove('show'));

    document.getElementById('saveBrandBtn').addEventListener('click', function () {
        const errorBox = document.getElementById('qa_brand_error');
        errorBox.style.display = 'none';

        fetch("{{ route('admin.products.quickStoreBrand') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                Accept: 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify({ name: document.getElementById('qa_brand_name').value }),
        })
            .then(async res => {
                const data = await res.json();
                if (!res.ok) throw data;
                return data;
            })
            .then(data => {
                const opt = document.createElement('option');
                opt.value = data.brand.id;
                opt.textContent = data.brand.name;
                opt.selected = true;
                brandSelect.appendChild(opt);

                brandModalBackdrop.classList.remove('show');
                document.getElementById('qa_brand_name').value = '';
            })
            .catch(err => {
                const firstError = err?.errors ? Object.values(err.errors)[0][0] : 'Could not save brand.';
                errorBox.textContent = firstError;
                errorBox.style.display = 'block';
            });
    });
</script>