<?php

namespace App\Filament\Resources\SloKategoriLayananResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\SloKategoriLayanan;

class SloKategoriLayananStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Kategori', SloKategoriLayanan::count())
                ->description('Total kategori layanan')
                ->descriptionIcon('heroicon-m-rectangle-stack')
                ->color('primary'),
            Stat::make('Aktif', SloKategoriLayanan::where('is_active', true)->count())
                ->description('Kategori yang aktif')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('success'),
            Stat::make('Non-Aktif', SloKategoriLayanan::where('is_active', false)->count())
                ->description('Kategori non-aktif')
                ->descriptionIcon('heroicon-m-x-circle')
                ->color('danger'),
        ];
    }
}
