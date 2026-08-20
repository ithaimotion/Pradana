<footer id="contact" class="bg-blue-900 text-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 mb-12 reveal-on-scroll">
            <div class="lg:col-span-4 xl:col-span-5">
                <div class="text-2xl lg:text-3xl font-bold mb-2 whitespace-nowrap">PRADANA NUSA ENERGI</div>
                <!-- <div class="text-sm text-white/70 mb-6">NUSA ENERGI</div> -->
                <p class="text-white/80 text-sm leading-relaxed mt-4 pr-4">
                    Lembaga Inspeksi Teknik (LIT) terkemuka dalam pemeriksaan & sertifikasi kelistrikan SLO di Indonesia.
                </p>
            </div>
            
            <div class="lg:col-span-2 xl:col-span-2">
                <h3 class="text-lg font-semibold mb-4">Tautan Penting</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('profil.perusahaan') }}" class="text-white/70 hover:text-blue-500 transition">Profil Perusahaan</a></li>
                    <li><a href="#about" class="text-white/70 hover:text-blue-500 transition">Tentang Kami</a></li>
                    <li><a href="{{ route('slo.bidang-layanan') }}" class="text-white/70 hover:text-blue-500 transition">Layanan SLO</a></li>
                    <li><a href="{{route('slo.regulasi')}}" class="text-white/70 hover:text-blue-500 transition">Regulasi & Standar</a></li>
                    <li><a href="{{route('hubungi-kami')}}" class="text-white/70 hover:text-blue-500 transition">Kontak</a></li>
                </ul>
            </div>
            
            <div class="lg:col-span-2 xl:col-span-2">
                <h3 class="text-lg font-semibold mb-4">LEGAL</h3>
                <ul class="space-y-2">
                    @php
                        $legalLinks = $footerLinksByType['legal'] ?? collect();
                    @endphp

                    @forelse($legalLinks as $link)
                        <li>
                            <a href="{{ $link->url }}" target="{{ str_starts_with($link->url, 'http://') || str_starts_with($link->url, 'https://') ? '_blank' : '_self' }}" class="text-white/70 hover:text-blue-500 transition">{{ $link->label }}</a>
                        </li>
                    @empty
                        <li><a href="{{ route('legal.privacy') }}" class="text-white/70 hover:text-blue-500 transition">Kebijakan Privasi</a></li>
                        <li><a href="{{ route('legal.terms') }}" class="text-white/70 hover:text-blue-500 transition">Syarat &amp; Ketentuan</a></li>
                        <li><a href="{{ route('legal.cookie') }}" class="text-white/70 hover:text-blue-500 transition">Kebijakan Cookie</a></li>
                    @endforelse
                </ul>
            </div>
            
            <div class="lg:col-span-4 xl:col-span-3">
                <h3 class="text-lg font-semibold mb-4">KONTAK</h3>
                <ul class="space-y-2 text-white/70">
                    <li>contact@slo-pradana.id</li>
                    <li>(021) 8498-7154</li>
                    <li>Bekasi, Jawa Barat, Indonesia</li>
                </ul>
            </div>
        </div>
        
        <div class="border-t border-white/20 pt-8 mb-8 reveal-on-scroll delay-200">
            @php
                $sosmedLinks = \App\Models\LegalSetting::first()?->social_media_links ?? [];
            @endphp
            @if(count($sosmedLinks))
            <div class="flex justify-end gap-4">
                @foreach($sosmedLinks as $sosmed)
                    @if(!empty($sosmed['url']))
                    <a href="{{ $sosmed['url'] }}" target="_blank" rel="noopener noreferrer"
                       class="w-10 h-10 border border-white/30 rounded-full flex items-center justify-center text-white hover:bg-white hover:text-blue-900 transition overflow-hidden"
                       title="{{ $sosmed['nama'] ?? '' }}">
                        @if(!empty($sosmed['ikon']))
                            <img src="{{ asset('storage_public/' . ltrim($sosmed['ikon'], '/')) }}" alt="{{ $sosmed['nama'] ?? 'sosmed' }}" class="w-5 h-5 object-contain">
                        @else
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93V18c0-.55.45-1 1-1s1 .45 1 1v1.93c-3.95-.49-7-3.85-7-7.93s3.05-7.44 7-7.93V6c0 .55-.45 1-1 1s-1-.45-1-1V4.07C7.05 4.56 4 7.92 4 12s3.05 7.44 7 7.93z"/></svg>
                        @endif
                    </a>
                    @endif
                @endforeach
            </div>
            @endif
        </div>
        
        <div class="border-t border-white/20 pt-8 flex flex-col md:flex-row justify-center items-center gap-4">
            <p class="text-white/70 text-sm">
                © {{ date('Y') }} Hai Motion - Created for PT Pradana Nusa Energi. All rights reserved.
            </p>
            <!-- <div class="flex flex-wrap gap-4 text-sm">
                @if($legalLinks->count())
                    @foreach($legalLinks as $link)
                        <a href="{{ $link->url }}" target="{{ str_starts_with($link->url, 'http://') || str_starts_with($link->url, 'https://') ? '_blank' : '_self' }}" class="text-white/70 hover:text-blue-500 transition">{{ $link->label }}</a>
                    @endforeach
                @else
                    <a href="{{ route('legal.privacy') }}" class="text-white/70 hover:text-blue-500 transition">Kebijakan Privasi</a>
                    <a href="{{ route('legal.terms') }}" class="text-white/70 hover:text-blue-500 transition">Syarat &amp; Ketentuan</a>
                    <a href="{{ route('legal.cookie') }}" class="text-white/70 hover:text-blue-500 transition">Kebijakan Cookie</a>
                @endif
            </div> -->
        </div>
    </div>
</footer>

