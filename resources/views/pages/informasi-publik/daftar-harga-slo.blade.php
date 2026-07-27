@extends('layouts.app')

@section('title', 'Daftar Harga SLO - PT Pradana Nusa Energi')

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
                DAFTAR HARGA SLO
            </h1>
            <p class="text-slate-300 max-w-2xl mx-auto text-base md:text-lg">
                Tarif Sertifikasi Laik Operasi yang ditetapkan sesuai dengan Peraturan Menteri ESDM yang berlaku, dihitung berdasarkan kapasitas daya terpasang.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Pricing Table -->
            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden reveal-on-scroll">
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-blue-900 text-white">
                                <th class="py-4 px-6 font-bold text-sm">Kelompok Daya (VA)</th>
                                <th class="py-4 px-6 font-bold text-sm">Tegangan Rendah (TR)</th>
                                <th class="py-4 px-6 font-bold text-sm">Tegangan Menengah (TM)</th>
                                <th class="py-4 px-6 font-bold text-sm">Pembangkit (Genset/PLTS)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-700">
                            <!-- Placeholder Rows - Adjust values based on actual regulation -->
                            <tr class="hover:bg-slate-50 transition">
                                <td class="py-4 px-6 font-semibold">450 - 900</td>
                                <td class="py-4 px-6">Rp 40.000 - Rp 60.000</td>
                                <td class="py-4 px-6 text-slate-400">-</td>
                                <td class="py-4 px-6 text-slate-400">-</td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition">
                                <td class="py-4 px-6 font-semibold">1.300 - 2.200</td>
                                <td class="py-4 px-6">Rp 85.000 - Rp 110.000</td>
                                <td class="py-4 px-6 text-slate-400">-</td>
                                <td class="py-4 px-6 text-slate-400">-</td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition">
                                <td class="py-4 px-6 font-semibold">3.500 - 5.500</td>
                                <td class="py-4 px-6">Rp 150.000 - Rp 220.000</td>
                                <td class="py-4 px-6 text-slate-400">-</td>
                                <td class="py-4 px-6">Rp 250.000</td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition">
                                <td class="py-4 px-6 font-semibold">6.600 - 11.000</td>
                                <td class="py-4 px-6">Rp 250.000 - Rp 350.000</td>
                                <td class="py-4 px-6 text-slate-400">-</td>
                                <td class="py-4 px-6">Rp 400.000</td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition">
                                <td class="py-4 px-6 font-semibold">13.200 - 33.000</td>
                                <td class="py-4 px-6">Rp 450.000 - Rp 850.000</td>
                                <td class="py-4 px-6 text-slate-400">-</td>
                                <td class="py-4 px-6">Rp 1.000.000</td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition">
                                <td class="py-4 px-6 font-semibold">41.500 - 197.000</td>
                                <td class="py-4 px-6">Rp 1.200.000 - Rp 4.500.000</td>
                                <td class="py-4 px-6">Mulai Rp 5.500.000</td>
                                <td class="py-4 px-6">Mulai Rp 6.000.000</td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition">
                                <td class="py-4 px-6 font-semibold">> 197.000 (Hubungi Kami)</td>
                                <td class="py-4 px-6 font-semibold text-blue-700 text-sm">Berdasarkan Quotation</td>
                                <td class="py-4 px-6 font-semibold text-blue-700 text-sm">Berdasarkan Quotation</td>
                                <td class="py-4 px-6 font-semibold text-blue-700 text-sm">Berdasarkan Quotation</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Note -->
            <div class="mt-8 bg-blue-50 border border-blue-200 rounded-2xl p-6 flex gap-4 items-start reveal-on-scroll delay-100">
                <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-bold text-blue-900 mb-1">Penting:</h4>
                    <p class="text-sm text-blue-700 leading-relaxed">
                        Harga di atas hanyalah ilustrasi dasar. Tarif aktual akan menyesuaikan dengan ketetapan <strong>Peraturan Menteri ESDM yang berlaku saat ini</strong>. Biaya transportasi akomodasi (transportasi, penginapan) untuk wilayah luar kota/pulau mungkin dikenakan biaya tambahan dan akan dicantumkan dalam Surat Penawaran (Quotation) resmi.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <x-footer />
@endsection
