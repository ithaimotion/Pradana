@extends('layouts.admin')

@section('title', 'Kelola Peralatan Ketenagalistrikan')

@section('content')
<div class="space-y-6">
    <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 shadow-xl">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-amber-400"></span>
                    Kelola Peralatan Ketenagalistrikan
                </h2>
                <p class="text-xs text-slate-400 mt-1">Kelola data peralatan inspeksi dan kalibrasi PT Pradana Nusa Energi</p>
            </div>
            <a href="{{ route('admin.profil.peralatan.create') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Peralatan
            </a>
        </div>

        @if(session('success'))
            <x-admin.alert type="success" title="Berhasil" message="{{ session('success') }}" class="mb-6" />
        @endif

        @if($peralatan->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-slate-700">
                            <th class="text-left py-3 px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Gambar</th>
                            <th class="text-left py-3 px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Nama</th>
                            <th class="text-left py-3 px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Kategori</th>
                            <th class="text-left py-3 px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Model</th>
                            <th class="text-left py-3 px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Status Kalibrasi</th>
                            <th class="text-left py-3 px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Urutan</th>
                            <th class="text-left py-3 px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Status</th>
                            <th class="text-left py-3 px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($peralatan as $item)
                            <tr class="border-b border-slate-800 hover:bg-slate-800/50 transition">
                                <td class="py-3 px-4">
                                    @if($item->gambar)
                                        <img src="{{ asset('/storage_public/' . $item->gambar) }}" alt="{{ $item->nama }}" class="w-12 h-12 object-cover rounded-lg">
                                    @else
                                        <div class="w-12 h-12 bg-slate-700 rounded-lg flex items-center justify-center">
                                            <svg class="w-6 h-6 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                </td>
                                <td class="py-3 px-4">
                                    <div class="text-sm font-medium text-white">{{ $item->nama ?? '-' }}</div>
                                    <div class="text-xs text-slate-400">{{ Str::limit($item->deskripsi_singkat ?? '-', 50) }}</div>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="px-2 py-1 rounded text-xs font-bold 
                                        {{ $item->kategori === 'ukur' ? 'bg-blue-900 text-blue-200' : 
                                           ($item->kategori === 'uji' ? 'bg-green-900 text-green-200' : 
                                           ($item->kategori === 'safety' ? 'bg-orange-900 text-orange-200' : 'bg-slate-700 text-slate-300')) }}">
                                        {{ ucfirst($item->kategori ?? '-') }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-sm text-slate-300">{{ $item->model ?? '-' }}</td>
                                <td class="py-3 px-4">
                                    <span class="px-2 py-1 rounded text-xs font-bold {{ $item->status_kalibrasi === 'Terkalibrasi' ? 'bg-green-900 text-green-200' : 'bg-red-900 text-red-200' }}">
                                        {{ $item->status_kalibrasi ?? '-' }}
                                    </span>
                                    @if($item->tanggal_kalibrasi)
                                        <div class="text-xs text-slate-500 mt-1">{{ $item->tanggal_kalibrasi->format('M Y') }}</div>
                                    @endif
                                </td>
                                <td class="py-3 px-4 text-sm text-slate-300">{{ $item->urutan ?? 0 }}</td>
                                <td class="py-3 px-4">
                                    <span class="px-2 py-1 rounded text-xs font-bold {{ $item->status_aktif ? 'bg-green-900 text-green-200' : 'bg-red-900 text-red-200' }}">
                                        {{ $item->status_aktif ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.profil.peralatan.edit', $item->id) }}" class="p-2 rounded-lg bg-blue-600/20 text-blue-400 hover:bg-blue-600/30 transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.profil.peralatan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus peralatan ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 rounded-lg bg-red-600/20 text-red-400 hover:bg-red-600/30 transition">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="bg-slate-950/40 border border-slate-800 rounded-xl p-12 text-center">
                <div class="flex flex-col items-center gap-4">
                    <svg class="w-16 h-16 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-1">Belum Ada Peralatan</h3>
                        <p class="text-sm text-slate-400">Mulai dengan menambahkan peralatan ketenagalistrikan baru</p>
                    </div>
                    <a href="{{ route('admin.profil.peralatan.create') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2.5 rounded-lg text-sm font-medium transition">
                        Tambah Peralatan Sekarang
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
