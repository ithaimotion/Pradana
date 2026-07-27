<?php

namespace App\Http\Controllers\Admin\Profil;

use App\Http\Controllers\Controller;
use App\Models\ProfilDaftarPJTTT;
use App\Models\ProfilDaftarPJTTTItem;
use Illuminate\Http\Request;

class DaftarPJTTTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daftarPJTTT = ProfilDaftarPJTTT::with('items')->first();
        return view('admin.profil.daftar-pjttt.index', compact('daftarPJTTT'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.profil.daftar-pjttt.create');
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
            'dokumen' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('dokumen')) {
            $documentPath = $request->file('dokumen')->store('dokumen-pjttt', 'public');
            $validated['dokumen'] = $documentPath;
        }

        $daftarPJTTT = ProfilDaftarPJTTT::create($validated);

        return redirect()->route('admin.profil.daftar-pjttt.edit', $daftarPJTTT->id)->with('success', 'Daftar PJT & TT created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $daftarPJTTT = ProfilDaftarPJTTT::with('items')->findOrFail($id);
        return view('admin.profil.daftar-pjttt.show', compact('daftarPJTTT'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $daftarPJTTT = ProfilDaftarPJTTT::with('items')->findOrFail($id);
        return view('admin.profil.daftar-pjttt.edit', compact('daftarPJTTT'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $daftarPJTTT = ProfilDaftarPJTTT::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'subjudul' => 'nullable|string',
            'konten' => 'nullable|string',
            'dokumen' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('dokumen')) {
            $documentPath = $request->file('dokumen')->store('dokumen-pjttt', 'public');
            $validated['dokumen'] = $documentPath;
        }

        $daftarPJTTT->update($validated);

        return redirect()->route('admin.profil.daftar-pjttt.edit', $daftarPJTTT->id)->with('success', 'Daftar PJT & TT updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $daftarPJTTT = ProfilDaftarPJTTT::findOrFail($id);
        $daftarPJTTT->delete();

        return redirect()->route('admin.profil.daftar-pjttt.index')->with('success', 'Daftar PJT & TT deleted successfully.');
    }

    /**
     * Store a new item.
     */
    public function storeItem(Request $request)
    {
        $validated = $request->validate([
            'profil_daftar_p_j_t_t_t_id' => 'required|exists:profil_daftar_p_j_t_t_t_s,id',
            'kategori' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|in:PJT,TT',
            'no_sertifikat' => 'required|string|max:255',
            'no_register' => 'required|string|max:255',
            'urutan' => 'nullable|integer',
        ]);

        ProfilDaftarPJTTTItem::create($validated);

        return back()->with('success', 'Item PJT & TT added successfully.');
    }

    /**
     * Update an item.
     */
    public function updateItem(Request $request, string $id)
    {
        $item = ProfilDaftarPJTTTItem::findOrFail($id);

        $validated = $request->validate([
            'kategori' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|in:PJT,TT',
            'no_sertifikat' => 'required|string|max:255',
            'no_register' => 'required|string|max:255',
            'urutan' => 'nullable|integer',
        ]);

        $item->update($validated);

        return back()->with('success', 'Item PJT & TT updated successfully.');
    }

    /**
     * Delete an item.
     */
    public function destroyItem(string $id)
    {
        $item = ProfilDaftarPJTTTItem::findOrFail($id);
        $item->delete();

        return back()->with('success', 'Item PJT & TT deleted successfully.');
    }
}
