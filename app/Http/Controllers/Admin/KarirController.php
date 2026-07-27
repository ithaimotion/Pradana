<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KontenHalaman;
use App\Models\LowonganKarir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KarirController extends Controller
{
    /**
     * Update Konten Banner / Header Karir.
     */
    public function updateHeader(Request $request)
    {
        $request->validate([
            'halaman' => 'required|string',
            'kunci' => 'required|string',
            'judul' => 'nullable|string|max:255',
            'subjudul' => 'nullable|string',
            'konten' => 'nullable|string',
            'nilai' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
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
            $konten->path_gambar = $request->file('gambar')->store('uploads/karir', 'public');
        }

        $konten->save();

        return back()->with('success', 'Konten header Karir berhasil diperbarui!');
    }

    /**
     * Store Lowongan Karir Baru.
     */
    public function storeLowongan(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'divisi' => 'required|string',
            'tipe' => 'required|string',
            'lokasi' => 'required|string',
            'deskripsi' => 'nullable|string',
            'persyaratan' => 'nullable|string',
            'link_lamar' => 'nullable|string',
        ]);

        LowonganKarir::create([
            'judul' => $request->judul,
            'divisi' => $request->divisi,
            'tipe' => $request->tipe,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'persyaratan' => $request->persyaratan,
            'link_lamar' => $request->link_lamar,
            'status' => $request->has('status') ? true : false,
        ]);

        return back()->with('success', 'Lowongan pekerjaan berhasil ditambahkan!');
    }

    /**
     * Update Lowongan Karir.
     */
    public function updateLowongan(Request $request, $id)
    {
        $lowongan = LowonganKarir::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'divisi' => 'required|string',
            'tipe' => 'required|string',
            'lokasi' => 'required|string',
            'deskripsi' => 'nullable|string',
            'persyaratan' => 'nullable|string',
            'link_lamar' => 'nullable|string',
        ]);

        $lowongan->update([
            'judul' => $request->judul,
            'divisi' => $request->divisi,
            'tipe' => $request->tipe,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'persyaratan' => $request->persyaratan,
            'link_lamar' => $request->link_lamar,
            'status' => $request->has('status') ? true : false,
        ]);

        return back()->with('success', 'Lowongan pekerjaan berhasil diperbarui!');
    }

    /**
     * Hapus Lowongan Karir.
     */
    public function destroyLowongan($id)
    {
        $lowongan = LowonganKarir::findOrFail($id);
        $lowongan->delete();

        return back()->with('success', 'Lowongan pekerjaan berhasil dihapus!');
    }
}
