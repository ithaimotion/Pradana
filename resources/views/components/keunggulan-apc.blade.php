@props(['header' => null, 'items' => null])

@php
    $headerJudul = $header->judul ?? 'APC+ — INTELLIGENCE THAT POWERS PERFORMANCE';
    $headerKonten = $header->konten ?? 'Our Advanced Process Control+ system combines cutting-edge AI technology with decades of industry expertise to deliver unmatched smelting performance.';
    $headerGambar = optional($header)->url_gambar ?? 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80';

    $defaultFeatureItems = collect([
        (object)['judul' => 'SMARTER SMELTER', 'konten' => 'AI-powered optimization'],
        (object)['judul' => 'DATA-DRIVEN INSIGHTS', 'konten' => 'Real-time analytics'],
        (object)['judul' => 'ENERGY EFFICIENCY', 'konten' => 'Reduced consumption'],
        (object)['judul' => 'PREDICTIVE MAINTENANCE', 'konten' => 'Proactive solutions'],
    ]);

    $featureList = ($items && count($items) > 0) ? $items : $defaultFeatureItems;
@endphp

<section id="products" class="py-24 overflow-hidden bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-0 rounded-[2.5rem] overflow-hidden shadow-2xl relative group">
            <div class="bg-gray-200 h-96 md:h-auto reveal-left relative overflow-hidden">
                <img src="{{ $headerGambar }}" alt="Industrial facility" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-r from-transparent to-blue-900/50"></div>
            </div>
            
            <div class="bg-gradient-to-br from-blue-900 to-blue-950 p-12 md:p-16 flex flex-col justify-center reveal-right delay-200 relative overflow-hidden">
                <!-- Decorative Circle -->
                <div class="absolute -top-24 -right-24 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl"></div>
                
                <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-6 leading-tight relative z-10">
                    {{ $headerJudul }}
                </h2>
                <p class="text-blue-100/90 mb-10 leading-relaxed font-light text-lg relative z-10">
                    {{ $headerKonten }}
                </p>
                
                <ul class="space-y-6 mb-10 relative z-10">
                    @foreach($featureList as $feature)
                        <li class="flex items-start gap-4">
                            <div class="w-8 h-8 rounded-full bg-blue-500/20 flex items-center justify-center flex-shrink-0 mt-1 text-blue-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-white font-medium text-lg">
                                <strong class="uppercase text-blue-200">{{ $feature->judul }}</strong>
                                @if(!empty($feature->konten))
                                    <span class="text-blue-100/70 font-light block mt-1 text-sm">{{ $feature->konten }}</span>
                                @endif
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

