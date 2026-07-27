<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilDaftarPJTTTItem extends Model
{
    protected $fillable = [
        'profil_daftar_p_j_t_t_t_id',
        'kategori',
        'nama',
        'jabatan',
        'no_sertifikat',
        'no_register',
        'urutan',
    ];

    public function halaman()
    {
        return $this->belongsTo(ProfilDaftarPJTTT::class);
    }
}