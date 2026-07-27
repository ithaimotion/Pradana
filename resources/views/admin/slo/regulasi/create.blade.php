@extends('layouts.admin')

@section('title', 'Tambah Regulasi SLO')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.slo.regulasi.index') }}" class="p-2 text-slate-400 hover:text-white hover:bg-slate-700 rounded-lg transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-white">Tambah Regulasi SLO</h1>
            <p class="text-slate-400 text-sm mt-1">Tambah regulasi ketenagalistrikan baru</p>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6">
        <form action="{{ route('admin.slo.regulasi.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Nomor -->
            <div>
                <label class="block text-sm font-semibold text-slate-300 mb-2">Nomor Regulasi <span class="text-rose-400">*</span></label>
                <input type="text" name="nomor" value="{{ old('nomor') }}" required
                    class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition"
                    placeholder="Contoh: UU No. 30 Tahun 2009">
                @error('nomor')
                    <p class="text-rose-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tipe -->
            <div>
                <label class="block text-sm font-semibold text-slate-300 mb-2">Tipe Regulasi <span class="text-rose-400">*</span></label>
                <select name="tipe" required
                    class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition">
                    <option value="">Pilih tipe regulasi</option>
                    @foreach($tipeOptions as $value => $label)
                        <option value="{{ $value }}" {{ old('tipe') == $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @error('tipe')
                    <p class="text-rose-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Keterangan -->
            <div>
                <label class="block text-sm font-semibold text-slate-300 mb-2">Keterangan <span class="text-rose-400">*</span></label>
                <textarea name="keterangan" rows="4" required
                    class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition resize-none"
                    placeholder="Deskripsi lengkap tentang regulasi">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <p class="text-rose-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- URL Dokumen -->
            <div>
                <label class="block text-sm font-semibold text-slate-300 mb-2">URL Dokumen (Opsional)</label>
                <input type="url" name="url_dokumen" value="{{ old('url_dokumen') }}"
                    class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition"
                    placeholder="https://...">
                @error('url_dokumen')
                    <p class="text-rose-400 text-xs mt-1">{{ $message }}</p>
                @enderror
                <p class="text-slate-500 text-xs mt-1">Link ke dokumen PDF atau sumber regulasi eksternal</p>
            </div>

            <!-- Urutan & Status -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-300 mb-2">Urutan Tampil</label>
                    <input type="number" name="urutan" value="{{ old('urutan', 0) }}" min="0"
                        class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition"
                        placeholder="0">
                    @error('urutan')
                        <p class="text-rose-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-slate-500 text-xs mt-1">Angka lebih kecil akan tampil di atas</p>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-300 mb-2">Status</label>
                    <div class="flex items-center gap-3 mt-3">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }} class="sr-only peer">
                            <div class="w-11 h-6 bg-slate-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-emerald-500 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                            <span class="ml-3 text-sm text-slate-300">Aktif</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-700">
                <a href="{{ route('admin.slo.regulasi.index') }}" class="px-4 py-2 rounded-xl text-slate-300 hover:text-white hover:bg-slate-700 font-medium text-sm transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl font-semibold text-sm transition shadow-lg shadow-emerald-500/20 flex items-center gap-2">
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
