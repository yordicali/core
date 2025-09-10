@extends('layouts.app')
@section('content')
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="text-center mb-3">
        @if($app->logo)
          <img src="{{ asset('storage/'.$app->logo) }}" alt="logo" style="width:96px;height:96px;object-fit:cover;border-radius:12px;">
        @endif
        <h3 class="mt-2">{{ $app->nombre }}</h3>
        @if($app->descripcion_corta)
          <div class="text-muted">{{ $app->descripcion_corta }}</div>
        @endif
      </div>
      <div class="card">
        <div class="card-body text-center">
          <p class="mb-3">Inicia sesión para continuar en {{ $app->nombre }}.</p>
          @include('components.button', ['href'=>route('login'), 'variant'=>'primary', 'icon'=>'bx bx-log-in', 'slot'=>'Ingresar'])
        </div>
      </div>
    </div>
  </div>
@endsection

