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
                        <a href="{{ route('admin.quotes.index') }}">
                            Manage Quotes
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        New Proposal
                    </li>

                </ol>
            </div>

        </div>

        @if($draft ?? false)
            <div class="d-flex align-items-center justify-content-between mb-3 wm-draft-banner">
                <span><i class="fa fa-info-circle"></i> Your previous draft has been restored — the form below has been
                    pre-filled.</span>
                <form action="{{ route('admin.quotes.discard', $quoteId) }}" method="POST" class="mb-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">Discard &amp; Start Fresh</button>
                </form>
            </div>
        @endif

        <div class="content-wrapper pb-4">

            <form action="{{ route('admin.quotes.store') }}" method="POST" id="quoteForm">

                @csrf
                @if($quoteId ?? null)
                    <input type="hidden" name="quote_id" value="{{ $quoteId }}">
                @endif

                {{-- Customer Search --}}
                <div class="card wm-quotes-card mb-4">

                    <div class="card-header wm-quotes-header">
                        <h4 class="mb-0 wm-quotes-title">Search Customer</h4>
                    </div>

                    <div class="card-body wm-form-body">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group mb-0 wm-form-group">

                                    <label class="wm-label">Search by Mobile Number or Email</label>

                                    <div class="input-group wm-search-group">

                                        <input type="text" id="customerSearchTerm" class="form-control wm-input"
                                            placeholder="Enter mobile number or email">

                                        <div class="input-group-append">
                                            <button type="button" id="searchCustomerBtn"
                                                class="btn btn-primary wm-btn-primary">
                                                <i class="fa fa-search"></i> Search
                                            </button>
                                        </div>

                                    </div>

                                </div>

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

                            {{-- Left column --}}
                            <div class="col-md-6">

                                <div class="form-group wm-form-group">
                                    <label class="wm-label">Name</label>
                                    <input type="text" name="customer_name" id="customer_name"
                                        class="form-control wm-input" required>
                                </div>

                                <div class="form-group wm-form-group">
                                    <label class="wm-label">Company Name</label>
                                    <input type="text" name="business_name" id="business_name"
                                        class="form-control wm-input">
                                </div>

                                <div class="form-group wm-form-group">
                                    <label class="wm-label">Mobile Number</label>
                                    <input type="text" name="mobile_number" id="mobile_number"
                                        class="form-control wm-input" maxlength="15" required>
                                </div>

                                <div class="form-group wm-form-group">
                                    <label class="wm-label">Email Id</label>
                                    <input type="email" name="email" id="email" class="form-control wm-input">
                                </div>

                                <div class="form-group wm-form-group mb-0">
                                    <label class="wm-label">GSTIN</label>
                                    <input type="text" name="gst_number" id="gst_number" class="form-control wm-input">
                                </div>

                            </div>

                            {{-- Right column --}}
                            <div class="col-md-6">

                                <div class="form-group wm-form-group">
                                    <label class="wm-label">Full Address</label>
                                    <textarea name="address" id="address" rows="2"
                                        class="form-control wm-input"></textarea>
                                </div>

                                <div class="row">

                                    <div class="col-md-4">

                                        <div class="form-group wm-form-group">

                                            <label class="wm-label">State</label>

                                            <select name="state_id" id="state_id" class="form-control wm-input">

                                                <option value="">Select State</option>

                                                @foreach($states as $state)
                                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                @endforeach

                                            </select>

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group wm-form-group">

                                            <label class="wm-label">City</label>

                                            <select name="city_id" id="city_id" class="form-control wm-input">
                                                <option value="">Select City</option>
                                            </select>

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group wm-form-group mb-0">
                                            <label class="wm-label">Pin Code</label>
                                            <input type="text" name="pincode" id="pincode" class="form-control wm-input"
                                                maxlength="10">
                                        </div>

                                    </div>


                                </div>

                                <div class="row mt-3">

                                    <div class="col-md-6">
                                        <div class="form-group wm-form-group mb-0">
                                            <label class="wm-label">Prepared By</label>
                                            <input type="text" name="prepared_by" id="prepared_by"
                                                class="form-control wm-input" placeholder="Enter name">
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Products (Internal Inventory only) --}}
                <div class="card wm-quotes-card mb-4">

                    <div class="card-header wm-quotes-header">
                        <h4 class="mb-0 wm-quotes-title">Add Products</h4>
                    </div>

                    <div class="card-body wm-form-body">

                        <div class="row align-items-end">

                            <div class="col-md-8 position-relative">

                                <div class="form-group mb-0 wm-form-group">
                                    <label class="wm-label">Search Product</label>
                                    <input type="text" id="productSearch" class="form-control wm-input"
                                        placeholder="Type product name..." autocomplete="off">
                                </div>

                                <div id="productSearchResults"
                                    class="list-group position-absolute w-100 wm-search-dropdown"
                                    style="z-index: 999; max-height: 250px; overflow-y: auto;"></div>

                            </div>

                            <div class="col-md-2">
                                <label class="d-block wm-label">&nbsp;</label>
                                <button type="button" id="optionsBtn"
                                    class="btn btn-outline-primary btn-block wm-btn-outline" disabled>
                                    <i class="fa fa-cog"></i> Options
                                </button>
                            </div>

                            <div class="col-md-2">
                                <label class="d-block wm-label">&nbsp;</label>
                                <button type="button" id="addProductBtn"
                                    class="btn btn-success btn-block wm-btn-success" disabled>
                                    <i class="fa fa-plus"></i> Add More
                                </button>
                            </div>

                        </div>

                        {{-- Staged preview: single row (Qty, Price, Tax, Sub Total) --}}
                        <div class="row align-items-end mt-3">

                            <div class="col">
                                <label class="mb-0 small wm-label">Qty</label>
                                <input type="text" id="stagedQty" class="form-control wm-input wm-input-readonly"
                                    value="-" readonly>
                            </div>

                            <div class="col">
                                <label class="mb-0 small wm-label">Price</label>
                                <input type="text" id="stagedPrice" class="form-control wm-input wm-input-readonly"
                                    value="-" readonly>
                            </div>

                            <div class="col">
                                <label class="mb-0 small wm-label">Tax</label>
                                <input type="text" id="stagedTax" class="form-control wm-input wm-input-readonly"
                                    value="-" readonly>
                            </div>

                            <div class="col">
                                <label class="mb-0 small wm-label">Product Sub Total</label>
                                <input type="text" id="stagedSubTotal" class="form-control wm-input wm-input-readonly"
                                    value="-" readonly>
                            </div>

                        </div>

                        <small class="text-muted d-block mt-1 wm-hint">
                            Select a product (Internal Inventory only) and click "Options" to set SKU, HSN, Brand,
                            Quantity, Price &amp; Tax.
                        </small>

                        <hr class="wm-divider">

                        <div class="table-responsive">

                            <table class="table table-bordered mb-0 wm-quotes-table" id="itemsTable">

                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th width="110">SKU</th>
                                        <th width="110">HSN</th>
                                        <th width="120">Brand</th>
                                        <th width="70">Qty</th>
                                        <th width="100">Price</th>
                                        <th width="70">Tax</th>
                                        <th width="120">Sub Total</th>
                                        <th width="80">Options</th>
                                        <th width="60">Remove</th>
                                    </tr>
                                </thead>

                                <tbody id="itemsTableBody">
                                    <tr id="noItemsRow">
                                        <td colspan="10" class="text-center text-muted wm-empty-state">
                                            No products added yet.
                                        </td>
                                    </tr>
                                </tbody>

                            </table>

                        </div>

                        <div id="hiddenItemsContainer"></div>

                        <small id="itemsError" class="text-danger"></small>

                    </div>

                </div>

                {{-- Additional Charges (Packing & Shipping) --}}
                <div class="card wm-quotes-card mb-4">

                    <div class="card-header wm-quotes-header">
                        <h4 class="mb-0 wm-quotes-title">Additional Charges</h4>
                    </div>

                    <div class="card-body wm-form-body">

                        <div class="row">

                            {{-- Packaging Chargess --}}
                            <div class="col-md-6">

                                <label class="wm-label mb-2">Packaging Chargess</label>

                                <div class="row">

                                    <div class="col-4">
                                        <div class="form-group wm-form-group mb-0">
                                            <label class="mb-0 small wm-label">Quantity</label>
                                            <input type="number" name="packing_quantity" id="packing_quantity"
                                                class="form-control wm-input packing-calc" min="0" value="1">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group wm-form-group mb-0">
                                            <label class="mb-0 small wm-label">Rate</label>
                                            <input type="number" name="packing_charges" id="packing_charges"
                                                class="form-control wm-input packing-calc" step="0.01" min="0"
                                                value="0">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group wm-form-group mb-0">
                                            <label class="mb-0 small wm-label">Tax</label>
                                            <select name="packing_tax_percentage" id="packing_tax_percentage"
                                                class="form-control wm-input packing-calc">
                                                <option value="0">0%</option>
                                                <option value="5">5%</option>
                                                <option value="12">12%</option>
                                                <option value="18" selected>18%</option>
                                                <option value="28">28%</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group wm-form-group mb-0 mt-2">
                                    <label class="mb-0 small wm-label">Packing Amount (preview)</label>
                                    <input type="text" id="packing_amount_preview"
                                        class="form-control wm-input wm-input-readonly" readonly value="0.00">
                                </div>

                            </div>

                            {{-- Shipping Charges --}}
                            <div class="col-md-6">

                                <label class="wm-label mb-2">Shipping Charges</label>

                                <div class="row">

                                    <div class="col-4">
                                        <div class="form-group wm-form-group mb-0">
                                            <label class="mb-0 small wm-label">Quantity</label>
                                            <input type="number" name="shipping_quantity" id="shipping_quantity"
                                                class="form-control wm-input shipping-calc" min="0" value="1">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group wm-form-group mb-0">
                                            <label class="mb-0 small wm-label">Rate</label>
                                            <input type="number" name="shipping_charges" id="shipping_charges"
                                                class="form-control wm-input shipping-calc" step="0.01" min="0"
                                                value="0">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group wm-form-group mb-0">
                                            <label class="mb-0 small wm-label">Tax</label>
                                            <select name="shipping_tax_percentage" id="shipping_tax_percentage"
                                                class="form-control wm-input shipping-calc">
                                                <option value="0">0%</option>
                                                <option value="5">5%</option>
                                                <option value="12">12%</option>
                                                <option value="18" selected>18%</option>
                                                <option value="28">28%</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group wm-form-group mb-0 mt-2">
                                    <label class="mb-0 small wm-label">Shipping Amount (preview)</label>
                                    <input type="text" id="shipping_amount_preview"
                                        class="form-control wm-input wm-input-readonly" readonly value="0.00">
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="card wm-quotes-card">

                    <div class="card-footer text-right wm-quotes-footer">

                        <button type="submit" class="btn btn-primary wm-btn-primary">
                            Next <i class="fa fa-arrow-right"></i>
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

