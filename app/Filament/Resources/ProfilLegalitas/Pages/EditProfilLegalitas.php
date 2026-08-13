<?php

namespace App\Filament\Resources\ProfilLegalitas\Pages;

use App\Filament\Resources\ProfilLegalitas\ProfilLegalitasResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProfilLegalitas extends EditRecord
{
    protected static string $resource = ProfilLegalitasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
