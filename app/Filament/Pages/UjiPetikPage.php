<?php

namespace App\Filament\Pages;

use App\Models\UjiPetik;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Storage;

class UjiPetikPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-magnifying-glass';
    protected static ?string $navigationGroup = 'Informasi Publik';
    protected static ?string $title = 'Uji Petik';
    protected static string $view = 'filament.pages.uji-petik-page';

    public ?array $data = [];

    public function mount(): void
    {
        $setting = UjiPetik::first();
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
                Section::make('Kelola Uji Petik')
                    ->description('Upload gambar uji petik inspeksi')
                    ->schema([
                        FileUpload::make('path_gambar')
                            ->label('Gambar Uji Petik')
                            ->image()
                            ->directory('uji-petik')
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

        $setting = UjiPetik::first();

        if ($setting) {
            if ($setting->path_gambar && $setting->path_gambar !== $data['path_gambar']) {
                Storage::disk('public')->delete($setting->path_gambar);
            }
            $setting->update($data);
        } else {
            UjiPetik::create($data);
        }

        Notification::make()
            ->title('Berhasil')
            ->body('Gambar uji petik berhasil disimpan.')
            ->success()
            ->send();
    }
}
