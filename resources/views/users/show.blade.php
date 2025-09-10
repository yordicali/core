@extends('layouts.app')

@section('content')
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="mb-0">Detalle de usuario</h4>
    <div class="d-flex gap-2">
      @include('components.button', [
        'href' => route('users.index'),
        'variant' => 'secondary',
        'icon' => 'bx bx-arrow-back',
        'slot' => 'Volver'
      ])
      @include('components.button', [
        'href' => route('users.edit', $user),
        'variant' => 'warning',
        'icon' => 'bx bx-edit',
        'slot' => 'Editar'
      ])
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <div class="row mb-3">
        <div class="col-md-3 text-muted">Imagen</div>
        <div class="col-md-9">
          @if($user->img)
            <img src="{{ asset('storage/'.$user->img) }}" alt="img" style="width:64px;height:64px;object-fit:cover;border-radius:50%;">
          @else
            <span class="text-muted">—</span>
          @endif
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-3 text-muted">ID</div>
        <div class="col-md-9">{{ $user->id }}</div>
      </div>
      <div class="row mb-3">
        <div class="col-md-3 text-muted">Nombre</div>
        <div class="col-md-9">{{ $user->name }}</div>
      </div>
      <div class="row mb-3">
        <div class="col-md-3 text-muted">Email</div>
        <div class="col-md-9">{{ $user->email }}</div>
      </div>
      <div class="row mb-3">
        <div class="col-md-3 text-muted">Registrado</div>
        <div class="col-md-9">{{ $user->created_at?->format('Y-m-d H:i') }}</div>
      </div>
    </div>
  </div>
@endsection
