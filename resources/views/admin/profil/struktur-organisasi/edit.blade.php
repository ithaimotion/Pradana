@extends('layouts.admin')

@section('title', 'Edit Struktur Organisasi')

@section('content')
<div class="space-y-6">
    <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 shadow-xl">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-white flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-amber-400"></span>
                Edit Struktur Organisasi
            </h2>
            <p class="text-xs text-slate-400 mt-1">Edit struktur organisasi dan jajaran manajemen</p>
        </div>

        <!-- Tab Navigation -->
        <div class="flex gap-2 mb-6 border-b border-slate-800">
            <button onclick="switchTab('info')" id="tab-info" class="px-4 py-2 text-sm font-medium rounded-t-lg transition-colors bg-orange-500/20 text-orange-400 border-b-2 border-orange-500">
                Informasi Halaman
            </button>
            <button onclick="switchTab('data')" id="tab-data" class="px-4 py-2 text-sm font-medium rounded-t-lg transition-colors text-slate-400 hover:text-white border-b-2 border-transparent">
                Data Struktur Organisasi
            </button>
        </div>

        <!-- Tab 1: Informasi Halaman -->
        <div id="content-info" class="space-y-6">
            <form action="{{ route('admin.profil.struktur-organisasi.update', $strukturOrg->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid md:grid-cols-2 gap-8">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1 uppercase tracking-wider">Judul Header</label>
                            <input type="text" name="judul" value="{{ old('judul', $strukturOrg->judul) }}" placeholder="STRUKTUR ORGANISASI" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                            @error('judul')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1 uppercase tracking-wider">Sub-Judul / Tagline</label>
                            <textarea name="subjudul" rows="2" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-amber-500" placeholder="Bagan Struktur Organisasi dan Manajemen PT Pradana Nusa Energi.">{{ old('subjudul', $strukturOrg->subjudul) }}</textarea>
                            @error('subjudul')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1 uppercase tracking-wider">Penjelasan Jajaran Manajemen & Operasional</label>
                            <textarea name="konten" rows="5" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-amber-500" placeholder="Deskripsi struktur organisasi...">{{ old('konten', $strukturOrg->konten) }}</textarea>
                            @error('konten')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="space-y-3 bg-slate-950/50 p-5 rounded-xl border border-slate-800">
                            <label class="block text-xs font-bold text-amber-400 uppercase tracking-wider">Upload Gambar Bagan Struktur Organisasi</label>
                            @if($strukturOrg->gambar)
                                <div class="rounded-xl overflow-hidden border border-slate-800 h-52 bg-slate-950 relative mb-3">
                                    <img src="{{ asset('/storage_public/' . $strukturOrg->gambar) }}" alt="Bagan Struktur Organisasi" class="w-full h-full object-contain p-2">
                                    <div class="absolute bottom-2 left-2 bg-slate-950/80 backdrop-blur text-[10px] text-slate-200 px-2 py-0.5 rounded border border-slate-800">Bagan Saat Ini</div>
                                </div>
                            @endif
                            <div class="border-2 border-dashed border-slate-800 rounded-xl p-4 text-center hover:border-amber-500/50 transition">
                                <input type="file" name="gambar" accept="image/*" class="w-full text-xs text-slate-400 bg-slate-950 border border-slate-800 rounded-xl p-2.5">
                                <p class="text-[11px] text-slate-500 mt-1">Upload Gambar Diagram Struktur (PNG, JPG, WEBP maks 5MB)</p>
                            </div>
                            @error('gambar')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-4 pt-4 border-t border-slate-800">
                    <a href="{{ route('admin.profil.struktur-organisasi.index') }}" class="px-6 py-2.5 rounded-xl border border-slate-700 text-slate-300 hover:bg-slate-800 hover:text-white text-sm font-medium transition">
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

        <!-- Tab 2: Data Struktur Organisasi -->
        <div id="content-data" class="space-y-6 hidden">
            <!-- Add New Item Form -->
            <div class="bg-slate-950/40 border border-slate-800 rounded-xl p-6">
                <h3 class="text-sm font-bold text-amber-400 uppercase tracking-wider mb-4">Tambah Item Baru</h3>
                <form action="{{ route('admin.profil.struktur-organisasi.items.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="profil_struktur_organisasi_id" value="{{ $strukturOrg->id }}">
                    
                    <div class="grid md:grid-cols-5 gap-4">
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
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Divisi</label>
                            <input type="text" name="divisi" placeholder="Divisi Operasional" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                            @error('divisi')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Level</label>
                            <input type="number" name="level" value="1" min="1" max="10" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                            @error('level')
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

            <!-- Existing Items Table -->
            <div class="space-y-4">
                <h3 class="text-sm font-bold text-amber-400 uppercase tracking-wider">Daftar Item ({{ $strukturOrg->items->count() }})</h3>
                @if($strukturOrg->items->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-100/80 border-b border-slate-200 text-slate-700 font-bold text-sm uppercase tracking-wider">
                                    <th class="py-4 px-4">Nama</th>
                                    <th class="py-4 px-4">Jabatan</th>
                                    <th class="py-4 px-4">Divisi</th>
                                    <th class="py-4 px-4 w-20 text-center">Level</th>
                                    <th class="py-4 px-4 w-20 text-center">Urutan</th>
                                    <th class="py-4 px-4 w-24 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-slate-700 text-sm">
                                @foreach($strukturOrg->items as $item)
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="py-4 px-4 font-bold text-slate-900">{{ $item->nama }}</td>
                                        <td class="py-4 px-4">{{ $item->jabatan }}</td>
                                        <td class="py-4 px-4">{{ $item->divisi ?? '-' }}</td>
                                        <td class="py-4 px-4 text-center">
                                            <span class="px-2 py-1 rounded text-xs font-bold bg-blue-900 text-blue-200">L{{ $item->level }}</span>
                                        </td>
                                        <td class="py-4 px-4 text-center">{{ $item->urutan }}</td>
                                        <td class="py-4 px-4 text-center">
                                            <div class="flex items-center justify-center gap-2">
                                                <button onclick="openEditModal({{ $item->id }})" class="text-amber-400 hover:text-amber-300 text-xs flex items-center gap-1">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                                </button>
                                                <form action="{{ route('admin.profil.struktur-organisasi.items.destroy', $item->id) }}" method="POST" class="inline">
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
                    <div class="text-center py-8 text-slate-500 text-sm">Belum ada item struktur organisasi</div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Edit Item Modal -->
<div id="editModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50">
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 w-full max-w-lg mx-4 shadow-2xl">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold text-white">Edit Item Struktur Organisasi</h3>
            <button onclick="closeEditModal()" class="text-slate-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <form id="editItemForm" action="" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="editItemId">
            
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1">Nama</label>
                <input type="text" name="nama" id="editNama" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1">Jabatan</label>
                <input type="text" name="jabatan" id="editJabatan" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1">Divisi</label>
                <input type="text" name="divisi" id="editDivisi" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1">Level</label>
                <input type="number" name="level" id="editLevel" min="1" max="10" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
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
    const itemsData = @json($strukturOrg->items);
    const updateRouteBase = "/admin/profil/struktur-organisasi/items";

    function switchTab(tab) {
        const tabInfo = document.getElementById('tab-info');
        const tabData = document.getElementById('tab-data');
        const contentInfo = document.getElementById('content-info');
        const contentData = document.getElementById('content-data');

        if (tab === 'info') {
            tabInfo.classList.add('bg-orange-500/20', 'text-orange-400', 'border-orange-500');
            tabInfo.classList.remove('text-slate-400', 'border-transparent');
            tabData.classList.remove('bg-orange-500/20', 'text-orange-400', 'border-orange-500');
            tabData.classList.add('text-slate-400', 'border-transparent');
            
            contentInfo.classList.remove('hidden');
            contentData.classList.add('hidden');
        } else {
            tabData.classList.add('bg-orange-500/20', 'text-orange-400', 'border-orange-500');
            tabData.classList.remove('text-slate-400', 'border-transparent');
            tabInfo.classList.remove('bg-orange-500/20', 'text-orange-400', 'border-orange-500');
            tabInfo.classList.add('text-slate-400', 'border-transparent');
            
            contentData.classList.remove('hidden');
            contentInfo.classList.add('hidden');
        }
    }

    function openEditModal(itemId) {
        const item = itemsData.find(i => i.id === itemId);
        if (!item) return;

        document.getElementById('editItemId').value = item.id;
        document.getElementById('editNama').value = item.nama;
        document.getElementById('editJabatan').value = item.jabatan;
        document.getElementById('editDivisi').value = item.divisi || '';
        document.getElementById('editLevel').value = item.level;
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
