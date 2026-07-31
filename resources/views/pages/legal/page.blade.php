@extends('layouts.app')

@section('title', ($content->judul ?? 'Halaman Legal') . ' - PT Pradana Nusa Energi')

@section('content')
    <x-navbar />

    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-6xl mx-auto px-6 text-center reveal-scale">
            <span class="inline-block bg-blue-600/20 text-blue-500 border border-blue-500/30 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-4 backdrop-blur-md">
                Halaman Legal
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">{{ $content->judul ?? 'Halaman Legal' }}</h1>
            <p class="text-slate-700 dark:text-slate-300 max-w-3xl mx-auto text-base md:text-lg">
                {{ $content->konten ? \Illuminate\Support\Str::limit(strip_tags($content->konten), 160) : 'Informasi hukuman dan kebijakan PT Pradana Nusa Energi terkait privasi, syarat penggunaan, dan cookie.' }}
            </p>
        </div>
    </section>

    <section class="py-16 bg-slate-50">
        <div class="max-w-4xl mx-auto px-6">
            <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-10">
                @if($content->konten)
                    <div class="legal-content max-w-none">
                        {!! $content->konten !!}
                    </div>
                @else
                    <div class="text-slate-600">
                        <p>Konten untuk halaman ini belum dibuat. Silakan isi melalui panel admin.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <x-footer />
@endsection
