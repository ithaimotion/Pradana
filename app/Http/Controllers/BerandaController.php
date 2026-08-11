<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KontenBeranda;
use App\Models\Galeri;
use App\Models\Logo;
use App\Models\LowonganKerja;
use App\Models\KarirSettings;

class BerandaController extends Controller
{
    public function index()
    {
        $hero = KontenBeranda::where('bagian', 'hero')->first();
        $akreditasi = KontenBeranda::where('bagian', 'akreditasi_item')->orderBy('urutan')->get();
        $sertifikatKinerja = KontenBeranda::where('bagian', 'sertifikat_item')->orderBy('urutan')->get();
        $tentangPradana = KontenBeranda::where('bagian', 'tentang_pradana')->first();
        $teknologiHeader = KontenBeranda::where('bagian', 'teknologi_header')->first();
        $teknologiItems = KontenBeranda::where('bagian', 'teknologi_item')->where('status_aktif', true)->orderBy('urutan')->get();
        $keunggulanHeader = KontenBeranda::where('bagian', 'keunggulan_header')->first();
        $keunggulanItems = KontenBeranda::where('bagian', 'keunggulan_item')->where('status_aktif', true)->orderBy('urutan')->get();
        $energiHeader = KontenBeranda::where('bagian', 'energi_header')->first();
        $energiItems = KontenBeranda::where('bagian', 'energi_item')->where('status_aktif', true)->orderBy('urutan')->get();
        $clientPhotos = Galeri::where('status_aktif', true)->where('kategori', 'client')->orderBy('urutan')->get();
        $mengapaHeader = KontenBeranda::where('bagian', 'mengapa_header')->first();
        $mengapaItems = KontenBeranda::where('bagian', 'mengapa_item')->where('status_aktif', true)->orderBy('urutan')->get();
        $kontakKami = KontenBeranda::where('bagian', 'kontak_kami')->first();
        $galeri = Galeri::where('status_aktif', true)->orderBy('urutan')->get();
        $logos = Logo::where('aktif', true)->orderBy('urutan')->get();

        return view('pages.landing', compact(
            'hero', 'akreditasi', 'sertifikatKinerja', 'tentangPradana',
            'teknologiHeader', 'teknologiItems', 'keunggulanHeader', 'keunggulanItems',
            'energiHeader', 'energiItems', 'clientPhotos', 'mengapaHeader', 'mengapaItems',
            'kontakKami', 'galeri', 'logos'
        ));
    }

    public function galeri()
    {
        $galeri = Galeri::where('status_aktif', true)->where('kategori', '!=', 'client')->orderBy('urutan')->get();
        return view('pages.galeri', compact('galeri'));
    }

    public function karir()
    {
        $lowongans = LowonganKerja::aktif()->get();
        $karirSettings = KarirSettings::first();
        return view('pages.karir', compact('lowongans', 'karirSettings'));
    }
}
