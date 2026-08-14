<?php
namespace App\Filament\Resources\SloKategoriLayananResource\Widgets;

use App\Models\SloKategoriLayanan;
use Filament\Widgets\ChartWidget;

class SloKategoriLayananChart extends ChartWidget
{
    protected static ?string $heading = 'Distribusi Kategori Layanan SLO';
    protected static ?string $maxHeight = '250px';
    protected int | string | array $columnSpan = 'full';
    
    protected function getData(): array
    {
        $data = SloKategoriLayanan::selectRaw('kategori_utama, COUNT(*) as count')
            ->groupBy('kategori_utama')
            ->get();
            
        return [
            'datasets' => [
                [
                    'label' => 'Total Layanan',
                    'data' => $data->pluck('count')->toArray(),
                    'backgroundColor' => ['#3b82f6', '#f59e0b', '#10b981'],
                ],
            ],
            'labels' => $data->pluck('kategori_utama')->map(fn($k) => \App\Models\SloKategoriLayanan::kategoriOptions()[$k] ?? $k)->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
