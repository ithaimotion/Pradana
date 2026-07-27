<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class SloRegulasi extends Model
{
    protected $table = 'slo_regulasi';

    protected $fillable = [
        'nomor',
        'keterangan',
        'tipe',
        'url_dokumen',
        'urutan',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'urutan'    => 'integer',
    ];

    /**
     * Scope: only active records, ordered by urutan.
     */
    public function scopeAktif(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('urutan')->orderBy('id');
    }

    /**
     * Tipe options for forms and display.
     */
    public static function tipeOptions(): array
    {
        return [
            'uu_pp'       => 'Undang-Undang & Peraturan Pemerintah',
            'permen_esdm' => 'Peraturan Menteri ESDM',
            'sni'         => 'Standar Nasional Indonesia (SNI)',
        ];
    }

    /**
     * Human-readable label for current tipe.
     */
    public function getTipeLabelAttribute(): string
    {
        return self::tipeOptions()[$this->tipe] ?? $this->tipe;
    }
}
