@props([
    'type' => 'primary', // primary, secondary, success, danger, warning, info, light, dark
    'dismissible' => false,
])
<div {{ $attributes->class(['alert', 'alert-'.$type, 'alert-dismissible fade show' => $dismissible])->merge(['role' => 'alert']) }}>
    {{ $slot }}
    @if($dismissible)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif
</div>

