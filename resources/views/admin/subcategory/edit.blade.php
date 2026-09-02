{{-- resources/views/admin/subcategory/edit.blade.php --}}
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
    .form-control-styled[readonly] { background: var(--bg); color: var(--text-hint); }
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
    .current-video-preview { max-width: 240px; border-radius: var(--radius-sm); border: 1px solid var(--border); margin-bottom: 10px; display: block; }
    .radio-pill-row { display: flex; gap: 10px; }
    .radio-pill { display: flex; align-items: center; gap: 6px; border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 8px 14px; font-size: 13px; cursor: pointer; }
    .radio-pill input { margin: 0; }
    .seo-divider { border: none; border-top: 1px solid var(--border); margin: 22px 0; }
    .seo-section-title { font-size: 13px; font-weight: 650; margin-bottom: 14px; }
    </style>

    <div class="app-content content container-fluid">
        <div class="cat-page">

            <div class="cat-page-header">
                <div>
                    <h1>Edit Sub Category</h1>
                    <div class="cat-breadcrumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        <a href="{{ route('admin.subcategories.index') }}">Sub Categories</a>
                        <span>›</span>
                        Edit
                    </div>
                </div>
                <a href="{{ route('admin.subcategories.index') }}" class="btn-secondary-dash">
                    <i class="fa fa-arrow-left"></i> Back to List
                </a>
            </div>

            <div class="cat-card">
                <form action="{{ route('admin.subcategories.update', $subcategory) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-field">
                        <label for="category_id">Parent Category</label>
                        <select id="category_id" name="category_id"
                            class="form-control-styled @error('category_id') is-invalid @enderror" required>
                            <option value="">Select Category</option>
                            @foreach($parentCategories as $parent)
                                <option value="{{ $parent->id }}" {{ old('category_id', $subcategory->category_id) == $parent->id ? 'selected' : '' }}>
                                    {{ $parent->category_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field">
                        <label for="name">Sub Category Name</label>
                        <input type="text" id="name" name="name"
                            class="form-control-styled @error('name') is-invalid @enderror"
                            value="{{ old('name', $subcategory->name) }}" placeholder="Enter sub category name" required>
                        @error('name') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field">
                        <label for="slug">Slug</label>
                        <input type="text" id="slug" name="slug" class="form-control-styled" readonly
                            value="{{ old('slug', $subcategory->slug) }}">
                        <div class="hint">Regenerated from sub category name — used for the URL and canonical tag</div>
                    </div>

                    <div class="form-field">
                        <label for="short_description">Short Description</label>
                        <textarea id="short_description" name="short_description" rows="3"
                            class="form-control-styled @error('short_description') is-invalid @enderror"
                            placeholder="Enter a short description">{{ old('short_description', $subcategory->short_description) }}</textarea>
                        @error('short_description') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field">
                        <label for="image">Image</label>
                        @if($subcategory->image)
                            <img src="{{ asset('storage/' . $subcategory->image) }}" class="current-img-preview" alt="{{ $subcategory->name }}">
                        @endif
                        <input type="file" id="image" name="image"
                            class="form-control-styled @error('image') is-invalid @enderror">
                        <div class="hint">JPG, PNG, GIF, WEBP or SVG — max 2MB. Leave blank to keep current image.</div>
                        @error('image') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field">
                        <label>Banner Type</label>
                        <div class="radio-pill-row">
                            <label class="radio-pill">
                                <input type="radio" name="banner_type" value="image"
                                    {{ old('banner_type', $subcategory->banner_type) == 'image' ? 'checked' : '' }}
                                    onchange="toggleBannerUpload(this.value)">
                                Image
                            </label>
                            <label class="radio-pill">
                                <input type="radio" name="banner_type" value="video"
                                    {{ old('banner_type', $subcategory->banner_type) == 'video' ? 'checked' : '' }}
                                    onchange="toggleBannerUpload(this.value)">
                                Video
                            </label>
                        </div>
                    </div>

                    <div class="form-field" id="banner_image_field" style="display:{{ old('banner_type', $subcategory->banner_type) == 'video' ? 'none' : 'block' }}">
                        <label for="banner_image">Banner Image</label>
                        @if($subcategory->banner_type === 'image' && $subcategory->banner)
                            <img src="{{ asset('storage/' . $subcategory->banner) }}" class="current-img-preview" alt="{{ $subcategory->name }} banner">
                        @endif
                        <input type="file" id="banner_image" name="banner_image"
                            class="form-control-styled @error('banner_image') is-invalid @enderror" accept="image/*">
                        <div class="hint">Leave blank to keep current banner.</div>
                        @error('banner_image') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field" id="banner_video_field" style="display:{{ old('banner_type', $subcategory->banner_type) == 'video' ? 'block' : 'none' }}">
                        <label for="banner_video">Banner Video</label>
                        @if($subcategory->banner_type === 'video' && $subcategory->banner)
                            <video src="{{ asset('storage/' . $subcategory->banner) }}" class="current-video-preview" controls></video>
                        @endif
                        <input type="file" id="banner_video" name="banner_video"
                            class="form-control-styled @error('banner_video') is-invalid @enderror" accept="video/*">
                        <div class="hint">Leave blank to keep current banner.</div>
                        @error('banner_video') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field toggle-row">
                        <label class="switch">
                            <input type="checkbox" name="status" value="1" {{ old('status', $subcategory->status) ? 'checked' : '' }}>
                            <span class="switch-slider"></span>
                        </label>
                        <label style="margin:0">Active</label>
                    </div>

                    <div class="form-field">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" id="meta_title" name="meta_title" class="form-control-styled"
                            value="{{ old('meta_title', $subcategory->meta_title) }}" placeholder="Enter meta title">
                    </div>

                    <div class="form-field">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input type="text" id="meta_keywords" name="meta_keywords" class="form-control-styled"
                            value="{{ old('meta_keywords', $subcategory->meta_keywords) }}" placeholder="Enter meta keywords">
                    </div>

                    <div class="form-field">
                        <label for="meta_description">Meta Description</label>
                        <textarea id="meta_description" name="meta_description" rows="4"
                            class="form-control-styled">{{ old('meta_description', $subcategory->meta_description) }}</textarea>
                    </div>

                    <hr class="seo-divider">
                    <div class="seo-section-title">SEO / Open Graph Details</div>

                    <div class="form-field">
                        <label for="h1">H1 Tag</label>
                        <input type="text" id="h1" name="h1"
                            class="form-control-styled @error('h1') is-invalid @enderror"
                            value="{{ old('h1', $subcategory->h1) }}" placeholder="Auto-filled from Sub Category Name">
                        <div class="hint">Auto-fills from Sub Category Name — edit anytime to override</div>
                        @error('h1') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field">
                        <label for="og_title">OG Title</label>
                        <input type="text" id="og_title" name="og_title"
                            class="form-control-styled @error('og_title') is-invalid @enderror"
                            value="{{ old('og_title', $subcategory->og_title) }}" placeholder="Auto-filled from Meta Title">
                        <div class="hint">Auto-fills from Meta Title — edit anytime to override</div>
                        @error('og_title') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field">
                        <label for="og_description">OG Description</label>
                        <textarea id="og_description" name="og_description" rows="3"
                            class="form-control-styled @error('og_description') is-invalid @enderror"
                            placeholder="Auto-filled from Meta Description">{{ old('og_description', $subcategory->og_description) }}</textarea>
                        <div class="hint">Auto-fills from Meta Description — edit anytime to override</div>
                        @error('og_description') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field">
                        <label for="og_image">OG Image</label>
                        @if($subcategory->og_image)
                            <img src="{{ asset('storage/' . $subcategory->og_image) }}" class="current-img-preview" alt="OG image">
                        @elseif($subcategory->image)
                            <img src="{{ asset('storage/' . $subcategory->image) }}" class="current-img-preview" alt="OG image (using sub category image)">
                        @endif
                        <input type="file" id="og_image" name="og_image"
                            class="form-control-styled @error('og_image') is-invalid @enderror" accept="image/*">
                        <div class="hint">Leave blank to keep current / automatically use the Sub Category Image as OG Image</div>
                        @error('og_image') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field">
                        <label for="canonical_url">Canonical URL</label>
                        <input type="text" id="canonical_url" name="canonical_url"
                            class="form-control-styled @error('canonical_url') is-invalid @enderror"
                            value="{{ old('canonical_url', $subcategory->canonical_url) }}" placeholder="Auto-generated from slug">
                        <div class="hint">Auto-fills from the slug — edit anytime to override</div>
                        @error('canonical_url') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-primary-dash">
                            <i class="fa fa-check"></i> Update Sub Category
                        </button>
                        <a href="{{ route('admin.subcategories.index') }}" class="btn-secondary-dash">Cancel</a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<script>
    let h1Edited = false, ogTitleEdited = false, ogDescEdited = false, canonicalEdited = false;

    document.getElementById('h1').addEventListener('input', () => h1Edited = true);
    document.getElementById('og_title').addEventListener('input', () => ogTitleEdited = true);
    document.getElementById('og_description').addEventListener('input', () => ogDescEdited = true);
    document.getElementById('canonical_url').addEventListener('input', () => canonicalEdited = true);

    function toggleBannerUpload(type) {
        document.getElementById('banner_image_field').style.display = type === 'image' ? 'block' : 'none';
        document.getElementById('banner_video_field').style.display = type === 'video' ? 'block' : 'none';
    }

    document.getElementById('name').addEventListener('keyup', function () {
        const slug = this.value
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');

        document.getElementById('slug').value = slug;

        if (!canonicalEdited) {
            document.getElementById('canonical_url').value = '{{ url('/subcategory') }}/' + slug;
        }

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
</script>

@include('admin.footer')