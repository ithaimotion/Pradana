<?php

namespace App\Filament\Resources\ProfilStrukturOrganisasiItemResource\Pages;

use App\Filament\Resources\ProfilStrukturOrganisasiItemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProfilStrukturOrganisasiItem extends CreateRecord
{
    protected static string $resource = ProfilStrukturOrganisasiItemResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl("index");
    }
}
