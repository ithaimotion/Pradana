<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Actions\Action;

class ProfilPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationGroup = 'Profil';
    protected static ?string $navigationLabel = 'Profil Perusahaan';
    protected static ?string $title = 'Profil Perusahaan';
    protected static ?string $slug = 'profil-perusahaan';
    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.profil-page';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Kelola Profil Pradana Nusa Energi')
                    ->description('Ubah judul profil, teks sub-highlight, deskripsi umum, dan upload foto profil perusahaan.')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('judul')->label('Judul Profil')->required()->placeholder('Contoh: PT PRADANA NUSA ENERGI'),
                            TextInput::make('subjudul')->label('Sub-Highlight')->placeholder('Contoh: Nusa Energi'),
                            Textarea::make('konten')->label('Deskripsi Ringkasan Profil')->rows(4)->columnSpanFull(),
                        ]),
                        Grid::make(2)->schema([
                            FileUpload::make('gambar1')->label('Foto Profil 1 (Kiri)')->image(),
                            FileUpload::make('gambar2')->label('Foto Profil 2 (Kanan)')->image(),
                        ]),
                    ])
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Simpan Profil')
                ->color('primary')
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        // Logika save bisa ditambahkan di sini
        \Filament\Notifications\Notification::make()
            ->success()
            ->title('Berhasil disimpan')
            ->send();
    }
}
