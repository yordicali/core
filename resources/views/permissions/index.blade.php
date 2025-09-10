@extends('layouts.app')
@section('content')
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="mb-0">Permisos</h4>
    @include('components.button', ['href' => route('permissions.create'), 'variant' => 'primary', 'icon' => 'bx bx-plus', 'slot' => 'Nuevo permiso'])
  </div>
  @if(session('status'))
    @include('components.alert', ['type' => 'success','dismissible' => true,'slot' => session('status')])
  @endif
  <div class="card"><div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped align-middle">
        <thead><tr><th>#</th><th>Nombre</th><th>Guard</th><th class="text-end">Acciones</th></tr></thead>
        <tbody>
        @foreach($permissions as $perm)
          <tr>
            <td>{{ $perm->id }}</td>
            <td>{{ $perm->name }}</td>
            <td>{{ $perm->guard_name }}</td>
            <td class="text-end">
              @include('components.button', ['href' => route('permissions.edit',$perm), 'variant' => 'warning', 'size'=>'sm', 'icon'=>'bx bx-edit', 'slot'=>'Editar'])
              <form action="{{ route('permissions.destroy',$perm) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar?');">
                @csrf @method('DELETE')
                @include('components.button', ['type'=>'submit','variant'=>'danger','size'=>'sm','icon'=>'bx bx-trash','slot'=>'Eliminar'])
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <div class="mt-2">{!! $permissions->links() !!}</div>
  </div></div>
@endsection

