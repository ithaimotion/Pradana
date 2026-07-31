@extends('layouts.admin')

@section('title', 'Kelola Struktur Organisasi')

@section('content')
<div class="space-y-6">
    <div class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border border-slate-200 dark:border-slate-800 rounded-2xl p-6 sm:p-8 shadow-xl">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-blue-400"></span>
                    Kelola Struktur Organisasi
                </h2>
                <p class="text-xs text-slate-600 dark:text-slate-400 mt-1">Kelola bagan Struktur Organisasi dan jajaran manajemen PT Pradana Nusa Energi</p>
            </div>
            @if(!$strukturOrg)
                <a href="{{ route('admin.profil.struktur-organisasi.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Buat Struktur Baru
                </a>
            @else
                <a href="{{ route('admin.profil.struktur-organisasi.edit', $strukturOrg->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit Struktur
                </a>
            @endif
        </div>

        @if(session('success'))
            <x-admin.alert type="success" title="Berhasil" message="{{ session('success') }}" class="mb-6" />
        @endif

        @if($strukturOrg)
            <div class="bg-slate-50/60 dark:bg-slate-950/40 border border-slate-200 dark:border-slate-800 rounded-xl p-6 space-y-6">
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wider mb-2">Judul Header</label>
                        <div class="text-sm text-slate-900 dark:text-white">{{ $strukturOrg->judul ?? '-' }}</div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wider mb-2">Sub Judul</label>
                        <div class="text-sm text-slate-700 dark:text-slate-300">{{ Str::limit($strukturOrg->subjudul ?? '-', 100) }}</div>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wider mb-2">Konten</label>
                        <div class="text-sm text-slate-700 dark:text-slate-300">{{ Str::limit($strukturOrg->konten ?? '-', 200) }}</div>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wider mb-2">Gambar</label>
                        @if($strukturOrg->gambar)
                            <a href="{{ asset('storage_public/' . ltrim($strukturOrg->gambar, '/')) }}" target="_blank" class="text-blue-400 hover:text-blue-300 text-sm">Lihat Gambar</a>
                        @else
                            <div class="text-sm text-slate-500">Tidak ada gambar</div>
                        @endif
                    </div>
                </div>
                
                <div class="border-t border-slate-200 dark:border-slate-800 pt-6">
                    <h3 class="text-sm font-bold text-blue-400 uppercase tracking-wider mb-4">Daftar Item Struktur Organisasi ({{ $strukturOrg->items->count() }})</h3>
                    @if($strukturOrg->items->count() > 0)
                        <div class="space-y-3">
                            @foreach($strukturOrg->items as $item)
                                <div class="bg-white/60 dark:bg-slate-900/60 border border-slate-300 dark:border-slate-700 rounded-xl p-4 flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <span class="px-2 py-1 rounded text-xs font-bold bg-blue-900 text-blue-200">
                                            Level {{ $item->level }}
                                        </span>
                                        <div>
                                            <div class="text-sm font-medium text-slate-900 dark:text-white">{{ $item->nama }}</div>
                                            <div class="text-xs text-slate-600 dark:text-slate-400">{{ $item->jabatan }} @if($item->divisi) • {{ $item->divisi }} @endif</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-sm text-slate-500 text-center py-4">Belum ada item struktur organisasi</div>
                    @endif
                </div>
            </div>
        @else
            <div class="bg-slate-50/60 dark:bg-slate-950/40 border border-slate-200 dark:border-slate-800 rounded-xl p-12 text-center">
                <div class="flex flex-col items-center gap-4">
                    <svg class="w-16 h-16 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <div>
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-1">Belum Ada Struktur Organisasi</h3>
                        <p class="text-sm text-slate-600 dark:text-slate-400">Mulai dengan membuat struktur organisasi baru</p>
                    </div>
                    <a href="{{ route('admin.profil.struktur-organisasi.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-lg text-sm font-medium transition">
                        Buat Struktur Sekarang
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
