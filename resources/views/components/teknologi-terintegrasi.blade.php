@props(['header' => null, 'items' => null])

@php
    $headerJudul = $header->judul ?? 'Informasi Perusahaan';
    $defaultTechItems = collect([
        (object)[
            'judul' => 'Latar Belakang Perusahaan',
            'konten' => 'PT. PRADANA NUSA ENERGI didirikan di latar belakangi UU no. 30 tahun 2009 tentang ketenagalistrikan. Dimana setiap instalasi yang beroperasi wajib memiliki Sertifikat Laik Operasi.',
            'ikon' => 'building'
        ],
        (object)[
            'judul' => 'Usaha',
            'konten' => 'PT. PRADANA NUSA ENERGI bergerak di bidang Pemeriksaan dan Pengujian Instalasi Pemanfaatan Tenaga Listrik (IPTL), Genset (PLTD), Surya (PLTS) dan Distribusi TM, sebagai syarat untuk penerbitan Sertifikat Laik Operasi.',
            'ikon' => 'performance'
        ],
        (object)[
            'judul' => 'Komitmen Perusahaan',
            'konten' => 'PT. PRADANA NUSA ENERGI dalam melaksanakan Pemeriksaan dan Pengujian Instalasi Pemanfaatan Tenaga Listrik (IPTL), Genset (PLTD), Surya (PLTS) dan Distribusi TM, memiliki tenaga teknik dan peralatan pengujian memenuhi standar yang di tentukan pihak terkait.',
            'ikon' => 'shield'
        ],
    ]);

    $itemList = ($items && count($items) > 0) ? $items->take(3) : $defaultTechItems;

    if (!function_exists('renderTechCardIconHelper')) {
        function renderTechCardIconHelper($item) {
            $title = strtolower($item->judul ?? '');
            $iconKey = strtolower($item->ikon ?? '');

            if (str_contains($title, 'latar') || str_contains($title, 'sejarah') || $iconKey === 'building') {
                return '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m0 0v-5a2 2 0 012-2h2a2 2 0 012 2v5m-4 0h4"></path></svg>';
            }

            if (str_contains($title, 'komitmen') || str_contains($title, 'kualitas') || str_contains($title, 'standar') || $iconKey === 'shield') {
                return '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>';
            }

            return '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>';
        }
    }
@endphp

<style>
    .tech-card-item {
        background-color: #ffffff;
        border: 2px solid #e2e8f0;
        transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .tech-card-item:hover {
        background-color: #0f172a !important; /* Dark Slate / Blue */
        border-color: #0f172a !important;
        transform: translateY(-8px);
        box-shadow: 0 20px 40px -15px rgba(15, 23, 42, 0.35);
    }
    .tech-card-item .tech-card-title {
        color: #0f172a;
        transition: color 0.35s ease;
    }
    .tech-card-item:hover .tech-card-title {
        color: #ffffff !important;
    }
    .tech-card-item .tech-card-desc {
        color: #475569;
        transition: color 0.35s ease;
    }
    .tech-card-item:hover .tech-card-desc {
        color: #cbd5e1 !important;
    }
    .tech-card-item .tech-icon-wrapper {
        background-color: #eff6ff;
        border: 1px solid #dbeafe;
        color: #2563eb;
        transition: all 0.35s ease;
    }
    .tech-card-item:hover .tech-icon-wrapper {
        background-color: rgba(255, 255, 255, 0.15) !important;
        border-color: rgba(255, 255, 255, 0.3) !important;
        color: #ffffff !important;
        transform: scale(1.1);
    }
</style>

<section id="technology" class="py-24 bg-slate-50/70 overflow-hidden relative">
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-20" data-aos="fade-up">
            <span class="text-blue-600 font-bold tracking-wider uppercase text-sm mb-4 block">Teknologi Kami</span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 leading-tight">
                {{ $headerJudul }}
            </h2>
            <div class="w-24 h-1 bg-blue-600 mx-auto mt-6 rounded-full"></div>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($itemList as $index => $item)
                <div class="tech-card-item rounded-[2rem] p-10 shadow-md" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <div class="tech-icon-wrapper w-16 h-16 rounded-2xl flex items-center justify-center mb-8">
                        {!! renderTechCardIconHelper($item) !!}
                    </div>
                    <h3 class="tech-card-title text-xl font-bold mb-4">{{ $item->judul }}</h3>
                    <p class="tech-card-desc leading-relaxed font-light text-sm md:text-base">{{ $item->konten }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
