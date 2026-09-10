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
    $subtitle = strip_tags($hero->subjudul ?? 'Advanced process control and optimization solutions for the primary aluminium industry');
    $cta = strip_tags($hero->konten ?? 'Contact Us');
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
        <h1 data-aos="fade-down" data-aos-duration="1000" class="text-3xl md:text-5xl lg:text-7xl font-extrabold text-white mb-2 leading-[1.1] uppercase tracking-tight drop-shadow-2xl text-center whitespace-nowrap w-full">
            {!! $titleHtml !!}
        </h1>
        <div class="flex justify-center w-full mb-10 px-2 sm:px-4 pointer-events-none" data-aos="zoom-in" data-aos-delay="200">
            <!-- SVG Petir Lebar & Tinggi yang presisi. Petir maksimal di X=200 agar aman dari teks -->
            <svg viewBox="150 10     1920 220" class="w-full max-w-5xl md:max-w-6xl lg:max-w-7xl overflow-visible drop-shadow-[0_0_8px_rgba(255,255,255,0.15)]" xmlns="http://www.w3.org/2000/svg">
                <!-- Red Lightning & Underline -->
                <!-- Zigzag diatur ketat di sisi kiri (maks x=200) agar teks yang center sempurna tidak tertabrak -->
                <polyline points="200,-150 50,-150 -25,-50 125,-50 10,100 50,50 1900,50" fill="none" stroke="#ef4444" stroke-width="9" stroke-linejoin="miter" stroke-linecap="square"/>
                
                <!-- Yellow Line (X dimulai dari 75 agar tidak tembus garis merah) -->
                <line x1="75" y1="80" x2="1880" y2="80" stroke="#facc15" stroke-width="9" stroke-linecap="square"/>
                
                <!-- Black Line (X dimulai dari 40 karena merah sudah habis di Y=100) -->
                <line x1="40" y1="110" x2="1920" y2="110" stroke="#000000" stroke-width="9" stroke-linecap="square"/>
            </svg>
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
