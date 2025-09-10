@props([
  'id' => 'accordionExample',
])
<div class="accordion" id="{{ $id }}">
  {{ $slot }}
</div>
{{-- Ejemplo de item:
<div class="accordion-item">
  <h2 class="accordion-header" id="headingOne">
    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
      Accordion Item #1
    </button>
  </h2>
  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
    <div class="accordion-body">Contenido...</div>
  </div>
</div>
--}}

