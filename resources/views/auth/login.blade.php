<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href="{{ url('/') }}"><img class="w-20 h-20 sm:w-24 sm:h-24" src="{{ asset('images/to-do-list-icon-14.jpg') }}" alt="todoListLogo"></a>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

                <x-jet-button class="ml-4 bg-teal-400 hover:bg-teal-700 text-white font-bold">
                    {{ __('Login') }}
                </x-jet-button>
            </div>

            <div class="text-center text-sm my-10">
                <p>Vous pouvez vous connecter ou vous inscrire avec Facebook. Si vous n'avez pas encore de compte,</p>
                <p>cela vous en crééra un avec un mot de passe aléatoire.</p>
                <p>Vous pourrez bien entendu le changer dans vos paramétres.</p>
                <div class="flex py-3 px-4 bg-blue-500 hover:bg-blue-600 rounded-lg text-white font-bold justify-center mt-5">
                    <x-icon-facebook class="w-5 h-5" />
                    <a class="ml-4" href="{{ url('auth/facebook') }}" id="btn-fblogin">Login with Facebook</a>
                </div>
            </div>

        </form>
    </x-jet-authentication-card>
</x-guest-layout>