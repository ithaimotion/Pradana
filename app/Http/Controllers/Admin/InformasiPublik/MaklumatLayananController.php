<?php

namespace App\Http\Controllers\Admin\InformasiPublik;

use App\Http\Controllers\Controller;
use App\Models\KontenHalaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaklumatLayananController extends Controller
{
    /**
     * Display the Maklumat Layanan admin page.
     */
    public function index()
    {
        $maklumat = KontenHalaman::where('halaman', 'informasi-publik')
            ->where('kunci', 'maklumat-layanan')
            ->first();

        return view('admin.informasi-publik.maklumat-index', compact('maklumat'));
    }

    /**
     * Update the Maklumat Layanan image.
     */
    public function update(Request $request)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        $maklumat = KontenHalaman::firstOrNew([
            'halaman' => 'informasi-publik',
            'kunci' => 'maklumat-layanan',
        ]);

        if ($request->hasFile('gambar')) {
            if ($maklumat->path_gambar && !str_starts_with($maklumat->path_gambar, 'http')) {
                Storage::disk('public')->delete($maklumat->path_gambar);
            }
            $maklumat->path_gambar = $request->file('gambar')->store('uploads/maklumat', 'public');
        }

        $maklumat->save();

        return back()->with('success', 'Gambar Maklumat Layanan berhasil diperbarui!');
    }
}
