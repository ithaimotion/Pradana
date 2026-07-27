<?php

namespace App\Http\Controllers\Admin\Profil;

use App\Http\Controllers\Controller;
use App\Models\ProfilLegalitas;
use App\Models\ProfilLegalitasItem;
use App\Models\ProfilLegalitasTenagaTeknik;
use Illuminate\Http\Request;

class LegalitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $legalitas = ProfilLegalitas::first();
        return view('admin.profil.legalitas.index', compact('legalitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.profil.legalitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'nullable|string|max:255',
            'subjudul' => 'nullable|string',
            'konten' => 'nullable|string',
            'dokumen' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('dokumen')) {
            $validated['dokumen'] = $request->file('dokumen')->store('legalitas', 'public');
        }

        ProfilLegalitas::create($validated);

        return redirect()->route('admin.profil.legalitas.index')
            ->with('success', 'Legalitas berhasil dibuat');
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
        $legalitas = ProfilLegalitas::with(['items', 'tenagaTeknik'])->findOrFail($id);
        return view('admin.profil.legalitas.edit', compact('legalitas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $legalitas = ProfilLegalitas::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'nullable|string|max:255',
            'subjudul' => 'nullable|string',
            'konten' => 'nullable|string',
            'dokumen' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('dokumen')) {
            if ($legalitas->dokumen) {
                \Storage::disk('public')->delete($legalitas->dokumen);
            }
            $validated['dokumen'] = $request->file('dokumen')->store('legalitas', 'public');
        }

        $legalitas->update($validated);

        return redirect()->route('admin.profil.legalitas.index')
            ->with('success', 'Legalitas berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $legalitas = ProfilLegalitas::findOrFail($id);
        
        if ($legalitas->dokumen) {
            \Storage::disk('public')->delete($legalitas->dokumen);
        }
        
        $legalitas->delete();

        return redirect()->route('admin.profil.legalitas.index')
            ->with('success', 'Legalitas berhasil dihapus');
    }

    /**
     * Store a new legalitas item.
     */
    public function storeItem(Request $request)
    {
        $validated = $request->validate([
            'profil_legalitas_id' => 'required|exists:profil_legalitas,id',
            'kategori' => 'nullable|string|max:255',
            'nama_dokumen' => 'nullable|string|max:255',
            'nomor' => 'nullable|string|max:255',
            'penerbit' => 'nullable|string|max:255',
            'tanggal_terbit' => 'nullable|date',
            'berlaku_sampai' => 'nullable|date',
            'status' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf|max:10240',
            'urutan' => 'nullable|integer',
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('legalitas-items', 'public');
        }

        ProfilLegalitasItem::create($validated);

        return back()->with('success', 'Item legalitas berhasil ditambahkan');
    }

    /**
     * Update a legalitas item.
     */
    public function updateItem(Request $request, string $id)
    {
        $item = ProfilLegalitasItem::findOrFail($id);

        $validated = $request->validate([
            'kategori' => 'nullable|string|max:255',
            'nama_dokumen' => 'nullable|string|max:255',
            'nomor' => 'nullable|string|max:255',
            'penerbit' => 'nullable|string|max:255',
            'tanggal_terbit' => 'nullable|date',
            'berlaku_sampai' => 'nullable|date',
            'status' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf|max:10240',
            'urutan' => 'nullable|integer',
        ]);

        if ($request->hasFile('file')) {
            if ($item->file) {
                \Storage::disk('public')->delete($item->file);
            }
            $validated['file'] = $request->file('file')->store('legalitas-items', 'public');
        }

        $item->update($validated);

        return back()->with('success', 'Item legalitas berhasil diupdate');
    }

    /**
     * Destroy a legalitas item.
     */
    public function destroyItem(string $id)
    {
        $item = ProfilLegalitasItem::findOrFail($id);
        
        if ($item->file) {
            \Storage::disk('public')->delete($item->file);
        }
        
        $item->delete();

        return back()->with('success', 'Item legalitas berhasil dihapus');
    }

    /**
     * Store a new tenaga teknik.
     */
    public function storeTenagaTeknik(Request $request)
    {
        $validated = $request->validate([
            'profil_legalitas_id' => 'required|exists:profil_legalitas,id',
            'nama' => 'nullable|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'no_sertifikat' => 'nullable|string|max:255',
            'bidang_kompetensi' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'urutan' => 'nullable|integer',
        ]);

        ProfilLegalitasTenagaTeknik::create($validated);

        return back()->with('success', 'Tenaga teknik berhasil ditambahkan');
    }

    /**
     * Update a tenaga teknik.
     */
    public function updateTenagaTeknik(Request $request, string $id)
    {
        $tenaga = ProfilLegalitasTenagaTeknik::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'nullable|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'no_sertifikat' => 'nullable|string|max:255',
            'bidang_kompetensi' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'urutan' => 'nullable|integer',
        ]);

        $tenaga->update($validated);

        return back()->with('success', 'Tenaga teknik berhasil diupdate');
    }

    /**
     * Destroy a tenaga teknik.
     */
    public function destroyTenagaTeknik(string $id)
    {
        $tenaga = ProfilLegalitasTenagaTeknik::findOrFail($id);
        $tenaga->delete();

        return back()->with('success', 'Tenaga teknik berhasil dihapus');
    }
}
