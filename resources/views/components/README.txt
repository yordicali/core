Proyecto: Migración de HTML a Blade (Laravel)

Estructura creada
- Layout base: resources/views/layouts/app.blade.php
- Componentes Blade (anónimos) en: resources/views/components/
  - sidebar.blade.php (sidebar / menú)
  - topbar.blade.php (barra superior)
  - footer.blade.php
  - alert.blade.php
  - badge.blade.php
  - button.blade.php
  - card.blade.php
  - modal.blade.php
  - pagination.blade.php
  - progress-bar.blade.php
  - spinner.blade.php
  - accordion.blade.php
  - tabs.blade.php
  - carousel.blade.php
  - list-group.blade.php
  - media-object.blade.php
  - avatar-chip.blade.php
  - notification-item.blade.php
  - navbar.blade.php (navbar simple)
  - timeline-item.blade.php

Nota importante de assets
- Mueve la carpeta "assets" a "public/assets" dentro de tu proyecto Laravel.
- Las rutas en el layout usan helper `asset('assets/...')` y funcionarán al estar en `public/`.

Uso del layout
1) Extender el layout en tus vistas:
   @extends('layouts.app')

2) Definir secciones:
   @section('title', 'Mi Página')
   @section('content')
     <h1>Hola Blade</h1>
   @endsection

3) Agregar estilos o scripts extra (opcional):
   @push('styles')
     <link rel="stylesheet" href="...">
   @endpush
   @push('scripts')
     <script>/* ... */</script>
   @endpush

Componentes UI (ejemplos rápidos con etiquetas <x-...>)

- x-alert
  <x-alert type="success" dismissible>
    Operación realizada con éxito
  </x-alert>

- x-badge
  <x-badge type="warning" pill>En proceso</x-badge>

- x-button
  <x-button variant="primary" icon="bx bx-plus">Crear</x-button>
  <x-button href="/ruta" outline variant="secondary">Ir</x-button>

- x-card
  <x-card title="Título" :footer="'Pie opcional'">
    Contenido de la tarjeta
  </x-card>

- x-modal
  <x-modal id="demoModal" title="Demo" size="lg" :centered="true">
    Contenido del modal
    @slot('footer')
      <x-button data-bs-dismiss="modal">Cerrar</x-button>
      <x-button variant="primary">Guardar</x-button>
    @endslot
  </x-modal>
  <!-- Botón para abrir -->
  <x-button data-bs-toggle="modal" data-bs-target="#demoModal">Abrir modal</x-button>

- x-pagination
  <x-pagination>
    <li class="page-item disabled"><span class="page-link">«</span></li>
    <li class="page-item active"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">»</a></li>
  </x-pagination>

- x-progress-bar
  <x-progress-bar :value="60" color="success" :striped="true" :animated="true" />

- x-spinner
  <x-spinner type="border" color="primary" label="Cargando..." />

- x-accordion
  <x-accordion id="acc1">
    <div class="accordion-item">
      <h2 class="accordion-header" id="h1">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#c1" aria-expanded="true" aria-controls="c1">Item 1</button>
      </h2>
      <div id="c1" class="accordion-collapse collapse show" aria-labelledby="h1" data-bs-parent="#acc1">
        <div class="accordion-body">Contenido 1</div>
      </div>
    </div>
  </x-accordion>

- x-tabs
  <x-tabs id="tabs1">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="tab-home" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab">Home</button>
    </li>
  </x-tabs>
  <div class="tab-content mt-3" id="tabs1Content">
    <div class="tab-pane fade show active" id="home" role="tabpanel">Contenido Home</div>
  </div>

- x-carousel
  <x-carousel id="car1" :controls="true" :indicators="true">
    <div class="carousel-item active">
      <img src="{{ asset('assets/images/gallery/01.png') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('assets/images/gallery/02.png') }}" class="d-block w-100" alt="...">
    </div>
  </x-carousel>

- x-list-group
  <x-list-group>
    <li class="list-group-item active">Item 1</li>
    <li class="list-group-item">Item 2</li>
  </x-list-group>

- x-media-object
  <x-media-object img="{{ asset('assets/images/avatars/avatar-2.png') }}" alt="User">
    <h6 class="mb-1">Título</h6>
    <div class="text-muted">Descripción</div>
  </x-media-object>

- x-avatar-chip
  <x-avatar-chip src="{{ asset('assets/images/avatars/avatar-3.png') }}" label="John Doe" />

- x-notification-item (para usar dentro del dropdown de notificaciones)
  <x-notification-item icon="bx bx-file" color="success" title="Reporte" time="hace 2 min">Listo para descargar</x-notification-item>

- x-navbar (navbar simple de Bootstrap)
  <x-navbar brand="Mi App">
    <li class="nav-item"><a class="nav-link active" href="#">Inicio</a></li>
  </x-navbar>

- x-timeline-item
  <x-timeline-item time="09:30" title="Evento" subtitle="Detalle" dotColor="info">
    Contenido del hito
  </x-timeline-item>

Uso con @include('components.*')
Puedes usar estos componentes también como vistas parciales con @include. Para pasar contenido principal, utiliza la variable 'slot'. Para contenido HTML complejo, pásalo como instancia de HtmlString para que no se escape.

- include alert
  @include('components.alert', [
    'type' => 'success',
    'dismissible' => true,
    'slot' => 'Operación realizada con éxito'
  ])

- include badge
  @include('components.badge', [
    'type' => 'warning',
    'pill' => true,
    'slot' => 'En proceso'
  ])

- include button
  @include('components.button', [
    'variant' => 'primary',
    'icon' => 'bx bx-plus',
    'slot' => 'Crear'
  ])
  @include('components.button', [
    'href' => '/ruta',
    'outline' => true,
    'variant' => 'secondary',
    'slot' => 'Ir'
  ])

