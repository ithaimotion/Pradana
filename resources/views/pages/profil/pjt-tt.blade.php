@extends('layouts.app')

@section('title', 'Daftar PJT & TT - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Header -->
    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-blue-600/20 text-blue-500 border border-blue-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md">
                Tenaga Ahli Bersertifikat
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">
                {{ strip_tags($konten->judul ?? 'DAFTAR PJT & TT') }}
            </h1>
            <p class="text-white/90 max-w-2xl mx-auto text-base md:text-lg">
                {{ strip_tags($konten->subjudul ?? 'Daftar Penanggung Jawab Teknik (PJT) dan Tenaga Teknik (TT) terdaftar dan bersertifikasi kompetensi resmi PT Pradana Nusa Energi.') }}
            </p>
            @if(optional($konten)->url_dokumen)
                <div class="mt-6">
                    <a href="{{ optional($konten)->url_dokumen }}" target="_blank" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3 rounded-xl shadow-lg transition transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span>Unduh Dokumen SK PJT & TT Resmi (PDF)</span>
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Main Content Tables Section -->
    <section class="py-16 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 space-y-16">
            @if(isset($konten->konten) && !empty($konten->konten))
                <div class="bg-blue-50 border border-blue-200 rounded-2xl p-6 text-blue-900 text-sm leading-relaxed shadow-sm">
                    <div class="font-bold mb-1 flex items-center gap-2 text-blue-800">
                        <span>??</span> Catatan Kualifikasi & Akreditasi:
                    </div>
                    {!! nl2br(e($konten->konten)) !!}
                </div>
            @endif

            @php
                // Group items by jabatan (PJT and TT)
                $itemsByJabatan = [
                    'PJT' => [],
                    'TT' => []
                ];
                if($konten && $konten->items) {
                    foreach($konten->items as $item) {
                        $jabatan = $item->jabatan;
                        if(isset($itemsByJabatan[$jabatan])) {
                            $itemsByJabatan[$jabatan][] = $item;
                        }
                    }
                }
            @endphp

            @if(!empty($itemsByJabatan['PJT']) || !empty($itemsByJabatan['TT']))
                <!-- Table PJT -->
                @if(!empty($itemsByJabatan['PJT']))
                    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xl overflow-hidden reveal-on-scroll">
                        <div class="bg-white dark:bg-slate-900 text-slate-900 dark:text-white px-8 py-5 flex items-center gap-3">
                            <div class="w-8 h-8 bg-sky-500 rounded-lg flex items-center justify-center text-slate-900 dark:text-white font-bold text-base shadow-sm">
                                ??
                            </div>
                            <h2 class="text-xl font-bold tracking-wide">
                                Penanggung Jawab Teknik (PJT)
                            </h2>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-slate-100/80 border-b border-slate-200 text-slate-700 font-bold text-sm uppercase tracking-wider">
                                        <th class="py-4 px-6 w-16 text-center">No</th>
                                        <th class="py-4 px-6">Nama</th>
                                        <th class="py-4 px-6">Kategori</th>
                                        <th class="py-4 px-6">No Sertifikat</th>
                                        <th class="py-4 px-6">No Register</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-slate-700 text-sm">
                                    @foreach($itemsByJabatan['PJT'] as $index => $item)
                                        <tr class="hover:bg-slate-50 transition">
                                            <td class="py-4 px-6 text-center font-semibold text-slate-500">{{ $index + 1 }}</td>
                                            <td class="py-4 px-6 font-bold text-slate-900">{{ $item->nama }}</td>
                                            <td class="py-4 px-6 text-slate-600">{{ $item->kategori }}</td>
                                            <td class="py-4 px-6 font-mono text-slate-600">{{ $item->no_sertifikat }}</td>
                                            <td class="py-4 px-6 font-mono text-slate-600">{{ $item->no_register }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

                <!-- Table TT -->
                @if(!empty($itemsByJabatan['TT']))
                    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xl overflow-hidden reveal-on-scroll delay-200">
                        <div class="bg-white dark:bg-slate-900 text-slate-900 dark:text-white px-8 py-5 flex items-center gap-3">
                            <div class="w-8 h-8 bg-teal-500 rounded-lg flex items-center justify-center text-slate-900 dark:text-white font-bold text-base shadow-sm">
                                ??
                            </div>
                            <h2 class="text-xl font-bold tracking-wide">
                                Tenaga Teknik (TT)
                            </h2>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-slate-100/80 border-b border-slate-200 text-slate-700 font-bold text-sm uppercase tracking-wider">
                                        <th class="py-4 px-6 w-16 text-center">No</th>
                                        <th class="py-4 px-6">Nama</th>
                                        <th class="py-4 px-6">Kategori</th>
                                        <th class="py-4 px-6">No Sertifikat</th>
                                        <th class="py-4 px-6">No Register</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-slate-700 text-sm">
                                    @foreach($itemsByJabatan['TT'] as $index => $item)
                                        <tr class="hover:bg-slate-50 transition">
                                            <td class="py-4 px-6 text-center font-semibold text-slate-500">{{ $index + 1 }}</td>
                                            <td class="py-4 px-6 font-bold text-slate-900">{{ $item->nama }}</td>
                                            <td class="py-4 px-6 text-slate-600">{{ $item->kategori }}</td>
                                            <td class="py-4 px-6 font-mono text-slate-600">{{ $item->no_sertifikat }}</td>
                                            <td class="py-4 px-6 font-mono text-slate-600">{{ $item->no_register }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            @else
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xl p-12 text-center">
                    <div class="text-slate-500 text-sm">Belum ada data PJT & TT tersedia</div>
                </div>
            @endif

        </div>
    </section>

    <x-footer />
@endsection


