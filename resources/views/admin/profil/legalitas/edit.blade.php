@extends('layouts.admin')

@section('title', 'Edit Legalitas Perusahaan')

@section('content')
<div class="space-y-6">
    <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 shadow-xl">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-white flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-amber-400"></span>
                Edit Legalitas Perusahaan
            </h2>
            <p class="text-xs text-slate-400 mt-1">Edit legalitas perusahaan dan dokumen perizinan</p>
        </div>

        <!-- Tab Navigation -->
        <div class="flex gap-2 mb-6 border-b border-slate-800">
            <button onclick="switchTab('info')" id="tab-info" class="px-4 py-2 text-sm font-medium rounded-t-lg transition-colors bg-orange-500/20 text-orange-400 border-b-2 border-orange-500">
                Informasi Halaman
            </button>
            <button onclick="switchTab('dokumen')" id="tab-dokumen" class="px-4 py-2 text-sm font-medium rounded-t-lg transition-colors text-slate-400 hover:text-white border-b-2 border-transparent">
                Dokumen Legalitas
            </button>
            <button onclick="switchTab('tenaga')" id="tab-tenaga" class="px-4 py-2 text-sm font-medium rounded-t-lg transition-colors text-slate-400 hover:text-white border-b-2 border-transparent">
                Tenaga Teknik
            </button>
        </div>

        <!-- Tab 1: Informasi Halaman -->
        <div id="content-info" class="space-y-6">
            <form action="{{ route('admin.profil.legalitas.update', $legalitas->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid md:grid-cols-2 gap-8">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1 uppercase tracking-wider">Judul Header</label>
                            <input type="text" name="judul" value="{{ old('judul', $legalitas->judul) }}" placeholder="LEGALITAS PERUSAHAAN" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                            @error('judul')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1 uppercase tracking-wider">Sub-Judul / Deskripsi Ringkasan</label>
                            <textarea name="subjudul" rows="2" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-amber-500" placeholder="PT Pradana Nusa Energi beroperasi secara legal dan resmi berlandaskan izin Kementerian ESDM & Pemerintah RI.">{{ old('subjudul', $legalitas->subjudul) }}</textarea>
                            @error('subjudul')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1 uppercase tracking-wider">Rincian Nomor Izin & Masa Berlaku Legalitas</label>
                            <textarea name="konten" rows="5" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-amber-500" placeholder="Contoh:&#10;• NIB: 1234567890&#10;• IUJK ESDM: No. 503/IUJK/2024&#10;• Akreditasi LIT: Kementerian ESDM RI">{{ old('konten', $legalitas->konten) }}</textarea>
                            @error('konten')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="space-y-3 bg-slate-950/50 p-5 rounded-xl border border-slate-800">
                            <label class="block text-xs font-bold text-amber-400 uppercase tracking-wider">Upload Dokumen Legalitas Resmi</label>
                            @if($legalitas->dokumen)
                                <div class="rounded-xl overflow-hidden border border-slate-800 h-52 bg-slate-950 relative mb-3">
                                    <iframe src="{{ asset('public/storage/' . $legalitas->dokumen) }}" class="w-full h-full"></iframe>
                                    <div class="absolute bottom-2 left-2 bg-slate-950/80 backdrop-blur text-[10px] text-slate-200 px-2 py-0.5 rounded border border-slate-800">Dokumen Saat Ini</div>
                                </div>
                            @endif
                            <div class="border-2 border-dashed border-slate-800 rounded-xl p-4 text-center hover:border-amber-500/50 transition">
                                <input type="file" name="dokumen" accept=".pdf" class="w-full text-xs text-slate-400 bg-slate-950 border border-slate-800 rounded-xl p-2.5">
                                <p class="text-[11px] text-slate-500 mt-1">Upload Dokumen PDF (maks 10MB)</p>
                            </div>
                            @error('dokumen')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-4 pt-4 border-t border-slate-800">
                    <a href="{{ route('admin.profil.legalitas.index') }}" class="px-6 py-2.5 rounded-xl border border-slate-700 text-slate-300 hover:bg-slate-800 hover:text-white text-sm font-medium transition">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-orange-500 hover:bg-orange-600 text-white text-sm font-medium transition flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Simpan Informasi
                    </button>
                </div>
            </form>
        </div>

        <!-- Tab 2: Dokumen Legalitas -->
        <div id="content-dokumen" class="space-y-6 hidden">
            <!-- Add New Item Form -->
            <div class="bg-slate-950/40 border border-slate-800 rounded-xl p-6">
                <h3 class="text-sm font-bold text-amber-400 uppercase tracking-wider mb-4">Tambah Dokumen Baru</h3>
                <form action="{{ route('admin.profil.legalitas.items.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <input type="hidden" name="profil_legalitas_id" value="{{ $legalitas->id }}">
                    
                    <div class="grid md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Kategori</label>
                            <input type="text" name="kategori" placeholder="Akta" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                            @error('kategori')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Nama Dokumen</label>
                            <input type="text" name="nama_dokumen" placeholder="Akta Pendirian" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                            @error('nama_dokumen')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Nomor</label>
                            <input type="text" name="nomor" placeholder="001/Notaris/2018" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                            @error('nomor')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Penerbit</label>
                            <input type="text" name="penerbit" placeholder="Notaris" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                            @error('penerbit')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Tanggal Terbit</label>
                            <input type="date" name="tanggal_terbit" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                            @error('tanggal_terbit')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Berlaku Sampai</label>
                            <input type="date" name="berlaku_sampai" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                            @error('berlaku_sampai')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Status</label>
                            <select name="status" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                                <option value="Aktif">Aktif</option>
                                <option value="Kadaluarsa">Kadaluarsa</option>
                            </select>
                            @error('status')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Deskripsi</label>
                            <textarea name="deskripsi" rows="2" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500" placeholder="Deskripsi dokumen..."></textarea>
                            @error('deskripsi')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">File PDF</label>
                            <input type="file" name="file" accept=".pdf" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                            @error('file')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Urutan</label>
                            <input type="number" name="urutan" value="0" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                            @error('urutan')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Dokumen
                    </button>
                </form>
            </div>

            <!-- Existing Items Table -->
            <div class="space-y-4">
                <h3 class="text-sm font-bold text-amber-400 uppercase tracking-wider">Daftar Dokumen ({{ $legalitas->items->count() }})</h3>
                @if($legalitas->items->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-100/80 border-b border-slate-200 text-slate-700 font-bold text-sm uppercase tracking-wider">
                                    <th class="py-4 px-4">Kategori</th>
                                    <th class="py-4 px-4">Nama Dokumen</th>
                                    <th class="py-4 px-4">Nomor</th>
                                    <th class="py-4 px-4">Penerbit</th>
                                    <th class="py-4 px-4 w-24 text-center">Status</th>
                                    <th class="py-4 px-4 w-24 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-slate-700 text-sm">
                                @foreach($legalitas->items as $item)
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="py-4 px-4 font-bold text-slate-900">{{ $item->kategori ?? '-' }}</td>
                                        <td class="py-4 px-4">{{ $item->nama_dokumen }}</td>
                                        <td class="py-4 px-4">{{ $item->nomor ?? '-' }}</td>
                                        <td class="py-4 px-4">{{ $item->penerbit ?? '-' }}</td>
                                        <td class="py-4 px-4 text-center">
                                            <span class="px-2 py-1 rounded text-xs font-bold {{ $item->status === 'Aktif' ? 'bg-green-900 text-green-200' : 'bg-red-900 text-red-200' }}">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                        <td class="py-4 px-4 text-center">
                                            <div class="flex items-center justify-center gap-2">
                                                <button onclick="openEditItemModal({{ $item->id }})" class="text-amber-400 hover:text-amber-300 text-xs flex items-center gap-1">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                                </button>
                                                <form action="{{ route('admin.profil.legalitas.items.destroy', $item->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-400 hover:text-red-300 text-xs flex items-center gap-1">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-8 text-slate-500 text-sm">Belum ada dokumen legalitas</div>
                @endif
            </div>
        </div>

        <!-- Tab 3: Tenaga Teknik -->
        <div id="content-tenaga" class="space-y-6 hidden">
            <!-- Add New Tenaga Teknik Form -->
            <div class="bg-slate-950/40 border border-slate-800 rounded-xl p-6">
                <h3 class="text-sm font-bold text-amber-400 uppercase tracking-wider mb-4">Tambah Tenaga Teknik Baru</h3>
                <form action="{{ route('admin.profil.legalitas.tenaga-teknik.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="profil_legalitas_id" value="{{ $legalitas->id }}">
                    
                    <div class="grid md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Nama</label>
                            <input type="text" name="nama" placeholder="Nama Lengkap" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                            @error('nama')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Jabatan</label>
                            <input type="text" name="jabatan" placeholder="Direktur Utama" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                            @error('jabatan')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">No Sertifikat</label>
                            <input type="text" name="no_sertifikat" placeholder="12345" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                            @error('no_sertifikat')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Bidang Kompetensi</label>
                            <input type="text" name="bidang_kompetensi" placeholder="Inspeksi Teknik" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                            @error('bidang_kompetensi')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Status</label>
                            <select name="status" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                            @error('status')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Urutan</label>
                            <input type="number" name="urutan" value="0" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                            @error('urutan')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Tenaga Teknik
                    </button>
                </form>
            </div>

            <!-- Existing Tenaga Teknik Table -->
            <div class="space-y-4">
                <h3 class="text-sm font-bold text-amber-400 uppercase tracking-wider">Daftar Tenaga Teknik ({{ $legalitas->tenagaTeknik->count() }})</h3>
                @if($legalitas->tenagaTeknik->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-100/80 border-b border-slate-200 text-slate-700 font-bold text-sm uppercase tracking-wider">
                                    <th class="py-4 px-4">Nama</th>
                                    <th class="py-4 px-4">Jabatan</th>
                                    <th class="py-4 px-4">No Sertifikat</th>
                                    <th class="py-4 px-4">Bidang Kompetensi</th>
                                    <th class="py-4 px-4 w-24 text-center">Status</th>
                                    <th class="py-4 px-4 w-24 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-slate-700 text-sm">
                                @foreach($legalitas->tenagaTeknik as $tenaga)
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="py-4 px-4 font-bold text-slate-900">{{ $tenaga->nama }}</td>
                                        <td class="py-4 px-4">{{ $tenaga->jabatan }}</td>
                                        <td class="py-4 px-4">{{ $tenaga->no_sertifikat ?? '-' }}</td>
                                        <td class="py-4 px-4">{{ $tenaga->bidang_kompetensi ?? '-' }}</td>
                                        <td class="py-4 px-4 text-center">
                                            <span class="px-2 py-1 rounded text-xs font-bold {{ $tenaga->status === 'Aktif' ? 'bg-green-900 text-green-200' : 'bg-red-900 text-red-200' }}">
                                                {{ $tenaga->status }}
                                            </span>
                                        </td>
                                        <td class="py-4 px-4 text-center">
                                            <div class="flex items-center justify-center gap-2">
                                                <button onclick="openEditTenagaModal({{ $tenaga->id }})" class="text-amber-400 hover:text-amber-300 text-xs flex items-center gap-1">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                                </button>
                                                <form action="{{ route('admin.profil.legalitas.tenaga-teknik.destroy', $tenaga->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-400 hover:text-red-300 text-xs flex items-center gap-1">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-8 text-slate-500 text-sm">Belum ada tenaga teknik</div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Edit Item Modal -->
<div id="editItemModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50">
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 w-full max-w-2xl mx-4 shadow-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold text-white">Edit Dokumen Legalitas</h3>
            <button onclick="closeEditItemModal()" class="text-slate-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <form id="editItemForm" action="" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="editItemId">
            
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Kategori</label>
                    <input type="text" name="kategori" id="editKategori" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Nama Dokumen</label>
                    <input type="text" name="nama_dokumen" id="editNamaDokumen" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Nomor</label>
                    <input type="text" name="nomor" id="editNomor" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Penerbit</label>
                    <input type="text" name="penerbit" id="editPenerbit" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Tanggal Terbit</label>
                    <input type="date" name="tanggal_terbit" id="editTanggalTerbit" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Berlaku Sampai</label>
                    <input type="date" name="berlaku_sampai" id="editBerlakuSampai" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Status</label>
                    <select name="status" id="editStatus" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                        <option value="Aktif">Aktif</option>
                        <option value="Kadaluarsa">Kadaluarsa</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Urutan</label>
                    <input type="number" name="urutan" id="editUrutan" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" id="editDeskripsi" rows="2" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500"></textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-300 mb-1">File PDF</label>
                    <input type="file" name="file" id="editFile" accept=".pdf" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                </div>
            </div>
            
            <div class="flex gap-3 pt-2">
                <button type="button" onclick="closeEditItemModal()" class="flex-1 px-4 py-2 rounded-xl border border-slate-700 text-slate-300 hover:bg-slate-800 text-sm font-medium transition">
                    Batal
                </button>
                <button type="submit" class="flex-1 px-4 py-2 rounded-xl bg-orange-500 hover:bg-orange-600 text-white text-sm font-medium transition">
                    Update Dokumen
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Tenaga Modal -->
<div id="editTenagaModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50">
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 w-full max-w-lg mx-4 shadow-2xl">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold text-white">Edit Tenaga Teknik</h3>
            <button onclick="closeEditTenagaModal()" class="text-slate-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <form id="editTenagaForm" action="" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="editTenagaId">
            
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1">Nama</label>
                <input type="text" name="nama" id="editTenagaNama" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1">Jabatan</label>
                <input type="text" name="jabatan" id="editTenagaJabatan" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1">No Sertifikat</label>
                <input type="text" name="no_sertifikat" id="editTenagaNoSertifikat" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1">Bidang Kompetensi</label>
                <input type="text" name="bidang_kompetensi" id="editTenagaBidang" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1">Status</label>
                <select name="status" id="editTenagaStatus" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1">Urutan</label>
                <input type="number" name="urutan" id="editTenagaUrutan" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
            </div>
            
            <div class="flex gap-3 pt-2">
                <button type="button" onclick="closeEditTenagaModal()" class="flex-1 px-4 py-2 rounded-xl border border-slate-700 text-slate-300 hover:bg-slate-800 text-sm font-medium transition">
                    Batal
                </button>
                <button type="submit" class="flex-1 px-4 py-2 rounded-xl bg-orange-500 hover:bg-orange-600 text-white text-sm font-medium transition">
                    Update Tenaga Teknik
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const itemsData = @json($legalitas->items);
    const tenagaData = @json($legalitas->tenagaTeknik);
    const updateItemRouteBase = "/admin/profil/legalitas/items";
    const updateTenagaRouteBase = "/admin/profil/legalitas/tenaga-teknik";

    function switchTab(tab) {
        const tabInfo = document.getElementById('tab-info');
        const tabDokumen = document.getElementById('tab-dokumen');
        const tabTenaga = document.getElementById('tab-tenaga');
        const contentInfo = document.getElementById('content-info');
        const contentDokumen = document.getElementById('content-dokumen');
        const contentTenaga = document.getElementById('content-tenaga');

        // Reset all tabs
        [tabInfo, tabDokumen, tabTenaga].forEach(t => {
            t.classList.remove('bg-orange-500/20', 'text-orange-400', 'border-orange-500');
            t.classList.add('text-slate-400', 'border-transparent');
        });
        [contentInfo, contentDokumen, contentTenaga].forEach(c => c.classList.add('hidden'));

        if (tab === 'info') {
            tabInfo.classList.add('bg-orange-500/20', 'text-orange-400', 'border-orange-500');
            tabInfo.classList.remove('text-slate-400', 'border-transparent');
            contentInfo.classList.remove('hidden');
        } else if (tab === 'dokumen') {
            tabDokumen.classList.add('bg-orange-500/20', 'text-orange-400', 'border-orange-500');
            tabDokumen.classList.remove('text-slate-400', 'border-transparent');
            contentDokumen.classList.remove('hidden');
        } else {
            tabTenaga.classList.add('bg-orange-500/20', 'text-orange-400', 'border-orange-500');
            tabTenaga.classList.remove('text-slate-400', 'border-transparent');
            contentTenaga.classList.remove('hidden');
        }
    }

    function openEditItemModal(itemId) {
        const item = itemsData.find(i => i.id === itemId);
        if (!item) return;

        document.getElementById('editItemId').value = item.id;
        document.getElementById('editKategori').value = item.kategori || '';
        document.getElementById('editNamaDokumen').value = item.nama_dokumen || '';
        document.getElementById('editNomor').value = item.nomor || '';
        document.getElementById('editPenerbit').value = item.penerbit || '';
        document.getElementById('editTanggalTerbit').value = item.tanggal_terbit || '';
        document.getElementById('editBerlakuSampai').value = item.berlaku_sampai || '';
        document.getElementById('editStatus').value = item.status || 'Aktif';
        document.getElementById('editDeskripsi').value = item.deskripsi || '';
        document.getElementById('editUrutan').value = item.urutan || 0;
        
        document.getElementById('editItemForm').action = updateItemRouteBase + '/' + itemId;
        
        document.getElementById('editItemModal').classList.remove('hidden');
        document.getElementById('editItemModal').classList.add('flex');
    }

    function closeEditItemModal() {
        document.getElementById('editItemModal').classList.add('hidden');
        document.getElementById('editItemModal').classList.remove('flex');
    }

    function openEditTenagaModal(tenagaId) {
        const tenaga = tenagaData.find(t => t.id === tenagaId);
        if (!tenaga) return;

        document.getElementById('editTenagaId').value = tenaga.id;
        document.getElementById('editTenagaNama').value = tenaga.nama || '';
        document.getElementById('editTenagaJabatan').value = tenaga.jabatan || '';
        document.getElementById('editTenagaNoSertifikat').value = tenaga.no_sertifikat || '';
        document.getElementById('editTenagaBidang').value = tenaga.bidang_kompetensi || '';
        document.getElementById('editTenagaStatus').value = tenaga.status || 'Aktif';
        document.getElementById('editTenagaUrutan').value = tenaga.urutan || 0;
        
        document.getElementById('editTenagaForm').action = updateTenagaRouteBase + '/' + tenagaId;
        
        document.getElementById('editTenagaModal').classList.remove('hidden');
        document.getElementById('editTenagaModal').classList.add('flex');
    }

    function closeEditTenagaModal() {
        document.getElementById('editTenagaModal').classList.add('hidden');
        document.getElementById('editTenagaModal').classList.remove('flex');
    }
</script>
@endsection
