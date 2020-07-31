-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2020 at 03:51 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem-pakar`
--

-- --------------------------------------------------------

--
-- Table structure for table `ds_rules`
--

CREATE TABLE `ds_rules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_penyakit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_gejala` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` double(8,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ds_rules`
--

INSERT INTO `ds_rules` (`id`, `id_penyakit`, `id_gejala`, `bobot`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'P1', 'G4', 0.50, NULL, NULL, NULL),
(2, 'P1', 'G6', 0.50, NULL, NULL, NULL),
(3, 'P1', 'G7', 0.30, NULL, NULL, '2020-07-25 22:39:43'),
(4, 'P1', 'G11', 0.60, NULL, NULL, NULL),
(5, 'P1', 'G19', 0.60, NULL, NULL, NULL),
(6, 'P1', 'G20', 0.50, NULL, NULL, NULL),
(7, 'P1', 'G33', 0.80, NULL, NULL, NULL),
(8, 'P1', 'G34', 1.00, NULL, NULL, NULL),
(9, 'P1', 'G36', 0.20, NULL, NULL, NULL),
(10, 'P1', 'G38', 0.70, NULL, NULL, NULL),
(11, 'P2', 'G7', 0.50, NULL, NULL, NULL),
(12, 'P2', 'G9', 0.40, NULL, NULL, NULL),
(13, 'P2', 'G10', 0.30, NULL, NULL, NULL),
(14, 'P2', 'G15', 0.60, NULL, NULL, NULL),
(15, 'P2', 'G18', 0.30, NULL, NULL, NULL),
(16, 'P2', 'G19', 0.40, NULL, NULL, NULL),
(17, 'P2', 'G20', 0.40, NULL, NULL, NULL),
(18, 'P2', 'G28', 0.40, NULL, NULL, NULL),
(19, 'P2', 'G30', 0.40, NULL, NULL, NULL),
(20, 'P2', 'G31', 0.20, NULL, NULL, NULL),
(21, 'P2', 'G34', 0.70, NULL, NULL, NULL),
(22, 'P2', 'G38', 0.70, NULL, NULL, NULL),
(23, 'P3', 'G2', 0.50, NULL, NULL, NULL),
(24, 'P3', 'G5', 0.80, NULL, NULL, NULL),
(25, 'P3', 'G12', 0.80, NULL, NULL, NULL),
(26, 'P3', 'G13', 0.40, NULL, NULL, NULL),
(27, 'P3', 'G14', 0.80, NULL, NULL, NULL),
(28, 'P3', 'G24', 0.70, NULL, NULL, NULL),
(29, 'P3', 'G25', 0.70, NULL, NULL, NULL),
(30, 'P3', 'G41', 0.50, NULL, NULL, NULL),
(31, 'P3', 'G46', 0.50, NULL, NULL, NULL),
(32, 'P4', 'G3', 0.30, NULL, NULL, NULL),
(33, 'P4', 'G7', 0.40, NULL, NULL, NULL),
(34, 'P4', 'G15', 0.80, NULL, NULL, NULL),
(35, 'P4', 'G16', 0.80, NULL, NULL, NULL),
(36, 'P4', 'G27', 0.70, NULL, NULL, NULL),
(37, 'P4', 'G33', 0.80, NULL, NULL, NULL),
(38, 'P4', 'G35', 0.50, NULL, NULL, NULL),
(39, 'P4', 'G39', 0.50, NULL, NULL, NULL),
(40, 'P4', 'G40', 0.60, NULL, NULL, NULL),
(41, 'P4', 'G41', 0.70, NULL, NULL, NULL),
(42, 'P5', 'G5', 0.50, NULL, NULL, NULL),
(43, 'P5', 'G7', 0.50, NULL, NULL, NULL),
(44, 'P5', 'G12', 0.50, NULL, NULL, NULL),
(45, 'P5', 'G14', 0.60, NULL, NULL, NULL),
(46, 'P5', 'G15', 0.60, NULL, NULL, NULL),
(47, 'P5', 'G17', 0.80, NULL, NULL, NULL),
(48, 'P5', 'G26', 0.50, NULL, NULL, NULL),
(49, 'P5', 'G27', 0.70, NULL, NULL, NULL),
(50, 'P5', 'G33', 0.50, NULL, NULL, NULL),
(51, 'P5', 'G40', 0.40, NULL, NULL, NULL),
(52, 'P5', 'G41', 0.40, NULL, NULL, NULL),
(53, 'P6', 'G8', 0.70, NULL, NULL, NULL),
(54, 'P6', 'G15', 0.70, NULL, NULL, NULL),
(55, 'P6', 'G22', 0.40, NULL, NULL, NULL),
(56, 'P6', 'G29', 0.70, NULL, NULL, NULL),
(57, 'P6', 'G37', 0.60, NULL, NULL, NULL),
(58, 'P6', 'G39', 0.40, NULL, NULL, NULL),
(59, 'P6', 'G41', 0.80, NULL, NULL, NULL),
(60, 'P6', 'G47', 0.50, NULL, NULL, NULL),
(61, 'P6', 'G48', 0.50, NULL, NULL, NULL),
(62, 'P7', 'G2', 0.70, NULL, NULL, NULL),
(63, 'P7', 'G5', 0.40, NULL, NULL, NULL),
(64, 'P7', 'G7', 0.70, NULL, NULL, NULL),
(65, 'P7', 'G14', 0.60, NULL, NULL, NULL),
(66, 'P7', 'G21', 0.70, NULL, NULL, NULL),
(67, 'P7', 'G28', 0.70, NULL, NULL, NULL),
(68, 'P7', 'G30', 0.50, NULL, NULL, NULL),
(69, 'P7', 'G32', 0.60, NULL, NULL, NULL),
(70, 'P7', 'G44', 0.50, NULL, NULL, NULL),
(71, 'P7', 'G45', 0.50, NULL, NULL, NULL),
(72, 'P8', 'G1', 0.80, NULL, NULL, NULL),
(73, 'P8', 'G2', 0.60, NULL, NULL, NULL),
(74, 'P8', 'G3', 0.70, NULL, NULL, NULL),
(75, 'P8', 'G21', 0.70, NULL, NULL, NULL),
(76, 'P8', 'G22', 0.50, NULL, NULL, NULL),
(77, 'P8', 'G23', 0.50, NULL, NULL, NULL),
(78, 'P8', 'G28', 0.70, NULL, NULL, NULL),
(79, 'P8', 'G33', 0.50, NULL, NULL, NULL),
(80, 'P8', 'G36', 0.50, NULL, NULL, NULL),
(81, 'P8', 'G39', 0.90, NULL, NULL, NULL),
(82, 'P8', 'G42', 0.50, NULL, NULL, NULL),
(83, 'P8', 'G44', 0.50, NULL, NULL, NULL),
(84, 'P9', 'G2', 0.50, NULL, NULL, NULL),
(85, 'P9', 'G7', 0.50, NULL, NULL, NULL),
(86, 'P9', 'G33', 0.40, NULL, NULL, NULL),
(87, 'P9', 'G36', 0.40, NULL, NULL, NULL),
(88, 'P9', 'G39', 0.50, NULL, NULL, NULL),
(89, 'P9', 'G42', 0.70, NULL, NULL, NULL),
(90, 'P9', 'G43', 0.70, NULL, NULL, NULL),
(91, 'P9', 'G46', 0.60, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_gejala` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gejala` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` set('Umum','Telinga','Hidung','Tenggorokan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id`, `kode_gejala`, `gejala`, `jenis`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'G1', 'Amandel membengkak', 'Tenggorokan', NULL, NULL, '2020-07-25 22:20:03'),
(2, 'G2', 'Batuk', 'Tenggorokan', NULL, NULL, NULL),
(3, 'G3', 'Bau mulut (halitosis)', 'Tenggorokan', NULL, NULL, NULL),
(4, 'G4', 'Benjolan kecil atau bisul di dekat saluran telinga', 'Telinga', NULL, NULL, NULL),
(5, 'G5', 'Bersin', 'Hidung', NULL, NULL, NULL),
(6, 'G6', 'Daun telinga bengkak dan merah', 'Telinga', NULL, NULL, NULL),
(7, 'G7', 'Demam', 'Umum', NULL, NULL, NULL),
(8, 'G8', 'Dering di telinga (tinnitus)', 'Telinga', NULL, NULL, NULL),
(9, 'G9', 'Diare', 'Umum', NULL, NULL, NULL),
(10, 'G10', 'Gangguan Tidur', 'Umum', NULL, NULL, NULL),
(11, 'G11', 'Gatal dan merah di liang telinga', 'Telinga', NULL, NULL, NULL),
(12, 'G12', 'Gatal pada hidung, mata, tenggorokan, kulit, atau area apa pun', 'Umum', NULL, NULL, NULL),
(13, 'G13', 'Gejala sejenis eksim, misalnya kulit sangat kering dan gatal serta sering melepuh', 'Umum', NULL, NULL, NULL),
(14, 'G14', 'Hidung berair dan produksi lendir berlebihan', 'Hidung', NULL, NULL, NULL),
(15, 'G15', 'Hidung tersumbat', 'Hidung', NULL, NULL, NULL),
(16, 'G16', 'Ingus berwarna kuning kehijauan', 'Hidung', NULL, NULL, NULL),
(17, 'G17', 'Indera perasa berkurang ketajamannya', 'Tenggorokan', NULL, NULL, NULL),
(18, 'G18', 'Kehilangan keseimbangan', 'Umum', NULL, NULL, NULL),
(19, 'G19', 'Keluar cairan bening yang tidak berbau dari telinga', 'Telinga', NULL, NULL, NULL),
(20, 'G20', 'Keluar Cairan kuning, bening, nanah, atau darah dari telinga', 'Telinga', NULL, NULL, NULL),
(21, 'G21', 'Kepala pusing / sakit kepala', 'Umum', NULL, NULL, NULL),
(22, 'G22', 'Kesulitan membuka mulut', 'Tenggorokan', NULL, NULL, NULL),
(23, 'G23', 'Leher Kaku', 'Tenggorokan', NULL, NULL, NULL),
(24, 'G24', 'Lingkaran hitam di bawah mata', 'Umum', NULL, NULL, NULL),
(25, 'G25', 'Mata Berair', 'Umum', NULL, NULL, NULL),
(26, 'G26', 'Mendengkur', 'Tenggorokan', NULL, NULL, NULL),
(27, 'G27', 'Menurunnya fungsi indera penciuman', 'Hidung', NULL, NULL, NULL),
(28, 'G28', 'Menurunnya nafsu makan', 'Umum', NULL, NULL, NULL),
(29, 'G29', 'Mimisan', 'Hidung', NULL, NULL, NULL),
(30, 'G30', 'Mual dan muntah', 'Umum', NULL, NULL, NULL),
(31, 'G31', 'Mudah marah', 'Umum', NULL, NULL, NULL),
(32, 'G32', 'Nyeri Otot', 'Umum', NULL, NULL, NULL),
(33, 'G33', 'Nyeri pada bagian wajah/rahang dan terasa sakit ketika ditekan', 'Tenggorokan', NULL, NULL, NULL),
(34, 'G34', 'Nyeri pada telinga', 'Telinga', NULL, NULL, NULL),
(35, 'G35', 'Pembengkakan di sekitar mata dan semakin parah pada pagi hari', 'Umum', NULL, NULL, NULL),
(36, 'G36', 'Pembengkakan kelenjar getah bening di leher', 'Tenggorokan', NULL, NULL, NULL),
(37, 'G37', 'Penglihatan kabur atau berbayang', 'Umum', NULL, NULL, NULL),
(38, 'G38', 'Penurunan kemampuan mendengar', 'Telinga', NULL, NULL, NULL),
(39, 'G39', 'Sakit / radang tenggorokan', 'Tenggorokan', NULL, NULL, NULL),
(40, 'G40', 'Sakit Gigi', 'Tenggorokan', NULL, NULL, NULL),
(41, 'G41', 'Sakit kepala terus-menerus', 'Umum', NULL, NULL, NULL),
(42, 'G42', 'Suara menjadi serak atau hilang', 'Tenggorokan', NULL, NULL, NULL),
(43, 'G43', 'Sulit bernafas', 'Tenggorokan', NULL, NULL, NULL),
(44, 'G44', 'Susah menelan', 'Tenggorokan', NULL, NULL, NULL),
(45, 'G45', 'Tenggorokan bengkak', 'Tenggorokan', NULL, NULL, NULL),
(46, 'G46', 'Tenggorokan gatal', 'Tenggorokan', NULL, NULL, NULL),
(47, 'G47', 'Terdapat benjolan pada tenggorokan', 'Tenggorokan', NULL, NULL, NULL),
(48, 'G48', 'Wajah terasa nyeri atau mati rasa', 'Umum', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `info_penyakit`
--

CREATE TABLE `info_penyakit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `info_penyakit`
--

INSERT INTO `info_penyakit` (`id`, `kode`, `detail`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'P1', '<h1 style=\"text-align: center; \">Otitis Eksterna<h5 style=\"text-align: left;\"><span style=\"font-weight: normal;\"><br></span></h5><h4 style=\"text-align: left;\"><span style=\"font-weight: normal;\">Otitis Eksterna adalah peradangan pada daun telinga atau liang telinga, yaitu saluran dari lubang telinga sampai gendang. Peradangan tersebut paling sering terjadi karena air masuk ke telinga dan tidak dikeringkan, sehingga membentuk lingkungan lembab dan asam yang mendukung bakteri atau jamur untuk tumbuh dan berkembang. Hal ini umum terjadi pada perenang. Oleh karena itu, penyakit ini juga diberi istilah <i>swimmer\'s ear</i>&nbsp;(telinga perenang).</span></h4><h3 style=\"text-align: left;\">Penyebab Otitis Eksterna</h3><p style=\"text-align: left;\">Beberapa faktor yang dapat meningkatkan risiko seseorang mengalami otitis eksterna, antara lain :</p><ul><li style=\"text-align: left;\"><b>Berenang</b>. Risiko akan semakin besar jika berenang di tempat yang banyak mengandung bakteri, misalnya danau.</li><li style=\"text-align: left;\"><b>Kotoran telinga terlalu sedikit atau terlalu banyak</b>. Kotoran telinga (serumen) sebenarnya berfungsi melindungi liang telinga, namun harus dalam kadar yang tepat. Serumen yang terlalu sedikit bisa menyebabkan infeksi. Begitu juga jika terlalu banyak, serumen akan menumpuk sehingga air dan kotoran terperangkap di liang telinga.</li><li style=\"text-align: left;\"><b>Liang telinga tergores atau lecet</b>. Membersihkan telinga menggunakan korek kuping, mengeruk liang telinga dengan kuku, menggunakan alat bantu dengar atau menggunakan headphone saat mendengarkan musik dapat menyebabkan pengelupasan kulit yang memungkinkan bakteri tumbuh.</li><li style=\"text-align: left;\">Produk perawatan rambut, seperti sampo atau cat rambut yang tidak sengaja masuk ke liang telinga bisa menyebabkan iritasi pada kulit yang memicu infeksi.</li><li style=\"text-align: left;\"><b>Penyakit kulit</b>. Kondisi kulit, seperti dermatitis seboroik atau psoriasis, bisa menyebabkan pengelupasan kulit dan menyebabkan masuknya bakteri dan jamur.</li><li style=\"text-align: left;\"><b>Saluran telinga yang sempit</b>. Kondisi ini membuat air terjebak di dalam telinga.</li></ul><h3 style=\"text-align: left;\">Pengobatan Otitis Eksterna</h3><p style=\"text-align: left;\">Otitis eksterna umumnya cukup diobati dengan obat tetes telinga. Namun pada beberapa kasus, obat lain perlu digunakan sebagai tambahan, terutama pada kondisi berikut :</p><ul><li style=\"text-align: left;\">Sakit dan bengkak pada telinga</li><li style=\"text-align: left;\">Saluran telinga terhalang sehingga obat tidak masuk dengan sempurna.</li><li style=\"text-align: left;\">Otitis eksterna berulang.</li></ul><h3 style=\"text-align: left;\">Pencegahan Otitis Eksterna</h3><p style=\"text-align: left;\">Berikut beberapa langkah untuk mencegah terjadinya otitis eksterna :</p><ul><li style=\"text-align: left;\">Gunakan pelindung telinga saat mandi atau berenang, agar air tidak masuk ke dalam telinga.</li><li style=\"text-align: left;\">Keringkan bagian dalam telinga segera setelah mandi dan berenang.</li><li style=\"text-align: left;\">Jangan memasukkan objek yang bisa menyebabkan lapisan liang telinga luka atau tergores.</li><li style=\"text-align: left;\">Jangan gunakan korek kuping untuk membersihkan liang telinga, karena akan mendorong kotoran masuk semakin dalam dan bisa menyebabkan masalah yang lebih buruk.</li></ul><p style=\"text-align: left;\"><br></p><p style=\"text-align: left;\"><i>source :&nbsp;</i><a href=\"https://www.alodokter.com/otitis-eksterna\" style=\"font-size: 0.875rem;\">https://www.alodokter.com/otitis-eksterna</a></p></h1>\n', NULL, NULL, '2020-07-27 03:31:02'),
(2, 'P2', '<h1 style=\"text-align: center; \">Otitis Media<h5 style=\"text-align: left;\"><span style=\"font-weight: normal;\"><br></span></h5><h5 style=\"text-align: left;\"><h4 style=\'font-weight: normal; font-family: \"Nunito Sans\";\'>Otitis media adalah infeksi pada telinga bagian tengah, tepatnya pada rongga di belakang gendang telinga. Infeksi telinga bagian ini sering kali timbul akibat batuk pilek, flu atau alergi sebelumnya.</h4></h5><h5 style=\"text-align: left;\"><span style=\"color: inherit; font-family: inherit; font-size: 24px;\">Penyebab Otitis Media</span><br></h5><p style=\"text-align: left;\">Otitis media bisa disebabkan oleh infeksi virus maupun infeksi bakteri. Infeksi tersebut sering kali dipicu oleh batuk pilek atau flu sebelumnya. Di samping itu, ada beberapa faktor yang membuat seseorang lebih rentan terserang otitis media, yaitu</p><ul><li style=\"text-align: left;\">Paparan asap rokok</li><li style=\"text-align: left;\">Kebiasaan minum susu dari botol sambil berbaring</li><li style=\"text-align: left;\">Anak ang sehari-hari dititipkan di tempat penitipan anak</li></ul><h3 style=\"text-align: left;\">Pengobatan Otitis Media</h3><p style=\"text-align: left;\">Sebagian besar kasus otitis media tidak memerlukan pengobatan khusus dan akan sembuh dengan sendirinya dalam beberapa hari. Namun pada beberapa kasus, dokter akan memberikan obat pereda nyeri dan antibiotik. </p><p style=\"text-align: left;\">Bila otitis media sudah berlangsung dalam waktu lama dan sering kambuh, dokter akan mengeluarkan cairan dari dalam telinga melalui prosedur bedah.</p><h3 style=\"text-align: left;\">Pencegahan Otitis Media</h3><p style=\"text-align: left;\">Otitis media dapat dicegah dengan beberapa langkah berikut ini :</p><ul><li style=\"text-align: left;\">Jauhkan anak dari paparan asap rokok dan polusi udara</li><li style=\"text-align: left;\">Lakukan imunisasi lengkap pada anak sesuai jadwal</li><li style=\"text-align: left;\">Berikan ASI eksklusif pada bayi</li><li style=\"text-align: left;\">Jangan membiarkan anak minum dari botol susu sambil berbaring</li></ul><p style=\"text-align: left;\"><br></p><h5 style=\"text-align: left;\"><i>source :&nbsp;</i><a href=\"https://www.alodokter.com/otitis-media\" style=\"font-size: 0.875rem; font-weight: normal;\">https://www.alodokter.com/otitis-media</a></h5></h1>\n', NULL, NULL, '2020-07-27 02:58:18'),
(3, 'P3', '<h1 style=\"text-align: center; \">Rhinitis<h5 style=\"text-align: left;\"><br></h5><h5 style=\"text-align: left;\"><span style=\"font-weight: normal;\">Rhinitis adalah peradangan atau iritasi di lapisan dalam hidung, yang ditandai dengan gejala berupa pilek, hidung tersumbat dan bersin-bersin.</span></h5><h5 style=\"text-align: left;\"><span style=\"font-weight: normal;\"><br></span></h5><h3 style=\"text-align: left;\">Penyebab Rhinitis</h3><p style=\"text-align: left;\">Rhinitis paling sering muncul akibat alergi, misalnya terhadap bulu hewan peliharaan, serbuk sari, asap dan debu. Selain itu, infeksi, obat-obatan dan perubahan cuaca juga dapat menyebabkan rhinitis.</p><h3 style=\"text-align: left;\">Pengobatan dan Pencegahan Rhinitis</h3><p style=\"text-align: left;\">Rhinitis dapat diatasi dengan irigasi atau bilas hidung dan obat pilek yang dapat dibeli tanpa resep. Bila tidak membaik, dianjurkan untuk berkonsultasi dengan dokter. Namun yang terpenting dalam mengatasi rhinitis adalah mengobati penyebab dan menghindari pemicunya.</p><p style=\"text-align: left;\"><br></p><p style=\"text-align: left;\"><i>source :&nbsp;</i><a href=\"https://www.alodokter.com/rhinitis\" style=\"font-size: 0.875rem;\">https://www.alodokter.com/rhinitis</a></p></h1>\n', NULL, NULL, '2020-07-27 04:08:04'),
(4, 'P4', '<h1 style=\"text-align: center; \">Sinusitis<h4 style=\"text-align: center;\"><br></h4><h4 style=\"text-align: left;\"><span style=\"font-weight: normal;\">Sinusitis adalah inflamasi atau peradangan pada dinding sinus. Sinus merupakan rongga kecil yang saling terhubung melalui saluran udara di dalam tulang tengkorak. Sinus terletak di bagian belakang tulang dahi, bagian dalam struktur tulang pipi, kedua sisi batang hidung dan belakang mata.</span></h4><h4 style=\"text-align: left;\"><span style=\"font-weight: normal;\"><br></span></h4><h3 style=\"text-align: left;\">Penyebab Sinusitis</h3><p style=\"text-align: left;\">Sinusitis disebabkan oleh infeksi kuman. Kondisi ini lebih rentan dialami oleh perokok, atau orang yang sering berenang. Sinusitis juga dapat dipicu oleh kondisi medis tertentu, misalnya polip hidung dan rinitis alergi.</p><h3 style=\"text-align: left;\">Pengobatan dan Pencegahan Sinusitis</h3><p style=\"text-align: left;\">Sinusitis yang tidak segera ditangani, dapat menyebabkan hilangnya kemampuan indera penciuman secara permanen. Biasanya sinusitis cukup diatasi dengan obat-obatan. Tetapi pada kasus tertentu sinusitis harus ditangani dengan operasi.</p><p style=\"text-align: left;\">Sinusitis bisa dicegah dengan sejumlah cara, diantaranya :</p><ul><li style=\"text-align: left;\">Berhenti merokok.</li><li style=\"text-align: left;\">Menghindari penderita flu dan pilek.</li><li style=\"text-align: left;\">Melakukan imunisasi flu sesuai jadwal.</li></ul><p style=\"text-align: left;\"><br></p><p style=\"text-align: left;\"><i>source :&nbsp;</i><a href=\"https://www.alodokter.com/sinusitis\" style=\"font-size: 0.875rem;\">https://www.alodokter.com/sinusitis</a></p></h1>\n', NULL, NULL, '2020-07-27 04:07:08'),
(5, 'P5', '<h1 style=\"text-align: center; \">Polip Hidung<h5 style=\"text-align: center;\"><br></h5><p style=\"text-align: center;\"><br></p><h4 style=\"text-align: left;\"><span style=\"font-weight: normal;\">Polip hidung adalah jaringan yang tumbuh di bagian dalam saluran hidung. Bentuk polip hidung menyerupai anggur dengan posisi tergantung di bagian dalam hidung.</span></h4><h6 style=\"text-align: left;\"><span style=\"font-weight: normal;\"><br></span></h6><h3 style=\"text-align: left;\">Penyebab Polip Hidung</h3><p style=\"text-align: left;\">Polip hidung merupakan jaringan yang lembut, tidak menyebabkan rasa sakit, dan tidak ganas. Polip hidung dapat terbentuk saat selaput lendir (membran mukosa) dari saluran pernapasan dan sinus mengalami peradangan. Hingga kini, penyebab pasti tumbuhnya polip belum diketahui, namun diduga dipicu oleh reaksi alergi.</p><h3 style=\"text-align: left;\">Pengobatan Polip Hidung</h3><p style=\"text-align: left;\">pengobatan yang diberikan akan disesuaikan dengan kondisi polip pasien. Pengobatan dapat berupa pemberian obat semprot hidung, tablet atau suntikan maupun dengan operasi.</p><p style=\"text-align: left;\"><br></p><p style=\"text-align: left;\"><i>source :&nbsp;</i><a href=\"https://www.alodokter.com/polip-hidung\" style=\"font-size: 0.875rem;\">https://www.alodokter.com/polip-hidung</a></p></h1>\n', NULL, NULL, '2020-07-27 04:17:49'),
(6, 'P6', '<h1 style=\"text-align: center; \">Kanker Nasofaring<p><br></p><p><br></p><h5 style=\"text-align: left; \"><span style=\"font-weight: normal;\">Kanker nasofaring adalah jenis kanker tenggorokan yang terjadi pada lapisan luar nasofaring. Nasofaring merupakan salah satu bagian pada tenggorokan bagian atas yang terletak di belakang hidung dan di balik langit-langit rongga mulut. Kondisi ini dapat menimbulkan gejala berupa benjolan pada tenggorokan, penglihatan kabur, hingga kesulitan membuka mulut.</span></h5><h3>Penyebab Kanker Nasofaring</h3><p>Penyebab pasti kanker nasofaring (karsinoma nasofaring) masih belum diketahui secara pasti. Namun, dokter menduga bahwa kondisi ini memiliki hubungan dengan virus <i>Epstein-Barr </i>(EBV). EBV umumnya terdapat pada air liur dan dapat ditularkan melalui kontak langsung ke orang atau benda yang terkontaminasi.</p><p>Kanker nasofaring diduga muncul karena adanya kontaminasi EBV dalam sel nasofaring penderitanya. Sel yang telah terkontaminasi menyebabkan pertumbuhan sel yang tidak normal.</p><p>Selain itu terdaoat beberapa faktor yang dapat meningkatkan risiko kanker nasofaring, yaitu&nbsp;</p><ul><li>Kanker nasofaring lebih sering terjadi pada seorang yang berusia 30-50 tahun.</li><li>Riwayat kanker nasofaring dalam keluarga.</li><li>Merokok dan mengonsumsi alkohol.</li><li>Mengonsumsi makanan yang diawetkan dengan garam.</li></ul><h3>Pengobatan Kanker Nasofaring</h3><p>Pengobatan kanker nasofaring dapat berbeda-beda, disesuaikan dengan riwayat penyakit, stadium kanker, letak kanker dan kondisi pasien secara umum. Berdasarka metode pengobatan kanker nasofaring yang umum digunakan adalah :</p><ul><li><b>Radioterapi.</b><i style=\"font-weight: bold;\">&nbsp;</i>Biasanya dilakukan untuk mengatasi kanker nasofaring yang masih ringan. Prosedur ini bekerja dengan memancarkan sinar berenergi tinggi untuk menghentikan pertumbuhan sel kanker,</li><li><b>Kemoterapi.</b>&nbsp;Adalah metode yang menggunakan obat-obatan yang berfungsi untuk membunuh sel kanker. Kemoterapi biasanya ditunjang dengan prosedur radioterapi agar efektivitas pengobatan dapat lebih maksimal.</li><li><b>Pembedahan. </b>Karena lokasi kanker terlalu berdekatan dengan pembuluh darah dan saraf, prosedur pembedahan dalam mengatasi kanker nasofaring jarang dilakukan. Metode ini akan dilakukan apabila kanker telah menyebar hingga ke kelenjar getah bening dan perlu dilakukan pengangkatan,</li><li><b>Imunoterapi. </b>Dilakukan dengan pemberian obat yang memengaruhi sistem imun tubuh untuk melawan sel kanker. Conoth obat imunoterapi yang digunakan untuk kanker nasofaring adalah <i>pembrolizumab </i>atau <i>cetuximab. </i>Dokter akan meresepkan jenis obat biologi yang sesuai dengan kondisi dan kebutuhan pasien.</li></ul><p>Dokter juga dapat melakukan perawatan paliatif guna mencegah atau mengatasi gejala suatu penyakit dan efek samping atas pengobatan yang diterima. Perawatan paliatif dapat diberikan bersamaan dengan metode lain yang digunakan untuk mengatasi kanker nasofaring.</p><p>Pencegahan Kanker Nasofaring</p><p>Belum ada metode pasti yang dapat mencegah kanker nasofaring. Namun terdapat beberapa upaya yang bisa dilakukan untuk menjaga kesehatan tubuh agar potensi munculnya kanker dapat berkurang. Upaya tersebut meliputi :</p><ul><li>Hindari mengonsumsi makanan uang diawetkan dengan garam.</li><li>Menghindari asap rokok.</li><li>Tidak mengpnsumsi minuman beralkohol.</li></ul><p><i>source :&nbsp;</i><a href=\"https://www.alodokter.com/karsinoma-nasofaring\" style=\"font-size: 0.875rem;\">https://www.alodokter.com/karsinoma-nasofaring</a></p></h1>\n', NULL, NULL, '2020-07-27 05:08:48'),
(7, 'P7', '<h1 style=\"text-align: center; \">Faringitis<h5 style=\"text-align: left; \"><span style=\"font-weight: normal;\"><br></span></h5><h5 style=\"text-align: left; \"><span style=\"font-weight: normal;\"><br>Faringitis adalah peradangan pada tenggorokan atau faring. Kondisi ini disebut juga radang tenggorokan, yang ditandai dengan tenggorokan terasa nyeri, gatal dan sulit menelan.</span></h5><h3>Penyebab Faringitis</h3><p>Faringitis atau radang tenggorokan paling sering disebabkan oleh virus. Jenis virusnya bisa beragam namun umumnya berasal dari golongan virus <i>influenza, adenovirus, rhinovirus, </i>dan <i>Epstein-Bar.</i></p><p>Faringitis juga bisa disebabkan oleh penyebaran infeksi dari penyakit lain, seperti pilek, flu, pertusis, campak, cacar dan mononucleosis.</p><p>Pada beberapa kasus, faringitis juga bisa disebabkan oleh infeksi bakteri. Bakteri ini biasanya berasal dari golongan <i>Streptococcus A.</i>&nbsp;Meski jarang, bakteri lain seperti <i>Neisseria gogorrhoeae, Chlamydia trachomatis, </i>dan <i>Corynebacterium diphtheriae, </i>juga bisa menyebabkan faringitis,</p><p>Meski kondisi ini jarang terjadi infeksi jamur Candida juga bisa menyebabkan faringitis.</p><p>Ada beberapa faktor yang dapat meningkatkan risiko seseorang mengalami faringitis, antara lain :</p><ul><li>Anak-anak berusia 3-15 tahun.</li><li>Sering terpapar asap rokok atau polusi.</li><li>Memiliki riwayat alergi, seperti alergi dingin, alergi debu, atau bulu binatang.</li><li>Memiliki riwayat sinusitis.</li><li>Sering berada di ruangan yang kering, seperti ruangan ber-AC.</li><li>Memliki riwayat kontak dengan orang yang sedang mengalami faringitis.</li><li>Sering melakukan aktivitas yang menyebabkan ketegangan pada otot tenggorokan, misalnya karena bicara atau berteriak terlalu keras.</li><li>Memiliki sistem imun yang lemah.</li><li>Menderita GERD (<i>gastroesofageal reflux disease</i>) atau penyakit lambung.</li></ul><h3>Pengobatan Faringitis</h3><p>Pengobatan faringitis bertujuan untuk meredakan keluhan dan gejala, mengatasi infeksi penyebab faringitis, dan mencegah terjadinya komplikasi. Dua langkah penanganan yang bisa dilakukan adalah dengan penanganan mandiri dan pemberian obat-obatan. Berikut penjelasannya :</p><h4>Penanganan mandiri</h4><p>Langkah penanganan mandiri yang bisa dilakukan mengatasi faringitis adalah :</p><ul><li>Banyak beristirahat hingga kondisi terasa lebih baik.</li><li>Jangan terlalu banyak berbicara terutama bila suara sedang serak.</li><li>Minum air putih dalam jumlah yang cukup agar tidak mengalami dehidrasi.</li><li>Gunakan pelembab udara jika udara dalam ruangan terasa kering.</li><li>Konsumsi makanan yang nyaman di tenggorokan seperti sup kaldu hangat.</li><li>Berkumur dengan air garam hangat untuk meredakan nyeri tenggorokan/</li><li>Hindari paparan asap rokok dan polusi.</li></ul><h4>Pemberian obat-obatan</h4><p>Bila penangananfaringiis secara mandiri tidak membuat kondisi membaik dalam beberapa hari, maksimal 1 minggu, pemeriksaan ke dokter diperlukan.</p><h3>Pencegahan Faringitis</h3><p>Pencegahan faringitis dilakukan denganmenghindari penyebab dan pemicunya. Anda dapat melakukannya dengan menerapkan pola hidup bersih dan shat, seperti :</p><ul><li>Rajin mencuci tangan dengan sabun dan air mengalir</li><li>Jangan berbagi peralatan makan dan minum atau eralatan mandi dengan penderita faringitis.</li><li>Selalu tutup mulut dan hidung dengan tangan atau tisu saat batuk.</li><li>Jangan merokok dan hindari paparan asap rokok dan polusi.</li><li>Cuci mainan anak yang menderita faringitis dengan bersih.</li><li>Pasien faringitis sebaiknya tidak masuk sekolah atau kantor selama 1-2 hari pertama sakit untuk mencegah penularan.</li></ul><p><br></p><p><i>source :&nbsp;</i><a href=\"https://www.alodokter.com/faringitis\" style=\"font-size: 0.875rem;\">https://www.alodokter.com/faringitis</a></p><p></p><p></p></h1>\n', NULL, NULL, '2020-07-27 06:13:50'),
(8, 'P8', '<h1 style=\"text-align: center; \">Tonsilitis<h4 style=\"text-align: left;\"><span style=\"font-weight: normal;\"><br></span></h4><h4 style=\"text-align: left;\"><span style=\"font-weight: normal;\"><br></span><span style=\"font-weight: normal;\">Tonsilitis atau radang amandel adalah kondisi dimana amandel mengalami peradangan atau inflamasi. Meski umumnya dialami oleh anak-anak usia 3-7 tahun, radang amandel juga dapat terjadi pada orang dewasa.</span></h4><h3>Penyebab dan Gejala Radang Amandel</h3><p>Tonsilitis dapat disebabkan oleh beberapa penyebab. Penyebab radang amandel yang paling sering adalah infeksi virus. Selain infeksi virus radang amandel dapat disebabkan oleh infeksi bakteri.</p><p>Radang amandel ditandai dengan membengkaknya amandel dan muncul rasa sakit di tenggorokan. Selain itu, radang amandel juga dapat menimbulkan gejala lain, seperti :</p><ul><li>Suara serak</li><li>Demam</li><li>Bau mulut</li><li>Batuk</li><li>Sakit kepala</li></ul><p>Berdasarkan lama gejala yang drasakan, tonsilitis ini bisa dibedakan menjadi tonsilitis akut (kurang dari 2 minggu) dan tonsilitis kronis (lebih dari 2 minggu).</p><h3>Pengobatan Tonsilitis</h3><p>Penanganan tonsilitis dapat dilakukan dengan operasi, pemberian obat atau cukup dengan perawatan rumah. Dokter akan menentukan metode penanganan yang sesuai dengan hasil pemerikasaan kondisi pasien.</p><p>Apabila tonsilitis tidak mendapatkan penanganan yang teoat, hal itu berpotensi menimbulkan komplikasi. Komplikasi radang amandel meliputi :</p><ul><li>Kesulitan bernapas atau menelan</li><li>Apnea tidur</li><li>Muncul nanah di amandel</li><li>Penyebaran infeksi ke organ lain</li></ul><p><br></p><p><i>source :&nbsp;</i><a href=\"https://www.alodokter.com/radang-amandel\" style=\"font-size: 0.875rem;\">https://www.alodokter.com/radang-amandel</a></p><p></p></h1>\n', NULL, NULL, '2020-07-27 06:39:27'),
(9, 'P9', '<h1 style=\"text-align: center; \">Laringitis<p><br></p><h4><span style=\"font-weight: normal;\">Laringitis adalah peradangan yang terjadi pada laring, yaitu bagian dari saluran pernapasan di mana pita suara berada. Kondisi ini dapat disebabkan oleh penggunaan laring yang berlebihan, iritasi atau infeksi.</span></h4><h3 style=\"font-size: 17px; font-stretch: normal; line-height: 1.32; letter-spacing: -0.3px; margin-top: 32px; margin-bottom: 0px; font-family: LatoWeb, sans-serif;\"><strong>Penyebab Laringitis</strong></h3><p style=\"font-size: 16px; margin: 10px 0px; font-family: LatoWeb, sans-serif;\">Laringitis dibagi menjadi dua jenis, yaitu laringitis akut dan laringitis kronik. Masing-masing jenis memiliki penyebab yang berbeda. Berikut adalah penjelasannya:</p><h4 style=\"font-size: 17px; font-stretch: normal; line-height: 1.32; letter-spacing: -0.3px; margin-top: 32px; margin-bottom: 0px; font-family: LatoWeb, sans-serif;\"><strong>Laringitis akut&nbsp;</strong></h4><p style=\"font-size: 16px; margin: 10px 0px; font-family: LatoWeb, sans-serif;\">Laringitis akut adalah jenis laringitis yang berlangsung selama beberapa hari sampai beberapa minggu. Sebagian bahkan dapat sembuh sendiri tanpa pengobatan. Biasanya, kondisi akan membaik ketika penyebabnya telah ditangani. Berikut adalah beberapa penyebab laringitis akut:</p><ul style=\"font-family: LatoWeb, sans-serif; font-size: 16px;\"><li><strong>Cedera pita&nbsp;</strong><strong>suara<br></strong>Cedera pita suara dapat disebabkan oleh penggunaan pita suara yang berlebihan ketika berbicara, bernyanyi, berteriak, atau batuk.</li></ul><ul style=\"font-family: LatoWeb, sans-serif; font-size: 16px;\"><li><strong>Infeksi virus<br></strong>Virus penyebab infeksi yang menyebabkan laringitis akut biasanya sama dengan jenis virus yang menyebabkan&nbsp;<span style=\"outline-style: initial;\">infeksi saluran pernapasan</span>&nbsp;lainnya.</li></ul><ul style=\"font-family: LatoWeb, sans-serif; font-size: 16px;\"><li><strong>Infeksi&nbsp;</strong><strong>bakteri<br></strong>Salah satu jenis bakteri penyebab laringitis akut adalah bakteri&nbsp;<span style=\"outline-style: initial;\">difteri</span>.</li></ul><h4 style=\"font-size: 17px; font-stretch: normal; line-height: 1.32; letter-spacing: -0.3px; margin-top: 32px; margin-bottom: 0px; font-family: LatoWeb, sans-serif;\"><strong>Laringitis kronis</strong></h4><p style=\"font-size: 16px; margin: 10px 0px; font-family: LatoWeb, sans-serif;\">Laringitis disebut kronis jika berlangsung lebih dari tiga minggu. Umumnya, laringitis jenis ini terjadi akibat adanya paparan dari penyebab secara terus-menerus dalam waktu yang lama. Penyebab dari laringitis kronis adalah:</p><ul style=\"font-family: LatoWeb, sans-serif; font-size: 16px;\"><li>Perubahan bentuk pita suara karena faktor usia.</li><li>Kebiasaan merokok.</li><li><span style=\"outline-style: initial;\">Kecanduan alkohol</span>.</li><li>Kebiasaan menggunakan suara secara berlebihan dan dalam jangka waktu lama, seperti yang biasa dilakukan oleh penyanyi atau pemandu sorak.</li><li>Sering terpapar bahan yang mengiritasi atau menyebabkan reaksi alergi, seperti bahan kimia, debu, dan asap.</li><li><span style=\"outline-style: initial;\">Infeksi jamur</span>, biasanya terjadi pada penderita asma yang menggunakan obat&nbsp;<span style=\"outline-style: initial;\">kortikosteroid</span>&nbsp;hirup jangka panjang.</li><li>Kelumpuhan pita suara akibat cedera atau penyakit tertentu, seperti&nbsp;<span style=\"outline-style: initial;\">stroke</span>.</li><li>Penyakit&nbsp;<span style=\"outline-style: initial;\">refluks gastroesofageal</span>&nbsp;(GERD).</li></ul><p style=\"font-size: 16px; margin: 10px 0px; font-family: LatoWeb, sans-serif;\">Seseorang dengan sistem kekebalan tubuh yang lemah lebih berisiko menderita laringitis, contohnya penderita&nbsp;<span style=\"outline-style: initial;\">HIV/AIDS</span>, orang yang sedang menjalani kemoterapi, atau orang yang menggunakan obat-obatan kortikosteroid jangka panjang.</p><h3 style=\"font-size: 17px; font-stretch: normal; line-height: 1.32; letter-spacing: -0.3px; margin-top: 32px; margin-bottom: 0px; font-family: LatoWeb, sans-serif;\"><strong>Pengobatan Laringitis</strong></h3><p style=\"font-size: 16px; margin: 10px 0px; font-family: LatoWeb, sans-serif;\">Kebanyakan laringitis bisa pulih sendiri dalam waktu sekitar satu minggu, tanpa obat-obatan. Tujuan pengobatan adalah untuk meredakan gejala yang mengganggu dan mempercepat kesembuhan.</p><p style=\"font-size: 16px; margin: 10px 0px; font-family: LatoWeb, sans-serif;\">Untuk menangani laringitis secara mandiri, ada beberapa cara yang dapat dilakukan di rumah, di antaranya:</p><ul style=\"font-family: LatoWeb, sans-serif; font-size: 16px;\"><li>Minum banyak air putih dan menghindari konsumsi minuman yang mengandung kafein atau alkohol.</li><li>Menghirup&nbsp;<em>inhaler</em>&nbsp;dengan kandungan mentol untuk melegakan saluran pernapasan yang terasa tidak nyaman.</li><li>Mengonsumsi permen&nbsp;<em>mint</em>&nbsp;dan berkumur dengan air garam hangat atau&nbsp;<span style=\"outline-style: initial;\">obat kumur</span>&nbsp;khusus untuk melegakan tenggorokan.</li><li>Berbicara dengan suara perlahan untuk mengatasi&nbsp;<span style=\"outline-style: initial;\">suara serak</span>&nbsp;serta mengurangi ketegangan pada pita suara yang sedang meradang.</li><li>Menghindari penggunaan obat-obatan yang dapat membuat tenggorokan kering, seperti&nbsp;<span style=\"outline-style: initial;\">dekongestan</span>.</li><li>Menghindari paparan penyebab iritasi dan alergi, seperti asap rokok dan debu.</li><li>Berhenti merokok.</li></ul><p style=\"font-size: 16px; margin: 10px 0px; font-family: LatoWeb, sans-serif;\">Selain pengobatan di rumah, beberapa obat-obatan juga dapat diberikan oleh dokter untuk menangani laringitis. Kebanyakan obat tersebut berfungsi untuk menangani penyebab atau kondisi yang mendasari terjadinya laringitis. Obat-obatan tersebut meliputi:</p><ul style=\"font-family: LatoWeb, sans-serif; font-size: 16px;\"><li><span style=\"outline-style: initial;\">Ibuprofen</span>&nbsp;atau&nbsp;<span style=\"outline-style: initial;\">paracetamol</span>, untuk meredakan nyeri tenggorokan, sakit kepala, atau demam.</li><li>Obat&nbsp;<span style=\"outline-style: initial;\">antihistamin</span>, untuk mengatasi alergi yang muncul.</li><li>Obat penurun asam lambung, untuk menangani penyakit GERD.</li><li>Obat batuk, untuk meredakan batuk.</li><li>Kortikosteroid, untuk meredakan peradangan pada pita suara.</li><li><span style=\"outline-style: initial;\">Antibiotik</span>, untuk menangani&nbsp;<span style=\"outline-style: initial;\">infeksi bakteri</span>.</li></ul><h3 style=\"font-size: 17px; font-stretch: normal; line-height: 1.32; letter-spacing: -0.3px; margin-top: 32px; margin-bottom: 0px; font-family: LatoWeb, sans-serif;\"><strong>Pencegahan Laringitis</strong></h3><p style=\"font-size: 16px; margin: 10px 0px; font-family: LatoWeb, sans-serif;\">Laringitis dapat dihindari dengan mencegah penyebab dan faktor risikonya. Berikut ini adalah beberapa cara yang bisa dilakukan untuk mencegah laringitis:</p><ul style=\"font-family: LatoWeb, sans-serif; font-size: 16px;\"><li style=\"\">Melakukan&nbsp;<span style=\"outline-style: initial;\">vaksinasi flu</span>&nbsp;setiap tahun, sesuai jadwal.</li><li style=\"\">Membatasi konsumsi minuman beralkohol dan berkafein.</li><li style=\"\">Tidak merokok.</li><li style=\"\">Memperbanyak minum air putih.</li><li style=\"\">Membiasakan&nbsp;<span style=\"outline-style: initial;\">cuci tangan</span>&nbsp;sebelum dan sesudah makan, atau setelah dari toilet.</li><li style=\"\">Menggunakan&nbsp;<span style=\"outline-style: initial;\">alat pelindung diri (APD)</span>&nbsp;di tempat kerja.</li><li style=\"\">Mengurangi volume suara ketika berbicara.</li></ul><p><br></p><p><span style=\"font-style: italic;\">source :&nbsp;</span><a href=\"https://www.alodokter.com/laringitis\" style=\"font-size: 0.875rem;\">https://www.alodokter.com/laringitis</a></p></h1>\n', NULL, NULL, '2020-07-27 06:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_07_110753_create_gejalas_table', 1),
(4, '2019_12_07_113231_create_penyakits_table', 1),
(5, '2019_12_07_113245_create_rules_table', 1),
(6, '2020_01_31_124804_add_foreign_rules_table', 1),
(7, '2020_02_02_131503_create_info_penyakit_table', 1),
(8, '2020_02_05_041118_add_foreign_info_penyakit_table', 1),
(9, '2020_02_08_125845_create_pasiens_table', 1),
(10, '2020_02_08_133021_add_foreign_pasien_table', 1),
(11, '2020_03_26_033638_add_trigger_info_penyakit_table', 1),
(12, '2020_06_04_052356_create_f_c_rules_table', 1),
(13, '2020_06_04_133833_add_foreign_f_c_table', 1),
(14, '2020_06_05_121648_add_trigger_forward_chaining', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `diagnosis` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prosentase` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gejala` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_penyakit` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyakit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` set('Telinga','Hidung','Tenggorokan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id`, `kode_penyakit`, `penyakit`, `jenis`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'P1', 'Otitis Eksterna', 'Telinga', NULL, NULL, NULL),
(2, 'P2', 'Otitis Media', 'Telinga', NULL, NULL, NULL),
(3, 'P3', 'Rhinitis', 'Hidung', NULL, NULL, NULL),
(4, 'P4', 'Sinusitis', 'Hidung', NULL, NULL, '2020-07-25 22:22:30'),
(5, 'P5', 'Polip Hidung', 'Hidung', NULL, NULL, NULL),
(6, 'P6', 'Kanker Nasofaring', 'Hidung', NULL, NULL, NULL),
(7, 'P7', 'Faringitis (Radang Tenggorokan)', 'Tenggorokan', NULL, NULL, NULL),
(8, 'P8', 'Tonsilitis (Radang Amandel)', 'Tenggorokan', NULL, NULL, NULL),
(9, 'P9', 'Laringitis (Radang Pita Suara)', 'Tenggorokan', NULL, NULL, NULL);

--
-- Triggers `penyakit`
--
DELIMITER $$
CREATE TRIGGER `add_info_penyakit` AFTER INSERT ON `penyakit` FOR EACH ROW BEGIN
                INSERT INTO `info_penyakit` (`kode`) VALUES (NEW.kode_penyakit);
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` set('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` longtext COLLATE utf8mb4_unicode_ci,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `token_register` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `tgl_lahir`, `jk`, `no_hp`, `alamat`, `is_admin`, `token_register`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Afriza Fadilah', 'afrizaf3@gmail.com', '2020-07-14 20:51:14', '$2y$10$623lyy886QPByFm/fs18UO9gn4tDtnvXzd/SRQQC1BtTA51ew4lt.', '1998-04-14', 'Laki-laki', '085741336588', 'Tegal', 1, '', NULL, NULL, NULL, NULL),
(6, 'Didi', 'didi@gmail.com', '2020-07-14 21:24:36', '$2y$10$M3zxl4uhS.JKgvtppnbHJucuuLt9lR0kgJYdeo9Qt55vIuhzA4jjG', '2000-07-15', 'Laki-laki', '087755437990', 'Slawi', 0, 'basQoh1vNk8R163lgYhfTBK9kahGuKyZpqltLvdh7jde0iFJkYO8hIfdrQxqPWBnUIsuuVSQQdO9YYASE0wEUNs95HzJjlDRBB0iWOtutWhI7W7CjPWuT3L58bq2BHMmtlQuNi6lRoLqlfm5pxYqk9QN9YDXya0BWJmDxYnkFf7xm50S7atmGBLUCzsf1v', NULL, NULL, '2020-07-14 21:19:20', '2020-07-14 22:14:37'),
(14, 'Dadang', 'brucul7@gmail.com', NULL, '$2y$10$Db.G5Me7mVzHJuBoGCQ2NebyWFOB0EF3vTJyTD0fkL9IIrUmPLRvy', NULL, NULL, NULL, NULL, 0, '930YmqQIqR5vhLEZTGUQJs8t0BmGHt8L4jFBaSVJkCRnZxq6RZov8I3dk1dn9q1a6bIKkkZg65Tj9xT9cWNDmZ1Q804Prfj32TM5sPj5L6SBOYMJBux6o1XEQTtyzVOlCcdADBpOKc4qXkG3IulZmLAjIkwDIJCmKoiV21I28nOZvoVxCqrOkyxEYBAqQr', NULL, NULL, '2020-07-16 07:25:36', '2020-07-16 07:28:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ds_rules`
--
ALTER TABLE `ds_rules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ds_rules_id_gejala_foreign` (`id_gejala`),
  ADD KEY `ds_rules_id_penyakit_foreign` (`id_penyakit`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gejala_kode_gejala_unique` (`kode_gejala`),
  ADD UNIQUE KEY `gejala_gejala_unique` (`gejala`);

--
-- Indexes for table `info_penyakit`
--
ALTER TABLE `info_penyakit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `info_penyakit_kode_foreign` (`kode`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pasien_id_user_foreign` (`id_user`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penyakit_kode_penyakit_unique` (`kode_penyakit`),
  ADD UNIQUE KEY `penyakit_penyakit_unique` (`penyakit`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_no_hp_unique` (`no_hp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ds_rules`
--
ALTER TABLE `ds_rules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `info_penyakit`
--
ALTER TABLE `info_penyakit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ds_rules`
--
ALTER TABLE `ds_rules`
  ADD CONSTRAINT `ds_rules_id_gejala_foreign` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`kode_gejala`) ON DELETE CASCADE,
  ADD CONSTRAINT `ds_rules_id_penyakit_foreign` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`kode_penyakit`) ON DELETE CASCADE;

--
-- Constraints for table `info_penyakit`
--
ALTER TABLE `info_penyakit`
  ADD CONSTRAINT `info_penyakit_kode_foreign` FOREIGN KEY (`kode`) REFERENCES `penyakit` (`kode_penyakit`) ON DELETE CASCADE;

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
