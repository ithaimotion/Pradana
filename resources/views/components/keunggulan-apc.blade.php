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

<section id="products" class="py-20 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-0 rounded-lg overflow-hidden shadow-xl">
            <div class="bg-gray-200 h-96 md:h-auto reveal-left">
                <img src="{{ $headerGambar }}" alt="Industrial facility" class="w-full h-full object-cover">
            </div>
            
            <div class="bg-orange-500 p-12 flex flex-col justify-center reveal-right delay-200">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                    {{ $headerJudul }}
                </h2>
                <p class="text-white/90 mb-8 leading-relaxed">
                    {{ $headerKonten }}
                </p>
                
                <ul class="space-y-4 mb-8">
                    @foreach($featureList as $feature)
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-white flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-white font-medium">
                                <strong class="uppercase">{{ $feature->judul }}</strong>
                                @if(!empty($feature->konten))
                                    - {{ $feature->konten }}
                                @endif
                            </span>
                        </li>
                    @endforeach
                </ul>
                
                <a href="#contact" class="inline-block bg-blue-900 text-white px-8 py-4 rounded font-semibold hover:bg-blue-800 transition w-fit shadow-md">
                    Learn More
                </a>
            </div>
        </div>
    </div>
</section>

