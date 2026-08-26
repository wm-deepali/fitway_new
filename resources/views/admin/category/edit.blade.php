{{-- resources/views/admin/category/edit.blade.php --}}
@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    <style>
    :root {
        --bg: #f1f2f4; --surface: #ffffff; --border: #e3e5e8;
        --text-primary: #202223; --text-secondary:#6d7175; --text-hint:#8c9196;
        --accent: #303d89; --accent-light: #f0f1fc;
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
    .radio-pill-row { display: flex; gap: 10px; }
    .radio-pill { display: flex; align-items: center; gap: 6px; border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 8px 14px; font-size: 13px; cursor: pointer; }
    .radio-pill input { margin: 0; }
    .current-video-preview { max-width: 240px; border-radius: var(--radius-sm); border: 1px solid var(--border); margin-bottom: 10px; display: block; }
    </style>

    <div class="app-content content container-fluid">
        <div class="cat-page">

            <div class="cat-page-header">
                <div>
                    <h1>Edit Category</h1>
                    <div class="cat-breadcrumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        <a href="{{ route('admin.categories.index') }}">Categories</a>
                        <span>›</span>
                        Edit
                    </div>
                </div>
                <a href="{{ route('admin.categories.index') }}" class="btn-secondary-dash">
                    <i class="fa fa-arrow-left"></i> Back to List
                </a>
            </div>

            <div class="cat-card">
                <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-field">
                        <label for="category_name">Category Name</label>
                        <input type="text" id="category_name" name="category_name"
                            class="form-control-styled @error('category_name') is-invalid @enderror"
                            value="{{ old('category_name', $category->category_name) }}" placeholder="Enter category name" required>
                        @error('category_name') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field">
                        <label for="slug">Slug</label>
                        <input type="text" id="slug" name="slug" class="form-control-styled" readonly
                            value="{{ old('slug', $category->slug) }}">
                        <div class="hint">Regenerated from category name — used for the URL and canonical tag</div>
                    </div>

                    <div class="form-field">
                        <label for="short_description">Short Description</label>
                        <textarea id="short_description" name="short_description" rows="3"
                            class="form-control-styled @error('short_description') is-invalid @enderror"
                            placeholder="Enter a short description">{{ old('short_description', $category->short_description) }}</textarea>
                        @error('short_description') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field">
                        <label for="image">Image</label>
                        @if($category->image)
                            <img src="{{ asset('storage/' . $category->image) }}" class="current-img-preview" alt="{{ $category->category_name }}">
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
                                    {{ old('banner_type', $category->banner_type) == 'image' ? 'checked' : '' }}
                                    onchange="toggleBannerUpload(this.value)">
                                Image
                            </label>
                            <label class="radio-pill">
                                <input type="radio" name="banner_type" value="video"
                                    {{ old('banner_type', $category->banner_type) == 'video' ? 'checked' : '' }}
                                    onchange="toggleBannerUpload(this.value)">
                                Video
                            </label>
                        </div>
                    </div>

                    <div class="form-field" id="banner_image_field" style="display:{{ old('banner_type', $category->banner_type) == 'video' ? 'none' : 'block' }}">
                        <label for="banner_image">Banner Image</label>
                        @if($category->banner_type === 'image' && $category->banner)
                            <img src="{{ asset('storage/' . $category->banner) }}" class="current-img-preview" alt="{{ $category->category_name }} banner">
                        @endif
                        <input type="file" id="banner_image" name="banner_image"
                            class="form-control-styled @error('banner_image') is-invalid @enderror" accept="image/*">
                        <div class="hint">Leave blank to keep current banner.</div>
                        @error('banner_image') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field" id="banner_video_field" style="display:{{ old('banner_type', $category->banner_type) == 'video' ? 'block' : 'none' }}">
                        <label for="banner_video">Banner Video</label>
                        @if($category->banner_type === 'video' && $category->banner)
                            <video src="{{ asset('storage/' . $category->banner) }}" class="current-video-preview" controls></video>
                        @endif
                        <input type="file" id="banner_video" name="banner_video"
                            class="form-control-styled @error('banner_video') is-invalid @enderror" accept="video/*">
                        <div class="hint">Leave blank to keep current banner.</div>
                        @error('banner_video') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field toggle-row">
                        <label class="switch">
                            <input type="checkbox" name="premium" value="premium" {{ old('premium', $category->premium) ? 'checked' : '' }}>
                            <span class="switch-slider"></span>
                        </label>
                        <label style="margin:0">Set as Premium</label>
                    </div>

                    <div class="form-field toggle-row">
                        <label class="switch">
                            <input type="checkbox" name="status" value="1" {{ old('status', $category->status) ? 'checked' : '' }}>
                            <span class="switch-slider"></span>
                        </label>
                        <label style="margin:0">Active</label>
                    </div>

                    <div class="form-field">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" id="meta_title" name="meta_title" class="form-control-styled"
                            value="{{ old('meta_title', $category->meta_title) }}" placeholder="Enter meta title">
                    </div>

                    <div class="form-field">
                        <label for="meta_description">Meta Description</label>
                        <textarea id="meta_description" name="meta_description" rows="4"
                            class="form-control-styled">{{ old('meta_description', $category->meta_description) }}</textarea>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-primary-dash">
                            <i class="fa fa-check"></i> Update Category
                        </button>
                        <a href="{{ route('admin.categories.index') }}" class="btn-secondary-dash">Cancel</a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<script>
    function toggleBannerUpload(type) {
        document.getElementById('banner_image_field').style.display = type === 'image' ? 'block' : 'none';
        document.getElementById('banner_video_field').style.display = type === 'video' ? 'block' : 'none';
    }

    document.getElementById('category_name').addEventListener('keyup', function () {
        document.getElementById('slug').value = this.value
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');
    });
</script>

@include('admin.footer')