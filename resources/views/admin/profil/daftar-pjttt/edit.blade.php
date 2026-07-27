@extends('layouts.admin')

@section('title', 'Edit Daftar PJT & TT')

@section('content')
<div class="space-y-6">
    <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 shadow-xl">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-white flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-amber-400"></span>
                Edit Daftar PJT & TT
            </h2>
            <p class="text-xs text-slate-400 mt-1">Edit daftar Penanggung Jawab Teknik (PJT) dan Tenaga Teknik (TT)</p>
        </div>

        <form action="{{ route('admin.profil.daftar-pjttt.update', $daftarPJTTT->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid md:grid-cols-2 gap-8">
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1 uppercase tracking-wider">Judul Header</label>
                        <input type="text" name="judul" value="{{ old('judul', $daftarPJTTT->judul) }}" placeholder="DAFTAR PJT & TT" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                        @error('judul')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1 uppercase tracking-wider">Deskripsi Sub-Header</label>
                        <textarea name="subjudul" rows="3" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-amber-500" placeholder="Daftar Penanggung Jawab Teknik (PJT) dan Tenaga Teknik (TT)...">{{ old('subjudul', $daftarPJTTT->subjudul) }}</textarea>
                        @error('subjudul')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1 uppercase tracking-wider">Catatan Kualifikasi / Akreditasi ESDM</label>
                        <textarea name="konten" rows="3" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-amber-500" placeholder="Seluruh Tenaga Teknik PT Pradana Nusa Energi telah memiliki Sertifikat Kompetensi...">{{ old('konten', $daftarPJTTT->konten) }}</textarea>
                        @error('konten')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="space-y-3 bg-slate-950/50 p-5 rounded-xl border border-slate-800">
                        <label class="block text-xs font-bold text-amber-400 uppercase tracking-wider">Dokumen PDF Resmi SK PJT & TT</label>
                        @if($daftarPJTTT->dokumen)
                            <div class="flex items-center justify-between p-3 bg-slate-950 border border-slate-800 rounded-xl">
                                <div class="flex items-center gap-2 overflow-hidden">
                                    <svg class="w-5 h-5 text-rose-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                    <span class="text-xs text-slate-300 truncate">Dokumen PDF SK PJT/TT Ter-upload</span>
                                </div>
                                <a href="{{ asset('storage/' . $daftarPJTTT->dokumen) }}" target="_blank" class="text-xs font-bold text-amber-400 hover:underline flex-shrink-0">Lihat PDF</a>
                            </div>
                        @endif
                        <div class="border-2 border-dashed border-slate-800 rounded-xl p-4 text-center hover:border-amber-500/50 transition">
                            <input type="file" name="dokumen" accept=".pdf" class="w-full text-xs text-slate-400 bg-slate-950 border border-slate-800 rounded-xl p-2.5">
                            <p class="text-[11px] text-slate-500 mt-1">Upload SK / File PDF Resmi PJT & TT (maks 10MB)</p>
                        </div>
                        @error('dokumen')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-slate-800">
                <a href="{{ route('admin.profil.daftar-pjttt.index') }}" class="px-6 py-2.5 rounded-xl border border-slate-700 text-slate-300 hover:bg-slate-800 hover:text-white text-sm font-medium transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-orange-500 hover:bg-orange-600 text-white text-sm font-medium transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Update Daftar
                </button>
            </div>
        </form>
    </div>

    <!-- Manage Items Section -->
    <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 shadow-xl">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-white flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-amber-400"></span>
                Kelola Item PJT & TT
            </h2>
            <p class="text-xs text-slate-400 mt-1">Tambah, edit, atau hapus item Penanggung Jawab Teknik (PJT) dan Tenaga Teknik (TT)</p>
        </div>

        <!-- Add New Item Form -->
        <div class="bg-slate-950/40 border border-slate-800 rounded-xl p-6 mb-6">
            <h3 class="text-sm font-bold text-amber-400 uppercase tracking-wider mb-4">Tambah Item Baru</h3>
            <form action="{{ route('admin.profil.daftar-pjttt.items.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="profil_daftar_p_j_t_t_t_id" value="{{ $daftarPJTTT->id }}">
                
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Kategori</label>
                        <input type="text" name="kategori" placeholder="Instalasi Pemanfaatan Tenaga Listrik Tegangan Menengah" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                        @error('kategori')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Nama</label>
                        <input type="text" name="nama" placeholder="Nama Lengkap" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                        @error('nama')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Jabatan</label>
                        <select name="jabatan" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                            <option value="PJT">PJT (Penanggung Jawab Teknik)</option>
                            <option value="TT">TT (Tenaga Teknik)</option>
                        </select>
                        @error('jabatan')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">No. Sertifikat</label>
                        <input type="text" name="no_sertifikat" placeholder="SKT-XXX-XXX" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                        @error('no_sertifikat')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">No. Register</label>
                        <input type="text" name="no_register" placeholder="REG-XXX-XXX" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                        @error('no_register')
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
                    Tambah Item
                </button>
            </form>
        </div>

        <!-- Existing Items List -->
        <div class="space-y-4">
            <h3 class="text-sm font-bold text-amber-400 uppercase tracking-wider">Daftar Item ({{ $daftarPJTTT->items->count() }})</h3>
            @if($daftarPJTTT->items->count() > 0)
                <div class="space-y-3">
                    @foreach($daftarPJTTT->items as $item)
                        <div class="bg-slate-950/40 border border-slate-800 rounded-xl p-4" id="item-{{ $item->id }}">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center gap-3">
                                    <span class="px-2 py-1 rounded text-xs font-bold {{ $item->jabatan === 'PJT' ? 'bg-blue-900 text-blue-200' : 'bg-orange-500 text-white' }}">
                                        {{ $item->jabatan }}
                                    </span>
                                    <span class="text-sm font-medium text-white">{{ $item->nama }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <button onclick="openEditModal({{ $item->id }})" class="text-amber-400 hover:text-amber-300 text-xs flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        Edit
                                    </button>
                                    <form action="{{ route('admin.profil.daftar-pjttt.items.destroy', $item->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300 text-xs flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="grid md:grid-cols-3 gap-4 text-xs">
                                <div>
                                    <span class="text-slate-400">Kategori:</span>
                                    <span class="text-slate-200 ml-1">{{ $item->kategori }}</span>
                                </div>
                                <div>
                                    <span class="text-slate-400">No. Sertifikat:</span>
                                    <span class="text-slate-200 ml-1">{{ $item->no_sertifikat }}</span>
                                </div>
                                <div>
                                    <span class="text-slate-400">No. Register:</span>
                                    <span class="text-slate-200 ml-1">{{ $item->no_register }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8 text-slate-500 text-sm">Belum ada item PJT & TT</div>
            @endif
        </div>
    </div>
</div>

<!-- Edit Item Modal -->
<div id="editModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50">
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 w-full max-w-lg mx-4 shadow-2xl">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold text-white">Edit Item PJT & TT</h3>
            <button onclick="closeEditModal()" class="text-slate-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <form id="editItemForm" action="" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="editItemId">
            
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1">Kategori</label>
                <input type="text" name="kategori" id="editKategori" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1">Nama</label>
                <input type="text" name="nama" id="editNama" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1">Jabatan</label>
                <select name="jabatan" id="editJabatan" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                    <option value="PJT">PJT (Penanggung Jawab Teknik)</option>
                    <option value="TT">TT (Tenaga Teknik)</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1">No. Sertifikat</label>
                <input type="text" name="no_sertifikat" id="editNoSertifikat" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1">No. Register</label>
                <input type="text" name="no_register" id="editNoRegister" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1">Urutan</label>
                <input type="number" name="urutan" id="editUrutan" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
            </div>
            
            <div class="flex gap-3 pt-2">
                <button type="button" onclick="closeEditModal()" class="flex-1 px-4 py-2 rounded-xl border border-slate-700 text-slate-300 hover:bg-slate-800 text-sm font-medium transition">
                    Batal
                </button>
                <button type="submit" class="flex-1 px-4 py-2 rounded-xl bg-orange-500 hover:bg-orange-600 text-white text-sm font-medium transition">
                    Update Item
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const itemsData = @json($daftarPJTTT->items);
    const updateRouteBase = "/admin/profil/daftar-pjttt/items";

    function openEditModal(itemId) {
        const item = itemsData.find(i => i.id === itemId);
        if (!item) return;

        document.getElementById('editItemId').value = item.id;
        document.getElementById('editKategori').value = item.kategori;
        document.getElementById('editNama').value = item.nama;
        document.getElementById('editJabatan').value = item.jabatan;
        document.getElementById('editNoSertifikat').value = item.no_sertifikat;
        document.getElementById('editNoRegister').value = item.no_register;
        document.getElementById('editUrutan').value = item.urutan;
        
        document.getElementById('editItemForm').action = updateRouteBase + '/' + itemId;
        
        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('editModal').classList.add('flex');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
        document.getElementById('editModal').classList.remove('flex');
    }
</script>
@endsection
