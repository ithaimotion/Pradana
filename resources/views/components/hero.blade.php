@props(['hero' => null])

@php
    $title = $hero->judul ?? 'POWERING THE FUTURE OF PRIMARY ALUMINIUM';
    $subtitle = $hero->subjudul ?? 'Advanced process control and optimization solutions for the primary aluminium industry';
    $cta = $hero->konten ?? 'Contact Us';
    $slides = collect([
        $hero?->url_gambar,
        $hero?->url_gambar_2,
        $hero?->url_gambar_3,
    ])
    ->filter()
    ->map(fn($image) => ['image' => $image])
    ->values();
@endphp

<section class="relative h-screen flex items-center justify-center overflow-hidden bg-slate-900" x-data="{ activeSlide: 0, slides: {{ json_encode($slides->toArray()) }} }" x-init="setInterval(() => { activeSlide = (activeSlide + 1) % slides.length; }, 6000)">
    <div class="absolute inset-0">
        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="activeSlide === index" 
                 x-transition:enter="transition duration-1000 ease-out" 
                 x-transition:enter-start="opacity-0 scale-110" 
                 x-transition:enter-end="opacity-100 scale-100" 
                 x-transition:leave="transition duration-1000 ease-in" 
                 x-transition:leave-start="opacity-100 scale-100" 
                 x-transition:leave-end="opacity-0 scale-110" 
                 class="absolute inset-0 bg-cover bg-center" 
                 :style="'background-image: url(' + slide.image + ')'">
                 <!-- Modern gradient overlay -->
                <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/40 to-slate-900/90"></div>
            </div>
        </template>
    </div>

    <div class="relative z-10 text-center px-6 max-w-6xl reveal-scale mt-16">
        <span class="inline-block py-1 px-3 rounded-full bg-blue-500/20 border border-blue-400/30 text-blue-300 text-sm font-semibold tracking-widest uppercase mb-6 backdrop-blur-sm">
            Welcome to Pradana
        </span>
        <h1 class="text-5xl md:text-7xl lg:text-8xl font-extrabold text-white mb-6 leading-[1.1] uppercase tracking-tight drop-shadow-2xl">
            {!! nl2br(e($title)) !!}
        </h1>
        <p class="text-xl md:text-2xl text-slate-300 mb-10 max-w-3xl mx-auto leading-relaxed font-light drop-shadow">
            {{ $subtitle }}
        </p>
        <a href="#about" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-500 text-white px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 shadow-[0_0_40px_rgba(37,99,235,0.4)] hover:shadow-[0_0_60px_rgba(37,99,235,0.6)] hover:-translate-y-1">
            {{ $cta }}
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
        </a>
    </div>

    <!-- Minimalist Slide Indicators -->
    <div class="absolute bottom-12 left-1/2 -translate-x-1/2 z-10 flex gap-3">
        <template x-for="(slide, index) in slides" :key="index">
            <button @click="activeSlide = index" 
                    :class="activeSlide === index ? 'w-8 bg-blue-500' : 'w-2 bg-white/40 hover:bg-white/70'" 
                    class="h-2 rounded-full transition-all duration-300"></button>
        </template>
    </div>
</section>
