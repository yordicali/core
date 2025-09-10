@props([
  'inputId', // id del input destino en tu formulario
  'text' => 'Seleccionar archivo',
  'return' => 'ruta', // 'ruta' (archivos/..), 'url'
  'variant' => 'secondary',
  'icon' => 'bx bx-folder-open',
])

@php $classes = 'btn btn-' . $variant; @endphp
<button type="button" class="{{ $classes }}" onclick="openMediaSelector('{{ $inputId }}', { return: '{{ $return }}' })">
  @if($icon)<i class="{{ $icon }} me-1"></i>@endif
  {{ $text }}
</button>

@once
  @push('modals')
    @include('archivos.media-modal')
  @endpush
@endonce
