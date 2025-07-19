<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <!-- Validation Errors -->
        <x-validation-errors class="mb-4" />

        <!-- Status Message -->
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email">{{ __('auth.email') }}</x-label>
                <x-input id="email" class="block mt-1 w-full"
                         type="email"
                         name="email"
                         :value="old('email')"
                         required
                         autofocus
                         autocomplete="username" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password">{{ __('auth.password') }}</x-label>
                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required
                         autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('auth.remember_me') }}</span>
                </label>
            </div>

            <!-- Submit Button and Links -->
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                       href="{{ route('password.request') }}">
                        {{ __('auth.forgot_password') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('auth.login') }}
                </x-button>

                <a href="{{ url( '/register') }}" class="ms-4 text-sm text-blue-600 hover:underline">
                    {{ __('auth.register') }}
                </a>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
