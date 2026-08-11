-- MySQL dump 10.13  Distrib 8.4.3, for Win64 (x86_64)
--
-- Host: localhost    Database: pradana
-- ------------------------------------------------------
-- Server version	8.4.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alur_sertifikasi`
--

DROP TABLE IF EXISTS `alur_sertifikasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alur_sertifikasi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path_pdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alur_sertifikasi`
--

LOCK TABLES `alur_sertifikasi` WRITE;
/*!40000 ALTER TABLE `alur_sertifikasi` DISABLE KEYS */;
INSERT INTO `alur_sertifikasi` VALUES (1,'Alur Sertifikasi','uploads/alur-sertifikasi/BRViH4LzUduhfNrcOKASuv9ptYknaMHeHmGHeVoR.pdf',1,'2026-08-10 10:55:39','2026-08-10 10:55:39');
/*!40000 ALTER TABLE `alur_sertifikasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `daftar_harga_slo`
--

DROP TABLE IF EXISTS `daftar_harga_slo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `daftar_harga_slo` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_pdf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daftar_harga_slo`
--

LOCK TABLES `daftar_harga_slo` WRITE;
/*!40000 ALTER TABLE `daftar_harga_slo` DISABLE KEYS */;
INSERT INTO `daftar_harga_slo` VALUES (1,'Daftar Harga SLO Juli 2026','uploads/daftar-harga-slo/FDrrWOdUGtBpsbyH1xdhltSyGIMznQmo3Ec7Q1Te.pdf',1,'2026-08-10 10:45:37','2026-08-10 10:45:37');
/*!40000 ALTER TABLE `daftar_harga_slo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `footer_links`
--

DROP TABLE IF EXISTS `footer_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `footer_links` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'legal',
  `urutan` int unsigned NOT NULL DEFAULT '0',
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `footer_links`
--

LOCK TABLES `footer_links` WRITE;
/*!40000 ALTER TABLE `footer_links` DISABLE KEYS */;
/*!40000 ALTER TABLE `footer_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galeri`
--

DROP TABLE IF EXISTS `galeri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galeri` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inspeksi-tr',
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi_tahun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path_gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urutan` int NOT NULL DEFAULT '1',
  `status_aktif` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galeri`
--

LOCK TABLES `galeri` WRITE;
/*!40000 ALTER TABLE `galeri` DISABLE KEYS */;
INSERT INTO `galeri` VALUES (4,'client',NULL,NULL,'uploads/galeri/cviB1M3qVNpRnfKERm6W0MDwiFUbugcOI50khdX3.png',1,1,'2026-08-07 05:27:28','2026-08-07 06:00:00'),(5,'client',NULL,NULL,'uploads/galeri/3ikrY5OgMuuTRmJRa5qsHYHTXjW6ZvK2yvwlpc9B.png',2,1,'2026-08-07 05:28:10','2026-08-07 06:00:19'),(7,'client',NULL,NULL,'uploads/galeri/VAw8CFgEOvZFO0zyc3yj5lgioFZCrTdlG04kegi7.jpg',3,1,'2026-08-07 05:31:46','2026-08-07 06:14:55'),(8,'client',NULL,NULL,'uploads/galeri/eJEXwGGrtI3TWW8K8dCpzIbgKOM35JQmRj8RT9r1.png',4,1,'2026-08-07 06:15:29','2026-08-07 06:15:29'),(9,'client',NULL,NULL,'uploads/galeri/hsQPMerGqfFlVf7jP894cCrvkawDiXj7Kac9T7pY.png',5,1,'2026-08-07 06:15:50','2026-08-07 06:15:50'),(10,'client',NULL,NULL,'uploads/galeri/dxWu3IiHiITWS84Q2SSSr2qEkbI7VbHmKy8JYL0M.png',6,1,'2026-08-07 06:16:21','2026-08-07 06:16:21'),(11,'client',NULL,NULL,'uploads/galeri/vi38w4J1p6mR2nYWuSLYgEtkYCYp8Ciabz85GN48.png',7,1,'2026-08-07 06:16:40','2026-08-07 06:16:40'),(12,'client',NULL,NULL,'uploads/galeri/mH6ezr6LVjJXx4b8urlUOuHuz9vbgxlF7pjHxBa5.jpg',8,1,'2026-08-07 06:25:11','2026-08-07 06:25:11'),(13,'client',NULL,NULL,'uploads/galeri/OZLJ8vwbzikkixYXGAktDyLFAzyLkkDlJD4hl6re.jpg',9,1,'2026-08-07 06:25:32','2026-08-07 06:25:32'),(14,'client',NULL,NULL,'uploads/galeri/DLs0t0tNES5z5OedIFjh9Zpjpjpb626YQfZGcYw0.png',10,1,'2026-08-07 06:25:47','2026-08-07 06:25:47'),(15,'client',NULL,NULL,'uploads/galeri/0IOSKkWmJ2WPiJYxtvxc5B9srFXoaaitFX6oUJ7w.png',11,1,'2026-08-07 06:26:02','2026-08-07 06:26:02'),(16,'client',NULL,NULL,'uploads/galeri/tj81obFItsMJSFFZuCKr42HdmCh7sRY3Ee6e5UuI.jpg',12,1,'2026-08-07 06:26:15','2026-08-07 06:26:15'),(19,'umum','Pengukuran Beban',NULL,'uploads/galeri/YTdgELcModnHv5q4uegnFQjUpFbCesgqxmxoLhER.png',1,1,'2026-08-10 02:20:44','2026-08-10 02:20:44'),(20,'umum','Pengukuran Pembumian PHB TM',NULL,'uploads/galeri/dL2jTOx2vrePwdIKXUVTBjI8IFvxfeffTdV6qPR3.png',2,1,'2026-08-10 02:40:59','2026-08-10 02:40:59'),(21,'umum','Pengukuran Vibrasi Generator',NULL,'uploads/galeri/vjG1VieodHZgHyQPE9wqWDg7UCtkwmXujB6Ro16B.png',3,1,'2026-08-10 03:04:54','2026-08-10 03:04:54'),(22,'umum','Pengukuran Suhu Generator',NULL,'uploads/galeri/ZJfhiTQM2xTTeGgX7zYfdqFTNg0gLCusoxaEEEkg.png',4,1,'2026-08-10 03:05:48','2026-08-10 03:05:48'),(23,'umum','Pengukuran Kebisingan Area Sekitar Generator',NULL,'uploads/galeri/x2DIVlenUP7HfkR6w81Kn9daFhD6xBtIyIfKqZcF.png',5,1,'2026-08-10 03:07:28','2026-08-10 03:07:28'),(24,'umum','Instalasi pemanfaatan tenaga listrik tegangan menengah',NULL,'uploads/galeri/3YNsAq7X26sAPcJjY63KGganaQHAJcRQg5MC9Dd5.png',6,1,'2026-08-10 03:08:25','2026-08-10 03:08:25');
/*!40000 ALTER TABLE `galeri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `karir_settings`
--

DROP TABLE IF EXISTS `karir_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `karir_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8mb4_unicode_ci,
  `benefits` json DEFAULT NULL,
  `years_experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '10+',
  `projects_completed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '500+',
  `team_professionals` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '50+',
  `cities_served` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '30+',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `karir_settings`
--

LOCK TABLES `karir_settings` WRITE;
/*!40000 ALTER TABLE `karir_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `karir_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keluhan_banding_settings`
--

DROP TABLE IF EXISTS `keluhan_banding_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `keluhan_banding_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `path_gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keluhan_banding_settings`
--

LOCK TABLES `keluhan_banding_settings` WRITE;
/*!40000 ALTER TABLE `keluhan_banding_settings` DISABLE KEYS */;
INSERT INTO `keluhan_banding_settings` VALUES (1,'uploads/keluhan-banding/dWpwfOwdLkXsiiL8jNiAvDM73kz6gPMgOF6GVHwf.jpg','2026-08-10 03:53:12','2026-08-10 03:53:12');
/*!40000 ALTER TABLE `keluhan_banding_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keluhan_banding_submissions`
--

DROP TABLE IF EXISTS `keluhan_banding_submissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `keluhan_banding_submissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis` enum('keluhan','banding') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','diproses','selesai','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `catatan_admin` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `telepon_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_perwakilan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon_perwakilan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_perwakilan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keluhan_banding_submissions`
--

LOCK TABLES `keluhan_banding_submissions` WRITE;
/*!40000 ALTER TABLE `keluhan_banding_submissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `keluhan_banding_submissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `konten_beranda`
--

DROP TABLE IF EXISTS `konten_beranda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `konten_beranda` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `bagian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kunci` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul_energi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjudul` text COLLATE utf8mb4_unicode_ci,
  `konten` text COLLATE utf8mb4_unicode_ci,
  `path_gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path_gambar_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path_gambar_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ikon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urutan` int NOT NULL DEFAULT '0',
  `status_aktif` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `konten_beranda`
--

LOCK TABLES `konten_beranda` WRITE;
/*!40000 ALTER TABLE `konten_beranda` DISABLE KEYS */;
INSERT INTO `konten_beranda` VALUES (1,'hero','hero_main','PT PRADANA NUSA','ENERGI','Smart and Safe Electricity','Tentang Kami','uploads/hero/QyKFkg7E2HYv5cCLrpHJW5N5VOA3WPl4WncYjGob.jpg','uploads/hero/ceYzRJgQCY2aK76XXbgdUgnIqaMyHAsvCKpUzaIt.jpg','uploads/hero/mSbJkIZchd9X72jWovoUOspzKvhk0ONGLveWZ7AK.jpg',NULL,NULL,1,1,'2026-08-07 02:20:41','2026-08-07 03:06:07'),(2,'profil_pradana','profil_main','Solusi Energi Terpercaya',NULL,'Kami adalah perusahaan bla bla.','Berfokus pada efisiensi.',NULL,NULL,NULL,NULL,NULL,1,1,'2026-08-07 02:20:41','2026-08-07 02:20:41'),(3,'statistik',NULL,'Pengalaman',NULL,NULL,NULL,'uploads/statistik/YuSXZxfWAPkYfCFWuLZuQxsHyFbn25OTxOyR5UuA.png',NULL,NULL,NULL,NULL,1,1,'2026-08-07 02:20:41','2026-08-07 03:24:39'),(4,'statistik',NULL,'Proyek Selesai',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'200+',2,1,'2026-08-07 02:20:41','2026-08-07 02:20:41'),(5,'tentang_pradana','tentang_main','Latar Belakang',NULL,'PT. Pradana Nusa Energi didirikan oleh Bapak H. Benny Zulkarnaen, S.T. pada 20 Maret 2019, sesuai dengan Akta Pendirian Perseroan Terbatas. Sejak berdiri, perusahaan berkomitmen untuk memberikan layanan profesional di bidang ketenagalistrikan dengan mengedepankan kualitas, integritas, dan kepatuhan terhadap peraturan yang berlaku.','Dengan dukungan tenaga ahli yang kompeten serta pengalaman dalam bidang ketenagalistrikan, PT. Pradana Nusa Energi terus berupaya memberikan pelayanan terbaik kepada setiap pelanggan. Kepercayaan, profesionalisme, dan kepuasan pelanggan menjadi landasan utama dalam menjalankan setiap kegiatan usaha perusahaan.','uploads/tentang/y0LIDJfajqiDqPlWGXCGcWKWTRH9qFVt28Yxec4U.jpg',NULL,NULL,NULL,'Selengkapnya',1,1,'2026-08-07 02:20:41','2026-08-07 03:12:53'),(6,'teknologi_header','header','Informasi Perusahaan',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2026-08-07 02:20:41','2026-08-07 04:38:37'),(7,'teknologi_item',NULL,'Latar Belakang Perusahaan',NULL,NULL,'PT. PRADANA NUSA ENERGI didirikan di latar belakangi UU no. 30 tahun 2009 tentang ketenagalistrikan. Dimana setiap instalasi yang beroperasi wajib memiliki Sertifikat Laik Operasi.',NULL,NULL,NULL,NULL,NULL,1,1,'2026-08-07 02:20:41','2026-08-07 04:39:42'),(8,'teknologi_item',NULL,'Usaha',NULL,NULL,'PT. PRADANA NUSA ENERGI bergerak di bidang Pemeriksaan dan Pengujian Instalasi Pemanfaatan Tenaga Listrik (IPTL) , Genset (PLTD), Surya (PLTS) dan Distribusi TM, sebagai syarat untuk penerbitan Sertifikat Laik Operasi.',NULL,NULL,NULL,NULL,NULL,2,1,'2026-08-07 02:20:41','2026-08-07 04:40:07'),(9,'keunggulan_header','header','Keunggulan Kami',NULL,NULL,'Mengapa kami terbaik.',NULL,NULL,NULL,NULL,NULL,1,1,'2026-08-07 02:20:41','2026-08-07 02:20:41'),(10,'keunggulan_item',NULL,'Profesional',NULL,NULL,'Tim ahli.',NULL,NULL,NULL,'shield',NULL,1,1,'2026-08-07 02:20:41','2026-08-07 02:20:41'),(11,'energi_header','header','Energi Berkelanjutan',NULL,NULL,'Ramah lingkungan.',NULL,NULL,NULL,NULL,NULL,1,1,'2026-08-07 02:20:41','2026-08-07 02:20:41'),(12,'energi_item',NULL,'Tenaga Surya',NULL,NULL,'Solar panel.',NULL,NULL,NULL,'sun',NULL,1,1,'2026-08-07 02:20:41','2026-08-07 02:20:41'),(13,'mengapa_header','header','Mengapa Memilih Kami?',NULL,NULL,NULL,'uploads/mengapa/WNvo92lLTmLbUeh4Rr9cKfqjztwHVwqpFW7PLk7o.png',NULL,NULL,NULL,'uploads/mengapa/6BM1PsRSkl4iuEkx1VcOJDLJi3zIOvC1ShZlHogj.jpg',1,1,'2026-08-07 02:20:41','2026-08-07 06:37:41'),(14,'mengapa_item',NULL,'Kualitas Terjamin',NULL,NULL,'ISO certified.',NULL,NULL,NULL,'check',NULL,1,1,'2026-08-07 02:20:41','2026-08-07 02:20:41'),(15,'kontak_kami','kontak_main','Siap Bekerjasama?',NULL,'Hubungi kami sekarang.','Kirim Pesan',NULL,NULL,NULL,NULL,NULL,1,1,'2026-08-07 02:20:41','2026-08-07 02:20:41'),(16,'akreditasi_item',NULL,'Lembaga Inspeksi Teknik',NULL,NULL,NULL,'uploads/akreditasi_item/ykVELXdrph0AhNZqp9VJdGwvclBM0iYrggBVzL2P.png',NULL,NULL,NULL,NULL,1,1,'2026-08-07 04:05:43','2026-08-07 04:05:43'),(17,'akreditasi_item',NULL,'Lembaga Inspeksi Teknik',NULL,NULL,NULL,'uploads/akreditasi_item/XApOwwbtUwA2ZD8ZpYSUxmULanhsr1ag8AXGWF9O.jpg',NULL,NULL,NULL,NULL,2,1,'2026-08-07 04:07:51','2026-08-07 04:07:51'),(18,'sertifikat_item',NULL,NULL,NULL,NULL,NULL,'uploads/sertifikat_item/4Z4YIoQG2DtNX2yCVD12rPWB8XQwgtsN1Hz7NeYq.jpg',NULL,NULL,NULL,NULL,1,1,'2026-08-07 04:31:33','2026-08-07 04:31:33'),(19,'sertifikat_item',NULL,NULL,NULL,NULL,NULL,'uploads/sertifikat_item/NEppctblaSEKD6osDmH1sVLeh6jEVHUfjBXBYilE.png',NULL,NULL,NULL,NULL,1,1,'2026-08-07 04:32:38','2026-08-07 04:32:38'),(20,'sertifikat_item',NULL,NULL,NULL,NULL,NULL,'uploads/sertifikat_item/SzU7KJQ5OhfjPypYYDEo9cyfPUW1s2jiptCvP01p.jpg',NULL,NULL,NULL,NULL,1,1,'2026-08-07 04:33:02','2026-08-07 04:33:02'),(21,'sertifikat_item',NULL,NULL,NULL,NULL,NULL,'uploads/sertifikat_item/uEnn7wmUglHzbUEih8FXsBOc0LqrnKJdpa9L2RKj.jpg',NULL,NULL,NULL,NULL,1,1,'2026-08-07 04:33:38','2026-08-07 04:33:38'),(22,'sertifikat_item',NULL,NULL,NULL,NULL,NULL,'uploads/sertifikat_item/HcaKFu9OKAU9jsF6k3c6SLkWUrpgOPT9uxLrRjUb.jpg',NULL,NULL,NULL,NULL,1,1,'2026-08-07 04:35:22','2026-08-07 04:35:22'),(23,'sertifikat_item',NULL,NULL,NULL,NULL,NULL,'uploads/sertifikat_item/bJx8tNfjlbcPCzvjJuV4l535an7TJQn8beVMc01y.jpg',NULL,NULL,NULL,NULL,1,1,'2026-08-07 04:35:38','2026-08-07 04:35:38'),(24,'teknologi_item',NULL,'Komitmen Perusahaan',NULL,NULL,'PT. PRADANA NUSA ENERGI dalam melaksanakan Pemeriksaan dan Pengujian Instalasi Pemanfaatan Tenaga Listrik (IPTL), Genset (PLTD), Surya (PLTS)dan Distribusi TM, memiliki tenaga teknik dan peralatan pengujian memenuhi standar yang di tentukan pihak terkait.',NULL,NULL,NULL,NULL,NULL,3,1,'2026-08-07 04:40:46','2026-08-07 04:40:46'),(25,'hubungi_kami','alamat_kantor','alamat_kantor',NULL,NULL,'Jl. Sumatra Blok B No. 85. RT 04/RW 10. Komplek Jatibening Indah TNI-AL. Kel. Jatibening. Kec. Pondok Gede. Kota Bekasi.',NULL,NULL,NULL,NULL,NULL,0,1,'2026-08-11 00:07:10','2026-08-11 00:07:10'),(26,'hubungi_kami','telepon_whatsapp','telepon_whatsapp',NULL,NULL,'021-8498 715 & +6287857603660',NULL,NULL,NULL,NULL,NULL,0,1,'2026-08-11 00:07:10','2026-08-11 00:07:10'),(27,'hubungi_kami','email_resmi','email_resmi',NULL,NULL,'nusaenergi999@gmail.com',NULL,NULL,NULL,NULL,NULL,0,1,'2026-08-11 00:07:10','2026-08-11 00:07:59'),(28,'hubungi_kami','jam_operasional','jam_operasional',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,'2026-08-11 00:07:10','2026-08-11 00:07:10'),(29,'hubungi_kami','maps_embed','maps_embed',NULL,NULL,'<iframe src=\"https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d24167.976362842335!2d106.93725398548537!3d-6.260188197214668!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sJl.%20Sumatra%20Blok%20B%20No.%2085.%20RT%2004%2FRW%2010.%20Komplek%20Jatibening%20Indah%20TNI-AL.%20Kel.%20Jatibening.%20Kec.%20Pondok%20Gede.%20Kota%20Bekasi.!5e1!3m2!1sid!2sid!4v1786431809000!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"strict-origin-when-cross-origin\"></iframe>',NULL,NULL,NULL,NULL,NULL,0,1,'2026-08-11 00:07:10','2026-08-11 00:17:50');
/*!40000 ALTER TABLE `konten_beranda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `konten_halamans`
--

DROP TABLE IF EXISTS `konten_halamans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `konten_halamans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `halaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kunci` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjudul` text COLLATE utf8mb4_unicode_ci,
  `konten` longtext COLLATE utf8mb4_unicode_ci,
  `nilai` text COLLATE utf8mb4_unicode_ci,
  `path_gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urutan` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `konten_halamans_halaman_index` (`halaman`),
  KEY `konten_halamans_kunci_index` (`kunci`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `konten_halamans`
--

LOCK TABLES `konten_halamans` WRITE;
/*!40000 ALTER TABLE `konten_halamans` DISABLE KEYS */;
INSERT INTO `konten_halamans` VALUES (1,'profil_perusahaan','main','PT PRADANA NUSA ENERGI','Lembaga Inspeksi Teknik (LIT) terkemuka dan terpercaya yang bergerak di bidang pengujian dan pemeriksaan kelistrikan untuk mewujudkan tenaga listrik yang aman, andal, dan ramah lingkungan.','PT Pradana Nusa Energi berdiri sebagai Lembaga Inspeksi Teknik terakreditasi yang berkomitmen mendukung program pemerintah dalam penegakan Sertifikat Laik Operasi (SLO) di Indonesia. Dengan didukung oleh Tim Tenaga Teknik (TT) dan Penanggung Jawab Teknik (PJT) bersertifikat kompetensi resmi, kami memberikan layanan inspeksi ketenagalistrikan yang tepat waktu, presisi, independen, dan berstandar nasional.','Komitmen Kami Terhadap Keselamatan & Ketenagalistrikan',NULL,NULL,1,'2026-08-07 02:20:41','2026-08-07 02:20:41'),(2,'profil_pjt_tt','main','DAFTAR PJT & TT','Daftar Penanggung Jawab Teknik (PJT) dan Tenaga Teknik (TT) terdaftar dan bersertifikasi kompetensi resmi PT Pradana Nusa Energi.','Seluruh Tenaga Teknik PT Pradana Nusa Energi telah memiliki Sertifikat Kompetensi (Serkom) yang diterbitkan oleh Lembaga Sertifikasi Kompetensi (LSK) terakreditasi Kementerian ESDM.',NULL,NULL,NULL,1,'2026-08-07 02:20:41','2026-08-07 02:20:41'),(3,'profil_struktur','main','STRUKTUR ORGANISASI','Susunan kepemimpinan dan manajemen PT Pradana Nusa Energi dalam menjalankan layanan inspeksi & sertifikasi ketenagalistrikan SLO.','PT Pradana Nusa Energi dipimpin oleh jajaran Direksi dan Manajemen profesional berpengalaman di bidang ketenagalistrikan. Struktur organisasi yang solid dan independen memastikan setiap proses inspeksi berjalan objektif, akuntabel, dan sesuai dengan standar ISO/IEC 17020:2012.',NULL,NULL,NULL,1,'2026-08-07 02:20:41','2026-08-07 02:20:41'),(4,'profil_legalitas','main','LEGALITAS PERUSAHAAN','Seluruh dokumen legalitas, perizinan, dan akreditasi resmi PT Pradana Nusa Energi sebagai Lembaga Inspeksi Teknik terakreditasi.','• NIB: 1234567890\n• Akta Pendirian No. 15 Notaris Jakarta\n• Keputusan Menteri Hukum dan HAM RI No. AHU-0012345.AH.01.01\n• Penetapan LIT Kementerian ESDM RI\n• IUJK Ketenagalistrikan Resmi',NULL,NULL,NULL,1,'2026-08-07 02:20:41','2026-08-07 02:20:41'),(5,'profil_peralatan','main','PERALATAN INSPEKSI','Seluruh peralatan ukur dan uji yang digunakan PT Pradana Nusa Energi dalam proses inspeksi instalasi listrik dan penerbitan SLO telah terstandar dan terkalibrasi.','• Insulation Resistance Tester (Megger 5kV/10kV)\n• Secondary Current Injection Test Set\n• Earth Tester / Grounding Resistance Meter\n• Thermal Imaging Camera / Thermography Inspection\n• Digital Multimeter & Clamp Meter TR/TM',NULL,NULL,NULL,1,'2026-08-07 02:20:41','2026-08-07 02:20:41'),(6,'profil_sop','main','STANDAR OPERASI PROSEDUR','Seluruh SOP PT Pradana Nusa Energi disusun mengacu pada SNI ISO/IEC 17020:2012 dan peraturan ketenagalistrikan yang berlaku.','• SOP-INSP-01: Prosedur Keselamatan Kerja K3 Inspeksi\n• SOP-INSP-02: Pemeriksaan & Pengujian Instalasi Tegangan Rendah (TR)\n• SOP-INSP-03: Pemeriksaan & Pengujian Instalasi Tegangan Menengah (TM)\n• SOP-INSP-04: Penerbitan dan Verifikasi Sertifikat Laik Operasi (SLO)',NULL,NULL,NULL,1,'2026-08-07 02:20:41','2026-08-07 02:20:41'),(7,'informasi-publik','maklumat-layanan',NULL,NULL,NULL,NULL,'uploads/maklumat/h5i3YQRsUU3Yz4o23M3nTgp7ajkBN2VywrIdVh7n.jpg',NULL,0,'2026-08-10 03:31:30','2026-08-10 03:31:30');
/*!40000 ALTER TABLE `konten_halamans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logos`
--

DROP TABLE IF EXISTS `logos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urutan` int NOT NULL DEFAULT '0',
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logos`
--

LOCK TABLES `logos` WRITE;
/*!40000 ALTER TABLE `logos` DISABLE KEYS */;
/*!40000 ALTER TABLE `logos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lowongan_karirs`
--

DROP TABLE IF EXISTS `lowongan_karirs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lowongan_karirs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Teknik',
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Full Time',
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Jakarta',
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `persyaratan` text COLLATE utf8mb4_unicode_ci,
  `link_lamar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `urutan` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lowongan_karirs`
--

LOCK TABLES `lowongan_karirs` WRITE;
/*!40000 ALTER TABLE `lowongan_karirs` DISABLE KEYS */;
/*!40000 ALTER TABLE `lowongan_karirs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lowongan_kerja`
--

DROP TABLE IF EXISTS `lowongan_kerja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lowongan_kerja` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `divisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `persyaratan` text COLLATE utf8mb4_unicode_ci,
  `link_lamar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urutan` tinyint unsigned NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lowongan_kerja`
--

LOCK TABLES `lowongan_kerja` WRITE;
/*!40000 ALTER TABLE `lowongan_kerja` DISABLE KEYS */;
/*!40000 ALTER TABLE `lowongan_kerja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_07_26_093907_create_konten_berandas_table',1),(5,'2026_07_26_093908_create_galeris_table',1),(6,'2026_07_26_140000_create_konten_halamans_table',1),(7,'2026_07_26_140001_create_lowongan_karirs_table',1),(8,'2026_07_26_140002_create_pesan_masuks_table',1),(9,'2026_07_27_033216_create_profiles_table',1),(10,'2026_07_27_034624_create_profil_perusahaan_table',1),(11,'2026_07_27_041100_create_profil_daftar_p_j_t_t_t_s_table',1),(12,'2026_07_27_041612_create_profil_daftar_p_j_t_t_t_items_table',1),(13,'2026_07_27_043739_create_profil_struktur_organisasis_table',1),(14,'2026_07_27_043814_create_profil_struktur_organisasi_items_table',1),(15,'2026_07_27_062141_create_profil_legalitas_table',1),(16,'2026_07_27_062250_create_profil_legalitas_items_table',1),(17,'2026_07_27_063307_create_profil_legalitas_tenaga_teknik_table',1),(18,'2026_07_27_065809_add_columns_to_profil_legalitas_table',1),(19,'2026_07_27_070022_add_columns_to_profil_legalitas_items_table',1),(20,'2026_07_27_072503_create_profil_peralatan_ketenagalistrikans_table',1),(21,'2026_07_27_075344_create_profil_sops_table',1),(22,'2026_07_27_080320_create_sop_items_table',1),(23,'2026_07_27_114815_create_logos_table',1),(24,'2026_07_27_160711_create_slo_regulasi_table',1),(25,'2026_07_27_160725_create_slo_regulasi_items_table',1),(26,'2026_07_27_170309_create_slo_kategori_layanan_table',1),(27,'2026_07_27_172024_create_lowongan_kerja_table',1),(28,'2026_07_28_025326_create_uji_petik_table',1),(29,'2026_07_28_031317_create_keluhan_banding_settings_table',1),(30,'2026_07_28_031355_create_keluhan_banding_submissions_table',1),(31,'2026_07_28_032414_add_company_fields_to_keluhan_banding_submissions_table',1),(32,'2026_07_28_073032_create_persyaratan_slo_table',1),(33,'2026_07_28_075303_create_daftar_harga_slo_table',1),(34,'2026_07_28_080854_create_prosedur_slo_table',1),(35,'2026_07_28_084917_create_alur_sertifikasi_table',1),(36,'2026_07_28_091514_create_karir_settings_table',1),(37,'2026_07_29_000001_add_hero_slide_images_to_konten_beranda_table',1),(38,'2026_07_29_000002_add_hero_judul_energi_to_konten_beranda_table',1),(39,'2026_07_29_010000_create_footer_links_table',1),(40,'2026_08_10_025221_add_foto_visi_misi_to_profil_perusahaan_table',2),(41,'2026_08_11_000001_add_iptl_tm_to_persyaratan_slo_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persyaratan_slo`
--

DROP TABLE IF EXISTS `persyaratan_slo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persyaratan_slo` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tr_admin` json DEFAULT NULL,
  `tr_teknis` json DEFAULT NULL,
  `tm_admin` json DEFAULT NULL,
  `tm_teknis` json DEFAULT NULL,
  `plts_admin` json DEFAULT NULL,
  `plts_teknis` json DEFAULT NULL,
  `genset_admin` json DEFAULT NULL,
  `genset_teknis` json DEFAULT NULL,
  `iptl_tm` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persyaratan_slo`
--

LOCK TABLES `persyaratan_slo` WRITE;
/*!40000 ALTER TABLE `persyaratan_slo` DISABLE KEYS */;
INSERT INTO `persyaratan_slo` VALUES (1,'[]','[]','[]','[]','[]','[]','[]','[]','[\"KTP Pemilik atau Penanggung Jawab Perusahaan\", \"NIB Perusahaan/ Surat Izin Usaha/ Surat Izin Operasional\", \"NPWP Perusahaan\", \"No. Handphone Penanggung Jawab Perusahaan\", \"No. Telepon Perusahaan\", \"Email Penanggung Jawab Perusahaan\", \"Nomor Identitas Data Instalasi (NIDI)\", \"Siteplan atau Layout Tata Letak Instalasi Listrik di Power House/Gardu Listrik Konsumen\", \"Single Line Diagram\", \"Factory Test Report PHB TM\", \"Factory Test Report Transformator\", \"Factory Test Report PHB TR\", \"Factory Test Report Saluran TM jika lebih dari 100 meter\", \"SPJBTL/SIP/Rekening Listrik 3 bulan terakhir\", \"Hasil Setting Relay Proteksi Pada PHB TM (bila terdapat Relay Control)\"]','2026-08-10 10:26:06','2026-08-10 10:26:06');
/*!40000 ALTER TABLE `persyaratan_slo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pesan_masuks`
--

DROP TABLE IF EXISTS `pesan_masuks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pesan_masuks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dibaca` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pesan_masuks`
--

LOCK TABLES `pesan_masuks` WRITE;
/*!40000 ALTER TABLE `pesan_masuks` DISABLE KEYS */;
/*!40000 ALTER TABLE `pesan_masuks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profil_daftar_p_j_t_t_t_items`
--

DROP TABLE IF EXISTS `profil_daftar_p_j_t_t_t_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profil_daftar_p_j_t_t_t_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `profil_daftar_p_j_t_t_t_id` bigint unsigned NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` enum('PJT','TT') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_sertifikat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_register` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profil_daftar_p_j_t_t_t_items_profil_daftar_p_j_t_t_t_id_foreign` (`profil_daftar_p_j_t_t_t_id`),
  CONSTRAINT `profil_daftar_p_j_t_t_t_items_profil_daftar_p_j_t_t_t_id_foreign` FOREIGN KEY (`profil_daftar_p_j_t_t_t_id`) REFERENCES `profil_daftar_p_j_t_t_t_s` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil_daftar_p_j_t_t_t_items`
--

LOCK TABLES `profil_daftar_p_j_t_t_t_items` WRITE;
/*!40000 ALTER TABLE `profil_daftar_p_j_t_t_t_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `profil_daftar_p_j_t_t_t_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profil_daftar_p_j_t_t_t_s`
--

DROP TABLE IF EXISTS `profil_daftar_p_j_t_t_t_s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profil_daftar_p_j_t_t_t_s` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjudul` text COLLATE utf8mb4_unicode_ci,
  `konten` longtext COLLATE utf8mb4_unicode_ci,
  `dokumen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil_daftar_p_j_t_t_t_s`
--

LOCK TABLES `profil_daftar_p_j_t_t_t_s` WRITE;
/*!40000 ALTER TABLE `profil_daftar_p_j_t_t_t_s` DISABLE KEYS */;
/*!40000 ALTER TABLE `profil_daftar_p_j_t_t_t_s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profil_legalitas`
--

DROP TABLE IF EXISTS `profil_legalitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profil_legalitas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjudul` text COLLATE utf8mb4_unicode_ci,
  `dokumen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil_legalitas`
--

LOCK TABLES `profil_legalitas` WRITE;
/*!40000 ALTER TABLE `profil_legalitas` DISABLE KEYS */;
/*!40000 ALTER TABLE `profil_legalitas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profil_legalitas_items`
--

DROP TABLE IF EXISTS `profil_legalitas_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profil_legalitas_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profil_legalitas_id` bigint unsigned DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_terbit` date DEFAULT NULL,
  `berlaku_sampai` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urutan` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `profil_legalitas_items_profil_legalitas_id_foreign` (`profil_legalitas_id`),
  CONSTRAINT `profil_legalitas_items_profil_legalitas_id_foreign` FOREIGN KEY (`profil_legalitas_id`) REFERENCES `profil_legalitas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil_legalitas_items`
--

LOCK TABLES `profil_legalitas_items` WRITE;
/*!40000 ALTER TABLE `profil_legalitas_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `profil_legalitas_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profil_legalitas_tenaga_teknik`
--

DROP TABLE IF EXISTS `profil_legalitas_tenaga_teknik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profil_legalitas_tenaga_teknik` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `profil_legalitas_id` bigint unsigned DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_sertifikat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bidang_kompetensi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `urutan` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profil_legalitas_tenaga_teknik_profil_legalitas_id_foreign` (`profil_legalitas_id`),
  CONSTRAINT `profil_legalitas_tenaga_teknik_profil_legalitas_id_foreign` FOREIGN KEY (`profil_legalitas_id`) REFERENCES `profil_legalitas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil_legalitas_tenaga_teknik`
--

LOCK TABLES `profil_legalitas_tenaga_teknik` WRITE;
/*!40000 ALTER TABLE `profil_legalitas_tenaga_teknik` DISABLE KEYS */;
/*!40000 ALTER TABLE `profil_legalitas_tenaga_teknik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profil_peralatan_ketenagalistrikans`
--

DROP TABLE IF EXISTS `profil_peralatan_ketenagalistrikans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profil_peralatan_ketenagalistrikans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ukur, uji, safety',
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi_singkat` text COLLATE utf8mb4_unicode_ci,
  `jenis_alat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spesifikasi` json DEFAULT NULL,
  `status_kalibrasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_kalibrasi` date DEFAULT NULL,
  `urutan` int DEFAULT '0',
  `status_aktif` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil_peralatan_ketenagalistrikans`
--

LOCK TABLES `profil_peralatan_ketenagalistrikans` WRITE;
/*!40000 ALTER TABLE `profil_peralatan_ketenagalistrikans` DISABLE KEYS */;
/*!40000 ALTER TABLE `profil_peralatan_ketenagalistrikans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profil_perusahaan`
--

DROP TABLE IF EXISTS `profil_perusahaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profil_perusahaan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjudul` text COLLATE utf8mb4_unicode_ci,
  `nilai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci,
  `url_gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visi` text COLLATE utf8mb4_unicode_ci,
  `foto_visi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `misi` text COLLATE utf8mb4_unicode_ci,
  `foto_misi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_perusahaan` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil_perusahaan`
--

LOCK TABLES `profil_perusahaan` WRITE;
/*!40000 ALTER TABLE `profil_perusahaan` DISABLE KEYS */;
INSERT INTO `profil_perusahaan` VALUES (1,NULL,NULL,NULL,NULL,NULL,NULL,'profil-perusahaan/NzckbW8mR03kE597Z77DvQKk4QD30X80AaxuFugY.jpg',NULL,'profil-perusahaan/Bxlzugrk1QkMprbCXM6DuU7mqdjhw4dlHqWp68nX.jpg',NULL,'2026-08-09 19:59:57','2026-08-10 00:10:53');
/*!40000 ALTER TABLE `profil_perusahaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profil_sops`
--

DROP TABLE IF EXISTS `profil_sops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profil_sops` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjudul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil_sops`
--

LOCK TABLES `profil_sops` WRITE;
/*!40000 ALTER TABLE `profil_sops` DISABLE KEYS */;
/*!40000 ALTER TABLE `profil_sops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profil_struktur_organisasi_items`
--

DROP TABLE IF EXISTS `profil_struktur_organisasi_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profil_struktur_organisasi_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `profil_struktur_organisasi_id` bigint unsigned NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int NOT NULL,
  `urutan` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `struktur_org_items_struktur_id` (`profil_struktur_organisasi_id`),
  CONSTRAINT `struktur_org_items_struktur_id` FOREIGN KEY (`profil_struktur_organisasi_id`) REFERENCES `profil_struktur_organisasis` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil_struktur_organisasi_items`
--

LOCK TABLES `profil_struktur_organisasi_items` WRITE;
/*!40000 ALTER TABLE `profil_struktur_organisasi_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `profil_struktur_organisasi_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profil_struktur_organisasis`
--

DROP TABLE IF EXISTS `profil_struktur_organisasis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profil_struktur_organisasis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjudul` text COLLATE utf8mb4_unicode_ci,
  `konten` longtext COLLATE utf8mb4_unicode_ci,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil_struktur_organisasis`
--

LOCK TABLES `profil_struktur_organisasis` WRITE;
/*!40000 ALTER TABLE `profil_struktur_organisasis` DISABLE KEYS */;
/*!40000 ALTER TABLE `profil_struktur_organisasis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profiles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prosedur_slo`
--

DROP TABLE IF EXISTS `prosedur_slo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prosedur_slo` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_pdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `timeline_steps` json DEFAULT NULL,
  `accordion_content` json DEFAULT NULL,
  `processing_time` json DEFAULT NULL,
  `required_documents` json DEFAULT NULL,
  `faq_content` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prosedur_slo`
--

LOCK TABLES `prosedur_slo` WRITE;
/*!40000 ALTER TABLE `prosedur_slo` DISABLE KEYS */;
INSERT INTO `prosedur_slo` VALUES (1,'Prosedur SLO Juli 2026','uploads/prosedur-slo/tOMJRoXsZ2ASE3yPXbRARqvkjFQprrTNWmBIwTgi.pdf',1,'[]','[]','[]','[]','[]','2026-08-10 10:50:02','2026-08-10 10:50:02');
/*!40000 ALTER TABLE `prosedur_slo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('Mq6LNJF0182H5yfz8kbmZ8VDHQErMbHYOFAuT80H',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJKNXRLb1lHMHBUZjNVbm8wYm5pYVRaSDlyWG5obzBwVTF1a1MyVDY1IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC9hZG1pbiIsInJvdXRlIjoiYWRtaW4uZGFzaGJvYXJkIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwidXJsIjpbXSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjF9',1786433121),('tZtiPOY1jn9zV6W9UMvUtr8LSLzlD7URnIecQ5V8',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJLaGtub2N2SDVDMDZESEpITW9lU2h2WjlLUXZra3YyaHF5Q3FkYXNzIiwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjEsIl9wcmV2aW91cyI6eyJ1cmwiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYWRtaW5cL3Byb2ZpbFwvc29wXC9jcmVhdGUiLCJyb3V0ZSI6ImFkbWluLnByb2ZpbC5zb3AuY3JlYXRlIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1786414687),('Z4K0hCPWfOMYFi89K5vJLDM9wDQuxVLGiZQLOyOV',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJGQmp5UU14dm9zQk5QR0RCeVJKbUdYUDVFcWUzaW1zVktVQ0FXRkJ1IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1786440346),('zocl1hMhNu3BJZDbx3qaFlj9oEAXONWfBHF1hFPe',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJQekpPU3I3eExNYVZvaGVFYTRlajE0YmhvUk1WYkdzTUlZY1VsNVdkIiwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjEsIl9wcmV2aW91cyI6eyJ1cmwiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvaHVidW5naS1rYW1pIiwicm91dGUiOiJodWJ1bmdpLWthbWkifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1786432674);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slo_kategori_layanan`
--

DROP TABLE IF EXISTS `slo_kategori_layanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slo_kategori_layanan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kategori_utama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ikon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` json DEFAULT NULL,
  `urutan` tinyint unsigned NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slo_kategori_layanan`
--

LOCK TABLES `slo_kategori_layanan` WRITE;
/*!40000 ALTER TABLE `slo_kategori_layanan` DISABLE KEYS */;
INSERT INTO `slo_kategori_layanan` VALUES (1,'TM','IPTL-TM','Inspeksi Instalasi Pemanfaatan Tenaga Listrik Tegangan Menengah','','[]',1,1,'2026-08-10 18:24:26','2026-08-10 18:24:26'),(2,'PEMBANGKIT','PLTD','Inspeksi Instalasi Pembangkit Listrik Tegangan Diesel','','[]',2,1,'2026-08-10 18:24:26','2026-08-10 18:24:26'),(3,'TM','DISTRIBUSI TM','Inspeksi Instalasi Distribusi Listrik Tegangan Menengah','','[]',3,1,'2026-08-10 18:24:26','2026-08-10 18:24:26'),(4,'PEMBANGKIT','PLTS','Inspeksi Pembangkit Listrik Tenaga Surya','','[]',4,1,'2026-08-10 18:24:26','2026-08-10 18:24:26'),(5,'TM','Pengujian Panel Cubicle','Pengujian Panel Hubung Bagi Tegangan Menengah','','[]',5,1,'2026-08-10 18:24:26','2026-08-10 18:24:26'),(6,'TM','Pengujian Trafo','Pengujian Peralatan Transformator Distribusi','','[]',6,1,'2026-08-10 18:24:26','2026-08-10 18:24:26'),(7,'TM','Kabel TM','Pengujian Kabel Tegangan Menengah','','[]',7,1,'2026-08-10 18:24:26','2026-08-10 18:24:26');
/*!40000 ALTER TABLE `slo_kategori_layanan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slo_regulasi`
--

DROP TABLE IF EXISTS `slo_regulasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slo_regulasi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nomor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'permen_esdm',
  `url_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urutan` tinyint unsigned NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slo_regulasi`
--

LOCK TABLES `slo_regulasi` WRITE;
/*!40000 ALTER TABLE `slo_regulasi` DISABLE KEYS */;
INSERT INTO `slo_regulasi` VALUES (1,'Permen No. 12 Tahun 2021','Peraturan Menteri ESDM Nomor 12 Tahun 2021 Tentang Klasifikasi, Kualifikasi, Akreditasi dan Sertifikasi Usaha Jasa Penunjang Tenaga Listrik','uu_pp','uploads/regulasi/lZ2ruIh5GhSYZQSfR0P8Utrlhe924R095Mu3paOc.pdf',0,1,'2026-08-10 18:11:03','2026-08-10 18:11:03');
/*!40000 ALTER TABLE `slo_regulasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slo_regulasi_items`
--

DROP TABLE IF EXISTS `slo_regulasi_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slo_regulasi_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slo_regulasi_items`
--

LOCK TABLES `slo_regulasi_items` WRITE;
/*!40000 ALTER TABLE `slo_regulasi_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `slo_regulasi_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sop_items`
--

DROP TABLE IF EXISTS `sop_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sop_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `profil_sop_id` bigint unsigned DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'mutu, inspeksi, pelayanan, sdm',
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'SOP-MM-001, SOP-INS-001, dll',
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `revisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Jan 2026 · Rev.05',
  `url_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urutan` int DEFAULT '0',
  `status_aktif` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sop_items_profil_sop_id_foreign` (`profil_sop_id`),
  CONSTRAINT `sop_items_profil_sop_id_foreign` FOREIGN KEY (`profil_sop_id`) REFERENCES `profil_sops` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sop_items`
--

LOCK TABLES `sop_items` WRITE;
/*!40000 ALTER TABLE `sop_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `sop_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uji_petik`
--

DROP TABLE IF EXISTS `uji_petik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `uji_petik` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `path_gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uji_petik`
--

LOCK TABLES `uji_petik` WRITE;
/*!40000 ALTER TABLE `uji_petik` DISABLE KEYS */;
INSERT INTO `uji_petik` VALUES (1,'uploads/uji-petik/xE84SEPEJbxVJuNqOOTzf9MnQRfhOb1wZzDFqk8f.png','2026-08-10 03:50:01','2026-08-10 03:50:01');
/*!40000 ALTER TABLE `uji_petik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrator Pradana','admin@pradana.co.id',NULL,'$2y$12$PHsiriEIkkpY/e5I9hIzQOa1Wa7s00VMJu4SvA2SRx8yDXL9rAHO2','6GcYlogRyQt822ASptVGWqH8gT7RuSLc9Oitx3Ylv1k1yHfMeY8hqiu4HOe9','2026-08-07 02:20:41','2026-08-07 02:20:41');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-08-11 16:27:16
