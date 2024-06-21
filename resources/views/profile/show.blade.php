<x-backend.layout-app>
    <div class="card">
        <div class="card-body">
            <div class="grid gap-x-6 gap-y-10 lg:gap-y-12 lg:gap-x-8 lg:grid-cols-2">
                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                    @livewire('profile.update-profile-information-form')
                @endif

                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    @livewire('profile.update-password-form')
                @endif

                @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                    @livewire('profile.two-factor-authentication-form')
                @endif

                @livewire('profile.logout-other-browser-sessions-form')

                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                    {{-- <x-section-border /> --}}

                    @livewire('profile.delete-user-form')
                @endif
            </div>
        </div>
    </div>
</x-backend.layout-app>
