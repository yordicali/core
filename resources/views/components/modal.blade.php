@props([
  'id',
  'title' => null,
  'size' => null, // sm|lg|xl|null
  'centered' => false,
  'scrollable' => false,
  'backdrop' => true,
])
@php
  $dialogClasses = 'modal-dialog';
  if ($size) $dialogClasses .= ' modal-' . $size;
  if ($centered) $dialogClasses .= ' modal-dialog-centered';
  if ($scrollable) $dialogClasses .= ' modal-dialog-scrollable';
@endphp
<div class="modal fade" id="{{ $id }}" tabindex="-1" @if(!$backdrop) data-bs-backdrop="static" data-bs-keyboard="false" @endif aria-hidden="true">
  <div class="{{ $dialogClasses }}">
    <div class="modal-content">
      @if($title)
      <div class="modal-header">
        <h5 class="modal-title">{{ $title }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      @endif
      <div class="modal-body">
        {{ $slot }}
      </div>
      @isset($footer)
      <div class="modal-footer">{!! $footer !!}</div>
      @endisset
    </div>
  </div>
  </div>

