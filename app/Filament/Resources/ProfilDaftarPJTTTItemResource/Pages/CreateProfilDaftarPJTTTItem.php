<?php

namespace App\Filament\Resources\ProfilDaftarPJTTTItemResource\Pages;

use App\Filament\Resources\ProfilDaftarPJTTTItemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProfilDaftarPJTTTItem extends CreateRecord
{
    protected static string $resource = ProfilDaftarPJTTTItemResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl("index");
    }
}
