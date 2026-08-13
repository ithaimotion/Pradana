<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UjiPetikSeeder extends Seeder
{
    public function run()
    {
        DB::table('uji_petik')->delete();
        
        DB::table('uji_petik')->insert(
[
  0 => 
  [
    'id' => 1,
    'path_gambar' => 'uploads/uji-petik/xE84SEPEJbxVJuNqOOTzf9MnQRfhOb1wZzDFqk8f.png',
    'created_at' => '2026-08-10 10:50:01',
    'updated_at' => '2026-08-10 10:50:01',
  ],
]
        );
    }
}
