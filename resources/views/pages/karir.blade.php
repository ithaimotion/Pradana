@extends('layouts.app')

@section('title', 'Karir - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Header -->
    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-orange-500/20 text-orange-400 border border-orange-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md">
                Bergabung Bersama Kami
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">
                KARIR
            </h1>
            <p class="text-slate-300 max-w-2xl mx-auto text-base md:text-lg">
                Jadilah bagian dari tim profesional kami dalam mewujudkan instalasi ketenagalistrikan yang aman, andal, dan ramah lingkungan di Indonesia.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-slate-50 overflow-hidden min-h-screen">
        <div class="max-w-7xl mx-auto px-6">
            
            <div class="mb-12 text-center max-w-3xl mx-auto reveal-on-scroll">
                <h2 class="text-2xl font-extrabold text-slate-900 mb-4">Mengapa Bergabung dengan Pradana?</h2>
                <p class="text-slate-600 leading-relaxed">
                    Sebagai Lembaga Inspeksi Teknik (LIT) yang terus berkembang, kami mencari individu yang berintegritas tinggi, kompeten, dan memiliki semangat belajar. Kami menawarkan lingkungan kerja profesional yang mengedepankan K3, peluang pengembangan karir, dan pelatihan sertifikasi berkelanjutan.
                </p>
            </div>

            <!-- Job Openings -->
            <div class="space-y-6 reveal-on-scroll delay-100">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-orange-500 rounded-xl flex items-center justify-center shadow-md flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-extrabold text-slate-900">Lowongan Terbuka</h3>
                </div>

                @forelse($lowongans ?? [] as $job)
                    <div class="bg-white border border-slate-200 rounded-3xl p-6 md:p-8 shadow-sm hover:shadow-xl transition-all duration-300 group">
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                            <div class="flex-1">
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <span class="text-xs font-bold bg-blue-100 text-blue-800 border border-blue-200 px-3 py-1 rounded-full">{{ $job->divisi }}</span>
                                    <span class="text-xs font-bold bg-green-100 text-green-800 border border-green-200 px-3 py-1 rounded-full">{{ $job->tipe }}</span>
                                    <span class="text-xs font-bold bg-slate-100 text-slate-700 border border-slate-200 px-3 py-1 rounded-full flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        {{ $job->lokasi }}
                                    </span>
                                </div>
                                <h4 class="text-xl font-extrabold text-slate-900 mb-2 group-hover:text-orange-500 transition-colors">{{ $job->judul }}</h4>
                                <p class="text-sm text-slate-500 leading-relaxed mb-4">
                                    {{ $job->deskripsi }}
                                </p>
                                @if($job->persyaratan)
                                    <div class="text-sm text-slate-700">
                                        <strong>Persyaratan Utama:</strong>
                                        <ul class="list-disc pl-5 mt-2 space-y-1 text-xs">
                                            @foreach(explode("\n", $job->persyaratan) as $syarat)
                                                @if(trim($syarat))
                                                    <li>{{ trim($syarat) }}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-shrink-0 self-start md:self-center w-full md:w-auto">
                                @if($job->link_lamar)
                                    <a href="{{ $job->link_lamar }}" target="_blank" class="block text-center w-full md:w-auto bg-blue-900 hover:bg-blue-800 text-white font-bold px-6 py-3 rounded-xl transition shadow-md">
                                        Lamar Posisi Ini
                                    </a>
                                @else
                                    <a href="mailto:hrd@pradananusaenergi.co.id?subject=Lamaran%20Posisi%20{{ urlencode($job->judul) }}" class="block text-center w-full md:w-auto bg-blue-900 hover:bg-blue-800 text-white font-bold px-6 py-3 rounded-xl transition shadow-md">
                                        Lamar via Email
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Default Job Item 1 -->
                    <div class="bg-white border border-slate-200 rounded-3xl p-6 md:p-8 shadow-sm hover:shadow-xl transition-all duration-300 group">
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                            <div class="flex-1">
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <span class="text-xs font-bold bg-blue-100 text-blue-800 border border-blue-200 px-3 py-1 rounded-full">Teknik</span>
                                    <span class="text-xs font-bold bg-green-100 text-green-800 border border-green-200 px-3 py-1 rounded-full">Full Time</span>
                                    <span class="text-xs font-bold bg-slate-100 text-slate-700 border border-slate-200 px-3 py-1 rounded-full flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        Jakarta / Lapangan
                                    </span>
                                </div>
                                <h4 class="text-xl font-extrabold text-slate-900 mb-2 group-hover:text-orange-500 transition-colors">Tenaga Teknik (Inspektur Instalasi TR & TM)</h4>
                                <p class="text-sm text-slate-500 leading-relaxed mb-4">
                                    Bertanggung jawab melaksanakan pemeriksaan, pengujian, dan komisioning instalasi tegangan rendah (TR) dan tegangan menengah (TM) di lapangan serta menyusun Laporan Hasil Pemeriksaan (LHPP).
                                </p>
                                <div class="text-sm text-slate-700">
                                    <strong>Persyaratan Utama:</strong>
                                    <ul class="list-disc pl-5 mt-2 space-y-1 text-xs">
                                        <li>Pendidikan min. D3/S1 Teknik Elektro (Arus Kuat).</li>
                                        <li>Memiliki Sertifikat Kompetensi (Serkom) Bidang Inspeksi Instalasi Listrik TR/TM dari Kementerian ESDM.</li>
                                        <li>Memahami regulasi ketenagalistrikan dan standar PUIL.</li>
                                        <li>Bersedia ditugaskan di lapangan (mobile).</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="flex-shrink-0 self-start md:self-center w-full md:w-auto">
                                <a href="mailto:hrd@pradananusaenergi.co.id?subject=Lamaran%20Posisi%20Tenaga%20Teknik" class="block text-center w-full md:w-auto bg-blue-900 hover:bg-blue-800 text-white font-bold px-6 py-3 rounded-xl transition shadow-md">
                                    Lamar Posisi Ini
                                </a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>


            <!-- Apply Notice -->
            <div class="mt-12 bg-blue-50 border border-blue-200 rounded-2xl p-6 flex flex-col md:flex-row gap-4 items-center justify-between reveal-on-scroll delay-200">
                <div class="flex gap-4 items-center">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0 text-xl">
                        📧
                    </div>
                    <div>
                        <h4 class="font-bold text-blue-900 mb-1">Cara Melamar</h4>
                        <p class="text-sm text-blue-700 leading-relaxed">
                            Kirimkan CV terbaru, Surat Lamaran, dan dokumen pendukung (Ijazah, Transkrip, KTP, dan Sertifikat Kompetensi jika ada) ke email kami.
                        </p>
                    </div>
                </div>
                <a href="mailto:hrd@pradananusaenergi.co.id" class="flex-shrink-0 text-orange-600 font-bold hover:text-orange-700 transition flex items-center gap-2 bg-white px-4 py-2 border border-orange-200 rounded-lg">
                    hrd@pradananusaenergi.co.id
                </a>
            </div>

        </div>
    </section>

    <x-footer />
@endsection
