<div class="flex justify-between md:col-span-6">
    <div class="w-full">
        <h3 class="text-lg text-[#111c2d] font-semibold">{{ $title }}</h3>

        <p class="mt-1 text-sm text-[#707a82]">
            {{ $description }}
        </p>
    </div>

    <div class="">
        {{ $aside ?? '' }}
    </div>
</div>