{{-- Options Modal (shared for staging + editing) — simplified: no branding, no customisation --}}
<div class="modal fade" id="optionsModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content wm-modal-content">

            <div class="modal-header wm-modal-header">
                <h5 class="modal-title wm-modal-title">Product Options</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body wm-modal-body">

                <div class="row">

                    {{-- Left column: SKU, HSN --}}
                    <div class="col-md-6">

                        <div class="form-group wm-form-group">
                            <label class="wm-label">SKU Code</label>
                            <input type="text" id="opt_sku_code" class="form-control wm-input">
                        </div>

                        <div class="form-group wm-form-group mb-0">
                            <label class="wm-label">HSN Code</label>
                            <input type="text" id="opt_hsn_code" class="form-control wm-input">
                        </div>

                    </div>

                    {{-- Right column: Brand --}}
                    <div class="col-md-6">

                        <div class="form-group wm-form-group mb-0">
                            <label class="wm-label">Select Brand</label>
                            <select id="opt_brand_id" class="form-control wm-input">
                                <option value="">Select Brand</option>
                                <option value="__add_new__">+ Add New Brand</option>
                                <option disabled>──────────</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>

                            <div id="newBrandGroup" class="input-group mt-2" style="display:none;">
                                <input type="text" id="newBrandName" class="form-control wm-input"
                                    placeholder="Enter new brand name">
                                <div class="input-group-append">
                                    <button type="button" id="saveNewBrandBtn" class="btn btn-sm wm-btn-primary">
                                        <i class="fa fa-plus"></i> Add
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Price / Qty / Tax --}}
                    <div class="col-md-12">
                        <hr class="wm-divider">
                        <label class="wm-label mb-2" style="color: var(--wm-primary);">Product Price</label>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group wm-form-group">
                            <label class="wm-label">Quantity</label>
                            <input type="number" id="opt_quantity" class="form-control wm-input" min="1" value="1">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group wm-form-group">
                            <label class="wm-label">Price</label>
                            <input type="number" id="opt_price" class="form-control wm-input" step="0.01" min="0">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group wm-form-group">
                            <label class="wm-label">Tax</label>
                            <select id="opt_tax_percentage" class="form-control wm-input">
                                <option value="0">0%</option>
                                <option value="5" selected>5%</option>
                                <option value="12">12%</option>
                                <option value="18">18%</option>
                                <option value="28">28%</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group wm-form-group">
                            <label class="d-block wm-label">Product Sub Total (preview)</label>
                            <input type="text" id="opt_subtotal_preview"
                                class="form-control wm-input wm-input-readonly" readonly value="0.00">
                        </div>
                    </div>

                    {{-- Features print toggle --}}
                    <div class="col-md-12">
                        <hr class="wm-divider">
                        <div class="form-group wm-form-group mb-0 d-flex align-items-center" style="gap: 8px;">
                            <input type="checkbox" id="opt_show_features" style="width: 16px; height: 16px;">
                            <label for="opt_show_features" class="wm-label mb-0" style="text-transform: none;">
                                Print product Features on the quotation
                            </label>
                        </div>
                    </div>

                </div>

            </div>

            <div class="modal-footer wm-modal-footer">
                <button type="button" class="btn btn-secondary wm-btn-cancel" data-dismiss="modal">Cancel</button>
                <button type="button" id="optionsSubmitBtn" class="btn btn-primary wm-btn-primary">Submit</button>
            </div>

        </div>
    </div>
