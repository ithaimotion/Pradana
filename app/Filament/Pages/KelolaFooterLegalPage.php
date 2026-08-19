<?php

namespace App\Filament\Pages;

use App\Models\LegalSetting;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;

class KelolaFooterLegalPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-check';
    protected static ?string $navigationGroup = 'Kelola Footer Legal';
    protected static ?string $navigationLabel = 'Kelola Footer Legal';
    protected static ?string $title = 'Kelola Footer Legal';
    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.kelola-footer-legal-page';

    public ?array $privasiData = [];
    public ?array $syaratData = [];
    public ?array $cookieData = [];
    public ?array $sosmedData = [];

    public $activeTab = 'privasi';

    public function mount(): void
    {
        $settings = LegalSetting::first();
        if ($settings) {
            $this->privasiForm->fill([
                'kebijakan_privasi_judul' => $settings->kebijakan_privasi_judul,
                'kebijakan_privasi_konten' => $settings->kebijakan_privasi_konten,
            ]);
            $this->syaratForm->fill([
                'syarat_ketentuan_judul' => $settings->syarat_ketentuan_judul,
                'syarat_ketentuan_konten' => $settings->syarat_ketentuan_konten,
            ]);
            $this->cookieForm->fill([
                'kebijakan_cookie_judul' => $settings->kebijakan_cookie_judul,
                'kebijakan_cookie_konten' => $settings->kebijakan_cookie_konten,
            ]);
            $this->sosmedForm->fill([
                'social_media_links' => $settings->social_media_links ?? [],
            ]);
        }
    }

    protected function getForms(): array
    {
        return [
            'privasiForm',
            'syaratForm',
            'cookieForm',
            'sosmedForm',
        ];
    }

    public function privasiForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Kebijakan Privasi')
                    ->schema([
                        TextInput::make('kebijakan_privasi_judul')
                            ->label('Judul Halaman')
                            ->default('Kebijakan Privasi')
                            ->required(),
                        RichEditor::make('kebijakan_privasi_konten')
                            ->label('Konten / Deskripsi')
                            ->required()
                            ->columnSpanFull(),
                    ])
            ])
            ->statePath('privasiData');
    }

    public function syaratForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Syarat & Ketentuan')
                    ->schema([
                        TextInput::make('syarat_ketentuan_judul')
                            ->label('Judul Halaman')
                            ->default('Syarat & Ketentuan')
                            ->required(),
                        RichEditor::make('syarat_ketentuan_konten')
                            ->label('Konten / Deskripsi')
                            ->required()
                            ->columnSpanFull(),
                    ])
            ])
            ->statePath('syaratData');
    }

    public function cookieForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Kebijakan Cookie')
                    ->schema([
                        TextInput::make('kebijakan_cookie_judul')
                            ->label('Judul Halaman')
                            ->default('Kebijakan Cookie')
                            ->required(),
                        RichEditor::make('kebijakan_cookie_konten')
                            ->label('Konten / Deskripsi')
                            ->required()
                            ->columnSpanFull(),
                    ])
            ])
            ->statePath('cookieData');
    }

    public function sosmedForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Ikon Sosial Media Footer')
                    ->description('Tambah, edit, atau hapus ikon sosial media yang muncul di bagian bawah footer. Upload gambar ikon dan isi link URL-nya.')
                    ->schema([
                        Repeater::make('social_media_links')
                            ->label('Daftar Sosial Media')
                            ->schema([
                                TextInput::make('nama')
                                    ->label('Nama Platform')
                                    ->placeholder('Contoh: Instagram, Twitter, LinkedIn')
                                    ->required(),
                                TextInput::make('url')
                                    ->label('URL Profil')
                                    ->placeholder('Contoh: https://instagram.com/pradananusaenergi')
                                    ->url()
                                    ->required(),
                                FileUpload::make('ikon')
                                    ->label('Ikon / Gambar')
                                    ->image()
                                    ->directory('uploads/sosmed')
                                    ->imagePreviewHeight('60')
                                    ->columnSpanFull()
                                    ->helperText('Upload gambar ikon (PNG/SVG/JPG, disarankan transparan/PNG)'),
                            ])
                            ->columns(2)
                            ->addActionLabel('+ Tambah Sosial Media')
                            ->reorderable()
                            ->collapsible()
                            ->cloneable()
                            ->itemLabel(fn (array $state): ?string => $state['nama'] ?? null)
                            ->columnSpanFull(),
                    ])
            ])
            ->statePath('sosmedData');
    }

    public function savePrivasi(): void
    {
        $data = $this->privasiForm->getState();
        $settings = LegalSetting::firstOrNew();
        $settings->kebijakan_privasi_judul = $data['kebijakan_privasi_judul'] ?? null;
        $settings->kebijakan_privasi_konten = $data['kebijakan_privasi_konten'] ?? null;
        $settings->save();
        Notification::make()->success()->title('Kebijakan Privasi Disimpan!')->send();
    }

    public function saveSyarat(): void
    {
        $data = $this->syaratForm->getState();
        $settings = LegalSetting::firstOrNew();
        $settings->syarat_ketentuan_judul = $data['syarat_ketentuan_judul'] ?? null;
        $settings->syarat_ketentuan_konten = $data['syarat_ketentuan_konten'] ?? null;
        $settings->save();
        Notification::make()->success()->title('Syarat & Ketentuan Disimpan!')->send();
    }

    public function saveCookie(): void
    {
        $data = $this->cookieForm->getState();
        $settings = LegalSetting::firstOrNew();
        $settings->kebijakan_cookie_judul = $data['kebijakan_cookie_judul'] ?? null;
        $settings->kebijakan_cookie_konten = $data['kebijakan_cookie_konten'] ?? null;
        $settings->save();
        Notification::make()->success()->title('Kebijakan Cookie Disimpan!')->send();
    }

    public function saveSosmed(): void
    {
        $data = $this->sosmedForm->getState();
        $settings = LegalSetting::firstOrNew();
        $settings->social_media_links = $data['social_media_links'] ?? [];
        $settings->save();
        Notification::make()->success()->title('Ikon Sosial Media Disimpan!')->send();
    }
}
