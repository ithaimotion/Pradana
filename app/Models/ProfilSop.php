<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilSop extends Model
{
    protected $table = 'profil_sops';

    protected $fillable = [
        'judul',
        'subjudul',
        'url_dokumen',
    ];

    public function items()
    {
        return $this->hasMany(SopItem::class)->orderBy('urutan');
    }
}
