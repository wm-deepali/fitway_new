{{-- resources/views/admin/profile-setting/index.blade.php --}}
@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    <style>
    :root {
        --bg: #f1f2f4; --surface: #ffffff; --border: #e3e5e8;
        --text-primary: #202223; --text-secondary:#6d7175; --text-hint:#8c9196;
        --accent: #303d89; --accent-light: #f0f1fc;
        --green: #007a5e; --green-bg: #e3f1ec;
        --red: #b22222; --red-bg: #fce8e8;
        --radius-sm: 8px; --radius-md: 12px;
        --shadow-card: 0 1px 3px rgba(0,0,0,.08), 0 0 0 1px var(--border);
        --font: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    }
    .cat-page { background: var(--bg); padding: 24px 28px; min-height: 100vh; font-family: var(--font); color: var(--text-primary); box-sizing: border-box; }
    .cat-page * { box-sizing: border-box; }
    .cat-page-header { margin-bottom: 20px; }
    .cat-page-header h1 { font-size: 20px; font-weight: 650; margin: 0; }
    .cat-breadcrumb { font-size: 12.5px; color: var(--text-hint); margin-top: 3px; }
    .cat-breadcrumb a { color: var(--accent); text-decoration: none; }
    .cat-breadcrumb a:hover { text-decoration: underline; }
    .cat-breadcrumb span { margin: 0 5px; }

    .settings-alert {
        display: flex; align-items: center; justify-content: space-between;
        padding: 12px 16px; border-radius: var(--radius-sm); font-size: 13.5px;
        margin-bottom: 18px; font-family: var(--font);
    }
    .settings-alert-success { background: var(--green-bg); color: var(--green); }
    .settings-alert-error { background: var(--red-bg); color: var(--red); }
    .settings-alert button { background: none; border: none; font-size: 16px; cursor: pointer; color: inherit; line-height: 1; }

    .tabs-shell { max-width: 780px; }
    .tab-nav { display: flex; gap: 4px; border-bottom: 1px solid var(--border); margin-bottom: 20px; }
    .tab-btn {
        appearance: none; background: none; border: none; cursor: pointer;
        padding: 10px 18px; font-size: 13.5px; font-weight: 600; color: var(--text-secondary);
        font-family: var(--font); border-bottom: 2px solid transparent; margin-bottom: -1px;
        transition: color .15s, border-color .15s;
    }
    .tab-btn:hover { color: var(--text-primary); }
    .tab-btn.active { color: var(--accent); border-bottom-color: var(--accent); }
    .tab-panel { display: none; }
    .tab-panel.active { display: block; }

    .cat-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-card); padding: 24px; }
    .form-field { margin-bottom: 18px; }
    .form-field label { display: block; font-size: 12.5px; font-weight: 600; color: var(--text-secondary); margin-bottom: 6px; letter-spacing: .02em; }
    .form-field .hint { font-size: 11.5px; color: var(--text-hint); margin-top: 4px; }
    .form-row-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
    .form-control-styled {
        width: 100%; height: 40px; border: 1px solid var(--border); border-radius: var(--radius-sm);
        padding: 0 12px; font-size: 13.5px; font-family: var(--font); color: var(--text-primary);
        outline: none; transition: border-color .15s, box-shadow .15s; background: var(--surface);
    }
    .form-control-styled:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(48,61,137,.12); }
    .form-error { color: #b22222; font-size: 12px; margin-top: 5px; }
    .form-actions { display: flex; gap: 10px; margin-top: 24px; padding-top: 20px; border-top: 1px solid var(--border); }
    .btn-primary-dash { display: inline-flex; align-items: center; gap: 6px; background: var(--accent); color: #fff !important; border: none; border-radius: var(--radius-sm); padding: 9px 18px; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none !important; box-shadow: 0 1px 3px rgba(48,61,137,.25); }
    .btn-primary-dash:hover { background: #252f70; }

    .logo-preview-block { display: flex; align-items: center; gap: 16px; margin-bottom: 20px; }
    .logo-preview-img { width: 140px; height: 70px; border-radius: var(--radius-sm); object-fit: contain; background: var(--bg); border: 1px solid var(--border); padding: 8px; }
    .logo-preview-placeholder { width: 140px; height: 70px; border-radius: var(--radius-sm); background: var(--bg); border: 1px solid var(--border); display: flex; align-items: center; justify-content: center; color: var(--text-hint); font-size: 12px; }

    @media (max-width: 640px) { .form-row-2 { grid-template-columns: 1fr; } .logo-preview-block { flex-direction: column; align-items: flex-start; } }
    </style>

    <div class="app-content content container-fluid">
        <div class="cat-page">

            <div class="cat-page-header">
                <h1>Profile Setting</h1>
                <div class="cat-breadcrumb">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    <span>›</span>
                    Profile Setting
                </div>
            </div>

            @if(session('success'))
                <div class="settings-alert settings-alert-success">
                    <span>{{ session('success') }}</span>
                    <button type="button" onclick="this.parentElement.remove()">&times;</button>
                </div>
            @endif

            @if(session('error'))
                <div class="settings-alert settings-alert-error">
                    <span>{{ session('error') }}</span>
                    <button type="button" onclick="this.parentElement.remove()">&times;</button>
                </div>
            @endif

            <div class="tabs-shell">

                <div class="tab-nav">
                    <button type="button" class="tab-btn active" data-tab="profile">Profile Details</button>
                    <button type="button" class="tab-btn" data-tab="logo">Logo</button>
                    <button type="button" class="tab-btn" data-tab="password">Account Setting</button>
                </div>

                {{-- Profile Details --}}
                <div class="tab-panel active" id="tab-profile">
                    <div class="cat-card">
                        <form action="{{ route('admin.profile.update') }}" method="POST">
                            @csrf

                            <div class="form-row-2">
                                <div class="form-field">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name"
                                        class="form-control-styled @error('name') is-invalid @enderror"
                                        value="{{ old('name', $admin->name) }}" required>
                                    @error('name') <div class="form-error">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-field">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email"
                                        class="form-control-styled @error('email') is-invalid @enderror"
                                        value="{{ old('email', $admin->email) }}" required>
                                    @error('email') <div class="form-error">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="form-row-2">
                                <div class="form-field">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" id="company_name" name="company_name" class="form-control-styled"
                                        value="{{ old('company_name', $admin->company_name) }}">
                                </div>

                                <div class="form-field">
                                    <label for="contact">Contact</label>
                                    <input type="text" id="contact" name="contact" class="form-control-styled"
                                        value="{{ old('contact', $admin->contact) }}">
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn-primary-dash">
                                    <i class="fa fa-check"></i> Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Logo --}}
                <div class="tab-panel" id="tab-logo">
                    <div class="cat-card">

                        <div class="logo-preview-block">
                            @if($admin->image)
                                <img src="{{ asset('storage/' . $admin->image) }}" class="logo-preview-img" alt="Logo">
                            @else
                                <div class="logo-preview-placeholder">No logo uploaded</div>
                            @endif
                        </div>

                        <form action="{{ route('admin.profile.logo.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-field">
                                <label for="image">Upload New Logo</label>
                                <input type="file" id="image" name="image"
                                    class="form-control-styled @error('image') is-invalid @enderror" required>
                                <div class="hint">JPG, PNG, GIF, WEBP or SVG — max 2MB</div>
                                @error('image') <div class="form-error">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn-primary-dash">
                                    <i class="fa fa-check"></i> Update Logo
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Account Setting (password) --}}
                <div class="tab-panel" id="tab-password">
                    <div class="cat-card">
                        <form action="{{ route('admin.reset.password') }}" method="POST">
                            @csrf

                            <div class="form-row-2">
                                <div class="form-field">
                                    <label for="password">New Password</label>
                                    <input type="password" id="password" name="password"
                                        class="form-control-styled @error('password') is-invalid @enderror"
                                        placeholder="Enter new password" required>
                                    @error('password') <div class="form-error">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-field">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control-styled"
                                        placeholder="Confirm new password" required>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn-primary-dash">
                                    <i class="fa fa-check"></i> Update Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

@include('admin.footer')

<script>
document.querySelectorAll('.tab-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
        this.classList.add('active');
        document.getElementById('tab-' + this.dataset.tab).classList.add('active');
    });
});
</script>