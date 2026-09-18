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

                    <li class="breadcrumb-item active">
                        Quote Settings
                    </li>

                </ol>
            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card wm-quotes-card">

                <div class="card-header wm-quotes-header">
                    <h4 class="mb-0 wm-quotes-title">
                        Manage Quote Settings
                    </h4>
                </div>

                <form action="{{ route('admin.quote-settings.store') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="card-body wm-form-body">

                        <ul class="nav nav-tabs mb-3 wm-nav-tabs"
                            id="quoteSettingsTab"
                            role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active wm-nav-link"
                                    id="company-tab"
                                    data-toggle="tab"
                                    href="#company-info"
                                    role="tab">
                                    <i class="fa fa-building"></i> Company Info
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link wm-nav-link"
                                    id="proposal-tab"
                                    data-toggle="tab"
                                    href="#proposal-settings"
                                    role="tab">
                                    <i class="fa fa-hashtag"></i> Proposal Settings
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link wm-nav-link"
                                    id="terms-tab"
                                    data-toggle="tab"
                                    href="#terms-conditions"
                                    role="tab">
                                    <i class="fa fa-file-text-o"></i> Terms & Conditions
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link wm-nav-link"
                                    id="bank-tab"
                                    data-toggle="tab"
                                    href="#bank-detail"
                                    role="tab">
                                    <i class="fa fa-university"></i> Bank Detail
                                </a>
                            </li>

                        </ul>

                        <div class="tab-content wm-tab-content" id="quoteSettingsTabContent">

                            {{-- Tab 1: Company Info --}}
                            <div class="tab-pane fade show active"
                                id="company-info"
                                role="tabpanel">

                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="form-group wm-form-group">

                                            <label class="wm-label">
                                                Company Logo
                                            </label>

                                            <input type="file"
                                                name="company_logo"
                                                class="form-control wm-input wm-file-input">

                                            @if(!empty($quoteSetting?->company_logo))

                                                <div class="mt-2 wm-thumb-wrap">

                                                    <img src="{{ asset('storage/' . $quoteSetting->company_logo) }}"
                                                        width="180"
                                                        class="img-thumbnail wm-thumb">

                                                </div>

                                            @endif

                                        </div>

                                    </div>

                                  

                                    <div class="col-md-6">

                                        <div class="form-group wm-form-group">

                                            <label class="wm-label">
                                                Company Name
                                            </label>

                                            <input type="text"
                                                name="company_name"
                                                class="form-control"
                                                value="{{ old('company_name', $quoteSetting?->company_name) }}">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group wm-form-group">

                                            <label class="wm-label">
                                                Tagline
                                            </label>

                                            <input type="text"
                                                name="tagline"
                                                class="form-control"
                                                placeholder="e.g. Your trusted partner since 1990"
                                                value="{{ old('tagline', $quoteSetting?->tagline) }}">

                                        </div>

                                    </div>

                                    <div class="col-md-12">

                                        <div class="form-group wm-form-group">

                                            <label class="wm-label">
                                                Company Introduction
                                            </label>

                                            <textarea name="company_introduction"
                                                rows="5"
                                                class="form-control ckeditor wm-input">{{ old('company_introduction', $quoteSetting?->company_introduction) }}</textarea>

                                            <small class="text-muted wm-hint">
                                                Ye proposal PDF ke first page (letterhead) pe show hoga.
                                            </small>

                                        </div>

                                    </div>

                                    <div class="col-md-12">

                                        <div class="form-group wm-form-group">

                                            <label class="wm-label">
                                                Address
                                            </label>

                                            <textarea name="address"
                                                rows="3"
                                                class="form-control wm-input">{{ old('address', $quoteSetting?->address) }}</textarea>

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group wm-form-group">

                                            <label class="wm-label">
                                                State
                                            </label>

                                            <select name="state_id"
                                                id="state_id"
                                                class="form-control wm-input">

                                                <option value="">Select State</option>

                                                @foreach($states as $state)

                                                    <option value="{{ $state->id }}"
                                                        {{ old('state_id', $quoteSetting?->state_id) == $state->id ? 'selected' : '' }}>
                                                        {{ $state->name }}
                                                    </option>

                                                @endforeach

                                            </select>

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group wm-form-group">

                                            <label class="wm-label">
                                                City
                                            </label>

                                            <select name="city_id"
                                                id="city_id"
                                                class="form-control wm-input">

                                                <option value="">Select City</option>

                                                @foreach($cities as $city)

                                                    <option value="{{ $city->id }}"
                                                        {{ old('city_id', $quoteSetting?->city_id) == $city->id ? 'selected' : '' }}>
                                                        {{ $city->name }}
                                                    </option>

                                                @endforeach

                                            </select>

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group wm-form-group">

                                            <label class="wm-label">
                                                Pin Code
                                            </label>

                                            <input type="text"
                                                name="pincode"
                                                class="form-control wm-input"
                                                value="{{ old('pincode', $quoteSetting?->pincode) }}">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group wm-form-group">

                                            <label class="wm-label">
                                                Email
                                            </label>

                                            <input type="email"
                                                name="email"
                                                class="form-control wm-input"
                                                value="{{ old('email', $quoteSetting?->email) }}">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group wm-form-group">

                                            <label class="wm-label">
                                                Phone Number
                                            </label>

                                            <input type="text"
                                                name="phone"
                                                class="form-control wm-input"
                                                value="{{ old('phone', $quoteSetting?->phone) }}">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group wm-form-group">

                                            <label class="wm-label">
                                                Website
                                            </label>

                                            <input type="text"
                                                name="website"
                                                class="form-control wm-input"
                                                value="{{ old('website', $quoteSetting?->website) }}">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group wm-form-group">

                                            <label class="wm-label">
                                                GSTIN
                                            </label>

                                            <input type="text"
                                                name="gst_number"
                                                class="form-control wm-input"
                                                value="{{ old('gst_number', $quoteSetting?->gst_number) }}">

                                        </div>

                                    </div>

                                </div>

                            </div>

                            {{-- Tab 2: Proposal Settings --}}
                            <div class="tab-pane fade"
                                id="proposal-settings"
                                role="tabpanel">

                                <div class="row">

                                    <div class="col-md-4">

                                        <div class="form-group wm-form-group">

                                            <label class="wm-label">
                                                Proposal ID Prefix
                                            </label>

                                            <input type="text"
                                                name="id_prefix"
                                                class="form-control wm-input"
                                                value="{{ old('id_prefix', $quoteSetting?->id_prefix ?? 'B2B') }}">

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group wm-form-group">

                                            <label class="wm-label">
                                                Number Padding Length
                                            </label>

                                            <input type="number"
                                                name="id_padding_length"
                                                min="1"
                                                max="10"
                                                class="form-control wm-input"
                                                value="{{ old('id_padding_length', $quoteSetting?->id_padding_length ?? 5) }}">

                                            <small class="text-muted wm-hint">
                                                e.g. 5 digits → 00001
                                            </small>

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group wm-form-group">

                                            <label class="wm-label">
                                                Current Serial (Next ID Preview)
                                            </label>

                                            <input type="text"
                                                class="form-control wm-input wm-input-readonly"
                                                value="{{ ($quoteSetting?->id_prefix ?? 'B2B') . str_pad((($quoteSetting?->current_serial ?? 0) + 1), $quoteSetting?->id_padding_length ?? 5, '0', STR_PAD_LEFT) }}"
                                                readonly
                                                disabled>

                                            <small class="text-muted wm-hint">
                                                Read-only, auto-generated on next proposal.
                                            </small>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            {{-- Tab 3: Terms & Conditions --}}
                            <div class="tab-pane fade"
                                id="terms-conditions"
                                role="tabpanel">

                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="form-group wm-form-group">

                                            <label class="wm-label">
                                                Terms & Conditions
                                            </label>

                                            <textarea name="terms_conditions"
                                                rows="8"
                                                class="form-control ckeditor wm-input">{{ old('terms_conditions', $quoteSetting?->terms_conditions) }}</textarea>

                                            <small class="text-muted wm-hint">
                                                Ye proposal PDF ke last page pe show hoga.
                                            </small>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            {{-- Tab 4: Bank Detail --}}
                            <div class="tab-pane fade"
                                id="bank-detail"
                                role="tabpanel">

                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="form-group wm-form-group">

                                            <label class="wm-label">
                                                Bank Name
                                            </label>

                                            <input type="text"
                                                name="bank_name"
                                                class="form-control wm-input"
                                                value="{{ old('bank_name', $quoteSetting?->bank_name) }}">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group wm-form-group">

                                            <label class="wm-label">
                                                Account Name
                                            </label>

                                            <input type="text"
                                                name="account_name"
                                                class="form-control wm-input"
                                                value="{{ old('account_name', $quoteSetting?->account_name) }}">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group wm-form-group">

                                            <label class="wm-label">
                                                Account Number
                                            </label>

                                            <input type="text"
                                                name="account_number"
                                                class="form-control wm-input"
                                                value="{{ old('account_number', $quoteSetting?->account_number) }}">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group wm-form-group">

                                            <label class="wm-label">
                                                IFSC Code
                                            </label>

                                            <input type="text"
                                                name="ifsc_code"
                                                class="form-control wm-input"
                                                style="text-transform: uppercase;"
                                                value="{{ old('ifsc_code', $quoteSetting?->ifsc_code) }}">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group wm-form-group">

                                            <label class="wm-label">
                                                UPI ID
                                            </label>

                                            <input type="text"
                                                name="upi_id"
                                                class="form-control wm-input"
                                                placeholder="example@upi"
                                                value="{{ old('upi_id', $quoteSetting?->upi_id) }}">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group wm-form-group">

                                            <label class="wm-label">
                                                QR Code
                                            </label>

                                            <input type="file"
                                                name="qr_code"
                                                accept="image/*"
                                                class="form-control wm-input wm-file-input">

                                            @if(!empty($quoteSetting?->qr_code))

                                                <div class="mt-2 wm-thumb-wrap">

                                                    <img src="{{ asset('storage/' . $quoteSetting->qr_code) }}"
                                                        width="150"
                                                        class="img-thumbnail wm-thumb">

                                                </div>

                                            @endif

                                        </div>

                                    </div>

                                </div>

                            </div>
                            
                        </div>

                    </div>

                    <div class="card-footer wm-quotes-footer">

                        <button type="submit"
                            class="btn btn-primary wm-btn-primary">

                            <i class="fa fa-save"></i>
                            Save Quote Settings

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>
@include('admin.footer')

