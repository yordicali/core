@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="mb-1">Bienvenido a CoreTvo</h1>
                <p class="text-muted">Desde aquí impulsa tu creatividad sin limites, todo validado y funcional para ti. Disfruta!!</p>
            </div>
        </div>
          <div class="row mb-4">
  <div class="col-3">
    <div class="card radius-10 border-start border-0 border-3 border-secondary">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary">Apps</p>
									<h4 class="my-1 text-secondary" id="totalFiles">{{ $appsCount ?? 0 }}</h4>
									<p class="mb-0 font-13">Se actualiza en tiempo real</p>
								</div>
								<div class="widgets-icons-2 rounded-circle bg-secondary text-white ms-auto"><i class="bx bxs-file"></i>
								</div>
							</div>
						</div>
					 </div>
  </div>
    <div class="col-3">
    <div class="card radius-10 border-start border-0 border-3 border-success">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-success">Usuarios</p>
                  
									<h4 class="my-1 text-success" id="totalSizeMB">{{ $usersCount ?? 0 }}</h4>
									<p class="mb-0 font-13">Se actualiza en tiempo real</p>
								</div>
								<div class="widgets-icons-2 rounded-circle bg-success text-white ms-auto"><i class="bx bxs-folder"></i>
								</div>
							</div>
						</div>
					 </div>
  </div>     
    <div class="col-3">
    <div class="card radius-10 border-start border-0 border-3 border-info">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary">Archivos totales</p>
									<h4 class="my-1 text-info" id="totalFiles">{{ $totalCount ?? 0 }}</h4>
									<p class="mb-0 font-13">Se actualiza en tiempo real</p>
								</div>
								<div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i class="bx bxs-file"></i>
								</div>
							</div>
						</div>
					 </div>
  </div> 
      <div class="col-3">
    <div class="card radius-10 border-start border-0 border-3 border-warning">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary">Espacio usado</p>
                   @php $filesMB = isset($filesBytes) ? number_format(($filesBytes/1048576), 2) : number_format(0,2); @endphp
									<h4 class="my-1 text-warning" id="totalSizeMB">{{ $filesMB }} MB</h4>
									<p class="mb-0 font-13">Se actualiza en tiempo real</p>
								</div>
								<div class="widgets-icons-2 rounded-circle bg-warning text-white ms-auto"><i class="bx bxs-folder"></i>
								</div>
							</div>
						</div>
					 </div>
  </div>

  </div>
        
          
        </div>
    </div>
@endsection
