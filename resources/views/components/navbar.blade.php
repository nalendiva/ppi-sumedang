@props([
    'activePage' => '',
])

@php
$navLinks = [
    ['label' => 'Beranda',  'route' => '/page/home',        'name' => 'home'],
    ['label' => 'Anggota',  'route' => '/page/anggota', 'name' => 'anggota'],
];
@endphp

<header class="sticky top-0 z-50 w-full bg-white/90 backdrop-blur-md border-b border-stone-100">
    <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between gap-6">

        {{-- Logo --}}
        <a href="/page/home" class="flex items-center gap-2.5 shrink-0 group">
            <img 
                src="{{ asset('images/Logo PPI.png') }}" 
                alt="Logo PPI"
                class="w-9 h-9 object-contain transition-transform duration-200 group-hover:scale-105"
            >
            <span class="font-bold text-stone-800 tracking-tight" style="font-family: 'DM Serif Display', serif; font-size: 1.1rem;">
                Purna Paskibraka Indonesia<span class="text-emerald-500">.</span>
            </span>
        </a>

        {{-- Nav links (desktop) --}}
        <nav class="hidden md:flex items-center gap-1">
            @foreach ($navLinks as $link)
                <a
                    href="{{ $link['route'] }}"
                    class="relative px-4 py-2 text-sm font-medium rounded-lg transition-colors
                        {{ $activePage === $link['name']
                            ? 'text-emerald-600 bg-emerald-50'
                            : 'text-stone-500 hover:text-stone-800 hover:bg-stone-50' }}"
                >
                    {{ $link['label'] }}
                    @if ($activePage === $link['name'])
                        <span class="absolute bottom-1 left-1/2 -translate-x-1/2 w-1 h-1 rounded-full bg-emerald-500"></span>
                    @endif
                </a>
            @endforeach
        </nav>

        {{-- Right actions --}}
        <div class="flex items-center gap-3">
            {{-- Notifikasi --}}
            {{-- <button class="relative w-9 h-9 flex items-center justify-center rounded-lg text-stone-400 hover:text-stone-700 hover:bg-stone-100 transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/>
                </svg>
                <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-emerald-500 rounded-full ring-2 ring-white"></span>
            </button> --}}

            {{-- Avatar / User --}}
            <div class="relative" x-data="{ open: false }">
                <button
                    @click="open = !open"
                    class="flex items-center gap-2.5 pl-1 pr-3 py-1 rounded-xl hover:bg-stone-50 transition-colors group"
                >
                    <div class="w-7 h-7 rounded-lg bg-emerald-100 flex items-center justify-center text-emerald-700 text-xs font-bold shrink-0">
                        A
                    </div>
                    <span class="hidden sm:block text-sm font-medium text-stone-700 group-hover:text-stone-900 transition-colors">Guest</span>
                    <svg class="w-3.5 h-3.5 text-stone-400 hidden sm:block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                    </svg>
                </button>

                {{-- Dropdown --}}
                <div
                    x-show="open"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    @click.outside="open = false"
                    class="absolute right-0 top-full mt-2 w-48 bg-white rounded-xl shadow-lg shadow-stone-200/80 border border-stone-100 py-1.5 z-50"
                    style="display:none;"
                >
                    {{-- <a href="#" class="flex items-center gap-2.5 px-4 py-2 text-sm text-stone-600 hover:bg-stone-50 hover:text-stone-900 transition-colors">
                        <svg class="w-4 h-4 text-stone-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                        Profil Saya
                    </a>
                    <a href="#" class="flex items-center gap-2.5 px-4 py-2 text-sm text-stone-600 hover:bg-stone-50 hover:text-stone-900 transition-colors">
                        <svg class="w-4 h-4 text-stone-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Pengaturan
                    </a> --}}
                    <div class="border-t border-stone-100 my-1"></div>
                    <a href="{{ route('login') }}" class="flex items-center gap-2.5 px-4 py-2 text-sm text-stone-400 hover:bg-stone-50 transition-colors">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/></svg>
                        Login
                    </a>
                </div>
            </div>

            {{-- Mobile hamburger --}}
            <button
                class="md:hidden w-9 h-9 flex items-center justify-center rounded-lg text-stone-500 hover:bg-stone-100 transition-colors"
                x-data
                @click="$dispatch('toggle-mobile-menu')"
            >
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile nav --}}
    <div
        x-data="{ open: false }"
        @toggle-mobile-menu.window="open = !open"
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        class="md:hidden border-t border-stone-100 bg-white px-6 py-3 space-y-1"
        style="display:none;"
    >
        @foreach ($navLinks as $link)
            <a
                href="#"
                class="block px-3 py-2.5 rounded-lg text-sm font-medium transition-colors
                    {{ $activePage === $link['name']
                        ? 'text-emerald-600 bg-emerald-50'
                        : 'text-stone-600 hover:bg-stone-50 hover:text-stone-900' }}"
            >
                {{ $link['label'] }}
            </a>
        @endforeach
    </div>
</header>