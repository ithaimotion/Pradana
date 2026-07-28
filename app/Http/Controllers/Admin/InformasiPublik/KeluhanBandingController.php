<?php

namespace App\Http\Controllers\Admin\InformasiPublik;

use App\Http\Controllers\Controller;
use App\Models\KeluhanBandingSetting;
use App\Models\KeluhanBandingSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KeluhanBandingController extends Controller
{
    /**
     * Display the Keluhan & Banding admin page.
     */
    public function index()
    {
        $setting = KeluhanBandingSetting::first();
        $submissions = KeluhanBandingSubmission::latest()->get();

        return view('admin.informasi-publik.keluhan-banding-index', compact('setting', 'submissions'));
    }

    /**
     * Update the Keluhan & Banding settings image.
     */
    public function updateSettings(Request $request)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        $setting = KeluhanBandingSetting::first() ?? new KeluhanBandingSetting();

        if ($request->hasFile('gambar')) {
            if ($setting->path_gambar && !str_starts_with($setting->path_gambar, 'http')) {
                Storage::disk('public')->delete($setting->path_gambar);
            }
            $setting->path_gambar = $request->file('gambar')->store('uploads/keluhan-banding', 'public');
        }

        $setting->save();

        return back()->with('success', 'Gambar Alur Keluhan & Banding berhasil diperbarui!');
    }

    /**
     * Update submission status.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,selesai,ditolak',
            'catatan_admin' => 'nullable|string',
        ]);

        $submission = KeluhanBandingSubmission::findOrFail($id);
        $submission->status = $request->status;
        $submission->catatan_admin = $request->catatan_admin;
        $submission->save();

        return back()->with('success', 'Status keluhan/banding berhasil diperbarui!');
    }

    /**
     * Delete submission.
     */
    public function destroy($id)
    {
        $submission = KeluhanBandingSubmission::findOrFail($id);
        $submission->delete();

        return back()->with('success', 'Keluhan/banding berhasil dihapus!');
    }
}
