@extends('layouts.app')

@section('title', 'Hubungi Kami - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Header -->
    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-orange-500/20 text-orange-400 border border-orange-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md">
                Layanan Pelanggan
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">
                HUBUNGI KAMI
            </h1>
            <p class="text-slate-300 max-w-2xl mx-auto text-base md:text-lg">
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
                            <div class="w-12 h-12 bg-blue-100 text-blue-900 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform text-xl">
                                📍
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-base mb-1">Alamat Kantor</h4>
                                <p class="text-sm text-slate-500 leading-relaxed">
                                    Jl. MT Haryono No.Kav 10, RT.11/RW.5<br>
                                    Tebet Barat, Kec. Tebet, Kota Jakarta Selatan<br>
                                    Daerah Khusus Ibukota Jakarta 12810
                                </p>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-start gap-4 p-4 rounded-2xl hover:bg-white hover:shadow-md transition duration-300 group cursor-default">
                            <div class="w-12 h-12 bg-orange-100 text-orange-600 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform text-xl">
                                📞
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-base mb-1">Telepon & WhatsApp</h4>
                                <p class="text-sm text-slate-500">
                                    <a href="tel:+6281234567890" class="hover:text-orange-500 transition font-semibold block mb-1">Office: (021) 1234-5678</a>
                                    <a href="https://wa.me/6281234567890" target="_blank" class="hover:text-orange-500 transition font-semibold flex items-center gap-2">
                                        WhatsApp: +62 812-3456-7890
                                        <span class="bg-green-100 text-green-700 text-[10px] px-2 py-0.5 rounded-full">Fast Response</span>
                                    </a>
                                </p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start gap-4 p-4 rounded-2xl hover:bg-white hover:shadow-md transition duration-300 group cursor-default">
                            <div class="w-12 h-12 bg-blue-100 text-blue-900 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform text-xl">
                                ✉️
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-base mb-1">Email Resmi</h4>
                                <p class="text-sm text-slate-500">
                                    <a href="mailto:info@pradananusaenergi.co.id" class="hover:text-blue-900 transition font-semibold block mb-1">info@pradananusaenergi.co.id</a>
                                    <a href="mailto:cs@pradananusaenergi.co.id" class="hover:text-blue-900 transition font-semibold block">cs@pradananusaenergi.co.id</a>
                                </p>
                            </div>
                        </div>

                        <!-- Hours -->
                        <div class="flex items-start gap-4 p-4 rounded-2xl hover:bg-white hover:shadow-md transition duration-300 group cursor-default">
                            <div class="w-12 h-12 bg-slate-200 text-slate-700 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform text-xl">
                                🕒
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-base mb-1">Jam Operasional</h4>
                                <p class="text-sm text-slate-500">
                                    <span class="font-semibold text-slate-700">Senin - Jumat:</span> 08:00 - 17:00 WIB<br>
                                    <span class="font-semibold text-slate-700">Sabtu - Minggu:</span> Tutup
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="bg-white rounded-3xl p-8 md:p-10 shadow-xl border border-slate-200 relative overflow-hidden reveal-on-scroll delay-100">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-900 to-orange-500"></div>
                    
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
                                <label class="block text-xs font-bold text-slate-700 mb-1.5">Perusahaan <span class="text-slate-400 font-normal">(Opsional)</span></label>
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
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2413532298647!2d106.8450162!3d-6.231878399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3a61f251c5f%3A0xcb13e8e2be00a6c7!2sKec.%20Tebet%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade"
                class="absolute inset-0 grayscale hover:grayscale-0 transition duration-700">
            </iframe>
        </div>
        
        <!-- Floating badge on map -->
        <div class="absolute top-6 left-6 md:left-1/2 md:-translate-x-1/2 bg-white/90 backdrop-blur-md px-6 py-3 rounded-full shadow-xl border border-white flex items-center gap-3">
            <div class="w-8 h-8 bg-blue-900 rounded-full flex items-center justify-center text-white font-bold">P</div>
            <span class="font-bold text-slate-900 text-sm">PT Pradana Nusa Energi</span>
        </div>
    </section>

    <x-footer />
@endsection
