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
            <p class="text-slate-700 dark:text-slate-300 max-w-2xl mx-auto text-base md:text-lg">
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

            <!-- Installation Type Cards -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16 reveal-on-scroll">
                <button onclick="showRequirements('tegangan-rendah')" class="bg-white rounded-2xl p-8 border-2 border-slate-200 hover:border-blue-500 hover:shadow-xl transition-all duration-300 group cursor-pointer text-center">
                    <div class="text-5xl mb-4 group-hover:scale-110 transition-transform"><svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg></div>
                    <h3 class="font-bold text-slate-900 mb-2">Tegangan Rendah</h3>
                    <p class="text-sm text-slate-500">Klik untuk melihat persyaratan</p>
                </button>

                <button onclick="showRequirements('tegangan-menengah')" class="bg-white rounded-2xl p-8 border-2 border-slate-200 hover:border-blue-500 hover:shadow-xl transition-all duration-300 group cursor-pointer text-center">
                    <div class="text-5xl mb-4 group-hover:scale-110 transition-transform"><svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 20h16M6 20V8m6 12V4m6 16v-8"></path></svg></div>
                    <h3 class="font-bold text-slate-900 mb-2">Tegangan Menengah</h3>
                    <p class="text-sm text-slate-500">Klik untuk melihat persyaratan</p>
                </button>

                <button onclick="showRequirements('plts')" class="bg-white rounded-2xl p-8 border-2 border-slate-200 hover:border-blue-500 hover:shadow-xl transition-all duration-300 group cursor-pointer text-center">
                    <div class="text-5xl mb-4 group-hover:scale-110 transition-transform"><svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3v2m0 14v2m9-9h-2M5 12H3m9-6l-1.4-1.4M16.4 7.6L15 6.2m0 11.8l1.4 1.4M7.6 16.4L6.2 15m8.8-8.8l1.4-1.4M7.6 7.6L6.2 6.2"></path></svg></div>
                    <h3 class="font-bold text-slate-900 mb-2">PLTS</h3>
                    <p class="text-sm text-slate-500">Klik untuk melihat persyaratan</p>
                </button>

                <button onclick="showRequirements('genset')" class="bg-white rounded-2xl p-8 border-2 border-slate-200 hover:border-blue-500 hover:shadow-xl transition-all duration-300 group cursor-pointer text-center">
                    <div class="text-5xl mb-4 group-hover:scale-110 transition-transform"><svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"></circle><path stroke-linecap="round" stroke-linejoin="round" d="M19.4 15a1.7 1.7 0 00.3 1.8l.1.1a2 2 0 01-2.8 2.8l-.1-.1a1.7 1.7 0 00-1.8-.3 1.7 1.7 0 00-1 1.5V21a2 2 0 01-4 0v-.2a1.7 1.7 0 00-1-1.5 1.7 1.7 0 00-1.8.3l-.1.1a2 2 0 01-2.8-2.8l.1-.1a1.7 1.7 0 00.3-1.8 1.7 1.7 0 00-1.5-1H3a2 2 0 010-4h.2a1.7 1.7 0 001.5-1 1.7 1.7 0 00-.3-1.8l-.1-.1a2 2 0 012.8-2.8l.1.1a1.7 1.7 0 001.8.3h.1a1.7 1.7 0 001-1.5V3a2 2 0 014 0v.2a1.7 1.7 0 001 1.5h.1a1.7 1.7 0 001.8-.3l.1-.1a2 2 0 012.8 2.8l-.1.1a1.7 1.7 0 00-.3 1.8v.1a1.7 1.7 0 001.5 1H21a2 2 0 010 4h-.2a1.7 1.7 0 00-1.5 1z"></path></svg></div>
                    <h3 class="font-bold text-slate-900 mb-2">Genset</h3>
                    <p class="text-sm text-slate-500">Klik untuk melihat persyaratan</p>
                </button>
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
            </div>

        </div>
    </section>

    <script>
        function showRequirements(type) {
            // Hide all sections
            document.querySelectorAll('.requirements-section').forEach(section => {
                section.classList.add('hidden');
            });
            
            // Show container
            document.getElementById('requirements-container').classList.remove('hidden');
            
            // Show selected section
            document.getElementById(type).classList.remove('hidden');
            
            // Scroll to requirements
            document.getElementById('requirements-container').scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    </script>

    <x-footer />
@endsection
