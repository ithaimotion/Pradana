<?php

namespace App\Filament\Resources\LowonganKerjaResource\Pages;

use App\Filament\Resources\LowonganKerjaResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageLowonganKerjas extends ManageRecords
{
    protected static string $resource = LowonganKerjaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            LowonganKerjaResource\Widgets\LowonganKerjaStats::class,
            \App\Filament\Resources\LowonganKerjaResource\Widgets\LowonganKerjaStatusChart::class,
        ];
    }
}
