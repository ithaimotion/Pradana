@extends('layouts.app')

@section('title', 'Alur Sertifikasi - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Header -->
    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-orange-500/20 text-orange-400 border border-orange-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md">
                Standar Pelayanan
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">
                ALUR SERTIFIKASI
            </h1>
            <p class="text-slate-300 max-w-2xl mx-auto text-base md:text-lg">
                Proses menyeluruh pengurusan Sertifikat Laik Operasi (SLO) dari tahap permohonan hingga terbitnya sertifikat.
            </p>
        </div>
    </section>

    <!-- PDF Viewer Section -->
    <section class="py-20 bg-slate-50 overflow-hidden">
        <div class="max-w-5xl mx-auto px-6">
            @if($alurSertifikasi && $alurSertifikasi->is_active && $alurSertifikasi->path_pdf)
                <div class="bg-white rounded-3xl border border-slate-200 shadow-lg overflow-hidden reveal-on-scroll">
                    <!-- PDF Header -->
                    <div class="bg-gradient-to-r from-blue-900 to-blue-800 px-6 py-4 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-white font-bold text-lg">{{ $alurSertifikasi->nama_dokumen }}</h2>
                                <p class="text-blue-200 text-sm">Dokumen Alur Sertifikasi SLO</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <button onclick="openFullscreen()" class="flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-lg transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                                </svg>
                                <span class="hidden sm:inline">Full Screen</span>
                            </button>
                            <a href="{{ asset('storage/' . $alurSertifikasi->path_pdf) }}" download class="flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                                <span class="hidden sm:inline">Download</span>
                            </a>
                        </div>
                    </div>

                    <!-- PDF Viewer -->
                    <div class="relative" style="height: 700px;">
                        <iframe 
                            src="{{ asset('storage/' . $alurSertifikasi->path_pdf) }}" 
                            class="w-full h-full"
                            frameborder="0"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            @else
                <div class="bg-slate-50 rounded-3xl border border-slate-200 shadow-sm p-16 text-center reveal-on-scroll">
                    <div class="w-20 h-20 bg-slate-200 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Dokumen belum tersedia</h3>
                    <p class="text-slate-600">Dokumen alur sertifikasi akan ditampilkan di sini setelah diunggah oleh admin.</p>
                </div>
            @endif
        </div>
    </section>

    <x-footer />

    <script>
        function openFullscreen() {
            const iframe = document.querySelector('iframe');
            if (iframe.requestFullscreen) {
                iframe.requestFullscreen();
            } else if (iframe.webkitRequestFullscreen) {
                iframe.webkitRequestFullscreen();
            } else if (iframe.msRequestFullscreen) {
                iframe.msRequestFullscreen();
            }
        }
    </script>
@endsection
