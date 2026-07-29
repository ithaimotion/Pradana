@props(['header' => null, 'items' => null])

@php
    $headerJudul = $header->judul ?? 'WHY CHOOSE PRADANA NUSA ENERGI';
    $img1 = $header->url_gambar ?? 'https://images.unsplash.com/photo-1565793298595-6a879b1d9492?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80';
    $img2 = (!empty($header->nilai) && (str_starts_with($header->nilai, 'http://') || str_starts_with($header->nilai, 'https://'))) ? $header->nilai : (($header->nilai ?? null) ? asset('/storage_public/' . $header->nilai) : 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');

    $defaultItems = collect([
        (object)['judul' => 'MAGNETIC LEADERSHIP', 'konten' => 'Industry-leading expertise in aluminium smelting technology'],
        (object)['judul' => 'INNOVATIVE SOLUTIONS', 'konten' => 'Cutting-edge technology backed by decades of research'],
        (object)['judul' => 'PROVEN RESULTS', 'konten' => 'Measurable improvements in efficiency and productivity'],
        (object)['judul' => 'GLOBAL SUPPORT', 'konten' => 'World-class support team available 24/7'],
    ]);

    $itemList = ($items && count($items) > 0) ? $items : $defaultItems;
@endphp

<section class="py-20 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="reveal-left">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-8">
                    {{ $headerJudul }}
                </h2>
                
                <ul class="space-y-6">
                    @foreach($itemList as $item)
                        <li class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-1 uppercase">{{ $item->judul }}</h3>
                                <p class="text-gray-600">{{ $item->konten }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            
            <div class="grid grid-cols-2 gap-4 reveal-right delay-200">
                <div class="bg-gray-200 h-48 rounded-lg overflow-hidden shadow-md">
                    <img src="{{ $img1 }}" alt="Mengapa 1" class="w-full h-full object-cover">
                </div>
                <div class="bg-gray-200 h-48 rounded-lg overflow-hidden mt-8 shadow-md">
                    <img src="{{ $img2 }}" alt="Mengapa 2" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>
