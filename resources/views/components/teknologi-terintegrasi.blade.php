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
                return '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-2.25A2.25 2.25 0 0111.25 16.5h1.5a2.25 2.25 0 012.25 2.25V21"></path></svg>';
            }

            if (str_contains($title, 'komitmen') || str_contains($title, 'kualitas') || str_contains($title, 'standar') || $iconKey === 'shield') {
                return '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z"></path></svg>';
            }

            return '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z"></path></svg>';
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
                {{ strip_tags($headerJudul) }}
            </h2>
            <div class="w-24 h-1 bg-blue-600 mx-auto mt-6 rounded-full"></div>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($itemList as $index => $item)
                <div class="tech-card-item rounded-[2rem] p-10 shadow-md" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <div class="tech-icon-wrapper w-16 h-16 rounded-2xl flex items-center justify-center mb-8">
                        {!! renderTechCardIconHelper($item) !!}
                    </div>
                    <h3 class="tech-card-title text-xl font-bold mb-4">{{ strip_tags($item->judul) }}</h3>
                    <p class="tech-card-desc leading-relaxed font-light text-sm md:text-base">{{ strip_tags($item->konten) }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
