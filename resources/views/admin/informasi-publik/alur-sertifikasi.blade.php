@extends('layouts.admin')

@section('title', 'Kelola Alur Sertifikasi')

@section('content')
<div class="p-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Kelola: Alur Sertifikasi</h1>
        <p class="text-slate-600 dark:text-slate-400 mt-1">Kelola dokumen PDF alur sertifikasi SLO</p>
    </div>

    @if(session('success'))
        <x-admin.alert type="success" title="Berhasil" message="{{ session('success') }}" class="mb-6" />
    @endif

    <div class="bg-slate-100 dark:bg-slate-800 rounded-xl border border-slate-300 dark:border-slate-700 p-6">
        <form action="{{ route('admin.informasi-publik.alur-sertifikasi.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Nama Dokumen -->
            <div class="mb-6">
                <label class="block text-slate-700 dark:text-slate-300 text-sm font-medium mb-2">Nama Dokumen</label>
                <input 
                    type="text" 
                    name="nama_dokumen" 
                    value="{{ $alurSertifikasi->nama_dokumen ?? '' }}"
                    class="w-full bg-slate-200 dark:bg-slate-700 border border-slate-600 rounded-lg px-4 py-3 text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Masukkan nama dokumen"
                    required
                >
            </div>

            <!-- Upload PDF -->
            <div class="mb-6">
                <label class="block text-slate-700 dark:text-slate-300 text-sm font-medium mb-2">Upload PDF</label>
                <div class="border-2 border-dashed border-slate-600 rounded-lg p-6 text-center hover:border-blue-500 transition-colors">
                    <input 
                        type="file" 
                        name="pdf" 
                        accept=".pdf"
                        class="hidden"
                        id="pdf-upload"
                        onchange="handleFileSelect(this)"
                    >
                    <label for="pdf-upload" class="cursor-pointer">
                        <div class="flex flex-col items-center">
                            <svg class="w-12 h-12 text-slate-600 dark:text-slate-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <p class="text-slate-600 dark:text-slate-400 text-sm">Klik untuk upload PDF</p>
                            <p class="text-slate-500 text-xs mt-1">Maksimal 10MB</p>
                        </div>
                    </label>
                    <div id="file-info" class="mt-3 text-sm text-blue-400 hidden"></div>
                </div>
                @if($alurSertifikasi && $alurSertifikasi->path_pdf)
                    <div class="mt-3 flex items-center justify-between bg-slate-200 dark:bg-slate-700 rounded-lg px-4 py-3">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <span class="text-slate-700 dark:text-slate-300 text-sm truncate max-w-xs">{{ $alurSertifikasi->nama_dokumen }}</span>
                        </div>
                        <a href="{{ asset('storage/' . $alurSertifikasi->path_pdf) }}" target="_blank" class="text-blue-400 text-sm hover:text-blue-300">Lihat PDF</a>
                    </div>
                @endif
            </div>

            <!-- Status Aktif -->
            <div class="mb-6">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input 
                        type="checkbox" 
                        name="is_active" 
                        value="1"
                        {{ ($alurSertifikasi->is_active ?? true) ? 'checked' : '' }}
                        class="w-5 h-5 rounded border-slate-600 bg-slate-200 dark:bg-slate-700 text-blue-500 focus:ring-blue-500 focus:ring-offset-slate-800"
                    >
                    <span class="text-slate-700 dark:text-slate-300 text-sm font-medium">Tampilkan di halaman publik</span>
                </label>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function handleFileSelect(input) {
        const fileInfo = document.getElementById('file-info');
        if (input.files && input.files[0]) {
            fileInfo.textContent = 'File terpilih: ' + input.files[0].name;
            fileInfo.classList.remove('hidden');
        } else {
            fileInfo.classList.add('hidden');
        }
    }
</script>
@endsection
