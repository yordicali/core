@props([
  'id' => 'carouselExample',
  'controls' => true,
  'indicators' => true,
  'ride' => null, // 'carousel'
])
<div id="{{ $id }}" class="carousel slide" @if($ride) data-bs-ride="{{ $ride }}" @endif>
  @if($indicators)
  <div class="carousel-indicators">
    {{ $indicatorsSlot ?? '' }}
  </div>
  @endif

  <div class="carousel-inner">
    {{ $slot }}
  </div>

  @if($controls)
  <button class="carousel-control-prev" type="button" data-bs-target="#{{ $id }}" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#{{ $id }}" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
  @endif
</div>

