@extends('layouts.admin')

@section('title', 'Kelola Kategori Layanan SLO')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Kelola Kategori Layanan SLO</h1>
            <p class="text-slate-600 dark:text-slate-400 text-sm mt-1">Tambah, edit, atau hapus kategori layanan inspeksi SLO</p>
        </div>
        <a href="{{ route('admin.slo.kategori-layanan.create') }}" class="inline-flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-slate-900 dark:text-white px-4 py-2 rounded-xl font-semibold text-sm transition shadow-lg shadow-emerald-500/20">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Kategori
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-slate-100/50 dark:bg-slate-800/50 border border-slate-300 dark:border-slate-700 rounded-xl p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-600 dark:text-slate-400 text-xs">Total Kategori</p>
                    <p class="text-slate-900 dark:text-white font-bold text-lg">{{ $kategoriList->count() }}</p>
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
                    <p class="text-slate-900 dark:text-white font-bold text-lg">{{ $kategoriList->where('is_active', true)->count() }}</p>
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
                    <p class="text-slate-900 dark:text-white font-bold text-lg">{{ $kategoriList->where('is_active', false)->count() }}</p>
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
                        <th class="text-left text-xs font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wider px-6 py-4">Kategori</th>
                        <th class="text-left text-xs font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wider px-6 py-4">Judul</th>
                        <th class="text-left text-xs font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wider px-6 py-4">Deskripsi</th>
                        <th class="text-left text-xs font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wider px-6 py-4">Tags</th>
                        <th class="text-left text-xs font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wider px-6 py-4">Status</th>
                        <th class="text-right text-xs font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wider px-6 py-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700">
                    @forelse($kategoriList as $kategori)
                        <tr class="hover:bg-slate-700/30 transition">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-slate-700 dark:text-slate-300 text-sm font-medium">{{ $kategori->urutan }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $kategoriColors = [
                                        'TR' => 'bg-green-500/20 text-green-400 border-green-500/30',
                                        'TM' => 'bg-blue-600/20 text-blue-500 border-blue-500/30'
                                    ];
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border {{ $kategoriColors[$kategori->kategori_utama] ?? 'bg-slate-500/20 text-slate-600 dark:text-slate-400 border-slate-500/30' }}">
                                    {{ $kategori->kategori_label }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    @if($kategori->ikon)
                                        <span class="text-xl">{{ $kategori->ikon }}</span>
                                    @endif
                                    <div class="text-slate-900 dark:text-white text-sm font-semibold">{{ $kategori->judul }}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-slate-700 dark:text-slate-300 text-sm max-w-xs truncate">{{ $kategori->deskripsi }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-1">
                                    @foreach($kategori->tags ?? [] as $tag)
                                        <span class="text-xs bg-slate-200 dark:bg-slate-700 text-slate-700 dark:text-slate-300 px-2 py-0.5 rounded">{{ $tag }}</span>
                                    @endforeach
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($kategori->is_active)
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
                                    <a href="{{ route('admin.slo.kategori-layanan.edit', $kategori) }}" class="p-2 text-blue-400 hover:text-blue-300 hover:bg-blue-500/20 rounded-lg transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <button type="button" @click="confirmDelete('{{ route('admin.slo.kategori-layanan.destroy', $kategori) }}', 'Konfirmasi Hapus', 'Apakah Anda yakin ingin menghapus kategori ini?')" class="p-2 text-rose-400 hover:text-rose-300 hover:bg-rose-500/20 rounded-lg transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <svg class="w-12 h-12 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                    <p class="text-slate-600 dark:text-slate-400 text-sm">Belum ada kategori layanan</p>
                                    <a href="{{ route('admin.slo.kategori-layanan.create') }}" class="text-emerald-400 text-sm hover:underline">Tambah kategori pertama</a>
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
