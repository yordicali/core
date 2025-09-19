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

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Esta es un área segura de la aplicación. Por favor confirma tu contraseña antes de continuar.') }}
        </div>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" autofocus />
            </div>

            <div class="flex justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Confirmar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
