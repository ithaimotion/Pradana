<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterLink;
use Illuminate\Http\Request;

class FooterLinkController extends Controller
{
    public function index()
    {
        $footerLinks = FooterLink::orderBy('tipe')->orderBy('urutan')->get();

        return view('admin.footer-links.index', compact('footerLinks'));
    }

    public function create()
    {
        return view('admin.footer-links.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'tipe' => 'required|in:legal,sosial,info',
            'urutan' => 'nullable|integer|min:0',
            'aktif' => 'sometimes|boolean',
        ]);

        FooterLink::create([
            'label' => $request->label,
            'url' => $request->url,
            'tipe' => $request->tipe,
            'urutan' => $request->urutan ?? FooterLink::max('urutan') + 1,
            'aktif' => $request->has('aktif'),
        ]);

        return redirect()->route('admin.footer-links.index')->with('success', 'Link footer berhasil ditambahkan.');
    }

    public function edit(FooterLink $footerLink)
    {
        return view('admin.footer-links.edit', compact('footerLink'));
    }

    public function update(Request $request, FooterLink $footerLink)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'tipe' => 'required|in:legal,sosial,info',
            'urutan' => 'nullable|integer|min:0',
            'aktif' => 'sometimes|boolean',
        ]);

        $footerLink->update([
            'label' => $request->label,
            'url' => $request->url,
            'tipe' => $request->tipe,
            'urutan' => $request->urutan ?? $footerLink->urutan,
            'aktif' => $request->has('aktif'),
        ]);

        return redirect()->route('admin.footer-links.index')->with('success', 'Link footer berhasil diperbarui.');
    }

    public function destroy(FooterLink $footerLink)
    {
        $footerLink->delete();

        return redirect()->route('admin.footer-links.index')->with('success', 'Link footer berhasil dihapus.');
    }
}
