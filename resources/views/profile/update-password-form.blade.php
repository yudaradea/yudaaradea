<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Update Password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 mt-6 lg:mt-12 sm:col-span-4">
            <x-label for="current_password" value="{{ __('Current Password') }}" />
            <x-input-password
                id="current_password"
                ::type="show ? 'text' : 'password'"
                class="block w-full"
                wire:model="state.current_password"
                autocomplete="current-password"
            />
            <x-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password" value="{{ __('New Password') }}" />
            <x-input-password
                id="password"
                ::type="show ? 'text' : 'password'"
                class="block w-full"
                wire:model="state.password"
                autocomplete="new-password"
            />
            <x-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <x-input-password
                id="password_confirmation"
                ::type="show ? 'text' : 'password'"
                class="block w-full"
                wire:model="state.password_confirmation"
                autocomplete="new-password"
            />
            <x-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button class="mt-auto">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
