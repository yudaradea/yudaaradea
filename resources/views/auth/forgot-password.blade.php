<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @session('status')
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ $value }}
            </div>
        @endsession

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
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

            <div class="flex items-center justify-end mt-6">
                <x-button class="w-full text-sm">
                    {{ __('Send Reset Link') }}
                </x-button>
            </div>

            <div class="flex items-center justify-center gap-2 mt-2">
                <p class="text-base font-semibold text-gray-400">Remember your password?</p>
                <a
                    href="{{ route('login') }}"
                    wire:navigate
                    class="text-sm font-semibold text-blue-600 hover:text-blue-700"
                >
                    SignIn
                </a>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
