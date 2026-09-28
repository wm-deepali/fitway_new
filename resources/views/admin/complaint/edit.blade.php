@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.complaint.complaints.index') }}">Manage Complaints</a></li>
                    <li class="breadcrumb-item active">Edit Complaint {{ $complaint->complaint_code }}</li>
                </ol>
            </div>
        </div>

        <div class="content-wrapper pb-4">

            <form action="{{ route('admin.complaint.complaints.update', $complaint) }}" method="POST" id="complaintForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="customer_id" id="customer_id" value="{{ $complaint->customer_id }}">

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
                                            <input type="text" name="customer_name" id="customer_name" class="form-control wm-input" value="{{ old('customer_name', $complaint->customer_name) }}">
                                            @error('customer_name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                        </div>

                                        <div class="form-group wm-form-group mb-0">
                                            <label class="wm-label">Email Id</label>
                                            <input type="email" name="email" id="email" class="form-control wm-input" value="{{ old('email', $complaint->email) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group wm-form-group">
                                            <label class="wm-label">Mobile Number</label>
                                            <input type="text" name="mobile_number" id="mobile_number" class="form-control wm-input" maxlength="15" value="{{ old('mobile_number', $complaint->mobile_number) }}">
                                            @error('mobile_number') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                        </div>

                                        <div class="form-group wm-form-group mb-0">
                                            <label class="wm-label">Landmark</label>
                                            <input type="text" name="landmark" id="landmark" class="form-control wm-input" value="{{ old('landmark', $complaint->landmark) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <div class="form-group wm-form-group">
                                            <label class="wm-label">Full Address</label>
                                            <textarea name="address" id="address" rows="2" class="form-control wm-input">{{ old('address', $complaint->full_address) }}</textarea>
                                            @error('address') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
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
                                                    <option value="{{ $state->id }}" {{ $complaint->state_id == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('state_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group wm-form-group mb-0">
                                            <label class="wm-label">City</label>
                                            <select name="city_id" id="city_id" class="form-control wm-input">
                                                <option value="">Select City</option>
                                                @foreach($cities as $city)
                                                    <option value="{{ $city->id }}" {{ $complaint->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('city_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group wm-form-group mb-0">
                                            <label class="wm-label">Pin Code</label>
                                            <input type="text" name="pincode" id="pincode" class="form-control wm-input" maxlength="10" value="{{ old('pincode', $complaint->pin_code) }}">
                                            @error('pincode') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-4">
                                <div class="wm-history-panel">
                                    <div class="wm-history-title"><i class="fa fa-clock-rotate-left"></i> Previous Complaint History</div>
                                    <div id="historyEmptyState" class="wm-history-empty" style="display:none;">No previous complaints found for this customer.</div>
                                    <div id="historyList"></div>
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
                            <textarea name="complaint_detail" id="complaint_detail" rows="3" class="form-control wm-input">{{ old('complaint_detail', $complaint->complaint_detail) }}</textarea>
                            @error('complaint_detail') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group wm-form-group">
                            <label class="wm-label">Complaint Type</label>
                            <div class="wm-type-toggle">
                                <label class="wm-type-option wm-type-unpaid">
                                    <input type="radio" name="complaint_type" value="unpaid" id="type_unpaid" {{ $complaint->complaint_type === 'unpaid' ? 'checked' : '' }}>
                                    <span class="wm-type-card">Unpaid</span>
                                </label>
                                <label class="wm-type-option wm-type-paid">
                                    <input type="radio" name="complaint_type" value="paid" id="type_paid" {{ $complaint->complaint_type === 'paid' ? 'checked' : '' }}>
                                    <span class="wm-type-card">Paid</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group wm-form-group" id="serviceDetailGroup">
                            <label class="wm-label">Service Detail</label>
                            <textarea name="service_detail" id="service_detail" rows="3" class="form-control wm-input">{{ old('service_detail', $complaint->service_detail) }}</textarea>
                        </div>

                        <div class="row" id="amountGroup" style="{{ $complaint->complaint_type === 'paid' ? '' : 'display:none;' }}">
                            <div class="col-md-4">
                                <div class="form-group wm-form-group">
                                    <label class="wm-label">Amount</label>
                                    <input type="number" name="paid_price" id="paid_price" class="form-control wm-input"
                                        step="0.01" min="0" value="{{ old('paid_price', $complaint->paid_price) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6 position-relative">
                                <div class="form-group wm-form-group mb-0">
                                    <label class="wm-label">Assigned To</label>
                                    <input type="text" name="assigned_to" id="assigned_to" class="form-control wm-input"
                                        value="{{ old('assigned_to', $complaint->technician->full_name ?? '') }}" autocomplete="off">
                                </div>
                                <div id="engineerSearchResults" class="list-group position-absolute w-100 wm-search-dropdown"
                                    style="z-index:998; max-height:220px; overflow-y:auto;"></div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group wm-form-group mb-0">
                                    <label class="wm-label">Schedule Date</label>
                                    <input type="date" name="schedule_date" id="schedule_date" class="form-control wm-input"
                                        value="{{ old('schedule_date', $complaint->schedule_date?->format('Y-m-d')) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group wm-form-group mb-0">
                                    <label class="wm-label">Complaint Status</label>
                                    <select name="status" id="status" class="form-control wm-input">
                                        @foreach(\App\Models\Complaint::$statusLabels as $value => $label)
                                            <option value="{{ $value }}" {{ $complaint->status == $value ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
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

                        @if($complaint->images->count())
                            <label class="wm-label">Existing Images</label>
                            <div class="d-flex flex-wrap mb-3" style="gap: 14px;">
                                @foreach($complaint->images as $img)
                                    <div style="text-align:center;">
                                        <img src="{{ $img->image_url }}" style="width:70px;height:70px;object-fit:cover;border-radius:8px;border:1px solid var(--wm-border);">
                                        <label class="d-block mt-1" style="font-size:0.72rem;">
                                            <input type="checkbox" name="remove_images[]" value="{{ $img->id }}"> Remove
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <div class="form-group wm-form-group mb-0">
                            <label class="wm-label">Add More Images</label>
                            <input type="file" name="images[]" id="images" class="form-control wm-input" style="height:auto; padding:8px;" accept="image/*" multiple>
                            @error('images.*') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div id="imagePreviewWrap" class="d-flex flex-wrap mt-3" style="gap: 10px;"></div>

                    </div>

                </div>

                <div class="card wm-quotes-card">
                    <div class="card-footer text-right wm-quotes-footer">
                        <a href="{{ route('admin.complaint.complaints.index') }}" class="btn wm-btn-cancel">Cancel</a>
                        <button type="submit" class="btn btn-primary wm-btn-primary">
                            <i class="fa fa-check"></i> Update Complaint
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

    const searchTechniciansUrl = "{{ route('admin.complaint.complaints.searchTechnicians') }}";
    const citiesByStateUrl     = "{{ url('admin/complaint/cities-by-state') }}";
    const customerHistoryUrl   = "{{ url('admin/complaint/customers') }}";

    function renderHistory(records) {
        const $list = $('#historyList');
        const $empty = $('#historyEmptyState');
        if (!records || records.length === 0) { $list.empty(); $empty.show(); return; }
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
    }

    @if($complaint->customer_id)
        $.get(`${customerHistoryUrl}/{{ $complaint->customer_id }}/history?exclude={{ $complaint->id }}`, renderHistory);
    @endif

    $('#state_id').on('change', function () {
        const stateId = $(this).val();
        const $city = $('#city_id');
        if (!stateId) { $city.html('<option value="">Select City</option>'); return; }
        $.get(`${citiesByStateUrl}/${stateId}`, function (cities) {
            $city.html('<option value="">Select City</option>' +
                cities.map(c => `<option value="${c.id}">${c.name}</option>`).join(''));
        });
    });

    function toggleAmount() {
        $('#amountGroup').toggle($('#type_paid').is(':checked'));
    }
    $('input[name="complaint_type"]').on('change', toggleAmount);
    toggleAmount();

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
        if (!$(e.target).closest('#assigned_to, #engineerSearchResults').length) { $engResults.empty(); }
    });

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
    /* identical style block to create.blade.php — copy it here unchanged */
</style>