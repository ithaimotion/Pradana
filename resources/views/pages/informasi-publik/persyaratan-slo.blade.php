@extends('layouts.app')

@section('title', 'Persyaratan SLO - PT Pradana Nusa Energi')

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
                PERSYARATAN SLO
            </h1>
            <p class="text-slate-300 max-w-2xl mx-auto text-base md:text-lg">
                Dokumen dan persyaratan administratif maupun teknis yang wajib disiapkan sebelum mengajukan permohonan Sertifikat Laik Operasi.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">

            <div class="grid md:grid-cols-2 gap-8 reveal-on-scroll">
                
                <!-- Administrasi -->
                <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm">
                    <div class="flex items-center gap-4 mb-6 pb-6 border-b border-slate-100">
                        <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-900 text-2xl font-bold">📄</div>
                        <h2 class="text-xl font-extrabold text-slate-900">Persyaratan Administrasi</h2>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <span class="text-blue-500 mt-0.5"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></span>
                            <div>
                                <span class="font-bold text-slate-700 text-sm block">Identitas Pemilik/Pemohon</span>
                                <span class="text-xs text-slate-500">KTP (Individu) atau NIB/Akta Perusahaan (Badan Usaha).</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-blue-500 mt-0.5"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></span>
                            <div>
                                <span class="font-bold text-slate-700 text-sm block">Surat Permohonan</span>
                                <span class="text-xs text-slate-500">Formulir permohonan sertifikasi yang ditandatangani.</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-blue-500 mt-0.5"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></span>
                            <div>
                                <span class="font-bold text-slate-700 text-sm block">IUPTL / Nomor Registrasi (Untuk TM/Pembangkit)</span>
                                <span class="text-xs text-slate-500">Izin Usaha Penyediaan Tenaga Listrik atau registrasi DJK.</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-blue-500 mt-0.5"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></span>
                            <div>
                                <span class="font-bold text-slate-700 text-sm block">Bukti Pembayaran / Kontrak</span>
                                <span class="text-xs text-slate-500">Sesuai dengan tagihan biaya inspeksi yang diterbitkan.</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Teknis -->
                <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm">
                    <div class="flex items-center gap-4 mb-6 pb-6 border-b border-slate-100">
                        <div class="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center text-orange-600 text-2xl font-bold">⚙️</div>
                        <h2 class="text-xl font-extrabold text-slate-900">Persyaratan Teknis</h2>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <span class="text-orange-500 mt-0.5"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></span>
                            <div>
                                <span class="font-bold text-slate-700 text-sm block">Gambar Instalasi Listrik (As-Built Drawing)</span>
                                <span class="text-xs text-slate-500">Diagram garis tunggal (Single Line Diagram) dan denah instalasi.</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-orange-500 mt-0.5"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></span>
                            <div>
                                <span class="font-bold text-slate-700 text-sm block">Spesifikasi Peralatan Pokok</span>
                                <span class="text-xs text-slate-500">Data teknis trafo, panel, kabel, genset, atau inverter/solar panel.</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-orange-500 mt-0.5"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></span>
                            <div>
                                <span class="font-bold text-slate-700 text-sm block">Sertifikat Produk</span>
                                <span class="text-xs text-slate-500">Sertifikat garansi, uji pabrik (FAT), atau label SNI material.</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-orange-500 mt-0.5"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></span>
                            <div>
                                <span class="font-bold text-slate-700 text-sm block">Pernyataan Pelaksana Pekerjaan</span>
                                <span class="text-xs text-slate-500">Bukti bahwa instalasi dipasang oleh kontraktor/instalatur resmi ber-SBU.</span>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>

        </div>
    </section>

    <x-footer />
@endsection
