<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Admin' }} — PPI Admin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600;9..40,700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,400&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body { font-family: 'DM Sans', sans-serif; }
        .serif { font-family: 'DM Serif Display', serif; }

        ::-webkit-scrollbar { width: 4px; height: 4px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #d6d3d1; border-radius: 99px; }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 14px;
            border-radius: 12px;
            font-size: 13.5px;
            font-weight: 500;
            color: #a8a29e;
            text-decoration: none;
            transition: all .15s ease;
            white-space: nowrap;
            width: 100%;
            border: none;
            background: transparent;
            cursor: pointer;
            text-align: left;
        }
        .nav-link:hover { color: #292524; background: #f5f5f4; }
        .nav-link.active { background: #ecfdf5; color: #047857; font-weight: 600; }
        .nav-link.danger { color: #f87171; }
        .nav-link.danger:hover { color: #dc2626; background: #fef2f2; }
    </style>
</head>

<body class="bg-stone-50 antialiased">
<div class="flex h-screen overflow-hidden">

    {{-- ═══════════════════
         SIDEBAR
    ════════════════════ --}}
    <aside class="w-56 shrink-0 bg-white border-r border-stone-100 flex flex-col">

        {{-- Brand --}}
        <div class="px-5 py-[18px] border-b border-stone-50 shrink-0">
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 group">
                <div class="w-8 h-8 rounded-[10px] flex items-center justify-center shadow-sm shadow-emerald-200/80 transition">
                    <img 
                        src="{{ asset('images/Logo PPI.png') }}" 
                        alt="Logo PPI"
                        class="w-9 h-9 object-contain transition-transform duration-200 group-hover:scale-105"
                    >
                </div>
                <div class="leading-tight">
                    <p class="text-[12.5px] font-bold text-stone-800">PPI Sumedang</p>
                    <p class="text-[10.5px] text-stone-400">Admin Panel</p>
                </div>
            </a>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 overflow-y-auto px-3 py-3 space-y-0.5">
            <p class="text-[10px] font-bold tracking-widest uppercase text-stone-300 px-3 pt-1 pb-2">Menu</p>

            <a href="#"
               class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg class="w-[15px] h-[15px] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
                </svg>
                Dashboard
            </a>

            <a href="{{ route('admin.anggota.index') }}"
               class="nav-link {{ request()->routeIs('admin.anggota.*') ? 'active' : '' }}">
                <svg class="w-[15px] h-[15px] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                </svg>
                Data Anggota
            </a>

            <div class="!mt-3 pt-3 border-t border-stone-50">
                <p class="text-[10px] font-bold tracking-widest uppercase text-stone-300 px-3 pt-1 pb-2">Lainnya</p>

                <a href="{{ route('home') }}" class="nav-link">
                    <svg class="w-[15px] h-[15px] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                    </svg>
                    Ke Beranda
                </a>
                {{-- actionnya ganti dengan route logout --}}
                <form method="POST" action="#"> 
                    @csrf
                    <button type="submit" class="nav-link danger">
                        <svg class="w-[15px] h-[15px] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"/>
                        </svg>
                        Keluar
                    </button>
                </form>
            </div>
        </nav>

        {{-- User --}}
        <div class="px-3 pb-3 pt-2 border-t border-stone-50 shrink-0">
            <div class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl bg-stone-50">
                <div class="w-7 h-7 bg-emerald-500 rounded-full flex items-center justify-center text-white text-[11px] font-bold shrink-0">
                    {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                </div>
                <div class="min-w-0">
                    <p class="text-[12px] font-semibold text-stone-700 truncate leading-tight">
                        {{ Auth::user()->name ?? 'Admin' }}
                    </p>
                    <p class="text-[10.5px] text-stone-400 leading-tight">Administrator</p>
                </div>
            </div>
        </div>
    </aside>

    {{-- ═══════════════════
         MAIN
    ════════════════════ --}}
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">

        {{-- Topbar --}}
        <header class="shrink-0 bg-white/80 backdrop-blur-md border-b border-stone-100 px-7 h-[60px] flex items-center justify-between">
            <div>
                <p class="text-[13.5px] font-semibold text-stone-800 leading-tight">{{ $title ?? 'Dashboard' }}</p>
                <p class="text-[11px] text-stone-400 leading-tight mt-0.5">
                    {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                </p>
            </div>
            <span class="inline-flex items-center gap-1.5 bg-emerald-50 border border-emerald-100 text-emerald-700 text-[11px] font-semibold px-3 py-1.5 rounded-full">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                Admin
            </span>
        </header>

        {{-- Page content --}}
        <main class="flex-1 overflow-y-auto">
            <div class="max-w-7xl mx-auto px-7 py-7">
                {{ $slot }}
            </div>
        </main>

    </div>
</div>
</body>
</html>