@props(['data'])

<div x-show="activeTab === 'slo-regulasi'" class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl" x-cloak>
    <div class="border-b border-slate-800 pb-4">
        <h2 class="text-xl font-bold text-white flex items-center gap-2">
            <span class="w-3 h-3 rounded-full bg-emerald-400"></span> Pengaturan Halaman: Regulasi SLO ESDM
        </h2>
        <p class="text-xs text-slate-400 mt-1">Kelola dasar hukum, peraturan kementerian ESDM tentang kewajiban Sertifikat Laik Operasi (SLO), dan lampiran dokumen PDF UU.</p>
    </div>

    <div class="bg-slate-950/50 border border-slate-800 rounded-xl p-6 text-center">
        <div class="flex flex-col items-center gap-4">
            <div class="w-16 h-16 bg-emerald-500/20 rounded-full flex items-center justify-center">
                <svg class="w-8 h-8 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-white">Kelola Regulasi SLO</h3>
                <p class="text-sm text-slate-400 mt-1 max-w-md mx-auto">
                    Kelola daftar regulasi ketenagalistrikan termasuk Undang-Undang, Peraturan Pemerintah, Permen ESDM, dan Standar Nasional Indonesia (SNI).
                </p>
            </div>
            <a href="{{ route('admin.slo.regulasi.index') }}" class="inline-flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white px-6 py-3 rounded-xl font-semibold text-sm transition shadow-lg shadow-emerald-500/20">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Kelola Regulasi
            </a>
        </div>
    </div>

    <div class="grid md:grid-cols-3 gap-4">
        <div class="bg-slate-950/50 border border-slate-800 rounded-xl p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-400 text-xs">UU & PP</p>
                    <p class="text-white font-bold text-lg">Undang-Undang & Peraturan Pemerintah</p>
                </div>
            </div>
        </div>
        <div class="bg-slate-950/50 border border-slate-800 rounded-xl p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-orange-500/20 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-400 text-xs">Permen ESDM</p>
                    <p class="text-white font-bold text-lg">Peraturan Menteri ESDM</p>
                </div>
            </div>
        </div>
        <div class="bg-slate-950/50 border border-slate-800 rounded-xl p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-teal-500/20 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-400 text-xs">SNI</p>
                    <p class="text-white font-bold text-lg">Standar Nasional Indonesia</p>
                </div>
            </div>
        </div>
    </div>
</div>
