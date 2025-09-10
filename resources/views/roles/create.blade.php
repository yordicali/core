@extends('layouts.app')
@section('content')
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="mb-0">Crear rol</h4>
    @include('components.button', ['href'=>route('roles.index'),'variant'=>'secondary','icon'=>'bx bx-arrow-back','slot'=>'Volver'])
  </div>
  <div class="card"><div class="card-body">
    <form method="POST" action="{{ route('roles.store') }}" class="row g-3">
      @csrf
      <div class="col-12">
        <label class="form-label">Nombre</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
      <div class="col-12">
        @include('components.button',['type'=>'submit','variant'=>'primary','icon'=>'bx bx-save','slot'=>'Guardar'])
      </div>
    </form>
  </div></div>
@endsection
