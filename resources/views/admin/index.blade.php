@extends('layouts.admin')

@section('title', 'Admin Console - Management Studio')

@section('content')
<div class="space-y-8">

    <!-- 0. DASHBOARD SUMMARY PANEL -->
    <x-admin.dashboard-panel :lowongans="$lowongans" :pesanMasuks="$pesanMasuks" :galeri="$galeri" />


    <!-- 1. HERO BANNER PANEL -->

    <div x-show="activeTab === 'hero'" class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
        <div>
            <h2 class="text-xl font-bold text-white flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-orange-500"></span> 1. Kelola Hero Banner Utama
            </h2>
            <p class="text-xs text-slate-400 mt-1">Ubah headline utama, deskripsi sub-hero, teks tombol CTA, dan upload file background banner.</p>
        </div>

        <form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div class="grid md:grid-cols-2 gap-8">
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Judul Utama (Title)</label>
                        <textarea name="judul" rows="3" required class="w-full bg-slate-950/60 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition">{{ old('title', $hero->judul ?? '') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Sub-Judul (Subtitle)</label>
                        <textarea name="subjudul" rows="3" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition">{{ old('subtitle', $hero->subjudul ?? '') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Teks Tombol CTA</label>
                        <input type="text" name="konten" value="{{ old('content', $hero->konten ?? '') }}" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition" placeholder="Contoh: Contact Us">
                    </div>
                </div>

                <div class="space-y-4">
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Background Image Hero</label>
                    @if(isset($hero) && $hero->url_gambar)
                        <div class="relative rounded-xl overflow-hidden border border-slate-800 h-48 bg-slate-950">
                            <img src="{{ $hero->url_gambar }}" alt="Hero Background" class="w-full h-full object-cover">
                            <div class="absolute bottom-2 left-2 bg-slate-950/80 backdrop-blur border border-slate-800 text-slate-200 text-xs px-2.5 py-1 rounded-lg">Gambar Banner Saat Ini</div>
                        </div>
                    @endif

                    <div class="border-2 border-dashed border-slate-800 rounded-xl p-6 text-center hover:bg-slate-950/40 hover:border-orange-500/50 transition duration-200">
                        <input type="file" name="gambar" id="hero_image" class="hidden" accept="image/*" onchange="previewImage(this, 'hero_preview')">
                        <label for="hero_image" class="cursor-pointer flex flex-col items-center">
                            <svg class="w-10 h-10 text-slate-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                            <span class="text-sm font-semibold text-orange-400">Klik untuk Upload Gambar Banner Baru</span>
                            <span class="text-xs text-slate-500 mt-1">Format PNG, JPG, WEBP maks 5MB</span>
                        </label>
                    </div>
                    <img id="hero_preview" class="hidden w-full h-40 object-cover rounded-xl border border-slate-800 mt-2">
                </div>
            </div>

            <div class="flex justify-end pt-4 border-t border-slate-800">
                <button type="submit" class="bg-gradient-to-r from-orange-500 to-amber-600 hover:from-orange-600 hover:to-amber-700 text-white px-6 py-3 rounded-xl font-bold text-sm shadow-lg shadow-orange-500/20 transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Simpan Hero Banner
                </button>
            </div>
        </form>
    </div>

    <!-- 2. PROFIL PRADANA PANEL -->
    <div x-show="activeTab === 'profil'" class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
        <div>
            <h2 class="text-xl font-bold text-white flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-amber-500"></span> 2. Kelola Profil Pradana Nusa Energi
            </h2>
            <p class="text-xs text-slate-400 mt-1">Ubah judul profil, teks sub-highlight, deskripsi umum, dan upload 2 foto profil perusahaan.</p>
        </div>

        <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="grid md:grid-cols-2 gap-8">
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Judul Profil (Contoh: PT PRADANA NUSA ENERGI)</label>
                        <input type="text" name="judul" value="{{ old('title', $profilPradana->judul ?? '') }}" required class="w-full bg-slate-950/60 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-orange-500">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Sub-Highlight (Contoh: Nusa Energi)</label>
                        <input type="text" name="subjudul" value="{{ old('subtitle', $profilPradana->subjudul ?? '') }}" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-orange-500">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Deskripsi Ringkasan Profil</label>
                        <textarea name="konten" rows="4" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-orange-500">{{ old('content', $profilPradana->konten ?? '') }}</textarea>
                    </div>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Upload Foto Profil 1 (Kiri)</label>
                        <input type="file" name="gambar1" class="w-full text-xs text-slate-400 bg-slate-950 border border-slate-800 rounded-xl p-3">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Upload Foto Profil 2 (Kanan)</label>
                        <input type="file" name="gambar2" class="w-full text-xs text-slate-400 bg-slate-950 border border-slate-800 rounded-xl p-3">
                    </div>
                </div>
            </div>

            <div class="flex justify-end pt-4 border-t border-slate-800">
                <button type="submit" class="bg-gradient-to-r from-orange-500 to-amber-600 text-white px-6 py-3 rounded-xl font-bold text-sm shadow-lg shadow-orange-500/20">
                    Simpan Profil Pradana
                </button>
            </div>
        </form>
    </div>

    <!-- 3. STATISTIK PERFORMA PANEL -->
    <div x-show="activeTab === 'statistik'" class="space-y-6">
        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 shadow-xl">
            <div>
                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-emerald-500"></span> 3. Kelola Angka & Statistik Performa
                </h2>
                <p class="text-xs text-slate-400 mt-1">Tambah, ubah, atau hapus card statistik performa smelter.</p>
            </div>
            <button onclick="openStatModal()" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2.5 rounded-xl text-sm font-bold flex items-center gap-2 shadow-lg shadow-orange-500/20">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Stat Card
            </button>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            @forelse($statistik as $item)
                <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 space-y-4 shadow-lg relative flex flex-col justify-between">
                    <div class="space-y-2">
                        <div class="flex items-center justify-between border-b border-slate-800 pb-3">
                            <span class="text-3xl font-extrabold text-orange-500 tracking-tight">{{ $item->nilai }}</span>
                            <span class="text-[10px] font-mono font-semibold bg-slate-950 text-slate-400 px-2 py-1 rounded-md border border-slate-800">#{{ $item->urutan }}</span>
                        </div>
                        <h3 class="font-bold text-white uppercase text-base">{{ $item->judul }}</h3>
                        <p class="text-xs text-slate-400 leading-relaxed">{{ $item->konten }}</p>
                    </div>
                    
                    <div class="flex items-center justify-end gap-2 pt-4 border-t border-slate-800/80">
                        <button onclick="editStatModal({{ $item->id }}, '{{ addslashes($item->nilai) }}', '{{ addslashes($item->judul) }}', '{{ addslashes($item->konten) }}', {{ $item->urutan }})" class="text-xs bg-slate-800 hover:bg-blue-500/10 hover:text-blue-400 text-slate-300 border border-slate-700 px-3 py-1.5 rounded-lg font-medium transition">Edit</button>
                        <form action="{{ route('admin.konten.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin menghapus card statistik ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs bg-slate-800 hover:bg-rose-500/10 hover:text-rose-400 text-slate-300 border border-slate-700 px-3 py-1.5 rounded-lg font-medium transition">Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="md:col-span-3 text-center py-12 bg-slate-900/60 rounded-2xl border border-dashed border-slate-800">
                    <p class="text-slate-400 text-sm">Belum ada item statistik.</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- 4. TENTANG PRADANA PANEL -->
    <div x-show="activeTab === 'tentang'" class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
        <div>
            <h2 class="text-xl font-bold text-white flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-blue-400"></span> 4. Kelola Section Tentang Pradana
            </h2>
            <p class="text-xs text-slate-400 mt-1">Ubah judul, paragraf visi/misi, teks tombol CTA, dan gambar pendukung.</p>
        </div>

        <form action="{{ route('admin.tentang.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="grid md:grid-cols-2 gap-8">
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Judul Section (Contoh: TENTANG PRADANA)</label>
                        <input type="text" name="judul" value="{{ old('title', $tentangPradana->judul ?? '') }}" required class="w-full bg-slate-950/60 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-orange-500">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Paragraf Utama (Visi & Layanan)</label>
                        <textarea name="subjudul" rows="3" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-orange-500">{{ old('subtitle', $tentangPradana->subjudul ?? '') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Paragraf Kedua (Integritas & Regulasi)</label>
                        <textarea name="konten" rows="3" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-orange-500">{{ old('content', $tentangPradana->konten ?? '') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Teks Tombol CTA</label>
                        <input type="text" name="nilai" value="{{ old('value', $tentangPradana->nilai ?? '') }}" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-orange-500" placeholder="Learn More">
                    </div>
                </div>

                <div class="space-y-4">
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Gambar Section Tentang Pradana</label>
                    @if(isset($tentangPradana) && $tentangPradana->url_gambar)
                        <div class="rounded-xl overflow-hidden border border-slate-800 h-48 bg-slate-950">
                            <img src="{{ $tentangPradana->url_gambar }}" alt="Tentang Pradana" class="w-full h-full object-cover">
                        </div>
                    @endif
                    <input type="file" name="gambar" class="w-full text-xs text-slate-400 bg-slate-950 border border-slate-800 rounded-xl p-3">
                </div>
            </div>

            <div class="flex justify-end pt-4 border-t border-slate-800">
                <button type="submit" class="bg-gradient-to-r from-orange-500 to-amber-600 text-white px-6 py-3 rounded-xl font-bold text-sm shadow-lg shadow-orange-500/20">
                    Simpan Section Tentang Pradana
                </button>
            </div>
        </form>
    </div>

    <!-- 5. TEKNOLOGI TERINTEGRASI PANEL -->
    <div x-show="activeTab === 'teknologi'" class="space-y-6">
        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
            <div>
                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-purple-400"></span> 5. Header Teknologi Terintegrasi
                </h2>
                <p class="text-xs text-slate-400 mt-1">Edit judul utama section teknologi terintegrasi.</p>
            </div>

            <form action="{{ route('admin.teknologi.header') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Judul Utama Teknologi</label>
                    <input type="text" name="judul" value="{{ old('title', $teknologiHeader->judul ?? '') }}" required class="w-full bg-slate-950/60 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-orange-500">
                </div>
                <div class="flex justify-end pt-3">
                    <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-xl text-xs font-bold shadow-lg shadow-orange-500/20">
                        Simpan Header Teknologi
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
            <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                <div>
                    <h3 class="text-lg font-bold text-white">Cards Fitur Teknologi</h3>
                    <p class="text-xs text-slate-400">Daftar card fitur HMI, High Performance, Smart Data, dll.</p>
                </div>
                <button onclick="openGenericModal('teknologi_item', 'Tambah Card Teknologi')" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-xl text-xs font-bold shadow-lg shadow-orange-500/20">
                    Tambah Fitur Teknologi
                </button>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
                @forelse($teknologiItems as $item)
                    <div class="p-4 bg-slate-950/60 rounded-xl border border-slate-800 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] font-mono text-orange-400">#{{ $item->urutan }}</span>
                            <h4 class="font-bold text-sm text-white uppercase">{{ $item->judul }}</h4>
                            <p class="text-xs text-slate-400">{{ $item->konten }}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <button onclick="editGenericModal({{ $item->id }}, '{{ addslashes($item->judul) }}', '{{ addslashes($item->konten) }}', {{ $item->urutan }})" class="text-xs bg-slate-800 text-slate-300 px-3 py-1.5 rounded-lg">Edit</button>
                            <form action="{{ route('admin.konten.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus card ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs bg-slate-800 text-rose-400 px-3 py-1.5 rounded-lg">Hapus</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-center py-6 text-slate-500 text-xs md:col-span-2">Belum ada card fitur teknologi.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- 6. KEUNGGULAN APC+ PANEL -->
    <div x-show="activeTab === 'keunggulan'" class="space-y-6">
        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
            <div>
                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-amber-400"></span> 6. Header Section Keunggulan APC+
                </h2>
                <p class="text-xs text-slate-400 mt-1">Edit headline utama section keunggulan dan upload foto industri pendukung.</p>
            </div>

            <form action="{{ route('admin.keunggulan.header') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Judul Section Keunggulan</label>
                            <textarea name="judul" rows="2" required class="w-full bg-slate-950/60 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-orange-500">{{ old('title', $keunggulanHeader->judul ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Deskripsi Ringkas</label>
                            <textarea name="konten" rows="3" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-orange-500">{{ old('content', $keunggulanHeader->konten ?? '') }}</textarea>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Foto Samping Keunggulan</label>
                        @if(isset($keunggulanHeader) && $keunggulanHeader->url_gambar)
                            <div class="rounded-xl overflow-hidden border border-slate-800 h-36 bg-slate-950">
                                <img src="{{ $keunggulanHeader->url_gambar }}" alt="Keunggulan Banner" class="w-full h-full object-cover">
                            </div>
                        @endif
                        <input type="file" name="gambar" class="w-full text-xs text-slate-400 bg-slate-950 border border-slate-800 rounded-xl p-2.5">
                    </div>
                </div>
                <div class="flex justify-end border-t border-slate-800 pt-4">
                    <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-xl font-bold text-sm shadow-lg shadow-orange-500/20">
                        Simpan Header Keunggulan
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
            <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                <div>
                    <h3 class="text-lg font-bold text-white">Daftar Poin Checklist Keunggulan</h3>
                    <p class="text-xs text-slate-400">Poin fitur yang ditampilkan pada checklist keunggulan APC+.</p>
                </div>
                <button onclick="openGenericModal('keunggulan_item', 'Tambah Poin Keunggulan')" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2.5 rounded-xl text-sm font-bold flex items-center gap-2 shadow-lg shadow-orange-500/20">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Tambah Poin
                </button>
            </div>

            <div class="space-y-3">
                @forelse($keunggulanItems as $item)
                    <div class="flex items-center justify-between p-4 bg-slate-950/60 rounded-xl border border-slate-800/80">
                        <div class="flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-orange-500/10 text-orange-400 font-bold border border-orange-500/20 flex items-center justify-center text-xs">
                                {{ $item->urutan }}
                            </span>
                            <div>
                                <h4 class="font-bold text-sm text-white uppercase">{{ $item->judul }}</h4>
                                <p class="text-xs text-slate-400">{{ $item->konten }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <button onclick="editGenericModal({{ $item->id }}, '{{ addslashes($item->judul) }}', '{{ addslashes($item->konten) }}', {{ $item->urutan }})" class="text-xs bg-slate-800 hover:bg-blue-500/10 hover:text-blue-400 text-slate-300 border border-slate-700 px-3 py-1.5 rounded-lg font-medium transition">Edit</button>
                            <form action="{{ route('admin.konten.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus poin ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs bg-slate-800 hover:bg-rose-500/10 hover:text-rose-400 text-slate-300 border border-slate-700 px-3 py-1.5 rounded-lg font-medium transition">Hapus</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-center py-6 text-slate-500 text-sm">Belum ada poin keunggulan.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- 7. ENERGI BERKELANJUTAN PANEL -->
    <div x-show="activeTab === 'energi'" class="space-y-6">
        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
            <div>
                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-teal-400"></span> 7. Header Energi Berkelanjutan
                </h2>
                <p class="text-xs text-slate-400 mt-1">Ubah headline section energi berkelanjutan dan dekarbonisasi.</p>
            </div>

            <form action="{{ route('admin.energi.header') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Judul Section (Contoh: ENGINEERING A LOWER-CARBON ALUMINIUM FUTURE)</label>
                    <input type="text" name="judul" value="{{ old('title', $energiHeader->judul ?? '') }}" required class="w-full bg-slate-950/60 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-orange-500">
                </div>
                <div class="flex justify-end pt-3">
                    <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-xl text-xs font-bold shadow-lg shadow-orange-500/20">
                        Simpan Header Energi
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
            <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                <div>
                    <h3 class="text-lg font-bold text-white">Cards Inovasi Energi</h3>
                    <p class="text-xs text-slate-400">Cards Decarbonization, Energy Efficiency, & Long-Term Growth.</p>
                </div>
                <button onclick="openGenericModal('energi_item', 'Tambah Card Energi')" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2.5 rounded-xl text-xs font-bold shadow-lg shadow-orange-500/20">
                    Tambah Card Energi
                </button>
            </div>

            <div class="grid md:grid-cols-3 gap-4">
                @forelse($energiItems as $item)
                    <div class="p-4 bg-slate-950/60 rounded-xl border border-slate-800 flex flex-col justify-between space-y-3">
                        <div>
                            <span class="text-[10px] font-mono text-orange-400">#{{ $item->urutan }}</span>
                            <h4 class="font-bold text-sm text-white uppercase">{{ $item->judul }}</h4>
                            <p class="text-xs text-slate-400 mt-1">{{ $item->konten }}</p>
                        </div>
                        <div class="flex items-center justify-end gap-2 pt-2 border-t border-slate-900">
                            <button onclick="editGenericModal({{ $item->id }}, '{{ addslashes($item->judul) }}', '{{ addslashes($item->konten) }}', {{ $item->urutan }})" class="text-xs bg-slate-800 text-slate-300 px-3 py-1 rounded-lg">Edit</button>
                            <form action="{{ route('admin.konten.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus card ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs bg-slate-800 text-rose-400 px-3 py-1 rounded-lg">Hapus</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-center py-6 text-slate-500 text-xs md:col-span-3">Belum ada card energi.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- 8. MENGAPA PILIH PRADANA PANEL -->
    <div x-show="activeTab === 'mengapa'" class="space-y-6">
        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
            <div>
                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-indigo-400"></span> 8. Header Section Mengapa Pilih Pradana
                </h2>
                <p class="text-xs text-slate-400 mt-1">Ubah headline section dan upload 2 foto pendukung.</p>
            </div>

            <form action="{{ route('admin.mengapa.header') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Judul Section (Contoh: WHY CHOOSE PRADANA NUSA ENERGI)</label>
                            <input type="text" name="judul" value="{{ old('title', $mengapaHeader->judul ?? '') }}" required class="w-full bg-slate-950/60 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-orange-500">
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Upload Foto 1 (Kiri)</label>
                            <input type="file" name="gambar1" class="w-full text-xs text-slate-400 bg-slate-950 border border-slate-800 rounded-xl p-2.5">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Upload Foto 2 (Kanan)</label>
                            <input type="file" name="gambar2" class="w-full text-xs text-slate-400 bg-slate-950 border border-slate-800 rounded-xl p-2.5">
                        </div>
                    </div>
                </div>
                <div class="flex justify-end border-t border-slate-800 pt-4">
                    <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-xl font-bold text-sm shadow-lg shadow-orange-500/20">
                        Simpan Section Mengapa
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
            <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                <div>
                    <h3 class="text-lg font-bold text-white">Poin Alasan & Keunggulan</h3>
                    <p class="text-xs text-slate-400">Poin Magnetic Leadership, Innovative Solutions, Proven Results, dll.</p>
                </div>
                <button onclick="openGenericModal('mengapa_item', 'Tambah Poin Alasan')" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2.5 rounded-xl text-xs font-bold shadow-lg shadow-orange-500/20">
                    Tambah Poin Alasan
                </button>
            </div>

            <div class="space-y-3">
                @forelse($mengapaItems as $item)
                    <div class="flex items-center justify-between p-4 bg-slate-950/60 rounded-xl border border-slate-800/80">
                        <div class="flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-orange-500/10 text-orange-400 font-bold border border-orange-500/20 flex items-center justify-center text-xs">
                                {{ $item->urutan }}
                            </span>
                            <div>
                                <h4 class="font-bold text-sm text-white uppercase">{{ $item->judul }}</h4>
                                <p class="text-xs text-slate-400">{{ $item->konten }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <button onclick="editGenericModal({{ $item->id }}, '{{ addslashes($item->judul) }}', '{{ addslashes($item->konten) }}', {{ $item->urutan }})" class="text-xs bg-slate-800 hover:bg-blue-500/10 hover:text-blue-400 text-slate-300 border border-slate-700 px-3 py-1.5 rounded-lg font-medium transition">Edit</button>
                            <form action="{{ route('admin.konten.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus poin ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs bg-slate-800 hover:bg-rose-500/10 hover:text-rose-400 text-slate-300 border border-slate-700 px-3 py-1.5 rounded-lg font-medium transition">Hapus</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-center py-6 text-slate-500 text-sm">Belum ada poin alasan.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- 9. KONTAK & BANNER CTA PANEL -->
    <div x-show="activeTab === 'kontak'" class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
        <div>
            <h2 class="text-xl font-bold text-white flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-pink-400"></span> 9. Kelola Banner Kontak & CTA Bawah
            </h2>
            <p class="text-xs text-slate-400 mt-1">Ubah headline banner ajakan aksi bawah, deskripsi singkat, teks tombol CTA, dan upload background image.</p>
        </div>

        <form action="{{ route('admin.kontak.header') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div class="grid md:grid-cols-2 gap-8">
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Headline Banner (Contoh: UPGRADE SMELTER PERFORMANCE WITH CONFIDENCE)</label>
                        <textarea name="judul" rows="2" required class="w-full bg-slate-950/60 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-orange-500">{{ old('title', $kontakKami->judul ?? '') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Deskripsi Ajakan Bermitra</label>
                        <textarea name="subjudul" rows="3" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-orange-500">{{ old('subtitle', $kontakKami->subjudul ?? '') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Teks Tombol CTA</label>
                        <input type="text" name="konten" value="{{ old('content', $kontakKami->konten ?? '') }}" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-orange-500" placeholder="Get Started Today">
                    </div>
                </div>

                <div class="space-y-4">
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Background Image Banner CTA</label>
                    @if(isset($kontakKami) && $kontakKami->url_gambar)
                        <div class="relative rounded-xl overflow-hidden border border-slate-800 h-48 bg-slate-950">
                            <img src="{{ $kontakKami->url_gambar }}" alt="Banner Kontak" class="w-full h-full object-cover">
                        </div>
                    @endif
                    <input type="file" name="gambar" class="w-full text-xs text-slate-400 bg-slate-950 border border-slate-800 rounded-xl p-3">
                </div>
            </div>

            <div class="flex justify-end pt-4 border-t border-slate-800">
                <button type="submit" class="bg-gradient-to-r from-orange-500 to-amber-600 text-white px-6 py-3 rounded-xl font-bold text-sm shadow-lg shadow-orange-500/20">
                    Simpan Banner Kontak & CTA
                </button>
            </div>
        </form>
    </div>

    <!-- 10. GALERI MEDIA PANEL -->
    <div x-show="activeTab === 'galeri'" class="space-y-6">
        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 shadow-xl">
            <div>
                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-sky-400"></span> 10. Upload & Kelola Galeri Media
                </h2>
                <p class="text-xs text-slate-400 mt-1">Upload foto fasilitas/operasional baru, atur keterangan, dan hapus foto.</p>
            </div>
            <button onclick="openGaleriModal()" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2.5 rounded-xl text-sm font-bold flex items-center gap-2 shadow-lg shadow-orange-500/20">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                Upload Foto Galeri
            </button>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            @forelse($galeri as $item)
                <div class="bg-slate-900/80 border border-slate-800 rounded-2xl overflow-hidden group shadow-lg">
                    <div class="h-48 bg-slate-950 relative overflow-hidden">
                        <img src="{{ $item->url_gambar }}" alt="{{ $item->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    </div>
                    <div class="p-4 flex items-center justify-between border-t border-slate-800">
                        <div>
                            <h4 class="font-bold text-sm text-white">{{ $item->judul ?? 'Media Foto' }}</h4>
                            <span class="text-[10px] text-slate-500 font-mono">Urutan: #{{ $item->urutan }}</span>
                        </div>
                        <div class="flex gap-2">
                            <button onclick="editGaleriModal({{ $item->id }}, '{{ addslashes($item->judul) }}', '{{ addslashes($item->category) }}', {{ $item->urutan }})" class="text-xs bg-slate-800 hover:bg-blue-500/10 hover:text-blue-400 text-slate-300 border border-slate-700 px-3 py-1.5 rounded-lg font-medium transition">
                                Edit
                            </button>
                            <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus foto ini dari galeri?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs bg-slate-800 hover:bg-rose-500/10 hover:text-rose-400 text-slate-300 border border-slate-700 px-3 py-1.5 rounded-lg font-medium transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="md:col-span-3 text-center py-12 bg-slate-900/60 rounded-2xl border border-dashed border-slate-800">
                    <p class="text-slate-400 text-sm">Belum ada foto galeri terupload.</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- 11. LOGO MANAGEMENT PANEL -->
    <div x-show="activeTab === 'logo'" class="space-y-6">
        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 shadow-xl">
            <div>
                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-violet-400"></span> 11. Manajemen Logo
                </h2>
                <p class="text-xs text-slate-400 mt-1">Upload logo perusahaan, atur URL logo, dan kelola tampilan logo.</p>
            </div>
            <button onclick="openLogoModal()" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2.5 rounded-xl text-sm font-bold flex items-center gap-2 shadow-lg shadow-orange-500/20">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Logo
            </button>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            @forelse($logos as $item)
                <div class="bg-slate-900/80 border border-slate-800 rounded-2xl overflow-hidden group shadow-lg">
                    <div class="h-48 bg-slate-950 relative overflow-hidden flex items-center justify-center p-4">
                        @if($item->url_gambar)
                            <img src="{{ asset('storage/' . $item->url_gambar) }}" alt="{{ $item->nama }}" title="{{ $item->nama }}" class="max-h-full max-w-full object-contain group-hover:scale-105 transition duration-300">
                        @elseif($item->logo_url)
                            <img src="{{ $item->logo_url }}" alt="{{ $item->nama }}" title="{{ $item->nama }}" class="max-h-full max-w-full object-contain group-hover:scale-105 transition duration-300">
                        @else
                            <div class="text-slate-500 text-sm">Tidak ada gambar</div>
                        @endif
                    </div>
                    <div class="p-4 flex items-center justify-between border-t border-slate-800">
                        <div>
                            <h4 class="font-bold text-sm text-white">{{ $item->nama ?? 'Logo' }}</h4>
                            <span class="text-[10px] text-slate-500 font-mono">Urutan: #{{ $item->urutan }}</span>
                            @if($item->aktif)
                                <span class="ml-2 text-[10px] bg-emerald-500/20 text-emerald-400 px-2 py-0.5 rounded-full">Aktif</span>
                            @else
                                <span class="ml-2 text-[10px] bg-slate-700 text-slate-400 px-2 py-0.5 rounded-full">Non-aktif</span>
                            @endif
                        </div>
                        <div class="flex gap-2">
                            <button onclick="editLogoModal({{ $item->id }}, '{{ addslashes($item->nama ?? '') }}', '{{ addslashes($item->logo_url ?? '') }}', {{ $item->urutan }}, {{ $item->aktif ? 'true' : 'false' }})" class="text-xs bg-slate-800 hover:bg-blue-500/10 hover:text-blue-400 text-slate-300 border border-slate-700 px-3 py-1.5 rounded-lg font-medium transition">
                                Edit
                            </button>
                            <form action="{{ route('admin.logo.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus logo ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs bg-slate-800 hover:bg-rose-500/10 hover:text-rose-400 text-slate-300 border border-slate-700 px-3 py-1.5 rounded-lg font-medium transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="md:col-span-3 text-center py-12 bg-slate-900/60 rounded-2xl border border-dashed border-slate-800">
                    <p class="text-slate-400 text-sm">Belum ada logo terupload.</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- SUB-MENU CMS PANELS: PROFIL -->
    <x-admin.forms.profil-perusahaan :data="isset($kontenHalamans['profil_perusahaan']) ? $kontenHalamans['profil_perusahaan']->first() : null" />
    <x-admin.forms.pjt-tt :data="isset($kontenHalamans['profil_pjt_tt']) ? $kontenHalamans['profil_pjt_tt']->first() : null" />
    <x-admin.forms.struktur-org :data="isset($kontenHalamans['profil_struktur']) ? $kontenHalamans['profil_struktur']->first() : null" />
    <x-admin.forms.legalitas :data="isset($kontenHalamans['profil_legalitas']) ? $kontenHalamans['profil_legalitas']->first() : null" />
    <x-admin.forms.peralatan :data="isset($kontenHalamans['profil_peralatan']) ? $kontenHalamans['profil_peralatan']->first() : null" />
    <x-admin.forms.sop :data="isset($kontenHalamans['profil_sop']) ? $kontenHalamans['profil_sop']->first() : null" />

    <!-- SUB-MENU CMS PANELS: SLO -->
    <x-admin.forms.slo-regulasi :data="$kontenHalamans['slo_regulasi'][0] ?? null" />
    <x-admin.subpage-form tabName="slo-verifikasi" halamanKey="slo_verifikasi" title="Verifikasi SLO" badgeColor="bg-emerald-400" description="Kelola petunjuk dan layanan verifikasi keabsahan sertifikat SLO." :actionRoute="route('admin.slo.halaman.update')" :data="$kontenHalamans['slo_verifikasi'][0] ?? null" />
    <x-admin.subpage-form tabName="slo-cek-permohonan" halamanKey="slo_cek_permohonan" title="Cek Permohonan SLO" badgeColor="bg-emerald-400" description="Kelola petunjuk penelusuran status permohonan inspeksi pelanggan." :actionRoute="route('admin.slo.halaman.update')" :data="$kontenHalamans['slo_cek_permohonan'][0] ?? null" />
    <x-admin.subpage-form tabName="slo-bidang-layanan" halamanKey="slo_bidang_layanan" title="Bidang Layanan SLO" badgeColor="bg-emerald-400" description="Kelola lingkup inspeksi pembangkit, transmisi, dan distribusi ketenagalistrikan." :actionRoute="route('admin.slo.halaman.update')" :data="$kontenHalamans['slo_bidang_layanan'][0] ?? null" />

    <!-- SUB-MENU CMS PANELS: INFORMASI PUBLIK -->
    <x-admin.subpage-form tabName="uji-petik" halamanKey="infopub_uji_petik" title="Uji Petik Inspeksi" badgeColor="bg-sky-400" description="Kelola prosedur dan ketentuan uji petik mutu hasil inspeksi." :actionRoute="route('admin.infopublik.halaman.update')" :data="$kontenHalamans['infopub_uji_petik'][0] ?? null" />
    <x-admin.subpage-form tabName="keluhan-banding" halamanKey="infopub_keluhan" title="Keluhan & Banding" badgeColor="bg-sky-400" description="Kelola alur penanganan pengaduan dan banding hasil inspeksi." :actionRoute="route('admin.infopublik.halaman.update')" :data="$kontenHalamans['infopub_keluhan'][0] ?? null" />
    <x-admin.subpage-form tabName="persyaratan-slo" halamanKey="infopub_persyaratan" title="Persyaratan SLO" badgeColor="bg-sky-400" description="Kelola dokumen & daftar kelengkapan syarat permohonan SLO." :actionRoute="route('admin.infopublik.halaman.update')" :data="$kontenHalamans['infopub_persyaratan'][0] ?? null" />
    <x-admin.forms.daftar-harga :data="$kontenHalamans['infopub_daftar_harga'][0] ?? null" />
    <x-admin.subpage-form tabName="prosedur-slo" halamanKey="infopub_prosedur" title="Prosedur Pelayanan SLO" badgeColor="bg-sky-400" description="Kelola langkah-langkah tata cara penerbitan sertifikat SLO." :actionRoute="route('admin.infopublik.halaman.update')" :data="$kontenHalamans['infopub_prosedur'][0] ?? null" />
    <x-admin.subpage-form tabName="alur-sertifikasi" halamanKey="infopub_alur" title="Alur Sertifikasi" badgeColor="bg-sky-400" description="Kelola skema diagram dan tahapan proses komisioning." :actionRoute="route('admin.infopublik.halaman.update')" :data="$kontenHalamans['infopub_alur'][0] ?? null" />

    <!-- SUB-MENU CMS PANELS: KARIR -->
    <x-admin.subpage-form tabName="karir-konten" halamanKey="karir_header" title="Konten Halaman Karir" badgeColor="bg-teal-400" description="Kelola banner header dan pesan ajakan bergabung di PT Pradana Nusa Energi." :actionRoute="route('admin.karir.header.update')" :data="$kontenHalamans['karir_header'][0] ?? null" />
    <x-admin.lowongan-panel :lowongans="$lowongans" />

    <!-- SUB-MENU CMS PANELS: HUBUNGI KAMI -->
    <x-admin.forms.kontak-alamat :kontak="$kontakKami" />
    <x-admin.pesan-panel :pesanMasuks="$pesanMasuks" />

</div>



<!-- MODAL GENERIC ITEM (Statistik, Keunggulan, Energi, Mengapa, Teknologi) -->
<div id="genericModal" class="fixed inset-0 bg-slate-950/80 backdrop-blur-md z-50 hidden flex items-center justify-center p-4">
    <div class="bg-slate-900 border border-slate-800 rounded-2xl shadow-2xl max-w-md w-full p-6 space-y-4">
        <h3 id="genericModalTitle" class="text-lg font-bold text-white">Tambah Item</h3>
        <form id="genericForm" action="{{ route('admin.konten.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="bagian" id="genericSection" value="statistik">
            <input type="hidden" name="_method" id="genericMethod" value="POST">
            
            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1">Judul / Title</label>
                <input type="text" name="judul" id="genericTitle" required class="w-full text-sm bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-white focus:outline-none focus:border-orange-500">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1">Deskripsi / Keterangan</label>
                <textarea name="konten" id="genericContent" rows="3" class="w-full text-sm bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-white focus:outline-none focus:border-orange-500"></textarea>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1">Urutan Tampil</label>
                <input type="number" name="urutan" id="genericOrder" value="1" class="w-full text-sm bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-white">
            </div>
            
            <div class="flex justify-end gap-2 pt-3 border-t border-slate-800">
                <button type="button" onclick="closeGenericModal()" class="px-4 py-2 text-xs text-slate-400 hover:text-white rounded-lg">Batal</button>
                <button type="submit" class="px-4 py-2 text-xs bg-orange-500 hover:bg-orange-600 text-white rounded-xl font-bold shadow-lg shadow-orange-500/20">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL STATISTIK SPECIFIC -->
<div id="statModal" class="fixed inset-0 bg-slate-950/80 backdrop-blur-md z-50 hidden flex items-center justify-center p-4">
    <div class="bg-slate-900 border border-slate-800 rounded-2xl shadow-2xl max-w-md w-full p-6 space-y-4">
        <h3 id="statModalTitle" class="text-lg font-bold text-white">Tambah Statistik</h3>
        <form id="statForm" action="{{ route('admin.konten.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="bagian" value="statistik">
            <input type="hidden" name="_method" id="statMethod" value="POST">
            
            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1">Nilai Angka / Highlight (Contoh: 50-80%, ADVANCED)</label>
                <input type="text" name="nilai" id="statNilai" required class="w-full text-sm bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-white focus:outline-none focus:border-orange-500">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1">Judul / Sub-label (Contoh: SMARTER SMELTER)</label>
                <input type="text" name="judul" id="statJudul" required class="w-full text-sm bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-white focus:outline-none focus:border-orange-500">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1">Deskripsi Singkat</label>
                <textarea name="konten" id="statKonten" rows="3" class="w-full text-sm bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-white focus:outline-none focus:border-orange-500"></textarea>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1">Urutan Tampil</label>
                <input type="number" name="urutan" id="statUrutan" value="1" class="w-full text-sm bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-white">
            </div>
            
            <div class="flex justify-end gap-2 pt-3 border-t border-slate-800">
                <button type="button" onclick="closeStatModal()" class="px-4 py-2 text-xs text-slate-400 hover:text-white rounded-lg">Batal</button>
                <button type="submit" class="px-4 py-2 text-xs bg-orange-500 hover:bg-orange-600 text-white rounded-xl font-bold shadow-lg shadow-orange-500/20">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL GALERI -->
<div id="galeriModal" class="fixed inset-0 bg-slate-950/80 backdrop-blur-md z-50 hidden flex items-center justify-center p-4">
    <div class="bg-slate-900 border border-slate-800 rounded-2xl shadow-2xl max-w-md w-full p-6 space-y-4">
        <h3 id="galeriModalTitle" class="text-lg font-bold text-white">Upload Foto Galeri</h3>
        <form id="galeriForm" action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <input type="hidden" name="_method" id="galeriMethod" value="POST">

            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1">Pilih File Foto</label>
                <input type="file" name="gambar" id="galeriImage" accept="image/*" class="w-full text-xs text-slate-400 bg-slate-950 border border-slate-800 rounded-xl p-2.5">
                <p id="galeriImageHelp" class="text-xs text-orange-400 mt-1 hidden">Kosongkan jika tidak ingin mengubah gambar.</p>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1">Kategori</label>
                <select name="category" id="galeriCategory" class="w-full text-sm bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-white focus:outline-none focus:border-orange-500">
                    <option value="inspeksi-tr">Tegangan Rendah (TR)</option>
                    <option value="inspeksi-tm">Tegangan Menengah (TM)</option>
                    <option value="pembangkit">PLTS & Genset</option>
                    <option value="kegiatan">Acara / Internal</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1">Judul / Keterangan Foto</label>
                <input type="text" name="judul" id="galeriTitle" placeholder="Contoh: Inspeksi Genset Sub-station" class="w-full text-sm bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-white focus:outline-none focus:border-orange-500">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1">Urutan Tampil</label>
                <input type="number" name="urutan" id="galeriOrder" value="1" class="w-full text-sm bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-white">
            </div>

            <div class="flex justify-end gap-2 pt-3 border-t border-slate-800">
                <button type="button" onclick="closeGaleriModal()" class="px-4 py-2 text-xs text-slate-400 hover:text-white rounded-lg">Batal</button>
                <button type="submit" class="px-4 py-2 text-xs bg-orange-500 hover:bg-orange-600 text-white rounded-xl font-bold shadow-lg shadow-orange-500/20">Simpan Foto</button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL LOGO -->
<div id="logoModal" class="fixed inset-0 bg-slate-950/80 backdrop-blur-md z-50 hidden flex items-center justify-center p-4">
    <div class="bg-slate-900 border border-slate-800 rounded-2xl shadow-2xl max-w-md w-full p-6 space-y-4">
        <h3 id="logoModalTitle" class="text-lg font-bold text-white">Tambah Logo</h3>
        <form id="logoForm" action="{{ route('admin.logo.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <input type="hidden" name="_method" id="logoMethod" value="POST">

            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1">Nama Logo</label>
                <input type="text" name="nama" id="logoName" placeholder="Contoh: Logo Utama" class="w-full text-sm bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-white focus:outline-none focus:border-orange-500">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1">Upload File Logo</label>
                <input type="file" name="gambar" id="logoImage" accept="image/*" class="w-full text-xs text-slate-400 bg-slate-950 border border-slate-800 rounded-xl p-2.5">
                <p id="logoImageHelp" class="text-xs text-orange-400 mt-1 hidden">Kosongkan jika tidak ingin mengubah gambar.</p>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1">Logo URL (Opsional)</label>
                <input type="url" name="logo_url" id="logoUrl" placeholder="https://example.com/logo.png" class="w-full text-sm bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-white focus:outline-none focus:border-orange-500">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1">Urutan Tampil</label>
                <input type="number" name="urutan" id="logoOrder" value="1" class="w-full text-sm bg-slate-950 border border-slate-800 rounded-xl p-2.5 text-white">
            </div>

            <div>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="aktif" id="logoActive" checked class="w-4 h-4 rounded border-slate-700 bg-slate-950 text-orange-500 focus:ring-orange-500 focus:ring-offset-slate-900">
                    <span class="text-xs text-slate-300">Aktif</span>
                </label>
            </div>

            <div class="flex justify-end gap-2 pt-3 border-t border-slate-800">
                <button type="button" onclick="closeLogoModal()" class="px-4 py-2 text-xs text-slate-400 hover:text-white rounded-lg">Batal</button>
                <button type="submit" class="px-4 py-2 text-xs bg-orange-500 hover:bg-orange-600 text-white rounded-xl font-bold shadow-lg shadow-orange-500/20">Simpan Logo</button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<script>
    function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Modal Helpers for Generic Items (Teknologi, Keunggulan, Energi, Mengapa)
    function openGenericModal(section, title) {
        document.getElementById('genericModalTitle').innerText = title;
        document.getElementById('genericForm').action = "{{ route('admin.konten.store') }}";
        document.getElementById('genericMethod').value = 'POST';
        document.getElementById('genericSection').value = section;
        document.getElementById('genericTitle').value = '';
        document.getElementById('genericContent').value = '';
        document.getElementById('genericOrder').value = '1';
        document.getElementById('genericModal').classList.remove('hidden');
    }

    function editGenericModal(id, title, content, order) {
        document.getElementById('genericModalTitle').innerText = 'Edit Item';
        document.getElementById('genericForm').action = "/admin/konten/" + id;
        document.getElementById('genericMethod').value = 'PUT';
        document.getElementById('genericTitle').value = title;
        document.getElementById('genericContent').value = content;
        document.getElementById('genericOrder').value = order;
        document.getElementById('genericModal').classList.remove('hidden');
    }

    function closeGenericModal() {
        document.getElementById('genericModal').classList.add('hidden');
    }

    // Modal helpers for Statistik
    function openStatModal() {
        document.getElementById('statModalTitle').innerText = 'Tambah Statistik';
        document.getElementById('statForm').action = "{{ route('admin.konten.store') }}";
        document.getElementById('statMethod').value = 'POST';
        document.getElementById('statNilai').value = '';
        document.getElementById('statJudul').value = '';
        document.getElementById('statKonten').value = '';
        document.getElementById('statUrutan').value = '1';
        document.getElementById('statModal').classList.remove('hidden');
    }

    function editStatModal(id, value, title, content, order) {
        document.getElementById('statModalTitle').innerText = 'Edit Statistik';
        document.getElementById('statForm').action = "/admin/konten/" + id;
        document.getElementById('statMethod').value = 'PUT';
        document.getElementById('statNilai').value = value;
        document.getElementById('statJudul').value = title;
        document.getElementById('statKonten').value = content;
        document.getElementById('statUrutan').value = order;
        document.getElementById('statModal').classList.remove('hidden');
    }

    function closeStatModal() {
        document.getElementById('statModal').classList.add('hidden');
    }

    // Modal Galeri
    function openGaleriModal() {
        document.getElementById('galeriModalTitle').innerText = 'Upload Foto Galeri';
        document.getElementById('galeriForm').action = "{{ route('admin.galeri.store') }}";
        document.getElementById('galeriMethod').value = 'POST';
        document.getElementById('galeriImage').required = true;
        document.getElementById('galeriImageHelp').classList.add('hidden');

        document.getElementById('galeriCategory').value = 'inspeksi-tr';
        document.getElementById('galeriTitle').value = '';
        document.getElementById('galeriOrder').value = '1';

        document.getElementById('galeriModal').classList.remove('hidden');
    }
    
    function editGaleriModal(id, title, category, order) {
        document.getElementById('galeriModalTitle').innerText = 'Edit Foto Galeri';
        document.getElementById('galeriForm').action = "/admin/galeri/" + id;
        document.getElementById('galeriMethod').value = 'PUT';
        document.getElementById('galeriImage').required = false;
        document.getElementById('galeriImageHelp').classList.remove('hidden');

        document.getElementById('galeriTitle').value = title;
        document.getElementById('galeriCategory').value = category || 'inspeksi-tr';
        document.getElementById('galeriOrder').value = order;

        document.getElementById('galeriModal').classList.remove('hidden');
    }

    function closeGaleriModal() {
        document.getElementById('galeriModal').classList.add('hidden');
    }

    // Modal Logo
    function openLogoModal() {
        document.getElementById('logoModalTitle').innerText = 'Tambah Logo';
        document.getElementById('logoForm').action = "{{ route('admin.logo.store') }}";
        document.getElementById('logoMethod').value = 'POST';
        document.getElementById('logoImage').required = true;
        document.getElementById('logoImageHelp').classList.add('hidden');

        document.getElementById('logoName').value = '';
        document.getElementById('logoUrl').value = '';
        document.getElementById('logoOrder').value = '1';
        document.getElementById('logoActive').checked = true;

        document.getElementById('logoModal').classList.remove('hidden');
    }

    function editLogoModal(id, name, logoUrl, order, active) {
        document.getElementById('logoModalTitle').innerText = 'Edit Logo';
        document.getElementById('logoForm').action = "/admin/logo/" + id;
        document.getElementById('logoMethod').value = 'PUT';
        document.getElementById('logoImage').required = false;
        document.getElementById('logoImageHelp').classList.remove('hidden');

        document.getElementById('logoName').value = name;
        document.getElementById('logoUrl').value = logoUrl;
        document.getElementById('logoOrder').value = order;
        document.getElementById('logoActive').checked = active;

        document.getElementById('logoModal').classList.remove('hidden');
    }

    function closeLogoModal() {
        document.getElementById('logoModal').classList.add('hidden');
    }
</script>
@endsection
