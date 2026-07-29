@extends('layouts.admin')

@section('title', 'Kelola Pengaturan Karir')

@section('content')
<div class="p-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-white">Kelola: Pengaturan Karir</h1>
        <p class="text-slate-400 mt-1">Kelola konten halaman karir termasuk deskripsi, benefit, dan statistik</p>
    </div>

    @if(session('success'))
        <x-admin.alert type="success" title="Berhasil" message="{{ session('success') }}" class="mb-6" />
    @endif

    <form action="{{ route('admin.karir-settings.update') }}" method="POST" class="space-y-8">
        @csrf

        <!-- Description -->
        <div class="bg-slate-800 rounded-xl border border-slate-700 p-6">
            <h3 class="text-lg font-bold text-white mb-4">Deskripsi Halaman</h3>
            <div>
                <label class="block text-slate-300 text-sm font-medium mb-2">Deskripsi Mengapa Bergabung</label>
                <textarea 
                    name="description" 
                    rows="3"
                    class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-3 text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                    placeholder="Masukkan deskripsi mengapa kandidat harus bergabung"
                >{{ $karirSettings->description ?? 'Sebagai Lembaga Inspeksi Teknik (LIT) yang terus berkembang, kami mencari individu yang berintegritas tinggi, kompeten, dan memiliki semangat belajar.' }}</textarea>
            </div>
        </div>

        <!-- Benefits -->
        <div class="bg-slate-800 rounded-xl border border-slate-700 p-6">
            <h3 class="text-lg font-bold text-white mb-4">Benefit Bergabung</h3>
            <div id="benefits-container" class="space-y-4">
                @if($karirSettings && $karirSettings->benefits)
                    @foreach($karirSettings->benefits as $index => $benefit)
                        <div class="benefit-item bg-slate-700 rounded-lg p-4 space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-slate-400 text-sm">Benefit #{{ $index + 1 }}</span>
                                <button type="button" onclick="removeBenefit(this)" class="text-red-400 hover:text-red-300 text-sm">Hapus</button>
                            </div>
                            <input type="text" name="benefits[{{ $index }}][title]" value="{{ $benefit['title'] ?? '' }}" class="w-full bg-slate-600 border border-slate-500 rounded-lg px-4 py-2 text-white text-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Judul benefit">
                            <textarea name="benefits[{{ $index }}][description]" rows="2" class="w-full bg-slate-600 border border-slate-500 rounded-lg px-4 py-2 text-white text-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Deskripsi benefit">{{ $benefit['description'] ?? '' }}</textarea>
                            <input type="text" name="benefits[{{ $index }}][icon]" value="{{ $benefit['icon'] ?? '' }}" class="w-full bg-slate-600 border border-slate-500 rounded-lg px-4 py-2 text-white text-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="SVG icon path (optional)">
                        </div>
                    @endforeach
                @endif
            </div>
            <button type="button" onclick="addBenefit()" class="mt-4 flex items-center gap-2 text-teal-400 hover:text-teal-300 text-sm font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Benefit
            </button>
        </div>

        <!-- Statistics -->
        <div class="bg-slate-800 rounded-xl border border-slate-700 p-6">
            <h3 class="text-lg font-bold text-white mb-4">Statistik Perusahaan</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-slate-300 text-sm font-medium mb-2">Tahun Pengalaman</label>
                    <input 
                        type="text" 
                        name="years_experience" 
                        value="{{ $karirSettings->years_experience ?? '10+' }}"
                        class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-3 text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                        placeholder="10+"
                    >
                </div>
                <div>
                    <label class="block text-slate-300 text-sm font-medium mb-2">Proyek Selesai</label>
                    <input 
                        type="text" 
                        name="projects_completed" 
                        value="{{ $karirSettings->projects_completed ?? '500+' }}"
                        class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-3 text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                        placeholder="500+"
                    >
                </div>
                <div>
                    <label class="block text-slate-300 text-sm font-medium mb-2">Tim Profesional</label>
                    <input 
                        type="text" 
                        name="team_professionals" 
                        value="{{ $karirSettings->team_professionals ?? '50+' }}"
                        class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-3 text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                        placeholder="50+"
                    >
                </div>
                <div>
                    <label class="block text-slate-300 text-sm font-medium mb-2">Kota Layanan</label>
                    <input 
                        type="text" 
                        name="cities_served" 
                        value="{{ $karirSettings->cities_served ?? '30+' }}"
                        class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-3 text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                        placeholder="30+"
                    >
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="px-6 py-3 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition-colors">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<script>
    let benefitIndex = {{ $karirSettings && $karirSettings->benefits ? count($karirSettings->benefits) : 0 }};

    function addBenefit() {
        const container = document.getElementById('benefits-container');
        const benefitHtml = `
            <div class="benefit-item bg-slate-700 rounded-lg p-4 space-y-3">
                <div class="flex justify-between items-center">
                    <span class="text-slate-400 text-sm">Benefit #${benefitIndex + 1}</span>
                    <button type="button" onclick="removeBenefit(this)" class="text-red-400 hover:text-red-300 text-sm">Hapus</button>
                </div>
                <input type="text" name="benefits[${benefitIndex}][title]" class="w-full bg-slate-600 border border-slate-500 rounded-lg px-4 py-2 text-white text-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Judul benefit">
                <textarea name="benefits[${benefitIndex}][description]" rows="2" class="w-full bg-slate-600 border border-slate-500 rounded-lg px-4 py-2 text-white text-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Deskripsi benefit"></textarea>
                <input type="text" name="benefits[${benefitIndex}][icon]" class="w-full bg-slate-600 border border-slate-500 rounded-lg px-4 py-2 text-white text-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="SVG icon path (optional)">
            </div>
        `;
        container.insertAdjacentHTML('beforeend', benefitHtml);
        benefitIndex++;
    }

    function removeBenefit(button) {
        button.closest('.benefit-item').remove();
    }
</script>
@endsection
