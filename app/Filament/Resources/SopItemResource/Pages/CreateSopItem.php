<?php

namespace App\Filament\Resources\SopItemResource\Pages;

use App\Filament\Resources\SopItemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSopItem extends CreateRecord
{
    protected static string $resource = SopItemResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl("index");
    }
}
