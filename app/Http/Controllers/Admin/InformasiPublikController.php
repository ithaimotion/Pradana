<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KontenHalaman;
use App\Models\PersyaratanSlo;
use App\Models\DaftarHargaSlo;
use App\Models\ProsedurSlo;
use App\Models\AlurSertifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiPublikController extends Controller
{
    /**
     * Update Konten Sub-Menu Informasi Publik (Uji Petik, Keluhan, Persyaratan, Harga, Prosedur, Alur).
     */
    public function update(Request $request)
    {
        $request->validate([
            'halaman' => 'required|string',
            'kunci' => 'required|string',
            'judul' => 'nullable|string|max:255',
            'subjudul' => 'nullable|string',
            'konten' => 'nullable|string',
            'nilai' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'dokumen' => 'nullable|mimes:pdf,doc,docx,xls,xlsx|max:10240',
        ]);

        $konten = KontenHalaman::firstOrNew([
            'halaman' => $request->halaman,
            'kunci' => $request->kunci,
        ]);

        $konten->judul = $request->judul;
        $konten->subjudul = $request->subjudul;
        $konten->konten = $request->konten;
        $konten->nilai = $request->nilai;

        if ($request->hasFile('gambar')) {
            if ($konten->path_gambar && !str_starts_with($konten->path_gambar, 'http')) {
                Storage::disk('public')->delete($konten->path_gambar);
            }
            $konten->path_gambar = $request->file('gambar')->store('uploads/infopublik', 'public');
        }

        if ($request->hasFile('dokumen')) {
            if ($konten->path_dokumen && !str_starts_with($konten->path_dokumen, 'http')) {
                Storage::disk('public')->delete($konten->path_dokumen);
            }
            $konten->path_dokumen = $request->file('dokumen')->store('uploads/dokumen', 'public');
        }

        $konten->save();

        return back()->with('success', 'Konten halaman Informasi Publik berhasil diperbarui!');
    }

    /**
     * Update Persyaratan SLO requirements.
     */
    public function updatePersyaratanSlo(Request $request)
    {
        $request->validate([
            'tr_admin' => 'nullable|array',
            'tr_teknis' => 'nullable|array',
            'tm_admin' => 'nullable|array',
            'tm_teknis' => 'nullable|array',
            'plts_admin' => 'nullable|array',
            'plts_teknis' => 'nullable|array',
            'genset_admin' => 'nullable|array',
            'genset_teknis' => 'nullable|array',
        ]);

        $persyaratan = PersyaratanSlo::first() ?? new PersyaratanSlo();
        
        $persyaratan->tr_admin = $request->tr_admin ?? [];
        $persyaratan->tr_teknis = $request->tr_teknis ?? [];
        $persyaratan->tm_admin = $request->tm_admin ?? [];
        $persyaratan->tm_teknis = $request->tm_teknis ?? [];
        $persyaratan->plts_admin = $request->plts_admin ?? [];
        $persyaratan->plts_teknis = $request->plts_teknis ?? [];
        $persyaratan->genset_admin = $request->genset_admin ?? [];
        $persyaratan->genset_teknis = $request->genset_teknis ?? [];
        
        $persyaratan->save();

        return back()->with('success', 'Persyaratan SLO berhasil diperbarui!');
    }

    /**
     * Show Persyaratan SLO management page.
     */
    public function persyaratanSlo()
    {
        $persyaratan = PersyaratanSlo::first();
        
        return view('admin.informasi-publik.persyaratan-slo', compact('persyaratan'));
    }

    /**
     * Show Daftar Harga SLO management page.
     */
    public function daftarHargaSlo()
    {
        $daftarHarga = DaftarHargaSlo::first();
        
        return view('admin.informasi-publik.daftar-harga-slo', compact('daftarHarga'));
    }

    /**
     * Update Daftar Harga SLO.
     */
    public function updateDaftarHargaSlo(Request $request)
    {
        $request->validate([
            'nama_dokumen' => 'required|string|max:255',
            'pdf' => 'nullable|file|mimes:pdf|max:10240',
            'is_active' => 'required|boolean',
        ]);

        $daftarHarga = DaftarHargaSlo::first() ?? new DaftarHargaSlo();
        
        $daftarHarga->nama_dokumen = $request->nama_dokumen;
        $daftarHarga->is_active = $request->is_active;

        if ($request->hasFile('pdf')) {
            if ($daftarHarga->path_pdf && !str_starts_with($daftarHarga->path_pdf, 'http')) {
                Storage::disk('public')->delete($daftarHarga->path_pdf);
            }
            $daftarHarga->path_pdf = $request->file('pdf')->store('uploads/daftar-harga-slo', 'public');
        }
        
        $daftarHarga->save();

        return back()->with('success', 'Daftar Harga SLO berhasil diperbarui!');
    }

    /**
     * Show Prosedur SLO management page.
     */
    public function prosedurSlo()
    {
        $prosedur = ProsedurSlo::first();
        
        return view('admin.informasi-publik.prosedur-slo', compact('prosedur'));
    }

    /**
     * Update Prosedur SLO.
     */
    public function updateProsedurSlo(Request $request)
    {
        $request->validate([
            'nama_dokumen' => 'required|string|max:255',
            'pdf' => 'nullable|file|mimes:pdf|max:10240',
            'is_active' => 'required|boolean',
            'timeline_steps' => 'nullable|array',
            'accordion_content' => 'nullable|array',
            'processing_time' => 'nullable|array',
            'required_documents' => 'nullable|array',
            'faq_content' => 'nullable|array',
        ]);

        $prosedur = ProsedurSlo::first() ?? new ProsedurSlo();
        
        $prosedur->nama_dokumen = $request->nama_dokumen;
        $prosedur->is_active = $request->is_active;
        $prosedur->timeline_steps = $request->timeline_steps ?? [];
        $prosedur->accordion_content = $request->accordion_content ?? [];
        $prosedur->processing_time = $request->processing_time ?? [];
        $prosedur->required_documents = $request->required_documents ?? [];
        $prosedur->faq_content = $request->faq_content ?? [];

        if ($request->hasFile('pdf')) {
            if ($prosedur->path_pdf && !str_starts_with($prosedur->path_pdf, 'http')) {
                Storage::disk('public')->delete($prosedur->path_pdf);
            }
            $prosedur->path_pdf = $request->file('pdf')->store('uploads/prosedur-slo', 'public');
        }
        
        $prosedur->save();

        return back()->with('success', 'Prosedur SLO berhasil diperbarui!');
    }

    /**
     * Show Alur Sertifikasi management page.
     */
    public function alurSertifikasi()
    {
        $alurSertifikasi = AlurSertifikasi::first();
        
        return view('admin.informasi-publik.alur-sertifikasi', compact('alurSertifikasi'));
    }

    /**
     * Update Alur Sertifikasi.
     */
    public function updateAlurSertifikasi(Request $request)
    {
        $request->validate([
            'nama_dokumen' => 'required|string|max:255',
            'pdf' => 'nullable|file|mimes:pdf|max:10240',
            'is_active' => 'required|boolean',
        ]);

        $alurSertifikasi = AlurSertifikasi::first() ?? new AlurSertifikasi();
        
        $alurSertifikasi->nama_dokumen = $request->nama_dokumen;
        $alurSertifikasi->is_active = $request->is_active;

        if ($request->hasFile('pdf')) {
            if ($alurSertifikasi->path_pdf && !str_starts_with($alurSertifikasi->path_pdf, 'http')) {
                Storage::disk('public')->delete($alurSertifikasi->path_pdf);
            }
            $alurSertifikasi->path_pdf = $request->file('pdf')->store('uploads/alur-sertifikasi', 'public');
        }
        
        $alurSertifikasi->save();

        return back()->with('success', 'Alur Sertifikasi berhasil diperbarui!');
    }
}
