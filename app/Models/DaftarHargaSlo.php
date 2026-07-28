<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarHargaSlo extends Model
{
    protected $table = 'daftar_harga_slo';
    
    protected $fillable = [
        'nama_dokumen',
        'path_pdf',
        'is_active',
    ];
    
    protected $casts = [
        'is_active' => 'boolean',
    ];
}
