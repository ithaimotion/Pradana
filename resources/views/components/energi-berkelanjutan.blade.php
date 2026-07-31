@props(['header' => null, 'items' => null, 'clients' => null])

@php
    $headerJudul = $header->judul ?? 'DAFTAR KLIEN';
    $clientList = $clients instanceof \Illuminate\Support\Collection ? $clients : collect($clients);
    $visibleClients = $clientList->take(10);
    $carouselId = uniqid('client-carousel-');
@endphp

<section id="sustainability" class="py-24 bg-slate-50 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16 reveal-on-scroll">
            <span class="text-blue-600 font-bold tracking-wider uppercase text-sm mb-4 block">Mitra Kepercayaan</span>
            <h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 leading-tight">
                {{ $headerJudul }}
            </h2>
            <div class="w-16 h-1 bg-blue-600 mx-auto mt-6 rounded-full"></div>
        </div>

        @if($visibleClients->count() > 0)
            <div class="mx-auto max-w-7xl">
                <div id="{{ $carouselId }}" class="relative overflow-hidden rounded-[2.5rem] bg-white p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100">
                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5" data-client-track>
                        @foreach($visibleClients as $index => $client)
                            <div class="rounded-2xl border border-slate-100 bg-white p-4 shadow-sm hover:shadow-md transition-all duration-500 ease-in-out group hover:-translate-y-1" data-client-card>
                                <div class="flex h-full flex-col justify-center rounded-xl bg-slate-50 p-4 transition-colors group-hover:bg-blue-50/50">
                                    <img src="{{ $client->url_gambar ?? $client->path_gambar }}" alt="{{ $client->judul ?? 'Client' }}" class="h-[120px] w-full object-contain filter grayscale opacity-70 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-500">
                                    @if(!empty($client->judul))
                                        <p class="mt-4 text-center text-xs font-bold uppercase tracking-widest text-slate-500 group-hover:text-blue-700 transition-colors">{{ $client->judul }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const root = document.getElementById('{{ $carouselId }}');
                    if (!root) return;

                    const cards = Array.from(root.querySelectorAll('[data-client-card]'));
                    if (cards.length <= 1) return;

                    const total = cards.length;
                    let offset = 0;

                    const render = () => {
                        cards.forEach((card, index) => {
                            const position = (index - offset + total) % total;
                            card.style.transition = 'all 700ms ease-in-out';

                            if (position < 5) {
                                card.style.opacity = '1';
                                card.style.transform = 'translateY(0) scale(1)';
                                card.style.display = 'block';
                            } else {
                                card.style.opacity = '0';
                                card.style.transform = 'translateY(20px) scale(0.95)';
                                setTimeout(() => {
                                    if(card.style.opacity === '0') card.style.display = 'none';
                                }, 700);
                            }
                        });
                    };

                    render();
                    setInterval(() => {
                        offset = (offset + 1) % total;
                        render();
                    }, 3000);
                });
            </script>
        @else
            <div class="rounded-3xl border-2 border-dashed border-slate-200 bg-white p-12 text-center text-slate-500 font-medium">
                Belum ada foto klien yang diupload.
            </div>
        @endif
    </div>
</section>
