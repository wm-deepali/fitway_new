{{-- resources/views/admin/dynamic-pages/edit.blade.php --}}
@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    <style>
    :root {
        --bg: #f1f2f4; --surface: #ffffff; --border: #e3e5e8;
        --text-primary: #202223; --text-secondary:#6d7175; --text-hint:#8c9196;
        --accent: #303d89; --green: #007a5e; --green-bg: #e3f1ec;
        --red: #b22222; --red-bg: #fce8e8;
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
    .btn-primary-dash { display: inline-flex; align-items: center; gap: 6px; background: var(--accent); color: #fff !important; border: none; border-radius: var(--radius-sm); padding: 8px 16px; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none !important; box-shadow: 0 1px 3px rgba(48,61,137,.25); }
    .btn-primary-dash:hover { background: #252f70; }
    .btn-secondary-dash { display: inline-flex; align-items: center; gap: 6px; background: var(--surface); color: var(--text-primary) !important; border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 8px 16px; font-size: 13px; font-weight: 500; cursor: pointer; text-decoration: none !important; }
    .btn-secondary-dash:hover { background: var(--bg); }
    .cat-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-card); overflow: hidden; }
    .form-section { padding: 24px; }
    .form-section + .form-section { border-top: 1px solid var(--border); }
    .form-section h3 { font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: .04em; color: var(--text-secondary); margin: 0 0 16px; }
    .form-group { margin-bottom: 16px; }
    .form-group:last-child { margin-bottom: 0; }
    .form-group label { display: block; font-size: 12.5px; font-weight: 600; color: var(--text-primary); margin-bottom: 6px; }
    .form-group label .req { color: var(--red); }
    .form-group .hint { font-size: 12px; color: var(--text-hint); margin-top: 4px; }
    .form-control-dash {
        width: 100%; border: 1px solid var(--border); border-radius: var(--radius-sm);
        padding: 9px 12px; font-size: 13px; color: var(--text-primary); background: var(--surface);
        outline: none; font-family: var(--font); box-sizing: border-box;
    }
    .form-control-dash:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(48,61,137,.12); }
    textarea.form-control-dash { resize: vertical; }
    .form-footer { padding: 18px 24px; border-top: 1px solid var(--border); background: #fafafa; display: flex; gap: 10px; }
    .alert-box { padding: 12px 16px; border-radius: var(--radius-sm); font-size: 13px; margin-bottom: 18px; }
    .alert-box-danger { background: var(--red-bg); color: var(--red); border: 1px solid #f5c6c6; }
    .alert-box ul { margin: 4px 0 0 18px; padding: 0; }
    @media (max-width: 768px) {
        .cat-page { padding: 16px; }
    }
    </style>

    <div class="app-content content container-fluid">
        <div class="cat-page">

            <div class="cat-page-header">
                <div>
                    <h1>Edit Page</h1>
                    <div class="cat-breadcrumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        <a href="{{ route('admin.dynamic-pages.index') }}">Dynamic Pages</a>
                        <span>›</span>
                        Edit
                    </div>
                </div>
                <a href="{{ request('redirect', route('admin.dynamic-pages.index')) }}" class="btn-secondary-dash">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>

            <form action="{{ route('admin.dynamic-pages.update', $page->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="cat-card">

                    @if($errors->any())
                        <div class="form-section" style="padding-bottom:0">
                            <div class="alert-box alert-box-danger">
                                <strong>Please fix the following:</strong>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <div class="form-section">
                        <h3>Page Details</h3>

                        <div class="form-group">
                            <label>Title <span class="req">*</span></label>
                            <input type="text" name="title" class="form-control-dash"
                                value="{{ old('title', $page->title) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control-dash"
                                value="{{ old('slug', $page->slug) }}">
                        </div>

                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="content" id="content" class="form-control-dash" rows="10">{{ old('content', $page->content) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Status <span class="req">*</span></label>
                            <select name="status" class="form-control-dash" required>
                                <option value="1" {{ old('status', $page->status) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $page->status) == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-section">
                        <h3>SEO Meta</h3>

                        <div class="form-group">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" class="form-control-dash"
                                value="{{ old('meta_title', $page->meta_title) }}">
                        </div>

                        <div class="form-group">
                            <label>Meta Keywords</label>
                            <input type="text" name="meta_keywords" class="form-control-dash"
                                value="{{ old('meta_keywords', $page->meta_keywords) }}">
                        </div>

                        <div class="form-group">
                            <label>Meta Description</label>
                            <textarea name="meta_description" class="form-control-dash" rows="3">{{ old('meta_description', $page->meta_description) }}</textarea>
                        </div>
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn-primary-dash">
                            <i class="fa fa-check"></i> Update Page
                        </button>
                        <a href="{{ request('redirect', route('admin.dynamic-pages.index')) }}" class="btn-secondary-dash">Cancel</a>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>

@include('admin.footer')