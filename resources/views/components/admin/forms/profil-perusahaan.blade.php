@props(['data'])

<div x-show="activeTab === 'profil-perusahaan'" class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl" x-cloak>
    <div class="border-b border-slate-800 pb-4">
        <h2 class="text-xl font-bold text-white flex items-center gap-2">
            <span class="w-3 h-3 rounded-full bg-amber-400"></span> Pengaturan Halaman: Profil Perusahaan
        </h2>
        <p class="text-xs text-slate-400 mt-1">Ubah headline utama, komitmen keselamatan, Visi & Misi, serta foto kantor gedung PT Pradana Nusa Energi.</p>
    </div>

    <form action="{{ route('admin.profil.halaman.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <input type="hidden" name="halaman" value="profil_perusahaan">
        <input type="hidden" name="kunci" value="main">

        <!-- 1. Header Banner Halaman -->
        <div class="space-y-4 bg-slate-950/40 p-5 rounded-xl border border-slate-800/80">
            <h3 class="text-sm font-bold text-amber-400 uppercase tracking-wider">1. Banner Header Halaman</h3>
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Judul Header (Main Title)</label>
                    <input type="text" name="judul" value="{{ old('judul', $data->judul ?? 'PT PRADANA NUSA ENERGI') }}" placeholder="Contoh: PT PRADANA NUSA ENERGI" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Sub-Judul / Tagline Profil</label>
                    <textarea name="subjudul" rows="2" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">{{ old('subjudul', $data->subjudul ?? 'Lembaga Inspeksi Teknik (LIT) terkemuka dan terpercaya...') }}</textarea>
                </div>
            </div>
        </div>

        <!-- 2. Komitmen & Foto Gedung -->
        <div class="space-y-4 bg-slate-950/40 p-5 rounded-xl border border-slate-800/80">
            <h3 class="text-sm font-bold text-amber-400 uppercase tracking-wider">2. Komitmen Perusahaan & Foto Gedung</h3>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-3">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Judul Komitmen</label>
                        <input type="text" name="nilai" value="{{ old('nilai', $data->nilai ?? 'Komitmen Kami Terhadap Keselamatan & Ketenagalistrikan') }}" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Isi Paragraf Komitmen & Latar Belakang</label>
                        <textarea name="konten" rows="5" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">{{ old('konten', $data->konten ?? '') }}</textarea>
                    </div>
                </div>
                <div class="space-y-3">
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Foto Kantor / Gedung Perusahaan</label>
                    @if(isset($data) && $data->url_gambar)
                        <div class="rounded-xl overflow-hidden border border-slate-800 h-36 bg-slate-950 relative">
                            <img src="{{ $data->url_gambar }}" alt="Foto Perusahaan" class="w-full h-full object-cover">
                            <div class="absolute bottom-2 left-2 bg-slate-950/80 backdrop-blur text-[10px] text-slate-200 px-2 py-0.5 rounded border border-slate-800">Foto Saat Ini</div>
                        </div>
                    @endif
                    <div class="border-2 border-dashed border-slate-800 rounded-xl p-3 text-center hover:border-amber-500/50 transition">
                        <input type="file" name="gambar" accept="image/*" class="w-full text-xs text-slate-400 bg-slate-950 border border-slate-800 rounded-xl p-2">
                        <p class="text-[10px] text-slate-500 mt-1">Upload foto gedung/kantor (PNG, JPG, WEBP maks 5MB)</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end pt-2">
            <button type="submit" class="bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 text-white px-6 py-3 rounded-xl font-bold text-sm shadow-lg shadow-amber-500/20 transition flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                Simpan Perubahan Profil Perusahaan
            </button>
        </div>
    </form>
</div>
