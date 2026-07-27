@extends('layouts.app')

@section('title', 'Maklumat Layanan - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Header -->
    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-orange-500/20 text-orange-400 border border-orange-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md">
                Komitmen Kami
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">
                MAKLUMAT LAYANAN
            </h1>
            <p class="text-slate-300 max-w-2xl mx-auto text-base md:text-lg">
                Pernyataan tertulis komitmen PT Pradana Nusa Energi dalam memberikan layanan inspeksi teknik yang profesional, transparan, dan berintegritas.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-20 bg-slate-50 overflow-hidden">
        <div class="max-w-4xl mx-auto px-6">

            <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-8 md:p-12 reveal-on-scroll relative overflow-hidden">
                <!-- Watermark Logo / Decoration -->
                <div class="absolute -right-20 -top-20 opacity-5 pointer-events-none">
                    <svg class="w-96 h-96" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>

                <div class="text-center mb-10 relative z-10">
                    <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 mb-4 tracking-tight">MAKLUMAT PELAYANAN</h2>
                    <div class="w-24 h-1.5 bg-orange-500 mx-auto rounded-full"></div>
                </div>

                <div class="prose prose-slate prose-lg max-w-none text-center relative z-10">
                    <p class="text-slate-700 leading-relaxed font-medium">
                        "Dengan ini, kami seluruh Jajaran Manajemen dan Tenaga Teknik PT Pradana Nusa Energi menyatakan sanggup menyelenggarakan pelayanan Inspeksi Teknik Tenaga Listrik sesuai dengan Standar Pelayanan yang telah ditetapkan, serta memberikan pelayanan yang Cepat, Tepat, Profesional, dan Berintegritas."
                    </p>
                    <p class="text-slate-700 leading-relaxed font-medium mt-6">
                        "Apabila kami tidak menepati janji ini, kami siap menerima sanksi sesuai peraturan perundang-undangan yang berlaku."
                    </p>
                </div>

                <div class="mt-16 flex flex-col items-center relative z-10">
                    <p class="text-sm text-slate-500 mb-6">Ditetapkan di Jakarta, 1 Januari 2026</p>
                    <div class="w-48 h-48 border-4 border-slate-100 rounded-full flex items-center justify-center p-2 mb-4 bg-white shadow-inner">
                        <!-- Placeholder for signature/stamp -->
                        <div class="w-full h-full rounded-full border-2 border-dashed border-slate-300 flex items-center justify-center text-slate-400 text-sm font-medium">
                            <span class="rotate-[-15deg] opacity-60">Tanda Tangan & Cap</span>
                        </div>
                    </div>
                    <h3 class="text-lg font-extrabold text-slate-900">Sudarga</h3>
                    <p class="text-sm font-semibold text-orange-500 uppercase tracking-widest">Direktur Utama</p>
                </div>

            </div>

            <!-- Core Values -->
            <div class="mt-20 grid sm:grid-cols-3 gap-6 reveal-on-scroll delay-100">
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm text-center">
                    <div class="w-12 h-12 bg-blue-50 text-blue-900 rounded-full flex items-center justify-center mx-auto mb-4 text-xl">🤝</div>
                    <h4 class="font-bold text-slate-900 mb-2">Integritas</h4>
                    <p class="text-xs text-slate-500">Menjunjung tinggi kejujuran dan etika profesional dalam setiap proses inspeksi.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm text-center">
                    <div class="w-12 h-12 bg-orange-50 text-orange-600 rounded-full flex items-center justify-center mx-auto mb-4 text-xl">⚡</div>
                    <h4 class="font-bold text-slate-900 mb-2">Profesional</h4>
                    <p class="text-xs text-slate-500">Bekerja sesuai standar kompetensi dan regulasi ketenagalistrikan yang berlaku.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm text-center">
                    <div class="w-12 h-12 bg-teal-50 text-teal-700 rounded-full flex items-center justify-center mx-auto mb-4 text-xl">⏱️</div>
                    <h4 class="font-bold text-slate-900 mb-2">Tepat Waktu</h4>
                    <p class="text-xs text-slate-500">Memberikan layanan penerbitan SLO secara efisien sesuai Service Level Agreement.</p>
                </div>
            </div>

        </div>
    </section>

    <x-footer />
@endsection
