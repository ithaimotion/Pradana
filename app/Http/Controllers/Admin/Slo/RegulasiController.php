<?php

namespace App\Http\Controllers\Admin\Slo;

use App\Http\Controllers\Controller;
use App\Models\SloRegulasi;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RegulasiController extends Controller
{
    /**
     * Display list of all regulasi items.
     */
    public function index(): View
    {
        $regulasiList = SloRegulasi::orderBy('urutan')->orderBy('id')->get();

        return view('admin.slo.regulasi.index', compact('regulasiList'));
    }

    /**
     * Show form to create new regulasi.
     */
    public function create(): View
    {
        $tipeOptions = SloRegulasi::tipeOptions();

        return view('admin.slo.regulasi.create', compact('tipeOptions'));
    }

    /**
     * Store a new regulasi entry.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nomor'       => 'required|string|max:255',
            'keterangan'  => 'required|string',
            'dokumen'     => 'nullable|file|mimes:pdf|max:51200', // 50MB Max
        ]);

        $pathDokumen = null;
        if ($request->hasFile('dokumen')) {
            $pathDokumen = $request->file('dokumen')->store('uploads/regulasi', 'public');
        }

        $validated['tipe']        = 'uu_pp';
        $validated['url_dokumen'] = $pathDokumen;
        $validated['urutan']      = 0;
        $validated['is_active']   = true;

        SloRegulasi::create($validated);

        return redirect()
            ->route('admin.slo.regulasi.index')
            ->with('success', 'Regulasi berhasil ditambahkan.');
    }

    /**
     * Show form to edit an existing regulasi.
     */
    public function edit(SloRegulasi $regulasi): View
    {
        $tipeOptions = SloRegulasi::tipeOptions();

        return view('admin.slo.regulasi.edit', compact('regulasi', 'tipeOptions'));
    }

    /**
     * Update an existing regulasi entry.
     */
    public function update(Request $request, SloRegulasi $regulasi): RedirectResponse
    {
        $validated = $request->validate([
            'nomor'       => 'required|string|max:255',
            'keterangan'  => 'required|string',
            'dokumen'     => 'nullable|file|mimes:pdf|max:51200',
        ]);

        if ($request->hasFile('dokumen')) {
            $validated['url_dokumen'] = $request->file('dokumen')->store('uploads/regulasi', 'public');
        }

        $regulasi->update($validated);

        return redirect()
            ->route('admin.slo.regulasi.index')
            ->with('success', 'Regulasi berhasil diperbarui.');
    }

    /**
     * Delete a regulasi entry.
     */
    public function destroy(SloRegulasi $regulasi): RedirectResponse
    {
        $regulasi->delete();

        return redirect()
            ->route('admin.slo.regulasi.index')
            ->with('success', 'Regulasi berhasil dihapus.');
    }
}
