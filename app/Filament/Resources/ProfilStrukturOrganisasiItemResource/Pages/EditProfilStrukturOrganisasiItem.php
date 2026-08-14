<?php

namespace App\Filament\Resources\ProfilStrukturOrganisasiItemResource\Pages;

use App\Filament\Resources\ProfilStrukturOrganisasiItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfilStrukturOrganisasiItem extends EditRecord
{
    protected static string $resource = ProfilStrukturOrganisasiItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl("index");
    }
}
