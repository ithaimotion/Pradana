<?php

namespace App\Http\Controllers\Admin\Profil;

use App\Http\Controllers\Controller;
use App\Models\ProfilPerusahaan;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profilPerusahaan = ProfilPerusahaan::first();
        return view('admin.profil.perusahaan.index', compact('profilPerusahaan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.profil.perusahaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'nullable|string|max:255',
            'subjudul' => 'nullable|string',
            'nilai' => 'nullable|string|max:255',
            'konten' => 'nullable|string',
            'url_gambar' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'nilai_perusahaan' => 'nullable|array',
        ]);

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('profil-perusahaan', 'public');
            $validated['url_gambar'] = $imagePath;
        }

        ProfilPerusahaan::create($validated);

        return redirect()->route('admin.profil.perusahaan.index')->with('success', 'Profil Perusahaan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profilPerusahaan = ProfilPerusahaan::findOrFail($id);
        return view('admin.profil.perusahaan.show', compact('profilPerusahaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profilPerusahaan = ProfilPerusahaan::findOrFail($id);
        return view('admin.profil.perusahaan.edit', compact('profilPerusahaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profilPerusahaan = ProfilPerusahaan::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'nullable|string|max:255',
            'subjudul' => 'nullable|string',
            'nilai' => 'nullable|string|max:255',
            'konten' => 'nullable|string',
            'url_gambar' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'nilai_perusahaan' => 'nullable|array',
        ]);

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('profil-perusahaan', 'public');
            $validated['url_gambar'] = $imagePath;
        }

        $profilPerusahaan->update($validated);

        return redirect()->route('admin.profil.perusahaan.index')->with('success', 'Profil Perusahaan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profilPerusahaan = ProfilPerusahaan::findOrFail($id);
        $profilPerusahaan->delete();

        return redirect()->route('admin.profil.perusahaan.index')->with('success', 'Profil Perusahaan deleted successfully.');
    }
}
