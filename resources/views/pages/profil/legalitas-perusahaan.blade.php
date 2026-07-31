@extends('layouts.app')

@section('title', 'Legalitas Perusahaan - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Header -->
    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-blue-600/20 text-blue-500 border border-blue-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md">
                Dokumen Legal & Perizinan
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">
                {{ $konten->judul ?? 'LEGALITAS PERUSAHAAN' }}
            </h1>
            <p class="text-slate-700 dark:text-slate-300 max-w-2xl mx-auto text-base md:text-lg">
                {{ $konten->subjudul ?? 'Seluruh dokumen legalitas, perizinan, dan akreditasi resmi PT Pradana Nusa Energi sebagai Lembaga Inspeksi Teknik terakreditasi.' }}
            </p>
            @if(optional($konten)->url_dokumen)
                <div class="mt-6">
                    <a href="{{ optional($konten)->url_dokumen }}" target="_blank" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3 rounded-xl shadow-lg transition transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span>Unduh File PDF Dokumen Legalitas Resmi</span>
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Status Banner -->
    <section class="bg-green-50 border-b border-green-200 reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-6 py-4 flex flex-col sm:flex-row items-center justify-between gap-3">
            <div class="flex items-center gap-3">
                <span class="flex h-3 w-3 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                </span>
                <span class="text-sm font-semibold text-green-800">Semua dokumen aktif dan valid</span>
            </div>
            <span class="text-xs text-green-600 font-medium bg-green-100 border border-green-300 px-3 py-1 rounded-full">
                Terverifikasi per Juli 2026
            </span>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-20 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">

            @if(isset($konten->konten) && !empty($konten->konten))
                <div class="bg-blue-900/5 border border-blue-900/15 rounded-2xl p-6 mb-12 text-slate-700 text-sm leading-relaxed shadow-sm">
                    <h3 class="font-bold text-base text-blue-950 mb-2 flex items-center gap-2">
                        <span>???</span> Rincian Nomor Izin & Masa Berlaku Legalitas:
                    </h3>
                    <p>{!! nl2br(e($konten->konten)) !!}</p>
                </div>
            @endif

            @if($konten && $konten->items && $konten->items->count() > 0)
                @php
                    // Group items by category
                    $itemsByCategory = [];
                    foreach($konten->items as $item) {
                        $kategori = $item->kategori ?? 'Umum';
                        if(!isset($itemsByCategory[$kategori])) {
                            $itemsByCategory[$kategori] = [];
                        }
                        $itemsByCategory[$kategori][] = $item;
                    }
                @endphp

                @foreach($itemsByCategory as $kategori => $items)
                    <div class="mb-14 reveal-on-scroll">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 bg-blue-900 rounded-xl flex items-center justify-center shadow-md flex-shrink-0">
                                <svg class="w-5 h-5 text-slate-900 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21H5a2 2 0 01-2-2V7l5-5h11a2 2 0 012 2v15z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 2v5H4"></path>
                                </svg>
                            </div>
                            <h2 class="text-xl font-extrabold text-slate-900">{{ $kategori }}</h2>
                        </div>
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
                            @foreach($items as $item)
                                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                                    <div class="flex items-start justify-between mb-4">
                                        <div class="w-11 h-11 bg-blue-50 rounded-xl flex items-center justify-center">
                                            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                        </div>
                                        <span class="text-xs font-bold {{ $item->status === 'Aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }} px-2.5 py-1 rounded-full border border-{{ $item->status === 'Aktif' ? 'green' : 'red' }}-200">
                                            {{ $item->status }}
                                        </span>
                                    </div>
                                    <h3 class="font-bold text-slate-900 mb-1 text-base">{{ $item->nama_dokumen }}</h3>
                                    @if($item->nomor)
                                        <p class="text-xs text-slate-500 mb-1">No. Akta: <span class="font-semibold text-slate-700">{{ $item->nomor }}</span></p>
                                    @endif
                                    @if($item->penerbit)
                                        <p class="text-xs text-slate-500 mb-4">Penerbit: <span class="font-semibold text-slate-700">{{ $item->penerbit }}</span></p>
                                    @endif
                                    @if($item->deskripsi)
                                        <p class="text-xs text-slate-500 mb-4">{{ $item->deskripsi }}</p>
                                    @endif
                                    <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                                        @if($item->tanggal_terbit)
                                            <span class="text-xs text-slate-600 dark:text-slate-400">Terbit: {{ \Carbon\Carbon::parse($item->tanggal_terbit)->format('d F Y') }}</span>
                                        @else
                                            <span class="text-xs text-slate-600 dark:text-slate-400">-</span>
                                        @endif
                                        @if($item->file)
                                            <a href="{{ $item->url_file }}" target="_blank" class="text-xs font-semibold text-blue-600 hover:text-blue-600 flex items-center gap-1 transition">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                                                </svg>
                                                Unduh
                                            </a>
                                        @else
                                            <span class="text-xs text-slate-600 dark:text-slate-400">Tidak ada file</span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @endif

            <!-- Tenaga Teknik Section -->
            @if($konten && $konten->tenagaTeknik && $konten->tenagaTeknik->count() > 0)
                <div class="mb-14 reveal-on-scroll">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center shadow-md flex-shrink-0">
                            <svg class="w-5 h-5 text-slate-900 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-extrabold text-slate-900">Tenaga Teknik Tersertifikasi</h2>
                    </div>
                    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-5">
                        @foreach($konten->tenagaTeknik as $tenaga)
                            <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                                <div class="flex items-start justify-between mb-4">
                                    <div class="w-11 h-11 bg-blue-50 rounded-xl flex items-center justify-center">
                                        <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <span class="text-xs font-bold {{ $tenaga->status === 'Aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }} px-2.5 py-1 rounded-full border border-{{ $tenaga->status === 'Aktif' ? 'green' : 'red' }}-200">
                                        {{ $tenaga->status }}
                                    </span>
                                </div>
                                <h3 class="font-bold text-slate-900 mb-1 text-base">{{ $tenaga->nama }}</h3>
                                <p class="text-xs text-slate-500 mb-1">Jabatan: <span class="font-semibold text-slate-700">{{ $tenaga->jabatan }}</span></p>
                                @if($tenaga->no_sertifikat)
                                    <p class="text-xs text-slate-500 mb-1">No. Sertifikat: <span class="font-semibold text-slate-700">{{ $tenaga->no_sertifikat }}</span></p>
                                @endif
                                @if($tenaga->bidang_kompetensi)
                                    <p class="text-xs text-slate-500 mb-4">Bidang: <span class="font-semibold text-slate-700">{{ $tenaga->bidang_kompetensi }}</span></p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </section>

    <x-footer />
@endsection


