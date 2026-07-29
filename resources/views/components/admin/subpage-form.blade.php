@props([
    'tabName',
    'halamanKey',
    'title',
    'badgeColor' => 'bg-orange-500',
    'description' => 'Kelola judul, deskripsi, gambar header, dan dokumen lampiran untuk halaman ini.',
    'actionRoute' => null,
    'data' => null,
])

<div x-show="activeTab === '{{ $tabName }}'" class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl" x-cloak>
    <div>
        <h2 class="text-xl font-bold text-white flex items-center gap-2">
            <span class="w-3 h-3 rounded-full {{ $badgeColor }}"></span> Kelola: {{ $title }}
        </h2>
        <p class="text-xs text-slate-400 mt-1">{{ $description }}</p>
    </div>

    <form action="{{ $actionRoute }}" method="POST" enctype="multipart/form-data" class="space-y-6">

        @csrf
        <input type="hidden" name="halaman" value="{{ $halamanKey }}">
        <input type="hidden" name="kunci" value="main">

        <div class="grid md:grid-cols-2 gap-8">
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Judul Utama Halaman</label>
                    <input type="text" name="judul" value="{{ old('judul', $data->judul ?? '') }}" placeholder="Masukkan Judul Halaman..." class="w-full bg-slate-950/60 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-orange-500 transition">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Sub-Judul / Sub-Headline</label>
                    <textarea name="subjudul" rows="2" placeholder="Masukkan Sub-Judul..." class="w-full bg-slate-950/60 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-orange-500 transition">{{ old('subjudul', $data->subjudul ?? '') }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Isi Konten Utama (Deskripsi Lengkap)</label>
                    <textarea name="konten" rows="6" placeholder="Tuliskan isi konten utama..." class="w-full bg-slate-950/60 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-orange-500 transition">{{ old('konten', $data->konten ?? '') }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Keterangan Ekstra / Catatan Tambahan</label>
                    <input type="text" name="nilai" value="{{ old('nilai', $data->nilai ?? '') }}" placeholder="Contoh: Berlaku s/d 2028 atau Catatan Penting..." class="w-full bg-slate-950/60 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-orange-500 transition">
                </div>
            </div>

            <div class="space-y-6">
                <!-- Upload Gambar Banner / Ilustrasi -->
                <div class="space-y-3">
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">Gambar Header / Ilustrasi Halaman</label>
                    @if(optional($data)->url_gambar)
                        <div class="relative rounded-xl overflow-hidden border border-slate-800 h-40 bg-slate-950">
                            <img src="{{ optional($data)->url_gambar }}" alt="Gambar Halaman" class="w-full h-full object-cover">
                            <div class="absolute bottom-2 left-2 bg-slate-950/80 backdrop-blur border border-slate-800 text-slate-200 text-xs px-2.5 py-1 rounded-lg">Gambar Saat Ini</div>
                        </div>
                    @endif

                    <div class="border-2 border-dashed border-slate-800 rounded-xl p-4 text-center hover:bg-slate-950/40 hover:border-orange-500/50 transition duration-200">
                        <input type="file" name="gambar" accept="image/*" class="w-full text-xs text-slate-400 bg-slate-950 border border-slate-800 rounded-xl p-2.5">
                        <p class="text-[11px] text-slate-500 mt-1">Format PNG, JPG, WEBP maks 5MB</p>
                    </div>
                </div>

                <!-- Upload Dokumen PDF -->
                <div class="space-y-3 pt-4 border-t border-slate-800">
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">Upload Lampiran Dokumen PDF / File Resmi</label>
                    @if(optional($data)->url_dokumen)
                        <div class="flex items-center justify-between p-3 bg-slate-950/80 border border-slate-800 rounded-xl">
                            <div class="flex items-center gap-2 overflow-hidden">
                                <svg class="w-5 h-5 text-rose-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                <span class="text-xs text-slate-300 truncate">Dokumen Lampiran Ter-upload</span>
                            </div>
                            <a href="{{ optional($data)->url_dokumen }}" target="_blank" class="text-xs font-bold text-orange-400 hover:underline flex-shrink-0">Unduh PDF</a>
                        </div>
                    @endif

                    <div class="border-2 border-dashed border-slate-800 rounded-xl p-4 text-center hover:bg-slate-950/40 hover:border-orange-500/50 transition duration-200">
                        <input type="file" name="dokumen" accept=".pdf,.doc,.docx" class="w-full text-xs text-slate-400 bg-slate-950 border border-slate-800 rounded-xl p-2.5">
                        <p class="text-[11px] text-slate-500 mt-1">Format PDF, DOC, DOCX maks 10MB</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end pt-4 border-t border-slate-800">
            <button type="submit" class="bg-gradient-to-r from-orange-500 to-amber-600 hover:from-orange-600 hover:to-amber-700 text-white px-6 py-3 rounded-xl font-bold text-sm shadow-lg shadow-orange-500/20 transition flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                Simpan Perubahan {{ $title }}
            </button>
        </div>
    </form>
</div>

