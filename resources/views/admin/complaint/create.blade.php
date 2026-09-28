@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.complaint.complaints.index') }}">Manage
                            Complaints</a></li>
                    <li class="breadcrumb-item active">Raise a Complaint</li>
                </ol>
            </div>
        </div>

        <div class="content-wrapper pb-4">

            <form action="{{ route('admin.complaint.complaints.store') }}" method="POST" id="complaintForm"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="customer_id" id="customer_id">

                {{-- Customer Search --}}
                <div class="card wm-quotes-card mb-4">

                    <div class="card-header wm-quotes-header">
                        <h4 class="mb-0 wm-quotes-title">Search Customer</h4>
                    </div>

                    <div class="card-body wm-form-body">

                        <div class="row">

                            <div class="col-md-6 position-relative">
                                <div class="form-group mb-0 wm-form-group">
                                    <label class="wm-label">Search by Name, Mobile Number or Complaint ID</label>
                                    <div class="input-group wm-search-group">
                                        <input type="text" id="customerSearchTerm" class="form-control wm-input"
                                            placeholder="Enter name, mobile number or complaint ID" autocomplete="off">
                                        <div class="input-group-append">
                                            <button type="button" id="searchCustomerBtn"
                                                class="btn btn-primary wm-btn-primary">
                                                <i class="fa fa-search"></i> Search
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div id="customerSearchResults"
                                    class="list-group position-absolute w-100 wm-search-dropdown"
                                    style="z-index:999; max-height:250px; overflow-y:auto;"></div>
                            </div>

                            <div class="col-md-6 d-flex align-items-end">
                                <small id="customerSearchStatus" class="text-muted wm-search-status"></small>
                            </div>

                        </div>

                    </div>

                </div>

                {{-- Customer Info --}}
                <div class="card wm-quotes-card mb-4">

                    <div class="card-header wm-quotes-header">
                        <h4 class="mb-0 wm-quotes-title">Customer Info</h4>
                    </div>

                    <div class="card-body wm-form-body">

                        <div class="row">

                            <div class="col-lg-8">

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group wm-form-group">
                                            <label class="wm-label">Customer Name</label>
                                            <input type="text" name="customer_name" id="customer_name"
                                                class="form-control wm-input" placeholder="Enter customer name">
                                            @error('customer_name')
                                            <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                        </div>

                                        <div class="form-group wm-form-group mb-0">
                                            <label class="wm-label">Email Id</label>
                                            <input type="email" name="email" id="email" class="form-control wm-input"
                                                placeholder="Enter email id">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group wm-form-group">
                                            <label class="wm-label">Mobile Number</label>
                                            <input type="text" name="mobile_number" id="mobile_number"
                                                class="form-control wm-input" maxlength="15"
                                                placeholder="Enter mobile number">
                                            @error('mobile_number')
                                            <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                        </div>

                                        <div class="form-group wm-form-group mb-0">
                                            <label class="wm-label">Landmark</label>
                                            <input type="text" name="landmark" id="landmark"
                                                class="form-control wm-input" placeholder="Nearby landmark">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <div class="form-group wm-form-group">
                                            <label class="wm-label">Full Address</label>
                                            <textarea name="address" id="address" rows="2" class="form-control wm-input"
                                                placeholder="Enter full address"></textarea>
                                            @error('address')
                                            <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-2">

                                    <div class="col-md-4">
                                        <div class="form-group wm-form-group mb-0">
                                            <label class="wm-label">State</label>
                                            <select name="state_id" id="state_id" class="form-control wm-input">
                                                <option value="">Select State</option>
                                                @foreach($states as $state)
                                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('state_id')
                                            <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group wm-form-group mb-0">
                                            <label class="wm-label">City</label>
                                            <select name="city_id" id="city_id" class="form-control wm-input">
                                                <option value="">Select City</option>
                                            </select>
                                            @error('city_id')
                                            <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group wm-form-group mb-0">
                                            <label class="wm-label">Pin Code</label>
                                            <input type="text" name="pincode" id="pincode" class="form-control wm-input"
                                                maxlength="10" placeholder="Enter pin code">
                                            @error('pincode')
                                            <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-4">
                                <div class="wm-history-panel" id="customerHistoryPanel">
                                    <div class="wm-history-title"><i class="fa fa-clock-rotate-left"></i> Previous
                                        Complaint History</div>

                                    <div class="wm-history-empty" id="historyEmptyState">
                                        Search or select a customer above to view their past complaints.
                                    </div>

                                    <div id="historyList" style="display:none;"></div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                {{-- Complaint Detail --}}
                <div class="card wm-quotes-card mb-4">

                    <div class="card-header wm-quotes-header">
                        <h4 class="mb-0 wm-quotes-title">Complaint Detail</h4>
                    </div>

                    <div class="card-body wm-form-body">

                        <div class="form-group wm-form-group">
                            <label class="wm-label">Complaint Detail</label>
                            <textarea name="complaint_detail" id="complaint_detail" rows="3"
                                class="form-control wm-input"
                                placeholder="Describe the issue / complaint reported by the customer..."></textarea>
                            @error('complaint_detail')
                            <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group wm-form-group">
                            <label class="wm-label">Complaint Type</label>
                            <div class="wm-type-toggle">
                                <label class="wm-type-option wm-type-unpaid">
                                    <input type="radio" name="complaint_type" value="unpaid" id="type_unpaid" checked>
                                    <span class="wm-type-card">Unpaid</span>
                                </label>
                                <label class="wm-type-option wm-type-paid">
                                    <input type="radio" name="complaint_type" value="paid" id="type_paid">
                                    <span class="wm-type-card">Paid</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group wm-form-group" id="serviceDetailGroup">
                            <label class="wm-label">Service Detail</label>
                            <textarea name="service_detail" id="service_detail" rows="3" class="form-control wm-input"
                                placeholder="List the parts / service / material used for this complaint..."></textarea>
                        </div>

                        <div class="row" id="amountGroup" style="display:none;">
                            <div class="col-md-4">
                                <div class="form-group wm-form-group">
                                    <label class="wm-label">Amount</label>
                                    <input type="number" name="paid_price" id="paid_price" class="form-control wm-input"
                                        step="0.01" min="0" placeholder="₹ 0.00">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6 position-relative">
                                <div class="form-group wm-form-group mb-0">
                                    <label class="wm-label">Assigned To</label>
                                    <input type="text" name="assigned_to" id="assigned_to" class="form-control wm-input"
                                        placeholder="Enter engineer name" autocomplete="off">
                                </div>
                                <div id="engineerSearchResults"
                                    class="list-group position-absolute w-100 wm-search-dropdown"
                                    style="z-index:998; max-height:220px; overflow-y:auto;"></div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group wm-form-group mb-0">
                                    <label class="wm-label">Schedule Date</label>
                                    <input type="date" name="schedule_date" id="schedule_date"
                                        class="form-control wm-input">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                {{-- Complaint Images --}}
                <div class="card wm-quotes-card mb-4">

                    <div class="card-header wm-quotes-header">
                        <h4 class="mb-0 wm-quotes-title">Complaint Images</h4>
                    </div>

                    <div class="card-body wm-form-body">

                        <div class="form-group wm-form-group mb-0">
                            <label class="wm-label">Upload Images</label>
                            <input type="file" name="images[]" id="images" class="form-control wm-input"
                                style="height:auto; padding:8px;" accept="image/*" multiple>
                            <small class="text-muted d-block mt-1">Optional — you can select multiple images.</small>
                            @error('images.*')
                            <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div id="imagePreviewWrap" class="d-flex flex-wrap mt-3" style="gap: 10px;"></div>

                    </div>

                </div>

                <div class="card wm-quotes-card">
                    <div class="card-footer text-right wm-quotes-footer">
                        <a href="{{ route('admin.complaint.complaints.index') }}" class="btn wm-btn-cancel">Cancel</a>
                        <button type="submit" class="btn btn-primary wm-btn-primary">
                            <i class="fa fa-check"></i> Save Complaint
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

        const searchCustomersUrl = "{{ route('admin.complaint.complaints.searchCustomers') }}";
        const searchTechniciansUrl = "{{ route('admin.complaint.complaints.searchTechnicians') }}";
        const citiesByStateUrl = "{{ url('admin/complaint/cities-by-state') }}";
        const customerHistoryUrl = "{{ url('admin/complaint/customers') }}";

        function renderHistory(records) {
            const $list = $('#historyList');
            const $empty = $('#historyEmptyState');

            if (!records || records.length === 0) {
                $list.hide().empty();
                $empty.show().text('No previous complaints found for this customer.');
                return;
            }

            $empty.hide();
            $list.empty();
            records.forEach(r => {
                $list.append(
                    '<div class="wm-history-item">' +
                    '<div class="h-id">' + r.id + '</div>' +
                    '<div class="h-date">' + r.date + '</div>' +
                    '<div class="h-desc">' + r.desc + '</div>' +
                    '<span class="h-status ' + r.status + '">' + (r.status === 'resolved' ? 'Completed' : 'Open') + '</span>' +
                    '</div>'
                );
            });
            $list.show();
        }

        function loadHistory(customerId) {
            if (!customerId) {
                $('#historyList').hide().empty();
                $('#historyEmptyState').show().text('No previous complaints — this looks like a new customer.');
                return;
            }
            $.get(`${customerHistoryUrl}/${customerId}/history`, function (records) {
                renderHistory(records);
            });
        }

        function fillCustomerFields(c) {
            $('#customer_id').val(c.id);
            $('#customer_name').val(c.name);
            $('#mobile_number').val(c.mobile);
            $('#email').val(c.email);
            $('#address').val(c.address);
            $('#landmark').val(c.landmark);
            $('#pincode').val(c.pin);
            if (c.state_id) {
                $('#state_id').val(c.state_id);
                populateCities(c.state_id, c.city_id);
            }
            $('#customerSearchStatus').removeClass('text-danger').addClass('text-success').text('Existing customer found — details auto-filled.');
            loadHistory(c.id);
        }

        function clearCustomerFieldsForNew(term) {
            $('#customer_id').val('');
            if (/^[0-9+\-\s]+$/.test(term)) {
                $('#mobile_number').val(term);
                $('#customer_name').val('');
            } else {
                $('#customer_name').val(term);
                $('#mobile_number').val('');
            }
            $('#email, #address, #landmark, #pincode').val('');
            applyDefaultLocation();
            $('#customerSearchStatus').removeClass('text-success').addClass('text-danger').text('New customer — please fill in the details below.');
            loadHistory(null);
        }

        const $custSearch = $('#customerSearchTerm');
        const $custResults = $('#customerSearchResults');

        function renderCustomerSuggestions(matches) {
            $custResults.empty();
            if (!matches.length) {
                $custResults.html('<div class="list-group-item text-muted">No matching customer found.</div>');
                return;
            }
            matches.forEach(c => {
                $('<a href="javascript:void(0);" class="list-group-item list-group-item-action"></a>')
                    .text(c.name + ' — ' + (c.mobile || c.complaintId || ''))
                    .data('customer', c)
                    .appendTo($custResults);
            });
        }

        let custDebounce;
        $custSearch.on('keyup', function (e) {
            const term = $(this).val().trim();
            clearTimeout(custDebounce);

            if (e.which === 13) {
                e.preventDefault();
                $.get(searchCustomersUrl, { term }, function (matches) {
                    if (matches.length === 1) { fillCustomerFields(matches[0]); $custSearch.val(matches[0].name); }
                    else if (matches.length === 0 && term) { clearCustomerFieldsForNew(term); }
                    $custResults.empty();
                });
                return;
            }

            if (term.length < 2) { $custResults.empty(); return; }

            custDebounce = setTimeout(() => {
                $.get(searchCustomersUrl, { term }, function (matches) {
                    renderCustomerSuggestions(matches);
                });
            }, 300);
        });

        $('#searchCustomerBtn').on('click', function () {
            const term = $custSearch.val().trim();
            $.get(searchCustomersUrl, { term }, function (matches) {
                if (matches.length === 1) { fillCustomerFields(matches[0]); $custSearch.val(matches[0].name); }
                else if (matches.length === 0 && term) { clearCustomerFieldsForNew(term); }
                $custResults.empty();
            });
        });

        $(document).on('click', '#customerSearchResults a', function () {
            const c = $(this).data('customer');
            fillCustomerFields(c);
            $custSearch.val(c.name);
            $custResults.empty();
        });

        $('#state_id').on('change', function () { populateCities($(this).val()); });

        function populateCities(stateId, selectedCityId, selectedCityName) {
            const $city = $('#city_id');
            if (!stateId) { $city.html('<option value="">Select City</option>'); return; }
            $.get(`${citiesByStateUrl}/${stateId}`, function (cities) {
                $city.html('<option value="">Select City</option>' +
                    cities.map(c => {
                        const isSelected =
                            (selectedCityId && c.id == selectedCityId) ||
                            (selectedCityName && $.trim(c.name).toLowerCase() === selectedCityName);
                        return `<option value="${c.id}"${isSelected ? ' selected' : ''}>${c.name}</option>`;
                    }).join(''));
            });
        }

        // Default location for a new customer: Uttar Pradesh / Lucknow
        const DEFAULT_STATE_NAME = 'uttar pradesh';
        const DEFAULT_CITY_NAME = 'lucknow';

        function applyDefaultLocation() {
            const $opt = $('#state_id option').filter(function () {
                return $.trim($(this).text()).toLowerCase() === DEFAULT_STATE_NAME;
            }).first();

            if (!$opt.length) { return; }

            $('#state_id').val($opt.val());
            populateCities($opt.val(), null, DEFAULT_CITY_NAME);
        }

        function toggleAmount() {
            $('#amountGroup').toggle($('#type_paid').is(':checked'));
        }
        $('input[name="complaint_type"]').on('change', toggleAmount);
        toggleAmount();
        applyDefaultLocation();

        const $assignedTo = $('#assigned_to');
        const $engResults = $('#engineerSearchResults');

        let engDebounce;
        $assignedTo.on('keyup', function () {
            const term = $(this).val().trim();
            clearTimeout(engDebounce);
            if (term.length < 1) { $engResults.empty(); return; }

            engDebounce = setTimeout(() => {
                $.get(searchTechniciansUrl, { term }, function (matches) {
                    $engResults.empty();
                    if (!matches.length) { $engResults.html('<div class="list-group-item text-muted">No matching engineer found.</div>'); return; }
                    matches.forEach(e => {
                        $('<a href="javascript:void(0);" class="list-group-item list-group-item-action"></a>')
                            .text(e.name + ' — ' + e.pending + ' pending')
                            .data('engineer', e)
                            .appendTo($engResults);
                    });
                });
            }, 300);
        });

        $(document).on('click', '#engineerSearchResults a', function () {
            $assignedTo.val($(this).data('engineer').name);
            $engResults.empty();
        });

        $(document).on('click', function (e) {
            if (!$(e.target).closest('#customerSearchTerm, #customerSearchResults').length) { $custResults.empty(); }
            if (!$(e.target).closest('#assigned_to, #engineerSearchResults').length) { $engResults.empty(); }
        });

        // Multiple image preview
        $('#images').on('change', function (e) {
            const $wrap = $('#imagePreviewWrap');
            $wrap.empty();
            Array.from(e.target.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = ev => {
                    $wrap.append(`<img src="${ev.target.result}" style="width:70px;height:70px;object-fit:cover;border-radius:8px;border:1px solid var(--wm-border);">`);
                };
                reader.readAsDataURL(file);
            });
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
    }

    .wm-quotes-card {
        border: 1px solid var(--wm-border);
        border-radius: var(--wm-radius);
        box-shadow: 0 1px 3px rgba(0, 0, 0, .08), 0 0 0 1px var(--wm-border);
    }

    .wm-quotes-header {
        background: #ffffff;
        border-bottom: 1px solid var(--wm-border);
        padding: 1rem 1.25rem;
    }

    .wm-quotes-title {
        font-weight: 650;
        color: var(--wm-text);
        letter-spacing: 0.2px;
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

    textarea.wm-input {
        resize: vertical;
    }

    .wm-search-group {
        gap: 10px;
    }

    .wm-search-group .wm-input {
        border-radius: 8px !important;
    }

    .wm-search-group .input-group-append {
        margin-left: 0 !important;
    }

    .wm-search-status {
        font-size: 0.85rem;
        font-weight: 600;
    }

    .wm-btn-primary,
    .wm-btn-cancel {
        border-radius: 8px !important;
        font-weight: 600 !important;
        font-size: 0.85rem !important;
        padding: 0.5rem 1rem !important;
        border: 1px solid transparent !important;
    }

    .wm-btn-primary {
        background-color: var(--wm-primary) !important;
        border-color: var(--wm-primary) !important;
        color: #ffffff !important;
    }

    .wm-btn-primary:hover {
        background-color: var(--wm-primary-hover) !important;
        border-color: var(--wm-primary-hover) !important;
    }

    .wm-btn-cancel {
        background-color: #fff !important;
        border-color: var(--wm-border) !important;
        color: var(--wm-muted) !important;
    }

    .wm-quotes-footer {
        background: #fafafb;
        border-top: 1px solid var(--wm-border);
        padding: 0.85rem 1.25rem;
    }

    .wm-search-dropdown {
        top: 100%;
        left: 0;
        border: 1px solid var(--wm-border);
        border-radius: 8px;
        box-shadow: 0 6px 18px rgba(32, 34, 35, 0.1);
        margin-top: 4px;
        overflow: visible;
        background: #fff;
    }

    .wm-search-dropdown:empty {
        display: none;
    }

    .wm-search-dropdown .list-group-item {
        border: none;
        border-bottom: 1px solid var(--wm-border);
        font-size: 0.88rem;
        line-height: 1.5;
        padding: 0.65rem 0.9rem;
        color: var(--wm-text);
        white-space: normal;
    }

    .wm-search-dropdown .list-group-item:first-child {
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .wm-search-dropdown .list-group-item:last-child {
        border-bottom: none;
        border-bottom-left-radius: 8px;
        border-bottom-right-radius: 8px;
    }

    .wm-search-dropdown .list-group-item-action:hover {
        background-color: var(--wm-primary-light);
        color: var(--wm-primary);
    }

    .wm-type-toggle {
        display: flex;
        gap: 10px;
        width: 100%;
    }

    .wm-type-option {
        flex: 1 1 50%;
        position: relative;
        margin: 0;
        cursor: pointer;
    }

    .wm-type-option input {
        position: absolute;
        opacity: 0;
        width: 100%;
        height: 100%;
        margin: 0;
        cursor: pointer;
    }

    .wm-type-card {
        display: block;
        border: 1.5px solid var(--wm-border);
        border-radius: 8px;
        padding: 0.6rem 0.8rem;
        text-align: center;
        font-weight: 650;
        font-size: 0.9rem;
        color: var(--wm-muted);
        transition: all .15s ease;
    }

    .wm-type-unpaid .wm-type-card {
        background: #fdecec;
        border-color: #f6d0ce;
        color: #c0392b;
    }

    .wm-type-unpaid input:checked+.wm-type-card {
        border-color: #ec9a95;
        background: #fbdcda;
        box-shadow: 0 0 0 1px #ec9a95 inset;
    }

    .wm-type-paid .wm-type-card {
        background: #e3f1ec;
        border-color: #bfe3d3;
        color: #007a5e;
    }

    .wm-type-paid input:checked+.wm-type-card {
        border-color: #7fcda9;
        background: #cdeee0;
        box-shadow: 0 0 0 1px #7fcda9 inset;
    }

    .wm-history-panel {
        background: #fafbfc;
        border: 1px solid var(--wm-border);
        border-radius: 10px;
        padding: 14px 16px;
        height: 100%;
    }

    .wm-history-title {
        font-size: 0.78rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        color: var(--wm-muted);
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .wm-history-empty {
        font-size: 0.85rem;
        color: var(--wm-muted);
        line-height: 1.5;
    }

    .wm-history-item {
        background: #fff;
        border: 1px solid var(--wm-border);
        border-radius: 8px;
        padding: 10px 12px;
        margin-bottom: 10px;
    }

    .wm-history-item:last-child {
        margin-bottom: 0;
    }

    .wm-history-item .h-id {
        font-size: 0.75rem;
        font-weight: 700;
        color: var(--wm-primary);
    }

    .wm-history-item .h-date {
        font-size: 0.72rem;
        color: var(--wm-muted);
        margin-top: 2px;
    }

    .wm-history-item .h-desc {
        font-size: 0.8rem;
        color: var(--wm-text);
        margin-top: 6px;
        line-height: 1.4;
    }

    .wm-history-item .h-status {
        display: inline-block;
        font-size: 0.7rem;
        font-weight: 700;
        padding: 2px 8px;
        border-radius: 10px;
        margin-top: 6px;
    }

    .wm-history-item .h-status.resolved {
        background: #e3f1ec;
        color: #007a5e;
    }

    .wm-history-item .h-status.open {
        background: #fff5cc;
        color: #916a00;
    }

    @media (max-width: 576px) {
        .wm-form-body {
            padding: 1.1rem 1rem;
        }
    }
</style>