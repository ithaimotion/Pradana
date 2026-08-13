<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProsedurSloSeeder extends Seeder
{
    public function run()
    {
        DB::table('prosedur_slo')->delete();
        
        DB::table('prosedur_slo')->insert(
[
  0 => 
  [
    'id' => 1,
    'nama_dokumen' => 'Prosedur SLO Juli 2026',
    'path_pdf' => 'uploads/prosedur-slo/tOMJRoXsZ2ASE3yPXbRARqvkjFQprrTNWmBIwTgi.pdf',
    'is_active' => 1,
    'timeline_steps' => '[]',
    'accordion_content' => '[]',
    'processing_time' => '[]',
    'required_documents' => '[]',
    'faq_content' => '[]',
    'created_at' => '2026-08-10 17:50:02',
    'updated_at' => '2026-08-10 17:50:02',
  ],
]
        );
    }
}
