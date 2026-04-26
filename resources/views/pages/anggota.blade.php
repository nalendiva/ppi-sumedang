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
                    <span id="badgeAktif" class="inline-flex items-center gap-1.5 bg-green-50 border border-green-100 text-green-700 text-xs font-semibold px-3 py-1.5 rounded-full">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                        
                    </span>
                    <span id="badgeAlumni" class="inline-flex items-center gap-1.5 bg-emerald-50 border border-emerald-100 text-emerald-700 text-xs font-semibold px-3 py-1.5 rounded-full">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                        
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
                        id="inputSearch"
                        type="text"
                        placeholder="Masukkan nama lengkap anggota..."
                        class="w-full bg-stone-50 border border-stone-200 rounded-xl pl-11 pr-4 py-3.5 text-sm text-stone-800 placeholder-stone-300 outline-none transition-all focus:border-emerald-400 focus:ring-2 focus:ring-emerald-400/10 focus:bg-white"
                    >
                </div>
                <button id="searchBtn" class="inline-flex items-center gap-2 bg-emerald-500 hover:bg-emerald-400 active:scale-[0.98] text-white font-semibold text-sm px-6 py-3 rounded-xl transition-all shadow-md shadow-emerald-200/60 shrink-0">
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
        <div id="alertFound" style="display:none" class="flex items-start gap-3 bg-green-50 border border-green-100 rounded-2xl p-4 mb-5">
            <div class="w-9 h-9 bg-green-100 rounded-xl flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div class="flex-1">
                <p class="text-sm font-semibold text-green-800">Anggota ditemukan!</p>
                <p id="alertFoundMsg" class="text-xs text-green-600 mt-0.5 leading-relaxed"></p>
            </div>
            <button class="text-green-300 hover:text-green-500 transition-colors mt-0.5 shrink-0">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        {{-- STATE: Tidak ditemukan (hapus komentar jika dibutuhkan) --}}
        <div id="alertNotFound" style="display:none" class="flex items-start gap-3 bg-red-50 border border-red-100 rounded-2xl p-4 mb-5">
            <div class="w-9 h-9 bg-red-100 rounded-xl flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
            </div>
            <div>
                <p class="text-sm font-semibold text-red-700">Anggota tidak ditemukan</p>
                <p id="alertNotFoundMsg" class="text-xs text-red-500 mt-0.5"></p>
            </div>
        </div>
        

        {{-- Tabel --}}
        <div class="bg-white rounded-2xl border border-stone-100 overflow-hidden shadow-sm shadow-stone-100/50">

            {{-- Toolbar --}}
            <div class="flex items-center justify-between px-6 py-4 border-b border-stone-50">
                <p class="text-sm font-semibold text-stone-700">Daftar Anggota</p>
                <div class="flex items-center gap-2">
                    <select id="filterStatus" class="text-xs text-stone-500 bg-stone-50 border border-stone-200 rounded-lg px-3 py-1.5 outline-none focus:border-emerald-400 transition-colors cursor-pointer">
                        <option value="">Semua Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="alumni">Alumni</option>
                        <option value="tidak_aktif">Tidak Aktif</option>
                    </select>
                    <span id="countBadge" class="text-xs text-stone-400 bg-stone-50 border border-stone-100 rounded-lg px-3 py-1.5">
                    
                    </span>
                </div>
            </div>

            <x-table :headers="['Anggota', 'Angkatan', 'Asal Sekolah', 'Pendidikan', '']">
                
            </x-table>

            {{-- Pagination --}}
            <div class="px-6 py-4 border-t border-stone-50 flex items-center justify-between">
                <p class="text-xs text-stone-400">
                    Menampilkan <span id="pgShow" class="font-semibold text-stone-600">1–3</span> dari <span id="pgTotal" class="font-semibold text-stone-600">3</span> anggota
                </p>
                <div id="pageBtns" class="flex items-center gap-1">
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

