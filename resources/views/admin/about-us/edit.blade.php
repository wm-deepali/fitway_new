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
    .cat-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-card); padding: 24px; max-width: 640px; margin-bottom: 24px; }
    .cat-card h3 { font-size: 15px; font-weight: 650; margin: 0 0 18px; }
    .form-field { margin-bottom: 18px; }
    .form-field label { display: block; font-size: 12.5px; font-weight: 600; color: var(--text-secondary); margin-bottom: 6px; letter-spacing: .02em; }
    .form-field .hint { font-size: 11.5px; color: var(--text-hint); margin-top: 4px; }
    .form-control-styled {
        width: 100%; border: 1px solid var(--border); border-radius: var(--radius-sm);
        padding: 9px 12px; font-size: 13.5px; font-family: var(--font); color: var(--text-primary);
        outline: none; transition: border-color .15s, box-shadow .15s; background: var(--surface);
    }
    .form-control-styled:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(48,61,137,.12); }
    .form-error { color: #b22222; font-size: 12px; margin-top: 5px; }
    .current-img { height: 90px; width: 90px; object-fit: cover; border-radius: var(--radius-sm); border: 1px solid var(--border); margin-top: 8px; }
    .alert-success-dash { background: #e6f4ea; color: #1e7e34; border: 1px solid #b8e6c1; border-radius: var(--radius-sm); padding: 10px 14px; font-size: 13px; margin-bottom: 18px; max-width: 640px; }
    </style>

    <div class="app-content content container-fluid">
        <div class="cat-page">

            <div class="cat-page-header">
                <div>
                    <h1>About Us</h1>
                    <div class="cat-breadcrumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        About Us
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="alert-success-dash">{{ session('success') }}</div>
            @endif

            {{-- About Us: image + description --}}
            <div class="cat-card">
                <h3>About Us</h3>
                <form action="{{ route('admin.about-us.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-field">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image"
                            class="form-control-styled @error('image') is-invalid @enderror">
                        <div class="hint">JPG, PNG, GIF, WEBP or SVG — max 2MB</div>
                        @error('image') <div class="form-error">{{ $message }}</div> @enderror

                        @if($about && $about->image)
                            <div>
                                <img src="{{ asset('about/'.$about->image) }}" class="current-img">
                            </div>
                        @endif
                    </div>

                    <div class="form-field">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" rows="4"
                            class="form-control-styled @error('description') is-invalid @enderror"
                            placeholder="Enter description">{{ old('description', $about->description ?? '') }}</textarea>
                        @error('description') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field" style="margin-bottom:0;">
                        <button type="submit" class="btn-primary-dash">
                            <i class="fa fa-check"></i> Update About Us
                        </button>
                    </div>
                </form>
            </div>

            {{-- Who We Are: description + url --}}
            <div class="cat-card">
                <h3>Who We Are</h3>
                <form action="{{ route('admin.about-us.who-we-are.update') }}" method="POST">
                    @csrf

                    <div class="form-field">
                        <label for="who_description">Description</label>
                        <textarea id="who_description" name="description" rows="4"
                            class="form-control-styled @error('description') is-invalid @enderror"
                            placeholder="Enter description">{{ old('description', $whoWeAre->description ?? '') }}</textarea>
                        @error('description') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field">
                        <label for="url">URL</label>
                        <input type="text" id="url" name="url"
                            class="form-control-styled @error('url') is-invalid @enderror"
                            value="{{ old('url', $whoWeAre->url ?? '') }}" placeholder="https://example.com">
                        @error('url') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field" style="margin-bottom:0;">
                        <button type="submit" class="btn-primary-dash">
                            <i class="fa fa-check"></i> Update Who We Are
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@include('admin.footer')