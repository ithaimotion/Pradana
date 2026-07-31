@extends('layouts.admin')

@section('title', 'Edit Kategori Layanan SLO')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.slo.kategori-layanan.index') }}" class="p-2 text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-700 rounded-lg transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Edit Kategori Layanan SLO</h1>
            <p class="text-slate-600 dark:text-slate-400 text-sm mt-1">Edit kategori: {{ $kategoriLayanan->judul }}</p>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-slate-100/50 dark:bg-slate-800/50 border border-slate-300 dark:border-slate-700 rounded-xl p-6">
        <form action="{{ route('admin.slo.kategori-layanan.update', $kategoriLayanan) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Kategori Utama -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Kategori Utama <span class="text-rose-400">*</span></label>
                <select name="kategori_utama" required
                    class="w-full bg-white dark:bg-slate-900 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-3 text-slate-900 dark:text-white focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition">
                    <option value="">Pilih kategori utama</option>
                    @foreach($kategoriOptions as $value => $label)
                        <option value="{{ $value }}" {{ old('kategori_utama', $kategoriLayanan->kategori_utama) == $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @error('kategori_utama')
                    <p class="text-rose-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Judul -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Judul Kategori <span class="text-rose-400">*</span></label>
                <input type="text" name="judul" value="{{ old('judul', $kategoriLayanan->judul) }}" required
                    class="w-full bg-white dark:bg-slate-900 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-3 text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition"
                    placeholder="Contoh: Rumah Tinggal">
                @error('judul')
                    <p class="text-rose-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Deskripsi <span class="text-rose-400">*</span></label>
                <textarea name="deskripsi" rows="4" required
                    class="w-full bg-white dark:bg-slate-900 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-3 text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition resize-none"
                    placeholder="Deskripsi lengkap tentang kategori layanan">{{ old('deskripsi', $kategoriLayanan->deskripsi) }}</textarea>
                @error('deskripsi')
                    <p class="text-rose-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Ikon -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Ikon (Emoji) (Opsional)</label>
                <input type="text" name="ikon" value="{{ old('ikon', $kategoriLayanan->ikon) }}"
                    class="w-full bg-white dark:bg-slate-900 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-3 text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition"
                    placeholder="Contoh: home">
                @error('ikon')
                    <p class="text-rose-400 text-xs mt-1">{{ $message }}</p>
                @enderror
                <p class="text-slate-500 text-xs mt-1">Gunakan emoji untuk ikon kategori</p>
            </div>

            <!-- Tags -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Tags (Opsional)</label>
                @php
                    $tags = old('tags', $kategoriLayanan->tags ?? []);
                    $tags = array_pad($tags, 3, '');
                @endphp
                <input type="text" name="tags[]" value="{{ $tags[0] }}"
                    class="w-full bg-white dark:bg-slate-900 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-3 text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition mb-2"
                    placeholder="Tag 1 (contoh: 450 VA)">
                <input type="text" name="tags[]" value="{{ $tags[1] }}"
                    class="w-full bg-white dark:bg-slate-900 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-3 text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition mb-2"
                    placeholder="Tag 2 (contoh: 900 VA)">
                <input type="text" name="tags[]" value="{{ $tags[2] }}"
                    class="w-full bg-white dark:bg-slate-900 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-3 text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition"
                    placeholder="Tag 3 (opsional)">
                @error('tags')
                    <p class="text-rose-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Urutan & Status -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Urutan Tampil</label>
                    <input type="number" name="urutan" value="{{ old('urutan', $kategoriLayanan->urutan) }}" min="0"
                        class="w-full bg-white dark:bg-slate-900 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-3 text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition"
                        placeholder="0">
                    @error('urutan')
                        <p class="text-rose-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-slate-500 text-xs mt-1">Angka lebih kecil akan tampil di atas</p>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Status</label>
                    <div class="flex items-center gap-3 mt-3">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $kategoriLayanan->is_active) ? 'checked' : '' }} class="sr-only peer">
                            <div class="w-11 h-6 bg-slate-200 dark:bg-slate-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-emerald-500 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                            <span class="ml-3 text-sm text-slate-700 dark:text-slate-300">Aktif</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-300 dark:border-slate-700">
                <a href="{{ route('admin.slo.kategori-layanan.index') }}" class="px-4 py-2 rounded-xl text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-700 font-medium text-sm transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2 bg-emerald-500 hover:bg-emerald-600 text-slate-900 dark:text-white rounded-xl font-semibold text-sm transition shadow-lg shadow-emerald-500/20 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Update Kategori
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
