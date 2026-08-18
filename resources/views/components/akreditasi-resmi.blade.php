@props(['akreditasi' => null])

@php
    $items = collect($akreditasi ?? [])->filter(fn ($item) => $item !== null)->values();
@endphp

<section class="py-20 bg-gradient-to-br from-slate-50 via-blue-50 to-slate-100 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">TELAH RESMI TERAKREDITASI</h2>
            <p class="text-slate-600 max-w-2xl mx-auto">Kami telah mendapatkan akreditasi resmi sebagai Lembaga Inspeksi Teknik yang kompeten dan terpercaya.</p>
        </div>

        @if($items->count() > 0)
        <div class="grid grid-cols-1 gap-8 max-w-md mx-auto">
            @foreach($items->take(1) as $item)
                @php
                    $imageUrl = $item->url_gambar ?? $item->path_gambar ?? null;
                @endphp
                <button type="button"
                    onclick="openAkreditasiModal('{{ $imageUrl ?? '' }}', '{{ addslashes($item->judul) }}')"
                    class="group text-left w-full rounded-[28px] border border-slate-200 bg-white p-3 shadow-[0_18px_45px_-20px_rgba(15,23,42,0.35)] transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_28px_60px_-22px_rgba(15,23,42,0.45)]"
                    data-aos="fade-up" data-aos-delay="{{ 100 + ($loop->index * 100) }}">
                    <div class="aspect-[16/9] overflow-hidden rounded-[20px] bg-slate-100">
                        @if($imageUrl)
                            <img src="{{ $imageUrl }}" alt="{{ $item->judul }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        @else
                            <div class="flex h-full w-full items-center justify-center text-sm text-slate-500">Foto Sertifikat</div>
                        @endif
                    </div>
                    <div class="px-2 pb-2 pt-4">
                        <div class="flex items-center gap-1.5 mb-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-500 inline-block"></span>
                            <span class="text-[10px] font-semibold uppercase tracking-widest text-blue-500">Akreditasi Resmi</span>
                        </div>
                        <h3 class="text-lg font-semibold uppercase tracking-wide text-slate-900">{{ $item->judul }}</h3>
                    </div>
                </button>
            @endforeach
        </div>
        @else
        <div class="text-center py-16 text-slate-400 text-sm">Belum ada data akreditasi.</div>
        @endif
    </div>

    <div id="akreditasiModal" class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/70 px-4 py-6 opacity-0 invisible pointer-events-none transition-all duration-300">
        <div id="akreditasiModalContent" class="relative w-full max-w-4xl rounded-[32px] bg-white p-3 shadow-2xl transition-all duration-300 scale-95 opacity-0">
            <button type="button" onclick="closeAkreditasiModal()" class="absolute right-3 top-3 z-10 rounded-full bg-white/90 p-2 text-slate-900 shadow-sm transition hover:bg-slate-100">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <img id="akreditasiModalImage" src="" alt="Preview akreditasi" class="max-h-[80vh] w-full rounded-[24px] object-contain bg-slate-100">
            <div class="px-2 pb-2 pt-3 text-center">
                <h3 id="akreditasiModalTitle" class="text-lg font-semibold text-slate-800"></h3>
            </div>
        </div>
    </div>
</section>

<script>
    function openAkreditasiModal(imageUrl, title) {
        if (!imageUrl) return;
        document.getElementById('akreditasiModalImage').src = imageUrl;
        document.getElementById('akreditasiModalTitle').textContent = title;
        const modal = document.getElementById('akreditasiModal');
        const content = document.getElementById('akreditasiModalContent');
        modal.classList.remove('opacity-0', 'invisible', 'pointer-events-none');
        modal.classList.add('opacity-100', 'visible', 'pointer-events-auto');
        content.classList.remove('opacity-0', 'scale-95');
        content.classList.add('opacity-100', 'scale-100');
    }
    function closeAkreditasiModal() {
        const modal = document.getElementById('akreditasiModal');
        const content = document.getElementById('akreditasiModalContent');
        modal.classList.add('opacity-0', 'invisible', 'pointer-events-none');
        modal.classList.remove('opacity-100', 'visible', 'pointer-events-auto');
        content.classList.add('opacity-0', 'scale-95');
        content.classList.remove('opacity-100', 'scale-100');
    }
</script>
