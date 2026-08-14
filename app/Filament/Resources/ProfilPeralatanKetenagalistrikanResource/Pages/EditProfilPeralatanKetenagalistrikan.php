<?php

namespace App\Filament\Resources\ProfilPeralatanKetenagalistrikanResource\Pages;

use App\Filament\Resources\ProfilPeralatanKetenagalistrikanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfilPeralatanKetenagalistrikan extends EditRecord
{
    protected static string $resource = ProfilPeralatanKetenagalistrikanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
