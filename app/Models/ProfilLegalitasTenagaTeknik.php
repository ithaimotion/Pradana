<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilLegalitasTenagaTeknik extends Model
{
    protected $table = 'profil_legalitas_tenaga_teknik';

    protected $fillable = [
        'profil_legalitas_id',
        'nama',
        'jabatan',
        'no_sertifikat',
        'bidang_kompetensi',
        'status',
        'urutan',
    ];

    public function legalitas()
    {
        return $this->belongsTo(ProfilLegalitas::class);
    }
}
