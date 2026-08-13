<?php

namespace App\Filament\Resources\PesanMasuks\Pages;

use App\Filament\Resources\PesanMasuks\PesanMasukResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPesanMasuk extends EditRecord
{
    protected static string $resource = PesanMasukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
