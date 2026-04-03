@props([
    'activePage' => '',
])

@php
$menuItems = [
    [
        'group' => 'Menu Utama',
        'items' => [
            ['label' => 'Dashboard',  'name' => 'dashboard', 'route' => '/', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>'],
            ['label' => 'Anggota',    'name' => 'anggota',   'route' => '/anggota', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>'],
            ['label' => 'Laporan',    'name' => 'laporan',   'route' => '#', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>'],
        ],
    ],
    [
        'group' => 'Pengaturan',
        'items' => [
            ['label' => 'Pengguna',   'name' => 'pengguna',  'route' => '#', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>'],
            ['label' => 'Pengaturan', 'name' => 'settings',  'route' => '#', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>'],
        ],
    ],
];
@endphp

<aside class="w-64 shrink-0 hidden lg:flex flex-col bg-white border-r border-stone-100 min-h-screen sticky top-16 h-[calc(100vh-4rem)] overflow-y-auto">

    {{-- Sidebar top padding --}}
    <div class="flex-1 px-4 py-6 space-y-6">

        @foreach ($menuItems as $group)
            <div>
                <p class="px-3 mb-2 text-[10px] font-semibold tracking-widest uppercase text-stone-400">
                    {{ $group['group'] }}
                </p>

                <ul class="space-y-0.5">
                    @foreach ($group['items'] as $item)
                        @php $isActive = $activePage === $item['name']; @endphp
                        <li>
                            <a
                                href="{{ $item['route'] }}"
                                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-150
                                    {{ $isActive
                                        ? 'bg-amber-50 text-amber-700'
                                        : 'text-stone-500 hover:bg-stone-50 hover:text-stone-800' }}"
                            >
                                {{-- Active indicator --}}
                                @if ($isActive)
                                    <span class="absolute left-0 w-0.5 h-6 bg-amber-500 rounded-r-full -ml-4"></span>
                                @endif

                                <svg
                                    class="w-4.5 h-4.5 shrink-0 {{ $isActive ? 'text-amber-500' : 'text-stone-400' }}"
                                    style="width:18px;height:18px;"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"
                                >
                                    {!! $item['icon'] !!}
                                </svg>

                                {{ $item['label'] }}

                                @if ($isActive)
                                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>

    {{-- Bottom user card --}}
    <div class="px-4 py-4 border-t border-stone-100">
        <div class="flex items-center gap-3 px-3 py-3 rounded-xl bg-stone-50 hover:bg-stone-100 transition-colors cursor-pointer group">
            <div class="w-8 h-8 rounded-lg bg-amber-100 flex items-center justify-center text-amber-700 text-xs font-bold shrink-0">
                A
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-stone-700 truncate">Admin</p>
                <p class="text-xs text-stone-400 truncate">admin@nusantara.id</p>
            </div>
            <svg class="w-4 h-4 text-stone-300 group-hover:text-stone-500 transition-colors shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"/>
            </svg>
        </div>
    </div>
</aside>