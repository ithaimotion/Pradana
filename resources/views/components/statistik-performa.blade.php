@props(['statistik' => null])

@php
    $defaultStats = collect([
        (object)[
            'nilai' => '50-80%',
            'judul' => 'SMARTER SMELTER',
            'konten' => "Optimize your smelter's energy consumption with our advanced control systems"
        ],
        (object)[
            'nilai' => 'ADVANCED',
            'judul' => 'ANALYTICS',
            'konten' => 'Minimize environmental impact through intelligent process optimization'
        ],
        (object)[
            'nilai' => 'DATA-DRIVEN',
            'judul' => 'INSIGHTS',
            'konten' => 'Maximize output and operational efficiency with data-driven insights'
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
