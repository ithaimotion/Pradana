@props(['header' => null, 'items' => null])

@php
    $headerJudul = $header->judul ?? 'INTEGRATED TECHNOLOGIES FOR SMARTER SMELTING';
    $defaultTechItems = collect([
        (object)['title' => 'WEB-BASED HMI', 'content' => 'Accessible from anywhere, real-time monitoring and control', 'icon' => 'hmi'],
        (object)['title' => 'HIGH PERFORMANCE', 'content' => 'Optimized algorithms for maximum efficiency and output', 'icon' => 'performance'],
        (object)['title' => 'SMART DATA', 'content' => 'Advanced analytics and machine learning capabilities', 'icon' => 'data'],
        (object)['title' => 'REAL-TIME', 'content' => 'Instant data processing and decision making', 'icon' => 'realtime'],
    ]);

    $itemList = ($items && count($items) > 0) ? $items : $defaultTechItems;
@endphp

<section id="technology" class="py-20 bg-gray-50 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 text-center mb-16 reveal-on-scroll">
            {{ $headerJudul }}
        </h2>
        
        <div class="grid md:grid-cols-4 gap-6 mb-12">
            @foreach($itemList as $index => $item)
                @php
                    $isHighlighted = ($index == 2);
                @endphp
                <div class="{{ $isHighlighted ? 'bg-orange-500 text-white' : 'bg-white text-gray-800' }} p-6 rounded-lg shadow-md hover:shadow-lg transition reveal-on-scroll delay-{{ ($index + 1) * 100 }}">
                    <div class="w-12 h-12 {{ $isHighlighted ? 'bg-white text-orange-500' : 'bg-orange-500 text-white' }} rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2 uppercase">{{ $item->judul }}</h3>
                    <p class="{{ $isHighlighted ? 'text-white/90' : 'text-gray-600' }} text-sm">{{ $item->konten }}</p>
                </div>
            @endforeach
        </div>
        
        <div class="flex justify-center gap-4 reveal-on-scroll delay-500">
            <a href="#contact" class="bg-blue-900 text-white px-8 py-4 rounded font-semibold hover:bg-blue-800 transition shadow-md">
                Learn More
            </a>
            <a href="#products" class="bg-orange-500 text-white px-8 py-4 rounded font-semibold hover:bg-orange-600 transition shadow-md">
                View Products
            </a>
        </div>
    </div>
</section>
