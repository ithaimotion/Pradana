@props(['kontak'])

<div x-show="activeTab === 'kontak'" class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl" x-cloak>
    <div class="border-b border-slate-800 pb-4">
        <h2 class="text-xl font-bold text-white flex items-center gap-2">
            <span class="w-3 h-3 rounded-full bg-pink-500"></span> Pengaturan Kontak, Alamat & Banner CTA
        </h2>
        <p class="text-xs text-slate-400 mt-1">Kelola alamat kantor pusat, nomor telepon & WhatsApp fast response, email pelayanan, serta teks banner kontak.</p>
    </div>

    <form action="{{ route('admin.kontak.header') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid md:grid-cols-2 gap-8">
            <div class="space-y-4">
                <h3 class="text-sm font-bold text-pink-400 uppercase tracking-wider">1. Informasi Alamat & Kontak Resmi</h3>
                
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Judul Banner Kontak</label>
                    <input type="text" name="judul" value="{{ old('judul', $kontak->judul ?? 'HUBUNGI KAMI') }}" required class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-pink-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Alamat Kantor Pusat</label>
                    <textarea name="subjudul" rows="3" placeholder="Jl. MT Haryono No.Kav 10, Tebet Barat, Jakarta Selatan 12810" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-pink-500">{{ old('subjudul', $kontak->subjudul ?? '') }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">No. Telepon Office & WhatsApp Fast Response</label>
                    <input type="text" name="konten" value="{{ old('konten', $kontak->konten ?? '') }}" placeholder="Office: (021) 1234-5678 | WA: +62 812-3456-7890" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-pink-500">
                </div>
            </div>

            <div class="space-y-4">
                <h3 class="text-sm font-bold text-pink-400 uppercase tracking-wider">2. Background Banner & Ilustrasi</h3>
                
                @if(isset($kontak) && $kontak->url_gambar)
                    <div class="rounded-xl overflow-hidden border border-slate-800 h-44 bg-slate-950 relative">
                        <img src="{{ $kontak->url_gambar }}" alt="Banner Kontak" class="w-full h-full object-cover">
                        <div class="absolute bottom-2 left-2 bg-slate-950/80 backdrop-blur text-[10px] text-slate-200 px-2 py-0.5 rounded border border-slate-800">Banner Saat Ini</div>
                    </div>
                @endif

                <div class="border-2 border-dashed border-slate-800 rounded-xl p-4 text-center hover:border-pink-500/50 transition">
                    <input type="file" name="gambar" accept="image/*" class="w-full text-xs text-slate-400 bg-slate-950 border border-slate-800 rounded-xl p-2.5">
                    <p class="text-[11px] text-slate-500 mt-1">Format Gambar Background Banner (PNG, JPG, WEBP maks 5MB)</p>
                </div>
            </div>
        </div>

        <div class="flex justify-end pt-2 border-t border-slate-800">
            <button type="submit" class="bg-gradient-to-r from-pink-500 to-rose-600 hover:from-pink-600 hover:to-rose-700 text-white px-6 py-3 rounded-xl font-bold text-sm shadow-lg shadow-pink-500/20 transition flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                Simpan Informasi Kontak & Alamat
            </button>
        </div>
    </form>
</div>
