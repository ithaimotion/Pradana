@props(['kontak' => null])

@php
    $title = $kontak->judul ?? 'UPGRADE SMELTER PERFORMANCE WITH CONFIDENCE';
    $subtitle = $kontak->subjudul ?? 'Bermitra dengan Pradana Nusa Energi untuk memastikan keselamatan dan keandalan instalasi ketenagalistrikan Anda dengan layanan Sertifikat Laik Operasi (SLO) yang terpercaya.';
    $cta = $kontak->konten ?? 'Get Started Today';
    $image = optional($kontak)->url_gambar ?? 'https://images.unsplash.com/photo-1565793298595-6a879b1d9492?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80';
@endphp

<section class="relative py-20 bg-blue-900 overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ $image }}" alt="Kontak Background" class="w-full h-full object-cover opacity-20">
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center reveal-scale">
        <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-6">
            {{ $title }}
        </h2>
        <p class="text-white/90 text-lg mb-10 max-w-3xl mx-auto">
            {{ $subtitle }}
        </p>
        <a href="#contact" class="inline-block bg-blue-600 text-white px-8 py-4 rounded font-semibold text-lg hover:bg-blue-700 transition shadow-lg hover:scale-105">
            {{ $cta }}
        </a>
    </div>
</section>

