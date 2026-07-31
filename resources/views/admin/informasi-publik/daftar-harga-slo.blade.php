@extends('layouts.admin')

@section('title', 'Daftar Harga SLO - Admin')

@section('content')
<div class="p-6">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Kelola: Daftar Harga SLO</h1>
            <p class="text-xs text-slate-600 dark:text-slate-400 mt-1">Kelola dokumen PDF daftar harga SLO</p>
        </div>
    </div>

    @if(session('success'))
        <x-admin.alert type="success" title="Berhasil" message="{{ session('success') }}" class="mb-6" />
    @endif

    <form action="{{ route('admin.informasi-publik.daftar-harga-slo.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="bg-white/80 dark:bg-slate-900/80 border border-slate-200 dark:border-slate-800 rounded-2xl p-6">
            <h2 class="text-lg font-bold text-slate-900 dark:text-white mb-6">Daftar Harga SLO</h2>
            
            <div class="space-y-6">
                <!-- Upload PDF -->
                <div>
                    <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wider mb-2">Upload PDF</label>
                    <div class="relative">
                        <input type="file" name="pdf" accept=".pdf" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 rounded-lg px-4 py-3 text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700">
                    </div>
                    @if($daftarHarga && $daftarHarga->path_pdf)
                        <p class="text-xs text-slate-500 mt-2">File saat ini: {{ basename($daftarHarga->path_pdf) }}</p>
                    @endif
                </div>

                <!-- Nama Dokumen -->
                <div>
                    <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wider mb-2">Nama Dokumen</label>
                    <input type="text" name="nama_dokumen" value="{{ $daftarHarga->nama_dokumen ?? 'Daftar Harga SLO Juli 2026' }}" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 rounded-lg px-4 py-3 text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500" placeholder="Masukkan nama dokumen...">
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wider mb-2">Status</label>
                    <div class="flex items-center gap-4">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="is_active" value="1" {{ ($daftarHarga->is_active ?? true) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 focus:ring-blue-500 bg-slate-100 dark:bg-slate-800 border-slate-600">
                            <span class="text-sm text-slate-700 dark:text-slate-300">Aktif</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="is_active" value="0" {{ !($daftarHarga->is_active ?? true) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 focus:ring-blue-500 bg-slate-100 dark:bg-slate-800 border-slate-600">
                            <span class="text-sm text-slate-700 dark:text-slate-300">Tidak Aktif</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold transition shadow-lg shadow-blue-600/20">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
