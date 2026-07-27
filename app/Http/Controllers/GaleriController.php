<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string',
            'judul' => 'nullable|string|max:255',
            'lokasi_tahun' => 'nullable|string|max:255',
            'urutan' => 'nullable|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        $item = new Galeri();
        $item->kategori = $request->kategori;
        $item->judul = $request->judul;
        $item->lokasi_tahun = $request->lokasi_tahun;
        $item->urutan = $request->urutan ?? (Galeri::max('urutan') + 1);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('uploads/galeri', 'public');
            $item->path_gambar = $path;
        }

        $item->save();

        return back()->with('success', 'Foto Galeri berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $item = Galeri::findOrFail($id);

        $request->validate([
            'kategori' => 'required|string',
            'judul' => 'nullable|string|max:255',
            'lokasi_tahun' => 'nullable|string|max:255',
            'urutan' => 'nullable|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        $item->kategori = $request->kategori;
        $item->judul = $request->judul;
        $item->lokasi_tahun = $request->lokasi_tahun;
        if ($request->has('urutan')) {
            $item->urutan = $request->urutan;
        }

        if ($request->hasFile('gambar')) {
            if ($item->path_gambar && !str_starts_with($item->path_gambar, 'http')) {
                Storage::disk('public')->delete($item->path_gambar);
            }
            $path = $request->file('gambar')->store('uploads/galeri', 'public');
            $item->path_gambar = $path;
        }

        $item->save();

        return back()->with('success', 'Foto Galeri berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $item = Galeri::findOrFail($id);

        if ($item->path_gambar && !str_starts_with($item->path_gambar, 'http')) {
            Storage::disk('public')->delete($item->path_gambar);
        }

        $item->delete();

        return back()->with('success', 'Foto Galeri berhasil dihapus!');
    }
}
