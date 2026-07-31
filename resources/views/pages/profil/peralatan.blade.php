@extends('layouts.app')

@section('title', 'Peralatan - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <!-- Hero Header -->
    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-7xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-blue-600/20 text-blue-500 border border-blue-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md">
                Instrumen & Teknologi
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">
                {{ $konten->judul ?? 'PERALATAN INSPEKSI' }}
            </h1>
            <p class="text-slate-700 dark:text-slate-300 max-w-2xl mx-auto text-base md:text-lg">
                {{ $konten->subjudul ?? 'Seluruh peralatan ukur dan uji yang digunakan PT Pradana Nusa Energi dalam proses inspeksi instalasi listrik dan penerbitan SLO telah terstandar dan terkalibrasi.' }}
            </p>
            @if(optional($konten)->url_dokumen)
                <div class="mt-6">
                    <a href="{{ optional($konten)->url_dokumen }}" target="_blank" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3 rounded-xl shadow-lg transition transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span>Unduh Dokumen Kalibrasi Peralatan (PDF)</span>
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Stats bar -->
    <section class="bg-white border-b border-slate-200 reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-6 py-5 grid grid-cols-2 md:grid-cols-4 divide-x divide-slate-200">
            <div class="px-6 text-center">
                <div class="text-2xl font-extrabold text-blue-900">6</div>
                <div class="text-xs text-slate-500 font-medium mt-0.5">Jenis Peralatan</div>
            </div>
            <div class="px-6 text-center">
                <div class="text-2xl font-extrabold text-blue-900">100%</div>
                <div class="text-xs text-slate-500 font-medium mt-0.5">Terkalibrasi</div>
            </div>
            <div class="px-6 text-center">
                <div class="text-2xl font-extrabold text-blue-900">SNI</div>
                <div class="text-xs text-slate-500 font-medium mt-0.5">Berstandar Nasional</div>
            </div>
            <div class="px-6 text-center">
                <div class="text-2xl font-extrabold text-blue-900">2026</div>
                <div class="text-xs text-slate-500 font-medium mt-0.5">Kalibrasi Terakhir</div>
            </div>
        </div>
    </section>

    <!-- Equipment Grid -->
    <section class="py-20 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Filter tabs -->
            <div class="flex flex-wrap gap-2 mb-10 reveal-on-scroll">
                <button onclick="filterAlat('semua')" id="btn-semua" class="filter-btn active-filter px-4 py-2 rounded-full text-sm font-semibold border transition-all">Semua</button>
                <button onclick="filterAlat('ukur')" id="btn-ukur" class="filter-btn px-4 py-2 rounded-full text-sm font-semibold border border-slate-200 text-slate-600 hover:border-blue-500 hover:text-blue-600 transition-all">Alat Ukur</button>
                <button onclick="filterAlat('uji')" id="btn-uji" class="filter-btn px-4 py-2 rounded-full text-sm font-semibold border border-slate-200 text-slate-600 hover:border-blue-500 hover:text-blue-600 transition-all">Alat Uji</button>
                <button onclick="filterAlat('safety')" id="btn-safety" class="filter-btn px-4 py-2 rounded-full text-sm font-semibold border border-slate-200 text-slate-600 hover:border-blue-500 hover:text-blue-600 transition-all">Keselamatan</button>
            </div>

            <!-- Grid Peralatan -->
            <div id="equipment-grid" class="grid sm:grid-cols-2 lg:grid-cols-3 gap-7 reveal-on-scroll delay-100">

                <!-- Card 1: Earth Resistance Tester -->
                <div class="alat-card" data-kategori="uji"
                     onclick="bukaPopup('Earth Resistance Tester', '/images/peralatan/earth-tester.png', 'Mengukur nilai resistansi pembumian (grounding) instalasi listrik. Digunakan untuk memastikan sistem proteksi petir dan grounding bekerja optimal sesuai PUIL 2011.', 'Digital Earth Resistance Tester', 'Megger DET14C', ['Rentang: 0.01O – 20kO', 'Tegangan uji: 25V & 50V', 'IP54 – Tahan debu & cipratan air', 'Kalibrasi: Januari 2026'])">
                    <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-slate-200 hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 cursor-pointer group">
                        <div class="relative h-52 bg-gradient-to-br from-slate-50 to-slate-100 overflow-hidden flex items-center justify-center p-6">
                            <img src="/images/peralatan/earth-tester.png" alt="Earth Resistance Tester" class="h-full w-full object-contain group-hover:scale-105 transition-transform duration-500">
                            <span class="absolute top-3 left-3 bg-blue-900 text-white text-xs font-bold px-2.5 py-1 rounded-full">Alat Uji</span>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end justify-center pb-4">
                                <span class="text-slate-900 dark:text-white text-xs font-semibold bg-black/40 backdrop-blur-sm px-3 py-1.5 rounded-full">?? Klik untuk detail</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="font-extrabold text-slate-900 mb-1">Earth Resistance Tester</h3>
                            <p class="text-xs text-slate-500 mb-3 leading-relaxed">Mengukur resistansi pembumian / grounding instalasi listrik untuk keamanan sistem.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-medium text-slate-600 dark:text-slate-400">Model: Megger DET14C</span>
                                <span class="text-xs font-bold text-green-600 bg-green-50 border border-green-200 px-2.5 py-0.5 rounded-full">? Terkalibrasi</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Insulation Resistance Tester -->
                <div class="alat-card" data-kategori="uji"
                     onclick="bukaPopup('Insulation Resistance Tester', '/images/peralatan/insulation-tester.png', 'Mengukur nilai tahanan isolasi kabel, peralatan listrik, dan motor. Memastikan isolasi tidak bocor dan aman dari risiko hubung singkat atau kebakaran.', 'Megohmmeter / Insulation Tester', 'Model IRT-500', ['Tegangan uji: 250V / 500V / 1000V / 2500V', 'Rentang: 0.1MO – 2000MO', 'Fungsi DAR & PI test', 'Kalibrasi: Februari 2026'])">
                    <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-slate-200 hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 cursor-pointer group">
                        <div class="relative h-52 bg-gradient-to-br from-red-50 to-slate-100 overflow-hidden flex items-center justify-center p-6">
                            <img src="/images/peralatan/insulation-tester.png" alt="Insulation Resistance Tester" class="h-full w-full object-contain group-hover:scale-105 transition-transform duration-500">
                            <span class="absolute top-3 left-3 bg-blue-900 text-white text-xs font-bold px-2.5 py-1 rounded-full">Alat Uji</span>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end justify-center pb-4">
                                <span class="text-slate-900 dark:text-white text-xs font-semibold bg-black/40 backdrop-blur-sm px-3 py-1.5 rounded-full">?? Klik untuk detail</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="font-extrabold text-slate-900 mb-1">Insulation Resistance Tester</h3>
                            <p class="text-xs text-slate-500 mb-3 leading-relaxed">Mengukur tahanan isolasi kabel & peralatan listrik untuk mencegah kebocoran arus.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-medium text-slate-600 dark:text-slate-400">Model: IRT-500</span>
                                <span class="text-xs font-bold text-green-600 bg-green-50 border border-green-200 px-2.5 py-0.5 rounded-full">? Terkalibrasi</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Clamp Meter -->
                <div class="alat-card" data-kategori="ukur"
                     onclick="bukaPopup('Clamp Meter / Tang Ampere', '/images/peralatan/clamp-meter.png', 'Mengukur arus listrik AC/DC tanpa memutus rangkaian. Sangat berguna untuk pengukuran beban listrik pada panel distribusi, kabel, dan peralatan yang sedang beroperasi.', 'Digital Clamp Meter True RMS', 'Voltech VT-760 Pro', ['Rentang arus: 0 – 1000A AC/DC', 'Rentang tegangan: 0 – 1000V AC/DC', 'Fitur NCV & data hold', 'Kalibrasi: Maret 2026'])">
                    <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-slate-200 hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 cursor-pointer group">
                        <div class="relative h-52 bg-gradient-to-br from-blue-50 to-slate-100 overflow-hidden flex items-center justify-center p-6">
                            <img src="/images/peralatan/clamp-meter.png" alt="Clamp Meter" class="h-full w-full object-contain group-hover:scale-105 transition-transform duration-500">
                            <span class="absolute top-3 left-3 bg-blue-500 text-slate-900 dark:text-white text-xs font-bold px-2.5 py-1 rounded-full">Alat Ukur</span>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end justify-center pb-4">
                                <span class="text-slate-900 dark:text-white text-xs font-semibold bg-black/40 backdrop-blur-sm px-3 py-1.5 rounded-full">?? Klik untuk detail</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="font-extrabold text-slate-900 mb-1">Clamp Meter (Tang Ampere)</h3>
                            <p class="text-xs text-slate-500 mb-3 leading-relaxed">Mengukur arus AC/DC tanpa memutus rangkaian pada panel & beban listrik.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-medium text-slate-600 dark:text-slate-400">Model: VT-760 Pro</span>
                                <span class="text-xs font-bold text-green-600 bg-green-50 border border-green-200 px-2.5 py-0.5 rounded-full">? Terkalibrasi</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Power Quality Analyzer -->
                <div class="alat-card" data-kategori="ukur"
                     onclick="bukaPopup('Power Quality Analyzer', '/images/peralatan/power-quality-analyzer.png', 'Menganalisis kualitas daya listrik secara komprehensif, termasuk harmonisa, fluktuasi tegangan, faktor daya, dan gangguan transien. Digunakan untuk audit energi dan evaluasi kualitas sistem kelistrikan.', 'Power Quality & Energy Analyzer', 'Fluke 1777-B', ['Pengukuran 3 fase', 'Analisis harmonisa s/d orde 50', 'Rekam data hingga 600 jam', 'Kalibrasi: Januari 2026'])">
                    <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-slate-200 hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 cursor-pointer group">
                        <div class="relative h-52 bg-gradient-to-br from-slate-50 to-blue-50 overflow-hidden flex items-center justify-center p-6">
                            <img src="/images/peralatan/power-quality-analyzer.png" alt="Power Quality Analyzer" class="h-full w-full object-contain group-hover:scale-105 transition-transform duration-500">
                            <span class="absolute top-3 left-3 bg-blue-500 text-slate-900 dark:text-white text-xs font-bold px-2.5 py-1 rounded-full">Alat Ukur</span>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end justify-center pb-4">
                                <span class="text-slate-900 dark:text-white text-xs font-semibold bg-black/40 backdrop-blur-sm px-3 py-1.5 rounded-full">?? Klik untuk detail</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="font-extrabold text-slate-900 mb-1">Power Quality Analyzer</h3>
                            <p class="text-xs text-slate-500 mb-3 leading-relaxed">Menganalisis kualitas daya listrik: harmonisa, tegangan, faktor daya & transien.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-medium text-slate-600 dark:text-slate-400">Model: Fluke 1777-B</span>
                                <span class="text-xs font-bold text-green-600 bg-green-50 border border-green-200 px-2.5 py-0.5 rounded-full">? Terkalibrasi</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 5: Thermal Camera -->
                <div class="alat-card" data-kategori="uji"
                     onclick="bukaPopup('Thermal Imaging Camera', '/images/peralatan/thermal-camera.png', 'Kamera termal infrared untuk mendeteksi titik panas (hot spot) pada panel listrik, kabel, dan sambungan tanpa kontak langsung. Sangat efektif untuk inspeksi preventif dan deteksi dini potensi kebakaran.', 'Infrared Thermal Camera', 'FLIR E75', ['Resolusi IR: 320×240 piksel', 'Rentang suhu: -20°C s/d 650°C', 'Akurasi: ±2°C atau ±2%', 'Kalibrasi: April 2026'])">
                    <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-slate-200 hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 cursor-pointer group">
                        <div class="relative h-52 bg-gradient-to-br from-blue-50 to-slate-100 overflow-hidden flex items-center justify-center p-6">
                            <img src="/images/peralatan/thermal-camera.png" alt="Thermal Camera" class="h-full w-full object-contain group-hover:scale-105 transition-transform duration-500">
                            <span class="absolute top-3 left-3 bg-blue-900 text-white text-xs font-bold px-2.5 py-1 rounded-full">Alat Uji</span>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end justify-center pb-4">
                                <span class="text-slate-900 dark:text-white text-xs font-semibold bg-black/40 backdrop-blur-sm px-3 py-1.5 rounded-full">?? Klik untuk detail</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="font-extrabold text-slate-900 mb-1">Thermal Imaging Camera</h3>
                            <p class="text-xs text-slate-500 mb-3 leading-relaxed">Mendeteksi titik panas (hot spot) pada panel listrik & instalasi tanpa kontak langsung.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-medium text-slate-600 dark:text-slate-400">Model: FLIR E75</span>
                                <span class="text-xs font-bold text-green-600 bg-green-50 border border-green-200 px-2.5 py-0.5 rounded-full">? Terkalibrasi</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 6: Digital Multimeter -->
                <div class="alat-card" data-kategori="ukur"
                     onclick="bukaPopup('Digital Multimeter', '/images/peralatan/multimeter.png', 'Alat ukur serbaguna untuk mengukur tegangan, arus, dan hambatan listrik. Digunakan pada seluruh tahapan inspeksi instalasi pemanfaatan tenaga listrik tegangan rendah.', 'Digital Multimeter True RMS', 'Fluke 87V', ['Tegangan AC/DC: 0 – 1000V', 'Arus: 0 – 10A', 'Hambatan: 0 – 50MO', 'Kalibrasi: Maret 2026'])">
                    <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-slate-200 hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 cursor-pointer group">
                        <div class="relative h-52 bg-gradient-to-br from-red-50 to-slate-100 overflow-hidden flex items-center justify-center p-6">
                            <img src="/images/peralatan/multimeter.png" alt="Digital Multimeter" class="h-full w-full object-contain group-hover:scale-105 transition-transform duration-500">
                            <span class="absolute top-3 left-3 bg-blue-500 text-slate-900 dark:text-white text-xs font-bold px-2.5 py-1 rounded-full">Alat Ukur</span>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end justify-center pb-4">
                                <span class="text-slate-900 dark:text-white text-xs font-semibold bg-black/40 backdrop-blur-sm px-3 py-1.5 rounded-full">?? Klik untuk detail</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="font-extrabold text-slate-900 mb-1">Digital Multimeter</h3>
                            <p class="text-xs text-slate-500 mb-3 leading-relaxed">Mengukur tegangan, arus, dan hambatan pada seluruh tahapan inspeksi instalasi listrik.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-medium text-slate-600 dark:text-slate-400">Model: Fluke 87V</span>
                                <span class="text-xs font-bold text-green-600 bg-green-50 border border-green-200 px-2.5 py-0.5 rounded-full">? Terkalibrasi</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- end grid -->

        </div>
    </section>

    <!-- Kalibrasi Info -->
    <section class="py-14 bg-white reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-gradient-to-r from-blue-900 to-slate-900 rounded-3xl p-8 md:p-10 flex flex-col md:flex-row items-center gap-8 text-white">
                <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                    <svg class="w-8 h-8 text-slate-900 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <div class="flex-1 text-center md:text-left">
                    <h3 class="text-xl font-extrabold mb-2">Kalibrasi Berkala & Tertelusur</h3>
                    <p class="text-slate-700 dark:text-slate-300 text-sm leading-relaxed">
                        Seluruh peralatan kami dikalibrasi secara berkala oleh laboratorium kalibrasi terakreditasi KAN.
                        Sertifikat kalibrasi dapat diminta pada saat proses inspeksi berlangsung.
                    </p>
                </div>
                <a href="{{ route('home') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3 rounded-xl transition shadow-lg flex-shrink-0 text-sm">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

    <!-- ===================== MODAL POPUP ===================== -->
    <div id="modal-alat" class="fixed inset-0 z-[9999] flex items-center justify-center p-4 hidden" onclick="tutupPopup(event)">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>
        <!-- Modal Box -->
        <div class="relative bg-white rounded-3xl shadow-2xl max-w-2xl w-full z-10 overflow-hidden max-h-[90vh] flex flex-col"
             onclick="event.stopPropagation()">
            <!-- Close button -->
            <button onclick="tutupPopup()" class="absolute top-4 right-4 z-20 w-9 h-9 bg-slate-100 hover:bg-slate-200 rounded-full flex items-center justify-center transition">
                <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <!-- Image area -->
            <div class="bg-gradient-to-br from-slate-100 to-slate-200 h-72 flex items-center justify-center p-8 flex-shrink-0">
                <img id="modal-img" src="" alt="" class="h-full w-full object-contain">
            </div>

            <!-- Content -->
            <div class="p-7 overflow-y-auto">
                <div class="flex items-start justify-between mb-1">
                    <h2 id="modal-nama" class="text-xl font-extrabold text-slate-900 leading-tight pr-10"></h2>
                </div>
                <p id="modal-tipe" class="text-xs text-blue-600 font-semibold uppercase tracking-wide mb-4"></p>
                <p id="modal-deskripsi" class="text-sm text-slate-600 leading-relaxed mb-5"></p>
                <div class="border-t border-slate-100 pt-5">
                    <h4 class="text-xs font-extrabold uppercase tracking-wide text-slate-600 dark:text-slate-400 mb-3">Spesifikasi Teknis</h4>
                    <ul id="modal-spesifikasi" class="space-y-2"></ul>
                </div>
            </div>
        </div>
    </div>

    <x-footer />

    <style>
        .active-filter {
            background-color: #1e3a5f;
            color: #fff;
            border-color: #1e3a5f;
        }
        #modal-alat.modal-open {
            animation: fadeInModal 0.25s ease;
        }
        @keyframes fadeInModal {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        #modal-alat .relative.bg-white {
            animation: slideUpModal 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        @keyframes slideUpModal {
            from { transform: translateY(40px) scale(0.95); opacity: 0; }
            to { transform: translateY(0) scale(1); opacity: 1; }
        }
    </style>

    <script>
        // Filter logic
        function filterAlat(kategori) {
            const cards = document.querySelectorAll('.alat-card');
            const btns = document.querySelectorAll('.filter-btn');
            btns.forEach(b => {
                b.classList.remove('active-filter');
                b.classList.add('border-slate-200', 'text-slate-600');
            });
            const activeBtn = document.getElementById('btn-' + kategori);
            activeBtn.classList.add('active-filter');
            activeBtn.classList.remove('border-slate-200', 'text-slate-600');

            cards.forEach(card => {
                if (kategori === 'semua' || card.dataset.kategori === kategori) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Modal logic
        function bukaPopup(nama, imgSrc, deskripsi, tipe, model, spesifikasi) {
            document.getElementById('modal-nama').textContent = nama;
            document.getElementById('modal-img').src = imgSrc;
            document.getElementById('modal-img').alt = nama;
            document.getElementById('modal-deskripsi').textContent = deskripsi;
            document.getElementById('modal-tipe').textContent = tipe + ' | Model: ' + model;

            const spekList = document.getElementById('modal-spesifikasi');
            spekList.innerHTML = '';
            spesifikasi.forEach(item => {
                const li = document.createElement('li');
                li.className = 'flex items-center gap-2.5 text-sm text-slate-700';
                li.innerHTML = `<span class="w-1.5 h-1.5 rounded-full bg-blue-500 flex-shrink-0"></span>${item}`;
                spekList.appendChild(li);
            });

            const modal = document.getElementById('modal-alat');
            modal.classList.remove('hidden');
            modal.classList.add('modal-open');
            document.body.style.overflow = 'hidden';
        }

        function tutupPopup(e) {
            if (e && e.target !== document.getElementById('modal-alat')) return;
            const modal = document.getElementById('modal-alat');
            modal.classList.add('hidden');
            modal.classList.remove('modal-open');
            document.body.style.overflow = '';
        }

        // Close on ESC
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') {
                const modal = document.getElementById('modal-alat');
                modal.classList.add('hidden');
                document.body.style.overflow = '';
            }
        });
    </script>
@endsection


