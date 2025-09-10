@props([
  'type' => 'primary',
  'pill' => false,
])
<span {{ $attributes->class(['badge','bg-'.$type, 'rounded-pill' => $pill]) }}>{{ $slot }}</span>

