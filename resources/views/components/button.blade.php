@php
  if (!isset($attributes) || !($attributes instanceof \Illuminate\View\ComponentAttributeBag)) {
      $attributes = new \Illuminate\View\ComponentAttributeBag;
  }
@endphp
@props([
  'type' => 'submit', // button|submit|reset
  'variant' => 'primary', // primary|secondary|...
  'outline' => false,
  'size' => null, // sm|lg|null
  'href' => null,
  'icon' => null, // e.g. 'bx bx-plus'
])
@php
  $classes = 'radius-30 btn '.($outline ? 'btn-outline-' : 'btn-').$variant.($size ? ' btn-'.$size : '');
@endphp
@if($href)
  <a href="{{ $href }}" {{ $attributes->class($classes) }}>
    @if($icon)<i class="{{ $icon }} me-1"></i>@endif
    {{ $slot }}
  </a>
@else
  <button type="{{ $type }}" {{ $attributes->class($classes) }}>
    @if($icon)<i class="{{ $icon }} me-1"></i>@endif
    {{ $slot }}
  </button>
@endif
