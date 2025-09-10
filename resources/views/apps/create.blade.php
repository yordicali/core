@extends('layouts.app')

@section('content')
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="mb-0">Crear app</h4>
    @include('components.button', [
      'href' => route('apps.index'),
      'variant' => 'secondary',
      'icon' => 'bx bx-arrow-back',
      'slot' => 'Volver'
    ])
  </div>

  <div class="card">
    <div class="card-body">
      <form method="POST" action="{{ route('apps.store') }}" class="row g-3" enctype="multipart/form-data">
        @csrf

        <div class="col-md-6">
          <label class="form-label">Nombre</label>
          <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control @error('nombre') is-invalid @enderror" required>
          @error('nombre')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-md-6">
          <label class="form-label">Logo (desde gestor de archivos)</label>
          <div class="input-group">
            <input type="text" id="logo_input" name="logo" value="{{ old('logo') }}" class="form-control @error('logo') is-invalid @enderror" placeholder="archivos/...">
            <span class="input-group-text p-0">
              @include('archivos.selector-button', ['inputId' => 'logo_input', 'text' => 'Seleccionar', 'variant' => 'secondary'])
            </span>
          </div>
          @error('logo')
            <div class="invalid-feedback d-block">{{ $message }}</div>
          @enderror
          <div class="form-text">Selecciona una imagen desde el gestor de archivos.</div>
        </div>

        <div class="col-md-6">
          <label class="form-label">Icono (clase CSS)</label>
          <input type="text" name="icono" value="{{ old('icono') }}" class="form-control @error('icono') is-invalid @enderror" placeholder="p.ej. bx bx-app">
          @error('icono')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-md-6">
          <label class="form-label">Color base</label>
          <input type="color" name="color_base" value="{{ old('color_base', '#0d6efd') }}" class="form-control form-control-color @error('color_base') is-invalid @enderror">
          @error('color_base')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-md-6">
          <label class="form-label">URL inicial</label>
          <input type="text" name="url_inicial" value="{{ old('url_inicial') }}" class="form-control @error('url_inicial') is-invalid @enderror" placeholder="https://... o ruta interna">
          @error('url_inicial')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-12">
          <label class="form-label">Descripción corta</label>
          <input type="text" name="descripcion_corta" value="{{ old('descripcion_corta') }}" class="form-control @error('descripcion_corta') is-invalid @enderror">
          @error('descripcion_corta')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-12">
          <label class="form-label">Descripción larga</label>
          <textarea name="descripcion_larga" rows="5" class="form-control @error('descripcion_larga') is-invalid @enderror">{{ old('descripcion_larga') }}</textarea>
          @error('descripcion_larga')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-md-6">
          <label class="form-label">Estado</label>
          <select name="estado" class="form-select @error('estado') is-invalid @enderror">
            <option value="disponible" {{ old('estado', 'disponible')=='disponible'?'selected':'' }}>Disponible</option>
            <option value="inactiva" {{ old('estado')=='inactiva'?'selected':'' }}>Inactiva</option>
          </select>
          @error('estado')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-12">
          @include('components.button', [
            'type' => 'submit',
            'variant' => 'primary',
            'icon' => 'bx bx-save',
            'slot' => 'Guardar'
          ])
        </div>
      </form>
    </div>
  </div>
@endsection
