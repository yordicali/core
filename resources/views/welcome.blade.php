<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from silicon.createx.studio/landing-saas-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Aug 2022 19:36:41 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <title>CoreTVO | SaaS para SaaS Cree sus aplicaciones de manera rapida y profesional. </title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="Silicon - Multipurpose Technology Bootstrap Template">
    <meta name="keywords" content="bootstrap, business, creative agency, mobile app showcase, saas, fintech, finance, online courses, software, medical, conference landing, services, e-commerce, shopping cart, multipurpose, shop, ui kit, marketing, seo, landing, blog, portfolio, html5, css3, javascript, gallery, slider, touch, creative">
    <meta name="author" content="Createx Studio">

    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon and Touch Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{ asset('assets/favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{ asset('assets/favicon/safari-pinned-tab.svg')}}" color="#6366f1">
    <link rel="shortcut icon" href="{{ asset('assets/favicon/favicon.ico')}}">
    <meta name="msapplication-TileColor" content="#080032">
    <meta name="msapplication-config" content="assets/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <!-- Vendor Styles -->
    <link rel="stylesheet" media="screen" href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css')}}"/>
    <link rel="stylesheet" media="screen" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css')}}"/>

    <!-- Main Theme Styles + Bootstrap -->
    <link rel="stylesheet" media="screen" href="{{ asset('assets/css/theme.min.css')}}">

    <!-- Page loading styles -->
    <style>
      .page-loading {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        -webkit-transition: all .4s .2s ease-in-out;
        transition: all .4s .2s ease-in-out;
        background-color: #fff;
        opacity: 0;
        visibility: hidden;
        z-index: 9999;
      }
      .dark-mode .page-loading {
        background-color: #0b0f19;
      }
      .page-loading.active {
        opacity: 1;
        visibility: visible;
      }
      .page-loading-inner {
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        text-align: center;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        -webkit-transition: opacity .2s ease-in-out;
        transition: opacity .2s ease-in-out;
        opacity: 0;
      }
      .page-loading.active > .page-loading-inner {
        opacity: 1;
      }
      .page-loading-inner > span {
        display: block;
        font-size: 1rem;
        font-weight: normal;
        color: #9397ad;
      }
      .dark-mode .page-loading-inner > span {
        color: #fff;
        opacity: .6;
      }
      .page-spinner {
        display: inline-block;
        width: 2.75rem;
        height: 2.75rem;
        margin-bottom: .75rem;
        vertical-align: text-bottom;
        border: .15em solid #b4b7c9;
        border-right-color: transparent;
        border-radius: 50%;
        -webkit-animation: spinner .75s linear infinite;
        animation: spinner .75s linear infinite;
      }
      .dark-mode .page-spinner {
        border-color: rgba(255,255,255,.4);
        border-right-color: transparent;
      }
      @-webkit-keyframes spinner {
        100% {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
      @keyframes spinner {
        100% {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
    </style>

    <!-- Theme mode -->
    <script>
      let mode = window.localStorage.getItem('mode'),
          root = document.getElementsByTagName('html')[0];
      if (mode !== null && mode === 'dark') {
        root.classList.add('dark-mode');
      } else {
        root.classList.remove('dark-mode');
      }
    </script>

    <!-- Page loading scripts -->
    <script>
      (function () {
        window.onload = function () {
          const preloader = document.querySelector('.page-loading');
          preloader.classList.remove('active');
          setTimeout(function () {
            preloader.remove();
          }, 1000);
        };
      })();
    </script>

    <!-- Google Tag Manager -->
    <script>
      (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      '../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-WKV3GT5');
    </script>
  </head>


  <!-- Body -->
  <body>
    
    <!-- Google Tag Manager (noscript)-->
    <noscript>
      <iframe src="http://www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0" style="display: none; visibility: hidden;"></iframe>
    </noscript>

    <!-- Page loading spinner -->
    <div class="page-loading active">
      <div class="page-loading-inner">
        <div class="page-spinner"></div><span>Cargando...</span>
      </div>
    </div>


    <!-- Page wrapper for sticky footer -->
    <!-- Wraps everything except footer to push footer to the bottom of the page if there is little content -->
    <main class="page-wrapper">


      <!-- Navbar -->
      <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page -->
      <header class="header navbar navbar-expand-lg position-absolute navbar-sticky">
        <div class="container px-3">
          <a href="index.html" class="navbar-brand pe-3">
            <img src="{{asset('assets/images/logo/logotvo.png')}}" width="120" alt="Silicon">
            
          </a>
          <div id="navbarNav" class="offcanvas offcanvas-end">
            <div class="offcanvas-header border-bottom">
              <h5 class="offcanvas-title">Menu</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               
                <li class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Modulos</a>
                  <div class="dropdown-menu">
                    <div class="d-lg-flex pt-lg-3">
                      <div class="mega-dropdown-column">
                        <h6 class="px-3 mb-2">Usuarios</h6>
                        <ul class="list-unstyled mb-3">
                          <li><a href="#features" class="dropdown-item py-1">Listar usuarios</a></li>
                          <li><a href="#features" class="dropdown-item py-1">Eliminar usuario</a></li>
                          <li><a href="#features" class="dropdown-item py-1">Detalle usuario</a></li>
                          <li><a href="#features" class="dropdown-item py-1">Modificar usuario</a></li>
                        </ul>
                        <h6 class="px-3 mb-2">Aplicaciones</h6>
                        <ul class="list-unstyled mb-3">
                          <li><a href="#features" class="dropdown-item py-1">Crear aplicaciones</a></li>
                          <li><a href="#features" class="dropdown-item py-1">Listar crear aplicaciones</a></li>
                          <li><a href="#features" class="dropdown-item py-1">Modificar aplicaciones </a></li>
                          <li><a href="#features" class="dropdown-item py-1">ver aplicaciones </a></li>
                          <li><a href="#features" class="dropdown-item py-1">Eliminar aplicaciones </a></li>
                            <li><a href="#features" class="dropdown-item py-1">Añadir funciones a app </a></li>
                        </ul>
                        <h6 class="px-3 mb-2">Gestor de archivos Centralizado</h6>
                        <ul class="list-unstyled">
                          <li><a href="#features" class="dropdown-item py-1">Gestor de archivos </a></li>
                          <li><a href="#features" class="dropdown-item py-1">Subir archivo</a></li>
                          <li><a href="#features" class="dropdown-item py-1">Eliminar archivo </a></li>
                          <li><a href="#features" class="dropdown-item py-1">Agregar modal en formularios</a></li>
                        </ul>
                      </div>
                      <div class="mega-dropdown-column">
                        <h6 class="px-3 mb-2">Roles</h6>
                        <ul class="list-unstyled mb-3">
                          <li><a href="#features" class="dropdown-item py-1">Listar roles</a></li>
                          <li><a href="#features" class="dropdown-item py-1">Crear roles</a></li>
                          <li><a href="#features" class="dropdown-item py-1">Modificar roles</a></li>
                          <li><a href="#features" class="dropdown-item py-1">Eliminar roles</a></li>
                          <li><a href="#features" class="dropdown-item py-1">Permisos roles</a></li>
                          <li><a href="#features" class="dropdown-item py-1">Apps por roles</a></li>
                        </ul>
                        <h6 class="px-3 mb-2">Funciones</h6>
                        <ul class="list-unstyled mb-3">
                          <li><a href="#features" class="dropdown-item py-1">Listar funciones</a></li>
                          <li><a href="#features" class="dropdown-item py-1">Crear funciones</a></li>
                          <li><a href="#features" class="dropdown-item py-1">Modificar funciones</a></li>
                          <li><a href="#features" class="dropdown-item py-1">Eliminar funciones</a></li>
                          <li><a href="#features" class="dropdown-item py-1">Funciones permisos roles</a></li>
                        </ul>
                      </div>
                      <div class="mega-dropdown-column">
                        <h6 class="px-3 mb-2">Sistema de LOGIN</h6>
                        <ul class="list-unstyled mb-3">
                          <li><a href="#features" class="dropdown-item py-1">Ingreso login</a></li>
                          <li><a href="#features" class="dropdown-item py-1">Cerrar session</a></li>
                          <li><a href="#features" class="dropdown-item py-1">Restablecer clave</a></li>
                        </ul>
                        <h6 class="px-3 mb-2">Manejo de cuenta de usuario</h6>
                        <ul class="list-unstyled mb-3">
                            <li><a href="#features" class="dropdown-item py-1">Modificar datos de usuario</a></li>
                          <li><a href="#features" class="dropdown-item py-1">Modificar clave</a></li>
                          <li><a href="#features" class="dropdown-item py-1">Autenticacion doble factor</a></li>
                          <li><a href="#features" class="dropdown-item py-1">Listar sesiones de usuario</a></li>
                          <li><a href="#features" class="dropdown-item py-1">Eliminar sesiones</a></li>
                        </ul>
                        <h6 class="px-3 mb-2">Personalizaciones</h6>
                        <ul class="list-unstyled">
                          <li><a href="#features" class="dropdown-item py-1">Login privado para cada app</a></li>
                          <li><a href="#features" class="dropdown-item py-1">Menu personalizable</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
                
                <li class="nav-item">
                  <a href="#elejirnos" class="nav-link">¿Por que elegirnos?</a>
                </li>
                <li class="nav-item">
                  <a href="#contribuir" class="nav-link">¿ Que puedo hacer con esta herrmienta ?</a>
                </li>
              </ul>
            </div>
            <div class="offcanvas-header border-top">
              <a href="{{url('/login')}}" class="btn btn-primary w-100" target="_blank" rel="noopener">
                <i class="bx bx-chevron-right-square fs-4 lh-1 me-1"></i>
                &nbsp;Ingresar
              </a>
            </div>      
          </div>
          <div class="form-check form-switch mode-switch pe-lg-1 ms-auto me-4" data-bs-toggle="mode">
            <input type="checkbox" class="form-check-input" id="theme-mode">
            <label class="form-check-label d-none d-sm-block" for="theme-mode">Claro</label>
            <label class="form-check-label d-none d-sm-block" for="theme-mode">Oscuro</label>
          </div>
          <button type="button" class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a href="{{url('/login')}}" class="btn btn-primary btn-sm fs-sm rounded d-none d-lg-inline-flex" target="_blank" rel="noopener">
            <i class="bx bx-pointer fs-5 lh-1 me-1"></i>
            &nbsp;Ingresar
          </a>
        </div>
      </header>


      <!-- Hero section with layer parallax gfx -->
      <section class="position-relative overflow-hidden py-4 mb-3">
        <div class="container pt-lg-3">
          <div class="row flex-lg-nowrap">
            <div class="col-lg-6 col-xl-5 text-center text-lg-start pt-5 mt-xl-4">
              <h1 class="display-4 pt-5 pb-2 pb-lg-3 mt-sm-2 mt-lg-5">Despliega tu aplicacion facil y en minutos</h1>
              <p class="fs-lg mb-4 mb-lg-5">CoreTvo cuenta con un base de modulos listos para usar en sus aplicaciones para evitarle trabajo, tambien tenemos aplicaciones listas para personaliar y usar ala medida.</p>
              <a href="{{url('/login')}}" class="btn btn-primary btn-lg">¡ Quiero ingrear ya !</a>
              <div class="pt-5 mt-xl-5">
                <h6 class="pt-xl-3 pb-3 pb-lg-4">Tenemos todo un ecosistema digital</h6>
                <div class="d-flex justify-content-center justify-content-lg-start mx-xl-n2">
                  <a href="#" class="d-block me-2">
                    <img src="{{ asset('/assets/images/logo/logotvo.png')}}" width="135" alt="Logo">
                  </a>
                  <a href="#" class="d-block me-2"><br>
                    <img src="{{ asset('/assets/images/logo/whatt.png')}}" width="135" alt="Logo">
                  </a>
                  <a href="#" class="d-block me-2"><br>
                    <img src="{{ asset('/assets/images/logo/jellydash.png')}}" width="135" alt="Logo">
                  </a>
                </div>
              </div>
            </div>

            <!-- Layer parallax -->
            <div class="parallax mt-4 ms-4 me-lg-0 ms-lg-n5 ms-xl-n3 mt-lg-n4">
              <div class="parallax-layer" data-depth="0.4"><br><br><br><br>
                <img src="{{ asset('assets/img/landing/saas-1/hero/layer01.png')}}" width="2116" alt="Layer">
              </div>
              
              <div class="parallax-layer zindex-2" data-depth="0.4">
                <img src="{{ asset('assets/img/landing/saas-1/hero/layer05.png')}}" alt="Layer">
              </div>
              <div class="parallax-layer zindex-2" data-depth="0.28">
                <img src="{{ asset('assets/img/landing/saas-1/hero/layer06.png')}}" alt="Layer">
              </div>
              <div class="parallax-layer zindex-2" data-depth="0.35">
                <img src="{{ asset('assets/img/landing/saas-1/hero/layer07.png')}}" alt="Layer">
              </div>
            </div>
          </div>
        </div>
      </section>


      <!-- Features (Icon + Text) -->
      <section class="container" id="features">
        <h2 class="h1 text-center pb-4 pb-lg-5">Lo que tenemos para ti</h2>
        <div class="row">
          <div class="col-lg-3 col-md-4 col-sm-6 text-center pb-md-2 mb-3 mb-lg-4">
            <div class="d-inline-block bg-secondary rounded-circle p-3 mb-4">
              <img src="{{ asset('assets/img/landing/saas-1/features/chat.svg')}}" width="32" alt="Icon">
            </div>
            <h3 class="h5 pb-1 mb-2">Comunidad activa</h3>
            <p class="fs-sm">Siempre disponibles para mejoras o ayudar a impulsar tus ideas.</p>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 text-center pb-md-2 mb-3 mb-lg-4">
            <div class="d-inline-block bg-secondary rounded-circle p-3 mb-4">
              <img src="{{ asset('assets/img/landing/saas-1/features/analytics.svg')}}" width="32" alt="Icon">
            </div>
            <h3 class="h5 pb-1 mb-2">Reportes y analisis</h3>
            <p class="fs-sm">Reportes de cada modulo para entender todo negocio.</p>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 text-center pb-md-2 mb-3 mb-lg-4">
            <div class="d-inline-block bg-secondary rounded-circle p-3 mb-4">
              <img src="{{ asset('assets/img/landing/saas-1/features/bell.svg')}}" width="32" alt="Icon">
            </div>
            <h3 class="h5 pb-1 mb-2">Notificaciones</h3>
            <p class="fs-sm">Tenemos un panel para envios masivos por WHATSAPP consulta.</p>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 text-center pb-md-2 mb-3 mb-lg-4">
            <div class="d-inline-block bg-secondary rounded-circle p-3 mb-4">
              <img src="{{ asset('assets/img/landing/saas-1/features/tasks.svg')}}" width="32" alt="Icon">
            </div>
            <h3 class="h5 pb-1 mb-2">Kit de Componentes</h3>
            <p class="fs-sm">Tenemos componentne listos para usar desde el boton hasta wizard y card hermosas.</p>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 text-center pb-md-2 mb-3 mb-lg-4">
            <div class="d-inline-block bg-secondary rounded-circle p-3 mb-4">
              <img src="{{ asset('assets/img/landing/saas-1/features/calendar.svg')}}" width="32" alt="Icon">
            </div>
            <h3 class="h5 pb-1 mb-2">Rapido y a tiempo</h3>
            <p class="fs-sm">En menos de 5 minutos tienes nuestro poryecto, ya solo crea tu logica de negocio y lanza tu aplicacion.</p>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 text-center pb-md-2 mb-3 mb-lg-4">
            <div class="d-inline-block bg-secondary rounded-circle p-3 mb-4">
              <img src="{{ asset('assets/img/landing/saas-1/features/add-group.svg')}}" width="32" alt="Icon">
            </div>
            <h3 class="h5 pb-1 mb-2">Roles y permisos</h3>
            <p class="fs-sm">Sabemos que es una tarea dura, asi que ya esta lista para usar solo registra que permisos tiene cada rol y sigue adelante.</p>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 text-center pb-md-2 mb-3 mb-lg-4">
            <div class="d-inline-block bg-secondary rounded-circle p-3 mb-4">
              <img src="{{ asset('assets/img/landing/saas-1/features/headset.svg')}}" width="32" alt="Icon">
            </div>
            <h3 class="h5 pb-1 mb-2">Soporte 24/7</h3>
            <p class="fs-sm">Tenemos un gran equipo de trabajo para resolver rapidamente las PQRS, y tenemos un listado de nuevas funciones.</p>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 text-center pb-md-2 mb-3 mb-lg-4">
            <div class="d-inline-block bg-secondary rounded-circle p-3 mb-4">
              <img src="{{ asset('assets/img/landing/saas-1/features/shield.svg')}}" width="32" alt="Icon">
            </div>
            <h3 class="h5 pb-1 mb-2">Seguridad garantizada</h3>
            <p class="fs-sm">Informacion sifrada, todo los datos son totalmente cifrados y encriptados para mantener la integridad de la información.</p>
          </div>
        </div>
      </section>


      <!-- Dashboard -->
      <section class="container pt-3 pt-md-4 pt-lg-5 pb-2 mt-lg-2 mt-xl-4" id="elejirnos">
        <div class="row align-items-center">
          <div class="rellax col-md-7" data-rellax-percentage="0.5" data-rellax-speed="-0.6" data-disable-parallax-down="lg">
            <img src="{{ asset('assets/img/landing/saas-1/dashboard.png')}}" class="d-block mx-auto" width="746" alt="Image">
          </div>
          <div class="rellax col-md-5 col-xl-4 offset-xl-1 d-flex d-sm-block flex-column" data-rellax-percentage="0.5" data-rellax-speed="0.8" data-disable-parallax-down="lg">
            <h2 class="pb-3 pt-2 pt-md-0">Por que CoreTvo</h2>
            <ul class="list-unstyled pb-2">
              <li class="d-flex align-items-center pb-1 mb-2">
                <i class="bx bx-check-circle text-primary fs-xl me-2"></i>
                Creado con las mejores herramientas.
              </li>
              <li class="d-flex align-items-center pb-1 mb-2">
                <i class="bx bx-check-circle text-primary fs-xl me-2"></i>
                Rapidos ajustes
              </li>
              <li class="d-flex align-items-center pb-1 mb-2">
                <i class="bx bx-check-circle text-primary fs-xl me-2"></i>
                Precio unico
              </li>
              <li class="d-flex align-items-center pb-1 mb-2">
                <i class="bx bx-check-circle text-primary fs-xl me-2"></i>
                Videos tutoriales
              </li>
              <li class="d-flex align-items-center pb-1 mb-2">
                <i class="bx bx-check-circle text-primary fs-xl me-2"></i>
                Rapido y seguro
              </li>
            </ul>
            <a href="{{url('/login')}}" class="btn btn-primary">
              ¡Ingresar ahora!
              <i class="bx bx-right-arrow-alt fs-xl ms-2"></i>
            </a>
          </div>
        </div>
      </section>


      


      <!-- Pricing -->
      <!--<section class="container py-5 my-md-2 my-lg-4 my-xl-5" id="contribuir">
        <h2 class="h1 text-center pb-3 pb-md-4">Transparent Pricing for You</h2>
        <div class="price-switch-wrapper mb-n2">
          <div class="form-check form-switch price-switch justify-content-center mt-2 mb-4" data-bs-toggle="price">
            <input type="checkbox" class="form-check-input" id="pricing">
            <label class="form-check-label" for="pricing">Monthly</label>
            <label class="form-check-label d-flex align-items-start" for="pricing">Annually <span class="text-danger fs-xs fw-semibold mt-n2 ms-2">-10%</span></label>
          </div>    
          <div class="table-responsive-xxl pt-md-3">
            <div class="row flex-nowrap pb-4">
              <div class="col">
                <div class="card h-100 border-0 shadow-sm p-xxl-3" style="min-width: 18rem;">
                  <div class="card-body">
                    <div class="d-flex align-items-center pb-2 pb-md-3 mb-4">
                      <div class="flex-shrink-0 bg-secondary rounded-3">
                        <img src="{{ asset('assets/img/landing/saas-1/pricing/basic.png')}}" width="84" alt="Icon">
                      </div>
                      <div class="ps-4">
                        <h3 class="fs-lg fw-normal text-body mb-2">Basic</h3>
                        <h4 class="h3 lh-1 mb-0">
                          <span data-monthly-price>$6.00</span>
                          <span class="d-none" data-annual-price>$5.40</span>
                          <span class="text-body fs-sm fw-normal"> / per month</span>
                        </h4>
                      </div>
                    </div>
                    <ul class="list-unstyled fs-sm pb-md-3 mb-3">
                      <li class="d-flex mb-2">
                        <i class="bx bx-check fs-xl text-primary me-1"></i>
                        Aenean neque tortor, purus faucibus
                      </li>
                      <li class="d-flex mb-2">
                        <i class="bx bx-check fs-xl text-primary me-1"></i>
                        Nullam augue vitae et volutpat sagittis
                      </li>
                      <li class="d-flex text-muted mb-2">
                        <i class="bx bx-x fs-xl me-1"></i>
                        Mauris massa penatibus enim elit quam
                      </li>
                      <li class="d-flex text-muted mb-2">
                        <i class="bx bx-x fs-xl me-1"></i>
                        Nec ac sagittis nunc bibendum
                      </li>
                      <li class="d-flex text-muted">
                        <i class="bx bx-x fs-xl me-1"></i>
                        Odio ut orci volutpat ultricies eleifend
                      </li>
                    </ul>
                  </div>
                  <div class="card-footer border-0 pt-0 pb-4">
                    <a href="#" class="btn btn-outline-primary w-100">Start free trial</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-100 border-0 bg-primary shadow-primary shadow-dark-mode-none p-xxl-3" style="min-width: 18rem;">
                  <div class="card-body">
                    <div class="d-flex align-items-center pb-2 pb-md-3 mb-4">
                      <div class="flex-shrink-0 rounded-3" style="background-color: rgba(255,255,255, .1);">
                        <img src="{{ asset('assets/img/landing/saas-1/pricing/standard.png')}}" width="84" alt="Icon">
                      </div>
                      <div class="ps-4">
                        <h3 class="fs-lg fw-normal text-light opacity-70 mb-2">Standard</h3>
                        <h4 class="h3 text-light lh-1 mb-0">
                          <span data-monthly-price>$12.00</span>
                          <span class="d-none" data-annual-price>$10.80</span>
                          <span class="fs-sm fw-normal opacity-70"> / per month</span>
                        </h4>
                      </div>
                    </div>
                    <ul class="list-unstyled fs-sm pb-md-3 mb-3">
                      <li class="d-flex text-light mb-2">
                        <i class="bx bx-check fs-xl me-1"></i>
                        <span class="opacity-70">Aenean neque tortor, purus faucibus</span>
                      </li>
                      <li class="d-flex text-light mb-2">
                        <i class="bx bx-check fs-xl me-1"></i>
                        <span class="opacity-70">Nullam augue vitae et volutpat sagittis</span>
                      </li>
                      <li class="d-flex text-light mb-2">
                        <i class="bx bx-check fs-xl me-1"></i>
                        <span class="opacity-70">Mauris massa penatibus enim elit quam</span>
                      </li>
                      <li class="d-flex text-light mb-2">
                        <i class="bx bx-check fs-xl me-1"></i>
                        <span class="opacity-70">Nec ac sagittis nunc bibendum</span>
                      </li>
                      <li class="d-flex text-light opacity-50">
                        <i class="bx bx-x fs-xl me-1"></i>
                        Odio ut orci volutpat ultricies eleifend
                      </li>
                    </ul>
                  </div>
                  <div class="card-footer border-0 pt-0 pb-4">
                    <a href="#" class="btn btn-light w-100">Start free trial</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-100 border-0 shadow-sm p-xxl-3" style="min-width: 18rem;">
                  <div class="card-body">
                    <div class="d-flex align-items-center pb-2 pb-md-3 mb-4">
                      <div class="flex-shrink-0 bg-secondary rounded-3">
                        <img src="{{ asset('assets/img/landing/saas-1/pricing/ultimate.png')}}" width="84" alt="Icon">
                      </div>
                      <div class="ps-4">
                        <h3 class="fs-lg fw-normal text-body mb-2">Ultimate</h3>
                        <h4 class="h3 lh-1 mb-0">
                          <span data-monthly-price>$18.00</span>
                          <span class="d-none" data-annual-price>$16.20</span>
                          <span class="text-body fs-sm fw-normal"> / per month</span>
                        </h4>
                      </div>
                    </div>
                    <ul class="list-unstyled fs-sm pb-md-3 mb-3">
                      <li class="d-flex mb-2">
                        <i class="bx bx-check fs-xl text-primary me-1"></i>
                        Aenean neque tortor, purus faucibus
                      </li>
                      <li class="d-flex mb-2">
                        <i class="bx bx-check fs-xl text-primary me-1"></i>
                        Nullam augue vitae et volutpat sagittis
                      </li>
                      <li class="d-flex mb-2">
                        <i class="bx bx-check fs-xl text-primary me-1"></i>
                        Mauris massa penatibus enim elit quam
                      </li>
                      <li class="d-flex mb-2">
                        <i class="bx bx-check fs-xl text-primary me-1"></i>
                        Nec ac sagittis nunc bibendum
                      </li>
                      <li class="d-flex">
                        <i class="bx bx-check fs-xl text-primary me-1"></i>
                        Odio ut orci volutpat ultricies eleifend
                      </li>
                    </ul>
                  </div>
                  <div class="card-footer border-0 pt-0 pb-4">
                    <a href="#" class="btn btn-outline-primary w-100">Start free trial</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>-->


      


      <!-- Integrations -->
      <section class="container py-5 my-md-2 my-lg-4 my-xl-5" id="contribuir">
        <div class="row justify-content-center pt-1 pb-1 mb-2 mb-md-3 mb-lg-4">
          <div class="col-lg-8 col-md-9 text-center">
            <h2 class="h1 mb-4">Crea lo que imagines, con nuestra plataforma</h2>
            <p class="fs-lg text-muted mb-0">Apps de calendario, apps cobros tu imagina y nosotros te ayudamos. Desde apps de inventario, hasta fuertes ERPs.</p>
          </div>
        </div>
        <div class="swiper swiper-nav-onhover mx-n2" data-swiper-options='{
          "slidesPerView": 2,
          "spaceBetween": 8,
          "pagination": {
            "el": ".swiper-pagination",
            "clickable": true
          },
          "breakpoints": {
            "500": {
              "slidesPerView": 3
            },
            "600": {
              "slidesPerView": 4
            },
            "768": {
              "slidesPerView": 5
            },
            "850": {
              "slidesPerView": 6
            },
            "1000": {
              "slidesPerView": 7
            },
            "1200": {
              "slidesPerView": 8
            }
          }
        }'>
          <div class="swiper-wrapper">

            <!-- Item -->
            <div class="swiper-slide py-3">
              <a href="#" class="card card-hover border-0 shadow-sm py-3 mx-2">
                <div class="card-body">
                  <img src="{{ asset('assets/img/brands/google.svg')}}" class="d-block mx-auto" alt="Google">
                </div>
              </a>
            </div>

            <!-- Item -->
            <div class="swiper-slide py-3">
              <a href="#" class="card card-hover border-0 shadow-sm py-3 mx-2">
                <div class="card-body">
                  <img src="{{ asset('assets/img/brands/zoom.svg')}}" class="d-block mx-auto" alt="Zoom">
                </div>
              </a>
            </div>

            <!-- Item -->
            <div class="swiper-slide py-3">
              <a href="#" class="card card-hover border-0 shadow-sm py-3 mx-2">
                <div class="card-body">
                  <img src="{{ asset('assets/img/brands/slack.svg')}}" class="d-block mx-auto" alt="Slack">
                </div>
              </a>
            </div>

            <!-- Item -->
            <div class="swiper-slide py-3">
              <a href="#" class="card card-hover border-0 shadow-sm py-3 mx-2">
                <div class="card-body">
                  <img src="{{ asset('assets/img/brands/gmail.svg')}}" class="d-block mx-auto" alt="Gmail">
                </div>
              </a>
            </div>

            <!-- Item -->
            <div class="swiper-slide py-3">
              <a href="#" class="card card-hover border-0 shadow-sm py-3 mx-2">
                <div class="card-body">
                  <img src="{{ asset('assets/img/brands/trello.svg')}}" class="d-block mx-auto" alt="Trello">
                </div>
              </a>
            </div>

            <!-- Item -->
            <div class="swiper-slide py-3">
              <a href="#" class="card card-hover border-0 shadow-sm py-3 mx-2">
                <div class="card-body">
                  <img src="{{ asset('assets/img/brands/mailchimp.svg')}}" class="d-block mx-auto" alt="Mailchimp">
                </div>
              </a>
            </div>

            <!-- Item -->
            <div class="swiper-slide py-3">
              <a href="#" class="card card-hover border-0 shadow-sm py-3 mx-2">
                <div class="card-body">
                  <img src="{{ asset('assets/img/brands/dropbox.svg')}}" class="d-block mx-auto" alt="Dropbox">
                </div>
              </a>
            </div>

            <!-- Item -->
            <div class="swiper-slide py-3">
              <a href="#" class="card card-hover border-0 shadow-sm py-3 mx-2">
                <div class="card-body">
                  <img src="{{ asset('assets/img/brands/evernote.svg')}}" class="d-block mx-auto" alt="Evernote">
                </div>
              </a>
            </div>
          </div>

          <!-- Pagination (bullets) -->
          <div class="swiper-pagination position-relative pt-3 mt-4"></div>
        </div>
        <div class="text-center my-3 mt-xl-n2">
          <a href="{{url('/login')}}" class="btn btn-primary">Ingresar ahora</a>
        </div>
      </section>


      


    <!-- Footer -->
    <footer class="footer pt-5 pb-4 pb-lg-5">
      <div class="container pt-lg-4">
        <div class="row pb-5">
          <div class="col-lg-4 col-md-6">
            <div class="navbar-brand text-dark p-0 me-0 mb-3 mb-lg-4">
              <img src="{{asset('assets/images/logo/logotvo.png')}}" width="200" alt="Silicon">
              
            </div>
            <p class="fs-sm pb-lg-3 mb-4">Wooow llegaste hasta el final, no lo dudes más y unete a nuestra comunidad, parende desde como iniciar en las apliciones SaaS hasta montar tu propio servicio.</p>
            
            </form>
          </div>
          <div class="col-xl-6 col-lg-7 col-md-5 offset-xl-2 offset-md-1 pt-4 pt-md-1 pt-lg-0">
            <div id="footer-links" class="row">
              <div class="col-lg-6">
                <h6 class="mb-2">
                  <a href="#useful-links" class="d-block text-dark dropdown-toggle d-lg-none py-2" data-bs-toggle="collapse">Useful Links</a>
                </h6>
                <div id="useful-links" class="collapse d-lg-block" data-bs-parent="#footer-links">
                  
                  <ul class="nav flex-column mb-2 mb-lg-0">
                    <li class="nav-item"><a href="#" class="nav-link d-inline-block px-0 pt-1 pb-2">Terms &amp; Conditions</a></li>
                    <li class="nav-item"><a href="#" class="nav-link d-inline-block px-0 pt-1 pb-2">Privacy Policy</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-xl-4 col-lg-3">
                <h6 class="mb-2">
                  <a href="#social-links" class="d-block text-dark dropdown-toggle d-lg-none py-2" data-bs-toggle="collapse">Socials</a>
                </h6>
                <div id="social-links" class="collapse d-lg-block" data-bs-parent="#footer-links">
                  <ul class="nav flex-column mb-2 mb-lg-0">
                    <li class="nav-item"><a href="#" class="nav-link d-inline-block px-0 pt-1 pb-2">Facebook</a></li>
                    <li class="nav-item"><a href="#" class="nav-link d-inline-block px-0 pt-1 pb-2">LinkedIn</a></li>
                    <li class="nav-item"><a href="#" class="nav-link d-inline-block px-0 pt-1 pb-2">Twitter</a></li>
                    <li class="nav-item"><a href="#" class="nav-link d-inline-block px-0 pt-1 pb-2">Instagram</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-xl-4 col-lg-5 pt-2 pt-lg-0">
                <h6 class="mb-2">Contactanos</h6>
                <a href="mailto:email@example.com" class="fw-medium">info@tvo.com.co</a>
              </div>
            </div>
          </div>
        </div>
        <p class="nav d-block fs-xs text-center text-md-start pb-2 pb-lg-0 mb-0">
          &copy; All rights reserved. Made by 
          <a class="nav-link d-inline-block p-0" href="https://createx.studio/" target="_blank" rel="noopener">Createx Studio</a>
        </p>
      </div>
    </footer>


    <!-- Back to top button -->
    <a href="#top" class="btn-scroll-top" data-scroll>
      <span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span>
      <i class="btn-scroll-top-icon bx bx-chevron-up"></i>
    </a>


    <!-- Vendor Scripts -->
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/parallax-js/dist/parallax.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/jarallax/dist/jarallax.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/rellax/rellax.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

    <!-- Main Theme Script -->
    <script src="{{ asset('assets/js/theme.min.js')}}"></script>
  </body>

<!-- Mirrored from silicon.createx.studio/landing-saas-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Aug 2022 19:37:10 GMT -->
</html>