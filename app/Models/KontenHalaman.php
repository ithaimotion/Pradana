<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontenHalaman extends Model
{
    use HasFactory;

    protected $table = 'konten_halamans';

    protected $fillable = [
        'halaman',
        'kunci',
        'judul',
        'subjudul',
        'konten',
        'nilai',
        'path_gambar',
        'path_dokumen',
        'urutan',
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

    public function getUrlDokumenAttribute()
    {
        if (!$this->path_dokumen) {
            return null;
        }
        if (str_starts_with($this->path_dokumen, 'http://') || str_starts_with($this->path_dokumen, 'https://')) {
            return $this->path_dokumen;
        }
        return asset('storage_public/' . ltrim($this->path_dokumen, '/'));
    }
}
