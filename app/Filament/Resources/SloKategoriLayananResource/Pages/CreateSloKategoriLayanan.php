<?php

namespace App\Filament\Resources\SloKategoriLayananResource\Pages;

use App\Filament\Resources\SloKategoriLayananResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSloKategoriLayanan extends CreateRecord
{
    protected static string $resource = SloKategoriLayananResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl("index");
    }
}
