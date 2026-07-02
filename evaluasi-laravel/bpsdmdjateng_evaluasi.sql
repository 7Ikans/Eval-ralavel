-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 23 Jun 2026 pada 11.16
-- Versi server: 10.3.39-MariaDB-cll-lve
-- Versi PHP: 8.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpsdmdjateng_evaluasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `evaluasi`
--

CREATE TABLE `evaluasi` (
  `id` int(3) NOT NULL,
  `jenis_diklat` varchar(50) NOT NULL,
  `nama_diklat` varchar(255) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `link_selenggara` char(100) NOT NULL,
  `link_widya` varchar(100) NOT NULL,
  `link_pasca` varchar(30) NOT NULL,
  `status_selenggara` int(3) NOT NULL,
  `status_widya` int(3) NOT NULL,
  `status_pasca` int(3) NOT NULL,
  `jmlh` int(3) NOT NULL,
  `metode_pelatihan` varchar(64) NOT NULL,
  `lastupdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasilevaluasitp`
--

CREATE TABLE `hasilevaluasitp` (
  `idhasil` int(11) NOT NULL,
  `namadiklat` varchar(255) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `nipwi` varchar(48) DEFAULT NULL,
  `materi` varchar(255) DEFAULT NULL,
  `tglmasuk` timestamp NULL DEFAULT current_timestamp(),
  `hasil1` varchar(255) DEFAULT NULL,
  `hasil2` varchar(255) DEFAULT NULL,
  `hasil3` varchar(255) DEFAULT NULL,
  `hasil4` varchar(255) DEFAULT NULL,
  `hasil5` varchar(255) DEFAULT NULL,
  `saran` text DEFAULT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 0,
  `ipaddress` varchar(64) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasilevaluasitp_2022`
--

CREATE TABLE `hasilevaluasitp_2022` (
  `idhasil` int(11) NOT NULL,
  `id_diklat_daftar_online` int(11) DEFAULT NULL,
  `jenisdiklat` varchar(128) DEFAULT NULL,
  `namadiklat` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `nipwi` varchar(48) NOT NULL,
  `namawi` varchar(128) NOT NULL,
  `materi` varchar(255) NOT NULL,
  `tglmasuk` timestamp NOT NULL DEFAULT current_timestamp(),
  `hasil1` varchar(32) NOT NULL COMMENT 'Kerapihan berpakaian',
  `hasil2` varchar(32) NOT NULL COMMENT 'Sikap dan perilaku',
  `hasil3` varchar(32) NOT NULL COMMENT 'Pemberian motivasi kepada peserta',
  `hasil4` varchar(32) NOT NULL COMMENT 'Kerjasama antar Widyaiswara (isi jika pelatihan diampu oleh lebih dari 1 Widyaiswara)',
  `hasil5` varchar(32) NOT NULL COMMENT 'Penguasaan materi',
  `hasil6` varchar(32) NOT NULL COMMENT 'Sistematika penyajian dan kemampuan menyajikan',
  `hasil7` varchar(32) NOT NULL COMMENT 'Penggunaan metode dan sarana pelatihan',
  `hasil8` varchar(32) NOT NULL COMMENT 'Pencapaian tujuan pembelajaran',
  `hasil9` varchar(32) NOT NULL COMMENT 'Pengaplikasian metode dan media pembelajaran saat proses pelatihan',
  `hasil10` varchar(32) NOT NULL COMMENT 'Ketepatan waktu dan kehadiran',
  `hasil11` varchar(32) NOT NULL COMMENT 'Ketuntasan penyampaian materi',
  `hasil12` varchar(32) NOT NULL COMMENT 'Pemberian umpan balik dan menjawab pertanyaan dengan tepat',
  `hasil13` varchar(32) NOT NULL COMMENT 'Penggunaan bahasa yang mudah jelas dan mudah dipahami',
  `saran` text DEFAULT NULL,
  `nip_peserta` varchar(24) DEFAULT NULL,
  `nama_peserta` varchar(128) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Hasil evaluasi Tenaga Pengajar mulai tahun 2022' ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasilevaluasitp_2024`
--

CREATE TABLE `hasilevaluasitp_2024` (
  `idhasil` int(11) NOT NULL,
  `id_diklat_daftar_online` int(11) NOT NULL,
  `jenisdiklat` varchar(128) DEFAULT NULL,
  `namadiklat` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `nipwi` varchar(48) NOT NULL,
  `namawi` varchar(128) NOT NULL,
  `materi` varchar(255) NOT NULL,
  `tglmasuk` timestamp NOT NULL DEFAULT current_timestamp(),
  `hasil1` varchar(32) NOT NULL COMMENT 'Penguasaan materi',
  `hasil2` varchar(32) NOT NULL COMMENT 'Sistematika penyajian materi',
  `hasil3` varchar(32) NOT NULL COMMENT 'Ketepatan waktu dan kehadiran',
  `hasil4` varchar(32) NOT NULL COMMENT 'Penggunaan media / sarana pembelajaran (LCD, flipchart, dll)',
  `hasil5` varchar(32) NOT NULL COMMENT 'Penggunaan metode pembelajaran (ceramah, tanya jawab, diskusi, game, kuis, dll)',
  `hasil6` varchar(32) NOT NULL COMMENT 'Sikap dan perilaku saat mengajar',
  `hasil7` varchar(32) NOT NULL COMMENT 'Penggunaan bahasa saat mengajar',
  `hasil8` varchar(32) NOT NULL COMMENT 'Sikap dan perilaku saat bertanya/menjawab/merespon/memberi feedback',
  `hasil9` varchar(32) NOT NULL COMMENT 'Penggunaan bahasa saat bertanya/menjawab/merespon/memberi feedback',
  `hasil10` varchar(32) NOT NULL COMMENT 'Sikap dan perilaku saat memberi motivasi',
  `hasil11` varchar(32) NOT NULL COMMENT 'Penggunaan bahasa saat memberi motivasi',
  `hasil12` varchar(32) NOT NULL COMMENT 'Kecakapan menciptakan kondusivitas kelas',
  `hasil13` varchar(32) NOT NULL COMMENT 'Kecakapan menjaga situasi kelas yang dinamis',
  `hasil14` varchar(32) DEFAULT NULL COMMENT 'Kerjasama antar Widyaiswara (khusus pembelajaran secara tim)',
  `saran` text DEFAULT NULL,
  `nip_peserta` varchar(24) NOT NULL,
  `nama_peserta` varchar(128) NOT NULL,
  `timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Hasil evaluasi Tenaga Pengajar mulai tahun 2024' ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasilevaluasitp_el`
--

CREATE TABLE `hasilevaluasitp_el` (
  `idhasil` int(11) NOT NULL,
  `namadiklat` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `nipwi` varchar(48) NOT NULL,
  `namawi` varchar(128) NOT NULL,
  `materi` varchar(255) NOT NULL,
  `tglmasuk` timestamp NOT NULL DEFAULT current_timestamp(),
  `hasil1` varchar(32) NOT NULL,
  `hasil2` varchar(32) NOT NULL,
  `hasil3` varchar(32) NOT NULL,
  `hasil4` varchar(32) NOT NULL,
  `hasil5` varchar(32) NOT NULL,
  `hasil6` varchar(32) NOT NULL,
  `hasil7` varchar(32) NOT NULL,
  `saran` text DEFAULT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 0,
  `ipaddress` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Hasil evaluasi TP untuk pelatihan berbasis e-learning' ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keberfungsian`
--

CREATE TABLE `keberfungsian` (
  `id` int(3) NOT NULL,
  `soal1` varchar(100) NOT NULL,
  `soal2` varchar(100) NOT NULL,
  `soal3` varchar(100) NOT NULL,
  `soal4` varchar(100) NOT NULL,
  `soal5` varchar(100) NOT NULL,
  `soal6` varchar(100) NOT NULL,
  `soal7` varchar(100) NOT NULL,
  `catatan` varchar(200) NOT NULL,
  `diklat` varchar(200) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebersihan`
--

CREATE TABLE `kebersihan` (
  `id` int(10) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `asrama` varchar(100) NOT NULL,
  `soal1` varchar(100) NOT NULL,
  `soal2` varchar(100) NOT NULL,
  `soal3` varchar(100) NOT NULL,
  `soal4` varchar(100) NOT NULL,
  `soal5` varchar(100) NOT NULL,
  `soal6` varchar(100) NOT NULL,
  `soal7` varchar(100) NOT NULL,
  `soal8` varchar(100) NOT NULL,
  `soal9` varchar(100) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `diklat` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ketersediaan`
--

CREATE TABLE `ketersediaan` (
  `id` int(10) NOT NULL,
  `soal1` varchar(100) NOT NULL,
  `soal2` varchar(100) NOT NULL,
  `soal3` varchar(100) NOT NULL,
  `soal4` varchar(100) NOT NULL,
  `catatan` varchar(1000) NOT NULL,
  `diklat` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumsi`
--

CREATE TABLE `konsumsi` (
  `id` int(10) NOT NULL,
  `ruang` varchar(100) NOT NULL,
  `soal1` varchar(100) NOT NULL,
  `soal2` varchar(100) NOT NULL,
  `soal3` varchar(100) NOT NULL,
  `soal4` varchar(100) NOT NULL,
  `soal5` varchar(100) NOT NULL,
  `catatan` varchar(1000) NOT NULL,
  `diklat` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `observasi`
--

CREATE TABLE `observasi` (
  `id` int(10) NOT NULL,
  `soal1` varchar(100) NOT NULL,
  `soal2` varchar(100) NOT NULL,
  `soal3` varchar(100) NOT NULL,
  `soal4` varchar(100) NOT NULL,
  `soal5` varchar(100) NOT NULL,
  `soal6` varchar(100) NOT NULL,
  `soal7` varchar(100) NOT NULL,
  `catatan` varchar(1000) NOT NULL,
  `diklat` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelayanan`
--

CREATE TABLE `pelayanan` (
  `id` int(10) NOT NULL,
  `soal1` varchar(100) NOT NULL,
  `soal2` varchar(100) NOT NULL,
  `soal3` varchar(100) NOT NULL,
  `soal4` varchar(100) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `nama_diklat` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelayanan_peserta`
--

CREATE TABLE `pelayanan_peserta` (
  `id` int(10) NOT NULL,
  `soal1` varchar(100) NOT NULL,
  `soal2` varchar(100) NOT NULL,
  `soal3` varchar(100) NOT NULL,
  `soal4` varchar(100) NOT NULL,
  `soal5` varchar(100) NOT NULL,
  `soal6` varchar(100) NOT NULL,
  `soal7` varchar(100) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `diklat` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perlengkapan`
--

CREATE TABLE `perlengkapan` (
  `id` int(10) NOT NULL,
  `soal1` varchar(100) NOT NULL,
  `soal2` varchar(100) NOT NULL,
  `soal3` varchar(100) NOT NULL,
  `soal4` varchar(100) NOT NULL,
  `soal5` varchar(100) NOT NULL,
  `catatan` varchar(1000) NOT NULL,
  `diklat` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `relevan`
--

CREATE TABLE `relevan` (
  `id` int(10) NOT NULL,
  `soal1` varchar(100) NOT NULL,
  `soal2` varchar(100) NOT NULL,
  `soal3` varchar(100) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `diklat` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `evaluasi`
--
ALTER TABLE `evaluasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_diklat` (`jenis_diklat`,`tahun`),
  ADD KEY `metode_pelatihan` (`metode_pelatihan`);

--
-- Indeks untuk tabel `hasilevaluasitp`
--
ALTER TABLE `hasilevaluasitp`
  ADD PRIMARY KEY (`idhasil`),
  ADD KEY `namadiklat` (`namadiklat`,`tahun`,`nipwi`,`materi`);

--
-- Indeks untuk tabel `hasilevaluasitp_2022`
--
ALTER TABLE `hasilevaluasitp_2022`
  ADD PRIMARY KEY (`idhasil`),
  ADD KEY `namadiklat` (`namadiklat`,`tahun`,`nipwi`),
  ADD KEY `materi` (`materi`);

--
-- Indeks untuk tabel `hasilevaluasitp_2024`
--
ALTER TABLE `hasilevaluasitp_2024`
  ADD PRIMARY KEY (`idhasil`),
  ADD KEY `namadiklat` (`namadiklat`,`tahun`,`nipwi`),
  ADD KEY `materi` (`materi`);

--
-- Indeks untuk tabel `hasilevaluasitp_el`
--
ALTER TABLE `hasilevaluasitp_el`
  ADD PRIMARY KEY (`idhasil`),
  ADD KEY `namadiklat` (`namadiklat`,`tahun`,`nipwi`),
  ADD KEY `materi` (`materi`);

--
-- Indeks untuk tabel `keberfungsian`
--
ALTER TABLE `keberfungsian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kebersihan`
--
ALTER TABLE `kebersihan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ketersediaan`
--
ALTER TABLE `ketersediaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konsumsi`
--
ALTER TABLE `konsumsi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `observasi`
--
ALTER TABLE `observasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelayanan_peserta`
--
ALTER TABLE `pelayanan_peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perlengkapan`
--
ALTER TABLE `perlengkapan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `relevan`
--
ALTER TABLE `relevan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `evaluasi`
--
ALTER TABLE `evaluasi`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hasilevaluasitp`
--
ALTER TABLE `hasilevaluasitp`
  MODIFY `idhasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hasilevaluasitp_2022`
--
ALTER TABLE `hasilevaluasitp_2022`
  MODIFY `idhasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hasilevaluasitp_2024`
--
ALTER TABLE `hasilevaluasitp_2024`
  MODIFY `idhasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hasilevaluasitp_el`
--
ALTER TABLE `hasilevaluasitp_el`
  MODIFY `idhasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keberfungsian`
--
ALTER TABLE `keberfungsian`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kebersihan`
--
ALTER TABLE `kebersihan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ketersediaan`
--
ALTER TABLE `ketersediaan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `konsumsi`
--
ALTER TABLE `konsumsi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `observasi`
--
ALTER TABLE `observasi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pelayanan_peserta`
--
ALTER TABLE `pelayanan_peserta`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perlengkapan`
--
ALTER TABLE `perlengkapan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `relevan`
--
ALTER TABLE `relevan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
