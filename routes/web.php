<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProfilPageController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\SloController;
use App\Http\Controllers\Admin\InformasiPublikController;
use App\Http\Controllers\Admin\InformasiPublik\MaklumatLayananController;
use App\Http\Controllers\Admin\InformasiPublik\UjiPetikController;
use App\Http\Controllers\Admin\InformasiPublik\KeluhanBandingController;
use App\Http\Controllers\Admin\KarirController;
use App\Http\Controllers\Admin\PesanController;
use App\Http\Controllers\Admin\Profil\PerusahaanController;
use App\Http\Controllers\Admin\Profil\DaftarPJTTTController;
use App\Http\Controllers\Admin\Profil\StrukturOrganisasiController;
use App\Http\Controllers\Admin\Profil\LegalitasController;
use App\Http\Controllers\Admin\Profil\PeralatanController;
use App\Http\Controllers\Admin\Profil\SopController;
use App\Http\Controllers\Admin\Slo\RegulasiController as AdminSloRegulasiController;
use App\Http\Controllers\Admin\Slo\KategoriLayananController;
use App\Http\Controllers\Admin\LowonganKerjaController;
use App\Http\Controllers\Admin\FooterLinkController;
use App\Http\Controllers\Admin\FooterLegalController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\FooterLegalPageController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\SloPageController;
use App\Http\Controllers\InformasiPublikPageController;

Route::get('/', [BerandaController::class, 'index'])->name('home');

