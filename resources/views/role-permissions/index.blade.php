@extends('layouts.app')
@section('content')
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="mb-0">Permisos de creación de roles</h4>
  </div>
  @if(session('status'))
    @include('components.alert', ['type'=>'success','dismissible'=>true,'slot'=>session('status')])
  @endif

  <div class="card mb-3"><div class="card-body">
    <form method="POST" action="{{ route('role-permissions.store') }}" class="row g-2">
      @csrf
      <div class="col-md-4">
        <label class="form-label">Rol origen</label>
        <select name="role_id" class="form-select @error('role_id') is-invalid @enderror">
          @foreach($roles as $r)
            <option value="{{ $r->id }}">{{ $r->name }}</option>
          @endforeach
        </select>
        @error('role_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
      <div class="col-md-4">
        <label class="form-label">Puede crear rol</label>
        <select name="target_role_id" class="form-select @error('target_role_id') is-invalid @enderror">
          @foreach($roles as $r)
            <option value="{{ $r->id }}">{{ $r->name }}</option>
          @endforeach
        </select>
        @error('target_role_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
      <div class="col-md-2 align-self-end">
        @include('components.button', ['type'=>'submit','variant'=>'primary','icon'=>'bx bx-plus','slot'=>'Agregar'])
      </div>
    </form>
  </div></div>

  <div class="card"><div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped align-middle">
        <thead><tr><th>#</th><th>Rol origen</th><th>Puede crear</th><th class="text-end">Acciones</th></tr></thead>
        <tbody>
        @foreach($mappings as $m)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $m->role?->name }}</td>
            <td>{{ $m->targetRole?->name }}</td>
            <td class="text-end">
              <form method="POST" action="{{ route('role-permissions.destroy', [$m->role_id, $m->target_role_id]) }}" class="d-inline" data-confirm="¿Eliminar permiso de creación?">
                @csrf @method('DELETE')
                @include('components.button', ['type'=>'submit','variant'=>'danger','size'=>'sm','icon'=>'bx bx-trash','slot'=>'Eliminar'])
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div></div>
@endsection
