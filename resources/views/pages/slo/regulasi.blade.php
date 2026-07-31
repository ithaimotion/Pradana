@extends('layouts.app')

@section('title', 'Regulasi Ketenagalistrikan - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Header -->
    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-slate-900/50"></div>
        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-blue-600/20 text-blue-500 border border-blue-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md animate-pulse">
                Dasar Hukum & Peraturan
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-white via-blue-100 to-white">
                REGULASI KETENAGALISTRIKAN
            </h1>
            <p class="text-slate-700 dark:text-slate-300 max-w-2xl mx-auto text-base md:text-lg leading-relaxed">
                Dasar hukum dan peraturan yang melandasi pelaksanaan inspeksi teknik dan penerbitan Sertifikat Laik Operasi (SLO) di Indonesia.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">

            @php
                $tipeLabels = [
                    'uu_pp' => 'Undang-Undang & Peraturan Pemerintah',
                    'permen_esdm' => 'Peraturan Menteri ESDM',
                    'sni' => 'Standar Nasional Indonesia (SNI)'
                ];
                
                $tipeColors = [
                    'uu_pp' => ['bg' => 'blue'],
                    'permen_esdm' => ['bg' => 'blue'],
                    'sni' => ['bg' => 'teal']
                ];
                
                $tipeIcons = [
                    'uu_pp' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>',
                    'permen_esdm' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>',
                    'sni' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>'
                ];
            @endphp

            @foreach($regulasiList as $tipe => $items)
                @if($items->count() > 0)
                    <div class="mb-12 reveal-on-scroll {{ $loop->index === 0 ? '' : 'delay-' . ($loop->index * 100) }}">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 bg-{{ $tipeColors[$tipe]['bg'] }}-{{ $tipe === 'uu_pp' ? '900' : ($tipe === 'permen_esdm' ? '500' : '600') }} text-white rounded-xl flex items-center justify-center shadow-md flex-shrink-0">
                                {!! $tipeIcons[$tipe] !!}
                            </div>
                            <h2 class="text-xl font-extrabold text-slate-900">{{ $tipeLabels[$tipe] }}</h2>
                        </div>
                        
                        @if($tipe === 'sni')
                            <div class="grid md:grid-cols-2 gap-4">
                                @foreach($items as $item)
                                    <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                                        <div class="flex items-start gap-3">
                                            <div class="w-10 h-10 bg-teal-50 text-teal-700 rounded-xl flex items-center justify-center flex-shrink-0 text-lg font-bold">
                                                {!! $tipeIcons[$tipe] !!}
                                            </div>
                                            <div class="flex-1">
                                                <span class="text-xs font-bold bg-teal-100 text-teal-700 border border-teal-200 px-2 py-0.5 rounded-full">SNI</span>
                                                <h3 class="font-bold text-slate-900 text-sm mt-1 group-hover:text-teal-700 transition-colors">{{ $item->nomor }}</h3>
                                                <p class="text-xs text-slate-500 mt-1 leading-relaxed">{{ $item->keterangan }}</p>
                                                @if(optional($item)->url_dokumen)
                                                    <a href="{{ optional($item)->url_dokumen }}" target="_blank" class="inline-flex items-center gap-1.5 mt-3 text-xs font-bold text-teal-600 hover:text-teal-700 transition">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                                        </svg>
                                                        Lihat Dokumen
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="space-y-4">
                                @foreach($items as $item)
                                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group">
                                        <div class="flex items-stretch">
                                            <div class="w-2 bg-{{ $tipeColors[$tipe]['bg'] }}-{{ $tipe === 'uu_pp' ? '900' : '500' }} flex-shrink-0 rounded-l-2xl"></div>
                                            <div class="flex-1 flex flex-col md:flex-row items-start md:items-center gap-4 p-5 md:p-6">
                                                <div class="w-12 h-12 bg-{{ $tipeColors[$tipe]['bg'] }}-50 text-{{ $tipeColors[$tipe]['bg'] }}-{{ $tipe === 'uu_pp' ? '900' : '600' }} rounded-xl flex items-center justify-center flex-shrink-0 shadow-sm font-bold text-lg">
                                                    {!! $tipeIcons[$tipe] !!}
                                                </div>
                                                <div class="flex-1">
                                                    <span class="text-xs font-bold bg-{{ $tipeColors[$tipe]['bg'] }}-100 text-{{ $tipeColors[$tipe]['bg'] }}-{{ $tipe === 'uu_pp' ? '800' : '700' }} border border-{{ $tipeColors[$tipe]['bg'] }}-200 px-2 py-0.5 rounded-full">
                                                        {{ $tipe === 'uu_pp' ? (str_contains(strtolower($item->nomor), 'uu') ? 'Undang-Undang' : 'Peraturan Pemerintah') : 'Permen ESDM' }}
                                                    </span>
                                                    <h3 class="font-extrabold text-slate-900 text-base mt-1 group-hover:text-{{ $tipeColors[$tipe]['bg'] }}-{{ $tipe === 'uu_pp' ? '900' : '600' }} transition-colors">{{ $item->nomor }}</h3>
                                                    <p class="text-xs text-slate-500 mt-0.5">{{ $item->keterangan }}</p>
                                                </div>
                                                @if(optional($item)->url_dokumen)
                                                    <a href="{{ optional($item)->url_dokumen }}" target="_blank" class="flex items-center gap-1.5 bg-{{ $tipeColors[$tipe]['bg'] }}-{{ $tipe === 'uu_pp' ? '900' : '500' }} hover:bg-{{ $tipeColors[$tipe]['bg'] }}-{{ $tipe === 'uu_pp' ? '800' : '600' }} text-slate-900 dark:text-white text-xs font-bold px-4 py-2 rounded-lg transition shadow-sm flex-shrink-0">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                                        </svg>
                                                        Lihat
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endif
            @endforeach

            <!-- Info Note -->
            <div class="bg-blue-50 border border-blue-200 rounded-2xl p-6 flex gap-4 items-start reveal-on-scroll delay-300">
                <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-bold text-blue-900 mb-1">Catatan Penting</h4>
                    <p class="text-sm text-blue-700 leading-relaxed">
                        Regulasi di atas dapat berubah sesuai kebijakan pemerintah. PT Pradana Nusa Energi selalu mengikuti regulasi terkini yang berlaku. Untuk informasi lebih lanjut, kunjungi situs resmi <a href="https://gatrik.esdm.go.id" target="_blank" class="font-semibold underline hover:text-blue-900 transition">Ditjen Ketenagalistrikan ESDM</a>.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <x-footer />
@endsection

