<?php

namespace App\Filament\Resources\ProfilStrukturOrganisasiItemResource\Pages;

use App\Filament\Resources\ProfilStrukturOrganisasiItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProfilStrukturOrganisasiItems extends ListRecords
{
    protected static string $resource = ProfilStrukturOrganisasiItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
