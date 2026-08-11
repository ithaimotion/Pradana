<?php

namespace App\Http\Controllers\Admin\Profil;

use App\Http\Controllers\Controller;
use App\Models\ProfilSop;
use App\Models\SopItem;
use Illuminate\Http\Request;

class SopController extends Controller
{
    public function index()
    {
        $sop = ProfilSop::with('items')->first();
        return view('admin.profil.sop.index', compact('sop'));
    }

    public function create()
    {
        return view('admin.profil.sop.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'dokumen_file' => 'nullable|file|mimes:pdf|max:51200', // 50MB Max
        ]);

        $path = null;
        if ($request->hasFile('dokumen_file')) {
            $path = $request->file('dokumen_file')->store('uploads/sop', 'public');
        }

        ProfilSop::create([
            'judul' => $validated['judul'],
            'subjudul' => null,
            'url_dokumen' => $path,
        ]);

        return redirect()->route('admin.profil.sop.index')->with('success', 'Konten SOP berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $sop = ProfilSop::with('items')->findOrFail($id);
        return view('admin.profil.sop.edit', compact('sop'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'dokumen_file' => 'nullable|file|mimes:pdf|max:51200',
        ]);

        $sop = ProfilSop::findOrFail($id);

        $data = [
            'judul' => $validated['judul'],
            'subjudul' => null,
        ];

        if ($request->hasFile('dokumen_file')) {
            $data['url_dokumen'] = $request->file('dokumen_file')->store('uploads/sop', 'public');
        }

        $sop->update($data);

        return redirect()->route('admin.profil.sop.index')->with('success', 'Konten SOP berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $sop = ProfilSop::findOrFail($id);
        $sop->delete();

        return redirect()->route('admin.profil.sop.index')->with('success', 'Konten SOP berhasil dihapus.');
    }

    // SOP Items CRUD
    public function storeItem(Request $request)
    {
        $validated = $request->validate([
            'profil_sop_id' => 'required|exists:profil_sops,id',
            'kategori' => 'required|string|in:mutu,inspeksi,pelayanan,sdm',
            'kode' => 'nullable|string|max:50',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'revisi' => 'nullable|string|max:100',
            'url_dokumen' => 'nullable|string|max:500',
            'urutan' => 'nullable|integer',
            'status_aktif' => 'nullable|boolean',
        ]);

        SopItem::create($validated);

        return redirect()->back()->with('success', 'Item SOP berhasil ditambahkan.');
    }

    public function updateItem(Request $request, $id)
    {
        $validated = $request->validate([
            'kategori' => 'required|string|in:mutu,inspeksi,pelayanan,sdm',
            'kode' => 'nullable|string|max:50',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'revisi' => 'nullable|string|max:100',
            'url_dokumen' => 'nullable|string|max:500',
            'urutan' => 'nullable|integer',
            'status_aktif' => 'nullable|boolean',
        ]);

        $item = SopItem::findOrFail($id);
        $item->update($validated);

        return redirect()->back()->with('success', 'Item SOP berhasil diperbarui.');
    }

    public function destroyItem($id)
    {
        $item = SopItem::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Item SOP berhasil dihapus.');
    }
}
