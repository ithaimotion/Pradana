@props(['sertifikat' => null])

@php
    $items = collect($sertifikat ?? [])->filter(fn ($item) => $item !== null)->values();
@endphp

<section class="py-20 bg-blue-600 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-4">SERTIFIKAT PENILAIAN KINERJA</h2>
            <p class="text-white/80 max-w-2xl mx-auto">Dokumen resmi penilaian kinerja yang menunjukkan kompetensi, kredibilitas, dan kualitas layanan inspeksi kami.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($items as $index => $item)
                @php
                    $imageUrl = $item->url_gambar ?? $item->path_gambar ?? null;
                @endphp
                <button type="button" onclick="openCertificateModal('{{ $imageUrl ?? '' }}', '{{ addslashes($item->judul) }}')" class="group text-left bg-slate-100 dark:bg-white/10 backdrop-blur-sm rounded-2xl overflow-hidden border border-white/20 shadow-lg hover:-translate-y-1 transition duration-300">
                    @if($imageUrl)
                        <img src="{{ $imageUrl }}" alt="{{ $item->judul }}" class="w-full h-56 object-cover group-hover:scale-105 transition duration-300">
                    @else
                        <div class="w-full h-56 bg-white/20 flex items-center justify-center text-white/70 text-sm">Foto Sertifikat</div>
                    @endif
                    <div class="p-5">
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white uppercase">{{ $item->judul }}</h3>
                        @if(!empty($item->konten))
                            <p class="text-sm text-white/80 mt-2">{{ $item->konten }}</p>
                        @endif
                    </div>
                </button>
            @endforeach
        </div>
    </div>

    <div id="certificateModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-50/80 dark:bg-slate-950/80 px-4 py-6">
        <div class="relative w-full max-w-4xl rounded-3xl bg-white p-3 shadow-2xl">
            <button type="button" onclick="closeCertificateModal()" class="absolute right-3 top-3 z-10 rounded-full bg-white/80 dark:bg-slate-900/80 p-2 text-slate-900 dark:text-white hover:bg-slate-700">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            <img id="certificateModalImage" src="" alt="Preview sertifikat" class="max-h-[80vh] w-full rounded-2xl object-contain bg-slate-100">
            <div class="px-2 pb-2 pt-3 text-center">
                <h3 id="certificateModalTitle" class="text-lg font-semibold text-slate-800"></h3>
            </div>
        </div>
    </div>
</section>

<script>
    function openCertificateModal(imageUrl, title) {
        const modal = document.getElementById('certificateModal');
        const image = document.getElementById('certificateModalImage');
        const titleEl = document.getElementById('certificateModalTitle');

        if (!imageUrl) {
            return;
        }

        image.src = imageUrl;
        titleEl.textContent = title;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeCertificateModal() {
        const modal = document.getElementById('certificateModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>
