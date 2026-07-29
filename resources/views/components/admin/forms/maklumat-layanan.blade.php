@props([
    'data' => null,
])

<div x-show="activeTab === 'maklumat-layanan'" class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl" x-cloak>
    <div>
        <h2 class="text-xl font-bold text-white flex items-center gap-2">
            <span class="w-3 h-3 rounded-full bg-orange-500"></span> Kelola: Maklumat Layanan
        </h2>
        <p class="text-xs text-slate-400 mt-1">Upload gambar maklumat layanan (foto saja)</p>
    </div>

    <form action="{{ route('infopublik.halaman.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <input type="hidden" name="halaman" value="informasi-publik">
        <input type="hidden" name="kunci" value="maklumat-layanan">

        <!-- Upload Gambar -->
        <div class="space-y-4">
            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">Gambar Maklumat Layanan</label>
            
            @if(optional($data)->url_gambar)
                <div class="relative rounded-xl overflow-hidden border border-slate-800 bg-slate-950">
                    <img src="{{ optional($data)->url_gambar }}" alt="Maklumat Layanan" class="w-full max-h-96 object-contain mx-auto">
                    <div class="absolute bottom-2 left-2 bg-slate-950/80 backdrop-blur border border-slate-800 text-slate-200 text-xs px-2.5 py-1 rounded-lg">Gambar Saat Ini</div>
                </div>
            @endif

            <div class="border-2 border-dashed border-slate-800 rounded-xl p-6 text-center hover:bg-slate-950/40 hover:border-orange-500/50 transition duration-200">
                <input type="file" name="gambar" accept="image/*" class="w-full text-xs text-slate-400 bg-slate-950 border border-slate-800 rounded-xl p-2.5">
                <p class="text-[11px] text-slate-500 mt-2">Format PNG, JPG, WEBP maks 5MB</p>
            </div>
        </div>

        <div class="flex justify-end pt-4 border-t border-slate-800">
            <button type="submit" class="bg-gradient-to-r from-orange-500 to-amber-600 hover:from-orange-600 hover:to-amber-700 text-white px-6 py-3 rounded-xl font-bold text-sm shadow-lg shadow-orange-500/20 transition flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                Simpan Gambar
            </button>
        </div>
    </form>
</div>


