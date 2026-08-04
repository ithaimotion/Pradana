@extends('layouts.admin')

@section('title', 'Kelola Footer Legal')

@section('content')

<div class="p-6 space-y-6">
    <div class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border border-slate-200 dark:border-slate-800 rounded-2xl p-6 shadow-xl">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-6">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Kelola Footer Legal</h1>
                <p class="text-sm text-slate-600 dark:text-slate-400 mt-1">Edit konten halaman Kebijakan Privasi, Syarat & Ketentuan, dan Kebijakan Cookie.</p>
            </div>
        </div>

        @if(session('success'))
            <x-admin.alert type="success" title="Berhasil" message="{{ session('success') }}" class="mb-6" />
        @endif

        <div class="grid gap-6 lg:grid-cols-2">
            @foreach(['privacy' => 'Kebijakan Privasi', 'terms' => 'Syarat & Ketentuan', 'cookie' => 'Kebijakan Cookie'] as $key => $label)
                <div class="bg-slate-50/80 dark:bg-slate-950/80 border border-slate-200 dark:border-slate-800 rounded-3xl p-6 shadow-xl">
                    <h2 class="text-xl font-semibold text-slate-900 dark:text-white mb-4">{{ $label }}</h2>
                    <form action="{{ route('admin.footer-legal.update') }}" method="POST" class="space-y-5">
                        @csrf
                        <input type="hidden" name="halaman" value="footer_legal">
                        <input type="hidden" name="kunci" value="{{ $key }}">

                        <div>
                            <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400 uppercase mb-2">Judul Halaman</label>
                            <input name="judul" type="text" value="{{ old('judul', optional($pages[$key] ?? null)->judul ?? $label) }}" class="w-full bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-3 text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400 uppercase mb-2">Konten / Deskripsi</label>
                            <textarea id="footer-legal-{{ $key }}" name="konten" rows="10" class="footer-legal-editor w-full bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 rounded-3xl p-4 text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500" style="min-height: 260px;">{{ old('konten', optional($pages[$key] ?? null)->konten ?? '') }}</textarea>
                        </div>

                        <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-4 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold transition">
                            Simpan {{ $label }}
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</div>

@push('styles')
<style>
    .tox-tinymce {
        border-radius: 1rem !important;
        background: #0f172a !important;
    }

    .tox .tox-toolbar,
    .tox .tox-menubar,
    .tox .tox-statusbar {
        background: #111827 !important;
        color: #f8fafc !important;
        border-color: #1f2937 !important;
    }

    .tox .tox-tbtn {
        color: #e2e8f0 !important;
    }

    .tox .tox-tbtn:hover,
    .tox .tox-tbtn:focus {
        background: #1f2937 !important;
    }

    .tox .tox-editor-container {
        background: #0f172a !important;
    }

    .tox .tox-edit-area {
        background: #0f172a !important;
        color: #f8fafc !important;
    }

    .tox .tox-edit-area iframe {
        background: #0f172a !important;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    window.addEventListener('DOMContentLoaded', function () {
        tinymce.init({
            selector: '.footer-legal-editor',
            height: 360,
            menubar: false,
            plugins: 'lists link code autoresize',
            toolbar: 'undo redo | bold italic underline strikethrough | numlist bullist | blockquote | link | removeformat | code',
            branding: false,
            toolbar_mode: 'wrap',
            content_style: 'body { font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; font-size: 14px; color: #f8fafc; background-color: #0f172a; } a { color: #93c5fd; }',
            setup: function (editor) {
                editor.on('init', function () {
                    editor.getContainer().style.borderRadius = '1rem';
                });
            }
        });
    });
</script>
@endpush
@endsection
