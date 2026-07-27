<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'nullable|string|max:255',
            'logo_url' => 'nullable|url|max:255',
            'urutan' => 'nullable|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        $item = new Logo();
        $item->nama = $request->nama;
        $item->logo_url = $request->logo_url;
        $item->urutan = $request->urutan ?? (Logo::max('urutan') + 1);
        $item->aktif = $request->has('aktif') ? true : false;

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('uploads/logos', 'public');
            $item->url_gambar = $path;
        }

        $item->save();

        return back()->with('success', 'Logo berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $item = Logo::findOrFail($id);

        $request->validate([
            'nama' => 'nullable|string|max:255',
            'logo_url' => 'nullable|url|max:255',
            'urutan' => 'nullable|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        $item->nama = $request->nama;
        $item->logo_url = $request->logo_url;
        if ($request->has('urutan')) {
            $item->urutan = $request->urutan;
        }
        $item->aktif = $request->has('aktif') ? true : false;

        if ($request->hasFile('gambar')) {
            if ($item->url_gambar && !str_starts_with($item->url_gambar, 'http')) {
                Storage::disk('public')->delete($item->url_gambar);
            }
            $path = $request->file('gambar')->store('uploads/logos', 'public');
            $item->url_gambar = $path;
        }

        $item->save();

        return back()->with('success', 'Logo berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $item = Logo::findOrFail($id);

        if ($item->url_gambar && !str_starts_with($item->url_gambar, 'http')) {
            Storage::disk('public')->delete($item->url_gambar);
        }

        $item->delete();

        return back()->with('success', 'Logo berhasil dihapus!');
    }
}
