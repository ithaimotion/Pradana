@props(['kontak' => null])

@php
    $title = strip_tags($kontak->judul ?? 'UPGRADE SMELTER PERFORMANCE WITH CONFIDENCE');
    $subtitle = strip_tags($kontak->subjudul ?? 'Bermitra dengan Pradana Nusa Energi untuk memastikan keselamatan dan keandalan instalasi ketenagalistrikan Anda dengan layanan Sertifikat Laik Operasi (SLO) yang terpercaya.');
    $cta = strip_tags($kontak->konten ?? 'Get Started Today');
    $link = $kontak->nilai ?? '#contact';
    
    // Auto add trailing slash to local routes if they don't have it, or prepend /
    if ($link !== '#contact' && !str_starts_with($link, 'http') && !str_starts_with($link, '#') && !str_starts_with($link, '/')) {
        $link = '/' . $link;
    }
    
    $image = optional($kontak)->url_gambar ?? 'https://images.unsplash.com/photo-1565793298595-6a879b1d9492?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80';
@endphp

<section class="relative py-20 bg-blue-900 overflow-hidden">
    <div class="relative z-10 max-w-7xl mx-auto px-6" data-aos="zoom-in">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="text-left">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                    {{ $title }}
                </h2>
                <p class="text-white/90 text-lg mb-10">
                    {{ $subtitle }}
                </p>
                <a href="{{ $link }}" class="inline-block bg-blue-600 text-white px-8 py-4 rounded font-semibold text-lg hover:bg-blue-700 transition shadow-lg hover:scale-105">
                    {{ $cta }}
                </a>
            </div>
            <div class="rounded-2xl overflow-hidden shadow-2xl">
                <img src="{{ $image }}" alt="Kontak Image" class="w-full h-full object-cover aspect-[4/3] md:aspect-video lg:aspect-auto lg:h-[400px]">
            </div>
        </div>
    </div>
</section>

