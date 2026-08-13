<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersyaratanSloSeeder extends Seeder
{
    public function run()
    {
        DB::table('persyaratan_slo')->delete();
        
        DB::table('persyaratan_slo')->insert(
[
  0 => 
  [
    'id' => 1,
    'tr_admin' => '[]',
    'tr_teknis' => '[]',
    'tm_admin' => '[]',
    'tm_teknis' => '[]',
    'plts_admin' => '[]',
    'plts_teknis' => '[]',
    'genset_admin' => '[]',
    'genset_teknis' => '[]',
    'iptl_tm' => '["KTP Pemilik atau Penanggung Jawab Perusahaan", "NIB Perusahaan/ Surat Izin Usaha/ Surat Izin Operasional", "NPWP Perusahaan", "No. Handphone Penanggung Jawab Perusahaan", "No. Telepon Perusahaan", "Email Penanggung Jawab Perusahaan", "Nomor Identitas Data Instalasi (NIDI]", "Siteplan atau Layout Tata Letak Instalasi Listrik di Power House/Gardu Listrik Konsumen", "Single Line Diagram", "Factory Test Report PHB TM", "Factory Test Report Transformator", "Factory Test Report PHB TR", "Factory Test Report Saluran TM jika lebih dari 100 meter", "SPJBTL/SIP/Rekening Listrik 3 bulan terakhir", "Hasil Setting Relay Proteksi Pada PHB TM (bila terdapat Relay Control]"]',
    'created_at' => '2026-08-10 17:26:06',
    'updated_at' => '2026-08-10 17:26:06',
  ],
]
        );
    }
}
