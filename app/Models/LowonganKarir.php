<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LowonganKarir extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'divisi',
        'tipe',
        'lokasi',
        'deskripsi',
        'persyaratan',
        'link_lamar',
        'status',
        'urutan',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
