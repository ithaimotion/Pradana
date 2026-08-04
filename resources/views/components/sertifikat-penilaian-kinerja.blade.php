@props(['sertifikat' => null])

@php
    $items = collect($sertifikat ?? [])->filter(fn ($item) => $item !== null)->values();
@endphp

<section class="py-20 bg-gradient-to-br from-slate-50 via-blue-50 to-slate-100 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">SERTIFIKAT PENILAIAN KINERJA</h2>
            <p class="text-slate-600 max-w-2xl mx-auto">Dokumen resmi penilaian kinerja yang menunjukkan kompetensi, kredibilitas, dan kualitas layanan inspeksi kami.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($items as $item)
                @php
                    $imageUrl = $item->url_gambar ?? $item->path_gambar ?? null;
                @endphp
                <button type="button" onclick="openCertificateModal('{{ $imageUrl ?? '' }}', '{{ addslashes($item->judul) }}')" class="group text-left rounded-[28px] border border-slate-200 bg-white p-3 shadow-[0_18px_45px_-20px_rgba(15,23,42,0.35)] transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_28px_60px_-22px_rgba(15,23,42,0.45)]">
                    <div class="aspect-[16/9] overflow-hidden rounded-[20px] bg-slate-100">
                        @if($imageUrl)
                            <img src="{{ $imageUrl }}" alt="{{ $item->judul }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        @else
                            <div class="flex h-full w-full items-center justify-center text-sm text-slate-500">Foto Sertifikat</div>
                        @endif
                    </div>
                    <div class="px-2 pb-2 pt-4">
                        <h3 class="text-lg font-semibold uppercase tracking-wide text-slate-900">{{ $item->judul }}</h3>
                        @if(!empty($item->konten))
                            <p class="mt-2 text-sm leading-6 text-slate-600">{{ $item->konten }}</p>
                        @endif
                    </div>
                </button>
            @endforeach
        </div>
    </div>

    <div id="certificateModal" class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/70 px-4 py-6 opacity-0 invisible pointer-events-none transition-all duration-300">
        <div id="certificateModalContent" class="relative w-full max-w-4xl rounded-[32px] bg-white p-3 shadow-2xl transition-all duration-300 scale-95 opacity-0">
            <button type="button" onclick="closeCertificateModal()" class="absolute right-3 top-3 z-10 rounded-full bg-white/90 p-2 text-slate-900 shadow-sm transition hover:bg-slate-100">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            <img id="certificateModalImage" src="" alt="Preview sertifikat" class="max-h-[80vh] w-full rounded-[24px] object-contain bg-slate-100">
            <div class="px-2 pb-2 pt-3 text-center">
                <h3 id="certificateModalTitle" class="text-lg font-semibold text-slate-800"></h3>
            </div>
        </div>
    </div>
</section>

<script>
    function openCertificateModal(imageUrl, title) {
        const modal = document.getElementById('certificateModal');
        const content = document.getElementById('certificateModalContent');
        const image = document.getElementById('certificateModalImage');
        const titleEl = document.getElementById('certificateModalTitle');

        if (!imageUrl) {
            return;
        }

        image.src = imageUrl;
        titleEl.textContent = title;
        modal.classList.remove('opacity-0', 'invisible', 'pointer-events-none');
        modal.classList.add('opacity-100', 'visible', 'pointer-events-auto');
        content.classList.remove('opacity-0', 'scale-95');
        content.classList.add('opacity-100', 'scale-100');
    }

    function closeCertificateModal() {
        const modal = document.getElementById('certificateModal');
        const content = document.getElementById('certificateModalContent');
        modal.classList.add('opacity-0', 'invisible', 'pointer-events-none');
        modal.classList.remove('opacity-100', 'visible', 'pointer-events-auto');
        content.classList.add('opacity-0', 'scale-95');
        content.classList.remove('opacity-100', 'scale-100');
    }
</script>
