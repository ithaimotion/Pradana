@extends('layouts.admin')

@section('title', 'Kelola Profil Perusahaan')

@section('content')
<div class="space-y-6">
    <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 shadow-xl">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-amber-400"></span>
                    Kelola Profil Perusahaan
                </h2>
                <p class="text-xs text-slate-400 mt-1">Kelola konten halaman Profil Perusahaan</p>
            </div>
            @if(!$profilPerusahaan)
                <a href="{{ route('admin.profil.perusahaan.create') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Buat Profil Baru
                </a>
            @else
                <a href="{{ route('admin.profil.perusahaan.edit', $profilPerusahaan->id) }}" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit Profil
                </a>
            @endif
        </div>

        @if(session('success'))
            <div class="bg-green-500/10 border border-green-500/30 text-green-400 px-4 py-3 rounded-lg mb-6 text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if($profilPerusahaan)
            <div class="bg-slate-950/40 border border-slate-800 rounded-xl p-6 space-y-6">
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Judul Header</label>
                        <div class="text-sm text-white">{{ $profilPerusahaan->judul ?? '-' }}</div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Sub Judul</label>
                        <div class="text-sm text-slate-300">{{ Str::limit($profilPerusahaan->subjudul ?? '-', 100) }}</div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Judul Komitmen</label>
                        <div class="text-sm text-white">{{ $profilPerusahaan->nilai ?? '-' }}</div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Gambar</label>
                        @if($profilPerusahaan->url_gambar)
                            <img src="{{ asset('public/storage/' . $profilPerusahaan->url_gambar) }}" alt="Gambar" class="w-32 h-32 object-cover rounded-lg border border-slate-700">
                        @else
                            <div class="text-sm text-slate-500">Tidak ada gambar</div>
                        @endif
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Konten</label>
                    <div class="text-sm text-slate-300">{{ Str::limit($profilPerusahaan->konten ?? '-', 200) }}</div>
                </div>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Visi</label>
                        <div class="text-sm text-slate-300">{{ Str::limit($profilPerusahaan->visi ?? '-', 100) }}</div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Misi</label>
                        <div class="text-sm text-slate-300">{{ Str::limit($profilPerusahaan->misi ?? '-', 100) }}</div>
                    </div>
                </div>
            </div>
        @else
            <div class="bg-slate-950/40 border border-slate-800 rounded-xl p-12 text-center">
                <div class="flex flex-col items-center gap-4">
                    <svg class="w-16 h-16 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-1">Belum Ada Profil Perusahaan</h3>
                        <p class="text-sm text-slate-400">Mulai dengan membuat profil perusahaan baru</p>
                    </div>
                    <a href="{{ route('admin.profil.perusahaan.create') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2.5 rounded-lg text-sm font-medium transition">
                        Buat Profil Sekarang
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
