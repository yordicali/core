@extends('layouts.app')
@section('content')
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="mb-0">Funciones</h4>
    @include('components.button', ['href' => route('funciones.create'), 'variant' => 'primary', 'icon' => 'bx bx-plus', 'slot' => 'Nueva función'])
  </div>
  @if(session('status'))
    @include('components.alert', ['type' => 'success','dismissible' => true,'slot' => session('status')])
  @endif
  <div class="card"><div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped align-middle">
        <thead><tr><th>#</th><th>Ícono</th><th>Nombre</th><th>URL</th><th>Roles</th><th class="text-end">Acciones</th></tr></thead>
        <tbody>
        @foreach($funciones as $f)
          <tr>
            <td>{{ $f->id }}</td>
            <td>@if($f->icono)<i class="{{ $f->icono }} fs-5"></i>@else <span class="text-muted">—</span> @endif</td>
            <td>{{ $f->nombre }}</td>
            <td>{{ $f->url }}</td>
            <td>{{ $f->roles_count }}</td>
            <td class="text-end">
              @include('components.button', ['href' => route('funciones.edit',$f), 'variant' => 'warning', 'size'=>'sm', 'icon'=>'bx bx-edit', 'slot'=>'Editar'])
              <form action="{{ route('funciones.destroy',$f) }}" method="POST" class="d-inline" data-confirm="¿Eliminar esta función?">
                @csrf @method('DELETE')
                @include('components.button', ['type'=>'submit','variant'=>'danger','size'=>'sm','icon'=>'bx bx-trash','slot'=>'Eliminar'])
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <div class="mt-2">{!! $funciones->links() !!}</div>
  </div></div>
@endsection
