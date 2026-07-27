<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilStrukturOrganisasiItem extends Model
{
    protected $fillable = [
        'profil_struktur_organisasi_id',
        'nama',
        'jabatan',
        'divisi',
        'level',
        'urutan',
    ];

    public function struktur()
    {
        return $this->belongsTo(ProfilStrukturOrganisasi::class);
    }
}
