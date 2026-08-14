<?php

namespace App\Filament\Resources\SloRegulasiResource\Pages;

use App\Filament\Resources\SloRegulasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSloRegulasis extends ListRecords
{
    protected static string $resource = SloRegulasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
