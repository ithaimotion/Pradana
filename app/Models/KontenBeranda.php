<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
        'path_gambar_2',
        'path_gambar_3',
        'ikon',
        'nilai',
        'urutan',
        'status_aktif',
    ];

    public function getUrlGambarAttribute(): ?string
    {
        return $this->resolveImageUrl($this->path_gambar);
    }

    public function getUrlGambar2Attribute(): ?string
    {
        return $this->resolveImageUrl($this->path_gambar_2);
    }

    public function getUrlGambar3Attribute(): ?string
    {
        return $this->resolveImageUrl($this->path_gambar_3);
    }

    protected function resolveImageUrl(?string $path): ?string
    {
        if (blank($path)) {
            return null;
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        return Storage::disk('public')->url($path);
    }
}
