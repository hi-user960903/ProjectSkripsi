# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.4.6-MariaDB)
# Database: putri
# Generation Time: 2019-11-17 04:49:40 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table daftar_atribut
# ------------------------------------------------------------

DROP TABLE IF EXISTS `daftar_atribut`;

CREATE TABLE `daftar_atribut` (
  `id_atribut` int(5) NOT NULL AUTO_INCREMENT,
  `id_gejala` int(5) NOT NULL,
  `atribut` varchar(100) NOT NULL,
  PRIMARY KEY (`id_atribut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `daftar_atribut` WRITE;
/*!40000 ALTER TABLE `daftar_atribut` DISABLE KEYS */;

INSERT INTO `daftar_atribut` (`id_atribut`, `id_gejala`, `atribut`)
VALUES
	(2,2,'TIDAK'),
	(4,5,'YA'),
	(5,3,'YA'),
	(6,6,'YA'),
	(7,6,'TIDAK'),
	(8,3,'TIDAK'),
	(9,5,'TIDAK'),
	(10,7,'YA'),
	(11,7,'TIDAK'),
	(12,8,'YA'),
	(13,8,'TIDAK'),
	(15,4,'YA'),
	(16,4,'TIDAK'),
	(17,2,'Satu Kali'),
	(18,2,'Dua Kali'),
	(23,9,'YA'),
	(24,9,'TIDAK');

/*!40000 ALTER TABLE `daftar_atribut` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table daftar_gejala
# ------------------------------------------------------------

DROP TABLE IF EXISTS `daftar_gejala`;

CREATE TABLE `daftar_gejala` (
  `id_gejala` int(5) NOT NULL AUTO_INCREMENT,
  `kode_gejala` varchar(5) NOT NULL,
  `gejala` varchar(200) NOT NULL,
  PRIMARY KEY (`id_gejala`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `daftar_gejala` WRITE;
/*!40000 ALTER TABLE `daftar_gejala` DISABLE KEYS */;

INSERT INTO `daftar_gejala` (`id_gejala`, `kode_gejala`, `gejala`)
VALUES
	(2,'G1','Pernah Melakukan Operasi Sesar'),
	(3,'G2','Letak Bayi Sungsang'),
	(4,'G3','Memiliki CPD'),
	(5,'G4','Teridentifikasi Plasenta Previa'),
	(6,'G5','Teridentifikasi PEB'),
	(7,'G6','Teridentifikasi Oligohidroamnion'),
	(8,'G7','Teridentifikasi Hipertensi'),
	(9,'G8','Usia < 20 dan > 35 tahun');

/*!40000 ALTER TABLE `daftar_gejala` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table daftar_memiliki
# ------------------------------------------------------------

DROP TABLE IF EXISTS `daftar_memiliki`;

CREATE TABLE `daftar_memiliki` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_user` int(5) NOT NULL,
  `id_gejala` int(5) NOT NULL,
  `id_atribut` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `daftar_memiliki` WRITE;
/*!40000 ALTER TABLE `daftar_memiliki` DISABLE KEYS */;

INSERT INTO `daftar_memiliki` (`id`, `id_user`, `id_gejala`, `id_atribut`)
VALUES
	(12,51,2,17),
	(13,51,3,8),
	(14,51,4,16),
	(15,51,5,9),
	(16,51,6,7),
	(17,51,7,11),
	(18,51,8,13),
	(19,51,9,24),
	(20,53,2,2),
	(21,53,2,2),
	(22,54,2,2),
	(23,54,2,2),
	(24,58,2,2),
	(25,58,2,2),
	(26,59,2,2),
	(27,59,2,2),
	(28,60,2,2),
	(29,60,2,2),
	(30,61,2,2),
	(31,61,2,2),
	(32,62,2,2),
	(33,62,2,2),
	(34,63,2,2),
	(35,63,2,2),
	(37,68,2,2),
	(38,68,2,2),
	(39,71,2,2),
	(40,71,2,2),
	(41,72,2,2),
	(42,72,2,2),
	(43,73,2,2),
	(44,73,2,2),
	(45,75,2,2),
	(46,75,3,8),
	(47,75,4,16),
	(48,75,5,9),
	(49,75,6,7),
	(50,75,7,11),
	(51,75,8,13),
	(52,75,9,24),
	(53,76,2,2),
	(54,76,3,8),
	(55,76,4,16),
	(56,76,5,9),
	(57,76,6,7),
	(58,76,7,11),
	(59,76,8,13),
	(60,76,9,24),
	(61,77,2,2),
	(62,77,3,5),
	(63,77,4,16),
	(64,77,5,9),
	(65,77,6,7),
	(66,77,7,11),
	(67,77,8,13),
	(68,77,9,24),
	(69,78,2,2),
	(70,78,3,5),
	(71,78,4,16),
	(72,78,5,9),
	(73,78,6,7),
	(74,78,7,11),
	(75,78,8,13),
	(76,78,9,24),
	(77,79,2,17),
	(78,79,3,5),
	(79,79,4,15),
	(80,79,5,9),
	(81,79,6,7),
	(82,79,7,11),
	(83,79,8,13),
	(84,79,9,24),
	(85,80,2,2),
	(86,80,3,8),
	(87,80,4,16),
	(88,80,5,9),
	(89,80,6,7),
	(90,80,7,11),
	(91,80,8,13),
	(92,80,9,24),
	(93,81,2,2),
	(94,81,3,8),
	(95,81,4,16),
	(96,81,5,9),
	(97,81,6,7),
	(98,81,7,11),
	(99,81,8,13),
	(100,81,9,23);

/*!40000 ALTER TABLE `daftar_memiliki` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table daftar_penyakit
# ------------------------------------------------------------

DROP TABLE IF EXISTS `daftar_penyakit`;

CREATE TABLE `daftar_penyakit` (
  `id_penyakit` int(5) NOT NULL AUTO_INCREMENT,
  `penyakit` varchar(50) NOT NULL,
  PRIMARY KEY (`id_penyakit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `daftar_penyakit` WRITE;
/*!40000 ALTER TABLE `daftar_penyakit` DISABLE KEYS */;

INSERT INTO `daftar_penyakit` (`id_penyakit`, `penyakit`)
VALUES
	(1,'Persalinan Normal'),
	(2,'Persalinan Sectio Caesarea');

/*!40000 ALTER TABLE `daftar_penyakit` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table daftar_probabilitas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `daftar_probabilitas`;

CREATE TABLE `daftar_probabilitas` (
  `id_prob` int(5) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_prob`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table daftar_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `daftar_user`;

CREATE TABLE `daftar_user` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `level` varchar(50) DEFAULT 'pasien',
  `password` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tgl_diagnosa` date DEFAULT NULL,
  `hasil` varchar(30) DEFAULT '',
  `keterangan` varchar(35) DEFAULT '',
  `noip` varchar(50) DEFAULT '',
  `hasil_fc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `daftar_user` WRITE;
/*!40000 ALTER TABLE `daftar_user` DISABLE KEYS */;

INSERT INTO `daftar_user` (`id_user`, `username`, `nama`, `level`, `password`, `tgl_lahir`, `tgl_diagnosa`, `hasil`, `keterangan`, `noip`, `hasil_fc`)
VALUES
	(4,'admin','Kia','admin','d8578edf8458ce06fbc5bb76a58c5ca4','1988-01-01',NULL,'0','','0',NULL),
	(11,'admin123','Sharion','admin','d8578edf8458ce06fbc5bb76a58c5ca4','1993-02-01',NULL,'0','','0',NULL),
	(51,'','p1','pasien','d8578edf8458ce06fbc5bb76a58c5ca4','1993-02-01',NULL,'Persalinan Normal','','',NULL),
	(53,'1573964331','Pasien 12','pasien','5f4dcc3b5aa765d61d8327deb882cf99','2019-11-12',NULL,'','','',NULL),
	(54,'1573964406','P2','pasien','5f4dcc3b5aa765d61d8327deb882cf99','2019-11-07',NULL,'','','',NULL),
	(55,'1573964421','P2','pasien','5f4dcc3b5aa765d61d8327deb882cf99','2019-11-05',NULL,'','','',NULL),
	(57,'1573964555','Nama','pasien','5f4dcc3b5aa765d61d8327deb882cf99','2019-11-05',NULL,'','','',NULL),
	(58,'1573964613','Nama pas','pasien','5f4dcc3b5aa765d61d8327deb882cf99','2019-11-05',NULL,'','','',NULL),
	(59,'1573964637','Nama pas','pasien','5f4dcc3b5aa765d61d8327deb882cf99','2019-11-05',NULL,'','','',NULL),
	(60,'1573964679','Nama pas','pasien','5f4dcc3b5aa765d61d8327deb882cf99','2019-11-05',NULL,'','','',NULL),
	(61,'1573964704','Nama pas','pasien','5f4dcc3b5aa765d61d8327deb882cf99','2019-11-05',NULL,'','','',NULL),
	(62,'1573964714','Nama pas','pasien','5f4dcc3b5aa765d61d8327deb882cf99','2019-11-05',NULL,'','','',NULL),
	(63,'1573964765','Nama pas','pasien','5f4dcc3b5aa765d61d8327deb882cf99','2019-11-05',NULL,'','','',NULL),
	(64,'1573964794','Nama pas','pasien','5f4dcc3b5aa765d61d8327deb882cf99','2019-11-05',NULL,'','','',NULL),
	(65,'1573964817','Nama pas','pasien','5f4dcc3b5aa765d61d8327deb882cf99','2019-11-05',NULL,'','','',NULL),
	(67,'1573964935','Nama pas','pasien','5f4dcc3b5aa765d61d8327deb882cf99','2019-11-05',NULL,'','','',NULL),
	(68,'1573964977','Nama pas','pasien','5f4dcc3b5aa765d61d8327deb882cf99','2019-11-05',NULL,'','','',NULL),
	(71,'1573965178','Nama Pengguna','pasien','5f4dcc3b5aa765d61d8327deb882cf99','2019-11-12',NULL,'','','',NULL),
	(72,'1573965195','Nama Pengguna','pasien','5f4dcc3b5aa765d61d8327deb882cf99','2019-11-12',NULL,'','','',NULL),
	(73,'1573965214','Nama Pengguna','pasien','5f4dcc3b5aa765d61d8327deb882cf99','2019-11-12',NULL,'','','',NULL),
	(74,'1573965242','Nama Pengguna','pasien','5f4dcc3b5aa765d61d8327deb882cf99','2019-11-12',NULL,'','','',NULL),
	(75,'1573965408','Nama Pengguna','pasien','5f4dcc3b5aa765d61d8327deb882cf99','2019-11-12',NULL,'','','',NULL),
	(76,'1573965431','Pasien','pasien','5f4dcc3b5aa765d61d8327deb882cf99','2019-11-07',NULL,'','','',NULL),
	(77,'1573965454','Hendi Susanto','pasien','5f4dcc3b5aa765d61d8327deb882cf99','2017-11-14',NULL,'','','',NULL),
	(78,'1573965480','Hendi Susanto','pasien','5f4dcc3b5aa765d61d8327deb882cf99','2017-11-14',NULL,'','','',NULL),
	(79,'1573965499','Pasien 1','pasien','5f4dcc3b5aa765d61d8327deb882cf99','2019-11-06',NULL,'','','',NULL),
	(80,'1573965954','Pasien 12','pasien','5f4dcc3b5aa765d61d8327deb882cf99','1996-11-05',NULL,'','','',NULL),
	(81,'1573965971','Pasien 12','pasien','5f4dcc3b5aa765d61d8327deb882cf99','2014-11-12',NULL,'','','',NULL);

/*!40000 ALTER TABLE `daftar_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table info
# ------------------------------------------------------------

DROP TABLE IF EXISTS `info`;

CREATE TABLE `info` (
  `id_info` int(2) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id_info`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `info` WRITE;
/*!40000 ALTER TABLE `info` DISABLE KEYS */;

INSERT INTO `info` (`id_info`, `nama`, `gambar`, `ket`)
VALUES
	(1,'Selamat datang di <strong>SiPPerS</strong> (Sistem Pengambilan Keputusan Persalinan)','99mainImg.png','SiPPerS merupakan sistem pakar untuk menentukan proses persalinan berbasis web. SiPPerS bertujuan untuk memberikan informasi kepada ibu hamil tentang proses persalinan serta langkah apa saja yang harus dilakukan untuk mempersiapkan proses persalinan.'),
	(2,'Berikut adalah penjelasan secara umum tentang persalinan','15550_102182344.jpg','Persalinan adalah proses yang alami yang berlangsung dengan sendirinya tetapi persalinan pada manusia setiap saat terancam penyulit yang membahayakan ibu maupun janinnya sehingga memerlukan pengawasan, pertolongan dan pelayanan dengan fasilitas yang memadai\r\n<br/>\r\n<br/>\r\n\r\nDalam proses kehamilan, proses persalinan merupakan kejadian fisiologi yang normal dialami oleh seorang ibu. Proses persalinan merupakan hal yang dinanti oleh setiap ibu yang sedang melahirkan. Dalam proses persalinan terdapat dua jenis proses persalinan yaitu secara normal atau sectio caesarea. Sectio caesarea adalah suatu cara melahirkan janin dengan membuat sayatan pada dinding depan perut atau vagina. Dalam proses persalinan terdapat resiko persalinan yang dihadapi yaitu komplikasi ibu melahirkan yang dapat memperburuk kondisi ibu melahirkan. Resiko terburuk yang dapat terjadi adalah kematian ibu dan atau bayi yang baru dilahirkan'),
	(3,'Sharing','1sharing.png','SiPPerS membagikan informasi kepada masyarakat tentang apa itu persalinan, penyebab serta dampaknya. Sehingga masyarakat dengan mandiri dapat melakukan pencegahan maupun cara penanganan yang tepat bagi penderita.'),
	(4,'Diagnosa','47diagnosis.png','SiPPerS menyediakan layanan untuk melakukan cek atau diagnosa secara mandiri bagi masyarakat.'),
	(5,'SiPPerS menyediakan layanan untuk membantu pengambilan keputusan dalam proses persalinan secara mandiri apakah anda melahirkan secara normal atau secara <i>sectio caesarea</i>.','54tes.png','Keakuratan informasi yang diberikanpun tidak jauh berbeda dengan seorang dokter karena SiPPerS bekerja sama dengan pakar kehamilan serta mengambil data dari jurnal - jurnal yang terkait. Untuk melakukan tes, anda akan diberikan beberapa pertanyaan tentang kondisi anda saat ini, dan di bagian akhir pertanyaan anda dapat melihat hasil serta rekomendasi dari sistem.'),
	(6,'Putri Laksita Kumalasari <br> <span>4611414011</span>','71favicon.png','Teknik Informatika <br/>\r\nJurusan Ilmu Komputer <br/>\r\nFakultas Matematika dan Ilmu Pengetahuan Alam <br/.>\r\nUniversitas Negeri Semarang'),
	(7,'PENGETAHUAN','2300px-No_image_available.svg.png','Langkah paling awal untuk membuat sistem pakar adalah dengan menggali informasi tentang suatu masalah yang akan dipecahkan dengan bantuan seorang pakar maupun sumber pengetahuan lainya seperti buku.'),
	(8,'NAIVE BAYES','61300px-No_image_available.svg.png','Data yang didaptakan dari pakar maupun buku berupa probabilitas tentang persalinan. Data ini kemudian digunakan untuk menentukan aturan sistem dalam menentukan keputusan.'),
	(9,'FORWARD CHAINING','76300px-No_image_available.svg.png','Pencocokan jawaban yang dipilih oleh pengguna dengan hipotesis yang terdapat pada setiap aturan yang tersimpan dalam sistem. Aturan-aturan didapatkan dari pakar dengan melakukan wawancara serta kuesioner berkaitan mengenai gejala serta proses persalinan. Aturan ini kemudian digunakan untuk menentukan keputusan dalam persalinan.'),
	(10,'KEAKURATAN','54300px-No_image_available.svg.png','Pada Sistem pakar ini tingkat keakuratan sistem akan dengan melalakukan perbandingan antara data yang telah diolah sistem dengan data asli pasien dari rumah sakit.'),
	(11,'Diagnosa Mandiri','55konsultasi.png','Disini, anda dapat melakukan diagnosa mandiri untuk mengetahui proses persalinan apa yang sebaiknya ada lakukan apakah persalinan normal atau sectio caesarea. Anda hanya perlu menjawab setiap pertanyaan berkaitan dengan kondisi / keluhan yang anda rasakan saat ini. Kemudian sistem akan melakukan prediksi berdasarkan jawaban anda.');

/*!40000 ALTER TABLE `info` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table konsul_diagnosa
# ------------------------------------------------------------

DROP TABLE IF EXISTS `konsul_diagnosa`;

CREATE TABLE `konsul_diagnosa` (
  `id_kd` int(5) NOT NULL AUTO_INCREMENT,
  `gejala_dan_kerusakan` varchar(200) NOT NULL,
  `bila_salah` int(2) NOT NULL,
  `bila_benar` int(2) NOT NULL,
  `mulai` char(1) NOT NULL,
  `selesai` char(1) NOT NULL,
  PRIMARY KEY (`id_kd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `konsul_diagnosa` WRITE;
/*!40000 ALTER TABLE `konsul_diagnosa` DISABLE KEYS */;

INSERT INTO `konsul_diagnosa` (`id_kd`, `gejala_dan_kerusakan`, `bila_salah`, `bila_benar`, `mulai`, `selesai`)
VALUES
	(1,'Tidak teridentifikasi',1,1,'N','Y'),
	(2,'Pernah Operasi Sesar',1,2,'Y','N'),
	(3,'Letak Bayi Sungsang',1,1,'N','Y'),
	(4,'Memiliki CPD (Cephalopelvic Disproportion )',1,1,'N','Y'),
	(5,'Teridentifikasi Plasenta Previa',1,1,'N','Y'),
	(6,'Teridentifikasi PEB (Pre Eklamsia Berat)',1,1,'N','Y'),
	(7,'Teridentifikasi Oligohidroamnion',1,1,'N','Y'),
	(8,'Teridentifikasi Hipertensi',1,1,'N','Y'),
	(9,'Persalinan Secara Operasi Sesar',1,1,'N','Y'),
	(10,'Persalinan Normal',1,1,'N','Y');

/*!40000 ALTER TABLE `konsul_diagnosa` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table memiliki
# ------------------------------------------------------------

DROP TABLE IF EXISTS `memiliki`;

CREATE TABLE `memiliki` (
  `id_kd` int(5) NOT NULL,
  `id_solusi` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `memiliki` WRITE;
/*!40000 ALTER TABLE `memiliki` DISABLE KEYS */;

INSERT INTO `memiliki` (`id_kd`, `id_solusi`)
VALUES
	(1,2),
	(2,3);

/*!40000 ALTER TABLE `memiliki` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table menganalisa
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menganalisa`;

CREATE TABLE `menganalisa` (
  `id_ahd` int(5) NOT NULL AUTO_INCREMENT,
  `id_user` int(5) NOT NULL,
  `id_kd` int(5) NOT NULL,
  `tgl_diagnosa` date NOT NULL,
  PRIMARY KEY (`id_ahd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table rule_base_fc
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rule_base_fc`;

CREATE TABLE `rule_base_fc` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rule_base` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `rule_base_fc` WRITE;
/*!40000 ALTER TABLE `rule_base_fc` DISABLE KEYS */;

INSERT INTO `rule_base_fc` (`id`, `rule_base`)
VALUES
	(1,'2;8;16;9;7;11;13;24');

/*!40000 ALTER TABLE `rule_base_fc` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table solusi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `solusi`;

CREATE TABLE `solusi` (
  `id_solusi` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kerusakan` text NOT NULL,
  `penyebab` text NOT NULL,
  `solusi` text NOT NULL,
  `perawatan` text NOT NULL,
  PRIMARY KEY (`id_solusi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `solusi` WRITE;
/*!40000 ALTER TABLE `solusi` DISABLE KEYS */;

INSERT INTO `solusi` (`id_solusi`, `nama_kerusakan`, `penyebab`, `solusi`, `perawatan`)
VALUES
	(2,'tidak teridentifikasi','-','-','-'),
	(3,'Operasi Sesar','pernah melakukan sesar','Operasi Sesar','perhatikan kehamilan');

/*!40000 ALTER TABLE `solusi` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
