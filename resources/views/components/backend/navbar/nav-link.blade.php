@props([
    'active',
])

@php
    $classes =
        $active ?? false
            ? 'active sidebar-link relative my-1 flex w-full items-center gap-3 rounded-md py-2.5 text-base text-gray-500'
            : 'sidebar-link relative my-1 flex w-full items-center gap-3 rounded-md py-2.5 text-base text-gray-500';
@endphp

<li class="sidebar-item">
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
</li>

{{--
    <a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
    </a>
--}}
