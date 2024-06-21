<x-guest-layout>
    @section('title')
        Login
    @endsection

    <x-authentication-card>
        {{--
            <x-slot name="logo">
            @include('backend.partials.logo-sidebar')
            </x-slot>
        --}}

        <div class="flex flex-col items-center justify-center py-6">
            <x-backend.logo href="{{ route('home') }}" />
            <p class="mt-2 text-sm text-center text-gray-400">Admin Login Page</p>
        </div>
        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input
                    id="email"
                    class="block w-full"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="username"
                />
            </div>

            <div class="mt-4" x-data="{ show: false }">
                <x-label for="password" value="{{ __('Password') }}" />

                <x-input-password
                    id="password"
                    class="block w-full rounded-lg"
                    ::type="show ? 'text' : 'password'"
                    name="password"
                    required
                    autocomplete="current-password"
                ></x-input-password>
            </div>

            <div class="flex justify-between mt-6">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="text-sm text-gray-500 ms-2">{{ __('Remember me') }}</span>
                </label>
                @if (Route::has('password.request'))
                    <a
                        class="text-sm font-semibold text-blue-600 hover:text-blue-700"
                        href="{{ route('password.request') }}"
                        wire:navigate
                    >
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <div class="grid mt-8 mb-4">
                <x-button class="">
                    {{ __('Log in') }}
                </x-button>
            </div>

            <div class="flex items-center justify-center gap-2">
                <p class="text-base font-semibold text-gray-400">New User?</p>
                <a
                    href="{{ route('register') }}"
                    wire:navigate
                    class="text-sm font-semibold text-blue-600 hover:text-blue-700"
                >
                    Create an account
                </a>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
