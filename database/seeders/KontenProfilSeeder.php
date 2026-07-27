<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KontenHalaman;

class KontenProfilSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'halaman' => 'profil_perusahaan',
                'kunci' => 'main',
                'judul' => 'PT PRADANA NUSA ENERGI',
                'subjudul' => 'Lembaga Inspeksi Teknik (LIT) terkemuka dan terpercaya yang bergerak di bidang pengujian dan pemeriksaan kelistrikan untuk mewujudkan tenaga listrik yang aman, andal, dan ramah lingkungan.',
                'nilai' => 'Komitmen Kami Terhadap Keselamatan & Ketenagalistrikan',
                'konten' => 'PT Pradana Nusa Energi berdiri sebagai Lembaga Inspeksi Teknik terakreditasi yang berkomitmen mendukung program pemerintah dalam penegakan Sertifikat Laik Operasi (SLO) di Indonesia. Dengan didukung oleh Tim Tenaga Teknik (TT) dan Penanggung Jawab Teknik (PJT) bersertifikat kompetensi resmi, kami memberikan layanan inspeksi ketenagalistrikan yang tepat waktu, presisi, independen, dan berstandar nasional.',
                'urutan' => 1,
            ],
            [
                'halaman' => 'profil_pjt_tt',
                'kunci' => 'main',
                'judul' => 'DAFTAR PJT & TT',
                'subjudul' => 'Daftar Penanggung Jawab Teknik (PJT) dan Tenaga Teknik (TT) terdaftar dan bersertifikasi kompetensi resmi PT Pradana Nusa Energi.',
                'konten' => 'Seluruh Tenaga Teknik PT Pradana Nusa Energi telah memiliki Sertifikat Kompetensi (Serkom) yang diterbitkan oleh Lembaga Sertifikasi Kompetensi (LSK) terakreditasi Kementerian ESDM.',
                'urutan' => 1,
            ],
            [
                'halaman' => 'profil_struktur',
                'kunci' => 'main',
                'judul' => 'STRUKTUR ORGANISASI',
                'subjudul' => 'Susunan kepemimpinan dan manajemen PT Pradana Nusa Energi dalam menjalankan layanan inspeksi & sertifikasi ketenagalistrikan SLO.',
                'konten' => 'PT Pradana Nusa Energi dipimpin oleh jajaran Direksi dan Manajemen profesional berpengalaman di bidang ketenagalistrikan. Struktur organisasi yang solid dan independen memastikan setiap proses inspeksi berjalan objektif, akuntabel, dan sesuai dengan standar ISO/IEC 17020:2012.',
                'urutan' => 1,
            ],
            [
                'halaman' => 'profil_legalitas',
                'kunci' => 'main',
                'judul' => 'LEGALITAS PERUSAHAAN',
                'subjudul' => 'Seluruh dokumen legalitas, perizinan, dan akreditasi resmi PT Pradana Nusa Energi sebagai Lembaga Inspeksi Teknik terakreditasi.',
                'konten' => "• NIB: 1234567890\n• Akta Pendirian No. 15 Notaris Jakarta\n• Keputusan Menteri Hukum dan HAM RI No. AHU-0012345.AH.01.01\n• Penetapan LIT Kementerian ESDM RI\n• IUJK Ketenagalistrikan Resmi",
                'urutan' => 1,
            ],
            [
                'halaman' => 'profil_peralatan',
                'kunci' => 'main',
                'judul' => 'PERALATAN INSPEKSI',
                'subjudul' => 'Seluruh peralatan ukur dan uji yang digunakan PT Pradana Nusa Energi dalam proses inspeksi instalasi listrik dan penerbitan SLO telah terstandar dan terkalibrasi.',
                'konten' => "• Insulation Resistance Tester (Megger 5kV/10kV)\n• Secondary Current Injection Test Set\n• Earth Tester / Grounding Resistance Meter\n• Thermal Imaging Camera / Thermography Inspection\n• Digital Multimeter & Clamp Meter TR/TM",
                'urutan' => 1,
            ],
            [
                'halaman' => 'profil_sop',
                'kunci' => 'main',
                'judul' => 'STANDAR OPERASI PROSEDUR',
                'subjudul' => 'Seluruh SOP PT Pradana Nusa Energi disusun mengacu pada SNI ISO/IEC 17020:2012 dan peraturan ketenagalistrikan yang berlaku.',
                'konten' => "• SOP-INSP-01: Prosedur Keselamatan Kerja K3 Inspeksi\n• SOP-INSP-02: Pemeriksaan & Pengujian Instalasi Tegangan Rendah (TR)\n• SOP-INSP-03: Pemeriksaan & Pengujian Instalasi Tegangan Menengah (TM)\n• SOP-INSP-04: Penerbitan dan Verifikasi Sertifikat Laik Operasi (SLO)",
                'urutan' => 1,
            ],
        ];

        foreach ($data as $item) {
            KontenHalaman::updateOrCreate(
                [
                    'halaman' => $item['halaman'],
                    'kunci' => $item['kunci'],
                ],
                $item
            );
        }
    }
}
