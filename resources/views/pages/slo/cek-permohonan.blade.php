@extends('layouts.app')

@section('title', 'Cek Permohonan SLO - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Header -->
    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-blue-600/20 text-blue-500 border border-blue-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md">
                Tracking Permohonan
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">
                CEK PERMOHONAN SLO
            </h1>
            <p class="text-slate-700 dark:text-slate-300 max-w-2xl mx-auto text-base md:text-lg">
                Pantau status permohonan SLO Anda secara real-time. Masukkan nomor permohonan atau nomor registrasi yang diberikan saat pendaftaran.
            </p>
        </div>
    </section>

    <!-- Tracking Form -->
    <section class="py-20 bg-slate-50 overflow-hidden">
        <div class="max-w-3xl mx-auto px-6">

            <!-- Search Card -->
            <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-8 md:p-10 reveal-on-scroll">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-blue-900 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <svg class="w-8 h-8 text-slate-900 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                    </div>
                    <h2 class="text-xl font-extrabold text-slate-900 mb-1">Lacak Status Permohonan</h2>
                    <p class="text-sm text-slate-500">Masukkan nomor registrasi yang Anda terima saat mengajukan permohonan SLO</p>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nomor Registrasi</label>
                        <div class="relative">
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-600 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <input type="text" id="reg-number" placeholder="Contoh: REG/2026/07/001"
                                class="w-full pl-12 pr-4 py-4 rounded-xl border-2 border-slate-200 text-base focus:outline-none focus:ring-2 focus:ring-blue-900/30 focus:border-blue-900 bg-slate-50 transition-all font-mono tracking-wide"
                                onkeydown="if(event.key==='Enter') cekPermohonan()">
                        </div>
                    </div>
                    <button onclick="cekPermohonan()"
                        class="w-full bg-blue-900 hover:bg-blue-800 text-white font-bold py-4 rounded-xl transition shadow-lg text-base flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Lacak Permohonan
                    </button>
                </div>

                <!-- Result area -->
                <div id="tracking-result" class="mt-8 hidden">

                    <!-- Tracking Header -->
                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-5 mb-6">
                        <div class="flex items-center justify-between mb-3">
                            <div>
                                <p class="text-xs text-slate-600 dark:text-slate-400">No. Registrasi</p>
                                <p class="font-bold text-slate-900 font-mono" id="track-reg">—</p>
                            </div>
                            <span id="track-status-badge" class="text-xs font-bold px-3 py-1 rounded-full">—</span>
                        </div>
                        <div class="grid grid-cols-2 gap-3 text-xs">
                            <div>
                                <span class="text-slate-600 dark:text-slate-400 block">Pemohon</span>
                                <span class="font-semibold text-slate-700" id="track-pemohon">—</span>
                            </div>
                            <div>
                                <span class="text-slate-600 dark:text-slate-400 block">Lokasi</span>
                                <span class="font-semibold text-slate-700" id="track-lokasi">—</span>
                            </div>
                            <div>
                                <span class="text-slate-600 dark:text-slate-400 block">Tanggal Daftar</span>
                                <span class="font-semibold text-slate-700" id="track-tgl">—</span>
                            </div>
                            <div>
                                <span class="text-slate-600 dark:text-slate-400 block">Daya</span>
                                <span class="font-semibold text-slate-700" id="track-daya">—</span>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline Steps -->
                    <div class="relative pl-8">
                        <!-- Vertical line -->
                        <div class="absolute left-[15px] top-2 bottom-2 w-0.5 bg-slate-200"></div>

                        <div class="space-y-0">
                            <div class="relative pb-8" id="step-1">
                                <div class="absolute left-[-23px] w-7 h-7 rounded-full flex items-center justify-center text-xs font-bold step-dot">1</div>
                                <div class="ml-4">
                                    <h4 class="font-bold text-sm text-slate-900">Pendaftaran Diterima</h4>
                                    <p class="text-xs text-slate-500 mt-0.5" id="step-1-date">—</p>
                                </div>
                            </div>
                            <div class="relative pb-8" id="step-2">
                                <div class="absolute left-[-23px] w-7 h-7 rounded-full flex items-center justify-center text-xs font-bold step-dot">2</div>
                                <div class="ml-4">
                                    <h4 class="font-bold text-sm text-slate-900">Verifikasi Dokumen</h4>
                                    <p class="text-xs text-slate-500 mt-0.5" id="step-2-date">—</p>
                                </div>
                            </div>
                            <div class="relative pb-8" id="step-3">
                                <div class="absolute left-[-23px] w-7 h-7 rounded-full flex items-center justify-center text-xs font-bold step-dot">3</div>
                                <div class="ml-4">
                                    <h4 class="font-bold text-sm text-slate-900">Penjadwalan Inspeksi</h4>
                                    <p class="text-xs text-slate-500 mt-0.5" id="step-3-date">—</p>
                                </div>
                            </div>
                            <div class="relative pb-8" id="step-4">
                                <div class="absolute left-[-23px] w-7 h-7 rounded-full flex items-center justify-center text-xs font-bold step-dot">4</div>
                                <div class="ml-4">
                                    <h4 class="font-bold text-sm text-slate-900">Inspeksi Lapangan</h4>
                                    <p class="text-xs text-slate-500 mt-0.5" id="step-4-date">—</p>
                                </div>
                            </div>
                            <div class="relative pb-8" id="step-5">
                                <div class="absolute left-[-23px] w-7 h-7 rounded-full flex items-center justify-center text-xs font-bold step-dot">5</div>
                                <div class="ml-4">
                                    <h4 class="font-bold text-sm text-slate-900">Penyusunan Berita Acara</h4>
                                    <p class="text-xs text-slate-500 mt-0.5" id="step-5-date">—</p>
                                </div>
                            </div>
                            <div class="relative" id="step-6">
                                <div class="absolute left-[-23px] w-7 h-7 rounded-full flex items-center justify-center text-xs font-bold step-dot">6</div>
                                <div class="ml-4">
                                    <h4 class="font-bold text-sm text-slate-900">SLO Diterbitkan</h4>
                                    <p class="text-xs text-slate-500 mt-0.5" id="step-6-date">—</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Not Found -->
                <div id="tracking-notfound" class="mt-8 hidden">
                    <div class="bg-red-50 border-2 border-red-200 rounded-2xl p-6 text-center">
                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                        <h3 class="font-extrabold text-red-800 text-base mb-1">Permohonan Tidak Ditemukan</h3>
                        <p class="text-sm text-red-600">Nomor registrasi tidak terdaftar. Pastikan nomor telah diisi dengan benar atau hubungi kami untuk bantuan.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <x-footer />

    <style>
        .step-done .step-dot { background-color: #22c55e; color: white; border: 2px solid #16a34a; }
        .step-active .step-dot { background-color: #f97316; color: white; border: 2px solid #ea580c; animation: pulse-dot 2s infinite; }
        .step-pending .step-dot { background-color: #e2e8f0; color: #94a3b8; border: 2px solid #cbd5e1; }
        @keyframes pulse-dot { 0%, 100% { box-shadow: 0 0 0 0 rgba(249,115,22,0.4); } 50% { box-shadow: 0 0 0 8px rgba(249,115,22,0); } }
    </style>

    <script>
        const demoTracking = {
            'REG/2026/07/001': {
                pemohon: 'PT Maju Bersama',
                lokasi: 'Jl. Sudirman No. 10, Jakarta Selatan',
                tgl: '1 Juli 2026',
                daya: '197 kVA / TM',
                status: 'Inspeksi Lapangan',
                statusBadge: 'bg-blue-100 text-blue-700 border border-blue-200',
                currentStep: 4,
                dates: ['1 Jul 2026', '2 Jul 2026', '5 Jul 2026', '10 Jul 2026 (Dijadwalkan)', 'Menunggu', 'Menunggu']
            },
            'REG/2026/06/015': {
                pemohon: 'PT Cahaya Energi',
                lokasi: 'Jl. Gatot Subroto No. 45, Bandung',
                tgl: '15 Juni 2026',
                daya: '345 kVA / TM',
                status: 'SLO Diterbitkan',
                statusBadge: 'bg-green-100 text-green-700 border border-green-200',
                currentStep: 6,
                dates: ['15 Jun 2026', '16 Jun 2026', '18 Jun 2026', '22 Jun 2026', '25 Jun 2026', '28 Jun 2026']
            },
            'REG/2026/07/008': {
                pemohon: 'CV Indah Jaya Electric',
                lokasi: 'Kawasan Industri Pulogadung, Jakarta Timur',
                tgl: '8 Juli 2026',
                daya: '66 kVA / TR',
                status: 'Verifikasi Dokumen',
                statusBadge: 'bg-blue-100 text-blue-700 border border-blue-200',
                currentStep: 2,
                dates: ['8 Jul 2026', '9 Jul 2026 (Proses)', 'Menunggu', 'Menunggu', 'Menunggu', 'Menunggu']
            },
        };

        function cekPermohonan() {
            const input = document.getElementById('reg-number').value.trim().toUpperCase();
            const resultArea = document.getElementById('tracking-result');
            const notfound = document.getElementById('tracking-notfound');

            if (!input) return;

            resultArea.classList.add('hidden');
            notfound.classList.add('hidden');

            if (demoTracking[input]) {
                const d = demoTracking[input];
                document.getElementById('track-reg').textContent = input;
                document.getElementById('track-pemohon').textContent = d.pemohon;
                document.getElementById('track-lokasi').textContent = d.lokasi;
                document.getElementById('track-tgl').textContent = d.tgl;
                document.getElementById('track-daya').textContent = d.daya;

                const badge = document.getElementById('track-status-badge');
                badge.textContent = d.status;
                badge.className = 'text-xs font-bold px-3 py-1 rounded-full ' + d.statusBadge;

                for (let i = 1; i <= 6; i++) {
                    const step = document.getElementById('step-' + i);
                    step.classList.remove('step-done', 'step-active', 'step-pending');
                    if (i < d.currentStep) step.classList.add('step-done');
                    else if (i === d.currentStep) step.classList.add('step-active');
                    else step.classList.add('step-pending');
                    document.getElementById('step-' + i + '-date').textContent = d.dates[i - 1];
                }

                resultArea.classList.remove('hidden');
            } else {
                notfound.classList.remove('hidden');
            }
        }
    </script>
@endsection
