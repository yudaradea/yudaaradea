<!-- ---------------------------------- -->
<!-- Start Vertical Layout Sidebar -->
<!-- ---------------------------------- -->
<div class="p-4">
    <x-backend.logo href="{{ route('admin.dashboard') }}" />
</div>
<div class="scroll-sidebar" data-simplebar="">
    <nav class="flex flex-col w-full px-4 mt-5 sidebar-nav">
        <ul id="sidebarnav" class="text-sm text-gray-600">
            <x-backend.navbar.nav-title>HOME</x-backend.navbar.nav-title>

            <x-backend.navbar.nav-link
                wire:navigate
                href="{{ route('admin.dashboard') }}"
                :active="request()->routeIs('admin.dashboard')"
            >
                <i class="text-2xl ti ti-layout-dashboard ps-2"></i>
                <span>Dashboard</span>
            </x-backend.navbar.nav-link>

            <x-backend.navbar.nav-link
                wire:navigate
                href="{{ route('admin.about') }}"
                :active="request()->routeIs('admin.about')"
            >
                <i class="text-2xl ti ti-layout-dashboard ps-2"></i>
                <span>About</span>
            </x-backend.navbar.nav-link>

            <!-- Settings -->

            <x-backend.navbar.nav-title class="mt-6">Settings</x-backend.navbar.nav-title>
            @role('admin')
                <x-backend.navbar.nav-link
                    wire:navigate
                    href="{{ route('admin.users') }}"
                    :active="request()->routeIs('admin.users')"
                >
                    <i class="text-2xl ti ti-users ps-2"></i>
                    <span>Users</span>
                </x-backend.navbar.nav-link>
            @endrole
        </ul>
    </nav>
</div>
