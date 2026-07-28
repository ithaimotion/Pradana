<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KontenBeranda extends Model
{
    protected $table = 'konten_beranda';

    protected $fillable = [
        'bagian',
        'kunci',
        'judul',
        'subjudul',
        'konten',
        'path_gambar',
        'ikon',
        'nilai',
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

        return asset('public/storage/'  $this->path_gambar);
    }
}
