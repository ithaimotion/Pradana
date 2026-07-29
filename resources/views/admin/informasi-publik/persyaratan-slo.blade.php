@extends('layouts.admin')

@section('title', 'Persyaratan SLO - Admin')

@section('content')
<div class="p-6">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-white">Kelola: Persyaratan SLO</h1>
            <p class="text-xs text-slate-400 mt-1">Kelola dokumen & daftar kelengkapan syarat permohonan SLO</p>
        </div>
    </div>

    @if(session('success'))
        <x-admin.alert type="success" title="Berhasil" message="{{ session('success') }}" class="mb-6" />
    @endif

    <form action="{{ route('admin.informasi-publik.persyaratan-slo.update') }}" method="POST" class="space-y-8">
        @csrf

        <!-- Tegangan Rendah -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6">
            <h2 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                <span class="text-2xl text-orange-400"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg></span>
                Tegangan Rendah
            </h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Persyaratan Administrasi</label>
                    <div class="space-y-2" id="tr-admin-container">
                        @if($persyaratan && $persyaratan->tr_admin)
                            @foreach($persyaratan->tr_admin as $index => $item)
                                <div class="flex gap-2">
                                    <input type="text" name="tr_admin[{{ $index }}]" value="{{ $item }}" class="flex-1 bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-orange-500">
                                    <button type="button" onclick="removeItem(this)" class="bg-rose-500/20 text-rose-400 hover:bg-rose-500/30 px-3 rounded-lg text-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 6l12 12M18 6L6 18"></path></svg></button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <button type="button" onclick="addItem('tr-admin-container', 'tr_admin')" class="mt-2 text-xs text-orange-400 hover:text-orange-300">+ Tambah Item</button>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Persyaratan Teknis</label>
                    <div class="space-y-2" id="tr-teknis-container">
                        @if($persyaratan && $persyaratan->tr_teknis)
                            @foreach($persyaratan->tr_teknis as $index => $item)
                                <div class="flex gap-2">
                                    <input type="text" name="tr_teknis[{{ $index }}]" value="{{ $item }}" class="flex-1 bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-orange-500">
                                    <button type="button" onclick="removeItem(this)" class="bg-rose-500/20 text-rose-400 hover:bg-rose-500/30 px-3 rounded-lg text-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 6l12 12M18 6L6 18"></path></svg></button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <button type="button" onclick="addItem('tr-teknis-container', 'tr_teknis')" class="mt-2 text-xs text-orange-400 hover:text-orange-300">+ Tambah Item</button>
                </div>
            </div>
        </div>

        <!-- Tegangan Menengah -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6">
            <h2 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                <span class="text-2xl text-slate-400"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 20h16M6 20V8m6 12V4m6 16v-8"></path></svg></span>
                Tegangan Menengah
            </h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Persyaratan Administrasi</label>
                    <div class="space-y-2" id="tm-admin-container">
                        @if($persyaratan && $persyaratan->tm_admin)
                            @foreach($persyaratan->tm_admin as $index => $item)
                                <div class="flex gap-2">
                                    <input type="text" name="tm_admin[{{ $index }}]" value="{{ $item }}" class="flex-1 bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-orange-500">
                                    <button type="button" onclick="removeItem(this)" class="bg-rose-500/20 text-rose-400 hover:bg-rose-500/30 px-3 rounded-lg text-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 6l12 12M18 6L6 18"></path></svg></button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <button type="button" onclick="addItem('tm-admin-container', 'tm_admin')" class="mt-2 text-xs text-orange-400 hover:text-orange-300">+ Tambah Item</button>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Persyaratan Teknis</label>
                    <div class="space-y-2" id="tm-teknis-container">
                        @if($persyaratan && $persyaratan->tm_teknis)
                            @foreach($persyaratan->tm_teknis as $index => $item)
                                <div class="flex gap-2">
                                    <input type="text" name="tm_teknis[{{ $index }}]" value="{{ $item }}" class="flex-1 bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-orange-500">
                                    <button type="button" onclick="removeItem(this)" class="bg-rose-500/20 text-rose-400 hover:bg-rose-500/30 px-3 rounded-lg text-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 6l12 12M18 6L6 18"></path></svg></button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <button type="button" onclick="addItem('tm-teknis-container', 'tm_teknis')" class="mt-2 text-xs text-orange-400 hover:text-orange-300">+ Tambah Item</button>
                </div>
            </div>
        </div>

        <!-- PLTS -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6">
            <h2 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                <span class="text-2xl text-amber-400"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3v2m0 14v2m9-9h-2M5 12H3m9-6l-1.4-1.4M16.4 7.6L15 6.2m0 11.8l1.4 1.4M7.6 16.4L6.2 15m8.8-8.8l1.4-1.4M7.6 7.6L6.2 6.2"></path></svg></span>
                PLTS
            </h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Persyaratan Administrasi</label>
                    <div class="space-y-2" id="plts-admin-container">
                        @if($persyaratan && $persyaratan->plts_admin)
                            @foreach($persyaratan->plts_admin as $index => $item)
                                <div class="flex gap-2">
                                    <input type="text" name="plts_admin[{{ $index }}]" value="{{ $item }}" class="flex-1 bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-orange-500">
                                    <button type="button" onclick="removeItem(this)" class="bg-rose-500/20 text-rose-400 hover:bg-rose-500/30 px-3 rounded-lg text-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 6l12 12M18 6L6 18"></path></svg></button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <button type="button" onclick="addItem('plts-admin-container', 'plts_admin')" class="mt-2 text-xs text-orange-400 hover:text-orange-300">+ Tambah Item</button>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Persyaratan Teknis</label>
                    <div class="space-y-2" id="plts-teknis-container">
                        @if($persyaratan && $persyaratan->plts_teknis)
                            @foreach($persyaratan->plts_teknis as $index => $item)
                                <div class="flex gap-2">
                                    <input type="text" name="plts_teknis[{{ $index }}]" value="{{ $item }}" class="flex-1 bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-orange-500">
                                    <button type="button" onclick="removeItem(this)" class="bg-rose-500/20 text-rose-400 hover:bg-rose-500/30 px-3 rounded-lg text-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 6l12 12M18 6L6 18"></path></svg></button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <button type="button" onclick="addItem('plts-teknis-container', 'plts_teknis')" class="mt-2 text-xs text-orange-400 hover:text-orange-300">+ Tambah Item</button>
                </div>
            </div>
        </div>

        <!-- Genset -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6">
            <h2 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                <span class="text-2xl text-sky-400"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"></circle><path stroke-linecap="round" stroke-linejoin="round" d="M19.4 15a1.7 1.7 0 00.3 1.8l.1.1a2 2 0 01-2.8 2.8l-.1-.1a1.7 1.7 0 00-1.8-.3 1.7 1.7 0 00-1 1.5V21a2 2 0 01-4 0v-.2a1.7 1.7 0 00-1-1.5 1.7 1.7 0 00-1.8.3l-.1.1a2 2 0 01-2.8-2.8l.1-.1a1.7 1.7 0 00.3-1.8 1.7 1.7 0 00-1.5-1H3a2 2 0 010-4h.2a1.7 1.7 0 001.5-1 1.7 1.7 0 00-.3-1.8l-.1-.1a2 2 0 012.8-2.8l.1.1a1.7 1.7 0 001.8.3h.1a1.7 1.7 0 001-1.5V3a2 2 0 014 0v.2a1.7 1.7 0 001 1.5h.1a1.7 1.7 0 001.8-.3l.1-.1a2 2 0 012.8 2.8l-.1.1a1.7 1.7 0 00-.3 1.8v.1a1.7 1.7 0 001.5 1H21a2 2 0 010 4h-.2a1.7 1.7 0 00-1.5 1z"></path></svg></span>
                Genset
            </h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Persyaratan Administrasi</label>
                    <div class="space-y-2" id="genset-admin-container">
                        @if($persyaratan && $persyaratan->genset_admin)
                            @foreach($persyaratan->genset_admin as $index => $item)
                                <div class="flex gap-2">
                                    <input type="text" name="genset_admin[{{ $index }}]" value="{{ $item }}" class="flex-1 bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-orange-500">
                                    <button type="button" onclick="removeItem(this)" class="bg-rose-500/20 text-rose-400 hover:bg-rose-500/30 px-3 rounded-lg text-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 6l12 12M18 6L6 18"></path></svg></button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <button type="button" onclick="addItem('genset-admin-container', 'genset_admin')" class="mt-2 text-xs text-orange-400 hover:text-orange-300">+ Tambah Item</button>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Persyaratan Teknis</label>
                    <div class="space-y-2" id="genset-teknis-container">
                        @if($persyaratan && $persyaratan->genset_teknis)
                            @foreach($persyaratan->genset_teknis as $index => $item)
                                <div class="flex gap-2">
                                    <input type="text" name="genset_teknis[{{ $index }}]" value="{{ $item }}" class="flex-1 bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-orange-500">
                                    <button type="button" onclick="removeItem(this)" class="bg-rose-500/20 text-rose-400 hover:bg-rose-500/30 px-3 rounded-lg text-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 6l12 12M18 6L6 18"></path></svg></button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <button type="button" onclick="addItem('genset-teknis-container', 'genset_teknis')" class="mt-2 text-xs text-orange-400 hover:text-orange-300">+ Tambah Item</button>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-xl font-semibold transition shadow-lg shadow-orange-500/20">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<script>
    let itemIndex = {};

    function addItem(containerId, fieldName) {
        const container = document.getElementById(containerId);
        const index = container.children.length;
        
        const div = document.createElement('div');
        div.className = 'flex gap-2';
        div.innerHTML = `
            <input type="text" name="${fieldName}[${index}]" class="flex-1 bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-orange-500" placeholder="Masukkan persyaratan...">
            <button type="button" onclick="removeItem(this)" class="bg-rose-500/20 text-rose-400 hover:bg-rose-500/30 px-3 rounded-lg text-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 6l12 12M18 6L6 18"></path></svg></button>
        `;
        
        container.appendChild(div);
    }

    function removeItem(button) {
        button.parentElement.remove();
    }
</script>
@endsection
