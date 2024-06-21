<nav class="sticky top-0 z-20 mx-auto bg-white border-b border-gray-300">
    <div class="container flex items-center justify-between h-[60px]">
        {{-- logo --}}

        <div class="flex items-center">
            <x-backend.logo class="block w-[140px] md:w-40" href="{{ route('home') }}" />
        </div>

        <div class="items-center hidden h-full gap-8 lg:flex">
            <x-frontend.nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                Home
            </x-frontend.nav-link>

            <x-frontend.nav-link href="{{ route('home') }}">About</x-frontend.nav-link>

            <x-frontend.nav-link href="{{ route('home') }}">Project</x-frontend.nav-link>

            <x-frontend.nav-link href="{{ route('home') }}">Blog</x-frontend.nav-link>

            <x-frontend.nav-link href="{{ route('home') }}">Contact</x-frontend.nav-link>
        </div>
        <div class="items-center hidden lg:flex">
            @guest
                <a
                    href="{{ route('login') }}"
                    wire:navigate
                    class="px-4 py-2 text-sm font-medium text-white transition-colors duration-200 bg-blue-500 rounded-lg hover:bg-blue-700"
                >
                    Login
                </a>
            @endguest

            @auth
                <x-frontend.image-link />
            @endauth
        </div>

        {{-- Mobile --}}
        <x-frontend.mobile-menu />
    </div>
</nav>
