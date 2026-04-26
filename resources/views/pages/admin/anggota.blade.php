<x-layouts.admin title="Manajemen Anggota">

    {{-- ══════════════════════════════
         PAGE HEADER
    ═══════════════════════════════ --}}
    <div class="mb-7">
        {{-- Breadcrumb --}}
        <div class="flex items-center gap-1.5 text-xs text-stone-400 mb-3">
            <a href="#" class="hover:text-emerald-500 transition-colors">Dashboard</a>
            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
            </svg>
            <span class="text-stone-500">Data Anggota</span>
        </div>

        <div class="flex items-end justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-stone-800 serif">Manajemen Anggota</h1>
                <p class="text-sm text-stone-400 mt-0.5">Kelola seluruh data anggota organisasi PPI.</p>
            </div>
            <button onclick="openModal('create')"
                class="inline-flex items-center gap-2 bg-emerald-500 hover:bg-emerald-400 active:scale-[0.98] text-white font-semibold text-sm px-5 py-2.5 rounded-xl transition-all shadow-md shadow-emerald-200/60 shrink-0">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
                Tambah Anggota
            </button>
        </div>
    </div>

    {{-- ══════════════════════════════
         STATS CARDS
    ═══════════════════════════════ --}}
    <div class="grid grid-cols-3 gap-4 mb-5">
        <div class="bg-white rounded-2xl border border-stone-100 px-5 py-4 shadow-sm shadow-stone-100/50">
            <p class="text-[10px] font-bold tracking-widest uppercase text-stone-300 mb-1.5">Total Anggota</p>
            <p id="statTotal" class="text-[28px] font-bold text-stone-800 serif leading-none">—</p>
        </div>
        <div class="bg-white rounded-2xl border border-stone-100 px-5 py-4 shadow-sm shadow-stone-100/50">
            <p class="text-[10px] font-bold tracking-widest uppercase text-stone-300 mb-1.5">Aktif</p>
            <p id="statAktif" class="text-[28px] font-bold text-emerald-600 serif leading-none">—</p>
        </div>
        <div class="bg-white rounded-2xl border border-stone-100 px-5 py-4 shadow-sm shadow-stone-100/50">
            <p class="text-[10px] font-bold tracking-widest uppercase text-stone-300 mb-1.5">Alumni</p>
            <p id="statAlumni" class="text-[28px] font-bold text-sky-500 serif leading-none">—</p>
        </div>
    </div>

    {{-- ══════════════════════════════
         TABLE CARD
    ═══════════════════════════════ --}}
    <div class="bg-white rounded-2xl border border-stone-100 overflow-hidden shadow-sm shadow-stone-100/50">

        {{-- Toolbar --}}
        <div class="flex items-center justify-between gap-3 px-5 py-3.5 border-b border-stone-50">
            <p class="text-sm font-semibold text-stone-700 shrink-0">Daftar Anggota</p>

            <div class="flex items-center gap-2">
                {{-- Search --}}
                <div class="relative">
                    <svg class="w-3.5 h-3.5 absolute left-3 top-1/2 -translate-y-1/2 text-stone-300 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 15.803 7.5 7.5 0 0016.803 15.803z"/>
                    </svg>
                    <input id="searchInput" type="text" placeholder="Cari nama / NRM..."
                        class="w-52 bg-stone-50 border border-stone-200 rounded-xl pl-9 pr-4 py-2 text-xs text-stone-700 placeholder-stone-300 outline-none focus:border-emerald-400 focus:ring-2 focus:ring-emerald-400/10 focus:bg-white transition-all">
                </div>

                {{-- Filter status --}}
                <select id="filterStatus"
                    class="bg-stone-50 border border-stone-200 rounded-xl px-3 py-2 text-xs text-stone-500 outline-none focus:border-emerald-400 transition-colors cursor-pointer">
                    <option value="">Semua Status</option>
                    <option value="aktif">Aktif</option>
                    <option value="alumni">Alumni</option>
                    <option value="tidak_aktif">Tidak Aktif</option>
                </select>

                {{-- Count badge --}}
                <span id="countBadge" class="text-xs text-stone-400 bg-stone-50 border border-stone-100 rounded-xl px-3 py-2 whitespace-nowrap">
                    — anggota
                </span>
            </div>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-stone-100 bg-stone-50/60">
                        <th class="text-left text-[10px] font-bold tracking-widest uppercase text-stone-400 px-5 py-3">Anggota</th>
                        <th class="text-left text-[10px] font-bold tracking-widest uppercase text-stone-400 px-5 py-3">NRM</th>
                        <th class="text-left text-[10px] font-bold tracking-widest uppercase text-stone-400 px-5 py-3">Angkatan</th>
                        <th class="text-left text-[10px] font-bold tracking-widest uppercase text-stone-400 px-5 py-3">Asal Sekolah</th>
                        <th class="text-left text-[10px] font-bold tracking-widest uppercase text-stone-400 px-5 py-3">Pendidikan</th>
                        <th class="text-left text-[10px] font-bold tracking-widest uppercase text-stone-400 px-5 py-3">Status</th>
                        <th class="px-5 py-3 w-20"></th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    {{-- diisi JS --}}
                    <tr>
                        <td colspan="7" class="py-16 text-center">
                            <div class="inline-flex flex-col items-center gap-2.5 text-stone-300">
                                <div class="w-6 h-6 border-2 border-stone-200 border-t-emerald-400 rounded-full animate-spin"></div>
                                <p class="text-xs">Memuat data...</p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="flex items-center justify-between px-5 py-3.5 border-t border-stone-50">
            <p class="text-xs text-stone-400">
                Menampilkan
                <span id="pgShow" class="font-semibold text-stone-600">—</span> dari
                <span id="pgTotal" class="font-semibold text-stone-600">—</span> anggota
            </p>
            <div id="pgBtns" class="flex items-center gap-1"></div>
        </div>

    </div>{{-- end table card --}}


    {{-- ══════════════════════════════════════════════════
         MODAL — Create / Edit
    ═══════════════════════════════════════════════════ --}}
    <div id="modalWrap"
         class="hidden fixed inset-0 z-50 flex items-center justify-center p-4"
         style="background:rgba(0,0,0,.3);backdrop-filter:blur(4px)">

        <div id="modalBox"
             class="w-full max-w-lg bg-white rounded-2xl shadow-2xl shadow-black/10 overflow-hidden"
             style="opacity:0;transform:scale(.96) translateY(6px);transition:opacity .2s ease,transform .25s cubic-bezier(.34,1.56,.64,1)">

            {{-- Modal header --}}
            <div class="flex items-start justify-between px-6 py-5 border-b border-stone-100">
                <div>
                    <p id="modalTitle" class="text-base font-bold text-stone-800 serif">Tambah Anggota</p>
                    <p class="text-xs text-stone-400 mt-0.5">Field bertanda <span class="text-red-400 font-bold">*</span> wajib diisi.</p>
                </div>
                <button onclick="closeModal()"
                    class="w-8 h-8 rounded-xl bg-stone-100 hover:bg-stone-200 flex items-center justify-center text-stone-400 hover:text-stone-600 transition-colors shrink-0 mt-0.5">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- Modal body --}}
            <div class="px-6 py-5 space-y-4 max-h-[62vh] overflow-y-auto">
                <input type="hidden" id="fId">

                {{-- NRM --}}
                <div>
                    <label class="block text-xs font-semibold text-stone-600 mb-1.5">NRM <span class="text-red-400">*</span></label>
                    <input id="fNrm" type="text" placeholder="cth. PPI-2024-001"
                        class="inp w-full">
                    <p id="eNrm" class="err hidden">NRM tidak boleh kosong.</p>
                </div>

                {{-- Nama --}}
                <div>
                    <label class="block text-xs font-semibold text-stone-600 mb-1.5">Nama Lengkap <span class="text-red-400">*</span></label>
                    <input id="fNama" type="text" placeholder="Nama lengkap anggota"
                        class="inp w-full">
                    <p id="eNama" class="err hidden">Nama tidak boleh kosong.</p>
                </div>

                {{-- Angkatan + Status --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-stone-600 mb-1.5">Angkatan <span class="text-red-400">*</span></label>
                        <input id="fAngkatan" type="number" placeholder="cth. 2022" min="2000" max="2099"
                            class="inp w-full">
                        <p id="eAngkatan" class="err hidden">Angkatan wajib diisi.</p>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-stone-600 mb-1.5">Status <span class="text-red-400">*</span></label>
                        <select id="fStatus" class="inp w-full cursor-pointer">
                            <option value="">Pilih status</option>
                            <option value="aktif">Aktif</option>
                            <option value="alumni">Alumni</option>
                            <option value="tidak_aktif">Tidak Aktif</option>
                        </select>
                        <p id="eStatus" class="err hidden">Status wajib dipilih.</p>
                    </div>
                </div>

                {{-- Asal Sekolah --}}
                <div>
                    <label class="block text-xs font-semibold text-stone-600 mb-1.5">Asal Sekolah</label>
                    <input id="fAsalSekolah" type="text" placeholder="cth. SMAN 1 Cirebon"
                        class="inp w-full">
                </div>

                {{-- Pendidikan --}}
                <div>
                    <label class="block text-xs font-semibold text-stone-600 mb-1.5">Pendidikan / Prodi</label>
                    <input id="fPendidikan" type="text" placeholder="cth. S1 Teknik Informatika"
                        class="inp w-full">
                </div>
            </div>

            {{-- Modal footer --}}
            <div class="flex items-center justify-end gap-2.5 px-6 py-4 bg-stone-50/50 border-t border-stone-100">
                <button onclick="closeModal()"
                    class="text-sm font-medium text-stone-500 hover:text-stone-700 px-4 py-2 rounded-xl hover:bg-stone-100 transition-all">
                    Batal
                </button>
                <button id="btnSubmit" onclick="submitForm()"
                    class="inline-flex items-center gap-2 bg-emerald-500 hover:bg-emerald-400 active:scale-[0.98] text-white font-semibold text-sm px-5 py-2.5 rounded-xl transition-all shadow-md shadow-emerald-200/60 disabled:opacity-60 disabled:cursor-not-allowed">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                    </svg>
                    <span id="btnText">Simpan</span>
                </button>
            </div>

        </div>
    </div>


    {{-- ══════════════════════════════
         INLINE STYLES (Tailwind can't
         purge dynamic class strings)
    ═══════════════════════════════ --}}
    <style>
        /* Input base */
        .inp {
            background: #fafaf9;
            border: 1px solid #e7e5e4;
            border-radius: 12px;
            padding: 10px 14px;
            font-size: 13.5px;
            color: #1c1917;
            outline: none;
            transition: border-color .15s, box-shadow .15s, background .15s;
            font-family: inherit;
        }
        .inp::placeholder { color: #d4d0cd; }
        .inp:focus {
            border-color: #34d399;
            box-shadow: 0 0 0 3px rgb(52 211 153 / .12);
            background: #fff;
        }
        .inp.error { border-color: #fca5a5; }
        .inp.error:focus { box-shadow: 0 0 0 3px rgb(252 165 165 / .15); }

        /* Error text */
        .err {
            font-size: 11px;
            color: #ef4444;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 4px;
        }
        .err::before {
            content: '⚠';
            font-size: 10px;
        }

        /* Status badges */
        .badge-aktif    { display:inline-flex;align-items:center;gap:4px;background:#f0fdf4;color:#15803d;font-size:10px;font-weight:700;padding:3px 9px;border-radius:99px;border:1px solid #bbf7d0; }
        .badge-alumni   { display:inline-flex;align-items:center;gap:4px;background:#f0f9ff;color:#0369a1;font-size:10px;font-weight:700;padding:3px 9px;border-radius:99px;border:1px solid #bae6fd; }
        .badge-nonaktif { display:inline-flex;align-items:center;gap:4px;background:#fafaf9;color:#78716c;font-size:10px;font-weight:700;padding:3px 9px;border-radius:99px;border:1px solid #e7e5e4; }
    </style>


    {{-- ══════════════════════════════
         JAVASCRIPT
    ═══════════════════════════════ --}}
    <script>
    // ── Config ────────────────────────────────────────────────────
    const API      = null;   // /admin/anggota
    const CSRF     = document.querySelector('meta[name=csrf-token]').content;
    const PER_PAGE = 10;

    let allData      = [];
    let filtered     = [];
    let page         = 1;
    let mode         = 'create';   // 'create' | 'edit'

    // ── Helpers ────────────────────────────────────────────────────
    const initial = s => s ? s.trim().split(/\s+/).slice(0,2).map(w=>w[0]).join('').toUpperCase() : '?';

    const badge = status => {
        const map = {
            aktif:       ['badge-aktif',    '● Aktif'],
            alumni:      ['badge-alumni',   '● Alumni'],
            tidak_aktif: ['badge-nonaktif', '● Tidak Aktif'],
        };
        const [cls, lbl] = map[(status??'').toLowerCase()] ?? ['badge-nonaktif','—'];
        return `<span class="${cls}">${lbl}</span>`;
    };

    const toast = (icon, title) => Swal.fire({
        toast: true, position: 'top-end',
        showConfirmButton: false, timer: 3000, timerProgressBar: true,
        icon, title,
        iconColor: icon === 'success' ? '#10b981' : '#ef4444',
        customClass: { popup: 'rounded-2xl text-sm font-medium shadow-lg' },
    });

    // ── Fetch ──────────────────────────────────────────────────────
    async function load() {
        try {
            const r = await fetch(API, { headers: { Accept: 'application/json', 'X-CSRF-TOKEN': CSRF } });
            const j = await r.json();
            allData = j.data ?? [];
            updateStats();
            applyFilter();
        } catch {
            toast('error', 'Gagal memuat data.');
        }
    }

    function updateStats() {
        document.getElementById('statTotal').textContent  = allData.length;
        document.getElementById('statAktif').textContent  = allData.filter(d => d.status === 'aktif').length;
        document.getElementById('statAlumni').textContent = allData.filter(d => d.status === 'alumni').length;
    }

    // ── Filter + Search ────────────────────────────────────────────
    function applyFilter() {
        const q  = document.getElementById('searchInput').value.toLowerCase().trim();
        const st = document.getElementById('filterStatus').value;
        filtered = allData.filter(d =>
            (!q  || (d.nama??'').toLowerCase().includes(q) || (d.nrm??'').toLowerCase().includes(q)) &&
            (!st || (d.status??'').toLowerCase() === st)
        );
        page = 1;
        render();
    }

    // ── Render table ───────────────────────────────────────────────
    function render() {
        const tbody = document.getElementById('tableBody');
        const total = filtered.length;
        const start = (page-1) * PER_PAGE;
        const rows  = filtered.slice(start, start + PER_PAGE);

        document.getElementById('countBadge').textContent = `${total} anggota`;
        document.getElementById('pgTotal').textContent    = total;
        document.getElementById('pgShow').textContent     = total === 0 ? '0–0' : `${start+1}–${Math.min(start+PER_PAGE, total)}`;

        if (!rows.length) {
            tbody.innerHTML = `
                <tr><td colspan="7" class="py-16 text-center">
                    <div class="inline-flex flex-col items-center gap-2 text-stone-300">
                        <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.25">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                        </svg>
                        <p class="text-xs font-medium">Tidak ada data</p>
                    </div>
                </td></tr>`;
        } else {
            tbody.innerHTML = rows.map(d => `
                <tr class="border-b border-stone-50 hover:bg-stone-50/70 transition-colors group">
                    <td class="px-5 py-3.5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-[10px] bg-emerald-50 border border-emerald-100 flex items-center justify-center text-[11px] font-bold text-emerald-600 shrink-0">
                                ${initial(d.nama)}
                            </div>
                            <span class="text-sm font-semibold text-stone-800">${d.nama ?? '—'}</span>
                        </div>
                    </td>
                    <td class="px-5 py-3.5">
                        <code class="text-[11.5px] bg-stone-100 text-stone-600 px-2 py-0.5 rounded-lg">${d.nrm ?? '—'}</code>
                    </td>
                    <td class="px-5 py-3.5 text-sm text-stone-600 font-medium">${d.angkatan ?? '—'}</td>
                    <td class="px-5 py-3.5 text-sm text-stone-500">${d.asal_sekolah ?? '—'}</td>
                    <td class="px-5 py-3.5 text-sm text-stone-500">${d.pendidikan ?? '—'}</td>
                    <td class="px-5 py-3.5">${badge(d.status)}</td>
                    <td class="px-5 py-3.5">
                        <div class="flex items-center gap-1.5 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button onclick='openModal("edit",${JSON.stringify(d)})'
                                title="Edit"
                                class="w-7 h-7 rounded-lg bg-stone-100 hover:bg-emerald-100 hover:text-emerald-600 text-stone-400 flex items-center justify-center transition-colors">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                                </svg>
                            </button>
                            <button onclick="delAnggota(${d.id},'${(d.nama??'').replace(/'/g,"\\'")}')"
                                title="Hapus"
                                class="w-7 h-7 rounded-lg bg-stone-100 hover:bg-red-100 hover:text-red-500 text-stone-400 flex items-center justify-center transition-colors">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            `).join('');
        }

        renderPagination(total);
    }

    // ── Pagination ─────────────────────────────────────────────────
    function renderPagination(total) {
        const maxPage = Math.ceil(total / PER_PAGE) || 1;
        const cont = document.getElementById('pgBtns');
        const btn  = (label, p, disabled, active) => `
            <button onclick="goPage(${p})" ${disabled?'disabled':''} class="w-7 h-7 rounded-lg border text-xs font-bold transition-all ${active?'bg-emerald-500 text-white border-emerald-500':'border-stone-100 text-stone-500 hover:bg-stone-50'} disabled:opacity-30 flex items-center justify-center">
                ${label}
            </button>`;

        let html = `<button onclick="goPage(${page-1})" ${page<=1?'disabled':''}
            class="w-7 h-7 rounded-lg border border-stone-100 text-stone-400 flex items-center justify-center disabled:opacity-30 hover:bg-stone-50 transition">
            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
        </button>`;
        for (let i=1; i<=maxPage; i++) html += btn(i, i, false, i===page);
        html += `<button onclick="goPage(${page+1})" ${page>=maxPage?'disabled':''}
            class="w-7 h-7 rounded-lg border border-stone-100 text-stone-400 flex items-center justify-center disabled:opacity-30 hover:bg-stone-50 transition">
            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
        </button>`;
        cont.innerHTML = html;
    }

    function goPage(p) {
        const max = Math.ceil(filtered.length / PER_PAGE) || 1;
        if (p < 1 || p > max) return;
        page = p; render();
    }

    // ── Modal helpers ──────────────────────────────────────────────
    function openModal(m, data = null) {
        mode = m;
        resetForm();
        document.getElementById('modalTitle').textContent = m === 'create' ? 'Tambah Anggota Baru' : 'Edit Data Anggota';
        document.getElementById('btnText').textContent    = m === 'create' ? 'Simpan' : 'Perbarui';

        if (m === 'edit' && data) {
            document.getElementById('fId').value          = data.id;
            document.getElementById('fNrm').value         = data.nrm         ?? '';
            document.getElementById('fNama').value        = data.nama        ?? '';
            document.getElementById('fAngkatan').value    = data.angkatan    ?? '';
            document.getElementById('fStatus').value      = data.status      ?? '';
            document.getElementById('fAsalSekolah').value = data.asal_sekolah ?? '';
            document.getElementById('fPendidikan').value  = data.pendidikan  ?? '';
        }

        const wrap = document.getElementById('modalWrap');
        const box  = document.getElementById('modalBox');
        wrap.classList.remove('hidden');
        setTimeout(() => { box.style.opacity = '1'; box.style.transform = 'scale(1) translateY(0)'; }, 10);
    }

    function closeModal() {
        const box  = document.getElementById('modalBox');
        const wrap = document.getElementById('modalWrap');
        box.style.opacity = '0'; box.style.transform = 'scale(.96) translateY(6px)';
        setTimeout(() => wrap.classList.add('hidden'), 220);
    }

    document.getElementById('modalWrap').addEventListener('click', e => {
        if (e.target === document.getElementById('modalWrap')) closeModal();
    });

    // ── Form validation ────────────────────────────────────────────
    function resetForm() {
        ['fId','fNrm','fNama','fAngkatan','fAsalSekolah','fPendidikan'].forEach(id => document.getElementById(id).value = '');
        document.getElementById('fStatus').value = '';
        clearErrors();
    }

    function clearErrors() {
        ['fNrm','fNama','fAngkatan','fStatus'].forEach(id => {
            document.getElementById(id).classList.remove('error');
        });
        ['eNrm','eNama','eAngkatan','eStatus'].forEach(id => {
            document.getElementById(id).classList.add('hidden');
        });
    }

    function fieldError(inputId, errId, msg) {
        const inp = document.getElementById(inputId);
        const err = document.getElementById(errId);
        inp.classList.add('error');
        err.textContent = '⚠ ' + msg;
        err.classList.remove('hidden');
    }

    function validate() {
        clearErrors();
        let ok = true;
        const nrm  = document.getElementById('fNrm').value.trim();
        const nama = document.getElementById('fNama').value.trim();
        const ang  = document.getElementById('fAngkatan').value.trim();
        const st   = document.getElementById('fStatus').value;

        if (!nrm)  { fieldError('fNrm','eNrm','NRM tidak boleh kosong.'); ok = false; }
        if (!nama) { fieldError('fNama','eNama','Nama tidak boleh kosong.'); ok = false; }
        if (!ang)  { fieldError('fAngkatan','eAngkatan','Angkatan tidak boleh kosong.'); ok = false; }
        else if (+ang < 2000 || +ang > 2099) { fieldError('fAngkatan','eAngkatan','Angkatan harus antara 2000–2099.'); ok = false; }
        if (!st)   { fieldError('fStatus','eStatus','Status wajib dipilih.'); ok = false; }
        return ok;
    }

    // ── Submit ─────────────────────────────────────────────────────
    async function submitForm() {
        if (!validate()) return;

        const id  = document.getElementById('fId').value;
        const btn = document.getElementById('btnSubmit');
        btn.disabled = true;
        document.getElementById('btnText').textContent = 'Menyimpan...';

        const body = {
            nrm:          document.getElementById('fNrm').value.trim(),
            nama:         document.getElementById('fNama').value.trim(),
            angkatan:     document.getElementById('fAngkatan').value.trim(),
            status:       document.getElementById('fStatus').value,
            asal_sekolah: document.getElementById('fAsalSekolah').value.trim(),
            pendidikan:   document.getElementById('fPendidikan').value.trim(),
        };

        try {
            const res = await fetch(mode === 'edit' ? `${API}/${id}` : API, {
                method:  mode === 'edit' ? 'PUT' : 'POST',
                headers: { 'Content-Type':'application/json', Accept:'application/json', 'X-CSRF-TOKEN':CSRF },
                body: JSON.stringify(body),
            });
            const json = await res.json();

            if (!res.ok) {
                // tampilkan error validasi dari backend
                if (json.errors) {
                    const map = { nrm:['fNrm','eNrm'], nama:['fNama','eNama'], angkatan:['fAngkatan','eAngkatan'], status:['fStatus','eStatus'] };
                    Object.entries(json.errors).forEach(([k,v]) => { if (map[k]) fieldError(...map[k], v[0]); });
                } else {
                    toast('error', json.message ?? 'Terjadi kesalahan.');
                }
                return;
            }

            closeModal();
            await load();
            toast('success', mode === 'edit' ? 'Data berhasil diperbarui!' : 'Anggota berhasil ditambahkan!');

        } catch {
            toast('error', 'Gagal menyimpan. Cek koneksi server.');
        } finally {
            btn.disabled = false;
            document.getElementById('btnText').textContent = mode === 'edit' ? 'Perbarui' : 'Simpan';
        }
    }

    // ── Delete ─────────────────────────────────────────────────────
    async function delAnggota(id, nama) {
        const { isConfirmed } = await Swal.fire({
            title: 'Hapus anggota?',
            html: `<p class="text-sm text-stone-500">Data <strong class="text-stone-700">${nama}</strong> akan dihapus permanen dan tidak bisa dikembalikan.</p>`,
            icon: 'warning', iconColor: '#f59e0b',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText:  'Batal',
            confirmButtonColor: '#ef4444',
            cancelButtonColor:  '#e7e5e4',
            reverseButtons: true,
            customClass: {
                popup:         'rounded-2xl shadow-xl font-sans',
                title:         'text-[15px] font-bold text-stone-800',
                confirmButton: 'rounded-xl font-semibold text-sm px-5 py-2',
                cancelButton:  'rounded-xl font-semibold text-sm px-5 py-2 !text-stone-600',
            },
        });
        if (!isConfirmed) return;

        try {
            const res = await fetch(`${API}/${id}`, {
                method: 'DELETE',
                headers: { Accept:'application/json', 'X-CSRF-TOKEN':CSRF },
            });
            if (!res.ok) throw new Error();
            await load();
            toast('success', 'Anggota berhasil dihapus.');
        } catch {
            toast('error', 'Gagal menghapus anggota.');
        }
    }

    // ── Event listeners ────────────────────────────────────────────
    document.getElementById('searchInput').addEventListener('input',  applyFilter);
    document.getElementById('filterStatus').addEventListener('change', applyFilter);

    // ── Init ───────────────────────────────────────────────────────
    load();
    </script>

</x-layouts.admin>