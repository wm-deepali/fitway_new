@include('admin.top-header')

@php
    // Shared with the controller via config/admin_permissions.php
    $permissionGroups = config('admin_permissions.groups');

    // Same view is used for Create and Edit
    $isEdit = isset($employee);
    $oldPerms = old('permissions', $isEdit ? ($employee->permissions ?? []) : []);
@endphp

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
                        <a href="{{ route('admin.admin-role-setting.index') }}">
                            Admin Roles &amp; Permissions
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        {{ $isEdit ? 'Edit' : 'Create New' }}
                    </li>

                </ol>
            </div>

        </div>

        <div class="content-wrapper pb-4">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                action="{{ $isEdit ? route('admin.admin-role-setting.update', $employee->id) : route('admin.admin-role-setting.store') }}"
                method="POST" enctype="multipart/form-data" id="employeeForm">

                @csrf
                @if($isEdit)
                    @method('PUT')
                @endif

                {{-- Employee Details --}}
                <div class="card wm-card mb-4">

                    <div class="card-header wm-card-header">
                        <h4 class="mb-0 wm-card-title">Employee Details</h4>
                    </div>

                    <div class="card-body wm-form-body">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group wm-form-group">
                                    <label class="wm-label">Employee Name</label>
                                    <input type="text" name="employee_name" id="employee_name"
                                        class="form-control wm-input"
                                        value="{{ old('employee_name', $employee->name ?? '') }}" required>
                                </div>

                                <div class="form-group wm-form-group">
                                    <label class="wm-label">Email Id</label>
                                    <input type="email" name="email" id="email" class="form-control wm-input"
                                        value="{{ old('email', $employee->email ?? '') }}" required>
                                </div>

                                <div class="form-group wm-form-group">
                                    <label class="wm-label">Mobile Number</label>
                                    <input type="text" name="mobile_number" id="mobile_number"
                                        class="form-control wm-input" maxlength="15"
                                        value="{{ old('mobile_number', $employee->contact ?? '') }}" required>
                                </div>

                                <div class="form-group wm-form-group mb-0">
                                    <label class="wm-label">WhatsApp Number</label>
                                    <input type="text" name="whatsapp_number" id="whatsapp_number"
                                        class="form-control wm-input" maxlength="15"
                                        value="{{ old('whatsapp_number', $employee->whatsapp_number ?? '') }}">
                                    <small class="text-muted wm-hint">Mobile Number daalte hi yahan khud aa jaayega —
                                        chahen to alag se edit kar sakte hain.</small>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group wm-form-group">
                                    <label class="wm-label">Address</label>
                                    <textarea name="address" id="address" rows="4"
                                        class="form-control wm-input">{{ old('address', $employee->address ?? '') }}</textarea>
                                </div>

                                <div class="form-group wm-form-group mb-0">
                                    <label class="wm-label">Photograph</label>

                                    <div class="d-flex align-items-center wm-photo-row">

                                        <div class="wm-photo-preview" id="photoPreview">
                                            @if($isEdit && $employee->image)
                                                <img src="{{ asset('storage/' . $employee->image) }}" alt="Photo">
                                            @else
                                                <i class="fa-solid fa-user"></i>
                                            @endif
                                        </div>

                                        <div class="flex-grow-1">
                                            <input type="file" name="photograph" id="photograph"
                                                class="form-control wm-input" accept="image/*">
                                            <small class="text-muted wm-hint">JPG or PNG, up to 2MB.</small>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <hr class="wm-divider">

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group wm-form-group mb-0">
                                    <label class="wm-label">Password</label>
                                    <div class="wm-password-group">
                                        <input type="password" name="password" id="password"
                                            class="form-control wm-input" autocomplete="new-password" {{ $isEdit ? '' : 'required' }}>
                                        <button type="button" class="wm-password-toggle" data-target="#password"
                                            tabindex="-1">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    </div>
                                    <small class="text-muted wm-hint" id="passwordHint">
                                        Minimum 8 characters.
                                        @if($isEdit) Leave blank to keep the current password. @endif
                                    </small>
                                    <small class="wm-error d-none" id="passwordError">
                                        Password must be at least 8 characters long.
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group wm-form-group mb-0">
                                    <label class="wm-label">Confirm Password</label>
                                    <div class="wm-password-group">
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control wm-input" autocomplete="new-password" {{ $isEdit ? '' : 'required' }}>
                                        <button type="button" class="wm-password-toggle"
                                            data-target="#password_confirmation" tabindex="-1">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    </div>
                                    <small class="wm-error d-none" id="confirmError">Passwords do not match.</small>
                                </div>
                            </div>

                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group wm-form-group mb-0">
                                    <label class="wm-label">Status</label>
                                    <select name="status" id="status" class="form-control wm-input">
                                        <option value="1" {{ (string) old('status', $employee->status ?? 1) === '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ (string) old('status', $employee->status ?? 1) === '0' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                {{-- Modules & Permissions --}}
                <div class="card wm-card mb-4">

                    <div class="card-header wm-card-header d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 wm-card-title">Modules &amp; Permissions</h4>

                        <div class="form-check wm-select-all-master">
                            <input type="checkbox" class="form-check-input" id="selectAllMaster">
                            <label class="form-check-label wm-label mb-0" for="selectAllMaster">Select All
                                Modules</label>
                        </div>
                    </div>

                    <div class="card-body wm-form-body">

                        {{-- Dashboard — single access checkbox, no CRUD matrix --}}
                        <div class="wm-permission-module">

                            <div class="wm-permission-module-header">
                                <span><i class="fa-solid fa-gauge"></i> Dashboard</span>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered mb-0 wm-permission-table">
                                    <tbody>
                                        <tr>
                                            <td>Dashboard</td>
                                            <td width="90" class="text-center">
                                                <input type="hidden" name="permissions[dashboard][view]" value="1">
                                                <input type="checkbox" checked disabled>
                                                <label class="mb-0 small">View (Default)</label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        @foreach($permissionGroups as $group)

                            <div class="wm-permission-module">

                                <div class="wm-permission-module-header">
                                    <span><i class="fa-solid {{ $group['icon'] }}"></i> {{ $group['label'] }}</span>

                                    <div class="form-check wm-select-all-module">
                                        <input type="checkbox" class="form-check-input wm-module-select-all"
                                            id="selectAll_{{ $group['key'] }}" data-module="{{ $group['key'] }}">
                                        <label class="form-check-label small mb-0"
                                            for="selectAll_{{ $group['key'] }}">Select All</label>
                                    </div>
                                </div>

                                <div class="table-responsive">

                                    <table class="table table-bordered mb-0 wm-permission-table">

                                        <thead>
                                            <tr>
                                                <th>Page</th>
                                                <th width="90" class="text-center">View</th>
                                                <th width="90" class="text-center">Add</th>
                                                <th width="90" class="text-center">Edit</th>
                                                <th width="90" class="text-center">Delete</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach($group['items'] as $item)
                                                <tr>
                                                    <td>{{ $item['label'] }}</td>

                                                    @foreach(['view', 'add', 'edit', 'delete'] as $action)
                                                        <td class="text-center">
                                                            <input type="checkbox"
                                                                class="wm-perm-checkbox wm-perm-{{ $group['key'] }}"
                                                                name="permissions[{{ $group['key'] }}][{{ $item['key'] }}][{{ $action }}]"
                                                                value="1" {{ data_get($oldPerms, $group['key'] . '.' . $item['key'] . '.' . $action) ? 'checked' : '' }}>
                                                        </td>
                                                    @endforeach

                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

                <div class="card wm-card">
                    <div class="card-footer wm-card-footer text-right">

                        <a href="{{ route('admin.admin-role-setting.index') }}" class="btn wm-btn-cancel">Cancel</a>

                        <button type="submit" class="btn wm-btn-primary">
                            <i class="fa-solid fa-floppy-disk"></i> {{ $isEdit ? 'Update Employee' : 'Save Employee' }}
                        </button>

                    </div>
                </div>

            </form>

        </div>

    </div>

</div>

@include('admin.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function () {

        // ---------- WhatsApp Number auto-fill from Mobile Number ----------
        // Keeps syncing until the person manually edits the WhatsApp field themselves.
        var whatsappManuallyEdited = false;

        // Edit mode / validation-error reload: don't overwrite an existing WhatsApp number
        if ($('#whatsapp_number').val() !== '') {
            whatsappManuallyEdited = true;
        }

        $('#mobile_number').on('input', function () {
            if (!whatsappManuallyEdited) {
                $('#whatsapp_number').val($(this).val());
            }
        });

        $('#whatsapp_number').on('input', function () {
            whatsappManuallyEdited = true;
        });

        // ---------- Password show/hide toggle ----------
        $('.wm-password-toggle').on('click', function () {

            var $input = $($(this).data('target'));
            var $icon = $(this).find('i');

            if ($input.attr('type') === 'password') {
                $input.attr('type', 'text');
                $icon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                $input.attr('type', 'password');
                $icon.removeClass('fa-eye-slash').addClass('fa-eye');
            }

        });

        // ---------- Photograph live preview ----------
        $('#photograph').on('change', function () {

            var file = this.files && this.files[0];
            var $preview = $('#photoPreview');

            if (!file) {
                return;
            }

            var reader = new FileReader();

            reader.onload = function (e) {
                $preview.html('<img src="' + e.target.result + '" alt="Preview">');
            };

            reader.readAsDataURL(file);

        });

        // ---------- Permissions: master "Select All Modules" ----------
        $('#selectAllMaster').on('change', function () {

            var checked = $(this).is(':checked');

            $('.wm-perm-checkbox, .wm-module-select-all').prop('checked', checked);

        });

        // ---------- Permissions: per-module "Select All" ----------
        $('.wm-module-select-all').on('change', function () {

            var module = $(this).data('module');
            var checked = $(this).is(':checked');

            $('.wm-perm-' + module).prop('checked', checked);

            syncMasterCheckbox();

        });

        // If every checkbox in a module gets ticked/unticked by hand, keep that
        // module's own "Select All" checkbox in sync.
        $(document).on('change', '.wm-perm-checkbox', function () {

            var $row = $(this).closest('.wm-permission-module');
            var $all = $row.find('.wm-perm-checkbox');
            var $checked = $row.find('.wm-perm-checkbox:checked');

            $row.find('.wm-module-select-all').prop('checked', $all.length === $checked.length);

            syncMasterCheckbox();

        });

        // Master checkbox is ticked only when every permission checkbox is ticked
        function syncMasterCheckbox() {

            var $all = $('.wm-perm-checkbox');

            $('#selectAllMaster').prop('checked', $all.length > 0 && $all.length === $all.filter(':checked').length);

        }

        // ---------- Initial state (edit mode / reload after validation error) ----------
        $('.wm-permission-module').each(function () {

            var $all = $(this).find('.wm-perm-checkbox');

            if ($all.length) {
                $(this).find('.wm-module-select-all')
                    .prop('checked', $all.length === $all.filter(':checked').length);
            }

        });

        syncMasterCheckbox();

        // ---------- Password live validation ----------
        function validatePassword() {
            var val = $('#password').val();
            var invalid = val.length > 0 && val.length < 8;
            $('#password').toggleClass('is-invalid', invalid);
            $('#passwordError').toggleClass('d-none', !invalid);
            return !invalid;
        }

        function validateConfirm() {
            var p = $('#password').val();
            var c = $('#password_confirmation').val();
            var invalid = c.length > 0 && p !== c;
            $('#password_confirmation').toggleClass('is-invalid', invalid);
            $('#confirmError').toggleClass('d-none', !invalid);
            return !invalid;
        }

        $('#password').on('input', function () { validatePassword(); validateConfirm(); });
        $('#password_confirmation').on('input', validateConfirm);

        $('#employeeForm').on('submit', function (e) {
            if (!validatePassword() || !validateConfirm()) {
                e.preventDefault();
                $('html, body').animate({ scrollTop: $('#password').offset().top - 120 }, 200);
                $('#password').focus();
            }
        });

    });
</script>

<style>
    :root {
        --wm-primary: #303d89;
        --wm-primary-hover: #252f70;
        --wm-primary-light: #eef0fa;
        --wm-border: #e3e5e8;
        --wm-text: #202223;
        --wm-muted: #6d7175;
        --wm-radius: 12px;
        --wm-danger: #b3261e;
        --wm-danger-light: #fbeceb;
    }

    .wm-card {
        border: 1px solid var(--wm-border);
        border-radius: var(--wm-radius);
        box-shadow: 0 1px 3px rgba(0, 0, 0, .08), 0 0 0 1px var(--wm-border);
        overflow: hidden;
    }

    .wm-card-header {
        background: #ffffff;
        border-bottom: 1px solid var(--wm-border);
        padding: 1rem 1.25rem;
    }

    .wm-card-title {
        font-weight: 650;
        color: var(--wm-text);
        letter-spacing: 0.2px;
    }

    .wm-card-footer {
        background: #fafafb;
        border-top: 1px solid var(--wm-border);
        padding: 0.85rem 1.25rem;
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

    .wm-input {
        border: 1px solid var(--wm-border) !important;
        border-radius: 8px !important;
        padding: 0.55rem 0.8rem !important;
        font-size: 0.9rem;
        color: var(--wm-text);
        background-color: #fbfbfc;
    }

    .wm-input:focus {
        border-color: var(--wm-primary) !important;
        box-shadow: 0 0 0 3px rgba(48, 61, 137, 0.12) !important;
        background-color: #ffffff;
        outline: none;
    }

    .wm-hint {
        color: var(--wm-muted) !important;
        font-size: 0.78rem;
        display: block;
        margin-top: 4px;
    }

    .wm-divider {
        border-top: 1px solid var(--wm-border);
        opacity: 1;
    }

    .wm-btn-primary,
    .wm-btn-cancel {
        border-radius: 8px !important;
        font-weight: 600 !important;
        font-size: 0.85rem !important;
        padding: 0.55rem 1.1rem !important;
        border: 1px solid transparent !important;
        transition: all 0.15s ease;
    }

    .wm-btn-primary {
        background-color: var(--wm-primary) !important;
        border-color: var(--wm-primary) !important;
        color: #ffffff !important;
    }

    .wm-btn-primary:hover {
        background-color: var(--wm-primary-hover) !important;
        border-color: var(--wm-primary-hover) !important;
        color: #ffffff !important;
    }

    .wm-btn-cancel {
        background-color: #fff !important;
        border-color: var(--wm-border) !important;
        color: var(--wm-muted) !important;
        margin-right: 8px;
    }

    /* Password field with eye toggle */
    .wm-password-group {
        position: relative;
    }

    .wm-password-group .wm-input {
        padding-right: 42px !important;
    }

    .wm-password-toggle {
        position: absolute;
        top: 0;
        right: 0;
        height: 100%;
        width: 40px;
        border: none;
        background: transparent;
        color: var(--wm-muted);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .wm-password-toggle:hover {
        color: var(--wm-primary);
    }

    /* Photograph preview */
    .wm-photo-row {
        gap: 14px;
    }

    .wm-photo-preview {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        border: 1px solid var(--wm-border);
        background-color: #f1f2f4;
        color: var(--wm-muted);
        font-size: 1.4rem;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        flex-shrink: 0;
    }

    .wm-photo-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Permissions */
    .wm-select-all-master,
    .wm-select-all-module {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .wm-select-all-master .form-check-input,
    .wm-select-all-module .form-check-input {
        position: static;
        margin: 0;
        width: 15px;
        height: 15px;
    }

    .wm-permission-module {
        border: 1px solid var(--wm-border);
        border-radius: 10px;
        margin-bottom: 1rem;
        overflow: hidden;
    }

    .wm-permission-module:last-child {
        margin-bottom: 0;
    }

    .wm-permission-module-header {
        background: var(--wm-primary-light);
        color: var(--wm-primary);
        font-weight: 700;
        font-size: 0.88rem;
        padding: 0.65rem 1rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
    }

    .wm-permission-table {
        margin-bottom: 0;
    }

    .wm-permission-table thead tr th {
        background-color: #fafafb;
        color: var(--wm-muted);
        font-weight: 700;
        font-size: 0.72rem;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        border-color: var(--wm-border);
        padding: 0.55rem 0.7rem;
    }

    .wm-permission-table tbody tr td {
        padding: 0.55rem 0.7rem;
        vertical-align: middle;
        color: var(--wm-text);
        font-size: 0.85rem;
        border-color: var(--wm-border);
    }

    .wm-permission-table input[type="checkbox"] {
        width: 16px;
        height: 16px;
    }

    @media (max-width: 576px) {
        .wm-form-body {
            padding: 1.1rem 1rem;
        }
    }

    .wm-error {
        color: var(--wm-danger);
        font-size: 0.78rem;
        display: block;
        margin-top: 4px;
    }

    .wm-input.is-invalid {
        border-color: var(--wm-danger) !important;
    }
</style>