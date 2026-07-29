@props(['data'])

<div x-show="activeTab === 'sop'" class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl" x-cloak>
    <div class="border-b border-slate-800 pb-4">
        <h2 class="text-xl font-bold text-white flex items-center gap-2">
            <span class="w-3 h-3 rounded-full bg-amber-400"></span> Pengaturan Halaman: Standar Operasi Prosedur (SOP)
        </h2>
        <p class="text-xs text-slate-400 mt-1">Kelola pedoman SOP inspeksi teknik kelistrikan, sertifikasi K3, dan upload berkas PDF panduan operasional resmi.</p>
    </div>

    <form action="{{ route('admin.profil.halaman.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <input type="hidden" name="halaman" value="profil_sop">
        <input type="hidden" name="kunci" value="main">

        <div class="grid md:grid-cols-2 gap-8">
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1 uppercase tracking-wider">Judul Header</label>
                    <input type="text" name="judul" value="{{ old('judul', $data->judul ?? 'STANDAR OPERASI PROSEDUR (SOP)') }}" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-amber-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1 uppercase tracking-wider">Sub-Judul / Keterangan SOP</label>
                    <textarea name="subjudul" rows="2" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-amber-500">{{ old('subjudul', $data->subjudul ?? 'Seluruh tahapan inspeksi ketenagalistrikan dilaksanakan secara ketat berlandaskan SOP dan K3.') }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1 uppercase tracking-wider">Daftar Kode & Prosedur SOP Utama</label>
                    <textarea name="konten" rows="5" placeholder="Contoh:&#10;• SOP-INSP-01: Prosedur Keselamatan Kerja K3 Inspeksi&#10;• SOP-INSP-02: Pemeriksaan & Pengujian Instalasi TR&#10;• SOP-INSP-03: Pemeriksaan & Pengujian Instalasi TM" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-sm text-slate-100 focus:outline-none focus:border-amber-500">{{ old('konten', $data->konten ?? '') }}</textarea>
                </div>
            </div>

            <div class="space-y-6">
                <!-- PDF File Dokumen SOP Resmi -->
                <div class="space-y-3 bg-slate-950/50 p-5 rounded-xl border border-slate-800">
                    <label class="block text-xs font-bold text-amber-400 uppercase tracking-wider">Upload Berkas PDF Dokumen Manual SOP Resmi</label>
                    @if(optional($data)->url_dokumen)
                        <div class="flex items-center justify-between p-3 bg-slate-950 border border-slate-800 rounded-xl">
                            <div class="flex items-center gap-2 overflow-hidden">
                                <svg class="w-5 h-5 text-rose-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                <span class="text-xs text-slate-300 truncate">Dokumen SOP PDF Ter-upload</span>
                            </div>
                            <a href="{{ optional($data)->url_dokumen }}" target="_blank" class="text-xs font-bold text-amber-400 hover:underline flex-shrink-0">Lihat PDF</a>
                        </div>
                    @endif

                    <div class="border-2 border-dashed border-slate-800 rounded-xl p-4 text-center hover:border-amber-500/50 transition">
                        <input type="file" name="dokumen" accept=".pdf" class="w-full text-xs text-slate-400 bg-slate-950 border border-slate-800 rounded-xl p-2.5">
                        <p class="text-[11px] text-slate-500 mt-1">Format PDF Dokumentasi Manual SOP (maks 10MB)</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end pt-2 border-t border-slate-800">
            <button type="submit" class="bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 text-white px-6 py-3 rounded-xl font-bold text-sm shadow-lg shadow-amber-500/20 transition flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                Simpan Pedoman SOP
            </button>
        </div>
    </form>
</div>

