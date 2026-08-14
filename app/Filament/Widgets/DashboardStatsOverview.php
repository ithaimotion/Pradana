<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Galeri;
use App\Models\LowonganKerja;
use App\Models\ProfilPeralatanKetenagalistrikan;
use App\Models\PesanMasuk;

class DashboardStatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    protected int | string | array $columnSpan = 'full';

    protected function getStats(): array
    {
        return [
            Stat::make('Pesan Masuk (Baru)', PesanMasuk::where('dibaca', false)->count())
                ->description('Total pesan belum dibaca')
                ->descriptionIcon('heroicon-m-envelope')
                ->chart([2, 5, 3, 7, 4, 8, 2, 9])
                ->color('danger'),
            Stat::make('Galeri Umum', Galeri::where('kategori', 'umum')->count())
                ->description('Total foto di galeri')
                ->descriptionIcon('heroicon-m-photo')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Daftar Klien', Galeri::where('kategori', 'client')->count())
                ->description('Total klien terdaftar')
                ->descriptionIcon('heroicon-m-building-office')
                ->chart([3, 10, 6, 12, 5, 8, 14])
                ->color('info'),
            Stat::make('Peralatan', ProfilPeralatanKetenagalistrikan::count())
                ->description('Total peralatan ketenagalistrikan')
                ->descriptionIcon('heroicon-m-wrench-screwdriver')
                ->chart([15, 8, 12, 5, 10, 3, 7])
                ->color('primary'),
        ];
    }
}
