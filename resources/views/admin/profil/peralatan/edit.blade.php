@extends('layouts.admin')

@section('title', 'Edit Peralatan Ketenagalistrikan')

@section('content')
<div class="space-y-6">
    <div class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border border-slate-200 dark:border-slate-800 rounded-2xl p-6 sm:p-8 shadow-xl">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-blue-400"></span>
                Edit Peralatan Ketenagalistrikan
            </h2>
            <p class="text-xs text-slate-600 dark:text-slate-400 mt-1">Edit data peralatan inspeksi dan kalibrasi</p>
        </div>

        <form action="{{ route('admin.profil.peralatan.update', $peralatan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid md:grid-cols-2 gap-8">
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1 uppercase tracking-wider">Nama Peralatan</label>
                        <input type="text" name="nama" value="{{ old('nama', $peralatan->nama) }}" placeholder="Earth Resistance Tester" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-blue-500">
                        @error('nama')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1 uppercase tracking-wider">Kategori</label>
                        <select name="kategori" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-blue-500">
                            <option value="">-- Pilih Kategori --</option>
                            <option value="ukur" {{ old('kategori', $peralatan->kategori) === 'ukur' ? 'selected' : '' }}>Alat Ukur</option>
                            <option value="uji" {{ old('kategori', $peralatan->kategori) === 'uji' ? 'selected' : '' }}>Alat Uji</option>
                            <option value="safety" {{ old('kategori', $peralatan->kategori) === 'safety' ? 'selected' : '' }}>Keselamatan</option>
                        </select>
                        @error('kategori')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1 uppercase tracking-wider">Jenis Alat</label>
                        <input type="text" name="jenis_alat" value="{{ old('jenis_alat', $peralatan->jenis_alat) }}" placeholder="Digital Earth Resistance Tester" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-blue-500">
                        @error('jenis_alat')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1 uppercase tracking-wider">Model</label>
                        <input type="text" name="model" value="{{ old('model', $peralatan->model) }}" placeholder="Megger DET14C" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-blue-500">
                        @error('model')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1 uppercase tracking-wider">Status Kalibrasi</label>
                        <select name="status_kalibrasi" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-blue-500">
                            <option value="">-- Pilih Status --</option>
                            <option value="Terkalibrasi" {{ old('status_kalibrasi', $peralatan->status_kalibrasi) === 'Terkalibrasi' ? 'selected' : '' }}>Terkalibrasi</option>
                            <option value="Perlu Kalibrasi" {{ old('status_kalibrasi', $peralatan->status_kalibrasi) === 'Perlu Kalibrasi' ? 'selected' : '' }}>Perlu Kalibrasi</option>
                        </select>
                        @error('status_kalibrasi')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1 uppercase tracking-wider">Tanggal Kalibrasi</label>
                        <input type="date" name="tanggal_kalibrasi" value="{{ old('tanggal_kalibrasi', $peralatan->tanggal_kalibrasi ? $peralatan->tanggal_kalibrasi->format('Y-m-d') : '') }}" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-blue-500">
                        @error('tanggal_kalibrasi')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1 uppercase tracking-wider">Urutan</label>
                            <input type="number" name="urutan" value="{{ old('urutan', $peralatan->urutan ?? 0) }}" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-blue-500">
                            @error('urutan')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1 uppercase tracking-wider">Status Aktif</label>
                            <select name="status_aktif" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-blue-500">
                                <option value="1" {{ old('status_aktif', $peralatan->status_aktif ? '1' : '0') === '1' ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ old('status_aktif', $peralatan->status_aktif ? '1' : '0') === '0' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                            @error('status_aktif')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="space-y-3 bg-slate-50/80 dark:bg-slate-950/50 p-5 rounded-xl border border-slate-200 dark:border-slate-800">
                        <label class="block text-xs font-bold text-blue-400 uppercase tracking-wider">Upload Gambar Peralatan</label>
                        @if($peralatan->gambar)
                            <div class="rounded-xl overflow-hidden border border-slate-200 dark:border-slate-800 h-40 bg-slate-50 dark:bg-slate-950 relative mb-3">
                                <img src="{{ asset('storage/' . ltrim($peralatan->gambar, '/')) }}" alt="{{ $peralatan->nama }}" class="w-full h-full object-contain">
                                <div class="absolute bottom-2 left-2 bg-slate-50/80 dark:bg-slate-950/80 backdrop-blur text-[10px] text-slate-800 dark:text-slate-200 px-2 py-0.5 rounded border border-slate-200 dark:border-slate-800">Gambar Saat Ini</div>
                            </div>
                        @endif
                        <div class="border-2 border-dashed border-slate-200 dark:border-slate-800 rounded-xl p-4 text-center hover:border-blue-500/50 transition">
                            <input type="file" name="gambar" accept="image/*" class="w-full text-xs text-slate-600 dark:text-slate-400 bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-2.5">
                            <p class="text-[11px] text-slate-500 mt-1">Upload Gambar (JPEG, PNG, JPG, GIF, WEBP - maks 5MB)</p>
                        </div>
                        @error('gambar')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1 uppercase tracking-wider">Deskripsi Singkat</label>
                        <textarea name="deskripsi_singkat" rows="4" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-blue-500" placeholder="Mengukur nilai resistansi pembumian (grounding) instalasi listrik. Digunakan untuk memastikan sistem proteksi petir dan grounding bekerja optimal sesuai PUIL 2011.">{{ old('deskripsi_singkat', $peralatan->deskripsi_singkat) }}</textarea>
                        @error('deskripsi_singkat')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1 uppercase tracking-wider">Spesifikasi (satu per baris)</label>
                        <textarea name="spesifikasi[]" rows="6" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-blue-500" placeholder="Rentang: 0.01Ω – 20kΩ&#10;Tegangan uji: 25V & 50V&#10;IP54 – Tahan debu & cipratan air&#10;Kalibrasi: Januari 2026">{{ old('spesifikasi', is_array($peralatan->spesifikasi) ? implode("\n", $peralatan->spesifikasi) : $peralatan->spesifikasi) }}</textarea>
                        @error('spesifikasi')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-slate-200 dark:border-slate-800">
                <a href="{{ route('admin.profil.peralatan.index') }}" class="px-6 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 text-slate-700 dark:text-slate-300 hover:bg-slate-800 hover:text-slate-900 dark:hover:text-white text-sm font-medium transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Update Peralatan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
