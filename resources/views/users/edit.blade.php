@extends('layouts.app')

@section('content')
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="mb-0">Editar usuario</h4>
    @include('components.button', [
      'href' => route('users.index'),
      'variant' => 'secondary',
      'icon' => 'bx bx-arrow-back',
      'slot' => 'Volver'
    ])
  </div>

  <div class="card">
    <div class="card-body">
      <form method="POST" action="{{ route('users.update', $user) }}" class="row g-3">
        @csrf
        @method('PUT')

        <div class="col-md-6">
          <label class="form-label">Nombre</label>
          <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control @error('name') is-invalid @enderror">
          @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-md-6">
          <label class="form-label">Email</label>
          <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror">
          @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-md-6">
          <label class="form-label">Imagen (desde gestor de archivos)</label>
          <div class="input-group">
            <input type="text" id="user_img_input" name="img" value="{{ old('img', $user->img) }}" class="form-control @error('img') is-invalid @enderror" placeholder="archivos/...">
            <span class="input-group-text p-0">
              @include('archivos.selector-button', ['inputId' => 'user_img_input', 'text' => 'Seleccionar', 'variant' => 'secondary'])
            </span>
          </div>
          @error('img')
            <div class="invalid-feedback d-block">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-md-6">
          <label class="form-label">App</label>
          <select name="app_id" class="form-select @error('app_id') is-invalid @enderror">
            <option value="">-- Sin app --</option>
            @foreach($apps as $a)
              <option value="{{ $a->id }}" {{ old('app_id', $user->app_id)==$a->id ? 'selected' : '' }}>{{ $a->nombre }}</option>
            @endforeach
          </select>
          @error('app_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-md-6">
          <label class="form-label">Contraseña (opcional)</label>
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Dejar en blanco para no cambiar">
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-md-6">
          <label class="form-label">Confirmar contraseña</label>
          <input type="password" name="password_confirmation" class="form-control" placeholder="Repetir si cambias la contraseña">
        </div>

        <div class="col-12">
          <label class="form-label">Roles</label>
          <div class="row">
            @foreach($roles as $r)
            <div class="col-md-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $r->name }}" id="role_{{ $r->id }}" {{ in_array($r->name, $userRoles ?? []) ? 'checked' : '' }}>
                <label class="form-check-label" for="role_{{ $r->id }}">{{ $r->name }}</label>
              </div>
            </div>
            @endforeach
          </div>
        </div>

        <div class="col-12">
          @include('components.button', [
            'type' => 'submit',
            'variant' => 'primary',
            'icon' => 'bx bx-save',
            'slot' => 'Actualizar'
          ])
        </div>
      </form>
    </div>
  </div>
@endsection
