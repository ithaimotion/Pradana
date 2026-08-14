@props(['tentang' => null])

@php
    $title = $tentang->judul ?? 'TENTANG PRADANA';
    $p1 = $tentang->subjudul ?? 'Pradana Nusa Energi adalah penyedia layanan inspeksi dan pemeriksaan keselamatan ketenagalistrikan terkemuka. Dengan pengalaman dan tim tenaga teknik profesional, kami menghadirkan layanan pemeriksaan teknis independen yang membantu instalasi listrik beroperasi secara aman, andal, dan memenuhi standar Sertifikat Laik Operasi (SLO).';
    $p2 = $tentang->konten ?? 'Solusi kami dibangun di atas integritas tinggi dan kepatuhan penuh terhadap regulasi ketenagalistrikan yang berlaku di Indonesia.';
    $cta = $tentang->nilai ?? 'Learn More';
    $image = optional($tentang)->url_gambar ?? 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80';
@endphp

<section id="about" class="py-24 bg-slate-50 relative overflow-hidden">
    <!-- Decorative subtle grid -->
    <div class="absolute inset-0 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px]"></div>

    <div class="relative max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <span class="text-blue-600 font-bold tracking-wider uppercase text-sm mb-4 block">Tentang Kami</span>
                <h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-8 leading-tight">{{ $title }}</h2>
                <div class="space-y-6 text-lg text-slate-600 leading-relaxed font-light">
                    <p>
                        {{ $p1 }}
                    </p>
                    <p>
                        {{ $p2 }}
                    </p>
                </div>
                <div class="mt-10">
                    <a href="{{ route('profil.perusahaan') }}" class="inline-flex items-center gap-2 bg-slate-900 hover:bg-blue-600 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-blue-500/30 hover:-translate-y-1">
                        {{ $cta }}
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
            
            <div class="relative" data-aos="fade-left" data-aos-delay="200">
                <!-- Decorative blue accent block behind image -->
                <div class="absolute -inset-4 bg-gradient-to-tr from-blue-100 to-blue-50 rounded-[2.5rem] transform rotate-3"></div>
                <div class="relative rounded-3xl overflow-hidden shadow-2xl bg-white aspect-[4/3] group">
                    <img src="{{ $image }}" alt="Tentang Pradana" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                </div>
            </div>
        </div>
    </div>
</section>
