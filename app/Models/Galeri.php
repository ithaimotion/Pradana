<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';

    protected $fillable = [
        'kategori',
        'badge_kategori',
        'judul',
        'lokasi_tahun',
        'path_gambar',
        'urutan',
        'status_aktif',
    ];

    public function getUrlGambarAttribute()
    {
        if (!$this->path_gambar) {
            return null;
        }

        if (str_starts_with($this->path_gambar, 'http://') || str_starts_with($this->path_gambar, 'https://')) {
            return $this->path_gambar;
        }

        return asset('storage_public/' . ltrim($this->path_gambar, '/'));
    }
}