// Admin Login & Logout Routes
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Protected Admin Panel Routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class)->except(['show']);
    Route::post('/hero', [AdminController::class, 'updateHero'])->name('hero.update');
    Route::post('/tentang-pradana', [AdminController::class, 'updateTentangPradana'])->name('tentang.update');
    Route::post('/teknologi-header', [AdminController::class, 'updateTeknologiHeader'])->name('teknologi.header');
    Route::post('/keunggulan-header', [AdminController::class, 'updateKeunggulanHeader'])->name('keunggulan.header');
    Route::post('/energi-header', [AdminController::class, 'updateEnergiHeader'])->name('energi.header');
    Route::post('/mengapa-header', [AdminController::class, 'updateMengapaHeader'])->name('mengapa.header');
    Route::post('/kontak-header', [AdminController::class, 'updateKontakHeader'])->name('kontak.header');
    Route::post('/konten', [AdminController::class, 'store'])->name('konten.store');
    Route::put('/konten/{id}', [AdminController::class, 'update'])->name('konten.update');
    Route::delete('/konten/{id}', [AdminController::class, 'destroy'])->name('konten.destroy');

    // Modular Sub-Menu Routes: Profil
    Route::post('/profil/halaman', [ProfilController::class, 'update'])->name('profil.halaman.update');

    // Modular Sub-Menu Routes: SLO
    Route::post('/slo/halaman', [SloController::class, 'update'])->name('slo.halaman.update');

    // Modular Sub-Menu Routes: Informasi Publik
    Route::post('/informasi-publik/halaman', [InformasiPublikController::class, 'update'])->name('infopublik.halaman.update');

    // Modular Sub-Menu Routes: Karir
    Route::post('/karir/header', [KarirController::class, 'updateHeader'])->name('karir.header.update');
    Route::get('/karir-settings', [KarirController::class, 'karirSettings'])->name('karir-settings.index');
    Route::post('/karir-settings', [KarirController::class, 'updateKarirSettings'])->name('karir-settings.update');
    Route::post('/lowongan', [KarirController::class, 'storeLowongan'])->name('lowongan.store');
    Route::put('/lowongan/{id}', [KarirController::class, 'updateLowongan'])->name('lowongan.update');
    Route::delete('/lowongan/{id}', [KarirController::class, 'destroyLowongan'])->name('lowongan.destroy');

    // Modular Sub-Menu Routes: Pesan Masuk (Inbox)
    Route::post('/pesan/{id}/read', [PesanController::class, 'toggleRead'])->name('pesan.read');
    Route::delete('/pesan/{id}', [PesanController::class, 'destroy'])->name('pesan.destroy');
    Route::post('/hubungi-kami/settings', [AdminController::class, 'updateHubungiKamiSettings'])->name('hubungi-kami.update');

    // Gallery Routes
    Route::post('/galeri', [GaleriController::class, 'store'])->name('galeri.store');
    Route::put('/galeri/{id}', [GaleriController::class, 'update'])->name('galeri.update');
    Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');

    // Logo Routes
    Route::post('/logo', [LogoController::class, 'store'])->name('logo.store');
    Route::put('/logo/{id}', [LogoController::class, 'update'])->name('logo.update');
    Route::delete('/logo/{id}', [LogoController::class, 'destroy'])->name('logo.destroy');

    // Profil Perusahaan CRUD Routes
    Route::resource('profil/perusahaan', PerusahaanController::class)->names('profil.perusahaan');

    // Daftar PJT & TT CRUD Routes
    Route::resource('profil/daftar-pjttt', DaftarPJTTTController::class)->names('profil.daftar-pjttt');
    Route::post('profil/daftar-pjttt/items', [DaftarPJTTTController::class, 'storeItem'])->name('profil.daftar-pjttt.items.store');
    Route::put('profil/daftar-pjttt/items/{id}', [DaftarPJTTTController::class, 'updateItem'])->name('profil.daftar-pjttt.items.update');
    Route::delete('profil/daftar-pjttt/items/{id}', [DaftarPJTTTController::class, 'destroyItem'])->name('profil.daftar-pjttt.items.destroy');

    // Struktur Organisasi CRUD Routes
    Route::resource('profil/struktur-organisasi', StrukturOrganisasiController::class)->names('profil.struktur-organisasi');
    Route::post('profil/struktur-organisasi/items', [StrukturOrganisasiController::class, 'storeItem'])->name('profil.struktur-organisasi.items.store');
    Route::put('profil/struktur-organisasi/items/{id}', [StrukturOrganisasiController::class, 'updateItem'])->name('profil.struktur-organisasi.items.update');
    Route::delete('profil/struktur-organisasi/items/{id}', [StrukturOrganisasiController::class, 'destroyItem'])->name('profil.struktur-organisasi.items.destroy');

    // Legalitas CRUD Routes
    Route::resource('profil/legalitas', LegalitasController::class)->names('profil.legalitas');
    Route::post('profil/legalitas/items', [LegalitasController::class, 'storeItem'])->name('profil.legalitas.items.store');
    Route::put('profil/legalitas/items/{id}', [LegalitasController::class, 'updateItem'])->name('profil.legalitas.items.update');
    Route::delete('profil/legalitas/items/{id}', [LegalitasController::class, 'destroyItem'])->name('profil.legalitas.items.destroy');
    Route::post('profil/legalitas/tenaga-teknik', [LegalitasController::class, 'storeTenagaTeknik'])->name('profil.legalitas.tenaga-teknik.store');
    Route::put('profil/legalitas/tenaga-teknik/{id}', [LegalitasController::class, 'updateTenagaTeknik'])->name('profil.legalitas.tenaga-teknik.update');
    Route::delete('profil/legalitas/tenaga-teknik/{id}', [LegalitasController::class, 'destroyTenagaTeknik'])->name('profil.legalitas.tenaga-teknik.destroy');

    // Peralatan CRUD Routes
    Route::resource('profil/peralatan', PeralatanController::class)->names('profil.peralatan');

    // SOP CRUD Routes
    Route::resource('profil/sop', SopController::class)->names('profil.sop');
    Route::post('profil/sop/items', [SopController::class, 'storeItem'])->name('profil.sop.items.store');
    Route::put('profil/sop/items/{id}', [SopController::class, 'updateItem'])->name('profil.sop.items.update');
    Route::delete('profil/sop/items/{id}', [SopController::class, 'destroyItem'])->name('profil.sop.items.destroy');

    // SLO — Regulasi CRUD Routes
    Route::resource('slo/regulasi', AdminSloRegulasiController::class)->names('slo.regulasi');

    // SLO — Kategori Layanan CRUD Routes
    Route::resource('slo/kategori-layanan', KategoriLayananController::class)->names('slo.kategori-layanan');

    // Lowongan Kerja CRUD Routes
    Route::resource('lowongan-kerja', LowonganKerjaController::class)->names('lowongan-kerja');

    // Footer Links Admin CRUD Routes
    Route::resource('footer-links', FooterLinkController::class)->names('footer-links');

    // Footer Legal Admin Routes
    Route::get('footer-legal', [FooterLegalController::class, 'index'])->name('footer-legal.index');
    Route::post('footer-legal', [FooterLegalController::class, 'update'])->name('footer-legal.update');

    // Informasi Publik - Maklumat Layanan Routes
    Route::get('informasi-publik/maklumat-layanan', [MaklumatLayananController::class, 'index'])->name('informasi-publik.maklumat.index');
    Route::post('informasi-publik/maklumat-layanan', [MaklumatLayananController::class, 'update'])->name('informasi-publik.maklumat.update');

    // Informasi Publik - Uji Petik Routes
    Route::get('informasi-publik/uji-petik', [UjiPetikController::class, 'index'])->name('informasi-publik.uji-petik.index');
    Route::post('informasi-publik/uji-petik', [UjiPetikController::class, 'update'])->name('informasi-publik.uji-petik.update');

    // Informasi Publik - Keluhan & Banding Routes
    Route::get('informasi-publik/keluhan-banding', [KeluhanBandingController::class, 'index'])->name('informasi-publik.keluhan-banding.index');
    Route::post('informasi-publik/keluhan-banding/settings', [KeluhanBandingController::class, 'updateSettings'])->name('informasi-publik.keluhan-banding.settings.update');
    Route::post('informasi-publik/keluhan-banding/status/{id}', [KeluhanBandingController::class, 'updateStatus'])->name('informasi-publik.keluhan-banding.status.update');
    Route::delete('informasi-publik/keluhan-banding/{id}', [KeluhanBandingController::class, 'destroy'])->name('informasi-publik.keluhan-banding.destroy');

    // Informasi Publik - Persyaratan SLO Routes
    Route::get('informasi-publik/persyaratan-slo', [InformasiPublikController::class, 'persyaratanSlo'])->name('informasi-publik.persyaratan-slo.index');
    Route::post('informasi-publik/persyaratan-slo', [InformasiPublikController::class, 'updatePersyaratanSlo'])->name('informasi-publik.persyaratan-slo.update');

    // Informasi Publik - Daftar Harga SLO Routes
    Route::get('informasi-publik/daftar-harga-slo', [InformasiPublikController::class, 'daftarHargaSlo'])->name('informasi-publik.daftar-harga-slo.index');
    Route::post('informasi-publik/daftar-harga-slo', [InformasiPublikController::class, 'updateDaftarHargaSlo'])->name('informasi-publik.daftar-harga-slo.update');

    // Informasi Publik - Prosedur SLO Routes
    Route::get('informasi-publik/prosedur-slo', [InformasiPublikController::class, 'prosedurSlo'])->name('informasi-publik.prosedur-slo.index');
    Route::post('informasi-publik/prosedur-slo', [InformasiPublikController::class, 'updateProsedurSlo'])->name('informasi-publik.prosedur-slo.update');

    // Informasi Publik - Alur Sertifikasi Routes
    Route::get('informasi-publik/alur-sertifikasi', [InformasiPublikController::class, 'alurSertifikasi'])->name('informasi-publik.alur-sertifikasi.index');
    Route::post('informasi-publik/alur-sertifikasi', [InformasiPublikController::class, 'updateAlurSertifikasi'])->name('informasi-publik.alur-sertifikasi.update');
});

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
