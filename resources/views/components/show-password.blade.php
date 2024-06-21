@props([
    'shows',
    
])

@php
    $classes =
        $shows ?? false ? 'pl-1 pr-3 text-2xl ti ti-eye-off cursor-pointer' : 'pl-1 pr-3 text-2xl ti ti-eye cursor-pointer';
@endphp

<i {{ $attributes->merge(['class' => $classes]) }}></i>
