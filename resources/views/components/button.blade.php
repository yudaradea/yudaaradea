<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'px-6 py-2 flex justify-center text-sm md:text-base font-medium text-white bg-blue-500 rounded-lg btn hover:bg-blue-700']) }}
>
    {{ $slot }}
</button>
