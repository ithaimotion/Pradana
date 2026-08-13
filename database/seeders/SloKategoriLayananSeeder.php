<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SloKategoriLayananSeeder extends Seeder
{
    public function run()
    {
        DB::table('slo_kategori_layanan')->delete();
        
        DB::table('slo_kategori_layanan')->insert(
[
  0 => 
  [
    'id' => 1,
    'kategori_utama' => 'TM',
    'judul' => 'IPTL-TM',
    'deskripsi' => 'Inspeksi Instalasi Pemanfaatan Tenaga Listrik Tegangan Menengah',
    'ikon' => '',
    'tags' => '[]',
    'urutan' => 1,
    'is_active' => 1,
    'created_at' => '2026-08-11 01:24:26',
    'updated_at' => '2026-08-11 01:24:26',
  ],
  1 => 
  [
    'id' => 2,
    'kategori_utama' => 'PEMBANGKIT',
    'judul' => 'PLTD',
    'deskripsi' => 'Inspeksi Instalasi Pembangkit Listrik Tegangan Diesel',
    'ikon' => '',
    'tags' => '[]',
    'urutan' => 2,
    'is_active' => 1,
    'created_at' => '2026-08-11 01:24:26',
    'updated_at' => '2026-08-11 01:24:26',
  ],
  2 => 
  [
    'id' => 3,
    'kategori_utama' => 'TM',
    'judul' => 'DISTRIBUSI TM',
    'deskripsi' => 'Inspeksi Instalasi Distribusi Listrik Tegangan Menengah',
    'ikon' => '',
    'tags' => '[]',
    'urutan' => 3,
    'is_active' => 1,
    'created_at' => '2026-08-11 01:24:26',
    'updated_at' => '2026-08-11 01:24:26',
  ],
  3 => 
  [
    'id' => 4,
    'kategori_utama' => 'PEMBANGKIT',
    'judul' => 'PLTS',
    'deskripsi' => 'Inspeksi Pembangkit Listrik Tenaga Surya',
    'ikon' => '',
    'tags' => '[]',
    'urutan' => 4,
    'is_active' => 1,
    'created_at' => '2026-08-11 01:24:26',
    'updated_at' => '2026-08-11 01:24:26',
  ],
  4 => 
  [
    'id' => 5,
    'kategori_utama' => 'TM',
    'judul' => 'Pengujian Panel Cubicle',
    'deskripsi' => 'Pengujian Panel Hubung Bagi Tegangan Menengah',
    'ikon' => '',
    'tags' => '[]',
    'urutan' => 5,
    'is_active' => 1,
    'created_at' => '2026-08-11 01:24:26',
    'updated_at' => '2026-08-11 01:24:26',
  ],
  5 => 
  [
    'id' => 6,
    'kategori_utama' => 'TM',
    'judul' => 'Pengujian Trafo',
    'deskripsi' => 'Pengujian Peralatan Transformator Distribusi',
    'ikon' => '',
    'tags' => '[]',
    'urutan' => 6,
    'is_active' => 1,
    'created_at' => '2026-08-11 01:24:26',
    'updated_at' => '2026-08-11 01:24:26',
  ],
  6 => 
  [
    'id' => 7,
    'kategori_utama' => 'TM',
    'judul' => 'Kabel TM',
    'deskripsi' => 'Pengujian Kabel Tegangan Menengah',
    'ikon' => '',
    'tags' => '[]',
    'urutan' => 7,
    'is_active' => 1,
    'created_at' => '2026-08-11 01:24:26',
    'updated_at' => '2026-08-11 01:24:26',
  ],
]
        );
    }
}
