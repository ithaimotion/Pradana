<?php

namespace App\Filament\Resources\ProfilPeralatanKetenagalistrikanResource\Pages;

use App\Filament\Resources\ProfilPeralatanKetenagalistrikanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProfilPeralatanKetenagalistrikan extends CreateRecord
{
    protected static string $resource = ProfilPeralatanKetenagalistrikanResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl("index");
    }
}
