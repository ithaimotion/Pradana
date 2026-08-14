<?php

namespace App\Filament\Resources\ProfilDaftarPJTTTItemResource\Pages;

use App\Filament\Resources\ProfilDaftarPJTTTItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfilDaftarPJTTTItem extends EditRecord
{
    protected static string $resource = ProfilDaftarPJTTTItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
