@props(['data'])

<div x-show="activeTab === 'peralatan'" class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border border-slate-200 dark:border-slate-800 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl" x-cloak>
    <div class="border-b border-slate-200 dark:border-slate-800 pb-4">
        <h2 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
            <span class="w-3 h-3 rounded-full bg-blue-400"></span> Pengaturan Halaman: Peralatan Ketenagalistrikan
        </h2>
        <p class="text-xs text-slate-600 dark:text-slate-400 mt-1">Kelola data alat ukur, instrumen uji komisioning, status kalibrasi berkala, dan dokumentasi alat kelistrikan.</p>
    </div>

    <form action="{{ route('admin.profil.halaman.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <input type="hidden" name="halaman" value="profil_peralatan">
        <input type="hidden" name="kunci" value="main">

        <div class="grid md:grid-cols-2 gap-8">
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1 uppercase tracking-wider">Judul Header</label>
                    <input type="text" name="judul" value="{{ old('judul', $data->judul ?? 'PERALATAN UJI KETENAGALISTRIKAN') }}" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1 uppercase tracking-wider">Deskripsi Sub-Header</label>
                    <textarea name="subjudul" rows="2" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-blue-500">{{ old('subjudul', $data->subjudul ?? 'Seluruh peralatan uji instrumen PT Pradana Nusa Energi telah terkalibrasi secara presisi dan berkala.') }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1 uppercase tracking-wider">Daftar Peralatan & Spesifikasi Utama</label>
                    <textarea name="konten" rows="5" placeholder="Contoh:&#10;• Insulation Resistance Tester (Megger 5kV/10kV)&#10;• Secondary Current Injection Test Set&#10;• Earth Tester / Grounding Resistance Meter&#10;• Thermal Imaging Camera / Thermography Inspection" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-blue-500">{{ old('konten', $data->konten ?? '') }}</textarea>
                </div>
            </div>

            <div class="space-y-6">
                <!-- Foto Peralatan / Sertifikat Kalibrasi -->
                <div class="space-y-3 bg-slate-50/80 dark:bg-slate-950/50 p-5 rounded-xl border border-slate-200 dark:border-slate-800">
                    <label class="block text-xs font-bold text-blue-400 uppercase tracking-wider">Foto Galeri Peralatan & Sertifikat Kalibrasi</label>
                    @if(optional($data)->url_gambar)
                        <div class="rounded-xl overflow-hidden border border-slate-200 dark:border-slate-800 h-40 bg-slate-50 dark:bg-slate-950 relative">
                            <img src="{{ optional($data)->url_gambar }}" alt="Peralatan Uji" class="w-full h-full object-cover">
                            <div class="absolute bottom-2 left-2 bg-slate-50/80 dark:bg-slate-950/80 backdrop-blur text-[10px] text-slate-800 dark:text-slate-200 px-2 py-0.5 rounded border border-slate-200 dark:border-slate-800">Foto Alat Saat Ini</div>
                        </div>
                    @endif

                    <div class="border-2 border-dashed border-slate-200 dark:border-slate-800 rounded-xl p-4 text-center hover:border-blue-500/50 transition">
                        <input type="file" name="gambar" accept="image/*" class="w-full text-xs text-slate-600 dark:text-slate-400 bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-2.5">
                        <p class="text-[11px] text-slate-500 mt-1">Format Gambar (PNG, JPG, WEBP maks 5MB)</p>
                    </div>
                </div>

                <!-- PDF Sertifikat Kalibrasi -->
                <div class="space-y-3 bg-slate-50/80 dark:bg-slate-950/50 p-5 rounded-xl border border-slate-200 dark:border-slate-800">
                    <label class="block text-xs font-bold text-blue-400 uppercase tracking-wider">Upload File PDF Sertifikat Kalibrasi Alat</label>
                    @if(optional($data)->url_dokumen)
                        <div class="flex items-center justify-between p-3 bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl">
                            <span class="text-xs text-slate-700 dark:text-slate-300 truncate">Dokumen Kalibrasi PDF Ter-upload</span>
                            <a href="{{ optional($data)->url_dokumen }}" target="_blank" class="text-xs font-bold text-blue-400 hover:underline flex-shrink-0">Lihat PDF</a>
                        </div>
                    @endif

                    <div class="border-2 border-dashed border-slate-200 dark:border-slate-800 rounded-xl p-4 text-center hover:border-blue-500/50 transition">
                        <input type="file" name="dokumen" accept=".pdf" class="w-full text-xs text-slate-600 dark:text-slate-400 bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-2.5">
                        <p class="text-[11px] text-slate-500 mt-1">Upload File PDF Kalibrasi (maks 10MB)</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end pt-2 border-t border-slate-200 dark:border-slate-800">
            <button type="submit" class="bg-gradient-to-r from-blue-600 to-sky-500 hover:from-blue-700 hover:to-sky-600 text-white px-6 py-3 rounded-xl font-bold text-sm shadow-lg shadow-blue-600/20 transition flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                Simpan Data Peralatan
            </button>
        </div>
    </form>
</div>

