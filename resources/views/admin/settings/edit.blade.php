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
    .btn-primary-dash { display: inline-flex; align-items: center; gap: 6px; background: var(--accent); color: #fff !important; border: none; border-radius: var(--radius-sm); padding: 9px 18px; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none !important; box-shadow: 0 1px 3px rgba(48,61,137,.25); }
    .btn-primary-dash:hover { background: #252f70; }
    .cat-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-card); padding: 24px; max-width: 720px; margin-bottom: 24px; }
    .cat-card h3 { font-size: 15px; font-weight: 650; margin: 0 0 18px; }
    .form-row { display: flex; gap: 16px; flex-wrap: wrap; }
    .form-row .form-field { flex: 1; min-width: 200px; }
    .form-field { margin-bottom: 18px; }
    .form-field label { display: block; font-size: 12.5px; font-weight: 600; color: var(--text-secondary); margin-bottom: 6px; letter-spacing: .02em; }
    .form-field .hint { font-size: 11.5px; color: var(--text-hint); margin-top: 4px; }
    .form-control-styled {
        width: 100%; border: 1px solid var(--border); border-radius: var(--radius-sm);
        padding: 9px 12px; font-size: 13.5px; font-family: var(--font); color: var(--text-primary);
        outline: none; transition: border-color .15s, box-shadow .15s; background: var(--surface);
    }
    textarea.form-control-styled { resize: vertical; }
    .form-control-styled:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(48,61,137,.12); }
    .form-error { color: #b22222; font-size: 12px; margin-top: 5px; }
    .current-img { height: 60px; width: 120px; object-fit: contain; border-radius: var(--radius-sm); border: 1px solid var(--border); margin-top: 8px; background: var(--bg); padding: 6px; }
    .alert-success-dash { background: #e6f4ea; color: #1e7e34; border: 1px solid #b8e6c1; border-radius: var(--radius-sm); padding: 10px 14px; font-size: 13px; margin-bottom: 18px; max-width: 720px; }
    </style>

    <div class="app-content content container-fluid">
        <div class="cat-page">

            <div class="cat-page-header">
                <h1>Settings</h1>
            </div>

            @if(session('success'))
                <div class="alert-success-dash">{{ session('success') }}</div>
            @endif

            {{-- Logo --}}
            <div class="cat-card">
                <h3>Logo</h3>
                <form action="{{ route('admin.settings.logo.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-field">
                        <label for="logo_image">Logo Image</label>
                        <input type="file" id="logo_image" name="logo_image"
                            class="form-control-styled @error('logo_image') is-invalid @enderror">
                        <div class="hint">JPG, PNG, GIF, WEBP or SVG — max 2MB. Leave empty to keep current logo.</div>
                        @error('logo_image') <div class="form-error">{{ $message }}</div> @enderror
                        @if($settings->logo_image)
                            <div><img src="{{ asset('front/logo/'.$settings->logo_image) }}" class="current-img"></div>
                        @endif
                    </div>
                    <button type="submit" class="btn-primary-dash"><i class="fa fa-check"></i> Update Logo</button>
                </form>
            </div>

            {{-- Header --}}
            <div class="cat-card">
                <h3>Header</h3>
                <form action="{{ route('admin.settings.header.update') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-field">
                            <label for="header_email">Email</label>
                            <input type="email" id="header_email" name="header_email"
                                class="form-control-styled @error('header_email') is-invalid @enderror"
                                value="{{ old('header_email', $settings->header_email) }}">
                            @error('header_email') <div class="form-error">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-field">
                            <label for="header_phone">Phone Number</label>
                            <input type="text" id="header_phone" name="header_phone"
                                class="form-control-styled @error('header_phone') is-invalid @enderror"
                                value="{{ old('header_phone', $settings->header_phone) }}">
                            @error('header_phone') <div class="form-error">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn-primary-dash"><i class="fa fa-check"></i> Update Header</button>
                </form>
            </div>

            {{-- Header tracking scripts --}}
            <div class="cat-card">
                <h3>Tracking Scripts</h3>
                <form action="{{ route('admin.settings.header-script.update') }}" method="POST">
                    @csrf
                    <div class="form-field">
                        <label for="header_analytics">Analytics Script</label>
                        <textarea id="header_analytics" name="header_analytics" rows="4"
                            class="form-control-styled">{{ old('header_analytics', $settings->header_analytics) }}</textarea>
                    </div>
                    <div class="form-field">
                        <label for="header_ads">Ads Script</label>
                        <textarea id="header_ads" name="header_ads" rows="4"
                            class="form-control-styled">{{ old('header_ads', $settings->header_ads) }}</textarea>
                    </div>
                    <button type="submit" class="btn-primary-dash"><i class="fa fa-check"></i> Update Scripts</button>
                </form>
            </div>

            {{-- Footer --}}
            <div class="cat-card">
                <h3>Footer</h3>
                <form action="{{ route('admin.settings.footer.update') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-field">
                            <label for="footer_email">Email</label>
                            <input type="email" id="footer_email" name="footer_email"
                                class="form-control-styled @error('footer_email') is-invalid @enderror"
                                value="{{ old('footer_email', $settings->footer_email) }}">
                            @error('footer_email') <div class="form-error">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-field">
                            <label for="footer_phone_1">Phone Number 1</label>
                            <input type="text" id="footer_phone_1" name="footer_phone_1"
                                class="form-control-styled @error('footer_phone_1') is-invalid @enderror"
                                value="{{ old('footer_phone_1', $settings->footer_phone_1) }}">
                            @error('footer_phone_1') <div class="form-error">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-field">
                            <label for="footer_phone_2">Phone Number 2</label>
                            <input type="text" id="footer_phone_2" name="footer_phone_2"
                                class="form-control-styled @error('footer_phone_2') is-invalid @enderror"
                                value="{{ old('footer_phone_2', $settings->footer_phone_2) }}">
                            @error('footer_phone_2') <div class="form-error">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="form-field">
                        <label for="footer_address">Address</label>
                        <textarea id="footer_address" name="footer_address" rows="3"
                            class="form-control-styled @error('footer_address') is-invalid @enderror">{{ old('footer_address', $settings->footer_address) }}</textarea>
                        @error('footer_address') <div class="form-error">{{ $message }}</div> @enderror
                    </div>
                    <button type="submit" class="btn-primary-dash"><i class="fa fa-check"></i> Update Footer</button>
                </form>
            </div>

            {{-- Newsletter --}}
            <div class="cat-card">
                <h3>Newsletter</h3>
                <form action="{{ route('admin.settings.newsletter.update') }}" method="POST">
                    @csrf
                    <div class="form-field">
                        <label for="newsletter_description">Description</label>
                        <textarea id="newsletter_description" name="newsletter_description" rows="3"
                            class="form-control-styled @error('newsletter_description') is-invalid @enderror">{{ old('newsletter_description', $settings->newsletter_description) }}</textarea>
                        @error('newsletter_description') <div class="form-error">{{ $message }}</div> @enderror
                    </div>
                    <button type="submit" class="btn-primary-dash"><i class="fa fa-check"></i> Update Newsletter</button>
                </form>
            </div>

        </div>
    </div>
</div>

@include('admin.footer')