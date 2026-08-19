@extends('layouts.app')

@section('title', 'Galeri - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Header -->
    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-blue-600/20 text-blue-500 border border-blue-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md">
                Dokumentasi Kegiatan
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">
                GALERI
            </h1>
            <p class="text-white/90 max-w-3xl mx-auto text-lg md:text-xl leading-relaxed mb-8">
               Kumpulan dokumentasi kegiatan inspeksi teknis, pengujian instalasi, dan acara resmi PT Pradana Nusa Energi di berbagai proyek.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-slate-50 overflow-hidden min-h-screen">
        <div class="max-w-7xl mx-auto px-6">
            
            <!-- Filters -->
            <div class="flex flex-wrap justify-center gap-3 mb-12 reveal-on-scroll">
                <button onclick="filterGallery('all')" class="gallery-filter-btn active-filter px-6 py-2 rounded-full text-sm font-bold border transition-all">Semua</button>
                @php
                    $uniqueCategories = collect($galeri)->pluck('badge_kategori')->filter()->unique()->values();
                @endphp
                @foreach($uniqueCategories as $kat)
                    <button onclick="filterGallery('{{ Str::slug($kat) }}')" class="gallery-filter-btn px-6 py-2 rounded-full text-sm font-bold border border-slate-200 text-slate-600 hover:border-blue-900 hover:text-blue-900 transition-all">{{ $kat }}</button>
                @endforeach
            </div>

            <!-- Gallery Grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6" id="gallery-grid">
                
                @forelse($galeri as $index => $item)
                    @php
                        $delay = ($index % 3) * 100;
                        $label = $item->badge_kategori ?? 'Umum';
                        $categorySlug = Str::slug($label);
                        $badgeColor = 'bg-blue-500';
                    @endphp
                    <!-- Item -->
                    <div class="gallery-item group relative overflow-hidden rounded-2xl shadow-md hover:shadow-2xl hover:shadow-blue-900/30 transition-all duration-300 cursor-pointer reveal-on-scroll {{ $delay > 0 ? 'delay-'.$delay : '' }}" data-category="{{ $categorySlug }}" onclick="openLightbox(this)">
                        <!-- Image -->
                        <div class="relative overflow-hidden h-60">
                            <img src="{{ optional($item)->url_gambar ?? 'https://placehold.co/600x400/e2e8f0/475569?text=Gallery' }}" alt="{{ $item->judul }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <!-- Hover blue overlay on image -->
                            <div class="absolute inset-0 bg-[#1e3a5f]/70 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <!-- Title bar — default: white bg + dark blue text -->
                        <div class="bg-white group-hover:bg-[#1e3a5f] transition-colors duration-300 px-4 py-3 flex items-center gap-3">
                            <span class="{{ $badgeColor }} text-white text-[10px] font-bold px-2 py-0.5 rounded shrink-0">{{ $label }}</span>
                            <h3 class="font-bold text-sm leading-snug transition-colors duration-300" style="color: #1e3a5f;" onmouseenter="this.style.color='white'" onmouseleave="this.style.color='#1e3a5f'">{{ $item->judul }}</h3>
                        </div>
                    </div>
                @empty
                    <!-- Empty State -->
                    <div id="gallery-empty-db" class="col-span-full text-center py-20">
                        <div class="w-16 h-16 mx-auto mb-4 text-slate-700 dark:text-slate-300">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="font-bold text-slate-700 text-lg">Belum ada foto</h3>
                        <p class="text-sm text-slate-500">Koleksi galeri saat ini masih kosong.</p>
                    </div>
                @endforelse
                
                <!-- JS Filter Empty State -->
                <div id="gallery-empty" class="col-span-full hidden text-center py-20">
                    <div class="w-16 h-16 mx-auto mb-4 text-slate-700 dark:text-slate-300">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <h3 class="font-bold text-slate-700 text-lg">Tidak ada kecocokan</h3>
                    <p class="text-sm text-slate-500">Tidak ada dokumentasi untuk kategori ini saat ini.</p>
                </div>

            </div>

        </div>
    </section>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="fixed inset-0 z-[100] bg-slate-900/95 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300 flex items-center justify-center p-4">
        <!-- Close button -->
        <button onclick="closeLightbox()" class="absolute top-6 right-6 w-12 h-12 bg-slate-100 dark:bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center text-slate-900 dark:text-white transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
        
        <div class="max-w-5xl w-full flex flex-col items-center">
            <img id="lightbox-img" src="" alt="Gallery Image" class="max-h-[75vh] w-auto rounded-xl shadow-2xl mb-6">
            <div class="text-center max-w-2xl">
                <span id="lightbox-tag" class="bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full mb-3 inline-block"></span>
                <h3 id="lightbox-title" class="text-slate-900 dark:text-white font-extrabold text-2xl mb-2"></h3>
                <p id="lightbox-desc" class="text-slate-600 dark:text-slate-400 text-sm"></p>
            </div>
        </div>
    </div>

    <x-footer />

    <style>
        .active-filter {
            background-color: #1e3a5f;
            color: #fff;
            border-color: #1e3a5f;
        }
    </style>

    <script>
        function filterGallery(category) {
            // Update buttons
            const btns = document.querySelectorAll('.gallery-filter-btn');
            btns.forEach(btn => {
                btn.classList.remove('active-filter');
                btn.classList.add('border-slate-200', 'text-slate-600');
            });
            event.target.classList.add('active-filter');
            event.target.classList.remove('border-slate-200', 'text-slate-600');

            // Filter items
            const items = document.querySelectorAll('.gallery-item');
            let visibleCount = 0;
            
            items.forEach(item => {
                if (category === 'all' || item.dataset.category === category) {
                    item.style.display = 'block';
                    // Trigger reflow for animation if needed
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    }, 10);
                    visibleCount++;
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        item.style.display = 'none';
                    }, 300);
                }
            });

            const emptyState = document.getElementById('gallery-empty');
            if (visibleCount === 0) {
                setTimeout(() => {
                    emptyState.classList.remove('hidden');
                }, 300);
            } else {
                emptyState.classList.add('hidden');
            }
        }

        // Lightbox logic
        const lightbox = document.getElementById('lightbox');
        const lbImg = document.getElementById('lightbox-img');
        const lbTitle = document.getElementById('lightbox-title');
        const lbDesc = document.getElementById('lightbox-desc');
        const lbTag = document.getElementById('lightbox-tag');

        function openLightbox(el) {
            const img = el.querySelector('img');
            const title = el.querySelector('h3');
            const tag = el.querySelector('span');

            lbImg.src = img.src;
            lbTitle.textContent = title.textContent;
            lbDesc.textContent = '';
            lbTag.textContent = tag.textContent;

            // Set tag color based on original
            lbTag.className = tag.className;

            lightbox.classList.remove('opacity-0', 'pointer-events-none');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            lightbox.classList.add('opacity-0', 'pointer-events-none');
            document.body.style.overflow = 'auto';
            // Clear src after fade out
            setTimeout(() => {
                lbImg.src = '';
            }, 300);
        }

        // Close on backdrop click or ESC
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) closeLightbox();
        });
        
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !lightbox.classList.contains('pointer-events-none')) {
                closeLightbox();
            }
        });
    </script>
@endsection

