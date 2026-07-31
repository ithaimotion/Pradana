@props(['header' => null, 'items' => null])

@php
    $headerJudul = $header->judul ?? 'WHY CHOOSE PRADANA NUSA ENERGI';
    $img1 = optional($header)->url_gambar ?? 'https://images.unsplash.com/photo-1565793298595-6a879b1d9492?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80';
    $img2 = (!empty($header->nilai) && (str_starts_with($header->nilai, 'http://') || str_starts_with($header->nilai, 'https://'))) ? $header->nilai : (($header->nilai ?? null) ? asset('/storage_public/' . $header->nilai) : 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');

    $defaultItems = collect([
        (object)['judul' => 'MAGNETIC LEADERSHIP', 'konten' => 'Industry-leading expertise in aluminium smelting technology'],
        (object)['judul' => 'INNOVATIVE SOLUTIONS', 'konten' => 'Cutting-edge technology backed by decades of research'],
        (object)['judul' => 'PROVEN RESULTS', 'konten' => 'Measurable improvements in efficiency and productivity'],
        (object)['judul' => 'GLOBAL SUPPORT', 'konten' => 'World-class support team available 24/7'],
    ]);

    $itemList = ($items && count($items) > 0) ? $items : $defaultItems;
@endphp

<section class="py-24 bg-white overflow-hidden relative">
    <!-- Subtle background accents -->
    <div class="absolute top-0 right-0 w-1/3 h-full bg-slate-50/50 -skew-x-12 transform origin-top-right"></div>
    
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="grid md:grid-cols-2 gap-16 items-center">
            <div class="reveal-left">
                <span class="text-blue-600 font-bold tracking-wider uppercase text-sm mb-4 block">Alasan Memilih Kami</span>
                <h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-12 leading-tight">
                    {{ $headerJudul }}
                </h2>
                
                <ul class="space-y-8">
                    @foreach($itemList as $index => $item)
                        <li class="flex items-start gap-5 group">
                            <div class="w-12 h-12 bg-slate-50 border border-slate-100 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:bg-blue-600 group-hover:border-blue-600 transition-colors duration-300 shadow-sm">
                                <svg class="w-6 h-6 text-blue-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-slate-900 mb-2 uppercase">{{ $item->judul }}</h3>
                                <p class="text-slate-600 leading-relaxed font-light">{{ $item->konten }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            
            <div class="grid grid-cols-2 gap-6 reveal-right delay-200">
                <div class="bg-gray-100 h-64 rounded-[2rem] overflow-hidden shadow-lg transform -translate-y-8 hover:-translate-y-10 transition-transform duration-500">
                    <img src="{{ $img1 }}" alt="Mengapa 1" class="w-full h-full object-cover">
                </div>
                <div class="bg-gray-100 h-64 rounded-[2rem] overflow-hidden shadow-lg transform translate-y-8 hover:translate-y-6 transition-transform duration-500">
                    <img src="{{ $img2 }}" alt="Mengapa 2" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>
