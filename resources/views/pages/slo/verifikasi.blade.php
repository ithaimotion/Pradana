@extends('layouts.app')

@section('title', 'Verifikasi SLO - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Header -->
    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-orange-500/20 text-orange-400 border border-orange-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md">
                Verifikasi Keaslian
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">
                VERIFIKASI SLO
            </h1>
            <p class="text-slate-300 max-w-2xl mx-auto text-base md:text-lg">
                Pastikan keaslian Sertifikat Laik Operasi (SLO) yang diterbitkan oleh PT Pradana Nusa Energi dengan memasukkan nomor sertifikat di bawah.
            </p>
        </div>
    </section>

    <!-- Verification Form -->
    <section class="py-20 bg-slate-50 overflow-hidden">
        <div class="max-w-3xl mx-auto px-6">

            <!-- Search Card -->
            <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-8 md:p-10 reveal-on-scroll">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-orange-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h2 class="text-xl font-extrabold text-slate-900 mb-1">Cek Keaslian SLO</h2>
                    <p class="text-sm text-slate-500">Masukkan nomor sertifikat SLO yang tertera pada dokumen Anda</p>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nomor Sertifikat SLO</label>
                        <div class="relative">
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <input type="text" id="slo-number" placeholder="Contoh: SLO/PRADANA/2026/001"
                                class="w-full pl-12 pr-4 py-4 rounded-xl border-2 border-slate-200 text-base focus:outline-none focus:ring-2 focus:ring-orange-500/30 focus:border-orange-500 bg-slate-50 transition-all font-mono tracking-wide"
                                onkeydown="if(event.key==='Enter') verifikasiSLO()">
                        </div>
                    </div>
                    <button onclick="verifikasiSLO()"
                        class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-4 rounded-xl transition shadow-lg text-base flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        Verifikasi Sekarang
                    </button>
                </div>

                <!-- Result area (hidden by default) -->
                <div id="result-area" class="mt-8 hidden">
                    <!-- Success -->
                    <div id="result-success" class="hidden">
                        <div class="bg-green-50 border-2 border-green-200 rounded-2xl p-6">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-extrabold text-green-800 text-base">✅ Sertifikat VALID & TERVERIFIKASI</h3>
                                    <p class="text-xs text-green-600">Sertifikat ini sah diterbitkan oleh PT Pradana Nusa Energi</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4 mt-4 pt-4 border-t border-green-200 text-sm">
                                <div>
                                    <span class="text-green-600 text-xs block mb-0.5">No. Sertifikat</span>
                                    <span class="font-bold text-green-900 font-mono" id="res-nomor">—</span>
                                </div>
                                <div>
                                    <span class="text-green-600 text-xs block mb-0.5">Nama Pelanggan</span>
                                    <span class="font-bold text-green-900" id="res-nama">—</span>
                                </div>
                                <div>
                                    <span class="text-green-600 text-xs block mb-0.5">Alamat Instalasi</span>
                                    <span class="font-bold text-green-900" id="res-alamat">—</span>
                                </div>
                                <div>
                                    <span class="text-green-600 text-xs block mb-0.5">Tanggal Terbit</span>
                                    <span class="font-bold text-green-900" id="res-tanggal">—</span>
                                </div>
                                <div>
                                    <span class="text-green-600 text-xs block mb-0.5">Daya</span>
                                    <span class="font-bold text-green-900" id="res-daya">—</span>
                                </div>
                                <div>
                                    <span class="text-green-600 text-xs block mb-0.5">Status</span>
                                    <span class="font-bold text-green-900 bg-green-200 border border-green-300 px-2 py-0.5 rounded-full text-xs">Aktif</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Not Found -->
                    <div id="result-notfound" class="hidden">
                        <div class="bg-red-50 border-2 border-red-200 rounded-2xl p-6 text-center">
                            <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </div>
                            <h3 class="font-extrabold text-red-800 text-base mb-1">❌ Sertifikat Tidak Ditemukan</h3>
                            <p class="text-sm text-red-600">Nomor sertifikat yang Anda masukkan tidak terdaftar dalam sistem kami. Pastikan nomor telah diisi dengan benar.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- How to section -->
            <div class="mt-12 reveal-on-scroll delay-100">
                <h3 class="text-center font-extrabold text-slate-900 text-lg mb-6">Cara Menemukan Nomor Sertifikat</h3>
                <div class="grid sm:grid-cols-3 gap-5">
                    <div class="bg-white border border-slate-200 rounded-2xl p-5 text-center shadow-sm">
                        <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center mx-auto mb-3 text-xl">1️⃣</div>
                        <h4 class="font-bold text-slate-900 text-sm mb-1">Buka Dokumen SLO</h4>
                        <p class="text-xs text-slate-500">Siapkan sertifikat SLO asli yang Anda terima dari PT Pradana Nusa Energi.</p>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-2xl p-5 text-center shadow-sm">
                        <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center mx-auto mb-3 text-xl">2️⃣</div>
                        <h4 class="font-bold text-slate-900 text-sm mb-1">Temukan Nomor</h4>
                        <p class="text-xs text-slate-500">Nomor sertifikat terletak di pojok kanan atas dokumen, format: SLO/PRADANA/XXXX/XXX.</p>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-2xl p-5 text-center shadow-sm">
                        <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center mx-auto mb-3 text-xl">3️⃣</div>
                        <h4 class="font-bold text-slate-900 text-sm mb-1">Input & Verifikasi</h4>
                        <p class="text-xs text-slate-500">Masukkan nomor sertifikat pada kolom di atas dan klik tombol Verifikasi.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <x-footer />

    <script>
        // Demo data for verification (replace with backend API call in production)
        const demoDB = {
            'SLO/PRADANA/2026/001': { nama: 'PT Maju Bersama', alamat: 'Jl. Sudirman No. 10, Jakarta', tanggal: '15 Januari 2026', daya: '197 kVA / TM' },
            'SLO/PRADANA/2026/002': { nama: 'PT Cahaya Energi', alamat: 'Jl. Gatot Subroto No. 45, Bandung', tanggal: '22 Februari 2026', daya: '345 kVA / TM' },
            'SLO/PRADANA/2025/099': { nama: 'CV Indah Jaya Electric', alamat: 'Kawasan Industri Pulogadung, Jakarta Timur', tanggal: '10 Desember 2025', daya: '66 kVA / TR' },
        };

        function verifikasiSLO() {
            const input = document.getElementById('slo-number').value.trim().toUpperCase();
            const resultArea = document.getElementById('result-area');
            const success = document.getElementById('result-success');
            const notfound = document.getElementById('result-notfound');

            if (!input) return;

            resultArea.classList.remove('hidden');
            success.classList.add('hidden');
            notfound.classList.add('hidden');

            if (demoDB[input]) {
                const data = demoDB[input];
                document.getElementById('res-nomor').textContent = input;
                document.getElementById('res-nama').textContent = data.nama;
                document.getElementById('res-alamat').textContent = data.alamat;
                document.getElementById('res-tanggal').textContent = data.tanggal;
                document.getElementById('res-daya').textContent = data.daya;
                success.classList.remove('hidden');
            } else {
                notfound.classList.remove('hidden');
            }
        }
    </script>
@endsection
