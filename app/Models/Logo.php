<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    protected $fillable = [
        'nama',
        'url_gambar',
        'logo_url',
        'urutan',
        'aktif',
    ];
}
