<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class SloKategoriLayanan extends Model
{
    protected $table = 'slo_kategori_layanan';
    protected $fillable = ['kategori_utama', 'judul', 'deskripsi', 'ikon', 'tags', 'urutan', 'is_active'];
    protected $casts = ['is_active' => 'boolean', 'urutan' => 'integer', 'tags' => 'array'];

    public function scopeAktif(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('urutan')->orderBy('id');
    }

    public function scopeByKategori(Builder $query, string $kategori): Builder
    {
        return $query->where('kategori_utama', $kategori);
    }

    public static function kategoriOptions(): array
    {
        return [
            'TR' => 'Tegangan Rendah (TR)',
            'TM' => 'Tegangan Menengah (TM)',
            'PEMBANGKIT' => 'Pembangkit Listrik'
        ];
    }

    public function getKategoriLabelAttribute(): string
    {
        return self::kategoriOptions()[$this->kategori_utama] ?? $this->kategori_utama;
    }
}
