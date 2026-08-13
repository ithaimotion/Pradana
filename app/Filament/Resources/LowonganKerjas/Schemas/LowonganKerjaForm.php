<?php

namespace App\Filament\Resources\LowonganKerjas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class LowonganKerjaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->components([
                TextInput::make('divisi')
                    ->required(),
                TextInput::make('tipe')
                    ->required(),
                TextInput::make('lokasi')
                    ->required(),
                TextInput::make('judul')
                    ->required(),
                Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('persyaratan')
                    ->columnSpanFull(),
                TextInput::make('link_lamar'),
                TextInput::make('urutan')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->required(),
            ]),
            ]);
    }
}
