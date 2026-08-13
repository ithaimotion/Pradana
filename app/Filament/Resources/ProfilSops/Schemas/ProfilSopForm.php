<?php

namespace App\Filament\Resources\ProfilSops\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class ProfilSopForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->components([
                TextInput::make('judul'),
                TextInput::make('subjudul'),
                TextInput::make('url_dokumen'),
            ]),
            ]);
    }
}
