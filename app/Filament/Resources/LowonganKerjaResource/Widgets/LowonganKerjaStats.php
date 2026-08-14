<?php

namespace App\Filament\Resources\LowonganKerjaResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\LowonganKerja;

class LowonganKerjaStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Lowongan', LowonganKerja::count())
                ->description('Total lowongan kerja')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('primary'),
            Stat::make('Aktif', LowonganKerja::where('is_active', true)->count())
                ->description('Lowongan kerja aktif')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
            Stat::make('Non-Aktif', LowonganKerja::where('is_active', false)->count())
                ->description('Lowongan kerja ditutup')
                ->descriptionIcon('heroicon-m-x-circle')
                ->color('danger'),
        ];
    }
}
