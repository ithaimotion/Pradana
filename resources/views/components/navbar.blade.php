@props(['logos' => null])

@php
    $resolvedLogos = $logos ?? View::shared('logos') ?? collect();
@endphp

<nav class="sticky top-0 z-50 bg-white/40 backdrop-blur-xl border-b border-white/30 shadow-sm transition-all duration-300">
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
                        <span class="text-2xl font-bold text-slate-900">Pradana</span>
                    @endif
                @endforeach
            @else
                <span class="text-2xl font-bold text-slate-900">Pradana</span>
            @endif
        </a>

        <ul class="flex items-center gap-6">
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
                    <li><a href="{{ route('slo.cek-permohonan') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-500 text-slate-700 text-sm transition font-medium">Cek Permohonan SLO</a></li>
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

    </div>
</nav>
