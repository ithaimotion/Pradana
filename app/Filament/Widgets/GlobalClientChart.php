<?php
namespace App\Filament\Widgets;

use App\Models\Galeri;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;

class GlobalClientChart extends ChartWidget
{
    protected static ?string $heading = 'Pertumbuhan Klien Baru (6 Bulan Terakhir)';
    protected static ?int $sort = 3;
    
    protected function getData(): array
    {
        $data = Galeri::where('kategori', 'client')
            ->where('created_at', '>=', now()->subMonths(6))
            ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get();
            
        return [
            'datasets' => [
                [
                    'label' => 'Klien Baru',
                    'data' => $data->pluck('count')->toArray(),
                    'borderColor' => '#10b981',
                    'fill' => 'start',
                ],
            ],
            'labels' => $data->pluck('month')->map(fn($m) => Carbon::createFromFormat('Y-m', $m)->format('M Y'))->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