<script>
    if (typeof CKEDITOR !== 'undefined') {
        CKEDITOR.config.versionCheck = false;
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function () {

            $('#state_id').on('change', function () {

                var stateId = $(this).val();
                var $city = $('#city_id');

                $city.html('<option value="">Select City</option>');

                if (!stateId) {
                    return;
                }

                $.get('{{ route('admin.quote-settings.get-cities', ':state_id') }}'.replace(':state_id', stateId), function (cities) {

                    $.each(cities, function (i, city) {
                        $city.append('<option value="' + city.id + '">' + city.name + '</option>');
                    });

                });

            });
        });
    </script>

{{-- ==========================================================
     Scoped UI styling for Quote Settings page — re-themed to
     match the Product create page's indigo design system. Zero
     edits to any id, existing class, data-toggle attribute, the
     "ckeditor" class (CKEditor auto-inits on this class
     elsewhere), form action/enctype, @csrf, old() bindings, or
     either <script> block above (state→city AJAX + CKEditor
     config) — copied verbatim. Only additive classes + CSS.
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
    }

    .wm-quotes-title {
        font-weight: 650;
        color: var(--wm-text);
    }

    .wm-form-body {
        padding: 1.5rem 1.25rem;
    }

    .wm-form-group {
        margin-bottom: 1.1rem;
    }

    .wm-label {
        font-size: 0.78rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        color: var(--wm-muted);
        margin-bottom: 6px;
        display: block;
    }

    .wm-hint {
        color: var(--wm-muted) !important;
        font-size: 0.78rem;
    }

    /* Inputs, selects, textareas (CKEditor-bound textareas get replaced by
       the editor's own iframe/toolbar at runtime — this only styles the
       raw textarea before/if CKEditor hasn't attached) */
    .wm-input {
        border: 1px solid var(--wm-border) !important;
        border-radius: 8px !important;
        padding: 0.55rem 0.8rem !important;
        font-size: 0.9rem;
        color: var(--wm-text);
        background-color: #fbfbfc;
        transition: border-color 0.15s ease, box-shadow 0.15s ease, background-color 0.15s ease;
    }

    .wm-input:focus {
        border-color: var(--wm-primary) !important;
        box-shadow: 0 0 0 3px rgba(48, 61, 137, 0.12) !important;
        background-color: #ffffff;
        outline: none;
    }

    .wm-input:disabled,
    .wm-input-readonly {
        background-color: #f1f2f4 !important;
        color: var(--wm-muted);
        font-weight: 600;
    }

    .wm-file-input {
        padding: 0.45rem 0.8rem !important;
        cursor: pointer;
    }

    .wm-thumb-wrap {
        padding: 8px;
        border: 1px solid var(--wm-border);
        border-radius: 8px;
        display: inline-block;
        background: #fbfbfc;
    }

    .wm-thumb {
        border-radius: 6px;
        border: none !important;
    }

    /* Tabs */
    .wm-nav-tabs {
        border-bottom: 1px solid var(--wm-border);
        gap: 4px;
    }

    .wm-nav-link {
        border: none !important;
        border-radius: 8px 8px 0 0 !important;
        color: var(--wm-muted) !important;
        font-weight: 600;
        font-size: 0.88rem;
        padding: 0.6rem 1.1rem !important;
        transition: all 0.15s ease;
    }

    .wm-nav-link i {
        margin-right: 5px;
        opacity: 0.8;
    }

    .wm-nav-link:hover {
        background-color: var(--wm-primary-light) !important;
        color: var(--wm-primary) !important;
    }

    .wm-nav-link.active {
        background-color: var(--wm-primary) !important;
        color: #ffffff !important;
    }

    .wm-nav-link.active i {
        opacity: 1;
    }

    .wm-tab-content {
        padding-top: 0.5rem;
    }

    /* Footer / submit button */
    .wm-quotes-footer {
        background: #fafafb;
        border-top: 1px solid var(--wm-border);
        padding: 0.85rem 1.25rem;
    }

    .wm-btn-primary {
        background-color: var(--wm-primary) !important;
        border-color: var(--wm-primary) !important;
        color: #ffffff !important;
        border-radius: 8px !important;
        font-weight: 600 !important;
        padding: 0.55rem 1.2rem !important;
        transition: all 0.15s ease;
    }

    .wm-btn-primary:hover {
        background-color: var(--wm-primary-hover) !important;
        border-color: var(--wm-primary-hover) !important;
    }

    /* Responsive */
    @media (max-width: 576px) {
        .wm-form-body {
            padding: 1.1rem 1rem;
        }

        .wm-nav-tabs {
            flex-wrap: nowrap;
            overflow-x: auto;
        }

        .wm-nav-link {
            white-space: nowrap;
        }
    }
</style>