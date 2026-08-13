<?php

namespace App\Filament\Resources\ProfilLegalitas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class ProfilLegalitasForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->components([
                TextInput::make('judul'),
                Textarea::make('subjudul')
                    ->columnSpanFull(),
                TextInput::make('dokumen'),
                Textarea::make('konten')
                    ->columnSpanFull(),
            ]),
            ]);
    }
}
