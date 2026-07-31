@extends('layouts.admin')

@section('title', 'Edit Konten SOP')

@section('content')
<div class="space-y-6">
    <div class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border border-slate-200 dark:border-slate-800 rounded-2xl p-6 sm:p-8 shadow-xl">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-blue-400"></span>
                Edit Konten SOP
            </h2>
            <p class="text-xs text-slate-600 dark:text-slate-400 mt-1">Edit konten halaman SOP perusahaan</p>
        </div>

        <form action="{{ route('admin.profil.sop.update', $sop->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1 uppercase tracking-wider">Judul</label>
                    <input type="text" name="judul" value="{{ old('judul', $sop->judul) }}" placeholder="STANDAR OPERASI PROSEDUR" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-blue-500">
                    @error('judul')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1 uppercase tracking-wider">Subjudul</label>
                    <textarea name="subjudul" rows="3" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-blue-500" placeholder="Seluruh SOP PT Pradana Nusa Energi disusun mengacu pada SNI ISO/IEC 17020:2012 dan peraturan ketenagalistrikan yang berlaku.">{{ old('subjudul', $sop->subjudul) }}</textarea>
                    @error('subjudul')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1 uppercase tracking-wider">URL Dokumen (PDF)</label>
                    <input type="url" name="url_dokumen" value="{{ old('url_dokumen', optional($sop)->url_dokumen) }}" placeholder="https://example.com/dokumen-sop.pdf" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-blue-500">
                    <p class="text-[11px] text-slate-500 mt-1">Masukkan URL lengkap ke file PDF dokumen SOP</p>
                    @error('url_dokumen')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-slate-200 dark:border-slate-800">
                <a href="{{ route('admin.profil.sop.index') }}" class="px-6 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 text-slate-700 dark:text-slate-300 hover:bg-slate-800 hover:text-slate-900 dark:hover:text-white text-sm font-medium transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Update Konten
                </button>
            </div>
        </form>
    </div>

    <!-- SOP Items Section -->
    <div class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border border-slate-200 dark:border-slate-800 rounded-2xl p-6 sm:p-8 shadow-xl">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h2 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-blue-400"></span>
                    Daftar Dokumen SOP
                </h2>
                <p class="text-xs text-slate-600 dark:text-slate-400 mt-1">Kelola item-item dokumen SOP</p>
            </div>
        </div>

        <!-- Add New Item Form -->
        <div class="bg-slate-50/80 dark:bg-slate-950/50 border border-slate-200 dark:border-slate-800 rounded-xl p-6 mb-6">
            <h3 class="text-sm font-bold text-slate-800 dark:text-slate-200 mb-4">Tambah Item SOP Baru</h3>
            <form action="{{ route('admin.profil.sop.items.store') }}" method="POST" class="grid md:grid-cols-2 gap-4">
                @csrf
                <input type="hidden" name="profil_sop_id" value="{{ $sop->id }}">
                
                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1">Kategori</label>
                    <select name="kategori" class="w-full bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-blue-500">
                        <option value="">-- Pilih Kategori --</option>
                        <option value="mutu">Mutu & Manajemen</option>
                        <option value="inspeksi">Inspeksi Teknik</option>
                        <option value="pelayanan">Pelayanan</option>
                        <option value="sdm">SDM & Sarana</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1">Kode</label>
                    <input type="text" name="kode" placeholder="SOP-MM-001" class="w-full bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-blue-500">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1">Judul</label>
                    <input type="text" name="judul" placeholder="SOP Manual Mutu" class="w-full bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-blue-500">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="2" placeholder="Panduan sistem manajemen mutu berdasarkan standar SNI ISO/IEC 17020:2012" class="w-full bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-blue-500"></textarea>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1">Revisi</label>
                    <input type="text" name="revisi" placeholder="Jan 2026 · Rev.05" class="w-full bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1">URL Dokumen</label>
                    <input type="url" name="url_dokumen" placeholder="https://example.com/sop.pdf" class="w-full bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1">Urutan</label>
                    <input type="number" name="urutan" value="0" class="w-full bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1">Status Aktif</label>
                    <select name="status_aktif" class="w-full bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-blue-500">
                        <option value="1">Aktif</option>
                        <option value="0">Nonaktif</option>
                    </select>
                </div>

                <div class="md:col-span-2">
                    <button type="submit" class="px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium transition">
                        Tambah Item SOP
                    </button>
                </div>
            </form>
        </div>

        <!-- Items List -->
        <div class="space-y-3">
            @if($sop->items && $sop->items->count() > 0)
                @foreach($sop->items as $item)
                    <div class="bg-slate-50/80 dark:bg-slate-950/50 border border-slate-200 dark:border-slate-800 rounded-xl p-4">
                        <div class="flex items-start justify-between gap-4">
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="text-xs font-bold px-2 py-0.5 rounded-full 
                                        {{ $item->kategori === 'mutu' ? 'bg-blue-100 text-blue-800' : 
                                           ($item->kategori === 'inspeksi' ? 'bg-blue-100 text-blue-700' : 
                                           ($item->kategori === 'pelayanan' ? 'bg-teal-100 text-teal-600' : 'bg-purple-100 text-purple-600')) }}">
                                        {{ $item->kategori === 'mutu' ? 'Mutu & Manajemen' : 
                                           ($item->kategori === 'inspeksi' ? 'Inspeksi Teknik' : 
                                           ($item->kategori === 'pelayanan' ? 'Pelayanan' : 'SDM & Sarana')) }}
                                    </span>
                                    <span class="text-xs text-slate-600 dark:text-slate-400">{{ $item->kode }}</span>
                                    @if(!$item->status_aktif)
                                        <span class="text-xs text-slate-500">(Nonaktif)</span>
                                    @endif
                                </div>
                                <h4 class="text-sm font-bold text-slate-900 dark:text-slate-100">{{ $item->judul }}</h4>
                                <p class="text-xs text-slate-600 dark:text-slate-400 mt-1">{{ $item->deskripsi }}</p>
                                <div class="flex items-center gap-4 mt-2 text-xs text-slate-500">
                                    <span>Revisi: {{ $item->revisi }}</span>
                                    <span>Urutan: {{ $item->urutan }}</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <button type="button" @click="confirmDelete('{{ route('admin.profil.sop.items.destroy', $item->id) }}', 'Konfirmasi Hapus', 'Hapus item SOP ini?')" class="p-2 rounded-lg bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="bg-slate-50/80 dark:bg-slate-950/50 border border-slate-200 dark:border-slate-800 rounded-xl p-8 text-center">
                    <p class="text-sm text-slate-600 dark:text-slate-400">Belum ada item SOP. Tambahkan item SOP baru di atas.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

