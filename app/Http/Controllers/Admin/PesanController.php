<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PesanMasuk;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    /**
     * Toggle status dibaca pesan masuk.
     */
    public function toggleRead($id)
    {
        $pesan = PesanMasuk::findOrFail($id);
        $pesan->dibaca = !$pesan->dibaca;
        $pesan->save();

        return back()->with('success', 'Status pesan berhasil diperbarui.');
    }

    /**
     * Hapus Pesan Masuk.
     */
    public function destroy($id)
    {
        $pesan = PesanMasuk::findOrFail($id);
        $pesan->delete();

        return back()->with('success', 'Pesan berhasil dihapus!');
    }

    /**
     * Simpan Pesan Masuk dari Form Publik Hubungi Kami.
     */
    public function storePublik(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'nullable|string|max:50',
            'subjek' => 'nullable|string|max:255',
            'pesan' => 'required|string',
        ]);

        PesanMasuk::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'subjek' => $request->subjek,
            'pesan' => $request->pesan,
        ]);

        return back()->with('success', 'Terima kasih! Pesan Anda telah berhasil terkirim. Tim kami akan segera menghubungi Anda.');
    }
}
