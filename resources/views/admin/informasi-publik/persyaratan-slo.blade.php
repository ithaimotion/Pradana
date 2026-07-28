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
        <div class="bg-emerald-500/10 border border-emerald-500/30 rounded-xl p-4 mb-6">
            <p class="text-emerald-400 text-sm">{{ session('success') }}</p>
        </div>
    @endif

    <form action="{{ route('admin.informasi-publik.persyaratan-slo.update') }}" method="POST" class="space-y-8">
        @csrf

        <!-- Tegangan Rendah -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6">
            <h2 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                <span class="text-2xl">⚡</span>
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
                                    <button type="button" onclick="removeItem(this)" class="bg-rose-500/20 text-rose-400 hover:bg-rose-500/30 px-3 rounded-lg text-sm">✕</button>
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
                                    <button type="button" onclick="removeItem(this)" class="bg-rose-500/20 text-rose-400 hover:bg-rose-500/30 px-3 rounded-lg text-sm">✕</button>
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
                <span class="text-2xl">🏭</span>
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
                                    <button type="button" onclick="removeItem(this)" class="bg-rose-500/20 text-rose-400 hover:bg-rose-500/30 px-3 rounded-lg text-sm">✕</button>
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
                                    <button type="button" onclick="removeItem(this)" class="bg-rose-500/20 text-rose-400 hover:bg-rose-500/30 px-3 rounded-lg text-sm">✕</button>
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
                <span class="text-2xl">☀️</span>
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
                                    <button type="button" onclick="removeItem(this)" class="bg-rose-500/20 text-rose-400 hover:bg-rose-500/30 px-3 rounded-lg text-sm">✕</button>
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
                                    <button type="button" onclick="removeItem(this)" class="bg-rose-500/20 text-rose-400 hover:bg-rose-500/30 px-3 rounded-lg text-sm">✕</button>
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
                <span class="text-2xl">⚙️</span>
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
                                    <button type="button" onclick="removeItem(this)" class="bg-rose-500/20 text-rose-400 hover:bg-rose-500/30 px-3 rounded-lg text-sm">✕</button>
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
                                    <button type="button" onclick="removeItem(this)" class="bg-rose-500/20 text-rose-400 hover:bg-rose-500/30 px-3 rounded-lg text-sm">✕</button>
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
            <button type="button" onclick="removeItem(this)" class="bg-rose-500/20 text-rose-400 hover:bg-rose-500/30 px-3 rounded-lg text-sm">✕</button>
        `;
        
        container.appendChild(div);
    }

    function removeItem(button) {
        button.parentElement.remove();
    }
</script>
@endsection
