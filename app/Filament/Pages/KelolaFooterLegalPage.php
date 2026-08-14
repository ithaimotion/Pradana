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
        }
    }

    protected function getForms(): array
    {
        return [
            'privasiForm',
            'syaratForm',
            'cookieForm',
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
}
