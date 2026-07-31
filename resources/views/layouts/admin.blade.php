<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Console - Pradana Nusa Energi')</title>
    <script>
        // Run immediately before any CSS loads to prevent flash
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100 h-screen flex flex-col md:flex-row antialiased selection:bg-blue-500 selection:text-white overflow-hidden"
    x-data="{ 
        sidebarOpen: false, 
        deleteModalOpen: false,
        deleteActionUrl: '',
        deleteTitle: 'Konfirmasi Hapus',
        deleteMessage: 'Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.',
        confirmDelete(url, title = null, message = null) {
            this.deleteActionUrl = url;
            if (title) this.deleteTitle = title;
            if (message) this.deleteMessage = message;
            this.deleteModalOpen = true;
        },
        activeTab: '{{ request()->get('tab', 'dashboard') ?: 'dashboard' }}',
        activeGroup: '{{ request()->get('group', '') }}',
        openGroups: {
            beranda: true,
            profil: true,
            slo: true,
            infopub: false,
            galeri: false,
            karir: false,
            kontak: false
        },
        openSub: '{{ request()->get('sub', '') }}',
        isAdminRoot() {
            return window.location.pathname === '/admin' || window.location.pathname === '/admin/';
        },
        isActiveTab(tab, group = '') {
            return this.activeTab === tab && this.activeGroup === group;
        },
        isActiveGroup(group) {
            return this.activeGroup === group;
        },
        switchTab(tab, group = '') {
            if (this.isAdminRoot()) {
                this.activeTab = tab;
                this.activeGroup = group;
                if (group && this.openGroups.hasOwnProperty(group)) {
                    this.openGroups[group] = true;
                }
                this.sidebarOpen = false;
            } else {
                let url = '{{ route('admin.dashboard') }}?tab=' + tab;
                if (group) url += '&group=' + group;
                window.location.href = url;
            }
        }
    }">

    <!-- MOBILE OVERLAY -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false" x-cloak class="fixed inset-0 bg-slate-50/80 dark:bg-slate-950/80 backdrop-blur-sm z-40 md:hidden"></div>

    <!-- DEDICATED DARK PREMIUM SIDEBAR -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'" class="fixed md:static inset-y-0 left-0 w-72 bg-white dark:bg-slate-900 border-r border-slate-200/80 dark:border-slate-800/80 z-50 transition-transform duration-300 flex flex-col justify-between flex-shrink-0 h-screen overflow-y-auto">

        <div class="p-4 space-y-4">
            <!-- Brand Logo Header -->
            <div class="flex items-center justify-between mb-2">
                <div class="flex items-center space-x-3">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-blue-700 to-sky-500 flex items-center justify-center font-extrabold text-white text-lg shadow-lg shadow-blue-600/20 border border-blue-500/30">
                        P
                    </div>
                    <div>
                        <div class="font-extrabold text-sm tracking-tight text-slate-900 dark:text-white">
                            PRADANA
                        </div>
                        <span class="text-[10px] text-slate-500 font-medium">Panel Admin</span>
                    </div>
                </div>
                <button @click="sidebarOpen = false" class="md:hidden text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <!-- Navigation — Mirror Navbar Structure Exactly -->
            <nav class="space-y-0.5">

                {{-- ── DASHBOARD ── --}}
                <div class="mb-2">
                    <button @click="switchTab('dashboard')"
                        :class="activeTab === 'dashboard' && activeGroup === '' && isAdminRoot() ? 'bg-blue-600/15 text-blue-500 border-blue-500/30 font-bold' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/60 dark:hover:bg-slate-800/60 border-transparent'"
                        class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl border text-xs transition-all font-medium">
                        <svg class="w-4 h-4 shrink-0" :class="activeMenu === 'dashboard' && isAdminRoot() ? 'text-blue-500' : 'text-slate-500'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        Dashboard
                    </button>
                </div>

                <div class="h-px bg-slate-100 dark:bg-slate-800 my-2"></div>

                {{-- ── BERANDA (Semua kontrol Beranda dalam 1 halaman dengan tab) ── --}}
                <div class="mb-2">
                    <button @click="switchTab('hero', 'beranda')"
                        :class="isActiveGroup('beranda') && isAdminRoot() ? 'bg-blue-600/15 text-blue-500 border-blue-500/30 font-bold' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/60 dark:hover:bg-slate-800/60 border-transparent'"
                        class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl border text-xs transition-all font-medium">
                        <svg class="w-4 h-4 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        Beranda
                    </button>
                </div>

                {{-- ── PROFIL (Sub-menu overview & 6 CRUD pages) ── --}}
                <div>
                    <button @click="openGroups.profil = !openGroups.profil"
                        class="w-full flex items-center justify-between px-3 py-2 rounded-xl text-xs font-semibold text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/40 dark:hover:bg-slate-800/40 transition-all">
                        <div class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-blue-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            Profil
                        </div>
                        <svg class="w-3 h-3 text-slate-600 transition-transform duration-200" :class="openGroups.profil ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="openGroups.profil" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-cloak class="mt-0.5 ml-5 pl-3 border-l border-slate-200 dark:border-slate-800 space-y-0.5">
                        <button @click="switchTab('profil', 'profil')" :class="isActiveTab('profil', 'profil') && isAdminRoot() ? 'text-blue-500 font-bold bg-blue-600/10' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/50 dark:hover:bg-slate-800/50'" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all">Header & Ringkasan Profil</button>
                        <a href="{{ route('admin.profil.perusahaan.index') }}" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all block {{ request()->is('admin/profil/perusahaan*') ? 'text-blue-500 font-bold bg-blue-600/10' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/50 dark:hover:bg-slate-800/50' }}">Kelola Profil Perusahaan</a>
                        <a href="{{ route('admin.profil.daftar-pjttt.index') }}" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all block {{ request()->is('admin/profil/daftar-pjttt*') ? 'text-blue-500 font-bold bg-blue-600/10' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/50 dark:hover:bg-slate-800/50' }}">Kelola Daftar PJT & TT</a>
                        <a href="{{ route('admin.profil.struktur-organisasi.index') }}" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all block {{ request()->is('admin/profil/struktur-organisasi*') ? 'text-blue-500 font-bold bg-blue-600/10' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/50 dark:hover:bg-slate-800/50' }}">Kelola Struktur Organisasi</a>
                        <a href="{{ route('admin.profil.legalitas.index') }}" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all block {{ request()->is('admin/profil/legalitas*') ? 'text-blue-500 font-bold bg-blue-600/10' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/50 dark:hover:bg-slate-800/50' }}">Kelola Legalitas Perusahaan</a>
                        <a href="{{ route('admin.profil.peralatan.index') }}" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all block {{ request()->is('admin/profil/peralatan*') ? 'text-blue-500 font-bold bg-blue-600/10' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/50 dark:hover:bg-slate-800/50' }}">Peralatan Ketenagalistrikan</a>
                        <a href="{{ route('admin.profil.sop.index') }}" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all block {{ request()->is('admin/profil/sop*') ? 'text-blue-500 font-bold bg-blue-600/10' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/50 dark:hover:bg-slate-800/50' }}">Standar Operasional Prosedur</a>
                    </div>
                </div>

                {{-- ── SLO (4 sub-menu) ── --}}
                <div>
                    <button @click="openGroups.slo = !openGroups.slo"
                        class="w-full flex items-center justify-between px-3 py-2 rounded-xl text-xs font-semibold text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/40 dark:hover:bg-slate-800/40 transition-all">
                        <div class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            SLO
                        </div>
                        <svg class="w-3 h-3 text-slate-600 transition-transform duration-200" :class="openGroups.slo ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="openGroups.slo" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-cloak class="mt-0.5 ml-5 pl-3 border-l border-slate-200 dark:border-slate-800 space-y-0.5">
                        <button @click="switchTab('slo-regulasi', 'slo')" :class="isActiveTab('slo-regulasi', 'slo') && isAdminRoot() ? 'text-blue-500 font-bold bg-blue-600/10' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/50 dark:hover:bg-slate-800/50'" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all">Regulasi</button>
                        <a href="{{ route('admin.slo.kategori-layanan.index') }}" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all block {{ request()->is('admin/slo/kategori-layanan*') ? 'text-blue-500 font-bold bg-blue-600/10' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/50 dark:hover:bg-slate-800/50' }}">Bidang Layanan</a>
                    </div>
                </div>

                {{-- ── INFORMASI PUBLIK (3 item + sub-group Standar Pelayanan 4 item) ── --}}
                <div>
                    <button @click="openGroups.infopub = !openGroups.infopub"
                        class="w-full flex items-center justify-between px-3 py-2 rounded-xl text-xs font-semibold text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/40 dark:hover:bg-slate-800/40 transition-all">
                        <div class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-sky-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Informasi Publik
                        </div>
                        <svg class="w-3 h-3 text-slate-600 transition-transform duration-200" :class="openGroups.infopub ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="openGroups.infopub" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-cloak class="mt-0.5 ml-5 pl-3 border-l border-slate-200 dark:border-slate-800 space-y-0.5">
                        <a href="{{ route('admin.informasi-publik.maklumat.index') }}" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all block {{ request()->is('admin/informasi-publik/maklumat-layanan*') ? 'text-blue-500 font-bold bg-blue-600/10' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/50 dark:hover:bg-slate-800/50' }}">Maklumat Layanan</a>
                        <a href="{{ route('admin.informasi-publik.uji-petik.index') }}" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all block {{ request()->is('admin/informasi-publik/uji-petik*') ? 'text-blue-500 font-bold bg-blue-600/10' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/50 dark:hover:bg-slate-800/50' }}">Uji Petik</a>
                        <a href="{{ route('admin.informasi-publik.keluhan-banding.index') }}" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all block {{ request()->is('admin/informasi-publik/keluhan-banding*') ? 'text-blue-500 font-bold bg-blue-600/10' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/50 dark:hover:bg-slate-800/50' }}">Keluhan & Banding</a>

                        {{-- Sub-group: Standar Pelayanan → 4 item --}}
                        <div>
                            <button @click="openSub = openSub === 'standar' ? '' : 'standar'"
                                class="w-full flex items-center justify-between px-3 py-2 rounded-lg text-xs text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/50 dark:hover:bg-slate-800/50 transition-all">
                                <span class="flex items-center gap-2">
                                    <svg class="w-3 h-3 text-slate-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                                    Standar Pelayanan
                                </span>
                                <svg class="w-3 h-3 text-slate-600 transition-transform duration-200" :class="openSub === 'standar' ? 'rotate-90' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                            </button>
                            <div x-show="openSub === 'standar'" x-transition x-cloak class="ml-3 pl-3 border-l border-slate-800/60 space-y-0.5 mt-0.5">
                                <a href="{{ route('admin.informasi-publik.persyaratan-slo.index') }}" class="w-full text-left px-3 py-1.5 rounded-lg text-xs transition-all block {{ request()->is('admin/informasi-publik/persyaratan-slo*') ? 'text-blue-500 font-bold bg-blue-600/10' : 'text-slate-500 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/50 dark:hover:bg-slate-800/50' }}">Persyaratan SLO</a>
                                <a href="{{ route('admin.informasi-publik.daftar-harga-slo.index') }}" class="w-full text-left px-3 py-1.5 rounded-lg text-xs transition-all block {{ request()->is('admin/informasi-publik/daftar-harga-slo*') ? 'text-blue-500 font-bold bg-blue-600/10' : 'text-slate-500 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/50 dark:hover:bg-slate-800/50' }}">Daftar Harga SLO</a>
                                <a href="{{ route('admin.informasi-publik.prosedur-slo.index') }}" class="w-full text-left px-3 py-1.5 rounded-lg text-xs transition-all block {{ request()->is('admin/informasi-publik/prosedur-slo*') ? 'text-blue-500 font-bold bg-blue-600/10' : 'text-slate-500 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/50 dark:hover:bg-slate-800/50' }}">Prosedur SLO</a>
                                <a href="{{ route('admin.informasi-publik.alur-sertifikasi.index') }}" class="w-full text-left px-3 py-1.5 rounded-lg text-xs transition-all block {{ request()->is('admin/informasi-publik/alur-sertifikasi*') ? 'text-blue-500 font-bold bg-blue-600/10' : 'text-slate-500 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/50 dark:hover:bg-slate-800/50' }}">Alur Sertifikasi</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="h-px bg-slate-100 dark:bg-slate-800 my-2"></div>

                {{-- ── GALERI ── --}}
                <div class="mb-2">
                    <button @click="switchTab('galeri', 'galeri')"
                        :class="isActiveTab('galeri', 'galeri') && isAdminRoot() ? 'bg-purple-500/15 text-purple-300 border-purple-500/30 font-bold' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/60 dark:hover:bg-slate-800/60 border-transparent'"
                        class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl border text-xs transition-all font-medium">
                        <svg class="w-4 h-4 text-purple-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Galeri
                    </button>
                </div>

                {{-- ── LOGO ── --}}
                <div>
                    <button @click="switchTab('logo')"
                        :class="activeTab === 'logo' && activeGroup === '' && isAdminRoot() ? 'bg-violet-500/15 text-violet-400 border-violet-500/30 font-bold' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/60 dark:hover:bg-slate-800/60 border-transparent'"
                        class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl border text-xs transition-all font-medium">
                        <svg class="w-4 h-4 shrink-0" :class="activeTab === 'logo' && window.location.pathname === '/admin' ? 'text-violet-400' : 'text-slate-500'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Manajemen Logo
                    </button>
                </div>

                {{-- ── KARIR ── --}}
                <div>
                    <button @click="openGroups.karir = !openGroups.karir"
                        class="w-full flex items-center justify-between px-3 py-2 rounded-xl text-xs font-semibold text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/40 dark:hover:bg-slate-800/40 transition-all">
                        <div class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-teal-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            Karir
                        </div>
                        <svg class="w-3 h-3 text-slate-600 transition-transform duration-200" :class="openGroups.karir ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="openGroups.karir" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-cloak class="mt-0.5 ml-5 pl-3 border-l border-slate-200 dark:border-slate-800 space-y-0.5">
                        <a href="{{ route('admin.lowongan-kerja.index') }}" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all block {{ request()->is('admin/lowongan-kerja*') ? 'text-blue-500 font-bold bg-blue-600/10' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/50 dark:hover:bg-slate-800/50' }}">Lowongan Pekerjaan</a>
                        <a href="{{ route('admin.karir-settings.index') }}" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all block {{ request()->is('admin/karir-settings*') ? 'text-blue-500 font-bold bg-blue-600/10' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/50 dark:hover:bg-slate-800/50' }}">Pengaturan Halaman</a>
                    </div>
                </div>

                {{-- ── HUBUNGI KAMI ── --}}
                <div>
                    <button @click="openGroups.kontak = !openGroups.kontak"
                        class="w-full flex items-center justify-between px-3 py-2 rounded-xl text-xs font-semibold text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/40 dark:hover:bg-slate-800/40 transition-all">
                        <div class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-pink-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            Hubungi Kami
                        </div>
                        <svg class="w-3 h-3 text-slate-600 transition-transform duration-200" :class="openGroups.kontak ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="openGroups.kontak" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-cloak class="mt-0.5 ml-5 pl-3 border-l border-slate-200 dark:border-slate-800 space-y-0.5">
                        <button @click="switchTab('kontak', 'kontak')" :class="isActiveTab('kontak', 'kontak') && isAdminRoot() ? 'text-blue-500 font-bold bg-blue-600/10' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/50 dark:hover:bg-slate-800/50'" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all">Banner Kontak</button>
                        <button @click="switchTab('hubungi-kami', 'kontak')" :class="isActiveTab('hubungi-kami', 'kontak') && isAdminRoot() ? 'text-blue-500 font-bold bg-blue-600/10' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/50 dark:hover:bg-slate-800/50'" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all">Informasi Hubungi Kami</button>
                        <button @click="switchTab('pesan-masuk', 'kontak')" :class="isActiveTab('pesan-masuk', 'kontak') && isAdminRoot() ? 'text-blue-500 font-bold bg-blue-600/10' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/50 dark:hover:bg-slate-800/50'" class="w-full text-left px-3 py-2 rounded-lg text-xs transition-all">Pesan Masuk</button>
                    </div>
                </div>

                <div class="mt-2">
                    <a href="{{ route('admin.footer-legal.index') }}" class="w-full flex items-center gap-3 px-3 py-2 rounded-xl text-xs font-semibold text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/40 dark:hover:bg-slate-800/40 transition-all block {{ request()->is('admin/footer-legal*') ? 'text-blue-500 bg-blue-600/10' : '' }}">
                        <svg class="w-4 h-4 text-slate-600 dark:text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7M9 7h10M9 11h6"></path></svg>
                        Kelola Footer Legal
                    </a>
                </div>

                <div class="h-px bg-slate-100 dark:bg-slate-800 my-2"></div>

                <div class="mb-2">
                    <a href="{{ route('admin.users.index') }}" class="w-full flex items-center gap-3 px-3 py-2 rounded-xl text-xs font-semibold text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200/40 dark:hover:bg-slate-800/40 transition-all block {{ request()->is('admin/users*') ? 'text-blue-500 bg-blue-600/10' : '' }}">
                        <svg class="w-4 h-4 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        Manajemen Akun
                    </a>
                </div>

            </nav>
        </div>

        <!-- User Profile Bottom Bar -->
        <div class="p-4 border-t border-slate-200/80 dark:border-slate-800/80 bg-white/80 dark:bg-slate-900/80 sticky bottom-0">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3 overflow-hidden">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-blue-700 to-sky-500 border border-blue-500/30 flex items-center justify-center font-bold text-white text-xs flex-shrink-0 shadow">
                        {{ strtoupper(substr(Auth::user()->name ?? 'Admin', 0, 2)) }}
                    </div>
                    <div class="truncate">
                        <div class="text-xs font-bold text-slate-800 dark:text-slate-200 truncate">{{ Auth::user()->name ?? 'Administrator' }}</div>
                        <div class="text-[10px] text-slate-600 dark:text-slate-400 truncate">{{ Auth::user()->email ?? 'admin@pradana.co.id' }}</div>
                    </div>
                </div>

                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" title="Logout" class="p-2 rounded-xl text-slate-600 dark:text-slate-400 hover:text-rose-400 hover:bg-rose-500/10 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    </button>
                </form>
            </div>
        </div>

    </aside>

    <!-- MAIN APP CONTENT AREA -->
    <div class="flex-1 flex flex-col min-w-0 bg-slate-50 dark:bg-slate-950 overflow-hidden">

        <!-- TOP BAR -->
        <header class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-md border-b border-slate-200/80 dark:border-slate-800/80 px-6 py-4 flex items-center justify-between flex-shrink-0">
            <div class="flex items-center gap-4">
                <button @click="sidebarOpen = true" class="md:hidden text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <div class="text-xs font-semibold text-slate-600 dark:text-slate-400 flex items-center gap-2">
                    <span>Panel Admin</span>
                    <span class="text-slate-600">/</span>
                    <span class="text-blue-500 font-bold uppercase tracking-wider" x-text="activeTab.replace('_', ' ')"></span>
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <button onclick="(function(){ document.documentElement.classList.toggle('dark'); localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light'); })()" class="p-2 rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-500 dark:text-slate-400 hover:bg-slate-200 dark:hover:bg-slate-700 transition">
                    <svg class="w-4 h-4 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    <svg class="w-4 h-4 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                </button>
                <a href="{{ route('home') }}" target="_blank" class="bg-blue-600/10 hover:bg-blue-600/20 text-blue-500 border border-blue-600/30 text-xs font-bold px-3.5 py-1.5 rounded-xl transition flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    <span>Pratinjau Web Utama</span>
                </a>
            </div>
        </header>

        <!-- DASHBOARD BODY CONTAINER -->
        <main class="flex-1 overflow-y-auto p-6 md:p-8 w-full space-y-8">

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

        <!-- FOOTER -->
        <footer class="border-t border-slate-900 py-4 px-8 text-center text-xs text-slate-500 flex-shrink-0 bg-slate-50 dark:bg-slate-950">
            &copy; {{ date('Y') }} PT Pradana Nusa Energi
        </footer>

    </div>

    @stack('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Global Delete Confirmation Modal -->
    <div x-show="deleteModalOpen" x-cloak class="relative z-[100]" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Backdrop -->
        <div x-show="deleteModalOpen"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4">
                <!-- Modal Panel -->
                <div x-show="deleteModalOpen"
                     x-transition:enter="ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4 scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                     x-transition:leave="ease-in duration-200"
                     x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                     x-transition:leave-end="opacity-0 translate-y-4 scale-95"
                     class="relative w-full max-w-md transform overflow-hidden rounded-2xl bg-white dark:bg-slate-900 text-left shadow-2xl shadow-black/40 transition-all border border-slate-200 dark:border-slate-800">

                    <!-- Modal Header / Icon -->
                    <div class="px-6 pt-6 pb-4">
                        <div class="flex items-start gap-4">
                            <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-full bg-rose-100 dark:bg-rose-500/20">
                                <svg class="h-6 w-6 text-rose-600 dark:text-rose-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-base font-bold text-slate-900 dark:text-white" id="modal-title" x-text="deleteTitle"></h3>
                                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400" x-text="deleteMessage"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Actions -->
                    <div class="bg-slate-50 dark:bg-slate-800/50 px-6 py-4 flex flex-row-reverse gap-3 border-t border-slate-200 dark:border-slate-800 rounded-b-2xl">
                        <form :action="deleteActionUrl" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-rose-600 hover:bg-rose-500 text-white text-sm font-semibold shadow-sm shadow-rose-500/20 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                Hapus
                            </button>
                        </form>
                        <button type="button" @click="deleteModalOpen = false" class="px-4 py-2 rounded-xl bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 text-sm font-semibold ring-1 ring-slate-300 dark:ring-slate-700 hover:bg-slate-100 dark:hover:bg-slate-700 transition">
                            Batal
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>
</html>
