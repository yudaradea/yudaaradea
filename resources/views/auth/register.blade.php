<x-guest-layout>
    @section('title')
        Register
    @endsection

    <x-authentication-card>
        {{--
            <x-slot name="logo">
            <x-authentication-card-logo />
            </x-slot>
        --}}

        <div class="flex flex-col items-center justify-center py-6">
            <x-backend.logo href="{{ route('home') }}" />
            <p class="mt-2 text-sm text-center text-gray-400">Register Page</p>
        </div>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input
                    id="name"
                    class="block w-full"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required
                    autofocus
                    autocomplete="name"
                />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input
                    id="email"
                    class="block w-full"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autocomplete="username"
                />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input-password
                    id="password"
                    class="block w-full"
                    ::type="show ? 'text' : 'password'"
                    name="password"
                    required
                    autocomplete="new-password"
                />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input-password
                    id="password_confirmation"
                    class="block w-full"
                    ::type="show ? 'text' : 'password'"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!!
                                    __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' . __('Terms of Service') . '</a>',
                                        'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' . __('Privacy Policy') . '</a>',
                                    ])
                                !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="grid mt-8 mb-4">
                <x-button
                    class="flex justify-center py-[15px] text-base font-medium text-white bg-blue-500 rounded-3xl btn hover:bg-blue-700"
                >
                    {{ __('Register') }}
                </x-button>
            </div>
            <div class="flex items-center justify-center gap-2">
                <p class="text-base font-semibold text-gray-400">Already have an Account?</p>
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
