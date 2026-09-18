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
    .vend-page { background: var(--bg); padding: 24px 28px; min-height: 100vh; font-family: var(--font); color: var(--text-primary); box-sizing: border-box; }
    .vend-page * { box-sizing: border-box; }
    .vend-page-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; }
    .vend-page-header h1 { font-size: 20px; font-weight: 650; margin: 0; }
    .vend-breadcrumb { font-size: 12.5px; color: var(--text-hint); margin-top: 3px; }
    .vend-breadcrumb a { color: var(--accent); text-decoration: none; }
    .vend-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-card); padding: 24px; max-width: 780px; }
    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px; }
    .form-row.full { grid-template-columns: 1fr; }
    .form-group label { display: block; font-size: 12.5px; font-weight: 600; color: var(--text-secondary); margin-bottom: 6px; }
    .form-control-styled { height: 38px; width: 100%; border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 0 12px; font-size: 13px; font-family: var(--font); color: var(--text-primary); outline: none; background: var(--surface); }
    textarea.form-control-styled { height: 80px; padding: 10px 12px; resize: vertical; }
    .form-control-styled:focus { border-color: var(--accent); }
    .error-text { color: #b3261e; font-size: 11.5px; margin-top: 4px; }
    .btn-primary-dash { display: inline-flex; align-items: center; gap: 6px; background: var(--accent); color: #fff !important; border: none; border-radius: var(--radius-sm); padding: 10px 20px; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none !important; }
    .btn-secondary-dash { display: inline-flex; align-items: center; gap: 6px; background: var(--surface); color: var(--text-primary) !important; border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 10px 20px; font-size: 13px; font-weight: 500; cursor: pointer; text-decoration: none !important; }
    .form-actions { display: flex; gap: 10px; margin-top: 20px; }
    @media (max-width: 768px) { .form-row { grid-template-columns: 1fr; } }
    </style>

    <div class="app-content content container-fluid">
        <div class="vend-page">

            <div class="vend-page-header">
                <div>
                    <h1>Edit Vendor</h1>
                    <div class="vend-breadcrumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a> ›
                        <a href="{{ route('admin.manage-vendors.index') }}">Vendors</a> › Edit
                    </div>
                </div>
            </div>

            <div class="vend-card">
                <form action="{{ route('admin.manage-vendors.update', $vendor) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-row">
                        <div class="form-group">
                            <label>Vendor Name *</label>
                            <input type="text" name="vendor_name" class="form-control-styled" value="{{ old('vendor_name', $vendor->vendor_name) }}">
                            @error('vendor_name') <div class="error-text">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>GST Number</label>
                            <input type="text" name="gst_number" class="form-control-styled" value="{{ old('gst_number', $vendor->gst_number) }}">
                            @error('gst_number') <div class="error-text">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-row full">
                        <div class="form-group">
                            <label>Full Address *</label>
                            <textarea name="full_address" class="form-control-styled">{{ old('full_address', $vendor->full_address) }}</textarea>
                            @error('full_address') <div class="error-text">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Email ID *</label>
                            <input type="email" name="email" class="form-control-styled" value="{{ old('email', $vendor->email) }}">
                            @error('email') <div class="error-text">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Contact Person Name *</label>
                            <input type="text" name="contact_person_name" class="form-control-styled" value="{{ old('contact_person_name', $vendor->contact_person_name) }}">
                            @error('contact_person_name') <div class="error-text">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Mobile Number *</label>
                            <input type="text" name="mobile_number" class="form-control-styled" value="{{ old('mobile_number', $vendor->mobile_number) }}">
                            @error('mobile_number') <div class="error-text">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>WhatsApp Number</label>
                            <input type="text" name="whatsapp_number" class="form-control-styled" value="{{ old('whatsapp_number', $vendor->whatsapp_number) }}">
                            @error('whatsapp_number') <div class="error-text">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>State *</label>
                            <select name="state_id" id="state_id" class="form-control-styled">
                                <option value="">Select State</option>
                                @foreach($states as $state)
                                    <option value="{{ $state->id }}" {{ old('state_id', $vendor->state_id) == $state->id ? 'selected' : '' }}>
                                        {{ $state->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('state_id') <div class="error-text">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>City *</label>
                            <select name="city_id" id="city_id" class="form-control-styled">
                                <option value="">Select City</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ old('city_id', $vendor->city_id) == $city->id ? 'selected' : '' }}>
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('city_id') <div class="error-text">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Pincode</label>
                            <input type="text" name="pincode" class="form-control-styled" value="{{ old('pincode', $vendor->pincode) }}">
                            @error('pincode') <div class="error-text">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control-styled">
                                <option value="1" {{ old('status', $vendor->status) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $vendor->status) == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-primary-dash"><i class="fa fa-save"></i> Update Vendor</button>
                        <a href="{{ route('admin.manage-vendors.index') }}" class="btn-secondary-dash">Cancel</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@include('admin.footer')

<script>
document.getElementById('state_id').addEventListener('change', function () {
    const citySelect = document.getElementById('city_id');
    const stateId = this.value;

    citySelect.innerHTML = '<option value="">Loading…</option>';

    if (!stateId) {
        citySelect.innerHTML = '<option value="">Select State First</option>';
        return;
    }

    fetch("{{ route('admin.vendors.getCities') }}?state_id=" + stateId)
        .then(res => res.json())
        .then(res => {
            citySelect.innerHTML = '<option value="">Select City</option>';
            res.data.forEach(city => {
                const opt = document.createElement('option');
                opt.value = city.id;
                opt.textContent = city.name;
                citySelect.appendChild(opt);
            });
        });
});
</script>