@extends('layouts.app')

@section('title', 'Persyaratan SLO - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Header -->
    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-blue-600/20 text-blue-500 border border-blue-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md">
                Standar Pelayanan
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">
                PERSYARATAN SLO
            </h1>
            <p class="text-white/90 max-w-3xl mx-auto text-lg md:text-xl leading-relaxed mb-8">
                 Dokumen dan persyaratan administratif maupun teknis yang wajib disiapkan sebelum mengajukan permohonan Sertifikat Laik Operasi.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Selection Section -->
            <div class="text-center mb-16 reveal-on-scroll">
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Persyaratan Sertifikat Laik Operasi</h2>
                <p class="text-slate-600 text-lg">Pilih jenis instalasi Anda</p>
            </div>

            <!-- Installation Type Buttons -->
            <div class="mb-16 max-w-5xl mx-auto reveal-on-scroll">
                <!-- Row 1: 3 buttons -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-4">
                    <button onclick="showRequirements('tegangan-rendah')" id="btn-tegangan-rendah"
                        class="slo-btn group relative w-full overflow-hidden bg-gradient-to-br from-blue-600 to-blue-800 hover:from-blue-500 hover:to-blue-700 text-white font-bold text-xs md:text-sm tracking-wide uppercase px-5 py-6 rounded-2xl shadow-lg hover:shadow-blue-500/30 transition-all duration-300 text-center leading-snug flex flex-col items-center justify-center gap-2">
                        <span class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center mb-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </span>
                        PERSYARATAN DOKUMEN<br><span class="text-blue-200">SLO IPTL TM</span><br>PT PRADANA NUSA ENERGI
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-white/30 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </button>

                    <button onclick="showRequirements('plts')" id="btn-plts"
                        class="slo-btn group relative w-full overflow-hidden bg-gradient-to-br from-blue-600 to-blue-800 hover:from-blue-500 hover:to-blue-700 text-white font-bold text-xs md:text-sm tracking-wide uppercase px-5 py-6 rounded-2xl shadow-lg hover:shadow-blue-500/30 transition-all duration-300 text-center leading-snug flex flex-col items-center justify-center gap-2">
                        <span class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center mb-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18"/></svg>
                        </span>
                        PERSYARATAN DOKUMEN<br><span class="text-blue-200">SLO PLTS</span><br>PT PRADANA NUSA ENERGI
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-white/30 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </button>

                    <button onclick="showRequirements('tegangan-menengah')" id="btn-tegangan-menengah"
                        class="slo-btn group relative w-full overflow-hidden bg-gradient-to-br from-blue-600 to-blue-800 hover:from-blue-500 hover:to-blue-700 text-white font-bold text-xs md:text-sm tracking-wide uppercase px-5 py-6 rounded-2xl shadow-lg hover:shadow-blue-500/30 transition-all duration-300 text-center leading-snug flex flex-col items-center justify-center gap-2">
                        <span class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center mb-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 20h16M6 20V8m6 12V4m6 16v-8"/></svg>
                        </span>
                        PERSYARATAN DOKUMEN<br><span class="text-blue-200">SLO TEGANGAN MENENGAH</span><br>PT PRADANA NUSA ENERGI
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-white/30 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </button>
                </div>

                <!-- Row 2: 2 buttons centered -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 max-w-2xl mx-auto">
                    <button onclick="showRequirements('genset')" id="btn-genset"
                        class="slo-btn group relative w-full overflow-hidden bg-gradient-to-br from-blue-600 to-blue-800 hover:from-blue-500 hover:to-blue-700 text-white font-bold text-xs md:text-sm tracking-wide uppercase px-5 py-6 rounded-2xl shadow-lg hover:shadow-blue-500/30 transition-all duration-300 text-center leading-snug flex flex-col items-center justify-center gap-2">
                        <span class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center mb-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3v2m0 14v2m9-9h-2M5 12H3m9-6l-1.4-1.4M16.4 7.6L15 6.2m0 11.8l1.4 1.4M7.6 16.4L6.2 15m8.8-8.8l1.4-1.4M7.6 7.6L6.2 6.2"/></svg>
                        </span>
                        PERSYARATAN DOKUMEN<br><span class="text-blue-200">SLO GENSET</span><br>PT PRADANA NUSA ENERGI
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-white/30 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </button>

                    <button onclick="showRequirements('iptl-tm')" id="btn-iptl-tm"
                        class="slo-btn group relative w-full overflow-hidden bg-gradient-to-br from-blue-600 to-blue-800 hover:from-blue-500 hover:to-blue-700 text-white font-bold text-xs md:text-sm tracking-wide uppercase px-5 py-6 rounded-2xl shadow-lg hover:shadow-blue-500/30 transition-all duration-300 text-center leading-snug flex flex-col items-center justify-center gap-2">
                        <span class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center mb-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                        </span>
                        PERSYARATAN DOKUMEN<br><span class="text-blue-200">SLO IPTL TM</span><br>PT PRADANA NUSA ENERGI
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-white/30 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </button>
                </div>
            </div>

            

            <!-- Requirements Sections -->
            <div id="requirements-container" class="hidden">
                <!-- Tegangan Rendah -->
                <div id="tegangan-rendah" class="requirements-section hidden">
                    <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm mb-8">
                        <div class="flex items-center gap-4 mb-6 pb-6 border-b border-slate-100">
                            <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-900"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg></div>
                            <h2 class="text-2xl font-extrabold text-slate-900">Persyaratan Tegangan Rendah</h2>
                        </div>
                        <div class="grid md:grid-cols-2 gap-8">
                            <div>
                                <h3 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                                    <span class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 text-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-4.414-4.414A1 1 0 0014 4H7a2 2 0 00-2 2v13a2 2 0 002 2z"></path></svg></span>
                                    Persyaratan Administrasi
                                </h3>
                                <ul class="space-y-3">
                                    @if($persyaratan && $persyaratan->tr_admin)
                                        @foreach($persyaratan->tr_admin as $item)
                                            <li class="flex items-start gap-2 text-sm text-slate-600">
                                                <span class="text-blue-500">•</span>
                                                {{ $item }}
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-500">•</span>
                                            KTP (Individu) atau NIB/Akta Perusahaan (Badan Usaha)
                                        </li>
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-500">•</span>
                                            Surat Permohonan SLO yang ditandatangani
                                        </li>
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-500">•</span>
                                            Bukti pembayaran biaya inspeksi
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                                    <span class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center text-blue-700 text-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"></circle><path stroke-linecap="round" stroke-linejoin="round" d="M19.4 15a1.7 1.7 0 00.3 1.8l.1.1a2 2 0 01-2.8 2.8l-.1-.1a1.7 1.7 0 00-1.8-.3 1.7 1.7 0 00-1 1.5V21a2 2 0 01-4 0v-.2a1.7 1.7 0 00-1-1.5 1.7 1.7 0 00-1.8.3l-.1.1a2 2 0 01-2.8-2.8l.1-.1a1.7 1.7 0 00.3-1.8 1.7 1.7 0 00-1.5-1H3a2 2 0 010-4h.2a1.7 1.7 0 001.5-1 1.7 1.7 0 00-.3-1.8l-.1-.1a2 2 0 012.8-2.8l.1.1a1.7 1.7 0 001.8.3h.1a1.7 1.7 0 001-1.5V3a2 2 0 014 0v.2a1.7 1.7 0 001 1.5h.1a1.7 1.7 0 001.8-.3l.1-.1a2 2 0 012.8 2.8l-.1.1a1.7 1.7 0 00-.3 1.8v.1a1.7 1.7 0 001.5 1H21a2 2 0 010 4h-.2a1.7 1.7 0 00-1.5 1z"></path></svg></span>
                                    Persyaratan Teknis
                                </h3>
                                <ul class="space-y-3">
                                    @if($persyaratan && $persyaratan->tr_teknis)
                                        @foreach($persyaratan->tr_teknis as $item)
                                            <li class="flex items-start gap-2 text-sm text-slate-600">
                                                <span class="text-blue-600">•</span>
                                                {{ $item }}
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-600">•</span>
                                            Gambar instalasi listrik (Single Line Diagram)
                                        </li>
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-600">•</span>
                                            Spesifikasi peralatan (MCB, MCBB, kabel)
                                        </li>
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-600">•</span>
                                            Sertifikat SNI peralatan
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tegangan Menengah -->
                <div id="tegangan-menengah" class="requirements-section hidden">
                    <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm mb-8">
                        <div class="flex items-center gap-4 mb-6 pb-6 border-b border-slate-100">
                            <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-900"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 20h16M6 20V8m6 12V4m6 16v-8"></path></svg></div>
                            <h2 class="text-2xl font-extrabold text-slate-900">Persyaratan Tegangan Menengah</h2>
                        </div>
                        <div class="grid md:grid-cols-2 gap-8">
                            <div>
                                <h3 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                                    <span class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 text-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-4.414-4.414A1 1 0 0014 4H7a2 2 0 00-2 2v13a2 2 0 002 2z"></path></svg></span>
                                    Persyaratan Administrasi
                                </h3>
                                <ul class="space-y-3">
                                    @if($persyaratan && $persyaratan->tm_admin)
                                        @foreach($persyaratan->tm_admin as $item)
                                            <li class="flex items-start gap-2 text-sm text-slate-600">
                                                <span class="text-blue-500">•</span>
                                                {{ $item }}
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-500">•</span>
                                            KTP (Individu) atau NIB/Akta Perusahaan (Badan Usaha)
                                        </li>
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-500">•</span>
                                            Surat Permohonan SLO yang ditandatangani
                                        </li>
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-500">•</span>
                                            IUPTL / Nomor Registrasi DJK
                                        </li>
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-500">•</span>
                                            Bukti pembayaran biaya inspeksi
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                                    <span class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center text-blue-700 text-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"></circle><path stroke-linecap="round" stroke-linejoin="round" d="M19.4 15a1.7 1.7 0 00.3 1.8l.1.1a2 2 0 01-2.8 2.8l-.1-.1a1.7 1.7 0 00-1.8-.3 1.7 1.7 0 00-1 1.5V21a2 2 0 01-4 0v-.2a1.7 1.7 0 00-1-1.5 1.7 1.7 0 00-1.8.3l-.1.1a2 2 0 01-2.8-2.8l.1-.1a1.7 1.7 0 00.3-1.8 1.7 1.7 0 00-1.5-1H3a2 2 0 010-4h.2a1.7 1.7 0 001.5-1 1.7 1.7 0 00-.3-1.8l-.1-.1a2 2 0 012.8-2.8l.1.1a1.7 1.7 0 001.8.3h.1a1.7 1.7 0 001-1.5V3a2 2 0 014 0v.2a1.7 1.7 0 001 1.5h.1a1.7 1.7 0 001.8-.3l.1-.1a2 2 0 012.8 2.8l-.1.1a1.7 1.7 0 00-.3 1.8v.1a1.7 1.7 0 001.5 1H21a2 2 0 010 4h-.2a1.7 1.7 0 00-1.5 1z"></path></svg></span>
                                    Persyaratan Teknis
                                </h3>
                                <ul class="space-y-3">
                                    @if($persyaratan && $persyaratan->tm_teknis)
                                        @foreach($persyaratan->tm_teknis as $item)
                                            <li class="flex items-start gap-2 text-sm text-slate-600">
                                                <span class="text-blue-600">•</span>
                                                {{ $item }}
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-600">•</span>
                                            Gambar instalasi listrik (Single Line Diagram)
                                        </li>
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-600">•</span>
                                            Spesifikasi trafo, panel, kabel, dan peralatan proteksi
                                        </li>
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-600">•</span>
                                            Sertifikat uji pabrik (FAT) trafo dan panel
                                        </li>
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-600">•</span>
                                            Sertifikat SNI peralatan
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PLTS -->
                <div id="plts" class="requirements-section hidden">
                    <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm mb-8">
                        <div class="flex items-center gap-4 mb-6 pb-6 border-b border-slate-100">
                            <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-900"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3v2m0 14v2m9-9h-2M5 12H3m9-6l-1.4-1.4M16.4 7.6L15 6.2m0 11.8l1.4 1.4M7.6 16.4L6.2 15m8.8-8.8l1.4-1.4M7.6 7.6L6.2 6.2"></path></svg></div>
                            <h2 class="text-2xl font-extrabold text-slate-900">Persyaratan PLTS</h2>
                        </div>
                        <div class="grid md:grid-cols-2 gap-8">
                            <div>
                                <h3 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                                    <span class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 text-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-4.414-4.414A1 1 0 0014 4H7a2 2 0 00-2 2v13a2 2 0 002 2z"></path></svg></span>
                                    Persyaratan Administrasi
                                </h3>
                                <ul class="space-y-3">
                                    @if($persyaratan && $persyaratan->plts_admin)
                                        @foreach($persyaratan->plts_admin as $item)
                                            <li class="flex items-start gap-2 text-sm text-slate-600">
                                                <span class="text-blue-500">•</span>
                                                {{ $item }}
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-500">•</span>
                                            KTP (Individu) atau NIB/Akta Perusahaan (Badan Usaha)
                                        </li>
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-500">•</span>
                                            Surat Permohonan SLO yang ditandatangani
                                        </li>
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-500">•</span>
                                            IUPTL / Nomor Registrasi DJK (untuk sistem on-grid)
                                        </li>
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-500">•</span>
                                            Bukti pembayaran biaya inspeksi
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                                    <span class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center text-blue-700 text-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"></circle><path stroke-linecap="round" stroke-linejoin="round" d="M19.4 15a1.7 1.7 0 00.3 1.8l.1.1a2 2 0 01-2.8 2.8l-.1-.1a1.7 1.7 0 00-1.8-.3 1.7 1.7 0 00-1 1.5V21a2 2 0 01-4 0v-.2a1.7 1.7 0 00-1-1.5 1.7 1.7 0 00-1.8.3l-.1.1a2 2 0 01-2.8-2.8l.1-.1a1.7 1.7 0 00.3-1.8 1.7 1.7 0 00-1.5-1H3a2 2 0 010-4h.2a1.7 1.7 0 001.5-1 1.7 1.7 0 00-.3-1.8l-.1-.1a2 2 0 012.8-2.8l.1.1a1.7 1.7 0 001.8.3h.1a1.7 1.7 0 001-1.5V3a2 2 0 014 0v.2a1.7 1.7 0 001 1.5h.1a1.7 1.7 0 001.8-.3l.1-.1a2 2 0 012.8 2.8l-.1.1a1.7 1.7 0 00-.3 1.8v.1a1.7 1.7 0 001.5 1H21a2 2 0 010 4h-.2a1.7 1.7 0 00-1.5 1z"></path></svg></span>
                                    Persyaratan Teknis
                                </h3>
                                <ul class="space-y-3">
                                    @if($persyaratan && $persyaratan->plts_teknis)
                                        @foreach($persyaratan->plts_teknis as $item)
                                            <li class="flex items-start gap-2 text-sm text-slate-600">
                                                <span class="text-blue-600">•</span>
                                                {{ $item }}
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-600">•</span>
                                            Gambar instalasi PLTS (Single Line Diagram)
                                        </li>
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-600">•</span>
                                            Spesifikasi solar panel, inverter, dan baterai
                                        </li>
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-600">•</span>
                                            Sertifikat SNI solar panel dan inverter
                                        </li>
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-600">•</span>
                                            Sertifikat uji pabrik inverter
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Genset -->
                <div id="genset" class="requirements-section hidden">
                    <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm mb-8">
                        <div class="flex items-center gap-4 mb-6 pb-6 border-b border-slate-100">
                            <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-900"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"></circle><path stroke-linecap="round" stroke-linejoin="round" d="M19.4 15a1.7 1.7 0 00.3 1.8l.1.1a2 2 0 01-2.8 2.8l-.1-.1a1.7 1.7 0 00-1.8-.3 1.7 1.7 0 00-1 1.5V21a2 2 0 01-4 0v-.2a1.7 1.7 0 00-1-1.5 1.7 1.7 0 00-1.8.3l-.1.1a2 2 0 01-2.8-2.8l.1-.1a1.7 1.7 0 00.3-1.8 1.7 1.7 0 00-1.5-1H3a2 2 0 010-4h.2a1.7 1.7 0 001.5-1 1.7 1.7 0 00-.3-1.8l-.1-.1a2 2 0 012.8-2.8l.1.1a1.7 1.7 0 001.8.3h.1a1.7 1.7 0 001-1.5V3a2 2 0 014 0v.2a1.7 1.7 0 001 1.5h.1a1.7 1.7 0 001.8-.3l.1-.1a2 2 0 012.8 2.8l-.1.1a1.7 1.7 0 00-.3 1.8v.1a1.7 1.7 0 001.5 1H21a2 2 0 010 4h-.2a1.7 1.7 0 00-1.5 1z"></path></svg></div>
                            <h2 class="text-2xl font-extrabold text-slate-900">Persyaratan Genset</h2>
                        </div>
                        <div class="grid md:grid-cols-2 gap-8">
                            <div>
                                <h3 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                                    <span class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 text-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-4.414-4.414A1 1 0 0014 4H7a2 2 0 00-2 2v13a2 2 0 002 2z"></path></svg></span>
                                    Persyaratan Administrasi
                                </h3>
                                <ul class="space-y-3">
                                    @if($persyaratan && $persyaratan->genset_admin)
                                        @foreach($persyaratan->genset_admin as $item)
                                            <li class="flex items-start gap-2 text-sm text-slate-600">
                                                <span class="text-blue-500">•</span>
                                                {{ $item }}
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-500">•</span>
                                            KTP (Individu) atau NIB/Akta Perusahaan (Badan Usaha)
                                        </li>
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-500">•</span>
                                            Surat Permohonan SLO yang ditandatangani
                                        </li>
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-500">•</span>
                                            Bukti pembayaran biaya inspeksi
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                                    <span class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center text-blue-700 text-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"></circle><path stroke-linecap="round" stroke-linejoin="round" d="M19.4 15a1.7 1.7 0 00.3 1.8l.1.1a2 2 0 01-2.8 2.8l-.1-.1a1.7 1.7 0 00-1.8-.3 1.7 1.7 0 00-1 1.5V21a2 2 0 01-4 0v-.2a1.7 1.7 0 00-1-1.5 1.7 1.7 0 00-1.8.3l-.1.1a2 2 0 01-2.8-2.8l.1-.1a1.7 1.7 0 00.3-1.8 1.7 1.7 0 00-1.5-1H3a2 2 0 010-4h.2a1.7 1.7 0 001.5-1 1.7 1.7 0 00-.3-1.8l-.1-.1a2 2 0 012.8-2.8l.1.1a1.7 1.7 0 001.8.3h.1a1.7 1.7 0 001-1.5V3a2 2 0 014 0v.2a1.7 1.7 0 001 1.5h.1a1.7 1.7 0 001.8-.3l.1-.1a2 2 0 012.8 2.8l-.1.1a1.7 1.7 0 00-.3 1.8v.1a1.7 1.7 0 001.5 1H21a2 2 0 010 4h-.2a1.7 1.7 0 00-1.5 1z"></path></svg></span>
                                    Persyaratan Teknis
                                </h3>
                                <ul class="space-y-3">
                                    @if($persyaratan && $persyaratan->genset_teknis)
                                        @foreach($persyaratan->genset_teknis as $item)
                                            <li class="flex items-start gap-2 text-sm text-slate-600">
                                                <span class="text-blue-600">•</span>
                                                {{ $item }}
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-600">•</span>
                                            Gambar instalasi genset (Single Line Diagram)
                                        </li>
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-600">•</span>
                                            Spesifikasi genset (kVA, phase, voltage)
                                        </li>
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-600">•</span>
                                            Sertifikat uji pabrik genset
                                        </li>
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-600">•</span>
                                            Bukti pemasangan oleh instalatur resmi
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- IPTL TM -->
                <div id="iptl-tm" class="requirements-section hidden">
                    <div class="bg-white rounded-3xl overflow-hidden border border-slate-200 shadow-sm mb-8">
                        <!-- Header -->
                        <div class="bg-gradient-to-r from-slate-800 to-blue-900 px-8 py-6 flex items-center gap-4">
                            <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center text-white flex-shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                            </div>
                            <div>
                                <p class="text-blue-300 text-xs font-semibold tracking-widest uppercase mb-0.5">Sertifikat Laik Operasi</p>
                                <h2 class="text-xl md:text-2xl font-extrabold text-white leading-tight">PERSYARATAN DOKUMEN SLO IPTL TM<br><span class="text-blue-300">PT PRADANA NUSA ENERGI</span></h2>
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="bg-slate-50 border-b-2 border-slate-200">
                                        <th class="w-12 px-6 py-4 text-center text-slate-500 font-semibold text-xs tracking-widest uppercase">#</th>
                                        <th class="px-6 py-4 text-left text-slate-700 font-semibold text-xs tracking-widest uppercase">Persyaratan</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    @php
                                        $defaultIptlTm = [
                                            'KTP Pemilik atau Penanggung Jawab Perusahaan',
                                            'NIB Perusahaan/ Surat Izin Usaha/ Surat Izin Operasional',
                                            'NPWP Perusahaan',
                                            'No. Handphone Penanggung Jawab Perusahaan',
                                            'No. Telepon Perusahaan',
                                            'Email Penanggung Jawab Perusahaan',
                                            'Nomor Identitas Data Instalasi (NIDI)',
                                            'Siteplan atau Layout Tata Letak Instalasi Listrik di Power House/Gardu Listrik Konsumen',
                                            'Single Line Diagram',
                                            'Factory Test Report PHB TM',
                                            'Factory Test Report Transformator',
                                            'Factory Test Report PHB TR',
                                            'Factory Test Report Saluran TM jika lebih dari 100 meter',
                                            'SPJBTL/SIP/Rekening Listrik 3 bulan terakhir',
                                            'Hasil Setting Relay Proteksi Pada PHB TM (bila terdapat Relay Control)',
                                        ];
                                        $iptlTmItems = ($persyaratan && $persyaratan->iptl_tm && count($persyaratan->iptl_tm) > 0)
                                            ? $persyaratan->iptl_tm
                                            : $defaultIptlTm;
                                    @endphp
                                    @foreach($iptlTmItems as $index => $item)
                                        <tr class="group hover:bg-blue-50/60 transition-colors duration-150 {{ $index % 2 === 0 ? 'bg-white' : 'bg-slate-50/50' }}">
                                            <td class="px-6 py-4 text-center">
                                                <span class="inline-flex items-center justify-center w-7 h-7 rounded-full text-xs font-bold
                                                    {{ $index % 2 === 0 ? 'bg-blue-100 text-blue-700' : 'bg-slate-100 text-slate-500' }}
                                                    group-hover:bg-blue-600 group-hover:text-white transition-colors duration-150">
                                                    {{ $index + 1 }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-slate-700 group-hover:text-blue-900 font-medium transition-colors duration-150">
                                                {{ $item }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Footer info -->
                        <div class="px-8 py-4 bg-blue-50 border-t border-blue-100 flex items-center gap-3">
                            <svg class="w-4 h-4 text-blue-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <p class="text-blue-700 text-xs">Semua dokumen harus dalam kondisi lengkap dan valid sebelum pengajuan permohonan SLO.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <script>
        function showRequirements(type) {
            console.log('Tampilkan section: ' + type);

            // Hide all requirement sections
            document.querySelectorAll('.requirements-section').forEach(function(section) {
                section.classList.add('hidden');
                section.style.display = 'none';
            });

            // Reset all button active states
            document.querySelectorAll('.slo-btn').forEach(function(btn) {
                btn.style.outline = '';
                btn.style.outlineOffset = '';
            });

            // Show the requirements container
            var container = document.getElementById('requirements-container');
            if (container) {
                container.classList.remove('hidden');
                container.style.display = 'block';
            }

            // Show the selected section
            var target = document.getElementById(type);
            if (target) {
                target.classList.remove('hidden');
                target.style.display = 'block';
            } else {
                console.error('Section not found: #' + type);
                return;
            }

            // Highlight active button with inline style
            var activeBtn = document.getElementById('btn-' + type);
            if (activeBtn) {
                activeBtn.style.outline = '3px solid rgba(255,255,255,0.6)';
                activeBtn.style.outlineOffset = '2px';
            }

            // Smooth scroll to requirements section
            setTimeout(function() {
                container.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 100);
        }
    </script>

    <x-footer />
@endsection
