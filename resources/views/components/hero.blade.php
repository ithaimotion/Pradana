@props(['hero' => null])

@php
    $title = $hero->judul ?? 'POWERING THE FUTURE OF PRIMARY ALUMINIUM';
    $subtitle = $hero->subjudul ?? 'Advanced process control and optimization solutions for the primary aluminium industry';
    $cta = $hero->konten ?? 'Contact Us';
    $slides = collect([
        ['image' => $hero?->url_gambar ?? 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80'],
        ['image' => $hero?->url_gambar_2 ?? 'https://images.unsplash.com/photo-1518770660439-4636190af475?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80'],
        ['image' => $hero?->url_gambar_3 ?? 'https://images.unsplash.com/photo-1497436072909-60f360e1d4b1?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80'],
    ]);
@endphp

<section class="relative h-screen flex items-center justify-center overflow-hidden" x-data="{ activeSlide: 0, slides: {{ json_encode($slides->toArray()) }} }" x-init="setInterval(() => { activeSlide = (activeSlide + 1) % slides.length; }, 5000)">
    <div class="absolute inset-0">
        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="activeSlide === index" x-transition:enter="transition duration-1000 ease-out" x-transition:enter-start="opacity-0 scale-105" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition duration-700 ease-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-105" class="absolute inset-0 bg-cover bg-center" :style="`background-image: url('${slide.image}')`">
                <div class="absolute inset-0 bg-black/60"></div>
            </div>
        </template>
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

    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 flex gap-2">
        <template x-for="(slide, index) in slides" :key="index">
            <button @click="activeSlide = index" :class="activeSlide === index ? 'bg-white' : 'bg-white/50'" class="h-2.5 w-2.5 rounded-full transition"></button>
        </template>
    </div>
</section>
