@props(['pesanMasuks'])

<div x-show="activeTab === 'pesan-masuk'" class="space-y-6" x-cloak>
    <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 flex items-center justify-between shadow-xl">
        <div>
            <h2 class="text-xl font-bold text-white flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-pink-500"></span> Kotak Masuk Pesan (Inbox Contact)
            </h2>
            <p class="text-xs text-slate-400 mt-1">Daftar pertanyaan & pesan permohonan yang dikirim oleh pengunjung melalui form Hubungi Kami.</p>
        </div>
        <div class="px-3 py-1 bg-pink-500/10 border border-pink-500/20 rounded-full text-pink-400 font-mono text-xs font-bold">
            Total: {{ count($pesanMasuks) }} Pesan
        </div>
    </div>

    <!-- Table Inbox Pesan Masuk -->
    <div class="bg-slate-900/80 border border-slate-800 rounded-2xl overflow-hidden shadow-xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-950/80 border-b border-slate-800 text-slate-400 text-xs font-semibold uppercase tracking-wider">
                        <th class="p-4">Tanggal & Status</th>
                        <th class="p-4">Pengirim</th>
                        <th class="p-4">Kontak</th>
                        <th class="p-4">Subjek & Isi Pesan</th>
                        <th class="p-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60 text-xs">
                    @forelse($pesanMasuks as $msg)
                        <tr class="{{ $msg->dibaca ? 'bg-slate-900/40 text-slate-400' : 'bg-slate-900 text-slate-100 font-medium' }} hover:bg-slate-800/40 transition">
                            <td class="p-4 whitespace-nowrap">
                                <div class="text-[11px] text-slate-400 mb-1">{{ $msg->created_at->format('d M Y H:i') }}</div>
                                @if($msg->dibaca)
                                    <span class="px-2 py-0.5 rounded text-[10px] bg-slate-800 text-slate-400 border border-slate-700">Sudah Dibaca</span>
                                @else
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-pink-500/20 text-pink-400 border border-pink-500/30 animate-pulse">Baru</span>
                                @endif
                            </td>
                            <td class="p-4">
                                <div class="font-bold text-white text-sm">{{ $msg->nama }}</div>
                                <div class="text-[11px] text-slate-400">{{ $msg->email }}</div>
                            </td>
                            <td class="p-4 text-slate-300">
                                {{ $msg->no_hp ?? '-' }}
                            </td>
                            <td class="p-4 max-w-md">
                                @if($msg->subjek)
                                    <div class="font-bold text-orange-400 mb-1">Subjek: {{ $msg->subjek }}</div>
                                @endif
                                <p class="text-slate-300 leading-relaxed whitespace-pre-line">{{ $msg->pesan }}</p>
                            </td>
                            <td class="p-4 text-right space-x-2 whitespace-nowrap">
                                <form action="{{ route('admin.pesan.read', $msg->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button type="submit" class="bg-slate-800 hover:bg-slate-700 text-slate-300 border border-slate-700 px-3 py-1.5 rounded-lg text-[11px] font-medium transition">
                                        {{ $msg->dibaca ? 'Tandai Belum Dibaca' : 'Tandai Dibaca' }}
                                    </button>
                                </form>
                                <form action="{{ route('admin.pesan.destroy', $msg->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus pesan dari {{ addslashes($msg->nama) }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-slate-800 hover:bg-rose-500/20 text-slate-300 hover:text-rose-400 border border-slate-700 px-3 py-1.5 rounded-lg text-[11px] font-medium transition">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-slate-400">
                                Belum ada pesan masuk dari form Hubungi Kami.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
