<?php

namespace App\Filament\Resources\ProfilPeralatanKetenagalistrikanResource\Pages;

use App\Filament\Resources\ProfilPeralatanKetenagalistrikanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProfilPeralatanKetenagalistrikans extends ListRecords
{
    protected static string $resource = ProfilPeralatanKetenagalistrikanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            ProfilPeralatanKetenagalistrikanResource\Widgets\ProfilPeralatanKetenagalistrikanStats::class,
            \App\Filament\Resources\ProfilPeralatanKetenagalistrikanResource\Widgets\PeralatanKategoriChart::class,
        ];
    }
}
