@extends('layouts.app')
@section('content')
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="mb-0">Apps visibles por rol</h4>
  </div>
  @if(session('status'))
    @include('components.alert', ['type'=>'success','dismissible'=>true,'slot'=>session('status')])
  @endif

  <div class="card mb-3"><div class="card-body">
    <form method="POST" action="{{ route('role-apps.store') }}" class="row g-2">
      @csrf
      <div class="col-md-4">
        <label class="form-label">Rol</label>
        <select name="role_id" class="form-select @error('role_id') is-invalid @enderror">
          @foreach($roles as $r)
            <option value="{{ $r->id }}">{{ $r->name }}</option>
          @endforeach
        </select>
        @error('role_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
      <div class="col-md-4">
        <label class="form-label">Aplicación</label>
        <select name="app" class="form-select @error('app') is-invalid @enderror">
          <option value="core">CoreTvo (core)</option>
          @foreach($apps as $a)
            <option value="{{ $a->id }}">{{ $a->nombre }}</option>
          @endforeach
        </select>
        @error('app')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
      <div class="col-md-2 align-self-end">
        @include('components.button', ['type'=>'submit','variant'=>'primary','icon'=>'bx bx-plus','slot'=>'Agregar'])
      </div>
    </form>
  </div></div>

  <div class="card"><div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped align-middle">
        <thead><tr><th>#</th><th>Rol</th><th>Aplicación</th><th class="text-end">Acciones</th></tr></thead>
        <tbody>
        @foreach($mappings as $m)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $m->role?->name }}</td>
            <td>{{ $m->application_id ? ($m->app?->nombre) : 'CoreTvo (core)' }}</td>
            <td class="text-end">
              @php $appParam = $m->application_id ? $m->application_id : 'core'; @endphp
              <form method="POST" action="{{ route('role-apps.destroy', [$m->role_id, $appParam]) }}" class="d-inline" data-confirm="¿Eliminar acceso a la app?">
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

