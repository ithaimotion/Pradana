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
            <p class="text-white/90 max-w-3xl mx-auto text-lg md:text-xl leading-relaxed mb-8">
                 Dasar hukum dan peraturan yang melandasi pelaksanaan inspeksi teknik dan penerbitan Sertifikat Laik Operasi (SLO) di Indonesia.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">

            <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm mb-12">
                <p class="text-slate-600 leading-relaxed mb-6">
                    Dasar hukum yang menjadi landasan dari pekerjaan Pemeriksaan Instalasi Listrik dibawah pengawasan Direktorat Jenderal Ketenagalistrikan / Dinas Bidang Energi setempat adalah sebagai berikut:
                </p>
                <ul class="space-y-4 text-slate-700">
                    <li class="flex items-start gap-3">
                        <span class="text-blue-500 mt-0.5">•</span>
                        <span>UU No. 30 Tahun 2009 tentang ketenagalistrikan BAB XI Pasal 14.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-blue-500 mt-0.5">•</span>
                        <span>Peraturan Pemerintah No. 14 tahun 2012 tentang Kegiatan Usaha Penyediaan Tenaga Listrik.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-blue-500 mt-0.5">•</span>
                        <span>Peraturan Menteri Energi dan Sumber Daya Mineral No. 12 Tahun 2021. tentang Klasifikasi, Kualifikasi dan Sertifikasi Usaha Jasa Penunjang Tenaga Listrik.</span>
                    </li>
                </ul>
            </div>

            <!-- Green Info Box -->
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl p-4 text-center text-sm md:text-base mb-8 reveal-on-scroll">
                Berikut data file yang dapat Anda lihat dan unduh
            </div>

            <!-- Data Table Section -->
            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden reveal-on-scroll delay-100">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead>
                            <tr class="bg-slate-50 border-b-2 border-slate-200">
                                <th class="w-16 px-6 py-4 text-center text-slate-500 font-bold tracking-wider">No ↕</th>
                                <th class="px-6 py-4 text-slate-700 font-bold tracking-wider">Judul ↕</th>
                                <th class="px-6 py-4 text-slate-700 font-bold tracking-wider">Keterangan ↕</th>
                                <th class="w-32 px-6 py-4 text-center text-slate-700 font-bold tracking-wider">Aksi ↕</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($regulasiList as $index => $item)
                                <tr class="group hover:bg-blue-50/50 transition-colors duration-150 {{ $index % 2 === 0 ? 'bg-white' : 'bg-slate-50/30' }}">
                                    <td class="px-6 py-4 text-center text-slate-500 font-medium">
                                        {{ $index + 1 }}
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-slate-900 group-hover:text-blue-800 transition-colors">
                                        {{ $item->nomor }}
                                    </td>
                                    <td class="px-6 py-4 text-slate-600 leading-relaxed">
                                        {{ $item->keterangan }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @if(optional($item)->url_dokumen)
                                            @php
                                                // Jika url_dokumen adalah link eksternal (http), langsung gunakan. Jika tidak, ambil dari storage.
                                                $linkDokumen = str_starts_with($item->url_dokumen, 'http') ? $item->url_dokumen : asset('storage/' . $item->url_dokumen);
                                            @endphp
                                            <a href="{{ $linkDokumen }}" target="_blank" class="inline-flex items-center justify-center w-10 h-10 bg-teal-500 hover:bg-teal-600 text-white rounded-lg transition-colors shadow-sm" title="Lihat Dokumen">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                            </a>
                                        @else
                                            <span class="text-slate-300">-</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            @if($regulasiList->isEmpty())
                                <tr>
                                    <td colspan="4" class="px-6 py-8 text-center text-slate-500">
                                        Belum ada data regulasi.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination Footer -->
                @if($regulasiList->isNotEmpty())
                    <div class="bg-slate-50 border-t border-slate-200 px-6 py-4 flex items-center justify-between text-sm text-slate-600">
                        <p>Showing 1 to {{ $regulasiList->count() }} of {{ $regulasiList->count() }} entries</p>
                        <div class="flex gap-1">
                            <button class="px-3 py-1.5 border border-slate-300 text-slate-400 bg-white rounded cursor-not-allowed text-xs">Previous</button>
                            <button class="px-3 py-1.5 bg-blue-600 text-white font-medium rounded shadow-sm text-xs">1</button>
                            <button class="px-3 py-1.5 border border-slate-300 text-slate-400 bg-white rounded cursor-not-allowed text-xs">Next</button>
                        </div>
                    </div>
                @endif
            </div>

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

