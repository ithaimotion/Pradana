@extends('layouts.app')

@section('title', 'Alur Sertifikasi - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Header -->
    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-orange-500/20 text-orange-400 border border-orange-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md">
                Standar Pelayanan
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">
                ALUR SERTIFIKASI
            </h1>
            <p class="text-slate-300 max-w-2xl mx-auto text-base md:text-lg">
                Proses menyeluruh pengurusan Sertifikat Laik Operasi (SLO) dari tahap permohonan hingga terbitnya sertifikat.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-20 bg-slate-50 overflow-hidden">
        <div class="max-w-5xl mx-auto px-6">

            <!-- Flowchart Container -->
            <div class="relative reveal-on-scroll">
                <!-- Vertical Line (Desktop) -->
                <div class="hidden md:block absolute left-1/2 top-10 bottom-10 w-1 bg-blue-200 -translate-x-1/2"></div>

                <div class="space-y-12">
                    
                    <!-- Step 1 -->
                    <div class="relative flex flex-col md:flex-row items-center justify-between group">
                        <div class="md:w-5/12 mb-6 md:mb-0 text-center md:text-right px-4 order-2 md:order-1">
                            <h3 class="text-xl font-extrabold text-slate-900 mb-2 group-hover:text-blue-900 transition-colors">1. Permohonan & Registrasi</h3>
                            <p class="text-sm text-slate-500 leading-relaxed">
                                Pemohon mengajukan permohonan inspeksi secara online atau offline dengan melengkapi formulir dan persyaratan administrasi serta teknis.
                            </p>
                        </div>
                        <div class="md:w-2/12 flex justify-center order-1 md:order-2 mb-4 md:mb-0 relative z-10">
                            <div class="w-16 h-16 bg-blue-900 text-white rounded-full flex items-center justify-center text-2xl shadow-xl border-4 border-slate-50 transition-transform group-hover:scale-110">📝</div>
                        </div>
                        <div class="md:w-5/12 px-4 order-3 hidden md:block"></div>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative flex flex-col md:flex-row items-center justify-between group">
                        <div class="md:w-5/12 px-4 hidden md:block order-1"></div>
                        <div class="md:w-2/12 flex justify-center order-2 mb-4 md:mb-0 relative z-10">
                            <div class="w-16 h-16 bg-blue-900 text-white rounded-full flex items-center justify-center text-2xl shadow-xl border-4 border-slate-50 transition-transform group-hover:scale-110">💳</div>
                        </div>
                        <div class="md:w-5/12 mb-6 md:mb-0 text-center md:text-left px-4 order-3">
                            <h3 class="text-xl font-extrabold text-slate-900 mb-2 group-hover:text-blue-900 transition-colors">2. Penawaran & Pembayaran</h3>
                            <p class="text-sm text-slate-500 leading-relaxed">
                                LIT menerbitkan Surat Penawaran Harga (Quotation) / Tagihan. Pemohon melakukan pembayaran biaya inspeksi sesuai tagihan ke rekening resmi perusahaan.
                            </p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative flex flex-col md:flex-row items-center justify-between group">
                        <div class="md:w-5/12 mb-6 md:mb-0 text-center md:text-right px-4 order-2 md:order-1">
                            <h3 class="text-xl font-extrabold text-slate-900 mb-2 group-hover:text-blue-900 transition-colors">3. Evaluasi Dokumen</h3>
                            <p class="text-sm text-slate-500 leading-relaxed">
                                Penanggung Jawab Teknik (PJT) memverifikasi kelengkapan dan kesesuaian dokumen teknis (gambar, spesifikasi material) dengan standar yang berlaku.
                            </p>
                        </div>
                        <div class="md:w-2/12 flex justify-center order-1 md:order-2 mb-4 md:mb-0 relative z-10">
                            <div class="w-16 h-16 bg-orange-500 text-white rounded-full flex items-center justify-center text-2xl shadow-xl border-4 border-slate-50 transition-transform group-hover:scale-110">🔎</div>
                        </div>
                        <div class="md:w-5/12 px-4 order-3 hidden md:block"></div>
                    </div>

                    <!-- Step 4 -->
                    <div class="relative flex flex-col md:flex-row items-center justify-between group">
                        <div class="md:w-5/12 px-4 hidden md:block order-1"></div>
                        <div class="md:w-2/12 flex justify-center order-2 mb-4 md:mb-0 relative z-10">
                            <div class="w-16 h-16 bg-orange-500 text-white rounded-full flex items-center justify-center text-2xl shadow-xl border-4 border-slate-50 transition-transform group-hover:scale-110">👷</div>
                        </div>
                        <div class="md:w-5/12 mb-6 md:mb-0 text-center md:text-left px-4 order-3">
                            <h3 class="text-xl font-extrabold text-slate-900 mb-2 group-hover:text-blue-900 transition-colors">4. Inspeksi Lapangan</h3>
                            <p class="text-sm text-slate-500 leading-relaxed">
                                Tim Tenaga Teknik (TT) ditugaskan menuju lokasi untuk melakukan pemeriksaan visual dan pengujian teknis instalasi secara langsung berdasarkan prosedur.
                            </p>
                        </div>
                    </div>

                    <!-- Step 5 -->
                    <div class="relative flex flex-col md:flex-row items-center justify-between group">
                        <div class="md:w-5/12 mb-6 md:mb-0 text-center md:text-right px-4 order-2 md:order-1">
                            <h3 class="text-xl font-extrabold text-slate-900 mb-2 group-hover:text-blue-900 transition-colors">5. Evaluasi Hasil (LHPP)</h3>
                            <p class="text-sm text-slate-500 leading-relaxed">
                                TT menyerahkan Laporan Hasil Pemeriksaan dan Pengujian (LHPP). PJT mengevaluasi LHPP untuk merekomendasikan status kelaikan operasi (Laik / Tidak Laik).
                            </p>
                        </div>
                        <div class="md:w-2/12 flex justify-center order-1 md:order-2 mb-4 md:mb-0 relative z-10">
                            <div class="w-16 h-16 bg-blue-900 text-white rounded-full flex items-center justify-center text-2xl shadow-xl border-4 border-slate-50 transition-transform group-hover:scale-110">📊</div>
                        </div>
                        <div class="md:w-5/12 px-4 order-3 hidden md:block"></div>
                    </div>

                    <!-- Step 6 -->
                    <div class="relative flex flex-col md:flex-row items-center justify-between group">
                        <div class="md:w-5/12 px-4 hidden md:block order-1"></div>
                        <div class="md:w-2/12 flex justify-center order-2 mb-4 md:mb-0 relative z-10">
                            <div class="w-16 h-16 bg-green-500 text-white rounded-full flex items-center justify-center text-2xl shadow-xl border-4 border-slate-50 transition-transform group-hover:scale-110">🏆</div>
                        </div>
                        <div class="md:w-5/12 mb-6 md:mb-0 text-center md:text-left px-4 order-3">
                            <h3 class="text-xl font-extrabold text-slate-900 mb-2 group-hover:text-green-600 transition-colors">6. Penerbitan Sertifikat (SLO)</h3>
                            <p class="text-sm text-slate-500 leading-relaxed">
                                Jika dinyatakan Laik Operasi, Sertifikat Laik Operasi (SLO) diterbitkan dan disahkan. Dokumen SLO akan dikirimkan kepada pemohon dalam bentuk cetak/digital.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Download Infographic -->
            <div class="mt-20 bg-blue-50 border border-blue-200 rounded-2xl p-8 flex flex-col md:flex-row items-center justify-between gap-6 reveal-on-scroll delay-200 text-center md:text-left">
                <div>
                    <h4 class="font-extrabold text-blue-900 text-lg mb-2">Unduh Infografis Alur Sertifikasi</h4>
                    <p class="text-sm text-blue-700">Dapatkan versi visual (PDF/Gambar) untuk mempermudah pemahaman proses pengurusan SLO.</p>
                </div>
                <a href="#" class="bg-blue-900 hover:bg-blue-800 text-white font-bold px-6 py-3 rounded-xl transition shadow-md whitespace-nowrap flex-shrink-0 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    Unduh Brosur
                </a>
            </div>

        </div>
    </section>

    <x-footer />
@endsection
