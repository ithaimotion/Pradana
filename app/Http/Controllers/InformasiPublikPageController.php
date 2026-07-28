<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KontenHalaman;
use App\Models\UjiPetik;
use App\Models\KeluhanBandingSetting;
use App\Models\KeluhanBandingSubmission;

class InformasiPublikPageController extends Controller
{
    public function maklumatLayanan()
    {
        $maklumat = KontenHalaman::where('halaman', 'informasi-publik')
            ->where('kunci', 'maklumat-layanan')
            ->first();

        return view('pages.informasi-publik.maklumat-layanan', compact('maklumat'));
    }

    public function ujiPetik()
    {
        $ujiPetik = UjiPetik::first();

        return view('pages.informasi-publik.uji-petik', compact('ujiPetik'));
    }

    public function keluhanBanding()
    {
        $setting = KeluhanBandingSetting::first();

        return view('pages.informasi-publik.keluhan-banding', compact('setting'));
    }

    public function keluhanBandingSubmit(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'nullable|string|max:20',
            'jenis' => 'required|in:keluhan,banding',
            'pesan' => 'required|string',
        ]);

        KeluhanBandingSubmission::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'jenis' => $request->jenis,
            'pesan' => $request->pesan,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Pengajuan keluhan/banding Anda berhasil dikirim. Kami akan menindaklanjuti secepat mungkin.');
    }
}
