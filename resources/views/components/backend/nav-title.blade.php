<li {{ $attributes->merge(['class' => 'pb-[5px] text-xs font-bold']) }}>
    <i class="ti ti-dots nav-small-cap-icon hidden text-center text-lg"></i>
    <span class="text-xs font-semibold text-gray-400">{{ $slot }}</span>
</li>
