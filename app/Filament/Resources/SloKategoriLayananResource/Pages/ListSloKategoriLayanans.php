<?php

namespace App\Filament\Resources\SloKategoriLayananResource\Pages;

use App\Filament\Resources\SloKategoriLayananResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSloKategoriLayanans extends ListRecords
{
    protected static string $resource = SloKategoriLayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            SloKategoriLayananResource\Widgets\SloKategoriLayananStats::class,
        ];
    }
}
