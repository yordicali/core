@extends('layouts.app')

@section('content')
  <h4 class="mb-3">Perfil</h4>

  <div class="card mb-3"><div class="card-body">
    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
      @livewire('profile.update-profile-information-form')
    @endif
  </div></div>

  @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
  <div class="card mb-3"><div class="card-body">
    @livewire('profile.update-password-form')
  </div></div>
  @endif

  @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
  <div class="card mb-3"><div class="card-body">
    @livewire('profile.two-factor-authentication-form')
  </div></div>
  @endif

  <div class="card mb-3"><div class="card-body">
    @livewire('profile.logout-other-browser-sessions-form')
  </div></div>

  @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
  <div class="card mb-3"><div class="card-body">
    @livewire('profile.delete-user-form')
  </div></div>
  @endif
@endsection
