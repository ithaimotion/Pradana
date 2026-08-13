<?php

namespace App\Filament\Resources\SloRegulasis\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class SloRegulasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->components([
                TextInput::make('nomor')
                    ->required(),
                Textarea::make('keterangan')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('tipe')
                    ->required()
                    ->default('permen_esdm'),
                TextInput::make('url_dokumen'),
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
