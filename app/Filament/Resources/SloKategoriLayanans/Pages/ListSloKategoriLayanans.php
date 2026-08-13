<?php

namespace App\Filament\Resources\SloKategoriLayanans\Pages;

use App\Filament\Resources\SloKategoriLayanans\SloKategoriLayananResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSloKategoriLayanans extends ListRecords
{
    protected static string $resource = SloKategoriLayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
