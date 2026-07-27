<?php

namespace App\Http\Controllers\Admin\Slo;

use App\Http\Controllers\Controller;
use App\Models\SloKategoriLayanan;
use Illuminate\Http\Request;

class KategoriLayananController extends Controller
{
    public function index()
    {
        $kategoriList = SloKategoriLayanan::orderBy('kategori_utama')->orderBy('urutan')->orderBy('id')->get();
        return view('admin.slo.kategori-layanan.index', compact('kategoriList'));
    }

    public function create()
    {
        $kategoriOptions = SloKategoriLayanan::kategoriOptions();
        return view('admin.slo.kategori-layanan.create', compact('kategoriOptions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_utama' => 'required|in:TR,TM,PEMBANGKIT',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'ikon' => 'nullable|string|max:50',
            'tags' => 'nullable|array',
            'tags.*' => 'nullable|string|max:50',
            'urutan' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['urutan'] = $validated['urutan'] ?? 0;
        $validated['is_active'] = $request->has('is_active');
        $validated['tags'] = $validated['tags'] ?? [];

        SloKategoriLayanan::create($validated);

        return redirect()->route('admin.slo.kategori-layanan.index')
            ->with('success', 'Kategori layanan berhasil ditambahkan.');
    }

    public function edit(SloKategoriLayanan $kategoriLayanan)
    {
        $kategoriOptions = SloKategoriLayanan::kategoriOptions();
        return view('admin.slo.kategori-layanan.edit', compact('kategoriLayanan', 'kategoriOptions'));
    }

    public function update(Request $request, SloKategoriLayanan $kategoriLayanan)
    {
        $validated = $request->validate([
            'kategori_utama' => 'required|in:TR,TM,PEMBANGKIT',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'ikon' => 'nullable|string|max:50',
            'tags' => 'nullable|array',
            'tags.*' => 'nullable|string|max:50',
            'urutan' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['urutan'] = $validated['urutan'] ?? 0;
        $validated['is_active'] = $request->has('is_active');
        $validated['tags'] = $validated['tags'] ?? [];

        $kategoriLayanan->update($validated);

        return redirect()->route('admin.slo.kategori-layanan.index')
            ->with('success', 'Kategori layanan berhasil diperbarui.');
    }

    public function destroy(SloKategoriLayanan $kategoriLayanan)
    {
        $kategoriLayanan->delete();

        return redirect()->route('admin.slo.kategori-layanan.index')
            ->with('success', 'Kategori layanan berhasil dihapus.');
    }
}
