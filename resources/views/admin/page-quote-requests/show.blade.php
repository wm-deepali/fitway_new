@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    <div class="app-content content container-fluid">
        <div class="cat-page" style="padding:24px 28px;max-width:700px;">
            <h1 style="font-size:20px;font-weight:650;margin-bottom:20px;">Page Quote Request #{{ $pageQuoteRequest->id }}</h1>

            <div class="cat-card" style="padding:24px;">
                <p><strong>Name:</strong> {{ $pageQuoteRequest->full_name }}</p>
                <p><strong>Mobile:</strong> {{ $pageQuoteRequest->mobile_number }}</p>
                <p><strong>Email:</strong> {{ $pageQuoteRequest->email ?? '—' }}</p>
                <p><strong>Page:</strong> {{ $pageQuoteRequest->page_id ?? '—' }}</p>
                <p><strong>Details:</strong> {{ $pageQuoteRequest->details ?? '—' }}</p>
                <p><strong>Submitted:</strong> {{ $pageQuoteRequest->created_at->format('d M Y, h:i A') }}</p>

                <a href="{{ route('admin.pageQuoteRequests.index') }}" class="btn-secondary-dash" style="margin-top:16px;">
                    <i class="fa fa-arrow-left"></i> Back to list
                </a>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')