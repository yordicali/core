@extends('layouts.app')
@section('content')
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="mb-0">Editar permiso</h4>
    @include('components.button', ['href'=>route('permissions.index'),'variant'=>'secondary','icon'=>'bx bx-arrow-back','slot'=>'Volver'])
  </div>
  <div class="card"><div class="card-body">
    <form method="POST" action="{{ route('permissions.update', $permission) }}" class="row g-3">
      @csrf @method('PUT')
      <div class="col-12">
        <label class="form-label">Nombre</label>
        <input type="text" name="name" value="{{ old('name',$permission->name) }}" class="form-control @error('name') is-invalid @enderror">
        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
      <div class="col-12">
        @include('components.button',['type'=>'submit','variant'=>'primary','icon'=>'bx bx-save','slot'=>'Actualizar'])
      </div>
    </form>
  </div></div>
@endsection

