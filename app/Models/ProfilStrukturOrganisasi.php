<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilStrukturOrganisasi extends Model
{
    protected $fillable = [
        'judul',
        'subjudul',
        'konten',
        'gambar',
    ];

    protected $appends = [
        'url_gambar',
    ];

    public function items()
    {
        return $this->hasMany(ProfilStrukturOrganisasiItem::class)
            ->orderBy('level')
            ->orderBy('urutan');
    }

    public function getUrlGambarAttribute()
    {
        return $this->gambar
            ? asset('storage_public/'.$this->gambar)
            : null;
    }
}
