@props([
    'active',
])

@php
    $classes =
        $active ?? false
            ? 'sidebar-link relative my-1 flex w-full items-center gap-3 rounded-md py-2.5 text-base text-gray-500'
            : 'sidebar-link relative my-1 flex w-full items-center gap-3 rounded-md py-2.5 text-base text-gray-500';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
