@extends('layouts.app')

@section('content')
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="mb-0">Detalle de app</h4>
    <div class="d-flex gap-2">
      @include('components.button', [
        'href' => route('apps.index'),
        'variant' => 'secondary',
        'icon' => 'bx bx-arrow-back',
        'slot' => 'Volver'
      ])
      @include('components.button', [
        'href' => route('apps.edit', $app),
        'variant' => 'warning',
        'icon' => 'bx bx-edit',
        'slot' => 'Editar'
      ])
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <div class="row mb-3">
        <div class="col-md-3 text-muted">ID</div>
        <div class="col-md-9">{{ $app->id }}</div>
      </div>
      <div class="row mb-3">
        <div class="col-md-3 text-muted">Nombre</div>
        <div class="col-md-9">{{ $app->nombre }}</div>
      </div>
      <div class="row mb-3">
        <div class="col-md-3 text-muted">Creador (ID)</div>
        <div class="col-md-9">{{ $app->creador_id }}</div>
      </div>
      <div class="row mb-3">
        <div class="col-md-3 text-muted">Logo</div>
        <div class="col-md-9">
          @if($app->logo)
            <img src="{{ asset('storage/'.$app->logo) }}" alt="logo" style="width:64px;height:64px;object-fit:cover;border-radius:6px;">
          @else
            <span class="text-muted">—</span>
          @endif
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-3 text-muted">Estado</div>
        <div class="col-md-9">{{ ucfirst($app->estado) }}</div>
      </div>
      <div class="row mb-3">
        <div class="col-md-3 text-muted">Icono</div>
        <div class="col-md-9">@if($app->icono)<i class="{{ $app->icono }} fs-5"></i>@else <span class="text-muted">—</span> @endif</div>
      </div>
      <div class="row mb-3">
        <div class="col-md-3 text-muted">Color base</div>
        <div class="col-md-9">
          @if($app->color_base)
            <span class="d-inline-block align-middle" style="width:18px;height:18px;border-radius:4px;background: {{ $app->color_base }};border:1px solid #ddd"></span>
            <span class="ms-2 align-middle">{{ $app->color_base }}</span>
          @else
            <span class="text-muted">—</span>
          @endif
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-3 text-muted">Descripción corta</div>
        <div class="col-md-9">{{ $app->descripcion_corta }}</div>
      </div>
      <div class="row mb-3">
        <div class="col-md-3 text-muted">Descripción larga</div>
        <div class="col-md-9">{!! nl2br(e($app->descripcion_larga)) !!}</div>
      </div>
    </div>
  </div>
@endsection
