<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $quote->proposal_id }}</title>

    <style>
        * {
            box-sizing: border-box;
        }

        /* ==========================================================
           Page setup — dompdf reads @page for per-page margins.
           Top margin fits the header (logo + company block + black
           bar + meta band).
           ========================================================== */
        @page {
            margin: 206px 22px 95px 22px;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            color: #202223;
            margin: 0;
        }

        .sheet {
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .muted {
            color: #6d7175;
        }

        .text-right {
            text-align: right;
        }

        /* ==========================================================
           REPEATING HEADER — logo left / company block right, black
           divider bar, then a grey meta band with Quotation Number /
           Date / Prepared By.
           ========================================================== */
        .pdf-header {
            position: fixed;
            top: -191px;
            left: 0;
            right: 0;
            height: 165px;
        }

        .pdf-header .header-shade {
            background: #ffffff;
            padding: 16px 22px 14px 22px;
        }

        .pdf-header .header-table td {
            vertical-align: middle;
        }

        .pdf-header .logo-col {
            width: 105px;
            padding-right: 18px;
        }

        .pdf-header .logo {
            max-width: 100px;
            max-height: 100px;
        }

        .pdf-header .company-name {
            font-size: 22px;
            font-weight: bold;
            color: #202223;
            margin: 0 0 5px 0;
        }

        .pdf-header .company-line {
            font-size: 10px;
            color: #202223;
            line-height: 1.3;
            margin-bottom: 1px;
        }

        .pdf-header .company-line strong {
            color: #202223;
        }

        .pdf-header .company-line span {
            margin-right: 16px;
        }

        .pdf-header .header-black-bar {
            background: #111111;
            height: 6px;
        }

        .pdf-header .header-meta-band {
            background: #eef0fa;
            padding: 8px 22px;
        }

        .pdf-header .header-meta-table td {
            font-size: 10px;
            color: #202223;
            vertical-align: middle;
        }

        .pdf-header .header-meta-table td strong {
            font-weight: bold;
        }

        /* ==========================================================
           REPEATING FOOTER
           ========================================================== */
        .pdf-footer {
            position: fixed;
            bottom: -78px;
            left: 0;
            right: 0;
            height: 65px;
            background: #f6f6fa;
            border-top: 2px solid #303d89;
            padding-top: 10px;
            text-align: center;
            font-size: 9px;
            color: #6d7175;
            line-height: 1.6;
        }

        .pdf-footer .footer-address {
            color: #6d7175;
        }

        .pdf-footer .footer-contact {
            margin-top: 2px;
        }

        .pdf-footer .footer-contact strong {
            color: #303d89;
        }

        .pdf-footer .page-num {
            margin-top: 4px;
            font-size: 8.5px;
            color: #a3a8c0;
        }

        .pdf-footer .page-num:after {
            content: "Page " counter(page) " of " counter(pages);
        }

        .company-intro {
            font-size: 10.5px;
            color: #6d7175;
            margin-bottom: 12px;
        }

        .company-intro p {
            margin: 0 0 6px 0;
        }

        /* ==========================================================
           Parties block
           ========================================================== */
        .parties-table {
            page-break-inside: avoid;
        }

        .parties-table td {
            width: 50%;
            vertical-align: top;
            padding: 12px 15px;
            background: #eef0fa;
        }

        .parties-table td.from-block {
            border-right: 1px solid #e3e5e8;
        }

        .block-title {
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #303d89;
            margin-bottom: 6px;
        }

        .party-name {
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 2px;
            color: #202223;
        }

        /* ---------- Items table (repeats header row on every page) ---------- */
        .items-table {
            margin-top: 18px;
            border: 1px solid #e3e5e8;
        }

        .items-table thead {
            display: table-header-group;
        }

        .items-table tbody tr {
            page-break-inside: avoid;
        }

        .items-table th {
            background: #303d89;
            color: #ffffff;
            text-align: left;
            padding: 8px 10px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            border: 1px solid #303d89;
        }

        .items-table td {
            padding: 10px;
            border: 1px solid #e3e5e8;
            vertical-align: top;
        }

        .product-image-cell {
            width: 74px;
            text-align: center;
        }

        .product-image {
            width: 70px;
            height: 70px;
            border: 1px solid #eee;
            border-radius: 4px;
        }

        .no-image-box {
            width: 70px;
            height: 70px;
            line-height: 70px;
            text-align: center;
            background: #f6f6fa;
            color: #6d7175;
            font-size: 9px;
            border-radius: 4px;
            border: 1px solid #e3e5e8;
        }

        .product-name {
            font-weight: bold;
            font-size: 12px;
            color: #202223;
        }

        /* Brand / SKU / HSN — one per row, easy to scan */
        .product-options {
            color: #6d7175;
            font-size: 10px;
            margin-top: 4px;
        }

        .product-options div {
            margin-bottom: 2px;
        }

        .product-options strong {
            color: #202223;
        }

        .product-features {
            color: #6d7175;
            font-size: 10px;
            margin-top: 4px;
            line-height: 1.4;
        }

        .product-features strong {
            color: #202223;
        }

        .items-table td.text-right,
        .items-table th.text-right,
        .totals-table td.text-right {
            white-space: nowrap;
        }

        .item-total {
            font-weight: bold;
            color: #303d89;
        }

        /* ---------- /Items table ---------- */

        .totals-table {
            width: 260px;
            margin-left: auto;
            margin-top: 10px;
            background: #eef0fa;
            page-break-inside: avoid;
        }

        .totals-table td {
            padding: 6px 10px;
        }

        .totals-table .grand-total-row td {
            border-top: 2px solid #303d89;
            font-size: 14px;
            font-weight: bold;
            color: #303d89;
        }

        .bank-details {
            margin-top: 30px;
            border-top: 1px solid #e3e5e8;
            padding-top: 15px;
            font-size: 10.5px;
            color: #555;
            page-break-inside: avoid;
        }

        .bank-details .block-title {
            margin-bottom: 8px;
        }

        .bank-details-table td {
            vertical-align: top;
            padding: 0;
        }

        .bank-details-table .qr-image {
            width: 90px;
            height: 90px;
        }

        .bank-details-table .qr-caption {
            color: #6d7175;
            font-size: 9px;
            margin-top: 4px;
        }

        .terms {
            margin-top: 25px;
            font-size: 10.5px;
            color: #555;
        }

        .terms .block-title {
            margin-bottom: 8px;
            page-break-after: avoid;
        }
    </style>
</head>

<body>

    {{-- ==========================================================
    REPEATING HEADER — logo left, company block right (name, address,
    mobile/GSTIN, email, website), black divider bar, then meta band
    with Quotation Number / Date / Prepared By.
    ========================================================== --}}
    <div class="pdf-header">
        <div class="header-shade">
            <table class="header-table">
                <tr>
                    <td class="logo-col">
                        @if(!empty($settings?->pdf_logo_path))
                            <img src="{{ $settings->pdf_logo_path }}" class="logo">
                        @endif
                    </td>
                    <td>
                        <div class="company-name">{{ $settings?->company_name }}</div>

                        @if($settings?->address || $settings?->city?->name || $settings?->state?->name || $settings?->pincode)
                            <div class="company-line">
                                {{ $settings?->address }}{{ $settings?->address && ($settings?->city?->name || $settings?->state?->name || $settings?->pincode) ? ', ' : '' }}{{ $settings?->city?->name }}{{ $settings?->city?->name && $settings?->state?->name ? ', ' : '' }}{{ $settings?->state?->name }}{{ $settings?->pincode ? ', ' . $settings->pincode : '' }}
                            </div>
                        @endif

                        @if($settings?->phone || $settings?->gst_number)
                            <div class="company-line">
                                @if($settings?->phone)
                                    <span><strong>Mobile:</strong> {{ $settings->phone }}</span>
                                @endif
                                @if($settings?->gst_number)
                                    <span><strong>GSTIN:</strong> {{ $settings->gst_number }}</span>
                                @endif
                            </div>
                        @endif

                        @if($settings?->email)
                            <div class="company-line"><strong>Email:</strong> {{ $settings->email }}</div>
                        @endif

                        @if($settings?->website)
                            <div class="company-line"><strong>www:</strong> {{ $settings->website }}</div>
                        @endif
                    </td>
                </tr>
            </table>
        </div>

        <div class="header-black-bar"></div>

        <div class="header-meta-band">
            <table class="header-meta-table">
                <tr>
                    <td><strong>Quotation Number:</strong> {{ $quote->proposal_id }}</td>
                    <td><strong>Quotation Date:</strong> {{ $quote->created_at?->format('d/m/Y') }}</td>
                    <td><strong>Prepared By:</strong> {{ $quote->prepared_by ?: 'Sales Team' }}</td>
                </tr>
            </table>
        </div>
    </div>

    {{-- ==========================================================
    Repeating footer.
    ========================================================== --}}
    <div class="pdf-footer">
        <div class="footer-address">1025, Tower A, GrandSlam Ithum, Sector - 62, Noida, Uttar Pradesh, India</div>
        <div class="footer-contact"><strong>Mobile:</strong> +91-7607770184 &nbsp;|&nbsp; <strong>Email:</strong>
            business@webmingo.com</div>
        <div class="page-num"></div>
    </div>

    <div class="sheet">

        {{-- From / Proposal To --}}
        <table class="parties-table">

            <tr>
                <td class="from-block">
                    <div class="block-title">Company Detail</div>
                    <div class="party-name">{{ $settings?->company_name }}</div>
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
                </td>
                <td>
                    <div class="block-title">Customer Detail</div>
                    <div class="party-name">{{ $quote->customer->customer_name }}</div>
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
                </td>
            </tr>
        </table>

        {{-- Items --}}
        <table class="items-table">
            <thead>
                <tr>
                    <th style="width: 55px;">Image</th>
                    <th>Product</th>
                    <th class="text-right" style="width: 35px;">Qty</th>
                    <th class="text-right" style="width: 70px;">Price</th>
                    <th class="text-right" style="width: 45px;">Tax</th>
                    <th class="text-right" style="width: 90px;">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($quote->items as $item)
                    <tr>
                        <td class="product-image-cell">
                            @if($item->pdf_image_path)
                                <img src="{{ $item->pdf_image_path }}" class="product-image">
                            @else
                                <div class="no-image-box">No image</div>
                            @endif
                        </td>
                        <td>
                            <div class="product-name">{{ $item->product_name }}</div>

                            @php
                                $hasOptions = $item->brand?->name || $item->sku_code || $item->hsn_code;
                            @endphp

                            @if($hasOptions)
                                <div class="product-options">
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
                                <div class="product-features">
                                    <strong>Features:</strong> {!! $item->product_features !!}
                                </div>
                            @endif
                        </td>
                        <td class="text-right">{{ $item->quantity }}</td>
                        <td class="text-right">&#8377;{{ number_format($item->price, 2) }}</td>
                        <td class="text-right">{{ rtrim(rtrim(number_format($item->tax_percentage, 2), '0'), '.') }}%</td>
                        <td class="text-right item-total">&#8377;{{ number_format($item->total_price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

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

        <table class="totals-table">

            <tr>
                <td>Sub Total</td>
                <td class="text-right">&#8377;{{ number_format($subTotal, 2) }}</td>
            </tr>

            <tr>
                <td>Discount</td>
                <td class="text-right">-&#8377;{{ number_format($discount, 2) }}</td>
            </tr>

            <tr>
                <td>Packaging Charges ({{ $packingQty }} x &#8377;{{ number_format($packingRate, 2) }})</td>
                <td class="text-right">&#8377;{{ number_format($packingAmount, 2) }}</td>
            </tr>

            <tr>
                <td>Shipping Charges ({{ $shippingQty }} x &#8377;{{ number_format($shippingRate, 2) }})</td>
                <td class="text-right">&#8377;{{ number_format($shippingAmount, 2) }}</td>
            </tr>

            <tr>
                <td>Taxes</td>
                <td class="text-right">&#8377;{{ number_format($taxes, 2) }}</td>
            </tr>

            <tr class="grand-total-row">
                <td>Total</td>
                <td class="text-right">&#8377;{{ number_format($quote->total_amount, 2) }}</td>
            </tr>

        </table>

        {{-- Bank Details --}}
        @if($settings?->bank_name || $settings?->account_name || $settings?->account_number || $settings?->ifsc_code || $settings?->upi_id || $settings?->qr_code)
            <div class="bank-details">
                <div class="block-title">Bank Details</div>

                <table class="bank-details-table">
                    <tr>
                        <td style="width: 70%;">
                            @if($settings?->bank_name)
                                <div><span class="muted">Bank Name:</span> {{ $settings->bank_name }}</div>
                            @endif
                            @if($settings?->account_name)
                                <div><span class="muted">Account Name:</span> {{ $settings->account_name }}</div>
                            @endif
                            @if($settings?->account_number)
                                <div><span class="muted">Account Number:</span> {{ $settings->account_number }}</div>
                            @endif
                            @if($settings?->ifsc_code)
                                <div><span class="muted">IFSC Code:</span> {{ $settings->ifsc_code }}</div>
                            @endif
                            @if($settings?->upi_id)
                                <div><span class="muted">UPI ID:</span> {{ $settings->upi_id }}</div>
                            @endif
                        </td>
                        @if(!empty($settings?->pdf_qr_path))
                            <td style="width: 30%;" class="text-right">
                                <img src="{{ $settings->pdf_qr_path }}" class="qr-image">
                                <div class="qr-caption">Scan to pay</div>
                            </td>
                        @endif
                    </tr>
                </table>

            </div>
        @endif

        {{-- Terms --}}
        @if(!empty($settings?->terms_conditions))
            <div class="terms">
                <div class="block-title">Terms & Conditions</div>
                {!! $settings->terms_conditions !!}
            </div>
        @endif

    </div>

</body>

</html>