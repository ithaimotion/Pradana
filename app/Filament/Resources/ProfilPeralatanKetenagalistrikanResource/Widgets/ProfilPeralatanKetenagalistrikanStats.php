<?php

namespace App\Filament\Resources\ProfilPeralatanKetenagalistrikanResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\ProfilPeralatanKetenagalistrikan;

class ProfilPeralatanKetenagalistrikanStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Terkalibrasi', ProfilPeralatanKetenagalistrikan::where('status_kalibrasi', 'Terkalibrasi')->count())
                ->description('Peralatan terkalibrasi')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('primary'),
            Stat::make('Aktif', ProfilPeralatanKetenagalistrikan::where('status_aktif', true)->count())
                ->description('Peralatan yang aktif')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
            Stat::make('Non-Aktif', ProfilPeralatanKetenagalistrikan::where('status_aktif', false)->count())
                ->description('Peralatan non-aktif')
                ->descriptionIcon('heroicon-m-x-circle')
                ->color('danger'),
        ];
    }
}
