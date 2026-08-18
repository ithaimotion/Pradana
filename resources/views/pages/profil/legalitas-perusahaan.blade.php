@extends('layouts.app')

@section('title', 'Legalitas Perusahaan - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    {{-- ===================== HERO SECTION ===================== --}}
    <section class="relative py-24 bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        {{-- Dot grid --}}
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:18px_18px]"></div>
        {{-- Glow orbs --}}
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-blue-600/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-32 -right-32 w-80 h-80 bg-cyan-500/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-flex items-center gap-2 bg-blue-600/20 text-blue-400 border border-blue-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-6 backdrop-blur-md">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 01.894 1.79l-1.233.616 1.738 5.42a1 1 0 01-.285 1.05A3.989 3.989 0 0115 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.715-5.349L11 6.477V16h2a1 1 0 110 2H7a1 1 0 110-2h2V6.477L6.237 7.582l1.715 5.349a1 1 0 01-.285 1.05A3.989 3.989 0 015 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.738-5.42-1.233-.617a1 1 0 01.894-1.788l1.599.799L9 4.323V3a1 1 0 011-1z" clip-rule="evenodd"/></svg>
                Dokumen Legal & Perizinan
            </span>
            <h1 class="text-4xl md:text-5xl font-extrabold mb-5 tracking-tight leading-tight">
                {{ strip_tags($konten->judul ?? 'Legalitas Perusahaan') }}
            </h1>
            <p class="text-white/80 max-w-2xl mx-auto text-base md:text-lg leading-relaxed">
                {{ strip_tags($konten->subjudul ?? 'Seluruh dokumen legalitas, perizinan, dan akreditasi resmi PT Pradana Nusa Energi sebagai Lembaga Inspeksi Teknik terakreditasi.') }}
            </p>
            @if(optional($konten)->url_dokumen)
                <div class="mt-8">
                    <a href="{{ optional($konten)->url_dokumen }}" target="_blank"
                       class="inline-flex items-center gap-2.5 bg-blue-600 hover:bg-blue-500 text-white font-bold px-7 py-3.5 rounded-xl shadow-lg shadow-blue-900/40 transition-all duration-200 transform hover:-translate-y-0.5 text-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Unduh File PDF Dokumen Legalitas Resmi
                    </a>
                </div>
            @endif
        </div>
    </section>

    {{-- ===================== STATS BAR ===================== --}}
    @php
        $allItems = ($konten && $konten->items) ? $konten->items : collect();
        $totalDokumen = $allItems->count();
        $totalAktif = $allItems->where('status', 'Aktif')->count();
        $totalProses = $allItems->where('status', 'Dalam Proses Perpanjangan')->count();
        $totalExpired = $allItems->where('status', 'Tidak Aktif')->count();
        $grouped = $allItems->groupBy('kategori');
        
        $warningDocs = 0;
        foreach($allItems as $item) {
            if ($item->berlaku_sampai && \Carbon\Carbon::parse($item->berlaku_sampai)->isPast()) {
                $warningDocs++;
            } elseif ($item->berlaku_sampai && \Carbon\Carbon::parse($item->berlaku_sampai)->diffInDays(now()) < 30) {
                $warningDocs++;
            }
        }
    @endphp

    <section class="bg-white border-b border-slate-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-5 grid grid-cols-2 md:grid-cols-4 divide-x divide-slate-100">
            <div class="px-4 py-1 text-center">
                <div class="text-3xl font-black text-blue-900">{{ $totalDokumen }}</div>
                <div class="text-xs text-slate-400 font-semibold mt-0.5 uppercase tracking-wider">Total Dokumen</div>
            </div>
            <div class="px-4 py-1 text-center">
                <div class="text-3xl font-black text-green-600">{{ $totalAktif }}</div>
                <div class="text-xs text-slate-400 font-semibold mt-0.5 uppercase tracking-wider">Status Aktif</div>
            </div>
            <div class="px-4 py-1 text-center">
                <div class="text-3xl font-black text-yellow-600">{{ $totalProses }}</div>
                <div class="text-xs text-slate-400 font-semibold mt-0.5 uppercase tracking-wider">Sedang Diproses</div>
            </div>
            <div class="px-4 py-1 text-center">
                <div class="text-3xl font-black text-red-600">{{ $warningDocs }}</div>
                <div class="text-xs text-slate-400 font-semibold mt-0.5 uppercase tracking-wider">Perhatian / Expired</div>
            </div>
        </div>
    </section>

    {{-- ===================== MAIN CONTENT ===================== --}}
    <section class="py-16 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">

            {{-- Info / Catatan dari admin --}}
            @if(isset($konten->konten) && !empty($konten->konten))
                <div class="mb-8 bg-blue-50 border border-blue-200 rounded-2xl p-6 text-blue-900 text-sm leading-relaxed shadow-sm">
                    <div class="font-bold mb-2 flex items-center gap-2 text-blue-800">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Rincian Nomor Izin & Masa Berlaku Legalitas:
                    </div>
                    {!! nl2br(e($konten->konten)) !!}
                </div>
            @endif

            {{-- Tables per Kategori --}}
            <div class="space-y-14">
                @forelse($grouped as $kategori => $items)
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden reveal-on-scroll">
                        
                        {{-- Header kategori --}}
                        <div class="flex items-center justify-between px-6 py-4 bg-gradient-to-r from-slate-50 to-white border-b border-slate-200">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0 border border-blue-200">
                                    <svg class="w-4 h-4 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-slate-800 font-extrabold text-lg leading-tight">{{ $kategori }}</h2>
                                </div>
                            </div>
                        </div>

                        {{-- Table --}}
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead>
                                    <tr class="bg-white border-b border-slate-100">
                                        <th class="py-5 px-5 w-12 text-center text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">No</th>
                                        <th class="py-5 px-5 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Jenis Perizinan</th>
                                        <th class="py-5 px-5 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Bidang</th>
                                        <th class="py-5 px-5 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Sub Bidang</th>
                                        <th class="py-5 px-5 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider whitespace-nowrap">Nomor Sertifikat</th>
                                        <th class="py-5 px-5 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider whitespace-nowrap">Nomor Registrasi</th>
                                        <th class="py-5 px-5 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider whitespace-nowrap">Tanggal Terbit</th>
                                        <th class="py-5 px-5 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider whitespace-nowrap">Tanggal Habis Berlaku</th>
                                        <th class="py-5 px-5 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider text-center">Dokumen</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    @foreach($items->sortBy('urutan') as $index => $item)
                                        @php
                                            $isWarning = false;
                                            $warningText = '';
                                            if ($item->berlaku_sampai) {
                                                $sisaHari = \Carbon\Carbon::parse($item->berlaku_sampai)->diffInDays(now());
                                                if (\Carbon\Carbon::parse($item->berlaku_sampai)->isPast()) {
                                                    $isWarning = true;
                                                    $warningText = 'Expired';
                                                } elseif ($sisaHari < 30) {
                                                    $isWarning = true;
                                                    $warningText = 'Hampir Habis';
                                                }
                                            }
                                        @endphp
                                        <tr class="hover:bg-blue-50/50 transition-colors duration-200 {{ $isWarning ? 'bg-red-50/40' : '' }}">
                                            <td class="py-5 px-5 text-center text-slate-500 font-semibold text-xs">{{ $index + 1 }}</td>
                                            
                                            <td class="py-5 px-5 text-sm font-semibold text-slate-800">
                                                <div class="flex flex-col gap-2">
                                                    <span>{{ $item->nama_dokumen }}</span>
                                                    @if($item->status === 'Aktif')
                                                        <span class="inline-flex w-max items-center justify-center bg-emerald-100 text-emerald-700 border border-emerald-200 text-[10px] font-bold px-2 py-0.5 rounded uppercase tracking-wider">Aktif</span>
                                                    @elseif($item->status === 'Dalam Proses Perpanjangan')
                                                        <span class="inline-flex w-max items-center justify-center bg-amber-100 text-amber-700 border border-amber-200 text-[10px] font-bold px-2 py-0.5 rounded uppercase tracking-wider">Proses Perpanjangan</span>
                                                    @else
                                                        <span class="inline-flex w-max items-center justify-center bg-rose-100 text-rose-700 border border-rose-200 text-[10px] font-bold px-2 py-0.5 rounded uppercase tracking-wider">Tidak Aktif</span>
                                                    @endif
                                                </div>
                                            </td>
                                            
                                            <td class="py-5 px-5 text-sm text-slate-600 leading-relaxed">{{ $item->bidang ?: '-' }}</td>
                                            <td class="py-5 px-5 text-sm text-slate-600 leading-relaxed">{{ $item->sub_bidang ?: '-' }}</td>
                                            
                                            <td class="py-5 px-5 text-sm text-slate-600 font-mono whitespace-nowrap">{{ $item->no_sertifikat ?: ($item->nomor ?: '-') }}</td>
                                            <td class="py-5 px-5 text-sm text-slate-600 font-mono whitespace-nowrap">{{ $item->no_registrasi ?: '-' }}</td>
                                            
                                            <td class="py-5 px-5 text-sm text-slate-600 whitespace-nowrap">
                                                {{ $item->tanggal_terbit ? \Carbon\Carbon::parse($item->tanggal_terbit)->translatedFormat('d F Y') : '-' }}
                                            </td>
                                            
                                            <td class="py-5 px-5 text-sm whitespace-nowrap">
                                                @if($item->berlaku_sampai)
                                                    <div class="flex flex-col gap-1.5">
                                                        <span class="{{ $isWarning ? 'text-rose-600 font-bold' : 'text-slate-600' }}">
                                                            {{ \Carbon\Carbon::parse($item->berlaku_sampai)->translatedFormat('d F Y') }}
                                                        </span>
                                                        @if($isWarning)
                                                            <span class="inline-flex w-max items-center justify-center bg-rose-100 text-rose-700 border border-rose-200 text-[10px] font-bold px-2 py-0.5 rounded uppercase tracking-wider">{{ $warningText }}</span>
                                                        @endif
                                                    </div>
                                                @else
                                                    <span class="text-slate-600">-</span>
                                                @endif
                                            </td>
                                            
                                            <td class="py-5 px-5 text-center">
                                                @if($item->url_file)
                                                    <div class="flex flex-col items-center gap-2">
                                                        @if(Str::endsWith(strtolower($item->url_file), ['.jpg', '.jpeg', '.png']))
                                                            <a href="{{ $item->url_file }}" target="_blank" class="block w-16 h-20 bg-slate-100 border border-slate-200 rounded-md overflow-hidden shadow-sm hover:shadow-md hover:scale-105 transition duration-300">
                                                                <img src="{{ $item->url_file }}" alt="Dokumen" class="w-full h-full object-cover">
                                                            </a>
                                                        @endif
                                                        <a href="{{ $item->url_file }}" target="_blank" class="inline-flex items-center gap-1.5 bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold px-3.5 py-1.5 rounded-lg transition-all shadow-sm whitespace-nowrap">
                                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                            </svg>
                                                            Lihat
                                                        </a>
                                                    </div>
                                                @else
                                                    <span class="text-slate-300 text-xs italic">-</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @empty
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-16 text-center">
                        <div class="w-14 h-14 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <p class="text-slate-400 font-medium text-sm">Belum ada data legalitas perusahaan tersedia.</p>
                    </div>
                @endforelse
            </div>
            
            {{-- Tenaga Teknik Section --}}
            @if($konten && $konten->tenagaTeknik && $konten->tenagaTeknik->count() > 0)
                <div class="mt-16 bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden reveal-on-scroll">
                    <div class="flex items-center justify-between px-6 py-4 bg-gradient-to-r from-slate-50 to-white border-b border-slate-200">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0 border border-blue-200">
                                <svg class="w-4 h-4 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-slate-800 font-extrabold text-lg leading-tight">Tenaga Ahli Tersertifikasi</h2>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 grid md:grid-cols-2 lg:grid-cols-3 gap-5">
                        @foreach($konten->tenagaTeknik as $tenaga)
                            <div class="border border-slate-200 rounded-xl p-5 bg-slate-50 hover:bg-white hover:shadow-md transition duration-300 group">
                                <div class="flex justify-between items-start mb-3">
                                    <div class="w-10 h-10 bg-white border border-slate-200 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <span class="text-[10px] font-bold {{ $tenaga->status === 'Aktif' ? 'bg-green-100 text-green-700 border border-green-200' : 'bg-red-100 text-red-700 border border-red-200' }} px-2 py-0.5 rounded uppercase">
                                        {{ $tenaga->status }}
                                    </span>
                                </div>
                                <h3 class="font-bold text-slate-800 text-base mb-2">{{ $tenaga->nama }}</h3>
                                <div class="space-y-1.5 text-xs text-slate-600">
                                    <p class="flex justify-between"><span class="text-slate-400">Jabatan:</span> <span class="font-semibold">{{ $tenaga->jabatan }}</span></p>
                                    @if($tenaga->no_sertifikat)
                                        <p class="flex justify-between"><span class="text-slate-400">Sertifikat:</span> <span class="font-mono font-semibold">{{ $tenaga->no_sertifikat }}</span></p>
                                    @endif
                                    @if($tenaga->bidang_kompetensi)
                                        <p class="flex justify-between"><span class="text-slate-400">Bidang:</span> <span class="font-semibold text-right max-w-[60%]">{{ $tenaga->bidang_kompetensi }}</span></p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </section>

    {{-- ===================== INFO BANNER ===================== --}}
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-gradient-to-r from-blue-900 to-slate-900 rounded-2xl p-7 md:p-9 flex flex-col md:flex-row items-center gap-6 text-white shadow-lg">
                <div class="w-12 h-12 bg-blue-600/80 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <div class="flex-1 text-center md:text-left">
                    <h3 class="text-lg font-extrabold mb-1.5">Sistem Manajemen Terintegrasi</h3>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        Dokumen legalitas kami divalidasi dan diperbarui secara berkala sesuai ketentuan regulasi Pemerintah RI. PT Pradana Nusa Energi menerapkan Sistem Manajemen ISO yang telah terakreditasi internasional.
                    </p>
                </div>
                <a href="{{ route('home') }}"
                   class="flex-shrink-0 bg-blue-600 hover:bg-blue-500 text-white font-bold px-6 py-2.5 rounded-xl transition text-sm">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

    <x-footer />
@endsection
