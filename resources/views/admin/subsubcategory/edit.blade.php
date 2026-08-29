{{-- resources/views/admin/subsubcategory/edit.blade.php --}}
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
    .cat-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-card); padding: 24px; max-width: 720px; }
    .form-field { margin-bottom: 18px; }
    .form-field label { display: block; font-size: 12.5px; font-weight: 600; color: var(--text-secondary); margin-bottom: 6px; letter-spacing: .02em; }
    .form-field .hint { font-size: 11.5px; color: var(--text-hint); margin-top: 4px; }
    .form-control-styled {
        width: 100%; height: 40px; border: 1px solid var(--border); border-radius: var(--radius-sm);
        padding: 0 12px; font-size: 13.5px; font-family: var(--font); color: var(--text-primary);
        outline: none; transition: border-color .15s, box-shadow .15s; background: var(--surface);
    }
    select.form-control-styled { appearance: auto; }
    textarea.form-control-styled { height: auto; padding: 10px 12px; resize: vertical; }
    .form-control-styled:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(48,61,137,.12); }
    .form-error { color: #b22222; font-size: 12px; margin-top: 5px; }
    .toggle-row { display: flex; align-items: center; gap: 10px; }
    .switch { position: relative; width: 42px; height: 24px; flex-shrink: 0; }
    .switch input { opacity: 0; width: 0; height: 0; }
    .switch-slider { position: absolute; inset: 0; background: var(--border); border-radius: 999px; cursor: pointer; transition: .15s; }
    .switch-slider::before { content: ''; position: absolute; width: 18px; height: 18px; left: 3px; top: 3px; background: #fff; border-radius: 50%; transition: .15s; box-shadow: 0 1px 2px rgba(0,0,0,.2); }
    .switch input:checked + .switch-slider { background: var(--accent); }
    .switch input:checked + .switch-slider::before { transform: translateX(18px); }
    .form-actions { display: flex; gap: 10px; margin-top: 24px; padding-top: 20px; border-top: 1px solid var(--border); }
    .current-img-preview { width: 72px; height: 72px; border-radius: var(--radius-sm); object-fit: cover; border: 1px solid var(--border); margin-bottom: 10px; display: block; }
    </style>

    <div class="app-content content container-fluid">
        <div class="cat-page">

            <div class="cat-page-header">
                <div>
                    <h1>Edit Sub Sub Category</h1>
                    <div class="cat-breadcrumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        <a href="{{ route('admin.subsubcategories.index') }}">Sub Sub Categories</a>
                        <span>›</span>
                        Edit
                    </div>
                </div>
                <a href="{{ request('redirect', route('admin.subsubcategories.index')) }}" class="btn-secondary-dash">
                    <i class="fa fa-arrow-left"></i> Back to List
                </a>
            </div>

            <div class="cat-card">
                <form action="{{ route('admin.subsubcategories.update', $subsubcategory->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="redirect" value="{{ request('redirect') }}">

                    <div class="form-field">
                        <label for="category_id">Category</label>
                        <select id="category_id" name="category_id"
                            class="form-control-styled @error('category_id') is-invalid @enderror" required>
                            <option value="">Select Category</option>
                            @foreach($parentCategories as $parent)
                                <option value="{{ $parent->id }}"
                                    {{ old('category_id', $subsubcategory->category_id) == $parent->id ? 'selected' : '' }}>
                                    {{ $parent->category_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field">
                        <label for="sub_cat_id">Sub Category</label>
                        <select id="sub_cat_id" name="sub_cat_id"
                            class="form-control-styled @error('sub_cat_id') is-invalid @enderror" required>
                            <option value="">Select Sub Category</option>
                            @foreach($subCategories as $sub)
                                <option value="{{ $sub->id }}"
                                    {{ old('sub_cat_id', $subsubcategory->sub_category_id) == $sub->id ? 'selected' : '' }}>
                                    {{ $sub->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('sub_cat_id') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field">
                        <label for="name">Sub Sub Category Name</label>
                        <input type="text" id="name" name="name"
                            class="form-control-styled @error('name') is-invalid @enderror"
                            value="{{ old('name', $subsubcategory->name) }}" required>
                        @error('name') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field">
                        <label for="image">Image</label>
                        @if($subsubcategory->image)
                            <img src="{{ asset('storage/' . $subsubcategory->image) }}" class="current-img-preview" alt="{{ $subsubcategory->name }}">
                        @endif
                        <input type="file" id="image" name="image"
                            class="form-control-styled @error('image') is-invalid @enderror">
                        <div class="hint">Leave blank to keep the current image — JPG, PNG, GIF, WEBP or SVG, max 2MB</div>
                        @error('image') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field toggle-row">
                        <label class="switch">
                            <input type="checkbox" name="status" value="1" {{ old('status', $subsubcategory->status) ? 'checked' : '' }}>
                            <span class="switch-slider"></span>
                        </label>
                        <label style="margin:0">Active</label>
                    </div>

                    <div class="form-field">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" id="meta_title" name="meta_title" class="form-control-styled"
                            value="{{ old('meta_title', $subsubcategory->meta_title) }}">
                    </div>

                    <div class="form-field">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input type="text" id="meta_keywords" name="meta_keywords" class="form-control-styled"
                            value="{{ old('meta_keywords', $subsubcategory->meta_keywords) }}">
                    </div>

                    <div class="form-field">
                        <label for="meta_description">Meta Description</label>
                        <textarea id="meta_description" name="meta_description" rows="4"
                            class="form-control-styled">{{ old('meta_description', $subsubcategory->meta_description) }}</textarea>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-primary-dash">
                            <i class="fa fa-check"></i> Update Sub Sub Category
                        </button>
                        <a href="{{ request('redirect', route('admin.subsubcategories.index')) }}" class="btn-secondary-dash">Cancel</a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

@include('admin.footer')

<script>
document.getElementById('category_id').addEventListener('change', function () {
    const categoryId = this.value;
    const subSelect = document.getElementById('sub_cat_id');
    subSelect.innerHTML = '<option value="">Loading…</option>';
    subSelect.disabled = true;

    if (!categoryId) {
        subSelect.innerHTML = '<option value="">Select Category</option>';
        return;
    }

    fetch("{{ route('admin.subsubcategories.getSubCategories') }}?category_id=" + categoryId)
        .then(res => res.json())
        .then(res => {
            subSelect.innerHTML = '<option value="">Select Sub Category</option>';
            res.data.forEach(sub => {
                const opt = document.createElement('option');
                opt.value = sub.id;
                opt.textContent = sub.name;
                subSelect.appendChild(opt);
            });
            subSelect.disabled = false;
        });
});
</script>