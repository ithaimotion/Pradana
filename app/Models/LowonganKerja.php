<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class LowonganKerja extends Model
{
    protected $table = 'lowongan_kerja';
    protected $fillable = ['divisi', 'tipe', 'lokasi', 'judul', 'deskripsi', 'persyaratan', 'link_lamar', 'urutan', 'is_active'];
    protected $casts = ['is_active' => 'boolean', 'urutan' => 'integer'];

    public function scopeAktif(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('urutan')->orderBy('id');
    }

    public static function tipeOptions(): array
    {
        return [
            'Full Time' => 'Full Time',
            'Part Time' => 'Part Time',
            'Contract' => 'Contract',
            'Freelance' => 'Freelance'
        ];
    }
}
