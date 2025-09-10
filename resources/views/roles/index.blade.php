@extends('layouts.app')
@section('content')
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="mb-0">Roles</h4>
    @include('components.button', ['href' => route('roles.create'), 'variant' => 'primary', 'icon' => 'bx bx-plus', 'slot' => 'Nuevo rol'])
  </div>
  @if(session('status'))
    @include('components.alert', ['type' => 'success','dismissible' => true,'slot' => session('status')])
  @endif
  <div class="card"><div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped align-middle">
        <thead><tr><th>#</th><th>Nombre</th><th class="text-end">Acciones</th></tr></thead>
        <tbody>
        @foreach($roles as $role)
          <tr>
            <td>{{ $role->id }}</td>
            <td>{{ $role->name }}</td>
            <td class="text-end">
              @include('components.button', ['href' => route('roles.edit',$role), 'variant' => 'warning', 'size'=>'sm', 'icon'=>'bx bx-edit', 'slot'=>'Editar'])
              <form action="{{ route('roles.destroy',$role) }}" method="POST" class="d-inline" data-confirm="¿Eliminar este rol?">
                @csrf @method('DELETE')
                @include('components.button', ['type'=>'submit','variant'=>'danger','size'=>'sm','icon'=>'bx bx-trash','slot'=>'Eliminar'])
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <div class="mt-2">{!! $roles->links() !!}</div>
  </div></div>
@endsection
