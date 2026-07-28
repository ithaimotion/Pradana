@extends('layouts.admin')

@section('title', 'Edit Profil Perusahaan')

@section('content')
<div class="space-y-6">
    <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 shadow-xl">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-white flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-amber-400"></span>
                Edit Profil Perusahaan
            </h2>
            <p class="text-xs text-slate-400 mt-1">Edit profil perusahaan yang ada</p>
        </div>

        <form action="{{ route('admin.profil.perusahaan.update', $profilPerusahaan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- 1. Header Banner Halaman -->
            <div class="space-y-4 bg-slate-950/40 p-5 rounded-xl border border-slate-800/80">
                <h3 class="text-sm font-bold text-amber-400 uppercase tracking-wider">1. Banner Header Halaman</h3>
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Judul Header (Main Title)</label>
                        <input type="text" name="judul" value="{{ old('judul', $profilPerusahaan->judul) }}" placeholder="Contoh: PT PRADANA NUSA ENERGI" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                        @error('judul')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Sub-Judul / Tagline Profil</label>
                        <textarea name="subjudul" rows="2" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500" placeholder="Lembaga Inspeksi Teknik (LIT) terkemuka dan terpercaya...">{{ old('subjudul', $profilPerusahaan->subjudul) }}</textarea>
                        @error('subjudul')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- 2. Komitmen & Foto Gedung -->
            <div class="space-y-4 bg-slate-950/40 p-5 rounded-xl border border-slate-800/80">
                <h3 class="text-sm font-bold text-amber-400 uppercase tracking-wider">2. Komitmen Perusahaan & Foto Gedung</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-3">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Judul Komitmen</label>
                            <input type="text" name="nilai" value="{{ old('nilai', $profilPerusahaan->nilai) }}" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500" placeholder="Komitmen Kami Terhadap Keselamatan & Ketenagalistrikan">
                            @error('nilai')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Isi Paragraf Komitmen & Latar Belakang</label>
                            <textarea name="konten" rows="5" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500" placeholder="Deskripsi komitmen perusahaan...">{{ old('konten', $profilPerusahaan->konten) }}</textarea>
                            @error('konten')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-3">
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Foto Kantor / Gedung Perusahaan</label>
                        @if($profilPerusahaan->url_gambar)
                            <div class="rounded-xl overflow-hidden border border-slate-800 h-36 bg-slate-950 relative mb-3">
                                <img src="{{ asset('public/storage/' . $profilPerusahaan->url_gambar) }}" alt="Foto Perusahaan" class="w-full h-full object-cover">
                                <div class="absolute bottom-2 left-2 bg-slate-950/80 backdrop-blur text-[10px] text-slate-200 px-2 py-0.5 rounded border border-slate-800">Foto Saat Ini</div>
                            </div>
                        @endif
                        <div class="border-2 border-dashed border-slate-800 rounded-xl p-3 text-center hover:border-amber-500/50 transition">
                            <input type="file" name="gambar" accept="image/*" class="w-full text-xs text-slate-400 bg-slate-950 border border-slate-800 rounded-xl p-2">
                            <p class="text-[10px] text-slate-500 mt-1">Upload foto gedung/kantor (PNG, JPG, WEBP maks 5MB)</p>
                        </div>
                        @error('gambar')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- 3. Visi & Misi -->
            <div class="space-y-4 bg-slate-950/40 p-5 rounded-xl border border-slate-800/80">
                <h3 class="text-sm font-bold text-amber-400 uppercase tracking-wider">3. Visi & Misi</h3>
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Visi</label>
                        <textarea name="visi" rows="4" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500" placeholder="Menjadi Lembaga Inspeksi Teknik yang...">{{ old('visi', $profilPerusahaan->visi) }}</textarea>
                        @error('visi')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Misi</label>
                        <textarea name="misi" rows="4" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-sm text-slate-100 focus:outline-none focus:border-amber-500" placeholder="1. Melaksanakan pemeriksaan...">{{ old('misi', $profilPerusahaan->misi) }}</textarea>
                        @error('misi')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- 4. Nilai Utama Perusahaan -->
            <div class="space-y-4 bg-slate-950/40 p-5 rounded-xl border border-slate-800/80">
                <h3 class="text-sm font-bold text-amber-400 uppercase tracking-wider">4. Nilai Utama Perusahaan</h3>
                <p class="text-xs text-slate-400 mb-4">Kelola card nilai perusahaan yang akan ditampilkan di landing page</p>
                
                <div id="nilai-container" class="space-y-3">
                    @php
                        $nilaiPerusahaan = $profilPerusahaan->nilai_perusahaan ?? [];
                        if(!is_array($nilaiPerusahaan)) $nilaiPerusahaan = json_decode($nilaiPerusahaan, true) ?? [];
                    @endphp
                    @foreach($nilaiPerusahaan as $index => $nilai)
                        <div class="nilai-card bg-slate-900/60 border border-slate-700 rounded-xl p-4" data-index="{{ $index }}">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-xs font-semibold text-amber-400">Card #{{ $index + 1 }}</span>
                                <button type="button" onclick="removeNilaiCard({{ $index }})" class="text-red-400 hover:text-red-300 text-xs flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    Hapus
                                </button>
                            </div>
                            <div class="grid md:grid-cols-3 gap-3">
                                <div>
                                    <label class="block text-xs font-semibold text-slate-300 mb-1">Ikon (Emoji)</label>
                                    <input type="text" name="nilai_perusahaan[{{ $index }}][ikon]" value="{{ $nilai['ikon'] ?? '' }}" placeholder="🛡️" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-xs font-semibold text-slate-300 mb-1">Judul</label>
                                    <input type="text" name="nilai_perusahaan[{{ $index }}][judul]" value="{{ $nilai['judul'] ?? '' }}" placeholder="Independensi & Integritas" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                                </div>
                                <div class="md:col-span-3">
                                    <label class="block text-xs font-semibold text-slate-300 mb-1">Deskripsi</label>
                                    <textarea name="nilai_perusahaan[{{ $index }}][deskripsi]" rows="2" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2 text-sm text-slate-100 focus:outline-none focus:border-amber-500" placeholder="Deskripsi nilai perusahaan...">{{ $nilai['deskripsi'] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <button type="button" onclick="addNilaiCard()" class="w-full py-2.5 border-2 border-dashed border-slate-700 rounded-xl text-slate-400 hover:border-amber-500 hover:text-amber-400 text-sm font-medium transition flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Tambah Card Nilai
                </button>
            </div>

            <script>
                let nilaiIndex = {{ count($nilaiPerusahaan) }};
                
                function addNilaiCard() {
                    const container = document.getElementById('nilai-container');
                    const newIndex = nilaiIndex++;
                    
                    const cardHtml = `
                        <div class="nilai-card bg-slate-900/60 border border-slate-700 rounded-xl p-4" data-index="${newIndex}">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-xs font-semibold text-amber-400">Card #${newIndex + 1}</span>
                                <button type="button" onclick="removeNilaiCard(${newIndex})" class="text-red-400 hover:text-red-300 text-xs flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    Hapus
                                </button>
                            </div>
                            <div class="grid md:grid-cols-3 gap-3">
                                <div>
                                    <label class="block text-xs font-semibold text-slate-300 mb-1">Ikon (Emoji)</label>
                                    <input type="text" name="nilai_perusahaan[${newIndex}][ikon]" placeholder="🛡️" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-xs font-semibold text-slate-300 mb-1">Judul</label>
                                    <input type="text" name="nilai_perusahaan[${newIndex}][judul]" placeholder="Independensi & Integritas" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                                </div>
                                <div class="md:col-span-3">
                                    <label class="block text-xs font-semibold text-slate-300 mb-1">Deskripsi</label>
                                    <textarea name="nilai_perusahaan[${newIndex}][deskripsi]" rows="2" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-2 text-sm text-slate-100 focus:outline-none focus:border-amber-500" placeholder="Deskripsi nilai perusahaan..."></textarea>
                                </div>
                            </div>
                        </div>
                    `;
                    
                    container.insertAdjacentHTML('beforeend', cardHtml);
                }
                
                function removeNilaiCard(index) {
                    const card = document.querySelector(`.nilai-card[data-index="${index}"]`);
                    if (card) {
                        card.remove();
                    }
                }
            </script>

            <div class="flex items-center gap-4 pt-4 border-t border-slate-800">
                <a href="{{ route('admin.profil.perusahaan.index') }}" class="px-6 py-2.5 rounded-xl border border-slate-700 text-slate-300 hover:bg-slate-800 hover:text-white text-sm font-medium transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-orange-500 hover:bg-orange-600 text-white text-sm font-medium transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Update Profil
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
