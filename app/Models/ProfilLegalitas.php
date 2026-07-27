<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilLegalitas extends Model
{
    protected $fillable = [
        'judul',
        'subjudul',
        'dokumen',
        'konten',
    ];

    protected $appends = [
        'url_dokumen',
    ];

    public function items()
    {
        return $this->hasMany(ProfilLegalitasItem::class)
            ->orderBy('kategori')
            ->orderBy('urutan');
    }

    public function tenagaTeknik()
    {
        return $this->hasMany(ProfilLegalitasTenagaTeknik::class)
            ->orderBy('urutan');
    }

    public function getUrlDokumenAttribute()
    {
        return $this->dokumen
            ? asset('storage/'.$this->dokumen)
            : null;
    }
}
