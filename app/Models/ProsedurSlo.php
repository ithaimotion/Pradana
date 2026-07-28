<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProsedurSlo extends Model
{
    protected $table = 'prosedur_slo';
    
    protected $fillable = [
        'nama_dokumen',
        'path_pdf',
        'is_active',
        'timeline_steps',
        'accordion_content',
        'processing_time',
        'required_documents',
        'faq_content',
    ];
    
    protected $casts = [
        'is_active' => 'boolean',
        'timeline_steps' => 'array',
        'accordion_content' => 'array',
        'processing_time' => 'array',
        'required_documents' => 'array',
        'faq_content' => 'array',
    ];
}
