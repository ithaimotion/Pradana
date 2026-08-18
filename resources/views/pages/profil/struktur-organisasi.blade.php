@extends('layouts.app')

@section('title', 'Struktur Organisasi - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Header -->
    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-blue-600/20 text-blue-500 border border-blue-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md">
                Manajemen & Kepemimpinan
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">
                {{ $konten->judul ?? 'STRUKTUR ORGANISASI' }}
            </h1>
            <p class="text-white/90 max-w-2xl mx-auto text-base md:text-lg">
                {{ $konten->subjudul ?? 'Susunan kepemimpinan dan manajemen PT Pradana Nusa Energi dalam menjalankan layanan inspeksi & sertifikasi ketenagalistrikan SLO.' }}
            </p>
        </div>
    </section>

    <!-- Org Chart Section -->
    <section class="py-20 bg-slate-50 overflow-hidden">
        <div class="max-w-6xl mx-auto px-6">
            @if(isset($konten->konten) && !empty($konten->konten))
                <div class="bg-blue-900/5 border border-blue-900/15 rounded-2xl p-6 mb-12 text-slate-700 text-sm leading-relaxed shadow-sm">
                    <h3 class="font-bold text-base text-blue-950 mb-2 flex items-center gap-2">
                        <span>???</span> Manajemen & Tata Kelola Perusahaan:
                    </h3>
                    <p>{!! nl2br(e($konten->konten)) !!}</p>
                </div>
            @endif

            @if(optional($konten)->url_gambar)
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xl mb-16 text-center">
                    <h3 class="text-lg font-bold text-slate-900 mb-4">Diagram Bagan Struktur Organisasi Resmi</h3>
                    <img src="{{ optional($konten)->url_gambar }}" alt="Bagan Struktur Organisasi PT Pradana Nusa Energi" class="max-w-full h-auto mx-auto rounded-xl shadow-md border border-slate-100">
                </div>
            @endif

            <div class="flex justify-center reveal-on-scroll">
                @if($konten && $konten->items && $konten->items->count() > 0)
                    @php $singleItem = $konten->items->firstWhere('foto', '!=', null); @endphp
                    @if($singleItem)
                        <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-xl text-center w-full max-w-4xl hover:shadow-2xl transition-all duration-300">
                            <img src="{{ asset('storage_public/' . $singleItem->foto) }}" alt="Struktur Organisasi" class="w-full h-auto mx-auto rounded-xl">
                        </div>
                    @else
                        <div class="w-full bg-white rounded-2xl border border-slate-200/80 shadow-xl p-12 text-center">
                            <div class="text-slate-500 text-sm">Belum ada data struktur organisasi tersedia</div>
                        </div>
                    @endif
                @else
                    <div class="w-full bg-white rounded-2xl border border-slate-200/80 shadow-xl p-12 text-center">
                        <div class="text-slate-500 text-sm">Belum ada data struktur organisasi tersedia</div>
                    </div>
                @endif
            </div>


        </div>
    </section>

    <x-footer />
@endsection


