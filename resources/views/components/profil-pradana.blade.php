@props(['profil' => null])

@php
    $title = $profil->judul ?? 'PT PRADANA NUSA ENERGI';
    $subtitle = $profil->subjudul ?? 'Nusa Energi';
    $content = $profil->konten ?? 'Pradana Nusa Energi bangga menjadi Lembaga Inspeksi Teknik (LIT) terpercaya yang melayani inspeksi dan penerbitan Sertifikat Laik Operasi (SLO) di seluruh wilayah Indonesia.';
    $img1 = $profil->url_gambar ?? 'https://images.unsplash.com/photo-1565793298595-6a879b1d9492?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80';
    $img2 = (!empty($profil->nilai) && (str_starts_with($profil->nilai, 'http://') || str_starts_with($profil->nilai, 'https://'))) ? $profil->nilai : (($profil->nilai ?? null) ? asset('public/storage/' . $profil->nilai) : 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');
@endphp

<section class="py-20 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="grid grid-cols-2 gap-4 reveal-left">
                <div class="bg-gray-200 h-48 rounded-lg overflow-hidden shadow-md">
                    <img src="{{ $img1 }}" alt="Profil 1" class="w-full h-full object-cover">
                </div>
                <div class="bg-gray-200 h-48 rounded-lg overflow-hidden mt-8 shadow-md">
                    <img src="{{ $img2 }}" alt="Profil 2" class="w-full h-full object-cover">
                </div>
            </div>
            
            <div class="reveal-right delay-200">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">{{ $title }}</h2>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    {{ $content }}
                </p>
                <div class="flex items-center gap-2">
                    <div class="text-3xl font-bold text-orange-500">PRADANA</div>
                    <div class="text-sm text-gray-500 uppercase tracking-wider">{{ $subtitle }}</div>
                </div>
            </div>
        </div>
    </div>
</section>
