<?php

namespace App\Filament\Resources\ProfilDaftarPJTTTS\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class ProfilDaftarPJTTTForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->components([
                TextInput::make('judul')
                    ->required(),
                Textarea::make('subjudul')
                    ->columnSpanFull(),
                Textarea::make('konten')
                    ->columnSpanFull(),
                TextInput::make('dokumen'),
            ]),
            ]);
    }
}
