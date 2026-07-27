@extends('layouts.app')

@section('title', 'Uji Petik - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Header -->
    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-orange-500/20 text-orange-400 border border-orange-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md">
                Pengawasan & Evaluasi
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">
                UJI PETIK (SAMPLING)
            </h1>
            <p class="text-slate-300 max-w-2xl mx-auto text-base md:text-lg">
                Proses pengawasan dan evaluasi kinerja Tenaga Teknik untuk memastikan konsistensi penerapan prosedur inspeksi dan standar keselamatan.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">

            <div class="grid md:grid-cols-2 gap-12 items-center mb-16 reveal-on-scroll">
                <div>
                    <h2 class="text-2xl font-extrabold text-slate-900 mb-4">Tujuan Uji Petik</h2>
                    <p class="text-slate-600 leading-relaxed mb-6">
                        Uji petik (sampling) merupakan bagian dari Sistem Manajemen Mutu SNI ISO/IEC 17020:2012 yang wajib dilaksanakan oleh PT Pradana Nusa Energi. Kegiatan ini bertujuan untuk mengawasi, mengevaluasi, dan menjamin kompetensi serta kinerja Tenaga Teknik di lapangan.
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <span class="w-6 h-6 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center flex-shrink-0 mt-0.5">✓</span>
                            <span class="text-sm text-slate-700">Memastikan kepatuhan terhadap prosedur operasi standar (SOP).</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="w-6 h-6 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center flex-shrink-0 mt-0.5">✓</span>
                            <span class="text-sm text-slate-700">Menjaga objektivitas, independensi, dan integritas hasil inspeksi.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="w-6 h-6 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center flex-shrink-0 mt-0.5">✓</span>
                            <span class="text-sm text-slate-700">Mengevaluasi kompetensi teknis dari Tenaga Teknik secara berkala.</span>
                        </li>
                    </ul>
                </div>
                <div class="bg-blue-900 rounded-3xl p-8 text-white relative overflow-hidden shadow-2xl">
                    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:16px_16px]"></div>
                    <div class="relative z-10">
                        <h3 class="text-lg font-bold mb-6 text-orange-400">Parameter Evaluasi</h3>
                        <div class="space-y-4">
                            <div class="bg-blue-800/50 p-4 rounded-xl backdrop-blur-sm border border-blue-700/50">
                                <h4 class="font-bold text-sm mb-1">1. Persiapan Inspeksi</h4>
                                <p class="text-xs text-blue-200">Kelengkapan APD, peralatan ukur, dan dokumen administrasi.</p>
                            </div>
                            <div class="bg-blue-800/50 p-4 rounded-xl backdrop-blur-sm border border-blue-700/50">
                                <h4 class="font-bold text-sm mb-1">2. Pelaksanaan Pengujian</h4>
                                <p class="text-xs text-blue-200">Kesesuaian metode pengukuran dan pembacaan instrumen dengan PUIL.</p>
                            </div>
                            <div class="bg-blue-800/50 p-4 rounded-xl backdrop-blur-sm border border-blue-700/50">
                                <h4 class="font-bold text-sm mb-1">3. Pelaporan</h4>
                                <p class="text-xs text-blue-200">Keakuratan data LHPP (Laporan Hasil Pemeriksaan dan Pengujian).</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-3xl p-8 md:p-12 shadow-sm reveal-on-scroll delay-100">
                <h2 class="text-2xl font-extrabold text-slate-900 mb-8 text-center">Mekanisme Pelaksanaan</h2>
                
                <div class="grid sm:grid-cols-4 gap-6">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4 border-2 border-orange-500 text-xl font-bold text-slate-700 relative">
                            1
                            <div class="hidden sm:block absolute top-1/2 left-full w-full h-0.5 bg-slate-200 -z-10 -translate-y-1/2"></div>
                        </div>
                        <h4 class="font-bold text-slate-900 text-sm mb-2">Penjadwalan</h4>
                        <p class="text-xs text-slate-500">PJT menyusun jadwal uji petik secara acak tanpa pemberitahuan ke TT.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4 border-2 border-orange-500 text-xl font-bold text-slate-700 relative">
                            2
                            <div class="hidden sm:block absolute top-1/2 left-full w-full h-0.5 bg-slate-200 -z-10 -translate-y-1/2"></div>
                        </div>
                        <h4 class="font-bold text-slate-900 text-sm mb-2">Pendampingan</h4>
                        <p class="text-xs text-slate-500">PJT/Asesor ikut ke lapangan mengamati proses inspeksi oleh TT.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4 border-2 border-orange-500 text-xl font-bold text-slate-700 relative">
                            3
                            <div class="hidden sm:block absolute top-1/2 left-full w-full h-0.5 bg-slate-200 -z-10 -translate-y-1/2"></div>
                        </div>
                        <h4 class="font-bold text-slate-900 text-sm mb-2">Penilaian</h4>
                        <p class="text-xs text-slate-500">PJT mengisi form evaluasi berdasarkan kinerja aktual di lapangan.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-4 border-2 border-orange-500 text-xl font-bold text-white">
                            4
                        </div>
                        <h4 class="font-bold text-slate-900 text-sm mb-2">Tindak Lanjut</h4>
                        <p class="text-xs text-slate-500">Evaluasi hasil, pelatihan ulang (jika perlu), atau sanksi indisipliner.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <x-footer />
@endsection
