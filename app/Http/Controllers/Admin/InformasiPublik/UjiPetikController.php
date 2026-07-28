<?php

namespace App\Http\Controllers\Admin\InformasiPublik;

use App\Http\Controllers\Controller;
use App\Models\UjiPetik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UjiPetikController extends Controller
{
    /**
     * Display the Uji Petik admin page.
     */
    public function index()
    {
        $ujiPetik = UjiPetik::first();

        return view('admin.informasi-publik.uji-petik-index', compact('ujiPetik'));
    }

    /**
     * Update the Uji Petik image.
     */
    public function update(Request $request)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        $ujiPetik = UjiPetik::first() ?? new UjiPetik();

        if ($request->hasFile('gambar')) {
            if ($ujiPetik->path_gambar && !str_starts_with($ujiPetik->path_gambar, 'http')) {
                Storage::disk('public')->delete($ujiPetik->path_gambar);
            }
            $ujiPetik->path_gambar = $request->file('gambar')->store('uploads/uji-petik', 'public');
        }

        $ujiPetik->save();

        return back()->with('success', 'Gambar Uji Petik berhasil diperbarui!');
    }
}
