<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformasiKontakSetting extends Model
{
    protected $table = 'informasi_kontak_settings';

    protected $fillable = [
        'deskripsi_utama',
        'alamat_kantor',
        'telepon_whatsapp',
        'email_resmi',
        'jam_operasional',
        'embed_maps',
    ];
}
