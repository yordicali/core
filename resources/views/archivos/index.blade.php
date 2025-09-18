@extends('layouts.app')

@section('content')
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="mb-0">Gestor de archivos</h4>
  </div>
  <div class="row mb-3">
  <div class="col-4">
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
    <div class="col-4">
    <div class="card radius-10 border-start border-0 border-3 border-warning">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary">Espacio usado</p>
                  @php $totalMB = isset($totalSize) ? number_format(($totalSize/1048576), 2) : number_format(0,2); @endphp
									<h4 class="my-1 text-warning" id="totalSizeMB">{{ $totalMB }} MB</h4>
									<p class="mb-0 font-13">Se actualiza en tiempo real</p>
								</div>
								<div class="widgets-icons-2 rounded-circle bg-warning text-white ms-auto"><i class="bx bxs-folder"></i>
								</div>
							</div>
						</div>
					 </div>
  </div>
  </div>
  
  @if(session('status'))
    @include('components.alert', [
      'type' => 'success',
      'dismissible' => true,
      'slot' => session('status')
    ])
  @endif

  <div class="card mb-3">
    <div class="card-body">
      <form id="uploadForm" class="row g-2 align-items-center" onsubmit="return false;">
        <div class="col-md-5">
          <input type="file" id="fileInput" class="form-control" />
        </div>
        <div class="col-auto">
          @include('components.button', [
            'variant' => 'primary',
            'icon' => 'bx bx-upload',
            'slot' => 'Subir'
          ])
        </div>
        <div class="col-12 mt-2" id="progressWrap" style="display:none;">
          @include('components.progress-bar', [
            'value' => 0,
            'color' => 'success',
            'striped' => true,
            'animated' => true,
            'height' => '8px',
            'slot' => ''
          ])
        </div>
      </form>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <form method="GET" action="{{ route('archivos.index') }}" class="row g-2 mb-3">
        <div class="col-auto">
          <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Buscar archivo">
        </div>
        <div class="col-auto">
          @include('components.button', [
            'type' => 'submit',
            'variant' => 'secondary',
            'icon' => 'bx bx-search',
            'slot' => 'Buscar'
          ])
        </div>
      </form>

      <div id="archivosTable">
        @include('archivos._table', ['archivos' => $archivos])
      </div>
    </div>
  </div>

  @include('archivos.media-modal')

@push('scripts')
<script>
  (function(){
    const uploadBtn = document.querySelector('#uploadForm .btn');
    const input = document.getElementById('fileInput');
    const progressWrap = document.getElementById('progressWrap');
    const progressBar = progressWrap.querySelector('.progress-bar');

    uploadBtn?.addEventListener('click', function(){
      if(!input.files || !input.files[0]){ alert('Selecciona un archivo'); return; }
      const formData = new FormData();
      formData.append('file', input.files[0]);
      formData.append('_token', '{{ csrf_token() }}');

      const xhr = new XMLHttpRequest();
      xhr.open('POST', '{{ route('archivos.store') }}', true);
      xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

      xhr.upload.onprogress = function (e) {
        if (e.lengthComputable) {
          const percent = Math.round((e.loaded / e.total) * 100);
          progressWrap.style.display = '';
          progressBar.style.width = percent + '%';
          progressBar.setAttribute('aria-valuenow', percent);
        }
      };

      xhr.onreadystatechange = function(){
        if(xhr.readyState === 4){
          if(xhr.status >= 200 && xhr.status < 300){
            input.value = '';
            try {
              const data = JSON.parse(xhr.responseText);
              if(data){
                if(typeof data.total_count !== 'undefined'){
                  const el = document.getElementById('totalFiles'); if(el) el.textContent = data.total_count;
                }
                if(typeof data.total_size !== 'undefined'){
                  const mb = (data.total_size / 1048576).toFixed(2);
                  const el2 = document.getElementById('totalSizeMB'); if(el2) el2.textContent = mb;
                }
              }
            } catch(_e) {}
            // recargar tabla
            fetch('{{ route('archivos.index') }}?partial=1', { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
              .then(r => r.text())
              .then(html => {
                document.getElementById('archivosTable').innerHTML = html;
                if(window.refreshMediaGrid) window.refreshMediaGrid();
                setTimeout(()=>{ progressWrap.style.display='none'; progressBar.style.width='0%'; }, 400);
              });
          } else {
            let msg = 'Error al subir archivo';
            try { const data = JSON.parse(xhr.responseText); if(data && data.message){ msg = data.message; } } catch(_e) {}
            alert(msg);
            progressWrap.style.display = 'none';
            progressBar.style.width = '0%';
          }
        }
      };

      xhr.send(formData);
    });
  })();
</script>
@endpush
@endsection
