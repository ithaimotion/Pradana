<?php

namespace App\Http\Controllers;

use App\Models\KontenHalaman;
use App\Models\ProfilPerusahaan;
use App\Models\ProfilDaftarPJTTT;
use App\Models\ProfilStrukturOrganisasi;
use App\Models\ProfilLegalitas;
use Illuminate\Http\Request;

class ProfilPageController extends Controller
{
    /**
     * Tampilkan Halaman Profil Perusahaan.
     */
    public function perusahaan()
    {
        $konten = ProfilPerusahaan::first();
        return view('pages.profil.perusahaan', compact('konten'));
    }

    /**
     * Tampilkan Halaman Daftar PJT & TT.
     */
    public function pjtTt()
    {
        $konten = ProfilDaftarPJTTT::with('items')->first();
        return view('pages.profil.pjt-tt', compact('konten'));
    }

    /**
     * Tampilkan Halaman Struktur Organisasi.
     */
    public function struktur()
    {
        $konten = ProfilStrukturOrganisasi::with('items')->first();
        return view('pages.profil.struktur-organisasi', compact('konten'));
    }

    /**
     * Tampilkan Halaman Legalitas Perusahaan.
     */
    public function legalitas()
    {
        $konten = ProfilLegalitas::with(['items', 'tenagaTeknik'])->first();
        return view('pages.profil.legalitas-perusahaan', compact('konten'));
    }

    /**
     * Tampilkan Halaman Peralatan Inspeksi.
     */
    public function peralatan()
    {
        $konten = KontenHalaman::where('halaman', 'profil_peralatan')->first();
        return view('pages.profil.peralatan', compact('konten'));
    }

    /**
     * Tampilkan Halaman Standar Operasi Prosedur (SOP).
     */
    public function sop()
    {
        $konten = KontenHalaman::where('halaman', 'profil_sop')->first();
        return view('pages.profil.sop', compact('konten'));
    }
}
