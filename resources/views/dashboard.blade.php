@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="mb-1">Bienvenido a CoreTvo</h1>
                <p class="text-muted">Desde aquí impulsa tu creatividad sin limites, todo validado y funcional para ti. Disfruta!!</p>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-3 col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="text-muted">Apps</div>
                        <div class="fs-3 fw-semibold">{{ $appsCount ?? 0 }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="text-muted">Usuarios</div>
                        <div class="fs-3 fw-semibold">{{ $usersCount ?? 0 }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="text-muted">Archivos</div>
                        <div class="fs-3 fw-semibold">{{ $filesCount ?? 0 }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="text-muted">Espacio usado</div>
                        @php $filesMB = isset($filesBytes) ? number_format(($filesBytes/1048576), 2) : number_format(0,2); @endphp
                        <div class="fs-3 fw-semibold">{{ $filesMB }} MB</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
