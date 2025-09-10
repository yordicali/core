@props([
  'type' => 'border', // border|grow
  'color' => 'primary',
  'size' => null, // sm|null
  'label' => null,
])
@php
  $class = 'spinner-'.$type.' text-'.$color.($size ? ' spinner-'.$type.'-'.$size : '');
@endphp
<div {{ $attributes->class($class) }} role="status">
  @if($label)
    <span class="visually-hidden">{{ $label }}</span>
  @endif
</div>

