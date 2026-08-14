<?php
namespace App\Filament\Resources\ClientResource\Widgets;

use App\Models\Galeri;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;

class ClientBulanChart extends ChartWidget
{
    protected static ?string $heading = 'Pertumbuhan Klien (6 Bulan Terakhir)';
    protected static ?string $maxHeight = '250px';
    protected int | string | array $columnSpan = 'full';
    
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
                    'borderColor' => '#3b82f6',
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
