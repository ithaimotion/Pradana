<?php

namespace App\Filament\Resources\SloRegulasiResource\Pages;

use App\Filament\Resources\SloRegulasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSloRegulasi extends EditRecord
{
    protected static string $resource = SloRegulasiResource::class;

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