</div>

@include('admin.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
<script>
    $(function () {

        var itemIndex = 0;
        var itemsCount = 0;
        var selectedProduct = null;   // product chosen from search, not yet added
        var stagedItem = null;        // options filled for selectedProduct, before "Add More"
        var items = {};               // index -> full data of items already added
        var modalMode = null;         // 'stage' or 'edit'
        var editIndex = null;
        var draftData = @json($draft ?? null); // session draft data, if resuming an edit

        // Sub Total = (price x qty) + tax on that subtotal.
        function calcTotal(price, qty, taxPercentage) {

            var subtotal = (parseFloat(price) || 0) * (parseInt(qty) || 0);
            var taxAmount = subtotal * ((parseFloat(taxPercentage) || 0) / 100);

            return {
                subtotal: subtotal,
                taxAmount: taxAmount,
                total: subtotal + taxAmount,
            };
        }

        // live preview inside modal
        function updateModalPreview() {

            var price = parseFloat($('#opt_price').val()) || 0;
            var qty = parseInt($('#opt_quantity').val()) || 0;
            var tax = parseFloat($('#opt_tax_percentage').val()) || 0;

            var calc = calcTotal(price, qty, tax);

            $('#opt_subtotal_preview').val(calc.total.toFixed(2));
        }

        // ---------- Packing / Shipping amount preview ----------
        function updateChargePreview(qtySelector, rateSelector, taxSelector, previewSelector) {

            var qty = parseFloat($(qtySelector).val()) || 0;
            var rate = parseFloat($(rateSelector).val()) || 0;
            var tax = parseFloat($(taxSelector).val()) || 0;

            var subtotal = qty * rate;
            var amount = subtotal + (subtotal * (tax / 100));

            $(previewSelector).val(amount.toFixed(2));

            return amount;
        }

        function updateChargesPreview() {
            updateChargePreview('#packing_quantity', '#packing_charges', '#packing_tax_percentage', '#packing_amount_preview');
            updateChargePreview('#shipping_quantity', '#shipping_charges', '#shipping_tax_percentage', '#shipping_amount_preview');
        }

        $('.packing-calc, .shipping-calc').on('input change', updateChargesPreview);

        // initial run in case draft prefill sets values
        updateChargesPreview();

        $('#opt_price, #opt_quantity, #opt_tax_percentage').on('input change', updateModalPreview);

        // ---------- Customer search (by mobile or email) ----------
        function searchCustomer(term) {

            if (!term) {
                return;
            }

            $('#customerSearchStatus').removeClass('text-success text-danger').text('Searching...');

            $.get('{{ route('admin.quotes.search-customer') }}', { search: term }, function (res) {

                if (res.found) {

                    var c = res.customer;

                    $('#mobile_number').val(c.mobile_number);
                    $('#customer_name').val(c.customer_name);
                    $('#business_name').val(c.business_name);
                    $('#email').val(c.email);
                    $('#gst_number').val(c.gst_number);
                    $('#address').val(c.address);
                    $('#pincode').val(c.pincode);
                    $('#state_id').val(c.state_id);

                    var $city = $('#city_id');
                    $city.html('<option value="">Select City</option>');

                    $.each(res.cities, function (i, city) {
                        var selected = (city.id == c.city_id) ? 'selected' : '';
                        $city.append('<option value="' + city.id + '" ' + selected + '>' + city.name + '</option>');
                    });

                    $('#customerSearchStatus')
                        .addClass('text-success')
                        .text('Existing customer found — details auto-filled.');

                } else {

                    // Prefill whichever field matches what the user searched with
                    if (term.indexOf('@') !== -1) {
                        $('#email').val(term);
                        $('#mobile_number').val('');
                    } else {
                        $('#mobile_number').val(term);
                        $('#email').val('');
                    }

                    $('#customer_name').val('');
                    $('#business_name').val('');
                    $('#gst_number').val('');
                    $('#address').val('');
                    $('#pincode').val('');
                    $('#state_id').val('');
                    $('#city_id').html('<option value="">Select City</option>');

                    $('#customerSearchStatus')
                        .addClass('text-danger')
                        .text('New customer — please fill in the details below.');
                }
            });
        }

        $('#searchCustomerBtn').on('click', function () {
            searchCustomer($('#customerSearchTerm').val().trim());
        });

        $('#customerSearchTerm').on('keypress', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                searchCustomer($(this).val().trim());
            }
        });

        // ---------- Dependent State -> City dropdown ----------
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

        // ---------- Product search (Internal Inventory only) ----------
        var searchTimer = null;

        $('#productSearch').on('keyup', function () {

            var term = $(this).val().trim();
            var $results = $('#productSearchResults');

            clearTimeout(searchTimer);

            if (term.length < 2) {
                $results.empty();
                return;
            }

            searchTimer = setTimeout(function () {

                $.get('{{ route('admin.quotes.search-products') }}', { term: term }, function (products) {

                    $results.empty();

                    if (products.length === 0) {
                        $results.append('<div class="list-group-item">No Internal Inventory products found.</div>');
                        return;
                    }

                    $.each(products, function (i, product) {

                        var $item = $('<a href="javascript:void(0);" class="list-group-item list-group-item-action"></a>')
                            .text(product.name)
                            .data('product', product);

                        $results.append($item);

                    });

                });

            }, 300);

        });

        $(document).on('click', '#productSearchResults a', function () {

            selectedProduct = $(this).data('product');
            stagedItem = null;

            $('#productSearch').val(selectedProduct.name);
            $('#productSearchResults').empty();

            $('#optionsBtn').prop('disabled', false);
            $('#addProductBtn').prop('disabled', true);

            $('#stagedQty').val('-');
            $('#stagedPrice').val('-');
            $('#stagedTax').val('-');
            $('#stagedSubTotal').val('-');

        });

        // ---------- Open Options modal for staging (new item) ----------
        $('#optionsBtn').on('click', function () {

            if (!selectedProduct) {
                return;
            }

            modalMode = 'stage';
            editIndex = null;

            var base = stagedItem || {
                brand_id: selectedProduct.brand_id || '',
                sku_code: '',
                hsn_code: '',
                quantity: 1,
                price: selectedProduct.price || 0,
                tax_percentage: 5,
                show_features: false,
                product_features: selectedProduct.features || '',
            };

            fillModal(base);

            $('#optionsModal').modal('show');

        });

        // ---------- Open Options modal for editing an already-added row ----------
        $(document).on('click', '.rowOptionsBtn', function () {

            var index = $(this).data('index');
            var data = items[index];

            if (!data) {
                return;
            }

            modalMode = 'edit';
            editIndex = index;

            fillModal(data);

            $('#optionsModal').modal('show');

        });

        function fillModal(data) {

            $('#newBrandGroup').hide();
            $('#newBrandName').val('');

            $('#opt_brand_id').val(data.brand_id || '');
            $('#opt_sku_code').val(data.sku_code || '');
            $('#opt_hsn_code').val(data.hsn_code || '');
            $('#opt_quantity').val(data.quantity || 1);
            $('#opt_price').val(data.price || 0);
            $('#opt_tax_percentage').val(data.tax_percentage || 5);
            $('#opt_show_features').prop('checked', !!data.show_features);

            updateModalPreview();

        }

        // ---------- Inline "+ Add New Brand" from Options modal ----------
        $('#opt_brand_id').on('change', function () {

            if ($(this).val() === '__add_new__') {
                $('#newBrandGroup').show();
                $('#newBrandName').focus();
            } else {
                $('#newBrandGroup').hide();
            }

        });

        $('#saveNewBrandBtn').on('click', function () {

            var name = $('#newBrandName').val().trim();

            if (!name) {
                alert('Please enter a brand name.');
                return;
            }

            $.post('{{ route('admin.quotes.store-brand') }}', {
                _token: '{{ csrf_token() }}',
                name: name,
            }, function (brand) {

                var $option = $('<option></option>').val(brand.id).text(brand.name);
                $('#opt_brand_id option[value="__add_new__"]').before($option);
                $('#opt_brand_id').val(brand.id);

                $('#newBrandGroup').hide();
                $('#newBrandName').val('');

            }).fail(function (xhr) {
                var msg = (xhr.responseJSON && xhr.responseJSON.errors && xhr.responseJSON.errors.name)
                    ? xhr.responseJSON.errors.name[0]
                    : 'Could not add brand — it may already exist.';
                alert(msg);
            });

        });

        // ---------- Options modal submit ----------
        $('#optionsSubmitBtn').on('click', function () {

            var quantity = parseInt($('#opt_quantity').val()) || 0;
            var price = parseFloat($('#opt_price').val()) || 0;
            var tax = parseFloat($('#opt_tax_percentage').val()) || 0;

            if (quantity < 1) {
                alert('Quantity must be at least 1.');
                return;
            }

            if (price < 0) {
                alert('Please enter a valid price.');
                return;
            }

            var data = {
                brand_id: $('#opt_brand_id').val(),
                sku_code: $('#opt_sku_code').val(),
                hsn_code: $('#opt_hsn_code').val(),
                quantity: quantity,
                price: price,
                tax_percentage: tax,
                show_features: $('#opt_show_features').is(':checked'),
                product_features: (stagedItem && stagedItem.product_features)
                    || (modalMode === 'edit' && items[editIndex] ? items[editIndex].product_features : '')
                    || (selectedProduct ? selectedProduct.features : ''),
            };

            var calc = calcTotal(data.price, data.quantity, data.tax_percentage);

            if (modalMode === 'stage') {

                stagedItem = data;

                $('#stagedQty').val(data.quantity);
                $('#stagedPrice').val(data.price.toFixed(2));
                $('#stagedTax').val(data.tax_percentage + '%');
                $('#stagedSubTotal').val(calc.total.toFixed(2));

                $('#addProductBtn').prop('disabled', false);

            } else if (modalMode === 'edit' && editIndex !== null) {

                items[editIndex] = $.extend({}, items[editIndex], data);
                items[editIndex].total = calc.total;

                updateTableRow(editIndex, items[editIndex]);
                updateHiddenInputs(editIndex, items[editIndex]);

            }

            $('#optionsModal').modal('hide');

        });

        // ---------- Shared: add a fully-formed item row to the table ----------
        // Used both by "Add More" (fresh product) and by the draft prefill
        // (rehydrating rows already saved in the session).
        function addItemRow(itemData) {

            var index = itemIndex++;
            itemsCount++;
            $('#noItemsRow').remove();

            var normalized = {
                product_id: itemData.product_id || '',
                product_name: itemData.product_name,
                product_image: itemData.product_image || '',
                brand_id: itemData.brand_id || '',
                brand_name: itemData.brand_name || '',
                sku_code: itemData.sku_code || '',
                hsn_code: itemData.hsn_code || '',
                quantity: parseInt(itemData.quantity) || 1,
                price: parseFloat(itemData.price) || 0,
                tax_percentage: parseFloat(itemData.tax_percentage) || 0,
                show_features: !!itemData.show_features,
                product_features: itemData.product_features || '',
            };

            var calc = calcTotal(normalized.price, normalized.quantity, normalized.tax_percentage);
            normalized.total = calc.total;

            items[index] = normalized;

            var brandLabel = normalized.brand_name
                || $('#opt_brand_id option[value="' + normalized.brand_id + '"]').text()
                || '-';

            var rowHtml = '<tr id="itemRow' + index + '">'
                + '<td class="itemProductName">' + normalized.product_name + '</td>'
                + '<td class="itemSku">' + (normalized.sku_code || '-') + '</td>'
                + '<td class="itemHsn">' + (normalized.hsn_code || '-') + '</td>'
                + '<td class="itemBrand">' + brandLabel + '</td>'
                + '<td class="itemQty">' + normalized.quantity + '</td>'
                + '<td class="itemPrice">' + normalized.price.toFixed(2) + '</td>'
                + '<td class="itemTax">' + normalized.tax_percentage + '%</td>'
                + '<td class="itemSubTotal">' + calc.total.toFixed(2) + '</td>'
                + '<td><button type="button" class="btn btn-sm btn-outline-primary rowOptionsBtn" data-index="' + index + '"><i class="fa fa-cog"></i></button></td>'
                + '<td><button type="button" class="btn btn-sm btn-danger removeItemBtn" data-index="' + index + '"><i class="fa fa-trash"></i></button></td>'
                + '</tr>';

            $('#itemsTableBody').append(rowHtml);

            updateHiddenInputs(index, normalized);

        }

        // ---------- Add product to items table ----------
        $('#addProductBtn').on('click', function () {

            if (!selectedProduct || !stagedItem) {
                return;
            }

            var itemData = $.extend({}, stagedItem, {
                product_id: selectedProduct.id || '',
                product_name: selectedProduct.name,
                product_image: selectedProduct.image || '',
            });

            addItemRow(itemData);

            // reset staging
            selectedProduct = null;
            stagedItem = null;
            $('#productSearch').val('');
            $('#optionsBtn').prop('disabled', true);
            $('#addProductBtn').prop('disabled', true);
            $('#stagedQty').val('-');
            $('#stagedPrice').val('-');
            $('#stagedTax').val('-');
            $('#stagedSubTotal').val('-');
            $('#itemsError').text('');

        });

        function updateTableRow(index, data) {

            var calc = calcTotal(data.price, data.quantity, data.tax_percentage);
            data.total = calc.total;

            var brandLabel = $('#opt_brand_id option[value="' + data.brand_id + '"]').text() || '-';

            var $row = $('#itemRow' + index);
            $row.find('.itemSku').text(data.sku_code || '-');
            $row.find('.itemHsn').text(data.hsn_code || '-');
            $row.find('.itemBrand').text(brandLabel);
            $row.find('.itemQty').text(data.quantity);
            $row.find('.itemPrice').text(data.price.toFixed(2));
            $row.find('.itemTax').text(data.tax_percentage + '%');
            $row.find('.itemSubTotal').text(calc.total.toFixed(2));

        }

        function updateHiddenInputs(index, data) {

            var hiddenHtml = ''
                + '<input type="hidden" name="items[' + index + '][product_id]" value="' + (data.product_id ?? '') + '">'
                + '<input type="hidden" name="items[' + index + '][product_name]" value="' + data.product_name + '">'
                + '<input type="hidden" name="items[' + index + '][product_image]" value="' + (data.product_image ?? '') + '">'
                + '<input type="hidden" name="items[' + index + '][product_features]" value="' + $('<div>').text(data.product_features ?? '').html() + '">'
                + '<input type="hidden" name="items[' + index + '][show_features]" value="' + (data.show_features ? '1' : '0') + '">'
                + '<input type="hidden" name="items[' + index + '][brand_id]" value="' + (data.brand_id ?? '') + '">'
                + '<input type="hidden" name="items[' + index + '][sku_code]" value="' + $('<div>').text(data.sku_code ?? '').html() + '">'
                + '<input type="hidden" name="items[' + index + '][hsn_code]" value="' + $('<div>').text(data.hsn_code ?? '').html() + '">'
                + '<input type="hidden" name="items[' + index + '][price]" value="' + data.price + '">'
                + '<input type="hidden" name="items[' + index + '][tax_percentage]" value="' + data.tax_percentage + '">'
                + '<input type="hidden" name="items[' + index + '][quantity]" value="' + data.quantity + '">';

            $('#itemHidden' + index).remove();
            $('#hiddenItemsContainer').append('<div id="itemHidden' + index + '">' + hiddenHtml + '</div>');

        }

        // ---------- Remove item ----------
        $(document).on('click', '.removeItemBtn', function () {

            var index = $(this).data('index');

            $('#itemRow' + index).remove();
            $('#itemHidden' + index).remove();
            delete items[index];

            itemsCount--;

            if (itemsCount === 0) {
                $('#itemsTableBody').append('<tr id="noItemsRow"><td colspan="10" class="text-center text-muted wm-empty-state">No products added yet.</td></tr>');
            }

        });

        // ---------- Prevent submit without items ----------
        $('#quoteForm').on('submit', function (e) {

            if (itemsCount === 0) {
                e.preventDefault();
                $('#itemsError').text('Please add at least one product before proceeding.');
            }

        });

        // ---------- Prefill form from session draft (true "Edit" flow) ----------
        function prefillFromDraft(draft) {

            if (!draft) {
                return;
            }

            $('#customer_name').val(draft.customer_name || '');
            $('#business_name').val(draft.business_name || '');
            $('#mobile_number').val(draft.mobile_number || '');
            $('#email').val(draft.email || '');
            $('#gst_number').val(draft.gst_number || '');
            $('#address').val(draft.address || '');
            $('#pincode').val(draft.pincode || '');
            $('#prepared_by').val(draft.prepared_by || '');
            $('#packing_charges').val(draft.packing_charges || 0);
            $('#shipping_charges').val(draft.shipping_charges || 0);
            $('#packing_quantity').val(draft.packing_quantity || 1);
            $('#packing_tax_percentage').val(draft.packing_tax_percentage || 18);
            $('#shipping_quantity').val(draft.shipping_quantity || 1);
            $('#shipping_tax_percentage').val(draft.shipping_tax_percentage || 18);
            updateChargesPreview();

            if (draft.state_id) {

                $('#state_id').val(draft.state_id);

                $.get('{{ route('admin.quote-settings.get-cities', ':state_id') }}'.replace(':state_id', draft.state_id), function (cities) {

                    var $city = $('#city_id');
                    $city.html('<option value="">Select City</option>');

                    $.each(cities, function (i, city) {
                        var selected = (city.id == draft.city_id) ? 'selected' : '';
                        $city.append('<option value="' + city.id + '" ' + selected + '>' + city.name + '</option>');
                    });

                });

            }

            $.each(draft.items || [], function (i, item) {
                addItemRow(item);
            });

        }

        prefillFromDraft(draftData);

    });
