<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilDaftarPJTTT extends Model
{
    protected $fillable = [
        'judul',
        'subjudul',
        'konten',
        'dokumen',
    ];

    protected $appends = [
        'url_dokumen'
    ];

    public function items()
    {
        return $this->hasMany(ProfilDaftarPJTTTItem::class)
            ->orderBy('kategori')
            ->orderBy('urutan');
    }

    public function getUrlDokumenAttribute()
    {
        if (!$this->dokumen) {
            return null;
        }

        return asset('storage/' . ltrim($this->dokumen, '/'));
    }
}
