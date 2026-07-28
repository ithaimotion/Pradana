@extends('layouts.app')

@section('title', 'Uji Petik - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Header -->
    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-orange-500/20 text-orange-400 border border-orange-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md">
                Pengawasan & Evaluasi
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">
                UJI PETIK (SAMPLING)
            </h1>
            <p class="text-slate-300 max-w-2xl mx-auto text-base md:text-lg">
                Proses pengawasan dan evaluasi kinerja Tenaga Teknik untuk memastikan konsistensi penerapan prosedur inspeksi dan standar keselamatan.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center reveal-on-scroll">
                <!-- Left Content -->
                <div class="space-y-6">
                    <h2 class="text-2xl font-extrabold text-slate-900 mb-4">INSTALASI LISTRIK SUDAH TERBIT SLO</h2>
                    
                    <p class="text-slate-600 leading-relaxed">
                        Sertifikat Laik Operasi (SLO) adalah bukti pengakuan formal suatu instansi tenaga listrik telah berfungsi sebagaimana kesesuaian persyaratan yang ditentukan dan dinyatakan siap dioperasikan.
                    </p>

                    <p class="text-slate-600 leading-relaxed">
                        SLO untuk seluruh instalasi tenaga listrik merupakan salah satu penerapan dari ketentuan keselamatan ketenagalistrikan. SLO wajib dimiliki instalasi pembangkit, distribusi, tegangan menengah dan tegangan rendah melalui pemeriksaan dan pengujian pada saat selesai dibangun, rekondisi, relokasi atau SLO yang habis masa berlakunya.
                    </p>

                    <div class="bg-orange-50 border border-orange-200 rounded-xl p-6">
                        <h3 class="font-bold text-orange-800 mb-3">Sesuai PERMEN ESDM Nomor 12 Tahun 2021</h3>
                        <p class="text-sm text-slate-700 italic">
                            Pasal 75 ayat (5) "Lembaga sertifikasi ketenagalistrikan sebagaimana dimaksud dalam Pasal 13 ayat (1) huruf a, huruf c, dan huruf d wajib melakukan uji petik terhadap pemegang sertifikat sesuai dengan ruang lingkup usahanya dengan sampel paling sedikit 5% (lima persen) dari jumlah sertifikat yang diterbitkan dalam 2 (dua) tahun sebelumnya."
                        </p>
                    </div>

                    <div class="space-y-4">
                        <p class="text-slate-600 font-semibold">Kami yang diberi tugas untuk menjalankan perintah tersebut akan melakukan:</p>
                        <ul class="space-y-2 text-sm text-slate-600 ml-4">
                            <li class="list-disc">Pemeriksaan berkala 1 (satu) tahun pertama setelah SLO instalasi listrik terkait terbit</li>
                            <li class="list-disc">Pemeriksaan berkala berikut dilakukan sewaktu-waktu sampai masa berlaku SLO habis</li>
                        </ul>
                    </div>

                    <div class="space-y-4">
                        <p class="text-slate-600 font-semibold">Pemeriksaan yang dilakukan adalah:</p>
                        <ul class="space-y-2 text-sm text-slate-600 ml-4">
                            <li class="list-disc">Kesesuaian dengan Single Line Diagram yang dilampirkan di SLO</li>
                            <li class="list-disc">Kesesuaian Site Plan yang dilampirkan di SLO</li>
                            <li class="list-disc">Kapasitas Daya tersambung</li>
                            <li class="list-disc">Kesesuaian data perlengkapan material utama yang dilampirkan di SLO</li>
                        </ul>
                    </div>

                    <div class="bg-red-50 border border-red-200 rounded-xl p-6">
                        <p class="text-slate-600 font-semibold mb-2">Bila ditemukan ketidaksesuaian dengan hal tersebut di atas kami akan melakukan tindakan:</p>
                        <ul class="space-y-2 text-sm text-slate-600 ml-4">
                            <li class="list-disc">Menyampaikan agar pemilik instalasi melakukan inspeksi instalasi listrik ulang dalam rangka penerbitan SLO baru. Karena SLO yang dimiliki sudah tidak berlaku.</li>
                            <li class="list-disc">Melaporkan ke Direktorat Jenderal Ketenagalistrikan untuk mencabut SLO yang sudah diterbitkan.</li>
                        </ul>
                    </div>
                </div>

                <!-- Right Content - Image -->
                <div class="relative">
                    @if(isset($ujiPetik) && $ujiPetik->url_gambar)
                        <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-4 overflow-hidden">
                            <img src="{{ $ujiPetik->url_gambar }}" alt="Uji Petik" class="w-full h-auto rounded-2xl">
                        </div>
                    @else
                        <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-12 flex items-center justify-center min-h-[400px]">
                            <p class="text-slate-400 text-center">Belum ada gambar uji petik yang tersedia.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <x-footer />
@endsection
