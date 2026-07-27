<?php

namespace App\Http\Controllers;

use App\Models\SloRegulasi;
use App\Models\SloKategoriLayanan;
use Illuminate\View\View;

class SloPageController extends Controller
{
    /**
     * Display the public Regulasi SLO landing page.
     */
    public function regulasi(): View
    {
        $regulasiList = SloRegulasi::aktif()
            ->get()
            ->groupBy('tipe');

        return view('pages.slo.regulasi', compact('regulasiList'));
    }

    /**
     * Display the public Bidang Layanan SLO landing page.
     */
    public function bidangLayanan(): View
    {
        $kategoriTR = SloKategoriLayanan::aktif()
            ->byKategori('TR')
            ->get();

        $kategoriTM = SloKategoriLayanan::aktif()
            ->byKategori('TM')
            ->get();

        $kategoriPembangkit = SloKategoriLayanan::aktif()
            ->byKategori('PEMBANGKIT')
            ->get();

        return view('pages.slo.bidang-layanan', compact('kategoriTR', 'kategoriTM', 'kategoriPembangkit'));
    }
}
