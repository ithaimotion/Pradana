@props(['header' => null, 'items' => null])

@php
    $headerJudul = $header->judul ?? 'ENGINEERING A LOWER-CARBON ALUMINIUM FUTURE';
    $defaultEnergiItems = collect([
        (object)['title' => 'DECARBONIZATION', 'content' => 'Reduce carbon footprint through innovative smelting technologies and process optimization'],
        (object)['title' => 'ENERGY EFFICIENCY', 'content' => 'Optimize energy consumption with smart control systems and real-time monitoring'],
        (object)['title' => 'LONG-TERM GROWTH', 'content' => 'Sustainable solutions that ensure long-term profitability and environmental responsibility'],
    ]);

    $itemList = ($items && count($items) > 0) ? $items : $defaultEnergiItems;
@endphp

<section id="sustainability" class="py-20 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 text-center mb-16 reveal-on-scroll">
            {{ $headerJudul }}
        </h2>
        
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($itemList as $index => $item)
                <div class="bg-gray-50 p-8 rounded-lg text-center hover:shadow-lg transition reveal-on-scroll delay-{{ ($index + 1) * 100 }}">
                    <div class="w-16 h-16 {{ $index % 2 === 0 ? 'bg-orange-500' : 'bg-blue-900' }} rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 uppercase">{{ $item->judul }}</h3>
                    <p class="text-gray-600">{{ $item->konten }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
