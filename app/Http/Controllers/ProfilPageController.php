<?php

namespace App\Http\Controllers;

use App\Models\KontenHalaman;
use App\Models\ProfilPerusahaan;
use App\Models\ProfilDaftarPJTTT;
use App\Models\ProfilStrukturOrganisasi;
use App\Models\ProfilLegalitas;
use App\Models\ProfilPeralatanKetenagalistrikan;
use Illuminate\Http\Request;

class ProfilPageController extends Controller
{
    /**
     * Tampilkan Halaman Profil Perusahaan.
     */
    public function perusahaan()
    {
        $konten = ProfilPerusahaan::first();
        if (!$konten) {
            $konten = new \stdClass();
            $konten->judul = null;
            $konten->subjudul = null;
            $konten->nilai = null;
            $konten->konten = null;
            $konten->url_gambar = null;
            $konten->visi = null;
            $konten->foto_visi = null;
            $konten->misi = null;
            $konten->foto_misi = null;
            $konten->nilai_perusahaan = null;
        }
        return view('pages.profil.perusahaan', compact('konten'));
    }

    /**
     * Tampilkan Halaman Daftar PJT & TT.
     */
    public function pjtTt()
    {
        $konten = ProfilDaftarPJTTT::with('items')->first();
        if (!$konten) {
            $konten = new \stdClass();
            $konten->judul = null;
            $konten->subjudul = null;
            $konten->konten = null;
            $konten->url_gambar = null;
            $konten->items = collect();
        }
        return view('pages.profil.pjt-tt', compact('konten'));
    }

    /**
     * Tampilkan Halaman Struktur Organisasi.
     */
    public function struktur()
    {
        $konten = ProfilStrukturOrganisasi::with('items')->first();
        if (!$konten) {
            $konten = new \stdClass();
            $konten->judul = null;
            $konten->subjudul = null;
            $konten->konten = null;
            $konten->url_gambar = null;
            $konten->items = collect();
        }
        return view('pages.profil.struktur-organisasi', compact('konten'));
    }

    /**
     * Tampilkan Halaman Legalitas Perusahaan.
     */
    public function legalitas()
    {
        $konten = ProfilLegalitas::with(['items', 'tenagaTeknik'])->first();
        if (!$konten) {
            $konten = new \stdClass();
            $konten->judul = null;
            $konten->subjudul = null;
            $konten->konten = null;
            $konten->url_gambar = null;
            $konten->items = collect();
            $konten->tenagaTeknik = collect();
        }
        return view('pages.profil.legalitas-perusahaan', compact('konten'));
    }

    /**
     * Tampilkan Halaman Peralatan Inspeksi.
     */
    public function peralatan()
    {
        $konten = KontenHalaman::where('halaman', 'profil_peralatan')->first();
        if (!$konten) {
            $konten = new \stdClass();
            $konten->judul = null;
            $konten->subjudul = null;
            $konten->konten = null;
            $konten->url_gambar = null;
        }
        $peralatans = ProfilPeralatanKetenagalistrikan::all();
        return view('pages.profil.peralatan', compact('konten', 'peralatans'));
    }

    /**
     * Tampilkan Halaman Standar Operasi Prosedur (SOP).
     */
    public function sop()
    {
        $konten = KontenHalaman::where('halaman', 'profil_sop')->first();
        if (!$konten) {
            $konten = new \stdClass();
            $konten->judul = null;
            $konten->subjudul = null;
            $konten->konten = null;
            $konten->url_gambar = null;
        }
        $sopItems = \App\Models\SopItem::where('status_aktif', true)->orderBy('urutan')->get();
        return view('pages.profil.sop', compact('konten', 'sopItems'));
    }
}
