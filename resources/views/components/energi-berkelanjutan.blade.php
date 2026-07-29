@props(['header' => null, 'items' => null, 'clients' => null])

@php
    $headerJudul = $header->judul ?? 'DAFTAR KLIEN';
    $clientList = $clients instanceof \Illuminate\Support\Collection ? $clients : collect($clients);
    $visibleClients = $clientList->take(10);
    $carouselId = uniqid('client-carousel-');
@endphp

<section id="sustainability" class="py-20 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 text-center mb-10 reveal-on-scroll">
            {{ $headerJudul }}
        </h2>

        @if($visibleClients->count() > 0)
            <div class="mx-auto max-w-7xl">
                <div id="{{ $carouselId }}" class="relative overflow-hidden rounded-[2rem] border border-gray-200 bg-gray-50/70 p-4 shadow-[0_20px_60px_rgba(15,23,42,0.08)]">
                    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-5" data-client-track>
                        @foreach($visibleClients as $index => $client)
                            <div class="rounded-[1.25rem] border border-gray-200 bg-white p-3 shadow-sm transition-all duration-700 ease-in-out" data-client-card>
                                <div class="flex h-full flex-col justify-center rounded-[1rem] bg-gray-50 p-3">
                                    <img src="{{ $client->url_gambar ?? $client->path_gambar }}" alt="{{ $client->judul ?? 'Client' }}" class="h-[170px] w-full object-contain sm:h-[190px] xl:h-[200px]">
                                    @if(!empty($client->judul))
                                        <p class="mt-3 text-center text-xs font-semibold uppercase tracking-[0.2em] text-gray-600">{{ $client->judul }}</p>
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
                                card.style.transform = 'translateX(0)';
                            } else {
                                card.style.opacity = '0.2';
                                card.style.transform = 'translateX(20px)';
                            }
                        });
                    };

                    render();
                    setInterval(() => {
                        offset = (offset + 1) % total;
                        render();
                    }, 2200);
                });
            </script>
        @else
            <div class="rounded-2xl border border-dashed border-gray-300 bg-gray-50 p-8 text-center text-gray-500">
                Belum ada foto client yang diupload.
            </div>
        @endif
    </div>
</section>
