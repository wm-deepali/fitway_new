<div class="equip-card">
    <a href="{{ route('product-detail', $product->slug) }}" class="equip-card__img">
        <img src="{{ $product->image_url }}" alt="{{ $product->image_alt }}" />
    </a>
    <div class="equip-card__body">
        <span class="equip-card__cat">{{ $product->category_path }}</span>
        <h5>{{ $product->name }}</h5>
        <div class="btns">
            <button type="button" class="btn btn-primary js-enquire-now"
                data-product-id="{{ $product->id }}" data-product-name="{{ $product->name }}">
                Enquire Now
            </button>
            <a href="{{ route('product-detail', $product->slug) }}" class="btn btn-gray">View
                Detail</a>
        </div>
    </div>
</div>