<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilLegalitasItem extends Model
{
    protected $fillable = [
        'profil_legalitas_id',
        'kategori',
        'nama_dokumen',
        'nomor',
        'penerbit',
        'tanggal_terbit',
        'berlaku_sampai',
        'status',
        'deskripsi',
        'file',
        'urutan',
    ];

    protected $appends = [
        'url_file',
    ];

    public function legalitas()
    {
        return $this->belongsTo(ProfilLegalitas::class);
    }

    public function getUrlFileAttribute()
    {
        return $this->file
            ? asset('storage_public/'.$this->file)
            : null;
    }
}
