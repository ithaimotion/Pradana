<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeluhanBandingSettingsSeeder extends Seeder
{
    public function run()
    {
        DB::table('keluhan_banding_settings')->delete();
        
        DB::table('keluhan_banding_settings')->insert(
[
  0 => 
  [
    'id' => 1,
    'path_gambar' => 'uploads/keluhan-banding/dWpwfOwdLkXsiiL8jNiAvDM73kz6gPMgOF6GVHwf.jpg',
    'created_at' => '2026-08-10 10:53:12',
    'updated_at' => '2026-08-10 10:53:12',
  ],
]
        );
    }
}
