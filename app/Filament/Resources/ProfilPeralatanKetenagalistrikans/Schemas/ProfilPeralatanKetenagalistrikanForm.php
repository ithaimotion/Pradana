<?php

namespace App\Filament\Resources\ProfilPeralatanKetenagalistrikans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class ProfilPeralatanKetenagalistrikanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->components([
                TextInput::make('nama'),
                TextInput::make('kategori'),
                TextInput::make('gambar'),
                Textarea::make('deskripsi_singkat')
                    ->columnSpanFull(),
                TextInput::make('jenis_alat'),
                TextInput::make('model'),
                TextInput::make('spesifikasi'),
                TextInput::make('status_kalibrasi'),
                DatePicker::make('tanggal_kalibrasi'),
                TextInput::make('urutan')
                    ->numeric()
                    ->default(0),
                Toggle::make('status_aktif'),
            ]),
            ]);
    }
}
