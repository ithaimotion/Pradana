@extends('layouts.admin')

@section('title', 'Tambah Regulasi SLO')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.slo.regulasi.index') }}" class="p-2 text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-700 rounded-lg transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Tambah Regulasi SLO</h1>
            <p class="text-slate-600 dark:text-slate-400 text-sm mt-1">Tambah regulasi ketenagalistrikan baru</p>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-slate-100/50 dark:bg-slate-800/50 border border-slate-300 dark:border-slate-700 rounded-xl p-6">
        <form action="{{ route('admin.slo.regulasi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Judul -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Judul Regulasi <span class="text-rose-400">*</span></label>
                <input type="text" name="nomor" value="{{ old('nomor') }}" required
                    class="w-full bg-white dark:bg-slate-900 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-3 text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition"
                    placeholder="Contoh: UU No. 30 Tahun 2009">
                @error('nomor')
                    <p class="text-rose-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Keterangan -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Keterangan <span class="text-rose-400">*</span></label>
                <textarea name="keterangan" rows="4" required
                    class="w-full bg-white dark:bg-slate-900 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-3 text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition resize-none"
                    placeholder="Deskripsi lengkap tentang regulasi">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <p class="text-rose-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Upload Dokumen PDF -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Dokumen Regulasi (Opsional)</label>
                <input type="file" name="dokumen" accept=".pdf"
                    class="w-full bg-white dark:bg-slate-900 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-3 text-slate-900 dark:text-white focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                @error('dokumen')
                    <p class="text-rose-400 text-xs mt-1">{{ $message }}</p>
                @enderror
                <p class="text-slate-500 text-xs mt-1">Upload file PDF (Maksimal 50MB)</p>
            </div>

            <!-- Buttons -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-300 dark:border-slate-700">
                <a href="{{ route('admin.slo.regulasi.index') }}" class="px-4 py-2 rounded-xl text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-700 font-medium text-sm transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2 bg-emerald-500 hover:bg-emerald-600 text-slate-900 dark:text-white rounded-xl font-semibold text-sm transition shadow-lg shadow-emerald-500/20 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Simpan Regulasi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
