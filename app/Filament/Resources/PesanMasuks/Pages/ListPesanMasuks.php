<?php

namespace App\Filament\Resources\PesanMasuks\Pages;

use App\Filament\Resources\PesanMasuks\PesanMasukResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPesanMasuks extends ListRecords
{
    protected static string $resource = PesanMasukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
