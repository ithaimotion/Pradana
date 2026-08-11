@extends('layouts.app')

@section('title', 'Bidang Layanan SLO - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Header -->
    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-blue-600/20 text-blue-500 border border-blue-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md">
                Layanan Inspeksi & Sertifikasi
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">
                BIDANG LAYANAN
            </h1>
            <p class="text-white/90 max-w-3xl mx-auto text-lg md:text-xl leading-relaxed mb-8">
                PT Pradana Nusa Energi melayani inspeksi teknik dan penerbitan Sertifikat Laik Operasi (SLO) untuk berbagai jenis instalasi tenaga listrik.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    @php
        // Menggabungkan semua bidang layanan menjadi satu list datar sesuai gambar referensi
        $layananList = $kategoriTR->concat($kategoriTM)->concat($kategoriPembangkit);

        // Helper untuk memetakan ikon SVG berkualitas tinggi khas Pradana berdasarkan judul layanan
        if (!function_exists('getLayananIcon')) {
            function getLayananIcon($judul, $dbIkon) {
                // Gunakan ikon kustom dari DB jika berisi SVG atau emoji
                if (!empty($dbIkon)) {
                    if (str_contains($dbIkon, '<svg') || preg_match('/[\x{1F300}-\x{1F9FF}]/u', $dbIkon)) {
                        return $dbIkon;
                    }
                }

                $slug = strtolower(trim($judul));

                // Mapping SVG berdasarkan kata kunci judul untuk kecocokan 1-ke-1 dengan gambar
                if (str_contains($slug, 'iptl')) {
                    // IPTL-TM (Plug/EV Charger style)
                    return '<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/><path stroke-linecap="round" stroke-linejoin="round" d="M9 16h.01M15 16h.01"/></svg>';
                } elseif (str_contains($slug, 'pltd') || str_contains($slug, 'diesel')) {
                    // PLTD (Generator/Engine/Lightning style)
                    return '<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>';
                } elseif (str_contains($slug, 'distribusi')) {
                    // DISTRIBUSI TM (Factory/Substation style)
                    return '<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>';
                } elseif (str_contains($slug, 'plts') || str_contains($slug, 'surya')) {
                    // PLTS (Solar Home style)
                    return '<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>';
                } elseif (str_contains($slug, 'panel') || str_contains($slug, 'cubicle')) {
                    // Pengujian Panel Cubicle (Server/Rack style)
                    return '<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/></svg>';
                } elseif (str_contains($slug, 'trafo') || str_contains($slug, 'transformator')) {
                    // Pengujian Trafo (Battery/Capacitor style)
                    return '<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>';
                } elseif (str_contains($slug, 'kabel')) {
                    // Kabel TM (Letter K circle style)
                    return '<span class="text-2xl font-black text-white">K</span>';
                }

                // Default Lightning Bolt
                return '<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>';
            }
        }
    @endphp

    <section class="py-16 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Services Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                @foreach($layananList as $index => $layanan)
                    <div class="bg-white border border-slate-200 rounded-3xl p-8 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 flex flex-col items-center text-center group reveal-on-scroll {{ $index > 0 ? 'delay-' . (($index % 3) * 100) : '' }}">
                        
                        <!-- Circular Gradient Icon -->
                        <div class="w-20 h-20 rounded-full bg-gradient-to-tr from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white flex items-center justify-center shadow-lg shadow-blue-500/10 mb-6 transition-all duration-300 group-hover:scale-110 group-hover:shadow-blue-500/30">
                            {!! getLayananIcon($layanan->judul, $layanan->ikon) !!}
                        </div>

                        <!-- Title -->
                        <h3 class="text-xl font-bold text-slate-900 group-hover:text-blue-600 transition-colors mb-3 leading-snug">
                            {{ $layanan->judul }}
                        </h3>

                        <!-- Description -->
                        <p class="text-sm text-slate-500 leading-relaxed mb-4">
                            {{ $layanan->deskripsi }}
                        </p>

                        <!-- Tags (Badges) -->
                        @if(!empty($layanan->tags))
                            <div class="flex flex-wrap justify-center gap-1.5 mt-auto pt-4">
                                @foreach($layanan->tags as $tag)
                                    <span class="text-[10px] uppercase tracking-wider bg-blue-50 text-blue-700 border border-blue-100 px-2 py-0.5 rounded-full font-bold">
                                        {{ $tag }}
                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- CTA -->
    <section class="py-14 bg-white reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-gradient-to-r from-blue-900 to-slate-900 rounded-3xl p-8 md:p-10 flex flex-col md:flex-row items-center gap-8 text-white">
                <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg text-3xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <div class="flex-1 text-center md:text-left">
                    <h3 class="text-xl font-extrabold mb-2">Ajukan Permohonan SLO Sekarang</h3>
                   <p class="text-white text-sm leading-relaxed">
    Konsultasikan kebutuhan inspeksi & SLO Anda bersama tim kami. Kami siap melayani seluruh wilayah Indonesia.
</p>
                </div>
                <a href="{{ route('home') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3 rounded-xl transition shadow-lg flex-shrink-0 text-sm whitespace-nowrap">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

    <x-footer />
@endsection
