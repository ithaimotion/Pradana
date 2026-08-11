<?php

namespace App\Http\Controllers;

use App\Models\KontenBeranda;
use App\Models\KontenHalaman;
use App\Models\LowonganKarir;
use App\Models\PesanMasuk;
use App\Models\Galeri;
use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Ambil satu item konten berdasarkan bagian dan kunci opsional.
     */
    private function getContentSection(string $bagian, ?string $kunci = null): ?KontenBeranda
    {
        $query = KontenBeranda::where('bagian', $bagian);

        if ($kunci) {
            $query->where('kunci', $kunci);
        }

        return $query->first();
    }

    /**
     * Ambil daftar item konten berdasarkan bagian.
     */
    private function getContentCollection(string $bagian, bool $onlyActive = false)
    {
        $query = KontenBeranda::where('bagian', $bagian);

        if ($onlyActive) {
            $query->where('status_aktif', true);
        }

        return $query->orderBy('urutan')->get();
    }

    /**
     * Simpan data section konten beserta upload gambar jika ada.
     */
    private function saveContentSection(string $bagian, string $kunci, array $data, ?string $imageField = null, string $uploadFolder = 'uploads'): KontenBeranda
    {
        $section = KontenBeranda::firstOrNew([
            'bagian' => $bagian,
            'kunci' => $kunci,
        ]);

        foreach ($data as $field => $value) {
            $section->{$field} = $value;
        }

        if ($imageField && request()->hasFile($imageField)) {
            if ($section->path_gambar && !str_starts_with($section->path_gambar, 'http')) {
                Storage::disk('public')->delete($section->path_gambar);
            }

            $section->path_gambar = request()->file($imageField)->store("{$uploadFolder}/{$bagian}", 'public');
        }

        $section->save();

        return $section;
    }

    /**
     * Validasi file gambar untuk form upload.
     */
    private function validateImageUploads(Request $request, array $fields): void
    {
        $rules = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:5120'];

        foreach ($fields as $field) {
            if ($request->hasFile($field)) {
                $request->validate([$field => $rules]);
            }
        }
    }

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
        $hero = $this->getContentSection('hero', 'hero_main');
        $statistik = $this->getContentCollection('statistik', true);
        $tentangPradana = $this->getContentSection('tentang_pradana', 'tentang_main');

        $teknologiHeader = $this->getContentSection('teknologi_header', 'header');
        $teknologiItems = $this->getContentCollection('teknologi_item');

        $keunggulanHeader = $this->getContentSection('keunggulan_header', 'header');
        $keunggulanItems = $this->getContentCollection('keunggulan_item');

        $akreditasiItems = $this->getContentCollection('akreditasi_item');
        $sertifikatKinerjaItems = $this->getContentCollection('sertifikat_item');

        $energiHeader = $this->getContentSection('energi_header', 'header');
        $energiItems = $this->getContentCollection('energi_item');

        $mengapaHeader = $this->getContentSection('mengapa_header', 'header');
        $mengapaItems = $this->getContentCollection('mengapa_item');

        $kontakKami = $this->getContentSection('kontak_kami', 'kontak_main');
        $hubungiKamiSettings = KontenBeranda::where('bagian', 'hubungi_kami')->get()->keyBy('kunci');

        $galeri = Galeri::where('kategori', '!=', 'client')->orderBy('urutan')->get();
        $clientPhotos = Galeri::where('kategori', 'client')->orderBy('urutan')->get();
        $logos = Logo::orderBy('urutan')->get();
        $kontenHalamans = KontenHalaman::all()->groupBy('halaman');
        $lowongans = LowonganKarir::orderBy('created_at', 'desc')->get();
        $pesanMasuks = PesanMasuk::orderBy('created_at', 'desc')->get();

        return view('admin.index', compact(
            'hero',
            'statistik',
            'tentangPradana',
            'teknologiHeader',
            'teknologiItems',
            'keunggulanHeader',
            'keunggulanItems',
            'akreditasiItems',
            'sertifikatKinerjaItems',
            'energiHeader',
            'energiItems',
            'mengapaHeader',
            'mengapaItems',
            'kontakKami',
            'hubungiKamiSettings',
            'galeri',
            'clientPhotos',
            'logos',
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
            'judul_energi' => 'nullable|string|max:255',
            'subjudul' => 'nullable|string',
            'konten' => 'nullable|string',
        ]);

        $this->validateImageUploads($request, ['gambar', 'gambar_2', 'gambar_3']);

        $hero = KontenBeranda::firstOrNew(['bagian' => 'hero', 'kunci' => 'hero_main']);
        $hero->judul = $request->judul;
        $hero->judul_energi = $request->judul_energi;
        $hero->subjudul = $request->subjudul;
        $hero->konten = $request->konten;

        $slideImages = [];

        if ($request->hasFile('gambar')) {
            if ($hero->path_gambar && !str_starts_with($hero->path_gambar, 'http')) {
                Storage::disk('public')->delete($hero->path_gambar);
            }
            $slideImages[] = $request->file('gambar')->store('uploads/hero', 'public');
        } elseif ($hero->path_gambar) {
            $slideImages[] = $hero->path_gambar;
        }

        foreach (['gambar_2' => 'path_gambar_2', 'gambar_3' => 'path_gambar_3'] as $inputName => $attribute) {
            if ($request->hasFile($inputName)) {
                $path = $request->file($inputName)->store('uploads/hero', 'public');
                $slideImages[] = $path;
            } elseif ($hero->{$attribute}) {
                $slideImages[] = $hero->{$attribute};
            }
        }

        if (!empty($slideImages)) {
            $hero->path_gambar = $slideImages[0] ?? null;
            $hero->path_gambar_2 = $slideImages[1] ?? null;
            $hero->path_gambar_3 = $slideImages[2] ?? null;
        }

        $hero->save();

        return back()->with('success', 'Hero Banner berhasil diperbarui!');
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

        $this->saveContentSection(
            'kontak_kami',
            'kontak_main',
            [
                'judul' => $request->judul,
                'subjudul' => $request->subjudul,
                'konten' => $request->konten,
            ],
            'gambar',
            'uploads/kontak'
        );

        return back()->with('success', 'Banner Kontak & CTA berhasil diperbarui!');
    }

    /**
     * Simpan pengaturan detail Hubungi Kami untuk halaman publik.
     */
    public function updateHubungiKamiSettings(Request $request)
    {
        $request->validate([
            'alamat_kantor' => 'nullable|string',
            'telepon_whatsapp' => 'nullable|string',
            'email_resmi' => 'nullable|email',
            'jam_operasional' => 'nullable|string',
            'maps_embed' => 'nullable|string',
        ]);

        $sections = [
            ['bagian' => 'hubungi_kami', 'kunci' => 'alamat_kantor', 'konten' => $request->alamat_kantor],
            ['bagian' => 'hubungi_kami', 'kunci' => 'telepon_whatsapp', 'konten' => $request->telepon_whatsapp],
            ['bagian' => 'hubungi_kami', 'kunci' => 'email_resmi', 'konten' => $request->email_resmi],
            ['bagian' => 'hubungi_kami', 'kunci' => 'jam_operasional', 'konten' => $request->jam_operasional],
            ['bagian' => 'hubungi_kami', 'kunci' => 'maps_embed', 'konten' => $request->maps_embed],
        ];

        foreach ($sections as $section) {
            KontenBeranda::updateOrCreate(
                ['bagian' => $section['bagian'], 'kunci' => $section['kunci']],
                ['konten' => $section['konten'], 'judul' => $section['kunci']]
            );
        }

        return back()->with('success', 'Pengaturan Hubungi Kami berhasil diperbarui!');
    }

    /**
     * Generic Store method for cards / items list.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bagian' => 'required|string|in:statistik,teknologi_item,keunggulan_item,energi_item,mengapa_item,galeri,akreditasi_item,sertifikat_item',
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
