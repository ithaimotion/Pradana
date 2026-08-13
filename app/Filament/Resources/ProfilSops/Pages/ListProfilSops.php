<?php

namespace App\Filament\Resources\ProfilSops\Pages;

use App\Filament\Resources\ProfilSops\ProfilSopResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProfilSops extends ListRecords
{
    protected static string $resource = ProfilSopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
