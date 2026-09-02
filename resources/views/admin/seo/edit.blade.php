{{-- resources/views/admin/seo/edit.blade.php --}}
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
    .btn-primary-dash { display: inline-flex; align-items: center; gap: 6px; background: var(--accent); color: #fff !important; border: none; border-radius: var(--radius-sm); padding: 9px 18px; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none !important; box-shadow: 0 1px 3px rgba(48,61,137,.25); }
    .btn-primary-dash:hover { background: #252f70; }
    .btn-secondary-dash { display: inline-flex; align-items: center; gap: 6px; background: var(--surface); color: var(--text-primary) !important; border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 8px 16px; font-size: 13px; font-weight: 500; cursor: pointer; text-decoration: none !important; }
    .btn-secondary-dash:hover { background: var(--bg); }
    .cat-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-card); overflow: hidden; margin-bottom: 20px; }
    .cat-card-header { padding: 14px 20px; border-bottom: 1px solid var(--border); font-size: 13.5px; font-weight: 650; background: #fafafa; }
    .cat-card-body { padding: 20px; }

    .form-group { margin-bottom: 16px; }
    .form-group:last-child { margin-bottom: 0; }
    .form-group label { display: block; font-size: 12px; font-weight: 600; color: var(--text-secondary); letter-spacing: .02em; margin-bottom: 6px; }
    .form-control { width: 100%; border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 9px 12px; font-size: 13.5px; color: var(--text-primary); background: var(--surface); outline: none; font-family: var(--font); }
    .form-control:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(48,61,137,.12); }
    textarea.form-control { resize: vertical; }
    .form-hint { font-size: 11.5px; color: var(--text-hint); margin-top: 5px; display: block; }
    .char-count { font-size: 11.5px; color: var(--text-hint); margin-top: 5px; }
    .char-count.over { color: var(--red); }

    .seo-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 20px; align-items: start; }
    .seo-preview-img { width: 100%; max-height: 200px; object-fit: cover; border-radius: var(--radius-sm); border: 1px solid var(--border); background: var(--bg); }
    .seo-preview-tag { display: inline-block; font-size: 11px; font-weight: 600; padding: 3px 9px; border-radius: 20px; margin-top: 10px; }
    .tag-auto { background: var(--green-bg); color: var(--green); }
    .tag-manual { background: #e6e8fb; color: var(--accent); }

    .google-preview-title { color: #1a0dab; font-size: 17px; line-height: 1.3; margin-bottom: 3px; }
    .google-preview-url { color: #006621; font-size: 13px; margin-bottom: 3px; }
    .google-preview-desc { color: #545454; font-size: 13px; line-height: 1.4; }

    .json-ld-box { background: var(--bg); border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 12px; font-size: 12px; font-family: 'SF Mono', 'Fira Code', monospace; max-height: 240px; overflow: auto; color: var(--text-secondary); white-space: pre-wrap; }

    @media (max-width: 900px) {
        .seo-grid { grid-template-columns: 1fr; }
    }
    @media (max-width: 768px) {
        .cat-page { padding: 16px; }
    }
    </style>

    <div class="app-content content container-fluid">
        <div class="cat-page">

            <div class="cat-page-header">
                <div>
                    <h1>Edit SEO — {{ $record->name ?? $record->title ?? '#' . $record->id }}</h1>
                    <div class="cat-breadcrumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        <a href="{{ route('admin.seo.index') }}">SEO Management</a>
                        <span>›</span>
                        Edit
                    </div>
                </div>
                <a href="{{ route('admin.seo.index') }}" class="btn-secondary-dash">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>

            <form action="{{ route('admin.seo.update',  $id) }}" method="POST" enctype="multipart/form-data" id="seoForm">
                @csrf
                @method('PUT')

                <div class="seo-grid">
                    {{-- LEFT --}}
                    <div>
                        <div class="cat-card">
                            <div class="cat-card-header">Basic SEO</div>
                            <div class="cat-card-body">
                                <div class="form-group">
                                    <label>H1 (Hero Heading)</label>
                                    <input type="text" name="h1" class="form-control"
                                           value="{{ old('h1', $seo->h1) }}"
                                           placeholder="Displayed in Hero Section on this page">
                                </div>

                                <div class="form-group">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" id="meta_title" class="form-control"
                                           maxlength="60" value="{{ old('meta_title', $seo->meta_title) }}">
                                    <span class="char-count"><span id="metaTitleCount">0</span>/60 characters</span>
                                </div>

                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <textarea name="meta_description" id="meta_description" class="form-control"
                                              rows="3" maxlength="160">{{ old('meta_description', $seo->meta_description) }}</textarea>
                                    <span class="char-count"><span id="metaDescCount">0</span>/160 characters</span>
                                </div>
                            </div>
                        </div>

                        <div class="cat-card">
                            <div class="cat-card-header">Open Graph (Facebook / LinkedIn)</div>
                            <div class="cat-card-body">
                                <div class="form-group">
                                    <label>OG Title</label>
                                    <input type="text" name="og_title" class="form-control"
                                           value="{{ old('og_title', $seo->og_title) }}"
                                           placeholder="Leave blank to use Meta Title">
                                </div>
                                <div class="form-group">
                                    <label>OG Description</label>
                                    <textarea name="og_description" class="form-control" rows="2"
                                              placeholder="Leave blank to use Meta Description">{{ old('og_description', $seo->og_description) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>OG Image</label>
                                    <input type="file" name="og_image" id="og_image_input" class="form-control" accept="image/*">
                                    <span class="form-hint">Upload nahi karoge to default automatically entity ki khud ki image se set hoga (preview right side).</span>
                                </div>
                            </div>
                        </div>

                        <div class="cat-card">
                            <div class="cat-card-header">Twitter Card</div>
                            <div class="cat-card-body">
                                <div class="form-group">
                                    <label>Card Type</label>
                                    <select name="twitter_card_type" class="form-control">
                                        @foreach (['summary' => 'Summary', 'summary_large_image' => 'Summary Large Image'] as $val => $label)
                                            <option value="{{ $val }}" {{ old('twitter_card_type', $seo->twitter_card_type) === $val ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Twitter Title</label>
                                    <input type="text" name="twitter_title" class="form-control"
                                           value="{{ old('twitter_title', $seo->twitter_title) }}"
                                           placeholder="Leave blank to use OG Title">
                                </div>
                                <div class="form-group">
                                    <label>Twitter Description</label>
                                    <textarea name="twitter_description" class="form-control" rows="2"
                                              placeholder="Leave blank to use OG Description">{{ old('twitter_description', $seo->twitter_description) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Twitter Image</label>
                                    <input type="file" name="twitter_image" id="twitter_image_input" class="form-control" accept="image/*">
                                    <span class="form-hint">Leave blank to use OG Image.</span>
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn-primary-dash">
                            <i class="fa fa-save"></i> Save SEO Settings
                        </button>
                    </div>

                    {{-- RIGHT --}}
                    <div>
                        <div class="cat-card">
                            <div class="cat-card-header">OG Image Preview</div>
                            <div class="cat-card-body" style="text-align:center">
                                <img id="ogImagePreview"
                                     src="{{ $seo->exists ? $seo->resolved_og_image : (($record->image ?? null) ? asset('storage/' . $record->image) : asset('images/default-og-image.jpg')) }}"
                                     class="seo-preview-img" alt="OG Image Preview">
                                @if ($seo->og_image)
                                    <span class="seo-preview-tag tag-manual">Manually uploaded</span>
                                @else
                                    <span class="seo-preview-tag tag-auto">Default image</span>
                                @endif
                            </div>
                        </div>

                        <div class="cat-card">
                            <div class="cat-card-header">Google Search Preview</div>
                            <div class="cat-card-body">
                                <div class="google-preview-title" id="previewTitle">{{ $seo->meta_title ?: 'Meta Title Preview' }}</div>
                                <div class="google-preview-url">{{ url('/') }}</div>
                                <div class="google-preview-desc" id="previewDesc">{{ $seo->meta_description ?: 'Meta description preview will appear here...' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@include('admin.footer')

<script>
$(function () {
    function updateCount(inputSel, countSel, limit) {
        const len = $(inputSel).val().length;
        $(countSel).text(len);
        $(countSel).closest('.char-count').toggleClass('over', len > limit);
    }
    updateCount('#meta_title', '#metaTitleCount', 60);
    updateCount('#meta_description', '#metaDescCount', 160);

    $('#meta_title').on('input', function () {
        updateCount('#meta_title', '#metaTitleCount', 60);
        $('#previewTitle').text($(this).val() || 'Meta Title Preview');
    });
    $('#meta_description').on('input', function () {
        updateCount('#meta_description', '#metaDescCount', 160);
        $('#previewDesc').text($(this).val() || 'Meta description preview will appear here...');
    });

    $('#og_image_input').on('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => $('#ogImagePreview').attr('src', e.target.result);
            reader.readAsDataURL(file);
        }
    });

    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Saved!',
            text: '{{ session('success') }}',
            timer: 2000,
            showConfirmButton: false
        });
    @endif
});
</script>