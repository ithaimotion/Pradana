<?php

namespace App\Filament\Resources\ProfilLegalitasItemResource\Pages;

use App\Filament\Resources\ProfilLegalitasItemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProfilLegalitasItem extends CreateRecord
{
    protected static string $resource = ProfilLegalitasItemResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl("index");
    }
}
