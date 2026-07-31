@extends('layouts.admin')

@section('title', 'Buat Legalitas Perusahaan')

@section('content')
<div class="space-y-6">
    <div class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border border-slate-200 dark:border-slate-800 rounded-2xl p-6 sm:p-8 shadow-xl">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-blue-400"></span>
                Buat Legalitas Perusahaan
            </h2>
            <p class="text-xs text-slate-600 dark:text-slate-400 mt-1">Isi form di bawah untuk membuat legalitas perusahaan baru</p>
        </div>

        <form action="{{ route('admin.profil.legalitas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid md:grid-cols-2 gap-8">
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1 uppercase tracking-wider">Judul Header</label>
                        <input type="text" name="judul" value="{{ old('judul') }}" placeholder="LEGALITAS PERUSAHAAN" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-blue-500">
                        @error('judul')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1 uppercase tracking-wider">Sub-Judul / Deskripsi Ringkasan</label>
                        <textarea name="subjudul" rows="2" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-blue-500" placeholder="PT Pradana Nusa Energi beroperasi secara legal dan resmi berlandaskan izin Kementerian ESDM & Pemerintah RI.">{{ old('subjudul') }}</textarea>
                        @error('subjudul')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1 uppercase tracking-wider">Rincian Nomor Izin & Masa Berlaku Legalitas</label>
                        <textarea name="konten" rows="5" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-blue-500" placeholder="Contoh:&#10;• NIB: 1234567890&#10;• IUJK ESDM: No. 503/IUJK/2024&#10;• Akreditasi LIT: Kementerian ESDM RI">{{ old('konten') }}</textarea>
                        @error('konten')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="space-y-3 bg-slate-50/80 dark:bg-slate-950/50 p-5 rounded-xl border border-slate-200 dark:border-slate-800">
                        <label class="block text-xs font-bold text-blue-400 uppercase tracking-wider">Upload Dokumen Legalitas Resmi</label>
                        <div class="border-2 border-dashed border-slate-200 dark:border-slate-800 rounded-xl p-4 text-center hover:border-blue-500/50 transition">
                            <input type="file" name="dokumen" accept=".pdf" class="w-full text-xs text-slate-600 dark:text-slate-400 bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-2.5">
                            <p class="text-[11px] text-slate-500 mt-1">Upload Dokumen PDF (maks 10MB)</p>
                        </div>
                        @error('dokumen')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-slate-200 dark:border-slate-800">
                <a href="{{ route('admin.profil.legalitas.index') }}" class="px-6 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 text-slate-700 dark:text-slate-300 hover:bg-slate-800 hover:text-slate-900 dark:hover:text-white text-sm font-medium transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Simpan & Lanjut ke Item
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
