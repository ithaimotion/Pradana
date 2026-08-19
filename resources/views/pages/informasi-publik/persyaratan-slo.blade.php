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
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                    <!-- SLO IPTL TM -->
                    <button onclick="showRequirements('iptl-tm')" id="btn-iptl-tm"
                        class="slo-btn group relative w-full overflow-hidden bg-gradient-to-br from-blue-600 to-blue-800 hover:from-blue-500 hover:to-blue-700 text-white font-bold text-xs md:text-sm tracking-wide uppercase px-5 py-6 rounded-2xl shadow-lg hover:shadow-blue-500/30 transition-all duration-300 text-center leading-snug flex flex-col items-center justify-center gap-2">
                        <span class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center mb-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </span>
                        PERSYARATAN DOKUMEN<br><span class="text-blue-200">SLO IPTL TM</span><br>PT PRADANA NUSA ENERGI
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-white/30 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </button>

                    <!-- SLO Distribusi -->
                    <button onclick="showRequirements('distribusi')" id="btn-distribusi"
                        class="slo-btn group relative w-full overflow-hidden bg-gradient-to-br from-blue-600 to-blue-800 hover:from-blue-500 hover:to-blue-700 text-white font-bold text-xs md:text-sm tracking-wide uppercase px-5 py-6 rounded-2xl shadow-lg hover:shadow-blue-500/30 transition-all duration-300 text-center leading-snug flex flex-col items-center justify-center gap-2">
                        <span class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center mb-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 20h16M6 20V8m6 12V4m6 16v-8"/></svg>
                        </span>
                        PERSYARATAN DOKUMEN<br><span class="text-blue-200">SLO DISTRIBUSI</span><br>PT PRADANA NUSA ENERGI
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-white/30 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </button>

                    <!-- SLO PLTD -->
                    <button onclick="showRequirements('pltd')" id="btn-pltd"
                        class="slo-btn group relative w-full overflow-hidden bg-gradient-to-br from-blue-600 to-blue-800 hover:from-blue-500 hover:to-blue-700 text-white font-bold text-xs md:text-sm tracking-wide uppercase px-5 py-6 rounded-2xl shadow-lg hover:shadow-blue-500/30 transition-all duration-300 text-center leading-snug flex flex-col items-center justify-center gap-2">
                        <span class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center mb-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3v2m0 14v2m9-9h-2M5 12H3m9-6l-1.4-1.4M16.4 7.6L15 6.2m0 11.8l1.4 1.4M7.6 16.4L6.2 15m8.8-8.8l1.4-1.4M7.6 7.6L6.2 6.2"/></svg>
                        </span>
                        PERSYARATAN DOKUMEN<br><span class="text-blue-200">SLO PLTD</span><br>PT PRADANA NUSA ENERGI
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-white/30 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </button>

                    <!-- SLO PLTS -->
                    <button onclick="showRequirements('plts')" id="btn-plts"
                        class="slo-btn group relative w-full overflow-hidden bg-gradient-to-br from-blue-600 to-blue-800 hover:from-blue-500 hover:to-blue-700 text-white font-bold text-xs md:text-sm tracking-wide uppercase px-5 py-6 rounded-2xl shadow-lg hover:shadow-blue-500/30 transition-all duration-300 text-center leading-snug flex flex-col items-center justify-center gap-2">
                        <span class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center mb-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18"/></svg>
                        </span>
                        PERSYARATAN DOKUMEN<br><span class="text-blue-200">SLO PLTS</span><br>PT PRADANA NUSA ENERGI
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-white/30 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </button>
                </div>
            </div>

            

            <!-- Requirements Sections -->
            <div id="requirements-container" class="hidden">
                <!-- IPTL TM -->
                <div id="iptl-tm" class="requirements-section hidden">
                    <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm mb-8">
                        <div class="flex items-center gap-4 mb-6 pb-6 border-b border-slate-100">
                            <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-900"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg></div>
                            <h2 class="text-2xl font-extrabold text-slate-900">Persyaratan SLO IPTL TM</h2>
                        </div>
                        <div class="grid md:grid-cols-2 gap-8">
                            <div>
                                <h3 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                                    <span class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 text-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-4.414-4.414A1 1 0 0014 4H7a2 2 0 00-2 2v13a2 2 0 002 2z"></path></svg></span>
                                    Persyaratan Administrasi
                                </h3>
                                <ul class="space-y-3">
                                    @if($persyaratan && $persyaratan->iptl_tm_admin)
                                        @foreach($persyaratan->iptl_tm_admin as $item)
                                            <li class="flex items-start gap-2 text-sm text-slate-600">
                                                <span class="text-blue-500">•</span>
                                                {{ $item }}
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="flex items-start gap-2 text-sm text-slate-600"><span class="text-blue-500">•</span> KTP Pemilik / Penanggung Jawab</li>
                                        <li class="flex items-start gap-2 text-sm text-slate-600"><span class="text-blue-500">•</span> NIB Perusahaan</li>
                                        <li class="flex items-start gap-2 text-sm text-slate-600"><span class="text-blue-500">•</span> NPWP Perusahaan</li>
                                    @endif
                                </ul>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                                    <span class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center text-blue-700 text-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"></circle><path stroke-linecap="round" stroke-linejoin="round" d="M19.4 15a1.7 1.7 0 00.3 1.8l.1.1a2 2 0 01-2.8 2.8l-.1-.1a1.7 1.7 0 00-1.8-.3 1.7 1.7 0 00-1 1.5V21a2 2 0 01-4 0v-.2a1.7 1.7 0 00-1-1.5 1.7 1.7 0 00-1.8.3l-.1.1a2 2 0 01-2.8-2.8l.1-.1a1.7 1.7 0 00.3-1.8 1.7 1.7 0 00-1.5-1H3a2 2 0 010-4h.2a1.7 1.7 0 001.5-1 1.7 1.7 0 00-.3-1.8l-.1-.1a2 2 0 012.8-2.8l.1.1a1.7 1.7 0 001.8.3h.1a1.7 1.7 0 001-1.5V3a2 2 0 014 0v.2a1.7 1.7 0 001 1.5h.1a1.7 1.7 0 001.8-.3l.1-.1a2 2 0 012.8 2.8l-.1.1a1.7 1.7 0 00-.3 1.8v.1a1.7 1.7 0 001.5 1H21a2 2 0 010 4h-.2a1.7 1.7 0 00-1.5 1z"></path></svg></span>
                                    Persyaratan Teknis
                                </h3>
                                <ul class="space-y-3">
                                    @if($persyaratan && $persyaratan->iptl_tm_teknis)
                                        @foreach($persyaratan->iptl_tm_teknis as $item)
                                            <li class="flex items-start gap-2 text-sm text-slate-600">
                                                <span class="text-blue-600">•</span>
                                                {{ $item }}
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="flex items-start gap-2 text-sm text-slate-600"><span class="text-blue-600">•</span> Single Line Diagram</li>
                                        <li class="flex items-start gap-2 text-sm text-slate-600"><span class="text-blue-600">•</span> Nomor Identitas Data Instalasi (NIDI)</li>
                                        <li class="flex items-start gap-2 text-sm text-slate-600"><span class="text-blue-600">•</span> Hasil Test Report</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Distribusi -->
                <div id="distribusi" class="requirements-section hidden">
                    <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm mb-8">
                        <div class="flex items-center gap-4 mb-6 pb-6 border-b border-slate-100">
                            <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-900"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 20h16M6 20V8m6 12V4m6 16v-8"></path></svg></div>
                            <h2 class="text-2xl font-extrabold text-slate-900">Persyaratan SLO Distribusi</h2>
                        </div>
                        <div class="grid md:grid-cols-2 gap-8">
                            <div>
                                <h3 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                                    <span class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 text-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-4.414-4.414A1 1 0 0014 4H7a2 2 0 00-2 2v13a2 2 0 002 2z"></path></svg></span>
                                    Persyaratan Administrasi
                                </h3>
                                <ul class="space-y-3">
                                    @if($persyaratan && $persyaratan->distribusi_admin)
                                        @foreach($persyaratan->distribusi_admin as $item)
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
                                    @endif
                                </ul>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                                    <span class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center text-blue-700 text-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"></circle><path stroke-linecap="round" stroke-linejoin="round" d="M19.4 15a1.7 1.7 0 00.3 1.8l.1.1a2 2 0 01-2.8 2.8l-.1-.1a1.7 1.7 0 00-1.8-.3 1.7 1.7 0 00-1 1.5V21a2 2 0 01-4 0v-.2a1.7 1.7 0 00-1-1.5 1.7 1.7 0 00-1.8.3l-.1.1a2 2 0 01-2.8-2.8l.1-.1a1.7 1.7 0 00.3-1.8 1.7 1.7 0 00-1.5-1H3a2 2 0 010-4h.2a1.7 1.7 0 001.5-1 1.7 1.7 0 00-.3-1.8l-.1-.1a2 2 0 012.8-2.8l.1.1a1.7 1.7 0 001.8.3h.1a1.7 1.7 0 001-1.5V3a2 2 0 014 0v.2a1.7 1.7 0 001 1.5h.1a1.7 1.7 0 001.8-.3l.1-.1a2 2 0 012.8 2.8l-.1.1a1.7 1.7 0 00-.3 1.8v.1a1.7 1.7 0 001.5 1H21a2 2 0 010 4h-.2a1.7 1.7 0 00-1.5 1z"></path></svg></span>
                                    Persyaratan Teknis
                                </h3>
                                <ul class="space-y-3">
                                    @if($persyaratan && $persyaratan->distribusi_teknis)
                                        @foreach($persyaratan->distribusi_teknis as $item)
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
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PLTD -->
                <div id="pltd" class="requirements-section hidden">
                    <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm mb-8">
                        <div class="flex items-center gap-4 mb-6 pb-6 border-b border-slate-100">
                            <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-900"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"></circle><path stroke-linecap="round" stroke-linejoin="round" d="M19.4 15a1.7 1.7 0 00.3 1.8l.1.1a2 2 0 01-2.8 2.8l-.1-.1a1.7 1.7 0 00-1.8-.3 1.7 1.7 0 00-1 1.5V21a2 2 0 01-4 0v-.2a1.7 1.7 0 00-1-1.5 1.7 1.7 0 00-1.8.3l-.1.1a2 2 0 01-2.8-2.8l.1-.1a1.7 1.7 0 00.3-1.8 1.7 1.7 0 00-1.5-1H3a2 2 0 010-4h.2a1.7 1.7 0 001.5-1 1.7 1.7 0 00-.3-1.8l-.1-.1a2 2 0 012.8-2.8l.1.1a1.7 1.7 0 001.8.3h.1a1.7 1.7 0 001-1.5V3a2 2 0 014 0v.2a1.7 1.7 0 001 1.5h.1a1.7 1.7 0 001.8-.3l.1-.1a2 2 0 012.8 2.8l-.1.1a1.7 1.7 0 00-.3 1.8v.1a1.7 1.7 0 001.5 1H21a2 2 0 010 4h-.2a1.7 1.7 0 00-1.5 1z"></path></svg></div>
                            <h2 class="text-2xl font-extrabold text-slate-900">Persyaratan SLO PLTD</h2>
                        </div>
                        <div class="grid md:grid-cols-2 gap-8">
                            <div>
                                <h3 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                                    <span class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 text-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-4.414-4.414A1 1 0 0014 4H7a2 2 0 00-2 2v13a2 2 0 002 2z"></path></svg></span>
                                    Persyaratan Administrasi
                                </h3>
                                <ul class="space-y-3">
                                    @if($persyaratan && $persyaratan->pltd_admin)
                                        @foreach($persyaratan->pltd_admin as $item)
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
                                    @endif
                                </ul>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                                    <span class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center text-blue-700 text-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"></circle><path stroke-linecap="round" stroke-linejoin="round" d="M19.4 15a1.7 1.7 0 00.3 1.8l.1.1a2 2 0 01-2.8 2.8l-.1-.1a1.7 1.7 0 00-1.8-.3 1.7 1.7 0 00-1 1.5V21a2 2 0 01-4 0v-.2a1.7 1.7 0 00-1-1.5 1.7 1.7 0 00-1.8.3l-.1.1a2 2 0 01-2.8-2.8l.1-.1a1.7 1.7 0 00.3-1.8 1.7 1.7 0 00-1.5-1H3a2 2 0 010-4h.2a1.7 1.7 0 001.5-1 1.7 1.7 0 00-.3-1.8l-.1-.1a2 2 0 012.8-2.8l.1.1a1.7 1.7 0 001.8.3h.1a1.7 1.7 0 001-1.5V3a2 2 0 014 0v.2a1.7 1.7 0 001 1.5h.1a1.7 1.7 0 001.8-.3l.1-.1a2 2 0 012.8 2.8l-.1.1a1.7 1.7 0 00-.3 1.8v.1a1.7 1.7 0 001.5 1H21a2 2 0 010 4h-.2a1.7 1.7 0 00-1.5 1z"></path></svg></span>
                                    Persyaratan Teknis
                                </h3>
                                <ul class="space-y-3">
                                    @if($persyaratan && $persyaratan->pltd_teknis)
                                        @foreach($persyaratan->pltd_teknis as $item)
                                            <li class="flex items-start gap-2 text-sm text-slate-600">
                                                <span class="text-blue-600">•</span>
                                                {{ $item }}
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="flex items-start gap-2 text-sm text-slate-600">
                                            <span class="text-blue-600">•</span>
                                            Gambar instalasi PLTD
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
                            <h2 class="text-2xl font-extrabold text-slate-900">Persyaratan SLO PLTS</h2>
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
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>                  </div>
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
