<?php

namespace App\Filament\Resources\SloRegulasis\Pages;

use App\Filament\Resources\SloRegulasis\SloRegulasiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSloRegulasi extends EditRecord
{
    protected static string $resource = SloRegulasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
