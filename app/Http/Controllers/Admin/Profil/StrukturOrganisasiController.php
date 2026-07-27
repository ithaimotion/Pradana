<?php

namespace App\Http\Controllers\Admin\Profil;

use App\Http\Controllers\Controller;
use App\Models\ProfilStrukturOrganisasi;
use App\Models\ProfilStrukturOrganisasiItem;
use Illuminate\Http\Request;

class StrukturOrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $strukturOrg = ProfilStrukturOrganisasi::with('items')->first();
        return view('admin.profil.struktur-organisasi.index', compact('strukturOrg'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.profil.struktur-organisasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'subjudul' => 'nullable|string',
            'konten' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('struktur-organisasi', 'public');
            $validated['gambar'] = $imagePath;
        }

        $strukturOrg = ProfilStrukturOrganisasi::create($validated);

        return redirect()->route('admin.profil.struktur-organisasi.edit', $strukturOrg->id)->with('success', 'Struktur Organisasi created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $strukturOrg = ProfilStrukturOrganisasi::with('items')->findOrFail($id);
        return view('admin.profil.struktur-organisasi.show', compact('strukturOrg'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $strukturOrg = ProfilStrukturOrganisasi::with('items')->findOrFail($id);
        return view('admin.profil.struktur-organisasi.edit', compact('strukturOrg'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $strukturOrg = ProfilStrukturOrganisasi::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'subjudul' => 'nullable|string',
            'konten' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('struktur-organisasi', 'public');
            $validated['gambar'] = $imagePath;
        }

        $strukturOrg->update($validated);

        return redirect()->route('admin.profil.struktur-organisasi.edit', $strukturOrg->id)->with('success', 'Struktur Organisasi updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $strukturOrg = ProfilStrukturOrganisasi::findOrFail($id);
        $strukturOrg->delete();

        return redirect()->route('admin.profil.struktur-organisasi.index')->with('success', 'Struktur Organisasi deleted successfully.');
    }

    /**
     * Store a new item.
     */
    public function storeItem(Request $request)
    {
        $validated = $request->validate([
            'profil_struktur_organisasi_id' => 'required|exists:profil_struktur_organisasis,id',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'divisi' => 'nullable|string|max:255',
            'level' => 'required|integer',
            'urutan' => 'nullable|integer',
        ]);

        ProfilStrukturOrganisasiItem::create($validated);

        return back()->with('success', 'Item Struktur Organisasi added successfully.');
    }

    /**
     * Update an item.
     */
    public function updateItem(Request $request, string $id)
    {
        $item = ProfilStrukturOrganisasiItem::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'divisi' => 'nullable|string|max:255',
            'level' => 'required|integer',
            'urutan' => 'nullable|integer',
        ]);

        $item->update($validated);

        return back()->with('success', 'Item Struktur Organisasi updated successfully.');
    }

    /**
     * Delete an item.
     */
    public function destroyItem(string $id)
    {
        $item = ProfilStrukturOrganisasiItem::findOrFail($id);
        $item->delete();

        return back()->with('success', 'Item Struktur Organisasi deleted successfully.');
    }
}
