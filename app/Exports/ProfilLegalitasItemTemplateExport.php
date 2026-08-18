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

class ProfilLegalitasItemTemplateExport implements
    FromArray,
    WithHeadings,
    WithStyles,
    ShouldAutoSize,
    WithTitle
{
    public function array(): array
    {
        return [
            [
                'Sertifikat Badan Usaha (SBU)',
                'Sertifikat Badan Usaha (SBU)',
                'Pembangkitan Tenaga Listrik',
                'Pembangkit Listrik Tenaga Diesel',
                'J28.P.1.318.B.1C.3275.F26',
                '1928.08.F26',
                'LPJK',
                '15/06/2026',
                '15/06/2031',
                'Aktif',
                '',
                1,
            ],
            [
                'Sertifikat Badan Usaha (SBU)',
                'Sertifikat Badan Usaha (SBU)',
                'Instalasi Pemanfaatan Tenaga Listrik',
                'Instalasi Pemanfaatan Tenaga Listrik Tegangan Menengah',
                'J31.P.1.315.B.1C.3275.F26',
                '1931.08.F26',
                'LPJK',
                '15/06/2026',
                '15/06/2031',
                'Aktif',
                '',
                2,
            ],
        ];
    }

    public function headings(): array
    {
        return [
            'Kategori',
            'Jenis Perizinan (Nama Dokumen)',
            'Bidang',
            'Sub Bidang',
            'Nomor / No Sertifikat',
            'No Registrasi',
            'Penerbit',
            'Tanggal Terbit (dd/mm/yyyy)',
            'Berlaku Sampai (dd/mm/yyyy)',
            'Status (Aktif/Tidak Aktif)',
            'Deskripsi',
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
            2 => ['fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'EFF6FF']]],
            3 => ['fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'EFF6FF']]],
        ];
    }

    public function title(): string
    {
        return 'Template Import Legalitas';
    }
}
