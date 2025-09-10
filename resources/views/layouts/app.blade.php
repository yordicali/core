@include('layouts.head')
<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		@include('layouts.sidebar')
		<!--end sidebar wrapper -->
		<!--start header -->
		@include('layouts.header')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				@php(
					$roleIds = Auth::check() ? Auth::user()->roles()->pluck('id') : collect()
				)
				@if((!isset($currentApp) || !$currentApp) && Auth::check())
					@php($canSeeCore = \App\Models\RoleAppVisibility::whereIn('role_id', $roleIds)->whereNull('application_id')->exists())
					@if(!$canSeeCore)
						@include('components.alert', [
							'type' => 'warning',
							'dismissible' => false,
							'slot' => 'Rol sin aplicaciones asignadas. Contacte al administrador para asignar aplicaciones visibles a su rol.'
						])
					@endif
				@endif
				@yield('content')
			</div>
		</div>
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		@include('layouts.footer')
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	@include('layouts.switcher')
	@stack('modals')
	@include('layouts.scripts')
