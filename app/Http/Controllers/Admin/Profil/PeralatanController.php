<?php

namespace App\Http\Controllers\Admin\Profil;

use App\Http\Controllers\Controller;
use App\Models\ProfilPeralatanKetenagalistrikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeralatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peralatan = ProfilPeralatanKetenagalistrikan::orderBy('urutan', 'asc')->get();
        return view('admin.profil.peralatan.index', compact('peralatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.profil.peralatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'nullable|string|max:255',
            'kategori' => 'nullable|in:ukur,uji,safety',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'deskripsi_singkat' => 'nullable|string',
            'jenis_alat' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'spesifikasi' => 'nullable|array',
            'spesifikasi.*' => 'nullable|string',
            'status_kalibrasi' => 'nullable|string|max:255',
            'tanggal_kalibrasi' => 'nullable|date',
            'urutan' => 'nullable|integer',
            'status_aktif' => 'nullable|boolean',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('peralatan', 'public');
        }

        if (isset($validated['spesifikasi'])) {
            $validated['spesifikasi'] = json_encode($validated['spesifikasi']);
        }

        ProfilPeralatanKetenagalistrikan::create($validated);

        return redirect()->route('admin.profil.peralatan.index')
            ->with('success', 'Peralatan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $peralatan = ProfilPeralatanKetenagalistrikan::findOrFail($id);
        return view('admin.profil.peralatan.edit', compact('peralatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $peralatan = ProfilPeralatanKetenagalistrikan::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'nullable|string|max:255',
            'kategori' => 'nullable|in:ukur,uji,safety',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'deskripsi_singkat' => 'nullable|string',
            'jenis_alat' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'spesifikasi' => 'nullable|array',
            'spesifikasi.*' => 'nullable|string',
            'status_kalibrasi' => 'nullable|string|max:255',
            'tanggal_kalibrasi' => 'nullable|date',
            'urutan' => 'nullable|integer',
            'status_aktif' => 'nullable|boolean',
        ]);

        if ($request->hasFile('gambar')) {
            if ($peralatan->gambar) {
                Storage::disk('public')->delete($peralatan->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('peralatan', 'public');
        }

        if (isset($validated['spesifikasi'])) {
            $validated['spesifikasi'] = json_encode($validated['spesifikasi']);
        }

        $peralatan->update($validated);

        return redirect()->route('admin.profil.peralatan.index')
            ->with('success', 'Peralatan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peralatan = ProfilPeralatanKetenagalistrikan::findOrFail($id);

        if ($peralatan->gambar) {
            Storage::disk('public')->delete($peralatan->gambar);
        }
        
        $peralatan->delete();

        return redirect()->route('admin.profil.peralatan.index')
            ->with('success', 'Peralatan berhasil dihapus');
    }
}
