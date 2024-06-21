<!DOCTYPE html>
<html lang="en">
    <head>
        @include('backend.partials.head')
        <title>Starter Laravel | @yield('title')</title>

        @livewireStyles
    </head>

    <body class="bg-surface font-font-jakart">
        <main>
            <!--start the project-->
            <div id="main-wrapper" class="flex p-5 xl:pr-0">
                <aside
                    id="application-sidebar-brand"
                    class="hs-overlay hs-overlay-open:translate-x-0 with-vertical left-sidebar fixed left-0 top-0 z-[999] lg:z-10 hidden h-screen w-[270px] shrink-0 -translate-x-full transform rounded-none bg-white shadow-md transition-all duration-300 xl:bottom-0 xl:end-auto xl:left-auto xl:top-5 xl:block xl:translate-x-0 xl:rounded-md"
                >
                    @include('backend.partials.sidebar')
                </aside>
                <div class="w-full px-0 page-wrapper xl:px-6">
                    <!-- Main Content -->
                    <main class="h-full ax-w-full">
                        <div class="container flex flex-col gap-6 p-0 full-container">
                            <!--  Header Start -->
                            <header class="w-full px-6 py-4 text-sm bg-white rounded-md shadow-md">
                                @include('backend.partials.header')
                            </header>
                            <!--  Header End -->
                            {{ $slot }}
                        </div>
                    </main>
                    <!-- Main Content End -->
                </div>
            </div>
            <!--end of project-->
        </main>

        @livewireScripts
        @include('backend.partials.scripts')
    </body>
</html>
