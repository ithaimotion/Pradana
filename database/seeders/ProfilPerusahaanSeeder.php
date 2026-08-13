<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilPerusahaanSeeder extends Seeder
{
    public function run()
    {
        DB::table('profil_perusahaan')->delete();
        
        DB::table('profil_perusahaan')->insert(
[
  0 => 
  [
    'id' => 1,
    'judul' => NULL,
    'subjudul' => NULL,
    'nilai' => NULL,
    'konten' => NULL,
    'url_gambar' => NULL,
    'visi' => NULL,
    'foto_visi' => 'profil-perusahaan/NzckbW8mR03kE597Z77DvQKk4QD30X80AaxuFugY.jpg',
    'misi' => NULL,
    'foto_misi' => 'profil-perusahaan/Bxlzugrk1QkMprbCXM6DuU7mqdjhw4dlHqWp68nX.jpg',
    'nilai_perusahaan' => NULL,
    'created_at' => '2026-08-10 02:59:57',
    'updated_at' => '2026-08-10 07:10:53',
  ],
]
        );
    }
}
