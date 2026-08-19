@extends('layouts.app')

@section('title', 'Standar Operasi Prosedur - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Header -->
    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-blue-600/20 text-blue-500 border border-blue-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md">
                Dokumen Mutu
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">
                {{ strip_tags($konten->judul ?? 'STANDAR OPERASI PROSEDUR') }}
            </h1>
           <p class="text-white/90 max-w-3xl mx-auto text-lg md:text-xl leading-relaxed mb-8">
                Seluruh SOP PT Pradana Nusa Energi disusun mengacu pada SNI ISO/IEC 17020:2012 dan peraturan ketenagalistrikan yang berlaku.
            </p>
            @if(optional($konten)->url_dokumen)
                @php
                    $linkSop = str_starts_with($konten->url_dokumen, 'http') ? $konten->url_dokumen : asset('storage_public/' . $konten->url_dokumen);
                @endphp
                <div class="mt-6">
                    <a href="{{ $linkSop }}" target="_blank" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3 rounded-xl shadow-lg transition transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span>Unduh Dokumen Manual SOP Resmi (PDF)</span>
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Stats Bar -->
    <section class="bg-white border-b border-slate-200 reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-6 py-5 grid grid-cols-2 md:grid-cols-4 divide-x divide-slate-200">
            <div class="px-6 text-center">
                <div class="text-2xl font-extrabold text-blue-900">{{ count($sopItems ?? []) }}</div>
                <div class="text-xs text-slate-500 font-medium mt-0.5">Total Dokumen SOP</div>
            </div>
            <div class="px-6 text-center">
                <div class="text-2xl font-extrabold text-blue-900">{{ collect($sopItems ?? [])->pluck('kategori')->unique()->count() }}</div>
                <div class="text-xs text-slate-500 font-medium mt-0.5">Kategori SOP</div>
            </div>
            <div class="px-6 text-center">
                <div class="text-2xl font-extrabold text-blue-900">ISO</div>
                <div class="text-xs text-slate-500 font-medium mt-0.5">17020:2012 Compliant</div>
            </div>
            <div class="px-6 text-center">
                <div class="text-2xl font-extrabold text-blue-900">2026</div>
                <div class="text-xs text-slate-500 font-medium mt-0.5">Revisi Terakhir</div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Filter & Search Row -->
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-10 reveal-on-scroll">
                <!-- Filter tabs -->
                <div class="flex flex-wrap gap-2">
                    <button onclick="filterSOP('semua')" id="btn-semua"
                        class="sop-filter-btn active-filter px-4 py-2 rounded-full text-sm font-semibold border transition-all">
                        Semua ({{ count($sopItems ?? []) }})
                    </button>
                    @php
                        $uniqueKategori = collect($sopItems ?? [])->pluck('kategori')->unique()->filter()->values();
                    @endphp
                    @foreach($uniqueKategori as $kat)
                        @php
                            $katSlug = Str::slug($kat);
                            $lowerKat = strtolower($kat);
                            $hoverColor = 'blue-600';
                            if (str_contains($lowerKat, 'pelayanan')) $hoverColor = 'teal-600';
                            if (str_contains($lowerKat, 'sdm') || str_contains($lowerKat, 'sarana')) $hoverColor = 'purple-600';
                            if (str_contains($lowerKat, 'mutu')) $hoverColor = 'blue-800';
                        @endphp
                        <button onclick="filterSOP('{{ $katSlug }}')" id="btn-{{ $katSlug }}"
                            class="sop-filter-btn px-4 py-2 rounded-full text-sm font-semibold border border-slate-200 text-slate-600 hover:border-{{ $hoverColor }} hover:text-{{ $hoverColor }} transition-all">
                            📄 {{ $kat }}
                        </button>
                    @endforeach
                </div>
                <!-- Search -->
                <div class="relative w-full md:w-64">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-600 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="text" id="sop-search" placeholder="Cari dokumen SOP..."
                        class="w-full pl-10 pr-4 py-2.5 rounded-full border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-900/30 focus:border-blue-900 bg-white transition-all"
                        oninput="cariSOP(this.value)">
                </div>
            </div>

            <!-- SOP List -->
            <div id="sop-list" class="space-y-4 reveal-on-scroll delay-100">

                @forelse($sopItems as $item)
                    @php
                        $kat = strtolower($item->kategori);
                        $colorPrefix = 'blue';
                        $iconStr = '📄';
                        
                        if (str_contains($kat, 'mutu') || str_contains($kat, 'manajemen')) {
                            $colorPrefix = 'blue-900';
                            $lightBg = 'bg-blue-50'; $darkText = 'text-blue-900'; $accentBg = 'bg-blue-900'; $badgeBg = 'bg-blue-100'; $badgeText = 'text-blue-800';
                        } elseif (str_contains($kat, 'inspeksi') || str_contains($kat, 'teknik')) {
                            $colorPrefix = 'blue-600';
                            $lightBg = 'bg-blue-50'; $darkText = 'text-blue-700'; $accentBg = 'bg-blue-600'; $badgeBg = 'bg-blue-100'; $badgeText = 'text-blue-700';
                        } elseif (str_contains($kat, 'pelayanan')) {
                            $colorPrefix = 'teal-600';
                            $lightBg = 'bg-teal-50'; $darkText = 'text-teal-700'; $accentBg = 'bg-teal-600'; $badgeBg = 'bg-teal-100'; $badgeText = 'text-teal-800';
                        } elseif (str_contains($kat, 'sdm') || str_contains($kat, 'sarana')) {
                            $colorPrefix = 'purple-600';
                            $lightBg = 'bg-purple-50'; $darkText = 'text-purple-700'; $accentBg = 'bg-purple-600'; $badgeBg = 'bg-purple-100'; $badgeText = 'text-purple-800';
                        } else {
                            $colorPrefix = 'slate-600';
                            $lightBg = 'bg-slate-100'; $darkText = 'text-slate-700'; $accentBg = 'bg-slate-600'; $badgeBg = 'bg-slate-200'; $badgeText = 'text-slate-800';
                        }
                    @endphp
                    <div class="sop-item" data-kategori="{{ Str::slug($item->kategori) }}" data-nama="{{ strtolower($item->judul . ' ' . $item->deskripsi) }}">
                        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group">
                            <div class="flex items-stretch">
                                <!-- Color accent -->
                                <div class="w-2 {{ $accentBg }} flex-shrink-0 rounded-l-2xl"></div>
                                <div class="flex-1 flex flex-col md:flex-row items-start md:items-center gap-4 p-5 md:p-6">
                                    <!-- Icon -->
                                    <div class="w-12 h-12 {{ $lightBg }} {{ $darkText }} rounded-xl flex items-center justify-center flex-shrink-0 text-xl font-bold shadow-sm">
                                        {{ $iconStr }}
                                    </div>
                                    <!-- Info -->
                                    <div class="flex-1">
                                        <div class="flex flex-wrap items-center gap-2 mb-1">
                                            <span class="text-xs font-bold {{ $badgeBg }} {{ $badgeText }} border border-transparent px-2 py-0.5 rounded-full">{{ $item->kategori }}</span>
                                            @if($item->kode)
                                            <span class="text-xs text-slate-600 dark:text-slate-400">{{ $item->kode }}</span>
                                            @endif
                                        </div>
                                        <h3 class="font-extrabold text-slate-900 text-base group-hover:{{ $darkText }} transition-colors">{{ $item->judul }}</h3>
                                        <p class="text-xs text-slate-500 mt-0.5">{{ Str::limit($item->deskripsi, 150) }}</p>
                                    </div>
                                    <!-- Meta & Action -->
                                    <div class="flex flex-col items-end gap-3 flex-shrink-0">
                                        @if($item->revisi)
                                        <span class="text-xs text-slate-600 dark:text-slate-400 whitespace-nowrap">{{ $item->revisi }}</span>
                                        @endif
                                        @if($item->url_dokumen)
                                        <a href="{{ str_starts_with($item->url_dokumen, 'http') ? $item->url_dokumen : asset('storage_public/' . ltrim($item->url_dokumen, '/')) }}" target="_blank" class="flex items-center gap-1.5 {{ $accentBg }} hover:opacity-90 text-white text-xs font-bold px-4 py-2 rounded-lg transition shadow-sm">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                                            </svg>
                                            Unduh
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-10">
                        <p class="text-slate-500">Belum ada dokumen SOP yang dipublikasikan.</p>
                    </div>
                @endforelse>
                </div>

                <!-- Empty state -->
                <div id="sop-empty" class="hidden text-center py-20">
                    <div class="text-5xl mb-4">??</div>
                    <h3 class="font-bold text-slate-700 mb-1">Dokumen tidak ditemukan</h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400">Coba kata kunci lain atau pilih kategori yang berbeda.</p>
                </div>

            </div><!-- end list -->

        </div>
    </section>

    <!-- CTA Bottom -->
    <section class="py-14 bg-white reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-gradient-to-r from-blue-900 to-slate-900 rounded-3xl p-8 md:p-10 flex flex-col md:flex-row items-center gap-8 text-white">
                <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg text-3xl">
                    ??
                </div>
                <div class="flex-1 text-center md:text-left">
                    <h3 class="text-xl font-extrabold mb-2">Butuh Dokumen SOP Spesifik?</h3>
                    <p class="text-white text-sm leading-relaxed">
                        Jika Anda memerlukan dokumen SOP tertentu yang tidak tercantum, silakan hubungi kami langsung. Tim kami siap membantu.
                    </p>
                </div>
                <a href="{{ route('home') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3 rounded-xl transition shadow-lg flex-shrink-0 text-sm whitespace-nowrap">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

    <x-footer />

    <style>
        .active-filter {
            background-color: #1e3a5f;
            color: #fff;
            border-color: #1e3a5f;
        }
        .sop-item {
            transition: all 0.25s ease;
        }
    </style>

    <script>
        let currentKategori = 'semua';
        let currentSearch = '';

        function filterSOP(kategori) {
            currentKategori = kategori;
            const btns = document.querySelectorAll('.sop-filter-btn');
            btns.forEach(b => {
                b.classList.remove('active-filter');
                b.classList.add('border-slate-200', 'text-slate-600');
            });
            const activeBtn = document.getElementById('btn-' + kategori);
            activeBtn.classList.add('active-filter');
            activeBtn.classList.remove('border-slate-200', 'text-slate-600');
            applyFilter();
        }

        function cariSOP(q) {
            currentSearch = q.toLowerCase().trim();
            applyFilter();
        }

        function applyFilter() {
            const items = document.querySelectorAll('.sop-item');
            let visibleCount = 0;
            items.forEach(item => {
                const matchKategori = currentKategori === 'semua' || item.dataset.kategori === currentKategori;
                const matchSearch = currentSearch === '' || item.dataset.nama.includes(currentSearch);
                if (matchKategori && matchSearch) {
                    item.style.display = '';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });
            document.getElementById('sop-empty').classList.toggle('hidden', visibleCount > 0);
        }
    </script>
@endsection


