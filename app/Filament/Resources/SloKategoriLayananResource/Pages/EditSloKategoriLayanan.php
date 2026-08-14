<?php

namespace App\Filament\Resources\SloKategoriLayananResource\Pages;

use App\Filament\Resources\SloKategoriLayananResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSloKategoriLayanan extends EditRecord
{
    protected static string $resource = SloKategoriLayananResource::class;

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
