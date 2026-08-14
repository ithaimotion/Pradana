<?php

namespace App\Filament\Resources\ProfilLegalitasItemResource\Pages;

use App\Filament\Resources\ProfilLegalitasItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfilLegalitasItem extends EditRecord
{
    protected static string $resource = ProfilLegalitasItemResource::class;

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
