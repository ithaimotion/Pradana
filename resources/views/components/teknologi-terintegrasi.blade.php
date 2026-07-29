@props(['header' => null, 'items' => null])

@php
    $headerJudul = $header->judul ?? 'INTEGRATED TECHNOLOGIES FOR SMARTER SMELTING';
    $defaultTechItems = collect([
        (object)['judul' => 'WEB-BASED HMI', 'konten' => 'Accessible from anywhere, real-time monitoring and control', 'ikon' => 'hmi'],
        (object)['judul' => 'HIGH PERFORMANCE', 'konten' => 'Optimized algorithms for maximum efficiency and output', 'ikon' => 'performance'],
        (object)['judul' => 'SMART DATA', 'konten' => 'Advanced analytics and machine learning capabilities', 'ikon' => 'data'],
    ]);

    $itemList = ($items && count($items) > 0) ? $items->take(3) : $defaultTechItems;
@endphp

<section id="technology" class="py-20 bg-gray-50 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 text-center mb-16 reveal-on-scroll">
            {{ $headerJudul }}
        </h2>
        
        <div class="grid md:grid-cols-3 gap-6 mb-12">
            @foreach($itemList as $index => $item)
                @php
                    $isLast = $loop->last;
                    $iconClass = $isLast ? 'bg-slate-900 text-white' : 'bg-blue-900 text-white';
                    $cardClass = $isLast ? 'bg-slate-900 text-white' : 'bg-white text-gray-800';
                    $textClass = $isLast ? 'text-slate-300' : 'text-gray-600';
                @endphp
                <div class="{{ $cardClass }} p-6 rounded-2xl shadow-md hover:shadow-lg transition reveal-on-scroll delay-{{ ($index + 1) * 100 }}">
                    <div class="w-12 h-12 {{ $iconClass }} rounded-xl flex items-center justify-center mb-4">
                        @if(($item->ikon ?? 'hmi') === 'performance')
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        @elseif(($item->ikon ?? 'hmi') === 'data')
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        @else
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        @endif
                    </div>
                    <h3 class="text-lg font-semibold mb-2 uppercase">{{ $item->judul }}</h3>
                    <p class="{{ $textClass }} text-sm">{{ $item->konten }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
