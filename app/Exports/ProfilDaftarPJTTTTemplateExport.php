<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class ProfilDaftarPJTTTTemplateExport implements
    FromArray,
    WithHeadings,
    WithStyles,
    ShouldAutoSize,
    WithTitle
{
    public function array(): array
    {
        // Contoh baris panduan
        return [
            [
                'Instalasi Pemanfaatan Tenaga Listrik Tegangan Menengah',
                'Nama Lengkap',
                'PJT',
                '1238.P.11.M035.05.2026',
                '34607.1.2026',
                1,
            ],
            [
                'Instalasi Pemanfaatan Tenaga Listrik Tegangan Menengah',
                'Nama Lengkap 2',
                'TT',
                '2511.P.11.M033.07.2025',
                '48658.1.2025',
                2,
            ],
        ];
    }

    public function headings(): array
    {
        return [
            'Kategori',
            'Nama',
            'Jabatan (PJT/TT)',
            'No Sertifikat',
            'No Register',
            'Urutan',
        ];
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1 => [
                'font'      => ['bold' => true, 'color' => ['rgb' => 'FFFFFF'], 'size' => 11],
                'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '155DFC']],
                'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
            ],
            2 => [
                'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'E8F4FD']],
            ],
            3 => [
                'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'E8F4FD']],
            ],
        ];
    }

    public function title(): string
    {
        return 'Template Import PJT & TT';
    }
}
