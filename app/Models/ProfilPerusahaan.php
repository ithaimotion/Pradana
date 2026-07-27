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
        'misi',
        'nilai_perusahaan',
    ];

    protected $casts = [
        'nilai_perusahaan' => 'array',
    ];
}
