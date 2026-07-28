@extends('layouts.app')

@section('title', 'Daftar Harga SLO - PT Pradana Nusa Energi')

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
                DAFTAR HARGA SLO
            </h1>
            <p class="text-slate-300 max-w-2xl mx-auto text-base md:text-lg">
                Tarif Sertifikasi Laik Operasi yang ditetapkan sesuai dengan Peraturan Menteri ESDM yang berlaku, dihitung berdasarkan kapasitas daya terpasang.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">

            @if($daftarHarga && $daftarHarga->path_pdf)
                <!-- PDF Viewer -->
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden reveal-on-scroll">
                    <div class="p-6 border-b border-slate-200">
                        <h2 class="text-xl font-bold text-slate-900">{{ $daftarHarga->nama_dokumen }}</h2>
                    </div>
                    
                    <div class="relative" style="height: 600px;">
                        <iframe 
                            src="{{ asset('storage/' . $daftarHarga->path_pdf) }}" 
                            class="w-full h-full"
                            frameborder="0"
                            allowfullscreen>
                        </iframe>
                    </div>

                    <div class="p-4 border-t border-slate-200 flex justify-between items-center bg-slate-50">
                        <a href="{{ asset('storage/' . $daftarHarga->path_pdf) }}" download class="flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-semibold transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            Download PDF
                        </a>
                        <button onclick="openFullscreen()" class="flex items-center gap-2 px-4 py-2 bg-slate-700 hover:bg-slate-800 text-white rounded-lg text-sm font-semibold transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 4l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path></svg>
                            Full Screen
                        </button>
                    </div>
                </div>
            @else
                <!-- Placeholder when no PDF -->
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-12 text-center reveal-on-scroll">
                    <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Dokumen belum tersedia</h3>
                    <p class="text-slate-600">Daftar harga SLO akan ditampilkan di sini setelah diunggah oleh admin.</p>
                </div>
            @endif

        </div>
    </section>

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

    <x-footer />
@endsection
