@extends('layouts.admin')

@section('title', 'Edit Regulasi SLO')

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
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Edit Regulasi SLO</h1>
            <p class="text-slate-600 dark:text-slate-400 text-sm mt-1">Edit regulasi: {{ $regulasi->nomor }}</p>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-slate-100/50 dark:bg-slate-800/50 border border-slate-300 dark:border-slate-700 rounded-xl p-6">
        <form action="{{ route('admin.slo.regulasi.update', $regulasi) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Judul -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Judul Regulasi <span class="text-rose-400">*</span></label>
                <input type="text" name="nomor" value="{{ old('nomor', $regulasi->nomor) }}" required
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
                    placeholder="Deskripsi lengkap tentang regulasi">{{ old('keterangan', $regulasi->keterangan) }}</textarea>
                @error('keterangan')
                    <p class="text-rose-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Upload Dokumen PDF -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Dokumen Regulasi (Opsional)</label>
                @if(optional($regulasi)->url_dokumen)
                    <div class="mb-3">
                        <a href="{{ asset('storage/' . $regulasi->url_dokumen) }}" target="_blank" class="inline-flex items-center gap-2 text-sm text-teal-600 hover:text-teal-700 font-semibold bg-teal-50 px-3 py-1.5 rounded-lg border border-teal-100">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            Lihat Dokumen Saat Ini
                        </a>
                    </div>
                @endif
                <input type="file" name="dokumen" accept=".pdf"
                    class="w-full bg-white dark:bg-slate-900 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-3 text-slate-900 dark:text-white focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                @error('dokumen')
                    <p class="text-rose-400 text-xs mt-1">{{ $message }}</p>
                @enderror
                <p class="text-slate-500 text-xs mt-1">Upload file PDF baru untuk mengganti yang lama (Maks 50MB)</p>
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
                    Update Regulasi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

