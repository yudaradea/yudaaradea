<x-dialog-modal wire:model.live="confirmingUserDelete" maxWidth="md">
    <x-slot name="title">
        {{ __('Delete Account') }}
    </x-slot>

    <x-slot name="content">
        <h1>
            Are you sure want to delete
            <span class="font-bold">{{ $userName }}</span>
            ?
        </h1>

        <p class="mt-4 mb-2 text-sm italic font-medium">confirm password to delete this user</p>

        <div x-data="{}" x-on:confirming-user-delete.window="setTimeout(() => $refs.password.focus(), 250)">
            <x-input
                type="password"
                class="block w-3/4"
                autocomplete="current-password"
                placeholder="{{ __('Password') }}"
                x-ref="password"
                wire:model="current_password"
                wire:keydown.enter="deleteUser({{ $confirmingUserDelete}})"
            />

            <x-input-error for="current_password" class="mt-1 italic" />
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-secondary-button wire:click="$set('confirmingUserDelete', false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-secondary-button>

        <x-danger-button class="ms-3" wire:click="deleteUser({{ $confirmingUserDelete}})" wire:loading.attr="disabled">
            {{ __('Delete Account') }}
        </x-danger-button>
    </x-slot>
</x-dialog-modal>
