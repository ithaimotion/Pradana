<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LegalSetting extends Model
{
    protected $table = 'legal_settings';
    
    protected $fillable = [
        'kebijakan_privasi_judul',
        'kebijakan_privasi_konten',
        'syarat_ketentuan_judul',
        'syarat_ketentuan_konten',
        'kebijakan_cookie_judul',
        'kebijakan_cookie_konten',
        'social_media_links',
    ];

    protected $casts = [
        'social_media_links' => 'array',
    ];
}
