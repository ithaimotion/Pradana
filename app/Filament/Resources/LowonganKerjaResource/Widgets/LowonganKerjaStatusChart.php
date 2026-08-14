<?php
namespace App\Filament\Resources\LowonganKerjaResource\Widgets;

use App\Models\LowonganKerja;
use Filament\Widgets\ChartWidget;

class LowonganKerjaStatusChart extends ChartWidget
{
    protected static ?string $heading = 'Status Lowongan Kerja';
    protected static ?string $maxHeight = '250px';
    protected int | string | array $columnSpan = 'full';
    
    protected function getData(): array
    {
        $active = LowonganKerja::where('is_active', true)->count();
        $inactive = LowonganKerja::where('is_active', false)->count();
            
        return [
            'datasets' => [
                [
                    'label' => 'Jumlah',
                    'data' => [$active, $inactive],
                    'backgroundColor' => ['#10b981', '#ef4444'],
                ],
            ],
            'labels' => ['Aktif', 'Non-Aktif'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
