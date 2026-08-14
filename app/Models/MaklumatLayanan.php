<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaklumatLayanan extends Model
{
    protected $fillable = ['path_gambar'];

    public function getUrlGambarAttribute()
    {
        if ($this->path_gambar) {
            if (str_starts_with($this->path_gambar, 'http')) {
                return $this->path_gambar;
            }
            return asset('storage_public/' . ltrim($this->path_gambar, '/'));
        }
        return null;
    }
}
