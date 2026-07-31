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

<section id="technology" class="py-24 bg-white overflow-hidden relative">
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-20 reveal-on-scroll">
            <span class="text-blue-600 font-bold tracking-wider uppercase text-sm mb-4 block">Teknologi Kami</span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 leading-tight">
                {{ $headerJudul }}
            </h2>
            <div class="w-24 h-1 bg-blue-600 mx-auto mt-6 rounded-full"></div>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($itemList as $index => $item)
                @php
                    $isLast = $loop->last;
                    $bgGradient = $isLast ? 'bg-gradient-to-br from-slate-900 to-slate-800' : 'bg-white';
                    $textColor = $isLast ? 'text-white' : 'text-slate-900';
                    $descColor = $isLast ? 'text-slate-300' : 'text-slate-600';
                    $iconBg = $isLast ? 'bg-white/10 text-white' : 'bg-blue-50 text-blue-600';
                @endphp
                <div class="{{ $bgGradient }} p-10 rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 hover:-translate-y-2 hover:shadow-[0_20px_40px_rgb(0,0,0,0.08)] transition-all duration-500 reveal-on-scroll delay-{{ ($index + 1) * 100 }} group">
                    <div class="w-16 h-16 {{ $iconBg }} rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform duration-300">
                        @if(($item->ikon ?? 'hmi') === 'performance')
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        @elseif(($item->ikon ?? 'hmi') === 'data')
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        @else
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        @endif
                    </div>
                    <h3 class="text-xl font-bold mb-4 {{ $textColor }}">{{ $item->judul }}</h3>
                    <p class="{{ $descColor }} leading-relaxed font-light">{{ $item->konten }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
