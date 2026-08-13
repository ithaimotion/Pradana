<?php

namespace App\Filament\Resources\SloRegulasis\Pages;

use App\Filament\Resources\SloRegulasis\SloRegulasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSloRegulasis extends ListRecords
{
    protected static string $resource = SloRegulasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
