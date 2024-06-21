@props(['disabled' => false])

<div
    class="flex items-center justify-between py-[2px] text-sm border border-gray-200 rounded-lg px-0.5 focus-within:border focus-within:border-blue-600 focus-within:ring-0 bg-transparent"
>
    <input
        {{ $disabled ? 'disabled' : '' }}
        {!! $attributes->merge(['class' => 'border-transparent focus:border-transparent focus:ring-0 ']) !!}
    />
    {{ $slot }}
</div>
