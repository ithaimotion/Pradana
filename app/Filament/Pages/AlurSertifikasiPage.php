<?php

namespace App\Filament\Pages;

use App\Models\AlurSertifikasi;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Storage;

class AlurSertifikasiPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-arrow-path-rounded-square';
    protected static ?string $navigationGroup = 'Standar Pelayanan';
    protected static ?string $title = 'Kelola: Alur Sertifikasi';
    protected static string $view = 'filament.pages.alur-sertifikasi-page';

    public ?array $data = [];

    public function mount(): void
    {
        $setting = AlurSertifikasi::first();
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
                Section::make('Alur Sertifikasi')
                    ->description('Kelola dokumen PDF alur sertifikasi SLO')
                    ->schema([
                        TextInput::make('nama_dokumen')
                            ->label('Nama Dokumen')
                            ->required(),
                        FileUpload::make('path_pdf')
                            ->label('Upload PDF')
                            ->directory('alur-sertifikasi')
                            ->acceptedFileTypes(['application/pdf'])
                            ->maxSize(10240)
                            ->required(),
                        Toggle::make('is_active')
                            ->label('Tampilkan di halaman publik')
                            ->default(true),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $setting = AlurSertifikasi::first();

        if ($setting) {
            if (isset($data['path_pdf']) && $setting->path_pdf && $setting->path_pdf !== $data['path_pdf']) {
                Storage::disk('public')->delete($setting->path_pdf);
            }
            $setting->update($data);
        } else {
            AlurSertifikasi::create($data);
        }

        Notification::make()
            ->title('Berhasil')
            ->body('Alur Sertifikasi berhasil disimpan.')
            ->success()
            ->send();
    }
}
