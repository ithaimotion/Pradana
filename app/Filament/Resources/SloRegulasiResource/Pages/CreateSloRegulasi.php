<?php

namespace App\Filament\Resources\SloRegulasiResource\Pages;

use App\Filament\Resources\SloRegulasiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSloRegulasi extends CreateRecord
{
    protected static string $resource = SloRegulasiResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl("index");
    }
}
