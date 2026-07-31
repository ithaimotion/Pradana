@extends('layouts.app')

@section('title', 'Karir - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Header -->
    <section class="relative py-24 bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl"></div>
        
        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-blue-600/20 text-blue-500 border border-blue-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-6 backdrop-blur-md">
                Bergabung Bersama Kami
            </span>
            <h1 class="text-4xl md:text-6xl font-extrabold mb-6 tracking-tight">
                Bangun Karir di<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-sky-400">Pradana Nusa Energi</span>
            </h1>
            <p class="text-slate-700 dark:text-slate-300 max-w-3xl mx-auto text-lg md:text-xl leading-relaxed mb-8">
                Jadilah bagian dari tim profesional kami dalam mewujudkan instalasi ketenagalistrikan yang aman, andal, dan ramah lingkungan di Indonesia.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#lowongan" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-bold transition shadow-lg shadow-blue-600/30">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    Lihat Lowongan
                </a>
                <a href="#kultur" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-slate-100 dark:bg-white/10 hover:bg-white/20 text-slate-900 dark:text-white rounded-xl font-bold transition border border-white/20 backdrop-blur-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Tentang Kami
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-white border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center reveal-on-scroll">
                <div>
                    <div class="text-4xl md:text-5xl font-extrabold text-blue-600 mb-2">{{ $karirSettings->years_experience ?? '10+' }}</div>
                    <div class="text-slate-600 text-sm font-medium">Tahun Pengalaman</div>
                </div>
                <div>
                    <div class="text-4xl md:text-5xl font-extrabold text-blue-600 mb-2">{{ $karirSettings->projects_completed ?? '500+' }}</div>
                    <div class="text-slate-600 text-sm font-medium">Proyek Selesai</div>
                </div>
                <div>
                    <div class="text-4xl md:text-5xl font-extrabold text-green-500 mb-2">{{ $karirSettings->team_professionals ?? '50+' }}</div>
                    <div class="text-slate-600 text-sm font-medium">Tim Profesional</div>
                </div>
                <div>
                    <div class="text-4xl md:text-5xl font-extrabold text-purple-500 mb-2">{{ $karirSettings->cities_served ?? '30+' }}</div>
                    <div class="text-slate-600 text-sm font-medium">Kota Layanan</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Join Us -->
    <section id="kultur" class="py-20 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16 reveal-on-scroll">
                <span class="inline-block bg-blue-100 text-blue-700 border border-blue-200 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4">
                    Kenapa Kami
                </span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Mengapa Bergabung dengan Pradana?</h2>
                <p class="text-slate-600 max-w-2xl mx-auto text-lg">
                    {{ $karirSettings->description ?? 'Sebagai Lembaga Inspeksi Teknik (LIT) yang terus berkembang, kami mencari individu yang berintegritas tinggi, kompeten, dan memiliki semangat belajar.' }}
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 reveal-on-scroll delay-100">
                @if($karirSettings && $karirSettings->benefits && count($karirSettings->benefits) > 0)
                    @foreach($karirSettings->benefits as $index => $benefit)
                        @php
                            $colors = ['blue', 'blue', 'green', 'purple', 'red', 'teal'];
                            $color = $colors[$index % count($colors)];
                            $defaultIcons = [
                                'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                                'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6',
                                'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                                'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
                                'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                                'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                            ];
                            $iconPath = $benefit['icon'] ?? $defaultIcons[$index % count($defaultIcons)];
                        @endphp
                        <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 group">
                            <div class="w-14 h-14 bg-{{ $color }}-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-{{ $color }}-500 transition-colors">
                                <svg class="w-7 h-7 text-{{ $color }}-500 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $iconPath }}"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-3">{{ $benefit['title'] ?? '' }}</h3>
                            <p class="text-slate-600 leading-relaxed">{{ $benefit['description'] ?? '' }}</p>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback static benefits -->
                    <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 group">
                        <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 transition-colors">
                            <svg class="w-7 h-7 text-blue-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Lingkungan Kerja Aman</h3>
                        <p class="text-slate-600 leading-relaxed">Kami mengedepankan K3 (Kesehatan dan Keselamatan Kerja) sebagai prioritas utama dalam setiap operasi kami.</p>
                    </div>

                    <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 group">
                        <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 transition-colors">
                            <svg class="w-7 h-7 text-blue-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Pengembangan Karir</h3>
                        <p class="text-slate-600 leading-relaxed">Peluang promosi dan pengembangan karir yang jelas dengan jalur kenaikan level yang transparan.</p>
                    </div>

                    <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 group">
                        <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-green-500 transition-colors">
                            <svg class="w-7 h-7 text-green-500 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Pelatihan & Sertifikasi</h3>
                        <p class="text-slate-600 leading-relaxed">Dukungan pelatihan berkelanjutan dan sertifikasi kompetensi untuk meningkatkan keahlian Anda.</p>
                    </div>

                    <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 group">
                        <div class="w-14 h-14 bg-purple-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-purple-500 transition-colors">
                            <svg class="w-7 h-7 text-purple-500 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Tim Profesional</h3>
                        <p class="text-slate-600 leading-relaxed">Bekerja bersama tim ahli yang berpengalaman dan siap berbagi pengetahuan.</p>
                    </div>

                    <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 group">
                        <div class="w-14 h-14 bg-red-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-red-500 transition-colors">
                            <svg class="w-7 h-7 text-red-500 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Kompensasi Kompetitif</h3>
                        <p class="text-slate-600 leading-relaxed">Paket kompensasi dan benefit yang kompetitif sesuai dengan kualifikasi dan kontribusi.</p>
                    </div>

                    <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 group">
                        <div class="w-14 h-14 bg-teal-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-teal-500 transition-colors">
                            <svg class="w-7 h-7 text-teal-500 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Proyek Nasional</h3>
                        <p class="text-slate-600 leading-relaxed">Kesempatan bekerja pada proyek-proyek ketenagalistrikan skala nasional yang berdampak.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Job Openings -->
    <section id="lowongan" class="py-20 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16 reveal-on-scroll">
                <span class="inline-block bg-blue-100 text-blue-700 border border-blue-200 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4">
                    Lowongan Terbuka
                </span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Posisi yang Tersedia</h2>
                <p class="text-slate-600 max-w-2xl mx-auto text-lg">
                    Temukan posisi yang sesuai dengan keahlian dan passion Anda untuk berkembang bersama kami.
                </p>
            </div>

            <div class="space-y-6 reveal-on-scroll delay-100">
                @forelse($lowongans ?? [] as $job)
                    <div class="bg-gradient-to-r from-slate-50 to-white border border-slate-200 rounded-3xl p-6 md:p-8 shadow-sm hover:shadow-2xl transition-all duration-300 group">
                        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                            <div class="flex-1">
                                <div class="flex flex-wrap gap-2 mb-4">
                                    <span class="text-xs font-bold bg-blue-600 text-white px-3 py-1.5 rounded-full">{{ $job->divisi }}</span>
                                    <span class="text-xs font-bold bg-green-500 text-slate-900 dark:text-white px-3 py-1.5 rounded-full">{{ $job->tipe }}</span>
                                    <span class="text-xs font-bold bg-slate-200 dark:bg-slate-700 text-slate-900 dark:text-white px-3 py-1.5 rounded-full flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        {{ $job->lokasi }}
                                    </span>
                                </div>
                                <h4 class="text-2xl font-extrabold text-slate-900 mb-3 group-hover:text-blue-500 transition-colors">{{ $job->judul }}</h4>
                                <p class="text-slate-600 leading-relaxed mb-4">
                                    {{ $job->deskripsi }}
                                </p>
                                @if($job->persyaratan)
                                    <div class="bg-white rounded-xl p-4 border border-slate-200">
                                        <strong class="text-slate-900">Persyaratan Utama:</strong>
                                        <ul class="list-disc pl-5 mt-2 space-y-1 text-sm text-slate-600">
                                            @foreach(explode("\n", $job->persyaratan) as $syarat)
                                                @if(trim($syarat))
                                                    <li>{{ trim($syarat) }}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-shrink-0 self-start lg:self-center w-full lg:w-auto">
                                @if($job->link_lamar)
                                    <a href="{{ $job->link_lamar }}" target="_blank" class="block text-center w-full lg:w-auto bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold px-8 py-4 rounded-xl transition shadow-lg shadow-blue-500/30">
                                        Lamar Posisi Ini
                                    </a>
                                @else
                                    <a href="mailto:hrd@pradananusaenergi.co.id?subject=Lamaran%20Posisi%20{{ urlencode($job->judul) }}" class="block text-center w-full lg:w-auto bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold px-8 py-4 rounded-xl transition shadow-lg shadow-blue-500/30">
                                        Lamar via Email
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Default Job Item -->
                    <div class="bg-gradient-to-r from-slate-50 to-white border border-slate-200 rounded-3xl p-6 md:p-8 shadow-sm hover:shadow-2xl transition-all duration-300 group">
                        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                            <div class="flex-1">
                                <div class="flex flex-wrap gap-2 mb-4">
                                    <span class="text-xs font-bold bg-blue-600 text-white px-3 py-1.5 rounded-full">Teknik</span>
                                    <span class="text-xs font-bold bg-green-500 text-slate-900 dark:text-white px-3 py-1.5 rounded-full">Full Time</span>
                                    <span class="text-xs font-bold bg-slate-200 dark:bg-slate-700 text-slate-900 dark:text-white px-3 py-1.5 rounded-full flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        Jakarta / Lapangan
                                    </span>
                                </div>
                                <h4 class="text-2xl font-extrabold text-slate-900 mb-3 group-hover:text-blue-500 transition-colors">Tenaga Teknik (Inspektur Instalasi TR & TM)</h4>
                                <p class="text-slate-600 leading-relaxed mb-4">
                                    Bertanggung jawab melaksanakan pemeriksaan, pengujian, dan komisioning instalasi tegangan rendah (TR) dan tegangan menengah (TM) di lapangan serta menyusun Laporan Hasil Pemeriksaan (LHPP).
                                </p>
                                <div class="bg-white rounded-xl p-4 border border-slate-200">
                                    <strong class="text-slate-900">Persyaratan Utama:</strong>
                                    <ul class="list-disc pl-5 mt-2 space-y-1 text-sm text-slate-600">
                                        <li>Pendidikan min. D3/S1 Teknik Elektro (Arus Kuat).</li>
                                        <li>Memiliki Sertifikat Kompetensi (Serkom) Bidang Inspeksi Instalasi Listrik TR/TM dari Kementerian ESDM.</li>
                                        <li>Memahami regulasi ketenagalistrikan dan standar PUIL.</li>
                                        <li>Bersedia ditugaskan di lapangan (mobile).</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="flex-shrink-0 self-start lg:self-center w-full lg:w-auto">
                                <a href="mailto:hrd@pradananusaenergi.co.id?subject=Lamaran%20Posisi%20Tenaga%20Teknik" class="block text-center w-full lg:w-auto bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold px-8 py-4 rounded-xl transition shadow-lg shadow-blue-500/30">
                                    Lamar Posisi Ini
                                </a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-blue-900 via-blue-800 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:20px_20px]"></div>
        <div class="relative max-w-4xl mx-auto px-6 text-center reveal-on-scroll">
            <h2 class="text-3xl md:text-4xl font-extrabold mb-4">Siap Bergabung dengan Kami?</h2>
            <p class="text-blue-100 text-lg mb-8 max-w-2xl mx-auto">
                Kirimkan CV terbaru, Surat Lamaran, dan dokumen pendukung Anda. Tim HRD kami akan menghubungi Anda jika profil Anda sesuai dengan kebutuhan kami.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="mailto:hrd@pradananusaenergi.co.id" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-bold transition shadow-lg shadow-blue-600/30">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    Kirim Lamaran via Email
                </a>
                <a href="tel:+6221XXXXXXX" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-slate-100 dark:bg-white/10 hover:bg-white/20 text-slate-900 dark:text-white rounded-xl font-bold transition border border-white/20 backdrop-blur-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    Hubungi HRD
                </a>
            </div>
        </div>
    </section>

    <x-footer />
@endsection
