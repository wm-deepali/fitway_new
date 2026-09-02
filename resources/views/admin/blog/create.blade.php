{{-- resources/views/admin/blogs/create.blade.php --}}
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
    .form-control-styled:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(48,61,137,.12); }
    textarea.form-control-styled { height: auto; padding: 10px 12px; resize: vertical; }
    .form-error { color: #b22222; font-size: 12px; margin-top: 5px; }
    .toggle-row { display: flex; align-items: center; gap: 10px; }
    .switch { position: relative; width: 42px; height: 24px; flex-shrink: 0; }
    .switch input { opacity: 0; width: 0; height: 0; }
    .switch-slider { position: absolute; inset: 0; background: var(--border); border-radius: 999px; cursor: pointer; transition: .15s; }
    .switch-slider::before { content: ''; position: absolute; width: 18px; height: 18px; left: 3px; top: 3px; background: #fff; border-radius: 50%; transition: .15s; box-shadow: 0 1px 2px rgba(0,0,0,.2); }
    .switch input:checked + .switch-slider { background: var(--accent); }
    .switch input:checked + .switch-slider::before { transform: translateX(18px); }
    .form-actions { display: flex; gap: 10px; margin-top: 24px; padding-top: 20px; border-top: 1px solid var(--border); }
    .seo-divider { border: none; border-top: 1px solid var(--border); margin: 22px 0; }
    .seo-section-title { font-size: 13px; font-weight: 650; margin-bottom: 14px; }
    </style>

    <div class="app-content content container-fluid">
        <div class="cat-page">

            <div class="cat-page-header">
                <div>
                    <h1>Add Blog</h1>
                    <div class="cat-breadcrumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        <a href="{{ route('admin.blogs.index') }}">Blogs</a>
                        <span>›</span>
                        Add
                    </div>
                </div>
                <a href="{{ route('admin.blogs.index') }}" class="btn-secondary-dash">
                    <i class="fa fa-arrow-left"></i> Back to List
                </a>
            </div>

            <div class="cat-card">
                <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-field">
                        <label for="blog">Blog Title</label>
                        <input type="text" id="blog" name="blog"
                            class="form-control-styled @error('blog') is-invalid @enderror"
                            value="{{ old('blog') }}" placeholder="Enter blog title" required>
                        @error('blog') <div class="form-error">{{ $message }}</div> @enderror
                        <div class="hint">Slug is generated automatically from the blog title.</div>
                    </div>

                    <div class="form-field">
                        <label for="tag">Tag / Subtitle</label>
                        <input type="text" id="tag" name="tag"
                            class="form-control-styled @error('tag') is-invalid @enderror"
                            value="{{ old('tag') }}" placeholder="e.g. Gym Setup, Equipment Guide">
                        <div class="hint">Shown as the small badge on the blog card</div>
                        @error('tag') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field">
                        <label for="excerpt">Short Description</label>
                        <textarea id="excerpt" name="excerpt" rows="3"
                            class="form-control-styled @error('excerpt') is-invalid @enderror"
                            placeholder="A short summary shown on the blog listing card">{{ old('excerpt') }}</textarea>
                        @error('excerpt') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field">
                        <label for="content">Content</label>
                        <textarea id="content" name="content" rows="10"
                            class="form-control-styled @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                        @error('content') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image"
                            class="form-control-styled @error('image') is-invalid @enderror" required>
                        <div class="hint">JPG, PNG, GIF, WEBP or SVG — max 2MB</div>
                        @error('image') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field">
                        <label for="date_of_blog">Date of Blog</label>
                        <input type="date" id="date_of_blog" name="date_of_blog"
                            class="form-control-styled @error('date_of_blog') is-invalid @enderror"
                            value="{{ old('date_of_blog') }}" required>
                        @error('date_of_blog') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field toggle-row">
                        <label class="switch">
                            <input type="checkbox" name="status" value="1" {{ old('status', true) ? 'checked' : '' }}>
                            <span class="switch-slider"></span>
                        </label>
                        <label style="margin:0">Active</label>
                    </div>

                    <div class="form-field">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" id="meta_title" name="meta_title"
                            class="form-control-styled @error('meta_title') is-invalid @enderror"
                            value="{{ old('meta_title') }}" placeholder="Defaults to blog title if left blank">
                        @error('meta_title') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field">
                        <label for="meta_description">Meta Description</label>
                        <textarea id="meta_description" name="meta_description" rows="3"
                            class="form-control-styled @error('meta_description') is-invalid @enderror"
                            placeholder="Defaults to the short description if left blank">{{ old('meta_description') }}</textarea>
                        @error('meta_description') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <hr class="seo-divider">
                    <div class="seo-section-title">SEO / Open Graph Details</div>

                    <div class="form-field">
                        <label for="h1">H1 Tag</label>
                        <input type="text" id="h1" name="h1"
                            class="form-control-styled @error('h1') is-invalid @enderror"
                            value="{{ old('h1') }}" placeholder="Auto-filled from Blog Title">
                        <div class="hint">Auto-fills from Blog Title — edit anytime to override</div>
                        @error('h1') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field">
                        <label for="og_title">OG Title</label>
                        <input type="text" id="og_title" name="og_title"
                            class="form-control-styled @error('og_title') is-invalid @enderror"
                            value="{{ old('og_title') }}" placeholder="Auto-filled from Meta Title">
                        <div class="hint">Auto-fills from Meta Title — edit anytime to override</div>
                        @error('og_title') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field">
                        <label for="og_description">OG Description</label>
                        <textarea id="og_description" name="og_description" rows="3"
                            class="form-control-styled @error('og_description') is-invalid @enderror"
                            placeholder="Auto-filled from Meta Description">{{ old('og_description') }}</textarea>
                        <div class="hint">Auto-fills from Meta Description — edit anytime to override</div>
                        @error('og_description') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field">
                        <label for="og_image">OG Image</label>
                        <input type="file" id="og_image" name="og_image"
                            class="form-control-styled @error('og_image') is-invalid @enderror" accept="image/*">
                        <div class="hint">Leave blank to automatically use the Blog Image as OG Image</div>
                        @error('og_image') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field">
                        <label for="canonical_url">Canonical URL</label>
                        <input type="text" id="canonical_url" name="canonical_url"
                            class="form-control-styled @error('canonical_url') is-invalid @enderror"
                            value="{{ old('canonical_url') }}" placeholder="Auto-generated from slug">
                        <div class="hint">Auto-fills from the slug — edit anytime to override</div>
                        @error('canonical_url') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-primary-dash">
                            <i class="fa fa-check"></i> Save Blog
                        </button>
                        <a href="{{ route('admin.blogs.index') }}" class="btn-secondary-dash">Cancel</a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

@include('admin.footer')

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');

    // SEO auto-fill: h1 from blog title, og_title from meta_title, og_description from meta_description,
    // canonical_url computed from a slugified version of the blog title.
    let h1Edited = false, ogTitleEdited = false, ogDescEdited = false, canonicalEdited = false;

    document.getElementById('h1').addEventListener('input', () => h1Edited = true);
    document.getElementById('og_title').addEventListener('input', () => ogTitleEdited = true);
    document.getElementById('og_description').addEventListener('input', () => ogDescEdited = true);
    document.getElementById('canonical_url').addEventListener('input', () => canonicalEdited = true);

    document.getElementById('blog').addEventListener('keyup', function () {
        const slug = this.value
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');

        if (!canonicalEdited) {
            document.getElementById('canonical_url').value = '{{ url('/blog') }}/' + slug;
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