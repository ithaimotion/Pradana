<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersyaratanSlo extends Model
{
    protected $table = 'persyaratan_slo';
    
    protected $fillable = [
        'distribusi_admin',
        'distribusi_teknis',
        'iptl_tm_admin',
        'iptl_tm_teknis',
        'plts_admin',
        'plts_teknis',
        'pltd_admin',
        'pltd_teknis',
    ];
    
    protected $casts = [
        'distribusi_admin' => 'array',
        'distribusi_teknis' => 'array',
        'iptl_tm_admin' => 'array',
        'iptl_tm_teknis' => 'array',
        'plts_admin' => 'array',
        'plts_teknis' => 'array',
        'pltd_admin' => 'array',
        'pltd_teknis' => 'array',
    ];
}
