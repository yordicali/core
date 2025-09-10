@php
  // Reutilizable: modal para seleccionar archivo y devolver 'archivos/..' al input objetivo
  // Uso JS: openMediaSelector('inputId')
@endphp
<x-modal id="mediaManagerModal" title="Seleccionar archivo" size="xl" :centered="true" :scrollable="true">
  <div class="mb-3 row g-2 align-items-center">
    <div class="col-md-6">
      <div class="input-group">
        <input id="mediaSearch" type="text" class="form-control" placeholder="Buscar por nombre">
        <button type="button" class="btn btn-secondary" onclick="loadMediaGrid(document.getElementById('mediaSearch').value)"><i class="bx bx-search me-1"></i>Buscar</button>
      </div>
    </div>
    <div class="col-md-6">
      <div class="d-flex gap-2 justify-content-md-end">
        <input type="file" id="mediaUploadInput" class="form-control" />
        @include('components.button', [ 'variant' => 'primary', 'icon' => 'bx bx-upload', 'slot' => 'Subir' ])
      </div>
      <div class="mt-2" id="mediaProgressWrap" style="display:none;">
        @include('components.progress-bar', [ 'value' => 0, 'color' => 'success', 'striped' => true, 'animated' => true, 'height' => '6px', 'slot' => '' ])
      </div>
      <div class="form-text text-end">Haz clic en un elemento para seleccionarlo</div>
    </div>
  </div>
  <div id="mediaGrid" class="row g-3">
    {{-- Se llena por JS con tarjetas --}}
  </div>

  @slot('footer')
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
  @endslot
</x-modal>

@push('scripts')
<script>
  window.openMediaSelector = function(targetInputId, options = { return: 'ruta' }){
    const modalEl = document.getElementById('mediaManagerModal');
    modalEl.dataset.targetInput = targetInputId;
    modalEl.dataset.return = options.return || 'ruta'; // 'ruta' (archivos/..), 'url' absoluta
    const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
    modal.show();
    loadMediaGrid();
  };

  window.refreshMediaGrid = function(){
    if(document.getElementById('mediaManagerModal').classList.contains('show')){
      loadMediaGrid(document.getElementById('mediaSearch').value || '');
    }
  };

  function humanFileSize(bytes){
    if(!bytes) return '—';
    const thresh = 1024;
    if (Math.abs(bytes) < thresh) { return bytes + ' B'; }
    const units = ['KB','MB','GB','TB'];
    let u = -1;
    do { bytes /= thresh; ++u; } while (Math.abs(bytes) >= thresh && u < units.length - 1);
    return bytes.toFixed(1)+' '+units[u];
  }

  window.loadMediaGrid = function(q=''){
    const grid = document.getElementById('mediaGrid');
    grid.innerHTML = '<div class="text-muted">Cargando...</div>';
    const url = new URL('{{ route('archivos.index') }}', window.location.origin);
    url.searchParams.set('partial', '1');
    if(q) url.searchParams.set('q', q);
    fetch(url, { headers: {'X-Requested-With': 'XMLHttpRequest'} })
      .then(r => r.text())
      .then(html => {
        // Parsear filas de la tabla parcial para reusar datos
        const temp = document.createElement('div');
        temp.innerHTML = html;
        const rows = temp.querySelectorAll('tbody tr');
        grid.innerHTML = '';
        rows.forEach(tr => {
          const id = tr.children[0].textContent.trim();
          const previewCell = tr.children[1];
          const nameCell = tr.children[2];
          const sizeCell = tr.children[3];
          // extraer URL y nombre
          const link = nameCell.querySelector('a');
          const url = link ? link.href : '#';
          const name = link ? link.textContent.trim() : 'archivo';
          const ruta = link ? (link.dataset.ruta || link.getAttribute('href').replace(window.location.origin + '/storage/', '')) : '';

          const col = document.createElement('div');
          col.className = 'col-6 col-md-3';
          col.innerHTML = `
            <div class="card h-100 selectable" data-id="${id}" data-url="${url}" data-ruta="${ruta}">
              <div class="card-body text-center">
                <div class="mb-2">${previewCell.innerHTML}</div>
                <div class="small text-truncate" title="${name}">${name}</div>
                <div class="text-muted small">${sizeCell.textContent.trim()}</div>
              </div>
            </div>`;
          col.querySelector('.card').addEventListener('click', function(){
            const modalEl = document.getElementById('mediaManagerModal');
            const inputId = modalEl.dataset.targetInput;
            const mode = modalEl.dataset.return || 'ruta';
            const value = mode === 'url' ? this.dataset.url : this.dataset.ruta;
            if(inputId){ const input = document.getElementById(inputId); if(input){ input.value = value; input.dispatchEvent(new Event('change')); } }
            bootstrap.Modal.getInstance(modalEl)?.hide();
          });
          grid.appendChild(col);
        });
        if(!rows.length){ grid.innerHTML = '<div class="text-muted">No hay archivos</div>'; }
      });
  };

  // Subida desde la modal
  (function(){
    const btn = document.querySelector('#mediaManagerModal .btn.btn-primary');
    const input = document.getElementById('mediaUploadInput');
    const wrap = document.getElementById('mediaProgressWrap');
    const bar = wrap?.querySelector('.progress-bar');
    btn?.addEventListener('click', function(){
      if(!input.files || !input.files[0]){ alert('Selecciona un archivo'); return; }
      const fd = new FormData();
      fd.append('file', input.files[0]);
      fd.append('_token', '{{ csrf_token() }}');
      const xhr = new XMLHttpRequest();
      xhr.open('POST', '{{ route('archivos.store') }}', true);
      xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
      xhr.upload.onprogress = function(e){ if(e.lengthComputable){ const p = Math.round((e.loaded/e.total)*100); wrap.style.display=''; bar.style.width = p+'%'; bar.setAttribute('aria-valuenow', p); } };
      xhr.onreadystatechange = function(){ if(xhr.readyState===4){ if(xhr.status>=200 && xhr.status<300){ input.value=''; loadMediaGrid(document.getElementById('mediaSearch').value || ''); setTimeout(()=>{ wrap.style.display='none'; bar.style.width='0%'; }, 400); } else { alert('Error al subir'); wrap.style.display='none'; bar.style.width='0%'; } } };
      xhr.send(fd);
    });
  })();
</script>
@endpush
