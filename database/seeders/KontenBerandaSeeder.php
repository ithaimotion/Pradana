<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KontenBeranda;

class KontenBerandaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // 1. Hero
            ['bagian' => 'hero', 'kunci' => 'hero_main', 'judul' => 'Sinergi Cerdas untuk Energi Masa Depan', 'subjudul' => 'Kami hadir sebagai mitra strategis dalam memberikan solusi teknologi terintegrasi, andal, dan berkelanjutan.', 'konten' => null, 'urutan' => 1],

            // 2. Profil
            ['bagian' => 'profil_pradana', 'kunci' => 'profil_main', 'judul' => 'Solusi Energi Terpercaya', 'subjudul' => 'Kami adalah perusahaan bla bla.', 'konten' => 'Berfokus pada efisiensi.', 'urutan' => 1],

            // 3. Statistik
            ['bagian' => 'statistik', 'judul' => 'Pengalaman', 'nilai' => '10+', 'urutan' => 1],
            ['bagian' => 'statistik', 'judul' => 'Proyek Selesai', 'nilai' => '200+', 'urutan' => 2],

            // 4. Tentang
            ['bagian' => 'tentang_pradana', 'kunci' => 'tentang_main', 'judul' => 'Tentang Kami', 'subjudul' => 'Visi misi kami.', 'konten' => 'Membangun negeri.', 'nilai' => 'Hubungi Kami', 'urutan' => 1],

            // 5. Teknologi Header & Items
            ['bagian' => 'teknologi_header', 'kunci' => 'header', 'judul' => 'Teknologi Terintegrasi', 'konten' => 'Solusi masa kini.', 'urutan' => 1],
            ['bagian' => 'teknologi_item', 'judul' => 'Smart Grid', 'konten' => 'Jaringan cerdas.', 'ikon' => 'cpu', 'urutan' => 1],
            ['bagian' => 'teknologi_item', 'judul' => 'IoT', 'konten' => 'Internet of Things.', 'ikon' => 'wifi', 'urutan' => 2],

            // 6. Keunggulan Header & Items
            ['bagian' => 'keunggulan_header', 'kunci' => 'header', 'judul' => 'Keunggulan Kami', 'konten' => 'Mengapa kami terbaik.', 'urutan' => 1],
            ['bagian' => 'keunggulan_item', 'judul' => 'Profesional', 'konten' => 'Tim ahli.', 'ikon' => 'shield', 'urutan' => 1],

            // 7. Energi Header & Items
            ['bagian' => 'energi_header', 'kunci' => 'header', 'judul' => 'Energi Berkelanjutan', 'konten' => 'Ramah lingkungan.', 'urutan' => 1],
            ['bagian' => 'energi_item', 'judul' => 'Tenaga Surya', 'konten' => 'Solar panel.', 'ikon' => 'sun', 'urutan' => 1],

            // 8. Mengapa Header & Items
            ['bagian' => 'mengapa_header', 'kunci' => 'header', 'judul' => 'Mengapa Memilih Kami?', 'urutan' => 1],
            ['bagian' => 'mengapa_item', 'judul' => 'Kualitas Terjamin', 'konten' => 'ISO certified.', 'ikon' => 'check', 'urutan' => 1],

            // 9. Kontak
            ['bagian' => 'kontak_kami', 'kunci' => 'kontak_main', 'judul' => 'Siap Bekerjasama?', 'subjudul' => 'Hubungi kami sekarang.', 'konten' => 'Kirim Pesan', 'urutan' => 1],
        ];

        foreach ($data as $item) {
            KontenBeranda::create($item);
        }
    }
}
