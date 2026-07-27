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
            'tipe'        => 'required|in:uu_pp,permen_esdm,sni',
            'url_dokumen' => 'nullable|url|max:500',
            'urutan'      => 'nullable|integer|min:0',
            'is_active'   => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['urutan']    = $validated['urutan'] ?? 0;

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
            'tipe'        => 'required|in:uu_pp,permen_esdm,sni',
            'url_dokumen' => 'nullable|url|max:500',
            'urutan'      => 'nullable|integer|min:0',
            'is_active'   => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['urutan']    = $validated['urutan'] ?? 0;

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
