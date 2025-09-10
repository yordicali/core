@props([
  'icon' => 'bx bx-bell',
  'color' => 'primary', // primary|danger|success|warning|info
  'title' => '',
  'time' => '',
])
<a class="dropdown-item" href="javascript:;">
  <div class="d-flex align-items-center">
    <div class="notify bg-light-{{ $color }} text-{{ $color }}"><i class="{{ $icon }}"></i></div>
    <div class="flex-grow-1">
      <h6 class="msg-name">{{ $title }} @if($time)<span class="msg-time float-end">{{ $time }}</span>@endif</h6>
      <p class="msg-info">{{ $slot }}</p>
    </div>
  </div>
 </a>

