<?php

namespace App\Http\Controllers;

use App\Models\LegalSetting;
use Illuminate\Http\Request;

class FooterLegalPageController extends Controller
{
    public function show(Request $request)
    {
        $routeName = $request->route()->getName();
        $kunci = $this->mapRouteNameToKunci($routeName);

        $settings = LegalSetting::first();
        $content = new \stdClass();
        $content->judul = $this->defaultTitle($kunci);
        $content->konten = null;

        if ($settings) {
            if ($kunci === 'privacy') {
                $content->judul = $settings->kebijakan_privasi_judul ?? $content->judul;
                $content->konten = $settings->kebijakan_privasi_konten;
            } elseif ($kunci === 'terms') {
                $content->judul = $settings->syarat_ketentuan_judul ?? $content->judul;
                $content->konten = $settings->syarat_ketentuan_konten;
            } elseif ($kunci === 'cookie') {
                $content->judul = $settings->kebijakan_cookie_judul ?? $content->judul;
                $content->konten = $settings->kebijakan_cookie_konten;
            }
        }

        return view('pages.legal.page', compact('content', 'kunci'));
    }

    private function mapRouteNameToKunci(?string $routeName): string
    {
        return match ($routeName) {
            'legal.privacy' => 'privacy',
            'legal.terms' => 'terms',
            'legal.cookie' => 'cookie',
            default => 'privacy',
        };
    }

    private function defaultTitle(string $kunci): string
    {
        return match ($kunci) {
            'privacy' => 'Kebijakan Privasi',
            'terms' => 'Syarat & Ketentuan',
            'cookie' => 'Kebijakan Cookie',
            default => 'Halaman Legal',
        };
    }
}
