<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KontenHalaman;

class InformasiPublikPageController extends Controller
{
    public function maklumatLayanan()
    {
        $maklumat = KontenHalaman::where('halaman', 'informasi-publik')
            ->where('kunci', 'maklumat-layanan')
            ->first();

        return view('pages.informasi-publik.maklumat-layanan', compact('maklumat'));
    }
}