<script>
    const BASE_URL = "/anggota";
    const PER_PAGE = 10;

    let allData      = [];
    let filteredData = [];
    let currentPage  = 1;

    function getInitial(nama) {
        if (!nama) return '?';
        return nama.trim().split(/\s+/).slice(0, 2).map(n => n[0]).join('').toUpperCase();
    }

    function closeAlert(id) {
        document.getElementById(id).style.display = 'none';
    }

    function showAlert(type, msg) {
        closeAlert('alertFound');
        closeAlert('alertNotFound');
        if (type === 'found') {
            document.getElementById('alertFoundMsg').innerHTML = msg;
            document.getElementById('alertFound').style.display = 'flex';
        } else {
            document.getElementById('alertNotFoundMsg').textContent = msg;
            document.getElementById('alertNotFound').style.display = 'flex';
        }
    }

    function renderTable(data) {
        const tbody = document.getElementById('anggotaTableBody');
        if (!data || data.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="4" class="text-center py-8 text-stone-400 text-sm">
                        Data tidak ditemukan
                    </td>
                </tr>`;
            return;
        }
        const start    = (currentPage - 1) * PER_PAGE;
        const pageData = data.slice(start, start + PER_PAGE);
        tbody.innerHTML = pageData.map(item => `
            <tr class="hover:bg-stone-50 transition">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-stone-100 flex items-center justify-center text-xs font-bold text-stone-500 shrink-0">
                            ${getInitial(item.nama)}
                        </div>
                        <div>
                            <p class="font-semibold text-sm text-stone-800">${item.nama ?? '—'}</p>
                            <p class="text-xs text-stone-400">NRM · ${item.nrm ?? '—'}</p>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 text-sm text-stone-600">${item.angkatan ?? '—'}</td>
                <td class="px-6 py-4 text-sm text-stone-500">${item.asal_sekolah ?? '—'}</td>
                <td class="px-6 py-4 text-sm text-stone-500">${item.pendidikan ?? '—'}</td>
            </tr>
        `).join('');
    }

    function renderPagination(total) {
        const totalPages = Math.ceil(total / PER_PAGE) || 1;
        const start = total === 0 ? 0 : (currentPage - 1) * PER_PAGE + 1;
        const end   = Math.min(currentPage * PER_PAGE, total);

        document.getElementById('pgShow').textContent   = `${start}–${end}`;
        document.getElementById('pgTotal').textContent  = total;
        document.getElementById('countBadge').textContent = `${total} anggota`;

        const container   = document.getElementById('pageBtns');
        const prevDisabled = currentPage === 1 ? 'disabled' : '';
        const nextDisabled = currentPage >= totalPages ? 'disabled' : '';

        let btns = `
            <button ${prevDisabled} onclick="goPage(${currentPage - 1})"
                class="w-7 h-7 rounded-lg border border-stone-100 text-stone-300 flex items-center justify-center disabled:opacity-40">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/>
                </svg>
            </button>`;

        for (let i = 1; i <= totalPages; i++) {
            const active = i === currentPage
                ? 'bg-emerald-500 text-white border-emerald-500'
                : 'border-stone-100 text-stone-500 hover:bg-stone-50';
            btns += `<button onclick="goPage(${i})" class="w-7 h-7 rounded-lg border text-xs font-bold ${active}">${i}</button>`;
        }

        btns += `
            <button ${nextDisabled} onclick="goPage(${currentPage + 1})"
                class="w-7 h-7 rounded-lg border border-stone-100 text-stone-300 flex items-center justify-center disabled:opacity-40">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                </svg>
            </button>`;

        container.innerHTML = btns;
    }

    function goPage(page) {
        const totalPages = Math.ceil(filteredData.length / PER_PAGE) || 1;
        if (page < 1 || page > totalPages) return;
        currentPage = page;
        renderTable(filteredData);
        renderPagination(filteredData.length);
    }

    function applyFilter() {
        const status = document.getElementById('filterStatus').value.toLowerCase();
        filteredData = status
            ? allData.filter(d => (d.status ?? '').toLowerCase() === status)
            : [...allData];
        currentPage = 1;
        renderTable(filteredData);
        renderPagination(filteredData.length);
    }

    function updateBadges(data) {
        const aktif  = data.filter(d => (d.status ?? '').toLowerCase() === 'aktif').length;
        const alumni = data.filter(d => (d.status ?? '').toLowerCase() === 'alumni').length;
        document.getElementById('badgeAktif').textContent  = `${aktif} Aktif`;
        document.getElementById('badgeAlumni').textContent = `${alumni} Alumni`;
    }

    async function fetchAnggota() {
        try {
            const res    = await fetch(BASE_URL);
            const result = await res.json();
            // console.log('API response:', result);
            allData      = result.data ?? [];
            filteredData = [...allData];
            updateBadges(allData);
            currentPage  = 1;
            applyFilter();
        } catch (err) {
            console.error('Fetch error:', err);
            document.getElementById('anggotaTableBody').innerHTML = `
                <tr><td colspan="4" class="text-center py-8 text-stone-400 text-sm">
                    Gagal memuat data. Periksa koneksi API.
                </td></tr>`;
        }
    }

    async function searchAnggota(keyword) {
        if (!keyword.trim()) {
            closeAlert('alertFound');
            closeAlert('alertNotFound');
            fetchAnggota();
            return;
        }
        try {
            const res    = await fetch(`${BASE_URL}/search?nama=${encodeURIComponent(keyword)}`);
            const result = await res.json();
            const data   = result.data ?? [];

            allData      = data;
            filteredData = [...data];
            currentPage  = 1;
            renderTable(filteredData);
            renderPagination(filteredData.length);

            if (data.length > 0) {
                const first    = data[0];
                const status   = first.status ? ` sebagai anggota <strong>${first.status}</strong>` : '';
                const angkatan = first.angkatan ? ` angkatan ${first.angkatan}` : '';
                showAlert('found', `<strong>${first.nama}</strong> terdaftar${status}${angkatan}.`);
            } else {
                showAlert('notfound', `"${keyword}" tidak terdaftar dalam database anggota organisasi.`);
            }
        } catch (err) {
            console.error('Search error:', err);
        }
    }

    document.getElementById('searchBtn').addEventListener('click', () => {
        searchAnggota(document.getElementById('inputSearch').value);
    });

    document.getElementById('inputSearch').addEventListener('keypress', e => {
        if (e.key === 'Enter') searchAnggota(e.target.value);
    });

    document.getElementById('inputSearch').addEventListener('input', e => {
        if (e.target.value === '') {
            closeAlert('alertFound');
            closeAlert('alertNotFound');
            fetchAnggota();
        }
    });

    fetchAnggota();
</script>