@extends('layouts.admin')

@section('title', 'Kelola Keluhan & Banding')

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
            <h1 class="text-2xl font-bold text-white">Kelola Keluhan & Banding</h1>
            <p class="text-slate-400 text-sm mt-1">Upload gambar alur dan kelola submission dari pengguna</p>
        </div>
    </div>

    <!-- Upload Gambar Section -->
    <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6">
        <h2 class="text-lg font-semibold text-white mb-4">Alur Keluhan & Banding</h2>
        <form action="{{ route('admin.informasi-publik.keluhan-banding.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Upload Gambar -->
            <div class="space-y-4">
                <label class="block text-sm font-semibold text-slate-300 mb-2">Gambar Alur</label>
                
                @if(optional($setting)->url_gambar)
                    <div class="relative rounded-xl overflow-hidden border border-slate-700 bg-slate-900">
                        <img src="{{ optional($setting)->url_gambar }}" alt="Alur Keluhan & Banding" class="w-full max-h-96 object-contain mx-auto">
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
                <button type="submit" class="px-6 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl font-semibold text-sm transition shadow-lg shadow-emerald-500/20 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Simpan Gambar
                </button>
            </div>
        </form>
    </div>

    <!-- Submissions Section -->
    <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6">
        <h2 class="text-lg font-semibold text-white mb-4">Submission Keluhan & Banding</h2>
        
        @if($submissions->count() > 0)
            <div class="space-y-4">
                @foreach($submissions as $submission)
                    <div class="bg-slate-900/50 border border-slate-700 rounded-xl p-4">
                        <div class="flex items-start justify-between gap-4">
                            <div class="flex-1 space-y-2">
                                <div class="flex items-center gap-3">
                                    <span class="px-2 py-1 rounded-lg text-xs font-semibold {{ $submission->status_color }}">
                                        {{ $submission->status_label }}
                                    </span>
                                    <span class="px-2 py-1 rounded-lg text-xs font-semibold {{ $submission->jenis === 'keluhan' ? 'bg-orange-500/20 text-orange-400' : 'bg-purple-500/20 text-purple-400' }}">
                                        {{ ucfirst($submission->jenis) }}
                                    </span>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-white">{{ $submission->nama }}</p>
                                    <p class="text-xs text-slate-400">{{ $submission->email }}</p>
                                    @if($submission->telepon)
                                        <p class="text-xs text-slate-400">{{ $submission->telepon }}</p>
                                    @endif
                                </div>
                                <div class="bg-slate-800 rounded-lg p-3">
                                    <p class="text-sm text-slate-300">{{ $submission->pesan }}</p>
                                </div>
                                @if($submission->catatan_admin)
                                    <div class="bg-blue-900/30 border border-blue-700/50 rounded-lg p-3">
                                        <p class="text-xs font-semibold text-blue-300 mb-1">Catatan Admin:</p>
                                        <p class="text-sm text-blue-200">{{ $submission->catatan_admin }}</p>
                                    </div>
                                @endif
                                <p class="text-[11px] text-slate-500">{{ $submission->created_at->format('d M Y, H:i') }}</p>
                            </div>
                            
                            <div class="flex flex-col gap-2">
                                <form action="{{ route('admin.informasi-publik.keluhan-banding.update-status', $submission->id) }}" method="POST" class="space-y-2">
                                    @csrf
                                    <select name="status" class="w-full text-xs bg-slate-800 border border-slate-600 rounded-lg px-2 py-1.5 text-slate-300 focus:outline-none focus:border-orange-500">
                                        <option value="pending" {{ $submission->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="diproses" {{ $submission->status === 'diproses' ? 'selected' : '' }}>Diproses</option>
                                        <option value="selesai" {{ $submission->status === 'selesai' ? 'selected' : '' }}>Selesai</option>
                                        <option value="ditolak" {{ $submission->status === 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                    </select>
                                    <textarea name="catatan_admin" placeholder="Catatan admin..." rows="2" class="w-full text-xs bg-slate-800 border border-slate-600 rounded-lg px-2 py-1.5 text-slate-300 focus:outline-none focus:border-orange-500 resize-none">{{ $submission->catatan_admin }}</textarea>
                                    <button type="submit" class="w-full px-3 py-1.5 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-xs font-semibold transition">Update Status</button>
                                </form>
                                <form action="{{ route('admin.informasi-publik.keluhan-banding.destroy', $submission->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus submission ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white rounded-lg text-xs font-semibold transition">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-8">
                <p class="text-slate-400 text-sm">Belum ada submission keluhan/banding.</p>
            </div>
        @endif
    </div>
</div>
@endsection

