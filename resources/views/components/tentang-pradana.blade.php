@props(['tentang' => null])

@php
    $title = $tentang->judul ?? 'TENTANG PRADANA';
    $p1 = $tentang->subjudul ?? 'Pradana Nusa Energi adalah penyedia layanan inspeksi dan pemeriksaan keselamatan ketenagalistrikan terkemuka. Dengan pengalaman dan tim tenaga teknik profesional, kami menghadirkan layanan pemeriksaan teknis independen yang membantu instalasi listrik beroperasi secara aman, andal, dan memenuhi standar Sertifikat Laik Operasi (SLO).';
    $p2 = $tentang->konten ?? 'Solusi kami dibangun di atas integritas tinggi dan kepatuhan penuh terhadap regulasi ketenagalistrikan yang berlaku di Indonesia.';
    $cta = $tentang->nilai ?? 'Learn More';
    $image = optional($tentang)->url_gambar ?? 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80';
@endphp

<section id="about" class="py-20 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="reveal-left">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">{{ $title }}</h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    {{ $p1 }}
                </p>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    {{ $p2 }}
                </p>
                <a href="#contact" class="inline-block bg-blue-900 text-white px-8 py-4 rounded font-semibold hover:bg-blue-800 transition shadow-md">
                    {{ $cta }}
                </a>
            </div>
            
            <div class="bg-gray-200 h-96 rounded-lg overflow-hidden reveal-right delay-200 shadow-xl">
                <img src="{{ $image }}" alt="Tentang Pradana" class="w-full h-full object-cover">
            </div>
        </div>
    </div>
</section>

