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

                            <div class="col-md-6 position-relative">

                                <div class="form-group mb-0 wm-form-group">

                                    <label class="wm-label">Search by Name, Mobile Number or Email</label>

                                    <div class="input-group wm-search-group">

                                        <input type="text" id="customerSearchTerm" class="form-control wm-input"
                                            placeholder="Enter name, mobile number or email" autocomplete="off">

                                        <div class="input-group-append">
                                            <button type="button" id="searchCustomerBtn"
                                                class="btn btn-primary wm-btn-primary">
                                                <i class="fa fa-search"></i> Search
                                            </button>
                                        </div>

                                    </div>

                                </div>

                                {{-- Live suggestions while typing — name, mobile or email --}}
                                <div id="customerSearchResults"
                                    class="list-group position-absolute w-100 wm-search-dropdown"
                                    style="z-index: 999; max-height: 250px; overflow-y: auto;"></div>

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

                            {{-- Form (8) --}}
                            <div class="col-md-8">

                                {{-- Customer Name + Business Name --}}
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group wm-form-group">
                                            <label class="wm-label">Customer Name</label>
                                            <input type="text" name="customer_name" id="customer_name"
                                                class="form-control wm-input" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group wm-form-group">
                                            <label class="wm-label">Business Name</label>
                                            <input type="text" name="business_name" id="business_name"
                                                class="form-control wm-input">
                                        </div>
                                    </div>

                                </div>

                                {{-- Mobile Number + Email Id --}}
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group wm-form-group">
                                            <label class="wm-label">Mobile Number</label>
                                            <input type="text" name="mobile_number" id="mobile_number"
                                                class="form-control wm-input" maxlength="15" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group wm-form-group">
                                            <label class="wm-label">Email Id</label>
                                            <input type="email" name="email" id="email" class="form-control wm-input">
                                        </div>
                                    </div>

                                </div>

                                {{-- GSTIN + Prepared By --}}
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group wm-form-group">
                                            <label class="wm-label">GSTIN</label>
                                            <input type="text" name="gst_number" id="gst_number"
                                                class="form-control wm-input">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group wm-form-group">
                                            <label class="wm-label">Prepared By</label>
                                            <input type="text" name="prepared_by" id="prepared_by"
                                                class="form-control wm-input" placeholder="Enter name">
                                        </div>
                                    </div>

                                </div>

                                {{-- Full Address --}}
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group wm-form-group">
                                            <label class="wm-label">Full Address</label>
                                            <textarea name="address" id="address" rows="2"
                                                class="form-control wm-input"></textarea>
                                        </div>
                                    </div>

                                </div>

                                {{-- State + City + Pin Code --}}
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group wm-form-group mb-0">

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
                                        <div class="form-group wm-form-group mb-0">

                                            <label class="wm-label">City</label>

                                            <select name="city_id" id="city_id" class="form-control wm-input">
                                                <option value="">Select City</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group wm-form-group mb-0">
                                            <label class="wm-label">Pin Code</label>
                                            <input type="text" name="pincode" id="pincode"
                                                class="form-control wm-input" maxlength="10">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            {{-- Previous Quotations for this customer (4) --}}
                            <div class="col-md-4">

                                <div class="wm-prev-quotes-panel">

                                    <h6 class="wm-prev-quotes-title">Previous Quotations</h6>

                                    <div id="previousQuotationsList">
                                        <small class="text-muted">Search or select a customer to see their previous
                                            quotations.</small>
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

                        <small class="text-muted d-block mb-3 wm-hint">
                            Product search seedha table ki row me hi hota hai — search karein, Qty / MRP / Discount /
                            GST set karke <i class="fa fa-plus"></i> se row confirm karein, agli row turant neeche
                            khud aa jaayegi apne search box ke saath. Features add karne ke liye
                            <i class="fa fa-list-alt"></i> icon use karein.
                        </small>

                        <hr class="wm-divider">

                        <div class="table-responsive wm-items-table-wrap">

                            <table class="table table-bordered mb-0 wm-quotes-table" id="itemsTable">

                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        {{--
                                            SKU / HSN / Brand columns disabled for now — currently not mandatory.
                                            Uncomment these <th>s AND the matching <td>s inside buildItemRowHtml()
                                            in the script below, plus the SKU/HSN/Brand block in the Product
                                            Features modal, to bring this back.

                                            <th width="110">SKU</th>
                                            <th width="110">HSN</th>
                                            <th width="120">Brand</th>
                                        --}}
                                        <th width="90">Qty</th>
                                        <th width="110">MRP</th>
                                        <th width="160">Discount</th>
                                        <th width="90">GST</th>
                                        <th width="120">Sub Total</th>
                                        <th width="70">Features</th>
                                        <th width="60">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="itemsTableBody">
                                    {{-- Rows are rendered entirely by JS: confirmed product rows, plus one
                                         always-present "active" row (id="activeRow") with a live product
                                         search box, at the very bottom, ready for the next entry. --}}
                                </tbody>

                            </table>

                        </div>

                        <div id="hiddenItemsContainer"></div>

                        <small id="itemsError" class="text-danger"></small>

                        {{-- Product search suggestions — a single shared, viewport-fixed dropdown
                             (positioned by JS next to #productSearch) so it always floats on top,
                             regardless of the table's own scrolling. Never needs manual scrolling. --}}
                        <div id="productSearchResults" class="list-group wm-search-dropdown wm-fixed-dropdown"></div>

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

{{-- Product Features Modal (only Features now — Qty/MRP/Discount/GST live in the row itself) --}}
<div class="modal fade" id="optionsModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content wm-modal-content">

            <div class="modal-header wm-modal-header">
                <h5 class="modal-title wm-modal-title">Product Features</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body wm-modal-body">

                <div class="row">

                    {{-- SKU / HSN / Brand — optional, not mandatory. Leave blank if not needed. --}}
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

                    <div class="col-md-12">
                        <hr class="wm-divider">
                    </div>

                    {{-- Features print toggle --}}
                    <div class="col-md-12">
                        <div class="form-group wm-form-group mb-0 d-flex align-items-center" style="gap: 8px;">
                            <input type="checkbox" id="opt_show_features" style="width: 16px; height: 16px;">
                            <label for="opt_show_features" class="wm-label mb-0" style="text-transform: none;">
                                Print product Features on the quotation
                            </label>
                        </div>
                    </div>

                    {{-- Editable features text — only visible when checkbox is ticked --}}
                    <div class="col-md-12" id="opt_features_group" style="display:none;">
                        <div class="form-group wm-form-group mb-0 mt-2">
                            <label class="wm-label">Product Features (as printed on quotation)</label>
                            <textarea id="opt_product_features" rows="4" class="form-control wm-input"></textarea>
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
        var items = {};               // index -> full data of items already added
        var draftData = @json($draft ?? null); // session draft data, if resuming an edit

        // ============================================================
        // Product staging (before it's added to the table)
        // ============================================================
        var selectedProduct = null;   // product chosen from search, not yet added
        var currentFeatures = {       // features + optional SKU/HSN/Brand for the staged product
            show_features: false,
            product_features: '',
            sku_code: '',
            hsn_code: '',
            brand_id: '',
        };

        // Features modal shared between "staging" (new product) and "edit" (an added row)
        var featuresModalMode = null; // 'stage' or 'edit'
        var featuresEditIndex = null;

        // Sub Total = ((price x qty) - discount) + tax on the discounted amount.
        function calcTotal(price, qty, discountType, discountValue, taxPercentage) {

            var baseAmount = (parseFloat(price) || 0) * (parseInt(qty) || 0);

            var discountAmount = 0;

            if (discountType === 'flat') {
                discountAmount = parseFloat(discountValue) || 0;
            } else {
                discountAmount = baseAmount * ((parseFloat(discountValue) || 0) / 100);
            }

            if (discountAmount > baseAmount) {
                discountAmount = baseAmount; // discount kabhi base amount se zyada nahi ho sakta
            }

            var taxableAmount = baseAmount - discountAmount;
            var taxAmount = taxableAmount * ((parseFloat(taxPercentage) || 0) / 100);

            return {
                subtotal: baseAmount,
                discountAmount: discountAmount,
                taxableAmount: taxableAmount,
                taxAmount: taxAmount,
                total: taxableAmount + taxAmount,
            };
        }

        // live preview for the staging row (before "Add" is clicked)
        function updateRowPreview() {

            var price = parseFloat($('#rowPrice').val()) || 0;
            var qty = parseInt($('#rowQty').val()) || 0;
            var discountType = $('#rowDiscountType').val();
            var discountValue = parseFloat($('#rowDiscountValue').val()) || 0;
            var tax = parseFloat($('#rowTax').val()) || 0;

            var calc = calcTotal(price, qty, discountType, discountValue, tax);

            $('#rowSubTotal').val(calc.total.toFixed(2));
        }

        $(document).on('input change', '#rowQty, #rowPrice, #rowDiscountType, #rowDiscountValue, #rowTax', updateRowPreview);

        // percentage discount can't go above 100 — clamp so it's obvious it's a %, not a flat amount
        $(document).on('change', '#rowDiscountType', function () {
            if ($(this).val() === 'percentage') {
                $('#rowDiscountValue').attr('max', 100);
            } else {
                $('#rowDiscountValue').removeAttr('max');
            }
        });

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

        // ---------- Features modal (also carries optional SKU / HSN / Brand) ----------
        function fillFeaturesModal(data, product) {

            $('#newBrandGroup').hide();
            $('#newBrandName').val('');

            $('#opt_sku_code').val((data && data.sku_code) || '');
            $('#opt_hsn_code').val((data && data.hsn_code) || '');
            $('#opt_brand_id').val((data && data.brand_id) || '');

            $('#opt_show_features').prop('checked', !!(data && data.show_features));

            var featuresText = (data && data.product_features) || (product ? product.features : '') || '';

            $('#opt_product_features').val(featuresText);
            $('#opt_features_group').toggle(!!(data && data.show_features));
        }

        // ---------- Inline "+ Add New Brand" from the Features modal ----------
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

        $('#opt_show_features').on('change', function () {

            var checked = $(this).is(':checked');

            $('#opt_features_group').toggle(checked);

            // pehli baar tick karne par, agar textarea empty hai to product's default features bhar do
            if (checked && !$('#opt_product_features').val().trim()) {

                var defaultFeatures = '';

                if (featuresModalMode === 'stage' && selectedProduct) {
                    defaultFeatures = selectedProduct.features || '';
                } else if (featuresModalMode === 'edit' && featuresEditIndex !== null && items[featuresEditIndex]) {
                    defaultFeatures = items[featuresEditIndex].product_features || '';
                }

                $('#opt_product_features').val(defaultFeatures);
            }

        });

        // open features modal for the product currently staged in the active row (not yet added)
        $(document).on('click', '#featuresBtn', function () {

            if (!selectedProduct) {
                return;
            }

            featuresModalMode = 'stage';
            featuresEditIndex = null;

            fillFeaturesModal(currentFeatures, selectedProduct);

            $('#optionsModal').modal('show');
        });

        // open features modal for an already-added row
        $(document).on('click', '.rowFeaturesBtn', function () {

            var index = $(this).data('index');
            var data = items[index];

            if (!data) {
                return;
            }

            featuresModalMode = 'edit';
            featuresEditIndex = index;

            fillFeaturesModal(data, null);

            $('#optionsModal').modal('show');
        });

        $('#optionsSubmitBtn').on('click', function () {

            var data = {
                sku_code: $('#opt_sku_code').val(),
                hsn_code: $('#opt_hsn_code').val(),
                brand_id: ($('#opt_brand_id').val() === '__add_new__') ? '' : $('#opt_brand_id').val(),
                show_features: $('#opt_show_features').is(':checked'),
                product_features: $('#opt_product_features').val(),
            };

            if (featuresModalMode === 'stage') {

                currentFeatures = data;

            } else if (featuresModalMode === 'edit' && featuresEditIndex !== null && items[featuresEditIndex]) {

                items[featuresEditIndex].sku_code = data.sku_code;
                items[featuresEditIndex].hsn_code = data.hsn_code;
                items[featuresEditIndex].brand_id = data.brand_id;
                items[featuresEditIndex].show_features = data.show_features;
                items[featuresEditIndex].product_features = data.product_features;

                updateHiddenInputs(featuresEditIndex, items[featuresEditIndex]);
            }

            $('#optionsModal').modal('hide');
        });

        // ============================================================
        // Customer search — by Name, Mobile Number or Email
        // ============================================================

        // Fills the customer form from a selected suggestion (fetches its
        // state's cities itself, then preselects the customer's saved city).
        function fillCustomerFields(c) {

            $('#customer_name').val(c.customer_name);
            $('#business_name').val(c.business_name);
            $('#mobile_number').val(c.mobile_number);
            $('#email').val(c.email);
            $('#gst_number').val(c.gst_number);
            $('#address').val(c.address);
            $('#pincode').val(c.pincode);
            $('#state_id').val(c.state_id || '');

            var $city = $('#city_id');
            $city.html('<option value="">Select City</option>');

            if (c.state_id) {

                $.get('{{ route('admin.quote-settings.get-cities', ':state_id') }}'.replace(':state_id', c.state_id), function (cities) {

                    $.each(cities, function (i, city) {
                        var selected = (city.id == c.city_id) ? 'selected' : '';
                        $city.append('<option value="' + city.id + '" ' + selected + '>' + city.name + '</option>');
                    });

                });
            }

            $('#customerSearchStatus')
                .removeClass('text-danger')
                .addClass('text-success')
                .text('Existing customer found — details auto-filled.');
        }

        function clearCustomerFieldsForNew(term) {

            if (term.indexOf('@') !== -1) {
                $('#email').val(term);
                $('#mobile_number').val('');
                $('#customer_name').val('');
            } else if (/^[0-9+\-\s]+$/.test(term)) {
                $('#mobile_number').val(term);
                $('#email').val('');
                $('#customer_name').val('');
            } else {
                $('#customer_name').val(term);
                $('#mobile_number').val('');
                $('#email').val('');
            }

            $('#business_name').val('');
            $('#gst_number').val('');
            $('#address').val('');
            $('#pincode').val('');
            $('#state_id').val('');
            $('#city_id').html('<option value="">Select City</option>');

            $('#customerSearchStatus')
                .removeClass('text-success')
                .addClass('text-danger')
                .text('New customer — please fill in the details below.');
        }

        // Exact search (Search button / Enter key) — unchanged behaviour, still
        // uses the "search" query param and the existing {found, customer, cities} response.
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

                    clearCustomerFieldsForNew(term);
                }
            });
        }

        var customerSearchTimer = null;

        // Live suggestions while typing — matches Name OR Mobile OR Email.
        //
        // NOTE (backend): "admin.quotes.search-customer" route ko ab ek naya
        // "term" query param bhi handle karna hoga — customer_name OR
        // mobile_number OR email me partial match karke matching customers ka
        // ARRAY return karein (jaise "admin.quotes.search-products" karta hai):
        //   [{ id, customer_name, mobile_number, email, business_name,
        //      gst_number, address, pincode, state_id, city_id }, ...]
        // Purana "search" param wala exact-match behaviour (single customer +
        // found flag, Search button / Enter key se) bilkul waisa hi rahega.
        $('#customerSearchTerm').on('keyup', function (e) {

            if (e.which === 13) {
                e.preventDefault();
                $('#customerSearchResults').empty();
                searchCustomer($(this).val().trim());
                return;
            }

            var term = $(this).val().trim();
            var $results = $('#customerSearchResults');

            clearTimeout(customerSearchTimer);

            if (term.length < 2) {
                $results.empty();
                return;
            }

            customerSearchTimer = setTimeout(function () {

                $.get('{{ route('admin.quotes.search-customer') }}', { term: term }, function (matches) {

                    $results.empty();

                    if (!matches || matches.length === 0) {
                        $results.append('<div class="list-group-item text-muted">No matching customer found.</div>');
                        return;
                    }

                    $.each(matches, function (i, c) {

                        var label = c.customer_name + ' — ' + (c.mobile_number || c.email || '');

                        var $item = $('<a href="javascript:void(0);" class="list-group-item list-group-item-action"></a>')
                            .text(label)
                            .data('customer', c);

                        $results.append($item);

                    });

                });

            }, 300);

        });

        $(document).on('click', '#customerSearchResults a', function () {

            var c = $(this).data('customer');

            if (!c) {
                return;
            }

            fillCustomerFields(c);

            $('#customerSearchTerm').val(c.customer_name);
            $('#customerSearchResults').empty();
        });

        $('#searchCustomerBtn').on('click', function () {
            $('#customerSearchResults').empty();
            searchCustomer($('#customerSearchTerm').val().trim());
        });

        // hide suggestions dropdown on outside click
        $(document).on('click', function (e) {
            if (!$(e.target).closest('#customerSearchTerm, #customerSearchResults').length) {
                $('#customerSearchResults').empty();
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

        // ============================================================
        // Product search (Internal Inventory only) — lives inside the
        // table's always-present "active" row (#activeRow), rendered by
        // renderActiveRow() below.
        // ============================================================
        var searchTimer = null;

        $(document).on('keyup', '#productSearch', function () {

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

            $('#productSearch').val(selectedProduct.name);
            $('#productSearchResults').empty();

            $('#rowQty').val(1).prop('disabled', false);
            $('#rowPrice').val(selectedProduct.price || 0).prop('disabled', false);
            $('#rowDiscountType').val('percentage').prop('disabled', false);
            $('#rowDiscountValue').val(0).prop('disabled', false);
            $('#rowTax').val(5).prop('disabled', false);

            currentFeatures = {
                show_features: false,
                product_features: selectedProduct.features || '',
                sku_code: '',
                hsn_code: '',
                brand_id: selectedProduct.brand_id || '',
            };

            $('#featuresBtn').prop('disabled', false);
            $('#addProductBtn').prop('disabled', false);

            updateRowPreview();

        });

        // hide product suggestions dropdown on outside click
        $(document).on('click', function (e) {
            if (!$(e.target).closest('#productSearch, #productSearchResults').length) {
                $('#productSearchResults').empty();
            }
        });

        // ---------- Build a table row for an already-confirmed item (fully inline-editable) ----------
        function buildItemRowHtml(index, data) {

            var discountTypeOptions = ''
                + '<option value="percentage"' + (data.discount_type === 'percentage' ? ' selected' : '') + '>%</option>'
                + '<option value="flat"' + (data.discount_type === 'flat' ? ' selected' : '') + '>Flat (₹)</option>';

            var taxOptions = '';
            $.each([0, 5, 12, 18, 28], function (i, t) {
                taxOptions += '<option value="' + t + '"' + (data.tax_percentage == t ? ' selected' : '') + '>' + t + '%</option>';
            });

            return '<tr id="itemRow' + index + '">'
                + '<td class="itemProductName">' + data.product_name + '</td>'
                /* SKU / HSN / Brand <td>s disabled for now — uncomment the matching <th>s
                   in the thead above to bring these back:
                + '<td>' + (data.sku_code || '-') + '</td>'
                + '<td>' + (data.hsn_code || '-') + '</td>'
                + '<td>' + (data.brand_id || '-') + '</td>'
                */
                + '<td><input type="number" class="form-control form-control-sm wm-input itemQtyInput" data-index="' + index + '" min="1" value="' + data.quantity + '"></td>'
                + '<td><input type="number" class="form-control form-control-sm wm-input itemPriceInput" data-index="' + index + '" step="0.01" min="0" value="' + data.price + '"></td>'
                + '<td class="wm-discount-cell">'
                +   '<select class="form-control form-control-sm wm-input itemDiscountTypeInput" data-index="' + index + '">' + discountTypeOptions + '</select>'
                +   '<input type="number" class="form-control form-control-sm wm-input itemDiscountValueInput" data-index="' + index + '" step="0.01" min="0" value="' + data.discount_value + '">'
                + '</td>'
                + '<td><select class="form-control form-control-sm wm-input itemTaxInput" data-index="' + index + '">' + taxOptions + '</select></td>'
                + '<td class="itemSubTotal">' + data.total.toFixed(2) + '</td>'
                + '<td><button type="button" class="btn btn-sm btn-outline-primary rowFeaturesBtn" data-index="' + index + '" title="Product Features"><i class="fa fa-list-alt"></i></button></td>'
                + '<td><button type="button" class="btn btn-sm btn-danger removeItemBtn" data-index="' + index + '"><i class="fa fa-trash"></i></button></td>'
                + '</tr>';
        }

        // ---------- Render the always-present "active" row (with a live product search box) ----------
        // Always the LAST row in the table. Used on initial load and again right
        // after every "Add" so the next search happens in the row that just appeared.
        function renderActiveRow() {

            $('#activeRow').remove();

            var rowHtml = '<tr id="activeRow">'
                + '<td>'
                +   '<input type="text" id="productSearch" class="form-control form-control-sm wm-input" placeholder="Type product name..." autocomplete="off">'
                + '</td>'
                + '<td><input type="number" id="rowQty" class="form-control form-control-sm wm-input" min="1" value="1" disabled></td>'
                + '<td><input type="number" id="rowPrice" class="form-control form-control-sm wm-input" step="0.01" min="0" value="0" disabled></td>'
                + '<td class="wm-discount-cell">'
                +   '<select id="rowDiscountType" class="form-control form-control-sm wm-input" disabled>'
                +     '<option value="percentage" selected>%</option>'
                +     '<option value="flat">Flat (₹)</option>'
                +   '</select>'
                +   '<input type="number" id="rowDiscountValue" class="form-control form-control-sm wm-input" step="0.01" min="0" max="100" value="0" disabled>'
                + '</td>'
                + '<td><select id="rowTax" class="form-control form-control-sm wm-input" disabled>'
                +   '<option value="0">0%</option>'
                +   '<option value="5" selected>5%</option>'
                +   '<option value="12">12%</option>'
                +   '<option value="18">18%</option>'
                +   '<option value="28">28%</option>'
                + '</select></td>'
                + '<td><input type="text" id="rowSubTotal" class="form-control form-control-sm wm-input wm-input-readonly" value="0.00" readonly></td>'
                + '<td><button type="button" id="featuresBtn" class="btn btn-sm btn-outline-primary wm-icon-btn" disabled title="Product Features"><i class="fa fa-list-alt"></i></button></td>'
                + '<td><button type="button" id="addProductBtn" class="btn btn-sm btn-success wm-icon-btn" disabled title="Add Product"><i class="fa fa-plus"></i></button></td>'
                + '</tr>';

            $('#itemsTableBody').append(rowHtml);

            selectedProduct = null;
            currentFeatures = { show_features: false, product_features: '', sku_code: '', hsn_code: '', brand_id: '' };
        }

        // ---------- Shared: add a fully-formed item row to the table ----------
        // Used both by "Add" (fresh product, inserted right before the active row)
        // and by the draft prefill (rehydrating rows already saved in the session,
        // appended before the active row exists).
        function addItemRow(itemData) {

            var index = itemIndex++;
            itemsCount++;

            var normalized = {
                product_id: itemData.product_id || '',
                product_name: itemData.product_name,
                product_image: itemData.product_image || '',
                brand_id: itemData.brand_id || '',
                sku_code: itemData.sku_code || '',
                hsn_code: itemData.hsn_code || '',
                quantity: parseInt(itemData.quantity) || 1,
                price: parseFloat(itemData.price) || 0,
                discount_type: itemData.discount_type || 'percentage',
                discount_value: parseFloat(itemData.discount_value) || 0,
                tax_percentage: parseFloat(itemData.tax_percentage) || 0,
                show_features: !!itemData.show_features,
                product_features: itemData.product_features || '',
            };

            var calc = calcTotal(normalized.price, normalized.quantity, normalized.discount_type, normalized.discount_value, normalized.tax_percentage);
            normalized.total = calc.total;

            items[index] = normalized;

            var rowHtml = buildItemRowHtml(index, normalized);

            if ($('#activeRow').length) {
                $(rowHtml).insertBefore('#activeRow');
            } else {
                $('#itemsTableBody').append(rowHtml);
            }

            updateHiddenInputs(index, normalized);
        }

        // ---------- Confirm the product in the active row, then open a fresh active row ----------
        $(document).on('click', '#addProductBtn', function () {

            if (!selectedProduct) {
                return;
            }

            var itemData = {
                product_id: selectedProduct.id || '',
                product_name: selectedProduct.name,
                product_image: selectedProduct.image || '',
                quantity: $('#rowQty').val(),
                price: $('#rowPrice').val(),
                discount_type: $('#rowDiscountType').val(),
                discount_value: $('#rowDiscountValue').val(),
                tax_percentage: $('#rowTax').val(),
                show_features: currentFeatures.show_features,
                product_features: currentFeatures.product_features,
                brand_id: currentFeatures.brand_id,
                sku_code: currentFeatures.sku_code,
                hsn_code: currentFeatures.hsn_code,
            };

            addItemRow(itemData);

            // open a fresh active row right below, and jump the cursor straight into it
            renderActiveRow();
            $('#productSearch').focus();

            $('#itemsError').text('');

        });

        // percentage discount can't go above 100 for an already-added row either
        $(document).on('change', '.itemDiscountTypeInput', function () {
            var index = $(this).data('index');
            var $value = $('.itemDiscountValueInput[data-index="' + index + '"]');
            if ($(this).val() === 'percentage') {
                $value.attr('max', 100);
            } else {
                $value.removeAttr('max');
            }
        });

        // ---------- Inline edits on an already-added row recalculate live ----------
        $(document).on('input change', '.itemQtyInput, .itemPriceInput, .itemDiscountTypeInput, .itemDiscountValueInput, .itemTaxInput', function () {

            var index = $(this).data('index');
            var data = items[index];

            if (!data) {
                return;
            }

            data.quantity = parseInt($('.itemQtyInput[data-index="' + index + '"]').val()) || 1;
            data.price = parseFloat($('.itemPriceInput[data-index="' + index + '"]').val()) || 0;
            data.discount_type = $('.itemDiscountTypeInput[data-index="' + index + '"]').val();
            data.discount_value = parseFloat($('.itemDiscountValueInput[data-index="' + index + '"]').val()) || 0;
            data.tax_percentage = parseFloat($('.itemTaxInput[data-index="' + index + '"]').val()) || 0;

            var calc = calcTotal(data.price, data.quantity, data.discount_type, data.discount_value, data.tax_percentage);
            data.total = calc.total;

            $('#itemRow' + index + ' .itemSubTotal').text(calc.total.toFixed(2));

            updateHiddenInputs(index, data);
        });

        function updateHiddenInputs(index, data) {

            var hiddenHtml = ''
                + '<input type="hidden" name="items[' + index + '][product_id]" value="' + (data.product_id ?? '') + '">'
                + '<input type="hidden" name="items[' + index + '][product_name]" value="' + $('<div>').text(data.product_name ?? '').html() + '">'
                + '<input type="hidden" name="items[' + index + '][product_image]" value="' + (data.product_image ?? '') + '">'
                + '<input type="hidden" name="items[' + index + '][product_features]" value="' + $('<div>').text(data.product_features ?? '').html() + '">'
                + '<input type="hidden" name="items[' + index + '][show_features]" value="' + (data.show_features ? '1' : '0') + '">'
                // SKU / HSN / Brand disabled for now — kept as empty hidden fields so the backend's
                // expected field names still exist. See the comments near the thead / modal above.
                + '<input type="hidden" name="items[' + index + '][brand_id]" value="' + (data.brand_id ?? '') + '">'
                + '<input type="hidden" name="items[' + index + '][sku_code]" value="' + (data.sku_code ?? '') + '">'
                + '<input type="hidden" name="items[' + index + '][hsn_code]" value="' + (data.hsn_code ?? '') + '">'
                + '<input type="hidden" name="items[' + index + '][price]" value="' + data.price + '">'
                + '<input type="hidden" name="items[' + index + '][discount_type]" value="' + data.discount_type + '">'
                + '<input type="hidden" name="items[' + index + '][discount_value]" value="' + data.discount_value + '">'
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

        // active row always comes last — after any prefilled items — with a fresh search box
        renderActiveRow();

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

    /* Product entry row layout */
    .wm-product-row {
        margin-left: -8px;
        margin-right: -8px;
    }

    .wm-product-row>[class^="col"],
    .wm-product-row>[class*=" col"] {
        padding-left: 8px;
        padding-right: 8px;
        margin-bottom: 0.5rem;
    }

    .wm-icon-btn {
        width: 42px;
        padding: 0.5rem 0 !important;
    }

    /* Search dropdowns (customer + product) */
    .wm-search-dropdown {
        border: 1px solid var(--wm-border);
        border-radius: 8px;
        box-shadow: 0 6px 18px rgba(32, 34, 35, 0.1);
        margin-top: 2px;
        overflow: hidden;
        background: #fff;
    }

    /* Empty dropdown shouldn't leave a stray line under the search box */
    .wm-search-dropdown:empty {
        display: none;
        border: none;
        box-shadow: none;
        margin-top: 0;
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

    /* Let the product-search suggestions dropdown escape the table wrapper
       instead of getting clipped — horizontal scroll still works fine. */
    .wm-items-table-wrap {
        overflow-x: auto;
        overflow-y: visible;
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
        padding: 0.55rem 0.6rem;
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
        white-space: nowrap;
    }

    .wm-quotes-table td .wm-input {
        padding: 0.35rem 0.5rem !important;
        font-size: 0.82rem;
        height: 32px;
        box-sizing: border-box;
    }

    .wm-discount-cell {
        display: flex;
        align-items: center;
        gap: 0;
        padding: 12px 8px !important;
    }

    .wm-discount-cell select,
    .wm-discount-cell input {
        height: 32px;
        box-sizing: border-box;
        margin: 0 !important;
    }

    .wm-discount-cell select {
        max-width: 78px;
        flex: 0 0 auto;
        border-top-right-radius: 0 !important;
        border-bottom-right-radius: 0 !important;
        border-right: none !important;
    }

    .wm-discount-cell input {
        flex: 1 1 auto;
        min-width: 60px;
        border-top-left-radius: 0 !important;
        border-bottom-left-radius: 0 !important;
    }

    .wm-quotes-table .rowFeaturesBtn {
        border-radius: 6px !important;
        border-color: var(--wm-primary) !important;
        color: var(--wm-primary) !important;
        background: #fff !important;
    }

    .wm-quotes-table .rowFeaturesBtn:hover {
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

    /* Previous Quotations side panel */
    .wm-prev-quotes-panel {
        background: #fafafb;
        border: 1px solid var(--wm-border);
        border-radius: 10px;
        padding: 1rem;
        height: 100%;
    }

    .wm-prev-quotes-title {
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        color: var(--wm-muted);
        margin-bottom: 0.75rem;
    }

    .wm-prev-quote-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
        padding: 0.55rem 0.6rem;
        margin-bottom: 6px;
        border: 1px solid var(--wm-border);
        border-radius: 8px;
        background: #ffffff;
        font-size: 0.82rem;
        color: var(--wm-text);
        text-decoration: none;
    }

    .wm-prev-quote-item:last-child {
        margin-bottom: 0;
    }

    .wm-prev-quote-item:hover {
        border-color: var(--wm-primary);
        background: var(--wm-primary-light);
        color: var(--wm-primary);
        text-decoration: none;
    }

    .wm-prev-quote-no {
        font-weight: 700;
    }

    .wm-prev-quote-date {
        color: var(--wm-muted);
        font-size: 0.76rem;
    }

    .wm-prev-quote-amount {
        font-weight: 700;
        white-space: nowrap;
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