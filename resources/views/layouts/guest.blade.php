<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @if(isset($currentApp) && $currentApp)
      @if($currentApp->nombre)
          <title>{{ $currentApp->nombre }}</title>
		  <link rel="icon" href="{{ $currentApp->logo }}" type="image/png" />
      @else
          <title>{{ config('app.name', 'CoreTvo') }}</title>
		  <link rel="icon" href="{{asset('assets/images/logo/logotvo.png')}}" type="image/png" />
      @endif
	@else
		<title>{{ config('app.name', 'CoreTvo') }}</title>
		<link rel="icon" href="{{asset('assets/images/logo/logotvo.png')}}" type="image/png" />
	@endif

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  {{-- 🎨 Fondo dinámico con color desde $currentApp->color --}}
  <style>
    :root{
      /* Color principal: usa el que tengas en BD o fallback */
      --c1: {{ isset($currentApp->color_base) && $currentApp->color_base ? $currentApp->color_base : '#000000ff' }};
      --c2: #f7f6f4; /* secundario fijo o cámbialo si quieres */
      --speed: 12s;
    }

    html, body { height: 100%; }
    body{
      min-height:100vh;
      background:#000;
      overflow-x:hidden;
      font-family:'Figtree',sans-serif;
    }

    /* quita fondo gris default si Breeze lo genera */
    .min-h-screen.bg-gray-100 { background-color: transparent !important; }
    .dark .min-h-screen.bg-gray-900 { background-color: transparent !important; }

    .bg{
      position:fixed; inset:0; z-index:0; overflow:hidden; pointer-events:none;
    }
    .bg .gradient{
      position:absolute; inset:0;
      background: linear-gradient(120deg,var(--c1),var(--c2));
      background-size:300% 300%;
      animation: moveBG var(--speed) linear infinite;
      filter:blur(12px) saturate(1.1);
    }
    @keyframes moveBG{
      0%{background-position:0% 50%}
      50%{background-position:100% 50%}
      100%{background-position:0% 50%}
    }

    .shape{
      position:absolute;
      border-radius:40%;
      opacity:0.35;
      background:rgba(255,255,255,0.7);
      mix-blend-mode:overlay;
      animation: float linear infinite;
    }
    .shape:nth-child(2){width:120px;height:120px;top:10%;left:20%;animation-duration:25s;animation-delay:-5s}
    .shape:nth-child(3){width:200px;height:200px;top:60%;left:70%;animation-duration:40s;animation-delay:-10s}
    .shape:nth-child(4){width:80px;height:80px;top:30%;left:80%;animation-duration:20s;animation-delay:-15s}
    .shape:nth-child(5){width:160px;height:160px;top:80%;left:10%;animation-duration:35s;animation-delay:-20s}
    .shape:nth-child(6){width:100px;height:100px;top:50%;left:40%;animation-duration:30s;animation-delay:-25s}
    @keyframes float{
      0%{transform:translateY(0) rotate(0deg)}
      50%{transform:translateY(-60px) rotate(180deg)}
      100%{transform:translateY(0) rotate(360deg)}
    }

    .content-wrap{ position:relative; z-index:1; }
  </style>
</head>
<body class="antialiased">
  {{-- Fondo dinámico --}}
  <div class="bg" aria-hidden="true">
    <div class="gradient"></div>
    <div class="shape"></div>
    <div class="shape"></div>
    <div class="shape"></div>
    <div class="shape"></div>
    <div class="shape"></div>
  </div>

  {{-- Contenido del login --}}
  <div class="content-wrap font-sans text-gray-900 dark:text-gray-100">
      {{ $slot }}
  </div>
</body>
</html>
