<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KontenHalaman;
use App\Models\UjiPetik;
use App\Models\KeluhanBandingSetting;
use App\Models\KeluhanBandingSubmission;
use App\Models\PersyaratanSlo;
use App\Models\DaftarHargaSlo;
use App\Models\ProsedurSlo;
use App\Models\AlurSertifikasi;

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

    public function persyaratanSlo()
    {
        $persyaratan = PersyaratanSlo::first();

        return view('pages.informasi-publik.persyaratan-slo', compact('persyaratan'));
    }

    public function daftarHargaSlo()
    {
        $daftarHarga = DaftarHargaSlo::where('is_active', true)->first();

        return view('pages.informasi-publik.daftar-harga-slo', compact('daftarHarga'));
    }

    public function prosedurSlo()
    {
        $prosedur = ProsedurSlo::where('is_active', true)->first();

        return view('pages.informasi-publik.prosedur-slo', compact('prosedur'));
    }

    public function alurSertifikasi()
    {
        $alurSertifikasi = AlurSertifikasi::where('is_active', true)->first();

        return view('pages.informasi-publik.alur-sertifikasi', compact('alurSertifikasi'));
    }

    public function keluhanBandingSubmit(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon_perusahaan' => 'required|string|max:20',
            'email_perusahaan' => 'required|email|max:255',
            'nama_perwakilan' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'telepon_perwakilan' => 'required|string|max:20',
            'email_perwakilan' => 'required|email|max:255',
            'rincian_keluhan' => 'required|string',
            'dokumen_pendukung' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $pathDokumen = null;
        if ($request->hasFile('dokumen_pendukung')) {
            $pathDokumen = $request->file('dokumen_pendukung')->store('uploads/keluhan-banding', 'public');
        }

        KeluhanBandingSubmission::create([
            'nama_perusahaan' => $request->nama_perusahaan,
            'kota' => $request->kota,
            'alamat' => $request->alamat,
            'telepon_perusahaan' => $request->telepon_perusahaan,
            'email_perusahaan' => $request->email_perusahaan,
            'nama_perwakilan' => $request->nama_perwakilan,
            'jabatan' => $request->jabatan,
            'telepon_perwakilan' => $request->telepon_perwakilan,
            'email_perwakilan' => $request->email_perwakilan,
            'pesan' => $request->rincian_keluhan,
            'path_dokumen' => $pathDokumen,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Pengajuan keluhan/banding Anda berhasil dikirim. Kami akan menindaklanjuti secepat mungkin.');
    }
}
