<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <div style="text-align: center; margin-bottom: 190%; margin-left: 105%;">
                <img src="https://mlkenzoihcoe.i.optimole.com/w:auto/h:auto/q:mauto/f:best/https://silicon.pe/wp-content/uploads/2023/01/Logotipo-en-Blanco2.png" alt="Logo Silicon" class="logo" style="width: 200px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            </div>
        </x-slot>

        <style>
            body {
                background: url('https://images.pexels.com/photos/3184298/pexels-photo-3184298.jpeg') no-repeat center center fixed;
                background-size: cover;
                font-family: 'Roboto', sans-serif;
                margin: 0;
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .x-authentication-card {
                background-color: rgba(255, 255, 255, 0.9);
                padding: 40px;
                border-radius: 10px;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
                max-width: 400px;
                width: 100%;
                text-align: center;
            }

            .x-button {
                background-color: #f39c12;
                color: white;
                padding: 10px 20px;
                border-radius: 5px;
                text-align: center;
                cursor: pointer;
                transition: background-color 0.3s ease;
                width: 100%;
                margin-top: 10px;
                border: none;
                font-size: 16px; /* Aumenta el tamaño de la fuente */
            }

            .x-button:hover {
                background-color: #e67e22;
            }

            .text-gray-600 {
                color: #4b516d;
            }

            .text-gray-600:hover {
                color: #3e4453;
            }

            input[type="email"], input[type="password"] {
                width: 100%;
                padding: 10px;
                margin: 10px 0;
                border-radius: 5px;
                border: 1px solid #ccc;
                transition: border-color 0.3s ease;
            }

            input[type="email"]:focus, input[type="password"]:focus {
                border-color: #f39c12;
                outline: none; /* Elimina el contorno por defecto */
            }

            label {
                text-align: left;
                display: block;
                font-size: 14px;
                color: #333;
                margin-top: 10px;
            }

            .flex {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-top: 20px; /* Añadir espacio entre el checkbox y los botones */

            }
        </style>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
