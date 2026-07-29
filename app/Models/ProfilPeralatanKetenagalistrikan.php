<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilPeralatanKetenagalistrikan extends Model
{
    protected $table = 'profil_peralatan_ketenagalistrikans';

    protected $fillable = [
        'nama',
        'kategori',
        'gambar',
        'deskripsi_singkat',
        'jenis_alat',
        'model',
        'spesifikasi',
        'status_kalibrasi',
        'tanggal_kalibrasi',
        'urutan',
        'status_aktif',
    ];

    protected $casts = [
        'spesifikasi' => 'array',
        'tanggal_kalibrasi' => 'date',
        'urutan' => 'integer',
        'status_aktif' => 'boolean',
    ];

    public function getUrlGambarAttribute()
    {
        if (!$this->gambar) {
            return null;
        }

        if (str_starts_with($this->gambar, 'http://') || str_starts_with($this->gambar, 'https://')) {
            return $this->gambar;
        }

        return asset('/storage_public/' . $this->gambar);
    }
}
