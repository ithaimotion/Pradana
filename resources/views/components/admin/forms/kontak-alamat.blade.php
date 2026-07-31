@props(['kontak'])

@php
    $title = $kontak->judul ?? 'HUBUNGI KAMI';
    $subtitle = $kontak->subjudul ?? 'Bermitra dengan Pradana Nusa Energi untuk memastikan keselamatan dan keandalan instalasi ketenagalistrikan Anda.';
    $cta = $kontak->konten ?? 'Hubungi Kami';
    $image = optional($kontak)->url_gambar ?? 'https://images.unsplash.com/photo-1565793298595-6a879b1d9492?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80';
@endphp

<div x-show="activeTab === 'kontak'" class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border border-slate-200 dark:border-slate-800 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl" x-cloak>
    <div class="border-b border-slate-200 dark:border-slate-800 pb-4">
        <h2 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
            <span class="w-3 h-3 rounded-full bg-pink-500"></span> Pengaturan Banner Kontak & CTA
        </h2>
        <p class="text-xs text-slate-600 dark:text-slate-400 mt-1">Atur headline, deskripsi, tombol ajakan, dan background banner agar tampilannya selaras dengan landing page.</p>
    </div>

    <div class="grid xl:grid-cols-[1.1fr_0.9fr] gap-6">
        <form action="{{ route('admin.kontak.header') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div class="rounded-2xl border border-slate-200 dark:border-slate-800 bg-slate-950/70 p-4 space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-2">Judul Banner</label>
                    <input type="text" name="judul" value="{{ old('judul', $title) }}" required class="w-full bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-pink-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-2">Deskripsi Singkat</label>
                    <textarea name="subjudul" rows="3" class="w-full bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-pink-500">{{ old('subjudul', $subtitle) }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-2">Teks Tombol CTA</label>
                    <input type="text" name="konten" value="{{ old('konten', $cta) }}" placeholder="Hubungi Kami" class="w-full bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-pink-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-2">Background Banner</label>
                    <div class="border-2 border-dashed border-slate-200 dark:border-slate-800 rounded-xl p-4 text-center hover:border-pink-500/50 transition">
                        <input type="file" name="gambar" accept="image/*" class="w-full text-xs text-slate-600 dark:text-slate-400 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-2.5">
                        <p class="text-[11px] text-slate-500 mt-2">Format gambar: PNG, JPG, WEBP (maks. 5MB)</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-end pt-2">
                <button type="submit" class="bg-gradient-to-r from-pink-500 to-rose-600 hover:from-pink-600 hover:to-rose-700 text-white px-6 py-3 rounded-xl font-bold text-sm shadow-lg shadow-pink-500/20 transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Simpan Banner Kontak
                </button>
            </div>
        </form>

        <div class="space-y-4">
            <div class="relative overflow-hidden rounded-3xl border border-slate-300 dark:border-slate-700 bg-blue-900 min-h-[280px] shadow-lg">
                <img src="{{ $image }}" alt="Preview Banner Kontak" class="absolute inset-0 h-full w-full object-cover opacity-20">
                <div class="absolute inset-0 bg-gradient-to-br from-slate-950/50 via-slate-900/20 to-blue-950/40"></div>
                <div class="relative z-10 flex h-full flex-col items-center justify-center px-6 py-8 text-center">
                    <h3 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white mb-4">{{ $title }}</h3>
                    <p class="text-sm md:text-base text-white/90 max-w-xl mb-6 leading-relaxed">{{ $subtitle }}</p>
                    <a href="#contact" class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-blue-700 shadow-lg shadow-blue-600/20">{{ $cta }}</a>
                </div>
            </div>

            @if(optional($kontak)->url_gambar)
                <div class="rounded-2xl border border-slate-200 dark:border-slate-800 bg-slate-950/70 p-4 text-xs text-slate-600 dark:text-slate-400">
                    <p class="font-semibold text-slate-700 dark:text-slate-300 mb-1">Gambar saat ini</p>
                    <p>Preview akan menampilkan background yang sama seperti landing page publik.</p>
                </div>
            @endif
        </div>
    </div>
</div>

