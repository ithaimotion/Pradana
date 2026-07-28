@extends('layouts.app')

@section('title', 'Keluhan & Banding - PT Pradana Nusa Energi')

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
                KELUHAN & BANDING
            </h1>
            <p class="text-slate-300 max-w-2xl mx-auto text-base md:text-lg">
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
            
            @if(isset($setting) && $setting->url_gambar)
                <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-4 overflow-hidden max-w-4xl mx-auto">
                    <img src="{{ $setting->url_gambar }}" alt="Alur Keluhan & Banding" class="w-full h-auto rounded-2xl">
                </div>
            @else
                <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-12 flex items-center justify-center min-h-[400px] max-w-4xl mx-auto">
                    <p class="text-slate-400 text-center">Belum ada gambar alur keluhan & banding yang tersedia.</p>
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
                <form action="{{ route('informasi-publik.keluhan-banding.submit') }}" method="POST" class="space-y-6">
                    @csrf

                    @if(session('success'))
                        <div class="bg-green-50 border border-green-200 rounded-xl p-4 text-green-800 text-sm">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap *</label>
                            <input type="text" name="nama" required class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20 transition" placeholder="Masukkan nama lengkap">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Email *</label>
                            <input type="email" name="email" required class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20 transition" placeholder="Masukkan email">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Nomor Telepon</label>
                        <input type="tel" name="telepon" class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20 transition" placeholder="Masukkan nomor telepon (opsional)">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Jenis Pengajuan *</label>
                        <select name="jenis" required class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20 transition">
                            <option value="">Pilih jenis pengajuan</option>
                            <option value="keluhan">Keluhan</option>
                            <option value="banding">Banding</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Pesan / Keluhan / Banding *</label>
                        <textarea name="pesan" required rows="6" class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20 transition resize-none" placeholder="Jelaskan detail keluhan atau banding Anda secara lengkap..."></textarea>
                    </div>

                    <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-4 rounded-xl transition shadow-lg shadow-orange-500/20 flex items-center justify-center gap-2">
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
