@extends('layouts.admin')

@section('title', 'Kelola Footer Links')

@section('content')
<div class="space-y-6 p-6">
    <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 shadow-xl">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-6">
            <div>
                <h1 class="text-2xl font-bold text-white">Kelola Footer Links</h1>
                <p class="text-sm text-slate-400 mt-1">Buat dan edit tautan legal, sosial, dan informasi yang muncul di footer.</p>
            </div>
            <a href="{{ route('admin.footer-links.create') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-orange-500 hover:bg-orange-600 text-white text-sm font-semibold transition">
                Tambah Link Footer
            </a>
        </div>

        @if(session('success'))
            <x-admin.alert type="success" title="Berhasil" message="{{ session('success') }}" class="mb-6" />
        @endif

        <div class="space-y-4">
            @forelse($footerLinks as $link)
                <div class="bg-slate-950/80 border border-slate-800 rounded-2xl p-4 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                    <div>
                        <div class="text-sm text-slate-400 uppercase tracking-widest mb-1">{{ ucfirst($link->tipe) }}</div>
                        <div class="text-base font-semibold text-white">{{ $link->label }}</div>
                        <a href="{{ $link->url }}" target="_blank" class="text-sm text-slate-400 hover:text-orange-400 transition">{{ $link->url }}</a>
                    </div>
                    <div class="flex flex-wrap items-center gap-2 text-xs text-slate-300">
                        <span class="px-2 py-1 rounded-full bg-slate-800 border border-slate-700">Urutan: {{ $link->urutan }}</span>
                        <span class="px-2 py-1 rounded-full {{ $link->aktif ? 'bg-emerald-500/10 text-emerald-300 border border-emerald-500/20' : 'bg-rose-500/10 text-rose-300 border border-rose-500/20' }}">
                            {{ $link->aktif ? 'Aktif' : 'Non-aktif' }}
                        </span>
                        <a href="{{ route('admin.footer-links.edit', $link) }}" class="px-3 py-1 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 transition">Edit</a>
                        <form action="{{ route('admin.footer-links.destroy', $link) }}" method="POST" onsubmit="return confirm('Hapus link footer ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 rounded-xl bg-rose-500/10 hover:bg-rose-500/20 text-rose-300 transition">Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="bg-slate-950/80 border border-dashed border-slate-800 rounded-2xl p-10 text-center text-slate-500">
                    Belum ada tautan footer. Tambahkan tautan legal, sosial, atau informasi terlebih dahulu.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
