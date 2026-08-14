<?php

namespace App\Filament\Pages;

use App\Models\MaklumatLayanan;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Storage;

class MaklumatLayananPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationGroup = 'Informasi Publik';
    protected static ?string $title = 'Maklumat Layanan';
    protected static string $view = 'filament.pages.maklumat-layanan-page';

    public ?array $data = [];

    public function mount(): void
    {
        $setting = MaklumatLayanan::first();
        if ($setting) {
            $this->form->fill([
                'path_gambar' => $setting->path_gambar,
            ]);
        } else {
            $this->form->fill();
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Gambar Maklumat Layanan')
                    ->description('Upload gambar maklumat layanan')
                    ->schema([
                        FileUpload::make('path_gambar')
                            ->label('Maklumat Layanan')
                            ->image()
                            ->directory('maklumat-layanan')
                            ->maxSize(5120)
                            ->helperText('Format PNG, JPG, WEBP maks 5MB')
                            ->required(),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $setting = MaklumatLayanan::first();

        if ($setting) {
            if ($setting->path_gambar && $setting->path_gambar !== $data['path_gambar']) {
                Storage::disk('public')->delete($setting->path_gambar);
            }
            $setting->update($data);
        } else {
            MaklumatLayanan::create($data);
        }

        Notification::make()
            ->title('Berhasil')
            ->body('Maklumat layanan berhasil disimpan.')
            ->success()
            ->send();
    }
}
