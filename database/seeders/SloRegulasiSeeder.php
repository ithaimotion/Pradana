<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SloRegulasiSeeder extends Seeder
{
    public function run()
    {
        DB::table('slo_regulasi')->delete();
        
        DB::table('slo_regulasi')->insert(
[
  0 => 
  [
    'id' => 1,
    'nomor' => 'Permen No. 12 Tahun 2021',
    'keterangan' => 'Peraturan Menteri ESDM Nomor 12 Tahun 2021 Tentang Klasifikasi, Kualifikasi, Akreditasi dan Sertifikasi Usaha Jasa Penunjang Tenaga Listrik',
    'tipe' => 'uu_pp',
    'url_dokumen' => 'uploads/regulasi/lZ2ruIh5GhSYZQSfR0P8Utrlhe924R095Mu3paOc.pdf',
    'urutan' => 0,
    'is_active' => 1,
    'created_at' => '2026-08-11 01:11:03',
    'updated_at' => '2026-08-11 01:11:03',
  ],
]
        );
    }
}
