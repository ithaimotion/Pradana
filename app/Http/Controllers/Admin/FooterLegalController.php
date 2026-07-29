<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KontenHalaman;
use Illuminate\Http\Request;

class FooterLegalController extends Controller
{
    public function index()
    {
        $pages = KontenHalaman::where('halaman', 'footer_legal')->get()->keyBy('kunci');

        return view('admin.footer-legal', compact('pages'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'halaman' => 'required|string|in:footer_legal',
            'kunci' => 'required|string|in:privacy,terms,cookie',
            'judul' => 'required|string|max:255',
            'konten' => 'nullable|string',
        ]);

        $page = KontenHalaman::firstOrNew([
            'halaman' => $request->halaman,
            'kunci' => $request->kunci,
        ]);

        $page->judul = $request->judul;
        $page->konten = $request->konten;
        $page->save();

        return back()->with('success', 'Konten ' . $this->labelFromKunci($request->kunci) . ' berhasil disimpan.');
    }

    private function labelFromKunci(string $kunci): string
    {
        return match ($kunci) {
            'privacy' => 'Kebijakan Privasi',
            'terms' => 'Syarat & Ketentuan',
            'cookie' => 'Kebijakan Cookie',
            default => 'Halaman Legal',
        };
    }
}
