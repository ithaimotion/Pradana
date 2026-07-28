<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlurSertifikasi extends Model
{
    protected $table = 'alur_sertifikasi';

    protected $fillable = [
        'nama_dokumen',
        'path_pdf',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
