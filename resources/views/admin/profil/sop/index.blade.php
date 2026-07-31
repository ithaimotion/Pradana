@extends('layouts.admin')

@section('title', 'Kelola Standar Operasional Prosedur')

@section('content')
<div class="space-y-6">
    <div class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border border-slate-200 dark:border-slate-800 rounded-2xl p-6 sm:p-8 shadow-xl">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h2 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-blue-400"></span>
                    Kelola Standar Operasional Prosedur
                </h2>
                <p class="text-xs text-slate-600 dark:text-slate-400 mt-1">Kelola konten halaman SOP perusahaan</p>
            </div>
            @if($sop)
                <a href="{{ route('admin.profil.sop.edit', $sop->id) }}" class="px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit Konten
                </a>
            @else
                <a href="{{ route('admin.profil.sop.create') }}" class="px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Konten
                </a>
            @endif
        </div>

        @if($sop)
            <div class="bg-slate-50/80 dark:bg-slate-950/50 border border-slate-200 dark:border-slate-800 rounded-xl p-6 space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1 uppercase tracking-wider">Judul</label>
                    <div class="text-sm text-slate-900 dark:text-slate-100">{{ $sop->judul ?? '-' }}</div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1 uppercase tracking-wider">Subjudul</label>
                    <div class="text-sm text-slate-900 dark:text-slate-100">{{ $sop->subjudul ?? '-' }}</div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1 uppercase tracking-wider">URL Dokumen</label>
                    <div class="text-sm text-slate-900 dark:text-slate-100 break-all">{{ optional($sop)->url_dokumen ?? '-' }}</div>
                    @if(optional($sop)->url_dokumen)
                        <a href="{{ optional($sop)->url_dokumen }}" target="_blank" class="inline-flex items-center gap-1 mt-2 text-xs text-blue-500 hover:text-blue-400">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                            Buka Link
                        </a>
                    @endif
                </div>
                <div class="pt-4 border-t border-slate-200 dark:border-slate-800 flex gap-3">
                    <a href="{{ route('admin.profil.sop.edit', $sop->id) }}" class="px-4 py-2 rounded-xl bg-slate-100 dark:bg-slate-800 hover:bg-slate-700 text-slate-700 dark:text-slate-300 text-sm font-medium transition flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit
                    </a>
                    <button type="button" @click="confirmDelete('{{ route('admin.profil.sop.destroy', $sop->id) }}', 'Konfirmasi Hapus', 'Apakah Anda yakin ingin menghapus konten SOP ini?')" class="px-4 py-2 rounded-xl bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 text-sm font-medium transition flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Hapus
                    </button>
                </div>
            </div>
        @else
            <div class="bg-slate-50/80 dark:bg-slate-950/50 border border-slate-200 dark:border-slate-800 rounded-xl p-12 text-center">
                <div class="w-16 h-16 bg-slate-100 dark:bg-slate-800 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300 mb-2">Belum Ada Konten SOP</h3>
                <p class="text-sm text-slate-500 mb-6">Silakan tambahkan konten SOP untuk halaman profil perusahaan.</p>
                <a href="{{ route('admin.profil.sop.create') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Konten SOP
                </a>
            </div>
        @endif
    </div>
</div>
@endsection

