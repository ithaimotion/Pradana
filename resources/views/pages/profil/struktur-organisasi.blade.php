@extends('layouts.app')

@section('title', 'Struktur Organisasi - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Header -->
    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-orange-500/20 text-orange-400 border border-orange-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md">
                Manajemen & Kepemimpinan
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">
                {{ $konten->judul ?? 'STRUKTUR ORGANISASI' }}
            </h1>
            <p class="text-slate-300 max-w-2xl mx-auto text-base md:text-lg">
                {{ $konten->subjudul ?? 'Susunan kepemimpinan dan manajemen PT Pradana Nusa Energi dalam menjalankan layanan inspeksi & sertifikasi ketenagalistrikan SLO.' }}
            </p>
        </div>
    </section>

    <!-- Org Chart Section -->
    <section class="py-20 bg-slate-50 overflow-hidden">
        <div class="max-w-6xl mx-auto px-6">
            @if(isset($konten->konten) && !empty($konten->konten))
                <div class="bg-blue-900/5 border border-blue-900/15 rounded-2xl p-6 mb-12 text-slate-700 text-sm leading-relaxed shadow-sm">
                    <h3 class="font-bold text-base text-blue-950 mb-2 flex items-center gap-2">
                        <span>🏛️</span> Manajemen & Tata Kelola Perusahaan:
                    </h3>
                    <p>{!! nl2br(e($konten->konten)) !!}</p>
                </div>
            @endif

            @if(isset($konten) && $konten->url_gambar)
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xl mb-16 text-center">
                    <h3 class="text-lg font-bold text-slate-900 mb-4">Diagram Bagan Struktur Organisasi Resmi</h3>
                    <img src="{{ $konten->url_gambar }}" alt="Bagan Struktur Organisasi PT Pradana Nusa Energi" class="max-w-full h-auto mx-auto rounded-xl shadow-md border border-slate-100">
                </div>
            @endif

            @php
                // Group items by level
                $itemsByLevel = [];
                if($konten && $konten->items) {
                    foreach($konten->items as $item) {
                        $level = $item->level ?? 1;
                        if(!isset($itemsByLevel[$level])) {
                            $itemsByLevel[$level] = [];
                        }
                        $itemsByLevel[$level][] = $item;
                    }
                    ksort($itemsByLevel);
                }
            @endphp

            @if(!empty($itemsByLevel))
                @foreach($itemsByLevel as $level => $items)
                    @if($level == 1)
                        <!-- Level 1: Top Management -->
                        <div class="flex justify-center mb-0 reveal-on-scroll">
                            <div class="relative">
                                <div class="bg-gradient-to-br from-blue-900 to-slate-900 text-white rounded-2xl shadow-2xl px-10 py-7 text-center min-w-[280px] border border-white/10">
                                    <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <div class="text-xs font-semibold uppercase tracking-widest text-orange-400 mb-1">{{ $items[0]->jabatan ?? 'Top Management' }}</div>
                                    <div class="text-xl font-extrabold">{{ $items[0]->nama }}</div>
                                    @if($items[0]->divisi)
                                        <div class="text-xs text-slate-300 mt-1">{{ $items[0]->divisi }}</div>
                                    @endif
                                </div>
                                @if(isset($itemsByLevel[$level + 1]))
                                    <div class="absolute left-1/2 -translate-x-1/2 -bottom-10 w-0.5 h-10 bg-slate-300"></div>
                                @endif
                            </div>
                        </div>
                    @elseif($level == 2)
                        <!-- Level 2: Middle Management -->
                        @if(isset($itemsByLevel[$level - 1]))
                            <!-- Connector Row -->
                            <div class="flex justify-center reveal-on-scroll delay-100">
                                <div class="relative w-[600px]">
                                    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-0.5 bg-slate-300"></div>
                                    @foreach($items as $index => $item)
                                        <div class="absolute top-0" style="left: {{ (100 / (count($items) + 1)) * ($index + 1) }}%; transform: translateX(-50%);">
                                            <div class="w-0.5 h-10 bg-slate-300"></div>
                                        </div>
                                    @endforeach
                                    <div class="h-10"></div>
                                </div>
                            </div>
                        @endif
                        
                        <div class="flex justify-center gap-8 mb-0 reveal-on-scroll delay-200">
                            @foreach($items as $index => $item)
                                <div class="relative">
                                    <div class="bg-white border-2 border-blue-900/20 rounded-2xl shadow-lg px-8 py-6 text-center min-w-[240px] hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                                        <div class="w-12 h-12 {{ $index % 2 == 0 ? 'bg-blue-900' : 'bg-orange-500' }} rounded-xl flex items-center justify-center mx-auto mb-3 shadow-md">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18"></path>
                                            </svg>
                                        </div>
                                        <div class="text-xs font-semibold uppercase tracking-widest {{ $index % 2 == 0 ? 'text-blue-900' : 'text-orange-500' }} mb-1">{{ $item->jabatan }}</div>
                                        <div class="text-lg font-extrabold text-slate-900">{{ $item->nama }}</div>
                                        @if($item->divisi)
                                            <div class="text-xs text-slate-500 mt-1">{{ $item->divisi }}</div>
                                        @endif
                                    </div>
                                    @if(isset($itemsByLevel[$level + 1]))
                                        <div class="absolute left-1/2 -translate-x-1/2 -bottom-10 w-0.5 h-10 bg-slate-300"></div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @elseif($level == 3)
                        <!-- Level 3: Manager / Kepala Bidang -->
                        @if(isset($itemsByLevel[$level - 1]))
                            <div class="h-10"></div>
                        @endif
                        
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 reveal-on-scroll delay-300">
                            @foreach($items as $index => $item)
                                <div class="bg-white border border-slate-200 rounded-xl shadow-md px-5 py-5 text-center hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                                    <div class="w-10 h-10 bg-sky-100 text-sky-700 rounded-lg flex items-center justify-center mx-auto mb-3 font-bold text-lg">
                                        🔎
                                    </div>
                                    <div class="text-[11px] font-semibold uppercase tracking-widest text-sky-700 mb-1">{{ $item->jabatan }}</div>
                                    <div class="text-sm font-bold text-slate-900 mb-0.5">{{ $item->nama }}</div>
                                    @if($item->divisi)
                                        <div class="text-xs text-slate-500">{{ $item->divisi }}</div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <!-- Level 4+: Staff -->
                        <div class="mt-14 reveal-on-scroll delay-400">
                            <div class="text-center mb-8">
                                <span class="text-xs uppercase tracking-widest font-semibold text-slate-400">Level {{ $level }} Staff</span>
                            </div>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-5">
                                @foreach($items as $item)
                                    <div class="bg-slate-100 border border-slate-200 rounded-xl px-5 py-4 flex items-center gap-4 hover:shadow-md hover:-translate-y-0.5 transition-all">
                                        <div class="w-9 h-9 bg-blue-900/10 text-blue-900 rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0">L{{ $level }}</div>
                                        <div>
                                            <div class="text-sm font-bold text-slate-900">{{ $item->nama }}</div>
                                            <div class="text-xs text-slate-500">{{ $item->jabatan }}</div>
                                            @if($item->divisi)
                                                <div class="text-xs text-slate-400">{{ $item->divisi }}</div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xl p-12 text-center">
                    <div class="text-slate-500 text-sm">Belum ada data struktur organisasi tersedia</div>
                </div>
            @endif

        </div>
    </section>

    <x-footer />
@endsection
