<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersyaratanSlo extends Model
{
    protected $table = 'persyaratan_slo';
    
    protected $fillable = [
        'tr_admin',
        'tr_teknis',
        'tm_admin',
        'tm_teknis',
        'plts_admin',
        'plts_teknis',
        'genset_admin',
        'genset_teknis',
    ];
    
    protected $casts = [
        'tr_admin' => 'array',
        'tr_teknis' => 'array',
        'tm_admin' => 'array',
        'tm_teknis' => 'array',
        'plts_admin' => 'array',
        'plts_teknis' => 'array',
        'genset_admin' => 'array',
        'genset_teknis' => 'array',
    ];
}
