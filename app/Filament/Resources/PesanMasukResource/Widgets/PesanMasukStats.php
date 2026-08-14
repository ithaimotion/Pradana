<?php

namespace App\Filament\Resources\PesanMasukResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\PesanMasuk;

class PesanMasukStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Pesan', PesanMasuk::count())
                ->description('Total pesan masuk')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('primary'),
            Stat::make('Belum Dibaca', PesanMasuk::where('dibaca', false)->count())
                ->description('Pesan baru / belum dibaca')
                ->descriptionIcon('heroicon-m-envelope-open')
                ->color('danger'),
            Stat::make('Sudah Dibaca', PesanMasuk::where('dibaca', true)->count())
                ->description('Pesan yang sudah dibaca')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
        ];
    }
}
