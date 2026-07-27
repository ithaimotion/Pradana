@props(['data'])

<div x-show="activeTab === 'slo-regulasi'" class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl" x-cloak>
    <div class="border-b border-slate-800 pb-4">
        <h2 class="text-xl font-bold text-white flex items-center gap-2">
            <span class="w-3 h-3 rounded-full bg-emerald-400"></span> Pengaturan Halaman: Regulasi SLO ESDM
        </h2>
        <p class="text-xs text-slate-400 mt-1">Kelola dasar hukum, peraturan kementerian ESDM tentang kewajiban Sertifikat Laik Operasi (SLO), dan lampiran dokumen PDF UU.</p>
    </div>

    <form action="{{ route('admin.slo.halaman.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <input type="hidden" name="halaman" value="slo_regulasi">
        <input type="hidden" name="kunci" value="main">

        <div class="grid md:grid-cols-2 gap-8">
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1 uppercase tracking-wider">Judul Header</label>
                    <input type="text" name="judul" value="{{ old('judul', $data->judul ?? 'REGULASI & DASAR HUKUM SLO') }}" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-emerald-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1 uppercase tracking-wider">Deskripsi Sub-Header</label>
                    <textarea name="subjudul" rows="2" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-emerald-500">{{ old('subjudul', $data->subjudul ?? 'Sertifikat Laik Operasi (SLO) merupakan amanat undang-undang untuk menjamin keselamatan ketenagalistrikan.') }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1 uppercase tracking-wider">Daftar Peraturan Menteri & Undang-Undang</label>
                    <textarea name="konten" rows="5" placeholder="Contoh:&#10;• UU No. 30 Tahun 2009 tentang Ketenagalistrikan&#10;• Permen ESDM No. 12 Tahun 2021 tentang Penyelenggaraan Usaha Jasa Ketenagalistrikan&#10;• Standar PUIL 2011" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-emerald-500">{{ old('konten', $data->konten ?? '') }}</textarea>
                </div>
            </div>

            <div class="space-y-6">
                <!-- PDF Dokumen Regulasi -->
                <div class="space-y-3 bg-slate-950/50 p-5 rounded-xl border border-slate-800">
                    <label class="block text-xs font-bold text-emerald-400 uppercase tracking-wider">Upload Lampiran PDF Salinan Peraturan ESDM / UU</label>
                    @if(isset($data) && $data->url_dokumen)
                        <div class="flex items-center justify-between p-3 bg-slate-950 border border-slate-800 rounded-xl">
                            <div class="flex items-center gap-2 overflow-hidden">
                                <svg class="w-5 h-5 text-rose-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                <span class="text-xs text-slate-300 truncate">Dokumen Regulasi PDF Ter-upload</span>
                            </div>
                            <a href="{{ $data->url_dokumen }}" target="_blank" class="text-xs font-bold text-emerald-400 hover:underline flex-shrink-0">Lihat PDF</a>
                        </div>
                    @endif

                    <div class="border-2 border-dashed border-slate-800 rounded-xl p-4 text-center hover:border-emerald-500/50 transition">
                        <input type="file" name="dokumen" accept=".pdf" class="w-full text-xs text-slate-400 bg-slate-950 border border-slate-800 rounded-xl p-2.5">
                        <p class="text-[11px] text-slate-500 mt-1">Upload File PDF Peraturan ESDM (maks 10MB)</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end pt-2 border-t border-slate-800">
            <button type="submit" class="bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white px-6 py-3 rounded-xl font-bold text-sm shadow-lg shadow-emerald-500/20 transition flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                Simpan Regulasi SLO
            </button>
        </div>
    </form>
</div>
