@props(['hero' => null])

@php
    $baseTitle = $hero->judul ?? 'POWERING THE FUTURE OF PRIMARY ALUMINIUM';
    $titleEnergi = trim($hero->judul_energi ?? '');
    $titleMain = e($baseTitle);
    $titleHtml = '';

    if ($titleEnergi !== '') {
        $titleHtml = '<span class="text-blue-500">' . nl2br($titleMain) . '</span> <span class="text-green-500">' . nl2br(e($titleEnergi)) . '</span>';
    } else {
        $titleHtml = preg_replace('/(PT\.\?\s*Pradana Nusa)(\s+Energi)/i', '<span class="text-blue-500">$1</span><span class="text-green-500">$2</span>', nl2br($titleMain));
    }
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

    // Default opacity jika tidak diset
    $baseOpacity = floatval($hero->nilai ?? 0.45);
    
    // Gradasi dibuat berdasarkan baseOpacity
    $opacityTop = min(1.0, $baseOpacity + 0.10);
    $opacityBottom = min(1.0, $baseOpacity + 0.20);
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
                <div class="absolute inset-0" style="background: linear-gradient(to bottom, rgba(0,0,0,{{ $opacityTop }}), rgba(0,0,0,{{ $baseOpacity }}), rgba(15,23,42,{{ $opacityBottom }}));"></div>
            </div>
        </template>
    </div>

    <div class="relative z-10 text-center px-6 max-w-6xl mt-16">
        <h1 data-aos="fade-down" data-aos-duration="1000" class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-white mb-4 leading-[1.1] uppercase tracking-tight drop-shadow-2xl">
            {!! $titleHtml !!}
        </h1>
        <div class="flex flex-col items-center gap-2 mb-8">
            <div data-aos="fade-right" data-aos-delay="200" class="h-1 w-72 md:w-96 rounded-full bg-red-500"></div>
            <div data-aos="fade-left" data-aos-delay="400" class="h-1 w-44 md:w-56 rounded-full bg-blue-500"></div>
            <div data-aos="fade-right" data-aos-delay="600" class="h-1 w-24 md:w-32 rounded-full bg-green-500"></div>
        </div>
        <p data-aos="fade-up" data-aos-delay="800" class="text-xl md:text-2xl text-slate-300 mb-10 max-w-3xl mx-auto leading-relaxed font-light drop-shadow">
            {{ $subtitle }}
        </p>
        <a data-aos="zoom-in" data-aos-delay="1000" href="#about" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-500 text-white px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 shadow-[0_0_40px_rgba(37,99,235,0.4)] hover:shadow-[0_0_60px_rgba(37,99,235,0.6)] hover:-translate-y-1">
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
