@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">

            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb bg-transparent mb-0">

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.customers.index') }}">
                            Manage Customers
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Edit Customer
                    </li>

                </ol>
            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card wm-quotes-card">

                <div class="card-header d-flex align-items-center justify-content-between wm-quotes-header">

                    <h4 class="mb-0 wm-quotes-title">
                        Edit Customer
                    </h4>

                    <a href="{{ route('admin.customers.show', $customer->id) }}"
                        class="btn btn-sm wm-btn-outline">
                        <i class="fa fa-eye"></i> View Customer
                    </a>

                </div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger wm-form-alert">
                            <ul class="mb-0 pl-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST" id="editCustomerForm">
                        @csrf
                        @method('PUT')

                        <div class="wm-form-section">
                            <p class="wm-form-section-title">Contact details</p>
                            <div class="wm-form-grid">

                                <div class="wm-form-field">
                                    <label>Customer Name <span class="wm-required">*</span></label>
                                    <input type="text" name="customer_name" class="form-control"
                                        value="{{ old('customer_name', $customer->customer_name) }}" required>
                                </div>

                                <div class="wm-form-field">
                                    <label>Business Name</label>
                                    <input type="text" name="business_name" class="form-control"
                                        value="{{ old('business_name', $customer->business_name) }}">
                                </div>

                                <div class="wm-form-field">
                                    <label>Email Id</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ old('email', $customer->email) }}">
                                </div>

                                <div class="wm-form-field">
                                    <label>Mobile Number <span class="wm-required">*</span></label>
                                    <input type="text" name="mobile_number" class="form-control"
                                        value="{{ old('mobile_number', $customer->mobile_number) }}" required>
                                </div>

                                <div class="wm-form-field">
                                    <label>GST Number</label>
                                    <input type="text" name="gst_number" class="form-control"
                                        value="{{ old('gst_number', $customer->gst_number) }}" placeholder="Optional">
                                </div>

                                <div class="wm-form-field">
                                    <label>Status <span class="wm-required">*</span></label>
                                    <select name="status" class="form-control" required>
                                        <option value="active" {{ old('status', $customer->status) === 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ old('status', $customer->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="wm-form-section">
                            <p class="wm-form-section-title">Location</p>
                            <div class="wm-form-grid">

                                <div class="wm-form-field wm-form-field--full">
                                    <label>Address</label>
                                    <textarea name="address" class="form-control" rows="2">{{ old('address', $customer->address) }}</textarea>
                                </div>

                                <div class="wm-form-field">
                                    <label>State</label>
                                    <select name="state_id" id="state_id" class="form-control">
                                        <option value="">-- Select State --</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}"
                                                {{ (int) old('state_id', $customer->state_id) === $state->id ? 'selected' : '' }}>
                                                {{ $state->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="wm-form-field">
                                    <label>City</label>
                                    <select name="city_id" id="city_id" class="form-control">
                                        <option value="">-- Select City --</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}"
                                                {{ (int) old('city_id', $customer->city_id) === $city->id ? 'selected' : '' }}>
                                                {{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="wm-form-field">
                                    <label>Pin Code</label>
                                    <input type="text" name="pincode" class="form-control" maxlength="10"
                                        value="{{ old('pincode', $customer->pincode) }}" placeholder="Optional">
                                </div>

                            </div>
                        </div>

                        <div class="wm-form-actions">
                            <a href="{{ route('admin.customers.show', $customer->id) }}" class="btn btn-sm wm-btn-outline">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-sm wm-btn-primary">
                                <i class="fa fa-save"></i> Save Changes
                            </button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')

{{-- ==========================================================
     Scoped UI styling — matches the Manage Customers index page's
     indigo design system, plus form-specific rules for this page.
     ========================================================== --}}
<style>
    :root {
        --wm-primary: #303d89;
        --wm-primary-hover: #252f70;
        --wm-primary-light: #eef0fa;
        --wm-border: #e3e5e8;
        --wm-text: #202223;
        --wm-muted: #6d7175;
        --wm-radius: 12px;
    }

    .wm-quotes-card {
        border: 1px solid var(--wm-border);
        border-radius: var(--wm-radius);
        box-shadow: 0 1px 3px rgba(0, 0, 0, .08), 0 0 0 1px var(--wm-border);
        overflow: hidden;
    }

    .wm-quotes-header {
        background: #ffffff;
        border-bottom: 1px solid var(--wm-border);
        padding: 1rem 1.25rem;
        flex-wrap: wrap;
        gap: 0.75rem;
    }

    .wm-quotes-title {
        font-weight: 650;
        color: var(--wm-text);
        letter-spacing: 0.2px;
    }

    .wm-btn-primary,
    .wm-btn-outline {
        border-radius: 8px !important;
        font-weight: 600;
        font-size: 0.8rem;
        padding: 0.45rem 0.9rem;
        border: 1px solid transparent;
        transition: all 0.15s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        white-space: nowrap;
    }

    .wm-btn-primary {
        background-color: var(--wm-primary);
        color: #ffffff !important;
    }

    .wm-btn-primary:hover {
        background-color: var(--wm-primary-hover);
        color: #ffffff !important;
        transform: translateY(-1px);
        box-shadow: 0 3px 8px rgba(48, 61, 137, 0.25);
    }

    .wm-btn-outline {
        background-color: #fff;
        color: var(--wm-primary) !important;
        border-color: var(--wm-primary);
    }

    .wm-btn-outline:hover {
        background-color: var(--wm-primary);
        color: #fff !important;
    }

    .wm-form-alert {
        border-radius: 8px;
        font-size: 0.85rem;
    }

    .wm-form-section {
        margin-bottom: 22px;
    }

    .wm-form-section:last-of-type {
        margin-bottom: 0;
    }

    .wm-form-section-title {
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        color: var(--wm-muted);
        margin: 0 0 12px;
        padding-bottom: 8px;
        border-bottom: 1px solid var(--wm-border);
    }

    .wm-form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 16px 18px;
    }

    .wm-form-field {
        display: flex;
        flex-direction: column;
    }

    .wm-form-field--full {
        grid-column: 1 / -1;
    }

    .wm-form-field label {
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--wm-text);
        margin-bottom: 6px;
    }

    .wm-required {
        color: #c0392b;
        margin-left: 2px;
    }

    .wm-form-field .form-control {
        border-radius: 8px;
        border: 1px solid var(--wm-border);
        font-size: 0.88rem;
        min-height: 40px;
    }

    .wm-form-field textarea.form-control {
        min-height: auto;
    }

    .wm-form-field .form-control:focus {
        border-color: var(--wm-primary);
        box-shadow: 0 0 0 3px rgba(48, 61, 137, 0.12);
        outline: none;
    }

    .wm-form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 8px;
        padding-top: 18px;
        border-top: 1px solid var(--wm-border);
    }

    @media (max-width: 576px) {
        .wm-quotes-header {
            flex-direction: column;
            align-items: flex-start !important;
        }

        .wm-form-actions {
            flex-direction: column-reverse;
        }

        .wm-form-actions .btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>

{{-- State -> City cascading dropdown --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    var stateSelect = document.getElementById('state_id');
    var citySelect = document.getElementById('city_id');
    var citiesUrlBase = "{{ url('admin/customers-cities') }}";
    var selectedCityId = "{{ old('city_id', $customer->city_id) }}";

    stateSelect.addEventListener('change', function () {
        var stateId = this.value;
        citySelect.innerHTML = '<option value="">-- Select City --</option>';
        if (!stateId) return;

        fetch(citiesUrlBase + '/' + stateId)
            .then(function (res) { return res.json(); })
            .then(function (cities) {
                cities.forEach(function (city) {
                    var opt = document.createElement('option');
                    opt.value = city.id;
                    opt.textContent = city.name;
                    if (String(city.id) === String(selectedCityId)) {
                        opt.selected = true;
                    }
                    citySelect.appendChild(opt);
                });
            });
    });
});
</script>