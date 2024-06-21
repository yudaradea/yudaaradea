@props([
    'submit',
])

<div class="card">
    <div class="card-body">
        <div {{ $attributes->merge(['class' => '']) }}>
            <x-section-title class="text-center lg:text-start">
                <x-slot name="title">{{ $title }}</x-slot>
                <x-slot name="description">{{ $description }}</x-slot>
            </x-section-title>

            <div class="md:mt-0">
                <form wire:submit="{{ $submit }}">
                    <div class="pb-6 {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                        <div class="grid grid-cols-1 gap-6">
                            {{ $form }}
                        </div>
                    </div>

                    @if (isset($actions))
                        <div class="flex items-center justify-end py-3 text-end sm:rounded-bl-md sm:rounded-br-md">
                            {{ $actions }}
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
