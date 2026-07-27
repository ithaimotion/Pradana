@props(['statistik' => null])

@php
    $defaultStats = collect([
        (object)[
            'value' => '50-80%',
            'title' => 'SMARTER SMELTER',
            'content' => "Optimize your smelter's energy consumption with our advanced control systems"
        ],
        (object)[
            'value' => 'ADVANCED',
            'title' => 'ANALYTICS',
            'content' => 'Minimize environmental impact through intelligent process optimization'
        ],
        (object)[
            'value' => 'DATA-DRIVEN',
            'title' => 'INSIGHTS',
            'content' => 'Maximize output and operational efficiency with data-driven insights'
        ]
    ]);

    $items = ($statistik && count($statistik) > 0) ? $statistik : $defaultStats;
@endphp

<section class="py-20 bg-orange-500 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl md:text-4xl font-bold text-white text-center mb-16 reveal-on-scroll">
            MEASURABLE PERFORMANCE. PROVEN RESULTS.
        </h2>
        
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($items as $index => $item)
                <div class="text-center reveal-scale delay-{{ ($index + 1) * 100 }}">
                    <div class="text-5xl md:text-6xl font-bold text-white mb-4 uppercase">{{ $item->nilai }}</div>
                    <h3 class="text-xl font-semibold text-white mb-2 uppercase">{{ $item->judul }}</h3>
                    <p class="text-white/80">{{ $item->konten }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
