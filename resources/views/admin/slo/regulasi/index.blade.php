@extends('layouts.admin')

@section('title', 'Kelola Regulasi SLO')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Kelola Regulasi SLO</h1>
            <p class="text-slate-600 dark:text-slate-400 text-sm mt-1">Tambah, edit, atau hapus regulasi ketenagalistrikan</p>
        </div>
        <a href="{{ route('admin.slo.regulasi.create') }}" class="inline-flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-slate-900 dark:text-white px-4 py-2 rounded-xl font-semibold text-sm transition shadow-lg shadow-emerald-500/20">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Regulasi
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-slate-100/50 dark:bg-slate-800/50 border border-slate-300 dark:border-slate-700 rounded-xl p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-600 dark:text-slate-400 text-xs">Total Regulasi</p>
                    <p class="text-slate-900 dark:text-white font-bold text-lg">{{ $regulasiList->count() }}</p>
                </div>
            </div>
        </div>
        <div class="bg-slate-100/50 dark:bg-slate-800/50 border border-slate-300 dark:border-slate-700 rounded-xl p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-emerald-500/20 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-600 dark:text-slate-400 text-xs">Aktif</p>
                    <p class="text-slate-900 dark:text-white font-bold text-lg">{{ $regulasiList->where('is_active', true)->count() }}</p>
                </div>
            </div>
        </div>
        <div class="bg-slate-100/50 dark:bg-slate-800/50 border border-slate-300 dark:border-slate-700 rounded-xl p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-rose-500/20 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-600 dark:text-slate-400 text-xs">Non-Aktif</p>
                    <p class="text-slate-900 dark:text-white font-bold text-lg">{{ $regulasiList->where('is_active', false)->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-slate-100/50 dark:bg-slate-800/50 border border-slate-300 dark:border-slate-700 rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-slate-300 dark:border-slate-700 bg-slate-800/30">
                        <th class="text-left text-xs font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wider px-6 py-4">Urutan</th>
                        <th class="text-left text-xs font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wider px-6 py-4">Nomor</th>
                        <th class="text-left text-xs font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wider px-6 py-4">Tipe</th>
                        <th class="text-left text-xs font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wider px-6 py-4">Keterangan</th>
                        <th class="text-left text-xs font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wider px-6 py-4">Status</th>
                        <th class="text-right text-xs font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wider px-6 py-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700">
                    @forelse($regulasiList as $regulasi)
                        <tr class="hover:bg-slate-700/30 transition">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-slate-700 dark:text-slate-300 text-sm font-medium">{{ $regulasi->urutan }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-slate-900 dark:text-white text-sm font-semibold">{{ $regulasi->nomor }}</div>
                                @if(optional($regulasi)->url_dokumen)
                                    <a href="{{ optional($regulasi)->url_dokumen }}" target="_blank" class="text-blue-400 text-xs hover:underline mt-1 inline-block">
                                        <svg class="w-3 h-3 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                        </svg>
                                        Lihat Dokumen
                                    </a>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $tipeColors = [
                                        'uu_pp' => 'bg-blue-500/20 text-blue-400 border-blue-500/30',
                                        'permen_esdm' => 'bg-blue-600/20 text-blue-500 border-blue-500/30',
                                        'sni' => 'bg-teal-500/20 text-teal-400 border-teal-500/30'
                                    ];
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border {{ $tipeColors[$regulasi->tipe] ?? 'bg-slate-500/20 text-slate-600 dark:text-slate-400 border-slate-500/30' }}">
                                    {{ $regulasi->tipe_label }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-slate-700 dark:text-slate-300 text-sm max-w-xs truncate">{{ $regulasi->keterangan }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($regulasi->is_active)
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                        Aktif
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-rose-500/20 text-rose-400 border border-rose-500/30">
                                        <span class="w-1.5 h-1.5 rounded-full bg-rose-400"></span>
                                        Non-Aktif
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.slo.regulasi.edit', $regulasi) }}" class="p-2 text-blue-400 hover:text-blue-300 hover:bg-blue-500/20 rounded-lg transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <button type="button" @click="confirmDelete('{{ route('admin.slo.regulasi.destroy', $regulasi) }}', 'Konfirmasi Hapus', 'Apakah Anda yakin ingin menghapus regulasi ini?')" class="p-2 text-rose-400 hover:text-rose-300 hover:bg-rose-500/20 rounded-lg transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <svg class="w-12 h-12 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <p class="text-slate-600 dark:text-slate-400 text-sm">Belum ada regulasi</p>
                                    <a href="{{ route('admin.slo.regulasi.create') }}" class="text-emerald-400 text-sm hover:underline">Tambah regulasi pertama</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

