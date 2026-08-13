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
    <section class="py-24 bg-slate-50 relative overflow-hidden font-sans">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-40 bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:24px_24px]"></div>
        
        <div class="max-w-[1400px] mx-auto px-6 md:px-12 relative z-10">
            <!-- Header -->
            <div class="text-center mb-12 reveal-on-scroll">
                <h2 class="text-3xl md:text-4xl font-bold text-blue-900 tracking-tight uppercase">Visi & Misi</h2>
            </div>

            @php
                $misiText = $konten->misi ?? null;
                if ($misiText) {
                    $misiList = array_filter(array_map('trim', explode("\n", $misiText)));
                    $misiList = array_map(function($item) {
                        return preg_replace('/^\d+[\.\)]\s*/', '', $item);
                    }, $misiList);
                    $misiList = array_values($misiList);
                } else {
                    $misiList = [
                        'Melaksanakan pemeriksaan dan pengujian sesuai dengan peraturan Perundang-Undangan yang berlaku di Indonesia.',
                        'Melaksanakan pemeriksaan dan pengujian secara profesional, tepat waktu, jujur dan bertanggung jawab dengan dukungan Tenaga Teknik yang kompeten dan terstandar.',
                        'Memberikan layanan secara tepat waktu, tepat mutu yang kompetitif, solutif, dan independen.',
                    ];
                }
                
                // Pastikan ada minimal 4 misi untuk layout
                if(count($misiList) < 4) {
                    $misiList[] = 'Meningkatkan kompetensi dan profesionalisme sumber daya manusia secara berkesinambungan untuk mencapai keunggulan layanan.';
                }
            @endphp

            <!-- Visi Section - Standalone -->
            <div class="max-w-4xl mx-auto mb-20 text-center reveal-up">
                 <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-blue-600 text-white mb-6 shadow-lg shadow-blue-600/30">
                     <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                 </div>
                 <h3 class="text-xl font-bold text-slate-400 mb-2 uppercase tracking-widest">Visi Kami</h3>
                 <p class="text-xl md:text-2xl text-slate-800 leading-relaxed font-semibold italic">
                     "{{ $konten->visi ?? 'Menjadi Lembaga Inspeksi Teknik yang ikut serta mewujudkan instalasi ketenagalistrikan yang memenuhi kaidah K2 (Keselamatan Ketenagalistrikan) yang aman, andal, dan ramah lingkungan di Indonesia.' }}"
                 </p>
            </div>

            <!-- Misi Section - 4 quadrants -->
            <div class="w-full flex flex-col lg:flex-row items-center justify-center gap-10 lg:gap-12 mt-10">
                
                <!-- Left Column (Misi 1 & 3) -->
                <div class="flex-1 flex flex-col gap-8 md:gap-12 w-full max-w-lg lg:max-w-none z-20">
                    <!-- Misi 1 -->
                    <div class="flex flex-row lg:flex-row-reverse gap-4 items-start text-left lg:text-right reveal-left">
                        <div class="w-12 h-12 shrink-0 mt-1 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center shadow-sm">
                            <span class="font-bold text-xl">1</span>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-blue-900 font-bold mb-2">Misi Pertama</h4>
                            <p class="text-slate-600 font-medium text-[15px] leading-relaxed">
                                {{ $misiList[0] ?? '' }}
                            </p>
                        </div>
                    </div>

                    <!-- Misi 3 -->
                    <div class="flex flex-row lg:flex-row-reverse gap-4 items-start text-left lg:text-right reveal-left" style="animation-delay: 0.2s;">
                        <div class="w-12 h-12 shrink-0 mt-1 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center shadow-sm">
                            <span class="font-bold text-xl">3</span>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-blue-900 font-bold mb-2">Misi Ketiga</h4>
                            <p class="text-slate-600 font-medium text-[15px] leading-relaxed">
                                {{ $misiList[2] ?? '' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Center Circular Image (Divided into 4 quadrants) -->
                <div class="w-72 h-72 lg:w-[400px] lg:h-[400px] xl:w-[450px] xl:h-[450px] shrink-0 rounded-full overflow-hidden reveal-on-scroll relative bg-white shadow-2xl border-4 border-white z-10 order-first lg:order-none mb-10 lg:mb-0">
                    <div class="absolute inset-0 grid grid-cols-2 grid-rows-2 gap-2 p-2 bg-slate-100">
                        <!-- Top Left Image -->
                        <div class="relative w-full h-full rounded-tl-full overflow-hidden group">
                            <img src="{{ optional($konten)->foto_misi ? \Illuminate\Support\Facades\Storage::disk('public')->url($konten->foto_misi) : 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=900&q=80' }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 filter grayscale group-hover:grayscale-0" alt="Misi 1">
                        </div>
                        <!-- Top Right Image -->
                        <div class="relative w-full h-full rounded-tr-full overflow-hidden group">
                            <img src="{{ optional($konten)->foto_visi ? \Illuminate\Support\Facades\Storage::disk('public')->url($konten->foto_visi) : 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=900&q=80' }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 filter grayscale group-hover:grayscale-0" alt="Misi 2">
                        </div>
                        <!-- Bottom Left Image -->
                        <div class="relative w-full h-full rounded-bl-full overflow-hidden group">
                            <img src="{{ optional($konten)->url_gambar ? \Illuminate\Support\Facades\Storage::disk('public')->url($konten->url_gambar) : 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=900&q=80' }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 filter grayscale group-hover:grayscale-0" alt="Misi 3">
                        </div>
                        <!-- Bottom Right Image -->
                        <div class="relative w-full h-full rounded-br-full overflow-hidden group">
                            <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=900&q=80" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 filter grayscale group-hover:grayscale-0" alt="Misi 4">
                        </div>
                    </div>
                    <!-- Center Inner Circle -->
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-20 h-20 lg:w-28 lg:h-28 bg-white rounded-full flex items-center justify-center z-20 shadow-inner">
                        <div class="w-12 h-12 lg:w-16 lg:h-16 bg-blue-50 rounded-full flex items-center justify-center text-blue-600">
                            <svg class="w-6 h-6 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                    </div>
                </div>

                <!-- Right Column (Misi 2 & 4) -->
                <div class="flex-1 flex flex-col gap-8 md:gap-12 w-full max-w-lg lg:max-w-none z-20">
                    <!-- Misi 2 -->
                    <div class="flex flex-row gap-4 items-start text-left reveal-right">
                        <div class="w-12 h-12 shrink-0 mt-1 bg-blue-900 text-white rounded-xl flex items-center justify-center shadow-sm shadow-blue-900/20">
                            <span class="font-bold text-xl">2</span>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-blue-900 font-bold mb-2">Misi Kedua</h4>
                            <p class="text-slate-600 font-medium text-[15px] leading-relaxed">
                                {{ $misiList[1] ?? '' }}
                            </p>
                        </div>
                    </div>

                    <!-- Misi 4 -->
                    <div class="flex flex-row gap-4 items-start text-left reveal-right" style="animation-delay: 0.2s;">
                        <div class="w-12 h-12 shrink-0 mt-1 bg-blue-900 text-white rounded-xl flex items-center justify-center shadow-sm shadow-blue-900/20">
                            <span class="font-bold text-xl">4</span>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-blue-900 font-bold mb-2">Misi Keempat</h4>
                            <p class="text-slate-600 font-medium text-[15px] leading-relaxed">
                                {{ $misiList[3] ?? '' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tambahan jika Misi lebih dari 4 -->
            @if(count($misiList) > 4)
                <div class="w-full max-w-5xl mx-auto mt-24 grid grid-cols-1 md:grid-cols-2 gap-10 z-20 relative">
                    @for($i=4; $i<count($misiList); $i++)
                         <div class="flex gap-4 items-start reveal-up">
                            <div class="w-12 h-12 shrink-0 mt-1 bg-slate-200 text-slate-700 rounded-xl flex items-center justify-center shadow-sm">
                                <span class="font-bold text-xl">{{ $i+1 }}</span>
                            </div>
                            <div>
                                <h4 class="text-blue-900 font-bold mb-2">Misi {{ $i+1 }}</h4>
                                <p class="text-slate-600 font-medium text-[15px] leading-relaxed">
                                    {{ $misiList[$i] }}
                                </p>
                            </div>
                        </div>
                    @endfor
                </div>
            @endif
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

