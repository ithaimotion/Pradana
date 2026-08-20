@props(['header' => null, 'items' => null, 'clients' => null])

@php
    $headerJudul = strip_tags($header->judul ?? 'DAFTAR KLIEN');
    $clientList = $clients instanceof \Illuminate\Support\Collection ? $clients : collect($clients);
    $visibleClients = $clientList->filter(fn($c) => !empty($c->url_gambar ?? $c->path_gambar))->values();

    // Split into 2 rows
    $half = (int) ceil($visibleClients->count() / 2);
    $row1 = $visibleClients->slice(0, $half)->values();
    $row2 = $visibleClients->slice($half)->values();
    // If row2 is empty (only 1 item), duplicate row1
    if ($row2->isEmpty()) $row2 = $row1;
@endphp

<section id="sustainability" class="py-24 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <span class="text-blue-600 font-bold tracking-wider uppercase text-sm mb-4 block">Mitra Kepercayaan</span>
            <h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 leading-tight">
                {{ $headerJudul }}
            </h2>
            <div class="w-16 h-1 bg-blue-600 mx-auto mt-6 rounded-full"></div>
        </div>
    </div>

    @if($visibleClients->count() > 0)
        <div class="relative w-full select-none space-y-4" data-aos="fade-up" data-aos-delay="200">
            {{-- Fade edges --}}
            <div class="pointer-events-none absolute left-0 top-0 z-10 h-full w-28 bg-gradient-to-r from-white to-transparent"></div>
            <div class="pointer-events-none absolute right-0 top-0 z-10 h-full w-28 bg-gradient-to-l from-white to-transparent"></div>

            {{-- ROW 1 — scroll left --}}
            <div class="flex overflow-hidden">
                @foreach([1, 2] as $_)
                    <div class="ticker-row-1 flex shrink-0 items-center">
                        @foreach($row1 as $client)
                            <div class="logo-card">
                                <img src="{{ $client->url_gambar ?? $client->path_gambar }}"
                                     alt="{{ $client->judul ?? 'Client' }}"
                                     class="h-16 md:h-20 w-auto max-w-full object-contain">
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>

            {{-- ROW 2 — scroll left, slightly different speed --}}
            <div class="flex overflow-hidden">
                @foreach([1, 2] as $_)
                    <div class="ticker-row-2 flex shrink-0 items-center">
                        @foreach($row2 as $client)
                            <div class="logo-card">
                                <img src="{{ $client->url_gambar ?? $client->path_gambar }}"
                                     alt="{{ $client->judul ?? 'Client' }}"
                                     class="h-16 md:h-20 w-auto max-w-full object-contain">
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="mx-auto max-w-7xl px-6">
            <div class="rounded-3xl border-2 border-dashed border-slate-200 bg-slate-50 p-12 text-center text-slate-400 text-sm font-medium">
                Belum ada foto klien yang diupload.
            </div>
        </div>
    @endif
</section>

<style>
    /* Each card has RIGHT margin — this makes the gap consistent
       even at the seam where track 1 meets track 2 */
    .logo-card {
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100px;
        width: 220px;
        margin-right: 24px;
        border-radius: 16px;
        border: 1.5px solid #e2e8f0;
        background: #ffffff;
        box-shadow: 0 1px 4px 0 rgba(15, 23, 42, 0.06);
        padding: 0 24px;
    }

    .ticker-row-1 {
        animation: ticker-left 14s linear infinite;
    }
    .ticker-row-2 {
        animation: ticker-left 18s linear infinite;
    }

    @keyframes ticker-left {
        0%   { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
</style>
