@props([
  'title' => null,
  'footer' => null,
  'bodyClass' => '',
  'headerActions' => null,
])
<div {{ $attributes->class(['card']) }}>
  @if($title || $headerActions)
  <div class="card-header d-flex align-items-center justify-content-between">
    <h6 class="mb-0">{{ $title }}</h6>
    @if($headerActions)
      <div class="card-header-actions">{!! $headerActions !!}</div>
    @endif
  </div>
  @endif
  <div class="card-body {{ $bodyClass }}">
    {{ $slot }}
  </div>
  @if(!is_null($footer))
  <div class="card-footer">{!! $footer !!}</div>
  @endif
</div>

