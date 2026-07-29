@extends('layouts.app')

@section('title', 'Standar Operasi Prosedur - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Header -->
    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-orange-500/20 text-orange-400 border border-orange-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md">
                Dokumen Mutu
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">
                {{ $konten->judul ?? 'STANDAR OPERASI PROSEDUR' }}
            </h1>
            <p class="text-slate-300 max-w-2xl mx-auto text-base md:text-lg">
                {{ $konten->subjudul ?? 'Seluruh SOP PT Pradana Nusa Energi disusun mengacu pada SNI ISO/IEC 17020:2012 dan peraturan ketenagalistrikan yang berlaku.' }}
            </p>
            @if(optional($konten)->url_dokumen)
                <div class="mt-6">
                    <a href="{{ optional($konten)->url_dokumen }}" target="_blank" class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white font-bold px-6 py-3 rounded-xl shadow-lg transition transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span>Unduh Dokumen Manual SOP Resmi (PDF)</span>
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Stats Bar -->
    <section class="bg-white border-b border-slate-200 reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-6 py-5 grid grid-cols-2 md:grid-cols-4 divide-x divide-slate-200">
            <div class="px-6 text-center">
                <div class="text-2xl font-extrabold text-blue-900">12</div>
                <div class="text-xs text-slate-500 font-medium mt-0.5">Total Dokumen SOP</div>
            </div>
            <div class="px-6 text-center">
                <div class="text-2xl font-extrabold text-blue-900">4</div>
                <div class="text-xs text-slate-500 font-medium mt-0.5">Kategori SOP</div>
            </div>
            <div class="px-6 text-center">
                <div class="text-2xl font-extrabold text-blue-900">ISO</div>
                <div class="text-xs text-slate-500 font-medium mt-0.5">17020:2012 Compliant</div>
            </div>
            <div class="px-6 text-center">
                <div class="text-2xl font-extrabold text-blue-900">2026</div>
                <div class="text-xs text-slate-500 font-medium mt-0.5">Revisi Terakhir</div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Filter & Search Row -->
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-10 reveal-on-scroll">
                <!-- Filter tabs -->
                <div class="flex flex-wrap gap-2">
                    <button onclick="filterSOP('semua')" id="btn-semua"
                        class="sop-filter-btn active-filter px-4 py-2 rounded-full text-sm font-semibold border transition-all">
                        Semua (12)
                    </button>
                    <button onclick="filterSOP('mutu')" id="btn-mutu"
                        class="sop-filter-btn px-4 py-2 rounded-full text-sm font-semibold border border-slate-200 text-slate-600 hover:border-blue-700 hover:text-blue-700 transition-all">
                        ?? Mutu & Manajemen
                    </button>
                    <button onclick="filterSOP('inspeksi')" id="btn-inspeksi"
                        class="sop-filter-btn px-4 py-2 rounded-full text-sm font-semibold border border-slate-200 text-slate-600 hover:border-orange-500 hover:text-orange-500 transition-all">
                        ?? Inspeksi Teknik
                    </button>
                    <button onclick="filterSOP('pelayanan')" id="btn-pelayanan"
                        class="sop-filter-btn px-4 py-2 rounded-full text-sm font-semibold border border-slate-200 text-slate-600 hover:border-teal-600 hover:text-teal-600 transition-all">
                        ?? Pelayanan
                    </button>
                    <button onclick="filterSOP('sdm')" id="btn-sdm"
                        class="sop-filter-btn px-4 py-2 rounded-full text-sm font-semibold border border-slate-200 text-slate-600 hover:border-purple-600 hover:text-purple-600 transition-all">
                        ?? SDM & Sarana
                    </button>
                </div>
                <!-- Search -->
                <div class="relative w-full md:w-64">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="text" id="sop-search" placeholder="Cari dokumen SOP..."
                        class="w-full pl-10 pr-4 py-2.5 rounded-full border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-900/30 focus:border-blue-900 bg-white transition-all"
                        oninput="cariSOP(this.value)">
                </div>
            </div>

            <!-- SOP List -->
            <div id="sop-list" class="space-y-4 reveal-on-scroll delay-100">

                <!-- ======== MUTU & MANAJEMEN ======== -->
                <div class="sop-item" data-kategori="mutu" data-nama="sop manual mutu iso">
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group">
                        <div class="flex items-stretch">
                            <!-- Color accent + icon -->
                            <div class="w-2 bg-blue-900 flex-shrink-0 rounded-l-2xl"></div>
                            <div class="flex-1 flex flex-col md:flex-row items-start md:items-center gap-4 p-5 md:p-6">
                                <!-- Icon -->
                                <div class="w-12 h-12 bg-blue-50 text-blue-900 rounded-xl flex items-center justify-center flex-shrink-0 text-xl font-bold shadow-sm">
                                    ??
                                </div>
                                <!-- Info -->
                                <div class="flex-1">
                                    <div class="flex flex-wrap items-center gap-2 mb-1">
                                        <span class="text-xs font-bold bg-blue-100 text-blue-800 border border-blue-200 px-2 py-0.5 rounded-full">Mutu & Manajemen</span>
                                        <span class="text-xs text-slate-400">SOP-MM-001</span>
                                    </div>
                                    <h3 class="font-extrabold text-slate-900 text-base group-hover:text-blue-900 transition-colors">SOP Manual Mutu</h3>
                                    <p class="text-xs text-slate-500 mt-0.5">Panduan sistem manajemen mutu berdasarkan standar SNI ISO/IEC 17020:2012 untuk seluruh kegiatan inspeksi.</p>
                                </div>
                                <!-- Meta & Action -->
                                <div class="flex flex-col items-end gap-3 flex-shrink-0">
                                    <span class="text-xs text-slate-400 whitespace-nowrap">Revisi: Jan 2026 � Rev.05</span>
                                    <a href="#" class="flex items-center gap-1.5 bg-blue-900 hover:bg-blue-800 text-white text-xs font-bold px-4 py-2 rounded-lg transition shadow-sm">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                                        </svg>
                                        Unduh PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ======== INSPEKSI ======== -->
                <div class="sop-item" data-kategori="inspeksi" data-nama="sop pemeriksaan pengujian inspeksi laik operasi plts">
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group">
                        <div class="flex items-stretch">
                            <div class="w-2 bg-orange-500 flex-shrink-0 rounded-l-2xl"></div>
                            <div class="flex-1 flex flex-col md:flex-row items-start md:items-center gap-4 p-5 md:p-6">
                                <div class="w-12 h-12 bg-orange-50 text-orange-600 rounded-xl flex items-center justify-center flex-shrink-0 text-xl font-bold shadow-sm">
                                    ??
                                </div>
                                <div class="flex-1">
                                    <div class="flex flex-wrap items-center gap-2 mb-1">
                                        <span class="text-xs font-bold bg-orange-100 text-orange-700 border border-orange-200 px-2 py-0.5 rounded-full">Inspeksi Teknik</span>
                                        <span class="text-xs text-slate-400">SOP-INS-001</span>
                                    </div>
                                    <h3 class="font-extrabold text-slate-900 text-base group-hover:text-orange-600 transition-colors">SOP Pemeriksaan & Pengujian Laik Operasi PLTS</h3>
                                    <p class="text-xs text-slate-500 mt-0.5">Prosedur inspeksi dan pengujian instalasi Pembangkit Listrik Tenaga Surya untuk penerbitan SLO.</p>
                                </div>
                                <div class="flex flex-col items-end gap-3 flex-shrink-0">
                                    <span class="text-xs text-slate-400 whitespace-nowrap">Revisi: Feb 2026 � Rev.03</span>
                                    <a href="#" class="flex items-center gap-1.5 bg-orange-500 hover:bg-orange-600 text-white text-xs font-bold px-4 py-2 rounded-lg transition shadow-sm">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                                        </svg>
                                        Unduh PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sop-item" data-kategori="inspeksi" data-nama="sop pemeriksaan sutm saluran udara tegangan menengah">
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group">
                        <div class="flex items-stretch">
                            <div class="w-2 bg-orange-500 flex-shrink-0 rounded-l-2xl"></div>
                            <div class="flex-1 flex flex-col md:flex-row items-start md:items-center gap-4 p-5 md:p-6">
                                <div class="w-12 h-12 bg-orange-50 text-orange-600 rounded-xl flex items-center justify-center flex-shrink-0 text-xl font-bold shadow-sm">
                                    ?
                                </div>
                                <div class="flex-1">
                                    <div class="flex flex-wrap items-center gap-2 mb-1">
                                        <span class="text-xs font-bold bg-orange-100 text-orange-700 border border-orange-200 px-2 py-0.5 rounded-full">Inspeksi Teknik</span>
                                        <span class="text-xs text-slate-400">SOP-INS-002</span>
                                    </div>
                                    <h3 class="font-extrabold text-slate-900 text-base group-hover:text-orange-600 transition-colors">SOP Pemeriksaan SUTM</h3>
                                    <p class="text-xs text-slate-500 mt-0.5">Prosedur pemeriksaan Saluran Udara Tegangan Menengah (SUTM) sesuai standar PLN & PUIL.</p>
                                </div>
                                <div class="flex flex-col items-end gap-3 flex-shrink-0">
                                    <span class="text-xs text-slate-400 whitespace-nowrap">Revisi: Jan 2026 � Rev.04</span>
                                    <a href="#" class="flex items-center gap-1.5 bg-orange-500 hover:bg-orange-600 text-white text-xs font-bold px-4 py-2 rounded-lg transition shadow-sm">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                                        </svg>
                                        Unduh PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sop-item" data-kategori="inspeksi" data-nama="sop pemeriksaan sktm saluran kabel tegangan menengah">
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group">
                        <div class="flex items-stretch">
                            <div class="w-2 bg-orange-500 flex-shrink-0 rounded-l-2xl"></div>
                            <div class="flex-1 flex flex-col md:flex-row items-start md:items-center gap-4 p-5 md:p-6">
                                <div class="w-12 h-12 bg-orange-50 text-orange-600 rounded-xl flex items-center justify-center flex-shrink-0 text-xl font-bold shadow-sm">
                                    ??
                                </div>
                                <div class="flex-1">
                                    <div class="flex flex-wrap items-center gap-2 mb-1">
                                        <span class="text-xs font-bold bg-orange-100 text-orange-700 border border-orange-200 px-2 py-0.5 rounded-full">Inspeksi Teknik</span>
                                        <span class="text-xs text-slate-400">SOP-INS-003</span>
                                    </div>
                                    <h3 class="font-extrabold text-slate-900 text-base group-hover:text-orange-600 transition-colors">SOP Pemeriksaan SKTM</h3>
                                    <p class="text-xs text-slate-500 mt-0.5">Prosedur pemeriksaan Saluran Kabel Tegangan Menengah (SKTM) bawah tanah dan kabel laut.</p>
                                </div>
                                <div class="flex flex-col items-end gap-3 flex-shrink-0">
                                    <span class="text-xs text-slate-400 whitespace-nowrap">Revisi: Mar 2026 � Rev.02</span>
                                    <a href="#" class="flex items-center gap-1.5 bg-orange-500 hover:bg-orange-600 text-white text-xs font-bold px-4 py-2 rounded-lg transition shadow-sm">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                                        </svg>
                                        Unduh PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sop-item" data-kategori="inspeksi" data-nama="sop inspeksi gardu distribusi pasangan luar">
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group">
                        <div class="flex items-stretch">
                            <div class="w-2 bg-orange-500 flex-shrink-0 rounded-l-2xl"></div>
                            <div class="flex-1 flex flex-col md:flex-row items-start md:items-center gap-4 p-5 md:p-6">
                                <div class="w-12 h-12 bg-orange-50 text-orange-600 rounded-xl flex items-center justify-center flex-shrink-0 text-xl font-bold shadow-sm">
                                    ???
                                </div>
                                <div class="flex-1">
                                    <div class="flex flex-wrap items-center gap-2 mb-1">
                                        <span class="text-xs font-bold bg-orange-100 text-orange-700 border border-orange-200 px-2 py-0.5 rounded-full">Inspeksi Teknik</span>
                                        <span class="text-xs text-slate-400">SOP-INS-004</span>
                                    </div>
                                    <h3 class="font-extrabold text-slate-900 text-base group-hover:text-orange-600 transition-colors">SOP Inspeksi Gardu Distribusi Pasangan Luar</h3>
                                    <p class="text-xs text-slate-500 mt-0.5">Prosedur inspeksi gardu distribusi tipe pasangan luar (outdoor) sesuai standar PLN P.85.</p>
                                </div>
                                <div class="flex flex-col items-end gap-3 flex-shrink-0">
                                    <span class="text-xs text-slate-400 whitespace-nowrap">Revisi: Feb 2026 � Rev.03</span>
                                    <a href="#" class="flex items-center gap-1.5 bg-orange-500 hover:bg-orange-600 text-white text-xs font-bold px-4 py-2 rounded-lg transition shadow-sm">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                                        </svg>
                                        Unduh PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sop-item" data-kategori="inspeksi" data-nama="sop inspeksi gardu distribusi pasangan dalam">
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group">
                        <div class="flex items-stretch">
                            <div class="w-2 bg-orange-500 flex-shrink-0 rounded-l-2xl"></div>
                            <div class="flex-1 flex flex-col md:flex-row items-start md:items-center gap-4 p-5 md:p-6">
                                <div class="w-12 h-12 bg-orange-50 text-orange-600 rounded-xl flex items-center justify-center flex-shrink-0 text-xl font-bold shadow-sm">
                                    ??
                                </div>
                                <div class="flex-1">
                                    <div class="flex flex-wrap items-center gap-2 mb-1">
                                        <span class="text-xs font-bold bg-orange-100 text-orange-700 border border-orange-200 px-2 py-0.5 rounded-full">Inspeksi Teknik</span>
                                        <span class="text-xs text-slate-400">SOP-INS-005</span>
                                    </div>
                                    <h3 class="font-extrabold text-slate-900 text-base group-hover:text-orange-600 transition-colors">SOP Inspeksi Gardu Distribusi Pasangan Dalam</h3>
                                    <p class="text-xs text-slate-500 mt-0.5">Prosedur inspeksi gardu distribusi tipe pasangan dalam (indoor) untuk kawasan industri & gedung.</p>
                                </div>
                                <div class="flex flex-col items-end gap-3 flex-shrink-0">
                                    <span class="text-xs text-slate-400 whitespace-nowrap">Revisi: Feb 2026 � Rev.03</span>
                                    <a href="#" class="flex items-center gap-1.5 bg-orange-500 hover:bg-orange-600 text-white text-xs font-bold px-4 py-2 rounded-lg transition shadow-sm">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                                        </svg>
                                        Unduh PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ======== PELAYANAN ======== -->
                <div class="sop-item" data-kategori="pelayanan" data-nama="sop pengurusan slo tm tegangan menengah">
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group">
                        <div class="flex items-stretch">
                            <div class="w-2 bg-teal-600 flex-shrink-0 rounded-l-2xl"></div>
                            <div class="flex-1 flex flex-col md:flex-row items-start md:items-center gap-4 p-5 md:p-6">
                                <div class="w-12 h-12 bg-teal-50 text-teal-700 rounded-xl flex items-center justify-center flex-shrink-0 text-xl font-bold shadow-sm">
                                    ??
                                </div>
                                <div class="flex-1">
                                    <div class="flex flex-wrap items-center gap-2 mb-1">
                                        <span class="text-xs font-bold bg-teal-100 text-teal-800 border border-teal-200 px-2 py-0.5 rounded-full">Pelayanan</span>
                                        <span class="text-xs text-slate-400">SOP-PLY-001</span>
                                    </div>
                                    <h3 class="font-extrabold text-slate-900 text-base group-hover:text-teal-700 transition-colors">SOP Pengurusan SLO Tegangan Menengah (TM)</h3>
                                    <p class="text-xs text-slate-500 mt-0.5">Alur proses pengajuan, pemeriksaan, hingga penerbitan Sertifikat Laik Operasi tegangan menengah.</p>
                                </div>
                                <div class="flex flex-col items-end gap-3 flex-shrink-0">
                                    <span class="text-xs text-slate-400 whitespace-nowrap">Revisi: Apr 2026 � Rev.06</span>
                                    <a href="#" class="flex items-center gap-1.5 bg-teal-600 hover:bg-teal-700 text-white text-xs font-bold px-4 py-2 rounded-lg transition shadow-sm">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                                        </svg>
                                        Unduh PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sop-item" data-kategori="pelayanan" data-nama="sop standar pelayanan">
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group">
                        <div class="flex items-stretch">
                            <div class="w-2 bg-teal-600 flex-shrink-0 rounded-l-2xl"></div>
                            <div class="flex-1 flex flex-col md:flex-row items-start md:items-center gap-4 p-5 md:p-6">
                                <div class="w-12 h-12 bg-teal-50 text-teal-700 rounded-xl flex items-center justify-center flex-shrink-0 text-xl font-bold shadow-sm">
                                    ??
                                </div>
                                <div class="flex-1">
                                    <div class="flex flex-wrap items-center gap-2 mb-1">
                                        <span class="text-xs font-bold bg-teal-100 text-teal-800 border border-teal-200 px-2 py-0.5 rounded-full">Pelayanan</span>
                                        <span class="text-xs text-slate-400">SOP-PLY-002</span>
                                    </div>
                                    <h3 class="font-extrabold text-slate-900 text-base group-hover:text-teal-700 transition-colors">SOP Standar Pelayanan</h3>
                                    <p class="text-xs text-slate-500 mt-0.5">Standar layanan kepada pemohon SLO mencakup waktu respons, etika komunikasi, dan penanganan permintaan.</p>
                                </div>
                                <div class="flex flex-col items-end gap-3 flex-shrink-0">
                                    <span class="text-xs text-slate-400 whitespace-nowrap">Revisi: Jan 2026 � Rev.04</span>
                                    <a href="#" class="flex items-center gap-1.5 bg-teal-600 hover:bg-teal-700 text-white text-xs font-bold px-4 py-2 rounded-lg transition shadow-sm">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                                        </svg>
                                        Unduh PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sop-item" data-kategori="pelayanan" data-nama="sop pelayanan sarana dan prasarana">
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group">
                        <div class="flex items-stretch">
                            <div class="w-2 bg-teal-600 flex-shrink-0 rounded-l-2xl"></div>
                            <div class="flex-1 flex flex-col md:flex-row items-start md:items-center gap-4 p-5 md:p-6">
                                <div class="w-12 h-12 bg-teal-50 text-teal-700 rounded-xl flex items-center justify-center flex-shrink-0 text-xl font-bold shadow-sm">
                                    ???
                                </div>
                                <div class="flex-1">
                                    <div class="flex flex-wrap items-center gap-2 mb-1">
                                        <span class="text-xs font-bold bg-teal-100 text-teal-800 border border-teal-200 px-2 py-0.5 rounded-full">Pelayanan</span>
                                        <span class="text-xs text-slate-400">SOP-PLY-003</span>
                                    </div>
                                    <h3 class="font-extrabold text-slate-900 text-base group-hover:text-teal-700 transition-colors">SOP Pelayanan Sarana & Prasarana</h3>
                                    <p class="text-xs text-slate-500 mt-0.5">Prosedur pengelolaan dan pemeliharaan fasilitas, ruang kerja, dan sarana pendukung operasional.</p>
                                </div>
                                <div class="flex flex-col items-end gap-3 flex-shrink-0">
                                    <span class="text-xs text-slate-400 whitespace-nowrap">Revisi: Mar 2026 � Rev.02</span>
                                    <a href="#" class="flex items-center gap-1.5 bg-teal-600 hover:bg-teal-700 text-white text-xs font-bold px-4 py-2 rounded-lg transition shadow-sm">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                                        </svg>
                                        Unduh PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sop-item" data-kategori="pelayanan" data-nama="sop keluhan dan banding">
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group">
                        <div class="flex items-stretch">
                            <div class="w-2 bg-teal-600 flex-shrink-0 rounded-l-2xl"></div>
                            <div class="flex-1 flex flex-col md:flex-row items-start md:items-center gap-4 p-5 md:p-6">
                                <div class="w-12 h-12 bg-teal-50 text-teal-700 rounded-xl flex items-center justify-center flex-shrink-0 text-xl font-bold shadow-sm">
                                    ??
                                </div>
                                <div class="flex-1">
                                    <div class="flex flex-wrap items-center gap-2 mb-1">
                                        <span class="text-xs font-bold bg-teal-100 text-teal-800 border border-teal-200 px-2 py-0.5 rounded-full">Pelayanan</span>
                                        <span class="text-xs text-slate-400">SOP-PLY-004</span>
                                    </div>
                                    <h3 class="font-extrabold text-slate-900 text-base group-hover:text-teal-700 transition-colors">SOP Keluhan & Banding</h3>
                                    <p class="text-xs text-slate-500 mt-0.5">Mekanisme penerimaan, penanganan, dan tindak lanjut atas keluhan dan banding dari pemohon atau pelanggan.</p>
                                </div>
                                <div class="flex flex-col items-end gap-3 flex-shrink-0">
                                    <span class="text-xs text-slate-400 whitespace-nowrap">Revisi: Jan 2026 � Rev.03</span>
                                    <a href="#" class="flex items-center gap-1.5 bg-teal-600 hover:bg-teal-700 text-white text-xs font-bold px-4 py-2 rounded-lg transition shadow-sm">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                                        </svg>
                                        Unduh PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ======== SDM ======== -->
                <div class="sop-item" data-kategori="sdm" data-nama="sop kalibrasi peralatan">
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group">
                        <div class="flex items-stretch">
                            <div class="w-2 bg-purple-600 flex-shrink-0 rounded-l-2xl"></div>
                            <div class="flex-1 flex flex-col md:flex-row items-start md:items-center gap-4 p-5 md:p-6">
                                <div class="w-12 h-12 bg-purple-50 text-purple-700 rounded-xl flex items-center justify-center flex-shrink-0 text-xl font-bold shadow-sm">
                                    ??
                                </div>
                                <div class="flex-1">
                                    <div class="flex flex-wrap items-center gap-2 mb-1">
                                        <span class="text-xs font-bold bg-purple-100 text-purple-800 border border-purple-200 px-2 py-0.5 rounded-full">SDM & Sarana</span>
                                        <span class="text-xs text-slate-400">SOP-SDM-001</span>
                                    </div>
                                    <h3 class="font-extrabold text-slate-900 text-base group-hover:text-purple-700 transition-colors">SOP Kalibrasi Peralatan</h3>
                                    <p class="text-xs text-slate-500 mt-0.5">Prosedur kalibrasi berkala seluruh instrumen ukur dan uji untuk menjamin akurasi dan ketertelusuran hasil.</p>
                                </div>
                                <div class="flex flex-col items-end gap-3 flex-shrink-0">
                                    <span class="text-xs text-slate-400 whitespace-nowrap">Revisi: Apr 2026 � Rev.04</span>
                                    <a href="#" class="flex items-center gap-1.5 bg-purple-600 hover:bg-purple-700 text-white text-xs font-bold px-4 py-2 rounded-lg transition shadow-sm">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                                        </svg>
                                        Unduh PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sop-item" data-kategori="sdm" data-nama="sop pengelolaan sdm sumber daya manusia">
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group">
                        <div class="flex items-stretch">
                            <div class="w-2 bg-purple-600 flex-shrink-0 rounded-l-2xl"></div>
                            <div class="flex-1 flex flex-col md:flex-row items-start md:items-center gap-4 p-5 md:p-6">
                                <div class="w-12 h-12 bg-purple-50 text-purple-700 rounded-xl flex items-center justify-center flex-shrink-0 text-xl font-bold shadow-sm">
                                    ??
                                </div>
                                <div class="flex-1">
                                    <div class="flex flex-wrap items-center gap-2 mb-1">
                                        <span class="text-xs font-bold bg-purple-100 text-purple-800 border border-purple-200 px-2 py-0.5 rounded-full">SDM & Sarana</span>
                                        <span class="text-xs text-slate-400">SOP-SDM-002</span>
                                    </div>
                                    <h3 class="font-extrabold text-slate-900 text-base group-hover:text-purple-700 transition-colors">SOP Pengelolaan SDM</h3>
                                    <p class="text-xs text-slate-500 mt-0.5">Prosedur rekrutmen, pelatihan, evaluasi kompetensi, dan pengembangan tenaga teknik perusahaan.</p>
                                </div>
                                <div class="flex flex-col items-end gap-3 flex-shrink-0">
                                    <span class="text-xs text-slate-400 whitespace-nowrap">Revisi: Feb 2026 � Rev.03</span>
                                    <a href="#" class="flex items-center gap-1.5 bg-purple-600 hover:bg-purple-700 text-white text-xs font-bold px-4 py-2 rounded-lg transition shadow-sm">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                                        </svg>
                                        Unduh PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Empty state -->
                <div id="sop-empty" class="hidden text-center py-20">
                    <div class="text-5xl mb-4">??</div>
                    <h3 class="font-bold text-slate-700 mb-1">Dokumen tidak ditemukan</h3>
                    <p class="text-sm text-slate-400">Coba kata kunci lain atau pilih kategori yang berbeda.</p>
                </div>

            </div><!-- end list -->

        </div>
    </section>

    <!-- CTA Bottom -->
    <section class="py-14 bg-white reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-gradient-to-r from-blue-900 to-slate-900 rounded-3xl p-8 md:p-10 flex flex-col md:flex-row items-center gap-8 text-white">
                <div class="w-16 h-16 bg-orange-500 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg text-3xl">
                    ??
                </div>
                <div class="flex-1 text-center md:text-left">
                    <h3 class="text-xl font-extrabold mb-2">Butuh Dokumen SOP Spesifik?</h3>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        Jika Anda memerlukan dokumen SOP tertentu yang tidak tercantum, silakan hubungi kami langsung. Tim kami siap membantu.
                    </p>
                </div>
                <a href="{{ route('home') }}" class="bg-orange-500 hover:bg-orange-600 text-white font-bold px-6 py-3 rounded-xl transition shadow-lg flex-shrink-0 text-sm whitespace-nowrap">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

    <x-footer />

    <style>
        .active-filter {
            background-color: #1e3a5f;
            color: #fff;
            border-color: #1e3a5f;
        }
        .sop-item {
            transition: all 0.25s ease;
        }
    </style>

    <script>
        let currentKategori = 'semua';
        let currentSearch = '';

        function filterSOP(kategori) {
            currentKategori = kategori;
            const btns = document.querySelectorAll('.sop-filter-btn');
            btns.forEach(b => {
                b.classList.remove('active-filter');
                b.classList.add('border-slate-200', 'text-slate-600');
            });
            const activeBtn = document.getElementById('btn-' + kategori);
            activeBtn.classList.add('active-filter');
            activeBtn.classList.remove('border-slate-200', 'text-slate-600');
            applyFilter();
        }

        function cariSOP(q) {
            currentSearch = q.toLowerCase().trim();
            applyFilter();
        }

        function applyFilter() {
            const items = document.querySelectorAll('.sop-item');
            let visibleCount = 0;
            items.forEach(item => {
                const matchKategori = currentKategori === 'semua' || item.dataset.kategori === currentKategori;
                const matchSearch = currentSearch === '' || item.dataset.nama.includes(currentSearch);
                if (matchKategori && matchSearch) {
                    item.style.display = '';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });
            document.getElementById('sop-empty').classList.toggle('hidden', visibleCount > 0);
        }
    </script>
@endsection