</script>

{{-- ==========================================================
Scoped UI styling for New Proposal page — re-themed to match the
Product create page's indigo design system (--accent, --bg, --border,
etc.) instead of the previous green wm-* theme. No IDs/classes/
JS selectors changed — visual tokens only.
========================================================== --}}
<style>
    :root {
        --wm-primary: #303d89;
        --wm-primary-hover: #252f70;
        --wm-primary-light: #eef0fa;
        --wm-border: #e3e5e8;
        --wm-text: #202223;
        --wm-muted: #6d7175;
        --wm-row-odd: #ffffff;
        --wm-row-even: #f8f8f9;
        --wm-radius: 12px;
        --wm-danger: #b3261e;
        --wm-danger-light: #fbeceb;
    }

    /* Card shell */
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

    /* Inputs, selects, textareas */
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
        text-align: center;
        font-weight: 600;
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

    .wm-hint {
        color: var(--wm-muted) !important;
        font-size: 0.8rem;
    }

    .wm-search-status {
        font-size: 0.85rem;
        font-weight: 600;
    }

    .wm-divider {
        border-top: 1px solid var(--wm-border);
        opacity: 1;
    }

    /* Buttons */
    .wm-btn-primary,
    .wm-btn-success,
    .wm-btn-outline,
    .wm-btn-cancel {
        border-radius: 8px !important;
        font-weight: 600 !important;
        font-size: 0.85rem !important;
        padding: 0.5rem 1rem !important;
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
    }

    .wm-btn-success {
        background-color: var(--wm-primary) !important;
        border-color: var(--wm-primary) !important;
        color: #ffffff !important;
    }

    .wm-btn-success:hover {
        background-color: var(--wm-primary-hover) !important;
        border-color: var(--wm-primary-hover) !important;
    }

    .wm-btn-outline {
        background-color: #ffffff !important;
        border-color: var(--wm-primary) !important;
        color: var(--wm-primary) !important;
    }

    .wm-btn-outline:hover:not(:disabled) {
        background-color: var(--wm-primary) !important;
        color: #ffffff !important;
    }

    .wm-btn-primary:disabled,
    .wm-btn-success:disabled,
    .wm-btn-outline:disabled {
        background-color: #eef0ec !important;
        border-color: var(--wm-border) !important;
        color: #a3aa9c !important;
        cursor: not-allowed;
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

    /* Product search dropdown */
    .wm-search-dropdown {
        border: 1px solid var(--wm-border);
        border-radius: 8px;
        box-shadow: 0 6px 18px rgba(32, 34, 35, 0.1);
        margin-top: 2px;
        overflow: hidden;
    }

    .wm-search-dropdown .list-group-item {
        border: none;
        border-bottom: 1px solid var(--wm-border);
        font-size: 0.88rem;
        padding: 0.6rem 0.9rem;
        color: var(--wm-text);
    }

    .wm-search-dropdown .list-group-item:last-child {
        border-bottom: none;
    }

    .wm-search-dropdown .list-group-item-action:hover {
        background-color: var(--wm-primary-light);
        color: var(--wm-primary);
    }

    /* Items table */
    .wm-quotes-table {
        margin-bottom: 0;
    }

    .wm-quotes-table thead tr th {
        background-color: var(--wm-primary);
        color: #ffffff;
        font-weight: 600;
        font-size: 0.78rem;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        border-color: var(--wm-primary);
        padding: 0.75rem 0.9rem;
    }

    .wm-quotes-table tbody tr td {
        padding: 0.7rem 0.9rem;
        vertical-align: middle;
        color: var(--wm-text);
        font-size: 0.88rem;
        border-color: var(--wm-border);
    }

    .wm-quotes-table tbody tr:nth-child(odd) {
        background-color: var(--wm-row-odd);
    }

    .wm-quotes-table tbody tr:nth-child(even) {
        background-color: var(--wm-row-even);
    }

    .wm-quotes-table tbody tr:hover {
        background-color: var(--wm-primary-light) !important;
    }

    .wm-quotes-table .itemProductName {
        font-weight: 600;
    }

    .wm-quotes-table .itemSubTotal {
        font-weight: 700;
        color: var(--wm-primary);
    }

    .wm-quotes-table .rowOptionsBtn {
        border-radius: 6px !important;
        border-color: var(--wm-primary) !important;
        color: var(--wm-primary) !important;
        background: #fff !important;
    }

    .wm-quotes-table .rowOptionsBtn:hover {
        background: var(--wm-primary) !important;
        color: #fff !important;
    }

    .wm-quotes-table .removeItemBtn {
        border-radius: 6px !important;
        background-color: var(--wm-danger-light) !important;
        border-color: var(--wm-danger-light) !important;
        color: var(--wm-danger) !important;
    }

    .wm-quotes-table .removeItemBtn:hover {
        background-color: var(--wm-danger) !important;
        border-color: var(--wm-danger) !important;
        color: #fff !important;
    }

    .wm-empty-state {
        padding: 1.25rem !important;
        color: var(--wm-muted) !important;
        font-size: 0.88rem;
    }

    /* Modal */
    .wm-modal-content {
        border-radius: var(--wm-radius);
        border: none;
        overflow: hidden;
    }

    .wm-modal-header {
        background: #ffffff;
        border-bottom: 1px solid var(--wm-border);
        padding: 1rem 1.25rem;
    }

    .wm-modal-title {
        font-weight: 650;
        color: var(--wm-text);
    }

    .wm-modal-body {
        padding: 1.5rem 1.25rem;
    }

    .wm-modal-footer {
        background: #fafafb;
        border-top: 1px solid var(--wm-border);
        padding: 0.85rem 1.25rem;
    }

    /* Draft resume banner */
    .wm-draft-banner {
        background-color: #fff8e1;
        border: 1px solid #ffe4a1;
        color: #8a6300;
        border-radius: 8px;
        font-weight: 500;
        padding: 0.7rem 1rem;
        font-size: 0.88rem;
    }

    /* Responsive */
    @media (max-width: 576px) {
        .wm-form-body {
            padding: 1.1rem 1rem;
        }
    }
</style>