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
            <p class="text-lg md:text-xl text-white/90 max-w-3xl mx-auto leading-relaxed">
                {{ strip_tags($konten->subjudul ?? 'Lembaga Inspeksi Teknik (LIT) terkemuka dan terpercaya yang bergerak di bidang pengujian dan pemeriksaan kelistrikan untuk mewujudkan tenaga listrik yang aman, andal, dan ramah lingkungan.') }}
            </p>
        </div>
    </section>

    <!-- Tentang Perusahaan -->
    <section class="py-20 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="reveal-left">
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-6 leading-tight">
                        {{ strip_tags($konten->nilai ?? 'Komitmen Kami Terhadap Keselamatan & Ketenagalistrikan') }}
                    </h2>
                    <p class="text-slate-600 mb-6 leading-relaxed">
                        {{ strip_tags($konten->konten ?? 'PT Pradana Nusa Energi berdiri sebagai Lembaga Inspeksi Teknik terakreditasi yang berkomitmen mendukung program pemerintah dalam penegakan Sertifikat Laik Operasi (SLO) di Indonesia. Dengan didukung oleh Tim Tenaga Teknik (TT) dan Penanggung Jawab Teknik (PJT) bersertifikat kompetensi resmi, kami memberikan layanan inspeksi ketenagalistrikan yang tepat waktu, presisi, independen, dan berstandar nasional.') }}
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
                $misiData = $konten->misi ?? null;
                $misiList = [];
                
                if (is_array($misiData) && !empty($misiData)) {
                    $misiList = $misiData;
                } elseif (is_string($misiData) && trim($misiData) !== '') {
                    $misiList = array_filter(array_map('trim', explode("\n", $misiData)));
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
                     "{{ strip_tags($konten->visi ?? 'Menjadi Lembaga Inspeksi Teknik yang ikut serta mewujudkan instalasi ketenagalistrikan yang memenuhi kaidah K2 (Keselamatan Ketenagalistrikan) yang aman, andal, dan ramah lingkungan di Indonesia.') }}"
                 </p>
            </div>

            <!-- Misi Section -->
            @php
                $misiArray = is_array($konten->misi) ? $konten->misi : $misiList;
                // Ensure we have exactly 4 items for the layout (or max 4)
                $misiItems = array_slice($misiArray, 0, 4);
                
                // Helper to get text and image
                $getMisiData = function($misi) {
                    $teks = is_array($misi) ? ($misi['teks_misi'] ?? '') : $misi;
                    $teks = strip_tags($teks);
                    $foto = is_array($misi) && isset($misi['foto_misi']) && !empty($misi['foto_misi']) 
                        ? \Illuminate\Support\Facades\Storage::disk('public')->url($misi['foto_misi']) 
                        : 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=900&q=80';
                    return ['teks' => $teks, 'foto' => $foto];
                };
            @endphp

            <!-- Mobile Layout (Hidden on LG) -->
            <div class="w-full mt-16 grid grid-cols-1 md:grid-cols-2 gap-8 z-20 lg:hidden">
                @foreach($misiItems as $index => $misi)
                    @php $data = $getMisiData($misi); @endphp
                    <div class="bg-white rounded-2xl p-6 shadow-xl border border-slate-100 flex items-start gap-4 reveal-up">
                        <div class="w-12 h-12 bg-blue-600 text-white rounded-xl flex items-center justify-center font-bold text-lg shrink-0">
                            {{ $index + 1 }}
                        </div>
                        <div>
                            <h4 class="text-blue-900 font-bold mb-2 text-lg">Misi {{ $index + 1 }}</h4>
                            <p class="text-slate-600 font-medium text-[15px] leading-relaxed">
                                {{ $data['teks'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Desktop Circular Layout (Hidden below LG) -->
            <div class="w-full mt-24 relative z-20 hidden lg:flex flex-row items-center justify-center gap-12 xl:gap-20 max-w-[1300px] mx-auto px-6">
                
                <!-- Left Side Texts (Misi 1 & 2) -->
                <div class="flex-1 flex flex-col justify-center space-y-24 max-w-[320px]">
                    @if(isset($misiItems[0]))
                        @php $data0 = $getMisiData($misiItems[0]); @endphp
                        <!-- Misi 1 (Top Left) -->
                        <div class="flex flex-row items-start gap-5 text-right justify-end group reveal-left">
                            <div class="flex-1 pt-1">
                                <p class="text-blue-900 font-semibold text-sm leading-relaxed">{{ $data0['teks'] }}</p>
                            </div>
                            <div class="w-12 h-12 bg-white text-blue-600 rounded-full flex items-center justify-center shrink-0 group-hover:bg-blue-600 group-hover:text-white transition-all shadow-[0_4px_20px_rgba(0,0,0,0.08)] group-hover:shadow-blue-600/40">
                                <span class="font-bold text-lg">1</span>
                            </div>
                        </div>
                    @endif

                    @if(isset($misiItems[1]))
                        @php $data1 = $getMisiData($misiItems[1]); @endphp
                        <!-- Misi 2 (Bottom Left) -->
                        <div class="flex flex-row items-start gap-5 text-right justify-end group reveal-left delay-200">
                            <div class="flex-1 pt-1">
                                <p class="text-blue-900 font-semibold text-sm leading-relaxed">{{ $data1['teks'] }}</p>
                            </div>
                            <div class="w-12 h-12 bg-white text-blue-600 rounded-full flex items-center justify-center shrink-0 group-hover:bg-blue-600 group-hover:text-white transition-all shadow-[0_4px_20px_rgba(0,0,0,0.08)] group-hover:shadow-blue-600/40">
                                <span class="font-bold text-lg">2</span>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Center Circular Images -->
                <div class="relative w-[380px] h-[380px] xl:w-[440px] xl:h-[440px] rounded-full shrink-0 mx-auto bg-white p-2.5 shadow-2xl reveal-scale aspect-square">
                    <!-- Cross/Plus Gap Background is achieved by the gap-2 on the grid and bg-white of container -->
                    <div class="w-full h-full rounded-full overflow-hidden grid grid-cols-2 grid-rows-2 gap-2.5 relative bg-white">
                        <!-- Quadrant 1 (Top Left) -->
                        <div class="relative overflow-hidden group">
                            <img src="{{ isset($misiItems[0]) ? $getMisiData($misiItems[0])['foto'] : 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=900&q=80' }}" class="w-full h-full object-cover filter grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-700" alt="Misi 1">
                        </div>
                        <!-- Quadrant 3 (Top Right - Misi 3) -->
                        <div class="relative overflow-hidden group">
                            <img src="{{ isset($misiItems[2]) ? $getMisiData($misiItems[2])['foto'] : 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=900&q=80' }}" class="w-full h-full object-cover filter grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-700" alt="Misi 3">
                        </div>
                        <!-- Quadrant 2 (Bottom Left - Misi 2) -->
                        <div class="relative overflow-hidden group">
                            <img src="{{ isset($misiItems[1]) ? $getMisiData($misiItems[1])['foto'] : 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?w=900&q=80' }}" class="w-full h-full object-cover filter grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-700" alt="Misi 2">
                        </div>
                        <!-- Quadrant 4 (Bottom Right - Misi 4) -->
                        <div class="relative overflow-hidden group">
                            <img src="{{ isset($misiItems[3]) ? $getMisiData($misiItems[3])['foto'] : 'https://images.unsplash.com/photo-1541888087640-1bc7bb1f016d?w=900&q=80' }}" class="w-full h-full object-cover filter grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-700" alt="Misi 4">
                        </div>
                        
                        <!-- Center Hole -->
                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-28 h-28 bg-white rounded-full z-10 flex items-center justify-center shadow-[0_4px_15px_rgba(0,0,0,0.15)]">
                            <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side Texts (Misi 3 & 4) -->
                <div class="flex-1 flex flex-col justify-center space-y-24 max-w-[320px]">
                    @if(isset($misiItems[2]))
                        @php $data2 = $getMisiData($misiItems[2]); @endphp
                        <!-- Misi 3 (Top Right) -->
                        <div class="flex flex-row items-start gap-5 text-left group reveal-right">
                            <div class="w-12 h-12 bg-white text-blue-600 rounded-full flex items-center justify-center shrink-0 group-hover:bg-blue-600 group-hover:text-white transition-all shadow-[0_4px_20px_rgba(0,0,0,0.08)] group-hover:shadow-blue-600/40">
                                <span class="font-bold text-lg">3</span>
                            </div>
                            <div class="flex-1 pt-1">
                                <p class="text-blue-900 font-semibold text-sm leading-relaxed">{{ $data2['teks'] }}</p>
                            </div>
                        </div>
                    @endif

                    @if(isset($misiItems[3]))
                        @php $data3 = $getMisiData($misiItems[3]); @endphp
                        <!-- Misi 4 (Bottom Right) -->
                        <div class="flex flex-row items-start gap-5 text-left group reveal-right delay-200">
                            <div class="w-12 h-12 bg-white text-blue-600 rounded-full flex items-center justify-center shrink-0 group-hover:bg-blue-600 group-hover:text-white transition-all shadow-[0_4px_20px_rgba(0,0,0,0.08)] group-hover:shadow-blue-600/40">
                                <span class="font-bold text-lg">4</span>
                            </div>
                            <div class="flex-1 pt-1">
                                <p class="text-blue-900 font-semibold text-sm leading-relaxed">{{ $data3['teks'] }}</p>
                            </div>
                        </div>
                    @endif
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
                        <h3 class="text-xl font-bold text-slate-900 mb-3">{{ strip_tags($nilai['judul'] ?? 'Nilai Perusahaan') }}</h3>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            {{ strip_tags($nilai['deskripsi'] ?? 'Deskripsi nilai perusahaan') }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-footer />
@endsection

