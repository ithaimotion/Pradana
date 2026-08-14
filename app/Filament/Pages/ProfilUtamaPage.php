<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use App\Models\ProfilPerusahaan;

class ProfilUtamaPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationGroup = 'Profil';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Kelola Profil Utama';
    protected static ?string $title = 'Kelola Profil Perusahaan';
    protected static ?string $slug = 'profil/utama';

    protected static string $view = 'filament.pages.profil-utama-page';

    public ?array $data = [];

    public function mount(): void
    {
        $profil = ProfilPerusahaan::first();
        if ($profil) {
            $data = $profil->toArray();
            
            // Format misi string to repeater array if it is still a string
            if (!empty($data['misi']) && is_string($data['misi'])) {
                $misiList = array_filter(array_map('trim', explode("\n", strip_tags($data['misi']))));
                $misiRepeater = [];
                foreach($misiList as $m) {
                    $misiRepeater[] = ['teks_misi' => $m, 'foto_misi' => null];
                }
                $data['misi'] = $misiRepeater;
            }
            
            $this->form->fill($data);
        } else {
            $this->form->fill();
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('1. Banner Header Halaman')
                    ->schema([
                        TextInput::make('judul')
                            ->label('Judul Header (Main Title)')
                            ->placeholder('Contoh: PT PRADANA NUSA ENERGI')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('subjudul')
                            ->label('Sub-Judul / Tagline Profil')
                            ->placeholder('Lembaga Inspeksi Teknik (LIT) terkemuka dan terpercaya...')
                            ->columnSpanFull(),
                    ]),
                
                Section::make('2. Komitmen Perusahaan & Foto Gedung')
                    ->schema([
                        TextInput::make('nilai')
                            ->label('Judul Komitmen')
                            ->placeholder('Komitmen Kami Terhadap Keselamatan & Ketenagalistrikan')
                            ->columnSpanFull(),
                        RichEditor::make('konten')
                            ->label('Isi Paragraf Komitmen & Latar Belakang')
                            ->placeholder('Deskripsi komitmen perusahaan...')
                            ->columnSpanFull(),
                        FileUpload::make('url_gambar')
                            ->label('Foto Kantor / Gedung Perusahaan')
                            ->image()
                            ->directory('uploads/profil')
                            ->columnSpanFull(),
                    ]),

                Section::make('3. Visi Perusahaan')
                    ->schema([
                        RichEditor::make('visi')
                            ->label('Visi')
                            ->placeholder('Menjadi Lembaga Inspeksi Teknik yang...')
                            ->columnSpanFull(),
                    ]),

                Section::make('4. Misi Perusahaan')
                    ->schema([
                        Repeater::make('misi')
                            ->label('Daftar Misi')
                            ->addActionLabel('Tambah Misi')
                            ->schema([
                                TextInput::make('teks_misi')->label('Isi Misi')->required(),
                                FileUpload::make('foto_misi')
                                    ->label('Foto Ilustrasi Misi')
                                    ->image()
                                    ->directory('uploads/profil'),
                            ])
                            ->columns(1)
                            ->columnSpanFull(),
                    ]),

                Section::make('5. Nilai Utama Perusahaan')
                    ->description('Kelola card nilai perusahaan yang akan ditampilkan di landing page')
                    ->schema([
                        Repeater::make('nilai_perusahaan')
                            ->label('')
                            ->addActionLabel('Tambah Card Nilai')
                            ->schema([
                                TextInput::make('judul')->required(),
                                RichEditor::make('deskripsi')->columnSpanFull(),
                            ])
                            ->columns(1)
                    ])
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();
        $profil = ProfilPerusahaan::first() ?? new ProfilPerusahaan();
        
        $profil->judul = $data['judul'] ?? null;
        $profil->subjudul = $data['subjudul'] ?? null;
        $profil->nilai = $data['nilai'] ?? null;
        $profil->konten = $data['konten'] ?? null;
        
        if (isset($data['url_gambar'])) $profil->url_gambar = is_array($data['url_gambar']) ? array_values($data['url_gambar'])[0] : $data['url_gambar'];
        $profil->visi = $data['visi'] ?? null;
        
        $profil->misi = $data['misi'] ?? null;
        
        $profil->nilai_perusahaan = $data['nilai_perusahaan'] ?? null;
        
        $profil->save();
        
        Notification::make()->success()->title('Profil Perusahaan Disimpan!')->send();
    }
}
