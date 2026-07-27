<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KontenHalaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SloController extends Controller
{
    /**
     * Update Konten Sub-Menu Halaman SLO (Regulasi, Verifikasi, Cek Permohonan, Bidang Layanan).
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
            $konten->path_gambar = $request->file('gambar')->store('uploads/slo', 'public');
        }

        if ($request->hasFile('dokumen')) {
            if ($konten->path_dokumen && !str_starts_with($konten->path_dokumen, 'http')) {
                Storage::disk('public')->delete($konten->path_dokumen);
            }
            $konten->path_dokumen = $request->file('dokumen')->store('uploads/dokumen', 'public');
        }

        $konten->save();

        return back()->with('success', 'Konten halaman SLO berhasil diperbarui!');
    }
}
