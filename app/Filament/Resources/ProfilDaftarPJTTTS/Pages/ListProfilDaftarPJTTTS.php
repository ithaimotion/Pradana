<?php

namespace App\Filament\Resources\ProfilDaftarPJTTTS\Pages;

use App\Filament\Resources\ProfilDaftarPJTTTS\ProfilDaftarPJTTTResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProfilDaftarPJTTTS extends ListRecords
{
    protected static string $resource = ProfilDaftarPJTTTResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
