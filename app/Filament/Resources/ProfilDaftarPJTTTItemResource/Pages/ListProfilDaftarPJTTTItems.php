<?php

namespace App\Filament\Resources\ProfilDaftarPJTTTItemResource\Pages;

use App\Filament\Resources\ProfilDaftarPJTTTItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProfilDaftarPJTTTItems extends ListRecords
{
    protected static string $resource = ProfilDaftarPJTTTItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
