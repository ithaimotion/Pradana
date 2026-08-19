<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilPerusahaan extends Model
{
    protected $table = 'profil_perusahaan';

    protected $fillable = [
        'judul',
        'subjudul',
        'nilai',
        'konten',
        'url_gambar',
        'visi',
        'foto_visi',
        'misi',
        'foto_misi',
        'nilai_perusahaan',
    ];

    protected $casts = [
        'nilai_perusahaan' => 'array',
        'misi' => 'array',
    ];

    public function getUrlGambarAttribute($value)
    {
        if (!$value) {
            return null;
        }

        if (str_starts_with($value, 'http://') || str_starts_with($value, 'https://')) {
            return $value;
        }

        return asset('storage_public/' . ltrim($value, '/'));
    }
}
