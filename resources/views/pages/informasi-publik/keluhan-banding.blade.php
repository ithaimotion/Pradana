@extends('layouts.app')

@section('title', 'Keluhan & Banding - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Header -->
    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-orange-500/20 text-orange-400 border border-orange-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md">
                Layanan Pelanggan
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">
                KELUHAN & BANDING
            </h1>
            <p class="text-slate-300 max-w-2xl mx-auto text-base md:text-lg">
                Sistem penanganan keluhan dan banding yang transparan dan akuntabel demi menjamin kepuasan pelanggan dan perbaikan mutu layanan kami.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Intro -->
            <div class="mb-12 text-center max-w-3xl mx-auto reveal-on-scroll">
                <p class="text-slate-600 leading-relaxed">
                    Kami berkomitmen untuk terus meningkatkan kualitas layanan. Jika Anda merasa tidak puas dengan hasil inspeksi, pelayanan petugas, atau proses administrasi, Anda berhak mengajukan keluhan atau banding. Kami menjamin kerahasiaan identitas pelapor dan objektivitas penanganan.
                </p>
            </div>

            <!-- Cards -->
            <div class="grid md:grid-cols-2 gap-8 mb-16 reveal-on-scroll delay-100">
                
                <!-- Keluhan Card -->
                <div class="bg-white border border-slate-200 rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-50 text-blue-900 rounded-2xl flex items-center justify-center mb-6 text-2xl font-bold">
                        💬
                    </div>
                    <h2 class="text-2xl font-extrabold text-slate-900 mb-3">Pengajuan Keluhan</h2>
                    <p class="text-sm text-slate-500 mb-6 leading-relaxed">
                        Keluhan adalah ungkapan ketidakpuasan terhadap pelayanan administrasi, perilaku petugas, ketepatan waktu, atau aspek non-teknis lainnya.
                    </p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-start gap-3">
                            <span class="text-blue-500 mt-0.5"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span>
                            <span class="text-sm text-slate-700">Pelayanan staf administrasi yang kurang baik</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-blue-500 mt-0.5"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span>
                            <span class="text-sm text-slate-700">Keterlambatan jadwal inspeksi</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-blue-500 mt-0.5"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span>
                            <span class="text-sm text-slate-700">Ketidaksesuaian biaya tagihan</span>
                        </li>
                    </ul>
                    <button class="w-full bg-blue-900 hover:bg-blue-800 text-white font-bold py-3 rounded-xl transition shadow-md">
                        Formulir Keluhan
                    </button>
                </div>

                <!-- Banding Card -->
                <div class="bg-white border border-slate-200 rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-300">
                    <div class="w-14 h-14 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center mb-6 text-2xl font-bold">
                        ⚖️
                    </div>
                    <h2 class="text-2xl font-extrabold text-slate-900 mb-3">Pengajuan Banding</h2>
                    <p class="text-sm text-slate-500 mb-6 leading-relaxed">
                        Banding adalah permintaan resmi dari pelanggan agar LIT mempertimbangkan kembali keputusan atau hasil inspeksi teknik yang telah ditetapkan.
                    </p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-start gap-3">
                            <span class="text-orange-500 mt-0.5"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span>
                            <span class="text-sm text-slate-700">Keberatan atas status "Tidak Laik Operasi"</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-orange-500 mt-0.5"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span>
                            <span class="text-sm text-slate-700">Perbedaan interpretasi standar/PUIL</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-orange-500 mt-0.5"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span>
                            <span class="text-sm text-slate-700">Ketidaksesuaian metode pengujian di lapangan</span>
                        </li>
                    </ul>
                    <button class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 rounded-xl transition shadow-md">
                        Formulir Banding
                    </button>
                </div>

            </div>

            <!-- Flow -->
            <div class="bg-blue-900 rounded-3xl p-8 md:p-12 text-white reveal-on-scroll delay-200">
                <h3 class="text-2xl font-extrabold mb-8 text-center">Alur Penanganan</h3>
                
                <div class="relative">
                    <!-- Line connector -->
                    <div class="hidden md:block absolute top-1/2 left-0 w-full h-1 bg-blue-800 -translate-y-1/2"></div>
                    
                    <div class="grid md:grid-cols-4 gap-6 relative z-10">
                        
                        <div class="bg-blue-950 p-6 rounded-2xl border border-blue-800 text-center">
                            <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-4 font-bold">1</div>
                            <h4 class="font-bold text-sm mb-2">Penerimaan</h4>
                            <p class="text-xs text-blue-200">Pelanggan mengisi formulir via web, email, atau datang ke kantor.</p>
                        </div>
                        
                        <div class="bg-blue-950 p-6 rounded-2xl border border-blue-800 text-center">
                            <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-4 font-bold">2</div>
                            <h4 class="font-bold text-sm mb-2">Investigasi</h4>
                            <p class="text-xs text-blue-200">Tim Independen mengumpulkan fakta, bukti, dan keterangan terkait.</p>
                        </div>

                        <div class="bg-blue-950 p-6 rounded-2xl border border-blue-800 text-center">
                            <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-4 font-bold">3</div>
                            <h4 class="font-bold text-sm mb-2">Keputusan</h4>
                            <p class="text-xs text-blue-200">Manajemen mengambil keputusan dan merumuskan tindakan perbaikan.</p>
                        </div>

                        <div class="bg-blue-950 p-6 rounded-2xl border border-blue-800 text-center">
                            <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-4 font-bold">4</div>
                            <h4 class="font-bold text-sm mb-2">Penyampaian Hasil</h4>
                            <p class="text-xs text-blue-200">Jawaban resmi dan solusi disampaikan kepada pelanggan (Maks. 14 hari).</p>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

    <x-footer />
@endsection
