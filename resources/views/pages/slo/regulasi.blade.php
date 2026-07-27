@extends('layouts.app')

@section('title', 'Regulasi Ketenagalistrikan - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Header -->
    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-orange-500/20 text-orange-400 border border-orange-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md">
                Dasar Hukum & Peraturan
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">
                REGULASI KETENAGALISTRIKAN
            </h1>
            <p class="text-slate-300 max-w-2xl mx-auto text-base md:text-lg">
                Dasar hukum dan peraturan yang melandasi pelaksanaan inspeksi teknik dan penerbitan Sertifikat Laik Operasi (SLO) di Indonesia.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">

            <!-- UU Ketenagalistrikan -->
            <div class="mb-12 reveal-on-scroll">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-blue-900 rounded-xl flex items-center justify-center shadow-md flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                        </svg>
                    </div>
                    <h2 class="text-xl font-extrabold text-slate-900">Undang-Undang & Peraturan Pemerintah</h2>
                </div>
                <div class="space-y-4">

                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group">
                        <div class="flex items-stretch">
                            <div class="w-2 bg-blue-900 flex-shrink-0 rounded-l-2xl"></div>
                            <div class="flex-1 flex flex-col md:flex-row items-start md:items-center gap-4 p-5 md:p-6">
                                <div class="w-12 h-12 bg-blue-50 text-blue-900 rounded-xl flex items-center justify-center flex-shrink-0 shadow-sm font-bold text-lg">
                                    ⚖️
                                </div>
                                <div class="flex-1">
                                    <span class="text-xs font-bold bg-blue-100 text-blue-800 border border-blue-200 px-2 py-0.5 rounded-full">Undang-Undang</span>
                                    <h3 class="font-extrabold text-slate-900 text-base mt-1 group-hover:text-blue-900 transition-colors">UU No. 30 Tahun 2009</h3>
                                    <p class="text-xs text-slate-500 mt-0.5">Tentang Ketenagalistrikan — Landasan hukum utama penyelenggaraan ketenagalistrikan nasional termasuk inspeksi & sertifikasi.</p>
                                </div>
                                <a href="#" class="flex items-center gap-1.5 bg-blue-900 hover:bg-blue-800 text-white text-xs font-bold px-4 py-2 rounded-lg transition shadow-sm flex-shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                    Lihat
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group">
                        <div class="flex items-stretch">
                            <div class="w-2 bg-blue-900 flex-shrink-0 rounded-l-2xl"></div>
                            <div class="flex-1 flex flex-col md:flex-row items-start md:items-center gap-4 p-5 md:p-6">
                                <div class="w-12 h-12 bg-blue-50 text-blue-900 rounded-xl flex items-center justify-center flex-shrink-0 shadow-sm font-bold text-lg">
                                    📜
                                </div>
                                <div class="flex-1">
                                    <span class="text-xs font-bold bg-blue-100 text-blue-800 border border-blue-200 px-2 py-0.5 rounded-full">Peraturan Pemerintah</span>
                                    <h3 class="font-extrabold text-slate-900 text-base mt-1 group-hover:text-blue-900 transition-colors">PP No. 14 Tahun 2012</h3>
                                    <p class="text-xs text-slate-500 mt-0.5">Tentang Kegiatan Usaha Penyediaan Tenaga Listrik — Mengatur penyelenggaraan usaha penyediaan dan jasa penunjang tenaga listrik.</p>
                                </div>
                                <a href="#" class="flex items-center gap-1.5 bg-blue-900 hover:bg-blue-800 text-white text-xs font-bold px-4 py-2 rounded-lg transition shadow-sm flex-shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                    Lihat
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Peraturan Menteri ESDM -->
            <div class="mb-12 reveal-on-scroll delay-100">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-orange-500 rounded-xl flex items-center justify-center shadow-md flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h2 class="text-xl font-extrabold text-slate-900">Peraturan Menteri ESDM</h2>
                </div>
                <div class="space-y-4">

                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group">
                        <div class="flex items-stretch">
                            <div class="w-2 bg-orange-500 flex-shrink-0 rounded-l-2xl"></div>
                            <div class="flex-1 flex flex-col md:flex-row items-start md:items-center gap-4 p-5 md:p-6">
                                <div class="w-12 h-12 bg-orange-50 text-orange-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-sm font-bold text-lg">
                                    📋
                                </div>
                                <div class="flex-1">
                                    <span class="text-xs font-bold bg-orange-100 text-orange-700 border border-orange-200 px-2 py-0.5 rounded-full">Permen ESDM</span>
                                    <h3 class="font-extrabold text-slate-900 text-base mt-1 group-hover:text-orange-600 transition-colors">Permen ESDM No. 12 Tahun 2021</h3>
                                    <p class="text-xs text-slate-500 mt-0.5">Tentang Sertifikasi Laik Operasi Instalasi Tenaga Listrik — Mengatur prosedur, syarat, dan mekanisme penerbitan SLO.</p>
                                </div>
                                <a href="#" class="flex items-center gap-1.5 bg-orange-500 hover:bg-orange-600 text-white text-xs font-bold px-4 py-2 rounded-lg transition shadow-sm flex-shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                    Lihat
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group">
                        <div class="flex items-stretch">
                            <div class="w-2 bg-orange-500 flex-shrink-0 rounded-l-2xl"></div>
                            <div class="flex-1 flex flex-col md:flex-row items-start md:items-center gap-4 p-5 md:p-6">
                                <div class="w-12 h-12 bg-orange-50 text-orange-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-sm font-bold text-lg">
                                    ⚡
                                </div>
                                <div class="flex-1">
                                    <span class="text-xs font-bold bg-orange-100 text-orange-700 border border-orange-200 px-2 py-0.5 rounded-full">Permen ESDM</span>
                                    <h3 class="font-extrabold text-slate-900 text-base mt-1 group-hover:text-orange-600 transition-colors">Permen ESDM No. 1 Tahun 2020</h3>
                                    <p class="text-xs text-slate-500 mt-0.5">Tentang Keselamatan Instalasi Tenaga Listrik — Mengatur standar keselamatan untuk instalasi pembangkitan, transmisi, dan distribusi.</p>
                                </div>
                                <a href="#" class="flex items-center gap-1.5 bg-orange-500 hover:bg-orange-600 text-white text-xs font-bold px-4 py-2 rounded-lg transition shadow-sm flex-shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                    Lihat
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group">
                        <div class="flex items-stretch">
                            <div class="w-2 bg-orange-500 flex-shrink-0 rounded-l-2xl"></div>
                            <div class="flex-1 flex flex-col md:flex-row items-start md:items-center gap-4 p-5 md:p-6">
                                <div class="w-12 h-12 bg-orange-50 text-orange-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-sm font-bold text-lg">
                                    🔌
                                </div>
                                <div class="flex-1">
                                    <span class="text-xs font-bold bg-orange-100 text-orange-700 border border-orange-200 px-2 py-0.5 rounded-full">Permen ESDM</span>
                                    <h3 class="font-extrabold text-slate-900 text-base mt-1 group-hover:text-orange-600 transition-colors">Permen ESDM No. 13 Tahun 2020</h3>
                                    <p class="text-xs text-slate-500 mt-0.5">Tentang Penyediaan Tenaga Listrik — Regulasi terkait penyediaan tenaga listrik untuk kepentingan umum dan pemanfaatan sendiri.</p>
                                </div>
                                <a href="#" class="flex items-center gap-1.5 bg-orange-500 hover:bg-orange-600 text-white text-xs font-bold px-4 py-2 rounded-lg transition shadow-sm flex-shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                    Lihat
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Standar Nasional -->
            <div class="mb-12 reveal-on-scroll delay-200">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-teal-600 rounded-xl flex items-center justify-center shadow-md flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <h2 class="text-xl font-extrabold text-slate-900">Standar Nasional Indonesia (SNI)</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-4">

                    <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-teal-50 text-teal-700 rounded-xl flex items-center justify-center flex-shrink-0 text-lg font-bold">🏅</div>
                            <div>
                                <span class="text-xs font-bold bg-teal-100 text-teal-700 border border-teal-200 px-2 py-0.5 rounded-full">SNI</span>
                                <h3 class="font-bold text-slate-900 text-sm mt-1">PUIL 2011 (SNI 0225:2011)</h3>
                                <p class="text-xs text-slate-500 mt-1 leading-relaxed">Persyaratan Umum Instalasi Listrik — Standar acuan utama dalam pemeriksaan dan pengujian instalasi listrik di Indonesia.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-teal-50 text-teal-700 rounded-xl flex items-center justify-center flex-shrink-0 text-lg font-bold">🏅</div>
                            <div>
                                <span class="text-xs font-bold bg-teal-100 text-teal-700 border border-teal-200 px-2 py-0.5 rounded-full">SNI</span>
                                <h3 class="font-bold text-slate-900 text-sm mt-1">SNI ISO/IEC 17020:2012</h3>
                                <p class="text-xs text-slate-500 mt-1 leading-relaxed">Penilaian Kesesuaian — Persyaratan untuk Lembaga Inspeksi, sebagai acuan akreditasi LIT oleh KAN.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-teal-50 text-teal-700 rounded-xl flex items-center justify-center flex-shrink-0 text-lg font-bold">🏅</div>
                            <div>
                                <span class="text-xs font-bold bg-teal-100 text-teal-700 border border-teal-200 px-2 py-0.5 rounded-full">SNI</span>
                                <h3 class="font-bold text-slate-900 text-sm mt-1">SNI 04-0227-2006</h3>
                                <p class="text-xs text-slate-500 mt-1 leading-relaxed">Persyaratan PHB Tegangan Rendah dan Menengah — Standar panel hubung bagi (PHB) yang wajib dipenuhi instalasi.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-teal-50 text-teal-700 rounded-xl flex items-center justify-center flex-shrink-0 text-lg font-bold">🏅</div>
                            <div>
                                <span class="text-xs font-bold bg-teal-100 text-teal-700 border border-teal-200 px-2 py-0.5 rounded-full">SNI</span>
                                <h3 class="font-bold text-slate-900 text-sm mt-1">SNI IEC 60364</h3>
                                <p class="text-xs text-slate-500 mt-1 leading-relaxed">Instalasi Listrik Tegangan Rendah — Standar internasional untuk perancangan dan pengujian instalasi tegangan rendah.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Info Note -->
            <div class="bg-blue-50 border border-blue-200 rounded-2xl p-6 flex gap-4 items-start reveal-on-scroll delay-300">
                <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-bold text-blue-900 mb-1">Catatan Penting</h4>
                    <p class="text-sm text-blue-700 leading-relaxed">
                        Regulasi di atas dapat berubah sesuai kebijakan pemerintah. PT Pradana Nusa Energi selalu mengikuti regulasi terkini yang berlaku. Untuk informasi lebih lanjut, kunjungi situs resmi <a href="https://gatrik.esdm.go.id" target="_blank" class="font-semibold underline hover:text-blue-900 transition">Ditjen Ketenagalistrikan ESDM</a>.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <x-footer />
@endsection
