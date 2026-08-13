<?php

namespace App\Filament\Resources\ProfilStrukturOrganisasis\Pages;

use App\Filament\Resources\ProfilStrukturOrganisasis\ProfilStrukturOrganisasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProfilStrukturOrganisasis extends ListRecords
{
    protected static string $resource = ProfilStrukturOrganisasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
