<?php

namespace App\Filament\Resources\ProfilLegalitas\Pages;

use App\Filament\Resources\ProfilLegalitas\ProfilLegalitasResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProfilLegalitas extends ListRecords
{
    protected static string $resource = ProfilLegalitasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
