<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KontenHalamansSeeder extends Seeder
{
    public function run()
    {
        DB::table('konten_halamans')->delete();
        
        DB::table('konten_halamans')->insert(
[
  0 => 
  [
    'id' => 1,
    'halaman' => 'profil_perusahaan',
    'kunci' => 'main',
    'judul' => 'PT PRADANA NUSA ENERGI',
    'subjudul' => 'Lembaga Inspeksi Teknik (LIT] terkemuka dan terpercaya yang bergerak di bidang pengujian dan pemeriksaan kelistrikan untuk mewujudkan tenaga listrik yang aman, andal, dan ramah lingkungan.',
    'konten' => 'PT Pradana Nusa Energi berdiri sebagai Lembaga Inspeksi Teknik terakreditasi yang berkomitmen mendukung program pemerintah dalam penegakan Sertifikat Laik Operasi (SLO] di Indonesia. Dengan didukung oleh Tim Tenaga Teknik (TT] dan Penanggung Jawab Teknik (PJT] bersertifikat kompetensi resmi, kami memberikan layanan inspeksi ketenagalistrikan yang tepat waktu, presisi, independen, dan berstandar nasional.',
    'nilai' => 'Komitmen Kami Terhadap Keselamatan & Ketenagalistrikan',
    'path_gambar' => NULL,
    'path_dokumen' => NULL,
    'urutan' => 1,
    'created_at' => '2026-08-07 09:20:41',
    'updated_at' => '2026-08-07 09:20:41',
  ],
  1 => 
  [
    'id' => 2,
    'halaman' => 'profil_pjt_tt',
    'kunci' => 'main',
    'judul' => 'DAFTAR PJT & TT',
    'subjudul' => 'Daftar Penanggung Jawab Teknik (PJT] dan Tenaga Teknik (TT] terdaftar dan bersertifikasi kompetensi resmi PT Pradana Nusa Energi.',
    'konten' => 'Seluruh Tenaga Teknik PT Pradana Nusa Energi telah memiliki Sertifikat Kompetensi (Serkom] yang diterbitkan oleh Lembaga Sertifikasi Kompetensi (LSK] terakreditasi Kementerian ESDM.',
    'nilai' => NULL,
    'path_gambar' => NULL,
    'path_dokumen' => NULL,
    'urutan' => 1,
    'created_at' => '2026-08-07 09:20:41',
    'updated_at' => '2026-08-07 09:20:41',
  ],
  2 => 
  [
    'id' => 3,
    'halaman' => 'profil_struktur',
    'kunci' => 'main',
    'judul' => 'STRUKTUR ORGANISASI',
    'subjudul' => 'Susunan kepemimpinan dan manajemen PT Pradana Nusa Energi dalam menjalankan layanan inspeksi & sertifikasi ketenagalistrikan SLO.',
    'konten' => 'PT Pradana Nusa Energi dipimpin oleh jajaran Direksi dan Manajemen profesional berpengalaman di bidang ketenagalistrikan. Struktur organisasi yang solid dan independen memastikan setiap proses inspeksi berjalan objektif, akuntabel, dan sesuai dengan standar ISO/IEC 17020:2012.',
    'nilai' => NULL,
    'path_gambar' => NULL,
    'path_dokumen' => NULL,
    'urutan' => 1,
    'created_at' => '2026-08-07 09:20:41',
    'updated_at' => '2026-08-07 09:20:41',
  ],
  3 => 
  [
    'id' => 4,
    'halaman' => 'profil_legalitas',
    'kunci' => 'main',
    'judul' => 'LEGALITAS PERUSAHAAN',
    'subjudul' => 'Seluruh dokumen legalitas, perizinan, dan akreditasi resmi PT Pradana Nusa Energi sebagai Lembaga Inspeksi Teknik terakreditasi.',
    'konten' => '• NIB: 1234567890
• Akta Pendirian No. 15 Notaris Jakarta
• Keputusan Menteri Hukum dan HAM RI No. AHU-0012345.AH.01.01
• Penetapan LIT Kementerian ESDM RI
• IUJK Ketenagalistrikan Resmi',
    'nilai' => NULL,
    'path_gambar' => NULL,
    'path_dokumen' => NULL,
    'urutan' => 1,
    'created_at' => '2026-08-07 09:20:41',
    'updated_at' => '2026-08-07 09:20:41',
  ],
  4 => 
  [
    'id' => 5,
    'halaman' => 'profil_peralatan',
    'kunci' => 'main',
    'judul' => 'PERALATAN INSPEKSI',
    'subjudul' => 'Seluruh peralatan ukur dan uji yang digunakan PT Pradana Nusa Energi dalam proses inspeksi instalasi listrik dan penerbitan SLO telah terstandar dan terkalibrasi.',
    'konten' => '• Insulation Resistance Tester (Megger 5kV/10kV]
• Secondary Current Injection Test Set
• Earth Tester / Grounding Resistance Meter
• Thermal Imaging Camera / Thermography Inspection
• Digital Multimeter & Clamp Meter TR/TM',
    'nilai' => NULL,
    'path_gambar' => NULL,
    'path_dokumen' => NULL,
    'urutan' => 1,
    'created_at' => '2026-08-07 09:20:41',
    'updated_at' => '2026-08-07 09:20:41',
  ],
  5 => 
  [
    'id' => 6,
    'halaman' => 'profil_sop',
    'kunci' => 'main',
    'judul' => 'STANDAR OPERASI PROSEDUR',
    'subjudul' => 'Seluruh SOP PT Pradana Nusa Energi disusun mengacu pada SNI ISO/IEC 17020:2012 dan peraturan ketenagalistrikan yang berlaku.',
    'konten' => '• SOP-INSP-01: Prosedur Keselamatan Kerja K3 Inspeksi
• SOP-INSP-02: Pemeriksaan & Pengujian Instalasi Tegangan Rendah (TR]
• SOP-INSP-03: Pemeriksaan & Pengujian Instalasi Tegangan Menengah (TM]
• SOP-INSP-04: Penerbitan dan Verifikasi Sertifikat Laik Operasi (SLO]',
    'nilai' => NULL,
    'path_gambar' => NULL,
    'path_dokumen' => NULL,
    'urutan' => 1,
    'created_at' => '2026-08-07 09:20:41',
    'updated_at' => '2026-08-07 09:20:41',
  ],
  6 => 
  [
    'id' => 7,
    'halaman' => 'informasi-publik',
    'kunci' => 'maklumat-layanan',
    'judul' => NULL,
    'subjudul' => NULL,
    'konten' => NULL,
    'nilai' => NULL,
    'path_gambar' => 'uploads/maklumat/h5i3YQRsUU3Yz4o23M3nTgp7ajkBN2VywrIdVh7n.jpg',
    'path_dokumen' => NULL,
    'urutan' => 0,
    'created_at' => '2026-08-10 10:31:30',
    'updated_at' => '2026-08-10 10:31:30',
  ],
]
        );
    }
}
