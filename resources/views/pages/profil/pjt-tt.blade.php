@extends('layouts.app')

@section('title', 'Daftar PJT & TT - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    {{-- ===================== HERO SECTION ===================== --}}
    <section class="relative py-20 bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:18px_18px]"></div>
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-blue-600/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-32 -right-32 w-80 h-80 bg-cyan-500/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative max-w-7xl mx-auto px-6 text-center">
            <span class="inline-flex items-center gap-2 bg-blue-600/20 text-blue-400 border border-blue-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-5 backdrop-blur-md">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-3.138-3.138 3.066 3.066 0 00-.806-1.946 3.066 3.066 0 010-4.438 3.066 3.066 0 00.806-1.946 3.066 3.066 0 013.138-3.138zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                Tenaga Ahli Bersertifikat
            </span>
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4 tracking-tight">
                {{ strip_tags($konten->judul ?? 'Daftar PJT & TT') }}
            </h1>
            <p class="text-white/75 max-w-2xl mx-auto text-base md:text-lg leading-relaxed">
                {{ strip_tags($konten->subjudul ?? 'Daftar Penanggung Jawab Teknik (PJT) dan Tenaga Teknik (TT) terdaftar dan bersertifikasi kompetensi resmi PT Pradana Nusa Energi.') }}
            </p>
            @if(optional($konten)->url_dokumen)
                <div class="mt-7">
                    <a href="{{ optional($konten)->url_dokumen }}" target="_blank"
                       class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-500 text-white font-bold px-6 py-3 rounded-xl shadow-lg transition-all duration-200 hover:-translate-y-0.5 text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        Unduh Dokumen SK PJT & TT Resmi (PDF)
                    </a>
                </div>
            @endif
        </div>
    </section>

    {{-- ===================== STATS BAR ===================== --}}
    @php
        $allItems      = ($konten && $konten->items) ? $konten->items : collect();
        $totalPersonel = $allItems->count();
        $totalPJT      = $allItems->where('jabatan', 'PJT')->count();
        $totalTT       = $allItems->where('jabatan', 'TT')->count();
        $totalKategori = $allItems->pluck('kategori')->unique()->filter()->count();
        $grouped       = $allItems->groupBy('kategori');
    @endphp

    <section class="bg-white border-b border-slate-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-5 grid grid-cols-2 md:grid-cols-4 divide-x divide-slate-100">
            <div class="px-4 py-1 text-center">
                <div class="text-3xl font-black text-blue-900">{{ $totalPersonel }}</div>
                <div class="text-xs text-slate-400 font-semibold mt-0.5 uppercase tracking-wider">Total Personel</div>
            </div>
            <div class="px-4 py-1 text-center">
                <div class="text-3xl font-black text-sky-600">{{ $totalPJT }}</div>
                <div class="text-xs text-slate-400 font-semibold mt-0.5 uppercase tracking-wider">PJT</div>
            </div>
            <div class="px-4 py-1 text-center">
                <div class="text-3xl font-black text-teal-600">{{ $totalTT }}</div>
                <div class="text-xs text-slate-400 font-semibold mt-0.5 uppercase tracking-wider">Tenaga Teknik</div>
            </div>
            <div class="px-4 py-1 text-center">
                <div class="text-3xl font-black text-blue-900">{{ $totalKategori }}</div>
                <div class="text-xs text-slate-400 font-semibold mt-0.5 uppercase tracking-wider">Kategori Instalasi</div>
            </div>
        </div>
    </section>

    {{-- ===================== MAIN CONTENT ===================== --}}
    <section class="py-10 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">

            {{-- Search & Filter --}}
            <div class="mb-8 bg-white rounded-2xl border border-slate-200 shadow-sm p-4 flex flex-col sm:flex-row items-center gap-3">
                <div class="relative flex-1 w-full">
                    <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input
                        type="text"
                        id="searchInput"
                        placeholder="Cari nama, no. sertifikat, no. register, atau kategori..."
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-sm text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition"
                    >
                </div>
                <div class="flex gap-2 flex-shrink-0">
                    <button onclick="filterJabatan('semua')" id="filter-semua"
                        class="filter-btn active-jabatan px-5 py-2.5 rounded-xl text-sm font-bold border transition-all duration-200">
                        Semua
                    </button>
                    <button onclick="filterJabatan('PJT')" id="filter-PJT"
                        class="filter-btn px-5 py-2.5 rounded-xl text-sm font-bold border border-slate-200 text-slate-600 hover:border-sky-400 hover:text-sky-700 hover:bg-sky-50 transition-all duration-200">
                        PJT
                    </button>
                    <button onclick="filterJabatan('TT')" id="filter-TT"
                        class="filter-btn px-5 py-2.5 rounded-xl text-sm font-bold border border-slate-200 text-slate-600 hover:border-teal-400 hover:text-teal-700 hover:bg-teal-50 transition-all duration-200">
                        TT
                    </button>
                </div>
            </div>

            {{-- Catatan --}}
            @if(isset($konten->konten) && !empty($konten->konten))
                <div class="mb-6 bg-blue-50 border border-blue-200 rounded-2xl p-5 text-blue-900 text-sm leading-relaxed shadow-sm">
                    <div class="font-bold mb-1 flex items-center gap-2 text-blue-800">
                        <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
                        Catatan Kualifikasi & Akreditasi:
                    </div>
                    {!! nl2br(e($konten->konten)) !!}
                </div>
            @endif

            {{-- Tables per Kategori --}}
            <div id="kategori-container" class="space-y-6">

                @forelse($grouped as $kategori => $items)
                    @php
                        $pjtCount = $items->where('jabatan', 'PJT')->count();
                        $ttCount  = $items->where('jabatan', 'TT')->count();
                    @endphp

                    <div class="kategori-block"
                         data-kategori="{{ strtolower($kategori) }}">
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

                            {{-- Header kategori --}}
                            <div class="flex items-center justify-between px-6 py-4 bg-gradient-to-r from-[#0f1f3d] via-[#0d2b5e] to-[#0f1f3d]">
                                <div class="flex items-center gap-3 min-w-0">
                                    <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                        </svg>
                                    </div>
                                    <div class="min-w-0">
                                        <h2 class="text-white font-bold text-sm md:text-base leading-snug truncate">{{ $kategori }}</h2>
                                        <p class="text-slate-400 text-xs mt-0.5">{{ $items->count() }} personel</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 flex-shrink-0 ml-4">
                                    @if($pjtCount > 0)
                                        <span class="hidden sm:inline-flex items-center gap-1 bg-sky-500/20 text-sky-300 border border-sky-500/30 text-xs font-bold px-2.5 py-1 rounded-full">
                                            {{ $pjtCount }} PJT
                                        </span>
                                    @endif
                                    @if($ttCount > 0)
                                        <span class="hidden sm:inline-flex items-center gap-1 bg-teal-500/20 text-teal-300 border border-teal-500/30 text-xs font-bold px-2.5 py-1 rounded-full">
                                            {{ $ttCount }} TT
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- Table --}}
                            <div class="overflow-x-auto">
                                <table class="w-full text-left">
                                    <thead>
                                        <tr class="bg-slate-50 border-b border-slate-100">
                                            <th class="py-3 px-4 w-14 text-center text-xs font-bold text-slate-400 uppercase tracking-wider">No</th>
                                            <th class="py-3 px-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Nama</th>
                                            <th class="py-3 px-4 text-center text-xs font-bold text-slate-400 uppercase tracking-wider">Jabatan</th>
                                            <th class="py-3 px-4 text-xs font-bold text-slate-400 uppercase tracking-wider">No. Sertifikat</th>
                                            <th class="py-3 px-4 text-xs font-bold text-slate-400 uppercase tracking-wider">No. Register</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-50">
                                        @foreach($items->sortBy('urutan') as $index => $item)
                                            <tr class="data-row hover:bg-blue-50/40 transition-colors duration-150"
                                                data-jabatan="{{ $item->jabatan }}"
                                                data-search="{{ strtolower($item->nama . ' ' . $item->no_sertifikat . ' ' . $item->no_register . ' ' . $kategori) }}">
                                                <td class="py-3.5 px-4 text-center text-slate-400 font-semibold text-xs">{{ $index + 1 }}</td>
                                                <td class="py-3.5 px-4 font-semibold text-slate-800 text-sm">{{ $item->nama }}</td>
                                                <td class="py-3.5 px-4 text-center">
                                                    @if($item->jabatan === 'PJT')
                                                        <span class="inline-flex justify-center bg-sky-100 text-sky-700 border border-sky-200 text-xs font-black px-3 py-1 rounded-lg tracking-wide min-w-[44px]">PJT</span>
                                                    @else
                                                        <span class="inline-flex justify-center bg-teal-100 text-teal-700 border border-teal-200 text-xs font-black px-3 py-1 rounded-lg tracking-wide min-w-[44px]">TT</span>
                                                    @endif
                                                </td>
                                                <td class="py-3.5 px-4 font-mono text-slate-600 text-xs whitespace-nowrap">{{ $item->no_sertifikat }}</td>
                                                <td class="py-3.5 px-4 font-mono text-slate-600 text-xs whitespace-nowrap">{{ $item->no_register }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                @empty
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-16 text-center">
                        <div class="w-14 h-14 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <p class="text-slate-400 font-medium text-sm">Belum ada data PJT & TT tersedia.</p>
                    </div>
                @endforelse

                {{-- Pesan tidak ada hasil --}}
                <div id="no-result" class="hidden bg-white rounded-2xl border border-slate-200 shadow-sm p-12 text-center">
                    <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <p class="text-slate-400 font-medium text-sm">Tidak ada data yang sesuai dengan pencarian.</p>
                    <button onclick="resetFilter()" class="mt-3 text-blue-600 hover:text-blue-800 text-sm font-semibold transition">Reset pencarian</button>
                </div>

            </div>{{-- end #kategori-container --}}
        </div>
    </section>

    {{-- ===================== INFO BANNER ===================== --}}
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-gradient-to-r from-blue-900 to-slate-900 rounded-2xl p-7 md:p-9 flex flex-col md:flex-row items-center gap-6 text-white shadow-lg">
                <div class="w-12 h-12 bg-blue-600/80 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <div class="flex-1 text-center md:text-left">
                    <h3 class="text-lg font-extrabold mb-1.5">Kompetensi Terstandarisasi & Terakreditasi</h3>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        Seluruh PJT dan TT PT Pradana Nusa Energi memiliki sertifikat kompetensi resmi yang diterbitkan oleh Lembaga Sertifikasi Kompetensi (LSK) terakreditasi BNSP. Sertifikat dapat diverifikasi melalui sistem resmi Kementerian ESDM.
                    </p>
                </div>
                <a href="{{ route('home') }}"
                   class="flex-shrink-0 bg-blue-600 hover:bg-blue-500 text-white font-bold px-6 py-2.5 rounded-xl transition text-sm">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

    <x-footer />

    <style>
        .active-jabatan {
            background: linear-gradient(135deg, #1e3a8a, #2563eb);
            color: #fff !important;
            border-color: #2563eb !important;
            box-shadow: 0 2px 10px rgba(37, 99, 235, 0.35);
        }
        .kategori-block { transition: opacity 0.2s ease; }
        .kategori-block.hidden-block { display: none; }
        .data-row.row-hidden { display: none; }
    </style>

    <script>
        let activeJabatan = 'semua';
        let searchQuery   = '';

        function applyFilters() {
            const blocks   = document.querySelectorAll('.kategori-block');
            const noResult = document.getElementById('no-result');
            let visible    = 0;

            blocks.forEach(block => {
                const rows = block.querySelectorAll('.data-row');
                let rowVis = 0;

                rows.forEach(row => {
                    const jabatan    = row.dataset.jabatan;
                    const searchText = row.dataset.search || '';

                    const matchJabatan = (activeJabatan === 'semua') || (jabatan === activeJabatan);
                    const matchSearch  = (searchQuery === '') || searchText.includes(searchQuery);

                    if (matchJabatan && matchSearch) {
                        row.classList.remove('row-hidden');
                        rowVis++;
                    } else {
                        row.classList.add('row-hidden');
                    }
                });

                // Juga cek apakah kategori itu sendiri cocok dengan pencarian
                const kategoriText = (block.dataset.kategori || '');
                const blockMatch   = (searchQuery === '') || kategoriText.includes(searchQuery);

                if (rowVis > 0 || (blockMatch && activeJabatan === 'semua' && searchQuery !== '')) {
                    block.classList.remove('hidden-block');
                    visible++;
                } else if (rowVis > 0) {
                    block.classList.remove('hidden-block');
                    visible++;
                } else {
                    block.classList.add('hidden-block');
                }
            });

            if (noResult) noResult.classList.toggle('hidden', visible > 0);
        }

        function filterJabatan(jabatan) {
            activeJabatan = jabatan;

            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active-jabatan');
                btn.className = btn.className
                    .replace('text-white', '')
                    .replace('border-blue-600', '')
                    .trim();
                if (!btn.classList.contains('active-jabatan')) {
                    btn.style.background   = '';
                    btn.style.color        = '';
                    btn.style.borderColor  = '';
                    btn.style.boxShadow    = '';
                }
            });

            const btn = document.getElementById('filter-' + jabatan);
            if (btn) btn.classList.add('active-jabatan');

            applyFilters();
        }

        function resetFilter() {
            document.getElementById('searchInput').value = '';
            searchQuery = '';
            filterJabatan('semua');
        }

        document.getElementById('searchInput').addEventListener('input', function () {
            searchQuery = this.value.toLowerCase().trim();
            applyFilters();
        });
    </script>
@endsection
