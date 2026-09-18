@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    @php $isDraft = $isDraft ?? false; @endphp

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
                        @if($isDraft)
                            Draft Preview
                        @else
                            Preview — {{ $quote->proposal_id }}
                        @endif
                    </li>

                </ol>
            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card wm-quotes-card">

                <div class="card-body wm-preview-body">

                    {{-- Toolbar --}}
                    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2 wm-toolbar">
                        <h5 class="mb-0 wm-toolbar-title">
                            @if($isDraft)
                                Draft Proposal Preview
                            @else
                                Quotation Number #{{ $quote->proposal_id }}
                            @endif
                        </h5>

                        <div class="d-flex align-items-center gap-2">

                            @if($isDraft)

                                <a href="{{ route('admin.quotes.edit', $quote->id) }}"
                                    class="btn btn-secondary wm-btn-cancel mr-2">
                                    <i class="fa fa-arrow-left"></i> Edit
                                </a>

                                <a href="{{ route('admin.quotes.index') }}"
                                    class="btn btn-outline-secondary wm-btn-outline mr-2">
                                    <i class="fa fa-save"></i> Save as Draft
                                </a>

                                <form action="{{ route('admin.quotes.generate', $quote->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-primary wm-btn-primary">
                                        <i class="fa fa-check"></i> Generate Quote
                                    </button>
                                </form>

                            @else

                                <a href="{{ route('admin.quotes.download', $quote->id) }}"
                                    class="btn btn-primary wm-btn-primary">
                                    <i class="fa fa-download"></i> Download PDF
                                </a>

                            @endif

                        </div>
                    </div>

                    @if($isDraft)
                        <div class="alert wm-alert-draft mb-3">
                            <i class="fa fa-info-circle"></i>
                            This is a draft and has not been saved to the database yet. The Proposal ID will be generated
                            and the record will be saved only after you click "Confirm & Generate".
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert wm-alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert wm-alert-danger">{{ session('error') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="alert wm-alert-danger">{{ $errors->first() }}</div>
                    @endif
                    <div class="border rounded p-4 wm-invoice-sheet" style="background: #fff;">

                        {{-- Header --}}
                        <div
                            class="d-flex align-items-start justify-content-between border-bottom pb-3 mb-3 wm-invoice-top">


                            <div>
                                @if(!empty($settings?->company_logo))
                                    <img src="{{ asset('storage/' . $settings->company_logo) }}"
                                        style="max-height: 60px; max-width: 180px;" class="mb-2 d-block">
                                @endif
                                <h5 class="mb-0 wm-invoice-company">{{ $settings?->company_name }}</h5>
                                @if(!empty($settings?->tagline))
                                    <div class="text-muted small wm-invoice-tagline">{{ $settings->tagline }}</div>
                                @endif
                            </div>

                            <div class="text-right">
                                <div class="text-uppercase font-weight-bold wm-invoice-tag"
                                    style="letter-spacing: 1px;">
                                    Quotation
                                </div>
                                <div class="text-muted small mt-1">
                                    No. {{ $isDraft ? 'Not yet generated' : $quote->proposal_id }}<br>
                                    Date: {{ $quote->created_at?->format('d M Y') }}
                                    @if($quote->prepared_by)
                                        <br>Prepared By: {{ $quote->prepared_by }}
                                    @endif
                                </div>
                            </div>

                        </div>

                        {{-- From / Proposal To --}}
                        <div class="row no-gutters border rounded mb-4 overflow-hidden wm-detail-panel">

                            <div class="col-md-6 p-3 border-right wm-detail-block" style="background: #f7f7f8;">
                                <div class="text-uppercase text-muted small font-weight-bold mb-2 wm-detail-heading">
                                    Company Detail</div>
                                <div class="font-weight-bold">{{ $settings?->company_name }}</div>
                                @if($settings?->address)
                                    <div>{{ $settings->address }}</div>
                                @endif
                                @if($settings?->city?->name || $settings?->state?->name || $settings?->pincode)
                                    <div>
                                        {{ $settings?->city?->name }}{{ $settings?->city?->name && $settings?->state?->name ? ', ' : '' }}{{ $settings?->state?->name }}
                                        {{ $settings?->pincode ? '- ' . $settings->pincode : '' }}
                                    </div>
                                @endif
                                @if($settings?->gst_number)
                                    <div>GSTIN: {{ $settings->gst_number }}</div>
                                @endif
                                @if($settings?->phone)
                                    <div>Phone: {{ $settings->phone }}</div>
                                @endif
                                @if($settings?->email)
                                    <div>Email: {{ $settings->email }}</div>
                                @endif
                                @if($settings?->website)
                                    <div>{{ $settings->website }}</div>
                                @endif
                            </div>

                            <div class="col-md-6 p-3 wm-detail-block" style="background: #f7f7f8;">
                                <div class="text-uppercase text-muted small font-weight-bold mb-2 wm-detail-heading">
                                    Customer Detail</div>
                                <div class="font-weight-bold">{{ $quote->customer->customer_name }}</div>
                                @if($quote->customer->business_name)
                                    <div>{{ $quote->customer->business_name }}</div>
                                @endif
                                @if($quote->customer->address)
                                    <div>{{ $quote->customer->address }}</div>
                                @endif
                                @if($quote->customer->city?->name || $quote->customer->state?->name || $quote->customer->pincode)
                                    <div>
                                        {{ $quote->customer->city?->name }}{{ $quote->customer->city?->name && $quote->customer->state?->name ? ', ' : '' }}{{ $quote->customer->state?->name }}
                                        {{ $quote->customer->pincode ? '- ' . $quote->customer->pincode : '' }}
                                    </div>
                                @endif
                                @if($quote->customer->gst_number)
                                    <div>GSTIN: {{ $quote->customer->gst_number }}</div>
                                @endif
                                <div>Phone: {{ $quote->customer->mobile_number }}</div>
                                @if($quote->customer->email)
                                    <div>Email: {{ $quote->customer->email }}</div>
                                @endif
                            </div>

                        </div>

                        {{-- Items --}}
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle mb-0 wm-invoice-table">
                                <thead class="wm-invoice-thead">
                                    <tr>
                                        <th style="width: 70px;">Image</th>
                                        <th>Product</th>
                                        <th class="text-right" style="width: 50px;">Qty</th>
                                        <th class="text-right" style="width: 100px;">Price</th>
                                        <th class="text-right" style="width: 55px;">Tax</th>
                                        <th class="text-right" style="width: 120px;">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($quote->items as $item)
                                        <tr>
                                            <td class="text-center">
                                                @if($item->product_image)
                                                    <img src="{{ $item->product_image }}"
                                                        style="width: 70px; height: 70px; object-fit: contain; border: 1px solid #eee; border-radius: 4px;">
                                                @else
                                                    <div class="bg-light text-muted small d-flex align-items-center justify-content-center"
                                                        style="width: 70px; height: 70px; border-radius: 4px;">
                                                        No image
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="font-weight-bold">{{ $item->product_name }}</div>

                                                @php
                                                    $hasOptions = $item->brand?->name || $item->sku_code || $item->hsn_code;
                                                @endphp

                                                @if($hasOptions)
                                                    <div class="text-muted small mt-1">
                                                        @if($item->brand?->name)
                                                            <div><strong>Brand:</strong> {{ $item->brand->name }}</div>
                                                        @endif
                                                        @if($item->sku_code)
                                                            <div><strong>SKU:</strong> {{ $item->sku_code }}</div>
                                                        @endif
                                                        @if($item->hsn_code)
                                                            <div><strong>HSN:</strong> {{ $item->hsn_code }}</div>
                                                        @endif
                                                    </div>
                                                @endif

                                                {{-- Features print only if explicitly checked while adding the item --}}
                                                @if($item->show_features && $item->product_features)
                                                    <div class="text-muted small mt-1 wm-item-features">
                                                        <strong>Features:</strong>
                                                        {!! $item->product_features !!}
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="text-right">{{ $item->quantity }}</td>
                                            <td class="text-right">₹{{ number_format($item->price, 2) }}</td>
                                            <td class="text-right">
                                                {{ rtrim(rtrim(number_format($item->tax_percentage, 2), '0'), '.') }}%
                                            </td>
                                            <td class="text-right wm-invoice-item-total">
                                                ₹{{ number_format($item->total_price, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Grand total --}}
                        @php
                            // Sub Total is the pre-tax value of all items combined (price x qty),
                            // plus (packing_charges x packing_qty) and (shipping_charges x shipping_qty).
                            // Each is taxed independently at its own percentage — matches QuoteController@store.
                            $subTotal = $quote->items->sum(function ($item) {
                                return $item->price * $item->quantity;
                            });

                            $discount = $quote->discount_amount ?? 0;

                            $packingRate = $quote->packing_charges ?? 0;
                            $packingQty = $quote->packing_quantity ?? 1;
                            $packingAmount = $packingRate * $packingQty;

                            $shippingRate = $quote->shipping_charges ?? 0;
                            $shippingQty = $quote->shipping_quantity ?? 1;
                            $shippingAmount = $shippingRate * $shippingQty;

                            $subTotal += $packingAmount + $shippingAmount;

                            $taxes = $quote->items->sum(function ($item) {
                                return ($item->price * $item->quantity) * ($item->tax_percentage / 100);
                            });

                            $packingTax = $packingAmount * (($quote->packing_tax_percentage ?? 0) / 100);
                            $shippingTax = $shippingAmount * (($quote->shipping_tax_percentage ?? 0) / 100);

                            $taxes += $packingTax + $shippingTax;
                        @endphp

                        <div class="d-flex justify-content-end mt-3">
                            <div class="wm-grand-total" style="min-width:350px;">

                                <div class="d-flex justify-content-between mb-1">
                                    <span>Sub Total</span>
                                    <span>₹{{ number_format($subTotal, 2) }}</span>
                                </div>

                                <div class="d-flex justify-content-between mb-1">
                                    <span>Discount</span>
                                    <span>-₹{{ number_format($discount, 2) }}</span>
                                </div>

                                <div class="d-flex justify-content-between mb-1">
                                    <span>Packaging Charges
                                        <span class="wm-charge-meta">({{ $packingQty }} x
                                            ₹{{ number_format($packingRate, 2) }})</span>
                                    </span>
                                    <span>₹{{ number_format($packingAmount, 2) }}</span>
                                </div>

                                <div class="d-flex justify-content-between mb-1">
                                    <span>Shipping Charges
                                        <span class="wm-charge-meta">({{ $shippingQty }} x
                                            ₹{{ number_format($shippingRate, 2) }})</span>
                                    </span>
                                    <span>₹{{ number_format($shippingAmount, 2) }}</span>
                                </div>

                                <div class="d-flex justify-content-between mb-1">
                                    <span>Taxes</span>
                                    <span>₹{{ number_format($taxes, 2) }}</span>
                                </div>

                                <div class="d-flex justify-content-between border-top pt-2 mt-2">
                                    <strong>Total</strong>
                                    <strong class="wm-grand-total-amount">
                                        ₹{{ number_format($quote->total_amount, 2) }}
                                    </strong>
                                </div>

                            </div>
                        </div>

                        {{-- Bank Details --}}
                        @if($settings?->bank_name || $settings?->account_name || $settings?->account_number || $settings?->ifsc_code || $settings?->upi_id || $settings?->qr_code)
                            <div class="border-top mt-4 pt-3">
                                <div class="text-uppercase text-muted small font-weight-bold mb-2 wm-detail-heading">Bank
                                    Details</div>

                                <div class="row no-gutters">

                                    <div class="col-md-8 small">
                                        @if($settings?->bank_name)
                                            <div><span class="text-muted">Bank Name:</span> {{ $settings->bank_name }}</div>
                                        @endif
                                        @if($settings?->account_name)
                                            <div><span class="text-muted">Account Name:</span> {{ $settings->account_name }}
                                            </div>
                                        @endif
                                        @if($settings?->account_number)
                                            <div><span class="text-muted">Account Number:</span> {{ $settings->account_number }}
                                            </div>
                                        @endif
                                        @if($settings?->ifsc_code)
                                            <div><span class="text-muted">IFSC Code:</span> {{ $settings->ifsc_code }}</div>
                                        @endif
                                        @if($settings?->upi_id)
                                            <div><span class="text-muted">UPI ID:</span> {{ $settings->upi_id }}</div>
                                        @endif
                                    </div>

                                    @if($settings?->qr_code)
                                        <div class="col-md-4 text-md-right text-left mt-2 mt-md-0">
                                            <img src="{{ asset('storage/' . $settings->qr_code) }}"
                                                style="width: 110px; height: 110px; object-fit: contain; border: 1px solid #eee; border-radius: 4px;">
                                            <div class="text-muted small mt-1">Scan to pay</div>
                                        </div>
                                    @endif

                                </div>

                            </div>
                        @endif

                        {{-- Terms --}}
                        @if(!empty($settings?->terms_conditions))
                            <div class="border-top mt-4 pt-3">
                                <div class="text-uppercase text-muted small font-weight-bold mb-2 wm-detail-heading">Terms &
                                    Conditions</div>
                                <div class="small text-muted">
                                    {!! $settings->terms_conditions !!}
                                </div>
                            </div>
                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')

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

    .wm-invoice-tagline {
        font-style: italic;
    }

    .wm-quotes-card {
        border: 1px solid var(--wm-border);
        border-radius: var(--wm-radius);
        box-shadow: 0 1px 3px rgba(0, 0, 0, .08), 0 0 0 1px var(--wm-border);
        overflow: hidden;
    }

    .wm-preview-body {
        padding: 1.75rem;
    }

    .wm-toolbar {
        padding-bottom: 1rem;
        border-bottom: 1px solid var(--wm-border);
    }

    .wm-toolbar-title {
        font-weight: 650;
        color: var(--wm-text);
    }

    /* Buttons */
    .wm-btn-primary {
        background-color: var(--wm-primary) !important;
        border-color: var(--wm-primary) !important;
        color: #ffffff !important;
        border-radius: 8px !important;
        font-weight: 600 !important;
        padding: 0.5rem 1rem !important;
        transition: all 0.15s ease;
    }

    .wm-btn-primary:hover {
        background-color: var(--wm-primary-hover) !important;
        border-color: var(--wm-primary-hover) !important;
        color: #ffffff !important;
    }

    .wm-btn-cancel {
        border-radius: 8px !important;
        font-weight: 600 !important;
        padding: 0.5rem 1rem !important;
        background-color: #fff !important;
        border-color: var(--wm-border) !important;
        color: var(--wm-muted) !important;
    }

    /* Alerts */
    .wm-alert-success {
        background-color: #eef0fa;
        border: 1px solid #cfd4ee;
        color: var(--wm-primary);
        border-radius: 8px;
        font-weight: 500;
    }

    .wm-alert-danger {
        background-color: #fbeceb;
        border: 1px solid #f3cfcc;
        color: #b3261e;
        border-radius: 8px;
        font-weight: 500;
    }

    .wm-alert-draft {
        background-color: #fff8e1;
        border: 1px solid #ffe4a1;
        color: #8a6300;
        border-radius: 8px;
        font-weight: 500;
        padding: 0.7rem 1rem;
        font-size: 0.88rem;
    }

    /* Invoice sheet */
    .wm-invoice-sheet {
        border-color: var(--wm-border) !important;
        border-radius: var(--wm-radius) !important;
    }

    .wm-invoice-top {
        border-bottom-color: var(--wm-border) !important;
    }

    .wm-invoice-company {
        font-weight: 650;
        color: var(--wm-text);
    }

    .wm-invoice-tag {
        color: var(--wm-primary);
        font-size: 0.85rem;
    }

    .wm-detail-panel {
        border-color: var(--wm-border) !important;
        border-radius: 8px !important;
    }

    .wm-detail-block {
        background-color: var(--wm-primary-light) !important;
        font-size: 0.88rem;
        line-height: 1.6;
    }

    .wm-detail-block .border-right {
        border-color: var(--wm-border) !important;
    }

    .wm-detail-heading {
        color: var(--wm-primary) !important;
        letter-spacing: 0.5px;
    }

    /* Items table */
    .wm-invoice-table {
        border-color: var(--wm-border) !important;
    }

    .wm-invoice-table td,
    .wm-invoice-table th {
        border-color: var(--wm-border) !important;
    }

    .wm-invoice-thead {
        background-color: var(--wm-primary) !important;
        color: #ffffff !important;
    }

    .wm-invoice-thead th {
        font-weight: 600;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        border-color: var(--wm-primary) !important;
    }

    .wm-invoice-item-total {
        font-weight: 700;
        color: var(--wm-primary);
    }

    .wm-item-features {
        line-height: 1.4;
    }

    /* Grand total */
    .wm-grand-total {
        background-color: var(--wm-primary-light);
        border-radius: 8px;
        padding: 0.75rem 1rem;
    }

    .wm-grand-total .border-top {
        border-top-color: var(--wm-primary) !important;
        border-top-width: 2px !important;
    }

    .wm-grand-total-amount {
        color: var(--wm-primary);
        font-size: 1.1rem;
    }

    .wm-charge-meta {
        font-size: 0.78rem;
        color: var(--wm-muted);
    }

    /* Responsive */
    @media (max-width: 576px) {
        .wm-preview-body {
            padding: 1.1rem;
        }

        .wm-detail-block.border-right {
            border-right: none !important;
            border-bottom: 1px solid var(--wm-border) !important;
        }
    }
</style>