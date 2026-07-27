<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SopItem extends Model
{
    protected $table = 'sop_items';

    protected $fillable = [
        'profil_sop_id',
        'kategori',
        'kode',
        'judul',
        'deskripsi',
        'revisi',
        'url_dokumen',
        'urutan',
        'status_aktif',
    ];

    protected $casts = [
        'status_aktif' => 'boolean',
        'urutan' => 'integer',
    ];

    public function profilSop()
    {
        return $this->belongsTo(ProfilSop::class);
    }
}
