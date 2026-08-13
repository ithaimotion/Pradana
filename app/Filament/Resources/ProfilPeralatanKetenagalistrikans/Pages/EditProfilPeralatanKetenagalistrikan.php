<?php

namespace App\Filament\Resources\ProfilPeralatanKetenagalistrikans\Pages;

use App\Filament\Resources\ProfilPeralatanKetenagalistrikans\ProfilPeralatanKetenagalistrikanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProfilPeralatanKetenagalistrikan extends EditRecord
{
    protected static string $resource = ProfilPeralatanKetenagalistrikanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
