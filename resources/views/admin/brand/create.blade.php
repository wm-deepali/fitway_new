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
    .brand-page { background: var(--bg); padding: 24px 28px; min-height: 100vh; font-family: var(--font); color: var(--text-primary); box-sizing: border-box; }
    .brand-page * { box-sizing: border-box; }
    .brand-page-header { margin-bottom: 20px; }
    .brand-page-header h1 { font-size: 20px; font-weight: 650; margin: 0; }
    .brand-breadcrumb { font-size: 12.5px; color: var(--text-hint); margin-top: 3px; }
    .brand-breadcrumb a { color: var(--accent); text-decoration: none; }
    .brand-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-card); padding: 24px; max-width: 640px; }
    .form-group { margin-bottom: 16px; }
    .form-group label { display: block; font-size: 12.5px; font-weight: 600; color: var(--text-secondary); margin-bottom: 6px; }
    .form-control-styled { height: 38px; width: 100%; border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 0 12px; font-size: 13px; font-family: var(--font); color: var(--text-primary); outline: none; background: var(--surface); }
    textarea.form-control-styled { height: 90px; padding: 10px 12px; resize: vertical; }
    .form-control-styled:focus { border-color: var(--accent); }
    .error-text { color: #b3261e; font-size: 11.5px; margin-top: 4px; }
    .logo-preview-wrap { display: flex; align-items: center; gap: 14px; }
    .logo-preview { width: 64px; height: 64px; border-radius: var(--radius-sm); border: 1px solid var(--border); background: var(--bg); object-fit: contain; }
    .btn-primary-dash { display: inline-flex; align-items: center; gap: 6px; background: var(--accent); color: #fff !important; border: none; border-radius: var(--radius-sm); padding: 10px 20px; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none !important; }
    .btn-secondary-dash { display: inline-flex; align-items: center; gap: 6px; background: var(--surface); color: var(--text-primary) !important; border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 10px 20px; font-size: 13px; font-weight: 500; cursor: pointer; text-decoration: none !important; }
    .form-actions { display: flex; gap: 10px; margin-top: 20px; }
    </style>

    <div class="app-content content container-fluid">
        <div class="brand-page">

            <div class="brand-page-header">
                <h1>Add Brand</h1>
                <div class="brand-breadcrumb">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a> ›
                    <a href="{{ route('admin.brands.index') }}">Brands</a> › Add
                </div>
            </div>

            <div class="brand-card">
                <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Brand Name *</label>
                        <input type="text" name="name" class="form-control-styled" value="{{ old('name') }}">
                        @error('name') <div class="error-text">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>Logo</label>
                        <div class="logo-preview-wrap">
                            <img id="logoPreview" class="logo-preview" src="{{ asset('Admin/images/no-image.svg') }}" alt="">
                            <input type="file" name="logo" id="logoInput" class="form-control-styled" accept="image/*">
                        </div>
                        @error('logo') <div class="error-text">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control-styled">{{ old('description') }}</textarea>
                        @error('description') <div class="error-text">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control-styled">
                            <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-primary-dash"><i class="fa fa-save"></i> Save Brand</button>
                        <a href="{{ route('admin.brands.index') }}" class="btn-secondary-dash">Cancel</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@include('admin.footer')

<script>
document.getElementById('logoInput').addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function (event) {
        document.getElementById('logoPreview').src = event.target.result;
    };
    reader.readAsDataURL(file);
});
</script>