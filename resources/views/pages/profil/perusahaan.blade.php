@extends('layouts.app')

@section('title', 'Profil Perusahaan - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Header -->
    <section class="relative py-24 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-blue-600/20 text-blue-500 border border-blue-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md">
                Profil Perusahaan
            </span>
            @php
                $pageTitle = $konten->judul ?? 'PT PRADANA NUSA ENERGI';
                $styledPageTitle = preg_replace('/(PT\.?\s*Pradana Nusa)(\s+Energi)/i', '<span class="text-blue-500">$1</span><span class="text-green-500">$2</span>', e($pageTitle));
            @endphp
            <h1 class="text-4xl md:text-6xl font-extrabold mb-6 tracking-tight leading-tight">
                {!! $styledPageTitle !!}
            </h1>
            <p class="text-lg md:text-xl text-slate-700 dark:text-slate-300 max-w-3xl mx-auto leading-relaxed">
                {{ $konten->subjudul ?? 'Lembaga Inspeksi Teknik (LIT) terkemuka dan terpercaya yang bergerak di bidang pengujian dan pemeriksaan kelistrikan untuk mewujudkan tenaga listrik yang aman, andal, dan ramah lingkungan.' }}
            </p>
        </div>
    </section>

    <!-- Tentang Perusahaan -->
    <section class="py-20 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="reveal-left">
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-6 leading-tight">
                        {{ $konten->nilai ?? 'Komitmen Kami Terhadap Keselamatan & Ketenagalistrikan' }}
                    </h2>
                    <p class="text-slate-600 mb-6 leading-relaxed">
                        {{ $konten->konten ?? 'PT Pradana Nusa Energi berdiri sebagai Lembaga Inspeksi Teknik terakreditasi yang berkomitmen mendukung program pemerintah dalam penegakan Sertifikat Laik Operasi (SLO) di Indonesia. Dengan didukung oleh Tim Tenaga Teknik (TT) dan Penanggung Jawab Teknik (PJT) bersertifikat kompetensi resmi, kami memberikan layanan inspeksi ketenagalistrikan yang tepat waktu, presisi, independen, dan berstandar nasional.' }}
                    </p>

                    <div class="grid grid-cols-2 gap-6 border-t border-slate-200 pt-6">
                        <div>
                            <div class="text-3xl font-extrabold text-blue-600 mb-1">100%</div>
                            <div class="text-sm font-medium text-slate-600">Terakreditasi & Resmi</div>
                        </div>
                        <div>
                            <div class="text-3xl font-extrabold text-blue-900 mb-1">Independen</div>
                            <div class="text-sm font-medium text-slate-600">Inspeksi Objektif</div>
                        </div>
                    </div>
                </div>

                <div class="relative reveal-right delay-200">
                    <div class="relative z-10 rounded-2xl overflow-hidden shadow-2xl border border-white/50">
                        <img src="{{ optional($konten)->url_gambar ?? 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80' }}" alt="Gedung PT Pradana Nusa Energi" class="w-full h-[420px] object-cover">
                    </div>
                    <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-xl shadow-xl z-20 border border-slate-100 max-w-xs hidden sm:block">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-blue-600/10 text-blue-600 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">SLO Terjamin</h4>
                                <p class="text-xs text-slate-500">Inspeksi instalasi tenaga listrik terpercaya</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi & Misi -->
    <section class="py-20 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-16 reveal-on-scroll">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">VISI & MISI</h2>
                <p class="text-slate-600">Landasan utama PT Pradana Nusa Energi dalam melayani keselamatan ketenagalistrikan Indonesia.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Visi -->
                <div class="bg-gradient-to-br from-blue-900 to-slate-900 text-white p-8 md:p-10 rounded-2xl shadow-xl reveal-left">
                    <div class="w-14 h-14 bg-blue-600 rounded-xl flex items-center justify-center mb-6 shadow-lg">
                        <svg class="w-7 h-7 text-slate-900 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">VISI</h3>
                    <p class="text-slate-800 dark:text-slate-200 leading-relaxed text-lg">
                        {{ $konten->visi ?? 'Menjadi Lembaga Inspeksi Teknik yang ikut serta mewujudkan instalasi ketenagalistrikan yang memenuhi kaidah K2 (Keselamatan Ketenagalistrikan) yang aman, andal, dan ramah lingkungan di Indonesia.' }}
                    </p>
                </div>

                <!-- Misi -->
                <div class="bg-slate-50 border border-slate-200 p-8 md:p-10 rounded-2xl shadow-lg reveal-right delay-200">
                    <div class="w-14 h-14 bg-blue-900 rounded-xl flex items-center justify-center mb-6 shadow-lg">
                        <svg class="w-7 h-7 text-slate-900 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">MISI</h3>
                    <div class="text-slate-600 leading-relaxed">
                        {{ $konten->misi ?? '1. Melaksanakan pemeriksaan dan pengujian sesuai dengan peraturan Perundang-Undangan yang berlaku di Indonesia.<br><br>2. Melaksanakan pemeriksaan dan pengujian secara profesional, tepat waktu, jujur dan bertanggung jawab dengan dukungan Tenaga Teknik yang kompeten dan terstandar.<br><br>3. Memberikan layanan secara tepat waktu, tepat mutu yang kompetitif, solutif, dan independen.' }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Nilai-Nilai Perusahaan -->
    <section class="py-20 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-16 reveal-on-scroll">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">NILAI UTAMA PERUSAHAAN</h2>
                <p class="text-slate-600">Prinsip kerja yang memandu setiap langkah pelayanan inspeksi teknis kami.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @php
                    $nilaiPerusahaan = $konten->nilai_perusahaan ?? [];
                    if(!is_array($nilaiPerusahaan)) $nilaiPerusahaan = json_decode($nilaiPerusahaan, true) ?? [];
                    
                    // Default values if no data
                    if(empty($nilaiPerusahaan)) {
                        $nilaiPerusahaan = [
                            [
                                'ikon' => 'shield',
                                'judul' => 'Independensi & Integritas',
                                'deskripsi' => 'Pengujian dilakukan secara obyektif tanpa intervensi pihak luar guna menjamin keaslian dan akurasi hasil Sertifikat Laik Operasi.'
                            ],
                            [
                                'ikon' => 'gear',
                                'judul' => 'Professional & Kompeten',
                                'deskripsi' => 'Seluruh inspeksi dijalankan oleh Penanggung Jawab Teknik (PJT) dan Tenaga Teknik (TT) terregister dan tersertifikasi resmi.'
                            ],
                            [
                                'ikon' => 'rocket',
                                'judul' => 'Tepat Waktu & Solutif',
                                'deskripsi' => 'Memberikan kemudahan proses pemeriksaan serta kepastian sertifikasi instalasi kelistrikan sesuai tenggat waktu yang dijanjikan.'
                            ]
                        ];
                    }
                @endphp
                @foreach($nilaiPerusahaan as $index => $nilai)
                    <div class="bg-white p-8 rounded-2xl border border-slate-200/80 shadow-md hover:shadow-xl transition reveal-on-scroll delay-{{ ($index + 1) * 100 }}">
                        <div class="w-12 h-12 {{ $index % 2 == 0 ? 'bg-blue-600' : 'bg-blue-900' }} text-white rounded-xl flex items-center justify-center mb-6">
                            @php
                                $icon = $nilai['ikon'] ?? null;
                            @endphp
                            @if($icon === 'shield')
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3l7 4v5c0 4.8-3.1 8.1-7 9-3.9-.9-7-4.2-7-9V7l7-4z"></path></svg>
                            @elseif($icon === 'gear')
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"></circle><path stroke-linecap="round" stroke-linejoin="round" d="M19.4 15a1.7 1.7 0 00.3 1.8l.1.1a2 2 0 01-2.8 2.8l-.1-.1a1.7 1.7 0 00-1.8-.3 1.7 1.7 0 00-1 1.5V21a2 2 0 01-4 0v-.2a1.7 1.7 0 00-1-1.5 1.7 1.7 0 00-1.8.3l-.1.1a2 2 0 01-2.8-2.8l.1-.1a1.7 1.7 0 00.3-1.8 1.7 1.7 0 00-1.5-1H3a2 2 0 010-4h.2a1.7 1.7 0 001.5-1 1.7 1.7 0 00-.3-1.8l-.1-.1a2 2 0 012.8-2.8l.1.1a1.7 1.7 0 001.8.3h.1a1.7 1.7 0 001-1.5V3a2 2 0 014 0v.2a1.7 1.7 0 001 1.5h.1a1.7 1.7 0 001.8-.3l.1-.1a2 2 0 012.8 2.8l-.1.1a1.7 1.7 0 00-.3 1.8v.1a1.7 1.7 0 001.5 1H21a2 2 0 010 4h-.2a1.7 1.7 0 00-1.5 1z"></path></svg>
                            @elseif($icon === 'rocket')
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 13l4 4L19 7"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 5h14v14H5z"></path></svg>
                            @else
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3l7 4v5c0 4.8-3.1 8.1-7 9-3.9-.9-7-4.2-7-9V7l7-4z"></path></svg>
                            @endif
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">{{ $nilai['judul'] ?? 'Nilai Perusahaan' }}</h3>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            {{ $nilai['deskripsi'] ?? 'Deskripsi nilai perusahaan' }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-footer />
@endsection

