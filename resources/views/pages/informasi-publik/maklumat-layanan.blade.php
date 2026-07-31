@extends('layouts.app')

@section('title', 'Maklumat Layanan - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Header -->
    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-blue-600/20 text-blue-500 border border-blue-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md">
                Komitmen Kami
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">
                MAKLUMAT LAYANAN
            </h1>
            <p class="text-slate-700 dark:text-slate-300 max-w-2xl mx-auto text-base md:text-lg">
                Pernyataan tertulis komitmen PT Pradana Nusa Energi dalam memberikan layanan inspeksi teknik yang profesional, transparan, dan berintegritas.
            </p>
        </div>
    </section>

    <!-- Main Content - Image Only -->
    <section class="py-20 bg-slate-50 overflow-hidden">
        <div class="max-w-4xl mx-auto px-6">
            @if(optional($maklumat)->url_gambar)
                <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-8 md:p-12 reveal-on-scroll">
                    <img src="{{ optional($maklumat)->url_gambar }}" alt="Maklumat Layanan" class="w-full h-auto rounded-xl">
                </div>
            @else
                <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-8 md:p-12 reveal-on-scroll text-center">
                    <p class="text-slate-500">Belum ada gambar maklumat layanan yang tersedia.</p>
                </div>
            @endif
        </div>
    </section>

    <x-footer />
@endsection


