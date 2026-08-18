<?php

namespace App\Exports;

use App\Models\ProfilLegalitasItem;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class ProfilLegalitasItemExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    WithStyles,
    ShouldAutoSize,
    WithTitle
{
    public function collection()
    {
        return ProfilLegalitasItem::orderBy('kategori')->orderBy('urutan')->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Kategori',
            'Jenis Perizinan (Nama Dokumen)',
            'Bidang',
            'Sub Bidang',
            'Nomor / No Sertifikat',
            'No Registrasi',
            'Penerbit',
            'Tanggal Terbit',
            'Berlaku Sampai',
            'Status',
            'Deskripsi',
            'Urutan',
        ];
    }

    public function map($item): array
    {
        static $no = 0;
        $no++;

        return [
            $no,
            $item->kategori,
            $item->nama_dokumen,
            $item->bidang,
            $item->sub_bidang,
            $item->nomor ?? $item->no_sertifikat,
            $item->no_registrasi,
            $item->penerbit,
            $item->tanggal_terbit ? \Carbon\Carbon::parse($item->tanggal_terbit)->format('d/m/Y') : '',
            $item->berlaku_sampai ? \Carbon\Carbon::parse($item->berlaku_sampai)->format('d/m/Y') : '',
            $item->status,
            $item->deskripsi,
            $item->urutan,
        ];
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1 => [
                'font'      => ['bold' => true, 'color' => ['rgb' => 'FFFFFF'], 'size' => 11],
                'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '1E3A5F']],
                'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
            ],
        ];
    }

    public function title(): string
    {
        return 'Legalitas Perusahaan';
    }
}
