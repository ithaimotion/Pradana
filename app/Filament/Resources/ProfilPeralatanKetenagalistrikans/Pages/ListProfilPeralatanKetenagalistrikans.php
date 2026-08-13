<?php

namespace App\Filament\Resources\ProfilPeralatanKetenagalistrikans\Pages;

use App\Filament\Resources\ProfilPeralatanKetenagalistrikans\ProfilPeralatanKetenagalistrikanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProfilPeralatanKetenagalistrikans extends ListRecords
{
    protected static string $resource = ProfilPeralatanKetenagalistrikanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
