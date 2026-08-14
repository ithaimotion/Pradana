<?php
namespace App\Filament\Resources\ProfilPeralatanKetenagalistrikanResource\Widgets;

use App\Models\ProfilPeralatanKetenagalistrikan;
use Filament\Widgets\ChartWidget;

class PeralatanKategoriChart extends ChartWidget
{
    protected static ?string $heading = 'Peralatan Berdasarkan Kategori';
    protected static ?string $maxHeight = '250px';
    protected int | string | array $columnSpan = 'full';
    
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
                    'backgroundColor' => ['#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6'],
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
