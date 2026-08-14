<?php

namespace App\Filament\Resources\ClientResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Galeri;

class ClientStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Client', Galeri::where('kategori', 'client')->count())
                ->description('Total client')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary'),
            Stat::make('Aktif', Galeri::where('kategori', 'client')->where('status_aktif', true)->count())
                ->description('Client aktif')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
            Stat::make('Non-Aktif', Galeri::where('kategori', 'client')->where('status_aktif', false)->count())
                ->description('Client disembunyikan')
                ->descriptionIcon('heroicon-m-x-circle')
                ->color('danger'),
        ];
    }
}
