@extends('layouts.app')

@section('title', 'Bidang Layanan SLO - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Header -->
    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-orange-500/20 text-orange-400 border border-orange-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md">
                Layanan Inspeksi & Sertifikasi
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">
                BIDANG LAYANAN
            </h1>
            <p class="text-slate-300 max-w-2xl mx-auto text-base md:text-lg">
                PT Pradana Nusa Energi melayani inspeksi teknik dan penerbitan Sertifikat Laik Operasi (SLO) untuk berbagai jenis instalasi tenaga listrik.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Tegangan Rendah -->
            <div class="mb-14 reveal-on-scroll">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-green-600 rounded-xl flex items-center justify-center shadow-md flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-extrabold text-slate-900">Instalasi Tegangan Rendah (TR)</h2>
                        <p class="text-xs text-slate-500">Tegangan ≤ 1.000 Volt AC / 1.500 Volt DC</p>
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">

                    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                        <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center mb-4 text-2xl">🏠</div>
                        <h3 class="font-extrabold text-slate-900 mb-2 group-hover:text-green-700 transition-colors">Rumah Tinggal</h3>
                        <p class="text-xs text-slate-500 leading-relaxed mb-3">Inspeksi instalasi listrik rumah tinggal baru, renovasi, dan penambahan daya untuk mendapatkan SLO.</p>
                        <div class="flex flex-wrap gap-1.5">
                            <span class="text-xs bg-green-50 text-green-700 border border-green-200 px-2 py-0.5 rounded-full font-medium">450 VA</span>
                            <span class="text-xs bg-green-50 text-green-700 border border-green-200 px-2 py-0.5 rounded-full font-medium">900 VA</span>
                            <span class="text-xs bg-green-50 text-green-700 border border-green-200 px-2 py-0.5 rounded-full font-medium">1.300 VA</span>
                            <span class="text-xs bg-green-50 text-green-700 border border-green-200 px-2 py-0.5 rounded-full font-medium">2.200 VA+</span>
                        </div>
                    </div>

                    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                        <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center mb-4 text-2xl">🏢</div>
                        <h3 class="font-extrabold text-slate-900 mb-2 group-hover:text-green-700 transition-colors">Gedung Komersial</h3>
                        <p class="text-xs text-slate-500 leading-relaxed mb-3">Inspeksi instalasi listrik gedung perkantoran, pusat perbelanjaan, hotel, dan bangunan komersial lainnya.</p>
                        <div class="flex flex-wrap gap-1.5">
                            <span class="text-xs bg-green-50 text-green-700 border border-green-200 px-2 py-0.5 rounded-full font-medium">Perkantoran</span>
                            <span class="text-xs bg-green-50 text-green-700 border border-green-200 px-2 py-0.5 rounded-full font-medium">Mall</span>
                            <span class="text-xs bg-green-50 text-green-700 border border-green-200 px-2 py-0.5 rounded-full font-medium">Hotel</span>
                        </div>
                    </div>

                    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                        <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center mb-4 text-2xl">🏭</div>
                        <h3 class="font-extrabold text-slate-900 mb-2 group-hover:text-green-700 transition-colors">Kawasan Industri (TR)</h3>
                        <p class="text-xs text-slate-500 leading-relaxed mb-3">Inspeksi instalasi pemanfaatan tegangan rendah pada pabrik, gudang, dan area produksi industri ringan.</p>
                        <div class="flex flex-wrap gap-1.5">
                            <span class="text-xs bg-green-50 text-green-700 border border-green-200 px-2 py-0.5 rounded-full font-medium">Pabrik</span>
                            <span class="text-xs bg-green-50 text-green-700 border border-green-200 px-2 py-0.5 rounded-full font-medium">Gudang</span>
                            <span class="text-xs bg-green-50 text-green-700 border border-green-200 px-2 py-0.5 rounded-full font-medium">Workshop</span>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Tegangan Menengah -->
            <div class="mb-14 reveal-on-scroll delay-100">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-orange-500 rounded-xl flex items-center justify-center shadow-md flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-extrabold text-slate-900">Instalasi Tegangan Menengah (TM)</h2>
                        <p class="text-xs text-slate-500">Tegangan 1 kV – 35 kV</p>
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">

                    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                        <div class="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center mb-4 text-2xl">🏗️</div>
                        <h3 class="font-extrabold text-slate-900 mb-2 group-hover:text-orange-600 transition-colors">Gardu Distribusi</h3>
                        <p class="text-xs text-slate-500 leading-relaxed mb-3">Inspeksi gardu distribusi pasangan luar (outdoor) dan pasangan dalam (indoor) untuk memastikan kelaikan operasi trafo dan switchgear.</p>
                        <div class="flex flex-wrap gap-1.5">
                            <span class="text-xs bg-orange-50 text-orange-600 border border-orange-200 px-2 py-0.5 rounded-full font-medium">Pasangan Luar</span>
                            <span class="text-xs bg-orange-50 text-orange-600 border border-orange-200 px-2 py-0.5 rounded-full font-medium">Pasangan Dalam</span>
                        </div>
                    </div>

                    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                        <div class="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center mb-4 text-2xl">🔌</div>
                        <h3 class="font-extrabold text-slate-900 mb-2 group-hover:text-orange-600 transition-colors">Saluran TM (SUTM / SKTM)</h3>
                        <p class="text-xs text-slate-500 leading-relaxed mb-3">Inspeksi saluran udara tegangan menengah (SUTM) dan saluran kabel tegangan menengah (SKTM) bawah tanah.</p>
                        <div class="flex flex-wrap gap-1.5">
                            <span class="text-xs bg-orange-50 text-orange-600 border border-orange-200 px-2 py-0.5 rounded-full font-medium">SUTM</span>
                            <span class="text-xs bg-orange-50 text-orange-600 border border-orange-200 px-2 py-0.5 rounded-full font-medium">SKTM</span>
                        </div>
                    </div>

                    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                        <div class="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center mb-4 text-2xl">🏭</div>
                        <h3 class="font-extrabold text-slate-900 mb-2 group-hover:text-orange-600 transition-colors">Industri & Kawasan</h3>
                        <p class="text-xs text-slate-500 leading-relaxed mb-3">Inspeksi instalasi pemanfaatan TM untuk kawasan industri besar, data center, real estate, dan infrastruktur publik.</p>
                        <div class="flex flex-wrap gap-1.5">
                            <span class="text-xs bg-orange-50 text-orange-600 border border-orange-200 px-2 py-0.5 rounded-full font-medium">Data Center</span>
                            <span class="text-xs bg-orange-50 text-orange-600 border border-orange-200 px-2 py-0.5 rounded-full font-medium">Infrastruktur</span>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Pembangkit -->
            <div class="mb-14 reveal-on-scroll delay-200">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-blue-900 rounded-xl flex items-center justify-center shadow-md flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-extrabold text-slate-900">Pembangkit Listrik</h2>
                        <p class="text-xs text-slate-500">Energi Baru Terbarukan & Genset</p>
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">

                    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                        <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center mb-4 text-2xl">☀️</div>
                        <h3 class="font-extrabold text-slate-900 mb-2 group-hover:text-blue-900 transition-colors">PLTS (Solar Panel)</h3>
                        <p class="text-xs text-slate-500 leading-relaxed mb-3">Inspeksi Pembangkit Listrik Tenaga Surya baik rooftop maupun ground-mounted untuk penerbitan SLO PLTS.</p>
                        <div class="flex flex-wrap gap-1.5">
                            <span class="text-xs bg-blue-50 text-blue-700 border border-blue-200 px-2 py-0.5 rounded-full font-medium">Rooftop</span>
                            <span class="text-xs bg-blue-50 text-blue-700 border border-blue-200 px-2 py-0.5 rounded-full font-medium">Ground Mount</span>
                        </div>
                    </div>

                    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                        <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center mb-4 text-2xl">⚙️</div>
                        <h3 class="font-extrabold text-slate-900 mb-2 group-hover:text-blue-900 transition-colors">Genset / PLTD</h3>
                        <p class="text-xs text-slate-500 leading-relaxed mb-3">Inspeksi generator set diesel dan pembangkit tenaga diesel untuk suplai daya cadangan atau mandiri.</p>
                        <div class="flex flex-wrap gap-1.5">
                            <span class="text-xs bg-blue-50 text-blue-700 border border-blue-200 px-2 py-0.5 rounded-full font-medium">Backup Power</span>
                            <span class="text-xs bg-blue-50 text-blue-700 border border-blue-200 px-2 py-0.5 rounded-full font-medium">Mandiri</span>
                        </div>
                    </div>

                    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                        <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center mb-4 text-2xl">💨</div>
                        <h3 class="font-extrabold text-slate-900 mb-2 group-hover:text-blue-900 transition-colors">Energi Terbarukan Lainnya</h3>
                        <p class="text-xs text-slate-500 leading-relaxed mb-3">Inspeksi pembangkit energi terbarukan seperti PLTB (Bayu/Angin), PLTMH (Mikro Hidro), dan pembangkit biomassa.</p>
                        <div class="flex flex-wrap gap-1.5">
                            <span class="text-xs bg-blue-50 text-blue-700 border border-blue-200 px-2 py-0.5 rounded-full font-medium">PLTB</span>
                            <span class="text-xs bg-blue-50 text-blue-700 border border-blue-200 px-2 py-0.5 rounded-full font-medium">PLTMH</span>
                            <span class="text-xs bg-blue-50 text-blue-700 border border-blue-200 px-2 py-0.5 rounded-full font-medium">Biomassa</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <!-- CTA -->
    <section class="py-14 bg-white reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-gradient-to-r from-blue-900 to-slate-900 rounded-3xl p-8 md:p-10 flex flex-col md:flex-row items-center gap-8 text-white">
                <div class="w-16 h-16 bg-orange-500 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg text-3xl">
                    ⚡
                </div>
                <div class="flex-1 text-center md:text-left">
                    <h3 class="text-xl font-extrabold mb-2">Ajukan Permohonan SLO Sekarang</h3>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        Konsultasikan kebutuhan inspeksi & SLO Anda bersama tim kami. Kami siap melayani seluruh wilayah Indonesia.
                    </p>
                </div>
                <a href="{{ route('home') }}" class="bg-orange-500 hover:bg-orange-600 text-white font-bold px-6 py-3 rounded-xl transition shadow-lg flex-shrink-0 text-sm whitespace-nowrap">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

    <x-footer />
@endsection
