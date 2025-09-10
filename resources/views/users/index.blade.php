@extends('layouts.app')

@section('content')
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="mb-0">Usuarios</h4>
    @include('components.button', [
      'href' => route('users.create'),
      'variant' => 'primary',
      'icon' => 'bx bx-plus',
      'slot' => 'Crear usuario'
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
      <form method="GET" action="{{ route('users.index') }}" class="row g-2 mb-3">
        <div class="col-auto">
          <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Buscar nombre o email">
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
              <th>Imagen</th>
              <th>Nombre</th>
              <th>Email</th>
              <th>Roles</th>
              <th>Registrado</th>
              <th class="text-end">Acciones</th>
            </tr>
          </thead>
          <tbody>
          @forelse($users as $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td>
                @if($user->img)
                  <img src="{{ asset('storage/'.$user->img) }}" alt="img" style="width:36px;height:36px;object-fit:cover;border-radius:50%;">
                @else
                  <span class="text-muted">—</span>
                @endif
              </td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>
                @php $roles = $user->roles->pluck('name')->implode(', '); @endphp
                {{ $roles ?: '—' }}
              </td>
              <td>{{ $user->created_at?->format('Y-m-d') }}</td>
              <td class="text-end">
                @include('components.button', [
                  'href' => route('users.show', $user),
                  'variant' => 'secondary',
                  'size' => 'sm',
                  'icon' => 'bx bx-show',
                  'slot' => 'Ver'
                ])
                @include('components.button', [
                  'href' => route('users.edit', $user),
                  'variant' => 'warning',
                  'size' => 'sm',
                  'icon' => 'bx bx-edit',
                  'slot' => 'Editar'
                ])
                <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline" data-confirm="¿Eliminar este usuario?">
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
              <td colspan="5" class="text-center text-muted">No hay usuarios</td>
            </tr>
          @endforelse
          </tbody>
        </table>
      </div>

      <div class="mt-3">
        {!! $users->links() !!}
      </div>
    </div>
  </div>
@endsection
