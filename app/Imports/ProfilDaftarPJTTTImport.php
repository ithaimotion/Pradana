<?php

namespace App\Imports;

use App\Models\ProfilDaftarPJTTT;
use App\Models\ProfilDaftarPJTTTItem;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ProfilDaftarPJTTTImport implements
    ToModel,
    WithHeadingRow,
    WithValidation,
    SkipsOnError,
    WithBatchInserts,
    WithChunkReading
{
    use SkipsErrors;

    protected int $halamanId;

    public function __construct()
    {
        $this->halamanId = ProfilDaftarPJTTT::firstOrCreate(
            [],
            ['judul' => 'Daftar PJT & TT']
        )->id;
    }

    public function model(array $row): ProfilDaftarPJTTTItem
    {
        return new ProfilDaftarPJTTTItem([
            'profil_daftar_p_j_t_t_t_id' => $this->halamanId,
            'kategori'                    => trim($row['kategori'] ?? ''),
            'nama'                        => trim($row['nama'] ?? ''),
            'jabatan'                     => strtoupper(trim($row['jabatan_pjt_tt'] ?? $row['jabatan'] ?? '')),
            'no_sertifikat'               => trim($row['no_sertifikat'] ?? ''),
            'no_register'                 => trim($row['no_register'] ?? ''),
            'urutan'                      => intval($row['urutan'] ?? 0),
        ]);
    }

    public function rules(): array
    {
        return [
            'kategori'     => ['required', 'string'],
            'nama'         => ['required', 'string'],
            '*.jabatan_pjt_tt' => ['nullable', 'in:PJT,TT,pjt,tt'],
            '*.jabatan'    => ['nullable', 'in:PJT,TT,pjt,tt'],
            'no_sertifikat' => ['required', 'string'],
            'no_register'   => ['required', 'string'],
        ];
    }

    public function batchSize(): int
    {
        return 100;
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
