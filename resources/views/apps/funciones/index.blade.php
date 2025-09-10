@extends('layouts.app')
@section('content')
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="mb-0">Funciones de "{{ $app->nombre }}"</h4>
    @include('components.button', ['href'=>route('apps.index'),'variant'=>'secondary','icon'=>'bx bx-arrow-back','slot'=>'Volver'])
  </div>
  @if(session('status'))
    @include('components.alert', ['type'=>'success','dismissible'=>true,'slot'=>session('status')])
  @endif

  <div class="card mb-3"><div class="card-body">
    <form class="row g-2" method="POST" action="{{ route('apps.funciones.store', $app) }}">
      @csrf
      <div class="col-md-6">
        <label class="form-label">Agregar función</label>
        <select name="funcion_id" class="form-select @error('funcion_id') is-invalid @enderror">
          @foreach($disponibles as $f)
            <option value="{{ $f->id }}">{{ $f->nombre }} @if($f->url) ({{ $f->url }}) @endif</option>
          @endforeach
        </select>
        @error('funcion_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
      <div class="col-md-2 align-self-end">
        @include('components.button', ['type'=>'submit','variant'=>'primary','icon'=>'bx bx-plus','slot'=>'Agregar'])
      </div>
    </form>
  </div></div>

  <div class="card"><div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped align-middle">
        <thead><tr><th>#</th><th>Ícono</th><th>Nombre</th><th>URL</th><th class="text-end">Acciones</th></tr></thead>
        <tbody>
          @forelse($asignadas as $f)
          <tr>
            <td>{{ $f->id }}</td>
            <td>@if($f->icono)<i class="{{ $f->icono }} fs-5"></i>@else <span class="text-muted">—</span> @endif</td>
            <td>{{ $f->nombre }}</td>
            <td>{{ $f->url }}</td>
            <td class="text-end">
              <form method="POST" action="{{ route('apps.funciones.destroy', [$app, $f]) }}" data-confirm="¿Quitar función de la app?" class="d-inline">
                @csrf @method('DELETE')
                @include('components.button', ['type'=>'submit','variant'=>'danger','size'=>'sm','icon'=>'bx bx-trash','slot'=>'Quitar'])
              </form>
            </td>
          </tr>
          @empty
          <tr><td colspan="5" class="text-center text-muted">Sin funciones asignadas</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div></div>
@endsection
