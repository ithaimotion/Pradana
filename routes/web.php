<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProfilPageController;
use App\Http\Controllers\SloPageController;
use App\Http\Controllers\InformasiPublikPageController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\FooterLegalPageController;
use App\Http\Controllers\PesanController;

Route::get('/', [BerandaController::class, 'index'])->name('home');

// Old Admin Routes Removed for Filament Migration

Route::post('/hubungi-kami', [PesanController::class, 'storePublik'])->name('hubungi-kami.store');




Route::get('/profil/perusahaan', [ProfilPageController::class, 'perusahaan'])->name('profil.perusahaan');
Route::get('/profil/daftar-pjt-tt', [ProfilPageController::class, 'pjtTt'])->name('profil.pjt-tt');
Route::get('/profil/struktur-organisasi', [ProfilPageController::class, 'struktur'])->name('profil.struktur-organisasi');
Route::get('/profil/legalitas-perusahaan', [ProfilPageController::class, 'legalitas'])->name('profil.legalitas-perusahaan');
Route::get('/profil/peralatan', [ProfilPageController::class, 'peralatan'])->name('profil.peralatan');
Route::get('/profil/sop', [ProfilPageController::class, 'sop'])->name('profil.sop');

// SLO Routes
Route::get('/slo/regulasi', [SloPageController::class, 'regulasi'])->name('slo.regulasi');

Route::get('/slo/verifikasi', function () {
    return redirect()->away('https://siujang.esdm.go.id/Cek-Validalitas-Sertifikat');
})->name('slo.verifikasi');

Route::get('/slo/cek-permohonan', function () {
    return view('pages.slo.cek-permohonan');
})->name('slo.cek-permohonan');

Route::get('/slo/bidang-layanan', [SloPageController::class, 'bidangLayanan'])->name('slo.bidang-layanan');

// Informasi Publik Routes
Route::get('/informasi-publik/maklumat-layanan', [InformasiPublikPageController::class, 'maklumatLayanan'])->name('informasi-publik.maklumat-layanan');
Route::get('/informasi-publik/uji-petik', [InformasiPublikPageController::class, 'ujiPetik'])->name('informasi-publik.uji-petik');
Route::get('/informasi-publik/keluhan-banding', [InformasiPublikPageController::class, 'keluhanBanding'])->name('informasi-publik.keluhan-banding');
Route::post('/informasi-publik/keluhan-banding/submit', [InformasiPublikPageController::class, 'keluhanBandingSubmit'])->name('informasi-publik.keluhan-banding.submit');
Route::get('/informasi-publik/keluhan-banding/submit', function () {
    return redirect()->route('informasi-publik.keluhan-banding');
});

Route::get('/informasi-publik/persyaratan-slo', [InformasiPublikPageController::class, 'persyaratanSlo'])->name('informasi-publik.persyaratan-slo');

Route::get('/informasi-publik/daftar-harga-slo', [InformasiPublikPageController::class, 'daftarHargaSlo'])->name('informasi-publik.daftar-harga-slo');

Route::get('/informasi-publik/prosedur-slo', [InformasiPublikPageController::class, 'prosedurSlo'])->name('informasi-publik.prosedur-slo');

Route::get('/informasi-publik/alur-sertifikasi', [InformasiPublikPageController::class, 'alurSertifikasi'])->name('informasi-publik.alur-sertifikasi');

// Main Menu Routes
Route::get('/galeri', [BerandaController::class, 'galeri'])->name('galeri');

Route::get('/karir', [BerandaController::class, 'karir'])->name('karir');

Route::get('/hubungi-kami', function () {
    return view('pages.hubungi-kami');
})->name('hubungi-kami');

Route::get('/kebijakan-privasi', [FooterLegalPageController::class, 'show'])->name('legal.privacy');
Route::get('/syarat-dan-ketentuan', [FooterLegalPageController::class, 'show'])->name('legal.terms');
Route::get('/kebijakan-cookie', [FooterLegalPageController::class, 'show'])->name('legal.cookie');

// HELPER ROUTE UNTUK CPANEL/DOMAINESIA
// Buka namadomain.com/link-storage setelah deploy untuk memastikan gambar muncul
Route::get('/link-storage', function () {
    if (app()->environment('production')) {
        \Illuminate\Support\Facades\Artisan::call('storage:link');
        return 'Storage Link Berhasil Dibuat di Production!';
    }
    return 'Route ini hanya aktif di mode production.';
});
