@extends('layouts.app')

@section('title', 'Prosedur SLO - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="reveal-scale">
                    <span class="inline-block bg-blue-600/20 text-blue-500 border border-blue-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md">
                        Standar Pelayanan
                    </span>
                    <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">
                        PROSEDUR SLO
                    </h1>
                    <p class="text-white/90 max-w-3xl mx-auto text-lg md:text-xl leading-relaxed mb-8">
                         Tata cara dan ketentuan teknis pelaksanaan inspeksi instalasi tenaga listrik dari tahap awal hingga penerbitan sertifikat.
                    </p>
                    <p class="text-white dark:text-slate-400 text-sm">
                        Panduan lengkap untuk memastikan instalasi listrik Anda memenuhi standar keamanan dan kelayakan operasi sesuai regulasi.
                    </p>
                </div>
                <div class="hidden md:flex justify-center reveal-scale delay-100">
                    <div class="relative">
                        <div class="w-64 h-64 bg-gradient-to-br from-blue-600/20 to-blue-500/20 rounded-full blur-3xl absolute"></div>
                        <svg class="w-80 h-80 relative z-10" viewBox="0 0 400 400" fill="none">
                            <circle cx="200" cy="200" r="180" stroke="url(#gradient1)" stroke-width="2" opacity="0.3"/>
                            <circle cx="200" cy="200" r="140" stroke="url(#gradient1)" stroke-width="2" opacity="0.4"/>
                            <circle cx="200" cy="200" r="100" stroke="url(#gradient1)" stroke-width="2" opacity="0.5"/>
                            <path d="M200 80 L200 120 M200 280 L200 320 M80 200 L120 200 M280 200 L320 200" stroke="#f97316" stroke-width="3" stroke-linecap="round"/>
                            <rect x="160" y="140" width="80" height="120" rx="8" fill="#3b82f6" opacity="0.8"/>
                            <path d="M170 160 L230 160 M170 180 L230 180 M170 200 L210 200" stroke="white" stroke-width="2" stroke-linecap="round"/>
                            <circle cx="200" cy="230" r="15" fill="#f97316"/>
                            <defs>
                                <linearGradient id="gradient1" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#f97316"/>
                                    <stop offset="100%" stop-color="#3b82f6"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Timeline -->
    <section class="py-20 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16 reveal-on-scroll">
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Alur Proses SLO</h2>
                <p class="text-slate-600 max-w-2xl mx-auto">Langkah-langkah sistematis untuk mendapatkan Sertifikat Laik Operasi</p>
            </div>

            <div class="relative">
                <!-- Timeline Line -->
                <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-gradient-to-b from-blue-600 via-blue-500 to-blue-600"></div>

                @if($prosedur && $prosedur->timeline_steps && count($prosedur->timeline_steps) > 0)
                    @foreach($prosedur->timeline_steps as $index => $step)
                        @php
                            $colors = ['blue', 'blue', 'blue', 'blue', 'green'];
                            $color = $colors[$index % count($colors)];
                        @endphp
                        <div class="relative flex flex-col md:flex-row items-center mb-12 reveal-on-scroll">
                            @if($index % 2 === 0)
                                <div class="md:w-1/2 md:pr-12 md:text-right mb-4 md:mb-0">
                                    <div class="bg-white rounded-2xl border border-slate-200 shadow-lg p-6 hover:shadow-xl transition-shadow cursor-pointer group">
                                        <div class="flex items-center gap-3 md:justify-end mb-3">
                                            <span class="text-xs font-semibold text-{{ $color }}-500 bg-{{ $color }}-50 px-3 py-1 rounded-full">{{ $step['time'] ?? '' }}</span>
                                        </div>
                                        <h3 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-{{ $color }}-600 transition-colors">{{ $step['title'] ?? '' }}</h3>
                                        <p class="text-sm text-slate-600">{{ $step['description'] ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="hidden md:flex w-12 h-12 bg-{{ $color }}-500 rounded-full items-center justify-center text-slate-900 dark:text-white font-bold text-xl z-10 shadow-lg">{{ $index + 1 }}</div>
                                <div class="md:w-1/2 md:pl-12"></div>
                            @else
                                <div class="md:w-1/2 md:pr-12"></div>
                                <div class="hidden md:flex w-12 h-12 bg-{{ $color }}-500 rounded-full items-center justify-center text-slate-900 dark:text-white font-bold text-xl z-10 shadow-lg">{{ $index + 1 }}</div>
                                <div class="md:w-1/2 md:pl-12 mb-4 md:mb-0">
                                    <div class="bg-white rounded-2xl border border-slate-200 shadow-lg p-6 hover:shadow-xl transition-shadow cursor-pointer group">
                                        <div class="flex items-center gap-3 mb-3">
                                            <span class="text-xs font-semibold text-{{ $color }}-500 bg-{{ $color }}-50 px-3 py-1 rounded-full">{{ $step['time'] ?? '' }}</span>
                                        </div>
                                        <h3 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-{{ $color }}-600 transition-colors">{{ $step['title'] ?? '' }}</h3>
                                        <p class="text-sm text-slate-600">{{ $step['description'] ?? '' }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @else
                    <!-- Fallback static timeline -->
                    <!-- Step 1 -->
                    <div class="relative flex flex-col md:flex-row items-center mb-12 reveal-on-scroll">
                        <div class="md:w-1/2 md:pr-12 md:text-right mb-4 md:mb-0">
                            <div class="bg-white rounded-2xl border border-slate-200 shadow-lg p-6 hover:shadow-xl transition-shadow cursor-pointer group">
                                <div class="flex items-center gap-3 md:justify-end mb-3">
                                    <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">1-2 Hari</span>
                                </div>
                                <h3 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-blue-600 transition-colors">Pengajuan Permohonan</h3>
                                <p class="text-sm text-slate-600">Pemohon mengirimkan permohonan SLO beserta dokumen administratif dan teknis yang diperlukan.</p>
                            </div>
                        </div>
                        <div class="hidden md:flex w-12 h-12 bg-blue-600 rounded-full items-center justify-center text-white font-bold text-xl z-10 shadow-lg">1</div>
                        <div class="md:w-1/2 md:pl-12"></div>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative flex flex-col md:flex-row items-center mb-12 reveal-on-scroll delay-100">
                        <div class="md:w-1/2 md:pr-12"></div>
                        <div class="hidden md:flex w-12 h-12 bg-blue-500 rounded-full items-center justify-center text-white font-bold text-xl z-10 shadow-lg">2</div>
                        <div class="md:w-1/2 md:pl-12 mb-4 md:mb-0">
                            <div class="bg-white rounded-2xl border border-slate-200 shadow-lg p-6 hover:shadow-xl transition-shadow cursor-pointer group">
                                <div class="flex items-center gap-3 mb-3">
                                    <span class="text-xs font-semibold text-blue-500 bg-blue-50 px-3 py-1 rounded-full">2-3 Hari</span>
                                </div>
                                <h3 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-blue-600 transition-colors">Verifikasi Dokumen</h3>
                                <p class="text-sm text-slate-600">Tim teknis mengevaluasi kelengkapan dan kesesuaian dokumen yang diajukan.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative flex flex-col md:flex-row items-center mb-12 reveal-on-scroll delay-200">
                        <div class="md:w-1/2 md:pr-12 md:text-right mb-4 md:mb-0">
                            <div class="bg-white rounded-2xl border border-slate-200 shadow-lg p-6 hover:shadow-xl transition-shadow cursor-pointer group">
                                <div class="flex items-center gap-3 md:justify-end mb-3">
                                    <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">3-5 Hari</span>
                                </div>
                                <h3 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-blue-600 transition-colors">Inspeksi Lapangan</h3>
                                <p class="text-sm text-slate-600">Tenaga teknis melakukan kunjungan ke lokasi untuk pemeriksaan visual dan pengujian instalasi.</p>
                            </div>
                        </div>
                        <div class="hidden md:flex w-12 h-12 bg-blue-600 rounded-full items-center justify-center text-white font-bold text-xl z-10 shadow-lg">3</div>
                        <div class="md:w-1/2 md:pl-12"></div>
                    </div>

                    <!-- Step 4 -->
                    <div class="relative flex flex-col md:flex-row items-center mb-12 reveal-on-scroll delay-300">
                        <div class="md:w-1/2 md:pr-12"></div>
                        <div class="hidden md:flex w-12 h-12 bg-blue-500 rounded-full items-center justify-center text-white font-bold text-xl z-10 shadow-lg">4</div>
                        <div class="md:w-1/2 md:pl-12 mb-4 md:mb-0">
                            <div class="bg-white rounded-2xl border border-slate-200 shadow-lg p-6 hover:shadow-xl transition-shadow cursor-pointer group">
                                <div class="flex items-center gap-3 mb-3">
                                    <span class="text-xs font-semibold text-blue-500 bg-blue-50 px-3 py-1 rounded-full">2-3 Hari</span>
                                </div>
                                <h3 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-blue-600 transition-colors">Evaluasi Teknis</h3>
                                <p class="text-sm text-slate-600">Hasil inspeksi dievaluasi untuk menentukan kelayakan operasi instalasi.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Step 5 -->
                    <div class="relative flex flex-col md:flex-row items-center reveal-on-scroll delay-400">
                        <div class="md:w-1/2 md:pr-12 md:text-right mb-4 md:mb-0">
                            <div class="bg-white rounded-2xl border border-slate-200 shadow-lg p-6 hover:shadow-xl transition-shadow cursor-pointer group">
                                <div class="flex items-center gap-3 md:justify-end mb-3">
                                    <span class="text-xs font-semibold text-green-500 bg-green-50 px-3 py-1 rounded-full">1-2 Hari</span>
                                </div>
                                <h3 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-green-600 transition-colors">Penerbitan SLO</h3>
                                <p class="text-sm text-slate-600">Sertifikat Laik Operasi diterbitkan jika instalasi memenuhi semua persyaratan teknis.</p>
                            </div>
                        </div>
                        <div class="hidden md:flex w-12 h-12 bg-green-500 rounded-full items-center justify-center text-slate-900 dark:text-white font-bold text-xl z-10 shadow-lg">5</div>
                        <div class="md:w-1/2 md:pl-12"></div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Detailed Process Accordion -->
    <section class="py-20 bg-slate-50 overflow-hidden">
        <div class="max-w-4xl mx-auto px-6">
            <div class="text-center mb-12 reveal-on-scroll">
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Detail Setiap Tahapan</h2>
                <p class="text-slate-600">Klik untuk melihat informasi lengkap setiap proses</p>
            </div>

            <div class="space-y-4 reveal-on-scroll">
                @if($prosedur && $prosedur->accordion_content && count($prosedur->accordion_content) > 0)
                    @foreach($prosedur->accordion_content as $index => $item)
                        @php
                            $colors = ['blue', 'blue', 'blue', 'blue', 'green'];
                            $color = $colors[$index % count($colors)];
                        @endphp
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                            <button onclick="toggleAccordion({{ $index + 1 }})" class="w-full flex items-center justify-between p-6 text-left hover:bg-slate-50 transition-colors">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 bg-{{ $color }}-100 text-{{ $color }}-600 rounded-full flex items-center justify-center font-bold">{{ $index + 1 }}</div>
                                    <div>
                                        <h3 class="font-bold text-slate-900">{{ $item['title'] ?? '' }}</h3>
                                        <p class="text-sm text-slate-500">Langkah {{ $index + 1 }} proses SLO</p>
                                    </div>
                                </div>
                                <svg id="icon-{{ $index + 1 }}" class="w-5 h-5 text-slate-600 dark:text-slate-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div id="accordion-{{ $index + 1 }}" class="hidden px-6 pb-6">
                                <div class="pt-4 border-t border-slate-100">
                                    <p class="text-slate-600 mb-4">{{ $item['content'] ?? '' }}</p>
                                    @if(!empty($item['documents']))
                                        <h4 class="font-semibold text-slate-900 mb-2">Dokumen yang Diperlukan:</h4>
                                        <ul class="space-y-2 text-sm text-slate-600 mb-4">
                                            @php
                                                $docs = explode(',', $item['documents']);
                                            @endphp
                                            @foreach($docs as $doc)
                                                <li class="flex items-start gap-2"><span class="text-{{ $color }}-500">•</span> {{ trim($doc) }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    @if(!empty($item['note']))
                                        <div class="p-3 bg-blue-50 rounded-lg">
                                            <p class="text-sm text-blue-700"><strong>Catatan:</strong> {{ $item['note'] }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback static accordion -->
                    <!-- Accordion Item 1 -->
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                        <button onclick="toggleAccordion(1)" class="w-full flex items-center justify-between p-6 text-left hover:bg-slate-50 transition-colors">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-blue-100 text-blue-700 rounded-full flex items-center justify-center font-bold">1</div>
                                <div>
                                    <h3 class="font-bold text-slate-900">Pengajuan Permohonan</h3>
                                    <p class="text-sm text-slate-500">Langkah awal proses SLO</p>
                                </div>
                            </div>
                            <svg id="icon-1" class="w-5 h-5 text-slate-600 dark:text-slate-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div id="accordion-1" class="hidden px-6 pb-6">
                            <div class="pt-4 border-t border-slate-100">
                                <p class="text-slate-600 mb-4">Pemohon mengajukan permohonan SLO melalui formulir yang tersedia dengan melampirkan dokumen administratif dan teknis yang diperlukan.</p>
                                <h4 class="font-semibold text-slate-900 mb-2">Dokumen yang Diperlukan:</h4>
                                <ul class="space-y-2 text-sm text-slate-600">
                                    <li class="flex items-start gap-2"><span class="text-blue-600">•</span> Formulir permohonan yang telah diisi</li>
                                    <li class="flex items-start gap-2"><span class="text-blue-600">•</span> KTP atau NIB/Akta Perusahaan</li>
                                    <li class="flex items-start gap-2"><span class="text-blue-600">•</span> Bukti pembayaran biaya inspeksi</li>
                                </ul>
                                <div class="mt-4 p-3 bg-blue-50 rounded-lg">
                                    <p class="text-sm text-blue-700"><strong>Catatan:</strong> Pastikan semua dokumen lengkap sebelum diajukan untuk mempercepat proses.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Accordion Item 2 -->
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                        <button onclick="toggleAccordion(2)" class="w-full flex items-center justify-between p-6 text-left hover:bg-slate-50 transition-colors">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-bold">2</div>
                                <div>
                                    <h3 class="font-bold text-slate-900">Verifikasi Dokumen</h3>
                                    <p class="text-sm text-slate-500">Pengecekan kelengkapan dokumen</p>
                                </div>
                            </div>
                            <svg id="icon-2" class="w-5 h-5 text-slate-600 dark:text-slate-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div id="accordion-2" class="hidden px-6 pb-6">
                            <div class="pt-4 border-t border-slate-100">
                                <p class="text-slate-600 mb-4">Tim teknis akan mengevaluasi kesesuaian dokumen teknis seperti Single Line Diagram (SLD), spesifikasi material, dan gambar tata letak.</p>
                                <h4 class="font-semibold text-slate-900 mb-2">Yang Diperiksa:</h4>
                                <ul class="space-y-2 text-sm text-slate-600">
                                    <li class="flex items-start gap-2"><span class="text-blue-500">•</span> Kelengkapan dokumen administratif</li>
                                    <li class="flex items-start gap-2"><span class="text-blue-500">•</span> Kesesuaian dokumen teknis</li>
                                    <li class="flex items-start gap-2"><span class="text-blue-500">•</span> Validitas sertifikat peralatan</li>
                                </ul>
                                <div class="mt-4 p-3 bg-yellow-50 rounded-lg">
                                    <p class="text-sm text-yellow-700"><strong>Penting:</strong> Jika dokumen tidak lengkap, pemohon akan diminta untuk melengkapinya terlebih dahulu.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Accordion Item 3 -->
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                        <button onclick="toggleAccordion(3)" class="w-full flex items-center justify-between p-6 text-left hover:bg-slate-50 transition-colors">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-blue-100 text-blue-700 rounded-full flex items-center justify-center font-bold">3</div>
                                <div>
                                    <h3 class="font-bold text-slate-900">Inspeksi Lapangan</h3>
                                    <p class="text-sm text-slate-500">Pemeriksaan fisik instalasi</p>
                                </div>
                            </div>
                            <svg id="icon-3" class="w-5 h-5 text-slate-600 dark:text-slate-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div id="accordion-3" class="hidden px-6 pb-6">
                            <div class="pt-4 border-t border-slate-100">
                                <p class="text-slate-600 mb-4">Tenaga Teknik (TT) melakukan kunjungan ke lokasi instalasi untuk pemeriksaan visual dan pengujian teknis.</p>
                                <h4 class="font-semibold text-slate-900 mb-2">Yang Diperiksa:</h4>
                                <ul class="space-y-2 text-sm text-slate-600">
                                    <li class="flex items-start gap-2"><span class="text-blue-600">•</span> Kondisi fisik kabel dan panel</li>
                                    <li class="flex items-start gap-2"><span class="text-blue-600">•</span> Sistem pentanahan (grounding)</li>
                                    <li class="flex items-start gap-2"><span class="text-blue-600">•</span> Papan nama peralatan</li>
                                    <li class="flex items-start gap-2"><span class="text-blue-600">•</span> Pengujian megger dan continuity</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Accordion Item 4 -->
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                        <button onclick="toggleAccordion(4)" class="w-full flex items-center justify-between p-6 text-left hover:bg-slate-50 transition-colors">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-bold">4</div>
                                <div>
                                    <h3 class="font-bold text-slate-900">Evaluasi Teknis</h3>
                                    <p class="text-sm text-slate-500">Penilaian hasil inspeksi</p>
                                </div>
                            </div>
                            <svg id="icon-4" class="w-5 h-5 text-slate-600 dark:text-slate-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div id="accordion-4" class="hidden px-6 pb-6">
                            <div class="pt-4 border-t border-slate-100">
                                <p class="text-slate-600 mb-4">Berdasarkan Laporan Hasil Pemeriksaan dan Pengujian (LHPP), Penanggung Jawab Teknik (PJT) akan melakukan evaluasi akhir.</p>
                                <h4 class="font-semibold text-slate-900 mb-2">Kemungkinan Hasil:</h4>
                                <ul class="space-y-2 text-sm text-slate-600">
                                    <li class="flex items-start gap-2"><span class="text-green-500"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> <strong>Laik Operasi:</strong> SLO akan diterbitkan</li>
                                    <li class="flex items-start gap-2"><span class="text-red-500"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 6l12 12M18 6L6 18"></path></svg></span> <strong>Tidak Laik Operasi:</strong> Perlu perbaikan dan inspeksi ulang</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Accordion Item 5 -->
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                        <button onclick="toggleAccordion(5)" class="w-full flex items-center justify-between p-6 text-left hover:bg-slate-50 transition-colors">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-green-100 text-green-600 rounded-full flex items-center justify-center font-bold">5</div>
                                <div>
                                    <h3 class="font-bold text-slate-900">Penerbitan SLO</h3>
                                    <p class="text-sm text-slate-500">Sertifikat diterbitkan</p>
                                </div>
                            </div>
                            <svg id="icon-5" class="w-5 h-5 text-slate-600 dark:text-slate-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div id="accordion-5" class="hidden px-6 pb-6">
                            <div class="pt-4 border-t border-slate-100">
                                <p class="text-slate-600 mb-4">Jika instalasi dinyatakan laik operasi, Sertifikat Laik Operasi akan diterbitkan dan diserahkan kepada pemohon.</p>
                                <h4 class="font-semibold text-slate-900 mb-2">Setelah Menerima SLO:</h4>
                                <ul class="space-y-2 text-sm text-slate-600">
                                    <li class="flex items-start gap-2"><span class="text-green-500">•</span> SLO berlaku selama 5 tahun</li>
                                    <li class="flex items-start gap-2"><span class="text-green-500">•</span> Harus diperbarui sebelum masa berlaku habis</li>
                                    <li class="flex items-start gap-2"><span class="text-green-500">•</span> Wajib ditampilkan di lokasi instalasi</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Estimated Processing Time -->
    <section class="py-20 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12 reveal-on-scroll">
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Estimasi Waktu Proses</h2>
                <p class="text-slate-600">Perkiraan durasi untuk setiap tahapan</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-6 reveal-on-scroll">
                @if($prosedur && $prosedur->processing_time && count($prosedur->processing_time) > 0)
                    @foreach($prosedur->processing_time as $index => $time)
                        @php
                            $colors = ['blue', 'blue', 'blue', 'blue', 'green'];
                            $color = $colors[$index % count($colors)];
                            $icons = [
                                'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                                'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4',
                                'M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z',
                                'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
                                'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                            ];
                            $iconPath = $icons[$index % count($icons)] ?? $icons[0];
                        @endphp
                        <div class="bg-gradient-to-br from-{{ $color }}-50 to-{{ $color }}-100 rounded-2xl p-6 text-center border border-{{ $color }}-200">
                            <div class="w-12 h-12 bg-{{ $color }}-500 rounded-xl flex items-center justify-center mx-auto mb-4">
                                <svg class="w-6 h-6 text-slate-900 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $iconPath }}"></path></svg>
                            </div>
                            <h3 class="font-bold text-slate-900 mb-1">{{ $time['name'] ?? '' }}</h3>
                            <p class="text-2xl font-extrabold text-{{ $color }}-600">{{ $time['duration'] ?? '' }}</p>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback static processing time -->
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 text-center border border-blue-200">
                        <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-slate-900 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <h3 class="font-bold text-slate-900 mb-1">Pengajuan</h3>
                        <p class="text-2xl font-extrabold text-blue-700">1-2 Hari</p>
                    </div>
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 text-center border border-blue-200">
                        <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-slate-900 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                        </div>
                        <h3 class="font-bold text-slate-900 mb-1">Verifikasi</h3>
                        <p class="text-2xl font-extrabold text-blue-600">2-3 Hari</p>
                    </div>
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 text-center border border-blue-200">
                        <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-slate-900 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <h3 class="font-bold text-slate-900 mb-1">Inspeksi</h3>
                        <p class="text-2xl font-extrabold text-blue-700">3-5 Hari</p>
                    </div>
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 text-center border border-blue-200">
                        <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-slate-900 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        </div>
                        <h3 class="font-bold text-slate-900 mb-1">Evaluasi</h3>
                        <p class="text-2xl font-extrabold text-blue-600">2-3 Hari</p>
                    </div>
                    <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6 text-center border border-green-200">
                        <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-slate-900 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="font-bold text-slate-900 mb-1">Penerbitan</h3>
                        <p class="text-2xl font-extrabold text-green-600">1-2 Hari</p>
                    </div>
                @endif
            </div>

            <div class="mt-8 text-center">
                <p class="text-slate-600">Total estimasi waktu: <strong class="text-slate-900">9-15 Hari Kerja</strong></p>
            </div>
        </div>
    </section>

    <!-- Required Documents -->
    <section class="py-20 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12 reveal-on-scroll">
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Dokumen yang Diperlukan</h2>
                <p class="text-slate-600">Persiapkan dokumen berikut sebelum mengajukan permohonan</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 reveal-on-scroll">
                @if($prosedur && $prosedur->required_documents && count($prosedur->required_documents) > 0)
                    @foreach($prosedur->required_documents as $index => $doc)
                        @php
                            $iconColors = ['blue', 'blue', 'green', 'purple', 'red', 'yellow'];
                            $iconColor = $iconColors[$index % count($iconColors)];
                            $iconSvgs = [
                                'blue' => 'M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5',
                                'blue' => 'M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2',
                                'green' => 'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z',
                                'purple' => 'M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2',
                                'red' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                                'yellow' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z',
                            ];
                            $iconPath = $iconSvgs[$iconColor] ?? $iconSvgs['blue'];
                        @endphp
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 flex items-start gap-4 hover:shadow-md transition-shadow">
                            <div class="w-10 h-10 bg-{{ $iconColor }}-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-{{ $iconColor }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $iconPath }}"></path></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-1">{{ $doc['name'] ?? '' }}</h3>
                                <p class="text-sm text-slate-600">{{ $doc['description'] ?? '' }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback static documents -->
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 flex items-start gap-4 hover:shadow-md transition-shadow">
                        <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 mb-1">Formulir Permohonan</h3>
                            <p class="text-sm text-slate-600">Formulir yang telah diisi lengkap dengan data pemohon</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 flex items-start gap-4 hover:shadow-md transition-shadow">
                        <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 mb-1">KTP / NIB / Akta</h3>
                            <p class="text-sm text-slate-600">Identitas pemohon (individu atau badan usaha)</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 flex items-start gap-4 hover:shadow-md transition-shadow">
                        <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 mb-1">Bukti Pembayaran</h3>
                            <p class="text-sm text-slate-600">Bukti transfer biaya inspeksi SLO</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 flex items-start gap-4 hover:shadow-md transition-shadow">
                        <div class="w-10 h-10 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 mb-1">Single Line Diagram</h3>
                            <p class="text-sm text-slate-600">Gambar instalasi listrik lengkap</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 flex items-start gap-4 hover:shadow-md transition-shadow">
                        <div class="w-10 h-10 bg-red-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 mb-1">Spesifikasi Peralatan</h3>
                            <p class="text-sm text-slate-600">Daftar peralatan dengan spesifikasi teknis</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 flex items-start gap-4 hover:shadow-md transition-shadow">
                        <div class="w-10 h-10 bg-yellow-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 mb-1">Sertifikat SNI</h3>
                            <p class="text-sm text-slate-600">Sertifikat standar peralatan yang digunakan</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Official Procedure Document -->
    <section class="py-20 bg-white overflow-hidden">
        <div class="max-w-5xl mx-auto px-6">
            <div class="text-center mb-12 reveal-on-scroll">
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Dokumen Prosedur Resmi</h2>
                <p class="text-slate-600">Dokumen resmi prosedur SLO dari PT Pradana Nusa Energi</p>
            </div>

            @if($prosedur && $prosedur->path_pdf)
                <div class="bg-slate-50 rounded-3xl border border-slate-200 shadow-lg overflow-hidden reveal-on-scroll">
                    <div class="p-6 border-b border-slate-200 flex justify-between items-center">
                        <div>
                            <h3 class="text-xl font-bold text-slate-900">{{ strip_tags($prosedur->nama_dokumen) }}</h3>
                            <p class="text-sm text-slate-500 mt-1">Diperbarui: {{ $prosedur->updated_at->format('d F Y') }}</p>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ asset('storage_public/' . $prosedur->path_pdf) }}" download class="flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-semibold transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                Download
                            </a>
                            <button onclick="openFullscreen()" class="flex items-center gap-2 px-4 py-2 bg-slate-200 dark:bg-slate-700 hover:bg-slate-800 text-slate-900 dark:text-white rounded-lg text-sm font-semibold transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 4l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path></svg>
                                Fullscreen
                            </button>
                        </div>
                    </div>
                    
                    <div class="relative" style="height: 700px;">
                        <iframe 
                            src="{{ asset('storage_public/' . $prosedur->path_pdf) }}" 
                            class="w-full h-full"
                            frameborder="0"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            @else
                <div class="bg-slate-50 rounded-3xl border border-slate-200 shadow-sm p-16 text-center reveal-on-scroll">
                    <div class="w-20 h-20 bg-slate-200 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-slate-600 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Dokumen belum tersedia</h3>
                    <p class="text-slate-600">Dokumen prosedur resmi akan ditampilkan di sini setelah diunggah oleh admin.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 bg-slate-50 overflow-hidden">
        <div class="max-w-4xl mx-auto px-6">
            <div class="text-center mb-12 reveal-on-scroll">
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Pertanyaan yang Sering Diajukan</h2>
                <p class="text-slate-600">Jawaban untuk pertanyaan umum seputar proses SLO</p>
            </div>

            <div class="space-y-4 reveal-on-scroll">
                @if($prosedur && $prosedur->faq_content && count($prosedur->faq_content) > 0)
                    @foreach($prosedur->faq_content as $index => $faq)
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                            <button onclick="toggleFaq({{ $index + 1 }})" class="w-full flex items-center justify-between p-6 text-left hover:bg-slate-50 transition-colors">
                                <h3 class="font-semibold text-slate-900">{{ $faq['question'] ?? '' }}</h3>
                                <svg id="faq-icon-{{ $index + 1 }}" class="w-5 h-5 text-slate-600 dark:text-slate-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div id="faq-{{ $index + 1 }}" class="hidden px-6 pb-6">
                                <p class="text-slate-600 pt-4 border-t border-slate-100">{{ $faq['answer'] ?? '' }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback static FAQ -->
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                        <button onclick="toggleFaq(1)" class="w-full flex items-center justify-between p-6 text-left hover:bg-slate-50 transition-colors">
                            <h3 class="font-semibold text-slate-900">Berapa lama proses SLO berlangsung?</h3>
                            <svg id="faq-icon-1" class="w-5 h-5 text-slate-600 dark:text-slate-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div id="faq-1" class="hidden px-6 pb-6">
                            <p class="text-slate-600 pt-4 border-t border-slate-100">Proses SLO secara keseluruhan membutuhkan waktu sekitar 9-15 hari kerja, tergantung pada kompleksitas instalasi dan kelengkapan dokumen yang diajukan.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                        <button onclick="toggleFaq(2)" class="w-full flex items-center justify-between p-6 text-left hover:bg-slate-50 transition-colors">
                            <h3 class="font-semibold text-slate-900">Dokumen apa saja yang diperlukan?</h3>
                            <svg id="faq-icon-2" class="w-5 h-5 text-slate-600 dark:text-slate-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div id="faq-2" class="hidden px-6 pb-6">
                            <p class="text-slate-600 pt-4 border-t border-slate-100">Dokumen yang diperlukan meliputi: formulir permohonan, KTP/NIB/Akta perusahaan, bukti pembayaran, Single Line Diagram, spesifikasi peralatan, dan sertifikat SNI peralatan.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                        <button onclick="toggleFaq(3)" class="w-full flex items-center justify-between p-6 text-left hover:bg-slate-50 transition-colors">
                            <h3 class="font-semibold text-slate-900">Apakah inspeksi lapangan wajib dilakukan?</h3>
                            <svg id="faq-icon-3" class="w-5 h-5 text-slate-600 dark:text-slate-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div id="faq-3" class="hidden px-6 pb-6">
                            <p class="text-slate-600 pt-4 border-t border-slate-100">Ya, inspeksi lapangan adalah tahap wajib dalam proses SLO untuk memastikan bahwa instalasi fisik sesuai dengan dokumen teknis dan memenuhi standar keamanan.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                        <button onclick="toggleFaq(4)" class="w-full flex items-center justify-between p-6 text-left hover:bg-slate-50 transition-colors">
                            <h3 class="font-semibold text-slate-900">Apa yang terjadi jika instalasi tidak memenuhi persyaratan?</h3>
                            <svg id="faq-icon-4" class="w-5 h-5 text-slate-600 dark:text-slate-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div id="faq-4" class="hidden px-6 pb-6">
                            <p class="text-slate-600 pt-4 border-t border-slate-100">Jika instalasi dinyatakan "Tidak Laik Operasi", pemohon wajib melakukan perbaikan sesuai rekomendasi yang diberikan, kemudian mengajukan permohonan inspeksi ulang.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                        <button onclick="toggleFaq(5)" class="w-full flex items-center justify-between p-6 text-left hover:bg-slate-50 transition-colors">
                            <h3 class="font-semibold text-slate-900">Bagaimana cara menghubungi customer support?</h3>
                            <svg id="faq-icon-5" class="w-5 h-5 text-slate-600 dark:text-slate-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div id="faq-5" class="hidden px-6 pb-6">
                            <p class="text-slate-600 pt-4 border-t border-slate-100">Anda dapat menghubungi customer support kami melalui halaman "Hubungi Kami" atau menghubungi nomor telepon yang tertera di website kami.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-gradient-to-r from-blue-600 to-sky-500 text-white overflow-hidden">
        <div class="max-w-4xl mx-auto px-6 text-center reveal-on-scroll">
            <h2 class="text-3xl md:text-4xl font-extrabold mb-4">Konsultasi Sebelum Mengajukan Permohonan</h2>
            <p class="text-blue-100 text-lg mb-8 max-w-2xl mx-auto">Tim kami siap membantu Anda memahami persyaratan dan proses SLO untuk memastikan permohonan Anda berjalan lancar.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/hubungi-kami" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white text-blue-700 rounded-xl font-bold hover:bg-blue-50 transition shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                    Konsultasi Sekarang
                </a>
                <a href="/informasi-publik/persyaratan-slo" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-blue-700 text-slate-900 text-white rounded-xl font-bold hover:bg-blue-800 transition border border-blue-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

    <script>
        let openAccordion = null;
        let openFaq = null;

        function toggleAccordion(id) {
            const content = document.getElementById('accordion-' + id);
            const icon = document.getElementById('icon-' + id);
            
            if (openAccordion && openAccordion !== id) {
                const prevContent = document.getElementById('accordion-' + openAccordion);
                const prevIcon = document.getElementById('icon-' + openAccordion);
                if (prevContent) prevContent.classList.add('hidden');
                if (prevIcon) prevIcon.classList.remove('rotate-180');
            }
            
            if (content) {
                content.classList.toggle('hidden');
            }
            if (icon) {
                icon.classList.toggle('rotate-180');
            }
            openAccordion = (content && !content.classList.contains('hidden')) ? id : null;
        }

        function toggleFaq(id) {
            const content = document.getElementById('faq-' + id);
            const icon = document.getElementById('faq-icon-' + id);
            
            if (openFaq && openFaq !== id) {
                const prevContent = document.getElementById('faq-' + openFaq);
                const prevIcon = document.getElementById('faq-icon-' + openFaq);
                if (prevContent) prevContent.classList.add('hidden');
                if (prevIcon) prevIcon.classList.remove('rotate-180');
            }
            
            if (content) {
                content.classList.toggle('hidden');
            }
            if (icon) {
                icon.classList.toggle('rotate-180');
            }
            openFaq = (content && !content.classList.contains('hidden')) ? id : null;
        }

        function openFullscreen() {
            const iframe = document.querySelector('iframe');
            if (iframe.requestFullscreen) {
                iframe.requestFullscreen();
            } else if (iframe.webkitRequestFullscreen) {
                iframe.webkitRequestFullscreen();
            } else if (iframe.msRequestFullscreen) {
                iframe.msRequestFullscreen();
            }
        }
    </script>

    <x-footer />
@endsection
