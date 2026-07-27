<?php

namespace App\Http\Controllers;

use App\Models\KontenBeranda;
use App\Models\KontenHalaman;
use App\Models\LowonganKarir;
use App\Models\PesanMasuk;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Tampilkan Form Login Admin.
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    /**
     * Proses Autentikasi Login Admin.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'))->with('success', 'Selamat datang kembali di Admin Console!');
        }

        return back()->withErrors([
            'email' => 'Kredensial email atau password yang dimasukkan salah.',
        ])->onlyInput('email');
    }

    /**
     * Logout Admin.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah berhasil logout dari Admin Console.');
    }

    /**
     * Display the Admin Panel Dashboard with all sections & sub-menus.
     */
    public function index()
    {
        // 1. Hero
        $hero = KontenBeranda::where('bagian', 'hero')->first();

        // 2. Profil Pradana
        $profilPradana = KontenBeranda::where('bagian', 'profil_pradana')->first();

        // 3. Statistik
        $statistik = KontenBeranda::where('bagian', 'statistik')->orderBy('urutan')->get();

        // 4. Tentang Pradana
        $tentangPradana = KontenBeranda::where('bagian', 'tentang_pradana')->first();

        // 5. Teknologi Terintegrasi
        $teknologiHeader = KontenBeranda::where('bagian', 'teknologi_header')->first();
        $teknologiItems = KontenBeranda::where('bagian', 'teknologi_item')->orderBy('urutan')->get();

        // 6. Keunggulan APC+
        $keunggulanHeader = KontenBeranda::where('bagian', 'keunggulan_header')->first();
        $keunggulanItems = KontenBeranda::where('bagian', 'keunggulan_item')->orderBy('urutan')->get();

        // 7. Energi Berkelanjutan
        $energiHeader = KontenBeranda::where('bagian', 'energi_header')->first();
        $energiItems = KontenBeranda::where('bagian', 'energi_item')->orderBy('urutan')->get();

        // 8. Mengapa Pilih Pradana
        $mengapaHeader = KontenBeranda::where('bagian', 'mengapa_header')->first();
        $mengapaItems = KontenBeranda::where('bagian', 'mengapa_item')->orderBy('urutan')->get();

        // 9. Kontak & Banner CTA
        $kontakKami = KontenBeranda::where('bagian', 'kontak_kami')->first();

        // 10. Galeri Media
        $galeri = Galeri::orderBy('urutan')->get();

        // 11. Halaman Sub-Menu (Profil, SLO, Informasi Publik)
        $kontenHalamans = KontenHalaman::all()->groupBy('halaman');

        // 12. Lowongan Karir
        $lowongans = LowonganKarir::orderBy('created_at', 'desc')->get();

        // 13. Pesan Masuk
        $pesanMasuks = PesanMasuk::orderBy('created_at', 'desc')->get();

        return view('admin.index', compact(
            'hero',
            'profilPradana',
            'statistik',
            'tentangPradana',
            'teknologiHeader',
            'teknologiItems',
            'keunggulanHeader',
            'keunggulanItems',
            'energiHeader',
            'energiItems',
            'mengapaHeader',
            'mengapaItems',
            'kontakKami',
            'galeri',
            'kontenHalamans',
            'lowongans',
            'pesanMasuks'
        ));
    }

    /**
     * 1. Update Hero Banner.
     */
    public function updateHero(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'subjudul' => 'nullable|string',
            'konten' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        $hero = KontenBeranda::firstOrNew(['bagian' => 'hero', 'kunci' => 'hero_main']);
        $hero->judul = $request->judul;
        $hero->subjudul = $request->subjudul;
        $hero->konten = $request->konten;

        if ($request->hasFile('gambar')) {
            if ($hero->path_gambar && !str_starts_with($hero->path_gambar, 'http')) {
                Storage::disk('public')->delete($hero->path_gambar);
            }
            $path = $request->file('gambar')->store('uploads/hero', 'public');
            $hero->path_gambar = $path;
        }

        $hero->save();

        return back()->with('success', 'Hero Banner berhasil diperbarui!');
    }

    /**
     * 2. Update Profil Pradana Section.
     */
    public function updateProfilPradana(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'subjudul' => 'nullable|string',
            'konten' => 'nullable|string',
            'gambar1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'gambar2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        $profil = KontenBeranda::firstOrNew(['bagian' => 'profil_pradana', 'kunci' => 'profil_main']);
        $profil->judul = $request->judul;
        $profil->subjudul = $request->subjudul;
        $profil->konten = $request->konten;

        if ($request->hasFile('gambar1')) {
            if ($profil->path_gambar && !str_starts_with($profil->path_gambar, 'http')) {
                Storage::disk('public')->delete($profil->path_gambar);
            }
            $profil->path_gambar = $request->file('gambar1')->store('uploads/profil', 'public');
        }

        if ($request->hasFile('gambar2')) {
            if ($profil->nilai && !str_starts_with($profil->nilai, 'http')) {
                Storage::disk('public')->delete($profil->nilai);
            }
            $profil->nilai = $request->file('gambar2')->store('uploads/profil', 'public');
        }

        $profil->save();

        return back()->with('success', 'Profil Pradana Nusa Energi berhasil diperbarui!');
    }

    /**
     * 4. Update Tentang Pradana Section.
     */
    public function updateTentangPradana(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'subjudul' => 'nullable|string',
            'konten' => 'nullable|string',
            'nilai' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        $tentang = KontenBeranda::firstOrNew(['bagian' => 'tentang_pradana', 'kunci' => 'tentang_main']);
        $tentang->judul = $request->judul;
        $tentang->subjudul = $request->subjudul;
        $tentang->konten = $request->konten;
        $tentang->nilai = $request->nilai;

        if ($request->hasFile('gambar')) {
            if ($tentang->path_gambar && !str_starts_with($tentang->path_gambar, 'http')) {
                Storage::disk('public')->delete($tentang->path_gambar);
            }
            $tentang->path_gambar = $request->file('gambar')->store('uploads/tentang', 'public');
        }

        $tentang->save();

        return back()->with('success', 'Section Tentang Pradana berhasil diperbarui!');
    }

    /**
     * 5. Update Teknologi Header Section.
     */
    public function updateTeknologiHeader(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'nullable|string',
        ]);

        $header = KontenBeranda::firstOrNew(['bagian' => 'teknologi_header', 'kunci' => 'header']);
        $header->judul = $request->judul;
        $header->konten = $request->konten;
        $header->save();

        return back()->with('success', 'Header Teknologi Terintegrasi berhasil diperbarui!');
    }

    /**
     * 6. Update Keunggulan Header Section.
     */
    public function updateKeunggulanHeader(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        $header = KontenBeranda::firstOrNew(['bagian' => 'keunggulan_header', 'kunci' => 'header']);
        $header->judul = $request->judul;
        $header->konten = $request->konten;

        if ($request->hasFile('gambar')) {
            if ($header->path_gambar && !str_starts_with($header->path_gambar, 'http')) {
                Storage::disk('public')->delete($header->path_gambar);
            }
            $header->path_gambar = $request->file('gambar')->store('uploads/keunggulan', 'public');
        }

        $header->save();

        return back()->with('success', 'Header Keunggulan APC+ berhasil diperbarui!');
    }

    /**
     * 7. Update Energi Berkelanjutan Header Section.
     */
    public function updateEnergiHeader(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'nullable|string',
        ]);

        $header = KontenBeranda::firstOrNew(['bagian' => 'energi_header', 'kunci' => 'header']);
        $header->judul = $request->judul;
        $header->konten = $request->konten;
        $header->save();

        return back()->with('success', 'Header Energi Berkelanjutan berhasil diperbarui!');
    }

    /**
     * 8. Update Mengapa Pilih Pradana Header Section.
     */
    public function updateMengapaHeader(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'gambar2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        $header = KontenBeranda::firstOrNew(['bagian' => 'mengapa_header', 'kunci' => 'header']);
        $header->judul = $request->judul;

        if ($request->hasFile('gambar1')) {
            if ($header->path_gambar && !str_starts_with($header->path_gambar, 'http')) {
                Storage::disk('public')->delete($header->path_gambar);
            }
            $header->path_gambar = $request->file('gambar1')->store('uploads/mengapa', 'public');
        }

        if ($request->hasFile('gambar2')) {
            if ($header->nilai && !str_starts_with($header->nilai, 'http')) {
                Storage::disk('public')->delete($header->nilai);
            }
            $header->nilai = $request->file('gambar2')->store('uploads/mengapa', 'public');
        }

        $header->save();

        return back()->with('success', 'Section Mengapa Pilih Pradana berhasil diperbarui!');
    }

    /**
     * 9. Update Kontak & Banner CTA Section.
     */
    public function updateKontakHeader(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'subjudul' => 'nullable|string',
            'konten' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        $kontak = KontenBeranda::firstOrNew(['bagian' => 'kontak_kami', 'kunci' => 'kontak_main']);
        $kontak->judul = $request->judul;
        $kontak->subjudul = $request->subjudul;
        $kontak->konten = $request->konten;

        if ($request->hasFile('gambar')) {
            if ($kontak->path_gambar && !str_starts_with($kontak->path_gambar, 'http')) {
                Storage::disk('public')->delete($kontak->path_gambar);
            }
            $kontak->path_gambar = $request->file('gambar')->store('uploads/kontak', 'public');
        }

        $kontak->save();

        return back()->with('success', 'Banner Kontak & CTA berhasil diperbarui!');
    }

    /**
     * Generic Store method for cards / items list.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bagian' => 'required|string|in:statistik,teknologi_item,keunggulan_item,energi_item,mengapa_item,galeri',
            'judul' => 'nullable|string|max:255',
            'nilai' => 'nullable|string|max:100',
            'konten' => 'nullable|string',
            'ikon' => 'nullable|string',
            'urutan' => 'nullable|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        $item = new KontenBeranda();
        $item->bagian = $request->bagian;
        $item->judul = $request->judul;
        $item->nilai = $request->nilai;
        $item->konten = $request->konten;
        $item->ikon = $request->ikon;
        $item->urutan = $request->urutan ?? (KontenBeranda::where('bagian', $request->bagian)->max('urutan') + 1);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('uploads/' . $request->bagian, 'public');
            $item->path_gambar = $path;
        }

        $item->save();

        return back()->with('success', 'Item baru berhasil ditambahkan!');
    }

    /**
     * Generic Update method for items.
     */
    public function update(Request $request, $id)
    {
        $item = KontenBeranda::findOrFail($id);

        $request->validate([
            'judul' => 'nullable|string|max:255',
            'nilai' => 'nullable|string|max:100',
            'konten' => 'nullable|string',
            'ikon' => 'nullable|string',
            'urutan' => 'nullable|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        $item->judul = $request->judul;
        $item->nilai = $request->nilai;
        $item->konten = $request->konten;
        $item->ikon = $request->ikon;
        if ($request->has('urutan')) {
            $item->urutan = $request->urutan;
        }

        if ($request->hasFile('gambar')) {
            if ($item->path_gambar && !str_starts_with($item->path_gambar, 'http')) {
                Storage::disk('public')->delete($item->path_gambar);
            }
            $path = $request->file('gambar')->store('uploads/' . $item->bagian, 'public');
            $item->path_gambar = $path;
        }

        $item->save();

        return back()->with('success', 'Item berhasil diperbarui!');
    }

    /**
     * Generic Delete method.
     */
    public function destroy($id)
    {
        $item = KontenBeranda::findOrFail($id);

        if ($item->path_gambar && !str_starts_with($item->path_gambar, 'http')) {
            Storage::disk('public')->delete($item->path_gambar);
        }

        $item->delete();

        return back()->with('success', 'Item berhasil dihapus!');
    }
}
