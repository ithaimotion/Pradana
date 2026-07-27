@extends('layouts.app')

@section('title', 'Prosedur SLO - PT Pradana Nusa Energi')

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
                PROSEDUR SLO
            </h1>
            <p class="text-slate-300 max-w-2xl mx-auto text-base md:text-lg">
                Tata cara dan ketentuan teknis pelaksanaan inspeksi instalasi tenaga listrik dari tahap awal hingga penerbitan sertifikat.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-slate-50 overflow-hidden">
        <div class="max-w-4xl mx-auto px-6">

            <div class="space-y-6 reveal-on-scroll">
                
                <!-- Accordion/Cards for procedures -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 md:p-8">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center font-bold flex-shrink-0 mt-1">A</div>
                        <div>
                            <h3 class="text-lg font-extrabold text-slate-900 mb-2">Evaluasi Dokumen (Desk Review)</h3>
                            <p class="text-sm text-slate-600 leading-relaxed">
                                Sebelum turun ke lapangan, Penanggung Jawab Teknik (PJT) akan mengevaluasi kesesuaian dokumen teknis, seperti Single Line Diagram (SLD), spesifikasi material, dan gambar tata letak. Jika dokumen belum lengkap, pemohon akan diminta untuk melengkapinya terlebih dahulu.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 md:p-8">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center font-bold flex-shrink-0 mt-1">B</div>
                        <div>
                            <h3 class="text-lg font-extrabold text-slate-900 mb-2">Pemeriksaan Visual (On-Site)</h3>
                            <p class="text-sm text-slate-600 leading-relaxed">
                                Tenaga Teknik (TT) melakukan kunjungan ke lokasi instalasi. TT akan memeriksa kesesuaian fisik instalasi dengan as-built drawing, memeriksa papan nama (nameplate) peralatan, kondisi fisik kabel, panel, sistem pentanahan (grounding), dan mengidentifikasi potensi bahaya.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 md:p-8">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center font-bold flex-shrink-0 mt-1">C</div>
                        <div>
                            <h3 class="text-lg font-extrabold text-slate-900 mb-2">Pengujian Teknis Instalasi</h3>
                            <div class="text-sm text-slate-600 leading-relaxed mb-4">
                                Pengujian dilakukan dalam kondisi tidak bertegangan (cold test) dan bertegangan (hot test/commissioning), meliputi:
                            </div>
                            <ul class="grid sm:grid-cols-2 gap-3">
                                <li class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                    <span class="text-sm text-slate-700">Uji Tahanan Isolasi (Megger)</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                    <span class="text-sm text-slate-700">Uji Tahanan Pembumian (Grounding)</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                    <span class="text-sm text-slate-700">Uji Kontinuitas Sirkuit</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                    <span class="text-sm text-slate-700">Uji Fungsi Proteksi (Relay/MCB/RCBO)</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                    <span class="text-sm text-slate-700">Pengukuran Tegangan & Arus</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                    <span class="text-sm text-slate-700">Pemeriksaan Urutan Fasa</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 md:p-8">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center font-bold flex-shrink-0 mt-1">D</div>
                        <div>
                            <h3 class="text-lg font-extrabold text-slate-900 mb-2">Laporan & Keputusan</h3>
                            <p class="text-sm text-slate-600 leading-relaxed">
                                TT menyusun Laporan Hasil Pemeriksaan dan Pengujian (LHPP). Berdasarkan LHPP tersebut, PJT akan melakukan evaluasi akhir untuk menentukan kelayakan. Jika instalasi dinyatakan "Laik Operasi", SLO akan diterbitkan. Jika "Tidak Laik Operasi", pemohon wajib melakukan perbaikan (remedial) sesuai rekomendasi sebelum dilakukan inspeksi ulang.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <x-footer />
@endsection
