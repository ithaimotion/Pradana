<?php
namespace App\Filament\Widgets;

use App\Models\ProfilPeralatanKetenagalistrikan;
use Filament\Widgets\ChartWidget;

class GlobalPeralatanChart extends ChartWidget
{
    protected static ?string $heading = 'Distribusi Peralatan Inspeksi';
    protected static ?int $sort = 4;
    protected int | string | array $columnSpan = 'full';
    protected static ?string $maxHeight = '300px';
    
    protected function getData(): array
    {
        $data = ProfilPeralatanKetenagalistrikan::selectRaw('kategori, COUNT(*) as count')
            ->groupBy('kategori')
            ->get();
            
        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Peralatan',
                    'data' => $data->pluck('count')->toArray(),
                    'backgroundColor' => ['#3b82f6', '#f59e0b', '#8b5cf6', '#10b981', '#ef4444'],
                ],
            ],
            'labels' => $data->pluck('kategori')->map(fn($k) => ucfirst($k))->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
