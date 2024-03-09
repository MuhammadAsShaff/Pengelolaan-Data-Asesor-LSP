-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jul 2023 pada 04.58
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistempengelolaandataasesor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `no_induk_pegawai` int(50) NOT NULL,
  `nama_admin` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`no_induk_pegawai`, `nama_admin`, `email`, `password`, `no_hp`, `alamat`, `tanggal_lahir`, `gambar`) VALUES
(31231, 'Acop Gaming', 'admin@gmail.com', '1234', '082167821', 'Pokok nya masih punya rumah', '2023-07-04', 'a2b993c44bdbcd50b4bc23b8761abda8.jpg'),
(78902, '     Muhammad As Shaff', 'm.assohff@gmail.com', '1234567890', '11111', 'pkok nya di sana', '2023-01-01', '7466ae33c44332e6fe451136e9c3c675.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `asesor`
--

CREATE TABLE `asesor` (
  `nomor_registrasi_asesor` int(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `pendidikan_terakhir` varchar(25) DEFAULT NULL,
  `nama_asesor` varchar(255) DEFAULT NULL,
  `nomor_ktp` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `asesor`
--

INSERT INTO `asesor` (`nomor_registrasi_asesor`, `email`, `alamat`, `pendidikan_terakhir`, `nama_asesor`, `nomor_ktp`, `password`, `tanggal_lahir`, `gambar`) VALUES
(12345678, 'email10@example.com', 'Alamat 10', 'Pendidikan Terakhir 10', '  Nama Asesor 10', '0123456789', 'password10', '2000-10-10', 'c77d8e4fdcc8aa947790fadad5e3d5b2.jpg'),
(123456789, 'email1@example.com', 'Alamat 1', 'Pendidikan Terakhir 1', 'Nama Asesor 1', '1234567890', 'password1', '2000-01-01', 'gambar1.jpg'),
(234567890, 'email2@example.com', 'Alamat 2', 'Pendidikan Terakhir 2', ' Nama Asesor 2', '2345678901', 'password2', '2000-02-02', 'b17ca4d939f3b01729c43c712989f203.jpg'),
(345678901, 'email3@example.com', 'Alamat 3', 'Pendidikan Terakhir 3', 'Nama Asesor 3', '3456789012', 'password3', '2000-03-03', 'gambar3.jpg'),
(456789012, 'email4@example.com', 'Alamat 4', 'Pendidikan Terakhir 4', 'Nama Asesor 4', '4567890123', 'password4', '2000-04-04', 'gambar4.jpg'),
(567890123, 'email5@example.com', 'Alamat 5', 'Pendidikan Terakhir 5', ' Nama Asesor 5', '5678901234', 'password5', '2000-05-05', '7623a4afe9da871274e7535f039b7af0.jpg'),
(678901234, 'email6@example.com', 'Alamat 6', 'Pendidikan Terakhir 6', 'Nama Asesor 6', '6789012345', 'password6', '2000-06-06', 'gambar6.jpg'),
(789012345, 'email7@example.com', 'Alamat 7', 'Pendidikan Terakhir 7', ' Nama Asesor 7', '7890123456', 'password7', '2000-07-07', '1c7ac9b845ba4e553f2d507427fc6884.png'),
(890123456, 'email8@example.com', 'Alamat 8', 'Pendidikan Terakhir 8', ' Nama Asesor 8', '8901234567', 'password8', '2000-08-08', 'eeeb1cc4630a1865bafb80886ae9aa58.jpg'),
(901234567, 'email9@example.com', 'Alamat 9', 'Pendidikan Terakhir 9', 'Nama Asesor 9', '9012345678', 'password9', '2000-09-09', 'gambar9.jpg'),
(1234567890, 'asesor@gmail.com', 'JL.Umban Sari GG.Geso NO.12 kecamatan Rumbai Pekanbaru Riau', 'D4 SistemInformasi', ' ujiCoba', '12345678', '1234', '2004-03-02', '3230af7963f906c3d50b09294ac2911b.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(50) NOT NULL,
  `tanggal_jadwal` date DEFAULT NULL,
  `asesor_id` int(50) DEFAULT NULL,
  `no_st` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `tanggal_jadwal`, `asesor_id`, `no_st`) VALUES
(23124, '0000-00-00', 678901234, 22680),
(2143512, '2023-07-17', 1234567890, 7812639),
(2412431, '2023-02-09', 123456789, 5336);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengelolaanasesor`
--

CREATE TABLE `pengelolaanasesor` (
  `id_pengelolaan_asesor` int(50) NOT NULL,
  `asesor_id` int(50) DEFAULT NULL,
  `admin_id` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengelolaanasesor`
--

INSERT INTO `pengelolaanasesor` (`id_pengelolaan_asesor`, `asesor_id`, `admin_id`) VALUES
(1, 1234567890, 31231);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengelolaanjadwal`
--

CREATE TABLE `pengelolaanjadwal` (
  `id_pengelolaan_jadwal` int(50) NOT NULL,
  `jadwal_id` int(50) DEFAULT NULL,
  `admin_id` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengelolaanjadwal`
--

INSERT INTO `pengelolaanjadwal` (`id_pengelolaan_jadwal`, `jadwal_id`, `admin_id`) VALUES
(1, 23124, 31231);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengelolaansertifikat`
--

CREATE TABLE `pengelolaansertifikat` (
  `id_pengelolaan_sertifikat` int(50) NOT NULL,
  `sertifikat_id` int(50) DEFAULT NULL,
  `admin_id` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengelolaansertifikat`
--

INSERT INTO `pengelolaansertifikat` (`id_pengelolaan_sertifikat`, `sertifikat_id`, `admin_id`) VALUES
(1, 607097, 31231);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengelolaansurattugas`
--

CREATE TABLE `pengelolaansurattugas` (
  `id_pengelolaan_surat_tugas` int(50) NOT NULL,
  `surat_tugas_id` int(50) DEFAULT NULL,
  `admin_id` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengelolaansurattugas`
--

INSERT INTO `pengelolaansurattugas` (`id_pengelolaan_surat_tugas`, `surat_tugas_id`, `admin_id`) VALUES
(1, 7812639, 78902);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sertifikat`
--

CREATE TABLE `sertifikat` (
  `nomor_sertifikat` int(50) NOT NULL,
  `tanggal_aktif` date DEFAULT NULL,
  `tanggal_kadaluarsa` date DEFAULT NULL,
  `asesor_id` int(50) DEFAULT NULL,
  `sertifikat` varchar(200) NOT NULL,
  `Status_sertifikat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sertifikat`
--

INSERT INTO `sertifikat` (`nomor_sertifikat`, `tanggal_aktif`, `tanggal_kadaluarsa`, `asesor_id`, `sertifikat`, `Status_sertifikat`) VALUES
(213, '0123-03-21', '0003-03-02', 1234567890, '2fb89501cdc1ecb5ecbbedc8dbe29f68.jpg', ''),
(13123, '0123-03-12', '0123-03-12', 1234567890, 'e9bfc12f7d37c77f563784527eb1e5d6.jpg', ''),
(13701, '2023-08-01', '2024-08-01', 890123456, 'd76d7eda0fe0c8de53d6fb9546f469da.jpg', 'Aktif'),
(21312, '0321-03-12', '9999-09-09', 1234567890, 'ed1e2f7aad9deb667777beee94c1b8e6.jpg', 'kadaluarsa'),
(34511, '2023-10-01', '2024-10-01', 12345678, 'cf54ee4572b0d305bdff910d4b84cf95.jpg', 'Aktif'),
(221665, '2023-09-01', '2024-09-01', 901234567, 'sertifikat9.pdf', 'Aktif'),
(224285, '2023-04-01', '2024-04-01', 456789012, '6deb69c00f5acc25bbeeeabad3ab7040.jpg', ''),
(254885, '2023-08-01', '2024-08-01', 890123456, 'sertifikat8.pdf', 'Aktif'),
(343671, '2023-10-01', '2024-10-01', 123456789, 'sertifikat10.pdf', 'Aktif'),
(350920, '2023-07-01', '2024-07-01', 789012345, 'sertifikat7.pdf', 'Kadaluarsa'),
(382868, '2023-05-01', '2024-05-01', 567890123, 'sertifikat5.pdf', ''),
(415123, '2023-09-01', '2024-09-01', 901234567, '3f64b9a46750edefe4b5959901b224b9.jpg', 'Aktif'),
(450700, '2023-05-01', '2024-05-01', 567890123, 'sertifikat5.pdf', ''),
(499905, '2023-06-01', '2024-06-01', 678901234, 'sertifikat6.pdf', 'Kadaluarsa'),
(532390, '2023-02-01', '2024-02-01', 234567890, 'sertifikat2.pdf', ''),
(551128, '2023-07-01', '2024-07-01', 789012345, 'sertifikat7.pdf', 'Kadaluarsa'),
(580646, '2023-06-01', '2024-06-01', 678901234, 'bbafae1d49c341b80fa6c71902c1ba89.jpg', 'Aktif'),
(607097, '2023-01-01', '2024-01-01', 123456789, 'sertifikat1.pdf', ''),
(742306, '2023-02-01', '2024-02-01', 234567890, 'sertifikat2.pdf', ''),
(804812, '2023-04-01', '2024-04-01', 456789012, 'sertifikat4.pdf', ''),
(880397, '2023-03-01', '2024-03-01', 345678901, 'sertifikat3.pdf', ''),
(890241, '2023-03-01', '2024-03-01', 345678901, 'sertifikat3.pdf', ''),
(927185, '2023-01-01', '2024-01-01', 123456789, 'sertifikat1.pdf', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skema`
--

CREATE TABLE `skema` (
  `id_skema` int(50) NOT NULL,
  `nama_skema` varchar(100) DEFAULT NULL,
  `asesor_id` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `skema`
--

INSERT INTO `skema` (`id_skema`, `nama_skema`, `asesor_id`) VALUES
(124235, 'Administrasi Madya ', 1234567890),
(312312, 'ini cuman coba coba saja', 234567890);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surattugas`
--

CREATE TABLE `surattugas` (
  `no_st` int(50) NOT NULL,
  `tanggal_st` date DEFAULT NULL,
  `skema_st` varchar(25) DEFAULT NULL,
  `deskripsi` varchar(225) DEFAULT NULL,
  `asesor_id` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `surattugas`
--

INSERT INTO `surattugas` (`no_st`, `tanggal_st`, `skema_st`, `deskripsi`, `asesor_id`) VALUES
(5336, '2023-07-17', 'Skema A', 'Deskripsi tugas untuk Skema A', 123456789),
(22680, '2023-07-22', 'Skema C', 'Deskripsi tugas untuk Skema C', 678901234),
(38678, '2023-07-20', 'Skema A', 'Deskripsi tugas untuk Skema A', 456789012),
(50171, '2023-07-23', 'Skema A', 'Deskripsi tugas untuk Skema A', 789012345),
(63563, '2023-07-25', 'Skema C', 'Deskripsi tugas untuk Skema C', 901234567),
(69369, '2023-07-26', 'Skema A', 'Deskripsi tugas untuk Skema A', 12345678),
(82816, '2023-07-24', 'Skema B', 'Deskripsi tugas untuk Skema B', 890123456),
(87743, '2023-07-21', 'Skema B', 'Deskripsi tugas untuk Skema B', 567890123),
(7812639, '2023-07-17', 'Administrasi Jaringan Mud', 'Mohon untuk melakukan tugas ini dengan sebaik-baiknya, objektif, dan profesional. Jika ada hal-hal yang perlu didiskusikan atau pertanyaan lebih lanjut terkait dengan tugas ini, silakan hubungi [nama dan kontak orang yang ber', 1234567890);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`no_induk_pegawai`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `asesor`
--
ALTER TABLE `asesor`
  ADD PRIMARY KEY (`nomor_registrasi_asesor`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD UNIQUE KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `fk_jadwal` (`asesor_id`),
  ADD KEY `fk_jadwal_surat` (`no_st`);

--
-- Indeks untuk tabel `pengelolaanasesor`
--
ALTER TABLE `pengelolaanasesor`
  ADD PRIMARY KEY (`id_pengelolaan_asesor`),
  ADD KEY `fk_Dikelola_adminAS` (`asesor_id`),
  ADD KEY `fk_PengOleh_adminAS` (`admin_id`);

--
-- Indeks untuk tabel `pengelolaanjadwal`
--
ALTER TABLE `pengelolaanjadwal`
  ADD PRIMARY KEY (`id_pengelolaan_jadwal`),
  ADD KEY `fk_dikelola_adminJadwal` (`jadwal_id`),
  ADD KEY `fk_pengkelola_adminJadwal` (`admin_id`);

--
-- Indeks untuk tabel `pengelolaansertifikat`
--
ALTER TABLE `pengelolaansertifikat`
  ADD PRIMARY KEY (`id_pengelolaan_sertifikat`),
  ADD KEY `fk_dikelola_adminSertidikat` (`sertifikat_id`),
  ADD KEY `fk_PengOleh_adminSertidikat` (`admin_id`);

--
-- Indeks untuk tabel `pengelolaansurattugas`
--
ALTER TABLE `pengelolaansurattugas`
  ADD PRIMARY KEY (`id_pengelolaan_surat_tugas`),
  ADD KEY `fk_Dikelola_adminSurat` (`surat_tugas_id`),
  ADD KEY `fk_PengOleh_adminSurat` (`admin_id`);

--
-- Indeks untuk tabel `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`nomor_sertifikat`),
  ADD KEY `fk_sertifikat` (`asesor_id`);

--
-- Indeks untuk tabel `skema`
--
ALTER TABLE `skema`
  ADD PRIMARY KEY (`id_skema`),
  ADD KEY `fk_sekama` (`asesor_id`);

--
-- Indeks untuk tabel `surattugas`
--
ALTER TABLE `surattugas`
  ADD PRIMARY KEY (`no_st`),
  ADD KEY `fk_SuratTugas` (`asesor_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2412432;

--
-- AUTO_INCREMENT untuk tabel `pengelolaanasesor`
--
ALTER TABLE `pengelolaanasesor`
  MODIFY `id_pengelolaan_asesor` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengelolaanjadwal`
--
ALTER TABLE `pengelolaanjadwal`
  MODIFY `id_pengelolaan_jadwal` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengelolaansertifikat`
--
ALTER TABLE `pengelolaansertifikat`
  MODIFY `id_pengelolaan_sertifikat` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengelolaansurattugas`
--
ALTER TABLE `pengelolaansurattugas`
  MODIFY `id_pengelolaan_surat_tugas` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `fk_jadwal` FOREIGN KEY (`asesor_id`) REFERENCES `asesor` (`nomor_registrasi_asesor`),
  ADD CONSTRAINT `fk_jadwal_surat` FOREIGN KEY (`no_st`) REFERENCES `surattugas` (`no_st`);

--
-- Ketidakleluasaan untuk tabel `pengelolaanasesor`
--
ALTER TABLE `pengelolaanasesor`
  ADD CONSTRAINT `fk_Dikelola_adminAS` FOREIGN KEY (`asesor_id`) REFERENCES `asesor` (`nomor_registrasi_asesor`),
  ADD CONSTRAINT `fk_PengOleh_adminAS` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`no_induk_pegawai`);

--
-- Ketidakleluasaan untuk tabel `pengelolaanjadwal`
--
ALTER TABLE `pengelolaanjadwal`
  ADD CONSTRAINT `fk_dikelola_adminJadwal` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`id_jadwal`),
  ADD CONSTRAINT `fk_pengkelola_adminJadwal` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`no_induk_pegawai`);

--
-- Ketidakleluasaan untuk tabel `pengelolaansertifikat`
--
ALTER TABLE `pengelolaansertifikat`
  ADD CONSTRAINT `fk_PengOleh_adminSertidikat` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`no_induk_pegawai`),
  ADD CONSTRAINT `fk_dikelola_adminSertidikat` FOREIGN KEY (`sertifikat_id`) REFERENCES `sertifikat` (`nomor_sertifikat`);

--
-- Ketidakleluasaan untuk tabel `pengelolaansurattugas`
--
ALTER TABLE `pengelolaansurattugas`
  ADD CONSTRAINT `fk_Dikelola_adminSurat` FOREIGN KEY (`surat_tugas_id`) REFERENCES `surattugas` (`no_st`),
  ADD CONSTRAINT `fk_PengOleh_adminSurat` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`no_induk_pegawai`);

--
-- Ketidakleluasaan untuk tabel `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD CONSTRAINT `fk_sertifikat` FOREIGN KEY (`asesor_id`) REFERENCES `asesor` (`nomor_registrasi_asesor`);

--
-- Ketidakleluasaan untuk tabel `skema`
--
ALTER TABLE `skema`
  ADD CONSTRAINT `fk_sekama` FOREIGN KEY (`asesor_id`) REFERENCES `asesor` (`nomor_registrasi_asesor`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `surattugas`
--
ALTER TABLE `surattugas`
  ADD CONSTRAINT `fk_SuratTugas` FOREIGN KEY (`asesor_id`) REFERENCES `asesor` (`nomor_registrasi_asesor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
