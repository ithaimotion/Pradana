@props(['logos' => null])

@php
    $resolvedLogos = $logos ?? View::shared('logos') ?? collect();
@endphp

<nav x-data="{ mobileMenuOpen: false }" class="sticky top-0 z-50 bg-white/40 backdrop-blur-xl border-b border-white/30 shadow-sm transition-all duration-300">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">

        <a href="{{ route('home') }}" class="flex items-center gap-3">
            @if($resolvedLogos->count() > 0)
                @foreach($resolvedLogos->take(1) as $logo)
                    @php
                        $logoSrc = null;
                        if (!empty(optional($logo)->url_gambar)) {
                            $logoSrc = str_starts_with(optional($logo)->url_gambar, 'http://') || str_starts_with(optional($logo)->url_gambar, 'https://')
                                ? optional($logo)->url_gambar
                                : asset('storage_public/' . ltrim(optional($logo)->url_gambar, '/'));
                        } elseif (!empty($logo->logo_url)) {
                            $logoSrc = $logo->logo_url;
                        }
                    @endphp

                    @if($logoSrc)
                        <img src="{{ $logoSrc }}" alt="{{ $logo->nama ?? 'Logo' }}" title="{{ $logo->nama ?? 'Logo' }}" class="h-10 w-auto object-contain">
                    @else
                        <img src="{{ asset('images/logo-pnusa.png') }}" alt="p'Nusa Energi" class="h-12 w-auto object-contain">
                    @endif
                @endforeach
            @else
                <img src="{{ asset('images/logo-pnusa.png') }}" alt="p'Nusa Energi" class="h-12 w-auto object-contain">
            @endif
        </a>

        <!-- Desktop Menu -->
        <ul class="hidden lg:flex items-center gap-6">
            <li><a href="{{ route('home') }}" class="text-slate-800 hover:text-blue-500 font-medium transition">Beranda</a></li>

            <li class="relative group">
                <a href="#" class="flex items-center gap-1 text-slate-800 hover:text-blue-500 font-medium transition">
                    Profil
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </a>
                <ul class="absolute left-0 mt-2 w-60 bg-white/90 backdrop-blur-md shadow-xl rounded-lg py-2 hidden group-hover:block z-50 border border-white/50 before:absolute before:-top-4 before:left-0 before:w-full before:h-4">
                    <li><a href="{{ route('profil.perusahaan') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-500 text-slate-700 text-sm transition font-medium">Profil Perusahaan</a></li>
                    <li><a href="{{ route('profil.pjt-tt') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-500 text-slate-700 text-sm transition font-medium">Daftar PJT & TT</a></li>
                    <li><a href="{{ route('profil.struktur-organisasi') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-500 text-slate-700 text-sm transition font-medium">Struktur Organisasi</a></li>
                    <li><a href="{{ route('profil.legalitas-perusahaan') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-500 text-slate-700 text-sm transition font-medium">Legalitas Perusahaan</a></li>
                    <li><a href="{{ route('profil.peralatan') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-500 text-slate-700 text-sm transition font-medium">Peralatan</a></li>
                    <li><a href="{{ route('profil.sop') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-500 text-slate-700 text-sm transition font-medium">Standar Operasi Prosedur</a></li>
                </ul>
            </li>

            <li class="relative group">
                <a href="#" class="flex items-center gap-1 text-slate-800 hover:text-blue-500 font-medium transition">
                    SLO
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </a>
                <ul class="absolute left-0 mt-2 w-56 bg-white/90 backdrop-blur-md shadow-xl rounded-lg py-2 hidden group-hover:block z-50 border border-white/50 before:absolute before:-top-4 before:left-0 before:w-full before:h-4">
                    <li><a href="{{ route('slo.regulasi') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-500 text-slate-700 text-sm transition font-medium">Regulasi</a></li>
                    <li><a href="{{ route('slo.verifikasi') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-500 text-slate-700 text-sm transition font-medium">Verifikasi SLO</a></li>
                    <li><a href="https://siujang.esdm.go.id/Cek-Status-Permohonan" target="_blank" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-500 text-slate-700 text-sm transition font-medium">Cek Permohonan SLO</a></li>
                    <li><a href="{{ route('slo.bidang-layanan') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-500 text-slate-700 text-sm transition font-medium">Bidang Layanan</a></li>
                </ul>
            </li>

            <li class="relative group">
                <a href="#" class="flex items-center gap-1 text-slate-800 hover:text-blue-500 font-medium transition">
                    Informasi Publik
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </a>
                <ul class="absolute left-0 mt-2 w-52 bg-white/90 backdrop-blur-md shadow-xl rounded-lg py-2 hidden group-hover:block z-50 border border-white/50 before:absolute before:-top-4 before:left-0 before:w-full before:h-4">
                    <li><a href="{{ route('informasi-publik.maklumat-layanan') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-500 text-slate-700 text-sm transition">Maklumat Layanan</a></li>
                    <li><a href="{{ route('informasi-publik.uji-petik') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-500 text-slate-700 text-sm transition">Uji Petik</a></li>
                    <li><a href="{{ route('informasi-publik.keluhan-banding') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-500 text-slate-700 text-sm transition">Keluhan & Banding</a></li>
                    <li class="relative group/sub">
                        <a href="#" class="flex items-center justify-between px-4 py-2 hover:bg-blue-50 hover:text-blue-500 text-slate-700 text-sm transition">
                            Standar Pelayanan
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <ul class="absolute left-full top-0 ml-1 w-52 bg-white/90 backdrop-blur-md shadow-xl rounded-lg py-2 hidden group-hover/sub:block z-50 border border-white/50 before:absolute before:-left-4 before:top-0 before:w-4 before:h-full">
                            <li><a href="{{ route('informasi-publik.persyaratan-slo') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-500 text-slate-700 text-sm transition">Persyaratan SLO</a></li>
                            <li><a href="{{ route('informasi-publik.daftar-harga-slo') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-500 text-slate-700 text-sm transition">Daftar Harga SLO</a></li>
                            <li><a href="{{ route('informasi-publik.prosedur-slo') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-500 text-slate-700 text-sm transition">Prosedur SLO</a></li>
                            <li><a href="{{ route('informasi-publik.alur-sertifikasi') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-500 text-slate-700 text-sm transition">Alur Sertifikasi</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li><a href="{{ route('galeri') }}" class="text-slate-800 hover:text-blue-500 font-medium transition">Galeri</a></li>
            <li><a href="{{ route('karir') }}" class="text-slate-800 hover:text-blue-500 font-medium transition">Karir</a></li>

            <li>
                <a href="{{ route('hubungi-kami') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition shadow-sm font-medium">
                    Hubungi Kami Sekarang
                </a>
            </li>
            <li>
                <a href="https://dashboard.slo-pradana.id/login.php" target="_blank" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition shadow-sm font-medium">
                    Karyawan
                </a>
            </li>
        </ul>

        <!-- Mobile Menu Button -->
        <div class="flex items-center lg:hidden">
            <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="text-slate-800 hover:text-blue-600 focus:outline-none p-2" aria-label="Toggle menu">
                <svg x-show="!mobileMenuOpen" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
                <svg x-show="mobileMenuOpen" style="display: none;" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

    </div>

    <!-- Mobile Menu Dropdown -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         style="display: none;"
         class="lg:hidden bg-white/95 backdrop-blur-xl border-t border-slate-200 shadow-xl absolute w-full left-0 top-full max-h-[85vh] overflow-y-auto">
        <ul class="flex flex-col px-6 py-4 gap-4 pb-8">
            <li><a href="{{ route('home') }}" class="block text-slate-800 font-medium hover:text-blue-600">Beranda</a></li>

            <li x-data="{ openProfil: false }">
                <button @click="openProfil = !openProfil" class="flex items-center justify-between w-full text-slate-800 font-medium hover:text-blue-600">
                    Profil
                    <svg class="w-5 h-5 transition-transform duration-200" :class="{ 'rotate-180': openProfil }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <ul x-show="openProfil" x-collapse class="pl-4 mt-2 border-l-2 border-slate-100 space-y-3 pt-2" style="display: none;">
                    <li><a href="{{ route('profil.perusahaan') }}" class="block text-sm text-slate-600 hover:text-blue-600">Profil Perusahaan</a></li>
                    <li><a href="{{ route('profil.pjt-tt') }}" class="block text-sm text-slate-600 hover:text-blue-600">Daftar PJT & TT</a></li>
                    <li><a href="{{ route('profil.struktur-organisasi') }}" class="block text-sm text-slate-600 hover:text-blue-600">Struktur Organisasi</a></li>
                    <li><a href="{{ route('profil.legalitas-perusahaan') }}" class="block text-sm text-slate-600 hover:text-blue-600">Legalitas Perusahaan</a></li>
                    <li><a href="{{ route('profil.peralatan') }}" class="block text-sm text-slate-600 hover:text-blue-600">Peralatan</a></li>
                    <li><a href="{{ route('profil.sop') }}" class="block text-sm text-slate-600 hover:text-blue-600">Standar Operasi Prosedur</a></li>
                </ul>
            </li>

            <li x-data="{ openSLO: false }">
                <button @click="openSLO = !openSLO" class="flex items-center justify-between w-full text-slate-800 font-medium hover:text-blue-600">
                    SLO
                    <svg class="w-5 h-5 transition-transform duration-200" :class="{ 'rotate-180': openSLO }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <ul x-show="openSLO" x-collapse class="pl-4 mt-2 border-l-2 border-slate-100 space-y-3 pt-2" style="display: none;">
                    <li><a href="{{ route('slo.regulasi') }}" class="block text-sm text-slate-600 hover:text-blue-600">Regulasi</a></li>
                    <li><a href="{{ route('slo.verifikasi') }}" class="block text-sm text-slate-600 hover:text-blue-600">Verifikasi SLO</a></li>
                    <li><a href="https://siujang.esdm.go.id/Cek-Status-Permohonan" target="_blank" class="block text-sm text-slate-600 hover:text-blue-600">Cek Permohonan SLO</a></li>
                    <li><a href="{{ route('slo.bidang-layanan') }}" class="block text-sm text-slate-600 hover:text-blue-600">Bidang Layanan</a></li>
                </ul>
            </li>

            <li x-data="{ openInfo: false }">
                <button @click="openInfo = !openInfo" class="flex items-center justify-between w-full text-slate-800 font-medium hover:text-blue-600">
                    Informasi Publik
                    <svg class="w-5 h-5 transition-transform duration-200" :class="{ 'rotate-180': openInfo }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <ul x-show="openInfo" x-collapse class="pl-4 mt-2 border-l-2 border-slate-100 space-y-3 pt-2" style="display: none;">
                    <li><a href="{{ route('informasi-publik.maklumat-layanan') }}" class="block text-sm text-slate-600 hover:text-blue-600">Maklumat Layanan</a></li>
                    <li><a href="{{ route('informasi-publik.uji-petik') }}" class="block text-sm text-slate-600 hover:text-blue-600">Uji Petik</a></li>
                    <li><a href="{{ route('informasi-publik.keluhan-banding') }}" class="block text-sm text-slate-600 hover:text-blue-600">Keluhan & Banding</a></li>
                    
                    <li x-data="{ openStandar: false }">
                        <button @click="openStandar = !openStandar" class="flex items-center justify-between w-full text-sm text-slate-600 hover:text-blue-600">
                            Standar Pelayanan
                            <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': openStandar }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <ul x-show="openStandar" x-collapse class="pl-4 mt-2 border-l-2 border-slate-100 space-y-3 pt-2" style="display: none;">
                            <li><a href="{{ route('informasi-publik.persyaratan-slo') }}" class="block text-sm text-slate-500 hover:text-blue-600">Persyaratan SLO</a></li>
                            <li><a href="{{ route('informasi-publik.daftar-harga-slo') }}" class="block text-sm text-slate-500 hover:text-blue-600">Daftar Harga SLO</a></li>
                            <li><a href="{{ route('informasi-publik.prosedur-slo') }}" class="block text-sm text-slate-500 hover:text-blue-600">Prosedur SLO</a></li>
                            <li><a href="{{ route('informasi-publik.alur-sertifikasi') }}" class="block text-sm text-slate-500 hover:text-blue-600">Alur Sertifikasi</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li><a href="{{ route('galeri') }}" class="block text-slate-800 font-medium hover:text-blue-600">Galeri</a></li>
            <li><a href="{{ route('karir') }}" class="block text-slate-800 font-medium hover:text-blue-600">Karir</a></li>
            
            <li class="pt-6 mt-2 border-t border-slate-200 flex flex-col gap-3">
                <a href="{{ route('hubungi-kami') }}" class="text-center bg-blue-600 text-white px-4 py-3 rounded-lg hover:bg-blue-700 transition shadow-sm font-medium">
                    Hubungi Kami Sekarang
                </a>
                <a href="https://dashboard.slo-pradana.id/login.php" target="_blank" class="text-center bg-slate-800 text-white px-4 py-3 rounded-lg hover:bg-slate-900 transition shadow-sm font-medium">
                    Karyawan
                </a>
            </li>
        </ul>
    </div>
</nav>
