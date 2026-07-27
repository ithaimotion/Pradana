@props(['lowongans'])

<div x-show="activeTab === 'karir-lowongan'" class="space-y-6" x-cloak>
    <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 shadow-xl">
        <div>
            <h2 class="text-xl font-bold text-white flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-teal-400"></span> Kelola Lowongan Pekerjaan (Karir)
            </h2>
            <p class="text-xs text-slate-400 mt-1">Tambah, ubah, atau hapus daftar posisi lowongan pekerjaan yang sedang dibuka.</p>
        </div>
        <button onclick="openLowonganModal()" class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2.5 rounded-xl text-sm font-bold flex items-center gap-2 shadow-lg shadow-teal-500/20 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Lowongan Baru
        </button>
    </div>

    <!-- Table List Lowongan -->
    <div class="bg-slate-900/80 border border-slate-800 rounded-2xl overflow-hidden shadow-xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-950/80 border-b border-slate-800 text-slate-400 text-xs font-semibold uppercase tracking-wider">
                        <th class="p-4">Posisi Lowongan</th>
                        <th class="p-4">Divisi & Tipe</th>
                        <th class="p-4">Lokasi</th>
                        <th class="p-4">Status</th>
                        <th class="p-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60 text-xs">
                    @forelse($lowongans as $job)
                        <tr class="hover:bg-slate-800/30 transition">
                            <td class="p-4 font-bold text-white">
                                {{ $job->judul }}
                            </td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-blue-500/10 text-blue-400 border border-blue-500/20 mr-1">{{ $job->divisi }}</span>
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">{{ $job->tipe }}</span>
                            </td>
                            <td class="p-4 text-slate-300">
                                {{ $job->lokasi }}
                            </td>
                            <td class="p-4">
                                @if($job->status)
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">Aktif</span>
                                @else
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-slate-800 text-slate-400 border border-slate-700">Tutup</span>
                                @endif
                            </td>
                            <td class="p-4 text-right space-x-2">
                                <button onclick="editLowonganModal({{ json_encode($job) }})" class="bg-slate-800 hover:bg-teal-500/20 text-slate-300 hover:text-teal-400 border border-slate-700 px-3 py-1.5 rounded-lg font-medium transition">
                                    Edit
                                </button>
                                <form action="{{ route('admin.lowongan.destroy', $job->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus lowongan pekerjaan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-slate-800 hover:bg-rose-500/20 text-slate-300 hover:text-rose-400 border border-slate-700 px-3 py-1.5 rounded-lg font-medium transition">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-slate-400">
                                Belum ada lowongan pekerjaan. Klik "Tambah Lowongan Baru" di atas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL LOWONGAN KARIR -->
<div id="lowonganModal" class="fixed inset-0 bg-slate-950/80 backdrop-blur-md z-50 hidden flex items-center justify-center p-4">
    <div class="bg-slate-900 border border-slate-800 rounded-2xl shadow-2xl max-w-lg w-full p-6 space-y-4">
        <h3 id="lowonganModalTitle" class="text-lg font-bold text-white">Tambah Lowongan Karir</h3>
        <form id="lowonganForm" action="{{ route('admin.lowongan.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="_method" id="lowonganMethod" value="POST">
            
            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1">Judul Posisi</label>
                <input type="text" name="judul" id="lowonganJudul" required class="w-full text-sm bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-white focus:outline-none focus:border-teal-500">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1">Divisi</label>
                    <input type="text" name="divisi" id="lowonganDivisi" value="Teknik" required class="w-full text-sm bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-white focus:outline-none focus:border-teal-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1">Tipe Pekerjaan</label>
                    <input type="text" name="tipe" id="lowonganTipe" value="Full Time" required class="w-full text-sm bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-white focus:outline-none focus:border-teal-500">
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1">Lokasi Kerja</label>
                <input type="text" name="lokasi" id="lowonganLokasi" value="Jakarta / Lapangan" required class="w-full text-sm bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-white focus:outline-none focus:border-teal-500">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1">Deskripsi Pekerjaan</label>
                <textarea name="deskripsi" id="lowonganDeskripsi" rows="3" class="w-full text-sm bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-white focus:outline-none focus:border-teal-500"></textarea>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1">Persyaratan Utama (Pisahkan per baris)</label>
                <textarea name="persyaratan" id="lowonganPersyaratan" rows="4" placeholder="Pendidikan min D3/S1&#10;Memiliki sertifikat kompetensi&#10;Pengalaman min 2 tahun" class="w-full text-sm bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-white focus:outline-none focus:border-teal-500"></textarea>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1">Link Ekstra Form Lamar (Opsional)</label>
                <input type="text" name="link_lamar" id="lowonganLink" placeholder="https://..." class="w-full text-sm bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-white focus:outline-none focus:border-teal-500">
            </div>

            <div class="flex items-center gap-2 pt-2">
                <input type="checkbox" name="status" id="lowonganStatus" value="1" checked class="w-4 h-4 rounded bg-slate-950 border-slate-800 text-teal-500 focus:ring-0">
                <label for="lowonganStatus" class="text-xs text-slate-300 font-semibold">Aktifkan Lowongan Ini di Halaman Karir Publik</label>
            </div>
            
            <div class="flex justify-end gap-2 pt-3 border-t border-slate-800">
                <button type="button" onclick="closeLowonganModal()" class="px-4 py-2 text-xs text-slate-400 hover:text-white rounded-lg">Batal</button>
                <button type="submit" class="px-5 py-2 text-xs bg-teal-500 hover:bg-teal-600 text-white rounded-xl font-bold shadow-lg shadow-teal-500/20">Simpan Lowongan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openLowonganModal() {
        document.getElementById('lowonganModalTitle').innerText = 'Tambah Lowongan Karir Baru';
        document.getElementById('lowonganForm').action = "{{ route('admin.lowongan.store') }}";
        document.getElementById('lowonganMethod').value = 'POST';
        document.getElementById('lowonganJudul').value = '';
        document.getElementById('lowonganDivisi').value = 'Teknik';
        document.getElementById('lowonganTipe').value = 'Full Time';
        document.getElementById('lowonganLokasi').value = 'Jakarta';
        document.getElementById('lowonganDeskripsi').value = '';
        document.getElementById('lowonganPersyaratan').value = '';
        document.getElementById('lowonganLink').value = '';
        document.getElementById('lowonganStatus').checked = true;
        document.getElementById('lowonganModal').classList.remove('hidden');
    }

    function editLowonganModal(job) {
        document.getElementById('lowonganModalTitle').innerText = 'Edit Lowongan Karir';
        document.getElementById('lowonganForm').action = "/admin/lowongan/" + job.id;
        document.getElementById('lowonganMethod').value = 'PUT';
        document.getElementById('lowonganJudul').value = job.judul || '';
        document.getElementById('lowonganDivisi').value = job.divisi || 'Teknik';
        document.getElementById('lowonganTipe').value = job.tipe || 'Full Time';
        document.getElementById('lowonganLokasi').value = job.lokasi || 'Jakarta';
        document.getElementById('lowonganDeskripsi').value = job.deskripsi || '';
        document.getElementById('lowonganPersyaratan').value = job.persyaratan || '';
        document.getElementById('lowonganLink').value = job.link_lamar || '';
        document.getElementById('lowonganStatus').checked = job.status ? true : false;
        document.getElementById('lowonganModal').classList.remove('hidden');
    }

    function closeLowonganModal() {
        document.getElementById('lowonganModal').classList.add('hidden');
    }
</script>
