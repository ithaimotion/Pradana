<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use App\Models\KontenBeranda;

class BerandaPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationLabel = 'Beranda Utama';
    protected static ?string $title = 'Pengaturan Beranda';
    protected static ?string $slug = 'beranda';
    protected static ?int $navigationSort = 1;
    
    protected static string $view = 'filament.pages.beranda-page';

    public ?array $heroData = [];
    public ?array $statistikData = [];
    public ?array $tentangData = [];
    public ?array $teknologiData = [];
    public ?array $keunggulanData = [];
    public ?array $energiData = [];
    public ?array $mengapaData = [];
    public ?array $akreditasiData = [];
    public ?array $sertifikatData = [];
    public ?array $data = [];

    public function mount(): void
    {
        // Load Hero
        $hero = KontenBeranda::where('bagian', 'hero')->where('kunci', 'hero_main')->first();
        $this->heroForm->fill([
            'hero_judul' => $hero?->judul,
            'hero_judul_energi' => $hero?->judul_energi,
            'hero_subjudul' => $hero?->subjudul,
            'hero_konten' => $hero?->konten,
            'hero_gambar' => $hero?->path_gambar,
            'hero_gambar_2' => $hero?->path_gambar_2,
            'hero_gambar_3' => $hero?->path_gambar_3,
        ]);

        // Load Statistik
        $statistikItems = KontenBeranda::where('bagian', 'statistik')->orderBy('urutan')->get()->toArray();
        $this->statistikForm->fill([
            'statistik_items' => $statistikItems
        ]);

        // Load Tentang
        $tentang = KontenBeranda::where('bagian', 'tentang_pradana')->where('kunci', 'tentang_main')->first();
        $this->tentangForm->fill([
            'tentang_judul' => $tentang?->judul,
            'tentang_nilai' => $tentang?->nilai,
            'tentang_subjudul' => $tentang?->subjudul,
            'tentang_konten' => $tentang?->konten,
            'tentang_gambar' => $tentang?->path_gambar,
        ]);

        // Load Teknologi
        $tekHeader = KontenBeranda::where('bagian', 'teknologi_header')->where('kunci', 'header')->first();
        $tekItems = KontenBeranda::where('bagian', 'teknologi_item')->orderBy('urutan')->get()->toArray();
        $this->teknologiForm->fill([
            'teknologi_judul' => $tekHeader?->judul,
            'teknologi_items' => $tekItems,
        ]);

        // Load Keunggulan
        $keungHeader = KontenBeranda::where('bagian', 'keunggulan_header')->where('kunci', 'header')->first();
        $keungItems = KontenBeranda::where('bagian', 'keunggulan_item')->orderBy('urutan')->get()->toArray();
        $this->keunggulanForm->fill([
            'keunggulan_judul' => $keungHeader?->judul,
            'keunggulan_konten' => $keungHeader?->konten,
            'keunggulan_gambar' => $keungHeader?->path_gambar,
            'keunggulan_items' => $keungItems,
        ]);

        // Load Energi
        $energiHeader = KontenBeranda::where('bagian', 'energi_header')->where('kunci', 'header')->first();
        $energiItems = KontenBeranda::where('bagian', 'energi_item')->orderBy('urutan')->get()->toArray();
        $this->energiForm->fill([
            'energi_judul' => $energiHeader?->judul,
            'energi_konten' => $energiHeader?->konten,
            'energi_items' => $energiItems,
        ]);

        // Load Mengapa Pilih Pradana
        $mengapaHeader = KontenBeranda::where('bagian', 'mengapa_header')->where('kunci', 'header')->first();
        $mengapaItems = KontenBeranda::where('bagian', 'mengapa_item')->orderBy('urutan')->get()->toArray();
        $this->mengapaForm->fill([
            'mengapa_judul' => $mengapaHeader?->judul,
            'mengapa_gambar1' => $mengapaHeader?->path_gambar,
            'mengapa_gambar2' => $mengapaHeader?->nilai, // AdminController nyimpen gambar2 di field 'nilai'
            'mengapa_items' => $mengapaItems,
        ]);

        // Load Akreditasi
        $akreditasiItems = KontenBeranda::where('bagian', 'akreditasi_item')->orderBy('urutan')->get()->toArray();
        $this->akreditasiForm->fill([
            'akreditasi_items' => $akreditasiItems
        ]);

        // Load Sertifikat Kinerja
        $sertifikatItems = KontenBeranda::where('bagian', 'sertifikat_item')->orderBy('urutan')->get()->toArray();
        $this->sertifikatForm->fill([
            'sertifikat_items' => $sertifikatItems
        ]);

        // Load Kontak removed
    }

    protected function getForms(): array
    {
        return [
            'heroForm',
            'statistikForm',
            'tentangForm',
            'teknologiForm',
            'keunggulanForm',
            'energiForm',
            'mengapaForm',
            'akreditasiForm',
            'sertifikatForm',
        ];
    }

    protected function getFormActions(): array
    {
        return [];
    }

    public function save(): void
    {
        // Dummy method untuk mencegah error fallback default submit
    }

    public function heroForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Hero Banner')
                    ->description('Sesuaikan teks utama, subjudul, dan gambar latar belakang yang muncul di bagian paling atas halaman Beranda.')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('hero_judul')
                                ->label('Judul Utama (Title)')
                                ->placeholder('Contoh: Energi Baru Terbarukan')
                                ->required(),
                            TextInput::make('hero_judul_energi')
                                ->label('Judul Sorotan (Warna Spesial)')
                                ->placeholder('Contoh: Masa Depan'),
                            TextInput::make('hero_konten')
                                ->label('Teks Tombol CTA')
                                ->placeholder('Contoh: Mulai Sekarang')
                                ->columnSpanFull(),
                            RichEditor::make('hero_subjudul')
                                ->label('Sub-Judul (Subtitle)')
                                ->placeholder('Masukkan paragraf singkat untuk melengkapi judul utama...')
                                ->columnSpanFull(),
                        ]),
                        Placeholder::make('info_gambar')
                            ->label('Panduan Gambar')
                            ->content('Unggah gambar dengan format JPG, PNG, atau WEBP. Ukuran maksimal 5MB. Rasio terbaik adalah 16:9 (Landscape).')
                            ->columnSpanFull(),
                        Grid::make(3)->schema([
                            FileUpload::make('hero_gambar')->label('Slide Gambar 1')->image()->directory('uploads/hero'),
                            FileUpload::make('hero_gambar_2')->label('Slide Gambar 2')->image()->directory('uploads/hero'),
                            FileUpload::make('hero_gambar_3')->label('Slide Gambar 3')->image()->directory('uploads/hero'),
                        ]),
                    ])
            ])
            ->statePath('heroData');
    }

    public function statistikForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Statistik Performa')
                    ->description('Kelola angka-angka statistik yang menunjukkan pencapaian atau performa perusahaan.')
                    ->schema([
                        Repeater::make('statistik_items')
                            ->label('Daftar Statistik')
                            ->addActionLabel('Tambah Data Statistik')
                            ->schema([
                                Hidden::make('id'),
                                Grid::make(2)->schema([
                                    TextInput::make('urutan')->label('Urutan Tampil')->numeric()->default(1),
                                    TextInput::make('judul')->label('Angka / Nilai')->placeholder('Contoh: 100+')->required(),
                                ]),
                                FileUpload::make('path_gambar')->label('Ikon / Gambar Pendukung')->image()->directory('uploads/statistik')->columnSpanFull(),
                                RichEditor::make('konten')->label('Label/Deskripsi')->placeholder('Contoh: Proyek Selesai')->columnSpanFull(),
                            ])
                            ->columns(1)
                            ->itemLabel(fn (array $state): ?string => $state['judul'] ?? 'Statistik Baru')
                    ])
            ])
            ->statePath('statistikData');
    }

    public function tentangForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Tentang Pradana')
                    ->description('Kelola bagian narasi singkat tentang perusahaan di beranda.')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('tentang_judul')
                                ->label('Judul Bagian')
                                ->placeholder('Contoh: Mengenal p\'Nusa Energi')
                                ->required(),
                            TextInput::make('tentang_nilai')
                                ->label('Teks Tombol CTA')
                                ->placeholder('Contoh: Pelajari Lebih Lanjut'),
                        ]),
                        RichEditor::make('tentang_subjudul')
                            ->label('Paragraf Utama')
                            ->placeholder('Paragraf pertama yang menceritakan fokus perusahaan...')
                            ->columnSpanFull(),
                        RichEditor::make('tentang_konten')
                            ->label('Paragraf Tambahan')
                            ->placeholder('Penjelasan lebih lanjut mengenai visi atau sejarah singkat...')
                            ->columnSpanFull(),
                        FileUpload::make('tentang_gambar')
                            ->label('Gambar Pendukung (Tentang Kami)')
                            ->image()
                            ->directory('uploads/tentang')
                            ->columnSpanFull(),
                    ])
            ])
            ->statePath('tentangData');
    }

    public function teknologiForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Teknologi Terintegrasi')
                    ->description('Kelola daftar teknologi atau fitur utama yang ditawarkan.')
                    ->schema([
                        TextInput::make('teknologi_judul')
                            ->label('Judul Utama Teknologi')
                            ->placeholder('Contoh: Teknologi Terintegrasi Kami')
                            ->required()
                            ->columnSpanFull(),
                        Repeater::make('teknologi_items')
                            ->label('Daftar Fitur Teknologi')
                            ->addActionLabel('Tambah Fitur Teknologi')
                            ->schema([
                                Hidden::make('id'),
                                Grid::make(2)->schema([
                                    TextInput::make('urutan')->numeric()->default(1),
                                    TextInput::make('judul')->label('Nama Fitur')->placeholder('Contoh: Sistem Cerdas')->required(),
                                ]),
                                RichEditor::make('konten')->label('Deskripsi Singkat')->placeholder('Jelaskan keunggulan fitur ini...')->columnSpanFull(),
                            ])
                            ->columns(1)
                            ->itemLabel(fn (array $state): ?string => $state['judul'] ?? 'Fitur Baru')
                    ])
            ])
            ->statePath('teknologiData');
    }

    public function keunggulanForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Keunggulan APC+')
                    ->description('Tonjolkan nilai jual unik atau keunggulan komparatif dari layanan perusahaan.')
                    ->schema([
                        TextInput::make('keunggulan_judul')
                            ->label('Judul Section')
                            ->placeholder('Contoh: Mengapa Memilih Kami?')
                            ->required()
                            ->columnSpanFull(),
                        RichEditor::make('keunggulan_konten')
                            ->label('Deskripsi Ringkas')
                            ->placeholder('Beri pengantar mengapa layanan ini unggul...')
                            ->columnSpanFull(),
                        FileUpload::make('keunggulan_gambar')
                            ->label('Foto Samping')
                            ->image()
                            ->directory('uploads/keunggulan')
                            ->columnSpanFull(),
                        Repeater::make('keunggulan_items')
                            ->label('Poin Checklist Keunggulan')
                            ->addActionLabel('Tambah Poin')
                            ->schema([
                                Hidden::make('id'),
                                Grid::make(2)->schema([
                                    TextInput::make('urutan')->numeric()->default(1),
                                    TextInput::make('judul')->label('Poin Keunggulan')->placeholder('Contoh: Layanan 24/7')->required(),
                                ]),
                                RichEditor::make('konten')->label('Keterangan Tambahan')->columnSpanFull(),
                            ])
                            ->columns(1)
                            ->itemLabel(fn (array $state): ?string => $state['judul'] ?? 'Poin Baru')
                    ])
            ])
            ->statePath('keunggulanData');
    }

    public function energiForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Energi Berkelanjutan')
                    ->description('Kelola section Energi Berkelanjutan beserta detail itemnya.')
                    ->schema([
                        TextInput::make('energi_judul')->label('Judul Header')->required()->columnSpanFull(),
                        RichEditor::make('energi_konten')->label('Deskripsi Header')->columnSpanFull(),
                        Repeater::make('energi_items')
                            ->label('Item Energi')
                            ->addActionLabel('Tambah Item')
                            ->schema([
                                Hidden::make('id'),
                                Grid::make(2)->schema([
                                    TextInput::make('urutan')->numeric()->default(1),
                                    TextInput::make('judul')->required(),
                                ]),
                                FileUpload::make('path_gambar')->label('Gambar/Ikon')->image()->directory('uploads/energi_item')->columnSpanFull(),
                                RichEditor::make('konten')->label('Deskripsi')->columnSpanFull(),
                            ])
                            ->columns(1)
                            ->itemLabel(fn (array $state): ?string => $state['judul'] ?? 'Item Baru')
                    ])
            ])
            ->statePath('energiData');
    }

    public function mengapaForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Mengapa Pilih Pradana')
                    ->description('Kelola alasan mengapa klien harus memilih Pradana.')
                    ->schema([
                        TextInput::make('mengapa_judul')->label('Judul Section')->required()->columnSpanFull(),
                        Grid::make(2)->schema([
                            FileUpload::make('mengapa_gambar1')->label('Gambar Utama')->image()->directory('uploads/mengapa'),
                            FileUpload::make('mengapa_gambar2')->label('Gambar Dekorasi')->image()->directory('uploads/mengapa'),
                        ]),
                        Repeater::make('mengapa_items')
                            ->label('Poin Alasan')
                            ->addActionLabel('Tambah Alasan')
                            ->schema([
                                Hidden::make('id'),
                                Grid::make(2)->schema([
                                    TextInput::make('urutan')->numeric()->default(1),
                                    TextInput::make('judul')->required(),
                                ]),
                                FileUpload::make('path_gambar')->label('Ikon Pendukung')->image()->directory('uploads/mengapa_item')->columnSpanFull(),
                                RichEditor::make('konten')->label('Penjelasan')->columnSpanFull(),
                            ])
                            ->columns(1)
                            ->itemLabel(fn (array $state): ?string => $state['judul'] ?? 'Poin Baru')
                    ])
            ])
            ->statePath('mengapaData');
    }

    public function akreditasiForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Akreditasi Resmi')
                    ->description('Kelola daftar logo atau dokumen akreditasi resmi.')
                    ->schema([
                        Repeater::make('akreditasi_items')
                            ->label('Daftar Akreditasi')
                            ->addActionLabel('Tambah Akreditasi')
                            ->schema([
                                Hidden::make('id'),
                                Grid::make(2)->schema([
                                    TextInput::make('urutan')->numeric()->default(1),
                                    TextInput::make('judul')->label('Nama Akreditasi')->required(),
                                ]),
                                FileUpload::make('path_gambar')->label('Logo Akreditasi')->image()->directory('uploads/akreditasi_item')->columnSpanFull(),
                            ])
                            ->columns(1)
                            ->itemLabel(fn (array $state): ?string => $state['judul'] ?? 'Akreditasi Baru')
                    ])
            ])
            ->statePath('akreditasiData');
    }

    public function sertifikatForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Sertifikat Kinerja')
                    ->description('Kelola sertifikat kinerja atau penghargaan yang diraih.')
                    ->schema([
                        Repeater::make('sertifikat_items')
                            ->label('Daftar Sertifikat')
                            ->addActionLabel('Tambah Sertifikat')
                            ->schema([
                                Hidden::make('id'),
                                Grid::make(2)->schema([
                                    TextInput::make('urutan')->numeric()->default(1),
                                    TextInput::make('judul')->label('Nama Sertifikat')->required(),
                                ]),
                                FileUpload::make('path_gambar')->label('Gambar Sertifikat')->image()->directory('uploads/sertifikat_item')->columnSpanFull(),
                            ])
                            ->columns(1)
                            ->itemLabel(fn (array $state): ?string => $state['judul'] ?? 'Sertifikat Baru')
                    ])
            ])
            ->statePath('sertifikatData');
    }

    // kontakForm removed

    public function saveHero(): void
    {
        $data = $this->heroForm->getState();
        $hero = KontenBeranda::firstOrNew(['bagian' => 'hero', 'kunci' => 'hero_main']);
        $hero->judul = $data['hero_judul'] ?? null;
        $hero->judul_energi = $data['hero_judul_energi'] ?? null;
        $hero->subjudul = $data['hero_subjudul'] ?? null;
        $hero->konten = $data['hero_konten'] ?? null;
        if(isset($data['hero_gambar'])) $hero->path_gambar = is_array($data['hero_gambar']) ? array_values($data['hero_gambar'])[0] : $data['hero_gambar'];
        if(isset($data['hero_gambar_2'])) $hero->path_gambar_2 = is_array($data['hero_gambar_2']) ? array_values($data['hero_gambar_2'])[0] : $data['hero_gambar_2'];
        if(isset($data['hero_gambar_3'])) $hero->path_gambar_3 = is_array($data['hero_gambar_3']) ? array_values($data['hero_gambar_3'])[0] : $data['hero_gambar_3'];
        $hero->save();
        Notification::make()->success()->title('Hero Banner Disimpan!')->send();
    }

    public function saveStatistik(): void
    {
        $data = $this->statistikForm->getState();
        $existingIds = [];
        foreach ($data['statistik_items'] ?? [] as $itemData) {
            $item = KontenBeranda::firstOrNew(['id' => $itemData['id'] ?? null]);
            $item->bagian = 'statistik';
            $item->judul = $itemData['judul'] ?? null;
            $item->konten = $itemData['konten'] ?? null;
            $item->urutan = $itemData['urutan'] ?? 1;
            if(isset($itemData['path_gambar'])) $item->path_gambar = is_array($itemData['path_gambar']) ? array_values($itemData['path_gambar'])[0] : $itemData['path_gambar'];
            $item->save();
            $existingIds[] = $item->id;
        }
        KontenBeranda::where('bagian', 'statistik')->whereNotIn('id', $existingIds)->delete();
        Notification::make()->success()->title('Statistik Disimpan!')->send();
    }

    public function saveTentang(): void
    {
        $data = $this->tentangForm->getState();
        $tentang = KontenBeranda::firstOrNew(['bagian' => 'tentang_pradana', 'kunci' => 'tentang_main']);
        $tentang->judul = $data['tentang_judul'] ?? null;
        $tentang->subjudul = $data['tentang_subjudul'] ?? null;
        $tentang->konten = $data['tentang_konten'] ?? null;
        $tentang->nilai = $data['tentang_nilai'] ?? null;
        if(isset($data['tentang_gambar'])) $tentang->path_gambar = is_array($data['tentang_gambar']) ? array_values($data['tentang_gambar'])[0] : $data['tentang_gambar'];
        $tentang->save();
        Notification::make()->success()->title('Tentang Pradana Disimpan!')->send();
    }

    public function saveTeknologi(): void
    {
        $data = $this->teknologiForm->getState();
        $header = KontenBeranda::firstOrNew(['bagian' => 'teknologi_header', 'kunci' => 'header']);
        $header->judul = $data['teknologi_judul'] ?? null;
        $header->save();

        $existingIds = [];
        foreach ($data['teknologi_items'] ?? [] as $itemData) {
            $item = KontenBeranda::firstOrNew(['id' => $itemData['id'] ?? null]);
            $item->bagian = 'teknologi_item';
            $item->judul = $itemData['judul'] ?? null;
            $item->konten = $itemData['konten'] ?? null;
            $item->urutan = $itemData['urutan'] ?? 1;
            $item->save();
            $existingIds[] = $item->id;
        }
        KontenBeranda::where('bagian', 'teknologi_item')->whereNotIn('id', $existingIds)->delete();
        Notification::make()->success()->title('Teknologi Disimpan!')->send();
    }

    public function saveKeunggulan(): void
    {
        $data = $this->keunggulanForm->getState();
        $header = KontenBeranda::firstOrNew(['bagian' => 'keunggulan_header', 'kunci' => 'header']);
        $header->judul = $data['keunggulan_judul'] ?? null;
        $header->konten = $data['keunggulan_konten'] ?? null;
        if(isset($data['keunggulan_gambar'])) $header->path_gambar = is_array($data['keunggulan_gambar']) ? array_values($data['keunggulan_gambar'])[0] : $data['keunggulan_gambar'];
        $header->save();

        $existingIds = [];
        foreach ($data['keunggulan_items'] ?? [] as $itemData) {
            $item = KontenBeranda::firstOrNew(['id' => $itemData['id'] ?? null]);
            $item->bagian = 'keunggulan_item';
            $item->judul = $itemData['judul'] ?? null;
            $item->konten = $itemData['konten'] ?? null;
            $item->urutan = $itemData['urutan'] ?? 1;
            $item->save();
            $existingIds[] = $item->id;
        }
        KontenBeranda::where('bagian', 'keunggulan_item')->whereNotIn('id', $existingIds)->delete();
        Notification::make()->success()->title('Keunggulan Disimpan!')->send();
    }

    public function saveEnergi(): void
    {
        $data = $this->energiForm->getState();
        $header = KontenBeranda::firstOrNew(['bagian' => 'energi_header', 'kunci' => 'header']);
        $header->judul = $data['energi_judul'] ?? null;
        $header->konten = $data['energi_konten'] ?? null;
        $header->save();

        $existingIds = [];
        foreach ($data['energi_items'] ?? [] as $itemData) {
            $item = KontenBeranda::firstOrNew(['id' => $itemData['id'] ?? null]);
            $item->bagian = 'energi_item';
            $item->judul = $itemData['judul'] ?? null;
            $item->konten = $itemData['konten'] ?? null;
            $item->urutan = $itemData['urutan'] ?? 1;
            if(isset($itemData['path_gambar'])) $item->path_gambar = is_array($itemData['path_gambar']) ? array_values($itemData['path_gambar'])[0] : $itemData['path_gambar'];
            $item->save();
            $existingIds[] = $item->id;
        }
        KontenBeranda::where('bagian', 'energi_item')->whereNotIn('id', $existingIds)->delete();
        Notification::make()->success()->title('Energi Berkelanjutan Disimpan!')->send();
    }

    public function saveMengapa(): void
    {
        $data = $this->mengapaForm->getState();
        $header = KontenBeranda::firstOrNew(['bagian' => 'mengapa_header', 'kunci' => 'header']);
        $header->judul = $data['mengapa_judul'] ?? null;
        if(isset($data['mengapa_gambar1'])) $header->path_gambar = is_array($data['mengapa_gambar1']) ? array_values($data['mengapa_gambar1'])[0] : $data['mengapa_gambar1'];
        if(isset($data['mengapa_gambar2'])) $header->nilai = is_array($data['mengapa_gambar2']) ? array_values($data['mengapa_gambar2'])[0] : $data['mengapa_gambar2'];
        $header->save();

        $existingIds = [];
        foreach ($data['mengapa_items'] ?? [] as $itemData) {
            $item = KontenBeranda::firstOrNew(['id' => $itemData['id'] ?? null]);
            $item->bagian = 'mengapa_item';
            $item->judul = $itemData['judul'] ?? null;
            $item->konten = $itemData['konten'] ?? null;
            $item->urutan = $itemData['urutan'] ?? 1;
            if(isset($itemData['path_gambar'])) $item->path_gambar = is_array($itemData['path_gambar']) ? array_values($itemData['path_gambar'])[0] : $itemData['path_gambar'];
            $item->save();
            $existingIds[] = $item->id;
        }
        KontenBeranda::where('bagian', 'mengapa_item')->whereNotIn('id', $existingIds)->delete();
        Notification::make()->success()->title('Mengapa Pilih Pradana Disimpan!')->send();
    }

    public function saveAkreditasi(): void
    {
        $data = $this->akreditasiForm->getState();
        $existingIds = [];
        foreach ($data['akreditasi_items'] ?? [] as $itemData) {
            $item = KontenBeranda::firstOrNew(['id' => $itemData['id'] ?? null]);
            $item->bagian = 'akreditasi_item';
            $item->judul = $itemData['judul'] ?? null;
            $item->urutan = $itemData['urutan'] ?? 1;
            if(isset($itemData['path_gambar'])) $item->path_gambar = is_array($itemData['path_gambar']) ? array_values($itemData['path_gambar'])[0] : $itemData['path_gambar'];
            $item->save();
            $existingIds[] = $item->id;
        }
        KontenBeranda::where('bagian', 'akreditasi_item')->whereNotIn('id', $existingIds)->delete();
        Notification::make()->success()->title('Akreditasi Disimpan!')->send();
    }

    public function saveSertifikat(): void
    {
        $data = $this->sertifikatForm->getState();
        $existingIds = [];
        foreach ($data['sertifikat_items'] ?? [] as $itemData) {
            $item = KontenBeranda::firstOrNew(['id' => $itemData['id'] ?? null]);
            $item->bagian = 'sertifikat_item';
            $item->judul = $itemData['judul'] ?? null;
            $item->urutan = $itemData['urutan'] ?? 1;
            if(isset($itemData['path_gambar'])) $item->path_gambar = is_array($itemData['path_gambar']) ? array_values($itemData['path_gambar'])[0] : $itemData['path_gambar'];
            $item->save();
            $existingIds[] = $item->id;
        }
        KontenBeranda::where('bagian', 'sertifikat_item')->whereNotIn('id', $existingIds)->delete();
        Notification::make()->success()->title('Sertifikat Disimpan!')->send();
    }

    // Kontak form removed
}
