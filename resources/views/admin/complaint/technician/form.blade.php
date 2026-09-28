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
    .brand-page-header { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; margin-bottom: 20px; }
    .brand-page-header h1 { font-size: 20px; font-weight: 650; margin: 0; }
    .brand-breadcrumb { font-size: 12.5px; color: var(--text-hint); margin-top: 3px; }
    .brand-breadcrumb a { color: var(--accent); text-decoration: none; }
    .brand-breadcrumb a:hover { text-decoration: underline; }
    .brand-breadcrumb span { margin: 0 5px; }
    .btn-primary-dash { display: inline-flex; align-items: center; gap: 6px; background: var(--accent); color: #fff !important; border: none; border-radius: var(--radius-sm); padding: 9px 18px; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none !important; }
    .btn-primary-dash:hover { background: #252f70; }
    .btn-secondary-dash { display: inline-flex; align-items: center; gap: 6px; background: var(--surface); color: var(--text-primary) !important; border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 9px 18px; font-size: 13px; font-weight: 500; cursor: pointer; text-decoration: none !important; }
    .brand-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-card); padding: 24px; max-width: 640px; }
    .form-group-styled { margin-bottom: 18px; }
    .form-group-styled label { display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; }
    .form-control-styled { width: 100%; height: 40px; border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 0 12px; font-size: 13px; font-family: var(--font); color: var(--text-primary); outline: none; background: var(--surface); }
    .form-control-styled:focus { border-color: var(--accent); }
    .field-hint { font-size: 11.5px; color: var(--text-hint); margin-top: 4px; }
    .field-error { font-size: 12px; color: #b22222; margin-top: 4px; }
    .photo-preview-wrap { display: flex; align-items: center; gap: 16px; }
    .photo-preview { width: 84px; height: 84px; border-radius: 50%; object-fit: cover; border: 1px solid var(--border); background: var(--bg); }
    .form-actions { display: flex; gap: 10px; margin-top: 24px; }
    </style>

    <div class="app-content content container-fluid">
        <div class="brand-page">

            <div class="brand-page-header">
                <div>
                    <h1>{{ $technician->exists ? 'Edit Technician' : 'Add Technician' }}</h1>
                    <div class="brand-breadcrumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        <a href="{{ route('admin.complaint.technicians.index') }}">Technicians</a>
                        <span>›</span>
                        {{ $technician->exists ? 'Edit' : 'Add' }}
                    </div>
                </div>
                <a href="{{ route('admin.complaint.technicians.index') }}" class="btn-secondary-dash">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>

            <div class="brand-card">
                <form action="{{ $technician->exists ? route('admin.complaint.technicians.update', $technician) : route('admin.complaint.technicians.store') }}"
                      method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($technician->exists) @method('PUT') @endif

                    <div class="form-group-styled">
                        <label>Full Name <span style="color:#b22222">*</span></label>
                        <input type="text" name="full_name" class="form-control-styled"
                               value="{{ old('full_name', $technician->full_name) }}" required>
                        @error('full_name') <div class="field-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group-styled">
                        <label>Mobile Number <span style="color:#b22222">*</span></label>
                        <input type="text" id="mobile_number" name="mobile_number" class="form-control-styled"
                               value="{{ old('mobile_number', $technician->mobile_number) }}" maxlength="15" required>
                        @error('mobile_number') <div class="field-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group-styled">
                        <label>WhatsApp Number</label>
                        <input type="text" id="whatsapp_number" name="whatsapp_number" class="form-control-styled"
                               value="{{ old('whatsapp_number', $technician->whatsapp_number) }}" maxlength="15">
                        <div class="field-hint">Auto-filled from Mobile Number — change if different.</div>
                        @error('whatsapp_number') <div class="field-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group-styled">
                        <label>Photograph</label>
                        <div class="photo-preview-wrap">
                            <img id="photo-preview-img" class="photo-preview"
                                 src="{{ $technician->photograph_url ?? asset('assets/images/no-image.svg') }}"
                                 alt="Preview">
                            <input type="file" name="photograph" id="photograph" accept="image/*" class="form-control-styled" style="height:auto; padding:8px;">
                        </div>
                        @error('photograph') <div class="field-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-primary-dash">
                            <i class="fa fa-save"></i> {{ $technician->exists ? 'Update' : 'Save' }}
                        </button>
                        <a href="{{ route('admin.complaint.technicians.index') }}" class="btn-secondary-dash">Cancel</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@include('admin.footer')

<script>
// Autofill WhatsApp Number from Mobile Number (only if user hasn't typed WhatsApp yet / or it matches previous mobile)
const mobileInput = document.getElementById('mobile_number');
const whatsappInput = document.getElementById('whatsapp_number');
let whatsappTouched = {{ $technician->exists && $technician->whatsapp_number && $technician->whatsapp_number !== $technician->mobile_number ? 'true' : 'false' }};

whatsappInput.addEventListener('input', () => { whatsappTouched = true; });

mobileInput.addEventListener('input', function () {
    if (!whatsappTouched) {
        whatsappInput.value = this.value;
    }
});

// Live image preview
document.getElementById('photograph').addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = ev => document.getElementById('photo-preview-img').src = ev.target.result;
    reader.readAsDataURL(file);
});
</script>