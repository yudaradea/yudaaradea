<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <!-- Favicon icon-->
        <link rel="shortcut icon" type="image/png" href="backend/assets/images/logos/favicon.png" />
        <link
            href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css" />
        <link rel="stylesheet" href="backend/assets/css/theme.css" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <title>Starter-Pack @yield('title')</title>
        @livewireStyles
    </head>
    <body class="font-font-jakart">
        {{-- bg-[#F1F4F5] --}}
        <x-frontend.nav />

        {{ $slot }}

        @livewireScripts
    </body>
</html>
