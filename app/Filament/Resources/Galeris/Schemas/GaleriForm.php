<?php

namespace App\Filament\Resources\Galeris\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class GaleriForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->components([
                TextInput::make('kategori')
                    ->required()
                    ->default('inspeksi-tr'),
                TextInput::make('judul'),
                TextInput::make('lokasi_tahun'),
                TextInput::make('path_gambar'),
                TextInput::make('urutan')
                    ->required()
                    ->numeric()
                    ->default(1),
                Toggle::make('status_aktif')
                    ->required(),
            ]),
            ]);
    }
}
