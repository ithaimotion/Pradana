@props(['settings' => null])

@php
    $settings = $settings ?? collect();
    $alamat = $settings->get('alamat_kantor')->konten ?? '';
    $telepon = $settings->get('telepon_whatsapp')->konten ?? '';
    $email = $settings->get('email_resmi')->konten ?? '';
    $jam = $settings->get('jam_operasional')->konten ?? '';
    $maps = $settings->get('maps_embed')->konten ?? '';
@endphp

<div x-show="activeTab === 'hubungi-kami'" class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl" x-cloak>
    <div class="border-b border-slate-800 pb-4">
        <h2 class="text-xl font-bold text-white flex items-center gap-2">
            <span class="w-3 h-3 rounded-full bg-sky-400"></span> Pengaturan Informasi Hubungi Kami
        </h2>
        <p class="text-xs text-slate-400 mt-1">Ubah rincian alamat kantor, telepon & WhatsApp, email resmi, jam operasional, dan embed maps yang tampil di halaman publik.</p>
    </div>

    <form action="{{ route('admin.hubungi-kami.update') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Alamat Kantor</label>
                    <textarea name="alamat_kantor" rows="4" class="w-full bg-slate-950/70 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-sky-500">{{ old('alamat_kantor', $alamat) }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Telepon & WhatsApp</label>
                    <textarea name="telepon_whatsapp" rows="4" class="w-full bg-slate-950/70 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-sky-500">{{ old('telepon_whatsapp', $telepon) }}</textarea>
                </div>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Email Resmi</label>
                    <input type="email" name="email_resmi" value="{{ old('email_resmi', $email) }}" class="w-full bg-slate-950/70 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-sky-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Jam Operasional</label>
                    <textarea name="jam_operasional" rows="4" class="w-full bg-slate-950/70 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-sky-500">{{ old('jam_operasional', $jam) }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Embed Maps</label>
                    <textarea name="maps_embed" rows="4" class="w-full bg-slate-950/70 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-sky-500" placeholder="https://www.google.com/maps/embed?...">{{ old('maps_embed', $maps) }}</textarea>
                    <p class="text-[11px] text-slate-500 mt-2">Tempel URL iframe Google Maps agar peta muncul di halaman publik.</p>
                </div>
            </div>
        </div>

        <div class="flex justify-end pt-2 border-t border-slate-800">
            <button type="submit" class="bg-gradient-to-r from-sky-500 to-cyan-600 hover:from-sky-600 hover:to-cyan-700 text-white px-6 py-3 rounded-xl font-bold text-sm shadow-lg shadow-sky-500/20 transition flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                Simpan Informasi Hubungi Kami
            </button>
        </div>
    </form>
</div>
