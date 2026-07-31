@extends('layouts.app')

@section('title', 'Keluhan & Banding - PT Pradana Nusa Energi')

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
                KELUHAN & BANDING
            </h1>
            <p class="text-slate-700 dark:text-slate-300 max-w-2xl mx-auto text-base md:text-lg">
                Formulir pengajuan keluhan dan banding untuk menjamin kepuasan pelanggan dan perbaikan mutu layanan kami.
            </p>
        </div>
    </section>

    <!-- Alur Section -->
    <section class="py-16 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-2xl font-extrabold text-slate-900 mb-4">Alur Keluhan & Banding</h2>
            </div>
            
            @if(optional($setting)->url_gambar)
                <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-4 overflow-hidden max-w-4xl mx-auto">
                    <img src="{{ optional($setting)->url_gambar }}" alt="Alur Keluhan & Banding" class="w-full h-auto rounded-2xl">
                </div>
            @else
                <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-12 flex items-center justify-center min-h-[400px] max-w-4xl mx-auto">
                    <p class="text-slate-600 dark:text-slate-400 text-center">Belum ada gambar alur keluhan & banding yang tersedia.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Form Section -->
    <section class="py-16 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-2xl font-extrabold text-slate-900 mb-4">Formulir Keluhan & Banding</h2>
                <p class="text-slate-600 max-w-2xl mx-auto">Silakan isi formulir di bawah ini untuk mengajukan keluhan atau banding. Kami akan menindaklanjuti secepat mungkin.</p>
            </div>

            <div class="max-w-2xl mx-auto">
                <form action="{{ route('informasi-publik.keluhan-banding.submit') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    @if(session('success'))
                        <div class="bg-green-50 border border-green-200 rounded-xl p-4 text-green-800 text-sm">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Data Perusahaan -->
                    <div class="bg-slate-50 rounded-xl p-6">
                        <h3 class="text-lg font-bold text-slate-900 border-b border-slate-200 pb-3 mb-6">Data Perusahaan</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Perusahaan *</label>
                                <input type="text" name="nama_perusahaan" required class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition" placeholder="Masukkan Nama Perusahaan">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Kota *</label>
                                <input type="text" name="kota" required class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition" placeholder="Masukkan Kota">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">No. Telepon Perusahaan *</label>
                                <input type="tel" name="telepon_perusahaan" required class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition" placeholder="Masukkan No. Telepon">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Email Perusahaan *</label>
                                <input type="email" name="email_perusahaan" required class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition" placeholder="Masukkan Email Perusahaan">
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Alamat *</label>
                                <textarea name="alamat" required rows="2" class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition resize-none" placeholder="Masukkan Alamat Perusahaan"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Data Perwakilan -->
                    <div class="bg-slate-50 rounded-xl p-6">
                        <h3 class="text-lg font-bold text-slate-900 border-b border-slate-200 pb-3 mb-6">Data Perwakilan</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Perwakilan *</label>
                                <input type="text" name="nama_perwakilan" required class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition" placeholder="Masukkan Nama Perwakilan">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Jabatan *</label>
                                <input type="text" name="jabatan" required class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition" placeholder="Masukkan Jabatan">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">No. HP Perwakilan *</label>
                                <input type="tel" name="telepon_perwakilan" required class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition" placeholder="Masukkan No. Telepon/HP">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Email Perwakilan *</label>
                                <input type="email" name="email_perwakilan" required class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition" placeholder="Masukkan Email Perwakilan">
                            </div>
                        </div>
                    </div>

                    <!-- Rincian Keluhan / Banding -->
                    <div class="bg-slate-50 rounded-xl p-6 space-y-6">
                        <h3 class="text-lg font-bold text-slate-900 border-b border-slate-200 pb-3">Rincian Keluhan / Banding</h3>
                        
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Rincian Keluhan / Banding *</label>
                            <textarea name="rincian_keluhan" required rows="6" class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition resize-none" placeholder="Masukkan rincian keluhan atau banding Anda dengan detail..."></textarea>
                        </div>
                    </div>

                    <!-- Upload Dokumen Pendukung -->
                    <div class="bg-slate-50 rounded-xl p-6 space-y-6">
                        <h3 class="text-lg font-bold text-slate-900 border-b border-slate-200 pb-3">Upload Dokumen Pendukung</h3>
                        
                        <div class="border-2 border-dashed border-slate-300 rounded-xl p-8 text-center hover:border-blue-500 transition cursor-pointer">
                            <input type="file" name="dokumen_pendukung" accept=".pdf,.jpg,.jpeg,.png" class="w-full text-sm text-slate-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-600 file:text-white hover:file:bg-blue-700">
                            <p class="text-xs text-slate-500 mt-2">PDF, JPG, PNG (Max: 2MB)</p>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl transition shadow-lg shadow-blue-600/20 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                        Kirim Pengajuan
                    </button>
                </form>
            </div>
        </div>
    </section>

    <x-footer />
@endsection


