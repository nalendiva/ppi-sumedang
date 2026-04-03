<x-layouts.app title="Data Anggota — PPI" :activePage="'anggota'">

    <div class="max-w-7xl mx-auto px-6 py-10">

        {{-- Breadcrumb + Header --}}
        <div class="mb-8">
            <div class="flex items-center gap-2 text-xs text-stone-400 mb-3">
                <a href="{{ route('home') }}" class="hover:text-emerald-500 transition-colors">Beranda</a>
                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                <span class="text-stone-600">Data Anggota</span>
            </div>
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-stone-800" style="font-family: 'DM Serif Display', serif;">
                        Validasi Keanggotaan
                    </h1>
                    <p class="text-sm text-stone-400 mt-1">Cek apakah seseorang terdaftar sebagai anggota aktif organisasi.</p>
                </div>
                <div class="flex items-center gap-2 shrink-0">
                    <span class="inline-flex items-center gap-1.5 bg-green-50 border border-green-100 text-green-700 text-xs font-semibold px-3 py-1.5 rounded-full">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                        2 Aktif
                    </span>
                    <span class="inline-flex items-center gap-1.5 bg-emerald-50 border border-emerald-100 text-emerald-700 text-xs font-semibold px-3 py-1.5 rounded-full">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                        1 Alumni
                    </span>
                </div>
            </div>
        </div>

        {{-- Search card --}}
        <div class="bg-white rounded-2xl border border-stone-100 p-5 mb-5 shadow-sm shadow-stone-100/50">
            <p class="text-[10px] font-semibold tracking-widest uppercase text-stone-400 mb-3">Cek Keanggotaan</p>
            <div class="flex gap-3">
                <div class="relative flex-1">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-stone-300 pointer-events-none">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                        </svg>
                    </span>
                    <input
                        type="text"
                        placeholder="Masukkan nama lengkap anggota..."
                        class="w-full bg-stone-50 border border-stone-200 rounded-xl pl-11 pr-4 py-3.5 text-sm text-stone-800 placeholder-stone-300 outline-none transition-all focus:border-emerald-400 focus:ring-2 focus:ring-emerald-400/10 focus:bg-white"
                    >
                </div>
                <button class="inline-flex items-center gap-2 bg-emerald-500 hover:bg-emerald-400 active:scale-[0.98] text-white font-semibold text-sm px-6 py-3 rounded-xl transition-all shadow-md shadow-emerald-200/60 shrink-0">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 15.803 7.5 7.5 0 0016.803 15.803z"/>
                    </svg>
                    Cek
                </button>
            </div>
            <p class="text-xs text-stone-300 mt-3 flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/></svg>
                Ketik nama lengkap atau sebagian nama untuk memulai pencarian.
            </p>
        </div>

        {{-- ============================================================
             RESULT STATE — pilih salah satu, hapus yang lain
        ============================================================ --}}

        {{-- STATE: Ditemukan & Aktif --}}
        <div class="flex items-start gap-3 bg-green-50 border border-green-100 rounded-2xl p-4 mb-5">
            <div class="w-9 h-9 bg-green-100 rounded-xl flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div class="flex-1">
                <p class="text-sm font-semibold text-green-800">Anggota ditemukan!</p>
                <p class="text-xs text-green-600 mt-0.5 leading-relaxed">
                    <span class="font-semibold">Budi Santoso</span> terdaftar sebagai anggota <span class="font-semibold">aktif</span> angkatan 2020.
                </p>
            </div>
            <button class="text-green-300 hover:text-green-500 transition-colors mt-0.5 shrink-0">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        {{-- STATE: Tidak ditemukan (hapus komentar jika dibutuhkan)
        <div class="flex items-start gap-3 bg-red-50 border border-red-100 rounded-2xl p-4 mb-5">
            <div class="w-9 h-9 bg-red-100 rounded-xl flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
            </div>
            <div>
                <p class="text-sm font-semibold text-red-700">Anggota tidak ditemukan</p>
                <p class="text-xs text-red-500 mt-0.5">"Nama yang dicari" tidak terdaftar dalam database anggota organisasi.</p>
            </div>
        </div>
        --}}

        {{-- Tabel --}}
        <div class="bg-white rounded-2xl border border-stone-100 overflow-hidden shadow-sm shadow-stone-100/50">

            {{-- Toolbar --}}
            <div class="flex items-center justify-between px-6 py-4 border-b border-stone-50">
                <p class="text-sm font-semibold text-stone-700">Daftar Anggota</p>
                <div class="flex items-center gap-2">
                    <select class="text-xs text-stone-500 bg-stone-50 border border-stone-200 rounded-lg px-3 py-1.5 outline-none focus:border-emerald-400 transition-colors cursor-pointer">
                        <option>Semua Status</option>
                        <option>Aktif</option>
                        <option>Alumni</option>
                        <option>Tidak Aktif</option>
                    </select>
                    <span class="text-xs text-stone-400 bg-stone-50 border border-stone-100 rounded-lg px-3 py-1.5">
                        3 anggota
                    </span>
                </div>
            </div>

            <x-table :headers="['Anggota', 'Angkatan', 'Status', '']">

                {{-- Row 1 — highlighted karena hasil pencarian --}}
                <tr class="bg-emerald-50/30 hover:bg-emerald-50/60 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-emerald-100 flex items-center justify-center text-emerald-700 text-xs font-bold shrink-0">
                                BS
                            </div>
                            <div>
                                <p class="font-semibold text-stone-800 text-sm">Budi Santoso</p>
                                <p class="text-xs text-stone-400">NIM · 20001</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-stone-500 text-sm">2020</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 bg-green-50 text-green-700 border border-green-100 px-3 py-1 text-xs font-semibold rounded-full">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>Aktif
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <button class="text-xs font-semibold text-emerald-600 hover:text-emerald-500 transition-colors">Detail →</button>
                    </td>
                </tr>

                {{-- Row 2 --}}
                <tr class="hover:bg-stone-50/60 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-stone-100 flex items-center justify-center text-stone-500 text-xs font-bold shrink-0">
                                SR
                            </div>
                            <div>
                                <p class="font-semibold text-stone-800 text-sm">Siti Rahayu</p>
                                <p class="text-xs text-stone-400">NIM · 21045</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-stone-500 text-sm">2021</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 border border-emerald-100 px-3 py-1 text-xs font-semibold rounded-full">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>Alumni
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <button class="text-xs font-semibold text-emerald-600 hover:text-emerald-500 transition-colors">Detail →</button>
                    </td>
                </tr>

                {{-- Row 3 --}}
                <tr class="hover:bg-stone-50/60 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-stone-100 flex items-center justify-center text-stone-500 text-xs font-bold shrink-0">
                                AP
                            </div>
                            <div>
                                <p class="font-semibold text-stone-800 text-sm">Andi Pratama</p>
                                <p class="text-xs text-stone-400">NIM · 19088</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-stone-500 text-sm">2019</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 bg-green-50 text-green-700 border border-green-100 px-3 py-1 text-xs font-semibold rounded-full">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>Aktif
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <button class="text-xs font-semibold text-emerald-600 hover:text-emerald-500 transition-colors">Detail →</button>
                    </td>
                </tr>

            </x-table>

            {{-- Pagination --}}
            <div class="px-6 py-4 border-t border-stone-50 flex items-center justify-between">
                <p class="text-xs text-stone-400">
                    Menampilkan <span class="font-semibold text-stone-600">1–3</span> dari <span class="font-semibold text-stone-600">3</span> anggota
                </p>
                <div class="flex items-center gap-1">
                    <button disabled class="w-7 h-7 rounded-lg border border-stone-100 text-stone-300 flex items-center justify-center">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
                    </button>
                    <button class="w-7 h-7 rounded-lg bg-emerald-500 text-white text-xs font-bold">1</button>
                    <button disabled class="w-7 h-7 rounded-lg border border-stone-100 text-stone-300 flex items-center justify-center">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                    </button>
                </div>
            </div>
        </div>

    </div>

</x-layouts.app>