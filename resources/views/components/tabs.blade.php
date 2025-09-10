@props([
  'id' => 'tabsExample',
  'pills' => false,
])
@php $navClass = $pills ? 'nav nav-pills' : 'nav nav-tabs'; @endphp
<ul class="{{ $navClass }}" id="{{ $id }}" role="tablist">
  {{ $tabs ?? '' }}
  {{-- Ejemplo de tab header:
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
  </li>
  --}}
  {{ $slot }}
  {{-- Puedes pasar headers como slot si deseas --}}
</ul>
{{-- Contenido de pestañas:
<div class="tab-content mt-3" id="{{ $id }}Content">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
</div>
--}}

