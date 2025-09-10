<div class="table-responsive">
  <table class="table table-striped align-middle">
    <thead>
      <tr>
        <th>#</th>
        <th>Vista</th>
        <th>Nombre</th>
        <th>Tamaño</th>
        <th>MIME</th>
        <th>Fecha</th>
        <th class="text-end">Acciones</th>
      </tr>
    </thead>
    <tbody>
    @foreach($archivos as $archivo)
      <tr>
        <td>{{ $archivo->id }}</td>
        <td>
          @php $url = asset('storage/'.$archivo->ruta); @endphp
          @php $isImg = $archivo->mime && strpos($archivo->mime, 'image/') === 0; @endphp
          @if($isImg)
            <img src="{{ $url }}" alt="prev" style="width:40px;height:40px;object-fit:cover;border-radius:6px;">
          @else
            <a href="{{ $url }}" target="_blank"><i class="bx bx-file fs-4"></i></a>
          @endif
        </td>
        <td><a href="{{ $url }}" target="_blank" data-ruta="{{ $archivo->ruta }}">{{ $archivo->nombre_original }}</a></td>
        <td>{{ $archivo->size ? number_format($archivo->size/1024,1) . ' KB' : '—' }}</td>
        <td>{{ $archivo->mime ?? '—' }}</td>
        <td>{{ $archivo->created_at?->format('Y-m-d H:i') }}</td>
        <td class="text-end">
          <form action="{{ route('archivos.destroy', $archivo) }}" method="POST" class="d-inline" data-confirm="¿Eliminar este archivo?">
            @csrf
            @method('DELETE')
            @include('components.button', [
              'type' => 'submit',
              'variant' => 'danger',
              'size' => 'sm',
              'icon' => 'bx bx-trash',
              'slot' => 'Eliminar'
            ])
          </form>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
<div class="mt-3">
  {!! $archivos->links() !!}
  <small class="text-muted">Mostrando {{ $archivos->count() }} de {{ $archivos->total() }}</small>
</div>
