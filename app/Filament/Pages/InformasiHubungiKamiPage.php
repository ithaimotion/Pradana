<?php

namespace App\Filament\Pages;

use App\Models\InformasiKontakSetting;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;

class InformasiHubungiKamiPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationGroup = 'Hubungi Kami';
    protected static ?string $navigationLabel = 'Informasi Hubungi Kami';
    protected static ?string $title = 'Pengaturan Informasi Hubungi Kami';
    protected static ?int $navigationSort = 2;

    protected static string $view = 'filament.pages.informasi-hubungi-kami-page';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = InformasiKontakSetting::first();
        if ($settings) {
            $this->form->fill($settings->toArray());
        } else {
            $this->form->fill();
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Ubah rincian alamat kantor, telepon & WhatsApp, email resmi, jam operasional, dan embed maps yang tampil di halaman publik.')
                    ->schema([
                        Textarea::make('alamat_kantor')
                            ->label('Alamat Kantor')
                            ->placeholder('Contoh: Jl. Sumatra Blok B No. 85...')
                            ->rows(3)
                            ->columnSpanFull()
                            ->required(),
                        TextInput::make('telepon_whatsapp')
                            ->label('Telepon & WhatsApp')
                            ->placeholder('Contoh: 021-8498 715 & +6287857603660')
                            ->required(),
                        TextInput::make('email_resmi')
                            ->label('Email Resmi')
                            ->email()
                            ->placeholder('Contoh: nusaenergi999@gmail.com')
                            ->required(),
                        TextInput::make('jam_operasional')
                            ->label('Jam Operasional')
                            ->placeholder('Contoh: Senin - Jumat, 08:00 - 17:00')
                            ->required(),
                        Textarea::make('embed_maps')
                            ->label('Embed Maps')
                            ->placeholder('Paste kode iframe Google Maps di sini...')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])->columns(2),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();
        $settings = InformasiKontakSetting::first();
        
        if ($settings) {
            $settings->update($data);
        } else {
            InformasiKontakSetting::create($data);
        }
        
        Notification::make()->success()->title('Informasi Kontak Disimpan!')->send();
    }
}
