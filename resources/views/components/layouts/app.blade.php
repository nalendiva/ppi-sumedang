<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Nusantara' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,400&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-[#FAF8F5] font-sans antialiased text-stone-800">

    @isset($withSidebar)
        {{-- Layout dashboard: navbar atas + sidebar kiri + konten --}}
        <x-navbar :activePage="$activePage ?? ''" />
        <div class="flex max-w-screen-2xl mx-auto">
            <x-sidebar :activePage="$activePage ?? ''" />
            <main class="flex-1 min-w-0 flex flex-col">
                <div class="flex-1 p-6 lg:p-8">
                    {{ $slot }}
                </div>
                <x-footer />
            </main>
        </div>

    @else
        {{-- Layout halaman biasa: navbar + konten + footer --}}
        <div class="flex flex-col min-h-screen">
            @unless(isset($hideNavbar))
                <x-navbar :activePage="$activePage ?? ''" />
            @endunless

            <main class="flex-1">
                {{ $slot }}
            </main>

            @unless(isset($hideFooter))
                <x-footer />
            @endunless
        </div>
    @endisset

</body>
</html>