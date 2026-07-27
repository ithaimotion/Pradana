@extends('layouts.admin')

@section('title', 'Kelola Maklumat Layanan')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.dashboard') }}" class="p-2 text-slate-400 hover:text-white hover:bg-slate-700 rounded-lg transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-white">Kelola Maklumat Layanan</h1>
            <p class="text-slate-400 text-sm mt-1">Upload gambar maklumat layanan</p>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6">
        <form action="{{ route('admin.informasi-publik.maklumat.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Upload Gambar -->
            <div class="space-y-4">
                <label class="block text-sm font-semibold text-slate-300 mb-2">Gambar Maklumat Layanan</label>
                
                @if(isset($maklumat) && $maklumat->url_gambar)
                    <div class="relative rounded-xl overflow-hidden border border-slate-700 bg-slate-900">
                        <img src="{{ $maklumat->url_gambar }}" alt="Maklumat Layanan" class="w-full max-h-96 object-contain mx-auto">
                        <div class="absolute bottom-2 left-2 bg-slate-900/80 backdrop-blur border border-slate-700 text-slate-200 text-xs px-2.5 py-1 rounded-lg">Gambar Saat Ini</div>
                    </div>
                @endif

                <div class="border-2 border-dashed border-slate-700 rounded-xl p-6 text-center hover:bg-slate-900/40 hover:border-orange-500/50 transition duration-200">
                    <input type="file" name="gambar" accept="image/*" class="w-full text-xs text-slate-400 bg-slate-900 border border-slate-700 rounded-xl p-2.5">
                    <p class="text-[11px] text-slate-500 mt-2">Format PNG, JPG, WEBP maks 5MB</p>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-700">
                <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 rounded-xl text-slate-300 hover:text-white hover:bg-slate-700 font-medium text-sm transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl font-semibold text-sm transition shadow-lg shadow-emerald-500/20 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Simpan Gambar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
