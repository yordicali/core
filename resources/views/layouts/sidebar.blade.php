<div class="sidebar-wrapper" data-simplebar="true">
<div class="sidebar-header">
<div>
					<h4 class="logo-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4>
				</div>				
<div>
					<a href="{{ isset($currentApp) && $currentApp && $currentApp->url_inicial ? url($currentApp->url_inicial) : url('/dashboard') }}">
						@if(isset($currentApp) && $currentApp && $currentApp->logo)
							<img src="{{ asset('storage/'.$currentApp->logo) }}" alt="logo app" width="90px"/>
						@else
							<img src="{{asset('assets/images/logo/logotvo.png')}}" class="" alt="logo icon" width="90px"/>
						@endif
					</a>
                </div>

				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>			
			<!--navigation-->
			<ul class="metismenu" id="menu">
				@php($appSel = $currentApp ?? null)
				@if($appSel)
					<li class="menu-label">{{ $appSel->nombre }}</li>
					@forelse($appSel->funciones as $f)
					<li>
						<a href="{{ url($f->url ?? '#') }}">
							<div class="parent-icon">@if($f->icono)<i class="{{ $f->icono }}"></i>@else <i class="bx bx-right-arrow-alt"></i> @endif</div>
							<div class="menu-title">{{ $f->nombre }}</div>
						</a>
					</li>
					@empty
					<li><a href="#"><div class="parent-icon"><i class="bx bx-info-circle"></i></div><div class="menu-title">Sin funciones</div></a></li>
					@endforelse
				@else
					<?php
					    $roleIds = Auth::check() ? Auth::user()->roles()->pluck('id') : collect();
					    $canSeeCore = \App\Models\RoleAppVisibility::whereIn('role_id', $roleIds)->whereNull('application_id')->exists()
					?>
					@if(!$canSeeCore)
						<li><a href="#"><div class="parent-icon"><i class="bx bx-block"></i></div><div class="menu-title">Rol sin aplicaciones asignadas</div></a></li>
					@else
					<li>
						<a href="{{ route('users.index') }}">
							<div class="parent-icon"><i class="bx bx-group"></i>
							</div>
							<div class="menu-title">Usuarios</div>
						</a>
					</li>
					<li>
						<a href="{{ route('apps.index') }}">
							<div class="parent-icon"><i class="bx bx-grid-alt"></i>
							</div>
							<div class="menu-title">Apps</div>
						</a>
					</li>
					<li>
						<a href="{{ route('archivos.index') }}">
							<div class="parent-icon"><i class="bx bx-folder"></i>
							</div>
							<div class="menu-title">Archivos</div>
						</a>
					</li>
					<li>
						<a href="{{ route('roles.index') }}">
							<div class="parent-icon"><i class="bx bx-id-card"></i>
							</div>
							<div class="menu-title">Roles</div>
						</a>
					</li>
					<li>
						<a href="{{ route('role-permissions.index') }}">
							<div class="parent-icon"><i class="bx bx-key"></i>
							</div>
							<div class="menu-title">Permisos de rol</div>
						</a>
					</li>
					<li>
						<a href="{{ route('funciones.index') }}">
							<div class="parent-icon"><i class="bx bx-cog"></i>
							</div>
							<div class="menu-title">Funciones</div>
						</a>
						</li>
					<li>
						<a href="{{ route('role-apps.index') }}">
							<div class="parent-icon"><i class="bx bx-category"></i>
							</div>
							<div class="menu-title">Apps roles</div>
						</a>
						</li>
					@endif
				@endif
			</ul>
			<!--end navigation-->
		</div>
