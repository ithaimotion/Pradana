@props(['lowongans', 'pesanMasuks', 'galeri'])

<div x-show="activeTab === 'dashboard' || activeTab === '' || activeTab === null" class="space-y-8" x-cloak>
    <!-- Summary Overview Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card 1: Connected Sections -->
        <div class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border border-slate-200 dark:border-slate-800 rounded-2xl p-5 shadow-xl flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-blue-600/10 border border-blue-500/20 text-blue-500 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            </div>
            <div>
                <div class="text-2xl font-black text-slate-900 dark:text-white">21</div>
                <div class="text-xs text-slate-600 dark:text-slate-400 font-medium">Jumlah Modul Aktif</div>
            </div>
        </div>

        <!-- Card 2: Lowongan Karir -->
        <div class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border border-slate-200 dark:border-slate-800 rounded-2xl p-5 shadow-xl flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-teal-500/10 border border-teal-500/20 text-teal-400 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0H5m14 0l-1.5-4m-11.5 4l1.5-4m0 0l1-3h7l1 3"></path></svg>
            </div>
            <div>
                <div class="text-2xl font-black text-slate-900 dark:text-white">{{ count($lowongans) }}</div>
                <div class="text-xs text-slate-600 dark:text-slate-400 font-medium">Lowongan Karir Terpasang</div>
            </div>
        </div>

        <!-- Card 3: Inbox Pesan -->
        <div class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border border-slate-200 dark:border-slate-800 rounded-2xl p-5 shadow-xl flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-pink-500/10 border border-pink-500/20 text-pink-400 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
            <div>
                <div class="text-2xl font-black text-slate-900 dark:text-white">{{ count($pesanMasuks) }}</div>
                <div class="text-xs text-slate-600 dark:text-slate-400 font-medium">Pesan Masuk (Kotak Kontak)</div>
            </div>
        </div>

        <!-- Card 4: Galeri Media -->
        <div class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border border-slate-200 dark:border-slate-800 rounded-2xl p-5 shadow-xl flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-purple-500/10 border border-purple-500/20 text-purple-400 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <div>
                <div class="text-2xl font-black text-slate-900 dark:text-white">{{ count($galeri) }}</div>
                <div class="text-xs text-slate-600 dark:text-slate-400 font-medium">Foto Galeri Terupload</div>
            </div>
        </div>
    </div>

    <!-- Quick Navigation Shortcuts -->
    <div class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border border-slate-200 dark:border-slate-800 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
        <div class="border-b border-slate-200 dark:border-slate-800 pb-4">
            <h3 class="text-lg font-extrabold text-slate-900 dark:text-white">Navigasi Pengelolaan Konten Website</h3>
            <p class="text-xs text-slate-600 dark:text-slate-400 mt-1">Pilih bagian yang ingin Anda kelola melalui tombol di bawah atau gunakan menu sidebar sebelah kiri.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <!-- Group 1: Profil -->
            <div class="bg-slate-50/80 dark:bg-slate-950/60 border border-slate-200 dark:border-slate-800 rounded-xl p-5 space-y-3">
                <div class="flex items-center gap-2 text-blue-400 font-bold text-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-blue-400"></span>
                    Halaman Profil
                </div>
                <p class="text-xs text-slate-600 dark:text-slate-400">Profil Perusahaan, PJT & TT, Struktur Organisasi, Legalitas, Peralatan, SOP.</p>
                <button @click="switchTab('profil', 'profil')" class="w-full bg-slate-100 dark:bg-slate-800 hover:bg-blue-500/20 hover:text-blue-300 text-slate-800 dark:text-slate-200 border border-slate-300 dark:border-slate-700 py-2 rounded-lg text-xs font-bold transition">
                    Kelola Halaman Profil
                </button>
            </div>

            <!-- Group 2: SLO -->
            <div class="bg-slate-50/80 dark:bg-slate-950/60 border border-slate-200 dark:border-slate-800 rounded-xl p-5 space-y-3">
                <div class="flex items-center gap-2 text-emerald-400 font-bold text-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                    Sertifikat Layak Operasi (SLO)
                </div>
                <p class="text-xs text-slate-600 dark:text-slate-400">Regulasi Ketenagalistrikan, Verifikasi SLO, Cek Permohonan, Bidang Layanan.</p>
                <button @click="openGroup = 'slo'; activeTab = 'slo-regulasi'" class="w-full bg-slate-100 dark:bg-slate-800 hover:bg-emerald-500/20 hover:text-emerald-300 text-slate-800 dark:text-slate-200 border border-slate-300 dark:border-slate-700 py-2 rounded-lg text-xs font-bold transition">
                    Kelola Modul SLO
                </button>
            </div>

            <!-- Group 3: Informasi Publik -->
            <div class="bg-slate-50/80 dark:bg-slate-950/60 border border-slate-200 dark:border-slate-800 rounded-xl p-5 space-y-3">
                <div class="flex items-center gap-2 text-sky-400 font-bold text-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-sky-400"></span>
                    Informasi Publik
                </div>
                <p class="text-xs text-slate-600 dark:text-slate-400">Maklumat Layanan, Uji Petik, Keluhan & Banding, Standar Pelayanan (Harga & Prosedur).</p>
                <button @click="openGroup = 'infopub'; activeTab = 'maklumat-layanan'" class="w-full bg-slate-100 dark:bg-slate-800 hover:bg-sky-500/20 hover:text-sky-300 text-slate-800 dark:text-slate-200 border border-slate-300 dark:border-slate-700 py-2 rounded-lg text-xs font-bold transition">
                    Kelola Informasi Publik
                </button>
            </div>

            <!-- Group 4: Karir -->
            <div class="bg-slate-50/80 dark:bg-slate-950/60 border border-slate-200 dark:border-slate-800 rounded-xl p-5 space-y-3">
                <div class="flex items-center gap-2 text-teal-400 font-bold text-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-teal-400"></span>
                    Karir & Lowongan Kerja
                </div>
                <p class="text-xs text-slate-600 dark:text-slate-400">Kelola daftar lowongan pekerjaan yang dibuka dan banner informasi karir.</p>
                <button @click="openGroup = 'karir'; activeTab = 'karir-lowongan'" class="w-full bg-slate-100 dark:bg-slate-800 hover:bg-teal-500/20 hover:text-teal-300 text-slate-800 dark:text-slate-200 border border-slate-300 dark:border-slate-700 py-2 rounded-lg text-xs font-bold transition">
                    Kelola Lowongan Karir
                </button>
            </div>

            <!-- Group 5: Hubungi Kami -->
            <div class="bg-slate-50/80 dark:bg-slate-950/60 border border-slate-200 dark:border-slate-800 rounded-xl p-5 space-y-3">
                <div class="flex items-center gap-2 text-pink-400 font-bold text-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-pink-400"></span>
                    Hubungi Kami & Pesan
                </div>
                <p class="text-xs text-slate-600 dark:text-slate-400">Lihat pesan masuk dari pengunjung web dan kelola informasi kontak & alamat.</p>
                <button @click="openGroup = 'kontak'; activeTab = 'pesan-masuk'" class="w-full bg-slate-100 dark:bg-slate-800 hover:bg-pink-500/20 hover:text-pink-300 text-slate-800 dark:text-slate-200 border border-slate-300 dark:border-slate-700 py-2 rounded-lg text-xs font-bold transition">
                    Lihat Kotak Masuk Pesan
                </button>
            </div>

            <!-- Group 6: Galeri Media -->
            <div class="bg-slate-50/80 dark:bg-slate-950/60 border border-slate-200 dark:border-slate-800 rounded-xl p-5 space-y-3">
                <div class="flex items-center gap-2 text-purple-400 font-bold text-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-purple-400"></span>
                    Galeri & Foto Operasional
                </div>
                <p class="text-xs text-slate-600 dark:text-slate-400">Upload dan kelola album foto galeri kegiatan inspeksi ketenagalistrikan.</p>
                <button @click="openGroup = 'galeri'; activeTab = 'galeri'" class="w-full bg-slate-100 dark:bg-slate-800 hover:bg-purple-500/20 hover:text-purple-300 text-slate-800 dark:text-slate-200 border border-slate-300 dark:border-slate-700 py-2 rounded-lg text-xs font-bold transition">
                    Kelola Galeri Media
                </button>
            </div>
        </div>
    </div>
</div>
