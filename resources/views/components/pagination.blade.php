@props([
  'size' => null, // sm|lg|null
])
<nav {{ $attributes }}>
  <ul class="pagination{{ $size ? ' pagination-'.$size : '' }}">
    {{ $slot }}
  </ul>
  {{-- Ejemplo de item: <li class="page-item active"><a class="page-link" href="#">1</a></li> --}}
  {{-- O usa Laravel links(): {!! $paginator->links() !!} --}}
 </nav>

