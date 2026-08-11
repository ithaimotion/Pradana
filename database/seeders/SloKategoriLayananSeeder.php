<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SloKategoriLayanan;

class SloKategoriLayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_utama' => 'TM',
                'judul' => 'IPTL-TM',
                'deskripsi' => 'Inspeksi Instalasi Pemanfaatan Tenaga Listrik Tegangan Menengah',
                'ikon' => '',
                'tags' => [],
                'urutan' => 1,
                'is_active' => true,
            ],
            [
                'kategori_utama' => 'PEMBANGKIT',
                'judul' => 'PLTD',
                'deskripsi' => 'Inspeksi Instalasi Pembangkit Listrik Tegangan Diesel',
                'ikon' => '',
                'tags' => [],
                'urutan' => 2,
                'is_active' => true,
            ],
            [
                'kategori_utama' => 'TM',
                'judul' => 'DISTRIBUSI TM',
                'deskripsi' => 'Inspeksi Instalasi Distribusi Listrik Tegangan Menengah',
                'ikon' => '',
                'tags' => [],
                'urutan' => 3,
                'is_active' => true,
            ],
            [
                'kategori_utama' => 'PEMBANGKIT',
                'judul' => 'PLTS',
                'deskripsi' => 'Inspeksi Pembangkit Listrik Tenaga Surya',
                'ikon' => '',
                'tags' => [],
                'urutan' => 4,
                'is_active' => true,
            ],
            [
                'kategori_utama' => 'TM',
                'judul' => 'Pengujian Panel Cubicle',
                'deskripsi' => 'Pengujian Panel Hubung Bagi Tegangan Menengah',
                'ikon' => '',
                'tags' => [],
                'urutan' => 5,
                'is_active' => true,
            ],
            [
                'kategori_utama' => 'TM',
                'judul' => 'Pengujian Trafo',
                'deskripsi' => 'Pengujian Peralatan Transformator Distribusi',
                'ikon' => '',
                'tags' => [],
                'urutan' => 6,
                'is_active' => true,
            ],
            [
                'kategori_utama' => 'TM',
                'judul' => 'Kabel TM',
                'deskripsi' => 'Pengujian Kabel Tegangan Menengah',
                'ikon' => '',
                'tags' => [],
                'urutan' => 7,
                'is_active' => true,
            ],
        ];

        foreach ($data as $item) {
            SloKategoriLayanan::updateOrCreate(
                ['judul' => $item['judul']],
                $item
            );
        }
    }
}
