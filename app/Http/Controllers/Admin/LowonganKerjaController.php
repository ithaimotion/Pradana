<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LowonganKerja;
use Illuminate\Http\Request;

class LowonganKerjaController extends Controller
{
    public function index()
    {
        $lowonganList = LowonganKerja::orderBy('urutan')->orderBy('id')->get();
        return view('admin.lowongan-kerja.index', compact('lowonganList'));
    }

    public function create()
    {
        $tipeOptions = LowonganKerja::tipeOptions();
        return view('admin.lowongan-kerja.create', compact('tipeOptions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'divisi' => 'required|string|max:100',
            'tipe' => 'required|string|max:50',
            'lokasi' => 'required|string|max:100',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'persyaratan' => 'nullable|string',
            'link_lamar' => 'nullable|url|max:500',
            'urutan' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['urutan'] = $validated['urutan'] ?? 0;
        $validated['is_active'] = $request->has('is_active');

        LowonganKerja::create($validated);

        return redirect()->route('admin.lowongan-kerja.index')
            ->with('success', 'Lowongan kerja berhasil ditambahkan.');
    }

    public function edit(LowonganKerja $lowonganKerja)
    {
        $tipeOptions = LowonganKerja::tipeOptions();
        return view('admin.lowongan-kerja.edit', compact('lowonganKerja', 'tipeOptions'));
    }

    public function update(Request $request, LowonganKerja $lowonganKerja)
    {
        $validated = $request->validate([
            'divisi' => 'required|string|max:100',
            'tipe' => 'required|string|max:50',
            'lokasi' => 'required|string|max:100',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'persyaratan' => 'nullable|string',
            'link_lamar' => 'nullable|url|max:500',
            'urutan' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['urutan'] = $validated['urutan'] ?? 0;
        $validated['is_active'] = $request->has('is_active');

        $lowonganKerja->update($validated);

        return redirect()->route('admin.lowongan-kerja.index')
            ->with('success', 'Lowongan kerja berhasil diperbarui.');
    }

    public function destroy(LowonganKerja $lowonganKerja)
    {
        $lowonganKerja->delete();

        return redirect()->route('admin.lowongan-kerja.index')
            ->with('success', 'Lowongan kerja berhasil dihapus.');
    }
}
