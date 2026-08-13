<?php

namespace App\Http\Controllers;

use App\Models\PesanMasuk;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function storePublik(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string',
        ]);

        PesanMasuk::create($validated);

        return back()->with('success', 'Pesan Anda berhasil dikirim.');
    }
}