- include card (texto simple)
  @include('components.card', [
    'title' => 'Título',
    'footer' => 'Pie opcional',
    'slot' => 'Contenido de la tarjeta'
  ])

- include card (footer con HTML)
  @php
    $footer = new \Illuminate\Support\HtmlString('<a href="#" class="btn btn-sm btn-primary">Guardar</a>');
  @endphp
  @include('components.card', [
    'title' => 'Título',
    'footer' => $footer,
    'slot' => 'Contenido de la tarjeta'
  ])

- include modal
  @php
    $modalFooter = new \Illuminate\Support\HtmlString(
      '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
       <button type="button" class="btn btn-primary">Guardar</button>'
    );
  @endphp
  @include('components.modal', [
    'id' => 'demoModal',
    'title' => 'Demo',
    'size' => 'lg',
    'centered' => true,
    'footer' => $modalFooter,
    'slot' => 'Contenido del modal'
  ])
  @include('components.button', [
    'slot' => 'Abrir modal',
    'attributes' => new \Illuminate\Support\HtmlString('data-bs-toggle="modal" data-bs-target="#demoModal"')
  ])

- include pagination
  @include('components.pagination', [
    'slot' => new \Illuminate\Support\HtmlString(
      '<li class="page-item disabled"><span class="page-link">«</span></li>
       <li class="page-item active"><a class="page-link" href="#">1</a></li>
       <li class="page-item"><a class="page-link" href="#">2</a></li>
       <li class="page-item"><a class="page-link" href="#">»</a></li>'
    )
  ])

- include progress-bar
  @include('components.progress-bar', [
    'value' => 60,
    'color' => 'success',
    'striped' => true,
    'animated' => true
  ])

- include spinner
  @include('components.spinner', [
    'type' => 'border',
    'color' => 'primary',
    'label' => 'Cargando...'
  ])

- include accordion (estructura manual en slot)
  @include('components.accordion', [
    'id' => 'acc1',
    'slot' => new \Illuminate\Support\HtmlString(
      '<div class="accordion-item">
         <h2 class="accordion-header" id="h1">
           <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#c1" aria-expanded="true" aria-controls="c1">Item 1</button>
         </h2>
         <div id="c1" class="accordion-collapse collapse show" aria-labelledby="h1" data-bs-parent="#acc1">
           <div class="accordion-body">Contenido 1</div>
         </div>
       </div>'
    )
  ])

- include tabs (headers en slot y contenido aparte)
  @include('components.tabs', [
    'id' => 'tabs1',
    'slot' => new \Illuminate\Support\HtmlString(
      '<li class="nav-item" role="presentation">
         <button class="nav-link active" id="tab-home" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab">Home</button>
       </li>'
    )
  ])
  <div class="tab-content mt-3" id="tabs1Content">
    <div class="tab-pane fade show active" id="home" role="tabpanel">Contenido Home</div>
  </div>

- include carousel (items en slot)
  @include('components.carousel', [
    'id' => 'car1',
    'controls' => true,
    'indicators' => true,
    'slot' => new \Illuminate\Support\HtmlString(
      '<div class="carousel-item active">
         <img src="'.asset('assets/images/gallery/01.png').'" class="d-block w-100" alt="...">
       </div>
       <div class="carousel-item">
         <img src="'.asset('assets/images/gallery/02.png').'" class="d-block w-100" alt="...">
       </div>'
    )
  ])

- include list-group
  @include('components.list-group', [
    'slot' => new \Illuminate\Support\HtmlString(
      '<li class="list-group-item active">Item 1</li>
       <li class="list-group-item">Item 2</li>'
    )
  ])

- include media-object
  @include('components.media-object', [
    'img' => asset('assets/images/avatars/avatar-2.png'),
    'alt' => 'User',
    'slot' => new \Illuminate\Support\HtmlString('<h6 class="mb-1">Título</h6><div class="text-muted">Descripción</div>')
  ])

- include avatar-chip
  @include('components.avatar-chip', [
    'src' => asset('assets/images/avatars/avatar-3.png'),
    'label' => 'John Doe'
  ])

- include notification-item (dentro de dropdown)
  @include('components.notification-item', [
    'icon' => 'bx bx-file',
    'color' => 'success',
    'title' => 'Reporte',
    'time' => 'hace 2 min',
    'slot' => 'Listo para descargar'
  ])

- include navbar
  @include('components.navbar', [
    'brand' => 'Mi App',
    'slot' => new \Illuminate\Support\HtmlString('<li class="nav-item"><a class="nav-link active" href="#">Inicio</a></li>')
  ])

- include timeline-item
  @include('components.timeline-item', [
    'time' => '09:30',
    'title' => 'Evento',
    'subtitle' => 'Detalle',
    'dotColor' => 'info',
    'slot' => 'Contenido del hito'
  ])

Layout y componentes estructurales
- Sidebar: incluido automáticamente por <x-sidebar /> en el layout.
- Topbar: incluido automáticamente por <x-topbar /> en el layout.
- Footer: incluido automáticamente por <x-footer /> en el layout.

Sugerencias de integración a Laravel
- Crea rutas y vistas que extiendan el layout para cada página (por ejemplo, widgets, timeline, perfil, etc.).
- Si usas Laravel 10+, puedes convertir estos componentes en componentes con clase si necesitas lógica adicional (php artisan make:component ...).

Notas
- Todo el CSS/JS proviene del template original (Bootstrap 5 + plugins). Mantén el orden de los scripts que ya viene en el layout.
- Si necesitas más componentes derivados de los HTML de ejemplo (e.g., variantes específicas), avísame y los generamos.

