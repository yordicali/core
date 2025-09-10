@props([
  'img' => null,
  'alt' => '',
  'imgClass' => 'flex-shrink-0 me-3 rounded',
])
<div {{ $attributes->class('d-flex') }}>
  @if($img)
    <img src="{{ $img }}" class="{{ $imgClass }}" alt="{{ $alt }}">
  @endif
  <div>
    {{ $slot }}
  </div>
</div>

