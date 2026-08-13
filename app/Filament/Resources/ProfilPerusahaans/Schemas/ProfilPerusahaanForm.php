<?php

namespace App\Filament\Resources\ProfilPerusahaans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class ProfilPerusahaanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->components([
                TextInput::make('judul'),
                Textarea::make('subjudul')
                    ->columnSpanFull(),
                TextInput::make('nilai'),
                Textarea::make('konten')
                    ->columnSpanFull(),
                TextInput::make('url_gambar'),
                Textarea::make('visi')
                    ->columnSpanFull(),
                TextInput::make('foto_visi'),
                Textarea::make('misi')
                    ->columnSpanFull(),
                TextInput::make('foto_misi'),
                TextInput::make('nilai_perusahaan'),
            ]),
            ]);
    }
}
