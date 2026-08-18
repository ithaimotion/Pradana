@extends('layouts.app')

@php
    $setting = function ($key) {
        return app('db')->table('konten_beranda')->where('bagian', 'hubungi_kami')->where('kunci', $key)->value('konten') ?? '';
    };

    $alamatKantor = $setting('alamat_kantor');
    $teleponWhatsapp = $setting('telepon_whatsapp');
    $emailResmi = $setting('email_resmi');
    $jamOperasional = $setting('jam_operasional');
    $mapsEmbedRaw = $setting('maps_embed');
    
    // Auto-extract URL if user pastes the full <iframe ...> snippet
    $mapsEmbed = $mapsEmbedRaw;
    if (str_contains($mapsEmbedRaw, '<iframe') && preg_match('/src="([^"]+)"/', $mapsEmbedRaw, $matches)) {
        $mapsEmbed = $matches[1];
    }
@endphp

@section('title', 'Hubungi Kami - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Header -->
    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-blue-600/20 text-blue-500 border border-blue-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md">
                Layanan Pelanggan
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">
                HUBUNGI KAMI
            </h1>
            <p class="text-white/90 max-w-2xl mx-auto text-base md:text-lg">
                Punya pertanyaan mengenai layanan sertifikasi SLO? Tim kami siap membantu Anda dengan layanan yang cepat dan profesional.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-slate-50 overflow-hidden relative">
        <!-- Decoration -->
        <div class="absolute top-0 right-0 w-1/3 h-full bg-blue-900/5 -skew-x-12 transform origin-top hidden lg:block"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-start">
                
                <!-- Contact Info -->
                <div class="reveal-on-scroll">
                    <h2 class="text-3xl font-extrabold text-slate-900 mb-6">Kantor Pusat Kami</h2>
                    <p class="text-slate-600 leading-relaxed mb-10">
                        Kunjungi kantor kami atau hubungi kami melalui saluran komunikasi di bawah ini untuk konsultasi terkait Sertifikat Laik Operasi (SLO) instalasi Anda.
                    </p>

                    <div class="space-y-6">
                        <!-- Address -->
                        <div class="flex items-start gap-4 p-4 rounded-2xl hover:bg-white hover:shadow-md transition duration-300 group cursor-default">
                            <div class="w-12 h-12 bg-blue-100 text-blue-900 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 21s-6-5.4-6-10a6 6 0 1112 0c0 4.6-6 10-6 10z"></path><circle cx="12" cy="11" r="2.5"></circle></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-base mb-1">Alamat Kantor</h4>
                                <p class="text-sm text-slate-500 leading-relaxed whitespace-pre-line">
                                    {{ $alamatKantor ?: 'Jl. MT Haryono No.Kav 10, RT.11/RW.5 Tebet Barat, Jakarta Selatan 12810' }}
                                </p>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-start gap-4 p-4 rounded-2xl hover:bg-white hover:shadow-md transition duration-300 group cursor-default">
                            <div class="w-12 h-12 bg-blue-100 text-blue-700 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 5a2 2 0 012-2h2.2a1 1 0 01.95.78l.65 2.6a1 1 0 01-.28.95L6.8 9.8a15 15 0 006.4 6.4l1.67-1.72a1 1 0 01.95-.28l2.6.65A1 1 0 0121 17.8V20a2 2 0 01-2 2h-1C8.82 22 2 15.18 2 7V3.5"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-base mb-1">Telepon & WhatsApp</h4>
                                <p class="text-sm text-slate-500 whitespace-pre-line">
                                    {!! nl2br(e($teleponWhatsapp ?: 'Office: (021) 1234-5678' . PHP_EOL . 'WhatsApp: +62 812-3456-7890')) !!}
                                </p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start gap-4 p-4 rounded-2xl hover:bg-white hover:shadow-md transition duration-300 group cursor-default">
                            <div class="w-12 h-12 bg-blue-100 text-blue-900 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-base mb-1">Email Resmi</h4>
                                <p class="text-sm text-slate-500 whitespace-pre-line">
                                    {!! nl2br(e($emailResmi ?: 'info@pradananusaenergi.co.id')) !!}
                                </p>
                            </div>
                        </div>

                        <!-- Hours -->
                        <div class="flex items-start gap-4 p-4 rounded-2xl hover:bg-white hover:shadow-md transition duration-300 group cursor-default">
                            <div class="w-12 h-12 bg-slate-200 text-slate-700 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"></circle><path stroke-linecap="round" stroke-linejoin="round" d="M12 7v5l3 2"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-base mb-1">Jam Operasional</h4>
                                <p class="text-sm text-slate-500 whitespace-pre-line">
                                    {{ $jamOperasional ?: 'Senin - Jumat: 08:00 - 17:00 WIB' . PHP_EOL . 'Sabtu - Minggu: Tutup' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="bg-white rounded-3xl p-8 md:p-10 shadow-xl border border-slate-200 relative overflow-hidden reveal-on-scroll delay-100">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-900 to-blue-600"></div>
                    
                    <h3 class="text-2xl font-extrabold text-slate-900 mb-2">Kirim Pesan</h3>
                    <p class="text-sm text-slate-500 mb-8">Isi formulir di bawah ini dan tim kami akan segera menghubungi Anda kembali.</p>

                    @if(session('success'))
                        <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-xl text-sm font-medium">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('hubungi-kami.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1.5">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" name="nama" placeholder="John Doe" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-900/30 focus:border-blue-900 bg-slate-50 transition-all text-sm" required>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1.5">Perusahaan <span class="text-slate-600 dark:text-slate-400 font-normal">(Opsional)</span></label>
                                <input type="text" name="perusahaan" placeholder="PT Maju Bersama" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-900/30 focus:border-blue-900 bg-slate-50 transition-all text-sm">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1.5">Email <span class="text-red-500">*</span></label>
                                <input type="email" name="email" placeholder="john@example.com" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-900/30 focus:border-blue-900 bg-slate-50 transition-all text-sm" required>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1.5">No. Telepon / WA <span class="text-red-500">*</span></label>
                                <input type="tel" name="no_hp" placeholder="0812xxxx" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-900/30 focus:border-blue-900 bg-slate-50 transition-all text-sm" required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Subjek</label>
                            <select name="subjek" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-900/30 focus:border-blue-900 bg-slate-50 transition-all text-sm text-slate-700">
                                <option value="">Pilih Subjek...</option>
                                <option value="Permohonan SLO Baru">Permohonan SLO Baru</option>
                                <option value="Perpanjangan SLO">Perpanjangan SLO</option>
                                <option value="Konsultasi Teknis">Konsultasi Teknis</option>
                                <option value="Kerjasama Bisnis">Kerjasama Bisnis</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Pesan Anda <span class="text-red-500">*</span></label>
                            <textarea name="pesan" rows="4" placeholder="Tulis pesan atau pertanyaan Anda di sini..." class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-900/30 focus:border-blue-900 bg-slate-50 transition-all text-sm resize-none" required></textarea>
                        </div>

                        <button type="submit" class="w-full bg-blue-900 hover:bg-blue-800 text-white font-bold py-3.5 rounded-xl transition shadow-lg text-sm flex items-center justify-center gap-2">
                            Kirim Pesan Sekarang
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Maps Full Width -->
    <section class="h-96 w-full relative reveal-on-scroll delay-200">
        <!-- Placeholder for map since actual iframe might need API key or exact URL, using a visual placeholder -->
        <div class="absolute inset-0 bg-slate-200 flex items-center justify-center">
            @if($mapsEmbed)
                <iframe 
                    src="{{ $mapsEmbed }}"
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade"
                    class="absolute inset-0 grayscale hover:grayscale-0 transition duration-700">
                </iframe>
            @else
                <div class="absolute inset-0 bg-gradient-to-br from-slate-300 to-slate-400 flex items-center justify-center text-slate-700 font-semibold">
                    Belum ada embed maps.
                </div>
            @endif
        </div>
        
        <!-- Floating badge on map -->
        <div class="absolute top-6 left-6 md:left-1/2 md:-translate-x-1/2 bg-white/90 backdrop-blur-md px-6 py-3 rounded-full shadow-xl border border-white flex items-center gap-3">
            <div class="w-8 h-8 bg-blue-900 rounded-full flex items-center justify-center text-white font-bold">P</div>
            <span class="font-bold text-slate-900 text-sm">PT Pradana Nusa Energi</span>
        </div>
    </section>

    <x-footer />
@endsection
