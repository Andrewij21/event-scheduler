<html>

<head>
    <title>GMS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0" defer></script> --}}
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
    @livewireStyles
</head>

<body>
    <x-navbar />
    <x-sidebar />
    <main class="mt-14 p-4 sm:ml-64 flex flex-col items-center sm:block">
        {{ $slot }}
    </main>
    @livewireScripts
</body>

</html>
