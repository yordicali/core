@extends('layouts.app')
@section('content')
  <div class="d-flex align-items-center justify-content-center" style="min-height:60vh;">
    <div class="text-center">
      <div class="mb-3"><i class="bx bx-lock-alt" style="font-size:64px;color:#dc3545"></i></div>
      <h3 class="mb-2">Sin permiso</h3>
      <p class="text-muted mb-4">No tienes permiso para acceder a esta funcionalidad ({{ $path }}).</p>
      @include('components.button', ['href' => url()->previous(), 'variant' => 'secondary', 'icon' => 'bx bx-arrow-back', 'slot' => 'Volver'])
    </div>
  </div>
@endsection

