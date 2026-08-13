<?php

namespace App\Filament\Resources\ProfilStrukturOrganisasis\Pages;

use App\Filament\Resources\ProfilStrukturOrganisasis\ProfilStrukturOrganisasiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProfilStrukturOrganisasi extends EditRecord
{
    protected static string $resource = ProfilStrukturOrganisasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
