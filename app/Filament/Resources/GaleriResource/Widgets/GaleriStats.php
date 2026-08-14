<?php

namespace App\Filament\Resources\GaleriResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Galeri;

class GaleriStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Galeri', Galeri::where('kategori', 'umum')->count())
                ->description('Total foto galeri')
                ->descriptionIcon('heroicon-m-photo')
                ->color('primary'),
            Stat::make('Aktif', Galeri::where('kategori', 'umum')->where('status_aktif', true)->count())
                ->description('Foto galeri aktif')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
            Stat::make('Non-Aktif', Galeri::where('kategori', 'umum')->where('status_aktif', false)->count())
                ->description('Foto galeri disembunyikan')
                ->descriptionIcon('heroicon-m-x-circle')
                ->color('danger'),
        ];
    }
}
