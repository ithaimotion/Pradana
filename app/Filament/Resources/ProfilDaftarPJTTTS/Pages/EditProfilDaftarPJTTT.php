<?php

namespace App\Filament\Resources\ProfilDaftarPJTTTS\Pages;

use App\Filament\Resources\ProfilDaftarPJTTTS\ProfilDaftarPJTTTResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProfilDaftarPJTTT extends EditRecord
{
    protected static string $resource = ProfilDaftarPJTTTResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
