<?php

namespace App\Filament\Resources\ProfilLegalitasTenagaTeknikResource\Pages;

use App\Filament\Resources\ProfilLegalitasTenagaTeknikResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfilLegalitasTenagaTeknik extends EditRecord
{
    protected static string $resource = ProfilLegalitasTenagaTeknikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
