<?php

namespace App\Filament\Resources\ProfilLegalitasItemResource\Pages;

use App\Filament\Resources\ProfilLegalitasItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProfilLegalitasItems extends ListRecords
{
    protected static string $resource = ProfilLegalitasItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
