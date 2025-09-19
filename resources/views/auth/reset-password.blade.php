<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            @if(isset($currentApp) && $currentApp)
                <div class="text-center">
                    @if($currentApp->logo)
                        <img src="{{ asset('storage/'.$currentApp->logo) }}" alt="logo" style="width:302px;height:202px;object-fit:cover;border-radius:12px" class="mx-auto">
                    @else
                    
                    <img src="{{asset('assets/images/logo/logotvo.png')}}" alt="logo" style="width:202px;height:202px;object-fit:cover;border-radius:12px">
                    @endif
              
                </div>
            @else
                <img src="{{asset('assets/images/logo/logotvo.png')}}" alt="logo" style="width:202px;height:202px;object-fit:cover;border-radius:12px;">
            @endif
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-label for="email" value="{{ __('Correo electrónico') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Nueva contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Restablecer contraseña') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
