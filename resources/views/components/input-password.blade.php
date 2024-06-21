@props(['disabled' => false])

{{--
    @php
    $show = true;
    $classes =
    $show ?? false
    ? 'pl-1 pr-3 text-2xl ti ti-eye-off cursor-pointer border-none'
    : 'pl-1 pr-3 text-2xl ti ti-eye cursor-pointer border-none';
    
    $show = false;
    @endphp
--}}

<div
    x-data="{ show: false }"
    class="flex items-center justify-between py-[2px] text-sm border border-gray-200 rounded-lg px-[2px] focus-within:border focus-within:border-blue-600 focus-within:ring-0"
>
    <input
        {{ $disabled ? 'disabled' : '' }}
        {!! $attributes->merge(['class' => 'border-transparent focus:border-transparent focus:ring-0 placeholder:text-gray-300', 'placeholder' => '********']) !!}
    />

    {{ $slot }}
    <div x-show="!show">
        <i class="pl-1 pr-3 text-2xl border-none cursor-pointer ti ti-eye" @click="show = !show"></i>
    </div>
    <div x-cloak x-show="show">
        <i class="pl-1 pr-3 text-2xl border-none cursor-pointer ti ti-eye-off" @click="show = !show"></i>
    </div>
</div>
