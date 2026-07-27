@props(['lowongans', 'pesanMasuks', 'galeri'])

<div x-show="activeTab === 'dashboard'" class="space-y-8" x-cloak>
    <!-- Summary Overview Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card 1: Connected Sections -->
        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-5 shadow-xl flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-orange-500/10 border border-orange-500/20 text-orange-400 flex items-center justify-center font-bold text-xl flex-shrink-0">
                ⚡
            </div>
            <div>
                <div class="text-2xl font-black text-white">21</div>
                <div class="text-xs text-slate-400 font-medium">Total Modul CMS Connected</div>
            </div>
        </div>

        <!-- Card 2: Lowongan Karir -->
        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-5 shadow-xl flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-teal-500/10 border border-teal-500/20 text-teal-400 flex items-center justify-center font-bold text-xl flex-shrink-0">
                💼
            </div>
            <div>
                <div class="text-2xl font-black text-white">{{ count($lowongans) }}</div>
                <div class="text-xs text-slate-400 font-medium">Lowongan Karir Terpasang</div>
            </div>
        </div>

        <!-- Card 3: Inbox Pesan -->
        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-5 shadow-xl flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-pink-500/10 border border-pink-500/20 text-pink-400 flex items-center justify-center font-bold text-xl flex-shrink-0">
                📩
            </div>
            <div>
                <div class="text-2xl font-black text-white">{{ count($pesanMasuks) }}</div>
                <div class="text-xs text-slate-400 font-medium">Pesan Masuk (Kotak Kontak)</div>
            </div>
        </div>

        <!-- Card 4: Galeri Media -->
        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-5 shadow-xl flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-purple-500/10 border border-purple-500/20 text-purple-400 flex items-center justify-center font-bold text-xl flex-shrink-0">
                🖼️
            </div>
            <div>
                <div class="text-2xl font-black text-white">{{ count($galeri) }}</div>
                <div class="text-xs text-slate-400 font-medium">Foto Galeri Terupload</div>
            </div>
        </div>
    </div>

    <!-- Quick Navigation Shortcuts -->
    <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
        <div class="border-b border-slate-800 pb-4">
            <h3 class="text-lg font-extrabold text-white">Navigasi Pengelolaan Konten Website</h3>
            <p class="text-xs text-slate-400 mt-1">Pilih bagian yang ingin Anda kelola melalui tombol di bawah atau gunakan menu sidebar sebelah kiri.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <!-- Group 1: Profil -->
            <div class="bg-slate-950/60 border border-slate-800 rounded-xl p-5 space-y-3">
                <div class="flex items-center gap-2 text-amber-400 font-bold text-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span>
                    Halaman Profil
                </div>
                <p class="text-xs text-slate-400">Profil Perusahaan, PJT & TT, Struktur Organisasi, Legalitas, Peralatan, SOP.</p>
                <button @click="openGroup = 'profil'; activeTab = 'profil-perusahaan'" class="w-full bg-slate-800 hover:bg-amber-500/20 hover:text-amber-300 text-slate-200 border border-slate-700 py-2 rounded-lg text-xs font-bold transition">
                    Kelola Halaman Profil
                </button>
            </div>

            <!-- Group 2: SLO -->
            <div class="bg-slate-950/60 border border-slate-800 rounded-xl p-5 space-y-3">
                <div class="flex items-center gap-2 text-emerald-400 font-bold text-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                    Sertifikat Layak Operasi (SLO)
                </div>
                <p class="text-xs text-slate-400">Regulasi Ketenagalistrikan, Verifikasi SLO, Cek Permohonan, Bidang Layanan.</p>
                <button @click="openGroup = 'slo'; activeTab = 'slo-regulasi'" class="w-full bg-slate-800 hover:bg-emerald-500/20 hover:text-emerald-300 text-slate-200 border border-slate-700 py-2 rounded-lg text-xs font-bold transition">
                    Kelola Modul SLO
                </button>
            </div>

            <!-- Group 3: Informasi Publik -->
            <div class="bg-slate-950/60 border border-slate-800 rounded-xl p-5 space-y-3">
                <div class="flex items-center gap-2 text-sky-400 font-bold text-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-sky-400"></span>
                    Informasi Publik
                </div>
                <p class="text-xs text-slate-400">Maklumat Layanan, Uji Petik, Keluhan & Banding, Standar Pelayanan (Harga & Prosedur).</p>
                <button @click="openGroup = 'infopub'; activeTab = 'maklumat-layanan'" class="w-full bg-slate-800 hover:bg-sky-500/20 hover:text-sky-300 text-slate-200 border border-slate-700 py-2 rounded-lg text-xs font-bold transition">
                    Kelola Informasi Publik
                </button>
            </div>

            <!-- Group 4: Karir -->
            <div class="bg-slate-950/60 border border-slate-800 rounded-xl p-5 space-y-3">
                <div class="flex items-center gap-2 text-teal-400 font-bold text-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-teal-400"></span>
                    Karir & Lowongan Kerja
                </div>
                <p class="text-xs text-slate-400">Kelola daftar lowongan pekerjaan yang dibuka dan banner informasi karir.</p>
                <button @click="openGroup = 'karir'; activeTab = 'karir-lowongan'" class="w-full bg-slate-800 hover:bg-teal-500/20 hover:text-teal-300 text-slate-200 border border-slate-700 py-2 rounded-lg text-xs font-bold transition">
                    Kelola Lowongan Karir
                </button>
            </div>

            <!-- Group 5: Hubungi Kami -->
            <div class="bg-slate-950/60 border border-slate-800 rounded-xl p-5 space-y-3">
                <div class="flex items-center gap-2 text-pink-400 font-bold text-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-pink-400"></span>
                    Hubungi Kami & Pesan
                </div>
                <p class="text-xs text-slate-400">Lihat pesan masuk dari pengunjung web dan kelola informasi kontak & alamat.</p>
                <button @click="openGroup = 'kontak'; activeTab = 'pesan-masuk'" class="w-full bg-slate-800 hover:bg-pink-500/20 hover:text-pink-300 text-slate-200 border border-slate-700 py-2 rounded-lg text-xs font-bold transition">
                    Lihat Kotak Masuk Pesan
                </button>
            </div>

            <!-- Group 6: Galeri Media -->
            <div class="bg-slate-950/60 border border-slate-800 rounded-xl p-5 space-y-3">
                <div class="flex items-center gap-2 text-purple-400 font-bold text-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-purple-400"></span>
                    Galeri & Foto Operasional
                </div>
                <p class="text-xs text-slate-400">Upload dan kelola album foto galeri kegiatan inspeksi ketenagalistrikan.</p>
                <button @click="openGroup = 'galeri'; activeTab = 'galeri'" class="w-full bg-slate-800 hover:bg-purple-500/20 hover:text-purple-300 text-slate-200 border border-slate-700 py-2 rounded-lg text-xs font-bold transition">
                    Kelola Galeri Media
                </button>
            </div>
        </div>
    </div>
</div>
