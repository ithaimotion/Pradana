<?php

namespace App\Filament\Resources\SloKategoriLayanans\Pages;

use App\Filament\Resources\SloKategoriLayanans\SloKategoriLayananResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSloKategoriLayanan extends EditRecord
{
    protected static string $resource = SloKategoriLayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
