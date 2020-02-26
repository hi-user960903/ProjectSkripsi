-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Agu 2019 pada 10.01
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sippers`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_atribut`
--

CREATE TABLE `daftar_atribut` (
  `id_atribut` int(5) NOT NULL,
  `id_gejala` int(5) NOT NULL,
  `atribut` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftar_atribut`
--

INSERT INTO `daftar_atribut` (`id_atribut`, `id_gejala`, `atribut`) VALUES
(2, 2, 'TIDAK'),
(4, 5, 'YA'),
(5, 3, 'YA'),
(6, 6, 'YA'),
(7, 6, 'TIDAK'),
(8, 3, 'TIDAK'),
(9, 5, 'TIDAK'),
(10, 7, 'YA'),
(11, 7, 'TIDAK'),
(12, 8, 'YA'),
(13, 8, 'TIDAK'),
(15, 4, 'YA'),
(16, 4, 'TIDAK'),
(17, 2, 'Satu Kali'),
(18, 2, 'Dua Kali'),
(23, 9, '<20 tahun atau >36 tahun'),
(24, 9, 'lebih dari 20 tahun dan kurang dari 36 tahun');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_gejala`
--

CREATE TABLE `daftar_gejala` (
  `id_gejala` int(5) NOT NULL,
  `kode_gejala` varchar(5) NOT NULL,
  `gejala` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftar_gejala`
--

INSERT INTO `daftar_gejala` (`id_gejala`, `kode_gejala`, `gejala`) VALUES
(2, 'G1', 'Pernah Melakukan Operasi Sesar'),
(3, 'G2', 'Letak Bayi Sungsang'),
(4, 'G3', 'Memiliki CPD'),
(5, 'G4', 'Teridentifikasi Plasenta Previa'),
(6, 'G5', 'Teridentifikasi PEB'),
(7, 'G6', 'Teridentifikasi Oligohidroamnion'),
(8, 'G7', 'Teridentifikasi Hipertensi'),
(9, 'G8', 'Usia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_memiliki`
--

CREATE TABLE `daftar_memiliki` (
  `id` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_gejala` int(5) NOT NULL,
  `id_atribut` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftar_memiliki`
--

INSERT INTO `daftar_memiliki` (`id`, `id_user`, `id_gejala`, `id_atribut`) VALUES
(12, 51, 2, 17),
(13, 51, 3, 8),
(14, 51, 4, 16),
(15, 51, 5, 9),
(16, 51, 6, 7),
(17, 51, 7, 11),
(18, 51, 8, 13),
(19, 51, 9, 24);

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_penyakit`
--

CREATE TABLE `daftar_penyakit` (
  `id_penyakit` int(5) NOT NULL,
  `penyakit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftar_penyakit`
--

INSERT INTO `daftar_penyakit` (`id_penyakit`, `penyakit`) VALUES
(1, 'Persalinan Normal'),
(2, 'Persalinan Sectio Caesarea');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_probabilitas`
--

CREATE TABLE `daftar_probabilitas` (
  `id_prob` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_user`
--

CREATE TABLE `daftar_user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `level` varchar(50) NOT NULL DEFAULT 'pasien',
  `password` varchar(255) DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `tgl_diagnosa` date DEFAULT NULL,
  `hasil` varchar(30) NOT NULL,
  `keterangan` varchar(35) NOT NULL,
  `noip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftar_user`
--

INSERT INTO `daftar_user` (`id_user`, `username`, `nama`, `level`, `password`, `tgl_lahir`, `tgl_diagnosa`, `hasil`, `keterangan`, `noip`) VALUES
(4, 'admin', 'Kia', 'admin', 'd8578edf8458ce06fbc5bb76a58c5ca4', '1988-01-01', NULL, '0', '', '0'),
(11, 'admin123', 'Sharion', 'admin', 'd8578edf8458ce06fbc5bb76a58c5ca4', '1993-02-01', NULL, '0', '', '0'),
(51, '', 'p1', 'pasien', 'd8578edf8458ce06fbc5bb76a58c5ca4', '1993-02-01', NULL, 'Persalinan Normal', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info`
--

CREATE TABLE `info` (
  `id_info` int(2) NOT NULL,
  `nama` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `info`
--

INSERT INTO `info` (`id_info`, `nama`, `gambar`, `ket`) VALUES
(1, 'Selamat datang di <strong>SiPPerS</strong> (Sistem Pengambilan Keputusan Persalinan)', '99mainImg.png', 'SiPPerS merupakan sistem pakar untuk menentukan proses persalinan berbasis web. SiPPerS bertujuan untuk memberikan informasi kepada ibu hamil tentang proses persalinan serta langkah apa saja yang harus dilakukan untuk mempersiapkan proses persalinan.'),
(2, 'Berikut adalah penjelasan secara umum tentang persalinan', '15550_102182344.jpg', 'Persalinan adalah proses yang alami yang berlangsung dengan sendirinya tetapi persalinan pada manusia setiap saat terancam penyulit yang membahayakan ibu maupun janinnya sehingga memerlukan pengawasan, pertolongan dan pelayanan dengan fasilitas yang memadai\r\n<br/>\r\n<br/>\r\n\r\nDalam proses kehamilan, proses persalinan merupakan kejadian fisiologi yang normal dialami oleh seorang ibu. Proses persalinan merupakan hal yang dinanti oleh setiap ibu yang sedang melahirkan. Dalam proses persalinan terdapat dua jenis proses persalinan yaitu secara normal atau sectio caesarea. Sectio caesarea adalah suatu cara melahirkan janin dengan membuat sayatan pada dinding depan perut atau vagina. Dalam proses persalinan terdapat resiko persalinan yang dihadapi yaitu komplikasi ibu melahirkan yang dapat memperburuk kondisi ibu melahirkan. Resiko terburuk yang dapat terjadi adalah kematian ibu dan atau bayi yang baru dilahirkan'),
(3, 'Sharing', '1sharing.png', 'SiPPerS membagikan informasi kepada masyarakat tentang apa itu persalinan, penyebab serta dampaknya. Sehingga masyarakat dengan mandiri dapat melakukan pencegahan maupun cara penanganan yang tepat bagi penderita.'),
(4, 'Diagnosa', '47diagnosis.png', 'SiPPerS menyediakan layanan untuk melakukan cek atau diagnosa secara mandiri bagi masyarakat.'),
(5, 'SiPPerS menyediakan layanan untuk membantu pengambilan keputusan dalam proses persalinan secara mandiri apakah anda melahirkan secara normal atau secara <i>sectio caesarea</i>.', '54tes.png', 'Keakuratan informasi yang diberikanpun tidak jauh berbeda dengan seorang dokter karena SiPPerS bekerja sama dengan pakar kehamilan serta mengambil data dari jurnal - jurnal yang terkait. Untuk melakukan tes, anda akan diberikan beberapa pertanyaan tentang kondisi anda saat ini, dan di bagian akhir pertanyaan anda dapat melihat hasil serta rekomendasi dari sistem.'),
(6, 'Putri Laksita Kumalasari <br> <span>4611414011</span>', '71favicon.png', 'Teknik Informatika <br/>\r\nJurusan Ilmu Komputer <br/>\r\nFakultas Matematika dan Ilmu Pengetahuan Alam <br/.>\r\nUniversitas Negeri Semarang'),
(7, 'PENGETAHUAN', '2300px-No_image_available.svg.png', 'Langkah paling awal untuk membuat sistem pakar adalah dengan menggali informasi tentang suatu masalah yang akan dipecahkan dengan bantuan seorang pakar maupun sumber pengetahuan lainya seperti buku.'),
(8, 'NAIVE BAYES', '61300px-No_image_available.svg.png', 'Data yang didaptakan dari pakar maupun buku berupa probabilitas tentang persalinan. Data ini kemudian digunakan untuk menentukan aturan sistem dalam menentukan keputusan.'),
(9, 'FORWARD CHAINING', '76300px-No_image_available.svg.png', 'Pencocokan jawaban yang dipilih oleh pengguna dengan hipotesis yang terdapat pada setiap aturan yang tersimpan dalam sistem. Aturan-aturan didapatkan dari pakar dengan melakukan wawancara serta kuesioner berkaitan mengenai gejala serta proses persalinan. Aturan ini kemudian digunakan untuk menentukan keputusan dalam persalinan.'),
(10, 'KEAKURATAN', '54300px-No_image_available.svg.png', 'Pada Sistem pakar ini tingkat keakuratan sistem akan dengan melalakukan perbandingan antara data yang telah diolah sistem dengan data asli pasien dari rumah sakit.'),
(11, 'Diagnosa Mandiri', '55konsultasi.png', 'Disini, anda dapat melakukan diagnosa mandiri untuk mengetahui proses persalinan apa yang sebaiknya ada lakukan apakah persalinan normal atau sectio caesarea. Anda hanya perlu menjawab setiap pertanyaan berkaitan dengan kondisi / keluhan yang anda rasakan saat ini. Kemudian sistem akan melakukan prediksi berdasarkan jawaban anda.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsul_diagnosa`
--

CREATE TABLE `konsul_diagnosa` (
  `id_kd` int(5) NOT NULL,
  `gejala_dan_kerusakan` varchar(200) NOT NULL,
  `bila_salah` int(2) NOT NULL,
  `bila_benar` int(2) NOT NULL,
  `mulai` char(1) NOT NULL,
  `selesai` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konsul_diagnosa`
--

INSERT INTO `konsul_diagnosa` (`id_kd`, `gejala_dan_kerusakan`, `bila_salah`, `bila_benar`, `mulai`, `selesai`) VALUES
(1, 'Tidak teridentifikasi', 1, 1, 'N', 'Y'),
(2, 'Pernah Operasi Sesar', 1, 2, 'Y', 'N'),
(3, 'Letak Bayi Sungsang', 1, 1, 'N', 'Y'),
(4, 'Memiliki CPD (Cephalopelvic Disproportion )', 1, 1, 'N', 'Y'),
(5, 'Teridentifikasi Plasenta Previa', 1, 1, 'N', 'Y'),
(6, 'Teridentifikasi PEB (Pre Eklamsia Berat)', 1, 1, 'N', 'Y'),
(7, 'Teridentifikasi Oligohidroamnion', 1, 1, 'N', 'Y'),
(8, 'Teridentifikasi Hipertensi', 1, 1, 'N', 'Y'),
(9, 'Persalinan Secara Operasi Sesar', 1, 1, 'N', 'Y'),
(10, 'Persalinan Normal', 1, 1, 'N', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `memiliki`
--

CREATE TABLE `memiliki` (
  `id_kd` int(5) NOT NULL,
  `id_solusi` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `memiliki`
--

INSERT INTO `memiliki` (`id_kd`, `id_solusi`) VALUES
(1, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menganalisa`
--

CREATE TABLE `menganalisa` (
  `id_ahd` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_kd` int(5) NOT NULL,
  `tgl_diagnosa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `solusi`
--

CREATE TABLE `solusi` (
  `id_solusi` int(5) NOT NULL,
  `nama_kerusakan` text NOT NULL,
  `penyebab` text NOT NULL,
  `solusi` text NOT NULL,
  `perawatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `solusi`
--

INSERT INTO `solusi` (`id_solusi`, `nama_kerusakan`, `penyebab`, `solusi`, `perawatan`) VALUES
(2, 'tidak teridentifikasi', '-', '-', '-'),
(3, 'Operasi Sesar', 'pernah melakukan sesar', 'Operasi Sesar', 'perhatikan kehamilan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar_atribut`
--
ALTER TABLE `daftar_atribut`
  ADD PRIMARY KEY (`id_atribut`);

--
-- Indeks untuk tabel `daftar_gejala`
--
ALTER TABLE `daftar_gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indeks untuk tabel `daftar_memiliki`
--
ALTER TABLE `daftar_memiliki`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `daftar_penyakit`
--
ALTER TABLE `daftar_penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indeks untuk tabel `daftar_probabilitas`
--
ALTER TABLE `daftar_probabilitas`
  ADD PRIMARY KEY (`id_prob`);

--
-- Indeks untuk tabel `daftar_user`
--
ALTER TABLE `daftar_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indeks untuk tabel `konsul_diagnosa`
--
ALTER TABLE `konsul_diagnosa`
  ADD PRIMARY KEY (`id_kd`);

--
-- Indeks untuk tabel `menganalisa`
--
ALTER TABLE `menganalisa`
  ADD PRIMARY KEY (`id_ahd`);

--
-- Indeks untuk tabel `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`id_solusi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_atribut`
--
ALTER TABLE `daftar_atribut`
  MODIFY `id_atribut` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `daftar_gejala`
--
ALTER TABLE `daftar_gejala`
  MODIFY `id_gejala` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `daftar_memiliki`
--
ALTER TABLE `daftar_memiliki`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `daftar_penyakit`
--
ALTER TABLE `daftar_penyakit`
  MODIFY `id_penyakit` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `daftar_probabilitas`
--
ALTER TABLE `daftar_probabilitas`
  MODIFY `id_prob` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `daftar_user`
--
ALTER TABLE `daftar_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `info`
--
ALTER TABLE `info`
  MODIFY `id_info` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `konsul_diagnosa`
--
ALTER TABLE `konsul_diagnosa`
  MODIFY `id_kd` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `menganalisa`
--
ALTER TABLE `menganalisa`
  MODIFY `id_ahd` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `solusi`
--
ALTER TABLE `solusi`
  MODIFY `id_solusi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
