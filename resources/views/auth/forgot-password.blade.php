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
            {{ __('¿Olvidaste tu contraseña? No hay problema. Solo dinos tu dirección de correo electrónico y te enviaremos un enlace para restablecerla y que puedas elegir una nueva.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Correo electrónico') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Enviar enlace de restablecimiento') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
