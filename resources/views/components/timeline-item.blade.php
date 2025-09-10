@props([
  'time' => null,
  'title' => null,
  'subtitle' => null,
  'dotColor' => 'primary',
])
<div class="timeline-item d-flex">
  <div class="me-3">
    <span class="badge bg-{{ $dotColor }} rounded-pill">&nbsp;</span>
  </div>
  <div class="flex-grow-1">
    @if($time)<small class="text-muted d-block mb-1">{{ $time }}</small>@endif
    @if($title)<h6 class="mb-1">{{ $title }}</h6>@endif
    @if($subtitle)<div class="text-muted mb-1">{{ $subtitle }}</div>@endif
    <div>{{ $slot }}</div>
  </div>
</div>

