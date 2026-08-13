<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaftarHargaSloSeeder extends Seeder
{
    public function run()
    {
        DB::table('daftar_harga_slo')->delete();
        
        DB::table('daftar_harga_slo')->insert(
[
  0 => 
  [
    'id' => 1,
    'nama_dokumen' => 'Daftar Harga SLO Juli 2026',
    'path_pdf' => 'uploads/daftar-harga-slo/FDrrWOdUGtBpsbyH1xdhltSyGIMznQmo3Ec7Q1Te.pdf',
    'is_active' => 1,
    'created_at' => '2026-08-10 17:45:37',
    'updated_at' => '2026-08-10 17:45:37',
  ],
]
        );
    }
}
