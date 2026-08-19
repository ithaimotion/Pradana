<?php

namespace App\Filament\Resources\PesanMasukResource\Pages;

use App\Filament\Resources\PesanMasukResource;
use App\Filament\Resources\PesanMasukResource\Widgets\PengaturanKontakWidget;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPesanMasuks extends ListRecords
{
    protected static string $resource = PesanMasukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            PesanMasukResource\Widgets\PesanMasukStats::class,
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            PengaturanKontakWidget::class,
        ];
    }
}
