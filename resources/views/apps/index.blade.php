@extends('layouts.app')

@section('content')
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="mb-0">Apps</h4>
    @include('components.button', [
      'href' => route('apps.create'),
      'variant' => 'primary',
      'icon' => 'bx bx-plus',
      'slot' => 'Nueva app'
    ])
  </div>

  @if(session('status'))
    @include('components.alert', [
      'type' => 'success',
      'dismissible' => true,
      'slot' => session('status')
    ])
  @endif

  <div class="card">
    <div class="card-body">
      <form method="GET" action="{{ route('apps.index') }}" class="row g-2 mb-3">
        <div class="col-auto">
          <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Buscar por nombre o descripción corta">
        </div>
        <div class="col-auto">
          @include('components.button', [
            'type' => 'submit',
            'variant' => 'secondary',
            'icon' => 'bx bx-search',
            'slot' => 'Buscar'
          ])
        </div>
      </form>

      <div class="table-responsive">
        <table class="table table-striped align-middle">
          <thead>
            <tr>
              <th>#</th>
              <th>Logo</th>
              <th>Nombre</th>
              <th>Icono</th>
              <th>Color</th>
              <th>Descripción corta</th>
              <th>Creador</th>
              <th>Estado</th>
              <th class="text-end">Acciones</th>
            </tr>
          </thead>
          <tbody>
          @forelse($apps as $app)
            <tr>
              <td>{{ $app->id }}</td>
              <td>
                @if($app->logo)
                  <img src="{{ asset('storage/'.$app->logo) }}" alt="logo" style="width:40px;height:40px;object-fit:cover;border-radius:6px;">
                @else
                  <span class="text-muted">—</span>
                @endif
              </td>
              <td>{{ $app->nombre }}</td>
              <td>
                @if($app->icono)
                  <i class="{{ $app->icono }} fs-5"></i>
                @else
                  <span class="text-muted">—</span>
                @endif
              </td>
              <td>
                @if($app->color_base)
                  <span class="d-inline-block" style="width:18px;height:18px;border-radius:4px;background: {{ $app->color_base }};border:1px solid #ddd"></span>
                  <small class="text-muted ms-1">{{ $app->color_base }}</small>
                @else
                  <span class="text-muted">—</span>
                @endif
              </td>
              <td>{{ $app->descripcion_corta }}</td>
              <td>{{ $app->creador_id }}</td>
              <td>
                @if($app->estado === 'disponible')
                  <span class="badge bg-success">Disponible</span>
                @else
                  <span class="badge bg-secondary">Inactiva</span>
                @endif
              </td>
              <td class="text-end">
                @include('components.button', [
                  'href' => route('apps.show', $app),
                  'variant' => 'secondary',
                  'size' => 'sm',
                  'icon' => 'bx bx-show',
                  'slot' => 'Ver'
                ])
                @include('components.button', [
                  'href' => route('apps.edit', $app),
                  'variant' => 'warning',
                  'size' => 'sm',
                  'icon' => 'bx bx-edit',
                  'slot' => 'Editar'
                ])
                @include('components.button', [
                  'href' => route('apps.funciones.index', $app),
                  'variant' => 'info',
                  'size' => 'sm',
                  'icon' => 'bx bx-list-plus',
                  'slot' => 'Funciones'
                ])
                <form action="{{ route('apps.destroy', $app) }}" method="POST" class="d-inline" data-confirm="¿Eliminar esta app?">
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
          @empty
            <tr>
              <td colspan="7" class="text-center text-muted">No hay apps</td>
            </tr>
          @endforelse
          </tbody>
        </table>
      </div>

      <div class="mt-3">
        {!! $apps->links() !!}
      </div>
    </div>
  </div>
@endsection
