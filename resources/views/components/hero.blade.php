@props(['hero' => null])

@php
    $title = $hero->judul ?? 'POWERING THE FUTURE OF PRIMARY ALUMINIUM';
    $subtitle = $hero->subjudul ?? 'Advanced process control and optimization solutions for the primary aluminium industry';
    $cta = $hero->konten ?? 'Contact Us';
    $bgImage = $hero->url_gambar ?? 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80';
@endphp

<section class="relative h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center transition-all duration-700" style="background-image: url('{{ $bgImage }}');">
        <div class="absolute inset-0 bg-black/50"></div>
    </div>
    
    <div class="relative z-10 text-center px-6 max-w-5xl reveal-scale">
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white mb-6 leading-tight uppercase tracking-tight">
            {!! nl2br(e($title)) !!}
        </h1>
        <p class="text-xl text-white/90 mb-10 max-w-3xl mx-auto leading-relaxed">
            {{ $subtitle }}
        </p>
        <a href="#contact" class="inline-block bg-orange-500 text-white px-8 py-4 rounded font-semibold text-lg hover:bg-orange-600 transition shadow-lg hover:scale-105">
            {{ $cta }}
        </a>
    </div>
</section>
