<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlurSertifikasiSeeder extends Seeder
{
    public function run()
    {
        DB::table('alur_sertifikasi')->delete();
        
        DB::table('alur_sertifikasi')->insert(
[
  0 => 
  [
    'id' => 1,
    'nama_dokumen' => 'Alur Sertifikasi',
    'path_pdf' => 'uploads/alur-sertifikasi/BRViH4LzUduhfNrcOKASuv9ptYknaMHeHmGHeVoR.pdf',
    'is_active' => 1,
    'created_at' => '2026-08-10 17:55:39',
    'updated_at' => '2026-08-10 17:55:39',
  ],
]
        );
    }
}
