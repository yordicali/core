@props([
  'value' => 0,
  'color' => 'primary',
  'striped' => false,
  'animated' => false,
  'height' => null, // e.g. '8px'
])
<div class="progress" @if($height) style="height: {{ $height }}" @endif>
  <div class="progress-bar bg-{{ $color }}{{ $striped ? ' progress-bar-striped' : '' }}{{ $animated ? ' progress-bar-animated' : '' }}" role="progressbar" style="width: {{ (int)$value }}%" aria-valuenow="{{ (int)$value }}" aria-valuemin="0" aria-valuemax="100">{{ $slot }}</div>
</div>

