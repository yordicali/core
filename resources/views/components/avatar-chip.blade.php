@props([
  'src' => null,
  'alt' => 'avatar',
  'label' => null,
  'rounded' => true,
  'size' => '40', // px
])
<div {{ $attributes->class('d-inline-flex align-items-center gap-2') }}>
  <img src="{{ $src ?? asset('assets/images/avatars/avatar-1.png') }}" alt="{{ $alt }}" width="{{ $size }}" height="{{ $size }}" class="{{ $rounded ? 'rounded-circle' : 'rounded' }}">
  @if($label)
    <span class="chip-label">{{ $label }}</span>
  @endif
</div>

