<?php

namespace App\Imports;

use App\Models\ProfilLegalitas;
use App\Models\ProfilLegalitasItem;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Carbon\Carbon;

class ProfilLegalitasItemImport implements
    ToModel,
    WithHeadingRow,
    WithValidation,
    SkipsOnError,
    WithBatchInserts,
    WithChunkReading
{
    use SkipsErrors;

    protected int $profilLegalitasId;

    public function __construct()
    {
        $this->profilLegalitasId = ProfilLegalitas::firstOrCreate(
            [],
            ['judul' => 'Legalitas Perusahaan']
        )->id;
    }

    public function model(array $row): ProfilLegalitasItem
    {
        $tglTerbit = null;
        if (!empty($row['tanggal_terbit'])) {
            $tglTerbit = is_numeric($row['tanggal_terbit']) 
                ? Date::excelToDateTimeObject($row['tanggal_terbit']) 
                : Carbon::parse($row['tanggal_terbit']);
        }

        $berlakuSampai = null;
        if (!empty($row['berlaku_sampai'])) {
            $berlakuSampai = is_numeric($row['berlaku_sampai']) 
                ? Date::excelToDateTimeObject($row['berlaku_sampai']) 
                : Carbon::parse($row['berlaku_sampai']);
        }

        return new ProfilLegalitasItem([
            'profil_legalitas_id' => $this->profilLegalitasId,
            'kategori'            => trim($row['kategori'] ?? 'Umum'),
            'nama_dokumen'        => trim($row['jenis_perizinan_nama_dokumen'] ?? $row['jenis_perizinan'] ?? $row['nama_dokumen'] ?? ''),
            'bidang'              => trim($row['bidang'] ?? ''),
            'sub_bidang'          => trim($row['sub_bidang'] ?? ''),
            'nomor'               => trim($row['nomor_no_sertifikat'] ?? $row['no_sertifikat'] ?? $row['nomor'] ?? ''),
            'no_sertifikat'       => trim($row['nomor_no_sertifikat'] ?? $row['no_sertifikat'] ?? $row['nomor'] ?? ''),
            'no_registrasi'       => trim($row['no_registrasi'] ?? ''),
            'penerbit'            => trim($row['penerbit'] ?? ''),
            'tanggal_terbit'      => $tglTerbit,
            'berlaku_sampai'      => $berlakuSampai,
            'status'              => ucfirst(strtolower(trim($row['status'] ?? $row['status_aktiftidak_aktif'] ?? 'Aktif'))),
            'deskripsi'           => trim($row['deskripsi'] ?? ''),
            'urutan'              => intval($row['urutan'] ?? 0),
        ]);
    }

    public function rules(): array
    {
        return [
            // rules bisa disesuaikan
            '*.kategori' => ['nullable', 'string'],
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
