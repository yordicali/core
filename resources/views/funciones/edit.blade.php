@extends('layouts.app')
@section('content')
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="mb-0">Editar función</h4>
    @include('components.button', ['href'=>route('funciones.index'),'variant'=>'secondary','icon'=>'bx bx-arrow-back','slot'=>'Volver'])
  </div>
  <div class="card"><div class="card-body">
    <form method="POST" action="{{ route('funciones.update', $funcion) }}" class="row g-3">
      @csrf @method('PUT')
      <div class="col-md-6">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre',$funcion->nombre) }}" class="form-control @error('nombre') is-invalid @enderror">
        @error('nombre')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
      <div class="col-md-6">
        <label class="form-label">URL (patrón)</label>
        <input type="text" name="url" value="{{ old('url',$funcion->url) }}" class="form-control @error('url') is-invalid @enderror" placeholder="ej: users* o apps/*">
        @error('url')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
      <div class="col-12">
        <label class="form-label">Descripción</label>
        <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" rows="3">{{ old('descripcion',$funcion->descripcion) }}</textarea>
        @error('descripcion')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
      <div class="col-md-6">
        <label class="form-label">Ícono (clase CSS)</label>
        <input type="text" name="icono" value="{{ old('icono',$funcion->icono) }}" class="form-control @error('icono') is-invalid @enderror" placeholder="p.ej. bx bx-cog">
        @error('icono')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
      <div class="col-12">
        <label class="form-label">Roles con acceso</label>
        <div class="row">
          @foreach($roles as $r)
          <div class="col-md-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $r->id }}" id="role_{{ $r->id }}" {{ in_array($r->id, $assignedRoles ?? []) ? 'checked' : '' }}>
              <label class="form-check-label" for="role_{{ $r->id }}">{{ $r->name }}</label>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="col-12">
        @include('components.button',['type'=>'submit','variant'=>'primary','icon'=>'bx bx-save','slot'=>'Actualizar'])
      </div>
    </form>
  </div></div>
@endsection
