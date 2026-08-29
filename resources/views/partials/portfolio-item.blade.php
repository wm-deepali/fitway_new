<div class="portfolio-item">
  <span class="item-num">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
  <div class="item-img">
    <img src="{{ $item->image_url }}" alt="{{ $item->name }}" />
  </div>
  <div class="item-info">
    <div class="content">
      <h5>{{ $item->name }}</h5>
      <span>{{ $item->description }}</span>
    </div>
    <button type="button" class="play-btn" @if ($item->video_url) data-video="{{ $item->video_url }}" @endif>
      <i class="fa-solid fa-play"></i>
    </button>
  </div>
</div>