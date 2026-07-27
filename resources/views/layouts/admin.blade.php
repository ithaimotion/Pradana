<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Console - Pradana Nusa Energi')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen flex flex-col md:flex-row antialiased selection:bg-orange-500 selection:text-white"
    x-data="{ sidebarOpen: false, activeTab: 'dashboard', openGroup: 'profil', openSub: '' }">

    <!-- MOBILE OVERLAY -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false" x-cloak class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm z-40 md:hidden"></div>

    <!-- DEDICATED DARK PREMIUM SIDEBAR -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'" class="fixed md:static inset-y-0 left-0 w-72 bg-slate-900 border-r border-slate-800/80 z-50 transition-transform duration-300 flex flex-col justify-between flex-shrink-0 h-screen overflow-y-auto">

        <div class="p-4 space-y-4">
            <!-- Brand Logo Header -->
            <div class="flex items-center justify-between mb-2">
                <div class="flex items-center space-x-3">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-orange-600 to-amber-500 flex items-center justify-center font-extrabold text-white text-lg shadow-lg shadow-orange-500/20 border border-orange-400/30">
                        P
                    </div>
                    <div>
                        <div class="font-extrabold text-sm tracking-tight text-white flex items-center gap-1.5">
                            PRADANA <span class="text-orange-500 text-[9px] px-1 py-0.5 rounded bg-orange-500/10 border border-orange-500/20 font-mono">CMS PRO</span>
                        </div>
                        <span class="text-[10px] text-slate-500 font-medium">Admin Studio</span>
                    </div>
                </div>
                <button @click="sidebarOpen = false" class="md:hidden text-slate-400 hover:text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <!-- Navigation — Mirror Navbar Structure Exactly -->
            <nav class="space-y-0.5">

                {{-- ── DASHBOARD ── --}}
                <div class="mb-2">
                    <button @click="activeTab = 'dashboard'; sidebarOpen = false"
                        :class="activeTab === 'dashboard' ? 'bg-orange-500/15 text-orange-400 border-orange-500/30 font-bold' : 'text-slate-400 hover:text-white hover:bg-slate-800/60 border-transparent'"
                        class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl border text-xs transition-all font-medium">
                        <svg class="w-4 h-4 shrink-0" :class="activeTab === 'dashboard' ? 'text-orange-400' : 'text-slate-500'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        Dashboard
                    </button>
                </div>

                <div class="h-px bg-slate-800 my-2"></div>

                {{-- ── BERANDA (Hero Banner, Statistik) ── --}}
                <div>
                    <button @click="openGroup = openGroup === 'beranda' ? '' : 'beranda'"
                        class="w-full flex items-center justify-between px-3 py-2 rounded-xl text-xs font-semibold text-slate-300 hover:text-white hover:bg-slate-800/40 transition-all">
                        <div class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-orange-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            Beranda
                        </div>
                        <svg class="w-3 h-3 text-slate-600 transition-transform duration-200" :class="openGroup === 'beranda' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="openGroup === 'beranda'" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-cloak class="mt-0.5 ml-5 pl-3 border-l border-slate-800 space-y-0.5">
                        <button @click="activeTab = 'hero'; sidebarOpen = false" :class="activeTab === 'hero' ? 'text-orange-400 font-bold bg-orange-500/10' : 'text-slate-400 hover:text-white hover:bg-slate-800/50'" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all">Hero Banner</button>
                        <button @click="activeTab = 'profil'; sidebarOpen = false" :class="activeTab === 'profil' ? 'text-orange-400 font-bold bg-orange-500/10' : 'text-slate-400 hover:text-white hover:bg-slate-800/50'" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all">Profil Pradana</button>
                        <button @click="activeTab = 'statistik'; sidebarOpen = false" :class="activeTab === 'statistik' ? 'text-orange-400 font-bold bg-orange-500/10' : 'text-slate-400 hover:text-white hover:bg-slate-800/50'" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all">Statistik Performa</button>
                        <button @click="activeTab = 'tentang'; sidebarOpen = false" :class="activeTab === 'tentang' ? 'text-orange-400 font-bold bg-orange-500/10' : 'text-slate-400 hover:text-white hover:bg-slate-800/50'" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all">Tentang Pradana</button>
                        <button @click="activeTab = 'teknologi'; sidebarOpen = false" :class="activeTab === 'teknologi' ? 'text-orange-400 font-bold bg-orange-500/10' : 'text-slate-400 hover:text-white hover:bg-slate-800/50'" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all">Teknologi Terintegrasi</button>
                        <button @click="activeTab = 'keunggulan'; sidebarOpen = false" :class="activeTab === 'keunggulan' ? 'text-orange-400 font-bold bg-orange-500/10' : 'text-slate-400 hover:text-white hover:bg-slate-800/50'" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all">Keunggulan APC+</button>
                        <button @click="activeTab = 'energi'; sidebarOpen = false" :class="activeTab === 'energi' ? 'text-orange-400 font-bold bg-orange-500/10' : 'text-slate-400 hover:text-white hover:bg-slate-800/50'" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all">Energi Berkelanjutan</button>
                        <button @click="activeTab = 'mengapa'; sidebarOpen = false" :class="activeTab === 'mengapa' ? 'text-orange-400 font-bold bg-orange-500/10' : 'text-slate-400 hover:text-white hover:bg-slate-800/50'" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all">Mengapa Pilih Pradana</button>
                        <button @click="activeTab = 'kontak'; sidebarOpen = false" :class="activeTab === 'kontak' ? 'text-orange-400 font-bold bg-orange-500/10' : 'text-slate-400 hover:text-white hover:bg-slate-800/50'" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all">Kontak & Banner CTA</button>
                    </div>
                </div>

                {{-- ── PROFIL (6 sub-menu) ── --}}
                <div>
                    <button @click="openGroup = openGroup === 'profil' ? '' : 'profil'"
                        class="w-full flex items-center justify-between px-3 py-2 rounded-xl text-xs font-semibold text-slate-300 hover:text-white hover:bg-slate-800/40 transition-all">
                        <div class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-amber-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            Profil
                        </div>
                        <svg class="w-3 h-3 text-slate-600 transition-transform duration-200" :class="openGroup === 'profil' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="openGroup === 'profil'" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-cloak class="mt-0.5 ml-5 pl-3 border-l border-slate-800 space-y-0.5">
                        <a href="{{ route('admin.profil.perusahaan.index') }}" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all block text-slate-400 hover:text-white hover:bg-slate-800/50 relative z-10">Kelola Profil Perusahaan</a>
                        <a href="{{ route('admin.profil.daftar-pjttt.index') }}" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all block text-slate-400 hover:text-white hover:bg-slate-800/50 relative z-10">Kelola Daftar PJT & TT</a>
                        <a href="{{ route('admin.profil.struktur-organisasi.index') }}" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all block text-slate-400 hover:text-white hover:bg-slate-800/50 relative z-10">Kelola Struktur Organisasi</a>
                        <a href="{{ route('admin.profil.legalitas.index') }}" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all block text-slate-400 hover:text-white hover:bg-slate-800/50 relative z-10">Kelola Legalitas Perusahaan</a>
                        <a href="{{ route('admin.profil.peralatan.index') }}" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all block text-slate-400 hover:text-white hover:bg-slate-800/50 relative z-10">Peralatan Ketenagalistrikan</a>
                        <a href="{{ route('admin.profil.sop.index') }}" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all block text-slate-400 hover:text-white hover:bg-slate-800/50 relative z-10">Standar Operasional Prosedur</a>
                    </div>
                </div>

                {{-- ── SLO (4 sub-menu) ── --}}
                <div>
                    <button @click="openGroup = openGroup === 'slo' ? '' : 'slo'"
                        class="w-full flex items-center justify-between px-3 py-2 rounded-xl text-xs font-semibold text-slate-300 hover:text-white hover:bg-slate-800/40 transition-all">
                        <div class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            SLO
                        </div>
                        <svg class="w-3 h-3 text-slate-600 transition-transform duration-200" :class="openGroup === 'slo' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="openGroup === 'slo'" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-cloak class="mt-0.5 ml-5 pl-3 border-l border-slate-800 space-y-0.5">
                        <button @click="activeTab = 'slo-regulasi'; sidebarOpen = false" :class="activeTab === 'slo-regulasi' ? 'text-orange-400 font-bold bg-orange-500/10' : 'text-slate-400 hover:text-white hover:bg-slate-800/50'" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all">Regulasi</button>
                        <button @click="activeTab = 'slo-verifikasi'; sidebarOpen = false" :class="activeTab === 'slo-verifikasi' ? 'text-orange-400 font-bold bg-orange-500/10' : 'text-slate-400 hover:text-white hover:bg-slate-800/50'" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all">Verifikasi SLO</button>
                        <button @click="activeTab = 'slo-cek-permohonan'; sidebarOpen = false" :class="activeTab === 'slo-cek-permohonan' ? 'text-orange-400 font-bold bg-orange-500/10' : 'text-slate-400 hover:text-white hover:bg-slate-800/50'" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all">Cek Permohonan SLO</button>
                        <button @click="activeTab = 'slo-bidang-layanan'; sidebarOpen = false" :class="activeTab === 'slo-bidang-layanan' ? 'text-orange-400 font-bold bg-orange-500/10' : 'text-slate-400 hover:text-white hover:bg-slate-800/50'" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all">Bidang Layanan</button>
                    </div>
                </div>

                {{-- ── INFORMASI PUBLIK (3 item + sub-group Standar Pelayanan 4 item) ── --}}
                <div>
                    <button @click="openGroup = openGroup === 'infopub' ? '' : 'infopub'"
                        class="w-full flex items-center justify-between px-3 py-2 rounded-xl text-xs font-semibold text-slate-300 hover:text-white hover:bg-slate-800/40 transition-all">
                        <div class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-sky-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Informasi Publik
                        </div>
                        <svg class="w-3 h-3 text-slate-600 transition-transform duration-200" :class="openGroup === 'infopub' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="openGroup === 'infopub'" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-cloak class="mt-0.5 ml-5 pl-3 border-l border-slate-800 space-y-0.5">
                        <button @click="activeTab = 'maklumat-layanan'; sidebarOpen = false" :class="activeTab === 'maklumat-layanan' ? 'text-orange-400 font-bold bg-orange-500/10' : 'text-slate-400 hover:text-white hover:bg-slate-800/50'" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all">Maklumat Layanan</button>
                        <button @click="activeTab = 'uji-petik'; sidebarOpen = false" :class="activeTab === 'uji-petik' ? 'text-orange-400 font-bold bg-orange-500/10' : 'text-slate-400 hover:text-white hover:bg-slate-800/50'" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all">Uji Petik</button>
                        <button @click="activeTab = 'keluhan-banding'; sidebarOpen = false" :class="activeTab === 'keluhan-banding' ? 'text-orange-400 font-bold bg-orange-500/10' : 'text-slate-400 hover:text-white hover:bg-slate-800/50'" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all">Keluhan & Banding</button>

                        {{-- Sub-group: Standar Pelayanan → 4 item --}}
                        <div>
                            <button @click="openSub = openSub === 'standar' ? '' : 'standar'"
                                class="w-full flex items-center justify-between px-3 py-2 rounded-lg text-xs text-slate-400 hover:text-white hover:bg-slate-800/50 transition-all">
                                <span class="flex items-center gap-2">
                                    <svg class="w-3 h-3 text-slate-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                                    Standar Pelayanan
                                </span>
                                <svg class="w-3 h-3 text-slate-600 transition-transform duration-200" :class="openSub === 'standar' ? 'rotate-90' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                            </button>
                            <div x-show="openSub === 'standar'" x-transition x-cloak class="ml-3 pl-3 border-l border-slate-800/60 space-y-0.5 mt-0.5">
                                <button @click="activeTab = 'persyaratan-slo'; sidebarOpen = false" :class="activeTab === 'persyaratan-slo' ? 'text-orange-400 font-bold bg-orange-500/10' : 'text-slate-500 hover:text-white hover:bg-slate-800/50'" class="w-full text-left px-3 py-1.5 rounded-lg text-xs transition-all">Persyaratan SLO</button>
                                <button @click="activeTab = 'daftar-harga'; sidebarOpen = false" :class="activeTab === 'daftar-harga' ? 'text-orange-400 font-bold bg-orange-500/10' : 'text-slate-500 hover:text-white hover:bg-slate-800/50'" class="w-full text-left px-3 py-1.5 rounded-lg text-xs transition-all">Daftar Harga SLO</button>
                                <button @click="activeTab = 'prosedur-slo'; sidebarOpen = false" :class="activeTab === 'prosedur-slo' ? 'text-orange-400 font-bold bg-orange-500/10' : 'text-slate-500 hover:text-white hover:bg-slate-800/50'" class="w-full text-left px-3 py-1.5 rounded-lg text-xs transition-all">Prosedur SLO</button>
                                <button @click="activeTab = 'alur-sertifikasi'; sidebarOpen = false" :class="activeTab === 'alur-sertifikasi' ? 'text-orange-400 font-bold bg-orange-500/10' : 'text-slate-500 hover:text-white hover:bg-slate-800/50'" class="w-full text-left px-3 py-1.5 rounded-lg text-xs transition-all">Alur Sertifikasi</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="h-px bg-slate-800 my-2"></div>

                {{-- ── GALERI ── --}}
                <div>
                    <button @click="openGroup = openGroup === 'galeri' ? '' : 'galeri'"
                        class="w-full flex items-center justify-between px-3 py-2 rounded-xl text-xs font-semibold text-slate-300 hover:text-white hover:bg-slate-800/40 transition-all">
                        <div class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-purple-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            Galeri
                        </div>
                        <svg class="w-3 h-3 text-slate-600 transition-transform duration-200" :class="openGroup === 'galeri' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="openGroup === 'galeri'" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-cloak class="mt-0.5 ml-5 pl-3 border-l border-slate-800 space-y-0.5">
                        <button @click="activeTab = 'galeri'; sidebarOpen = false" :class="activeTab === 'galeri' ? 'text-orange-400 font-bold bg-orange-500/10' : 'text-slate-400 hover:text-white hover:bg-slate-800/50'" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all">Kelola Galeri & Media</button>
                    </div>
                </div>

                {{-- ── KARIR ── --}}
                <div>
                    <button @click="openGroup = openGroup === 'karir' ? '' : 'karir'"
                        class="w-full flex items-center justify-between px-3 py-2 rounded-xl text-xs font-semibold text-slate-300 hover:text-white hover:bg-slate-800/40 transition-all">
                        <div class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-teal-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            Karir
                        </div>
                        <svg class="w-3 h-3 text-slate-600 transition-transform duration-200" :class="openGroup === 'karir' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="openGroup === 'karir'" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-cloak class="mt-0.5 ml-5 pl-3 border-l border-slate-800 space-y-0.5">
                        <button @click="activeTab = 'karir-lowongan'; sidebarOpen = false" :class="activeTab === 'karir-lowongan' ? 'text-orange-400 font-bold bg-orange-500/10' : 'text-slate-400 hover:text-white hover:bg-slate-800/50'" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all">Lowongan Pekerjaan</button>
                        <button @click="activeTab = 'karir-konten'; sidebarOpen = false" :class="activeTab === 'karir-konten' ? 'text-orange-400 font-bold bg-orange-500/10' : 'text-slate-400 hover:text-white hover:bg-slate-800/50'" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all">Konten Halaman Karir</button>
                    </div>
                </div>

                {{-- ── HUBUNGI KAMI ── --}}
                <div>
                    <button @click="openGroup = openGroup === 'kontak' ? '' : 'kontak'"
                        class="w-full flex items-center justify-between px-3 py-2 rounded-xl text-xs font-semibold text-slate-300 hover:text-white hover:bg-slate-800/40 transition-all">
                        <div class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-pink-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            Hubungi Kami
                        </div>
                        <svg class="w-3 h-3 text-slate-600 transition-transform duration-200" :class="openGroup === 'kontak' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="openGroup === 'kontak'" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-cloak class="mt-0.5 ml-5 pl-3 border-l border-slate-800 space-y-0.5">
                        <button @click="activeTab = 'kontak'; sidebarOpen = false" :class="activeTab === 'kontak' ? 'text-orange-400 font-bold bg-orange-500/10' : 'text-slate-400 hover:text-white hover:bg-slate-800/50'" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all">Kontak & Banner CTA</button>
                        <button @click="activeTab = 'pesan-masuk'; sidebarOpen = false" :class="activeTab === 'pesan-masuk' ? 'text-orange-400 font-bold bg-orange-500/10' : 'text-slate-400 hover:text-white hover:bg-slate-800/50'" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all">Pesan Masuk</button>
                    </div>
                </div>

            </nav>
        </div>

        <!-- User Profile Bottom Bar -->
        <div class="p-4 border-t border-slate-800/80 bg-slate-900/80 sticky bottom-0">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3 overflow-hidden">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-orange-600 to-amber-500 border border-orange-400/30 flex items-center justify-center font-bold text-white text-xs flex-shrink-0 shadow">
                        {{ strtoupper(substr(Auth::user()->name ?? 'Admin', 0, 2)) }}
                    </div>
                    <div class="truncate">
                        <div class="text-xs font-bold text-slate-200 truncate">{{ Auth::user()->name ?? 'Administrator' }}</div>
                        <div class="text-[10px] text-slate-400 truncate">{{ Auth::user()->email ?? 'admin@pradana.co.id' }}</div>
                    </div>
                </div>

                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" title="Logout" class="p-2 rounded-xl text-slate-400 hover:text-rose-400 hover:bg-rose-500/10 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    </button>
                </form>
            </div>
        </div>

    </aside>

    <!-- MAIN APP CONTENT AREA -->
    <div class="flex-1 flex flex-col min-w-0 bg-slate-950 min-h-screen">

        <!-- TOP BAR -->
        <header class="bg-slate-900/80 backdrop-blur-md border-b border-slate-800/80 sticky top-0 z-30 px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <button @click="sidebarOpen = true" class="md:hidden text-slate-400 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <div class="text-xs font-semibold text-slate-400 flex items-center gap-2">
                    <span>Admin Studio</span>
                    <span class="text-slate-600">/</span>
                    <span class="text-orange-400 font-bold uppercase tracking-wider" x-text="activeTab.replace('_', ' ')"></span>
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <div class="hidden sm:flex items-center space-x-2 bg-slate-950 border border-slate-800 rounded-full px-3.5 py-1 text-xs text-slate-400 font-mono">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>10/10 Sections Connected</span>
                </div>

                <a href="{{ route('home') }}" target="_blank" class="bg-orange-500/10 hover:bg-orange-500/20 text-orange-400 border border-orange-500/30 text-xs font-bold px-3.5 py-1.5 rounded-xl transition flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    <span>Pratinjau Web Utama</span>
                </a>
            </div>
        </header>

        <!-- DASHBOARD BODY CONTAINER -->
        <main class="flex-1 p-6 md:p-8 max-w-7xl w-full mx-auto space-y-8">
            
            @if(session('success'))
                <div class="bg-emerald-500/10 border border-emerald-500/30 p-4 rounded-xl flex items-center justify-between text-emerald-400 text-sm shadow-sm">
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if($errors->any())
                <div class="bg-rose-500/10 border border-rose-500/30 p-4 rounded-xl text-rose-400 text-sm space-y-1 shadow-sm">
                    <div class="font-semibold mb-1">Terdapat kesalahan input:</div>
                    <ul class="list-disc list-inside text-xs space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>

        <footer class="border-t border-slate-900 py-4 px-8 text-center text-xs text-slate-500">
            &copy; {{ date('Y') }} PT Pradana Nusa Energi — Complete Landing Page CMS Studio
        </footer>

    </div>

    @yield('scripts')
</body>
</html>
