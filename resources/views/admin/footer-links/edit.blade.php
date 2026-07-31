@extends('layouts.admin')

@section('title', 'Edit Link Footer')

@section('content')
<div class="space-y-6 p-6">
    <div class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border border-slate-200 dark:border-slate-800 rounded-2xl p-6 shadow-xl max-w-3xl mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Edit Link Footer</h1>
            <p class="text-sm text-slate-600 dark:text-slate-400 mt-1">Perbarui tautan footer dan tampilkan atau sembunyikan sesuai kebutuhan.</p>
        </div>

        @if($errors->any())
            <x-admin.alert type="error" title="Periksa kembali" message="{{ $errors->first() }}" class="mb-6" />
        @endif

        <form action="{{ route('admin.footer-links.update', $footerLink) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid gap-6 md:grid-cols-2">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase mb-2">Label</label>
                    <input name="label" value="{{ old('label', $footerLink->label) }}" type="text" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500" placeholder="Contoh: Kebijakan Privasi">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase mb-2">URL</label>
                    <input name="url" value="{{ old('url', $footerLink->url) }}" type="url" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500" placeholder="https://example.com">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase mb-2">Tipe Link</label>
                    <select name="tipe" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
                        <option value="legal" {{ old('tipe', $footerLink->tipe) === 'legal' ? 'selected' : '' }}>Legal</option>
                        <option value="sosial" {{ old('tipe', $footerLink->tipe) === 'sosial' ? 'selected' : '' }}>Sosial</option>
                        <option value="info" {{ old('tipe', $footerLink->tipe) === 'info' ? 'selected' : '' }}>Informasi</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase mb-2">Urutan</label>
                    <input name="urutan" value="{{ old('urutan', $footerLink->urutan) }}" type="number" min="0" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
                </div>
            </div>

            <div class="flex items-center gap-3">
                <label class="flex items-center gap-2 text-sm text-slate-700 dark:text-slate-300">
                    <input type="checkbox" name="aktif" {{ old('aktif', $footerLink->aktif) ? 'checked' : '' }} class="w-4 h-4 rounded border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-950 text-blue-600 focus:ring-blue-500">
                    Aktifkan link
                </label>
            </div>

            <div class="flex justify-between gap-3 pt-4 border-t border-slate-200 dark:border-slate-800">
                <a href="{{ route('admin.footer-links.index') }}" class="px-4 py-2 text-sm text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-800 rounded-xl hover:bg-slate-700 transition">Kembali</a>
                <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl text-sm font-semibold transition">Perbarui</button>
            </div>
        </form>
    </div>
</div>
@endsection
