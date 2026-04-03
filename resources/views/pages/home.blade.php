<x-layouts.app title="Beranda — PPI" :activePage="'home'">

    {{-- ============================================================
         HERO
    ============================================================ --}}
    <section class="relative overflow-hidden bg-[#FAF8F5]">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-emerald-100/40 rounded-full -translate-y-1/3 translate-x-1/3 pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-stone-200/40 rounded-full translate-y-1/2 -translate-x-1/3 pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 py-20 md:py-28 relative z-10">
            <div class="max-w-2xl">
                <span class="inline-block text-xs font-semibold tracking-widest uppercase text-emerald-600 bg-emerald-50 border border-emerald-100 px-3 py-1.5 rounded-full mb-6">
                    PPI Sumedang
                </span>
                <h1 class="text-4xl md:text-5xl font-bold text-stone-800 leading-tight mb-5" style="font-family: 'DM Serif Display', serif;">
                    Solid, mengakar,<br>
                    <span class="italic text-emerald-500">bermanfaat.</span>
                </h1>
                <p class="text-stone-500 text-lg leading-relaxed mb-8 max-w-xl">
                    Platform manajemen anggota, berita, dan kegiatan organisasi yang efisien, rapi, dan mudah digunakan.
                </p>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('anggota') }}" class="inline-flex items-center gap-2 bg-emerald-500 hover:bg-emerald-400 text-white font-semibold text-sm px-6 py-3 rounded-xl transition-colors shadow-lg shadow-emerald-200/60">
                        Lihat Anggota
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                    </a>
                    <a href="{{ route('profil') }}" class="inline-flex items-center gap-2 bg-white border border-stone-200 hover:bg-stone-50 text-stone-700 font-semibold text-sm px-6 py-3 rounded-xl transition-colors">
                        Profil Organisasi
                    </a>
                </div>
            </div>
        </div>

        {{-- Stat strip --}}
        <div class="border-t border-stone-100 bg-white/60 backdrop-blur-sm">
            <div class="max-w-7xl mx-auto px-6 py-5 grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach ([
                    ['label' => 'Total Anggota', 'value' => '248'],
                    ['label' => 'Artikel Berita', 'value' => '56'],
                    ['label' => 'Dokumentasi',    'value' => '120+'],
                    ['label' => 'Mitra Aktif',    'value' => '18'],
                ] as $stat)
                <div class="text-center">
                    <p class="text-2xl font-bold text-stone-800" style="font-family: 'DM Serif Display', serif;">{{ $stat['value'] }}</p>
                    <p class="text-xs text-stone-400 mt-0.5">{{ $stat['label'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================================================
         BERITA — 3 artikel terbaru
    ============================================================ --}}
    <section class="max-w-7xl mx-auto px-6 py-16">
        <x-section-header
            label="Berita & Artikel"
            title="Informasi terkini"
            subtitle="Ikuti perkembangan dan informasi terbaru dari organisasi kami."
            :href="route('berita.index')"
            linkLabel="Semua Berita"
        />

        <div class="grid md:grid-cols-3 gap-6 mt-10">
            @foreach ([
                ['kategori' => 'Pengumuman', 'judul' => 'Rapat Tahunan Anggota 2025 Resmi Dibuka',          'tanggal' => '28 Mar 2025', 'ringkasan' => 'Rapat tahunan yang dihadiri lebih dari 200 anggota aktif resmi dibuka oleh ketua organisasi pagi ini.',                              'slug' => 'rapat-tahunan-2025'],
                ['kategori' => 'Kegiatan',   'judul' => 'Pelatihan Digital Marketing untuk Anggota Muda',   'tanggal' => '20 Mar 2025', 'ringkasan' => 'Sebanyak 45 anggota muda mengikuti pelatihan intensif digital marketing yang berlangsung selama dua hari.',                         'slug' => 'pelatihan-digital-marketing'],
                ['kategori' => 'Prestasi',   'judul' => 'Nusantara Raih Penghargaan Organisasi Terbaik',    'tanggal' => '15 Mar 2025', 'ringkasan' => 'Penghargaan bergengsi tingkat nasional berhasil diraih sebagai bentuk pengakuan atas kontribusi organisasi selama dua dekade.',    'slug' => 'penghargaan-organisasi-terbaik'],
            ] as $artikel)
            <a href="{{ route('berita.show', $artikel['slug']) }}" class="group bg-white rounded-2xl border border-stone-100 overflow-hidden hover:shadow-lg hover:shadow-stone-100 hover:-translate-y-0.5 transition-all duration-200">
                <div class="h-44 bg-gradient-to-br from-stone-100 to-emerald-50 flex items-center justify-center">
                    <svg class="w-10 h-10 text-stone-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5M4.5 3h15a.75.75 0 01.75.75v15.75a.75.75 0 01-.75.75H4.5a.75.75 0 01-.75-.75V3.75A.75.75 0 014.5 3z"/></svg>
                </div>
                <div class="p-5">
                    <span class="text-[10px] font-semibold tracking-widest uppercase text-emerald-600 bg-emerald-50 px-2 py-1 rounded-md">{{ $artikel['kategori'] }}</span>
                    <h3 class="font-semibold text-stone-800 mt-3 mb-2 leading-snug group-hover:text-emerald-600 transition-colors line-clamp-2">{{ $artikel['judul'] }}</h3>
                    <p class="text-sm text-stone-400 leading-relaxed line-clamp-2 mb-4">{{ $artikel['ringkasan'] }}</p>
                    <p class="text-xs text-stone-300">{{ $artikel['tanggal'] }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </section>

    {{-- ============================================================
         PROFIL ORGANISASI — Teaser
    ============================================================ --}}
    <section class="bg-white border-y border-stone-100">
        <div class="max-w-7xl mx-auto px-6 py-16">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="inline-block text-xs font-semibold tracking-widest uppercase text-emerald-600 bg-emerald-50 border border-emerald-100 px-3 py-1.5 rounded-full mb-5">
                        Profil Organisasi
                    </span>
                    <h2 class="text-3xl font-bold text-stone-800 leading-tight mb-4" style="font-family: 'DM Serif Display', serif;">
                        Berdiri sejak 2005,<br>
                        <span class="italic text-emerald-500">melayani ribuan anggota.</span>
                    </h2>
                    <p class="text-stone-500 leading-relaxed mb-6">
                        Nusantara adalah organisasi profesional yang berkomitmen untuk mengembangkan potensi anggota melalui program pelatihan, jaringan, dan kolaborasi lintas daerah.
                    </p>
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        @foreach ([
                            ['label' => 'Visi', 'isi' => 'Menjadi organisasi profesional terdepan di Indonesia.'],
                            ['label' => 'Misi', 'isi' => 'Memberdayakan anggota melalui sinergi dan inovasi berkelanjutan.'],
                        ] as $item)
                        <div class="bg-stone-50 rounded-xl p-4 border border-stone-100">
                            <p class="text-xs font-semibold text-emerald-600 uppercase tracking-widest mb-1.5">{{ $item['label'] }}</p>
                            <p class="text-sm text-stone-600 leading-relaxed">{{ $item['isi'] }}</p>
                        </div>
                        @endforeach
                    </div>
                    <a href="{{ route('profil') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-600 hover:text-emerald-500 transition-colors">
                        Selengkapnya tentang kami
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                    </a>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div class="col-span-2 h-36 bg-gradient-to-br from-emerald-50 to-stone-100 rounded-2xl flex items-center justify-center">
                        <svg class="w-8 h-8 text-stone-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5M4.5 3h15a.75.75 0 01.75.75v15.75a.75.75 0 01-.75.75H4.5a.75.75 0 01-.75-.75V3.75A.75.75 0 014.5 3z"/></svg>
                    </div>
                    <div class="h-28 bg-stone-100 rounded-2xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-stone-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5M4.5 3h15a.75.75 0 01.75.75v15.75a.75.75 0 01-.75.75H4.5a.75.75 0 01-.75-.75V3.75A.75.75 0 014.5 3z"/></svg>
                    </div>
                    <div class="h-28 bg-emerald-50 rounded-2xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-emerald-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5M4.5 3h15a.75.75 0 01.75.75v15.75a.75.75 0 01-.75.75H4.5a.75.75 0 01-.75-.75V3.75A.75.75 0 014.5 3z"/></svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         DOKUMENTASI — Preview 6 item galeri
    ============================================================ --}}
    <section class="max-w-7xl mx-auto px-6 py-16">
        <x-section-header
            label="Dokumentasi"
            title="Kegiatan kami"
            subtitle="Rekam jejak aktivitas dan momen berharga organisasi."
            :href="route('dokumentasi')"
            linkLabel="Lihat Galeri"
        />

        <div class="grid grid-cols-2 md:grid-cols-3 gap-3 mt-10">
            @foreach ([
                ['label' => 'Rapat Tahunan 2025',   'bg' => 'from-emerald-50 to-stone-100'],
                ['label' => 'Pelatihan Digital',     'bg' => 'from-stone-100 to-emerald-50'],
                ['label' => 'Bakti Sosial Maret',    'bg' => 'from-emerald-50 to-emerald-100'],
                ['label' => 'Workshop Kepemimpinan', 'bg' => 'from-stone-100 to-stone-200'],
                ['label' => 'Halal Bihalal 2024',    'bg' => 'from-emerald-100 to-stone-100'],
                ['label' => 'Seminar Nasional',      'bg' => 'from-stone-50 to-emerald-50'],
            ] as $dok)
            <a href="{{ route('dokumentasi') }}" class="group relative h-40 md:h-48 rounded-2xl overflow-hidden bg-gradient-to-br {{ $dok['bg'] }} flex items-center justify-center hover:opacity-90 transition-opacity">
                <svg class="w-8 h-8 text-stone-200 group-hover:scale-110 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5M4.5 3h15a.75.75 0 01.75.75v15.75a.75.75 0 01-.75.75H4.5a.75.75 0 01-.75-.75V3.75A.75.75 0 014.5 3z"/></svg>
                <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/25 to-transparent p-3">
                    <p class="text-white text-xs font-medium">{{ $dok['label'] }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </section>

    {{-- ============================================================
         MITRA — Logo grid
    ============================================================ --}}
    <section class="bg-white border-t border-stone-100">
        <div class="max-w-7xl mx-auto px-6 py-16">
            <x-section-header
                label="Mitra Kami"
                title="Didukung oleh"
                subtitle="Organisasi dan lembaga yang telah bersinergi bersama kami."
                :href="route('mitra')"
                linkLabel="Semua Mitra"
            />

            <div class="grid grid-cols-3 md:grid-cols-6 gap-4 mt-10">
                @foreach (range(1, 6) as $i)
                <a href="{{ route('mitra') }}" class="group h-16 bg-stone-50 hover:bg-emerald-50 rounded-xl border border-stone-100 hover:border-emerald-200 flex items-center justify-center transition-all duration-200">
                    <span class="text-xs font-semibold text-stone-300 group-hover:text-emerald-400 transition-colors tracking-widest uppercase">Mitra {{ $i }}</span>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================================================
         CTA — Ajakan bergabung
    ============================================================ --}}
    <section class="max-w-7xl mx-auto px-6 py-16">
        <div class="bg-emerald-500 rounded-3xl px-8 py-12 md:px-14 md:py-16 flex flex-col md:flex-row items-center justify-between gap-8 relative overflow-hidden">
            <div class="absolute inset-0 pointer-events-none opacity-[0.07]" style="background-image: radial-gradient(white 1.5px, transparent 1.5px); background-size: 28px 28px;"></div>
            <div class="relative z-10">
                <h2 class="text-2xl md:text-3xl font-bold text-white leading-snug mb-2" style="font-family: 'DM Serif Display', serif;">
                    Butuh informasi lebih lanjut?
                </h2>
                <p class="text-emerald-100 text-sm leading-relaxed max-w-md">
                    Jika Anda memiliki pertanyaan terkait kegiatan atau informasi PPI Sumedang, silakan hubungi kami melalui WhatsApp.
                </p>
            </div>
            <div class="flex flex-wrap gap-3 relative z-10 shrink-0">
                {{-- CTA utama (WhatsApp) --}}
                <a href="https://wa.me/628XXXXXXXXXX"
                target="_blank"
                class="inline-flex items-center gap-2 bg-white text-primary font-semibold text-sm px-6 py-3 rounded-xl hover:bg-white/90 transition-all shadow-md shadow-black/10">

                    Hubungi via WhatsApp

                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5h18M3 12h18M3 19h18"/>
                    </svg>
                </a>
                <a href="{{ route('profil') }}" class="inline-flex items-center gap-2 bg-emerald-400/40 hover:bg-emerald-400/60 text-white font-semibold text-sm px-6 py-3 rounded-xl transition-colors border border-emerald-300/40">
                    Tentang PPI Sumedang
                </a>
            </div>
        </div>
    </section>

</x-layouts.app>