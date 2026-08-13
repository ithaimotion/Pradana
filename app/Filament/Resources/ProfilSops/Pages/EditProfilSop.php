<?php

namespace App\Filament\Resources\ProfilSops\Pages;

use App\Filament\Resources\ProfilSops\ProfilSopResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProfilSop extends EditRecord
{
    protected static string $resource = ProfilSopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
