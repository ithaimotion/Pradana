<?php

namespace App\Filament\Pages;

use App\Models\DaftarHargaSlo;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Storage;

class DaftarHargaSloPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationGroup = 'Standar Pelayanan';
    protected static ?string $title = 'Kelola: Daftar Harga SLO';
    protected static string $view = 'filament.pages.daftar-harga-slo-page';

    public ?array $data = [];

    public function mount(): void
    {
        $setting = DaftarHargaSlo::first();
        if ($setting) {
            $this->form->fill($setting->toArray());
        } else {
            $this->form->fill();
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Daftar Harga SLO')
                    ->description('Kelola dokumen PDF daftar harga SLO')
                    ->schema([
                        FileUpload::make('path_pdf')
                            ->label('Upload PDF')
                            ->directory('daftar-harga')
                            ->acceptedFileTypes(['application/pdf'])
                            ->maxSize(10240)
                            ->required(),
                        TextInput::make('nama_dokumen')
                            ->label('Nama Dokumen')
                            ->required(),
                        Toggle::make('is_active')
                            ->label('Status Aktif')
                            ->default(true),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $setting = DaftarHargaSlo::first();

        if ($setting) {
            if (isset($data['path_pdf']) && $setting->path_pdf && $setting->path_pdf !== $data['path_pdf']) {
                Storage::disk('public')->delete($setting->path_pdf);
            }
            $setting->update($data);
        } else {
            DaftarHargaSlo::create($data);
        }

        Notification::make()
            ->title('Berhasil')
            ->body('Daftar Harga SLO berhasil disimpan.')
            ->success()
            ->send();
    }
}
