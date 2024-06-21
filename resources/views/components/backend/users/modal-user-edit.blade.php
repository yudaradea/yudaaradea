<x-dialog-modal wire:model.live="confirmingUserEdit" maxWidth="md">
    <x-slot name="title">
        {{ __('Edit Account') }}
    </x-slot>

    <x-slot name="content">
        <div
            x-data="{}"
            x-on:confirming-user-edit.window="setTimeout(() => $refs.name.focus(), 450)"
            class="space-y-6"
        >
            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input
                    id="name"
                    x-ref="name"
                    type="text"
                    class="block w-full"
                    wire:model="form.name"
                    required
                    autocomplete="name"
                />
                <x-input-error for="form.name" class="mt-1 italic" />
            </div>

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input
                    id="email"
                    type="email"
                    class="block w-full"
                    wire:model="form.email"
                    required
                    autocomplete="email"
                />
                <x-input-error for="form.email" class="mt-1 italic" />
            </div>

            <div>
                <x-label for="selectRole" value="{{ __('Select Role') }}" />
                <div>
                    <select
                        wire:model.live="form.selectRole"
                        name="state"
                        class="bg-gray-50 border form-select form-control border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    >
                        @foreach ($roles as $role)
                            <option wire:key="{{ $loop->index }}" value="{{ $role->name }}">
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error for="form.selectRole" class="mt-1 italic" />
                </div>
            </div>

            <div>
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input-password
                    id="password"
                    ::type="show ? 'text' : 'password'"
                    class="block w-full"
                    wire:model="form.password"
                    autocomplete="password"
                />
                <x-input-error for="form.password" class="mt-1 italic" />
            </div>
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-secondary-button wire:click="$set('confirmingUserEdit', false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-secondary-button>

        <x-button class="ms-3" wire:click="editUser({{ $confirmingUserEdit }})" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-dialog-modal>
